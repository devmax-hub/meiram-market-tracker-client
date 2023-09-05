<?php namespace Devmax\TrackerClient\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDevmaxTrackerclientClients extends Migration
{
    public function up()
    {
        Schema::table('devmax_trackerclient_clients', function($table)
        {
            $table->integer('sms')->nullable()->unsigned(false)->default(null)->comment(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('devmax_trackerclient_clients', function($table)
        {
            $table->dateTime('sms')->nullable()->unsigned(false)->default(null)->comment(null)->change();
        });
    }
}
