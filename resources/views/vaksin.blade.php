<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Vaksinasi RSUP Surakarta</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('img/LogoRSUP.png') }}" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
        {{-- Captcha script --}}
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
        
        
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><img src="{{ asset('img/LogoRSUP.png') }}"/> Vaksinasi </a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#daftar">Daftar</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#cekdata">Cek Data</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#sk">S&K</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#perihal">Perihal</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        {{-- Anchor set --}}
        @if (isset($anchor))
            <input type="hidden" name="anchor" value="{{ $anchor }}">
        @endif
        <!-- Masthead-->
        <header class="masthead bg-primary text-black text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Avatar Image
                <img class="masthead-avatar mb-5" src="assets/img/avataaars.svg" alt="..." />-->
                <!-- Masthead Heading-->
                <h4 class="masthead-heading mb-0">Vaksinasi Covid-19 <br> RSUP Surakarta</h4>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <!--<div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>-->
                </div>
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0">Layanan Reservasi/Pendaftaran vaksinasi covid-19 Rumah Sakit Umum Pusat Surakarta untuk masyarakat umum usia 18 tahun atau lebih</p>
                <div class="d-grid gap-2 d-md-block mt-3">
                   
                    <input type="button" class="btn btn-outline-success mx-2" onclick="location.href='#daftar'" value="Daftar/Reservasi" />
                    <input type="button" class="btn btn-outline-warning mx-2" onclick="location.href='#cekdata'" value="Cek Data" />
                    
                </div>
            </div>
        </header>
        <!-- Daftar-->
        <section class="page-section portfolio" id="daftar">
            <div class="container" id="daftar1">
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-start text-secondary mb-3">Vaksinasi</h2>
                <!-- Icon Divider
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>-->
                <!-- Portfolio Grid Items-->
                <div class="row justify-content-center">
                    <!-- Portfolio Item 1-->
                    <div class="col-md-6 col-lg-6 mb-3">
                        @if ($kuotatgl->count() > 0)
                            <form action="/vaksin/daftar" method="POST">
                            @csrf
                            <div class="portfolio-item mx-auto">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="NIK" name="nik" value="{{ old('nik') }}">
                                    <label for="floatingInput">NIK</label>
                                    <span class="text-danger">{{ $errors->first('nik') }}</span>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="Nama" name="nama" value="{{ old('nama') }}">
                                    <label for="floatingInput">Nama Peserta</label>
                                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="No Handphone" name="nohp" value="{{ old('nohp') }}">
                                    <label for="floatingInput">No Handhone (Whatsapp)</label>
                                    <span class="text-danger">{{ $errors->first('nohp') }}</span>
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect" aria-label="Tanggal Vaksin" name="tglvaksin">
                                        <option selected>Pilih Tanggal Vaksinasi</option>
                                        @foreach ($kuotatgl as $tgl)
                                            <option value="{{ $tgl->tanggal }}">{{ \Carbon\Carbon::parse($tgl->tanggal)->isoFormat('dddd, D MMMM Y') }} ( Sisa Kuota {{ $tgl->sisa }} )</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">Tanggal Vaksinasi</label>
                                    <span class="text-danger">{{ $errors->first('tglvaksin') }}</span>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="captcha">Captcha</label>
                                    {!! NoCaptcha::renderJs() !!}
                                    {!! NoCaptcha::display() !!}
                                    <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                                </div>
                                <div>
                                    <button type="Submit" class="btn btn-primary btn-lg">Daftar</button>
                                </div>
                            </div>
                            </form>
                        @else
                            <p>Mohon maaf untuk saat ini untuk kuota Vaksinasi di RSUP Surakarta telah Penuh. Silahkan nantikan info Vaksinasinya selanjutnya </p>
                        @endif
                        
                        @if ($message = Session::get('sukses'))
                        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert" >
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button> 
                            <strong>{{ $message }}</strong>
                        </div>
                        
                        @endif
        
                        @if ($message = Session::get('gagal'))
                        <div class="alert alert-danger alert-block mt-3 alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button> 
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif
                    </div>
                    <!-- Portfolio Item 2-->
                    <div class="col-md-6 col-lg-6 mb-5">
                        <div class="portfolio-item mx-auto" >
                            <a href='https://www.freepik.com/vectors/doctor'><img class="img-fluid" src="{{ asset('/img/4999291.jpg')}}" alt="Doctor vector created by freepik - www.freepik.com" /></a>
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </section>
        
        <!--Cek Data-->
        <section class="page-section portfolio bg-default" id="cekdata">
            <div class="container" id="cekdata1">
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-end text-secondary mb-3">Cek Data Pendaftaran</h2>
                <!-- Icon Divider
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>-->
                <!-- Portfolio Grid Items-->
                <div class="row justify-content-center">
                    <!-- Portfolio Item 1-->
                    <div class="col-md-6 col-lg-6 mb-5">
                        <div class="portfolio-item mx-auto align-items-left">
                            <a href='https://www.freepik.com/vectors/health'>
                            <img class="img-fluid" src="{{ asset('/img/5022520.jpg')}}" alt="Health vector created by pikisuperstar - www.freepik.com" /></a>
                        
                        </div>
                    </div>
                    <!-- Portfolio Item 2-->
                    <div class="col-md-6 col-lg-6 mb-5">
                        <form action="/vaksin/cari" method="POST">
                            @csrf
                            <div class="portfolio-item mx-auto">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="NIK Peserta" name="NIK">
                                    <label for="floatingInput">NIK Peserta Vaksin</label>
                                    <span class="text-danger">{{ $errors->first('NIK') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="captcha">Captcha</label>
                                    {!! NoCaptcha::renderJs() !!}
                                    {!! NoCaptcha::display() !!}
                                    <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                                </div>
                                <div class="mt-3 mb-5">
                                    <button class="btn btn-primary btn-lg" type="submit">Cek Data</button>
                                </div>
                            </div>
                        </form>
                        
                        @if(!empty($cari)) 
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">NIK</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">No Handphone</th>
                                    <th scope="col">Tanggal Vaksin</th>
                                </tr>
                                </thead>
                                <tbody>
                                    {{-- @forelse (@cari as $row) --}}
                                    @foreach ($cari as $row)
                                    <tr>
                                        <th scope="row">{{ $row->nik }}</th>
                                        <td>{{ $row->nama }}</td>
                                        @php
                                            $nohp = substr($row->nohp, 0, -4).'xxxx';
                                            $tanggal = new DateTime($row->dosis1);
                                        @endphp
                                        <td>{{ $nohp  }} </td>
                                        <td>{{ $tanggal->format('d-m-Y') }}</td>
                                    </tr>
                                        
                                    @endforeach
                                    @if(empty($row->nik))
                                    <tr>
                                        <td class='text-center' colspan="4">Data tidak ditemukan</td>
                                    </tr>
                                    @endif
                                    
                                </tbody>
                            </table>  
                        @endif 
                    </div>

                </div>
            </div>
        </section>
        <!-- About Section-->
        <section class="page-section bg-light text-dark mb-0" id="sk">
            <div class="container">
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-right text-dark mb-3">Syarat & Ketentuan</h2>
                
                <div class="row">
                    
                    <ol class="list-group list-group-numbered list-group-flush">
                        <li class="list-group-item">Calon Peserta Vaksinasi wajib melakukan reservasi melalui aplikasi ini dengan mengisi data diri yang valid sesuai kartu identitas (KTP)</li>
                        <li class="list-group-item">Membawa bukti identitas diri (KTP) asli dan fotokopi saat vaksinasi</li>
                        <li class="list-group-item">Reservasi tidak bisa dibatalkan atau dirubah oleh Pasien(peserta vaksinasi)</li>
                        <li class="list-group-item">Jadwal Vaksinasi bisa berubah sewaktu-waktu menyesuaikan ketersediaan vaksin</li>
                        <li class="list-group-item">Pemberitahuan kami kirim melalui SMS/Whatsapp</li>
                    </ol>
                </div>
                
            </div>
        </section>
        
        <!-- Footer-->
        <footer class="footer text-center" id="perihal">
            <div class="container">
                <div class="row">
                    <!-- Footer Location-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="mb-4">Lokasi</h4>
                        <p class="lead mb-0 text-start">
                            Alamat RSUP Surakarta :<br>
                            Jl.Prof.Dr.R.Soeharso No.28 , Jajar, Laweyan, Surakarta<br>
                            Telpon   : 0271-713055 / 0271-720002
                        </p>
                    </div>
                    <!-- Footer Social Icons-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="mb-4">Official Media Sosial</h4>
                        <a class="btn btn-outline-light btn-social mx-1" href="https://www.facebook.com/rsupsurakarta" target="new_tab"><i class="fab fa-fw fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="https://www.instagram.com/rsup_surakarta/" target="new_tab"><i class="fab fa-instagram"></i></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="https://www.youtube.com/channel/UCFQxRSSfXPeGnI1HO1krstA" target="new_tab"><i class="fab fa-youtube"></i></i></a>
                    </div>
                    <!-- Footer About Text-->
                    <div class="col-lg-4">
                        <h4 class="mb-4">Tentang RSUP Surakarta</h4>
                        <p class="lead mb-0">
                            Kunjungi website kami di
                            <a href="https://www.web.rsupsurakarta.co.id/" target="new_tab">web.rsupsurakarta.co.id</a>
                            
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright &copy; SIRS RSUP Surakarta 2021</small></div>
        </div>
        
        <script>
            $(function () {
                if ( $( "[name='anchor']" ).length ) {
                    window.location = '#' + $( "[name='anchor']" ).val();
                }
            };
        </script>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <!-- MDB -->
        <script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"
        ></script>
    </body>
</html>
