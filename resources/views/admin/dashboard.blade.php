@extends ('master.admin-master')

@section ('content')
    <div class="row data-content">
        <div class="col">
            <div class="row history-user">
                <div class="col">
                    <div class="card">
                        <div class="card bg-white color-black" id="card-master">
                            <div class="card-header card-header-info">
                                <h4 class="card-title">Data Admin</h4>
                                <p class="card-category">Berikut adalah data laporan pengisian kuisioner</p>
                            </div>
                            <div class="card-body ">
                                <div class="table">
                                    <table class="table table-bordered fblack table-hover" id="report-table">
                                            <thead>
                                                <tr class="center">
                                                    <th>No. ID</th>
                                                    <th>Nama</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Umur</th>
                                                    <th>Email</th>
                                                    <th>No. Hp</th>
                                                    <th>Pekerjaan</th>
                                                    <th>Pengalaman</th>
                                                    <th>Option</th>
                                                </tr>
                                            </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

@endsection()

@section('custom_head')

@endsection


@section('custom_script')
    <script src="{{asset('admin/js/page/dashboard.js')}}"></script>

@endsection()