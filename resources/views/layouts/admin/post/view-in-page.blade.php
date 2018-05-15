<div class="container-fluid">
    <h3>{{ $myblog->id }}</h3>
    @if( $myblog->status == "Y" )
        <h3 class="text-danger text-center border-around-blue padding-top-10 padding-bottom-10">{{ "Đã xuất bản " ." | ".date('Y-m-d h:iA', strtotime($myblog->time_publish)) }}</h3>
    @else
        <h3 class="text-danger text-center border-around-blue padding-top-10 padding-bottom-10">{{ "Đang viết" }}</h3>
    @endif

    <h3>{{ $myblog->title }}</h3>
    <p>
        {!! $myblog->description !!}
    </p>
    <p>
        <?php echo $myblog->content; ?>
    </p>
</div>