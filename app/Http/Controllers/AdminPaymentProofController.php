<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class AdminPaymentProofController extends Controller
{
    public function index()
    {
        $payments = DB::table('payments')->orderByDesc('payment_date')->paginate(15);
        return view('admin.payment-proofs.index', compact('payments'));
    }

    public function create()
    {
        return view('admin.payment-proofs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'invoice_number' => 'required|unique:payments,invoice_number',
            'student_id' => 'required|digits:10',
            'amount' => 'required|numeric|min:0',
            'payment_date' => 'required|date',
            'proof_file' => 'required|file|mimes:pdf|max:2048',
            'status' => 'required|in:paid,pending,failed',
            'notes' => 'nullable|string',
        ]);

        $path = $request->file('proof_file')->store('payment_proofs');

        DB::table('payments')->insert([
            'invoice_number' => $request->invoice_number,
            'student_id' => $request->student_id,
            'amount' => $request->amount,
            'payment_date' => $request->payment_date,
            'proof_file' => $path,
            'status' => $request->status,
            'notes' => $request->notes,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.payment-proofs.index')->with('success', 'Payment proof uploaded successfully.');
    }

    public function edit($id)
    {
        $payment = DB::table('payments')->where('id', $id)->first();

        if (!$payment) {
            abort(404);
        }

        return view('admin.payment-proofs.edit', compact('payment'));
    }

    public function update(Request $request, $id)
    {
        $payment = DB::table('payments')->where('id', $id)->first();

        if (!$payment) {
            abort(404);
        }

        $request->validate([
            'invoice_number' => 'required|unique:payments,invoice_number,' . $id,
            'student_id' => 'required|digits:10',
            'amount' => 'required|numeric|min:0',
            'payment_date' => 'required|date',
            'proof_file' => 'nullable|file|mimes:pdf|max:2048',
            'status' => 'required|in:paid,pending,failed',
            'notes' => 'nullable|string',
        ]);

        $data = [
            'invoice_number' => $request->invoice_number,
            'student_id' => $request->student_id,
            'amount' => $request->amount,
            'payment_date' => $request->payment_date,
            'status' => $request->status,
            'notes' => $request->notes,
            'updated_at' => now(),
        ];

        if ($request->hasFile('proof_file')) {
            // Delete old file
            Storage::delete($payment->proof_file);
            // Store new file
            $data['proof_file'] = $request->file('proof_file')->store('payment_proofs');
        }

        DB::table('payments')->where('id', $id)->update($data);

        return redirect()->route('admin.payment-proofs.index')->with('success', 'Payment proof updated successfully.');
    }

    public function destroy($id)
    {
        $payment = DB::table('payments')->where('id', $id)->first();

        if (!$payment) {
            abort(404);
        }

        Storage::delete($payment->proof_file);

        DB::table('payments')->where('id', $id)->delete();

        return redirect()->route('admin.payment-proofs.index')->with('success', 'Payment proof deleted successfully.');
    }
}
