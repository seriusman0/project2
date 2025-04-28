@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Upload New Payment Proof</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.payment-proofs.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="invoice_number" class="form-label">Invoice Number</label>
            <input type="text" class="form-control" id="invoice_number" name="invoice_number" value="{{ old('invoice_number') }}" required>
        </div>

        <div class="mb-3">
            <label for="student_id" class="form-label">Student ID (NIS)</label>
            <input type="text" class="form-control" id="student_id" name="student_id" value="{{ old('student_id') }}" maxlength="10" pattern="\d{10}" required>
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Amount (Rp)</label>
            <input type="number" class="form-control" id="amount" name="amount" value="{{ old('amount') }}" min="0" step="0.01" required>
        </div>

        <div class="mb-3">
            <label for="payment_date" class="form-label">Payment Date</label>
            <input type="date" class="form-control" id="payment_date" name="payment_date" value="{{ old('payment_date') }}" required>
        </div>

        <div class="mb-3">
            <label for="proof_file" class="form-label">Proof File (PDF)</label>
            <input type="file" class="form-control" id="proof_file" name="proof_file" accept="application/pdf" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>
                <option value="paid" {{ old('status') == 'paid' ? 'selected' : '' }}>Paid</option>
                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="failed" {{ old('status') == 'failed' ? 'selected' : '' }}>Failed</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="notes" class="form-label">Notes</label>
            <textarea class="form-control" id="notes" name="notes">{{ old('notes') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Upload</button>
        <a href="{{ route('admin.payment-proofs.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
