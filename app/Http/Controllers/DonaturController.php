<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Donation;
use Alert;

class DonaturController extends Controller
{
    // ----------------------- DONATUR PAGE ------------------------ //

    public function index(){
        $user = User::all();
        $donasi = Donation::latest()->paginate(5);
        return view('donatur.donatur', ['user' => $user, 'donasi' => $donasi]);
    }


    public function payment(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();

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
        return view('donatur.payment', [ 'snap_token' => $snapToken]);
    }

    public function payment_post(Request $request){
        $isNameHidden = false;
        $user = User::where('id', Auth::user()->id)->first();
        $donasi = Donation::where('donatur_id', Auth::user()->id)->first();
        if ($request->isNameHidden == 'on') {
          $isNameHidden = true;
        }
        $json = json_decode($request->get('json'));
        $donasi = new Donation();
        
        $donasi->donatur_id = Auth::user()->id;
        $donasi->status = $json->transaction_status;
        $donasi->isNameHidden = $isNameHidden;
        $donasi->donatur_name = $request->get('donatur_name');
        $donasi->donatur_email = $request->get('donatur_email');
        $donasi->nominal = $request->get('nominal');
        $donasi->message = $request->get('message');
        $donasi->image = Auth::user()->image;
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

    public function pending_payment(Request $request)
    {
        $donasi = Donation::where('donatur_id', Auth::user()->id)->first();
        $data_donasi = Donation::latest()->paginate(1)->where('donatur_id', Auth::user()->id);
        $jumlah_donasi = Donation::latest()->where('donatur_id', Auth::user()->id)->count();

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        if(!empty($donasi)){
          $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $donasi->gross_amount,
            ),
            'customer_details' => array(
                'first_name' => $donasi->donatur_name,
                'last_name' => '',
                'email' => $donasi->donatur_email,
                'phone' => $donasi->donatur_phone,
            ),
          );
        }else{
          $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 1000,
            ),
            'customer_details' => array(
                'first_name' => 'Tidak Dikenal',
                'last_name' => '',
                'email' => 'example@gmail.com',
                'phone' => '0341240404',
            ),
          );
        }


        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('donatur.donasi', [ 'data_donasi' => $data_donasi, 
                                        'jumlah_donasi' => $jumlah_donasi, 
                                        'snap_token' => $snapToken
                                      ]);
    }

    public function pending_payment_post(Request $request){
        $isNameHidden = false;
        $user = User::where('id', Auth::user()->id)->first();
        $donasi = Donation::latest()->where('donatur_id', Auth::user()->id);
        if ($request->isNameHidden == 'on') {
          $isNameHidden = true;
        }
        $json = json_decode($request->get('json'));
        $donasi = new Donation();
        
        $donasi->donatur_id = Auth::user()->id;
        $donasi->status = $json->transaction_status;
        $donasi->isNameHidden = $isNameHidden;
        $donasi->donatur_name = $request->get('donatur_name');
        $donasi->donatur_email = $request->get('donatur_email');
        $donasi->nominal = $request->get('nominal');
        $donasi->message = $request->get('message');
        $donasi->donatur_phone = $request->get('donatur_phone');
        $donasi->image = Auth::user()->image;
        $donasi->donatur_phone = Auth::user()->nohp;
        $donasi->transaction_id = $json->transaction_id;
        $donasi->order_id = $json->order_id;
        $donasi->gross_amount = $json->gross_amount;
        $donasi->payment_type = $json->payment_type;
        $donasi->payment_code = isset($json->payment_code) ? $json->payment_code : null;
        $donasi->pdf_url = isset($json->pdf_url) ? $json->pdf_url : null;

        $donasi->update();

        Alert::success('Transaksi Berhasil<br>شُكْرًا');
        return redirect()->back();
    }

    public function cancel_payment($id){
        $donasi = Donation::where('id', $id)->delete();
        Alert::success('Data berhasil dihapus');
        return redirect()->back();
    }

    /*public function confirm_payment($id){
      $donasi = Donation::where('id', $id)->delete();
      Alert::success('Donasi berhasil dikonfirmasi');
      return redirect()->back();
    }*/


    // ------------------------- ADMIN ----------------------- //

    public function index_table ()
    {
        return view('manage_admin.donatur_manage');
    }

    public function fetchAll() {
		$emps = User::all()->where('roles', 'Donatur');
		$output = '';
		$numbering = 1;
		if ($emps->count() > 0) {
			$output .= '<table class="table table-bordered data-table">
            <thead>
              <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Name</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>No. Hp</th>
                <th>Instansi</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
			foreach ($emps as $emp) {
				$output .= '<tr>
                <td width="5px">' . $numbering++ . '</td>
                <td><img src="storage/images/' . $emp->image . '" width="100" height="100" src="https://via.placeholder.com/150"></td>
                <td>' . $emp->name . '</td>
                <td>' . $emp->email . '</td>
                <td>' . $emp->alamat . '</td>
                <td>' . $emp->nohp . '</td>
                <td>' . $emp->instansi . '</td>
                <td>
                  <a href="#" id="' . $emp->id . '" class="edit btn btn-primary btn-sm editIcon" data-bs-toggle="modal" data-bs-target="#editDonaturModal"><i class="bi-pencil-square h4"></i>View</a>

                  

                </td>
              </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
		}
	}

    public function store(Request $request)
    {  
        $file = $request->file('image');
		$fileName = time() . '.' . $file->getClientOriginalExtension();
		$file->storeAs('public/images', $fileName);

		$empData = ['name' => $request->name, 'email' => $request->email, 'alamat' => $request->alamat, 'nohp' => $request->nohp, 'instansi' => $request->instansi, 'image' => $fileName];
		User::create($empData);
		return response()->json([
			'status' => 200,
		]);
    }

    public function edit(Request $request)
    {   
        $id = $request->id;
		$emp = User::find($id);
		return response()->json($emp);
    }

    public function update(Request $request) {
		$fileName = '';
		$emp = User::find($request->emp_id);
		if ($request->hasFile('image')) {
			$file = $request->file('image');
			$fileName = time() . '.' . $file->getClientOriginalExtension();
			$file->storeAs('public/images', $fileName);
			if ($emp->image) {
				Storage::delete('public/images/' . $emp->image);
			}
		} else {
			$fileName = $request->emp_image;
		}

		$empData = ['name' => $request->name, 'email' => $request->email, 'alamat' => $request->alamat, 'nohp' => $request->nohp, 'instansi' => $request->instansi, 'image' => $fileName];

		$emp->update($empData);
		return response()->json([
			'status' => 200,
		]);
	}

    public function delete(Request $request) {
		$id = $request->id;
		$emp = User::find($id);
		if (Storage::delete('public/images/' . $emp->image)) {
			User::destroy($id);
		}
	}


  public function index_donations ()
    {
      $emps = Donation::all();
        return view('manage_admin.donations_manage', compact('emps'));
    }


  public function fetchAll_donations() {
		$user = User::where('id', Auth::user()->id)->first();
    $donasi = Donation::all();
		$output = '';
		$numbering = 1;
		if ($donasi->count() > 0) {
			$output .= '<table class="table table-bordered data-table">
            <thead>
              <tr>
                <th>No</th>
                <th>Status</th>
                <th>Nama Donatur</th>
                <th>Email Donatur</th>
                <th>Nomor Hp</th>
                <th>Nominal</th>
                <th>Pesan</th>
                <th>Cetak Nota</th>
              </tr>
            </thead>
            <tbody>';
			foreach ($donasi as $donation) {
				$output .= '<tr>
                <td width="5px">' . $numbering++ . '</td>
                <td>' . $donation->status . '</td>
                <td>' . $donation->donatur_name . '</td>
                <td>' . $donation->donatur_email . '</td>
                <td>' . $donation->donatur_phone . '</td>
                <td>Rp. ' . $donation->nominal . '</td>
                <td>' . $donation->message . '</td>
                <td>
                  <p><a href="'.$donation->pdf_url.'" id="' . $donation->id . '" class="btn btn-danger text-white" data-bs-target="#"><i class="fa fa-print"></i></a></p>
                </td>
              </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
		}
	}

  public function view(Request $request)
    {   
        $id = $request->id;
		    $emp = Donation::find($id);
		    return response()->json($emp);
    }
}
