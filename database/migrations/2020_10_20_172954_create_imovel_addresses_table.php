<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImovelAddressesTable extends Migration
{
    public function up()
    {
        Schema::create('imovel_addresses', function (Blueprint $table) {
            $table->id();
            $table->integer('imovel_id')->unsigned();
            $table->foreign('imovel_id')->references('id')->on('imoveis')->onDelete('cascade');
            $table->string('cep');
            $table->string('city');
            $table->string('neigh');
            $table->string('lat');
            $table->string('long');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('imovel_address', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
