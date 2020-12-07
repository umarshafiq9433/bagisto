<div class="sidebar-left">
    <div class="sidebar">
        <div class="sidebar-content email-app-sidebar d-flex">
            <div class="email-app-menu">
                <div class="sidebar-menu-list ps">
                    <div class="list-group list-group-messages font-medium-1">
                        <ul>
                            @if (request()->route()->getName() != 'admin.configuration.index')
                                <?php $keys = explode('.', $menu->currentKey);  ?>

                                @if(isset($keys) && strlen($keys[0]))
                                    @foreach (\Illuminate\Support\Arr::get($menu->items, current($keys) . '.children') as $item)
                                        <li class="{{ $menu->getActive($item) }}">
                                            @if ($menu->getActive($item))
                                            <a class="list-group-item list-group-item-action border-0 pt-0 active" href="{{ $item['url'] }}">
                                                {{ trans($item['name']) }}
                                            </a>
                                                @else
                                                <a class="list-group-item list-group-item-action border-0 pt-0" href="{{ $item['url'] }}">
                                                    {{ trans($item['name']) }}
                                                </a>

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
                    </div>
                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
            </div>
        </div>
    </div>
</div>

{{--<ul class="menu-content">--}}
{{--    <li><a href="app-ecommerce-shop.html"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Shop">Shop</span></a>--}}
{{--    </li>--}}
{{--    <li><a href="app-ecommerce-details.html"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Details">Details</span></a>--}}
{{--    </li>--}}
{{--    <li><a href="app-ecommerce-wishlist.html"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Wish List">Wish List</span></a>--}}
{{--    </li>--}}
{{--    <li><a href="app-ecommerce-checkout.html"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Checkout">Checkout</span></a>--}}
{{--    </li>--}}

{{--    @if (request()->route()->getName() != 'admin.configuration.index')--}}
{{--                                    <?php $keys = explode('.', $menu->currentKey);  ?>--}}

{{--                                    @if(isset($keys) && strlen($keys[0]))--}}
{{--                                        @foreach (\Illuminate\Support\Arr::get($menu->items, current($keys) . '.children') as $item)--}}
{{--                                            <li class="{{ $menu->getActive($item) }}">--}}
{{--                                                @if ($menu->getActive($item))--}}
{{--                                                <a class="list-group-item list-group-item-action border-0 pt-0 active" href="{{ $item['url'] }}">--}}
{{--                                                    <i class="feather icon-circle"></i><span class="menu-item" data-i18n="Details">{{ trans($item['name']) }}</span>--}}
{{--                                                </a>--}}

{{--                                                    @else--}}
{{--                                                    <a class="list-group-item list-group-item-action border-0 pt-0" href="{{ $item['url'] }}">--}}
{{--                                                        <i class="feather icon-circle"></i><span class="menu-item" data-i18n="Details">{{ trans($item['name']) }}</span>--}}
{{--                                                    </a>--}}

{{--                                                @endif--}}
{{--                                            </li>--}}
{{--                                        @endforeach--}}
{{--                                    @endif--}}
{{--                                @else--}}
{{--                                    @foreach ($config->items as $key => $item)--}}
{{--                                        <li class="{{ $item['key'] == request()->route('slug') ? 'active' : '' }}">--}}
{{--                                            <a class="list-group-item list-group-item-action border-0 pt-0 " href="{{ route('admin.configuration.index', $item['key']) }}">--}}
{{--                                                <i class="feather icon-circle"></i><span class="menu-item" data-i18n="Details">{{ isset($item['name']) ? trans($item['name']) : '' }}</span>--}}

{{--                                                @if ($item['key'] == request()->route('slug'))--}}
{{--                                                    <i class="angle-right-icon"></i>--}}
{{--                                                @endif--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                    @endforeach--}}
{{--                                @endif--}}


{{--</ul>--}}