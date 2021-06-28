@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <form action="{{route("category.store")}}" method="post">
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
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter Name">
                 
                </div>
               @csrf
                <div class="form-group">
                  <label for="">Description</label>
                  <input type="text" class="form-control" name="description" placeholder="Enter Description">
                  
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>
</div>
@endsection

