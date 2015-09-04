@extends('app')

@section('content')
<!-- Page Content -->
<div class="container">
    <div class="row">

        <div class="col-md-3">
            <div class="categories">
                @include('pages.partials.nav.categories', $categories)
            </div>
            <div class="categories3">
                <div class="parent3">
                    <a href="http://test.app:8000/category/asperiores-impedit"> Asperiores impedit. <span class="caret-right"></span></a> 
                    <div class="subcategory3">
                        <a href="http://test.app:8000/category/illum-est"> Illum est. 1</a>
                    </div>
                </div>
                <div class="parent3">
                    <a href="http://test.app:8000/category/asperiores-impedit"> Asperiores impedit. <span class="caret-right"></span></a> 
                    <div class="subcategory3">
                        <a href="http://test.app:8000/category/illum-est"> Illum est. 2</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-9">

            @include('pages.partials.slider')


        </div>

        @include('pages.partials.categories.categories', $categories)
    </div>
</div>
<!-- /.container -->
@endsection
