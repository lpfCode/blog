<?php
/**
 * Created by PhpStorm.
 * User: yonghu
 * Date: 2017/11/22
 * Time: 下午3:18
 */

namespace App\Http\Controllers;


class DbController extends Controller {

    public function index(){

        return view('db.show');
    }
}