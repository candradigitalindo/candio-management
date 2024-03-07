<?php

namespace App\Http\Controllers;

use App\Models\RouterOS;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // $host   = env('MIKROTIK_HOST');
        // $user   = env('MIKROTIK_USER');
        // $pass   = env('MIKROTIK_PASS');
        // $router = new RouterOS();
        // $router->debug('false');
        // if ($router->connect($host, $user, $pass)) {
        //     $identitas      = $router->comm('/system/identity/print');
        //     $routerModel    = $router->comm('/system/routerboard/print');
        // } else {
        //     return 'gagal';
        // }

        // $data   = [
        //     'identitas'     => $identitas[0]['name'],
        //     'routerModel'   => $routerModel[0]['model']
        // ];
        return view('pages.dashboard');

    }
}
