@extends('app')

@section('content')
    <div class="col-lg-6">

        <form class="form-horizontal" action="{{ route('category.update', [ 'id' => $category->id ]) }}"
              method="post">
            <input type="hidden" name="_method" value="PUT">
            <fieldset>
                <legend>Edit a category</legend>
                <div class="form-group">
                    <label for="inputTitle" class="col-lg-2 control-label">Title</label>

                    <div class="col-lg-10">
                        <input type="text" name="title" class="form-control" id="inputTitle"
                               placeholder="{{ $category->title }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="selectParent" class="col-lg-2 control-label">Parent</label>

                    <div class="col-lg-10">
                        <select class="form-control" name="parentId" id="selectParent">
                            @if($category->parent_id == null)
                                <option value="null" selected>null</option>
                            @endif
                            @foreach($categories as $parent)
                                @if($parent->id == $category->parent_id)
                                    <option value="{{ $parent->id }}" selected>{{ $parent->title }}</option>
                                @else
                                    <option value="{{ $parent->id }}">{{ $parent->title }}</option>
                                @endif
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
        <form class="form-horizontal" action="{{ route('category.destroy', [ 'id' => $category->id ]) }}"
              method="post">
            <fieldset>
                <legend>Delete a category</legend>
                <input type="hidden" name="_method" value="DELETE">

                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button class="btn btn-default">Cancel</button>
                        <button type="submit" class="btn btn-danger btn-raised">Delete
                            <div class="ripple-wrapper"></div>
                        </button>
                    </div>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            </fieldset>
        </form>
    </div>
@endsection
