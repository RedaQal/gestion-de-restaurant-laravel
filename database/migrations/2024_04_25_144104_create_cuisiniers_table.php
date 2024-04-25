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
        Schema::create('cuisiniers', function (Blueprint $table) {
            $table->id("id_cuisinier");
            $table->foreignId('id_employe')->constrained(
                table: 'employes',
                column : 'id_employe',
                indexName: 'fk_cuisinier_employe',
            )->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuisiniers');
    }
};
