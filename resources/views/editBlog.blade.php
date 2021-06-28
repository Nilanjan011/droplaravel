@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <form action="{{route("blog.update",$blog->id)}}" method="post" enctype="multipart/form-data">
                @if ($message = Session::get('message'))
                    <div class="alert alert-danger alert-block">
                        <button class="close" data-dismiss="alert">X</button>
                        <strong>{{$message}}</strong>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $err)
                                <li> {{$err}} </li>
                            @endforeach
                        </ul>
                    </div>
                @else
                   {{-- <h3>No data found</h3>  --}}
                @endif
                @method('put')
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control" name="name" value="{{$blog->name}}" id="exampleInputEmail1" placeholder="Enter Name">
                 
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">category</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="category">
                        <option value="{{$blog->cat_id}}">{{oneField($blog->cat_id,'name','categories')}}</option>
                        @foreach ($category as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                  </div>
               @csrf
                <div class="form-group">
                  <label for="">Description</label>
                  <input type="text" class="form-control" value="{{$blog->description}}" name="description" placeholder="Enter Description"> 
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <input type="file" class="form-control" name="image">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>
</div>
@endsection

