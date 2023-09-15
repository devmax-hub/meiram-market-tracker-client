<?php namespace Devmax\TrackerClient\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDevmaxTrackerclientSms extends Migration
{
    public function up()
    {
        Schema::table('devmax_trackerclient_sms', function($table)
        {
            $table->string('message');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->integer('parent_id')->nullable();
        });
    }

    public function down()
    {
        Schema::table('devmax_trackerclient_sms', function($table)
        {
            $table->dropColumn('message');
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
            $table->dropColumn('deleted_at');
            $table->dropColumn('parent_id');
        });
    }
}