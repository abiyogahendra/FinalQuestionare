
@extends('master.master')

@section('content')
    <div class="signup-content">
        <div class="signup-img">
            <img src="{{asset('registration/images/form-img.jpg')}}" alt="">
            <div class="signup-img-content">
                <h2>Welcome</h2>
                <p>let's join in our research</p>
            </div>
        </div>
        <div class="signup-form registration-form data-masuk">
            <div class="row data-front">
                <div class="col">
                    <div class="row center mt-70px">
                        <div class="col">
                        <h3 class="center">Kuisioner untuk Evaluasi Usabilitas Media Belajar dalam Bentuk Game berbasis Mobile</h3>
                        </div>
                    </div>
                    <div class="row ml-30px">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <h5>Petunjuk</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <ol>
                                        <li>Sebelum melakukan pengisian kuisioner, responden akan memainkan game yang dipilih untuk diuji.</li>
                                        <li>Install game “ Toon Math”  yang dapat di download di Playstore untuk versi android</li>
                                        <li>Cobalah untuk mengeksplorasi semua menu yang ada,  misalnya setting, store, free chest dan yang paling  utama adalah menu untuk memainkan yaitu “ RUN”.</li>
                                        <li>Mainkan game kurang lebih selama 5-10 menit.</li>
                                        <li>Setelah selesai memainkan isilah kuisioner yang telah disediakan.</li>
                                        <li>Isian terdiri dari nilai 5 s.d 1. Untuk nilai sangat sesuai isikan nilai 5 dan yang sangat tidak sesuai isikan nilai 1.</li>
                                    </ol>
                                </div>
                            </div>
                            <div class="row center">
                                <div class="col">
                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/n_9Gqy_Cmp8?autoplay=0&rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                    <div class="row mb-20px mt-20px">
                        
                        <div class="col">
                            <div class="form-submit">
                                <input class="submit" type="button" value="Lanjut" onclick="NextRegistration()">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form method="POST" class="register-form" id="register-form">
                <div class="form-group">
                    <div class="form-input inputan">
                        <label for="first_name" class="required">Nama Lengkap</label>
                        <input type="text" name="nama" id="first_name" />
                        <div class="alert alert-danger hide-dulu " role="alert"> </div>
                    </div>
                    <div class="form-radio inputan">
                        <div class="label-flex">
                            <label for="payment">Jenis Kelamin</label>
                        </div>
                        <div class="form-radio-group">            
                                <label>
                                    <input type="radio" value="Laki - Laki" name="jenkel"/>
                                    <span class="label"></span> Laki - Laki
                                </label>
                                <label>
                                    <input type="radio" value="Perempuan" name="jenkel" />
                                    <span class="label"></span> Perempuan
                                </label>
                        </div>
                        <div class="alert alert-danger hide-dulu" role="alert"></div>
                    </div>
                    <div class="form-input inputan">
                        <label for="company" class="required">Umur</label>
                        <input type="number" name="umur" id="company" />
                        <div class="alert alert-danger hide-dulu" role="alert"> </div>
                    </div>
                    <div class="form-input inputan">
                        <label for="email" class="required">Email</label>
                        <input type="text" name="email" id="email" />
                        <div class="alert alert-danger hide-dulu" role="alert"> </div>
                    </div>
                    <div class="form-input inputan">
                        <label for="phone_number" class="required">Phone number</label>
                        <input type="text" name="phone_number" id="phone_number" />
                        <div class="alert alert-danger hide-dulu" role="alert"> </div>
                    </div>
                    <div class="form-select inputan">
                        <div class="form-group mb-2"> <label for="form_kota">Pilih Pekerjaan</label> 
                            <select class="form-control js-example-basic-single" name="pekerjaan" id="pekerjaan" required="required" data-error="Masukkan Kota !!" >
                                <option disabled selected>Pilih Pekerjaan</option>
                                <option value="Guru">Guru</option>
                                <option value="Dosen">Dosen</option>
                                <option value="Mahasiswa">Mahasiswa</option>
                                <option value="Tutor">Tutor</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div class="alert alert-danger hide-dulu" role="alert"> </div>
                    </div>
                    <div class="form-radio inputan">
                        <div class="label-flex">
                            <label for="payment">Pengalaman Kerja</label>
                        </div>
                        <div class="form-radio-group">            
                                <label for="opt1" class="radio">
                                    <input type="radio" value="1" name="pengalaman" id="opt1" class="hidden"/>
                                    <span class="label"></span> < 1 Tahun
                                </label>
                                <label for="opt2" class="radio">
                                    <input type="radio" value="2" name="pengalaman" id="opt2" class="hidden"/>
                                    <span class="label"></span> 1 - 5 Tahun
                                </label>
                                
                                <label for="opt3" class="radio">
                                    <input type="radio" value="3" name="pengalaman" id="opt3" class="hidden"/>
                                    <span class="label"></span> > 5 Tahun
                                </label>
                        </div>
                        <div class="alert alert-danger hide-dulu" role="alert"> </div>
                    </div>
                    <div class="form-select inputan">
                        <div class="form-group mb-2"> <label for="form_kota">Pilih Role</label> 
                            <select class="form-control js-example-basic-single" name="role" id="role" required="required" data-error="Masukkan Kota !!" >
                                <option disabled selected>Pilih Role</option>
                                <option value="Expert">Expert</option>
                                <option value="Normal">Normal</option>
                            </select>
                        </div>
                        <div class="alert alert-danger hide-dulu" role="alert"> </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="col">
                            <div class="form-submit">
                                <input class="submit" type="button" value="Kembali" onclick="BackFrontPage()">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                         <div class="form-submit">
                            <input class="submit" type="button" value="Lanjut" onclick="InputDataRegistration()">
                        </div>
                    </div>
                </div>
               
            </form>
        </div>
       

    </div>
@endsection()

@section('custom-script')
    <script src="{{asset('registration/js/inputdata.js')}}"></script>
@endsection()