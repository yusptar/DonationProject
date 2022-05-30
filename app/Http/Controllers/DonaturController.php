<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Alert;

class DonaturController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function payment(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-1ecbIYEWgTQc-y2iDWpCV60t';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 10000,
            ),
            /*'item_details' => array(
                [
                  "id" => "a01",
                  "price"=> 10000,
                  "quantity" => 1,
                  "name"=> "Apple"
                ],
                [
                  "id" => "b02",
                  "price" => 8000,
                  "quantity"=> 2,
                  "name"=> "Orange"
                ]
            ),*/
            'customer_details' => array(
                'first_name' => $user->name,
                'last_name' => '',
                'email' => $user->email,
                'phone' => $user->nohp,
            ),
        );
        
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('donatur.donatur', ['user' => $user, 'snap_token' => $snapToken]);
    }

    public function index_table ()
    {
        
    }
}
