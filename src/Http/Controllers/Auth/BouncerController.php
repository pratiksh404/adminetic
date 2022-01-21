<?php

namespace Pratiksh\Adminetic\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BouncerController extends Controller
{
    /**
     * Bouncer verfication page.
     */
    public function verification_page()
    {
        return view('adminetic::admin.auth.verification_page');
    }

    /**
     * Bouncer Verfication.
     */
    public function verification(Request $request)
    {
        $request->validate([
            'verfication_code' => 'required',
        ]);
        if ($request->has('verfication_code')) {
            $credential = (session()->has('destination_password') ? session()->get('destination_password') : config('adminetic.default_bouncer_credential', 'adminetic'));
            if ($request->verfication_code == $credential) {
                $verified_routes = session()->get('verified_routes') ?? [];
                $destination_route = session()->has('destination_route') ? session()->get('destination_route') : url()->previous();
                array_push($verified_routes, $destination_route);
                session()->put('verified_routes', array_unique($verified_routes));

                return redirect()->to($destination_route)->withSuccess('Verified Successfully');
            } else {
                return redirect()->back()->withFail('Invalid Verfication Code');
            }
        }
    }
}
