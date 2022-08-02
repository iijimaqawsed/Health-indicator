<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PfcResultsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->first();
        DB::table('pfc_results')->insert([
            'user_id' => $user->id,
            'weight' =>'58',
            'body_fat' => '10',
            'l_b_mass' => '52.2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $user = DB::table('users')->first();
        DB::table('pfc_results')->insert([
            'user_id' => $user->id,
            'weight' =>'60',
            'body_fat' => '10',
            'l_b_mass' => '54.0',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $user = DB::table('users')->first();
        DB::table('pfc_results')->insert([
            'user_id' => $user->id,
            'weight' =>'48',
            'body_fat' => '20',
            'l_b_mass' => '38.4',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('pfc_results')->insert([
            'user_id' => 2,
            'weight' =>'58',
            'body_fat' => '10',
            'l_b_mass' => '52.2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $user = DB::table('users')->first();
        DB::table('pfc_results')->insert([
            'user_id' => 2,
            'weight' =>'60',
            'body_fat' => '10',
            'l_b_mass' => '54.0',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $user = DB::table('users')->first();
        DB::table('pfc_results')->insert([
            'user_id' => 2,
            'weight' =>'48',
            'body_fat' => '20',
            'l_b_mass' => '38.4',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
