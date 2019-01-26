<?php

namespace App\Http\Controllers;
use DB;
use App\Http\Requests;
use Session;
session_start();
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    //
    public function logout()
    {
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        \Illuminate\Support\Facades\Redirect::to('/admin');
    }
}
