<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NvhAccountController extends Controller
{
    //
    public function index() {
        return "<h1>Welcome to ,Nong Van Hung - Controller </h1>";
    }

    public function nvhcreate()
    {
        return view('nvh-account-create');
    }

    //action
    public function nvhshowData()
    {
        $data = array('12333333','Nong Van Hung');
        return view('nvh-account-showData',['data'=>$data]);
    }

    public function nvhlist()
    {
        $data =array(
            ["id"=>1,"UserName"=>"nvh","password"=>"13333","FullName"=>"Nong Van Hung"]
        
        );
        
        return view('nvh-account-list',['list'=>$data]);


    }


    // 
    public function nvhGetAll()
    {
        $model = DB::table('nvh')->get();
        return view('nvh-account-all',['model'=>$model]);
    }
}
