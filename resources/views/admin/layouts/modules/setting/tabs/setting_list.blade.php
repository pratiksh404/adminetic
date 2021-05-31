            <table class="table table-striped table-bordered datatable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Group</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($settings as $setting)
                        <tr>
                            <td>{{ $setting->setting_name }}</td>
                            <td>{{ $setting->setting_type }}</td>
                            <td>{{ $setting->setting_group }}</td>
                            <td>
                                <x-admin.action :model="$setting" route="setting" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Group</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
            </table>
