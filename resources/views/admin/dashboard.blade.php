@extends ('master.admin-master')

@section ('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
                                                    <th>Role</th>
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
    <div id="download-view" style="height: 0; overflow: auto;"></div>



@endsection()

@section('custom_head')

@endsection


@section('custom_script')
    <script src="{{asset('admin/js/chart.js')}}"></script>
    <script src="{{asset('admin/js/html2canvas.js')}}"></script>
    <script src="{{asset('admin/js/page/dashboard.js')}}"></script>
    <script src="{{asset('admin/js/excel/xlsx.full.min.js')}}"></script>
    <script src="{{asset('admin/js/excel/shim.min.js')}}"></script>
    
    <script src="{{asset('admin/js/excel/Blob.js')}}"></script>
    <script src="{{asset('admin/js/excel/FileSaver.js')}}"></script>
   

@endsection()