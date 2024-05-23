@extends('dashboard.temp.layout')

@section('page_title','نسخه احتياطيه')

@section('action')

<a class="dropdown-item" href="{{ url('backup/make_backup') }}"><i class="mdi mdi-backup-restore"></i> انشاء نسخه احتياطيه من ملفات المشروع والداتابيز</a>
@endsection


@section('content')
<!-- start page title -->
 <div class="row align-items-center">
    <div class="col-sm-6">
        <div class="page-title-box">
            {{-- <h4 class="font-size-18">Our Work</h4> --}}
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">الرئيسيه</a></li>
                <li class="breadcrumb-item active">النسخه الاحتياطيه</li>
             </ol>
        </div>
    </div>
    {{-- <div class="col-sm-6">
            <div class="float-right d-none d-md-block">
                <div>
                    <a class="btn-primary create" href="{{ route('admin.make_backup') }}">Create Backup</a></li>
                </div>
            </div>
        </div> --}}
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                {{-- <h4 class="card-title">Backup History</h4> --}}
                <p class="card-title-desc">
                    <a class="dropdown-item" style="    background: #626ed4;
                    width: 400px;
                    text-align:center;
                    margin: auto;
                    border-radius: 5px;
                    color: #f2f2f2;" href="{{ url('backup/make_backup') }}">
                        <i class="mdi mdi-backup-restore"></i> انشاء نسخه احتياطيه من المشروع وملفات الداتابيز</a>
                </p>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>اسم الملف</th>
                            <th>التاريخ والوقت</th>
                            <th>الحجم</th>
                            <th>الاجرائات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($backups as $file)
                        <tr>
                            <th>{{ $file['file_name'] }}</th>
                            <th>{{ $file['file_date'] }}</th>
                            <th>{{ round(($file['file_size'] /  1048576), 2) }} MB</th>
                            <th>
                                <a title="download" href="{{ url('/backup/download/'.$file['file_path']) }}" class="btn btn-icon btn-success text-white mx-1"><i class="mdi mdi-download"></i></a>

                                <a title="delete" onclick="return confirm('Are you sure delete?')" href="{{ url('/backup/delete/'.$file['file_path']) }}" class="btn btn-icon btn-danger text-white mx-1"><i class="mdi mdi-delete-off"></i></a>
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>اسم الملف</th>
                            <th>التاريخ والوقت</th>
                            <th>الحجم</th>
                            <th>الاجرائات</th>
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection
