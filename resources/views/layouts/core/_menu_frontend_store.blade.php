@php $menu = $menu ?? false @endphp

<nav class="navbar navbar-expand-xl navbar-dark fixed-top navbar-main frontend py-0">
    <div class="container-fluid ms-0">
        <a class="navbar-brand d-flex align-items-center me-2" href="{{ route('manager.dashboard') }}">
            @if (getLogoMode(Auth::user()->customer->theme_mode, Auth::user()->customer->getColorScheme(), request()->session()->get('customer-auto-theme-mode')) == 'dark')
                <img class="logo" src="{{ getSiteLogoUrl('dark') }}" data-dark="{{ getSiteLogoUrl('dark') }}" data-light="{{ getSiteLogoUrl('light') }}" />
            @else
                <img class="logo" src="{{ getSiteLogoUrl('light') }}" data-dark="{{ getSiteLogoUrl('dark') }}" data-light="{{ getSiteLogoUrl('light') }}" />
            @endif
        </a>
        <button class="navbar-toggler" role="button" data-bs-toggle="collapse" data-bs-target="#mainAppNav" aria-controls="mainAppNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <span middle-bar-control="element" class="leftbar-hide-menu middle-bar-element">
            <svg class="SideBurgerIcon-image" viewBox="0 0 50 32"><path d="M49,4H19c-0.6,0-1-0.4-1-1s0.4-1,1-1h30c0.6,0,1,0.4,1,1S49.6,4,49,4z"></path><path d="M49,16H19c-0.6,0-1-0.4-1-1s0.4-1,1-1h30c0.6,0,1,0.4,1,1S49.6,16,49,16z"></path><path d="M49,28H19c-0.6,0-1-0.4-1-1s0.4-1,1-1h30c0.6,0,1,0.4,1,1S49.6,28,49,28z"></path><path d="M8.1,22.8c-0.3,0-0.5-0.1-0.7-0.3L0.7,15l6.7-7.8c0.4-0.4,1-0.5,1.4-0.1c0.4,0.4,0.5,1,0.1,1.4L3.3,15l5.5,6.2   c0.4,0.4,0.3,1-0.1,1.4C8.6,22.7,8.4,22.8,8.1,22.8z"></path></svg>
        </span>

        <div class="collapse navbar-collapse" id="mainAppNav">
            <ul class="navbar-nav me-auto mb-md-0 main-menu">
                <li class="nav-item {{ $menu == 'dashboard' ? 'active' : '' }}">
                    <a href="{{ route('manager.dashboard') }}" title="{{ trans('messages.dashboard') }}" class="leftbar-tooltip nav-link d-flex align-items-center py-3 lvl-1">
                        <i class="navbar-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 92.1 86.1"><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><g id="Layer_2-2" data-name="Layer 2"><g id="Layer_1-2-2" data-name="Layer 1-2"><path class="color-badge"  d="M51.8,86.1H41.9a8.5,8.5,0,0,1-8.5-8.5V60.2a8.5,8.5,0,0,1,8.5-8.5h9.9a8.5,8.5,0,0,1,8.5,8.5V77.6A8.5,8.5,0,0,1,51.8,86.1ZM41.9,58.7a1.5,1.5,0,0,0-1.5,1.5V77.6a1.5,1.5,0,0,0,1.5,1.5h9.9a1.5,1.5,0,0,0,1.5-1.5V60.2a1.5,1.5,0,0,0-1.5-1.5Z" style="fill:aqua"/><path d="M60.4,86.1H31.7A20.6,20.6,0,0,1,11.2,65.7V24.6h7V65.7A13.5,13.5,0,0,0,31.7,79.1H60.4A13.5,13.5,0,0,0,73.9,65.7V25.3h7V65.7A20.6,20.6,0,0,1,60.4,86.1Z" style="fill:#f2f2f2"/><path d="M88.6,36.5a3.6,3.6,0,0,1-2-.6L45.7,7.7,5.5,35.1a3.5,3.5,0,1,1-4-5.8L43.7.6a3.6,3.6,0,0,1,4,0L90.6,30.1a3.5,3.5,0,0,1-2,6.4Z" style="fill:#f2f2f2"/></g></g></g></g></svg>
                        </i>
                        <span>{{ trans('messages.dashboard') }}</span>
                    </a>
                </li>
                <li class="nav-item {{ $menu == 'campaign' ? 'active' : '' }}">
                    <a title="{{ trans('messages.campaigns') }}" href="{{ route('manager.campaigns') }}" class="leftbar-tooltip nav-link d-flex align-items-center py-3 lvl-1">
                        <i class="navbar-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 106.1 92.1"><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><g id="Layer_2-2" data-name="Layer 2"><g id="Layer_1-2-2" data-name="Layer 1-2"><path d="M40.8,92.1h-.1a5.2,5.2,0,0,1-5.1-4.8c-1.4-4.5-2.7-9-4-13.4S29,65.3,27.8,61L3.2,50.4a.1.1,0,0,0-.1-.1A5.7,5.7,0,0,1,.5,47.8a5.6,5.6,0,0,1,2.6-7.4.1.1,0,0,0,.1-.1c16-6.8,31.7-13.2,46.9-19.3S82.2,8,98.9.8a4.5,4.5,0,0,1,5.7.4,4.6,4.6,0,0,1,1.5,4.1l-5.4,38.1C99,56.1,97.2,68.8,95.4,81.6a5.5,5.5,0,0,1-2,3.7,5.6,5.6,0,0,1-4.1,1.4l-1.4-.3h-.2L52.1,71.2c-2.2,6-4.2,11.3-6,16.4A5.4,5.4,0,0,1,40.8,92.1ZM9.3,45.4,31.6,55a4.8,4.8,0,0,1,2.6,3c1.3,4.6,2.7,9.2,4.1,13.9L41,81q2.7-7.2,5.7-15.6l.2-.3.2-.4c.1-.2.2-.5.4-.6L89.2,12.6C76.8,17.8,64.6,22.7,52.7,27.5,38.6,33.2,24.1,39.1,9.3,45.4ZM55.6,65.2,88.7,79.1l5.1-36.6L98,12.8ZM27.5,59.9h0Z" style="fill:#f2f2f2"/><path class="color-badge" d="M40.1,54.6a3.6,3.6,0,0,1-2.2-6.3l2-1.6a3.6,3.6,0,0,1,5,.6,3.5,3.5,0,0,1-.6,4.9l-2,1.6A3.5,3.5,0,0,1,40.1,54.6Z" style="fill:#ff0"/> <path class="color-badge" d="M52.4,45.2a3.5,3.5,0,0,1-2.7-1.4,3.4,3.4,0,0,1,.6-4.9L63.4,28.6a3.5,3.5,0,0,1,4.3,5.5L54.6,44.4A3.7,3.7,0,0,1,52.4,45.2Z" style="fill:aqua"/></g></g></g></g></svg>
                        </i>
                        <span>{{ trans('messages.campaigns') }}</span>
                    </a>
                </li>
                @if (Auth::user()->customer->can("list", new App\Models\Automation2()))
                    <li class="nav-item {{ $menu == 'automation' ? 'active' : '' }}">
                        <a href="{{ route('manager.automations') }}" title="{{ trans('messages.automations') }}" class="leftbar-tooltip nav-link d-flex align-items-center py-3 lvl-1">
                            <i class="navbar-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 86.4 86.6"><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><g id="Layer_2-2" data-name="Layer 2"><g id="Layer_1-2-2" data-name="Layer 1-2"><path class="color-badge" d="M38.4,57.1a3.2,3.2,0,0,1-2.3-.8L21.7,43.8a3.5,3.5,0,1,1,4.6-5.3L38.4,49,60.1,30.5a3.4,3.4,0,0,1,4.9.4,3.5,3.5,0,0,1-.3,4.9l-24,20.5A3.4,3.4,0,0,1,38.4,57.1Z" style="fill:aqua"/><path d="M43.2,86.6H42.1A42.6,42.6,0,0,1,11.9,73.1a43,43,0,0,1,1.6-61,43,43,0,0,1,61,1.6,43,43,0,0,1-1.6,61A42.8,42.8,0,0,1,43.2,86.6Zm0-79.4A36.2,36.2,0,0,0,7,42.4H7A36.2,36.2,0,0,0,42.3,79.6,36.2,36.2,0,0,0,69.5,18.5,36.5,36.5,0,0,0,44.1,7.2ZM3.5,42.3Z" style="fill:#f2f2f2"/><path d="M8.7,27.2a3.2,3.2,0,0,1-1.9-.5A14.5,14.5,0,0,1,11.6.3,14.4,14.4,0,0,1,26.3,5.9a3.6,3.6,0,0,1-.7,4.9,3.5,3.5,0,0,1-4.9-.8,8.6,8.6,0,0,0-2-1.8A7.5,7.5,0,0,0,8.4,10.4a7.5,7.5,0,0,0,2.2,10.4,3.4,3.4,0,0,1,1,4.8A3.3,3.3,0,0,1,8.7,27.2Z" style="fill:#f2f2f2"/><path d="M77.7,27.2a3.3,3.3,0,0,1-2.9-1.5,3.5,3.5,0,0,1,1-4.9,7.4,7.4,0,0,0,3.3-6.3,7.8,7.8,0,0,0-2.3-5.2,7.4,7.4,0,0,0-5.3-2.1,8.2,8.2,0,0,0-6,2.9,3.5,3.5,0,1,1-5.4-4.4A15.1,15.1,0,0,1,71.5.2,14.5,14.5,0,0,1,86.1,14.4a14.4,14.4,0,0,1-6.5,12.3A3.4,3.4,0,0,1,77.7,27.2Z" style="fill:#f2f2f2"/></g></g></g></g></svg>
                            </i>
                            <span>{{ trans('messages.automations') }}</span>
                        </a>
                    </li>
                @endif
                <li class="nav-item dropdown {{ in_array($menu, ['overview','list','subscriber','segment','form']) ? 'active' : '' }}">
                    <a href=""
                        title="{{ trans('messages.lists') }}"
                        class="leftbar-tooltip nav-link d-flex align-items-center py-3 lvl-1 dropdown-toggle {{ request()->session()->get('customer-leftbar-state') != 'closed' && Auth::user()->customer->getMenuLayout() == 'left' && in_array($menu, ['overview','list','subscriber','segment','form']) ? 'show' : '' }}"
                        data-bs-toggle="dropdown"
                    >
                        <i class="navbar-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 86.3 87.8"><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><g id="Layer_2-2" data-name="Layer 2"><g id="Layer_1-2-2" data-name="Layer 1-2"><g id="Layer_2-2-2" data-name="Layer 2-2"><g id="Layer_1-2-2-2" data-name="Layer 1-2-2"><g id="Layer_2-2-2-2" data-name="Layer 2-2-2"><g id="Layer_1-2-2-2-2" data-name="Layer 1-2-2-2"><path d="M62.5,49.5A13.1,13.1,0,1,1,75.6,36.4,13.1,13.1,0,0,1,62.5,49.5Zm0-18.8a5.8,5.8,0,1,0,5.8,5.7A5.8,5.8,0,0,0,62.5,30.7Z" style="fill:#f2f2f2"/><path d="M42.6,87.5h-.1a3.5,3.5,0,0,1-3.4-3.6c.4-10.4,4.5-20,10.8-25.6a18.4,18.4,0,0,1,14.2-4.9C76.6,54.5,85.5,66.8,86,83.9a3.3,3.3,0,0,1-3.3,3.6A3.5,3.5,0,0,1,79,84.2c-.4-13.3-6.8-23.1-15.6-23.9a12.1,12.1,0,0,0-8.9,3.3c-4.9,4.3-8,12-8.4,20.6A3.4,3.4,0,0,1,42.6,87.5Z" style="fill:#f2f2f2"/><path d="M82.5,87.5H42.6A3.5,3.5,0,0,1,39.1,84a3.5,3.5,0,0,1,3.5-3.5H82.5A3.5,3.5,0,0,1,86,84,3.4,3.4,0,0,1,82.5,87.5Z" style="fill:#f2f2f2"/><path d="M28.9,87.8H15.6C7,87.8,0,81.9,0,74.6V13.1C0,5.9,7,0,15.6,0h55c8.7,0,15.7,5.9,15.7,13.1V24.6a3.8,3.8,0,1,1-7.5,0V13.1c0-3-3.7-5.6-8.2-5.6h-55c-4.3,0-8.1,2.6-8.1,5.6V74.6c0,3.1,3.8,5.7,8.1,5.7H28.9a3.8,3.8,0,1,1,0,7.5Z" style="fill:#f2f2f2"/><path d="M44.2,30.5H23.4A3.5,3.5,0,0,1,19.9,27a3.5,3.5,0,0,1,3.5-3.5H44.2A3.5,3.5,0,0,1,47.7,27,3.4,3.4,0,0,1,44.2,30.5Z" style="fill:#f2f2f2"/><path class="color-badge" d="M28.9,47.8H23.4a3.5,3.5,0,0,1-3.5-3.5,3.5,3.5,0,0,1,3.5-3.5h5.5a3.5,3.5,0,0,1,3.5,3.5A3.4,3.4,0,0,1,28.9,47.8Z" style="fill:#ff0"/><path d="M27.7,65.1H23.4a3.5,3.5,0,0,1-3.5-3.5,3.5,3.5,0,0,1,3.5-3.5h4.3a3.5,3.5,0,0,1,3.5,3.5A3.4,3.4,0,0,1,27.7,65.1Z" style="fill:#f2f2f2"/><polygon class="color-badge"  points="43.7 55.8 40.3 54.5 37.2 56.6 37.4 52.9 34.4 50.7 38 49.7 39.2 46.2 41.2 49.3 44.9 49.3 42.6 52.3 43.7 55.8" style="fill:lime"/><path class="color-badge" d="M37.2,57.1H37a.5.5,0,0,1-.3-.5l.2-3.4-2.8-2.1c-.1-.1-.2-.3-.1-.4s.1-.4.3-.4l3.4-1,1.1-3.2c0-.2.2-.3.4-.4a.5.5,0,0,1,.5.3l1.8,2.8h3.4a.9.9,0,0,1,.5.3c.1.2.1.4-.1.5l-2.1,2.8,1,3.3a.4.4,0,0,1-.1.5c-.2.1-.4.2-.5.1l-3.2-1.2-2.9,2Zm-1.6-6.2,2.1,1.6a.4.4,0,0,1,.2.5v2.7l2.3-1.6a.3.3,0,0,1,.4,0L43,55l-.8-2.5a.5.5,0,0,1,0-.5l1.7-2.2H41.2a.4.4,0,0,1-.4-.2l-1.4-2.2-.9,2.5a.3.3,0,0,1-.3.3Z" style="fill:lime"/></g></g></g></g></g></g></g></g></svg>
                        </i>
                        <span>{{ trans('messages.lists') }}</span>
                    </a>
                    <ul class="dropdown-menu {{ request()->session()->get('customer-leftbar-state') != 'closed' && Auth::user()->customer->getMenuLayout() == 'left' && in_array($menu, ['overview','list','subscriber','segment','form']) ? 'show' : '' }}" aria-labelledby="audience-menu">
                        <li class="nav-item {{ $menu == 'overview' ? 'active' : '' }}">
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('AudienceController@overview') }}">
                                <i class="navbar-icon" style="">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 94.5 84.1"><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path d="M32.8,55.8a3.5,3.5,0,0,1-2.3-.9l-8.6-7.6L3.5,47A3.5,3.5,0,0,1,0,43.5,3.5,3.5,0,0,1,3.5,40h0l19.8.3a3.1,3.1,0,0,1,2.2.9L32.2,47,45.5,28a3.5,3.5,0,0,1,2.9-1.5H60.8L88.6,1a3.6,3.6,0,0,1,5,.2,3.6,3.6,0,0,1-.2,5L64.5,32.6a3.6,3.6,0,0,1-2.3.9h-12L35.7,54.3a3.5,3.5,0,0,1-2.4,1.4Z" style="fill:#333"/><path d="M11.7,63.6V77.1H7.5V63.6h4.2m4.4-7H3A2.6,2.6,0,0,0,.5,59.2V81.6A2.5,2.5,0,0,0,3,84.1H16.1a2.6,2.6,0,0,0,2.6-2.5V59.2a2.6,2.6,0,0,0-2.6-2.6Z" style="fill:#333"/><path d="M36.7,72.1v5H32.5v-5h4.2m4.9-7h-14a2.1,2.1,0,0,0-2.1,2.1V82a2.1,2.1,0,0,0,2.1,2.1h14A2.1,2.1,0,0,0,43.7,82V67.2a2.1,2.1,0,0,0-2.1-2.1Z" style="fill:#333"/><path d="M61.6,49.1v28H57.5v-28h4.1m3.9-7H53.6a3.1,3.1,0,0,0-3.1,3.1V81a3.1,3.1,0,0,0,3.1,3.1H65.5A3.1,3.1,0,0,0,68.6,81V45.2a3.1,3.1,0,0,0-3.1-3.1Z" style="fill:#333"/><path d="M86.6,40.5V77.1H82.5V40.5h4.1m3.6-7H78.9a3.4,3.4,0,0,0-3.4,3.4V80.7a3.4,3.4,0,0,0,3.4,3.4H90.2a3.4,3.4,0,0,0,3.4-3.4V36.9a3.4,3.4,0,0,0-3.4-3.4Z" style="fill:#333"/><path d="M91,19.6a3.5,3.5,0,0,1-3.5-3.5v-9H77.8a3.5,3.5,0,0,1-3.4-3.5A3.5,3.5,0,0,1,77.9,0H91a3.5,3.5,0,0,1,3.5,3.5V16.1A3.5,3.5,0,0,1,91,19.6Z" style="fill:#333"/></g></g></svg>
                                </i>
                                <span>{{ trans('messages.audience.overview') }}</span>
                            </a>
                        </li>
                        <li class="nav-item {{ $menu == 'list' ? 'active' : '' }}">
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('manager.maillists') }}">
                                <i class="navbar-icon" style="">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90.6 86.3"><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path d="M76.3,86.3H21.4a3.5,3.5,0,0,1-3.5-3.5,3.4,3.4,0,0,1,3.5-3.5H76.3c4.1,0,7.3-2.9,7.3-6.5V24.7C83.6,15,74.9,7,64.1,7H12.3A3.5,3.5,0,0,1,8.8,3.5,3.5,3.5,0,0,1,12.3,0H64.1C78.7,0,90.6,11.1,90.6,24.7V72.8C90.6,80.2,84.2,86.3,76.3,86.3Z" style="fill:#333"/><path d="M12.3,7a5.3,5.3,0,0,1,5.3,5.3v9.4H7V12.3A5.3,5.3,0,0,1,12.3,7m0-7h0A12.3,12.3,0,0,0,0,12.3v11a5.4,5.4,0,0,0,5.4,5.4H24.6V12.3A12.3,12.3,0,0,0,12.3,0Z" style="fill:#333"/><path d="M40,86.3H21.1a3.5,3.5,0,0,1-3.5-3.5V24.6a3.5,3.5,0,0,1,3.5-3.5,3.5,3.5,0,0,1,3.5,3.5V79.3H40a3.5,3.5,0,0,1,3.5,3.5A3.5,3.5,0,0,1,40,86.3Z" style="fill:#333"/><path d="M39.5,31.7a7.3,7.3,0,0,1-7.2-7.3,7.2,7.2,0,0,1,7.2-7.2,7.3,7.3,0,0,1,7.3,7.2A7.3,7.3,0,0,1,39.5,31.7Zm0-7.5-.2.2a.3.3,0,0,0,.5,0C39.8,24.3,39.7,24.2,39.5,24.2Z" style="fill:#333"/><path d="M70.3,27.9H54.9a3.5,3.5,0,0,1-3.5-3.5,3.5,3.5,0,0,1,3.5-3.5H70.3a3.5,3.5,0,0,1,3.5,3.5A3.5,3.5,0,0,1,70.3,27.9Z" style="fill:#333"/><path d="M39.5,50.2a7.2,7.2,0,0,1,0-14.4,7.2,7.2,0,1,1,0,14.4Zm0-7.4a.2.2,0,0,0-.2.2.3.3,0,0,0,.5,0C39.8,42.9,39.7,42.8,39.5,42.8Z" style="fill:#333"/><path d="M57.3,68.6a7.3,7.3,0,0,1,0-14.5,7.3,7.3,0,1,1,0,14.5Zm0-7.5c-.1,0-.2.1-.2.3s.5.2.5,0A.3.3,0,0,0,57.3,61.1Z" style="fill:#333"/><path d="M70.3,46.5H54.9a3.5,3.5,0,0,1,0-7H70.3a3.5,3.5,0,0,1,0,7Z" style="fill:#333"/><path d="M71.4,80.8a5.3,5.3,0,0,1-.5,2H43.7a5.1,5.1,0,0,1-.4-2c0-4.6,6.3-8.2,14-8.2S71.4,76.2,71.4,80.8Z" style="fill:#333"/><path d="M70.9,86.3H43.7a3.5,3.5,0,0,1-3.2-2.2,7.8,7.8,0,0,1-.7-3.3c0-6.6,7.7-11.8,17.5-11.8s17.6,5.2,17.6,11.8a9.8,9.8,0,0,1-.7,3.3A3.6,3.6,0,0,1,70.9,86.3Zm-23.4-7H67.1c-1.4-1.6-5-3.3-9.8-3.3S49,77.7,47.5,79.3Z" style="fill:#333"/><path d="M6.2,84.9a3.5,3.5,0,0,1-3.5-3.5V46.5A3.5,3.5,0,0,1,6.2,43a3.5,3.5,0,0,1,3.5,3.5V81.4A3.5,3.5,0,0,1,6.2,84.9Z" style="fill:#555"/><path d="M11.8,86.3H6.2a3.5,3.5,0,0,1-3.5-3.5,3.5,3.5,0,0,1,3.5-3.5h5.6a3.5,3.5,0,0,1,3.5,3.5A3.5,3.5,0,0,1,11.8,86.3Z" style="fill:#555"/></g></g></svg>
                                </i>
                                <span>{{ trans('messages.lists') }}</span>
                            </a>
                        </li>
                        @if (Auth::user()->customer->mailLists()->count())
                            <li class="nav-item {{ $menu == 'subscriber' ? 'active' : '' }}">
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('SubscriberController@index', [
                                    'list_uid' => Auth::user()->customer->mailLists()->first() ? Auth::user()->customer->mailLists()->first()->uid : null,
                                ]) }}">
                                    <i class="navbar-icon" style="">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 94.8 87.5"><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path d="M3.5,87.5H3.4A3.5,3.5,0,0,1,0,83.9a39.5,39.5,0,0,1,78.9,0,3.4,3.4,0,0,1-3.4,3.6h-.1a3.5,3.5,0,0,1-3.5-3.4A32.5,32.5,0,0,0,7,84.1,3.5,3.5,0,0,1,3.5,87.5Z" style="fill:#333"/><path d="M16.5,87.5H3.5a3.5,3.5,0,0,1,0-7h13a3.5,3.5,0,0,1,0,7Z" style="fill:#333"/><path d="M75.4,87.5H32.5a3.5,3.5,0,0,1,0-7H75.4a3.5,3.5,0,0,1,0,7Z" style="fill:#333"/><path d="M40.1,41.2A20.6,20.6,0,1,1,60.7,20.6,20.6,20.6,0,0,1,40.1,41.2ZM40.1,7A13.6,13.6,0,1,0,53.7,20.6,13.6,13.6,0,0,0,40.1,7Z" style="fill:#333"/><path d="M91.3,86.9a3.5,3.5,0,0,1-3.5-3.4C87.6,70,81.8,57.7,73,52.2a3.5,3.5,0,1,1,3.7-5.9c11,6.8,17.9,21,18.1,37.1a3.5,3.5,0,0,1-3.5,3.5Z" style="fill:#333"/><path d="M67.5,34.5a4.1,4.1,0,0,1-1.8-.5,3.5,3.5,0,0,1-1.2-4.8,19.8,19.8,0,0,0,2.6-11.9A18.8,18.8,0,0,0,63.6,8a3.5,3.5,0,1,1,5.8-4,27.2,27.2,0,0,1,4.7,12.6,27.5,27.5,0,0,1-3.6,16.2A3.4,3.4,0,0,1,67.5,34.5Z" style="fill:#333"/></g></g></svg>
                                    </i>
                                    <span>{{ trans('messages.contacts') }}</span>
                                </a>
                            </li>
                            @if (Auth::user()->customer->can("list", new App\Models\Segment()))
                                <li class="nav-item {{ $menu == 'segment' ? 'active' : '' }}">
                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('SegmentController@index', [
                                        'list_uid' => Auth::user()->customer->mailLists()->first() ? Auth::user()->customer->mailLists()->first()->uid : null,
                                    ]) }}">
                                        <i class="navbar-icon" style="">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 97 87.5"><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path d="M34.6,33H7.1A7.1,7.1,0,0,1,0,25.9V7.1A7.1,7.1,0,0,1,7.1,0H34.6a7.1,7.1,0,0,1,7.1,7.1V25.9A7.1,7.1,0,0,1,34.6,33ZM7.1,7H7V25.9c0,.1,0,.1.1.1H34.6c.1,0,.1,0,.1-.1V7.1H7.1Z" style="fill:#333"/><path d="M33.9,87.5H8.4A8.1,8.1,0,0,1,.3,79.4V46.1A8.1,8.1,0,0,1,8.4,38H33.9A8.1,8.1,0,0,1,42,46.1V79.4A8.1,8.1,0,0,1,33.9,87.5ZM8.4,45a1.1,1.1,0,0,0-1.1,1.1V79.4a1.1,1.1,0,0,0,1.1,1.1H33.9A1.1,1.1,0,0,0,35,79.4V46.1A1.1,1.1,0,0,0,33.9,45Z" style="fill:#333"/><path d="M86.5,87.5h-29A10.5,10.5,0,0,1,47,77V11A10.5,10.5,0,0,1,57.5.5h29A10.5,10.5,0,0,1,97,11V77A10.5,10.5,0,0,1,86.5,87.5Zm-29-80A3.5,3.5,0,0,0,54,11V77a3.5,3.5,0,0,0,3.5,3.5h29A3.5,3.5,0,0,0,90,77V11a3.5,3.5,0,0,0-3.5-3.5Z" style="fill:#333"/><rect x="13.4" y="50.8" width="15.2" height="24.5" rx="4.1" style="fill:#333"/><path d="M93.5,56h-13A3.5,3.5,0,0,1,77,52.5v-17A3.5,3.5,0,0,1,80.5,32h13A3.5,3.5,0,0,1,97,35.5v17A3.5,3.5,0,0,1,93.5,56ZM84,49h6V39H84Z" style="fill:#333"/></g></g></svg>
                                        </i>
                                        <span>{{ trans('messages.segments') }}</span>
                                    </a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item {{ $menu == 'subscriber' ? 'active' : '' }}">
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('SubscriberController@noList') }}">
                                    <i class="navbar-icon" style="">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 94.8 87.5"><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path d="M3.5,87.5H3.4A3.5,3.5,0,0,1,0,83.9a39.5,39.5,0,0,1,78.9,0,3.4,3.4,0,0,1-3.4,3.6h-.1a3.5,3.5,0,0,1-3.5-3.4A32.5,32.5,0,0,0,7,84.1,3.5,3.5,0,0,1,3.5,87.5Z" style="fill:#333"/><path d="M16.5,87.5H3.5a3.5,3.5,0,0,1,0-7h13a3.5,3.5,0,0,1,0,7Z" style="fill:#333"/><path d="M75.4,87.5H32.5a3.5,3.5,0,0,1,0-7H75.4a3.5,3.5,0,0,1,0,7Z" style="fill:#333"/><path d="M40.1,41.2A20.6,20.6,0,1,1,60.7,20.6,20.6,20.6,0,0,1,40.1,41.2ZM40.1,7A13.6,13.6,0,1,0,53.7,20.6,13.6,13.6,0,0,0,40.1,7Z" style="fill:#333"/><path d="M91.3,86.9a3.5,3.5,0,0,1-3.5-3.4C87.6,70,81.8,57.7,73,52.2a3.5,3.5,0,1,1,3.7-5.9c11,6.8,17.9,21,18.1,37.1a3.5,3.5,0,0,1-3.5,3.5Z" style="fill:#333"/><path d="M67.5,34.5a4.1,4.1,0,0,1-1.8-.5,3.5,3.5,0,0,1-1.2-4.8,19.8,19.8,0,0,0,2.6-11.9A18.8,18.8,0,0,0,63.6,8a3.5,3.5,0,1,1,5.8-4,27.2,27.2,0,0,1,4.7,12.6,27.5,27.5,0,0,1-3.6,16.2A3.4,3.4,0,0,1,67.5,34.5Z" style="fill:#333"/></g></g></svg>
                                    </i>
                                    <span>{{ trans('messages.contacts') }}</span>
                                </a>
                            </li>
                            @if (Auth::user()->customer->can("list", new App\Models\Segment()))
                                <li class="nav-item {{ $menu == 'segment' ? 'active' : '' }}">
                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('SegmentController@noList') }}">
                                        <i class="navbar-icon" style="">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 97 87.5"><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path d="M34.6,33H7.1A7.1,7.1,0,0,1,0,25.9V7.1A7.1,7.1,0,0,1,7.1,0H34.6a7.1,7.1,0,0,1,7.1,7.1V25.9A7.1,7.1,0,0,1,34.6,33ZM7.1,7H7V25.9c0,.1,0,.1.1.1H34.6c.1,0,.1,0,.1-.1V7.1H7.1Z" style="fill:#333"/><path d="M33.9,87.5H8.4A8.1,8.1,0,0,1,.3,79.4V46.1A8.1,8.1,0,0,1,8.4,38H33.9A8.1,8.1,0,0,1,42,46.1V79.4A8.1,8.1,0,0,1,33.9,87.5ZM8.4,45a1.1,1.1,0,0,0-1.1,1.1V79.4a1.1,1.1,0,0,0,1.1,1.1H33.9A1.1,1.1,0,0,0,35,79.4V46.1A1.1,1.1,0,0,0,33.9,45Z" style="fill:#333"/><path d="M86.5,87.5h-29A10.5,10.5,0,0,1,47,77V11A10.5,10.5,0,0,1,57.5.5h29A10.5,10.5,0,0,1,97,11V77A10.5,10.5,0,0,1,86.5,87.5Zm-29-80A3.5,3.5,0,0,0,54,11V77a3.5,3.5,0,0,0,3.5,3.5h29A3.5,3.5,0,0,0,90,77V11a3.5,3.5,0,0,0-3.5-3.5Z" style="fill:#333"/><rect x="13.4" y="50.8" width="15.2" height="24.5" rx="4.1" style="fill:#333"/><path d="M93.5,56h-13A3.5,3.5,0,0,1,77,52.5v-17A3.5,3.5,0,0,1,80.5,32h13A3.5,3.5,0,0,1,97,35.5v17A3.5,3.5,0,0,1,93.5,56ZM84,49h6V39H84Z" style="fill:#333"/></g></g></svg>
                                        </i>
                                        <span>{{ trans('messages.segments') }}</span>
                                    </a>
                                </li>
                            @endif
                        @endif
                        @if (Auth::user()->customer->can("list", new App\Models\Form()))
                            <li class="nav-item {{ $menu == 'form' ? 'active' : '' }}">
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('FormController@index') }}">
                                    <i class="navbar-icon" style="">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 84.5"><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path d="M3.5,77.3A3.6,3.6,0,0,1,0,74.1V11.5A11.7,11.7,0,0,1,12,0H78A11.7,11.7,0,0,1,90,11.5v7.8a3.5,3.5,0,0,1-7,0V11.5A4.7,4.7,0,0,0,78,7H12a4.7,4.7,0,0,0-5,4.5v62a3.4,3.4,0,0,1-3.2,3.8Z" style="fill:#333"/><path d="M72.9,51.6h-56a3.5,3.5,0,0,1-3.5-3.5V30a3.5,3.5,0,0,1,3.5-3.5h56A3.5,3.5,0,0,1,76.4,30V48.1A3.5,3.5,0,0,1,72.9,51.6Zm-52.5-7h49V33.5h-49Z" style="fill:#333"/><path d="M29.7,84.5a12.9,12.9,0,0,1,0-25.8,12.9,12.9,0,0,1,0,25.8Zm0-18.8a5.8,5.8,0,0,0-5.6,5.9,5.6,5.6,0,1,0,11.2,0A5.8,5.8,0,0,0,29.7,65.7Z" style="fill:#333"/><path d="M72.6,83.5H55.1A3.5,3.5,0,0,1,51.6,80V62.2a3.5,3.5,0,0,1,3.5-3.5H72.6a3.5,3.5,0,0,1,3.5,3.5V80A3.5,3.5,0,0,1,72.6,83.5Zm-14-7H69.1V65.7H58.6Z" style="fill:#333"/><path d="M45,21.5H16.4a3.5,3.5,0,1,1,0-7H45a3.5,3.5,0,0,1,0,7Z" style="fill:#333"/></g></g></svg>
                                    </i>
                                    <span>{{ trans('messages.forms') }}</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
                <li class="nav-item {{ $menu == 'template' ? 'active' : '' }}">
                    <a href="{{ route('manager.templates') }}" title="{{ trans('messages.templates') }}" class="leftbar-tooltip nav-link d-flex align-items-center py-3 lvl-1">
                        <i class="navbar-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 91.8 86.2"><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><g id="Layer_2-2" data-name="Layer 2"><g id="Layer_1-2-2" data-name="Layer 1-2"><path d="M72.7,86.2h-61A11.7,11.7,0,0,1,0,74.5v-61A11.7,11.7,0,0,1,11.7,1.8H52.3a3.5,3.5,0,0,1,3.5,3.5,3.5,3.5,0,0,1-3.5,3.5H11.7A4.7,4.7,0,0,0,7,13.5v61a4.7,4.7,0,0,0,4.7,4.7h61a4.7,4.7,0,0,0,4.7-4.7V35.2a3.5,3.5,0,0,1,7,0V74.5A11.7,11.7,0,0,1,72.7,86.2Z" style="fill:#f2f2f2"/><path d="M17.2,23.4a4.9,4.9,0,1,1,4.9-4.9A4.9,4.9,0,0,1,17.2,23.4Zm0-7a2.1,2.1,0,1,0,2.1,2.1A2.1,2.1,0,0,0,17.2,16.4Z" style="fill:#f2f2f2"/><path class="color-badge" d="M32,23.4a4.9,4.9,0,1,1,4.9-4.9A4.9,4.9,0,0,1,32,23.4Zm0-7a2.1,2.1,0,1,0,2.1,2.1A2.1,2.1,0,0,0,32,16.4Z" style="fill:aqua"/><path d="M44,50.5h-.1A5.3,5.3,0,0,1,40,48.9h0a5.6,5.6,0,0,1-1.5-4.1c.2-6.7,9.9-20.2,18.9-28.5S79.8-.3,86.5,0a5.4,5.4,0,0,1,4,1.8c3.2,3.5-.3,9.6-3.6,14.5a104,104,0,0,1-12.8,15C66.3,39.1,51.3,50.5,44,50.5ZM84.1,7.4C79.6,8.7,70.3,14,62.2,21.5A78.4,78.4,0,0,0,50.1,35.7,34.5,34.5,0,0,0,46,43c4.6-1.8,14.5-8.1,23.2-16.7S82.2,11.3,84.1,7.4Z" style="fill:#f2f2f2"/><path class="color-badge" d="M31.4,69.1c-7,0-13.4-3.7-15.3-6.3a3.7,3.7,0,0,1-.7-3.7c1-2.9,4.1-2.7,5.7-2.6a13.1,13.1,0,0,0,2.8.1V56c.1-4.3,2.1-11.6,7.2-14.1s13.1,0,16.5,6,.8,11.2-.4,13.3v.3C43.1,68.3,34.8,69.1,31.4,69.1Zm-2.6-7.2,2.6.2c2.2,0,7.4-.4,9.6-4.1.6-1.2,1.9-4.1.4-6.7s-5.4-4.1-7.1-3.2h0c-1.6.8-3.2,4.6-3.4,7.8a7.9,7.9,0,0,1-.7,4.3l-.3.5Z" style="fill:#ff0"/><rect x="53.5" y="28.5" width="7" height="7.8" transform="translate(-4.8 54.4) rotate(-49.2)" style="fill:#f2f2f2"/></g></g></g></g></svg>
                        </i>
                        <span>{{ trans('messages.templates') }}</span>
                    </a>
                </li>

                <li class="nav-item dropdown {{ in_array($menu, ['categories','attributes','media','orders','products','funnels']) ? 'active' : '' }}">
                    <a title="{{ trans('messages.sending') }}" href="{{ route('manager.templates') }}" class="leftbar-tooltip nav-link d-flex align-items-center py-3 lvl-1 dropdown-toggle {{ request()->session()->get('customer-leftbar-state') != 'closed' && Auth::user()->customer->getMenuLayout() == 'left' && in_array($menu, ['sending_server','sending_domain','sender','tracking_domain','email_verification','blacklist']) ? 'show' : '' }}" id="sending-menu" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="navbar-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40.2 36"><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path d="M5.1,36A2.9,2.9,0,0,1,3,35.1,2.9,2.9,0,0,1,2.1,33V16.1a5.4,5.4,0,0,1-1.9-3A6,6,0,0,1,.3,9.6L2.5,2.9A3.4,3.4,0,0,1,3.9.8,3.6,3.6,0,0,1,6.2,0H33.8a4.4,4.4,0,0,1,2.5.8,3.9,3.9,0,0,1,1.4,2.1l2.2,6.7a6,6,0,0,1-1.8,6.5V33a3.1,3.1,0,0,1-3,3ZM24.6,14.5a3.7,3.7,0,0,0,2.5-.9,2.9,2.9,0,0,0,.8-2.3L26.6,3h-5v8.3a3.1,3.1,0,0,0,.9,2.2A2.4,2.4,0,0,0,24.6,14.5Zm-9.3,0a3.2,3.2,0,0,0,2.3-.9,3,3,0,0,0,1-2.3V3h-5l-1.2,8.3a2.3,2.3,0,0,0,.7,2.2A2.7,2.7,0,0,0,15.3,14.5Zm-9.1,0a3,3,0,0,0,2-.8,3.3,3.3,0,0,0,1.1-2L10.6,3h-5L3.3,10.3a3,3,0,0,0,.4,2.9A2.8,2.8,0,0,0,6.2,14.5Zm27.8,0a2.8,2.8,0,0,0,2.5-1.3,3.3,3.3,0,0,0,.5-2.9L34.7,3h-5L31,11.7a3.2,3.2,0,0,0,1,2A3,3,0,0,0,34,14.5ZM5.1,33h30V17.5H34a6.9,6.9,0,0,1-2.4-.5,10.2,10.2,0,0,1-2.2-1.6,6.2,6.2,0,0,1-2,1.5,5.8,5.8,0,0,1-2.6.6,6.8,6.8,0,0,1-2.6-.4,8.5,8.5,0,0,1-2.1-1.4A4.3,4.3,0,0,1,18.2,17a7.1,7.1,0,0,1-2.6.5,7.6,7.6,0,0,1-2.7-.5,6.5,6.5,0,0,1-2.1-1.6A13.8,13.8,0,0,1,8.5,17a6.8,6.8,0,0,1-2.3.5H5.1Zm30,0h0Z"/></g></g></svg>
                        </i>
                        <span>{{ trans('store.store') }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-bottom {{ request()->session()->get('customer-leftbar-state') != 'closed' && Auth::user()->customer->getMenuLayout() == 'left' && in_array($menu, ['categories','attributes','media','orders','products','funnels']) ? 'show' : '' }}" aria-labelledby="sending-menu">
                        <li class="nav-item {{ $menu == 'products' ? 'active' : '' }}">
                            <a href="{{ route('Store\ProductController@index') }}"
                                class="dropdown-item d-flex align-items-center">
                                <i class="navbar-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 42.4 38"><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path d="M3,17.5v0ZM23.9,35a2.5,2.5,0,1,0,0-5,2.2,2.2,0,0,0-1.7.7,2.4,2.4,0,0,0,0,3.6A2.2,2.2,0,0,0,23.9,35Zm13-21a2.4,2.4,0,0,0,2.5-2.5A2.4,2.4,0,0,0,36.9,9a2.2,2.2,0,0,0-1.7.7,2.4,2.4,0,0,0,0,3.6A2.2,2.2,0,0,0,36.9,14Zm-20-1a1.5,1.5,0,1,0,0-3h-7a1.5,1.5,0,1,0,0,3Zm0,9a1.5,1.5,0,1,0,0-3h-7a1.5,1.5,0,1,0,0,3ZM3,32a2.9,2.9,0,0,1-2.1-.9A2.9,2.9,0,0,1,0,29V3A2.9,2.9,0,0,1,.9.9,2.9,2.9,0,0,1,3,0H37.8a2.9,2.9,0,0,1,2.1.9A2.9,2.9,0,0,1,40.8,3H3V29H15.4v3Zm20.9,6a5.5,5.5,0,0,1-4.4-8.8,5.3,5.3,0,0,1,2.9-2V22a1.4,1.4,0,0,1,1.5-1.5H35.4V16.8a5.7,5.7,0,0,1-2.9-1.9,5.8,5.8,0,0,1-1.1-3.4,5.5,5.5,0,0,1,9.4-3.9,5.3,5.3,0,0,1,1.6,3.9,5.8,5.8,0,0,1-1.1,3.4,5.7,5.7,0,0,1-2.9,1.9V22a1.4,1.4,0,0,1-1.5,1.5H25.4v3.7a5.3,5.3,0,0,1,2.9,2A5.5,5.5,0,0,1,23.9,38Z"/></g></g></svg>
                                </i>
                                <span>{{ trans('store.product') }}</span>
                            </a>
                        </li>

                        <li class="nav-item {{ $menu == 'categories' ? 'active' : '' }}">
                            <a href="{{ route('Store\CategoryController@index') }}"
                                class="dropdown-item d-flex align-items-center">
                                <i class="navbar-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 42.4 38"><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path d="M3,17.5v0ZM23.9,35a2.5,2.5,0,1,0,0-5,2.2,2.2,0,0,0-1.7.7,2.4,2.4,0,0,0,0,3.6A2.2,2.2,0,0,0,23.9,35Zm13-21a2.4,2.4,0,0,0,2.5-2.5A2.4,2.4,0,0,0,36.9,9a2.2,2.2,0,0,0-1.7.7,2.4,2.4,0,0,0,0,3.6A2.2,2.2,0,0,0,36.9,14Zm-20-1a1.5,1.5,0,1,0,0-3h-7a1.5,1.5,0,1,0,0,3Zm0,9a1.5,1.5,0,1,0,0-3h-7a1.5,1.5,0,1,0,0,3ZM3,32a2.9,2.9,0,0,1-2.1-.9A2.9,2.9,0,0,1,0,29V3A2.9,2.9,0,0,1,.9.9,2.9,2.9,0,0,1,3,0H37.8a2.9,2.9,0,0,1,2.1.9A2.9,2.9,0,0,1,40.8,3H3V29H15.4v3Zm20.9,6a5.5,5.5,0,0,1-4.4-8.8,5.3,5.3,0,0,1,2.9-2V22a1.4,1.4,0,0,1,1.5-1.5H35.4V16.8a5.7,5.7,0,0,1-2.9-1.9,5.8,5.8,0,0,1-1.1-3.4,5.5,5.5,0,0,1,9.4-3.9,5.3,5.3,0,0,1,1.6,3.9,5.8,5.8,0,0,1-1.1,3.4,5.7,5.7,0,0,1-2.9,1.9V22a1.4,1.4,0,0,1-1.5,1.5H25.4v3.7a5.3,5.3,0,0,1,2.9,2A5.5,5.5,0,0,1,23.9,38Z"/></g></g></svg>
                                </i>
                                <span>{{ trans('store.categories') }}</span>
                            </a>
                        </li>

                        <li class="nav-item {{ $menu == 'attributes' ? 'active' : '' }}">
                            <a href="{{ route('Store\AttributeController@index') }}"
                                class="dropdown-item d-flex align-items-center">
                                <i class="navbar-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 42.4 38"><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path d="M3,17.5v0ZM23.9,35a2.5,2.5,0,1,0,0-5,2.2,2.2,0,0,0-1.7.7,2.4,2.4,0,0,0,0,3.6A2.2,2.2,0,0,0,23.9,35Zm13-21a2.4,2.4,0,0,0,2.5-2.5A2.4,2.4,0,0,0,36.9,9a2.2,2.2,0,0,0-1.7.7,2.4,2.4,0,0,0,0,3.6A2.2,2.2,0,0,0,36.9,14Zm-20-1a1.5,1.5,0,1,0,0-3h-7a1.5,1.5,0,1,0,0,3Zm0,9a1.5,1.5,0,1,0,0-3h-7a1.5,1.5,0,1,0,0,3ZM3,32a2.9,2.9,0,0,1-2.1-.9A2.9,2.9,0,0,1,0,29V3A2.9,2.9,0,0,1,.9.9,2.9,2.9,0,0,1,3,0H37.8a2.9,2.9,0,0,1,2.1.9A2.9,2.9,0,0,1,40.8,3H3V29H15.4v3Zm20.9,6a5.5,5.5,0,0,1-4.4-8.8,5.3,5.3,0,0,1,2.9-2V22a1.4,1.4,0,0,1,1.5-1.5H35.4V16.8a5.7,5.7,0,0,1-2.9-1.9,5.8,5.8,0,0,1-1.1-3.4,5.5,5.5,0,0,1,9.4-3.9,5.3,5.3,0,0,1,1.6,3.9,5.8,5.8,0,0,1-1.1,3.4,5.7,5.7,0,0,1-2.9,1.9V22a1.4,1.4,0,0,1-1.5,1.5H25.4v3.7a5.3,5.3,0,0,1,2.9,2A5.5,5.5,0,0,1,23.9,38Z"/></g></g></svg>
                                </i>
                                <span>{{ trans('store.attributes') }}</span>
                            </a>
                        </li>

                        <li class="nav-item {{ $menu == 'orders' ? 'active' : '' }}">
                            <a href="{{ route('Store\OrdersController@index') }}"
                                class="dropdown-item d-flex align-items-center">
                                <i class="navbar-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 42.4 38"><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path d="M3,17.5v0ZM23.9,35a2.5,2.5,0,1,0,0-5,2.2,2.2,0,0,0-1.7.7,2.4,2.4,0,0,0,0,3.6A2.2,2.2,0,0,0,23.9,35Zm13-21a2.4,2.4,0,0,0,2.5-2.5A2.4,2.4,0,0,0,36.9,9a2.2,2.2,0,0,0-1.7.7,2.4,2.4,0,0,0,0,3.6A2.2,2.2,0,0,0,36.9,14Zm-20-1a1.5,1.5,0,1,0,0-3h-7a1.5,1.5,0,1,0,0,3Zm0,9a1.5,1.5,0,1,0,0-3h-7a1.5,1.5,0,1,0,0,3ZM3,32a2.9,2.9,0,0,1-2.1-.9A2.9,2.9,0,0,1,0,29V3A2.9,2.9,0,0,1,.9.9,2.9,2.9,0,0,1,3,0H37.8a2.9,2.9,0,0,1,2.1.9A2.9,2.9,0,0,1,40.8,3H3V29H15.4v3Zm20.9,6a5.5,5.5,0,0,1-4.4-8.8,5.3,5.3,0,0,1,2.9-2V22a1.4,1.4,0,0,1,1.5-1.5H35.4V16.8a5.7,5.7,0,0,1-2.9-1.9,5.8,5.8,0,0,1-1.1-3.4,5.5,5.5,0,0,1,9.4-3.9,5.3,5.3,0,0,1,1.6,3.9,5.8,5.8,0,0,1-1.1,3.4,5.7,5.7,0,0,1-2.9,1.9V22a1.4,1.4,0,0,1-1.5,1.5H25.4v3.7a5.3,5.3,0,0,1,2.9,2A5.5,5.5,0,0,1,23.9,38Z"/></g></g></svg>
                                </i>
                                <span>{{ trans('store.orders') }}</span>
                            </a>
                        </li>

                        <li class="nav-item {{ $menu == 'media' ? 'active' : '' }}">
                            <a href="{{ route('Store\MediaController@index') }}"
                                class="dropdown-item d-flex align-items-center">
                                <i class="navbar-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 42.4 38"><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path d="M3,17.5v0ZM23.9,35a2.5,2.5,0,1,0,0-5,2.2,2.2,0,0,0-1.7.7,2.4,2.4,0,0,0,0,3.6A2.2,2.2,0,0,0,23.9,35Zm13-21a2.4,2.4,0,0,0,2.5-2.5A2.4,2.4,0,0,0,36.9,9a2.2,2.2,0,0,0-1.7.7,2.4,2.4,0,0,0,0,3.6A2.2,2.2,0,0,0,36.9,14Zm-20-1a1.5,1.5,0,1,0,0-3h-7a1.5,1.5,0,1,0,0,3Zm0,9a1.5,1.5,0,1,0,0-3h-7a1.5,1.5,0,1,0,0,3ZM3,32a2.9,2.9,0,0,1-2.1-.9A2.9,2.9,0,0,1,0,29V3A2.9,2.9,0,0,1,.9.9,2.9,2.9,0,0,1,3,0H37.8a2.9,2.9,0,0,1,2.1.9A2.9,2.9,0,0,1,40.8,3H3V29H15.4v3Zm20.9,6a5.5,5.5,0,0,1-4.4-8.8,5.3,5.3,0,0,1,2.9-2V22a1.4,1.4,0,0,1,1.5-1.5H35.4V16.8a5.7,5.7,0,0,1-2.9-1.9,5.8,5.8,0,0,1-1.1-3.4,5.5,5.5,0,0,1,9.4-3.9,5.3,5.3,0,0,1,1.6,3.9,5.8,5.8,0,0,1-1.1,3.4,5.7,5.7,0,0,1-2.9,1.9V22a1.4,1.4,0,0,1-1.5,1.5H25.4v3.7a5.3,5.3,0,0,1,2.9,2A5.5,5.5,0,0,1,23.9,38Z"/></g></g></svg>
                                </i>
                                <span>{{ trans('store.media') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>

                @if (config('app.brand') || config('custom.woo'))
                    <li class="nav-item dropdown {{ in_array($menu, ['product','source']) ? 'active' : '' }}">
                        <a title="{{ trans('messages.content') }}"
                            class="leftbar-tooltip nav-link d-flex align-items-center py-3 lvl-1 dropdown-toggle {{ request()->session()->get('customer-leftbar-state') != 'closed' && Auth::user()->customer->getMenuLayout() == 'left' && in_array($menu, ['product','source']) ? 'show' : '' }}"
                            id="content-menu" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="navbar-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 744.6 736.4"><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><g id="Layer_2-2" data-name="Layer 2"><g id="Layer_1-2-2" data-name="Layer 1-2"><path d="M633.8,736.4h-523A110.9,110.9,0,0,1,0,625.6V110.8A110.9,110.9,0,0,1,110.8,0H369.7a74,74,0,0,1,73.9,73.9v54a18.9,18.9,0,0,0,18.9,18.9H670.7a74.1,74.1,0,0,1,73.9,73.9h0V625.6A110.9,110.9,0,0,1,633.8,736.4ZM110.8,55A55.8,55.8,0,0,0,55,110.8V625.6a55.8,55.8,0,0,0,55.8,55.8h523a55.9,55.9,0,0,0,55.8-55.8V220.7a18.9,18.9,0,0,0-18.9-18.9H462.5a74,74,0,0,1-73.9-73.9v-54A18.9,18.9,0,0,0,369.7,55Z" style="fill:#f2f2f2"/><path d="M572.2,405.9H172.3a27.5,27.5,0,0,1,0-55H572.2a27.5,27.5,0,0,1,0,55Z" style="fill:#f2f2f2"/><path d="M572.2,582.1H172.3a27.5,27.5,0,0,1,0-55H572.2a27.5,27.5,0,0,1,0,55Z" style="fill:#f2f2f2"/><path d="M286.2,251.6H151.7a27.5,27.5,0,1,1,0-55H286.2a27.5,27.5,0,0,1,0,55Z" style="fill:#f0bdad"/></g></g></g></g></svg>
                            </i>
                            <span>{{ trans('messages.content') }}</span>
                        </a>
                        <ul class="dropdown-menu {{ request()->session()->get('customer-leftbar-state') != 'closed' && Auth::user()->customer->getMenuLayout() == 'left' && in_array($menu, ['product','source']) ? 'show' : '' }}" aria-labelledby="content-menu">
                            <li class="nav-item {{ $menu == 'product' ? 'active' : '' }}">
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('ProductController@index') }}">
                                    <i class="navbar-icon" style="">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 88.3 71.5" style="enable-background:new 0 0 88.3 71.5;" xml:space="preserve"> <style type="text/css"> .st0{fill:#93A8C1;}.st1{fill:#414042;}</style> <g id="Layer_2_1_"> <g id="Layer_1-2"> <rect x="18.4" y="48" class="st0" width="52.5" height="10.1"/> <rect x="18.4" y="30.8" class="st0" width="52.5" height="10.1"/> <path class="st1" d="M71.3,71.5C71.3,71.5,71.3,71.5,71.3,71.5L17.7,71c-0.6,0-1.2-0.3-1.7-0.7s-0.7-1.1-0.7-1.7l0.9-38l-4.4,2.7 c-0.6,0.4-1.3,0.5-1.9,0.3c-0.6-0.2-1.2-0.6-1.5-1.2c-2.7-5.5-5.4-11-8.2-16.5c-0.4-0.9-0.3-1.9,0.3-2.6c4.4-5.1,10-9.1,16.3-11.4 c4.7-1.6,7.7-1.5,13.6-1.3c3,0.1,6.8,0.2,12.2,0.2c6.2-0.1,10.4-0.3,13.5-0.5c5.3-0.3,8-0.5,12.5,0.8c7.3,2.2,13.8,6.3,19,11.9 c0.6,0.7,0.8,1.7,0.4,2.6L80.6,32c-0.3,0.6-0.8,1.1-1.4,1.3c-0.6,0.2-1.3,0.1-1.9-0.2l-4.7-2.7l1.1,38.7c0,0.6-0.2,1.3-0.7,1.7 C72.6,71.2,72,71.5,71.3,71.5z M20.1,66.2l48.7,0.5l-1.2-40.5c0-0.9,0.4-1.7,1.2-2.1c0.7-0.4,1.7-0.5,2.4,0l6.1,3.5L83,15 c-4.4-4.4-9.8-7.6-15.7-9.4C63.6,4.6,61.5,4.7,56.4,5C53.3,5.2,49,5.4,42.7,5.5c-5.5,0-9.3-0.1-12.4-0.2c-5.8-0.2-8-0.3-11.8,1.1 c-5,1.8-9.6,4.9-13.3,8.8c2.1,4.2,4.2,8.5,6.3,12.7l5.9-3.7c0.7-0.5,1.7-0.5,2.4,0c0.8,0.4,1.2,1.3,1.2,2.1L20.1,66.2z"/> <path class="st1" d="M44.4,18c-3.5,0-6.9-1.6-10-4.8c-2.6-2.8-4.2-6.3-4.5-10c-0.1-1.3,0.8-2.5,2.1-2.6c1.3-0.1,2.5,0.8,2.6,2.1 c0.3,2.6,1.4,5.2,3.2,7.1c0.9,0.9,3.5,3.6,7,3.3c3.9-0.3,6.4-3.9,7.5-6.1c0.8-1.5,1.3-3.2,1.6-4.9c0.2-1.3,1.4-2.2,2.7-2 c1.3,0.2,2.2,1.4,2,2.7c-0.3,2.2-1,4.3-2.1,6.3c-2.7,5.3-6.8,8.4-11.4,8.7C44.9,18,44.7,18,44.4,18z"/> </g> </g> </svg>
                                    </i>
                                    <span>{{ trans('messages.products') }}</span>
                                </a>
                            </li>
                            <li class="nav-item {{ $menu == 'source' ? 'active' : '' }}">
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('SourceController@index') }}">
                                    <i class="navbar-icon" style="">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 94.4 85.6" style="enable-background:new 0 0 94.4 85.6;" xml:space="preserve"><style type="text/css">.st0{fill:#93C2A0;}.st1{fill:#414042;}.st2{fill:#877083;}</style><g id="Layer_2_1_"><g id="Layer_1-2"><path class="st0" d="M37,58.5h18.1c2.3,0,4.2,1.9,4.2,4.2V78c0,2.3-1.9,4.2-4.2,4.2H37c-2.3,0-4.2-1.9-4.2-4.2V62.7 C32.8,60.4,34.7,58.5,37,58.5z"/><path class="st1" d="M94.4,32.8c0-1.9-0.3-3.8-0.9-5.6l0,0c0-0.3,0-0.3-0.3-0.6l-8-19.8c-1.5-4.2-5.6-6.9-10-6.8H19.2 c-4.7,0-8.3,2.4-9.7,6.5L0.9,26.8v0.6C0.3,29.3,0,31.3,0,33.3c-0.1,5.2,2.1,10.1,5.9,13.6v29.8c0,4.9,4,8.8,8.9,8.9h64 c4.9,0,8.8-4,8.9-8.9V48.1C91.7,43.7,94.4,38.4,94.4,32.8L94.4,32.8z M78.8,77.9h-64c-0.9,0-1.7-0.7-1.8-1.6c0-0.1,0-0.1,0-0.2 V50.5c2,0.6,4.1,0.9,6.2,0.9c5.5,0.1,10.8-2.4,14.2-6.8c3.5,4.2,8.7,6.5,14.2,6.5c5.5,0.1,10.8-2.4,14.2-6.8 c3.6,4.2,8.9,6.7,14.5,6.8c1.6,0,3.2-0.2,4.7-0.6v25.4C80.7,76.9,79.9,77.7,78.8,77.9L78.8,77.9z M81.4,43.1 c-1.7,0.9-3.7,1.3-5.6,1.2c-4.1,0-7.9-2.1-10-5.6c-0.3-0.3-0.3-0.9-0.9-1.5c-0.8-0.9-2-1.5-3.2-1.5c-1.3-0.1-2.5,0.5-3.2,1.5 c-0.4,0.4-0.7,0.9-0.9,1.5c-3.4,5.5-10.7,7.3-16.2,3.9c-1.6-1-2.9-2.3-3.9-3.9c-0.3-0.3-0.3-0.9-0.9-1.2c-1.5-1.8-5.3-1.8-6.5,0 c-0.4,0.4-0.8,0.9-0.9,1.5c-2.1,3.5-5.9,5.7-10,5.6c-1.9,0.1-3.9-0.3-5.6-1.2l0,0c-3.9-2.1-6.2-6.2-6.2-10.6 c0-1.3,0.2-2.6,0.6-3.8v-0.3l8.5-20.1c0.3-0.6,0.6-2.1,3.2-2.1h56.1c1.5-0.2,3,0.7,3.5,2.1l8,19.8v0.3c0.3,1.3,0.5,2.5,0.6,3.8 C87.8,36.9,85.3,40.9,81.4,43.1L81.4,43.1z"/><path class="st2" d="M67.1,27.3H26.7c-2.2,0-4-1.8-4-4s1.8-4,4-4h40.4c2.2,0,4,1.8,4,4S69.3,27.3,67.1,27.3z"/></g></g></svg>
                                    </i>
                                    <span>{{ trans('messages.stores_connections') }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if (
                    Auth::user()->customer->can("read", new App\Models\SendingServer()) ||
                    Auth::user()->customer->getCurrentActiveGeneralSubscription()->planGeneral->useOwnEmailVerificationServer() ||
                    Auth::user()->customer->can("read", new App\Models\Blacklist()) ||
                    true
                )
                    <li class="nav-item dropdown {{ in_array($menu, ['sending_server','sending_domain','sender','tracking_domain','email_verification','blacklist']) ? 'active' : '' }}">
                        <a title="{{ trans('messages.sending') }}" href="{{ route('manager.templates') }}" class="leftbar-tooltip nav-link d-flex align-items-center py-3 lvl-1 dropdown-toggle {{ request()->session()->get('customer-leftbar-state') != 'closed' && Auth::user()->customer->getMenuLayout() == 'left' && in_array($menu, ['sending_server','sending_domain','sender','tracking_domain','email_verification','blacklist']) ? 'show' : '' }}" id="sending-menu" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="navbar-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 92 94.2"><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><g id="Layer_2-2" data-name="Layer 2"><g id="Layer_1-2-2" data-name="Layer 1-2"><path d="M46.1,94.2A46.9,46.9,0,0,1,12.3,79.9a3.5,3.5,0,1,1,5-4.8,40.2,40.2,0,0,0,56.6.9A39.5,39.5,0,0,0,85.1,56a3.5,3.5,0,1,1,6.8,1.6A47.1,47.1,0,0,1,46.1,94.2Z" style="fill:#f2f2f2"/><polygon points="4.1 89.6 3.5 56.8 32.2 72.6 4.1 89.6" style="fill:#f2f2f2"/><path d="M3.5,40.9H2.7A3.5,3.5,0,0,1,.1,36.6,46.9,46.9,0,0,1,46,0h.2A46.5,46.5,0,0,1,79.7,14.3a3.5,3.5,0,1,1-5,4.8A39.7,39.7,0,0,0,46.2,7H46A39.9,39.9,0,0,0,6.9,38.2,3.5,3.5,0,0,1,3.5,40.9Z" style="fill:#f2f2f2"/><polygon points="59.8 21.6 88.5 37.4 87.9 4.6 59.8 21.6" style="fill:#f2f2f2"/><path d="M64,43.3H60.9a3.3,3.3,0,0,1-1.6-.7,2.8,2.8,0,0,1-.7-1.7,2.1,2.1,0,0,1,.7-1.5h0l.4-.4c0-.1,0-.1.1-.1h0l1.6-1.7c.5-.4.4-1.2-.2-1.8L57.8,32c-.6-.6-1.4-.7-1.8-.2l-1.7,1.6h0c-.1.1-.2.2-.2.3l-.3.2h0a2.5,2.5,0,0,1-1.6.6,2.3,2.3,0,0,1-2.3-2.3h0v-.7h0V29.3c0-.6-.6-1.1-1.5-1.1H43.6a1.2,1.2,0,0,0-1.4,1.1v2.3h-.1a.4.4,0,0,0,.1.3v.4h0a2.9,2.9,0,0,1-.7,1.6,2.6,2.6,0,0,1-3.3.1h0l-.4-.3v-.2h-.1l-1.6-1.7-.4-.3h-.4a2.2,2.2,0,0,0-1.1.5l-3.4,3.4c-.6.6-.7,1.4-.2,1.8l1.7,1.7h0c0,.1.1.1.2.2l.3.3h0a2,2,0,0,1,.6,1.5,2.4,2.4,0,0,1-2.3,2.4h-3c-.7,0-1.1.6-1.1,1.4v4.8c0,.8.4,1.4,1.1,1.4h3a2.9,2.9,0,0,1,1.6.7,2.3,2.3,0,0,1,.1,3.2h0l-.4.4h-.1L30.6,57l-.3.3v.4a2.2,2.2,0,0,0,.5,1.1l3.4,3.4a1.8,1.8,0,0,0,1.2.5.9.9,0,0,0,.7-.3l1.6-1.6h.1l.2-.3.2-.2h0a2.5,2.5,0,0,1,1.6-.6A2.4,2.4,0,0,1,42.2,62h-.1v.7h0V65c0,.6.7,1.1,1.5,1.1h4.8c.9,0,1.5-.5,1.5-1.1V62.6h0v-.7h0a2,2,0,0,1,.7-1.6,2.4,2.4,0,0,1,3.2-.1h0l.4.4c0,.1.1.1.1.2h0L56,62.4a.9.9,0,0,0,.7.3,2.2,2.2,0,0,0,1.1-.5l3.4-3.4a2.2,2.2,0,0,0,.5-1.1v-.5l-1.9-1.9h0c-.1-.1-.2-.1-.2-.2l-.3-.3h0a2,2,0,0,1-.6-1.5,2.3,2.3,0,0,1,2.2-2.4H64a1.2,1.2,0,0,0,1.1-1.4V44.7A1.2,1.2,0,0,0,64,43.3Zm-.6,6H61a4.1,4.1,0,0,0-4,4.2,4,4,0,0,0,1.8,3.3h0l1.1,1.1-3.1,3-1-1h-.1l-.5-.6a4,4,0,0,0-5.8-.2A4.1,4.1,0,0,0,48.2,63h0v1.5H43.8V62.9h.1V62a4.1,4.1,0,0,0-4.1-4.1,4.2,4.2,0,0,0-3.4,1.8h-.1l-1,1-3.1-3,1-1.1h.1l.6-.5a4.1,4.1,0,0,0,0-5.8h0a4,4,0,0,0-3.7-1.1H28.6V44.9H31a4.1,4.1,0,0,0,4.1-4.1,4.2,4.2,0,0,0-1.8-3.4h-.1l-1-1.1,3.1-3,1,1h0l.6.6a3.8,3.8,0,0,0,2.9,1.2A4.1,4.1,0,0,0,43.9,32a2.2,2.2,0,0,0-.1-.8h0V29.9h4.4v1.4h0a2.2,2.2,0,0,0-.1.8,4.1,4.1,0,0,0,4.1,4.1,4.4,4.4,0,0,0,3.5-1.8h0l1.1-1,3.1,3.1-1,.9h-.1l-.7.5a4.1,4.1,0,0,0,0,5.8h0A3.9,3.9,0,0,0,61,45h2.4Z"/><path class="color-badge" d="M48.4,68.1H43.6A3.3,3.3,0,0,1,40.1,65V61.8h-.6l-.6,1h-.4l-1,1a2.8,2.8,0,0,1-2,.9h-.3a4.3,4.3,0,0,1-2.3-1h-.1l-3.5-3.5a4.1,4.1,0,0,1-1-2.1V56.5l.9-.9,2.2-2.4a.1.1,0,0,0-.1-.1l-.3-.2H28.1A3.1,3.1,0,0,1,25,49.5V44.7a3.1,3.1,0,0,1,3.1-3.4h3a.4.4,0,0,0,.3-.4l-.3-.3-.4-.5-1.5-1.4a2.9,2.9,0,0,1-.9-2A3.2,3.2,0,0,1,29.4,34l3.5-3.5a4.1,4.1,0,0,1,2.1-1h1.4l1.2.9,1,1.1h1.1v1h.3c0-.1.1-.2.1-.3a1.9,1.9,0,0,1-.1-.8V29a3.4,3.4,0,0,1,3.5-2.8h4.7a3.3,3.3,0,0,1,3.5,3.1v2.9a.3.3,0,0,0,.3.3l.4-.2h0l.3-.3,1.7-1.6a2.8,2.8,0,0,1,1.9-.9,3.2,3.2,0,0,1,2.7,1.1L62.6,34a3.2,3.2,0,0,1,1.1,2.7,2.8,2.8,0,0,1-.9,1.9l-2.2,2.3c0,.1,0,.2.1.2a.5.5,0,0,0,.4.2h3.2a3.4,3.4,0,0,1,2.8,3.5v4.6a3.4,3.4,0,0,1-2.8,3.5H60.9c-.1,0-.2.1-.2.3h0l.5.5h0l2.5,2.5V58a4.1,4.1,0,0,1-1,2.1h-.1l-3.5,3.5a4.1,4.1,0,0,1-2.1,1h-.2a3.1,3.1,0,0,1-2.2-.9l-2.3-2.2h-.4V65A3.3,3.3,0,0,1,48.4,68.1Zm-2.5-5.6h.2A6.5,6.5,0,0,1,48,57.6a6.3,6.3,0,0,1,8.7.3v.2l.2-.2a6.1,6.1,0,0,1-2-4.4,6.1,6.1,0,0,1,6-6.2h.4V47H61a6,6,0,0,1-4.4-1.9,6.1,6.1,0,0,1,.1-8.6l.2-.2h-.1a6.2,6.2,0,0,1-10.7-4v-.3h-.2a6,6,0,0,1-1.8,4.3,6.2,6.2,0,0,1-4.3,1.8,5.8,5.8,0,0,1-4.4-1.8v-.2l-.2.2a6.3,6.3,0,0,1,2,4.5A6.1,6.1,0,0,1,31,46.9h-.4v.2a5.8,5.8,0,0,1,4.7,1.8,6,6,0,0,1,0,8.6l-.2.2.2.2h0a6.1,6.1,0,0,1,4.5-2h0A6.1,6.1,0,0,1,45.9,62Z" style="fill:aqua"/></g></g></g></g></svg>
                            </i>
                            <span>{{ trans('messages.sending') }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-bottom {{ request()->session()->get('customer-leftbar-state') != 'closed' && Auth::user()->customer->getMenuLayout() == 'left' && in_array($menu, ['sending_server','sending_domain','sender','tracking_domain','email_verification','blacklist']) ? 'show' : '' }}" aria-labelledby="sending-menu">
                            @if (Auth::user()->customer->can("read", new App\Models\SendingServer()))
                                <li class="nav-item {{ $menu == 'sending_server' ? 'active' : '' }}">
                                    <a href="{{ route('SendingServerController@index') }}"
                                        class="dropdown-item d-flex align-items-center">
                                        <i class="navbar-icon" style="width:19px">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 91.6 90.9" style="enable-background:new 0 0 91.6 90.9;" xml:space="preserve"><style type="text/css">.st0{fill:#333333;}</style><g id="Layer_2_1_"><g id="Layer_1-2"><path class="st0" d="M83.9,90.9H7.7c-4.2,0-7.7-3.1-7.7-6.8V6.8C0,3.1,3.5,0,7.7,0h76.2c4.2,0,7.7,3.1,7.7,6.8v77.3 C91.6,87.8,88.1,90.9,83.9,90.9z M7,83.7c0.1,0.1,0.4,0.2,0.7,0.2h76.2c0.3,0,0.6-0.1,0.7-0.2V7.2C84.5,7.1,84.2,7,83.9,7H7.7 C7.4,7,7.1,7.1,7,7.2V83.7z"/><path class="st0" d="M85.6,61.6H3.5C1.6,61.6,0,60,0,58.1s1.6-3.5,3.5-3.5h82.1c1.9,0,3.5,1.6,3.5,3.5S87.5,61.6,85.6,61.6z"/><path class="st0" d="M88.1,33.6H3.5C1.6,33.6,0,32,0,30.1s1.6-3.5,3.5-3.5h84.6c1.9,0,3.5,1.6,3.5,3.5S90,33.6,88.1,33.6z"/><path class="st0" d="M72,22.2c-3.6,0-6.5-2.8-6.5-6.3c0-3.5,2.9-6.3,6.5-6.3s6.5,2.8,6.5,6.3C78.5,19.4,75.6,22.2,72,22.2z M72,15.2c-0.2,0-0.5,0.3-0.5,0.7c0,0.4,0.3,0.7,0.5,0.7s0.5-0.3,0.5-0.7C72.5,15.5,72.2,15.2,72,15.2z"/><path class="st0" d="M72,49.9c-3.6,0-6.5-2.8-6.5-6.3s2.9-6.3,6.5-6.3s6.5,2.8,6.5,6.3S75.6,49.9,72,49.9z M72,42.9 c-0.2,0-0.5,0.3-0.5,0.7s0.3,0.7,0.5,0.7s0.5-0.3,0.5-0.7S72.2,42.9,72,42.9z"/><path class="st0" d="M72,80.5c-3.6,0-6.5-2.8-6.5-6.3s2.9-6.3,6.5-6.3s6.5,2.8,6.5,6.3S75.6,80.5,72,80.5z M72,73.5 c-0.2,0-0.5,0.3-0.5,0.7s0.3,0.7,0.5,0.7s0.5-0.3,0.5-0.7S72.2,73.5,72,73.5z"/><path class="st0" d="M57,19.4H18.9c-1.9,0-3.5-1.6-3.5-3.5s1.6-3.5,3.5-3.5H57c1.9,0,3.5,1.6,3.5,3.5S58.9,19.4,57,19.4z"/><path class="st0" d="M57,47.9H18.9c-1.9,0-3.5-1.6-3.5-3.5s1.6-3.5,3.5-3.5H57c1.9,0,3.5,1.6,3.5,3.5S58.9,47.9,57,47.9z"/><path class="st0" d="M57,77.7H18.9c-1.9,0-3.5-1.6-3.5-3.5s1.6-3.5,3.5-3.5H57c1.9,0,3.5,1.6,3.5,3.5S58.9,77.7,57,77.7z"/></g></g></svg>
                                    </i> {{ trans('messages.sending_servers') }}
                                    </a>
                                </li>
                            @endif

                            @if (Auth::user()->customer->allowVerifyingOwnDomains())
                                <li class="nav-item {{ $menu == 'sending_domain' ? 'active' : '' }}" rel1="SendingDomainController">
                                    <a href="{{ route('SendingDomainController@index') }}" class="dropdown-item d-flex align-items-center">
                                    <i class="navbar-icon" style="width:20	px">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 77.4 77.5" style="enable-background:new 0 0 77.4 77.5;" xml:space="preserve"><style type="text/css">.st0{fill:#333333;}</style><g id="Layer_2_1_"><g id="Layer_1-2"><path class="st0" d="M38.7,77.4c-10.2,0-20.3-4-27.9-11.9C-4.1,50.1-3.5,25.6,11.9,10.8l0.4-0.4h0.1C27.3-3.3,50.1-3.3,65,10.4 h0.1l0.5,0.5l1,1.1c14.7,15.4,14.2,39.9-1.2,54.7C58,73.9,48.3,77.4,38.7,77.4z M5.8,41.5c1.5,17,15.6,30.2,32.9,30.3 c17.3,0,31.5-13.2,32.9-30.3H5.8z M61.4,35.9h10.3C71,28.8,68.1,22,63.4,16.7c-1.7,1.4-3.5,2.7-5.4,3.8 C60,25.4,61.1,30.6,61.4,35.9z M41.5,35.9h14.2c-0.3-4.5-1.3-8.8-2.9-13c-3.6,1.4-7.5,2.3-11.4,2.6V35.9z M21.7,35.9h14.2V25.5 c-3.9-0.3-7.7-1.2-11.4-2.6C22.9,27.1,22,31.4,21.7,35.9z M5.8,35.9h10.3c0.3-5.3,1.4-10.5,3.4-15.4c-1.9-1.1-3.7-2.3-5.4-3.8 C9.3,22,6.4,28.8,5.8,35.9z M41.5,7.2v12.6c3.1-0.3,6.1-0.9,9-2.1C48.2,13.7,45.1,10.1,41.5,7.2z M27,17.8 c2.9,1.1,5.8,1.8,8.9,2.1V7.2C32.3,10.1,29.3,13.7,27,17.8z M18.2,12.8c1.2,0.9,2.4,1.8,3.7,2.5c1.5-2.7,3.2-5.3,5.3-7.6 C23.9,8.9,20.9,10.6,18.2,12.8z M50.2,7.7c2,2.3,3.8,4.9,5.3,7.6c1.3-0.8,2.5-1.6,3.7-2.5C56.5,10.6,53.5,8.9,50.2,7.7z"/><rect x="22.5" y="51" class="st0" width="6.3" height="7"/><rect x="34.8" y="51" class="st0" width="7.2" height="7"/><rect x="47.5" y="51" class="st0" width="7.4" height="7"/></g></g></svg>
                                        </i> {{ trans('messages.sending_domains') }}
                                    </a>
                                </li>
                            @endif

                            @if (Auth::user()->customer->getCurrentActiveGeneralSubscription()->planGeneral->allowSenderVerification())
                                <li class="nav-item {{ $menu == 'sender' ? 'active' : '' }}">
                                    <a href="{{ route('SenderController@index') }}" class="dropdown-item d-flex align-items-center">
                                    <i class="navbar-icon" style="width:20	px">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 114.7 98.6" style="enable-background:new 0 0 114.7 98.6;" xml:space="preserve"><style type="text/css">.st0{fill:#333333;}</style><g id="Layer_2_1_"><g id="Layer_1-2"><path class="st0" d="M59.9,96.5H12.3C5.4,96.5,0,90,0,81.8V14.7C0,6.5,5.4,0,12.3,0h71.2c6.7,0,12.2,6.6,12.2,14.7v22.2 c0,1.9-1.6,3.5-3.5,3.5s-3.5-1.6-3.5-3.5V14.7c0-4.2-2.4-7.7-5.2-7.7H12.3C9.4,7,7,10.5,7,14.7v67.1c0,4.2,2.4,7.7,5.3,7.7h47.6 c1.9,0,3.5,1.6,3.5,3.5S61.8,96.5,59.9,96.5z"/><path class="st0" d="M30.8,43.7c-7.3,0-13.2-5.9-13.2-13.2s5.9-13.2,13.2-13.2c7.3,0,13.2,5.9,13.2,13.2S38.1,43.7,30.8,43.7z M30.8,24.3c-3.4,0-6.2,2.8-6.2,6.2s2.8,6.2,6.2,6.2c3.4,0,6.2-2.8,6.2-6.2S34.2,24.3,30.8,24.3z"/><path class="st0" d="M74.8,32.3H53.7c-1.9,0-3.5-1.6-3.5-3.5s1.6-3.5,3.5-3.5h21.1c1.9,0,3.5,1.6,3.5,3.5S76.7,32.3,74.8,32.3z"/><path class="st0" d="M66.2,43.6H53.7c-1.9,0-3.5-1.6-3.5-3.5s1.6-3.5,3.5-3.5h12.5c1.9,0,3.5,1.6,3.5,3.5S68.1,43.6,66.2,43.6z"/><path class="st0" d="M86.4,98.6c-7.6,0-14.7-2.9-20-8.3c-11-11-11-29,0-40l0,0c5.3-5.3,12.5-8.3,20-8.3c7.6,0,14.7,2.9,20,8.3 c5.3,5.3,8.3,12.5,8.3,20s-2.9,14.7-8.3,20C101.1,95.7,94,98.6,86.4,98.6z M71.3,55.3c-8.3,8.3-8.3,21.8,0,30.1 c4,4,9.4,6.2,15.1,6.2c5.7,0,11-2.2,15.1-6.2s6.2-9.4,6.2-15.1s-2.2-11-6.2-15.1c-4-4-9.4-6.2-15.1-6.2S75.4,51.2,71.3,55.3 L71.3,55.3z"/><path class="st0" d="M82.1,80c-1,0-2-0.4-2.7-1.3l-8.8-10.5c-1.2-1.5-1-3.7,0.4-4.9c1.5-1.2,3.7-1,4.9,0.4l6.7,8l14.8-10.6 c1.6-1.1,3.8-0.8,4.9,0.8s0.8,3.8-0.8,4.9L84.1,79.3C83.5,79.8,82.8,80,82.1,80z"/><path class="st0" d="M12,77.5c-1.9,0-3.5-1.6-3.5-3.5c0-11.6,9.6-29.5,22.4-29.5c13,0,22.4,16.6,22.4,27.8c0,1.9-1.6,3.5-3.5,3.5 s-3.5-1.6-3.5-3.5c0-10.5-8.8-20.8-15.4-20.8c-7.9,0-15.4,14-15.4,22.5C15.5,75.9,13.9,77.5,12,77.5z"/><path class="st0" d="M30.9,77.5c-1.9,0-3.5-1.6-3.5-3.5V56.6c0-1.9,1.6-3.5,3.5-3.5s3.5,1.6,3.5,3.5V74 C34.4,75.9,32.8,77.5,30.9,77.5z"/><polygon class="st0" points="25,58.3 30.9,48 36.9,58.3 "/></g></g></svg>
                                        </i> {{ trans('messages.verified_senders') }}
                                    </a>
                                </li>
                            @endif
                            <li class="nav-item {{ $menu == 'tracking_domain' ? 'active' : '' }}">
                                <a href="{{ route('TrackingDomainController@index') }}" class="dropdown-item d-flex align-items-center">
                                <i class="navbar-icon" style="width:20px">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 77.4 77.5" style="enable-background:new 0 0 77.4 77.5;" xml:space="preserve"><style type="text/css">.st0{fill:#333333;}</style><g id="Layer_2_1_"><g id="Layer_1-2"><path class="st0" d="M38.7,77.4c-10.2,0-20.3-4-27.9-11.9C-4.1,50.1-3.5,25.6,11.9,10.8l0.4-0.4h0.1C27.3-3.3,50.1-3.3,65,10.4 h0.1l0.5,0.5l1,1.1c14.7,15.4,14.2,39.9-1.2,54.7C58,73.9,48.3,77.4,38.7,77.4z M5.8,41.5c1.5,17,15.6,30.2,32.9,30.3 c17.3,0,31.5-13.2,32.9-30.3H5.8z M61.4,35.9h10.3C71,28.8,68.1,22,63.4,16.7c-1.7,1.4-3.5,2.7-5.4,3.8 C60,25.4,61.1,30.6,61.4,35.9z M41.5,35.9h14.2c-0.3-4.5-1.3-8.8-2.9-13c-3.6,1.4-7.5,2.3-11.4,2.6V35.9z M21.7,35.9h14.2V25.5 c-3.9-0.3-7.7-1.2-11.4-2.6C22.9,27.1,22,31.4,21.7,35.9z M5.8,35.9h10.3c0.3-5.3,1.4-10.5,3.4-15.4c-1.9-1.1-3.7-2.3-5.4-3.8 C9.3,22,6.4,28.8,5.8,35.9z M41.5,7.2v12.6c3.1-0.3,6.1-0.9,9-2.1C48.2,13.7,45.1,10.1,41.5,7.2z M27,17.8 c2.9,1.1,5.8,1.8,8.9,2.1V7.2C32.3,10.1,29.3,13.7,27,17.8z M18.2,12.8c1.2,0.9,2.4,1.8,3.7,2.5c1.5-2.7,3.2-5.3,5.3-7.6 C23.9,8.9,20.9,10.6,18.2,12.8z M50.2,7.7c2,2.3,3.8,4.9,5.3,7.6c1.3-0.8,2.5-1.6,3.7-2.5C56.5,10.6,53.5,8.9,50.2,7.7z"/><rect x="22.5" y="51" class="st0" width="6.3" height="7"/><rect x="34.8" y="51" class="st0" width="7.2" height="7"/><rect x="47.5" y="51" class="st0" width="7.4" height="7"/></g></g></svg>
                                    </i> {{ trans('messages.tracking_domains') }}
                                </a>
                            </li>
                            @if (Auth::user()->customer->getCurrentActiveGeneralSubscription()->planGeneral->useOwnEmailVerificationServer())
                                <li class="nav-item {{ $menu == 'email_verification' ? 'active' : '' }}">
                                    <a href="{{ route('EmailVerificationServerController@index') }}" class="dropdown-item d-flex align-items-center">
                                    <i class="navbar-icon" style="width:20px">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 91.6 90.9" style="enable-background:new 0 0 91.6 90.9;" xml:space="preserve"><style type="text/css">.st0{fill:#333333;}</style><g id="Layer_2_1_"><g id="Layer_1-2"><path class="st0" d="M83.9,90.9H7.7c-4.2,0-7.7-3.1-7.7-6.8V6.8C0,3.1,3.5,0,7.7,0h76.2c4.2,0,7.7,3.1,7.7,6.8v77.3 C91.6,87.8,88.1,90.9,83.9,90.9z M7,83.7c0.1,0.1,0.4,0.2,0.7,0.2h76.2c0.3,0,0.6-0.1,0.7-0.2V7.2C84.5,7.1,84.2,7,83.9,7H7.7 C7.4,7,7.1,7.1,7,7.2V83.7z"/><path class="st0" d="M85.6,61.6H3.5C1.6,61.6,0,60,0,58.1s1.6-3.5,3.5-3.5h82.1c1.9,0,3.5,1.6,3.5,3.5S87.5,61.6,85.6,61.6z"/><path class="st0" d="M88.1,33.6H3.5C1.6,33.6,0,32,0,30.1s1.6-3.5,3.5-3.5h84.6c1.9,0,3.5,1.6,3.5,3.5S90,33.6,88.1,33.6z"/><path class="st0" d="M72,22.2c-3.6,0-6.5-2.8-6.5-6.3c0-3.5,2.9-6.3,6.5-6.3s6.5,2.8,6.5,6.3C78.5,19.4,75.6,22.2,72,22.2z M72,15.2c-0.2,0-0.5,0.3-0.5,0.7c0,0.4,0.3,0.7,0.5,0.7s0.5-0.3,0.5-0.7C72.5,15.5,72.2,15.2,72,15.2z"/><path class="st0" d="M72,49.9c-3.6,0-6.5-2.8-6.5-6.3s2.9-6.3,6.5-6.3s6.5,2.8,6.5,6.3S75.6,49.9,72,49.9z M72,42.9 c-0.2,0-0.5,0.3-0.5,0.7s0.3,0.7,0.5,0.7s0.5-0.3,0.5-0.7S72.2,42.9,72,42.9z"/><path class="st0" d="M72,80.5c-3.6,0-6.5-2.8-6.5-6.3s2.9-6.3,6.5-6.3s6.5,2.8,6.5,6.3S75.6,80.5,72,80.5z M72,73.5 c-0.2,0-0.5,0.3-0.5,0.7s0.3,0.7,0.5,0.7s0.5-0.3,0.5-0.7S72.2,73.5,72,73.5z"/><path class="st0" d="M57,19.4H18.9c-1.9,0-3.5-1.6-3.5-3.5s1.6-3.5,3.5-3.5H57c1.9,0,3.5,1.6,3.5,3.5S58.9,19.4,57,19.4z"/><path class="st0" d="M57,47.9H18.9c-1.9,0-3.5-1.6-3.5-3.5s1.6-3.5,3.5-3.5H57c1.9,0,3.5,1.6,3.5,3.5S58.9,47.9,57,47.9z"/><path class="st0" d="M57,77.7H18.9c-1.9,0-3.5-1.6-3.5-3.5s1.6-3.5,3.5-3.5H57c1.9,0,3.5,1.6,3.5,3.5S58.9,77.7,57,77.7z"/></g></g></svg>
                                    </i> {{ trans('messages.email_verification_servers') }}
                                    </a>
                                </li>
                            @endif
                            @if (Auth::user()->customer->can("read", new App\Models\Blacklist()))
                                <li class="nav-item {{ $menu == 'blacklist' ? 'active' : '' }}">
                                    <a href="{{ route('BlacklistController@index') }}" class="dropdown-item d-flex align-items-center">
                                    <i class="navbar-icon" style="width:20px">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 65.6 65.6" style="enable-background:new 0 0 65.6 65.6;" xml:space="preserve"><style type="text/css">.st0{fill:#333333;}</style><g id="Layer_2_1_"><g id="Layer_1-2"><g><path class="st0" d="M42.7,56.8c-1.1,0-2,0.9-2,2v1.8H5v-10c-0.1-9.7,7.7-17.7,17.4-17.9h0.9c3.7,0.1,7.2,1.3,10.2,3.5 c0.9,0.7,2.1,0.5,2.8-0.4c0.6-0.9,0.4-2.1-0.5-2.8c-1.6-1.2-3.3-2.2-5.2-2.9c7.5-4.3,10.2-13.9,5.9-21.4S22.6-1.5,15.1,2.8 S4.9,16.7,9.2,24.2c1.4,2.5,3.4,4.5,5.9,5.9C6.6,33.3,1,41.5,1,50.6v10.5c0,1.9,1.6,3.5,3.5,3.5h36.7c1.9,0,3.5-1.6,3.5-3.5v-2.3 C44.7,57.7,43.8,56.8,42.7,56.8z M11.2,16.6C11.3,10.1,16.6,5,23,5c3,0,5.9,1.2,8.1,3.4c4.5,4.5,4.5,11.9,0,16.4 c-2.2,2.2-5.2,3.4-8.3,3.4C16.4,28.2,11.2,23,11.2,16.6z"/><path class="st0" d="M41.2,65.6H4.5c-2.5,0-4.5-2-4.5-4.5V50.6c0-8.8,5.1-16.9,13-20.7c-1.9-1.4-3.5-3.2-4.7-5.2 C6.1,20.8,5.6,16.3,6.8,12c1.2-4.3,4-7.9,7.9-10.1c3.9-2.2,8.4-2.8,12.7-1.6c4.3,1.2,7.9,4,10.1,7.9c4.2,7.4,2.1,16.8-4.7,21.7 c1.3,0.6,2.5,1.4,3.7,2.3c1.3,1,1.6,2.8,0.7,4.1c-0.5,0.7-1.2,1.1-2,1.2c-0.8,0.1-1.6-0.1-2.2-0.6c-2.8-2.1-6.1-3.2-9.6-3.3 l-0.9,0C13.3,33.9,5.9,41.4,6,50.6v9h33.7v-0.8c0-1.7,1.3-3,3-3s3,1.3,3,3v2.3C45.7,63.6,43.7,65.6,41.2,65.6z M22.8,1.7 c-2.5,0-5,0.6-7.2,1.9c-7,4-9.5,13-5.5,20c1.3,2.3,3.2,4.2,5.5,5.5l1.8,1l-2,0.8C7.4,34.1,2,42,2,50.6v10.5 c0,1.4,1.1,2.5,2.5,2.5h36.7c1.4,0,2.5-1.1,2.5-2.5v-2.3c0-0.6-0.4-1-1-1s-1,0.4-1,1v2.8H4v-11c-0.1-10.2,8.1-18.7,18.4-18.9h0.9 c3.9,0.1,7.7,1.4,10.8,3.7c0.2,0.2,0.5,0.2,0.7,0.2c0.3,0,0.5-0.2,0.7-0.4c0.3-0.4,0.1-1.1-0.3-1.4c-1.5-1.2-3.2-2.1-4.9-2.8 l-2-0.8l1.9-1.1c7-4,9.5-13,5.5-20c-1.9-3.4-5.1-5.9-8.9-6.9C25.5,1.9,24.1,1.7,22.8,1.7z M22.9,29.2c0,0-0.1,0-0.1,0 c-6.9,0-12.6-5.7-12.6-12.6v0c0-3.4,1.4-6.6,3.8-8.9s5.7-3.6,9-3.6c3.3,0,6.4,1.3,8.7,3.6c2.4,2.4,3.7,5.6,3.7,8.9 s-1.3,6.5-3.7,8.9C29.5,27.9,26.2,29.2,22.9,29.2z M12.2,16.6c0,5.8,4.8,10.6,10.6,10.6c2.8,0,5.6-1.1,7.6-3.1 c2-2,3.1-4.7,3.1-7.5c0-2.8-1.1-5.5-3.1-7.5c-2-1.9-4.6-3-7.4-3.1c-2.9,0-5.6,1-7.6,3C13.4,11.1,12.2,13.8,12.2,16.6z"/></g><g><path class="st0" d="M55.5,40.7l8.5-8.5c0.7-0.9,0.5-2.1-0.4-2.8c-0.7-0.5-1.7-0.5-2.4,0l-8.6,8.5l-8.5-8.5 c-0.9-0.7-2.1-0.5-2.8,0.4c-0.5,0.7-0.5,1.7,0,2.4l8.5,8.5l-8.5,8.6c-0.8,0.7-0.8,1.9-0.1,2.7c0,0,0.1,0.1,0.1,0.1 c0.7,0.8,1.9,0.8,2.7,0.1c0,0,0.1-0.1,0.1-0.1l8.5-8.6l8.6,8.6c0.7,0.8,1.9,0.8,2.7,0.1c0,0,0.1-0.1,0.1-0.1 c0.8-0.7,0.8-1.9,0.1-2.7c0,0-0.1-0.1-0.1-0.1L55.5,40.7z"/><path class="st0" d="M62.6,53.7c-0.8,0-1.6-0.3-2.1-0.9l-7.9-7.9l-7.8,7.9c0,0-0.1,0.1-0.1,0.1c-1.2,1.1-3,1-4.1-0.2c0,0,0,0,0,0 c0,0-0.1-0.1-0.1-0.1c-1.1-1.2-1-3,0.2-4.1l7.8-7.9l-7.9-7.9c-0.8-1.1-0.8-2.5,0-3.6c1-1.3,2.9-1.6,4.2-0.6l0.1,0.1l7.8,7.8 l8-7.9c1.1-0.8,2.5-0.8,3.6,0c0.6,0.5,1.1,1.2,1.2,2c0.1,0.8-0.1,1.6-0.6,2.2l-0.1,0.1l-7.8,7.8l7.8,7.9c0,0,0.1,0.1,0.1,0.1 c0.5,0.6,0.8,1.3,0.8,2.1c0,0.8-0.4,1.5-0.9,2c0,0-0.1,0.1-0.1,0.1C64,53.5,63.3,53.7,62.6,53.7z M42.1,31.6l9.1,9.1L42,50 c-0.4,0.4-0.4,0.9-0.1,1.3l0.1,0.1c0.3,0.4,0.9,0.4,1.3,0.1l0.1-0.1l9.2-9.3l9.3,9.3c0.4,0.4,0.9,0.4,1.3,0.1l0.1-0.1 c0.2-0.2,0.3-0.4,0.3-0.6c0-0.2-0.1-0.5-0.2-0.6L63.3,50l-9.2-9.3l9.1-9.1c0.1-0.2,0.2-0.4,0.2-0.7c0-0.3-0.2-0.5-0.4-0.7 c-0.3-0.3-0.8-0.3-1.2,0l-9.3,9.1l-9.1-9.1c-0.4-0.3-1-0.2-1.4,0.2C41.8,30.7,41.8,31.2,42.1,31.6z"/></g></g></g></svg>
                                    </i> {{ trans('messages.blacklist') }}
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if (Auth::user()->customer->can("list", App\Models\Website::class))
                    <li class="nav-item dropdown {{ in_array($menu, ['website','website_new']) ? 'active' : '' }}">
                        <a href=""
                            class="leftbar-tooltip nav-link d-flex align-items-center py-3 lvl-1 dropdown-toggle {{ request()->session()->get('customer-leftbar-state') != 'closed' && Auth::user()->customer->getMenuLayout() == 'left' && in_array($menu, ['website','website_new']) ? 'show' : '' }}"
                            data-bs-toggle="dropdown"
                        >
                            <i class="navbar-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 87.5 87.5"><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path d="M44.5,87.5H13.4A13.4,13.4,0,0,1,0,74.1V13.4A13.4,13.4,0,0,1,13.4,0H24.5A3.5,3.5,0,0,1,28,3.5,3.5,3.5,0,0,1,24.5,7H13.4A6.4,6.4,0,0,0,7,13.4V74.1a6.4,6.4,0,0,0,6.4,6.4H44.5a3.5,3.5,0,0,1,0,7Z" style="fill:#f2f2f2"/><path d="M84,87.5H66.5a3.5,3.5,0,0,1,0-7h14V13.4A6.4,6.4,0,0,0,74.1,7H42a3.5,3.5,0,0,1-3.5-3.5A3.5,3.5,0,0,1,42,0H74.1A13.4,13.4,0,0,1,87.5,13.4V84A3.5,3.5,0,0,1,84,87.5Z" style="fill:#f2f2f2"/><path d="M66.5,87.5A3.5,3.5,0,0,1,63,84V49H22.8a3.6,3.6,0,0,1-3.6-3.5v-21A3.6,3.6,0,0,1,22.8,21H38.5V3.5a3.5,3.5,0,0,1,7,0v21A3.5,3.5,0,0,1,42,28H26.2V42H66.5A3.5,3.5,0,0,1,70,45.5V84A3.5,3.5,0,0,1,66.5,87.5Z" style="fill:#f2f2f2"/><path class="color-badge"  d="M36.5,76A10.5,10.5,0,1,1,47,65.5,10.5,10.5,0,0,1,36.5,76Zm0-14A3.5,3.5,0,1,0,40,65.5,3.5,3.5,0,0,0,36.5,62Z" style="fill:#ffd500"/></g></g></svg>
                            </i>
                            <span>{{ trans('messages.intergration') }}</span>
                        </a>
                        <ul class="dropdown-menu {{ request()->session()->get('customer-leftbar-state') != 'closed' && Auth::user()->customer->getMenuLayout() == 'left' && in_array($menu, ['website','website_new']) ? 'show' : '' }}" aria-labelledby="audience-menu">
                            <li class="nav-item {{ $menu == 'website_new' ? 'active' : '' }}">
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('WebsiteController@create') }}">
                                    <i class="navbar-icon" style="">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 97.7 97"><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path d="M48.5,97A48.5,48.5,0,1,1,97,48.5a47.8,47.8,0,0,1-.9,9.2A3.4,3.4,0,0,1,92,60.4a3.5,3.5,0,0,1-2.7-4.1,40.4,40.4,0,0,0,.7-7.8A41.5,41.5,0,1,0,48.5,90a39.3,39.3,0,0,0,6.9-.6,3.5,3.5,0,0,1,4,2.9,3.4,3.4,0,0,1-2.8,4A43.6,43.6,0,0,1,48.5,97Z" style="fill:#333"/><path d="M89,52.5H7a3.5,3.5,0,0,1,0-7H89a3.5,3.5,0,0,1,0,7Z" style="fill:#333"/><path d="M25,52.5a3.5,3.5,0,0,1-3.5-3.4,51.1,51.1,0,0,1,23.6-45,3.4,3.4,0,0,1,4.8,1,3.4,3.4,0,0,1-1,4.8,44.2,44.2,0,0,0-20.4,39,3.5,3.5,0,0,1-3.4,3.6Z" style="fill:#333"/><path d="M72.6,51.5h-.1a3.6,3.6,0,0,1-3.4-3.6c.2-4.2-.1-9.9-3.7-18A45,45,0,0,0,48.7,10.4a3.4,3.4,0,0,1-1-4.8,3.4,3.4,0,0,1,4.8-1.1A52,52,0,0,1,71.8,27.1c4.2,9.5,4.5,16.5,4.3,21A3.5,3.5,0,0,1,72.6,51.5Z" style="fill:#333"/><path d="M79.2,95.7a3.5,3.5,0,0,1-3.5-3.5v-30a3.5,3.5,0,0,1,3.5-3.5,3.5,3.5,0,0,1,3.5,3.5v30A3.4,3.4,0,0,1,79.2,95.7Z" style="fill:#333"/><path d="M94.2,80.7h-30a3.5,3.5,0,0,1-3.5-3.5,3.5,3.5,0,0,1,3.5-3.5h30a3.5,3.5,0,0,1,3.5,3.5A3.4,3.4,0,0,1,94.2,80.7Z" style="fill:#333"/><path d="M49,52.5A3.5,3.5,0,0,1,45.5,49V7a3.5,3.5,0,0,1,7,0V49A3.5,3.5,0,0,1,49,52.5Z" style="fill:#333"/></g></g></svg>
                                    </i>
                                    <span>{{ trans('messages.website.add_site') }}</span>
                                </a>
                            </li>
                            <li class="nav-item {{ $menu == 'website' ? 'active' : '' }}" rel1="WebsiteController/show">
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('WebsiteController@index') }}">
                                    <i class="navbar-icon" style="">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 94.8 89.5"><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path d="M69.2,89.5H15.1A15.1,15.1,0,0,1,0,74.5V20.3a15.1,15.1,0,0,1,15.1-15H41.6a3.5,3.5,0,0,1,0,7H15.1a8,8,0,0,0-8.1,8V74.5a8,8,0,0,0,8.1,8H69.2a8,8,0,0,0,8-8V47.9a3.5,3.5,0,1,1,7,0V74.5A15,15,0,0,1,69.2,89.5Z" style="fill:#333"/><path d="M67,43A21.5,21.5,0,1,1,88.4,21.5,21.5,21.5,0,0,1,67,43ZM67,7A14.5,14.5,0,1,0,81.4,21.5,14.5,14.5,0,0,0,67,7Z" style="fill:#333"/><path d="M29.4,46.1A12.5,12.5,0,1,1,41.9,33.6,12.5,12.5,0,0,1,29.4,46.1Zm0-17.9a5.5,5.5,0,1,0,5.5,5.4A5.5,5.5,0,0,0,29.4,28.2Z" style="fill:#333"/><path d="M45.3,78.9A12.5,12.5,0,1,1,57.8,66.4,12.5,12.5,0,0,1,45.3,78.9Zm0-18a5.5,5.5,0,0,0-5.5,5.5,5.5,5.5,0,0,0,11,0A5.5,5.5,0,0,0,45.3,60.9Z" style="fill:#333"/><path d="M40.5,33.4a3.5,3.5,0,0,1-.7-6.9l9.5-2.1a3.6,3.6,0,0,1,4.2,2.7,3.4,3.4,0,0,1-2.7,4.1l-9.5,2.2Z" style="fill:#333"/><path d="M52.2,60.9a2.7,2.7,0,0,1-1.3-.2,3.5,3.5,0,0,1-2-4.5l7.4-19.1a3.5,3.5,0,0,1,4.5-2,3.6,3.6,0,0,1,2,4.6l-7.4,19A3.3,3.3,0,0,1,52.2,60.9Z" style="fill:#333"/><path d="M66.9,31.6A10.6,10.6,0,1,1,77.5,21,10.6,10.6,0,0,1,66.9,31.6Zm0-13.2A2.6,2.6,0,0,0,64.3,21a2.6,2.6,0,1,0,5.2,0A2.6,2.6,0,0,0,66.9,18.4Z" style="fill:#333"/><path d="M91.3,78.9a3.5,3.5,0,0,1-3.5-3.5V60.6a3.5,3.5,0,0,1,7,0V75.4A3.5,3.5,0,0,1,91.3,78.9Z" style="fill:#333"/></g></g></svg>
                                    </i>
                                    <span>{{ trans('messages.connections.manage') }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                @if (Auth::user()->customer->canUseApi())
                    <li class="nav-item {{ $menu == 'api' ? 'active' : '' }}">
                        <a href="{{ route("AccountController@api") }}" class="leftbar-tooltip nav-link d-flex align-items-center py-3 lvl-1">
                        <i class="navbar-icon">
                        <svg style="width:22px;height:22px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 92.6 105.4"><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><g id="Layer_2-2" data-name="Layer 2"><g id="Layer_1-2-2" data-name="Layer 1-2"><path d="M16.8,71.1a3.5,3.5,0,0,1-1.9-.6C6.9,65.4,1.5,57.8.3,49.7c-.9-5.8.3-11.1,3.5-15,4.5-5.4,11.1-6.9,16.4-7.1-.9-4.5-1.1-10.7,2.5-16.4S31.8,2.1,38.7.6s15.4-.1,21,3.9a24.3,24.3,0,0,1,8.9,13,17.3,17.3,0,0,1,15-1.1,17.1,17.1,0,0,1,8.2,7.5,3.5,3.5,0,1,1-6.2,3.2A9.6,9.6,0,0,0,81,22.8c-3.8-1.5-8.8-.2-12.3,3.2a3.4,3.4,0,0,1-3.7.8,3.3,3.3,0,0,1-2.2-3.1c-.1-.9-.7-9.1-7.1-13.7A21.8,21.8,0,0,0,40,7.6,17.1,17.1,0,0,0,28.5,15c-3.7,5.9-1.3,13.1-.4,15.2a3.5,3.5,0,0,1-.4,3.4A3.4,3.4,0,0,1,24.6,35h-.3c-3.2-.3-11-.6-15.1,4.4-1.9,2.3-2.6,5.7-2,9.4,1,6.1,5.2,11.9,11.5,16a3.5,3.5,0,0,1,1.1,4.8A3.8,3.8,0,0,1,16.8,71.1Z" style="fill:#f2f2f2"/><path d="M60,52A12.2,12.2,0,1,1,47.9,73.1a12.2,12.2,0,0,1,4.6-22.7,1.6,1.6,0,0,1,1.7,1.3,1.7,1.7,0,0,1-1.3,1.8,8.7,8.7,0,0,0-7.1,5,9.1,9.1,0,1,0,16.4,8A9,9,0,0,0,58,54.4a1.4,1.4,0,0,1-.9-1.7,1.9,1.9,0,0,1-.2-.7V26.4H51V36.8l-1.3.3a25.5,25.5,0,0,0-16.2,9.7l-.8,1.1-9.6-5.5-3,5.1,9.8,5.7-.4,1.2a26.6,26.6,0,0,0-1.2,7.9,25.7,25.7,0,0,0,2,9.9l.5,1.3L20.1,79.6l3,5.2L34,78.5l.9.9a25.1,25.1,0,0,0,14.8,8.1l1.3.2v13.1h5.9V87.7l1.3-.2A25.4,25.4,0,0,0,73,79.4l.9-.9,10.9,6.3,3-5.2L77.1,73.5l.5-1.3a25.7,25.7,0,0,0,2-9.9,26.6,26.6,0,0,0-1.2-7.9L78,53.2l9.8-5.7-3-5.1-9.6,5.5-.8-1.1a25.9,25.9,0,0,0-9.7-7.7,1.5,1.5,0,0,1-.8-2A.1.1,0,0,1,64,37a1.4,1.4,0,0,1,1.8-.8H66a26.7,26.7,0,0,1,10,7.6l7.9-4.6a2.4,2.4,0,0,1,3.2.9l3.7,6.5a2.2,2.2,0,0,1-.7,3H90l-8.3,4.8a28.6,28.6,0,0,1,1,7.7A29.7,29.7,0,0,1,81,72.1l9,5.2a2.2,2.2,0,0,1,.8,3.1h0L87.1,87a2.2,2.2,0,0,1-3.1.8h-.1l-9.4-5.4A29.2,29.2,0,0,1,60,90.3v11.3a2.3,2.3,0,0,1-2.3,2.3H50.2a2.3,2.3,0,0,1-2.3-2.3h0V90.3a29.2,29.2,0,0,1-14.5-7.9L24,87.8a2.4,2.4,0,0,1-3.2-.7h0L17,80.5a2.4,2.4,0,0,1,.9-3.2l9-5.2a29.7,29.7,0,0,1-1.7-9.8,28.6,28.6,0,0,1,1-7.7l-8.3-4.8a2.3,2.3,0,0,1-.9-3.1l3.8-6.5a2.4,2.4,0,0,1,3.2-.9l7.9,4.6a28.3,28.3,0,0,1,16-9.6V25.6a2.3,2.3,0,0,1,2.3-2.3h7.5A2.3,2.3,0,0,1,60,25.6h0Z" style="fill:#f2f2f2"/><path d="M57.7,105.4H50.2a3.8,3.8,0,0,1-3.8-3.8V91.5a30.5,30.5,0,0,1-13.2-7.2l-8.4,4.8a3.8,3.8,0,0,1-5.2-1.3h-.1l-3.8-6.5A3.8,3.8,0,0,1,17.1,76l8-4.6a31.4,31.4,0,0,1-1.4-9.1,27.9,27.9,0,0,1,.8-7l-7.3-4.2A3.8,3.8,0,0,1,15.7,46l3.8-6.5A3.9,3.9,0,0,1,24.7,38l6.9,4a30.5,30.5,0,0,1,14.8-8.9V25.6a3.8,3.8,0,0,1,3.8-3.8h7.5a3.8,3.8,0,0,1,3.8,3.8V51.2a13.9,13.9,0,1,1-9.2-2.1,3.3,3.3,0,0,1,3.1,1.7V27.9H52.5V38l-2.6.6a23.7,23.7,0,0,0-15.2,9.1l-1.6,2.2-9.5-5.5-1.5,2.5,9.6,5.6-.8,2.4a23.3,23.3,0,0,0-1.1,7.4,22.8,22.8,0,0,0,1.9,9.3l1,2.5-10.5,6,1.5,2.6,10.6-6.1L36,78.3A24.2,24.2,0,0,0,50,86l2.6.4V99.3h2.9V86.4l2.6-.4A24,24,0,0,0,72,78.4l1.8-1.8,10.6,6.1,1.5-2.6-10.5-6,1-2.5a23.2,23.2,0,0,0,1.9-9.4,26.5,26.5,0,0,0-1.1-7.4l-.8-2.3L86,46.9l-1.7-2.5-9.5,5.5-1.6-2.2a23.7,23.7,0,0,0-9.1-7.2,3,3,0,0,1-1.6-1.7,2.7,2.7,0,0,1,.1-2.3.3.3,0,0,1,.1-.2,2.8,2.8,0,0,1,1.5-1.5,2.8,2.8,0,0,1,2.2,0h.3a28,28,0,0,1,9.7,7l6.8-4a3.8,3.8,0,0,1,5.2,1.4l3.7,6.5a3.2,3.2,0,0,1,.4,2.7,3.5,3.5,0,0,1-1.6,2.3h-.2l-7.3,4.2a32.7,32.7,0,0,1,.8,7,30.9,30.9,0,0,1-1.4,9.1l7.9,4.6a3.8,3.8,0,0,1,1.8,2.3,3.7,3.7,0,0,1-.4,2.9H92l-3.7,6.4A3.8,3.8,0,0,1,86,89.3a3.7,3.7,0,0,1-2.9-.4L74.6,84a29.5,29.5,0,0,1-13.2,7.2v10.1A3.7,3.7,0,0,1,57.7,105.4Zm-7.9-3.1h0ZM58.4,89v13c.1-.1.1-.2.1-.4V89.1l1.2-.3a27.6,27.6,0,0,0,13.8-7.5l.8-.8,10.4,6H85L74.1,80.4H74A26.3,26.3,0,0,1,58.4,89ZM33.6,80.5l.8.8a27.2,27.2,0,0,0,13.8,7.5l1.2.3v12.5a.6.6,0,0,0,.1.4V89a26.4,26.4,0,0,1-15.7-8.6h0L23,86.7h.3Zm56-1.1-4.1,7.1.3-.3,3.7-6.5A.4.4,0,0,0,89.6,79.4Zm-71.4-.1a.9.9,0,0,0,.1.5l3.8,6.5.3.3Zm.1-31.1.3.3,9.3,5.4L27.6,55a25.6,25.6,0,0,0-.9,7.3,26.8,26.8,0,0,0,1.6,9.3l.4,1.2L18.6,78.6l-.3.3,10.6-6h0a27.5,27.5,0,0,1-.8-18.9h0ZM79,72.8l10.6,6-.3-.3L79.2,72.7l.4-1.2a26.8,26.8,0,0,0,1.6-9.3,29.8,29.8,0,0,0-.9-7.3L80,53.8l9.3-5.4.3-.3-9.8,5.8h0a26.3,26.3,0,0,1,1.3,8.4A27.3,27.3,0,0,1,79,72.8ZM52.6,52h0a10.5,10.5,0,0,0-8.3,5.9,10.7,10.7,0,1,0,14.9-4.6l-.7-.4h.1a10.7,10.7,0,0,1,4.9,14.1,10.5,10.5,0,0,1-6.1,5.4,10.4,10.4,0,0,1-8.1-.5,10.5,10.5,0,0,1-5.4-6.1,10.4,10.4,0,0,1,.5-8.1A10.1,10.1,0,0,1,52.6,52Zm3,.9A2.9,2.9,0,0,1,53.2,55h-.1a7.3,7.3,0,0,0-5.9,4.1,7.8,7.8,0,0,0-.4,5.8,6.9,6.9,0,0,0,3.9,4.3,7.8,7.8,0,0,0,10.2-3.5,7.5,7.5,0,0,0-3.5-10.1A2.5,2.5,0,0,1,55.6,52.9Zm2.8-1h.1V25.6a.6.6,0,0,0-.1-.4Zm-36-11.2-.3.3-3.8,6.5c0,.1-.1.2-.1.3Zm63.1,0,3.7,6.4-3.4-6.2Zm-20.1-3h0a28.1,28.1,0,0,1,10.2,8.2h0l9.5-5.4h-.5l-9,5.2-.8-1a25.5,25.5,0,0,0-9.4-7.1ZM22.8,40.5l9.5,5.4h0A26.9,26.9,0,0,1,49.4,35.6h.1V25.2c-.1.1-.1.2-.1.4v9.9l-1.2.2A27.3,27.3,0,0,0,33,44.8l-.8,1-9-5.2Zm27-15.6h0Z" style="fill:#f2f2f2"/></g></g><path class="color-badge" d="M58.4,54.9a2.9,2.9,0,0,1-3-3V28.3l-3.2.2v2a3,3,0,1,1-6-.4l.3-4.7a3,3,0,0,1,2.8-2.8l9-.4a3.3,3.3,0,0,1,2.2.8,3.2,3.2,0,0,1,1,2.2V51.9A3,3,0,0,1,58.4,54.9Z" style="fill:#fd0"/></g></g></svg>
                        </i><span>{{ trans('messages.campaign_api') }}</span>
                        </a>
                    </li>
                @endif
            </ul>
            <div class="navbar-right">
                <ul class="navbar-nav me-auto mb-md-0">
                    @include('layouts.core._top_activity_log')
                    @include('layouts.core._menu_frontend_user')
                </ul>
            </div>
        </div>
    </div>
</nav>

<script>
    var MenuFrontend = {
        saveLeftbarState: function(state) {
            var url = '';

            $.ajax({
                method: "GET",
                url: url,
                data: {
                    _token: CSRF_TOKEN,
                    state: state,
                }
            });
        }
    };

    $(function() {
        //
        $('.leftbar .leftbar-hide-menu').on('click', function(e) {
            if (!$('.leftbar').hasClass('leftbar-closed')) {
                $('.leftbar').addClass('leftbar-closed');

                $('.leftbar').removeClass('state-open');
                $('.leftbar').addClass('state-closed');

                // close menu
                $('#mainAppNav .lvl-1.show').dropdown('hide');

                MenuFrontend.saveLeftbarState('closed');
            } else {
                $('.leftbar').removeClass('leftbar-closed');

                $('.leftbar').removeClass('state-closed');
                $('.leftbar').addClass('state-open');

                // open menu
                if ($('#mainAppNav .nav-item.active .lvl-1').closest('.dropdown').length) {
                    $('#mainAppNav .nav-item.active .lvl-1').dropdown('show');
                }

                MenuFrontend.saveLeftbarState('open');
            }
        });
    });
</script>
