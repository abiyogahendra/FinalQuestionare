@if($comment->count() > 0)   


    <input hidden id="dataPage" type="" name="" value="{{$page}}">
    @foreach($result as $key => $rest)
        <input hidden id="label{{$rest->name}}"  type="" name="{{$rest->name}}" value="{{$rest->title}}">
        <input hidden id="data{{$rest->name}}" class="masterChart" type="" name="{{$rest->name}}" value="{{$rest->rate}}">
    @endforeach

    <div id="canvas-generator" class=" row" style="height: auto; padding: 0px; margin: 0px; width: 1414px; position: absolute; top: 20%; z-index: -99999999">

        @foreach($page as $pages)
            <div id="{{$pages->name}}-Box" class="col-md-4 padding-image" style=" background: #fff; padding: 0 5px">
                <canvas id="{{$pages->name}}" width="250" height="300" style=" width: 250px!important;"></canvas>

                <center>
                <table border="1">
                    <tbody>
                        @if($pages->id_page == $pages->id_page)

                      
                                <tr>  
                                    @foreach($comment as $cm)
                                        @if($pages->id_page == $cm->id_page)
                                    

                                            <td style="font-size:10px; line-height: 12px; font-weight: bold; border:2px solid" ><center><b>{{$cm->name}}</b></center></td>
                                        @endif
                                    @endforeach
                                </tr>
                                <tr>
                                    @foreach($comment as $cm)
                                        @if($pages->id_page == $cm->id_page)
                                            

                                            <td style="font-size:11px; border:2px solid"> <center>{{$cm->rate}}</center></td>
                                        @endif
                                    @endforeach
                                </tr>
                       

                        @endif
                    </tbody>
                </table>
                </center>
            </div>
        @endforeach

    </div>


    <div hidden> {{ $setColSpanValue = 2 }} {{ $setColSpanHead = 3 }} @if( $comment->count() > 0) {{ $setColSpanValue = 3 }} {{ $setColSpanHead = 4 }} @endif </div>

    <table border="1" id="download-report" hidden>
    <tbody>
        @foreach($page as $p)

                @foreach($category as $c)
                    @if($p->id_page == $c->id_page)

                        @if($p->name == $c->name)
                            <tr>
                                <th colspan="10"><h1>{{$p->name}}</h1></th>
                            </tr>
                            <tr>
                                <th colspan="3">{{$c->name}}</th>
                                 <!-- <th>id cat</th> -->

                                <th>5</th>
                                <th>4</th>
                                <th>3</th>
                                <th>2</th>
                                <th>1</th>
                                <th>Rata-Rata</th>
                                <th>Penilan Deskriptif</th>
                            </tr>

                        @elseif($c->name == "Penilaian Umum")
                            <tr>
                                <th colspan="10"><h1>{{$c->name}}</h1></th>
                            </tr>
                            <tr>
                                <th colspan="3">{{$c->name}}</th>
                                 <!-- <th>id cat</th> -->

                                <th>5</th>
                                <th>4</th>
                                <th>3</th>
                                <th>2</th>
                                <th>1</th>
                                <th>Rata-Rata</th>
                                <th>Penilan Deskriptif</th>
                            </tr>

                        @else
                            <tr>
                                <th colspan="3">{{$c->name}}</th>
                                 <!-- <th>id cat</th> -->

                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>

                        @endif

                    @endif



                    <div hidden>{{$index = 0}}</div>
                    @foreach($answer as $a)
                       
                            
                        @if($p->id_page == $c->id_page)
                            @if($p->name == $c->name)
                                @if($a->id_category == $c->id_category)
                                    <tr>
                                    <td>
                                        {{$index = $index +1}}
                                    </td>
                                    <td></td>
                                    <td>{{$a->question}}</td>



                                    @if($a->answer == 5)
                                        <td>5</td><td></td><td></td><td></td><td></td>
                                    @elseif($a->answer == 4)
                                        <td></td><td>4</td><td></td><td></td><td></td>
                                    @elseif($a->answer == 3)
                                        <td></td><td></td><td>3</td><td></td><td></td>
                                    @elseif($a->answer == 2)
                                        <td></td><td></td><td></td><td>2</td><td></td>
                                    @elseif($a->answer == 1)
                                        <td></td><td></td><td></td><td></td><td>1</td>
                                    @endif


                                    <td ></td> 
                                    <td>{{$a->reason}}</td> 
                                    </tr>
                                @endif
                            @else
                                @if($a->id_category == $c->id_category)
                                    <tr>
                                    <td></td>
                                    <td> {{$index = $index +1}}</td>
                                    <td>{{$a->question}}</td>



                                    @if($a->answer == 5)
                                        <td>5</td><td></td><td></td><td></td><td></td>
                                    @elseif($a->answer == 4)
                                        <td></td><td>4</td><td></td><td></td><td></td>
                                    @elseif($a->answer == 3)
                                        <td></td><td></td><td>3</td><td></td><td></td>
                                    @elseif($a->answer == 2)
                                        <td></td><td></td><td></td><td>2</td><td></td>
                                    @elseif($a->answer == 1)
                                        <td></td><td></td><td></td><td></td><td>1</td>
                                    @endif


                                    <td ></td> 
                                    <td>{{$a->reason}}</td> 
                                    </tr>
                                @else
                                   <div hidden> {{$index = 0}}</div>
                                @endif

                            @endif
                        @endif

                    @endforeach


                    @if($p->id_page == $c->id_page)

                        @foreach($comment as $com)
                            @if($c->id_category == $com->id_category)
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td><b>Total</b></td>
                                    <td>{{$com->five}}</td>
                                    <td>{{$com->four}}</td>
                                    <td>{{$com->thre}}</td>
                                    <td>{{$com->two}}</td>
                                    <td>{{$com->one}}</td>
                                    <td>{{$com->rate}}</td>
                                    <td></td>
                                </tr>
                                <tr><td colspan="10"><b>{{$c->name}} Issue</b></td></tr>
                                <tr><td colspan="10">{{$com->comment}}</td></tr>
                                <tr><td colspan="10"></td></tr>
                            @endif
                        @endforeach
                    @endif

                @endforeach

        @endforeach

        <tr>
            <td colspan="10">
                <img id="chart-image" src="{{ URL::to('/') }}/admin/img/chart/respondent_{{ $respondent[0]->id_respondent }}.jpg">
            </td>
        </tr>
        <tr>
            <td colspan="10"></td>
        </tr>


    </tbody>

    </table>




