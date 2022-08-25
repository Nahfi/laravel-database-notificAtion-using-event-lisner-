<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $customer =  new Customer();
        $customer->name = 'nafiz';
        $customer->email = 'customer@gmail.com';
        $customer->password = Hash::make('123456789');
        $customer->save();
    }
}
