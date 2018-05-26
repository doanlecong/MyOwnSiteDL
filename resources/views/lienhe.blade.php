@extends('layouts.app')

@section('title')
    {{ " | Nếu có thắc mắc thì cứ PM! " }}
@endsection

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Trang Chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Liên Hệ</li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="container border-top-blue no-padding-left-right no-padding-top no-padding-bottom">
        <div class="card card-no-border">
            <div class="card card-no-border">
                <div class="card-header bg-primary text-center text-light no-border-radius">
                    <h2 class="text-shadown-blue">Liên Hệ</h2>
                </div>
                <div class="card-body no-padding-bottom">
                    <h5 class="card-title">Thắc mắc hay góp ý:</h5>
                    <p>
                        Nếu bạn có bất cứ thắc mắc nào có thể gửi lại cho mình thông tin thông qua form bên dưới.
                    </p>
                    <p><span class="text-danger">*</span> Mọi ý kiến đóng góp về nội dung các bài đăng hay đề xuất làm
                        hoàn thiện hơn nội dung các bài đăng . Mong các bạn cho mình ý kiến để xây dựng tôt hơn.</p>
                </div>
            </div>
            <div class="padding-around padding-top-10">
                <form method="POST" onsubmit="return validate();" enctype="application/x-www-form-urlencoded"
                      id="formlienhe">
                    {{ csrf_field() }}
                    @method("POST")
                    <div class="form-group">
                        <label for="name">Tên của bạn<span class="text-xl-center text-danger">*</span> : </label>
                        <input type="text" class="form-control" id="name_nguoi" name="name_nguoi"
                               placeholder="Tên của bạn" title="Hãy nhập chữ kèm khoảng trắng.VD : Nguyễn Văn A"
                               required>
                        <p>Vui lòng gửi mình tên đầy đủ của bạn</p>
                    </div>
                    <div class="row" style="margin-left: -15px;margin-right: -15px;">
                        <div class="col-sm">
                            <div class="form-group">
                                <label for="email">Email của bạn <span class="text-xl-center text-danger">*</span>
                                    :</label>
                                <input type="email" class="form-control" id="email" name="email"
                                       placeholder="youremail@mail.com" title="Vd: levana@gmail.com" required
                                       pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                                <p>Email</p>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group">
                                <label for="email1">Xác nhận email <span class="text-xl-center text-danger">*</span>
                                    :</label>
                                <input type="email" class="form-control" id="email1" name="emailconfirm"
                                       placeholder="youremail@mail.com" title="Vd: levana@gmail.com" required
                                       pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                                <p>Xác nhận email</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content">Nội dung <span class="text-xl-center text-danger">*</span> :</label>
                        <textarea class="form-control" rows="6" required style="resize: vertical; min-height: 100px;"
                                  placeholder="Thông tin bạn muốn gửi" id="contentlienhe"
                                  name="contentlienhe"></textarea>
                        <p>Hãy mô tả thông tin mà bạn cần liên hệ</p>
                    </div>
                    <hr>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary box-shadown-superdarkblue">Gửi Thông Tin</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('addScript')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function validate() {
            var name = document.getElementById('name_nguoi');
            var email = document.getElementById('email');
            var email1 = document.getElementById('email1');
            var content = document.getElementById('contentlienhe');

            if (name == "") {
                swal({
                    title: "Opp !",
                    text: "Bạn Thiếu Điền Tên Của Bạn Rồi.",
                    icon: "error",
                    button: "Diền Tiếp",
                });
                name.focus();
                return false;
            } else {
                name.style.borderBottom = " 4px solid dodgerblue";
            }
            if (email.value == "") {
                // console.log('chay valid form Email ');
                email.style.borderBottom = " 4px solid red";
                return false;
            }
            if (email1.value == "") {
                // console.log('chay valid form Email1 ');
                email1.style.borderBottom = " 4px solid red";
                return false;

            }
            if (content.value == "") {
                content.focus();
                content.style.borderBottom = " 4px solid red";
                return false;
            } else {
                content.style.borderBottom = " 4px solid dodgerblue";
            }
            if (email1.value != email.value) {
                email1.focus();
                email.style.borderBottom = " 4px solid red";
                email1.style.borderBottom = " 4px solid red";
                swal({
                    title: "Opp !",
                    text: "Có vẻ như email của bạn không dồng nhất với nhau",
                    icon: "error",
                    button: "Điền Tiếp",
                });
                return false;
            } else {
                email.style.borderBottom = " 4px solid dodgerblue";
                email1.style.borderBottom = " 4px solid dodgerblue";

            }

            var formData = new FormData();
            formData.append('name_nguoi', name.value);
            formData.append('email', email.value);
            formData.append('contentlienhe', content.value);

            $.ajax({
                url: '{{ route('lienhe.store') }}',
                data: formData,
                type: 'POST',
                contentType: false,
                processData: false,
                success: function (data) {
                    swal({
                        title: "Thank you!",
                        text: data.msg,
                        icon: "success",
                        button: "Tắt nó !",
                    });

                },
                error: function (e) {
                    swal({
                        title: "Opp !",
                        text: e.responseJSON.msg,
                        icon: "error",
                        button: "Tắt nó !",
                    });
                }
            }).then(function () {
                var formlienhe = document.getElementById('formlienhe');
                formlienhe.reset();
            });
            return false;
        }
    </script>
@endsection