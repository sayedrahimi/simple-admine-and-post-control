@extends('Layouts.master')
@section('navbar')
<div class="row">
    <div class="col-md-6 mx-auto">
        <h1>Update post</h1>
        <form class="needs-validation" action="{{route('admin.update',['admin'=>$posts->id])}}" method="post" enctype="multipart/form-data" novalidate>
            @method('PUT')
            @csrf
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="validationCustom01">title</label>
                <input type="text" class="form-control" value="{{$posts->title}}" name="title" required>
                @error('title')
                    <p class="text text-danger">{{$message}}</p>
                @enderror 
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="validationCustom01">Image</label>
                <input type="file" name="image" required>
                @error('image')
                    <p class="text text-danger">{{$message}}</p>
                @enderror 
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="validationCustom01">description</label>
                <textarea name="description" class="form-control"  cols="30" rows="10">{{$posts->description}}</textarea> 
              </div>
            </div>
            <button type="submit" class="btn btn-success px-3">save</button>
          </form>
          
          
    </div>
</div>

@endsection
