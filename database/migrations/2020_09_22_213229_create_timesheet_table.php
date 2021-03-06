<?php

use App\Database\ReferencingTableMigration;
use App\Helpers\Helpers;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTimesheetTable extends ReferencingTableMigration
{
    protected $table = 'timesheet';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            $this->table,
            function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('project_id');
                $table->timestamp('started_at')->default(DB::raw('CURRENT_TIMESTAMP'));
                $table->timestamp('ended_at')->default(DB::raw('CURRENT_TIMESTAMP'));
                $table->unsignedBigInteger('duration')->default(DB::raw('timediff(started_at, ended_at)'));
                $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
                $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));

                $table->foreign('project_id')->references('id')->on('projects');
            }
        );
    }
}
