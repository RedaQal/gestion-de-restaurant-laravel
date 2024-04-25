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
        Schema::create('produit_commandes', function (Blueprint $table) {
            $table->id();
            $table->integer("quantite");
            $table->foreignId('id_produit')->constrained(
                table: 'produits',
                column: 'id',
                indexName: 'fk_produit_commandes_produits',
            )->onDelete('cascade');
            $table->foreignId('id_commande')->constrained(
                table: 'commandes',
                column: 'id',
                indexName: 'fk_produit_commandes_commandes',
            )->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produit_commandes');
    }
};
