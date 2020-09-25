<?php

namespace App\Helpers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

class Helpers
{
    protected $table;

    public function __construct(Blueprint $table) { $this->table = $table; }

    public function getDefaultTimestamps()
    {
        return $this->table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))
               && $this->table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
    }
}
