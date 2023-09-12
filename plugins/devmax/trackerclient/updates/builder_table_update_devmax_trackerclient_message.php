<?php namespace Devmax\TrackerClient\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDevmaxTrackerclientMessage extends Migration
{
    public function up()
    {
        Schema::table('devmax_trackerclient_message', function($table)
        {
            $table->renameColumn('message', 'text');
        });
    }
    
    public function down()
    {
        Schema::table('devmax_trackerclient_message', function($table)
        {
            $table->renameColumn('text', 'message');
        });
    }
}
