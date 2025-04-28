@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Payment Proof Management</h1>

    <a href="{{ route('admin.payment-proofs.create') }}" class="btn btn-primary mb-3">Upload New Payment Proof</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Invoice Number</th>
                <th>Student ID (NIS)</th>
                <th>Amount</th>
                <th>Payment Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
            <tr>
                <td>{{ $payment->invoice_number }}</td>
                <td>{{ $payment->student_id }}</td>
                <td>Rp {{ number_format($payment->amount, 0, ',', '.') }}</td>
                <td>{{ \Carbon\Carbon::parse($payment->payment_date)->format('d M Y') }}</td>
                <td>{{ ucfirst($payment->status) }}</td>
                <td>
                    <a href="{{ route('admin.payment-proofs.edit', $payment->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.payment-proofs.destroy', $payment->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $payments->links() }}
</div>
@endsection
