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
        Schema::create('produit_imgs', function (Blueprint $table) {
            $table->id("id_img");
            $table->string("url");
            $table->foreignId("id_produit")->constrained(
                table: "produits",
                column: "id_produit",
                indexName: "fk_produit_img"
            )->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produit_imgs');
    }
};
