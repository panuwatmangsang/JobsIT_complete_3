@extends('applicants.layout')
@section('title','ฝากประวัติ')

@section('content')

<body>
    <div class="container col-10" style="margin-top:100px">
        <div class="row justify-content-center">
            <div class="card" style="width: 80%;height:100%">

                <div class="card-header" style="background-color:#E94242; color:White;height:40px;">
                    <p class="card-text" style="font-size: 18px;top:2px;text-align:center">ฝากประวัติ</p>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <div class="card-body">

                    <form action="{{ route('add_history') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <!-- ======================== ประวัติส่วนตัว ======================= -->
                        <div class="head position-relative mt-1">
                            <p class="card-text" style="font-size:18px;">ประวัติส่วนตัว</p>
                        </div>
                        <div class="form-row">
                            <div class="form-inline form-group col-md-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="name_prefix" name="name_prefix" value="นาย" class="custom-control-input">
                                    <label class="custom-control-label" for="name_prefix">นาย</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="name_prefix2" name="name_prefix" value="นาง" class="custom-control-input">
                                    <label class="custom-control-label" for="name_prefix2">นาง</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="name_prefix3" name="name_prefix" value="นางสาว" class="custom-control-input">
                                    <label class="custom-control-label" for="name_prefix3">นางสาว</label>
                                </div>
                                <span class="text-danger">@error('name_prefix'){{ $message }} @enderror</span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="exampleFormControlTextarea1">ชื่อ :</label>
                                <input type="text" class="form-control" name="first_name" placeholder="กรอกชื่อ">
                                <span class="text-danger">@error('first_name'){{ $message }} @enderror</span>

                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="exampleFormControlTextarea1">นามสกุล :</label>
                                <input type="text" class="form-control" name="last_name" placeholder="กรอกนามสกุล">
                                <span class="text-danger">@error('last_name'){{ $message }} @enderror</span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="exampleFormControlTextarea1">อีเมล :</label>
                                <input type="text" class="form-control" name="email" placeholder="กรอกอีเมล">
                                <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="exampleFormControlTextarea1">เบอร์โทรศัพท์ :</label>
                                <input type="text" class="form-control" name="phone_number" placeholder="กรอกเบอร์โทรศัพท์">
                                <span class="text-danger">@error('phone_number'){{ $message }} @enderror</span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="exampleFormControlTextarea1">วันเกิด :</label>
                                <input id="datepicker" name="birthday" class="form-control" value="{{ old('birthday') }}">
                                <span class="text-danger">@error('birthday'){{ $message }} @enderror</span>
                                <script>
                                    $('#datepicker').datepicker({
                                        uiLibrary: 'bootstrap4'
                                    });
                                </script>

                                <label for="exampleFormControlTextarea1">อายุ:</label>
                                <input type="text" class="form-control" name="year_old" placeholder="กรอกอายุ">
                                <span class="text-danger">@error('year_old'){{ $message }} @enderror</span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="exampleFormControlFile1">รูปประจำตัว</label>
                                <input type="file" name="profile" accept="image/*" class="form-control-file" id="exampleFormControlFile1">
                                <span class="text-danger">@error('profile'){{ $message }} @enderror</span>
                            </div>
                        </div>

                        <br>
                        <div class="alert alert-danger p-1" role="alert"></div>
                        <br>
                        <!-- ===================================================================================================ประวัติการศึกษา================================================================================ -->
                        <div class="head position-relative mt-1">
                            <p class="card-text" style="font-size:18px;">ประวัติการศึกษา</p>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="exampleFormControlTextarea1">จบจากมหาวิทยาลัย/วิทลัย :</label>
                                <input type="text" class="form-control" name="university" placeholder="กรอกชื่อมหาวิทยาลัย/วิทลัย">
                                <span class="text-danger">@error('university'){{ $message }} @enderror</span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="exampleFormControlTextarea1">คณะ :</label>
                                <input type="text" class="form-control" name="faculty" placeholder="กรอกคณะ">
                                <span class="text-danger">@error('faculty'){{ $message }} @enderror</span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="exampleFormControlTextarea1">สาขา :</label>
                                <input type="text" class="form-control" name="branch" placeholder="กรอกชื่อสาขา">
                                <span class="text-danger">@error('branch'){{ $message }} @enderror</span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="exampleFormControlTextarea1">GPA :</label>
                                <input type="text" class="form-control" name="gpa" placeholder="กรอกGPA">
                                <span class="text-danger">@error('gpa'){{ $message }} @enderror</span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="exampleFormControlTextarea1">วุฒิการศึกษา :</label>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="educational1" name="educational" value="ม.6" class="custom-control-input">
                                    <label class="custom-control-label" for="educational1">ม.6</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="educational2" name="educational" value="ปวส." class="custom-control-input">
                                    <label class="custom-control-label" for="educational2">ปวส.</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="educational3" name="educational" value="ปวช." class="custom-control-input">
                                    <label class="custom-control-label" for="educational3">ปวช.</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="educational4" name="educational" value="ปริญญาตรี" class="custom-control-input">
                                    <label class="custom-control-label" for="educational4">ปริญญาตรี</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="educational5" name="educational" value="ปริญญาโท" class="custom-control-input">
                                    <label class="custom-control-label" for="educational5">ปริญญาโท</label>
                                </div>
                                <span class="text-danger">@error('educational'){{ $message }} @enderror</span>
                            </div>
                        </div>
                        <br>
                        <div class="alert alert-danger p-1" role="alert"></div>
                        <br>
                        <!-- ===================================================================================================ประสบการณ์ทำงาน================================================================================ -->
                        <div class="head position-relative mt-1">
                            <p class="card-text" style="font-size:18px;">ประสบการณ์ทำงาน</p>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-inline form-group">
                                    <label for="exampleFormControlTextarea1">ประสบการณ์ที่เคยทำงานกับบริษัท (ปี) :</label>
                                    <input type="text" class="form-control" name="experience" style="width: 50%; margin-left: 10px;" placeholder="กรอกประสบการณ์ที่เคยทำงานกับบริษัท (ปี)">
                                    <span class="text-danger">@error('experience'){{ $message }} @enderror</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">ภาษาที่ถนัด</label>
                                    <textarea class="form-control" name="dominant_language" id="exampleFormControlTextarea1" rows="8"></textarea>
                                    <span class="text-danger">@error('dominant_language'){{ $message }} @enderror</span>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">ภาษาที่เคยเรียน</label>
                                    <textarea class="form-control" name="language_learned" id="exampleFormControlTextarea1" rows="8"></textarea>
                                    <span class="text-danger">@error('language_learned'){{ $message }} @enderror</span>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">ความสามารถพิเศษ</label>
                                    <textarea class="form-control" name="charisma" id="exampleFormControlTextarea1" rows="8"></textarea>
                                    <span class="text-danger">@error('charisma'){{ $message }} @enderror</span>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">ผลงาน</label>
                                    <input type="file" name="portfolio" class="form-control-file" id="exampleFormControlFile1">
                                    <span class="text-danger">@error('portfolio'){{ $message }} @enderror</span>
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="alert alert-danger p-1" role="alert"></div>
                        <br>
                        <!-- ===================================================================================================ภูมิลำเนา================================================================================ -->
                        <div class="head position-relative mt-1">
                            <p class="card-text" style="font-size:18px;">ภูมิลำเนา</p>
                        </div>
                        <br>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="exampleFormControlTextarea1">หมู่บ้าน :</label>
                                <input type="text" class="form-control" name="name_village" placeholder="กรอกหมู่บ้าน">
                                <span class="text-danger">@error('name_village'){{ $message }} @enderror</span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="exampleFormControlTextarea1">บ้านเลขที่ :</label>
                                <input type="text" class="form-control" name="home_number" placeholder="กรอกบ้านเลขที่">
                                <span class="text-danger">@error('home_number'){{ $message }} @enderror</span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="exampleFormControlTextarea1">ซอย/ตรอก :</label>
                                <input type="text" class="form-control" name="alley" placeholder="กรอกซอย/ตรอก">
                                <span class="text-danger">@error('alley'){{ $message }} @enderror</span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="exampleFormControlTextarea1">ถนน :</label>
                                <input type="text" class="form-control" name="road" placeholder="กรอกถนน">
                                <span class="text-danger">@error('road'){{ $message }} @enderror</span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="exampleFormControlTextarea1">ตำบล :</label>
                                <input type="text" class="form-control" name="district" placeholder="กรอกตำบล">
                                <span class="text-danger">@error('district'){{ $message }} @enderror</span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="exampleFormControlTextarea1">อำเภอ :</label>
                                <input type="text" class="form-control" name="canton" placeholder="กรอกอำเภอ">
                                <span class="text-danger">@error('canton'){{ $message }} @enderror</span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="exampleFormControlTextarea1">จังหวัด :</label>
                                <input type="text" class="form-control" name="province" placeholder="กรอกจังหวัด">
                                <span class="text-danger">@error('province'){{ $message }} @enderror</span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="exampleFormControlTextarea1">รหัสไปรษณีย์ :</label>
                                <input type="text" class="form-control" name="postal_code" placeholder="กรอกรหัสไปรษณีย์">
                                <span class="text-danger">@error('postal_code'){{ $message }} @enderror</span>
                            </div>
                        </div>
                        <br>
                        <div class="alert alert-danger p-1" role="alert"></div>
                        <br>
                        <!-- ===================================================================================================ที่อยู่ปัจจุบัน================================================================================ -->
                        <div class="head position-relative mt-1">
                            <p class="card-text" style="font-size:18px;">ที่อยู่ปัจจุบัน</p>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="exampleFormControlTextarea1">หมู่บ้าน :</label>
                                <input type="text" class="form-control" name="my_name_village" placeholder="กรอกหมู่บ้าน">
                                <span class="text-danger">@error('my_name_village'){{ $message }} @enderror</span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="exampleFormControlTextarea1">บ้านเลขที่ :</label>
                                <input type="text" class="form-control" name="my_home_number" placeholder="กรอกบ้านเลขที่">
                                <span class="text-danger">@error('my_home_number'){{ $message }} @enderror</span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="exampleFormControlTextarea1">ซอย/ตรอก :</label>
                                <input type="text" class="form-control" name="my_alley" placeholder="กรอกซอย/ตรอก">
                                <span class="text-danger">@error('my_alley'){{ $message }} @enderror</span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="exampleFormControlTextarea1">ถนน :</label>
                                <input type="text" class="form-control" name="my_road" placeholder="กรอกถนน">
                                <span class="text-danger">@error('my_road'){{ $message }} @enderror</span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="exampleFormControlTextarea1">ตำบล :</label>
                                <input type="text" class="form-control" name="my_district" placeholder="กรอกตำบล:">
                                <span class="text-danger">@error('my_district'){{ $message }} @enderror</span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="exampleFormControlTextarea1">อำเภอ :</label>
                                <input type="text" class="form-control" name="my_canton" placeholder="กรอกอำเภอ">
                                <span class="text-danger">@error('my_canton'){{ $message }} @enderror</span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="exampleFormControlTextarea1">จังหวัด :</label>
                                <input type="text" class="form-control" name="my_province" placeholder="กรอกจังหวัด">
                                <span class="text-danger">@error('my_province'){{ $message }} @enderror</span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="exampleFormControlTextarea1">รหัสไปรษณีย์ :</label>
                                <input type="text" class="form-control" name="my_postal_code" placeholder="กรอกรหัสไปรษณีย์">
                                <span class="text-danger">@error('my_postal_code'){{ $message }} @enderror</span>
                            </div>
                        </div>

                        <br>
                        <div class="alert alert-danger p-1" role="alert"></div>
                        <br>

                        <!-- <a href="{{ route('applicants_show_history') }}" class="btn btn-primary">แสดงประวัติ</a> -->

                        <button type="submit" class="btn btn-success" style="float:right; margin-left:10px">บันทึกประวัติ</button>
                        <a href="{{ route('applicants_show_history') }}" class="btn btn-danger" style="float:right; margin-left:10px">ยกเลิก</a>

                    </form>
                </div>
            </div>
        </div>
    </div>

</body>


@endsection