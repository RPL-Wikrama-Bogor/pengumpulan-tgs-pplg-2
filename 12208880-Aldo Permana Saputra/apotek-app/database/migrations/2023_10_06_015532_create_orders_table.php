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
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); //primary key auto increments
            $table->bigInteger('user_id');
            $table->json('medicines');
            $table->string('name_costumer');
            $table->integer('total_price');
            $table->timestamps();
            //akan menghasilkan dua column:
            //created_at(auto terisi tanggal pembuatan data)
            //update_at(auto terisi tanggal data diubah)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
