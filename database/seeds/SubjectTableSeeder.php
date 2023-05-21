<?php

use App\Models\Subject;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->delete();
        $subjects = new Subject();
        $subjects->name = ['ar' => 'علوم', 'en' => 'sciences'];
        $subjects->grade_id = 1 ;
        $subjects->classroom_id = 1;
        $subjects->teacher_id = 1;
        $subjects->save();

    }
}
