<?php

use App\Models\Section;
use App\Models\Specialization;
use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->delete();
        $teachers = new Teacher();
        $teachers->Email = 'Ahmed_Ibrahim@yahoo.com';
        $teachers->Password = Hash::make('12345678');
        $teachers->Name = ['ar' => 'احمد ابراهيم', 'en' => 'Ahmed Ibrahim'];
        $teachers->Specialization_id = Specialization::all()->unique()->random()->id;
        $teachers->Gender_id = 1;
        $teachers->Joining_Date = date('1995-01-01');
        $teachers->Address ='القاهرة';
        $teachers->save();
    }
}
