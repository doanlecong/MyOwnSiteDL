@extends('layouts.admin')
@section('script')
    <link href="/css/select2.min.css" rel="stylesheet">
@endsection
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Trang Chủ</a></li>
            <li class="breadcrumb-item">
                @if($type == 'blog')
                    <a href="{{ route('mypost.danhsachblog') }}">Dashboard {{ strtoupper($type) }}</a>
                @elseif($type == 'serie')
                    <a href="{{ route('mypost.danhsachserie') }}">Dashboard {{ strtoupper($type) }}</a>
                @elseif($type == 'chuyende')
                    <a href="{{ route('mypost.danhsachchuyende') }}">Dashboard {{ strtoupper($type) }}</a>
                @endif
            </li>
        </ol>
    </nav>
@endsection

@section('contentAdmin')
    <div class="col-lg no-padding-left-right">
        <div class="card card-no-border">
            <div class="card-header card_header_gradient no-border-radius">Viết bài cho {{ strtoupper($type) }}
                @if(isset($myTopic))
                    / <span title='{{ $myTopic->title }}'>{{substr($myTopic->title,0,50)}}</span>
                @endif
            </div>
            <div class="card-body no-padding-left-right no-padding-top background-blue ">
                <div class="row mt-3 background-white padding-top-10 no-margin-top">
                    <div class="col ">
                        <form action="{{ route('mypost.savepostnew',$type) }}" onsubmit="return validateForm();" novalidate enctype="multipart/form-data" method="POST">
                            {{ csrf_field() }}
                            @method('POST')
                            <div class="row padding-bottom-10 no-padding-top">
                                <div class="col">
                                    <button class="btn btn-primary btn-lg box-shadown-superdarkblue" type="submit"><i
                                                class="fa fa-archive"></i> SAVE
                                    </button>
                                </div>
                            </div>
                            <hr>
                            <fieldset class=" border-around-blue">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="title">Title</label>
                                            <input class="form-control " name="title" id="title" data-ok="N" required max="255">
                                            <label for="title" class="orange-text" hidden id="alertTitle">Bạn Nên Chọn
                                                Một Tiêu Đề Khác</label>
                                            <label for="slug" class="blue-text" hidden id="alertTitleOk">Tiêu đề sử dụng
                                                được đó!</label>
                                        </div>
                                        <div class="col-6">
                                            <label for="">Slug (Links hiển thị)</label>
                                            <input class="form-control " name="slug" id="slug" data-ok="N" required max="255">
                                            <label for="slug" class="orange-text" hidden id="alertSlug">Bạn Nên Chọn Một
                                                Đường Link Khác</label>
                                            <label for="slug" class="orange-text" hidden id="alertSlugFormat">Sai
                                                Format(vd : doi-toi-co-don , không để đuôi .html)</label>
                                            <label for="slug" class="blue-text" hidden id="alertSlugOk">Đường Link Được
                                                Chấp Nhận</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" name="description" rows="5"
                                                 id="mota" required></textarea>

                                            <div class="row no-padding-left-right padding-top-30">

                                                <div class="col-sm-3 border-around-blue">
                                                    <label>Hình Thức Lưu:</label>
                                                    <div class="radio">
                                                        <label><input type="radio"  name="savetype" checked value="N"> Lưu
                                                            Nháp</label>
                                                    </div>
                                                    <div class="radio">
                                                        <label><input type="radio"  name="savetype" value="Y"> Lưu hoàn chỉnh
                                                            &amp xuất bản</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-9">
                                                    <label for="tags">Tags :</label>
                                                    <select class="form-control"  name="tags[]" style="height: 200px;"  id="tagsSelect" multiple>
                                                        @foreach($tags as $t)
                                                            <option value="{{$t->id}}">{{$t->abbrev}}--{{$t->name}}--Type : {{ $typeTags[$t->type_tag] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="col-6">
                                            <label for="description">Chủ đề</label>
                                            <select class="form-control" required name="my_topic_id"
                                                    style="height: 50px;">
                                                <option style="background-color: #ff4879;" class="text-light" value="">Chọn một chủ đề</option>
                                                @foreach($topics as $tp)
                                                    @if(isset($myTopic) && $tp->id == $myTopic->id)
                                                        <option value="{{ $tp->id }}" selected>{{ $tp->title }}</option>
                                                    @else
                                                        <option value="{{ $tp->id }}">{{ $tp->title }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <label for="description">Hình đại diện</label>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <a id="lfm" data-input="hinhdaidien" data-preview="holder"
                                                           class=" btn-primary text-light box-shadown-superdarkblue">
                                                            <i class="fa fa-picture-o"></i> Choose
                                                        </a>
                                                    </span>
                                                    <input id="hinhdaidien" class="form-control" type="text" name="hinhdaidien">
                                                </div>
                                            <img id="holder" style="margin-top:15px;max-height:100px;">
                                            <hr>
                                            <label for="">Bài Viết Trước Đó :</label>
                                            <select name="previous_post_id" class="form-control">
                                                @if(count($previousPosts) == 0)
                                                    <option style="background-color: #ff4879;" class="text-light"
                                                            value="0">Không Có Bài Viết Nào Trước Đó
                                                    </option>
                                                @else
                                                    <option style="background-color: #ff4879;" class="text-light"
                                                            value="0">Chọn một bài viết trước đó
                                                    </option>
                                                    @foreach($previousPosts as $post)
                                                        <option value="{{ $post->id }}">{{ $post->id }}--{{ $post->title }}
                                                            -- {{ $post->topic->title }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col">
                                                <label for="contentPost">Nội Dung :</label>
                                                <textarea class="form-control" name="contentPost" id="contentPost"
                                                          rows="5"
                                                          required></textarea>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scriptTail')
    <script src="/js/select2.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('#tagsSelect').select2({placeholder : "Chon tag"});
        function validateForm() {
            var title = document.getElementById('title');
            var slug = document.getElementById('slug');
            var mota = document.getElementById('mota');
            var hinhdaidien = document.getElementById('hinhdaidien');

            if(title.value == "" || title.getAttribute('data-ok') == 'N') {
                title.focus();
                swal({
                    title: "Thông tin không đúng rồi.",
                    text:  "Tiêu đề bài viết không được trùng hoặc rỗng",
                    closeOnClickOutside: false,
                    icon: "error",
                    button: "Tắt nó !",
                });
                return false;
            }
            if(slug.value == "" || slug.getAttribute('data-ok') == 'N') {
                slug.focus();
                swal({
                    title: "Thông tin không đúng rồi.",
                    text:  "Đường link rút gọn không được trống hay trùng với cái đã có OK!",
                    closeOnClickOutside: false,
                    icon: "error",
                    button: "Tắt nó !",
                });
                return false;
            }
            if(mota.value == "" || hinhdaidien.value == "" ) {
                swal({
                    title: "Thông tin không đúng rồi.",
                    text:  "Bạn kiểm tra lại thông tin phần mô tả , hình đại diện. Không được để trống",
                    closeOnClickOutside: false,
                    icon: "error",
                    button: "Tắt nó !",
                });
                return false;
            }
            return confirm('Hey men, nhớ kiểm tra lại phần nội dụng có viết chưa nhá ? ');
        }
        $(document).ready(function () {
            $("#title").change(function (e) {
                $.ajax({
                    "async": true,
                    "crossDomain": true,
                    "url": "{{ route('mypost.checkTitle',$type) }}",
                    "method": "POST",
                    "data": {title: e.target.value}
                }).done(function (data) {
                    if (data.success) {
                        e.target.setAttribute('data-ok', 'Y');
                        e.target.classList.add('border-blue-thin');
                        e.target.classList.remove('border-orange-thin');
                        document.getElementById('alertTitle').hidden = true;
                        document.getElementById('alertTitleOk').hidden = false;
                    } else {
                        e.target.setAttribute('data-ok','N');
                        e.target.classList.remove('border-blue-thin');
                        e.target.classList.add('border-orange-thin');
                        document.getElementById('alertTitle').hidden = false;
                        document.getElementById('alertTitleOk').hidden = true;
                    }
                    var slug = document.getElementById('slug');
                    slug.value = data.slug;
                    if (data.canUseSlug) {
                        slug.setAttribute('data-ok','Y');
                        slug.classList.add('border-blue-thin');
                        slug.classList.remove('border-orange-thin')
                        document.getElementById('alertSlug').hidden = true;
                        document.getElementById('alertSlugFormat').hidden = true;
                        document.getElementById('alertSlugOk').hidden = false;
                    } else {
                        slug.setAttribute('data-ok','N');
                        slug.classList.add('border-orange-thin');
                        slug.classList.remove('border-blue-thin');
                        document.getElementById('alertSlug').hidden = false;
                        document.getElementById('alertSlugFormat').hidden = false;
                        document.getElementById('alertSlugOk').hidden = true;
                    }
                    console.log(data);
                });
            })
            $('#slug').change(function (e) {
                $.ajax({
                    "async": true,
                    "crossDomain": true,
                    "url": "{{ route('mypost.checkSlug',$type) }}",
                    "method": "POST",
                    "data": {slug: e.target.value}
                }).done(function (data) {
                    if (data.success && data.canUseSlug) {
                        e.target.setAttribute('data-ok','Y');
                        e.target.classList.add('border-blue-thin');
                        e.target.classList.remove('border-orange-thin');
                        document.getElementById('alertSlug').hidden = true;
                        document.getElementById('alertSlugFormat').hidden = true;
                        document.getElementById('alertSlugOk').hidden = false;
                    } else {
                        e.target.setAttribute('data-ok','N');
                        e.target.classList.remove('border-blue-thin');
                        e.target.classList.add('border-orange-thin');
                        document.getElementById('alertSlug').hidden = false;
                        document.getElementById('alertSlugFormat').hidden = false;
                        document.getElementById('alertSlugOk').hidden = true;
                    }
                    console.log(data);
                });
            });


        })
    </script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
        var route_prefix = "{{ url(config('lfm.url_prefix', config('lfm.prefix'))) }}";
    </script>
    <script>
        var editor_config = {
            path_absolute: "",
            selector: "textarea[id=contentPost]",
            theme: 'modern',
            plugins: 'print preview searchreplace emoticons autolink ' +
            'directionality codesample visualblocks visualchars fullscreen ' +
            'image link media template codesample  code table charmap hr pagebreak ' +
            'nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount ' +
            'imagetools contextmenu colorpicker textpattern help',
            toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat | emoticons | fontsizeselect | fontselect ',// fontselect
            image_advtab: true,
            templates: [
                {title: 'Website Template', content: 'Test 1'},
                {title: 'Mobile Template', content: 'Test 2'},
                {title: 'Logo Template', content: 'Test 3'}
            ],
            codesample_languages: [
                {text: 'HTML/XML', value: 'markup'},
                {text: 'JavaScript', value: 'javascript'},
                {text: 'CSS', value: 'css'},
                {text: 'PHP', value: 'php'},
                {text: 'Ruby', value: 'ruby'},
                {text: 'Python', value: 'python'},
                {text: 'Java', value: 'java'},
                {text: 'C', value: 'c'},
                {text: 'C#', value: 'csharp'},
                {text: 'C++', value: 'cpp'},
                {text: "jsx", value: "jsx"},
                {text: "JSON", value: "json"}
            ],
            content_css: [
                '//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,700,900,900i&amp;subset=vietnamese',
                '//www.tinymce.com/css/codepen.min.css'
            ],
            font_formats:  'Roboto=roboto, avant garde cursive times',
            relative_urls: false,
            height: 600,
            allow_script_urls: true,
            file_browser_callback: function (field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + route_prefix + '?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file: cmsURL,
                    title: 'Filemanager',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no"
                });
            }
        };

        tinymce.init(editor_config);
    </script>
    <script>
        {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!}
    </script>
    <script>
        $('#lfm').filemanager('image', {prefix: route_prefix});
        // $('#lfm2').filemanager('file', {prefix: route_prefix});
    </script>
@endsection