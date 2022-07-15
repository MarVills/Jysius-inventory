<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredients', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('brand_id')->nullable();
            $table->integer('unit_id')->nullable();
            $table->integer('group_id')->nullable();
            $table->tinyInteger('taxable')->default(0);
            $table->string('tax_type');
            $table->boolean('tax_id')->nullable();
            $table->string('product_type');
            $table->integer('branch_id')->nullable();
            $table->string('imageURL')->nullable();
            $table->integer('created_by')->nullable();
            $table->timestamps();
            // $table->dateTime('created_at')->nullable();
            // $table->dateTime('updated_at')->nullable();

            // $table->integer('number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredients');
    }
}
