<?php namespace Devmax\TrackerClient\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDevmaxTrackerclientMessage3 extends Migration
{
    public function up()
    {
        Schema::table('devmax_trackerclient_message', function($table)
        {
            $table->string('url_bizon')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('devmax_trackerclient_message', function($table)
        {
            $table->dropColumn('url_bizon');
        });
    }
}