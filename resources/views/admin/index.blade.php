@extends('Layouts.master')
@section('navbar')
    <h1>Admin</h1>
    @if (session('success'))
        <div class="alert alert-success col-md-6 mx-auto" role="alert">
            {{session('success')}}
        </div>
        
    @endif
    <div class="row">
        <div class="col-md-6 mx-auto">
            <a href="{{route('admin.create')}}" class="btn btn-primary px-4">create post</a>
            <table class="table table-bordered mt-2">
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Title</td>
                        <td>Description</td>
                        <td>action</td>
                    </tr>
                </thead>
                <tbody>
                    
                        @foreach ($posts as $post )
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->description}}</td>
                            <td>
                                <a href="{{route('delete',['id'=>$post->id])}}"><li class="fa fa-trash"></li></a> 
                                | <a href="{{route('admin.edit',['admin'=>$post->id])}}"> <li class="fa fa-edit"></li></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
    </div>

@endsection