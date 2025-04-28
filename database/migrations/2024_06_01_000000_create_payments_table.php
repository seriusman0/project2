<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number')->unique();
            $table->string('student_id', 10);
            $table->decimal('amount', 15, 2);
            $table->date('payment_date');
            $table->string('proof_file');
            $table->enum('status', ['paid', 'pending', 'failed'])->default('pending');
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->index('student_id');
            $table->index('payment_date');
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
