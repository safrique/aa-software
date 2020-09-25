<?php

use App\Database\ReferencingTableMigration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends ReferencingTableMigration
{
    protected $table = 'projects';

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
                $table->string('project');
                $table->unsignedBigInteger('client_id');
                $table->unsignedBigInteger('contact_id');
                $table->unsignedBigInteger('company_id')->nullable();
                $table->unsignedDouble('weekly_hours', 3, 1)->nullable();
                $table->boolean('is_active')->default(true);
                $table->timestamp('planned_start')->nullable();
                $table->timestamp('actual_start')->nullable();
                $table->timestamp('planned_end')->nullable();
                $table->timestamp('actual_end')->nullable();
                $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
                $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));

                $table->foreign('client_id')->references('id')->on('clients');
                $table->foreign('company_id')->references('id')->on('companies');
                $table->foreign('contact_id')->references('id')->on('client_contacts');
            }
        );
    }
}
