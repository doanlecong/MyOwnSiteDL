@extends('layouts.app')
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Trang Chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Liên Hệ</li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="container">
        <div class="card">
            <div class="card">
                <div class="card-header bg-primary text-center text-light">
                    <h2>Liên Hệ</h2>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Thắc mắc hay góp ý:</h5>
                    <p>
                        Nếu bạn có bất cứ thắc mắc nào có thể gửi lại cho mình thông tin thông qua form bên dưới.
                    </p>
                    <p><span class="text-danger">*</span> Mọi ý kiến đóng góp về nội dung các bài đăng hay đề xuất làm hoàn thiện hơn nội dung các bài đăng . Mong các bạn cho mình ý kiến để xây dựng tôt hơn.</p>
                </div>
            </div>
            <div class="padding-around">
                <form>
                    <div class="form-group">
                        <label for="name">Tên của bạn<span class="text-xl-center text-danger">*</span> : </label>
                        <input type="text" class="form-control" id="name" name="name" title="Hãy nhập chữ kèm khoảng trắng.VD : Nguyễn Văn A" required>
                        <p>Vui lòng gửi mình tên đầy đủ của bạn</p>
                    </div>
                    <div class="row" >
                        <div class="col-sm">
                            <div class="form-group">
                                <label for="email">Email của bạn <span class="text-xl-center text-danger">*</span> :</label>
                                <input type="email" class="form-control" id="email" name="email" title="Vd: levana@gmail.com" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                                <p>Email</p>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group">
                                <label for="email1">Xác nhận email <span class="text-xl-center text-danger">*</span> :</label>
                                <input type="email" class="form-control" id="email1" name="emailconfirm" title="Vd: levana@gmail.com" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                                <p>Xác nhận email</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content">Nội dung <span class="text-xl-center text-danger">*</span> :</label>
                        <textarea class="form-control" rows="6" required style="resize: vertical; min-height: 100px;" id="content" name="content"></textarea>
                        <p>Hãy mô tả thông tin mà bạn cần liên hệ</p>
                    </div>
                    <hr>
                    <div class="form-group text-xl-center">
                        <button type="submit" class="btn btn-primary">Gủi Thông Tin</button>
                    </div>
                    <hr class="font-weight-bold">
                </form>
            </div>
        </div>
    </div>
@endsection