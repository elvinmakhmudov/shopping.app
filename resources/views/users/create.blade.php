@extends('app')

@section('content')
    @include('partials.error')
    <form class="form-horizontal" action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Add a user</legend>
            <div class="form-group">
                <label for="inputName" class="col-lg-2 control-label">Name</label>

                <div class="col-lg-10">
                    <input type="text" name="name" class="form-control" id="inputName" placeholder="Name">
                </div>
            </div>
            <div class="form-group">
                <label for="inputLastName" class="col-lg-2 control-label">Last name</label>

                <div class="col-lg-10">
                    <input type="text" name="last_name" class="form-control" id="inputLastName" placeholder="Last Name">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Email</label>

                <div class="col-lg-10">
                    <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="col-lg-2 control-label">Password</label>

                <div class="col-lg-10">
                    <input type="password" name="password" class="form-control" id="inputPassword" placeholder="*****">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPasswordConfirm" class="col-lg-2 control-label">Password Confirmation</label>

                <div class="col-lg-10">
                    <input type="password" name="password_confirmation" class="form-control" id="inputPasswordConfirm" placeholder="*****">
                </div>
            </div>
            <div class="form-group">
                <label for="imageThumbnail" class="col-lg-2 control-label">Thumbnail</label>

                <div class="col-lg-10">
                    <input type="file" class="form-control" name="thumbnail" id="imageThumbnail"/>
                </div>
            </div>
            <div class="form-group">
                <label for="inputIsAdmin" class="col-lg-2 control-label">Is admin?</label>

                <div class="checkbox col-lg-10">
                    <label>
                        <input type="checkbox" name="is_admin" id="inputIsAdmin" value="true"> True
                    </label>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <button class="btn btn-default">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit
                        <div class="ripple-wrapper"></div>
                    </button>
                </div>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        </fieldset>
    </form>
@endsection