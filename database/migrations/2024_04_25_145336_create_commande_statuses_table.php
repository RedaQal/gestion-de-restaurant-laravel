<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('commande_statuses', function (Blueprint $table) {
            $table->id('id_commande_statuse');

            $table->enum('status',['en cours','valide','payer'])->default('en cours');
            
            $table->foreignId('id_commande')->constrained(
                table :'commandes',
                column :'id_commande',
                indexName :'fk_commande_status_commande_id',
            )->onDelete('cascade');

            $table->foreignId('id_serveur')->nullable()->constrained(
                table :'serveurs',
                column :'id_serveur',
                indexName :'fk_commande_status_id_serveur',
            )->onDelete('cascade');

            $table->foreignId('id_cuisinier')->nullable()->constrained(
                table :'cuisiniers',
                column :'id_cuisinier',
                indexName :'fk_commande_status_id_cuisinier',
            )->onDelete('cascade');

            $table->foreignId('id_caissiere')->nullable()->constrained(
                table :'caissieres',
                column :'id_caissiere',
                indexName :'fk_commande_status_id_caissiere',
            )->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commande_statuses');
    }
};
