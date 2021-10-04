@extends('applicants.layout')
@section('title','หางาน')

@section('content')




<body>
    <div class="container" style="margin-top: 50px;">
        <div class="row">

            <!-- text search -->
            <div class="col-md-12" style="margin-top:20px;">
                {!! Form::open(['route' => 'search','method' => 'get']) !!}
                <div class="input-group" style="margin-top:20px;">
                    <input type="text" value="{{$query}}" class="form-control" style="width: 100%;" name="query" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="search jobs...">
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
                        รายละเอียดการค้นหา
                    </div>

                    <div class="card-body">
                        @if(isset($ent_post))
                        {!! Form::open(['route' => 'search','method' => 'get']) !!}
                        <div class="dropdown show">
                            <p>ตำแหน่งงาน :</p>
                            <select name="jobs_name" id="mySelect" onchange="this.form.submit()" style="width: 100%;">

                                <!-- check request  -->
                                @if(!isset($_REQUEST['jobs_name']))
                                <option value="" selected>ตำแหน่งงานที่ต้องการ</option>
                                <!-- @foreach($ent_post as $row)
                                <option name="query">{{ $row['_source']['jobs_name'] }}</option>
                                @endforeach -->
                                @else
                                <option value="{{ $_REQUEST['jobs_name'] }}" selected>{{ $_REQUEST['jobs_name'] }}</option>
                                @endif

                                @if(isset($options))
                                @foreach($options['jobs_name'] as $row)
                                <option value="{{ $row }}">{{ $row }}</option>
                                @endforeach
                                @endif

                            </select>
                        </div>
                        <noscript><input type=”submit” value=”Submit”></noscript>
                        {!! Form::close() !!}

                        <br>

                        {!! Form::open(['route' => 'search','method' => 'get']) !!}
                        <div class="dropdown show">
                            <p>ประเภทงาน :</p>
                            <select name="jobs_type" id="mySelect" onchange="this.form.submit()" style="width: 100%;">

                                <!-- check request  -->
                                @if(!isset($_REQUEST['jobs_type']))
                                <option value="" selected>ประเภทงานที่ต้องการ</option>
                                <!-- @foreach($ent_post as $row)
                                <option name="query">{{ $row['_source']['jobs_type'] }}</option>
                                @endforeach -->
                                @else
                                <option value="{{ $_REQUEST['jobs_type'] }}" selected>{{ $_REQUEST['jobs_type'] }}</option>
                                @endif

                                @if(isset($options))
                                @foreach($options['jobs_type'] as $row)
                                <option value="{{ $row }}">{{ $row }}</option>
                                @endforeach
                                @endif

                            </select>
                        </div>
                        <noscript><input type=”submit” value=”Submit”></noscript>
                        {!! Form::close() !!}

                        <br>

                        {!! Form::open(['route' => 'search','method' => 'get']) !!}
                        <div class="dropdown show">
                            <p>ชื่อบริษัท :</p>
                            <select name="jobs_name_company" id="mySelect" onchange="this.form.submit()" style="width: 100%;">

                                <!-- check request  -->
                                @if(!isset($_REQUEST['jobs_name_company']))
                                <option value="" selected>ประเภทงานที่ต้องการ</option>
                                <!-- @foreach($ent_post as $row)
                                <option name="query">{{ $row['_source']['jobs_name_company'] }}</option>
                                @endforeach -->
                                @else
                                <option value="{{ $_REQUEST['jobs_name_company'] }}" selected>{{ $_REQUEST['jobs_name_company'] }}</option>
                                @endif

                                @if(isset($options))
                                @foreach($options['jobs_name_company'] as $row)
                                <option value="{{ $row }}">{{ $row }}</option>
                                @endforeach
                                @endif

                            </select>
                        </div>
                        <noscript><input type=”submit” value=”Submit”></noscript>
                        {!! Form::close() !!}

                        <br>

                        {!! Form::open(['route' => 'search','method' => 'get']) !!}
                        <div class="dropdown show">
                            <p>วันที่ลงประกาศ :</p>
                            <select name="start_post" id="mySelect" onchange="this.form.submit()" style="width: 100%;">

                                <!-- check request  -->
                                @if(!isset($_REQUEST['start_post']))
                                <option value="" selected>ประเภทงานที่ต้องการ</option>
                                <!-- @foreach($ent_post as $row)
                                <option name="query">{{ $row['_source']['start_post'] }}</option>
                                @endforeach -->
                                @else
                                <option value="{{ $_REQUEST['start_post'] }}" selected>{{ $_REQUEST['start_post'] }}</option>
                                @endif

                                @if(isset($options))
                                @foreach($options['start_post'] as $row)
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
            <!-- display text search and dropdown -->
            <div class="col-md-8">

                <!-- display dropdown and data from elasticsearch kibana -->
                @if(isset($ent_post))
                @foreach($ent_post as $ent)
                <div class="card">
                    <div class="card-body">

                        <img src="{{ asset('uploads/logo/'.$ent['_source']['logo']) }}" alt="Lamp" width="100" height="100" style="float:left;">

                        <div class="date" style="float: right;">
                            <p>{{ $ent['_source']['start_post'] }} ถึง {{ $ent['_source']['stop_post'] }}</p>

                            <br><br><br><br><br><br><br><br><br><br><br>
                            <button type="submit" class="btn btn-warning" style="margin-left: 0px;" name="action_type" value="{{ $ent['_source']['jobs_id'] }}" onclick="addmise(value);window.location.reload()">สนใจ</button>

                            <a type="button" style="margin-left: 0px;" href="{{ route('applicants.applicants_see_detail_search',$ent['_source']['jobs_id']) }}" class="btn btn-primary">ดูรายละเอียด</a>
                        </div>

                        <div class="jobs_detail" style="float: left; width:450px;" align="left">
                            <p>ตำแหน่งงาน : {{ $ent['_source']['jobs_name'] }}</p>
                            <p>ชื่อบริษัท : {{ $ent['_source']['jobs_name_company'] }}</p>
                            <p>ที่อยู่ : {{ $ent['_source']['jobs_address'] }}</p>
                            <p>จำนวนที่รับ : {{ $ent['_source']['jobs_quantity'] }}</p>
                            <p>จำนวนที่รับ : {{ $ent['_source']['jobs_salary'] }}</p>
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
        function addmise(jobs_id) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", "/applicants/add_interest_jobs?id=" + jobs_id, true);
            xmlhttp.send();
        }
    </script>
</body>

@endsection