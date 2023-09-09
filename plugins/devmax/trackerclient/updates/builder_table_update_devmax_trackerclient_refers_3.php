<?php namespace Devmax\TrackerClient\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDevmaxTrackerclientRefers3 extends Migration
{
    public function up()
    {
        Schema::table('devmax_trackerclient_refers', function($table)
        {
            $table->integer('sort_order');
        });
    }
    
    public function down()
    {
        Schema::table('devmax_trackerclient_refers', function($table)
        {
            $table->dropColumn('sort_order');
        });
    }
}
