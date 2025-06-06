<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('checkout', function (Blueprint $table) {
            $table->id();
            
            // Data keranjang sebagai JSON
            $table->json('items');

            // Informasi pengguna
            $table->string('email');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address', 500);
            $table->string('phone', 20);
            $table->text('notes')->nullable();

            // Total harga
            $table->decimal('total', 12, 2);

            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('checkout');
    }
};