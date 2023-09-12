<?php namespace Devmax\TrackerClient\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDevmaxTrackerclientMessage2 extends Migration
{
    public function up()
    {
        Schema::table('devmax_trackerclient_message', function($table)
        {
            $table->string('title');
        });
    }
    
    public function down()
    {
        Schema::table('devmax_trackerclient_message', function($table)
        {
            $table->dropColumn('title');
        });
    }
}
