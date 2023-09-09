<?php namespace Devmax\TrackerClient\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDevmaxTrackerclientSms4 extends Migration
{
    public function up()
    {
        Schema::table('devmax_trackerclient_sms', function($table)
        {
            $table->dateTime('date')->nullable()->change();
            $table->boolean('status')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('devmax_trackerclient_sms', function($table)
        {
            $table->dateTime('date')->nullable(false)->change();
            $table->boolean('status')->nullable(false)->change();
        });
    }
}
