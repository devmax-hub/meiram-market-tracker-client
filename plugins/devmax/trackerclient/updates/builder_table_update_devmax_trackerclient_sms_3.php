<?php namespace Devmax\TrackerClient\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDevmaxTrackerclientSms3 extends Migration
{
    public function up()
    {
        Schema::table('devmax_trackerclient_sms', function($table)
        {
            $table->renameColumn('client_id', 'parent_id');
        });
    }
    
    public function down()
    {
        Schema::table('devmax_trackerclient_sms', function($table)
        {
            $table->renameColumn('parent_id', 'client_id');
        });
    }
}
