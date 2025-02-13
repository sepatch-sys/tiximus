<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_province_id')->constrained('category_provinces')->onDelete('cascade');
            $table->foreignId('category_tourism_id')->constrained('category_tourisms')->onDelete('cascade');
            $table->string('name');
            $table->decimal('price', 13, 0);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tickets');
    }
};
