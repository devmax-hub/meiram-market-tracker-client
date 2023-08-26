<?php namespace SunLab\BackendPreRegistration\Updates;

use October\Rain\Support\Facades\Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateAdditionalFieldsTable extends Migration
{
    public function up()
    {
        Schema::create('sunlab_backendpreregistration_additional_fields', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->json('data')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sunlab_backendpreregistration_additional_fields');
    }
}
