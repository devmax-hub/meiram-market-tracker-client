<?php namespace Devmax\TrackerClient\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDevmaxTrackerclientReferLinks3 extends Migration
{
    public function up()
    {
        Schema::table('devmax_trackerclient__refer_links', function($table)
        {
            $table->string('mod_url')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('devmax_trackerclient__refer_links', function($table)
        {
            $table->dropColumn('mod_url');
        });
    }
}
