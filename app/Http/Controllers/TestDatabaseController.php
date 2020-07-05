<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class TestDatabaseController extends Controller
{
    public function TestDatabaseConnection(){
        try {
            $database_host = DB::get('DB.database_host');
            $database_name = DB::get('DB.database_name');
            $database_user = DB::get('DB.database_user');
            $database_password = DB::get('DB.database_password');
    
            $connection = mysqli_connect($database_host,$database_user,$database_password,$database_name);
    
            if (mysqli_connect_errno()){
                    return false;
                } else {
                    return true;
                }
    
        } catch (Exception $e) {
    
            return false;
    
        }
    }
}
