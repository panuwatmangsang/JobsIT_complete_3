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
                <h4>ลงทะเบียนสำหรับผู้สมัคร</h4>

                <form action="{{ route('auth.applicants_save') }}" method="post">
                
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
                        <label>Username</label>
                        <input type="text" name="app_name" id="" value="{{ old('app_name') }}" class="form-control" placeholder="ชื่อผู้สมัคร">
                        <span class="text-danger">@error('app_name'){{ $message }} @enderror</span>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="app_email" id="" value="{{ old('app_email') }}" class="form-control" placeholder="อีเมลผู้สมัคร">
                        <span class="text-danger">@error('app_email'){{ $message }} @enderror</span>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="app_password" id="" value="{{ old('app_password') }}" class="form-control" placeholder="รหัสผ่านผู้สมัคร">
                        <span class="text-danger">@error('app_password'){{ $message }} @enderror</span>
                    </div>

                    <button type="submit" class="btn btn-block btn-success">สมัครสมาชิก</button>

                    <br>
                    <p style="float: left;">เป็นสมาชิก JobsIT อยู่แล้ว</p>
                    <a href="{{ route('auth.applicants_login') }}" style="margin-left: 5px;">เข้าสู่ระบบ</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>