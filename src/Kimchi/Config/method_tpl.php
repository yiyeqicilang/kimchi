<?php
//具体玩法映射
return array(
    //--------------------------------------------------数字型--------------------------------------------------
    'digital5' => array(
        //五星
        'ZX5' => array(
            'name' => '五星直选',
            'pattern' => 'ZX5',
            'position' => array('0', '1', '2', '3', '4'),
        ),
        'ZX5_S' => array(
            'name' => '五星直选单式',
            'pattern' => 'ZX5_S',
            'position' => array('0', '1', '2', '3', '4'),
        ),
        'ZH5' => array(
            'name' => '五星组合',
            'pattern' => 'ZH5',
            'position' => array('0', '1', '2', '3', '4'),
        ),
        'WXZU120' => array(
            'name' => '组选120',
            'pattern' => 'WXZU120',
            'position' => array('0', '1', '2', '3', '4'),
        ),
        'WXZU60' => array(
            'name' => '组选60',
            'pattern' => 'WXZU60',
            'position' => array('0', '1', '2', '3', '4'),
        ),
        'WXZU30' => array(
            'name' => '组选30',
            'pattern' => 'WXZU30',
            'position' => array('0', '1', '2', '3', '4'),
        ),
        'WXZU20' => array(
            'name' => '组选20',
            'pattern' => 'WXZU20',
            'position' => array('0', '1', '2', '3', '4'),
        ),
        'WXZU10' => array(
            'name' => '组选10',
            'pattern' => 'WXZU10',
            'position' => array('0', '1', '2', '3', '4'),
        ),
        'WXZU5' => array(
            'name' => '组选5',
            'pattern' => 'WXZU5',
            'position' => array('0', '1', '2', '3', '4'),
        ),

        'YFFS' => array(
            'name' => '一帆风顺',
            'pattern' => 'YFFS',
            'position' => array('0', '1', '2', '3', '4'),
        ),
        'HSCS' => array(
            'name' => '好事成双',
            'pattern' => 'HSCS',
            'position' => array('0', '1', '2', '3', '4'),
        ),
        'SXBX' => array(
            'name' => '三星报喜',
            'pattern' => 'SXBX',
            'position' => array('0', '1', '2', '3', '4'),
        ),
        'SJFC' => array(
            'name' => '四季发财',
            'pattern' => 'SJFC',
            'position' => array('0', '1', '2', '3', '4'),
        ),

        //四星
        'ZX4' => array(
            'name' => '四星直选',
            'pattern' => 'ZX4',
            'position' => array('1', '2', '3', '4'),
        ),

        'ZX4_S' => array(
            'name' => '四星直选单式',
            'pattern' => 'ZX4_S',
            'position' => array('1', '2', '3', '4'),
        ),

        'ZH4' => array(
            'name' => '四星组合',
            'pattern' => 'ZH4',
            'position' => array('1', '2', '3', '4'),
        ),
        'SXZU24' => array(
            'name' => '四星组选24',
            'pattern' => 'SXZU24',
            'position' => array('1', '2', '3', '4'),
        ),
        'SXZU12' => array(
            'name' => '四星组选12',
            'pattern' => 'SXZU12',
            'position' => array('1', '2', '3', '4'),
        ),
        'SXZU6' => array(
            'name' => '四星组选6',
            'pattern' => 'SXZU6',
            'position' => array('1', '2', '3', '4'),
        ),
        'SXZU4' => array(
            'name' => '四星组选4',
            'pattern' => 'SXZU4',
            'position' => array('1', '2', '3', '4'),
        ),


        //前三
        'QZX3' => array(
            'name' => '前三直选复式',
            'pattern' => 'ZX3',
            'position' => array('0', '1', '2'),
        ),
        'QZX3_S' => array(
            'name' => '前三直选单式',
            'pattern' => 'ZX3_S',
            'position' => array('0', '1', '2'),
        ),
        'QZH3' => array(
            'name' => '前三组合',
            'pattern' => 'ZH3',
            'position' => array('0', '1', '2'),
        ),
        'QZXHZ' => array(
            'name' => '前三直选和值',
            'pattern' => 'ZXHZ',
            'position' => array('0', '1', '2'),
        ),
        'QZXKD' => array(
            'name' => '前三直选跨度',
            'pattern' => 'ZXKD',
            'position' => array('0', '1', '2'),
        ),
        'QZUS' => array(
            'name' => '前三组三',
            'pattern' => 'ZUS',
            'position' => array('0', '1', '2'),
        ),
        'QZUS_S' => array(
            'name' => '前三组三单式',
            'pattern' => 'ZUS_S',
            'position' => array('0', '1', '2'),
        ),
        'QZUL' => array(
            'name' => '前三组六',
            'pattern' => 'ZUL',
            'position' => array('0', '1', '2'),
        ),
        'QZUL_S' => array(
            'name' => '前三组六单式',
            'pattern' => 'ZUL_S',
            'position' => array('0', '1', '2'),
        ),
        'QHHZX_S' => array(
            'name' => '前三混合组选',
            'pattern' => 'HHZX_S',
            'position' => array('0', '1', '2'),
        ),
        'QZUHZ' => array(
            'name' => '前三组选和值',
            'pattern' => 'ZUHZ',
            'position' => array('0', '1', '2'),
        ),
        'QZU3BD' => array(
            'name' => '前三组选包胆',
            'pattern' => 'ZU3BD',
            'position' => array('0', '1', '2'),
        ),
        'QHZWS' => array(
            'name' => '前三和值尾数',
            'pattern' => 'HZWS',
            'position' => array('0', '1', '2'),
        ),
        'QTS3' => array(
            'name' => '前三特殊号',
            'pattern' => 'TS3',
            'position' => array('0', '1', '2'),
        ),


        //中三
        'ZZX3' => array(
            'name' => '中三直选复式',
            'pattern' => 'ZX3',
            'position' => array('1', '2', '3'),
        ),
        'ZZX3_S' => array(
            'name' => '中三直选单式',
            'pattern' => 'ZX3_S',
            'position' => array('1', '2', '3'),
        ),
        'ZZH3' => array(
            'name' => '中三组合',
            'pattern' => 'ZH3',
            'position' => array('1', '2', '3'),
        ),
        'ZZXHZ' => array(
            'name' => '中三直选和值',
            'pattern' => 'ZXHZ',
            'position' => array('1', '2', '3'),
        ),
        'ZZXKD' => array(
            'name' => '中三直选跨度',
            'pattern' => 'ZXKD',
            'position' => array('1', '2', '3'),
        ),
        'ZZUS' => array(
            'name' => '中三组三',
            'pattern' => 'ZUS',
            'position' => array('1', '2', '3'),
        ),
        'ZZUS_S' => array(
            'name' => '中三组三单式',
            'pattern' => 'ZUS_S',
            'position' => array('1', '2', '3'),
        ),
        'ZZUL' => array(
            'name' => '中三组六',
            'pattern' => 'ZUL',
            'position' => array('1', '2', '3'),
        ),
        'ZZUL_S' => array(
            'name' => '中三组六单式',
            'pattern' => 'ZUL_S',
            'position' => array('1', '2', '3'),
        ),
        'ZHHZX_S' => array(
            'name' => '中三混合组选',
            'pattern' => 'HHZX_S',
            'position' => array('1', '2', '3'),
        ),
        'ZZUHZ' => array(
            'name' => '中三组选和值',
            'pattern' => 'ZUHZ',
            'position' => array('1', '2', '3'),
        ),
        'ZZU3BD' => array(
            'name' => '中三组选包胆',
            'pattern' => 'ZU3BD',
            'position' => array('1', '2', '3'),
        ),
        'ZHZWS' => array(
            'name' => '中三和值尾数',
            'pattern' => 'HZWS',
            'position' => array('1', '2', '3'),
        ),
        'ZTS3' => array(
            'name' => '中三特殊号',
            'pattern' => 'TS3',
            'position' => array('1', '2', '3'),
        ),

        //后三
        'HZX3' => array(
            'name' => '后三直选复式',
            'pattern' => 'ZX3',
            'position' => array('2', '3', '4'),
        ),
        'HZX3_S' => array(
            'name' => '后三直选单式',
            'pattern' => 'ZX3_S',
            'position' => array('2', '3', '4'),
        ),
        'HZH3' => array(
            'name' => '后三组合',
            'pattern' => 'ZH3',
            'position' => array('2', '3', '4'),
        ),
        'HZXHZ' => array(
            'name' => '后三直选和值',
            'pattern' => 'ZXHZ',
            'position' => array('2', '3', '4'),
        ),
        'HZXKD' => array(
            'name' => '后三直选跨度',
            'pattern' => 'ZXKD',
            'position' => array('2', '3', '4'),
        ),
        'HZUS' => array(
            'name' => '后三组三',
            'pattern' => 'ZUS',
            'position' => array('2', '3', '4'),
        ),
        'HZUS_S' => array(
            'name' => '后三组三单式',
            'pattern' => 'ZUS_S',
            'position' => array('2', '3', '4'),
        ),
        'HZUL' => array(
            'name' => '后三组六',
            'pattern' => 'ZUL',
            'position' => array('2', '3', '4'),
        ),
        'HZUL_S' => array(
            'name' => '后三组六单式',
            'pattern' => 'ZUL_S',
            'position' => array('2', '3', '4'),
        ),
        'HHHZX_S' => array(
            'name' => '后三混合组选',
            'pattern' => 'HHZX_S',
            'position' => array('2', '3', '4'),
        ),
        'HZUHZ' => array(
            'name' => '后三组选和值',
            'pattern' => 'ZUHZ',
            'position' => array('2', '3', '4'),
        ),
        'HZU3BD' => array(
            'name' => '后三组选包胆',
            'pattern' => 'ZU3BD',
            'position' => array('2', '3', '4'),
        ),
        'HHZWS' => array(
            'name' => '后三和值尾数',
            'pattern' => 'HZWS',
            'position' => array('2', '3', '4'),
        ),
        'HTS3' => array(
            'name' => '后三特殊号',
            'pattern' => 'TS3',
            'position' => array('2', '3', '4'),
        ),


        //后二
        'HZX2' => array(
            'name' => '后二直选复式',
            'pattern' => 'ZX2',
            'position' => array('3', '4'),
        ),
        'HZX2_S' => array(
            'name' => '后二直选单式',
            'pattern' => 'ZX2_S',
            'position' => array('3', '4'),
        ),
        'HZXHZ2' => array(
            'name' => '后二直选和值',
            'pattern' => 'ZXHZ2',
            'position' => array('3', '4'),
        ),
        'HZXKD2' => array(
            'name' => '后二直选跨度',
            'pattern' => 'ZXKD2',
            'position' => array('3', '4'),
        ),
        'HZU2' => array(
            'name' => '后二组选',
            'pattern' => 'ZU2',
            'position' => array('3', '4'),
        ),
        'HZU2_S' => array(
            'name' => '后二组选单式',
            'pattern' => 'ZU2_S',
            'position' => array('3', '4'),
        ),
        'HZUHZ2' => array(
            'name' => '后二组选和值',
            'pattern' => 'ZUHZ2',
            'position' => array('3', '4'),
        ),
        'HZU2BD' => array(
            'name' => '后二组选包胆',
            'pattern' => 'ZU2BD',
            'position' => array('3', '4'),
        ),

        //前二
        'QZX2' => array(
            'name' => '前二直选复式',
            'pattern' => 'ZX2',
            'position' => array('0', '1'),
        ),
        'QZX2_S' => array(
            'name' => '前二直选单式',
            'pattern' => 'ZX2_S',
            'position' => array('0', '1'),
        ),
        'QZXHZ2' => array(
            'name' => '前二直选和值',
            'pattern' => 'ZXHZ2',
            'position' => array('0', '1'),
        ),
        'QZXKD2' => array(
            'name' => '前二直选跨度',
            'pattern' => 'ZXKD2',
            'position' => array('0', '1'),
        ),
        'QZU2' => array(
            'name' => '前二组选',
            'pattern' => 'ZU2',
            'position' => array('0', '1'),
        ),
        'QZU2_S' => array(
            'name' => '前二组选单式',
            'pattern' => 'ZU2_S',
            'position' => array('0', '1'),
        ),
        'QZUHZ2' => array(
            'name' => '前二组选和值',
            'pattern' => 'ZUHZ2',
            'position' => array('0', '1'),
        ),
        'QZU2BD' => array(
            'name' => '前二组选包胆',
            'pattern' => 'ZU2BD',
            'position' => array('0', '1'),
        ),
        'QLH' => array(
            'name' => '前二龙虎和',
            'pattern' => 'LH',
            'position' => array('0', '1'),
        ),
        'HLH' => array(
            'name' => '后二龙虎和',
            'pattern' => 'LH',
            'position' => array('3', '4'),
        ),
        //定位胆 DWD
        'DWD' => array(
            'name' => '定位胆',
            'pattern' => 'DWD',
            'position' => array('0', '1', '2', '3', '4'),
        ),

        //不定位 BDW
        'HBDW1' => array(
            'name' => '后三一码不定位',
            'pattern' => 'BDW1',
            'position' => array('2', '3', '4'),
        ),
        'ZBDW1' => array(
            'name' => '中三一码不定位',
            'pattern' => 'BDW1',
            'position' => array('1', '2', '3'),
        ),
        'QBDW1' => array(
            'name' => '前三一码不定位',
            'pattern' => 'BDW1',
            'position' => array('0', '1', '2'),
        ),
        'HBDW2' => array(
            'name' => '后三二码不定位',
            'pattern' => 'BDW2',
            'position' => array('2', '3', '4'),
        ),
        'ZBDW2' => array(
            'name' => '中三二码不定位',
            'pattern' => 'BDW2',
            'position' => array('1', '2', '3'),
        ),
        'QBDW2' => array(
            'name' => '前三二码不定位',
            'pattern' => 'BDW2',
            'position' => array('0', '1', '2'),
        ),

        'BDW41' => array(
            'name' => '四星一码不定位',
            'pattern' => 'BDW41',
            'position' => array('1', '2', '3', '4'),
        ),
        'BDW42' => array(
            'name' => '四星二码不定位',
            'pattern' => 'BDW42',
            'position' => array('1', '2', '3', '4'),
        ),
        'BDW52' => array(
            'name' => '五星二码不定位',
            'pattern' => 'BDW52',
            'position' => array('0', '1', '2', '3', '4'),
        ),
        'BDW53' => array(
            'name' => '五星三码不定位',
            'pattern' => 'BDW53',
            'position' => array('0', '1', '2', '3', '4'),
        ),


        //大小单双
        'QDXDS' => array(
            'name' => '前二大小单双',
            'pattern' => 'DXDS',
            'position' => array('0', '1'),
        ),
        'HDXDS' => array(
            'name' => '后二大小单双',
            'pattern' => 'DXDS',
            'position' => array('3', '4'),
        ),
        'QDXDS3' => array(
            'name' => '前三大小单双',
            'pattern' => 'DXDS3',
            'position' => array('0', '1', '2'),
        ),
        'ZDXDS3' => array(
            'name' => '中三大小单双',
            'pattern' => 'DXDS3',
            'position' => array('1', '2', '3'),
        ),
        'HDXDS3' => array(
            'name' => '后三大小单双',
            'pattern' => 'DXDS3',
            'position' => array('2', '3', '4'),
        ),

        //----------------------任选-----------------------
        'RZX2' => array(
            'name' => '任选二_直选复式',
            'pattern' => 'RZX2',
            'position' => array('0', '1', '2', '3', '4'),
        ),
        'RZX2_S' => array(
            'name' => '任选二_直选单式',
            'pattern' => 'RZX2_S',
            'position' => array('0', '1', '2', '3', '4'),
        ),
        'RZXHZ2' => array(
            'name' => '任选二_直选合值',
            'pattern' => 'RZXHZ2',
            'position' => array('0', '1', '2', '3', '4'),
        ),

        'RZU2' => array(
            'name' => '任选二_组选',
            'pattern' => 'RZU2',
            'position' => array('0', '1', '2', '3', '4'),
        ),

        'RZU2_S' => array(
            'name' => '任选二_组选单式',
            'pattern' => 'RZU2_S',
            'position' => array('0', '1', '2', '3', '4'),
        ),

        'RZUHZ2' => array(
            'name' => '任选二_组选和值',
            'pattern' => 'RZUHZ2',
            'position' => array('0', '1', '2', '3', '4'),
        ),

        'RZX3' => array(
            'name' => '任选三_直选',
            'pattern' => 'RZX3',
            'position' => array('0', '1', '2', '3', '4'),
        ),

        'RZX3_S' => array(
            'name' => '任选三_直选单式',
            'pattern' => 'RZX3_S',
            'position' => array('0', '1', '2', '3', '4'),
        ),

        'RZXHZ' => array(
            'name' => '任选三_直选和值',
            'pattern' => 'RZXHZ',
            'position' => array('0', '1', '2', '3', '4'),
        ),

        'RZUS' => array(
            'name' => '任选三_组三复式',
            'pattern' => 'RZUS',
            'position' => array('0', '1', '2', '3', '4'),
        ),
        'RZUS_S' => array(
            'name' => '任选三_组三单式',
            'pattern' => 'RZUS_S',
            'position' => array('0', '1', '2', '3', '4'),
        ),

        'RZUL' => array(
            'name' => '任选三_组六复式',
            'pattern' => 'RZUL',
            'position' => array('0', '1', '2', '3', '4'),
        ),
        'RZUL_S' => array(
            'name' => '任选三_组六单式',
            'pattern' => 'RZUL_S',
            'position' => array('0', '1', '2', '3', '4'),
        ),
        'RHHZX_S' => array(
            'name' => '任选三_混合',
            'pattern' => 'RHHZX_S',
            'position' => array('0', '1', '2', '3', '4'),
        ),

        'RZUHZ' => array(
            'name' => '任选三_组选和值',
            'pattern' => 'RZUHZ',
            'position' => array('0', '1', '2', '3', '4'),
        ),

        'RZX4' => array(
            'name' => '任选四_直选',
            'pattern' => 'RZX4',
            'position' => array('0', '1', '2', '3', '4'),
        ),

        'RZX4_S' => array(
            'name' => '任选四_直选',
            'pattern' => 'RZX4_S',
            'position' => array('0', '1', '2', '3', '4'),
        ),

        'RSXZU24' => array(
            'name' => '任选四_组选24',
            'pattern' => 'RSXZU24',
            'position' => array('0', '1', '2', '3', '4'),
        ),

        'RSXZU12' => array(
            'name' => '任选四_组选12',
            'pattern' => 'RSXZU12',
            'position' => array('0', '1', '2', '3', '4'),
        ),

        'RSXZU6' => array(
            'name' => '任选四_组选6',
            'pattern' => 'RSXZU6',
            'position' => array('0', '1', '2', '3', '4'),
        ),

        'RSXZU4' => array(
            'name' => '任选四_组选4',
            'pattern' => 'RSXZU4',
            'position' => array('0', '1', '2', '3', '4'),
        ),

        'RLH' => array(
            'name' => '任选龙虎和',
            'pattern' => 'RLH',
            'position' => array('0', '1', '2', '3', '4'),
        ),
    ),


    //----------------------------------------------------------------------数字型-排三排五--------------------------------------------------
    'p3p5' => array(
        'QZX3' => array(
            'name' => '排三直选复式',
            'pattern' => 'ZX3',
            'position' => array('0', '1', '2'),
        ),

        'QZX3_S' => array(
            'name' => '排三直选单式',
            'pattern' => 'ZX3_S',
            'position' => array('0', '1', '2'),
        ),

        'QZXHZ' => array(
            'name' => '排三直选和值',
            'pattern' => 'ZXHZ',
            'position' => array('0', '1', '2'),
        ),

        'QZUS' => array(
            'name' => '排三组三复式',
            'pattern' => 'ZUS',
            'position' => array('0', '1', '2'),
        ),
        'QZUS_S' => array(
            'name' => '排三组三单式',
            'pattern' => 'ZUS_S',
            'position' => array('0', '1', '2'),
        ),
        'QZUL' => array(
            'name' => '排三组六复式',
            'pattern' => 'ZUL',
            'position' => array('0', '1', '2'),
        ),
        'QZUL_S' => array(
            'name' => '排三组六单式',
            'pattern' => 'ZUL_S',
            'position' => array('0', '1', '2'),
        ),
        'QHHZX_S' => array(
            'name' => '排三混合组选',
            'pattern' => 'HHZX_S',
            'position' => array('0', '1', '2'),
        ),
        'QZUHZ' => array(
            'name' => '排三组选和值',
            'pattern' => 'ZUHZ',
            'position' => array('0', '1', '2'),
        ),


        'QZX2' => array(
            'name' => '(前二)排五直选复式',
            'pattern' => 'ZX2',
            'position' => array('0', '1'),
        ),
        'QZX2_S' => array(
            'name' => '(前二)排五直选单式',
            'pattern' => 'ZX2_S',
            'position' => array('0', '1'),
        ),

        'HZX2' => array(
            'name' => '(后二)排五直选复式',
            'pattern' => 'ZX2',
            'position' => array('3', '4'),
        ),
        'HZX2_S' => array(
            'name' => '(后二)排五直选单式',
            'pattern' => 'ZX2_S',
            'position' => array('3', '4'),
        ),

        'QZU2' => array(
            'name' => '(前二)排五组选复式',
            'pattern' => 'ZU2',
            'position' => array('0', '1'),
        ),
        'QZU2_S' => array(
            'name' => '(前二)排五组选单式',
            'pattern' => 'ZU2_S',
            'position' => array('0', '1'),
        ),

        'HZU2' => array(
            'name' => '(后二)排五组选复式',
            'pattern' => 'ZU2',
            'position' => array('3', '4'),
        ),
        'HZU2_S' => array(
            'name' => '(后二)排五组选单式',
            'pattern' => 'ZU2_S',
            'position' => array('3', '4'),
        ),


        //定位胆 DWD
        'DWD' => array(
            'name' => '定位胆',
            'pattern' => 'DWD',
            'position' => array('0', '1', '2', '3', '4'),
        ),

        //不定位 BDW
        'QBDW1' => array(
            'name' => '一码不定位',
            'pattern' => 'BDW1',
            'position' => array('0', '1', '2'),
        ),

        'QBDW2' => array(
            'name' => '二码不定位',
            'pattern' => 'BDW2',
            'position' => array('0', '1', '2'),
        ),

        'QDXDS' => array(
            'name' => '前二大小单双',
            'pattern' => 'DXDS',
            'position' => array('0', '1'),
        ),
        'HDXDS' => array(
            'name' => '后二大小单双',
            'pattern' => 'DXDS',
            'position' => array('3', '4'),
        ),
    ),


    //---------------------------------------------------------------------------数字型-3位--------------------------------------------------
    'digital3' => array(
        'ZX3' => array(
            'name' => '直选复式',
            'pattern' => 'ZX3',
            'position' => array('2', '3', '4'),
        ),
        'ZX3_S' => array(
            'name' => '直选单式',
            'pattern' => 'ZX3_S',
            'position' => array('2', '3', '4'),
        ),
        'ZH3' => array(
            'name' => '直选组合',
            'pattern' => 'ZH3',
            'position' => array('2', '3', '4'),
        ),
        'ZXHZ' => array(
            'name' => '直选和值',
            'pattern' => 'ZXHZ',
            'position' => array('2', '3', '4'),
        ),
        'ZXKD' => array(
            'name' => '直选跨度',
            'pattern' => 'ZXKD',
            'position' => array('2', '3', '4'),
        ),

        'ZUS' => array(
            'name' => '组三',
            'pattern' => 'ZUS',
            'position' => array('2', '3', '4'),
        ),
        'ZUS_S' => array(
            'name' => '组三单式',
            'pattern' => 'ZUS_S',
            'position' => array('2', '3', '4'),
        ),

        'ZUL' => array(
            'name' => '组六',
            'pattern' => 'ZUL',
            'position' => array('2', '3', '4'),
        ),

        'ZUL_S' => array(
            'name' => '组六单式',
            'pattern' => 'ZUL_S',
            'position' => array('2', '3', '4'),
        ),

        'HHZX_S' => array(
            'name' => '混合组选',
            'pattern' => 'HHZX_S',
            'position' => array('2', '3', '4'),
        ),

        'ZUHZ' => array(
            'name' => '组选和值',
            'pattern' => 'ZUHZ',
            'position' => array('2', '3', '4'),
        ),

        'ZU3BD' => array(
            'name' => '组选包胆',
            'pattern' => 'ZU3BD',
            'position' => array('2', '3', '4'),
        ),

        'QZX2' => array(
            'name' => '前二直选复式',
            'pattern' => 'ZX2',
            'position' => array('2', '3'),
        ),

        'QZX2_S' => array(
            'name' => '前二直选单式',
            'pattern' => 'ZX2_S',
            'position' => array('2', '3'),
        ),

        'HZX2' => array(
            'name' => '后二直选复式',
            'pattern' => 'ZX2',
            'position' => array('3', '4'),
        ),
        'HZX2_S' => array(
            'name' => '后二直选单式',
            'pattern' => 'ZX2_S',
            'position' => array('3', '4'),
        ),

        'HZU2' => array(
            'name' => '后二组选',
            'pattern' => 'ZU2',
            'position' => array('3', '4'),
        ),
        'HZU2_S' => array(
            'name' => '后二组选单式',
            'pattern' => 'ZU2_S',
            'position' => array('3', '4'),
        ),
        'QZU2' => array(
            'name' => '前二组选',
            'pattern' => 'ZU2',
            'position' => array('2', '3'),
        ),
        'QZU2_S' => array(
            'name' => '前二组选单式',
            'pattern' => 'ZU2_S',
            'position' => array('2', '3'),
        ),

        //定位胆 DWD
        'DWD' => array(
            'name' => '定位胆',
            'pattern' => 'DWD',
            'position' => array('2', '3', '4'),
        ),

        'BDW1' => array(
            'name' => '一码不定位',
            'pattern' => 'BDW1',
            'position' => array('2', '3', '4'),
        ),


        'BDW2' => array(
            'name' => '二码不定位',
            'pattern' => 'BDW2',
            'position' => array('2', '3', '4'),
        ),

        'QDXDS' => array(
            'name' => '前二大小单双',
            'pattern' => 'DXDS',
            'position' => array('2', '3'),
        ),
        'HDXDS' => array(
            'name' => '后二大小单双',
            'pattern' => 'DXDS',
            'position' => array('3', '4'),
        ),
    ),

    //---------------------------------------------------------------------------乐透型--------------------------------------------------
    'lotto' => array(
        //3位
        'LTZX3' => array(
            'name' => '前三直选复式',
            'pattern' => 'LTZX3',
            'position' => array('0', '1', '2'),
        ),
        'LTZX3_S' => array(
            'name' => '前三直选单式',
            'pattern' => 'LTZX3_S',
            'position' => array('0', '1', '2'),
        ),
        'LTZU3' => array(
            'name' => '前三组选复式',
            'pattern' => 'LTZU3',
            'position' => array('0', '1', '2'),
        ),
        'LTZU3_S' => array(
            'name' => '前三组选单式',
            'pattern' => 'LTZU3_S',
            'position' => array('0', '1', '2'),
        ),
        'LTDTZU3' => array(
            'name' => '前三组选胆拖',
            'pattern' => 'LTDTZU3',
            'position' => array('0', '1', '2'),
        ),
        //2位
        'LTZX2' => array(
            'name' => '前二直选复式',
            'pattern' => 'LTZX2',
            'position' => array('0', '1'),
        ),
        'LTZX2_S' => array(
            'name' => '前二直选单式',
            'pattern' => 'LTZX2_S',
            'position' => array('0', '1'),
        ),
        'LTZU2' => array(
            'name' => '前二组选复式',
            'pattern' => 'LTZU2',
            'position' => array('0', '1'),
        ),
        'LTZU2_S' => array(
            'name' => '前二组选单式',
            'pattern' => 'LTZU2_S',
            'position' => array('0', '1'),
        ),

        'LTDTZU2' => array(
            'name' => '前二组选胆拖',
            'pattern' => 'LTDTZU2',
            'position' => array('0', '1'),
        ),

        //不定位
        'LTBDW' => array(
            'name' => '不定位',
            'pattern' => 'LTBDW',
            'position' => array('0', '1', '2'),
        ),

        //定位胆
        'LTDWD' => array(
            'name' => '定位胆',
            'pattern' => 'LTDWD',
            'position' => array('0', '1', '2'),
        ),

        //趣味
        //定单双
        'LTDDS' => array(
            'name' => '定单双',
            'pattern' => 'LTDDS',
            'position' => array('0', '1', '2', '3', '4'),
        ),
        //猜中位
        'LTCZW' => array(
            'name' => '猜中位',
            'pattern' => 'LTCZW',
            'position' => array('0', '1', '2', '3', '4'),
        ),

        //任选
        'LTRX1' => array(
            'name' => '任选一中一',
            'pattern' => 'LTRX1',
            'position' => array('0', '1', '2', '3', '4'),
        ),
        'LTRX2' => array(
            'name' => '任选二中二',
            'pattern' => 'LTRX2',
            'position' => array('0', '1', '2', '3', '4'),
        ),
        'LTRX3' => array(
            'name' => '任选三中三',
            'pattern' => 'LTRX3',
            'position' => array('0', '1', '2', '3', '4'),
        ),
        'LTRX4' => array(
            'name' => '任选四中四',
            'pattern' => 'LTRX4',
            'position' => array('0', '1', '2', '3', '4'),
        ),
        'LTRX5' => array(
            'name' => '任选五中五',
            'pattern' => 'LTRX5',
            'position' => array('0', '1', '2', '3', '4'),
        ),
        'LTRX6' => array(
            'name' => '任选六中五',
            'pattern' => 'LTRX6',
            'position' => array('0', '1', '2', '3', '4'),
        ),
        'LTRX7' => array(
            'name' => '任选七中五',
            'pattern' => 'LTRX7',
            'position' => array('0', '1', '2', '3', '4'),
        ),
        'LTRX8' => array(
            'name' => '任选八中五',
            'pattern' => 'LTRX8',
            'position' => array('0', '1', '2', '3', '4'),
        ),

        'LTRX1_S' => array(
            'name' => '任选一中一',
            'pattern' => 'LTRX1_S',
            'position' => array('0', '1', '2', '3', '4'),
        ),
        'LTRX2_S' => array(
            'name' => '任选二中二',
            'pattern' => 'LTRX2_S',
            'position' => array('0', '1', '2', '3', '4'),
        ),
        'LTRX3_S' => array(
            'name' => '任选三中三',
            'pattern' => 'LTRX3_S',
            'position' => array('0', '1', '2', '3', '4'),
        ),
        'LTRX4_S' => array(
            'name' => '任选四中四',
            'pattern' => 'LTRX4_S',
            'position' => array('0', '1', '2', '3', '4'),
        ),
        'LTRX5_S' => array(
            'name' => '任选五中五',
            'pattern' => 'LTRX5_S',
            'position' => array('0', '1', '2', '3', '4'),
        ),
        'LTRX6_S' => array(
            'name' => '任选六中五',
            'pattern' => 'LTRX6_S',
            'position' => array('0', '1', '2', '3', '4'),
        ),
        'LTRX7_S' => array(
            'name' => '任选七中五',
            'pattern' => 'LTRX7_S',
            'position' => array('0', '1', '2', '3', '4'),
        ),
        'LTRX8_S' => array(
            'name' => '任选八中五',
            'pattern' => 'LTRX8_S',
            'position' => array('0', '1', '2', '3', '4'),
        ),


        'LTRXDT2' => array(
            'name' => '任选胆托二中二',
            'pattern' => 'LTRXDT2',
            'position' => array('0', '1', '2', '3', '4'),
        ),
        'LTRXDT3' => array(
            'name' => '任选胆托三中三',
            'pattern' => 'LTRXDT3',
            'position' => array('0', '1', '2', '3', '4'),
        ),
        'LTRXDT4' => array(
            'name' => '任选胆托四中四',
            'pattern' => 'LTRXDT4',
            'position' => array('0', '1', '2', '3', '4'),
        ),
        'LTRXDT5' => array(
            'name' => '任选胆托五中五',
            'pattern' => 'LTRXDT5',
            'position' => array('0', '1', '2', '3', '4'),
        ),
        'LTRXDT6' => array(
            'name' => '任选胆托六中五',
            'pattern' => 'LTRXDT6',
            'position' => array('0', '1', '2', '3', '4'),
        ),
        'LTRXDT7' => array(
            'name' => '任选胆托七中五',
            'pattern' => 'LTRXDT7',
            'position' => array('0', '1', '2', '3', '4'),
        ),
        'LTRXDT8' => array(
            'name' => '任选胆托八中五',
            'pattern' => 'LTRXDT8',
            'position' => array('0', '1', '2', '3', '4'),
        ),

    ),

    //-------------------------------------------------------------------------快三型-3位 [1-6]--------------------------------------------------
    'ks' => array(
        //三同号通选
        'STHTX' => array(
            'name' => '三同号通选',
            'pattern' => 'STHTX',
            'position' => array('0', '1', '2'),
        ),
        //快三和值
        'KSHZ' => array(
            'name' => '快三和值',
            'pattern' => 'KSHZ',
            'position' => array('0', '1', '2'),
        ),
        //三同号单选
        'STHDX' => array(
            'name' => '三同号单选',
            'pattern' => 'STHDX',
            'position' => array('0', '1', '2'),
        ),
        //二同号复选
        'ETHFX' => array(
            'name' => '二同号复选',
            'pattern' => 'ETHFX',
            'position' => array('0', '1', '2'),
        ),
        //二同号单选
        'ETHDX' => array(
            'name' => '二同号单选',
            'pattern' => 'ETHDX',
            'position' => array('0', '1', '2'),
        ),
        //二同号单选
        'ETHDX_S' => array(
            'name' => '二同号单选',
            'pattern' => 'ETHDX_S',
            'position' => array('0', '1', '2'),
        ),
        //三不同号
        'SBTH' => array(
            'name' => '三不同号',
            'pattern' => 'SBTH',
            'position' => array('0', '1', '2'),
        ),
        //三不同号单式
        'SBTH_S' => array(
            'name' => '三不同号单式',
            'pattern' => 'SBTH_S',
            'position' => array('0', '1', '2'),
        ),
        //三不同号胆拖
        'SBTHDT' => array(
            'name' => '三不同号胆拖',
            'pattern' => 'SBTHDT',
            'position' => array('0', '1', '2'),
        ),
        //三不同号和值
        'SBTHHZ' => array(
            'name' => '三不同号和值',
            'pattern' => 'SBTHHZ',
            'position' => array('0', '1', '2'),
        ),
        //二不同号
        'EBTH' => array(
            'name' => '二不同号',
            'pattern' => 'EBTH',
            'position' => array('0', '1', '2'),
        ),
        //二不同号
        'EBTH_S' => array(
            'name' => '二不同号',
            'pattern' => 'EBTH_S',
            'position' => array('0', '1', '2'),
        ),
        //二不同号胆拖
        'EBTHDT' => array(
            'name' => '二不同号胆拖',
            'pattern' => 'EBTHDT',
            'position' => array('0', '1', '2'),
        ),
        //三连号通选
        'SLTHTX' => array(
            'name' => '三连号通选',
            'pattern' => 'SLTHTX',
            'position' => array('0', '1', '2'),
        ),
    ),

    //-------------------------------------------------------------------------PK10--------------------------------------------------
    'pk10' => array(
        'PK10_QZX1' => array(
            'name' => '猜冠军_直选复式',
            'pattern' => 'PK10_ZX1',
            'position' => array('0'),
        ),
        'PK10_QZX2' => array(
            'name' => '猜前二_直选复式',
            'pattern' => 'PK10_ZX2',
            'position' => array('0', '1'),
        ),
        'PK10_QZX2_S' => array(
            'name' => '猜前二_直选单式',
            'pattern' => 'PK10_ZX2_S',
            'position' => array('0', '1'),
        ),
        'PK10_QZX3' => array(
            'name' => '猜前三_直选复式',
            'pattern' => 'PK10_ZX3',
            'position' => array('0', '1', '2'),
        ),
        'PK10_QZX3_S' => array(
            'name' => '猜前三_直选单式',
            'pattern' => 'PK10_ZX3_S',
            'position' => array('0', '1', '2'),
        ),
        'PK10_DWD' => array(
            'name' => '定位胆',
            'pattern' => 'PK10_DWD',
            'position' => array('0', '1', '2', '3', '4'),
        ),
    ),
);