<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $orders = $user->orders()->with('items.product')->orderByDesc('created_at')->get();
        $downlines = $user->downlines()->get();

        return view('pages.dashboard', compact('user', 'orders', 'downlines'));
    }
}
