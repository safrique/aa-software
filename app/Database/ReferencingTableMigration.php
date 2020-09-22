<?php

namespace App\Database;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

abstract class ReferencingTableMigration extends Migration
{
    /**
     * This has to be determined at inheritance
     *
     * @var string
     */
    protected $table;

    /**
     * Run the migrations.
     *
     * @return void
     */
    abstract function up();

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists($this->table);
        Schema::enableForeignKeyConstraints();
    }
}
