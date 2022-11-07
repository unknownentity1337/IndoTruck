@php
if (auth()->user()->role == 1) {
    $links = [
        [
            'href' => 'admin.dashboard',
            'text' => 'Dashboard',
            'is_multi' => false,
        ],
        [
            'href' => [
                [
                    'section_text' => 'User',
                    'section_list' => [['href' => 'admin.user-list', 'text' => 'Data User'], ['href' => 'admin.user-new', 'text' => 'Buat User']],
                    'section_icon' => 'fas fa-users',
                ],
                [
                    'section_text' => 'Owner',
                    'section_list' => [['href' => 'admin.owner-list', 'text' => 'Data Owner'], ['href' => 'admin.owner-new', 'text' => 'Buat Owner']],
                    'section_icon' => 'fas fa-box',
                ],
            ],
            'text' => 'Fitur Admin',
            'is_multi' => true,
        ],
    ];
    $navigation_links = array_to_object($links);
} elseif (auth()->user()->role == 2) {
    $owner = App\Models\Owner::where('user_id', auth()->user()->id)->first();
    if ($owner) {
        $links = [
            [
                'href' => 'owner.dashboard',
                'text' => 'Owner Dashboard',
                'is_multi' => false,
            ],
            [
                'href' => [
                    [
                        'section_text' => 'Vendor',
                        'section_list' => [['href' => 'owner.vendor-list', 'text' => 'Data Vendor'], ['href' => 'owner.vendor-new', 'text' => 'Buat Vendor']],
                        'section_icon' => 'fas fa-users',
                    ],
                ],
                'text' => 'Fitur Owner',
                'is_multi' => true,
            ],
        ];
    } else {
        $links = [
            [
                'href' => 'owner.dashboard',
                'text' => 'Owner Dashboard',
                'is_multi' => false,
            ],
        ];
    }
    $navigation_links = array_to_object($links);
} else {
    $links = [
        [
            'href' => 'admin.dashboard',
            'text' => 'User Dashboard',
            'is_multi' => false,
        ],
        [
            'href' => [
                [
                    'section_text' => 'User',
                    'section_list' => [['href' => 'admin.user-list', 'text' => 'Data User'], ['href' => 'admin.user-new', 'text' => 'Buat User']],
                ],
            ],
            'text' => 'Fitur',
            'is_multi' => true,
        ],
    ];
    $navigation_links = array_to_object($links);
}
@endphp

<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}">
                <img class="d-inline-block" width="32px" height="30.61px" src="{{ asset('assets/img/logo.png') }}"
                    alt="">
            </a>
        </div>
        @foreach ($navigation_links as $link)
            <ul class="sidebar-menu">
                <li class="menu-header">{{ $link->text }}</li>
                @if (!$link->is_multi)
                    <li class="{{ Request::routeIs($link->href) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route($link->href) }}"><i
                                class="fas fa-fire"></i><span>Dashboard</span></a>
                    </li>
                @else
                    @foreach ($link->href as $section)
                        @php
                            $routes = collect($section->section_list)
                                ->map(function ($child) {
                                    return Request::routeIs($child->href);
                                })
                                ->toArray();
                            
                            $is_active = in_array(true, $routes);
                        @endphp

                        <li class="dropdown {{ $is_active ? 'active' : '' }}">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                                    class="{{ $section->section_icon }}"></i>
                                <span>{{ $section->section_text }}</span></a>
                            <ul class="dropdown-menu">
                                @foreach ($section->section_list as $child)
                                    <li class="{{ Request::routeIs($child->href) ? 'active' : '' }}"><a class="nav-link"
                                            href="{{ route($child->href) }}">{{ $child->text }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                @endif
            </ul>
        @endforeach
    </aside>
</div>
