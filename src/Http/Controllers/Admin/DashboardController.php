<?php

namespace Pratiksh\Adminetic\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $view = null;
        $dashboard = \App\Services\MyDashboard::class;
        if (class_exists($dashboard)) {
            if (method_exists($dashboard, 'view')) {
                $my_dashboard = new $dashboard;
                $view = $my_dashboard->view();
            } else {
                throw new Exception('view method is not found', 1);
            }
        }

        return $view ?? view('adminetic::admin.dashboard.index');
    }
}
