<?php

namespace Pratiksh\Adminetic\Http\Controllers;

use Exception;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
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
