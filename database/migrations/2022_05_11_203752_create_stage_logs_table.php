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
        Schema::create('stage_logs', function (Blueprint $table) {
            $table->id();
            $table->timestamp('RxIN')->nullable();
            $table->timestamp('RxENDORSED')->nullable();
            $table->timestamp('RxBIODOSED')->nullable();
            $table->timestamp('PICKED')->nullable();
            $table->timestamp('PODDED')->nullable();
            $table->timestamp('CHECKED')->nullable();
            $table->timestamp('FINALCHECKED')->nullable();
            $table->timestamp('DELIVERED')->nullable();
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
        Schema::dropIfExists('stage_logs');
    }
};
