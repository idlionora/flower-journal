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
        Schema::create('flowers', function (Blueprint $table) {
            $table->id();

            $table->string('name_common');
            $table->string('name_species');
            $table->string('photo_path');
            $table->string('photo_title');
            $table->string('classification_title');
            $table->foreignIdFor(\App\Models\User::class)->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('flowers', function(Blueprint $table) {
        //     $table->dropForeignIdFor(\App\Models\User::class);
        // });
        Schema::dropIfExists('flowers');
    }
};
