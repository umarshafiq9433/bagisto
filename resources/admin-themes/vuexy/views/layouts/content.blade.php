@extends('admin::layouts.master')

@section('content-wrapper')


    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <!-- Contextual colors -->
                <section id="contextual-colors" class="card overflow-hidden">
                    <div class="card-content">
                        <div class="card-body">
                            @include ('admin::layouts.tabs')

                            @yield('content')
                            </div>
                        </div>
                    </div>
                </section>

                <!--/ Contextual colors -->
            </div>
        </div>
    <!-- END: Content-->

{{--    <div class="content-overlay"></div>--}}
{{--    <div class="content-area-wrapper">--}}

{{--        @include ('admin::layouts.nav-aside')--}}

{{--        <div class="content-right">--}}

{{--            @include ('admin::layouts.tabs')--}}

{{--            @yield('content')--}}

{{--        </div>--}}

{{--    </div>--}}
@stop