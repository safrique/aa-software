<?php

namespace App\Http\Controllers;

use App\Services\Clients\ClientService;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    private $clientService;

    public function __construct(ClientService $clientService) { $this->clientService = $clientService; }

    public function get() { return response($this->clientService->get(), 200); }
}
