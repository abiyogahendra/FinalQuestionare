<input id="chartTitle" type="text" name="" value="{{ $resultTitle }}">
<input id="chartTotal" type="text" name="" value="{{ $resultTotal }}">

<div id="chartView" class="col-md-8 row" style="height: 200px;">
    
        <div class="col-md-4" style=" width: 250px; background: #fff; padding:0px">
            <canvas id="myChart" width="250" height="300" style=" width: 250px!important;"></canvas>
        </div>
        
        <div class="col-md-6" style=" background: #fff; padding:0px">
            <ul id="chartLegend" style="margin: 15% 0%; padding: 0px;"></ul>
        </div>
  
</div>


<style type="text/css">
    #chartLegend{
        list-style: none;
    }         
    .ssesuai{
        padding: 5px 20px;
        background: rgba(153, 102, 255, 0.2);
        border: solid 2px rgba(153, 102, 255, 1);
        margin: 0px 10px;;
    }

    .sesuai{
        padding: 5px 20px;
        background: rgba(54, 162, 235, 0.2);
        border: solid 2px rgba(54, 162, 235, 1);
        margin: 0px 10px;;
    }
    .normal{
        padding: 5px 20px;
        background: rgba(75, 192, 192, 0.2);
        border: solid 2px rgba(75, 192, 192, 1);
        margin: 0px 10px;;
    }
    .ts{
        padding: 5px 20px;
        background: rgba(255, 206, 86, 0.2);
        border: solid 2px rgba(255, 206, 86, 1);
        margin: 0px 10px;;
    }
    .sts{
        padding: 5px 20px;
        background: rgba(255, 99, 132, 0.2);
        border: solid 2px rgba(255, 99, 132, 1);
        margin: 0px 10px;;
    }

</style>


<div hidden> {{ $setColSpanValue = 2 }} {{ $setColSpanHead = 3 }} @if( $comment->count() > 0) {{ $setColSpanValue = 3 }} {{ $setColSpanHead = 4 }} @endif </div>

<table border="1" id="download-report">
    <thead>
        <tr>
            <th colspan="{{ $setColSpanHead }}"> Info Respondent</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
               <b>Nama </b>
            </td>
            <td colspan="{{ $setColSpanValue }}">{{ $respondent[0]->name }}</td>
        </tr>
        <tr>
            <td>
               <b>Jenis Kelamin </b>
            </td>
            <td colspan="{{ $setColSpanValue }}">{{ $respondent[0]->jenkel }}</td>
        </tr>
        <tr>
            <td>
               <b>Usia </b>
            </td>
            <td colspan="{{ $setColSpanValue }}">{{ $respondent[0]->umur }}</td>
        </tr>
        <tr>
            <td>
               <b>Pekerjaan / Pengalaman</b>
            </td>
            <td colspan="{{ $setColSpanValue }}">{{ $respondent[0]->pekerjaan }} / 


                {{ $respondent[0]->pengalaman }}</td>
        </tr>
        <tr>
            <td>
               <b>Phone </b>
            </td>
            <td colspan="{{ $setColSpanValue }}">{{ $respondent[0]->phone_number }}</td>
        </tr>
        <tr>
            <td>
               <b>Email </b>
            </td>
            <td colspan="{{ $setColSpanValue }}">{{ $respondent[0]->email }}</td>
        </tr>
        <tr><td colspan="{{ $setColSpanHead }}"></td></tr>
    </tbody>

        <thead>
        <tr>
            <th colspan="{{ $setColSpanHead }}"> Info Questionnaire</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
               <b>Tipe Questionnaire </b>
            </td>
            <td colspan="{{ $setColSpanValue }}">{{ $respondent[0]->role }}</td>
        </tr>
        <tr>
            <td>
               <b>Create Date</b>
            </td>
             <td colspan="{{ $setColSpanValue }}">{{ $respondent[0]->created_at }}</td>
        </tr>
        <tr>
            <td>
               <b>Update Date</b>
            </td>
             <td colspan="{{ $setColSpanValue }}">{{ $respondent[0]->updated_at }}</td>
        </tr>
        <tr>
            <td colspan="{{ $setColSpanHead }}" style="height:200px">
                <center>
                <img download="chart.png" src="{{ URL::to('/') }}/admin/img/chart/respondent_{{ $respondent[0]->id_respondent }}.jpg">
                </center>
            </td>
        </tr>
    </tbody>
        <thead>
            <tr><th colspan="{{ $setColSpanHead }}">
                Result
            </th></tr>
            <tr class="center">
                <th>Category</th>
                <th>Pertanyaan</th>
                <th>Jawaban</th>
                @if( $comment->count() > 0)
                    <!-- <th>cat </th> -->
                    <!-- <th>cat2 </th> -->
                    <th>Comment </th>
                @endif
  
            </tr>
        </thead>
        <tbody>
            @foreach($category as $c)
                <tr> 

                    <td rowspan="{{$c->j_quest}}" >{{$c->name}}</td>

                            @if( $comment->count() > 0 )

   
                                
                                <div hidden>{{ $index = 0 }}</div>
                                @foreach($answer as $a)
                                    @if($a->id_category == $c->id_category)

                                            <td >{{$a->question}}</td>
                                            <td >{{$jawaban[$a->id_question]}}</td> 

                                        @if($index == 0)
                                            @foreach($comment as $com)

                                                @if($c->id_category == $com->id_category)

                                                        <td  rowspan="{{$c->j_quest}}" >{{$com->comment}}
                                                        </td> 
                                                    </tr>
                                                @endif
                                             @endforeach 
                                        @elseif($index > 0)
                                            </tr>
                                        @endif
                                        <div hidden>{{ $index= $index + 1 }}</div>
                                       
                                    @endif
                                @endforeach

                        

      


                            @elseif(  $comment->count()== 0)
                                @foreach($answer as $a)
                                    @if($a->id_category == $c->id_category)
                                        <td>{{$a->question}}</td>
                                        <td>{{$jawaban[$a->id_question]}}</td>
                                        </tr>
                                    @endif
                                @endforeach


                            @endif

                </tr>
            @endforeach
        </tbody>
</table>
