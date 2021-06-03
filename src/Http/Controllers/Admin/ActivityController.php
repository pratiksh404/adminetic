<?php

namespace Pratiksh\Adminetic\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Models\Activity;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ($this->isAuthorized()) {
            $activities = Activity::latest()->get();

            return view('adminetic::admin.activity.index', compact('activities'));
        } else {
            abort(403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        if ($this->isAuthorized()) {
            $activity->delete();

            return redirect(adminRedirectRoute('activity'))->withFail('Activity Deleted !');
        } else {
            abort(403);
        }
    }

    private function isAuthorized(): bool
    {
        return Auth::user()->hasRole('admin') || Auth::user()->isSuperAdmin();
    }

    public function delete_all_activities()
    {
        DB::table('activity_log')->delete();

        return redirect(adminRedirectRoute('activity'))->withSuccess('All Actitvities Deleted');
    }

    public function delete_last_month()
    {
        $start = new Carbon('first day of last month');
        $end = new Carbon('last day of last month');
        Activity::whereBetween('updated_at', [$start, $end])->delete();

        return redirect(adminRedirectRoute('activity'))->withSuccess('All activities of last month deleted.');
    }

    public function keep_this_month_activities()
    {
        $start = new Carbon('first day of last month');
        Activity::whereDate('updated_at', '<=', $start)->delete();

        return redirect(adminRedirectRoute('activity'))->withSuccess('All activities except this month.');
    }

    public function keep_latest_two_month_activities()
    {
        $date = Carbon::now()->subMonths(2);
        Activity::whereDate('updated_at', '<=', $date)->delete();

        return redirect(adminRedirectRoute('activity'))->withSuccess('All activities deleted except last 2 months.');
    }

    public function keep_latest_three_month_activities()
    {
        $date = Carbon::now()->subMonths(3);
        Activity::whereDate('updated_at', '<=', $date)->delete();

        return redirect(adminRedirectRoute('activity'))->withSuccess('All activities deleted except last 3 months.');
    }
}
