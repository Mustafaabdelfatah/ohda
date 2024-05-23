<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{

    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('model');
			$table->string('date')->nullable();
			$table->string('document')->nullable(); // مستند صرف
			$table->integer('quantity')->nullable();
			$table->string('page')->nullable();
            $table->longText('description')->nullable();
            $table->enum('ohda_status', ['added', 'removed'])->default('added'); //الموقف من العهده
            $table->enum('bosla', ['active', 'un_active'])->default('active');
            $table->enum('not_serial', ['active', 'un_active'])->default('active');
            $table->unsignedBigInteger('boslatype_id');
            $table->foreign('boslatype_id')->references('id')->on('bosla_types')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('items');
    }
}
