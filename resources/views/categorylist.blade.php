@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{route('category.create')}}" class="btn btn-primary m-2">Add</a>
            <a href="{{url('blog')}}" class="btn btn-primary m-2">Blog List</a>
            @if ($message = Session::get('message'))
                
                <div class="alert alert-{{ Session::get('class')}} alert-block">
                    <button class="close" data-dismiss="alert">X</button>
                    <strong>{{$message}}</strong>
                </div>
             
                
            @endif

            <table class="table table-hover table-dark">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($category as $item)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$item->name}}</td>
                        <td>{{$item->description}}</td>
                        <td class="text-center">
                            <a href="{{ route('category.edit',$item->id) }}" class="btn btn-outline-success py-0">Edit</a>
                        </td>
                        <td>
                            {{-- <a href="javascript:void(0)" onclick="fun({{$item->id}})" class="btn btn-outline-danger py-0">Delete</a> --}}
                            <a href="" onclick="if(confirm('Do you want to delete this category?')){ event.preventDefault(); document.getElementById('delete-{{$item->id}}').submit();
                            }else{ return false;}" class="btn btn-outline-danger py-0">Delete</a>
                            <form id="delete-{{$item->id}}" method="post" action="{{route('category.destroy',$item->id)}}">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                        
                      </tr>
                    @empty
                        No data found
                    @endforelse
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    async function fun(id) {
        var a = await swal("Are you sure?", {
        dangerMode: true,
        buttons: true,
        });
        if (a) {
            document.getElementById('delete-'+id).submit();   
        }
        // swal ( "Oops" ,  "Something went wrong! Try again" ,  "error" );
        
    }
</script>