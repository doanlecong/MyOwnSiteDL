@if(count($mytopics) > 0)
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Number of Posts</th>
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
                <td>
                    <span title="{{ $topic->description }}">{{ mb_substr(strip_tags($topic->description), 0, 50) }} {{ strlen($topic->description) > 50 ? "..." : "" }}</span>
                </td>
                <td>
                    <?php $countPost = $topic->posts()->count();?>
                    {{ $countPost }}
                    @if($countPost > 0)
                        <button title="Danh Sach"
                                class="btn btn-primary border-around-blue  out-line-blue view-post-list" data-type="{{ $type }}"
                                data-id="{{$topic->id}}"><i class="fa fa-list-alt" aria-hidden="true"></i></button>
                    @endif
                </td>
                <td>{{ $topic->image_name }}</td>
                <td>
                    @if($topic->image_name != null && $topic->image_name != 'NULL')
                        <div>
                            <img class="box-shadown-darkblue show-list-topic" src="{{$topic->image_name}}" data-toggle="modal"
                                 data-target="#modalShowImage{{$topic->id}}"  style="width: 50px; height: 40px;">
                            <div class="modal" id="modalShowImage{{$topic->id}}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
                                    <div class="modal-content no-border-radius">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Hình Chủ Đề</h5>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ $topic->image_name }}" style="width: 100%;height: auto;">
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
                    <a title="Write for this topic"
                       href="{{ route('mypost.writepost',['type' => $type, 'idTopic' => $topic->id]) }}"
                       class="btn btn-primary box-shadown-darkblue"><i class="fa fa-pencil-square-o"
                                                                       aria-hidden="true"></i></a>
                    <a title="Edit Topic" href="{{ route('topic.edit',$topic->id) }}"
                       class="btn btn-warning box-shadown-superdarkblue"><i class="fa fa-pencil-square"
                                                                            aria-hidden="true"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $mytopics->links() }}
@else
    <h3 class="orange-text text-center">No Data</h3>
@endif