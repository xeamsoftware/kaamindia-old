<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanBookTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'plan_book';

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
            $table->integer('plan_id');
            $table->integer('user_id');
            $table->date('start_date');
            $table->date('end_date');            
			$table->integer('payment')->default('0') ;    			
			$table->dateTime('created_at');
			$table->timestamp('updated_at');
        });		
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
