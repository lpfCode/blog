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

    public function index(){

        return view('code.index');
    }
    public function MuliArray(){

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
        $num = $this->array_depth($country);
        echo "$num";
        return $num;
    }
    private static function array_depth($array){

        echo "hello!";

        if(!is_array($array)) return 0;
        $max_depth = 1;
        foreach ($array as $value) {
            if (is_array($value)) {
                $depth = array_depth($value) + 1;

                if ($depth > $max_depth) {
                    $max_depth = $depth;
                }
            }
        }
        return $max_depth;
    }

}