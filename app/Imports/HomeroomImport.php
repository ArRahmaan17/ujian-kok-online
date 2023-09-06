<?php

namespace App\Imports;

use App\Models\Classroom;
use App\Models\Teacher;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HomeroomImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $collection)
    {
        foreach ($collection as $index => $collect) {
            $teacher = Teacher::where('full_name', $collect['homeroom_name']);
            if (1 == $teacher->count()) {
                Classroom::where('name', $collect['classroom_name'])->update(['homeroom_teacher' => $teacher->first()->id]);
            }
        }
    }
}
