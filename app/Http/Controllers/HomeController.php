<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kegiatan;
use App\Models\Santri;
use App\Models\Berita;
use App\Models\Donation;
use Illuminate\Support\Facades\Auth;
use Alert;

class HomeController extends Controller
{
    public function index()
    {
        $kegiatan = Kegiatan::all();
        $berita = Berita::all();
        $donasi = Donation::latest()->paginate(5);
        $jumlah_donatur = User::latest()->where('roles', 'Donatur')->count();
        $jumlah_santri = Santri::latest()->count();
        $jumlah_pengasuh = User::latest()->where('roles', 'Pengasuh')->count();
        $donasi_terkumpul = Donation::latest()->sum('gross_amount');
        return view('home', 
            compact('kegiatan', 'berita', 'jumlah_donatur', 
                    'jumlah_santri', 'jumlah_pengasuh', 'donasi_terkumpul',
                    'donasi'));
    }


    public function index_detail_kegiatan($slug)
    {
        $this->data['kegiatan'] = Kegiatan::where('slug','=',$slug)->firstOrFail();
        return view('detail-kegiatan', $this->data);
    }

    public function index_detail_berita($slug)
    {
        $this->data['berita'] = Berita::where('slug','=',$slug)->firstOrFail();
        return view('detail-berita', $this->data);
    }

    public function payment(Request $request)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
          'transaction_details' => array(
              'order_id' => rand(),
              'gross_amount' => $request->get('nominal'),
          ),
          'customer_details' => array(
              'first_name' => $request->get('donatur_name'),
              'last_name' => '',
              'email' => $request->get('donatur_email'),
              'phone' => $request->get('donatur_phone'),
          ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('payment', [ 'snap_token' => $snapToken]);
    }
    
    public function payment_post(Request $request){
        $isNameHidden = false;
        if ($request->isNameHidden == 'on') {
          $isNameHidden = true;
        }
        $json = json_decode($request->get('json'));
        $donasi = new Donation();
        
        $donasi->status = $json->transaction_status;
        $donasi->isNameHidden = $isNameHidden;
        $donasi->donatur_name = $request->get('donatur_name');
        $donasi->donatur_email = $request->get('donatur_email');
        $donasi->nominal = $request->get('nominal');
        $donasi->message = $request->get('message');
        $donasi->donatur_phone = $request->get('donatur_phone');
        $donasi->transaction_id = $json->transaction_id;
        $donasi->order_id = $json->order_id;
        $donasi->gross_amount = $json->gross_amount;
        $donasi->payment_type = $json->payment_type;
        $donasi->payment_code = isset($json->payment_code) ? $json->payment_code : null;
        $donasi->pdf_url = isset($json->pdf_url) ? $json->pdf_url : null;

        $donasi->save();

        Alert::success('Transaksi Berhasil Dibuat<br>شُكْرًا');
        return redirect()->back();
    }
}
