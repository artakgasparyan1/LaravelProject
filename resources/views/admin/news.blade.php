@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>News</h2>
        <a class="btn btn-success pull-right" href="{{ route('news.create') }}">Add News</a>
        <table class="table">
            <thead>
            <tr>
                <th>Title</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($news as $new)
                <tr>
                    <td>{{$new->title}}</td>
                    <td>
                        <a href="{{ route('news.show',$new->id) }}">Edit</a>
                        <a href="{{ route('news.destroy',$new->id) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection