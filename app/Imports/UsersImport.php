<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Branch;
use App\Models\Section;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithUpsertColumns;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Validation\Rule;
class UsersImport implements ToModel, WithHeadingRow,WithUpserts,WithUpsertColumns,WithValidation
{
    public function model(array $row)
    {
        return new User([
            'name'          => $row['name'],
            'email'         => $row['email'],
            'password'      => bcrypt($row['password']),
            'branch_id'     => Branch::where('name', $row['branch'])->pluck('id')[0],
            'section_id'    => Section::where('name', $row['section'])->pluck('id')[0],
            'job_title'     => $row['job_title'],
            'job_desc'      => $row['job_desc']
        ]);
    }

    public function uniqueBy()
    {
        return 'email';
    }
        
    public function upsertColumns()
    {
        return ['name', 'password', 'branch_id', 'section_id', 'job_title','job_desc'];
    }

        
    public function rules(): array
    {
        return [
            'branch'=> Rule::in(Branch::pluck('name')),
            'section'=> Rule::in(Section::pluck('name'))
        ];
    }

}
