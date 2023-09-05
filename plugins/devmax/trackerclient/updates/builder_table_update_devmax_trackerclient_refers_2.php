<?php namespace Devmax\TrackerClient\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDevmaxTrackerclientRefers2 extends Migration
{
    public function up()
    {
        Schema::table('devmax_trackerclient_refers', function($table)
        {
            $table->dropColumn('parent_id');
        });
    }
    
    public function down()
    {
        Schema::table('devmax_trackerclient_refers', function($table)
        {
            $table->integer('parent_id')->default(0);
        });
    }
}
