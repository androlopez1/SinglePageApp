<?php

use Illuminate\Database\Seeder;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('people')->delete();
        $people = array(
            ['id' => 1, 'name' => 'Andres', 'age' => '45.', 'gender' => 'male','mobile' => 0023123,'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 1, 'name' => 'Alejandra', 'age' => '25.', 'gender' => 'female','mobile' => 00233,'created_at' => new DateTime, 'updated_at' => new DateTime],
        DB::table('people')->insert($people);
    }
}
