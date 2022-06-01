<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Donation;
use Alert;

class DonaturController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $user = User::where('id', Auth::user()->id)->first();
        return view('donatur.donatur', ['user' => $user]);
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
                'gross_amount' => 1000
            ),
            /*'item_details' => array(
                [
                  "id" => "a01",
                  "price"=> 10000,
                  "quantity"=> 1,
                  "name"=> "Apple"
                ]
            ),*/
            'customer_details' => array(
                'first_name' => Auth::user()->name,
                'last_name' => '',
                'email' => Auth::user()->email,
                'phone' => Auth::user()->nohp,
            ),
        );
        
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('donatur.donatur', ['user' => $user, 'snap_token' => $snapToken]);
    }

    public function payment_post(Request $request){
        $user = User::where('id', Auth::user()->id)->first();

        $json = json_decode($request->get('json'));
        $donasi = new Donation();
        $donasi->donatur_id = $request->get(Auth::user()->id);
        $donasi->status = $json->transaction_status;
        $donasi->donatur_name = $request->get(Auth::user()->name);
        $donasi->donatur_email = $request->get(Auth::user()->email);
        $donasi->transaction_id = $json->transaction_id;
        $donasi->order_id = $json->order_id;
        $donasi->gross_amount = $json->gross_amount;
        $donasi->payment_type = $json->payment_type;
        $donasi->payment_code = isset($json->payment_code) ? $json->payment_code : null;
        $donasi->pdf_url = isset($json->pdf_url) ? $json->pdf_url : null;
        return $donasi->save() ? redirect(url('donatur.donatur'))->with('alert-success', 'Donasi telah berhasil dibuat') : redirect(url('donatur.donatur'))->with('alert-failed', 'Terjadi kesalahan');
    }

    public function index_table ()
    {
        
    }
}
