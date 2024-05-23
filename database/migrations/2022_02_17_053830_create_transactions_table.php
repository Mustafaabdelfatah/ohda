<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
            $table->string('main_place')->nullable();
            $table->string('sub_place')->nullable();
            $table->string('ram')->nullable();
            $table->string('cpu')->nullable();
            $table->string('hd')->nullable();
            $table->string('screen_type')->nullable();
            $table->string('screen_title')->nullable();
            $table->enum('status', ['new', 'old' , 'used'])->default('new'); // الحاله الفنيه
            $table->integer('quantity')->nullable();
            $table->string('sn')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
