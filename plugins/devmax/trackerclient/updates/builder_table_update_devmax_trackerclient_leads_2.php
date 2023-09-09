<?php namespace Devmax\TrackerClient\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDevmaxTrackerclientLeads2 extends Migration
{
    public function up()
    {
        Schema::table('devmax_trackerclient_leads', function($table)
        {
            $table->renameColumn('user_id', 'backend_users_id');
        });
    }
    
    public function down()
    {
        Schema::table('devmax_trackerclient_leads', function($table)
        {
            $table->renameColumn('backend_users_id', 'user_id');
        });
    }
}
