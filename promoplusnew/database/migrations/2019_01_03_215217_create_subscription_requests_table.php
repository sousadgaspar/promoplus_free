<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('plan_id');
            $table->integer('company_id');
            $table->string('status')->default('pending');
            $table->string('paymentConfirmationDocument');
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
        Schema::dropIfExists('subscription_requests');
    }
}
