   @isset($menus)
       @if (count($menus) > 0)
           @foreach ($menus as $menu)
               @isset($menu['type'])
                   @if ($menu['type'] == 'breaker' || $menu['type'] == 'Breaker')
                       <li class="sidebar-main-title">
                           <div>
                               @isset($menu['name'])
                                   <h6>{{ $menu['name'] }}</h6>
                               @endisset
                               @isset($menu['description'])
                                   <p>{{ $menu['description'] }}</p>
                               @endisset
                           </div>
                       </li>
                   @elseif($menu['type'] == 'link' || $menu['type'] == 'Link')
                       @isset($menu['link'])
                           @if (isset($menu['conditions']) ? getCondition($menu['conditions']) : true)
                               <li class="sidebar-list">
                                   @isset($menu['pill'])
                                       <label class="{{ $menu['pill']['is_active'] }}">{{ $menu['pill']['value'] }}</label>
                                   @endisset
                                   <a class="sidebar-link sidebar-title link-nav" href="{{ $menu['link'] }}">
                                       <i class="{{ $menu['icon'] ?? 'fa fa-bars' }}">
                                       </i><span>{{ $menu['name'] ?? 'N/A' }}</span></a>
                               </li>
                           @endif
                       @endisset
                   @elseif ($menu['type'] == 'menu' || $menu['type'] == 'Menu')
                       @if (isset($menu['conditions']) ? getCondition($menu['conditions']) : true)
                           <li class="sidebar-list">
                               @isset($menu['pill'])
                                   <label class="{{ $menu['pill']['is_active'] }}">{{ $menu['pill']['value'] }}</label>
                               @endisset
                               <a class="sidebar-link sidebar-title {{ $menu['is_active'] ?? '' }}" href="#">
                                   <i class="{{ $menu['icon'] ?? 'fa fa-bars' }}"></i>
                                   <span>{{ $menu['name'] ?? 'N/A' }} </span>
                               </a>
                               @isset($menu['children'])
                                   @if (count($menu['children']) > 0)
                                       <ul class="sidebar-submenu">
                                           @foreach ($menu['children'] as $submenu)
                                               @if (isset($submenu['conditions']) ? getCondition($submenu['conditions']) : true)
                                                   @isset($submenu['link'])
                                                       <li>
                                                           <a href="{{ $submenu['link'] }}"
                                                               class="{{ $submenu['is_active'] ?? '' }}">{{ $submenu['name'] ?? 'N/A' }}</a>
                                                       </li>
                                                   @endisset
                                               @endif
                                           @endforeach
                                       </ul>
                                   @endif
                               @endisset
                           </li>
                       @endif
                   @endif
               @endisset
           @endforeach
       @endif
   @endisset
