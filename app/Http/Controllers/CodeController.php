<?php
/**
 * Created by PhpStorm.
 * User: yonghu
 * Date: 2017/12/7
 * Time: 上午11:57
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class CodeController extends Controller {

    public function __construct(){

        $country = [

            'CHINA'=> [

                'hebei'=>'shijianzhuang',
                'hubei'=>'wuhan',
                'gansu'=>'lanzhou'
            ],
            'USA'=>[
                'jiazhou'=>'ss',
                'ji'=>'23',
                'io'=>'90'
            ]
        ];
        $coun = [

            'CHINA' => '90',
            'USA' => '900'
        ];
        $UK = [

            'CHINA'=> [

                'hebei'=>[

                    'shijiazhuang' => 'zhengding',
                    'cangzhou'     => 'yanshan',
                    'xingtai'      => 'pingxiang'
                ],
                'hubei'=>[

                    'huanggang' => 'longgan',
                    'ssss'      => 'ww',
                    'aaaa'      => 'lll'
                ]
            ],
            'UK'=>[
                'hebei'=>[

                    'shijiazhuang' => 'zhengding',
                    'cangzhou'     => 'yanshan',
                    'xingtai'      => 'pingxiang'
                ],
                'hubei'=>[

                    'huanggang' => 'longgan',
                    'ssss'      => 'ww',
                    'aaaa'      => '90'
                ]
            ]
        ];
        //$this->MuliArray($country);
        //$this->MuliArray($coun);
//        $this->MuliArray($UK);
    }

    public function index(){

        return view('code.index');
    }
    public function MuliArray(){
        $array = [

            'CHINA'=> [

                'hebei'=>[

                    'shijiazhuang' => 'zhengding',
                    'cangzhou'     => 'yanshan',
                    'xingtai'      => 'pingxiang'
                ],
                'hubei'=>[

                    'huanggang' => 'longgan',
                    'ssss'      => 'ww',
                    'aaaa'      => 'lll'
                ]
            ],
            'UK'=>[
                'hebei'=>[

                    'shijiazhuang' => 'zhengding',
                    'cangzhou'     => 'yanshan',
                    'xingtai'      => 'pingxiang'
                ],
                'hubei'=>[

                    'huanggang' => 'longgan',
                    'ssss'      => 'ww',
                    'aaaa'      => '90'
                ]
            ]
        ];

        $num = $this->array_depth($array);
        if($num==2){
            $res = $this->arrayOneSearchKey($array);
        }elseif ($num ==1){
            $res = $this->arrayTwoSearchKey($array);
        }else{
            $res = $this->arrayThreeSearchKey($array);
        }
        return $res;
    }
    private static function arrayOneSearchKey($array){

        return array_search('90',$array);
    }
    private static function arrayTwoSearchKey($array){

        $data = array_keys($array);
        $legth = count($data);
        for($i=0;$i<$legth;$i++){
            if(array_search('90',$array[$data[$i]])){
                return $i;
            }else{
                return false;
            }
        }
    }
    private static function arrayThreeSearchKey($array){

        $data = array_keys($array);
        for($i=0;$i<count($data);$i++){
            $da = array_keys($array[$data[$i]]);
            for($j=0;$j<count($da);$j++){
                if(array_search('90',$array[$data[$da[$j]]])){
                    return $i;
                }else{
                    return false;
                }
            }
        }
    }
    private static function array_depth($array){


        if(!is_array($array)) return 0;
        $max_depth = 1;
        foreach ($array as $value) {
            if (is_array($value)) {
                $depth = Self::array_depth($value) + 1;
                if ($depth > $max_depth) {
                    $max_depth = $depth;
                }
            }
        }
        return $max_depth;
    }

}