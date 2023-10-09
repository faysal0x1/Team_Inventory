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
        Schema::create('users', function (Blueprint $table) {
           $table->id();

           $table->string('name',50);
           $table->string('user_name',50)->unique()->nullable();
           $table->string('email')->unique();
           $table->string('password');
           $table->string('otp')->default(0);
           $table->string('phone')->nullable();
           $table->string('address')->nullable();
           $table->string('image')->nullable();
           $table->boolean('is_verified')->default(false);
           $table->enum('role',['admin','supplier','customer','user'])->default('user');
          
           $table->boolean('status')->default(0);

           $table->rememberToken()->nullable();

           $table->timestamp('created_at')->useCurrent();
           $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
