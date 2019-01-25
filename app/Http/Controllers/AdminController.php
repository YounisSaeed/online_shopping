<?php

namespace App\Http\Controllers;
use DB;
use App\Http\Requests;
use Session;
session_start();
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin_login');
    }
    public function show_dashboard()
    {
        return view('admin.dashboard');
    }
    public function dashboard(Request $request)
    {
        $admin_email=$request->admin_email;
        $admin_password=md5($request->admin_password);
        $result=DB::table('tbl_admin')
                ->where('admin_email',$admin_email)
                ->where('admin_password',$admin_password)
                ->first();
                if($result)
                {
                        session::put('admin_name',$result->admin_name);
                        session::put('admin_id',$result->admin_id);

                    return  \Illuminate\Support\Facades\Redirect::to('/dashboard');
                }else{                    
                        session::put('messege','Email or password invaild ');
                    
                    return \Illuminate\Support\Facades\Redirect::to('/admin'); 
                }
    }
}
