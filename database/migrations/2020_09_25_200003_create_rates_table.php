<?php

use App\Database\ReferencingTableMigration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateRatesTable extends ReferencingTableMigration
{
    protected $table = 'rates';

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
                $table->double('rate', 7, 2);
                $table->unsignedBigInteger('type_id');
                $table->boolean('is_active')->default(true);
                $table->timestamp('start');
                $table->timestamp('end')->nullable();
                $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
                $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));

                $table->foreign('type_id')->references('id')->on('rate_types');
            }
        );
    }
}
