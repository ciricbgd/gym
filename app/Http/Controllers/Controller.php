<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\MenuModel;

class Controller extends BaseController
{
    public $data=[];

    public function __construct(){
        $menu = new MenuModel();
        $this->data['home'] = $menu->getHome();
        $this->data['nav'] = $menu->getAnchor();
    }
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
