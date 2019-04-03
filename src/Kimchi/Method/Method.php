<?php namespace Qicilang\Kimchi\Method;

use \Qicilang\Kimchi\Exception\MethodException;
use Qicilang\Kimchi\Exception\PrizeException;
use \Qicilang\Kimchi\Utils\Algorithm;

abstract class Method implements MethodInterface
{
    //号码间分隔符
    public $codeSep = ',';
    //行间分隔符
    public $lineSep = '|';

    public function getMid()
    {
        return strtoupper((new \ReflectionClass($this))->getShortName());
    }

    //是否复式
    public function isMulti()
    {
        $className = $this->getMid();
        return (strtoupper(substr($className, strlen($className) - 2, 2)) === '_S') ? false : true;
    }

    //是否单式
    public function isSingle()
    {
        return !$this->isMulti();
    }

    public function isRx()
    {
        return false;
    }

    public function isRxZxfs()
    {
        return false;
    }

    public function isDigital5Dwd()
    {
        return false;
    }
    public function isDigital3Dwd()
    {
        return false;
    }

    public function isLottoDwd()
    {
        return false;
    }

    public function isPk10Dwd()
    {
        return false;
    }

    //是否兼中兼得
    public function isJzjd()
    {
        return false;
    }

    //玩法类型
    public function isDigital5()
    {
        return false;
    }

    public function isDigital3()
    {
        return false;
    }

    public function isKs()
    {
        return false;
    }

    public function isPk10()
    {
        return false;
    }

    public function isLotto()
    {
        return false;
    }

    //获取覆盖位数
    public function getCoverPosition()
    {
        $position = [];
        $detail = $this->getDetail();
        foreach ($detail['levels'] as $level) {
            $position = array_intersect($position, $level['position']);
        }

        sort($position);

        return $position;
    }

    public function getTotal()
    {
        $detail = $this->getDetail();
        return $detail['total'];
    }

    public function getLevels()
    {
        $detail = $this->getDetail();
        $levels = $detail['levels'];

        return $levels;
    }

    public function getLevelMergedPosition()
    {
        $detail = $this->getDetail();
        $levels = $detail['levels'];
        $merged=[];
        foreach ($levels as $levelId => $level) {
            foreach($level['position'] as $p){
                $merged[$p]=1;
            }
        }

        sort($merged);
        return $merged;
    }

    /**
     * @param $sCodes string // 0,1,2,3,4|0,1,2,3,4
     * @param array $aOpencode array  //['0'=>'x','1'=>'x','2'=>'x','3'=>'x','4'=>'x']
     * @param array $aMethodPosition //['0','1','2','3','4'] ['2','3','4']
     * @param array $aChoicedPosition //['0','1','2','3','4'] ['2','3','4']
     * @return array
     * @throws MethodException
     */
    public function getPostionCombs(string $sCodes, Array $aOpencode, Array $aMethodPosition, Array $aChoicedPosition)
    {
        $combs = [];
        if($this->isRxZxfs() || $this->isDigital5Dwd() || $this->isDigital3Dwd() || $this->isLottoDwd() || $this->isPk10Dwd()){ //按投注位分
            if(count($aChoicedPosition) != count(explode($this->lineSep,$sCodes))){
                throw new MethodException("method:{$this->getMName()} line count not matched choiced position!!");
            }
            $temp = array_combine($aChoicedPosition,explode($this->lineSep,$sCodes));

            $_combs = Algorithm::getCombination($aChoicedPosition,count($aMethodPosition));
            foreach($_combs as $_comb){
                $pos = explode(' ',$_comb);
                $aCodes = [];
                foreach($pos as $po){
                    $aCodes[]=$temp[$po];
                }
                $combs[$_comb]=[
                    'opencode' => array_intersect_key($aOpencode, array_flip($pos)),
                    'position' => $pos,
                    'code' => implode($this->lineSep,$aCodes),
                ];
            }
        }elseif($this->isRx()){ //按所选位
            if(count($aChoicedPosition) < count($aMethodPosition)){
                throw new MethodException("method:{$this->getMName()} choiced position count low than method position!!");
            }
            $_combs = Algorithm::getCombination($aChoicedPosition,count($aMethodPosition));
            foreach($_combs as $_comb){
                $pos = explode(' ',$_comb);
                $combs[$_comb]=[
                    'opencode' => array_intersect_key($aOpencode, array_flip($pos)),
                    'position' => $pos,
                    'code' => $sCodes,
                ];
            }
        }else{//默认
            $combs[implode(' ',$aMethodPosition)]=[
                'opencode' => array_intersect_key($aOpencode, array_flip($aMethodPosition)),
                'position' => $aMethodPosition,
                'code' => $sCodes,
            ];
        }

        return $combs;
    }

