@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Latest Payment Proof</h2>
    <p>Invoice Number: {{ $payment->invoice_number }}</p>
    <p>Payment Date: {{ \Carbon\Carbon::parse($payment->payment_date)->format('d M Y') }}</p>
    <p>Amount: Rp {{ number_format($payment->amount, 0, ',', '.') }}</p>

    <div class="mb-3">
        <embed src="{{ asset('storage/' . $payment->proof_file) }}" type="application/pdf" width="100%" height="600px" />
    </div>

    <a href="{{ route('payment-proof.detail', ['id' => $payment->id]) }}" class="btn btn-info">View Details</a>
</div>
@endsection
