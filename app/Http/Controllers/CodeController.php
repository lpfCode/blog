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
        $this->_country  = $UK;
        $this->_coun = $coun;
        $this->_UK = $UK;
    }

    public function index(){

        return view('code.index');
    }
    public function MuliArray(){
        $num = $this->array_depth($this->_country);
        if($num==2){
            $res = $this->arrayOneSearchKey($this->_country);
        }elseif ($num ==1){
            $res = $this->arrayTwoSearchKey($this->_country);
        }else{
            $res = $this->arrayThreeSearchKey($this->_country);
        }
        return $res;
    }
    private static function arrayOneSearchKey($array){

        if(array_search('90',$array)!=null){
            return array_search('90',$array);
        }else{
            return false;
        }
    }
    private static function arrayTwoSearchKey($array){

        $data = array_keys($array);
        $legth = count($data);
        for($i=0;$i<$legth;$i++){
            if(array_search('90',$array[$data[$i]])!=null){
                return $data[$i];
            }else{
                return false;
            }
        }
    }
    private static function arrayThreeSearchKey($array){

        $data = array_keys($array);
        print_r($data);
        for($i=0;$i<count($data);$i++){
            $da = array_keys($array[$data[$i]]);
            print_r($da);
            for($j=0;$j<count($da);$j++){
                if(array_search('90',$array[$data[$i]][$da[$j]])!=null){
                    return $data[$i];
                }else{
                    return -1;
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