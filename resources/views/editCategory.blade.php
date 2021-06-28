@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <form action="{{route('category.update',$category->id)}}" method="post" enctype="multipart/form-data">
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
                    
                @endif
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input value="{{$category->name}}" type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter Name">
                 
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">description</label>
                <input value="{{$category->description}}" type="text" class="form-control" name="description" id="exampleInputEmail1" placeholder="Enter Name">
                
                </div>
               @csrf
               @method('put')
    
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>
</div>
@endsection
