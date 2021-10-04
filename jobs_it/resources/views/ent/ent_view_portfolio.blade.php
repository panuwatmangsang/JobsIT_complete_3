@extends('ent.layout')
@section('title','แสดงประวัติ')

@section('content')

<body>
    <div class="container col-10" style="margin-top:100px">
        <div class="row justify-content-center">
            <div class="card" style="width: 80%;height:100%">
                <div class="card-header" style="background-color:#E94242; color:White;height:40px;">
                    <p class="card-text" style="font-size: 18px;top:2px;text-align:center">แสดงผลงาน</p>
                </div>

                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="card-body">
                    <form>

                        <!-- ======================== ประวัติส่วนตัว ======================= -->
                        <!-- <div class="head position-relative mt-1">
                            <p class="card-text" style="font-size:18px;">ผลงาน</p>

                        </div> -->
                        
                        <div class="form-row">
                            <iframe src="{{ asset('uploads/portfolio/'.$ent_view_portfolio->portfolio) }}" frameborder="0" width="100%" height="600"></iframe>
                        </div>


                    </form>
                </div>
                <div class="btn">
                    <a href="{{ route('ent_see_detail') }}" class="btn btn-danger" style="float:right; margin-left:10px">ยกเลิก</a>
                </div>
            </div>
        </div>
    </div>

</body>


@endsection