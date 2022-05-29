<?php

use App\Models\Carehome;
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
        Schema::create('carehomes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('total_patients');
            $table->date('delivery_date');
            $table->foreignId('current_stage_id')->references('id')->on('carehome_stages')->cascadeOnDelete();
            $table->foreignId('stage_log_id')->default(1)->references('id')->on('stage_logs')->cascadeOnDelete();
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
        Schema::dropIfExists('carehomes');
    }
};
