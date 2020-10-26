<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 100; $i++) {
            DB::table('course_student')->insert([
                'course_id' =>  rand(1, 140),
                'student_id' => rand(1, 100),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
