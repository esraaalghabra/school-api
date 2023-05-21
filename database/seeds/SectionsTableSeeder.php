<?php

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->delete();

        $Sections = [
            ['en' => 'first division', 'ar' => 'لشعبة الأولى'],
            ['en' => 'second division', 'ar' => 'الشعبة الثانية'],
            ['en' => 'third division', 'ar' => 'الشعبة الثالثة'],
            ['en' => 'fourth division', 'ar' => 'الشعبة الثالثة'],
            ['en' => 'fifth division', 'ar' => 'الشعبة الثالثة'],
        ];

        foreach ($Sections as $section) {
            Section::create([
                'Name_Section' => $section,
                'Status' => 1,
                'Grade_id' => Grade::all()->unique()->random()->id,
                'Class_id' => ClassRoom::all()->unique()->random()->id
            ]);
        }
    }
}
