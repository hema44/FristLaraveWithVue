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
        Schema::create('to_dolists', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("notes");
            $table->date("date");
            $table->tinyInteger("status")->default(0)->comment("0 not completed 1 completed");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('to_dolists');
    }
};
