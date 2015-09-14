@extends('app')

@section('content')
    <form class="form-horizontal" action="{{ route('category.store') }}" method="post">
        <fieldset>
            <legend>Add a category</legend>
            <div class="form-group">
                <label for="inputTitle" class="col-lg-2 control-label">Title</label>

                <div class="col-lg-10">
                    <input type="text" name="title" class="form-control" id="inputTitle" placeholder="Title">
                </div>
            </div>
            <div class="form-group">
                <label for="selectParent" class="col-lg-2 control-label">Parent</label>

                <div class="col-lg-10">
                    <select class="form-control" name="parentId" id="selectParent">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
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