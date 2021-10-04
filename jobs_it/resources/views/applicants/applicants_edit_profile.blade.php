@extends('applicants.layout')
@section('title','ข้อมูลเข้าสู่ระบบ')

@section('content')

<body>
    <div class="container col-7" style="margin-top:100px">
        <div class="row justify-content-center">
            <div class="card" style="width: 80%;height:100%">
                <div class="card-header" style="background-color:#E94242; color:White;">
                    <p class="card-text" style="font-size: 18px;top:2px;text-align:center">แก้ไขข้อมูลเข้าสู่ระบบ</p>
                </div>
                
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="card-body">

                    <div class="row justify-content-center">
                        <form action="{{route('applicants_change_password', $password_edit->app_id)}}" method="post" enctype="multip">
                            @csrf
                            @method('patch')

                            <div class=" form-row">
                            <div class="col-md-12">
                                <div class="form-inline form-group mt-3">
                                    <label for="exampleFormControlTextarea1">รหัสผ่านเก่า :</label>
                                    <input type="password" class="form-control" name="current_password" value="{{ old('current_password') }}" style="width:100%;" placeholder="กรอกรหัสผ่านเก่า">
                                    <span class="text-danger">@error('current_password'){{ $message }} @enderror</span>
                                </div>
                            </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-inline form-group mt-3">
                                <label for="exampleFormControlTextarea1">รหัสผ่านใหม่ :</label>
                                <input type="password" class="form-control" name="new_password" style="width:100%;" placeholder="กรอกรหัสผ่านใหม่">
                                <span class="text-danger">@error('new_password'){{ $message }} @enderror</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-inline form-group mt-3">
                                <label for="exampleFormControlTextarea1">ยืนยันรหัสผ่านใหม่ :</label>
                                <input type="password" class="form-control" name="confirm_password" style="width:100%;" placeholder="ยืนยันรหัสผ่านใหม่">
                                <span class="text-danger">@error('confirm_password'){{ $message }} @enderror</span>
                            </div>
                        </div>
                    </div>

                </div>

                <a href="{{ route('profile') }}" class="btn btn-danger" style="float:right; margin-left:10px">ยกเลิก</a>
                <button type="submit" class="btn btn-success" style="float:right;">อัพเดท</button>

                </form>

            </div>
        </div>
    </div>
    </div>

</body>


@endsection