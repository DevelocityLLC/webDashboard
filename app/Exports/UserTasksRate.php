<?php

namespace App\Exports;

use App\Models\user;
use App\Models\Rate;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserTasksRate implements FromCollection,WithHeadings
{

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }
    public function headings(): array
    {
        return[
            'id',
            'Task Title',
            'Employee Name',
            'Start Date',
            'End Date',
            'Status',
            'rate'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $tasks = $this->user->tasks;

        $taskscollection = collect();
        
        foreach($tasks as $task){
            $arr =array();
            $arr['id'] = $task->id;
            $arr['Task Title'] = $task->title;
            $arr['Employee Name'] = $this->user->name;
            $arr['Start Date'] = $task->start_date;
            $arr['End Date'] = $task->end_date;
            $arr['Status'] = $task->status;
            $arr['rate'] = $task->pivot->rate;
            $taskscollection->add($arr);
        }

        return $taskscollection;

    }
}
