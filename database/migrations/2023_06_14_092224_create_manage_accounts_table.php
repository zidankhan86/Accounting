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
        Schema::create('manage_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('account_holder_name',1000);
            $table->string('bank_name',100);
            $table->string('account_number',100);
            $table->string('opening_balance',100);
            $table->string('contact_number',100);
            $table->longText('bank_address',1000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manage_accounts');
    }
};
