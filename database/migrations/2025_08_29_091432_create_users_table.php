<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            // HANYA yang dibutuhkan aplikasi
            $table->string('username', 50)->unique();
            $table->string('password');                 // di-hash oleh mutator
            $table->boolean('is_admin')->default(false);
            $table->boolean('is_approved')->default(false);

            $table->rememberToken();                    // untuk “remember me”
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
