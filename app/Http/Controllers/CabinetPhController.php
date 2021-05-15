<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CabinetPhController extends Controller
{  public function index()
    {
    return view('photographer.cabinet.myorders.index');
}
 public function show()
    {
    return view('photographer.cabinet.myorders.show');
}
public function order()
{
return view('photographer.cabinet.order.index');
}
public function showorder()
{
return view('photographer.cabinet.order.show');
}
public function myprofile()
{
return view('photographer.cabinet.myprofile.index');
}
public function portfolio()
{
return view('photographer.cabinet.myprofile.portfolio');
}
}
