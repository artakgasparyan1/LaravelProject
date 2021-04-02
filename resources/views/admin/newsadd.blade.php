@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Add News</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('news.store') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-2 control-label">Title</label>
                                <div class="col-md-10">
                                    <input id="title" type="text" class="form-control" name="title" value="{{ old('name') }}" required >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-2 control-label">text</label>
                                <div class="col-md-10">
                                    <textarea name="text" class="form-control" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-2 control-label">Image</label>
                                <div class="col-md-10">
                                    <input id="profilePicture" type="file" class="form-control" name="image">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection