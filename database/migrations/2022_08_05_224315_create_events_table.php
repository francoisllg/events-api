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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->uuid('licence_id')->nullable()->unique();
            $table->string('name', 255)->nullable('false');
            $table->string('url', 255)->nullable('false');
            $table->date('end_date')->nullable('false');
            $table->timestamps();

            $table->foreign('licence_id')->references('id')->on('licences')
            ->onUpdate('cascade')
            ->onDelete('set null');

            $table->foreign('user_id')->references('id')->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');

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
        Schema::dropIfExists('events');
    }
};
