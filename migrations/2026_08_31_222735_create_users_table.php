<?php

use Hyperf\Database\Migrations\Migration;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Schema\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('users')) {
            return;
        }

        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('cpf', 14)->unique();
            $table->string('email')->unique();
            $table->string('phone', 20);
            $table->enum('status', ['DRAFT', 'ACTIVE', 'BLOCKED'])->default('DRAFT');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        if (Schema::hasTable('users')) {
            Schema::drop('users');
        }
    }
};
