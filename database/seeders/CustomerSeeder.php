<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\CustomerType;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::factory(100)->create();
        //
        // $customerType = new CustomerType();

        // $customerType::insert([
        //     [
        //         "name" => "particular",
        //         "code" => "pa",
        //     ],
        //     [
        //         "name" => "empresarial",
        //         "code" => "em",
        //     ],
        //     [
        //         "name" => "gobernamental",
        //         "code" => "go",
        //     ],
        // ]);

        /*
        $customer = new Customer();
        $customer->dni = "1090477400";
        $customer->name = "Edwin Granados";
        $customer->address = "calle 3 #2-28 trigal del norte";
        $customer->phone =  "310 887 1351";
        $customer->customer_types_id = 1;
        */

    }
}
