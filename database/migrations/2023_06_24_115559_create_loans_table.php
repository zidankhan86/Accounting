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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('loan_type_id')->constrained('loan_types');

            $table->foreignId('Authorities_name_id')->constrained('authorities');

            $table->foreignId('Account_name_id')->constrained('manage_accounts');

            $table->string('loan_reasion');
            $table->string('reference')->unique();
            $table->string('loan_amount');
            $table->string('interest');
            $table->string('payment_type');
            $table->string('duration')->nullable();
            $table->string('per_month')->nullable();
            $table->longText('note')->nullable();
            $table->string('account_number');
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
