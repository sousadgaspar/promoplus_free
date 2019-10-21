<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSMSCampaignReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SMS_campaign_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('campaign_id')->nullable();
            $table->string('SMS_id')->nullable();
            $table->string('from');
            $table->string('to');
            $table->text('sms_content')->nullable();
            $table->string('message_status')->nullable();
            $table->string('error_code')->nullable();
            $table->integer('user_id');
            $table->integer('company_id');
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
        Schema::dropIfExists('reports');
    }
}
