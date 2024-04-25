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
        Schema::create('produits', function (Blueprint $table) {
            $table->id("id_produit");
            $table->string("label");
            $table->text("description");
            $table->decimal("prix");
            $table->foreignId("id_categorie")->constrained(
                table :"categories",
                column:"id_categorie",
                indexName :'fk_produit_categorie'
            )->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
