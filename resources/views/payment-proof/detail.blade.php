@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Payment Proof Details</h2>
    <p><strong>Invoice Number:</strong> {{ $payment->invoice_number }}</p>
    <p><strong>Student ID (NIS):</strong> {{ $payment->student_id }}</p>
    <p><strong>Payment Date:</strong> {{ \Carbon\Carbon::parse($payment->payment_date)->format('d M Y') }}</p>
    <p><strong>Amount:</strong> Rp {{ number_format($payment->amount, 0, ',', '.') }}</p>
    <p><strong>Status:</strong> {{ ucfirst($payment->status) }}</p>
    <p><strong>Notes:</strong> {{ $payment->notes }}</p>

    <div class="mb-3">
        <embed src="{{ asset('storage/' . $payment->proof_file) }}" type="application/pdf" width="100%" height="600px" />
    </div>
</div>
@endsection
