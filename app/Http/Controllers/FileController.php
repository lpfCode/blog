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
//        echo "$request->all()";
        $id = $request->get('id');
        $file = File::find($id);
        print_r($_FILES);
        $file->name = $_FILES[0];
        $file->save();
        return response()->json($_FILES['name'].上传成功);
    }
    public function fileUp(Request $request){

        $file=[
            'stId' => $request->input('id'),
            'name' => $request->file('img')->getFilename()
        ];
        FileService::getInstance()->saveByArr($file);
    }
}