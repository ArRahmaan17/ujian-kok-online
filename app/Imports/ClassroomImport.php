<?php

namespace App\Imports;

use App\Models\Classroom;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ClassroomImport implements ToModel, WithHeadingRow
{
    /**
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Classroom([
            'name' => $row['kelas'],
            'total_students' => $row['jumlah_murid'],
        ]);
    }
}
