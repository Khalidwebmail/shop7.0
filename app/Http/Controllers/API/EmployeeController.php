<?php

namespace App\Http\Controllers\API;

use App\Employee;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emp = Employee::all();
        return response()->json($emp);
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
        if($request->hasFile("photo"))
        {
            $image = $request->file("image");
            if(isset($image)){
                $position = strpos($request->photo,';'); //data:image/jpeg;base64
                $sub = substr($request->photo, 0); //data:image/jpeg
                $ext = explode('/', $sub)[1];
                $name = sha1(rand()).".".$ext;
                $img = \Image::make($request->photo)->resize(240, 200);
                $upload_path = "backend/employee/";
                $img_url = $upload_path.$name;
            }
        }
        Employee::create($data);
        return response()->json(["message" => "Employee created"], 201);
        // if($data['photo']){
        //     $position = strpos($request->photo,';'); //data:image/jpeg;base64
        //     $sub = substr($request->photo, 0); //data:image/jpeg
        //     $ext = explode('/', $sub)[1];
        //     $name = time().".".$ext;
        //     $img = Image::make($request->photo)->resize(240, 200);
        //     $upload_path = "backend/employee/";
        //     $img_url = $upload_path.$name;
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
