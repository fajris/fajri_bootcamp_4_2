<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Student;

class StudentController extends Controller
{
    function AddStudent(Request $req){
        DB::beginTransaction();
        try{
            $this->validate($req, [
                'name' => 'required',
                'nim' => 'required',
                'address' => 'required',
                'phone' => 'required',
                'email' => 'required|email'
            ]);

            $student = new Student;
            $student->name = $req->input('name');
            $student->nim = $req->input('nim');
            $student->address = $req->input('address');
            $student->phone = $req->input('phone');
            $student->email = $req->input('email');
            $student->save();

            DB::commit();
            return response()->json(['message'=>'Success'], 201);
        }
        catch(\Exception $e){
            DB::rollback();
            return response()->json(['message'=>'Failed to add, exception:' + $e], 500);
        }
    }

    function UpdateStudent(Request $req){
        // proses update:
        // 1. data eksisting dari database dikirim dari back end ke front end
        // 2. seluruh data akan muncul di front end
        // 3. penggantian sebagian/seluruh data di front end
        // 4. front end akan mengirim kembali seluruh data ke back end
        // 5. back end akan update data ke database berdasarkan id
        DB::beginTransaction();
        try{
            $this->validate($req, [
                'id' => 'required',
                'name' => 'required',
                'nim' => 'required',
                'address' => 'required',
                'phone' => 'required',
                'email' => 'required|email'
            ]);

            DB::table('students')
            ->where('id', $req->input('id'))
            ->update(['name' => $req->input('name'), 'nim' => $req->input('nim'), 'address' => $req->input('address'), 'phone' => $req->input('phone'), 'email' => $req->input('email') ]);

            DB::commit();
            return response()->json(['message'=>'Success'], 201);
        }
        catch(\Exception $e){
            DB::rollback();
            return response()->json(['message'=>'Failed to add, exception:' + $e], 500);
        }
    }
}
