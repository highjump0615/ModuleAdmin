<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVersionsTable extends Migration
{
    public static $tableName = 'versions';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(CreateVersionsTable::$tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('version');
            $table->string('description');
            $table->string('url')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(CreateVersionsTable::$tableName);
    }
}
