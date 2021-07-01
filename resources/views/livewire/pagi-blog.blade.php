<div>
    <a href="{{route('blog.create')}}" class="btn btn-primary m-2">Add</a>
    <a href="{{url('category')}}" class="btn btn-primary m-2">Category List</a>

    <table class="table table-hover table-dark">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">category</th>
            <th scope="col">Description</th>
            <th scope="col">Image</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
            @php
                $i=1;
            @endphp
            @forelse ($blog as $item)
            <tr>
                <th scope="row">{{$i}}</th>
                @php
                    $i++;
                @endphp
                <td>{{$item->name}}</td>
                <td>{{oneField($item->cat_id,'name','categories')}}</td> {{-- using custom helper function--}}
                {{-- <td>{{ $item->c_name }}</td>using join --}}
                <td>{{$item->description}}</td>
                <td><img src="{{asset('storage/ava/'.$item->image)}}" alt="image" width="50" height="40" srcset=""></td>

                <td class="text-center">
                    <a href="{{ route('blog.edit',$item->id) }}" class="btn btn-outline-success py-0">Edit</a>
                </td>
                <td>
                    <a href="" onclick="if(confirm('Do you want to delete this blog?')) event.preventDefault(); document.getElementById('delete-{{$item->id}}').submit();" 
                        class="btn btn-outline-danger py-0">Delete</a>
                    <form id="delete-{{$item->id}}" method="post" action="{{route('blog.destroy',$item->id)}}">
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
    {{ $blog->links() }}
</div>
