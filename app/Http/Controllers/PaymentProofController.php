<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PaymentProofController extends Controller
{
    public function showForm()
    {
        return view('welcome');
    }

    public function fetchProof(Request $request)
    {
        $request->validate([
            'nis' => 'required|digits:10',
        ]);

        $nis = $request->input('nis');

        // Fetch the latest payment proof for the given NIS
        $payment = DB::table('payments')
            ->where('student_id', $nis)
            ->where('status', 'paid')
            ->orderByDesc('payment_date')
            ->first();

        if (!$payment) {
            return back()->withErrors(['nis' => 'No payment proof found for this NIS.']);
        }

        return view('welcome', ['payment' => $payment]);
    }

    public function showDetail($id)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $payment = DB::table('payments')->where('id', $id)->first();

        if (!$payment) {
            abort(404);
        }

        return view('payment-proof.detail', ['payment' => $payment]);
    }
}
