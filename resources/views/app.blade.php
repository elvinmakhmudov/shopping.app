@include('partials.header')

<div class="container">
    @include('partials.nav')
    <div class="site">
        @yield('content')
    </div>
</div>


@include('partials.footer')