    /**
     * @param $sCodes string // 0,1,2,3,4
     * @param array $aOpencode array  //['0'=>'x','1'=>'x','2'=>'x','3'=>'x','4'=>'x']
     * @param array $aMethodPosition //['0','1','2','3','4'] ['2','3','4']
     * @param array $aChoicedPosition //['0','1','2','3','4'] ['2','3','4']
     * @return array
     * @throws MethodException
     */
    public function assert(string $sCodes, Array $aOpencode, Array $aMethodPosition,Array $aChoicedPosition=[])
    {
        //开奖号码必须全部传
        if(implode('',array_keys($aOpencode)) != implode('',$this->getWholePosition())){
            throw new MethodException("method:{$this->getMName()} opencode position count not matched method whole position!!");
        }

        $aLevelMergedPosition = $this->getLevelMergedPosition();
        ////玩法所选位数必须和所有奖级覆盖位数一致
        if(implode('',$aLevelMergedPosition) != implode('',$aMethodPosition)){
            throw new MethodException("method:{$this->getMName()} position count not matched level position!!");
        }

        $merged = array_values(array_intersect_key($aOpencode, array_flip($aMethodPosition)));
        if(count($merged) != count($aMethodPosition)){
            throw new MethodException("method:{$this->getMName()} merged opencodecount not matched level position!!");
        }

        $combs = $this->getPostionCombs($sCodes,$aOpencode,$aMethodPosition,$aChoicedPosition);

        $results = [];
        $detail = $this->getDetail();
        $levels = $detail['levels'];
        foreach($combs as $combKey => $comb){
            $opencode = array_values($comb['opencode']);
            $position = $comb['position'];
            $code = $comb['code'];
            foreach ($levels as $levelId => $level) {
                if (!$levelId) continue;
                $slots = array_values(array_intersect_key($opencode, array_flip($level['position'])));
                if (count($slots) != count($level['position'])) {
                    throw new MethodException("method:{$this->getMName()} type exception, opencode num not match position");
                }

                //转成玩法对应位所需开奖号码
                $num = (int)$this->assertLevel($levelId, $code, $slots);
                if ($num > 0) {
                    //中奖
                    $results[$combKey][$levelId] = [
                        'num' => $num,
                        'position' => $position,
                    ];

                    if (!$this->isJzjd()) {
                        //非兼中兼得?
                        break;
                    }
                }
            }

        }
        return $results;
    }

    /**
     * @param $assertResults //判定结果
     * @param $prizes  //奖金信息
     * @param $diffpoint //点差
     * @param int $fRate //比率 倍数*圆角分
     * @param int $prizebase //奖金基准 默认2元
     * @return array
     * @throws PrizeException
     */
    public function assertPrize($assertResults,$prizes,$diffpoint,$fRate=1,$prizebase=2)
    {
        $results = [];
        $totalprize = 0;
        $dyprizes = $this->calculatePrize($prizes,$diffpoint,$prizebase);
        foreach($assertResults as $key=>$_results){
            foreach($_results as $lid=>$result){
                if(!isset($dyprizes[$lid])){
                    throw new PrizeException("method:{$this->getMName()} prizes not include level:{$lid}");
                }
                $num = $result['num'];
                if($num<1) continue;

                $prize = $dyprizes[$lid] * $result['num'] * $fRate;
                if($prize<=0) continue;

                $result['prize'] = $prize;
                $results[$key][$lid] = $result;

                $totalprize += $prize;
            }
        }

        return [
            'prize' => $prize,
            'detail' => $results
        ];
    }

    /**
     * @param $prizes //奖金信息
     * @param $diffpoint //点差
     * @param int $prizebase //奖金基准 默认2元
     * @throws PrizeException
     */
    public function calculatePrize($prizes,$diffpoint,$prizebase)
    {
        $detail = $this->getDetail();
        $total = $detail['total'];

        $levels = $detail['levels'];
        if(count($prizes) != count($levels)){
            throw new PrizeException("method:{$this->getMName()} levels not matched prizes");
        }

        $newPrizes=[];

        //动态奖金
        foreach($prizes as $lid=>$prize){
            if(!isset($levels[$lid])){
                throw new PrizeException("method:{$this->getMName()} level:{$lid} not exists");
            }
            $level = $levels[$lid];
            $count=$level['count'];

            $dyprize =$prize + ($total/$count) * ($prizebase * $diffpoint);

            $newPrizes[$lid] = $dyprize;
        }

        return $newPrizes;
    }

    /**
     * @param $prize //奖金
     * @param $level //奖级信息
     * @param $toppoint //总代在彩种下的返点
     */
    public function calculatePointPrize($prizes,$levels,$point='0.075',$prizebase=2)
    {
        //奖金 总利润 总代返点 公司留水
        $total = $levels['total'];
        foreach($prizes as $lid => $prize){
            $level = $levels[$lid];
            $count = $levels['count'];
            // 1-(转直*中奖金额/全包金额)
            $probability=($count*$prize)/($total*$prizebase);
            $profit = number_format(  1-$probability,3,'.','');
            $level['profit'] = $profit;
            $level['rebate']  = $profit - $point;
        }
    }
}