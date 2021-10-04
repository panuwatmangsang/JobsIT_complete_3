<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>
    @yield('cssBlock')

    <!-- css noti  -->
    <link rel="stylesheet" href="/jobs_it/css/noti.css">

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />


</head>

<body style="background-color: #F7F4EF;">
    <nav class="navbar fixed-top navbar-expand-sm navbar-dark" style="background-color: #FF3333;">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" style="font-size:18px;" href="#">FOR JOBS SEARCH</a>
            </li>
            <li class="nav-item" style="margin-left: 10px;">
                <a class="nav-link" style="color: #ffff;" href="{{ route('applicants_home') }}">HOME</a>
            </li>
            <li class="nav-item" style="margin-left: 10px;">
                <a class="nav-link" style="color: #ffff;" href="{{ route('applicants_search') }}">JOBS</a>
            </li>
            <li class="nav-item" style="margin-left: 10px;">
                <a class="nav-link" style="color: #ffff;" href="{{ route('map') }}">MAP</a>
            </li>
            <li class="nav-item" style="margin-left: 10px;">
                <a class="nav-link" style="color: #ffff;" href="/applicants/applicants_myjobs?type=all">MyJOBS (@if(isset($count)) {{$count}} @endif)</a>
            </li>
            <li class="nav-item" style="margin-left: 10px;">
                <a class="nav-link" style="color: #ffff;" href="{{ route('profile') }}">PROFILE</a>
            </li>
            <li class="nav-item" style="margin-left: 10px;">

                <!-- <a class="nav-link" id="bell" style="color: #ffff;" href="#">NOTIFICATION</a> -->
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" id="bell" style="color: #ffff;" href="#">NOTIFICATION (@if(isset($noti_count)) {{$noti_count}} @endif)</a>
                <div class="notifications" id="box">
                    <div class="dropdown-menu notify-drop">
                        @if(isset($noti_count))
                        <p style="margin-left: 10px;">Notifications - <span>{{$noti_count}}</span></p>
                        @endif

                        @if(isset($noti_count_box))
                        @foreach($noti_count_box as $row)
                        <div class="notifications-item">
                            <img src="{{ asset('uploads/logo/'.$row->myjobs_logo) }}" alt="img">
                            <div class="text">
                                <p>{{ $row->myjobs_name }}</p>
                                <p>{{ $row->myjobs_name_company }}</p>
                                <p>{{ $row->action_type }}</p>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </li>


            <li class="nav-item" style="margin-left: 600px; float:right">
                <p style="color: #ffff;" class="nav-link">{{ session()->get('LoggedApp') }}</p>
            </li>

            @if(!session()->get('LoggedApp'))
            <li class="nav-item" style="margin-left: 10px; float:right">
                <a href="{{ route('auth.applicants_login') }}" style="color: #ffff;" class="nav-link">Login</a>
            </li>
            @else
            <li class="nav-item" style="margin-left: 10px; float:right">
                <a href="{{ route('auth.applicants_logout') }}" style="color: #ffff;" class="nav-link">Logout</a>
            </li>
            @endif
        </ul>
    </nav>
    @yield('content')
</body>

<!-- ============================ noti btn ========================= -->
<script>
    $(document).ready(function() {

        var down = false;

        $('#bell').click(function(e) {

            var color = $(this).text();
            if (down) {

                $('#box').css('height', '0px');
                $('#box').css('opacity', '0');
                down = false;
            } else {

                $('#box').css('height', 'auto');
                $('#box').css('opacity', '1');
                down = true;

            }

        });

    });
</script>

</html>