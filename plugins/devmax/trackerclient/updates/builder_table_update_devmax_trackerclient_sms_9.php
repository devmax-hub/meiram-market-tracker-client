<?php namespace Devmax\TrackerClient\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDevmaxTrackerclientSms9 extends Migration
{
    public function up()
    {
        Schema::table('devmax_trackerclient_sms', function($table)
        {
            $table->integer('message_id')->nullable();
            $table->dropColumn('message');
        });
    }
    
    public function down()
    {
        Schema::table('devmax_trackerclient_sms', function($table)
        {
            $table->dropColumn('message_id');
            $table->string('message', 255);
        });
    }
}
