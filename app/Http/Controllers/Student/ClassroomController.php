<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ClassroomController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        if ($user->is_student) {
            $student = Student::where('user_id', $user->id)->first();
            $classrooms = Classroom::with('homeroom')->where('id', $student->class)->first();
            return Redirect()->route('classroom.detail', $classrooms->name);
        } else if ($user->is_teacher) {
            $teacher = Teacher::where('user_id', $user->id)->first();
            $classrooms = Classroom::with('homeroom')->where('homeroom_teacher', $teacher->id)->get();
        } else if ($user->is_developer) {
            $classrooms = Classroom::with('homeroom')->get();
        }
        return view('pages.classroom.index', compact('classrooms'));
    }

    public function show(Request $request, $name)
    {
        $user  = $request->user();
        if ($user->is_student) {
            $student = Student::where('user_id', $user->id)->first();
            $classroom = Classroom::with('homeroom')->find($student->class)->where('name', $name)->first();
            $students = Student::where('class', $classroom->id)->get();
        } else if ($user->is_teacher) {
            $teacher = Teacher::where('user_id', $user->id)->first();
            $classroom = Classroom::with('homeroom')->where('homeroom_teacher', $teacher->id)->where('name', $name)->first();
            $students = Student::where('class', $classroom->id)->get();
        } else if ($user->is_developer) {
            $classroom = Classroom::with('homeroom')->where('name', $name)->first();
            $students = Student::where('class', $classroom->id)->get();
        }
        return view('pages.classroom.detail', compact('classroom', 'students'));
    }

    public function upload()
    {
        return view('pages.classroom.upload');
    }
    public function execute(Request $request)
    {
        dd($request->file('file'));
    }
    public function templateDownload(Request $request)
    {
        return Storage::disk('manual')->download('classroom.xlsx');
        return Response()->download(Storage::disk('manual')->get('classroom.xlsx'));
    }
}
