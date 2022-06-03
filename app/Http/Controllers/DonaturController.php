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
        $donasi = Donation::where('donatur_id', Auth::user()->id)-where('status',0)->first();

        $donasi = new Donation();
        $donasi->donatur_id = Auth::user()->id;
        $donasi->status = $request->transaction_status;
        $donasi->donatur_name = Auth::user()->name;
        $donasi->donatur_email = Auth::user()->email;
        $donasi->transaction_id = $request->transaction_id;
        $donasi->order_id = $request->order_id;
        $donasi->gross_amount = $request->gross_amount;
        $donasi->payment_type = $request->payment_type;
        $donasi->payment_code = isset($request->payment_code) ? $request->payment_code : null;
        $donasi->pdf_url = isset($request->pdf_url) ? $request->pdf_url : null;
        return $donasi->save() ? redirect(url('donatur.donatur'))->with('alert-success', 'Order berhasil dibuat') : redirect(url('donatur.donatur'))->with('alert-failed', 'Terjadi kesalahan');
        /*$donasi->save();
        return redirect('donatur.donatur');*/
    }

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
                  <a href="#" id="' . $emp->id . '" class="edit btn btn-primary btn-sm editIcon" data-bs-toggle="modal" data-bs-target="#editDonaturModal"><i class="bi-pencil-square h4"></i>Edit</a>

                  <a href="#" id="' . $emp->id . '" class="btn btn-danger btn-sm deleteIcon"><i class="bi-trash h4"></i>Delete</a>

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
}
