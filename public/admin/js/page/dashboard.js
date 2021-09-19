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
            console.log(valueArr);

            var total = 0;
            for (var i = 0; i < valueArr.length; i++) {
                var valueInt = parseInt(valueArr[i]);
                total=total+valueInt;
                console.log("total : "+valueInt);
            }
            

            var percentArr = [];
            for (var i = 0; i < valueArr.length; i++) {
               console.log(total);
                var valueInt = parseInt(valueArr[i]);
                console.log(valueInt);
                var percentResult = Math.round((valueInt*100)/total);
                console.log("percent"+percentResult);
                percentArr.push(percentResult);

            }
            console.log(percentArr);
            // var legendArr = [];
            var legendHtml =  "";
            for (var i = 0; i < labelArr.length; i++) {
                // legendArr.push(labelArr[i]+" : "+percentArr[i]);
                if (i == 0) {
                    legendHtml = legendHtml+"<li><label class='ssesuai'></label>"+labelArr[i]+" : "+percentArr[i]+"%</li>";
                }else if(i == 1){
                    legendHtml = legendHtml+"<li><label class='sesuai'></label>"+labelArr[i]+" : "+percentArr[i]+"%</li>";
                }else if(i == 2){
                    legendHtml = legendHtml+"<li><label class='normal'></label>"+labelArr[i]+" : "+percentArr[i]+"%</li>";
                }else if(i == 3){
                    legendHtml = legendHtml+"<li><label class='ts'></label>"+labelArr[i]+" : "+percentArr[i]+"%</li>";
                }else if(i == 4){
                    legendHtml = legendHtml+"<li><label class='sts'></label>"+labelArr[i]+" : "+percentArr[i]+"%</li>";

                }
                // legendHtml = legendHtml+"<li><label></label>"+labelArr[i]+" : "+percentArr[i]+"</li>";

            }

            $("#chartLegend").html(legendHtml);


            myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    // labels: labelArr,
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
                        borderWidth: 1,
                    }]
                },
                options : {
                    legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%> : <%=datasets[i].points[datasets[i].points.length-1].value%><%}%></li><%}%></ul>"
                    
                },
           
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