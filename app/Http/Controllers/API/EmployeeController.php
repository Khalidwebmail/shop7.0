<?php

namespace App\Http\Controllers\API;

use App\Employee;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Employee::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request, Employee $employee)
    {
        $data = $request->all();
        $employee->create($data);

        return response()->json(["message" => "Employee created"], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  object  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return $employee;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, $id)
    {
        $employee = Employee::findOrFail($id);
        $img_path = 'assets/images/employee/'.$employee->photo;
        if(isset($img_path)){
            @unlink($img_path);
        }
        if($request->photo)
        {
            $position = strpos($request->photo, ';');
            $sub = substr($request->photo, 0, $position);
            $ext = explode("/", $sub)[1];

            $name = sha1(rand()).".".$ext;
            $img = \Image::make($request->photo)->resize(240, 200);
            $uplaod_path = 'assets/images/employee/';

            $img_url = $uplaod_path.$name;
            $img->save($img_url);
            $data = $request->all();
            $employee->update($data);

            return response()->json(["message" => "Employee updated"], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $img_path = 'assets/images/employee/'.$employee->photo;
        if(isset($img_path)){
            @unlink($img_path);
        }
        $employee->delete();
        return response()->json(["message" => "Data deleted"], 200);
    }
}
