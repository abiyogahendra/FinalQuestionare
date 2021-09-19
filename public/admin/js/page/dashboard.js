function DetailReportData(id){
     $('#content_modal').html("");
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


function DownloadReportData(id){
     $('#download-view').html("");

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url : '/download-report',
        data : {
            id_respondent : id,
        },
        dataType : 'html',
        type : 'get',
        success : function(respon){

            let reg = /<div hidden>.*?<\/div>/g; 
            let result = respon.replace(reg, "");

            console.log(result);
            $('#download-view').html(result);


            const label = $("#chartTitle").val();
            const value = $("#chartTotal").val();
            var ctx = document.getElementById('myChart');

            var myChart = new Chart(ctx, { type: 'pie' });

            myChart.destroy();
            // myChart.destroy();
            const labelArr = label.split(",");
            const valueArr = value.split(",");
            // console.log(myArr);

            var options = {
                tooltips: {
                    enabled: false
                },
                plugins: {
                    datalabels: {
                        formatter: (value, ctx) => {
                            let sum = 0;
                            let dataArr = ctx.chart.data.datasets[0].data;
                            dataArr.map(data => {
                                sum += data;
                            });
                            let percentage = (value*100 / sum).toFixed(2)+"%";
                            return percentage;
                        },
                        color: '#fff',
                    }
                }
            };



            myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labelArr,
                    datasets: [{
                        label: '# of Votes',
                        data: valueArr,
                        backgroundColor: [
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(255, 99, 132, 0.2)'
                        ],
                        borderColor: [
                            'rgba(153, 102, 255, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(255, 99, 132, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options : options,
           
            });






            // console.log(respon);
            html2canvas(document.getElementById("chartView"), {
                onrendered: function (canvas) {
                    var img = canvas.toDataURL("image/jpg"); //image data of canvas


                    // console.log(img);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });                    
                    $.ajax({
                        type:'POST',
                        url: '/upload-images',
                        data: {img : img, id_respondent: id},
                        // contentType: false,
                        // processData: false,
                        dataType : 'html',
                        success: function(response){
                            console.log(response);
                        }
                    });


                }
            });





          
                var data_type = 'data:application/vnd.ms-excel';
                var table_div = document.getElementById('download-report');
                var table_html = table_div.outerHTML.replace(/ /g, '%20');

                var a = document.createElement('a');
                a.href = data_type + ', ' + table_html;
                a.download = 'report_responden_id_'+id+'.xls';
                a.click();
        
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
            {"targets": 7,
                "data": 7,
                "render": function ( data, type, row, meta ) {
                return '<div class="row center"><div class="col">'+data+'</div></div>';
                }
            },
            {"targets": 9,
                "data": 9,
                "render": function ( data, type, row, meta ) {
                return ' <div class="row justify-content-center"> <div class="col" style="text-align:center"> <a href="javascript:void(0)" style="color:black" onclick="DetailReportData('+data+')"><i class="fa fa-eye"></i></a> |  <a href="javascript:void(0)" style="color:black" onclick="DownloadReportData('+data+')"><i class="fa fa-download"></i></a></div></div>';
            }
        },
            
        ],
    });
})