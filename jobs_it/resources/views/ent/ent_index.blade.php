@extends('ent.layout')
@section('title','หน้าหลัก')

@section('content')

<body>
    <div class="container" style="margin-top:50px;">
        <div class="row">

            <!-- text search -->
            <div class="col-md-12" style="margin-top:20px;">
                {!! Form::open(['route' => 'app_search','method' => 'get']) !!}
                <div class="input-group" style="margin-top:20px;">
                    <input type="text" value="{{$query}}" class="form-control" name="query" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="search jobs...">
                </div>
                {!! Form::close() !!}
            </div>

        </div>

        <br>

        <div class="row">
            <!-- left side -->
            <div class="col-md-4 left-side">
                <div class="card">
                    <div class="card-header" align="center" style="background-color:#607D8B; color:white;">
                        ค้นหาประวัติ
                    </div>



                    <div class="card-body">
                        @if(isset($ent_post))
                        {!! Form::open(['route' => 'app_search','method' => 'get']) !!}
                        <div class="dropdown show">
                            <p>ระดับการศึกษา :</p>
                            <select name="educational" id="mySelect" onchange="this.form.submit()" style="width: 100%;">

                                <!-- check request  -->
                                @if(!isset($_REQUEST['educational']))
                                <option value="" selected>ระดับการศึกษาที่ต้องการ</option>
                                <!-- @foreach($ent_post as $row)
                                <option name="query">{{ $row['_source']['educational'] }}</option>
                                @endforeach -->
                                @else
                                <option value="{{ $_REQUEST['educational'] }}" selected>{{ $_REQUEST['educational'] }}</option>
                                @endif

                                @if(isset($options))
                                @foreach($options['educational'] as $row)
                                <option value="{{ $row }}">{{ $row }}</option>
                                @endforeach
                                @endif

                            </select>
                        </div>
                        <noscript><input type=”submit” value=”Submit”></noscript>
                        {!! Form::close() !!}

                        <br>

                        {!! Form::open(['route' => 'app_search','method' => 'get']) !!}
                        <div class="dropdown show">
                            <p>มหาวิทยาลัย/วิทยาลัย :</p>
                            <select name="university" id="mySelect" onchange="this.form.submit()" style="width: 100%;">

                                <!-- check request  -->
                                @if(!isset($_REQUEST['university']))
                                <option value="" selected>มหาวิทยาลัย/วิทยาลัยที่ต้องการ</option>
                                <!-- @foreach($ent_post as $row)
                                <option name="query">{{ $row['_source']['university'] }}</option>
                                @endforeach -->
                                @else
                                <option value="{{ $_REQUEST['university'] }}" selected>{{ $_REQUEST['university'] }}</option>
                                @endif

                                @if(isset($options))
                                @foreach($options['university'] as $row)
                                <option value="{{ $row }}">{{ $row }}</option>
                                @endforeach
                                @endif

                            </select>
                        </div>
                        <noscript><input type=”submit” value=”Submit”></noscript>
                        {!! Form::close() !!}
                        <br>

                        {!! Form::open(['route' => 'app_search','method' => 'get']) !!}
                        <div class="dropdown show">
                            <p>สาขา :</p>
                            <select name="branch" id="mySelect" onchange="this.form.submit()" style="width: 100%;">

                                <!-- check request  -->
                                @if(!isset($_REQUEST['branch']))
                                <option value="" selected>สาขาที่ต้องการ</option>
                                <!-- @foreach($ent_post as $row)
                                <option name="query">{{ $row['_source']['branch'] }}</option>
                                @endforeach -->
                                @else
                                <option value="{{ $_REQUEST['branch'] }}" selected>{{ $_REQUEST['branch'] }}</option>
                                @endif

                                @if(isset($options))
                                @foreach($options['branch'] as $row)
                                <option value="{{ $row }}">{{ $row }}</option>
                                @endforeach
                                @endif

                            </select>
                        </div>
                        <noscript><input type=”submit” value=”Submit”></noscript>
                        {!! Form::close() !!}

                        <br>

                        {!! Form::open(['route' => 'app_search','method' => 'get']) !!}
                        <div class="dropdown show">
                            <p>จังหวัด :</p>
                            <select name="my_province" id="mySelect" onchange="this.form.submit()" style="width: 100%;">

                                <!-- check request  -->
                                @if(!isset($_REQUEST['my_province']))
                                <option value="" selected>จังหวัดที่ต้องการ</option>
                                <!-- @foreach($ent_post as $row)
                                <option name="query">{{ $row['_source']['my_province'] }}</option>
                                @endforeach -->
                                @else
                                <option value="{{ $_REQUEST['my_province'] }}" selected>{{ $_REQUEST['my_province'] }}</option>
                                @endif

                                @if(isset($options))
                                @foreach($options['my_province'] as $row)
                                <option value="{{ $row }}">{{ $row }}</option>
                                @endforeach
                                @endif

                            </select>
                        </div>
                        <noscript><input type=”submit” value=”Submit”></noscript>
                        {!! Form::close() !!}

                        @endif

                    </div>
                </div>
            </div>

            <!-- main -->
            <div class="col-md-8">

                @if(isset($ent_post))
                @foreach($ent_post as $result)

                <div class="card">
                    <div class="card-body">

                        <img src="{{ asset('uploads/profile/'.$result['_source']['profile']) }}" alt="profile" width="100" height="100" style="float:left;">

                        <div class="date" style="float: right;">

                            <br><br><br><br><br><br><br><br><br><br><br>

                            <button type="submit" class="btn btn-info" style="margin-left: 0px;" value="{{ $result['_source']['history_id'] }}" onclick="add(value);window.location.reload()">สนใจ</button>

                            <a type="button" href="{{ route('ent.ent_see_detail_history',$result['_source']['history_id']) }}" class="btn btn-primary">ดูรายละเอียด</a>
                        </div>

                        <div class="jobs_detail" style="float: left; width:450px; margin-left: 10px;" align="left">
                            <p>ชื่อ : {{ $result['_source']['first_name'] }}
                                {{ $result['_source']['last_name'] }}
                            </p>
                            <p>คณะ : {{ $result['_source']['university'] }}</p>
                            <p>สาขา : {{ $result['_source']['branch'] }}</p>
                            <p>สถานศึกษา : {{ $result['_source']['university'] }}</p>
                            <p>ประสบการณ์ทำงาน : {{ $result['_source']['experience'] }}</p>
                        </div>
                    </div>
                </div>
                <br>
                @endforeach
                @endif

            </div>
        </div>
    </div>

    <script>
        function add(history_id) {
            console.log('ok');
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", "/interest_app?id=" + history_id, true);
            xmlhttp.send();
        }
    </script>
</body>


@endsection