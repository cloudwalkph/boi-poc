<?php

use Illuminate\Database\Seeder;

class BranchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $branches = [
            [
                'name'  => 'Tarlac Branch',
                'address'   => 'SM Tarlac, Tarlac City',
                'am_slot'   => 100,
                'pm_slot'   => 50
            ],
            [
                'name'  => 'Makati Branch',
                'address'   => 'SM Makati, Makati City',
                'am_slot'   => 150,
                'pm_slot'   => 100
            ],
            [
                'name'  => 'Quezon City Branch',
                'address'   => 'SM North Edsa, Quezon City',
                'am_slot'   => 200,
                'pm_slot'   => 180
            ],
            [
                'name'  => 'Taguig Branch',
                'address'   => 'SM Aura, Taguig City',
                'am_slot'   => 100,
                'pm_slot'   => 50
            ],
            [
                'name'  => 'Main Branch',
                'address'   => 'Intramuros, Manila',
                'am_slot'   => 300,
                'pm_slot'   => 200
            ],
        ];

        foreach ($branches as $branch) {
            \App\Models\Branch::create($branch);
        }
    }
}
