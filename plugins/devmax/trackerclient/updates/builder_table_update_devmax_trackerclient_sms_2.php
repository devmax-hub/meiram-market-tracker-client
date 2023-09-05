<?php namespace Devmax\TrackerClient\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDevmaxTrackerclientSms2 extends Migration
{
    public function up()
    {
        Schema::table('devmax_trackerclient_sms', function($table)
        {
            $table->integer('client_id');
        });
    }
    
    public function down()
    {
        Schema::table('devmax_trackerclient_sms', function($table)
        {
            $table->dropColumn('client_id');
        });
    }
}
