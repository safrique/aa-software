<?php

namespace App\Services\Clients;

use App\Models\Client;

class ClientService
{
    public function get() { return Client::get()->toArray(); }
}
