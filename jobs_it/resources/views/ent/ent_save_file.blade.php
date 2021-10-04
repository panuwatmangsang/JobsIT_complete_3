@extends('ent.layout')
@section('title','ยืนยันผู้สมัคร')

@section('content')

<body>
    <div class="container ">
        <div class="row">

            <div class="col-mb-3 offset-md-5" style="margin-top: 25%;">
                <h1>ยืนยันการเพิ่ม</h1>
                <form action="{{ route('ent_update_save_file') }}" method="POST">
                    @csrf
                    <input type="hidden" name="myjobs_id" value="{{$data['myjobs_id']}}">
                    <input type="hidden" name="a_id" value="{{$data['a_id']=3}}">

                    <a class="btn btn-danger" href="{{ route('ent_check_app') }}" class="btn btn-danger" role="button">ยกเลิก</a>
                    <button type="submit" class="btn btn-success" style="float:right;width:35%">ยืนยัน</button>
                </form>

            </div>

        </div>

    </div>

</body>
@endsection