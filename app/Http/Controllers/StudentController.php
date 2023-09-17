<?php

namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
 use Illuminate\Support\Facades\Hash;
 use Illuminate\Support\Facades\DB;
 use Illuminate\Support\Facades\Auth;
 use Illuminate\Support\Str;
 use App\Models\User;
use Exception;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function addstudent(){
        return view('students.addstudent');
    }
    public function viewStudent(){
        $student = DB::table('student_list')->get();
        return view('students.viewstudent', compact('student'));
    }

    public function saveStudent(Request $request): JsonResponse{
        try {
            $response = [
                "status" => False,
                "msg" => "Something is wrong",
                "result" => []
            ];
            $validate =  Validator::make($request->all(), [
                'student_ID'=> ['required', 'integer'],
                "firstname" => ['required', 'string', 'max:255', 'min:3'],
                "lastname" => ['required','string', 'max:255', 'min:3'],
                "college_name" => ['required','string', 'max:255', 'min:3'],
                "phone_number" => ['required','integer'],
                "email_address" => ['required','string', 'max:255', 'min:3'],
                "address" => ['required','string', 'max:255', 'min:3'],
                'featured_image' => ['nullable', 'image'],
            ]);
            // dd($validate);

            if ($validate->fails()) {
                $response['result'] = $validate->errors()->toArray();
                throw new Exception("Form Validaton Error");
            }
            $featured_image = "";
            if ($request->File('featured_image')) {
                $file = $request->File('featured_image');
                $extension = $file->getClientOriginalName();
                $filename = time() . '.' . $extension;
                $featured_image = 'uploads/students/' . $filename;
                $file->move('uploads/students/', $featured_image);
            }
            
            DB::table('student_list')->where('id',$request->id)->get([
                'student_id' => $request->student_ID,
                'first_name' => $request->firstname,
                'last_name' => $request->lastname,
                'college_name' => $request->college_name,
                'phone_number' => $request->phone_number,
                'email_address' => $request->email_address,
                'address' => $request->address,
                'featured_image' => $filename,
            ]);
            $response['status'] = True;
            $response['msg'] = "Student data save Successfully";
        } catch (Exception $e) {
            DB::rollBack();
            $response['msg'] = $e->getMessage();
        }
        return response()->json($response);

    }


    public function updateStudent(Request $request): JsonResponse

    {
        try {
            $response = [
                "status" => False,
                "msg" => "Something is wrong",
                "result" => []
            ];
            $validate =  Validator::make($request->all(), [
                'student_ID'=> ['required', 'integer'],
                "firstname" => ['required', 'string', 'max:255', 'min:3'],
                "lastname" => ['required'],
                "college_name" => ['required'],
                "phone_number" => ['required'],
                "email_address" => ['required'],
                "address" => ['required'],
                'featured_image' => ['nullable', 'image'],
            ]);
            // dd($validate);

            if ($validate->fails()) {
                $response['result'] = $validate->errors()->toArray();
                throw new Exception("Form Validaton Error");
            }
            $filename = "";
            if ($request->File('featured_image')) {
                $file = $request->File('featured_image');
                $extension = $file->getClientOriginalName();
                $ext = time() . '.' . $extension;
                $featured_image = 'uploads/students/' . $ext;
                $file->move('uploads/students/', $filename);
            }
            
            DB::table('student_list')->where('id',$request->id)->update([
                'student_id' => $request->student_ID,
                'first_name' => $request->firstname,
                'last_name' => $request->lastname,
                'college_name' => $request->college_name,
                'phone_number' => $request->phone_number,
                'email_address' => $request->email_address,
                'address' => $request->address,
                'featured_image' => $filename,
            ]);
            $response['status'] = True;
            $response['msg'] = "Student data updated Successfully";
        } catch (Exception $e) {
            DB::rollBack();
            $response['msg'] = $e->getMessage();
        }
        return response()->json($response);
    }

    public function editStudent($id){
        $editStudent = DB::table('student_list')
        ->where('id',$id)
        ->first();
        // dd($editStudent);
        return view('students.editStudent', compact('editStudent'));
    }

    public function deleteStudent(Request $request): JsonResponse
    {

        $response = [
            'status' => False,
            "msg" => "Something went wrong!",
            "result" => []
        ];

        try {
            DB::table('student_list')->where('id', $request->student_id)->delete();

            $response['status'] = True;
            $response['msg'] = " Student Data deleted  successfully";
        } catch (Exception $e) {
            $response['msg'] = $e->getMessage();
        }

        return response()->json($response);
    }
}
