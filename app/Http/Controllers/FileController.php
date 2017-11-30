<?php
/**
 * Created by PhpStorm.
 * User: yonghu
 * Date: 2017/11/27
 * Time: 下午7:47
 */

namespace App\Http\Controllers;


use App\Models\File;
use App\Service\FileService;
use Illuminate\Http\Request;

class FileController extends Controller {

    public function imgAdd(Request $request){
        $id = $request->get('id');
//        print_r($_FILES);//打印出上传的data数组
        if(empty($_FILES['img0']['tmp_name'])){
            return response()->json('图片不能为空');
        }else{
            $path = "upload";
//            $_FILES['img0']->move($path,$_FILES['img0']['tmp_name']);
            $arr=[
                'stId' => $id,
                'img' => $_FILES['img0']['name'],
                'imgType'=> $path.$_FILES['img0']['name']
            ];
            FileService::getInstance()->saveByArr($arr);
            return response()->json(arr['img']);
        }
    }
    public function fileUp(Request $request){

        $file=[
            'stId' => $request->input('id'),
            'name' => $request->file('img')->getFilename()
        ];
        FileService::getInstance()->saveByArr($file);
    }
}