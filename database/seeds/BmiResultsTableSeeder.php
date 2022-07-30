<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BmiResultsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->first();

        DB::table('bmi_results')->insert([
            'user_id' => $user->id,
            'height' => '170',
            'weight' => '58',
            'result' => '20',
            'score' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('bmi_results')->insert([
            'user_id' => $user->id,
            'height' => '170',
            'weight' => '45',
            'result' => '15.57',
            'score' => '0',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('bmi_results')->insert([
            'user_id' => $user->id,
            'height' => '170',
            'weight' => '80',
            'result' => '27.68',
            'score' => '2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('bmi_results')->insert([
            'user_id' => $user->id,
            'height' => '170',
            'weight' => '90',
            'result' => '31.14',
            'score' => '3',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
