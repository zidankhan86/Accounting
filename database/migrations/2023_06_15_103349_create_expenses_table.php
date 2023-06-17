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
            ->constrained('expenses')
            ->restrictOnDelete()
            ->restrictOnUpdate();
            $table->string('payable',100);
            $table->string('expense_account',100);
            $table->longText('expense_type',1000);
            $table->text('item_name',1000);
            $table->string('item_price',100);
            $table->double('item_quantity',100);
            $table->string('status');
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
