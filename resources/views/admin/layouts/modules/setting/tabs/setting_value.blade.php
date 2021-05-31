    @isset($setting_grouped)
        <form action="{{ route('setting_store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-3 tabs-responsive-side">
                    <div class="nav flex-column nav-pills border-tab nav-left" id="v-pills-tab" role="tablist"
                        aria-orientation="vertical">
                        @foreach ($setting_grouped as $index => $group)
                            <a class="nav-link {{ $loop->first ? 'active' : '' }}"
                                id="{{ strtolower(str_replace(' ', '_', $index)) }}-tab" data-bs-toggle="pill"
                                href="#{{ strtolower(str_replace(' ', '_', $index)) }}" role="tab"
                                aria-controls="{{ strtolower(str_replace(' ', '_', $index)) }}"
                                aria-selected="true">{{ $index }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        @foreach ($setting_grouped as $index => $group)
                            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                id="{{ strtolower(str_replace(' ', '_', $index)) }}" role="tabpanel"
                                aria-labelledby="{{ strtolower(str_replace(' ', '_', $index)) }}-tab">
                                <ul>
                                    @foreach ($group as $setting)
                                        @if ($setting->getRawOriginal('setting_type') == 1)
                                            @include('admin.layouts.modules.setting.components.string')
                                        @elseif ($setting->getRawOriginal ('setting_type') == 2)
                                            @include('admin.layouts.modules.setting.components.integer')
                                        @elseif ($setting->getRawOriginal ('setting_type') == 3)
                                            @include('admin.layouts.modules.setting.components.text')
                                        @elseif ($setting->getRawOriginal ('setting_type') == 4)
                                            @include('admin.layouts.modules.setting.components.rich_text')
                                        @elseif ($setting->getRawOriginal ('setting_type') == 5)
                                            @include('admin.layouts.modules.setting.components.switch')
                                        @elseif ($setting->getRawOriginal ('setting_type') == 6)
                                            @include('admin.layouts.modules.setting.components.checkbox')
                                        @elseif ($setting->getRawOriginal ('setting_type') == 7)
                                            @include('admin.layouts.modules.setting.components.select')
                                        @elseif ($setting->getRawOriginal ('setting_type') == 8)
                                            @include('admin.layouts.modules.setting.components.multiple')
                                        @elseif ($setting->getRawOriginal ('setting_type') == 9)
                                            @include('admin.layouts.modules.setting.components.tag')
                                        @elseif ($setting->getRawOriginal ('setting_type') == 10)
                                            @include('admin.layouts.modules.setting.components.image')
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </div>
                    <input type="submit" value="Save Settings" class="btn btn-primary btn-air-primary">
                </div>
            </div>
        </form>
    @endisset
