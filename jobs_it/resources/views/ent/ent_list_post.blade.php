@extends('ent.layout')
@section('title','สร้างใบประกาศ')

@section('content')

<body>
    <!-- profile login -->
    <div class="container" style="margin-top:100px">
        <div class="row justify-content-center">
            <div class="card" style="width: 80%;height:100%">
                <div class="card-header" style="background-color:#6369ED; color:White;">
                    <p class="card-text" style="font-size: 18px;top:2px;text-align:center">ข้อมูลเข้าสู่ระบบ</p>
                </div>

                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="card-body">

                    <div class="row justify-content-center">

                        @if(isset($profile_login))
                        @foreach ($profile_login as $profile)
                        <form action="#" method="post">

                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="form-inline form-group mt-3">
                                        <label for="exampleFormControlTextarea1">ชื่อผู้ใช้ :</label>
                                        <input type="text" class="form-control" name="ent_name" value="{{ $profile->ent_name }}" style="width:100%;" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="form-inline form-group mt-3">
                                        <label for="exampleFormControlTextarea1">อีเมล :</label>
                                        <input type="text" class="form-control" name="ent_email" value="{{ $profile->ent_email }}" style="width:100%;" readonly>
                                    </div>
                                </div>
                            </div>


                            <a href="{{ route('ent_edit_login',$profile->ent_id) }}" class="btn btn-warning">เปลี่ยนรหัสผ่าน</a>
                        </form>
                        @endforeach
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="container col-10">
        <div class="row justify-content-center">

            <!-- profile -->
            <div class="card" style="width: 100%; margin-top:50px; height:100%; margin-bottom:50px;">
                <div class="card-header" style="background-color:#6369ED; color:White;">
                    <p class="card-text" style="font-size: 18px;">ข้อมูลบริษัท</p>
                </div>

                <div class="card-body">
                    @if ($message = Session::get('success_company_profile'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif

                    <a href="{{ route('ent_profile') }}" class="btn btn-success mb-2">สร้างข้อมูลบริษัท</a>
                    <br>

                    <table class="table table-bordered">
                        <tr class="text-center">
                            <th>ชื่อบริษัท</th>
                            <th>ติดต่อ</th>
                            <th>เบอร์โทรศัพท์</th>
                            <th>สถานที่ตั้ง</th>
                            <th>การกระทำ</th>
                        </tr>

                        @if(isset($ent_profile))
                        @foreach ($ent_profile as $ent_profiles)
                        <tr>
                            <td>{{ $ent_profiles->profile_name_company }}</td>
                            <td class="text-center">{{ $ent_profiles->profile_company_contact }}</td>
                            <td class="text-center">{{ $ent_profiles->profile_company_phone }}</td>
                            <td class="text-center">{{ $ent_profiles->profile_company_address }}</td>
                            <td class="text-center">
                                <a href="{{ route('ent_show_profile',$ent_profiles->profile_company_id) }}" class="btn btn-primary">แสดง</a>
                                <a href="{{ route('ent_edit_profile',$ent_profiles->profile_company_id) }}" class="btn btn-warning">แก้ไข</a>
                                <form action="{{ route('ent_delete_profile',$ent_profiles->profile_company_id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')" type="submit">ลบ</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="container col-10">
        <div class="row justify-content-center">

            <!-- post  -->
            <div class="card" style="width: 1080%; margin-top:0px; height:100%">
                <div class="card-header" style="background-color:#6369ED; color:White;">
                    <p class="card-text" style="font-size: 18px;">ประกาศรับสมัครพนักงาน</p>
                </div>

                <div class="card-body">
                    @if ($message = Session::get('success_post'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif

                    <a href="{{ route('ent_post') }}" class="btn btn-success mb-2">สร้างใบประกาศรับสมัครงาน</a>
                    <br>

                    <table class="table table-bordered">
                        <tr class="text-center">
                            <th>ชื่องาน</th>
                            <th>จำนวน</th>
                            <th>วันที่เริ่มประกาศ</th>
                            <th>วันที่สิ้นสุดประกาศ</th>
                            <th>การกระทำ</th>
                        </tr>
                        @foreach ($jobs as $jobs)
                        <tr>
                            <td>{{ $jobs->jobs_name }}</td>
                            <td class="text-center">{{ $jobs->jobs_quantity }}</td>
                            <td class="text-center">{{ $jobs->start_post }}</td>
                            <td class="text-center">{{ $jobs->stop_post }}</td>
                            <td class="text-center">
                                <a href="{{ route('ent.ent_show_post',$jobs->jobs_id) }}" class="btn btn-primary">แสดง</a>
                                <a href="{{ route('ent.ent_edit_post',$jobs->jobs_id) }}" class="btn btn-warning">แก้ไข</a>
                                <form action="{{ route('ent.ent_delete_post',$jobs->jobs_id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')" type="submit">ลบ</button>
                                </form>
                            </td>

                        </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</body>
@endsection