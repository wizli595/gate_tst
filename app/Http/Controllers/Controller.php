<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
//for lara 11
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    //for lara 11
    use AuthorizesRequests, ValidatesRequests;
}
