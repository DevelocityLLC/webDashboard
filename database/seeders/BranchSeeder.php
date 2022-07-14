<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Complaint;
use App\Models\News;
use App\Models\NewsType;
use App\Models\Requirement;
use App\Models\Section;
use App\Models\Task;
use App\Models\TaskSection;
use App\Models\TaskUser;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BranchSeeder extends Seeder
{


    public function run()
    {

        $fake = Factory::create();

        // branches
        Branch::create([
            'name' => 'Develocity' ,
            'img' => '1.jpg' ,
            'lat' => '30.11' ,
            'lng' => '31.34' ,
            'location' => 'Masr Al Jadidah, Al Matar, El Nozha, Cairo Governorate 4470351, Egypt' ,
        ]);

        for ($i=1; $i <5 ; $i++) {
            Branch::create([
                'name' => $fake->name() ,
                'img' => '1.jpg' ,
                'lat' => '30.11' ,
                'lng' => '31.34' ,
                'location' => 'Masr Al Jadidah, Al Matar, El Nozha, Cairo Governorate 4470351, Egypt' ,
            ]);
        }

        // sections
        for ($i=0; $i < 20 ; $i++) {
            Section::create([
                'name' => $fake->name() ,
                'branch_id' => rand(1,5)
            ]);
        }

        // users
        User::create([
            'name' => 'tarek rady' ,
            'email' => 't@yahoo.com' ,
            'img' => '2.jpg' ,
            'password' => bcrypt(123) ,
            'job_title' => 'Backend' ,
            'job_desc' => 'Backend Developer' ,
            'kpis' => 'php/laravel' ,
            'branch_id' => rand(1,5) ,
            'section_id' => rand(1,19) ,
            'email_verified_at'=>now(),
            'remember_token'=>Str::random(10),
        ]);

        for ($i=1; $i < 20 ; $i++) {

            User::create([
                'name' => $fake->name(),
                'email' => $fake->email() ,
                'img' => '2.jpg' ,
                'password' => bcrypt(123) ,
                'job_title' => 'Backend' ,
                'job_desc' => 'Backend Developer' ,
                'kpis' => 'php/laravel' ,
                'branch_id' => rand(1,5) ,
                'section_id' => rand(1,19) ,
                'email_verified_at'=>now(),
                'remember_token'=>Str::random(10),
            ]);
        }

        // tasks
        for ($i=0; $i <20 ; $i++) {

            Task::create([
                'title' => 'taks' . rand(1,20) ,
                'desc' => $fake->text(500),
                'status' => 'waiting',
                'message' => $fake->text(500) ,
                'start_date' => '25/6/2022' ,
                'end_date' => '30/6/2022',
                'admin_id' => rand(1,3) ,
                'branch_id' => rand(1,5) ,
            ]);
        }

        // task user
        for ($i=0; $i <20 ; $i++) {
           TaskUser::create([
            'task_id' => rand(1 , 19) ,
            'user_id' => rand(1 , 19 ) ,
            'rate' =>rand(1,10) ,
            'desc' => $fake->text(20)
           ]);
        }

        // task section
        for ($i=0; $i <20 ; $i++) {
            TaskSection::create([
                'task_id' => rand(1 , 19) ,
                'section_id' => rand(1 , 19)
            ]);
        }

        // complaints type general
        for ($i=0; $i <10 ; $i++) {
            Complaint::create([
                'title' => 'Complaint' . rand(1,10) ,
                'message' => 'Beatae amet dolorem asperiores nihil. Nihil eligendi at quo dignissimos neque. At consequatur vero dicta ullam reiciendis cum occaecati. Sit sunt expedita culpa quas minima. Omnis est a ratione saepe quibusdam enim neque fugiat. Ut totam facilis expedita officia nam. Veniam et est repellat officia in molestiae provident. Ut quia enim non explicabo et cumque. Qui accusantium facere sed impedit. Et ducimus aspernatur deserunt voluptatibus dolorem. Quam et ad delectus nisi.' ,
                'type' => 'general' ,
                'user_id' => rand(1,19) ,
            ]);
        }

         // complaints type task
         for ($i=11; $i <20 ; $i++) {
            Complaint::create([
                'title' => 'Complaint' . rand(11,20) ,
                'message' => 'Beatae amet dolorem asperiores nihil. Nihil eligendi at quo dignissimos neque. At consequatur vero dicta ullam reiciendis cum occaecati. Sit sunt expedita culpa quas minima. Omnis est a ratione saepe quibusdam enim neque fugiat. Ut totam facilis expedita officia nam. Veniam et est repellat officia in molestiae provident. Ut quia enim non explicabo et cumque. Qui accusantium facere sed impedit. Et ducimus aspernatur deserunt voluptatibus dolorem. Quam et ad delectus nisi.' ,
                'type' => 'task' ,
                'user_id' => rand(1,19) ,
                'task_id' => rand(1,19)
            ]);
        }

        // requirements
        for ($i=0; $i < 50 ; $i++) {

            Requirement::create([
                'name' => 'Requirement' . rand(1,50) ,
                'price' => $fake->numberBetween(500 , 2000) ,
                'user_id' => rand(1,19) ,
                'task_id' => rand(1,19) ,
                'admin_id' => rand(1,3) ,
                'status' => 'waiting' ,
            ]);
        }

        // news_types
        for ($i=0; $i <20 ; $i++) {

            NewsType::create([
                'title' => $fake->name()
            ]);
        }

         // news
         for ($i=0; $i <20 ; $i++) {

            News::create([
                'title' => $fake->name() ,
                'desc' => $fake->text(500) ,
                'img' => '1.png' ,
                'type_id' => rand(1,19) ,
                'branch_id' => rand(1,4) ,
            ]);
        }


    }
}
