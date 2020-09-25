<?php

use App\Database\ReferencingTableMigration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCompanyContactsTable extends ReferencingTableMigration
{
    protected $table = 'company_contacts';

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
                $table->unsignedBigInteger('company_id');
                $table->string('first_name', 50);
                $table->string('surname', 50);
                $table->string('phone', 20);
                $table->string('email', 100);
                $table->string('address')->nullable();
                $table->string('postcode', 10)->nullable();
                $table->boolean('is_active')->default(true);
                $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
                $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));

                $table->foreign('company_id')->references('id')->on('companies');
            }
        );
    }
}
