@include('partials.header')

@include('partials.nav')

<div class="row col-md-offset-1 col-sm-offset-1 col-xs-offset-1">

    @include('admin.partials.sidebar')

    <div class="row col-md-7 col-xs-7 col-lg-7">
        @yield('content')
    </div>
</div>

@include('partials.footer')