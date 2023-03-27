<?php

namespace Pratiksh\Adminetic\Http\Livewire\Admin\Activity;

use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Activitylog\Models\Activity;

class ActivityTable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $log_name;
    public $log_names;

    public $description;

    public $model;
    public $models;

    public $user_id;
    public $users;

    public $start_date;
    public $end_date;
    public $data;
    public $interval = 30;
    public $to_from = 1;
    public $delete_limit = 30;

    public $activity_count = 0;

    protected $listeners = ['date_range_filter' => 'dateRangeFilter', 'date_filter' => 'dateFilter'];

    public function mount($model = null)
    {
        $this->model = $model;
        $activities = Activity::all();
        $this->log_names = array_unique($activities->pluck('log_name')->toArray());
        $this->models = array_unique($activities->pluck('subject_type')->toArray());
        $this->users = User::find($activities->pluck('causer_id')->toArray());
    }

    public function deleteAll()
    {
        Activity::truncate();
        $this->emit('activity_success', 'All Activities Deleted Successfully');
    }

    public function deleteWithLimit()
    {
        if (! is_null($this->delete_limit)) {
            Activity::whereDate('created_at', '<', Carbon::now()->subDays($this->delete_limit))->delete();
            $this->emit('activity_success', 'All activities Deleted except last '.$this->delete_limit.'days activities');
        }
    }

    public function dateFilter($date)
    {
        $date = Carbon::create($date);
        $to_from = $this->to_from;

        if ($to_from == 1) {
            $this->start_date = $date;
            $this->end_date = $date->addDays($this->interval ?? 30);
        } elseif ($to_from == 2) {
            $this->end_date = $date;
            $this->start_date = $date->subDays($this->interval ?? 30);
        }
    }

    public function dateRangeFilter($start_date, $end_date)
    {
        $this->start_date = Carbon::create($start_date);
        $this->end_date = Carbon::create($end_date);
    }

    public function deleteActivity(Activity $activity)
    {
        $activity->delete();
        $this->emit('activity_success', 'Activity Deleted Successfully');
    }

    public function render()
    {
        $activities = $this->getActivities();

        return view('adminetic::livewire.admin.activity.activity-table', compact('activities'));
    }

    private function getActivities()
    {
        $this->resetPage();
        $data = Activity::query();
        // Filter By Log Name
        if (! is_null($this->log_name)) {
            $data = $data->where('log_name', $this->log_name);
        }
        // Filter By Model
        if (! is_null($this->model)) {
            $data = $data->where('subject_type', $this->model);
        }
        // Filter By User
        if (! is_null($this->user_id)) {
            $data = $data->where('causer_id', $this->user_id);
        }
        // Filter By Date
        if (! is_null($this->start_date) && ! is_null($this->end_date)) {
            $data = $data->whereDate('created_at', [$this->start_date, $this->end_date]);
        }
        $this->activity_count = with($data)->count();
        $this->emit('initialize_activity');

        return
            $data->latest()->paginate(10);
    }
}
