<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistributionLists extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distribution_lists', function (Blueprint $table) {

            $table->increments('id');

            $table->string('name')->unique();

            $table->text('description')->nullable();

            $table->timestamps();

        });


        Schema::create('contact_distribution_list', function (Blueprint $table) {

            $table->integer('contact_id');

            $table->integer('distribution_list_id');

            $table->primary(['contact_id', 'distribution_list_id'], 'joiner_cl');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
