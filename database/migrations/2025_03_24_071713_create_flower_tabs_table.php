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
        Schema::create('flower_tabs', function (Blueprint $table) {
            $table->id();

            $table->string('label');
            $table->text('description');
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
        Schema::dropIfExists('flower_tabs');
    }
};
