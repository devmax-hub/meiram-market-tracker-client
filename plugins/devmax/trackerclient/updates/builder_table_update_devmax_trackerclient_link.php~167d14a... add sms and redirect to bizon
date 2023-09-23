<?php namespace Devmax\TrackerClient\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDevmaxTrackerclientLink extends Migration
{
    public function up()
    {
        Schema::table('devmax_trackerclient_link', function($table)
        {
            $table->boolean('is_pressed')->default(false);
        });
    }
    
    public function down()
    {
        Schema::table('devmax_trackerclient_link', function($table)
        {
            $table->dropColumn('is_pressed');
        });
    }
}
