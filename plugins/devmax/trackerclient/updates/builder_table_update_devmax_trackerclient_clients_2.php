<?php namespace Devmax\TrackerClient\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDevmaxTrackerclientClients2 extends Migration
{
    public function up()
    {
        Schema::table('devmax_trackerclient_clients', function($table)
        {
            $table->dropColumn('sms');
        });
    }
    
    public function down()
    {
        Schema::table('devmax_trackerclient_clients', function($table)
        {
            $table->integer('sms')->nullable();
        });
    }
}
