@isset($menus)
@if (count($menus) > 0)
@foreach ($menus as $menu)
@isset($menu['type'])
@if ($menu['type'] == 'breaker' || $menu['type'] == 'Breaker')
@if (isset($menu['conditions']) ? getCondition($menu['conditions']) : true)
<li class="sidebar-main-title">
    <div>
        @isset($menu['name'])
        <h6>{{ $menu['name'] }}</h6>
        @endisset
    </div>
</li>
@endif
@elseif($menu['type'] == 'link' || $menu['type'] == 'Link')
@isset($menu['link'])
@if (isset($menu['conditions']) ? getCondition($menu['conditions']) : true)
<li class="sidebar-list" style="margin-left:8px">
    <i class="fa fa-thumbtack"></i>
    @isset($menu['pill'])
    <label style=" margin-left: 5px" class="{{ $menu['pill']['class'] ?? '' }}">{{ $menu['pill']['value'] }}</label>
    @endisset
    <a class="sidebar-link sidebar-title link-nav router" href="{{ $menu['link'] }}">
        <i class="{{ $menu['icon'] ?? config('adminetic.default_menu_icon','fa fa-bars') }}" style="margin-right:8px">
        </i><span>{{ $menu['name'] ?? 'N/A' }}</span></a>
</li>
@endif
@endisset
@elseif ($menu['type'] == 'menu' || $menu['type'] == 'Menu')
@if (isset($menu['conditions']) ? getCondition($menu['conditions']) : true)
<li class="sidebar-list" style="margin-left:8px">
    <i class="fa fa-thumbtack"></i>
    @isset($menu['pill'])
    <label style="margin-left: 5px" class="{{ $menu['pill']['class'] ?? '' }}">{{ $menu['pill']['value'] }}</label>
    @endisset
    <a class="sidebar-link sidebar-title {{ $menu['is_active'] ?? '' }}" href="#">
        <i class="{{ $menu['icon'] ?? config('adminetic.default_menu_icon','fa fa-bars') }}"
            style="margin-right:8px"></i>
        <span>{{ $menu['name'] ?? 'N/A' }} </span>
    </a>
    @isset($menu['children'])
    @if (count($menu['children']) > 0)
    <ul class="sidebar-submenu">
        @foreach ($menu['children'] as $submenu)
        @if (isset($submenu['conditions']) ? getCondition($submenu['conditions']) : true)
        @isset($submenu['link'])
        <li>
            <i class="config('adminetic.default_submenu_icon','fa fa-angle-double-right')"></i>
            <a href="{{ $submenu['link'] }}" class="item-nav {{ $submenu['is_active'] ?? '' }} router">{{
                $submenu['name'] ??
                'N/A'
                }}</a>
        </li>
        @endisset
        @endif
        @endforeach
    </ul>
    @endif
    @endisset
</li>
@endif
@elseif($menu['type'] == "megamenu" || $menu['type'] == "MegaMenu")
@isset($menu['menus'])
@if (isset($menu['conditions']) ? getCondition($menu['conditions']) : true)
<li class="mega-menu" style="margin-left:8px"><a class="sidebar-link sidebar-title" href="#">
        <i class="fa fa-thumbtack"></i>
        <i class="{{$menu['icon'] ?? config('adminetic.default_menu_icon','fa fa-bars')}}" style="margin-right:8px"></i>
        <span>{{$menu['name'] ?? 'Mega Menu'}}</span>
    </a>
    <div class="mega-menu-container menu-content">
        <div class="container-fluid">
            <div class="row">
                @isset($menu['menus'])
                @foreach($menu['menus'] as $mega_menu_item)
                @if ($mega_menu_item['type'] == 'link' || $mega_menu_item['type'] == 'Link')
                @if (isset($mega_menu_item['conditions']) ? getCondition($mega_menu_item['conditions']) : true)
                <a href="{{ $mega_menu_item['link'] }}" class="router">
                    <i class="{{ $mega_menu_item['icon'] ?? config('adminetic.default_menu_icon','fa fa-bars') }}">
                    </i><span>{{ $mega_menu_item['name'] ?? 'N/A' }}</span></a>
                @isset($mega_menu_item['pill'])
                <label style="margin-left: 5px" class="{{ $mega_menu_item['pill']['class'] ?? '' }}">{{
                    $mega_menu_item['pill']['value']
                    }}</label>
                @endisset
                @endif
                @elseif ($mega_menu_item['type'] == 'menu' || $mega_menu_item['type'] == 'Menu')
                @if (isset($mega_menu_item['conditions']) ? getCondition($mega_menu_item['conditions']) : true)
                <div class="col mega-box">
                    <div class="link-section">
                        <div class="submenu-title">
                            <a class="{{ $mega_menu_item['is_active'] ?? '' }}" href="#">
                                <i
                                    class="{{ $mega_menu_item['icon'] ?? config('adminetic.default_menu_icon','fa fa-bars') }}"></i>
                                <span>{{ $mega_menu_item['name'] ?? 'N/A' }} </span>
                            </a>
                            @isset($mega_menu_item['pill'])
                            <label style="margin-left: 5px" class="{{ $mega_menu_item['pill']['class'] ?? '' }}">{{
                                $mega_menu_item['pill']['value']
                                }}</label>
                            @endisset
                        </div>
                        <ul class="submenu-content opensubmegamenu">
                            @foreach ($mega_menu_item['children'] as $submenu)
                            @if (isset($submenu['conditions']) ? getCondition($submenu['conditions']) : true)
                            @isset($submenu['link'])
                            <li>
                                <i class="config('adminetic.default_submenu_icon','fa fa-angle-double-right')"></i>
                                <a href="{{ $submenu['link'] }}" class="{{ $submenu['is_active'] ?? '' }} router">{{
                                    $submenu['name'] ?? 'N/A'
                                    }}</a>
                            </li>
                            @endisset
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif
                @endif
                @endforeach
                @endisset
            </div>
        </div>
    </div>
</li>
@endif
@endisset
@endif
@endisset
@endforeach
@endif
@endisset