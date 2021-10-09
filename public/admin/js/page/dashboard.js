$("#canvas-generator").hide();

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





function createMask(){
    $('#canvas-mask').show();
    var mask = $('#canvas-mask');
    var height = $("#download-view").height();
    var width = $(".content").width();

    mask.css('height', 2878);
    mask.css('width', width);
}


function DownloadReportData(id_respondent){
    createMask();
    var version = 1;
    $('#download-view').html("");
    

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url : '/download-report',
        data : {
            id_respondent : id_respondent,
        },
        dataType : 'html',
        type : 'get',
        success : function(respon){
            $("#canvas-generator").show();

            let reg = /<div hidden>.*?<\/div>/g; 
            let result = respon.replace(reg, "");

            // console.log(result);
            $('#download-view').html(result);


            // const dataChart = $("#dataChart").val();
            // const dataPage = $("#dataPage").val();

            // const pageJson = JSON.parse(dataPage);



            $("input.masterChart").each(function(){
              // var idInput = $(this).attr('id'); 
              var name = $(this).attr('name'); 
              var label = $('#label'+name).val(); 
              var data = $(this).val(); 

              // console.log(name);
              // console.log(label[0]);
              // console.log(data[1]);


              arrLabel = label.split(",");
              arrData = data.split(",");
              Chart.defaults.font.size = 20;
              new Chart(document.getElementById(name), {
                type: 'radar',
                data: {
                  labels: arrLabel,
                  datasets: [{
                    label: name,
                    data: arrData,
                  }],
                },
                options: {
                    tooltips: {
                        callbacks: {
                          label: function(tooltipItem, data) {
                            return data.datasets[tooltipItem.datasetIndex].label + ": " + tooltipItem.yLabel;
                          }
                        }
                    },
                    scales: {
                      r: {
                        pointLabels: {
                          font: {
                            size: 14
                          }
                        },

                            ticks: {
                                beginAtZero: true,
                                font: {
                                    size: 16
                                }
                            },
                      },

                    },
                     legend: {
                        font: {
                            size: 18
                        }
                    },
                },

                plugins: {
                    legend: {
                        labels: {
                            font: {
                                size: 14
                            }
                        }
                    }
                }
              });


            });




            // console.log(respon);
            html2canvas(document.getElementById('canvas-generator'), {
                onrendered: function (canvas) {
                    img = canvas.toDataURL("image/jpg"); //image data of canvas

                    $("#chart-image").attr('src');

                    console.log(img);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });                    
                    $.ajax({
                        type:'POST',
                        url: '/upload-images',
                        data: {img : img, id_respondent: id_respondent, version : version},
                        // contentType: false,
                        // processData: false,
                        dataType : 'html',
                        success: function(response){
                            // console.log(response);
                            $("#canvas-generator").hide();
                            $('#canvas-mask').hide();

                        }
                    });


                }
            });

          
                var data_type = 'data:application/vnd.ms-excel';
                var table_div = document.getElementById('download-report');
                var table_html = table_div.outerHTML.replace(/ /g, '%20');

                var a = document.createElement('a');
                a.href = data_type + ', ' + table_html;
                a.download = 'report_responden_id_'+id_respondent+'_version_'+version+'.xls';
                a.click();
        



/*                var fileName = 'report_responden_id_'+id_respondent;
                var fileType = "xlsx";

                var table = document.getElementById("download-report");
                var wb = XLSX.utils.table_to_book(table, {sheet: "Sheet JS"});
                return XLSX.writeFile(wb, null || fileName + "." + (fileType || "xlsx"));*/


        }
    })

}


