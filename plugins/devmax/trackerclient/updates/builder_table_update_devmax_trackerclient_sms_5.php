<?php namespace Devmax\TrackerClient\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDevmaxTrackerclientSms5 extends Migration
{
    public function up()
    {
        Schema::table('devmax_trackerclient_sms', function($table)
        {
            $table->renameColumn('parent_id', 'parent');
        });
    }
    
    public function down()
    {
        Schema::table('devmax_trackerclient_sms', function($table)
        {
            $table->renameColumn('parent', 'parent_id');
        });
    }
}
