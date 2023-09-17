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

class CoursesController extends Controller
{
    public function addCourses(){
        return view('courses.addcourses');
    }
    public function viewCourses(){
        $courses = DB::table('courses_details')->get();
        return view('courses.viewCourses', compact('courses'));
    }
    

    public function saveCourses(Request $request): JsonResponse {
        try {
            $response = [
                "status" => false,
                "msg" => "Something is wrong",
                "result" => []
            ];
    
            $validate = Validator::make($request->all(), [
                'courses_ID'=> ['required', 'integer'],
                "stream" => ['required', 'string', 'max:255', 'min:3'],
                "courses_name" => ['required', 'string', 'max:255', 'min:3'],
                "credithours" => ['required', 'integer'],
                "duration" => ['required', 'integer'],
                'featured_image' => ['nullable', 'image'],
            ]);
    
            if ($validate->fails()) {
                $response['result'] = $validate->errors()->toArray();
                throw new Exception("Form Validation Error");
            }
    
            $featured_image = "";
            if ($request->file('featured_image')) {
                $file = $request->file('featured_image');
                $extension = $file->getClientOriginalName();
                $filename = time() . '.' . $extension;
                $featured_image = 'uploads/courses/' . $filename;
                $file->move('uploads/courses/', $featured_image);
            }
    
            DB::table('courses_details')->insert([
                'courses_ID' => $request->courses_ID,
                'stream' => $request->stream,
                'courses_name' => $request->courses_name,
                'credit_hours' => $request->credithours,
                'duration' => $request->duration,
                'featured_image' => $filename,
            ]);
    
            $response['status'] = true;
            $response['msg'] = "Courses data saved successfully";
        } catch (Exception $e) {
            DB::rollBack();
            $response['msg'] = $e->getMessage();
        }
    
        return response()->json($response);
    }
    public function updateCourses(Request $request): JsonResponse

    {
        try {
            $response = [
                "status" => False,
                "msg" => "Something is wrong",
                "result" => []
            ];
            $validate =  Validator::make($request->all(), [
                'courses_ID'=> ['required', 'integer'],
                "stream" => ['required', 'string', 'max:255', 'min:3'],
                "courses_name" => ['required', 'string', 'max:255', 'min:3'],
                "credithours" => ['required', 'integer'],
                "duration" => ['required', 'integer'],
                'featured_image' => ['nullable', 'image'],
            ]);
            // dd($validate);

            if ($validate->fails()) {
                $response['result'] = $validate->errors()->toArray();
                throw new Exception("Form Validaton Error");
            }
            $featured_image = "";
            if ($request->file('featured_image')) {
                $file = $request->file('featured_image');
                $extension = $file->getClientOriginalName();
                $filename = time() . '.' . $extension;
                $featured_image = 'uploads/courses/' . $filename;
                $file->move('uploads/courses/', $featured_image);
            }
            
            DB::table('courses_details')->where('id',$request->id)->update([
                'courses_ID' => $request->courses_ID,
                'stream' => $request->stream,
                'courses_name' => $request->courses_name,
                'credit_hours' => $request->credithours,
                'duration' => $request->duration,
              
                'featured_image' => $filename,
            ]);
            $response['status'] = True;
            $response['msg'] = "Courses updated Successfully";
        } catch (Exception $e) {
            DB::rollBack();
            $response['msg'] = $e->getMessage();
        }
        return response()->json($response);
    }
    public function editCourses($id){
        $editCourses = DB::table('courses_details')
        ->where('id',$id)
        ->first();
        // dd($editStudent);
        return view('courses.editcourses', compact('editCourses'));
    }


}
