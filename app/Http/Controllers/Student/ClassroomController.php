<?php

namespace App\Http\Controllers\Student;

use App\Exports\HomeroomTeacherExport;
use App\Http\Controllers\Controller;
use App\Imports\ClassroomImport;
use App\Models\Classroom;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ClassroomController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        if ($user->is_student) {
            $student = Student::where('user_id', $user->id)->first();
            $classrooms = Classroom::with('homeroom')->where('id', $student->class)->first();

            return Redirect()->route('classroom.detail', $classrooms->name);
        } elseif ($user->is_teacher) {
            $teacher = Teacher::where('user_id', $user->id)->first();
            $classrooms = Classroom::with('homeroom')->where('homeroom_teacher', $teacher->id)->get();
        } elseif ($user->is_developer) {
            $classrooms = Classroom::with('homeroom')->get();
        }

        return view('pages.classroom.index', compact('classrooms'));
    }

    public function show(Request $request, $className)
    {
        $user = $request->user();
        if ($user->is_student) {
            $student = Student::where('user_id', $user->id)->first();
            $classroom = Classroom::with('homeroom')->find($student->class)->where('name', $className)->first();
            $students = Student::where('class', $classroom->id)->get();
        } elseif ($user->is_teacher) {
            $teacher = Teacher::where('user_id', $user->id)->first();
            $classroom = Classroom::with('homeroom')->where('homeroom_teacher', $teacher->id)->where('name', $className)->first();
            $students = Student::where('class', $classroom->id)->get();
        } elseif ($user->is_developer) {
            $classroom = Classroom::with('homeroom')->where('name', $className)->first();
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
        DB::beginTransaction();
        try {
            Excel::import(new ClassroomImport(), $request->file('file'));
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            // throw $th;
        }
    }

    public function classroomTemplateDownload()
    {
        return Storage::disk('manual')->download('classroom.xlsx');
    }
    public function homeroomTemplateDownload()
    {
        return Excel::download(new HomeroomTeacherExport, 'homeroom.xlsx');
    }
}
