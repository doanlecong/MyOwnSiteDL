@if(count($posts) > 0)
    <h3 class="text-primary text-center border-around-blue padding-top-10 padding-bottom-10">Topic : {{$topic->title}}</h3>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Description</th>
            <th scope="col">Hình đại diện</th>
            <th scope="col">Trạng thái</th>
            {{--<th scope="col">Chủ đề</th>--}}
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                <td>{{ $post->slug }}</td>
                <td title="{{strip_tags($post->description)}}">{{ mb_substr(strip_tags($post->description),0, 30) }}</td>
                <td>
                    @if($post->hinhdaidien != null && $post->hinhdaidien != 'NULL')
                        <div>
                            <img src="{{$post->hinhdaidien}}" data-toggle="modal"
                                 data-target="#modalShowImagePost{{$post->id}}" style="width: 50px; height: 40px;">
                            <div class="modal" id="modalShowImagePost{{$post->id}}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
                                    <div class="modal-content no-border-radius">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Hình Chủ Đề</h5>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ $post->hinhdaidien }}" style="width: 100%;height: auto;">
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
                    @if($post->status == 'N')
                        <button class="btn btn-info box-shadown-darkblue">Writing</button>
                    @else
                        <button class="btn btn-primary box-shadown-darkblue">Publish
                            at </button> <span>{{ date('Y/m/d h:ia', strtotime($post->time_publish)) }}</span>
                    @endif
                </td>
                {{--<td>--}}
                    {{--@if($post->topic != null)--}}
                        {{--<button class="btn btn-info box-shadown-darkblue">{{ $post->topic->title }}</button>--}}
                    {{--@else--}}
                        {{--<button class="btn btn-info box-shadown-darkblue">No Topic Selected.</button>--}}
                    {{--@endif--}}
                {{--</td>--}}
                <td>
                    <button title="View Now" class="btn btn-primary box-shadown-darkblue view-now" data-type="{{ $type }}"
                            data-id="{{ $post->id }}"><i class="fa fa-bolt" aria-hidden="true"></i>
                    </button>
                    <a title="Edit Post" href="{{ route('mypost.editpost',['type' => $type,'id' => $post->id]) }}"
                       class="btn btn-warning box-shadown-darkblue"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    <a title="Delete Post" href="{{ route('mypost.delete',['type' => $type,'id' => $post->id]) }}"
                       class="btn btn-danger box-shadown-darkblue"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <h3 class="orange-text text-center">No Data</h3>
@endif