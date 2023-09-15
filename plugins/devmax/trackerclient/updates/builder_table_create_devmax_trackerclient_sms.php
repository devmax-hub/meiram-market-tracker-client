<?php namespace Devmax\TrackerClient\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDevmaxTrackerclientSms extends Migration
{
    public function up()
    {
        Schema::create('devmax_trackerclient_sms', function($table)
        {
            $table->increments('id')->unsigned();
            $table->dateTime('date');
            $table->boolean('status');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('devmax_trackerclient_sms');
    }
}