<?php namespace Devmax\TrackerClient\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDevmaxTrackerclientUsers extends Migration
{
    public function up()
    {
        Schema::table('devmax_trackerclient_users', function($table)
        {
            $table->integer('user_id');
        });
    }
    
    public function down()
    {
        Schema::table('devmax_trackerclient_users', function($table)
        {
            $table->dropColumn('user_id');
        });
    }
}
