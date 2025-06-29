<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->string('code_order')->nullable()->unique();
            $table->string('midtrans_order_id')->nullable();

            // Informasi pengguna
            $table->string('email');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address', 500);
            $table->string('phone', 20);
            $table->text('notes')->nullable();

            // Total harga
            $table->decimal('total', 12, 2);
            $table->enum('order_status', ['pending', 'processing', 'completed', 'cancelled'])->default('pending');
            $table->enum('status',['unpaid','paid']);
            $table->string('payment_method')->nullable();
            $table->string('snap_token')->nullable();
            $table->timestamp('paid_at')->nullable();

            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};