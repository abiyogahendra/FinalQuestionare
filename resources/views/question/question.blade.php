<div id="full-question">
    @foreach($data_page as $d=>$a)
        <fieldset class="page-{{$a['id_page']}} hiden-page" >
            <legend><h3>{{$a['name']}}</h3></legend>
            <form method="POST" class="question-form" id="form-{{$a['id_page']}}">
                @foreach($data_category as $s)
                    @if($s['id_page'] == $a['id_page'])
                        <fieldset>
                            <legend><h5>{{$s['name']}}</h5></legend>
                            <div class="form-group inputan">
                                <div class="form-radio ">
                                    @foreach($data_question as $d)
                                        @if($d['id_category'] == $s['id'])
                                            <label>{{$d['question']}}</label>
                                            <div class="form-radio-group">
                                                <label>
                                                    <input type="radio" value="5" name="soal{{$d['id']}}" Required>
                                                    <span class="label"></span>5
                                                </label>
                                                <label>
                                                    <input type="radio" value="4" name="soal{{$d['id']}}" Required>
                                                    <span class="label"></span>4
                                                </label>
                                                <label>
                                                    <input type="radio" value="3" name="soal{{$d['id']}}" Required>
                                                    <span class="label"></span>3
                                                </label>
                                                <label>
                                                    <input type="radio" value="2" name="soal{{$d['id']}}" Required>
                                                    <span class="label"></span>2
                                                </label>
                                                <label>
                                                    <input type="radio" value="1" name="soal{{$d['id']}}" Required>
                                                    <span class="label"></span>1
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="data-expert form-group">
                                    <label for="recipient-name" class="col-form-label">Masukkan Komentar Untuk Bagian Di Atas</label>
                                    <textarea name="address" id="" cols="30" class="input-data form-control" rows="3" required></textarea>
                                </div>
                                <div class="alert alert-danger hide-dulu" role="alert">Tolong  Di Isikan</div>
                                <div class="row justify-content-center">
                                    <div class="col-6">
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        @endif
                @endforeach
                <div class="row">
                    <div class="col">
                        <div class="form-submit">
                            <input class="submit" type="button" value="Kembali" onclick="BackPage('{{$a['id_page']}}')">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-submit">
                            <input class="submit" type="button" value="Lanjut" onclick="ValidationPerPage('{{$a['id_page']}}')">
                        </div>
                    </div>
                </div>
                <br><br><br>

            </form>
        </fieldset>
    @endforeach
</div>
<br><br><br>
