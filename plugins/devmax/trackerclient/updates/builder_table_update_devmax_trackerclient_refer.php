<?php namespace Devmax\TrackerClient\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDevmaxTrackerclientRefer extends Migration
{
    public function up()
    {
        Schema::rename('devmax_trackerclient_leads', 'devmax_trackerclient_refer');
    }
    
    public function down()
    {
        Schema::rename('devmax_trackerclient_refer', 'devmax_trackerclient_leads');
    }
}
