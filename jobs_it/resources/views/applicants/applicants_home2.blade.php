@extends('applicants.layout2')
@section('title','หน้าหลัก')

@section('content')

<body>
    <div class="container col-12" style="margin-top:100px;">
        <div class="row">
            <div class="col-md-3">
                <a type="button" href="{{ route('applicants_show_history') }}" class="btn btn-success" style="width: 100%;">ฝากประวัติ</a>

                <br><br><br>

                <div class="card-header" style="height:43px; background-color:#607D8B; color:white;">
                    <span class="align-top">รายชื่อของคนที่อาจรู้จัก</span>
                </div>
                <div class="card">
                    <div class="card-body" style="width:100%">
                        <table class="table table-hover">
                            <tr>
                                <td>พันธการ ปิงเมือง</td>
                            </tr>
                            <tr>
                                <td>ภาณุวัฒน์ มังสังข์ </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                @if(isset($jobs))
                @foreach($jobs["hits"]["hits"] as $job)
                <div class="card">
                    <div class="card-body">

                        <img src="{{ asset('uploads/logo/'.$job['_source']['logo']) }}" alt="Lamp" width="100" height="100" style="float:left;">

                        <div class="date" style="float: right;">
                            <p>{{ $job['_source']['start_post'] }} ถึง {{ $job['_source']['stop_post'] }}</p>

                            <br><br><br><br><br><br><br>

                            <!-- <button type="submit" class="btn btn-warning" style="margin-left: 0px;" name="action_type" value="{{ $job['_source']['jobs_id'] }}" onclick="addmise(value);window.location.reload()">สนใจ</button> -->

                            <a type="button" style="margin-left: 80px;" href="{{ route('see_detail2',$job['_source']['jobs_id']) }}" class="btn btn-primary">ดูรายละเอียด</a>
                        </div>

                        <div class="jobs_detail" style="margin-left: 19px; float: left; width:450px;" align="left">
                            <p>ตำแหน่งงาน : {{ $job['_source']['jobs_name'] }}</p>
                            <p>ชื่อบริษัท : {{ $job['_source']['jobs_name_company'] }}</p>
                            <p>ที่อยู่ : {{ $job['_source']['jobs_address'] }}</p>
                            <p>จำนวนที่รับ : {{ $job['_source']['jobs_quantity'] }}</p>
                            <p>จำนวนที่รับ : {{ $job['_source']['jobs_salary'] }}</p>
                        </div>
                    </div>
                </div>
                <br>
                @endforeach
                @endif
            </div>

            <div class="col-md-3">
                <div class="card-header" style="background-color:#607D8B; color:white;">
                    <span class="align-top">งานยอดนิยม (งานที่มีการสมัครมากที่สุด)</span>
                </div>
                <div class="card">
                    <div class="card-body" style="width:100%;">

                        @if(isset($count_Jobs_list_top))
                        @foreach($count_Jobs_list_top as $row=>$key)

                        <table class="table table-hover">
                            <tr>{{ $row }} {{ $key }}</tr>
                        </table>

                        @endforeach
                        @endif

                    </div>
                </div>

                <br>

                <div class="card-header" style="background-color:#607D8B; color:white;">
                    <span class="align-top">งานที่ไม่นิยม (งานที่มีการสมัครน้อยที่สุด)</span>
                </div>
                <div class="card">
                    <div class="card-body" style="width:100%;">

                        @if(isset($count_Jobs_list_less))
                        @foreach($count_Jobs_list_less as $row=>$key)

                        <table class="table table-hover">
                            <tr>{{ $row }} {{ $key }}</tr>
                        </table>

                        @endforeach
                        @endif

                    </div>
                </div>
            </div>

        </div>
        <br>
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