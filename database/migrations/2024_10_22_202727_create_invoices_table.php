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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('folio');
            $table->date('expiration_at');
            $table->date('emition_at');
            $table->enum('currency', ['USD', 'MXN']);
            $table->decimal('exchange_rate', 8, 4);
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->decimal('total_amount');
            $table->decimal('pending_amount');
            $table->unsignedBigInteger('suplier_id');
            $table->foreign('suplier_id')->references('id')->on('suppliers')->onDelete('cascade');
            $table->string('description');
            $table->string('observations')->nullable();
            $table->integer('credit_days');
            $table->enum('status', ['pedient', 'concluded', 'cancel']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
