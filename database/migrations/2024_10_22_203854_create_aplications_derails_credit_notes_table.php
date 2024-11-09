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
        Schema::create('aplications_derails_credit_notes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('aplication_credit_id')->references('id')->on('aplications_credit_notes')->onDelete('cascade');
            $table->decimal('applied_amount');
            $table->foreignId('invoice_id')->constrained('invoices')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aplications_derails_credit_notes');
    }
};
