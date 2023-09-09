<?php namespace Devmax\TrackerClient\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDevmaxTrackerclientClients3 extends Migration
{
    public function up()
    {
        Schema::table('devmax_trackerclient_clients', function($table)
        {
            $table->string('refer_id', 255)->nullable()->change();
            $table->string('phone', 255)->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('devmax_trackerclient_clients', function($table)
        {
            $table->string('refer_id', 255)->nullable(false)->change();
            $table->string('phone', 255)->nullable(false)->change();
        });
    }
}
