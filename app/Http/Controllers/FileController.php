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
        $stId = $request->get('id');
//        print_r($_FILES);//打印出上传的data数组
        $path = '/project/blog/public/uploads/'.time().'.jpeg';
        if(empty($_FILES['img0']['tmp_name'])){
            return response()->json('图片不能为空');
        }elseif(move_uploaded_file($_FILES['img0']['tmp_name'],$path)){
            echo "$stId";
            $file = FileService::getInstance()->findByStId($stId);
            echo "$file";
            $input = [
                'img' => $_FILES['img0']['name'],
                'imgType' => $path
            ];
            $file->update($input);
            return response()->json(array(
                'pathinfo'=>$path,
                'img' => $_FILES['img0']['name'],
                'msg' => 'ok'
            ));
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