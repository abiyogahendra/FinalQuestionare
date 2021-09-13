<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>Admin | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.css" integrity="sha512-9iWaz7iMchMkQOKA8K4Qpz6bpQRbhedFJB+MSdmJ5Nf4qIN1+5wOVnzg5BQs/mYH3sKtzY+DOgxiwMz8ZtMCsw==" crossorigin="anonymous" />
    <!-- material dashboard template -->
    <link href="{{asset('/admin/css/material-dashboard.css')}}" rel="stylesheet"/>
    <!-- dataTable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css"> 
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css"> 
    <!-- custom responsive css -->
    <link rel="stylesheet" href="{{asset('login/css/responsive/yobri-responsive.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/8365b93ec9.css">
    <script src="https://use.fontawesome.com/8365b93ec9.js"></script>
    <script src="https://kit.fontawesome.com/8d88473a47.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body class="dark-edition">
    <div class="wrapper ">
        @include('master.header.admin-header')
        <div class="main-panel">
        <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand" href="javascript:void(0)">Dashboard</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                </div>
            </nav>
        <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid data_masuk" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @yield('content')
                </div>
            </div>
            @include('master.modal.modal-master')
            @include('master.footer.admin-footer')
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script src="{{asset('/admin/js/core/popper.min.js')}}"></script>
    <script src="{{asset('/admin/js/core/bootstrap-material-design.min.js')}}"></script>
    <!-- <script src="{{asset('/admin/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script> -->
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{asset('/admin/js/material-dashboard.js?v=2.1.0')}}"></script>
    <!-- datatable   -->
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
    @yield('custom_script')  

    <!-- control page and data table-->
    <script src="{{asset('/admin/js/page/page.js')}}"></script>

</body>
</html>