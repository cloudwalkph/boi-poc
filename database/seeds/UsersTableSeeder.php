<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $user = User::create([
            'rfid'          => '0183',
            'email'         => 'campbell@boi.com',
            'password'      => Hash::make('password'),
            'status'        => "active"
        ]);

        $user->profile()->create([
            'first_name'    => "Mark William",
            'middle_name'   => "",
            'last_name'     => "Campbell",
            'birthday'      => "1942-08-22",
            'gender'        => "male",
            'height'        => "170cm",
            'weight'        => "70kg",
            'civil_status'  => "married",
            'blood_type'    => 'A+',
            'certificate'   => "ICR-657412",
            'address'       => "1078-j Eulogio Amang Rodriguez Ave, White Plains, Quezon City",
            'visa_type'     => "PD 730",
            'visa_status'   => "working",
            'visa_issue_date'   => "2013-08-22",
            'visa_expiration'   => "2017-08-22",
        ]);

        $user = User::create([
            'rfid'          => '0277',
            'email'         => 'robinson@boi.com',
            'password'      => Hash::make('password'),
            'status'        => "active"
        ]);

        $user->profile()->create([
            'first_name'    => "Steven Edward",
            'middle_name'   => "",
            'last_name'     => "Robinson",
            'birthday'      => "1939-11-16",
            'gender'        => "male",
            'height'        => "189cm",
            'weight'        => "94kg",
            'civil_status'  => "married",
            'blood_type'    => 'AB',
            'certificate'   => "ICR-698642",
            'address'       => "5 Kennedy Drive Pleasant View Subd. Tandang Sora, Queson City",
            'visa_type'     => "PD 730",
            'visa_status'   => "permanent",
            'visa_issue_date'   => "",
            'visa_expiration'   => "permanent",
        ]);

        $user = User::create([
            'rfid'          => '0295',
            'email'         => 'thompson@boi.com',
            'password'      => Hash::make('password'),
            'status'        => "active"
        ]);

        $user->profile()->create([
            'first_name'    => "Patricia Elizabeth",
            'middle_name'   => "",
            'last_name'     => "Thompson",
            'birthday'      => "1975-06-04",
            'gender'        => "female",
            'height'        => "169cm",
            'weight'        => "54kg",
            'civil_status'  => "single",
            'blood_type'    => 'B+',
            'certificate'   => "ICR-315287",
            'address'       => "Block 5H Lot 27A Jade Heights Victoria Homes, Tunasan Muntinlupa City, Metro Manila",
            'visa_type'     => "PD 730",
            'visa_status'   => "working",
            'visa_issue_date'   => "2014-09-06",
            'visa_expiration'   => "2017-09-06",
        ]);


    }
}
