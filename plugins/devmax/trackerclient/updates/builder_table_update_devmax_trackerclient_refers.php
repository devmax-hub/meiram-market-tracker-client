<?php namespace Devmax\TrackerClient\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDevmaxTrackerclientRefers extends Migration
{
    public function up()
    {
        Schema::rename('devmax_trackerclient_refer', 'devmax_trackerclient_refers');
    }
    
    public function down()
    {
        Schema::rename('devmax_trackerclient_refers', 'devmax_trackerclient_refer');
    }
}
