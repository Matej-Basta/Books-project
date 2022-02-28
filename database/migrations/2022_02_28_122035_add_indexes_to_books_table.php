<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->unique(["slug", "isbn"]);
            $table->index(["title", "price", "publication_date"]);
            $table->fullText("description");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropIndex("books_slug_isbn_unique");
            $table->dropIndex("books_title_price_publication_date_index");
            $table->dropIndex("books_description_fulltext");
        });
    }
};
