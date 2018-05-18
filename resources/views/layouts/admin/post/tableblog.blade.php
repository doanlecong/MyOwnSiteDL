@if(count($myblogs) > 0)
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Description</th>
            <th scope="col">Hình đại diện</th>
            <th scope="col">Chủ đề</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($myblogs as $blog)
            <tr>
                <th scope="row">{{ $blog->id }}</th>
                <td title="{{ $blog->title }}">{{ mb_substr($blog->title,0,30) }}</td>
                <td title="{{ $blog->slug }}">{{ substr($blog->slug,0, 30) }}</td>
                <td title="{{strip_tags($blog->description)}}">{{ mb_substr(strip_tags($blog->description),0, 100) }}</td>
                <td>
                    @if($blog->hinhdaidien != null && $blog->hinhdaidien != 'NULL')
                        <div>
                            <img class="box-shadown-darkblue" src="{{$blog->hinhdaidien}}" data-toggle="modal"
                                 data-target="#modalShowImage{{$blog->id}}" style="width: 50px; height: 40px;">
                            <div class="modal" id="modalShowImage{{$blog->id}}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
                                    <div class="modal-content no-border-radius">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Hình Chủ Đề</h5>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ $blog->hinhdaidien }}" style="width: 100%;height: auto;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <img src="{{asset('upload/images/notfound1.png')}}" class="rounded"
                             style="width: 50px; height: 50px;">
                    @endif
                </td>
                <td>
                    @if($blog->topic != null)
                        <button class="btn btn-info box-shadown-darkblue">{{ $blog->topic->title }}</button>
                    @else
                        <button class="btn btn-info box-shadown-darkblue">No Topic Selected.</button>
                    @endif
                </td>
                <td>
                    <button title="View Now" class="btn btn-primary box-shadown-darkblue view-now"
                            data-type="{{ $type }}" data-id="{{ $blog->id }}">
                        <i class="fa fa-bolt" aria-hidden="true"></i>
                    </button>
                    <a title="Xem Trang Rieng" href="{{ route('mypost.viewpost',['type' => $type,'id' => $blog->id]) }}"
                       class="btn btn-info box-shadown-darkblue"><i class="fa fa-external-link"
                                                                       aria-hidden="true"></i></a>
                    <a title="Edit" href="{{ route('mypost.editpost',['type' => $type,'id' => $blog->id]) }}"
                       class="btn btn-warning box-shadown-darkblue"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    <a title="Delete" href="{{ route('mypost.delete',['type' => $type,'id' => $blog->id]) }}"
                       class="btn btn-danger box-shadown-darkblue"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $myblogs->links() }}
@else
    <h3 class="orange-text text-center">No Data</h3>
@endif