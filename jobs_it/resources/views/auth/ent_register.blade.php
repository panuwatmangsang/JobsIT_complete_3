<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>applicants register</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 45px;">
            <div class="col-md-4 col-md-offset-4">
                <h4>ลงทะเบียนสำหรับผู้ประกอบการ</h4>

                <form action="{{ route('auth.ent_save') }}" method="post">
                
                @if(Session::get('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
                @endif

                @if(Session::get('fail'))
                <div class="alert alert-danger">
                    {{ Session::get('fail') }}
                </div>
                @endif
                
                @csrf
                    <div class="form-group">
                        <label>ชื่อบริษัท</label>
                        <input type="text" name="ent_name" id="" value="{{ old('ent_name') }}" class="form-control" placeholder="ชื่อบริษัท">
                        <span class="text-danger">@error('ent_name'){{ $message }} @enderror</span>
                    </div>

                    <div class="form-group">
                        <label>ลักษณะของธุระกิจ</label>
                        <input type="text" name="ent_nature_work" id="" value="{{ old('ent_nature_work') }}" class="form-control" placeholder="ลักษณะของธุระกิจ">
                        <span class="text-danger">@error('ent_nature_work'){{ $message }} @enderror</span>
                    </div>

                    <div class="form-group">
                        <label>ผู้ติดต่อ</label>
                        <input type="text" name="ent_name_contact" id="" value="{{ old('ent_name_contact') }}" class="form-control" placeholder="ผู้ติดต่อ">
                        <span class="text-danger">@error('ent_name_contact'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label>เบอร์โทรศัพท์</label>
                        <input type="text" name="ent_phone" id="" value="{{ old('ent_phone') }}" class="form-control" placeholder="เบอร์โทรศัพท์">
                        <span class="text-danger">@error('ent_phone'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="ent_email" id="" value="{{ old('ent_email') }}" class="form-control" placeholder="อีเมลผู้ประกอบการ">
                        <span class="text-danger">@error('ent_email'){{ $message }} @enderror</span>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="ent_password" id="" value="{{ old('ent_password') }}" class="form-control" placeholder="รหัสผ่านประกอบการ">
                        <span class="text-danger">@error('ent_password'){{ $message }} @enderror</span>
                    </div>

                    <div class="form-group">
                        <label>ตำแหน่งที่ตั้ง</label>
                        <input type="text" name="ent_location" id="" value="{{ old('ent_location') }}" class="form-control" placeholder="ตำแหน่งที่ตั้ง">
                        <span class="text-danger">@error('ent_location'){{ $message }} @enderror</span>
                    </div>

                    <button type="submit" class="btn btn-block btn-success">สมัครสมาชิก</button>

                    <br>
                    <p style="float: left;">เป็นสมาชิก JobsIT อยู่แล้ว</p>
                    <a href="{{ route('auth.ent_login') }}" style="margin-left: 5px;">เข้าสู่ระบบ</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>