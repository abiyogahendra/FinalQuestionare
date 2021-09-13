<div class="row align-items-center ml-2 data_content">
    <div class="col">
        <div class="modal-header">
            <h4 class="modal-title center" id="modal_booking">Detail Report</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            <div class="table">
                <table class="table table-bordered fblack table-hover" id="report-table">
                        <thead>
                            <tr class="center">
                                <th>Category</th>
                                <th>Pertanyaan</th>
                                <th>Jawaban</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($category as $c)
                                <tr> 
                                    <td rowspan="{{$c->j_quest}}" >{{$c->name}}</td>
                                        @foreach($answer as $a)
                                            @if($a->id_category == $c->id_category)
                                                <td>{{$a->question}}</td>
                                                <td>{{$jawaban[$a->id_question]}}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>