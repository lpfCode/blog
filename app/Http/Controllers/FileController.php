<?php
/**
 * Created by PhpStorm.
 * User: yonghu
 * Date: 2017/11/27
 * Time: 下午7:47
 */

namespace App\Http\Controllers;


use App\Service\FileService;
use Illuminate\Http\Request;

class FileController extends Controller {

    public function imgAdd(Request $request){

        echo "$request->getContent()";
//        $img=[
//            'stId' => $request->input('id'),
//            'name' => $request->file('img')->getFilename()
////            'path' => $request->file('img')->getPath()
//        ];
//        $img=[
//            'stId' => 1,
//            'name' => 'ss',
//            'path' => 'de'
//        ];
//        FileService::getInstance()->saveByArr($img);
        dd(1);
        var_dump("ssssssss");
        return 1;
    }
    public function fileUp(Request $request){

        $file=[
            'stId' => $request->input('id'),
            'name' => $request->file('img')->getFilename()
        ];
        FileService::getInstance()->saveByArr($file);
    }
}