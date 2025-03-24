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
        Schema::create('classifications', function (Blueprint $table) {
            $table->id();
            
            $table->string('label');
            $table->string('description');
            $table->foreignIdFor(\App\Models\Flower::class)->constrained();
            $table->foreignIdFor(\App\Models\User::class)->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('classifications', function(Blueprint $table) {
        //     $table->dropForeignIdFor(\App\Models\Flower::class);
        // });

        // Schema::table('classifications', function(Blueprint $table) {
        //     $table->dropForeignIdFor(\App\Models\User::class);
        // });

        Schema::dropIfExists('classifications');
    }
};
