<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    protected $service;

    public function index()
    {
        return view('admin.client.index');
    }
}
