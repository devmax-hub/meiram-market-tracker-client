<?php namespace Devmax\TrackerClient\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDevmaxTrackerclientReferLinks2 extends Migration
{
    public function up()
    {
        Schema::table('devmax_trackerclient__refer_links', function($table)
        {
            $table->integer('sort_order');
        });
    }
    
    public function down()
    {
        Schema::table('devmax_trackerclient__refer_links', function($table)
        {
            $table->dropColumn('sort_order');
        });
    }
}
