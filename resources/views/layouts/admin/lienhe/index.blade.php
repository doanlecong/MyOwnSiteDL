@extends('layouts.admin')
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Trang Chủ</a></li>
            <li class="breadcrumb-item">Danh Sách Liên Hệ Góp Ý</li>
        </ol>
    </nav>
@endsection

@section('contentAdmin')
    <div class="col-lg no-padding-left-right">
        <div class="card">
            <div class="card-header card_header_gradient">Danh Sách Liên Hệ Góp Ý</div>
            <div class="card-body">
                <div class="devider-line"></div>
                @if(count($myContacts) > 0)
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Nội Dung</th>
                            <th>Đọc ? </th>
                            <th>Trả lời ?</th>
                            <th>Created Time</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($myContacts as $contact)
                            <tr id="row{{$contact->id }}">
                                <td>{{ $contact->id}}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td title="{{ strip_tags($contact->content) }}">{{ substr(strip_tags($contact->content), 0, 50) }}{{ strlen(strip_tags($contact->content)) > 50 ? "..." : "" }}</td>
                                <td class="doclienhe" id="column{{ $contact->id }}">
                                    @if($contact->status == "N")
                                        {{ "Chưa đọc" }}
                                    @else
                                        {{ "Đã đọc" }}
                                    @endif
                                </td>
                                <td>
                                    @if($contact->sendMail == "N")
                                        {{ "Chưa gửi" }}
                                    @else
                                        {{ "Đã gửi" }}
                                    @endif
                                </td>
                                <td>{{ $contact->created_at }}</td>
                                <td>
                                    <button onclick="setDocLienHe({{$contact->id}})" class="btn btn-warning" {{ ($contact->status == "Y") ? 'disabled': '' }}>Đã đọc</button>
                                    <button onclick="deleteLienHe({{$contact->id}})" class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        {!! $myContacts->links(); !!}
                    </div>
                @else
                    <h3 class="text-center">Hiện Chưa có dữ liệu nào trong bảng</h3>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('scriptTail')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function setDocLienHe(id) {
            var button = event.target;
            event.stopPropagation();
            $.ajax({
                url: "/authorized/lienhe/"+id+"/dadoc",
                type: 'GET',
                success: function (data) {
                    if(data.success == true) {
                        swal({
                            title: "Success !",
                            text: data.msg,
                            icon: "success",
                            button: "Đóng thôi !",
                        });
                        document.getElementById('column'+id).innerText = 'Đã đọc';
                        button.disabled = true;
                    }
                },
                error:function (e) {
                    // console.log(e);
                    swal({
                        title: "Opp !",
                        text: e.responseJSON.msg,
                        icon: "error",
                        button: "Đóng thôi !",
                    });
                }
            })
        }
         function deleteLienHe(id) {
             event.stopPropagation();
             swal({
                 title: "Muốn xóa hả mày ?",
                 text: "Một khi mày xóa thì éo có lấy lại được đâu con chóa !!",
                 icon: "warning",
                 buttons: true,
                 dangerMode: true,
             }).then((value) => {
                 if (value) {
                     $.ajax({
                         url: "/authorized/lienhe/"+id+"/delete",
                         type:"GET",
                         success: function (data) {
                             if(data.success == true) {
                                 swal({
                                     title: "Success !",
                                     text: data.msg,
                                     icon: "success",
                                     button: "Đóng thôi !",
                                 });
                                 var tr = document.getElementById('row'+id);
                                 var tbody = tr.parentNode;
                                 tbody.removeChild(tr);
                             } else {

                             }
                         },
                         error: function(e) {
                             swal({
                                 title: "Opp !",
                                 text: e.responseJSON.msg,
                                 icon: "error",
                                 button: "Đóng thôi !",
                             });
                         }
                     })
                 } else {
                     swal("Mày rảnh vậy !!");
                 }
             })

         }
    </script>
@endsection