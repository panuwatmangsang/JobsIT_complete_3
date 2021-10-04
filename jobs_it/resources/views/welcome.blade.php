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

    <title>Jobs IT</title>
</head>

<body>
    <div class="jumbotron text-center">
        <h1>Web Application Find the IT Jobs around you (JobsIT)</h1>

        <br>

        <h2>(เว็บแอปพลิเคชันหางานด้านไอที)</h2>


        <!-- <div style="display: flex; justify-content:space-evenly;">
            <a type="button" href="#" class="btn btn-danger">For Jobs Search</a>
            <a type="button" href="#" class="btn btn-primary">For Applicants Search</a>
        </div> -->
    </div>

    <div class="container">
        <div class="row" style="justify-content: space-evenly;">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <p>สำหรับคนที่กำลังหางานทำ</p>


                    <br>
                    <a type="button" href="{{ route('applicants_home2') }}" class="btn btn-danger">For Jobs Search</a>
                    <p style="color: red;">*** ผู้สมัครต้องฝากประวัติให้เรียบร้อยก่อนถึงจะสามารถสมัครงานได้ ***</p>
                    <!-- <a href="{{ route('auth.applicants_login') }}">Login</a> -->
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <p>สำหรับคนที่กำลังหาพนักงาน</p>
                    <br>
                    <a type="button" href="{{ route('ent_index') }}" class="btn btn-primary">For Applicants Search</a>
                    <!-- <a href="{{ route('auth.applicants_login') }}">Login</a> -->
                </div>
            </div>
        </div>
    </div>

</body>

</html>