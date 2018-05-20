@if(count($myblogs) > 0)
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Description</th>
            <th scope="col">Chủ đề</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($myblogs as $blog)
            <tr>
                <th scope="row">{{ $blog->id }}</th>
                <td>{{ $blog->title }}</td>
                <td>{{ $blog->slug }}</td>
                <td title="{{strip_tags($blog->description)}}">{{ mb_substr(strip_tags($blog->description),0, 100) }}</td>
                <td>
                    @if($blog->topic != null)
                        <button class="btn btn-info out-line-blue">{{ $blog->topic->title }}</button>
                    @else
                        <button class="btn btn-info box-shadown-darkblue">No Topic Selected.</button>
                    @endif
                </td>
                <td>
                    <a href="{{ route('mypost.viewpost',['type' => $type,'id' => $blog->id]) }}"
                       class="btn btn-primary box-shadown-darkblue">View</a>
                    <a href="{{ route('mypost.editpost',['type' => $type,'id' => $blog->id]) }}"
                       class="btn btn-warning box-shadown-darkblue">Edit</a>
                    <a href="{{ route('mypost.delete',['type' => $type,'id' => $blog->id]) }}"
                       class="btn btn-danger box-shadown-darkblue">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $myblogs->links() }}
@else
    <h3 class="orange-text text-center">No Data</h3>
@endif