@else


<input hidden id="dataPage" type="" name="" value="{{$page}}">
@foreach($result as $key => $rest)
    <input hidden id="label{{$rest->name}}"  type="" name="{{$rest->name}}" value="{{$rest->title}}">
    <input hidden id="data{{$rest->name}}" class="masterChart" type="" name="{{$rest->name}}" value="{{$rest->rate}}">
@endforeach

<div id="canvas-generator" class=" row" style="height: auto; padding: 0px; margin: 0px; width: 1414px; position: absolute; top: 20%; z-index: -99999999">

    @foreach($page as $pages)
        <div id="{{$pages->name}}-Box" class="col-md-4 padding-image" style=" background: #fff; padding: 0 5px">
            <canvas id="{{$pages->name}}" width="250" height="300" style=" width: 250px!important;"></canvas>

            <center>
            <table border="1">
                <tbody>
                    @if($pages->id_page == $pages->id_page)

                  
                            <tr>  
                                @foreach($category as $cm)
                                    @if($pages->id_page == $cm->id_page)
                                

                                        <td style="font-size:10px; line-height: 12px; font-weight: bold; border:2px solid" ><center><b>{{$cm->name}}</b></center></td>
                                    @endif
                                @endforeach
                            </tr>
                            <tr>
                                @foreach($category as $cm)
                                    @if($pages->id_page == $cm->id_page)
                                        

                                        <td style="font-size:11px; border:2px solid"> <center>{{$cm->rate}}</center></td>
                                    @endif
                                @endforeach
                            </tr>
                   

                    @endif
                </tbody>
            </table>
            </center>
        </div>
    @endforeach

</div>


<div hidden> {{ $setColSpanValue = 2 }} {{ $setColSpanHead = 3 }} @if( $category->count() > 0) {{ $setColSpanValue = 3 }} {{ $setColSpanHead = 4 }} @endif </div>

