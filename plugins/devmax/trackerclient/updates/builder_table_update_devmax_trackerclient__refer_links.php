<?php namespace Devmax\TrackerClient\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDevmaxTrackerclientReferLinks extends Migration
{
    public function up()
    {
        Schema::table('devmax_trackerclient__refer_links', function($table)
        {
            $table->string('url', 255)->nullable()->change();
            $table->string('uid', 255)->nullable()->change();
            $table->integer('rating')->nullable()->change();
            $table->integer('counts')->nullable()->change();
            $table->integer('sucess_counts')->nullable()->change();
            $table->boolean('status')->default(true)->change();
        });
    }
    
    public function down()
    {
        Schema::table('devmax_trackerclient__refer_links', function($table)
        {
            $table->string('url', 255)->nullable(false)->change();
            $table->string('uid', 255)->nullable(false)->change();
            $table->integer('rating')->nullable(false)->change();
            $table->integer('counts')->nullable(false)->change();
            $table->integer('sucess_counts')->nullable(false)->change();
            $table->boolean('status')->default(null)->change();
        });
    }
}
