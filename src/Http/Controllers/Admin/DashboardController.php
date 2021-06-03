<?php

namespace Pratiksh\Adminetic\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('adminetic::admin.dashboard.index');
    }
}
