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

//        $filename = $request->input('img');
        $img=[
            'stId' => $request->input('id'),
            'name' => $request->file('img')->getFilename()
//            'path' => $request->file('img')->getPath()
        ];
        var_dump($img);
        dd($img);
        FileService::getInstance()->saveByArr($img);
    }
    public function fileUp(Request $request){

        $file=[
            'stId' => $request->input('id'),
            'name' => $request->file('img')->getFilename()
        ];
        FileService::getInstance()->saveByArr($file);
    }
}