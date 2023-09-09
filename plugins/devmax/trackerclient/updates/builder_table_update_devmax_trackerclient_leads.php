<?php namespace Devmax\TrackerClient\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDevmaxTrackerclientLeads extends Migration
{
    public function up()
    {
        Schema::rename('devmax_trackerclient_users', 'devmax_trackerclient_leads');
    }
    
    public function down()
    {
        Schema::rename('devmax_trackerclient_leads', 'devmax_trackerclient_users');
    }
}
