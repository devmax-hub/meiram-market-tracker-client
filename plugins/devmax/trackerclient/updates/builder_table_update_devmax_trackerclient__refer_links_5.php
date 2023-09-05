<?php namespace Devmax\TrackerClient\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDevmaxTrackerclientReferLinks5 extends Migration
{
    public function up()
    {
        Schema::table('devmax_trackerclient__refer_links', function($table)
        {
            $table->string('url', 1000)->change();
            $table->string('mod_url', 1000)->change();
        });
    }
    
    public function down()
    {
        Schema::table('devmax_trackerclient__refer_links', function($table)
        {
            $table->string('url', 255)->change();
            $table->string('mod_url', 255)->change();
        });
    }
}
