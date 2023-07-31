<?php

namespace App\Exports;

use App\Models\Classroom;
use Maatwebsite\Excel\Concerns\FromCollection;

class HomeroomTeacherExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return collect([['Classroom Name', 'Homeroom Name'], Classroom::select('name')->get()->flatten()]);
    }
}
