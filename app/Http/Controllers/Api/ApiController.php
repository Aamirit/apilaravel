<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;

class ApiController extends Controller
{
    public function createEmployee(Request $req){
        //validation
        $req->validate([
            "name"=>"required",
            "email"=>"required|unique:employees",
            "age"=>"required",
            "phone_no"=>"required",
            "gender"=>"required",
        ]

        );
        //create data
        $employee = new Employee();
        $employee->name = $req->name;
        $employee->email = $req->email;
        $employee->age = $req->age;
        $employee->phone_no = $req->phone_no;
        $employee->gender = $req->gender;

        $employee->save();

        return response()->json([
            "status"=>1,
            "message"=>"Employee Created successfully"
        ]);

        //second method  or get form values in an array
        // Employee::create([
        //     "name"=> $req->name,
        // ]);
        

        //send response
    }

    public function listEmployee(){
        $employee = Employee::get();



        return response()->json([
            "status"=>1,
            "message"=>"Employee listed successfully",
            "data"=> $employee
        ],200);
        // print_r($employee);
    }

    public function sigleEmployee($id){
        if(Employee::where("id",$id)->exists()){

            $employee_details = Employee::where("id",$id)->first();
            return response()->json([
                "status"=>1,
                "message"=>"Employee listed successfully",
                "data"=> $employee_details 
                
            ],200);
        }
        else{
            return response()->json([
                "status"=>0,
                "message"=>"Employee not listed ",
                
            ],404);
        }
        
    }

    public function updateEmployee(Request $req, $id){
        if(Employee::where("id",$id)->exists()){
            $employee = Employee::find($id);
            $employee->name = !empty($req->name) ? $req->name : $employee->name;
        $employee->email = !empty($req->email) ? $req->email : $employee->email;
        $employee->age = !empty($req->age) ? $req->age : $employee->age;
        $employee->phone_no = !empty($req->phone_no) ? $req->phone_no : $employee->phone_no;
        $employee->gender = !empty($req->gender) ? $req->gender : $employee->gender;

        $employee->save();
            return response()->json([
                "status"=>1,
                "message"=>"Employee updatw successfully",
               
                
            ],200);
        }
        else{
            return response()->json([
                "status"=>0,
                "message"=>"Employee not listed ",
                
            ],404);
        }
        
    }

    public function deleteEmployee($id){
        if(Employee::where("id",$id)->exists()){
            $employee = Employee::find($id);

            $employee->delete();
           
            return response()->json([
                "status"=>1,
                "message"=>"Employee deleted successfully",
                
                
            ],200);
        }
        else{
            return response()->json([
                "status"=>0,
                "message"=>"Employee not listed ",
                
            ],404);
        }
    }
}