function DownloadReportDataV2(id_respondent){
    createMask();
    var version = 2;
    $('#download-view').html("");


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url : '/download-report-next',
        data : {
            id_respondent : id_respondent,
        },
        dataType : 'html',
        type : 'get',
        success : function(respon){
            $("#canvas-generator").show();

            let reg = /<div hidden>.*?<\/div>/g; 
            let result = respon.replace(reg, "");

            // console.log(result);
            $('#download-view').html(result);


            // const dataChart = $("#dataChart").val();
            // const dataPage = $("#dataPage").val();

            // const pageJson = JSON.parse(dataPage);



            $("input.masterChart").each(function(){
              // var idInput = $(this).attr('id'); 
              var name = $(this).attr('name'); 
              var label = $('#label'+name).val(); 
              var data = $(this).val(); 

              // console.log(name);
              // console.log(label[0]);
              // console.log(data[1]);


              arrLabel = label.split(",");
              arrData = data.split(",");
              Chart.defaults.font.size = 20;
              new Chart(document.getElementById(name), {
                type: 'radar',
                data: {
                  labels: arrLabel,
                  datasets: [{
                    label: name,
                    data: arrData,
                  }],
                },
                options: {
                    tooltips: {
                        callbacks: {
                          label: function(tooltipItem, data) {
                            return data.datasets[tooltipItem.datasetIndex].label + ": " + tooltipItem.yLabel;
                          }
                        }
                    },
                    scales: {
                      r: {
                        pointLabels: {
                          font: {
                            size: 14
                          }
                        },

                            ticks: {
                                beginAtZero: true,
                                font: {
                                    size: 16
                                }
                            },
               

                      },



                    },
                     legend: {
                        font: {
                            size: 18
                        }
                    },
                },

                plugins: {
                    legend: {
                        labels: {
                            font: {
                                size: 14
                            }
                        }
                    }
                }
              });


            });




            // console.log(respon);
            html2canvas(document.getElementById('canvas-generator'), {
                onrendered: function (canvas) {
                    img = canvas.toDataURL("image/jpg"); //image data of canvas

                    $("#chart-image").attr('src');

                    // console.log(img);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });                    
                    $.ajax({
                        type:'POST',
                        url: '/upload-images',
                        data: {img : img, id_respondent: id_respondent, version : version},
                        // contentType: false,
                        // processData: false,
                        dataType : 'html',
                        success: function(response){
                            console.log(response);
                            $("#canvas-generator").hide();
                            $('#canvas-mask').hide();

                        }
                    });


                }
            });

          
                var data_type = 'data:application/vnd.ms-excel';
                var table_div = document.getElementById('download-report');
                var table_html = table_div.outerHTML.replace(/ /g, '%20');

                var a = document.createElement('a');
                a.href = data_type + ', ' + table_html;
                a.download = 'report_responden_id_'+id_respondent+'_version_'+version+'.xls';
                a.click();
        



/*                var fileName = 'report_responden_id_'+id_respondent;
                var fileType = "xlsx";

                var table = document.getElementById("download-report");
                var wb = XLSX.utils.table_to_book(table, {sheet: "Sheet JS"});
                return XLSX.writeFile(wb, null || fileName + "." + (fileType || "xlsx"));*/


        }
    })





}



function draw(id, point, lable) {
        console.log(id);
        console.log(point);
        console.log(lable);
            new Chart(document.getElementById(id), {
              type: 'radar',
              data: {
                labels: lable,
                datasets: [{
                  label: id,
                  data: point,
                }],
              },
              options: {
                tooltips: {
                  callbacks: {
                    label: function(tooltipItem, data) {
                      return data.datasets[tooltipItem.datasetIndex].label + ": " + tooltipItem.yLabel;
                    }
                  }
                }
              }
            });

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
                return ' <div class="row justify-content-center"> <div class="col" style="text-align:center"> <a href="javascript:void(0)" style="color:black" onclick="DetailReportData('+data+')"><i class="fa fa-eye"></i></a> |  <a href="javascript:void(0)" style="color:black" onclick="DownloadReportData('+data+')" title="Report V1"><i class="fa fa-download"></i></a> | <a href="javascript:void(0)" style="color:black" onclick="DownloadReportDataV2('+data+')" title="Report V2"><i class="fa fa-download"></i></a></div></div>';
            }
        },
        ],
    });




})
