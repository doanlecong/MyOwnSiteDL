<div class="container-fluid">
    <p>
        <a title="Xem Trang Rieng" href="{{ route('mypost.viewpost',['type' => $type,'id' => $myblog->id]) }}"
           class="btn btn-info box-shadown-darkblue"><i class="fa fa-external-link"
                                                        aria-hidden="true"></i></a>
        <a title="Edit" href="{{ route('mypost.editpost',['type' => $type,'id' => $myblog->id]) }}"
           class="btn btn-warning box-shadown-darkblue"><i class="fa fa-pencil" aria-hidden="true"></i></a>
        <button title="Danh Sach"
                class="btn btn-primary border-around-blue box-shadown-darkblue view-post-list" data-type="{{ $type }}"
                data-id="{{$myblog->my_topics_id}}"><i class="fa fa-list-alt" aria-hidden="true"></i></button>
    </p>
    <h3>{{ $myblog->id }}</h3>
    @if( $myblog->status == "Y" )
        <h3 class="text-danger text-center border-around-blue padding-top-10 padding-bottom-10">{{ "Đã xuất bản " ." | ".date('Y-m-d h:iA', strtotime($myblog->time_publish)) }}</h3>
    @else
        <h3 class="text-danger text-center border-around-blue padding-top-10 padding-bottom-10">{{ "Đang viết" }}</h3>
    @endif

    <h1>{{ $myblog->title }}</h1>
    <p>
        @foreach($myblog->tags as $tag)
            <span class="badge badge-pill badge-primary" title=" {{ $tag->name }} " style="cursor: pointer;">#{{$tag->abbrev}}</span>
        @endforeach
    </p>
    <p>
        Published at : {{ date('Y/m/d h:i a', strtotime($myblog->created_at)) }}
    </p>
    <p style="font-weight: 900; font-size: 20px;">
        {!! strip_tags($myblog->description) !!}
    </p>
    <p>
        <?php echo $myblog->content; ?>
    </p>
</div>