<div>
    <div class="card shadow-lg">
        <div class="card-body p-2">
            <div class="row">
                <div class="col-lg-6">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fa fa-search"></i>
                        </span>
                        <input type="text" wire:model.debounce.500ms="search" id="search" class="form-control"
                            placeholder="Search name, email">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="input-group">
                        <span class="input-group-text">Role</span>
                        <select wire:model="role" class="form-control">
                            <option value="">All</option>
                            @isset($roles)
                            @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                            @endisset
                        </select>
                    </div>
                </div>
                {{$information ?? ''}}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div wire:ignore wire:loading.flex>
                <div style="width:100%;align-items: center;justify-content: center;">
                    <div class="loader-box" style="margin:auto">
                        <div class="loader-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div wire:loading.remove>
        @isset($users)
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>username</th>
                    <th>name</th>
                    <th>email</th>
                    <th>role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                @if (!$user->hasRole('superadmin'))
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->profile->username ?? 'N/A' }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->roles->first()->name ?? 'N/A' }}</td>

                    <td>
                        <x-adminetic-action :model="$user" route="user" />
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
        {{$users->links()}}
        @endisset
    </div>
</div>