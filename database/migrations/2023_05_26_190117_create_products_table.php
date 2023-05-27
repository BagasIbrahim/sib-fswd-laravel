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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->nullable();
            $table->string('name_product', 100);
            $table->string('description', 255);
            $table->string('image', 100)->nullable();
            $table->decimal('price', 10, 2);
            $table->enum('status', ['accepted', 'rejected', 'waiting']);
            $table->timestamps();
            $table->foreignId('created_by')->constrained('users')->nullable();
            $table->dateTime('verified_at')->nullable();
            $table->foreignId('verified_by')->constrained('users')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
