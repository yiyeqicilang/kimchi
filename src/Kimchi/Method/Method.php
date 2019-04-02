<?php namespace Qicilang\Kimchi\Method;

use \Qicilang\Kimchi\Exception\MethodException;
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

    public function isRx()
    {
        return false;
    }

    public function isRxZxfs()
    {
        return false;
    }

    public function isDwd()
    {
        return false;
    }

    //是否兼中兼得
    public function isJzjd()
    {
        return false;
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

    /**
     * @param $sCodes string // 0,1,2,3,4
     * @param array $aOpencode array  //['0'=>'','1'=>'','2'=>'','3'=>'','4'=>'']
     * @param array $aUsePosition //['0','1','2','3','4'] ['2','3','4']
     * @param array $aChoicedPosition //['0','1','2','3','4'] ['2','3','4']
     * @return array
     * @throws MethodException
     */
    public function assertComb(string $sCodes, Array $aOpencode, Array $aUsedPosition, Array $aChoicedPosition)
    {
        if(count($aChoicedPosition) < count($aUsedPosition)){
            throw new MethodException("choice position count low than used position!!");
        }

        if(count($aUsedPosition) == count($aChoicedPosition)){
            return $this->assert($sCodes,$aOpencode,$aUsedPosition);
        }

        Algorithm::getCombination($aChoicedPosition,count($aUsedPosition));

        $aAllComb = [];
        if ($this->isRx()) {
            if ($this->isRxZxfs()) {
                //按所选位组合
            } else {
                //按给定位组合
            }
        } else {
            $aAllComb = [$aUsedPosition];
        }

    }

    /**
     * @param $sCodes string // 0,1,2,3,4
     * @param array $aOpencode array  //['0'=>'','1'=>'','2'=>'','3'=>'','4'=>'']
     * @param array $aUsePosition //['0','1','2','3','4'] ['2','3','4']
     * @return array
     * @throws MethodException
     */
    public function assert(string $sCodes, Array $aOpencode, Array $aUsedPosition)
    {
        $results = [];
        $detail = $this->getDetail();
        $levels = $detail['levels'];

        //任选玩法组合处理
        $merged=$aUsedPosition;
        foreach ($levels as $levelId => $level) {
            $merged = array_intersect_key($merged, array_flip($level['position']));
        }

        if(count($merged) != count($aUsedPosition)){
            throw new MethodException("method Used Position not match level position");
        }

        foreach ($levels as $levelId => $level) {
            if (!$levelId) continue;
            $slots = array_values(array_intersect_key($aOpencode, array_flip($level['position'])));
            if (count($slots) != count($level['position'])) {
                throw new MethodException("method type exception, opencode num not match position");
            }

            //转成玩法对应位所需开奖号码
            $num = (int)$this->assertLevel($levelId, $sCodes, array_values($slots));
            if ($num > 0) {
                //中奖
                $results[$levelId] = [
                    'num' => $num,
                    'position' => $slots,
                ];

                if (!$this->isJzjd()) {
                    //非兼中兼得?
                    break;
                }
            }
        }

        return $results;
    }
}