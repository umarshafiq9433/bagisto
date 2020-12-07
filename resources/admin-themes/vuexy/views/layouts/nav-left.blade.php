<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand">
                    <div class=""><img src="{{ asset('vendor/webkul/ui/assets/images/logo.png') }}"
                                       alt="{{ config('app.name') }}"/></div>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                        class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i
                        class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary"
                        data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            @foreach ($menu->items as $menuItem)
            <li class="nav-item {{ $menu->getActive($menuItem) }}"><a href="{{ count($menuItem['children']) ? current($menuItem['children'])['url'] : $menuItem['url'] }}"><i
                        class="icon {{ $menuItem['icon-class'] }}"></i><span class="menu-title" data-i18n="Email">{{ trans($menuItem['name']) }}</span></a>
                        @if($menu->getActive($menuItem)=="active")
                        <ul class="menu-content">
                            @if (request()->route()->getName() != 'admin.configuration.index')
                                <?php $keys = explode('.', $menu->currentKey);  ?>

                                @if(isset($keys) && strlen($keys[0]))
                                    @foreach (\Illuminate\Support\Arr::get($menu->items, current($keys) . '.children') as $item)
                            <li class="{{ $menu->getActive($item) }}">
                                @if ($menu->getActive($item))
                                <a href="{{ $item['url'] }}"><i class="feather  icon-circle"></i><span
                                        class="menu-item" data-i18n="Shop">{{ trans($item['name']) }}</span></a>
                                        @else
                                        <a href="{{ $item['url'] }}"><i class="feather icon-circle"></i><span
                                            class="menu-item" data-i18n="Shop">{{ trans($item['name']) }}</span></a>
                                        @endif
                            </li>
                            @endforeach
                                @endif
                                @else
                                @foreach ($config->items as $key => $item)
                                    <li class="{{ $item['key'] == request()->route('slug') ? 'active' : '' }}">
                                        <a class="list-group-item list-group-item-action border-0 pt-0 " href="{{ route('admin.configuration.index', $item['key']) }}">
                                            {{ isset($item['name']) ? trans($item['name']) : '' }}
                                            @if ($item['key'] == request()->route('slug'))
                                                <i class="angle-right-icon"></i>
                                            @endif
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                        @endif
                    </li>
            @endforeach
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
