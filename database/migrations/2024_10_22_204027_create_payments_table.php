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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('suplier_id');
            $table->foreign('suplier_id')->references('id')->on('suppliers')->onDelete('cascade');
            $table->date('date_aplyed');
            $table->enum('currency', ['MXN', 'USD']);
            $table->decimal('exchange_rate', 8, 4);
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');            
            $table->string('observations');
            $table->enum('status', ['cancel', 'concluded']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
