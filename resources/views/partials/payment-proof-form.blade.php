<section class="mb-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="bg-white p-4 rounded-3 shadow-sm">
        <h5 class="fw-bold text-center mb-4">Search Payment Proof</h5>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @isset($payment)
          <div class="mb-4">
            <h6 class="fw-bold">Latest Payment Proof</h6>
            <p>Invoice Number: {{ $payment->invoice_number }}</p>
            <p>Payment Date: {{ \Carbon\Carbon::parse($payment->payment_date)->format('d M Y') }}</p>
            <p>Amount: Rp {{ number_format($payment->amount, 0, ',', '.') }}</p>
            <div class="mb-3">
              <embed src="{{ asset('storage/' . $payment->proof_file) }}" type="application/pdf" width="100%" height="600px" />
            </div>
            <a href="{{ route('payment-proof.detail', ['id' => $payment->id]) }}" class="btn btn-success">View Details</a>
          </div>
        @endisset
        <form method="POST" action="{{ route('payment-proof.fetch') }}" class="mt-4">
          @csrf
          <div class="mb-4">
            <label for="nis" class="form-label fw-medium">NIS (10-digit Student ID)</label>
            <input type="text" class="form-control form-control-lg" id="nis" name="nis" maxlength="10" pattern="\d{10}" required value="{{ old('nis') }}" placeholder="Enter your 10-digit Student ID">
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-success btn-lg px-5">Search</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
