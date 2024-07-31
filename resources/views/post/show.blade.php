@extends('Layouts.master')
@section('navbar')

<div class="row">
    <div class="col-md-6 mx-auto">
        <img src="{{asset('upload/'.$posts->image)}}" width="100%" alt="">
        <h3>{{$posts->title}}</h3>
        <p>{{$posts->description}}...</p>
    </div>
</div>

@endsection