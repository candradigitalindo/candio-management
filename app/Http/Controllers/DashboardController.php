<?php

namespace App\Http\Controllers;

use App\Models\RouterOS;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $host   = 'id-24.hostddns.us:10642';
        $user   = 'nusantara';
        $pass   = '@Nusantara1234';
        $router = new RouterOS();
        $router->debug('false');
        if ($router->connect($host, $user, $pass)) {
            $identitas      = $router->comm('/system/identity/print');
            $routerModel    = $router->comm('/system/routerboard/print');
        } else {
            return 'gagal';
        }

        $data   = [
            'identitas'     => $identitas[0]['name'],
            'routerModel'   => $routerModel[0]['model']
        ];
        return view('pages.dashboard', $data);
    }
}
