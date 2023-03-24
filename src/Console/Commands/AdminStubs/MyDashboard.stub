<?php

namespace App\Services;

use Pratiksh\Adminetic\Contracts\DashboardInterface;

class MyDashboard implements DashboardInterface
{
    public function view()
    {
        $view = view()->exists('admin.dashboard.index') ? 'admin.dashboard.index' : 'admin.dashboard.index';
        return view($view);
    }
}
