<?php
namespace App\Controllers;
class Dashboard extends BaseController
{
    public function index()
    {
        $data["titulo"] = "Bienvenidos al sistema";
        return view("Dashboard/index", $data);

    }
}