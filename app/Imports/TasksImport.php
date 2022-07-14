<?php

namespace App\Imports;

use App\Models\Task;
use App\Models\User;
use App\Models\Admin;
use App\Models\Branch;
use App\Models\Section;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Validation\Rule;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use App\Notifications\AddTask;

class TasksImport implements ToModel, WithHeadingRow,WithValidation
{
    public function model(array $row)
    {
        $task = Task::create([
                'title' => $row['title'],
                'branch_id'=>Branch::where('name', $row['branch'])->pluck('id')[0],
                'admin_id'=>Admin::where('email', $row['admin_email'])->pluck('id')[0],
                'desc'=>$row['desc'],
                'start_date' => Date::excelToDateTimeObject($row['start_date'])->format('y-m-d'),
                'end_date' => Date::excelToDateTimeObject($row['end_date'])->format('y-m-d'),
                'status' => 'waiting',
            ]);

        $task->users()->attach(User::where('email', $row['user_email'])->pluck('id')[0]);
        $task->sections()->attach(Section::where('name', $row['section'])->pluck('id')[0]);
     
        \Notification::send($task->users, new AddTask($task));


        return $task;

    }

        
    public function rules(): array
    {
        return [
            'branch'=> Rule::in(Branch::pluck('name')),
            'section'=> Rule::in(Section::pluck('name')),
            'user_email' => Rule::in(User::pluck('email')),
            'admin_email' => Rule::in(Admin::pluck('email')),
        ];
    }


}

