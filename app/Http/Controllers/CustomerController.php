<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    //
    public function get_all_customers(){

        try{
            $customers = Customer::all();
            return response()->json([
                "msg" => "Consulta exitosa: lista de todos los clientes",
                "customers" => $customers
            ],200);
        }

        catch(Exception $e){
            return response()->json([
                "msg" => "Error en la consulta de todos los clientes",
                "error" => $e->getMessage()
            ],401);
        }
        
    }
}
