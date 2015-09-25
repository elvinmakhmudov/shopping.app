@extends('app')

@section('content')

    <div class="col-lg-5 col-md-5">
        <div class="thumbnail center-block">
            @if(file_exists(public_path().'/content/profile_pictures/'.$user->id.'/'.$user->thumbnail))
                <img src="{{ asset('/content/profile_pictures/'.$user->id.'/'.$user->thumbnail) }}"
                     alt="">
            @else
                <img src="{{ asset('/content/default/profile_picture.png') }}"
                     alt="">
            @endif
        </div>
    </div>

    <div class="col-md-7 col-lg-7">
        <h2>{{ $user->name . ' ' . $user->last_name }}</h2>
    </div>

@endsection
