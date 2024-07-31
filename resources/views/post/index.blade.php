@extends('Layouts.master')
@section('navbar')
    <h1>Post</h1>

    <div class="row">
        <div class="col-md-6 mx-auto">
            @foreach ($posts as $post )
            <div class="card  mb-3" >
              <img src="{{asset('upload/'.$post->image)}}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">{{$post->title}}</h5>
                <p class="card-text">@php
                  echo substr($post->description, 0 ,100)
                @endphp...</p>
                <a href="{{route('post.show',['slug'=>$post->slug])}}" class="btn btn-primary">show</a>
              </div>
            </div>
            @endforeach
        </div>
      </div>
      {{$posts->links()}}
@endsection