<?php

use App\Database\ReferencingTableMigration;
use App\Helpers\Helpers;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends ReferencingTableMigration
{
    protected $table = 'clients';

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
                $table->string('client_name');
                $table->boolean('is_active')->default(true);
                $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
                $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            }
        );
    }
}
