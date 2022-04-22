<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'cities';

    /**
     * Run the migrations.
     * @table tax_code
     *
     * @return void
     */
    public function up()
    {
		if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->id();            
            $table->varchar('name');
            $table->integer('state_id');
            $table->integer('status');
			$table->dateTime('created_at');
			$table->timestamp('updated_at');
        });
		DB::unprepared( file_get_contents(public_path('/sql/cities.sql')));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->set_schema_table);
    }
}
