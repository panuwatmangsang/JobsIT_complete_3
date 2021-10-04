@extends('applicants.layout')
@section('title','ข้อมูลเข้าสู่ระบบ')

@section('content')

<body>
    <div class="container col-7" style="margin-top:100px">
        <div class="row justify-content-center">
            <div class="card" style="width: 80%;height:100%">
                <div class="card-header" style="background-color:#E94242; color:White;">
                    <p class="card-text" style="font-size: 18px;top:2px;text-align:center">ข้อมูลเข้าสู่ระบบ</p>
                </div>

                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="card-body">

                    <div class="row justify-content-center">
                        @foreach ($app_profile as $profile)
                        <form action="#" method="post">

                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="form-inline form-group mt-3">
                                        <label for="exampleFormControlTextarea1">ชื่อผู้ใช้ :</label>
                                        <input type="text" class="form-control" name="app_name" value="{{ $profile->app_name }}" style="width:100%;" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="form-inline form-group mt-3">
                                        <label for="exampleFormControlTextarea1">อีเมล :</label>
                                        <input type="text" class="form-control" name="app_email" value="{{ $profile->app_email }}" style="width:100%;" readonly>
                                    </div>
                                </div>
                            </div>


                            <a href="{{ route('applicants_edit_profile',$profile->app_id) }}" class="btn btn-warning">เปลี่ยนรหัสผ่าน</a>

                            <br>

                            <a type="button" href="{{ route('applicants_show_history') }}" class="btn btn-success" style="width: 100%; margin-top: 10px;">ฝากประวัติ</a>

                        </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>


@endsection