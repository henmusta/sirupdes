<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create{Modules}Table extends Migration
{
    public function up()
    {
        Schema::create('{modules}', function (Blueprint $table) {
            $table->char('id', 32)->primary();
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('{modules}');
    }
}
