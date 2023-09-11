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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('expense_id');

            $table->foreignId('expense_type_id');

            $table->double('amount')->nullable();
            $table->double('due')->nullable();
            $table->string('account_name');
            $table->string('account_number');
            $table->string('payable', 100);
            $table->text('item_name', 1000);
            $table->string('item_price', 100);
            $table->double('quanity', 100);
            $table->boolean('status')->default(0);
            $table->date('date');
            $table->longText('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
