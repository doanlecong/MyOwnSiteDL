@if(count($mytopics) > 0)
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Image Name</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($mytopics as $topic)
            <tr>
                <th scope="row">{{$topic->id}}</th>
                <td>{{ $topic->title }}</td>
                <td><span title="{{ $topic->description }}">{{ substr(strip_tags($topic->description), 0, 50) }} {{ strlen($topic->description) > 50 ? "..." : "" }}</span></td>
                <td>{{ $topic->image_name }}</td>
                <td>
                    @if($topic->image_name != null && $topic->image_name != 'NULL')
                        <div>
                            <img src="{{$topic->image_name}}" data-toggle="modal" data-target="#modalShowImage{{$topic->id}}" style="width: 50px; height: 40px;">
                            <div class="modal" id="modalShowImage{{$topic->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
                                    <div class="modal-content no-border-radius">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Hình Chủ Đề</h5>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ $topic->image_name }}"style="width: 100%;height: auto;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <img src="{{asset('upload/images/notfound1.png')}}" class="rounded" style="width: 50px; height: 50px;">
                    @endif
                </td>
                <td>
                    <a href="{{ route('mypost.writeblog', $topic->id) }}" class="btn btn-primary box-shadown-darkblue">Write</a>
                    <a href="{{ route('topic.edit',$topic->id) }}" class="btn btn-warning box-shadown-superdarkblue">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $mytopics->links() }}
@else
    <h3 class="orange-text text-center">No Data</h3>
@endif