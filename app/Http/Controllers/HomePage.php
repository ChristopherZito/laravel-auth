<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
class HomePage extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function apiGetEmps()
    {

        $emps = Employee::all();
       return json_encode($emps);
    }

    public function apiDelEmp($id)
    {

        try{
            $emp = Employee::find($id);
            $emp -> delete();
            return true;
        }catch(Exception $e){}
        
        return false;
    }
}