<table border="1" id="download-report" hidden>
<tbody>
    @foreach($page as $p)

            @foreach($category as $c)
                @if($p->id_page == $c->id_page)

                    @if($p->name == $c->name)
                        <tr>
                            <th colspan="10"><h1>{{$p->name}}</h1></th>
                        </tr>
                        <tr>
                            <th colspan="3">{{$c->name}}</th>
                             <!-- <th>id cat</th> -->

                            <th>5</th>
                            <th>4</th>
                            <th>3</th>
                            <th>2</th>
                            <th>1</th>
                            <th>Rata-Rata</th>
                            <th>Penilan Deskriptif</th>
                        </tr>

                    @elseif($c->name == "Penilaian Umum")
                        <tr>
                            <th colspan="10"><h1>{{$c->name}}</h1></th>
                        </tr>
                        <tr>
                            <th colspan="3">{{$c->name}}</th>
                             <!-- <th>id cat</th> -->

                            <th>5</th>
                            <th>4</th>
                            <th>3</th>
                            <th>2</th>
                            <th>1</th>
                            <th>Rata-Rata</th>
                            <th>Penilan Deskriptif</th>
                        </tr>

                    @else
                        <tr>
                            <th colspan="3">{{$c->name}}</th>
                             <!-- <th>id cat</th> -->

                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>

                    @endif

                @endif



                <div hidden>{{$index = 0}}</div>
                @foreach($answer as $a)
                   
                        
                    @if($p->id_page == $c->id_page)
                        @if($p->name == $c->name)
                            @if($a->id_category == $c->id_category)
                                <tr>
                                <td>
                                    {{$index = $index +1}}
                                </td>
                                <td></td>
                                <td>{{$a->question}}</td>



                                @if($a->answer == 5)
                                    <td>5</td><td></td><td></td><td></td><td></td>
                                @elseif($a->answer == 4)
                                    <td></td><td>4</td><td></td><td></td><td></td>
                                @elseif($a->answer == 3)
                                    <td></td><td></td><td>3</td><td></td><td></td>
                                @elseif($a->answer == 2)
                                    <td></td><td></td><td></td><td>2</td><td></td>
                                @elseif($a->answer == 1)
                                    <td></td><td></td><td></td><td></td><td>1</td>
                                @endif


                                <td ></td> 
                                <td>{{$a->reason}}</td> 
                                </tr>
                            @endif
                        @else
                            @if($a->id_category == $c->id_category)
                                <tr>
                                <td></td>
                                <td> {{$index = $index +1}}</td>
                                <td>{{$a->question}}</td>



                                @if($a->answer == 5)
                                    <td>5</td><td></td><td></td><td></td><td></td>
                                @elseif($a->answer == 4)
                                    <td></td><td>4</td><td></td><td></td><td></td>
                                @elseif($a->answer == 3)
                                    <td></td><td></td><td>3</td><td></td><td></td>
                                @elseif($a->answer == 2)
                                    <td></td><td></td><td></td><td>2</td><td></td>
                                @elseif($a->answer == 1)
                                    <td></td><td></td><td></td><td></td><td>1</td>
                                @endif


                                <td ></td> 
                                <td>{{$a->reason}}</td> 
                                </tr>
                            @else
                               <div hidden> {{$index = 0}}</div>
                            @endif

                        @endif
                    @endif

                @endforeach


                @if($p->id_page == $c->id_page)

                    @foreach($category as $com)
                        @if($c->id_category == $com->id_category)
                            <tr>
                                <td></td>
                                <td></td>
                                <td><b>Total</b></td>
                                <td>{{$com->five}}</td>
                                <td>{{$com->four}}</td>
                                <td>{{$com->thre}}</td>
                                <td>{{$com->two}}</td>
                                <td>{{$com->one}}</td>
                                <td>{{$com->rate}}</td>
                                <td></td>
                            </tr>
                            <tr><td colspan="10"><b>{{$c->name}} Issue</b></td></tr>
                            <tr><td colspan="10">-</td></tr>
                            <tr><td colspan="10"></td></tr>
                        @endif
                    @endforeach
                @endif

            @endforeach

    @endforeach

    <tr>
        <td colspan="10">
            <img id="chart-image" src="{{ URL::to('/') }}/admin/img/chart/respondent_{{ $respondent[0]->id_respondent }}.jpg">
        </td>
    </tr>
    <tr>
        <td colspan="10"></td>
    </tr>


</tbody>




</table>




@endif



