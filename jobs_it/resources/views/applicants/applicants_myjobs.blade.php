@extends('applicants.layout')
@section('title','งานของฉัน')

@section('content')

<body>
    <div class="container col-12" style="margin-top:100px">
        <div class="row">
            <!-- left side -->
            <div class="col-md-3 left-side" align="center">
                <div class="card">
                    <div class="card-header" style="background-color:#607D8B; color:white;">
                        งานของฉัน
                    </div>
                    <div class="card-body" style="margin:-10px;">
                        <button class="btn btn-danger" style="width: 101%;" onclick="window.location.replace('/applicants/applicants_myjobs?type=all')" value="all">งานทั้งหมด
                        </button>
                    </div>
                    <div class="card-body" style="margin:-10px;">
                        <button class="btn btn-danger" style="width: 101%;" onclick="window.location.replace('/applicants/applicants_myjobs?type=FavoriteJobs')" value="FavoriteJobs">งานที่สนใจ
                        </button>
                    </div>
                    <div class="card-body" style="margin:-10px;">
                        <button class="btn btn-danger" style="width: 101%;" onclick="window.location.replace('/applicants/applicants_myjobs?type=AppliForm')" value="AppliForm">งานที่สมัคร
                        </button>
                    </div>
                </div>
            </div>



            <!-- main -->
            <div class="col-md-9">

                @if(isset($_REQUEST['type'] ))
                @if($_REQUEST['type']  == 'all')
                <div class="card">
                    <div class="card-header" style="background-color:#607D8B; color:White;">
                        <p class="card-text" style="font-size: 18px;">งานทั้งหมด</p>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered">
                            <tr class="text-center">
                                <td>ตำแหน่งงาน</td>
                                <td>ชื่อบริษัท</td>
                                <td>ที่อยู่</td>
                                <td>จำนวนที่รับ</td>
                                <td>การกระทำ</td>
                            </tr>

                            @if(isset($all))
                            @foreach( $all as $datas)
                            <tr>
                                <td>{{ $datas->myjobs_name }}</td>
                                <td>{{ $datas->myjobs_name_company }}</td>
                                <td>{{ $datas->myjobs_address }}</td>
                                <td>{{ $datas->myjobs_quantity }}</td>
                                <td>
                                    <a type="button" style="margin-left: 0px; width: 100%;" href="{{ route('see_detail_jobs',$datas->myjobs_id) }}" class="btn btn-primary">ดูรายละเอียด</a>

                                    <form action="{{ route('applicants_delete_myjobs', $datas->myjobs_id) }}" method="post">
                                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')" type="submit" style="margin-top: 2px; width: 100%;">ลบ</button>
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @endif

                        </table>

                    </div>
                </div>
                @endif
                @endif

                @if(isset($_REQUEST['type'] ))
                @if($_REQUEST['type'] == 'FavoriteJobs')
                <div class="card" style="margin-top:10ox;">
                    <div class="card-header" style="background-color:#607D8B; color:White;">
                        <p class="card-text" style="font-size: 18px;">งานที่สนใจ</p>
                    </div>
                    <div class="card-body ">
                        <table class="table table-bordered">
                            <tr class="text-center">
                                <td>ตำแหน่งงาน</td>
                                <td>ชื่อบริษัท</td>
                                <td>ที่อยู่</td>
                                <td>จำนวนที่รับ</td>
                                <td>การกระทำ</td>
                            </tr>
                            @if(isset($favoite))
                            @foreach( $favoite as $rows)
                            <tr>
                                <td>{{ $rows->myjobs_name }}</td>
                                <td>{{ $rows->myjobs_name_company }}</td>
                                <td>{{ $rows->myjobs_address }}</td>
                                <td>{{ $rows->myjobs_quantity }}</td>
                                <td>
                                    <a type="button" style="margin-left: 0px; width: 100%;" href="{{ route('see_detail_jobs',$rows->myjobs_id) }}" class="btn btn-primary">ดูรายละเอียด</a>

                                    <form action="{{ route('applicants_delete_myjobs', $rows->myjobs_id) }}" method="post">
                                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')" type="submit" style="margin-top: 2px; width: 100%;">ลบ</button>
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </table>
                    </div>
                </div>
                @endif
                @endif

                @if(isset($_REQUEST['type'] ))
                @if($_REQUEST['type'] == 'AppliForm')
                <div class="card">
                    <div class="card-header" style="background-color:#607D8B; color:White;">
                        <p class="card-text" style="font-size: 18px;">งานที่รอการอนุมัติ</p>
                    </div>
                    <div class="card-body ">
                        <table class="table table-bordered">
                            <tr class="text-center">
                                <td>ตำแหน่งงาน</td>
                                <td>ชื่อบริษัท</td>
                                <td>ที่อยู่</td>
                                <td>จำนวนที่รับ</td>
                                <td>การกระทำ</td>
                            </tr>
                            @if(isset($row))
                            @foreach( $row as $rows)
                            <tr>
                                <td>{{ $rows->myjobs_name }}</td>
                                <td>{{ $rows->myjobs_name_company }}</td>
                                <td>{{ $rows->myjobs_address }}</td>
                                <td>{{ $rows->myjobs_quantity }}</td>
                                <td>
                                    <a type="button" style="margin-left: 0px; width: 100%;" href="{{ route('see_detail_jobs',$rows->myjobs_id) }}" class="btn btn-primary">ดูรายละเอียด</a>

                                    <form action="{{ route('applicants_delete_myjobs', $rows->myjobs_id) }}" method="post">
                                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')" type="submit" style="margin-top: 2px; width: 100%;">ลบ</button>
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </table>
                    </div>
                </div>

                <br>

                <div class="card">
                    <div class="card-header" style="background-color:#607D8B; color:White;">
                        <p class="card-text" style="font-size: 18px;">งานที่ถูกอนุมัติ</p>
                    </div>
                    <div class="card-body ">
                        <table class="table table-bordered">
                            <tr class="text-center">
                                <td>ตำแหน่งงาน</td>
                                <td>ชื่อบริษัท</td>
                                <td>ที่อยู่</td>
                                <td>จำนวนที่รับ</td>
                                <td>การกระทำ</td>
                            </tr>
                            @if(isset($rove))
                            @foreach( $rove as $roves)
                            <tr>
                                <td>{{ $roves->myjobs_name }}</td>
                                <td>{{ $roves->myjobs_name_company }}</td>
                                <td>{{ $roves->myjobs_address }}</td>
                                <td>{{ $roves->myjobs_quantity }}</td>
                                <td>
                                    <a type="button" style="margin-left: 0px; width: 100%;" href="{{ route('see_detail_jobs',$roves->myjobs_id) }}" class="btn btn-primary">ดูรายละเอียด</a>

                                    <form action="{{ route('applicants_delete_myjobs', $roves->myjobs_id) }}" method="post">
                                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')" type="submit" style="margin-top: 2px; width: 100%;">ลบ</button>
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </table>
                    </div>
                </div>

                <br>

                <div class="card">
                    <div class="card-header" style="background-color:#607D8B; color:White;">
                        <p class="card-text" style="font-size: 18px;">งานที่ถูกปฎิเสธ</p>
                    </div>
                    <div class="card-body ">
                        <table class="table table-bordered">
                            <tr class="text-center">
                                <td>ตำแหน่งงาน</td>
                                <td>ชื่อบริษัท</td>
                                <td>ที่อยู่</td>
                                <td>จำนวนที่รับ</td>
                                <td>การกระทำ</td>
                            </tr>
                            @if(isset($rej))
                            @foreach( $rej as $rejs)
                            <tr>
                                <td>{{ $rejs->myjobs_name }}</td>
                                <td>{{ $rejs->myjobs_name_company }}</td>
                                <td>{{ $rejs->myjobs_address }}</td>
                                <td>{{ $rejs->myjobs_quantity }}</td>
                                <td>
                                    <a type="button" style="margin-left: 0px; width: 100%;" href="{{ route('see_detail_jobs',$rejs->myjobs_id) }}" class="btn btn-primary">ดูรายละเอียด</a>

                                    <form action="{{ route('applicants_delete_myjobs', $rejs->myjobs_id) }}" method="post">
                                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')" type="submit" style="margin-top: 2px; width: 100%;">ลบ</button>
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </table>
                    </div>
                </div>
                @endif
                @endif
            </div>
        </div>
    </div>
</body>
@endsection