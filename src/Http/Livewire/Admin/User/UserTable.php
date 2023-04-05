<?php

namespace Pratiksh\Adminetic\Http\Livewire\Admin\User;

use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithPagination;
use Pratiksh\Adminetic\Models\Admin\Role;

class UserTable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $filter = 1;
    public $information;
    public $role;
    public $search;

    public function updatedSearch()
    {
        $this->filter = 2;
        $this->resetPage();
    }

    public function updatedRole()
    {
        $this->filter = 3;
        $this->resetPage();
    }

    public function render()
    {
        $users = $this->getUsers();
        $roles = Cache::get('roles', Role::latest()->get());

        return view('adminetic::livewire.admin.user.user-table', compact('users', 'roles'));
    }

    protected function getUsers()
    {
        $filter = $this->filter;
        $default = User::with('profile', 'roles');
        switch ($filter) {
            case 1:
                $data = $default->latest();
                break;
            case 2:
                $this->resetPage();
                $search = $this->search ?? null;
                $data = $default->where('name', 'like', '%'.$search.'%')
                    ->orWhere('email', 'like', '%'.$search.'%');
                $this->information = 'Showing search results for "'.$search.'"';
                break;
            case 3:
                $this->resetPage();
                $role_id = $this->role ?? null;
                $data = $role_id == '' ? $default : $default->whereHas('roles', function ($query) use ($role_id) {
                    $query->where('role_id', $role_id);
                });
                break;
            default:
                $data = $default->latest();
                break;
        }

        return $data->paginate(10);
    }
}
