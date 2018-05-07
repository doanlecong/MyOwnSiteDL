@extends('layouts.admin')
@section('script')

@endsection
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Trang Chủ</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dichvu.index') }}">Danh Sách Chủ Đề</a></li>
            <li class="breadcrumb-item">Thông tin khách liên hệ</li>
        </ol>
    </nav>
@endsection

@section('contentAdmin')
    <div class="col-lg no-padding-left-right">
        <div class="card">
            <div class="card-header card_header_gradient">Thông tin khách liên hệ</div>
            <div class="card-body">
                <p>
                    {{--<a href="{{ route('dichvu.index') }}" class="btn btn-outline-warning text-primary">Danh Sách</a>--}}
                    {{--<a href="{{ route('dichvu.reply',$serviceContact->id) }}" class="btn btn-outline-primary" >Gửi Mail</a>--}}
                </p>
                <div class="devider-line"></div>
                <div class="row">
                    <div class="col">
                        <div class="col-md-12">
                            <form action="{{ route('dichvu.saveMail',$serviceContact->id) }}" method="POST" novalidate enctype="application/x-www-form-urlencoded">
                                {{ csrf_field() }}
                                @if($serviceContact->mailService)
                                    <?php $mail = $serviceContact->mailService; ?>
                                @else
                                    <?php $mail = null; ?>
                                @endif
                                @method('POST')
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="title">Tiều Đề :</label>
                                            <input class="form-control" type="text" required name="title" value= <?php if($mail) echo $mail->title; ?>>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="email">Email :</label>
                                            <input class="form-control" type="email" readonly name="email" value="{{ $serviceContact->email }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="nguoinhan">Tên Người Nhận :</label>
                                            <input class="form-control" type="text" readonly name="nguoinhan" value="{{ $serviceContact->name }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="dichvu">Dich Vu :</label>
                                            <input class="form-control" type="text" disabled name="dichvu" value="{{ $arrService[$serviceContact->service_name] }}">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="des">Mô tả :</label>
                                            <textarea class="form-control" disabled name="nguoinhan">{{ $serviceContact->service_description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <label for="">Nội dung:</label>
                                            <textarea id="contentFormail" name="contentEmail" class="form-control" required><?php if($mail) echo $mail->content; ?></textarea>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="fileAttach">File Đính Kèm</label>
                                            <select class="form-control" name="fileAttach">
                                                <option value=''>Lựa chọn file đính kèm</option>
                                                <option value="{{'1'}}">Catalo cho bảng giá dịch vụ website</option>
                                                <option value="{{'2'}}">Catalo cho bảng giá dịch vụ mobile</option>
                                                <option value="{{'3'}}">Catalo cho bảng giá dịch vụ logo</option>
                                            </select>
                                            <label for="fileAttach">Thời gian gửi:</label>
                                            <input class="form-control" type="datetime-local" name="timesend" value="{{ date('Y-m-d', strtotime($mail->time_to_send)).'T'.date('H:i', strtotime($mail->time_to_send)) }}">

                                            <div class="devider-line"></div>
                                            <label>Allow to Send Mail:</label>
                                            <div class="btn-group btn-group-toggle btn-light" data-toggle="buttons">
                                                <label class="btn  {{ ($mail->allow_send == 'Y' ? 'active btn-primary' : '') }}">
                                                    <input type="radio" name="allow_send" id="option1" value="Y" autocomplete="off" {{ ($mail->allow_send == 'Y' ? 'checked' : '') }}>Allow
                                                </label>
                                                <label class="btn {{ ($mail->allow_send == 'N' ? 'active btn-danger' : '') }}">
                                                    <input type="radio" name="allow_send" id="option2" value="N" autocomplete="off" {{ ($mail->allow_send == 'N' ? 'checked' : '') }}>Wait
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="devider-line"></div>
                                <button class="btn btn-danger" type="submit">SAVE</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scriptTail')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
        var route_prefix = "{{ url(config('lfm.url_prefix', config('lfm.prefix'))) }}";
    </script>
    <script>
        var editor_config = {
            path_absolute : "",
            selector: "textarea[id=contentFormail]",
            theme: 'modern',
            plugins: 'print preview searchreplace emoticons autolink ' +
            'directionality codesample visualblocks visualchars fullscreen ' +
            'image link media template codesample  code table charmap hr pagebreak ' +
            'nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount ' +
            'imagetools contextmenu colorpicker textpattern help',
            toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat | emoticons | fontselect',
            image_advtab: true,
            templates: [
                { title: 'Website Template', content: 'Test 1' },
                { title: 'Mobile Template', content: 'Test 2' },
                { title: 'Logo Template', content: 'Test 3' }
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
                {text:"jsx",value:"jsx"},
                {text:"JSON",value:"json"}
            ],
            content_css: [
                '//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,700,900,900i&amp;subset=vietnamese',
                '//www.tinymce.com/css/codepen.min.css'
            ],
            relative_urls: false,
            height: 400,
            file_browser_callback : function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + route_prefix + '?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no"
                });
            }
        };

        tinymce.init(editor_config);
    </script>
@endsection