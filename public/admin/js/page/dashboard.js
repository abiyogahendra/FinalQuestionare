


function DetailReportData(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url : '/index-modal-report',
        data : {
            id_respondent : id,
        },
        dataType : 'html',
        type : 'get',
        success : function(respon){
            $('#content_modal').append(respon);
            $('.master_modal').modal('show'); 
        }
    })


}


$(document).ready(function(){
    $('#report-table').DataTable({
        ajax : {
            url : '/data-report-admin',
            dataSrc : ''
            },
            "columnDefs": [ 
            {"targets": 0,
                "data": 0,
                "render": function ( data, type, row, meta ) {
                return '<div class="row center"><div class="col">'+data+'</div></div>';
                }
            },
            {"targets": 1,
                "data": 1,
                "render": function ( data, type, row, meta ) {
                return '<div class="row center"><div class="col">'+data+'</div></div>';
                }
            },
            {"targets": 2,
                "data": 2,
                "render": function ( data, type, row, meta ) {
                return '<div class="row center"><div class="col">'+data+'</div></div>';
                }
            },
            {"targets": 3,
                "data": 3,
                "render": function ( data, type, row, meta ) {
                return '<div class="row center"><div class="col">'+data+'</div></div>';
                }
            },
            {"targets": 4,
                "data": 4,
                "render": function ( data, type, row, meta ) {
                return '<div class="row center"><div class="col">'+data+'</div></div>';
                }
            },
            {"targets": 5,
                "data": 5,
                "render": function ( data, type, row, meta ) {
                return '<div class="row center"><div class="col">'+data+'</div></div>';
                }
            },
            {"targets": 6,
                "data": 6,
                "render": function ( data, type, row, meta ) {
                return '<div class="row center"><div class="col">'+data+'</div></div>';
                }
            },
            {"targets": 7,
                "data": 7,
                "render": function ( data, type, row, meta ) {
                return '<div class="row center"><div class="col">'+data+'</div></div>';
                }
            },
            {"targets": 8,
                "data": 0,
                "render": function ( data, type, row, meta ) {
                return ' <div class="row justify-content-center"> <div class="col" style="text-align:center"> <a href="javascript:void(0)" style="color:black" onclick="DetailReportData('+data+')"><i class="fa fa-eye"></i></a> </div></div>';
            }
        },
            
        ],
    });
})