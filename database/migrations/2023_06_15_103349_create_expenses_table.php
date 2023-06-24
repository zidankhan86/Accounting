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
            $table->foreignId('expense_id')
            ->nullable()
            ->constrained('expenses')
            ->restrictOnDelete()
            ->restrictOnUpdate();

            $table->foreignId('transaction_type_id')->constrained('account_types')
            ->nullable()
            ->restrictOnDelete()
            ->restrictOnUpdate();

            $table->string('payable', 100);
            $table->text('item_name', 1000);
            $table->string('item_price', 100);
            $table->double('item_quantity', 100);
            $table->boolean('status')->default(0);
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
