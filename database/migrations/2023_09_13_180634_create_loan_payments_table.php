<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('loan_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Account_name_id');
            $table->foreignId('Authorities_name_id');
            $table->foreignId('expense_id');
            $table->foreignId('loan_id');
            $table->string('loan_amount');
            $table->string('loan_payment');
            $table->date('date');
            $table->boolean('status');
            $table->string('note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_payments');
    }
};
