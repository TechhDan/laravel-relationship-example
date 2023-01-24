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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('content')->nullable(false);
            $table->string('category_name');
            $table->foreign('category_name')
                ->references('name')->on('categories')
                ->onDelete('cascade')
                ->onUpdate(null);

            $table->foreignId('corkhasersons_id')
                ->references('id')->on('categories')
                ->onDelete('cascade')
                ->onUpdate(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
};
