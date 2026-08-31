<?php

use Hyperf\Database\Schema\Schema;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (! Schema::hasColumn('users', 'city')) {
                $table->string('city')->nullable();
            }

            if (! Schema::hasColumn('users', 'state')) {
                $table->char('state', 2)->nullable();
            }

            if (! Schema::hasColumn('users', 'postal_code')) {
                $table->string('postal_code', 9)->nullable();
            }

            if (! Schema::hasColumn('users', 'street')) {
                $table->string('street')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            foreach (['city', 'state', 'postal_code', 'street'] as $column) {
                if (Schema::hasColumn('users', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
