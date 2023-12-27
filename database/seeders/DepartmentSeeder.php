<?php

namespace Database\Seeders;

use App\Models\Department;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create([
            'name' => 'Admin',
            'created_by' => 1,
            'updated_by' =>1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Department::create([
            'name' => 'IT',
            'created_by' => 1,
            'updated_by' =>1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
