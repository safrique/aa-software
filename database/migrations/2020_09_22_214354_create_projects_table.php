<?php

use App\Database\ReferencingTableMigration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends ReferencingTableMigration
{
    /**
     * CreateProjectsTable constructor.
     */
    public function __construct() { $this->table = 'projects'; }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            $this->table,
            function (Blueprint $table) {
                $table->id();
                $table->string('project');

                $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
                $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            }
        );
    }
}
