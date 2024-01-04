<?php

namespace App\Http\Controllers\Api;

use App\Models\Pembayaran;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PembayaranController extends Controller
{
    public function checkout(Request $request, Pendaftaran $pendaftaran)
    {
        $validatedData = $request->validate([
            'pendaftaran_id' => 'integer',
            'first_name' => 'string|max:255',
            'last_name' => 'string|max:255',
            'address' => 'string|max:255',
            'phone' => 'required|min:8|max:14|regex:/^([0-9\s\-\+\(\)]*)$/',
            'total' => 'required|integer'
        ]);
        $validatedData['last_name'] = '';
        $validatedData['status'] = 'Unpaid';


        \Midtrans\Config::$serverKey = config('services.midtrans.serverkey');
        \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $order_id = 'ORDER-' . time();

        $params = array(
            'transaction_details' => array(
                'order_id' => $order_id,
                'gross_amount' => $request->total,
            ),
            'customer_details' => array(
                'first_name' => $request->name,
                'last_name' => '',
                'phone' => $request->phone,
                'address' => $request->address,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $validatedData['snapToken'] = $snapToken;

        $order = Pembayaran::create($validatedData);
        $pendaftaran->pembayaran()->attach($order->id);

        return response()->json([
            'status' => 'Success',
            'message' => 'Berhasil Membuat Pembayaran',
            'data' => $order,
        ]);
    }

    public function callback(Pembayaran $pembayaran)
    {
        $pembayaran->update([
            'status' => 'Paid'
        ]);

        return response()->json([
            'status' => 'Success',
            'message' => 'Pembayaran Berhasil',
            'data' => $pembayaran
        ]);
    }

    public function invoice($id)
    {
        $pembayaran = Pembayaran::find($id);

        return response()->json([
            'data' => $pembayaran,
        ]);
    }
}
