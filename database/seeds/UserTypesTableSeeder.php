<?php

use Illuminate\Database\Seeder;

class UserTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name         = "admin";

        $data = [
            'name'                =>    $name,
            'created_at'          =>    date('Y-m-d H:i:s'),
            'updated_at'          =>    date('Y-m-d H:i:s')

        ];
        $obj = DB::table('user_types')->where('name', $name)->first();

        if (is_null($obj)) {
            DB::table('user_types')->insert($data);
        }
        // user type
        $name         = "user";

        $data = [
            'name'                =>    $name,
            'created_at'          =>    date('Y-m-d H:i:s'),
            'updated_at'          =>    date('Y-m-d H:i:s')

        ];
        $obj = DB::table('user_types')->where('name', $name)->first();

        if (is_null($obj)) {
            DB::table('user_types')->insert($data);
        }
    }
}
