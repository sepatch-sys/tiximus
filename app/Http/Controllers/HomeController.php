<?php

namespace App\Http\Controllers;

use App\Models\CategoryProvince;
use Illuminate\Http\Request;
use App\Models\Ticket;

class HomeController extends Controller
{
    public function index()
    {
        $tickets = Ticket::latest()->take(5)->get();
        $provinces = CategoryProvince::latest()->take(5)->get();

        return view('welcome', compact('tickets'), compact('provinces'));
    }
}
