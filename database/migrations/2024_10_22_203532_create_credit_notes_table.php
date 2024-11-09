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
        Schema::create('credit_notes', function (Blueprint $table) {
            $table->id();

            $table->decimal('pending_amount');
            $table->string('concept');
            $table->enum('currency', ['MXN', 'USD']);
            $table->decimal('exchange_rate', 8, 4);
            $table->foreignId('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->decimal('total_amount');
            $table->unsignedBigInteger('suplier_id');
            $table->foreign('suplier_id')->references('id')->on('suppliers')->onDelete('cascade');
            $table->string('folio');
            $table->string('observations');
            $table->enum('status', ['pendient', 'concluded', 'cancel']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credit_notes');
    }
};
