<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTypeTable extends Migration
{
    public function up()
    {
        Schema::create('assets_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

    }
    public function down()
    {
        Schema::dropIfExists('assets_type');
    }
}
