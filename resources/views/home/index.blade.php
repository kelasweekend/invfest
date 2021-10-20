@extends('layouts.home')
@section('title')
    Selamat Datang di {{$web->title}}
@endsection

@section('content')
    <!-- Header -->
    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col">
                    <img src="{{ asset('frontend/img/astro.png') }}" class="img-fluid" alt="Header Img" />
                </div>
                <div class="col-sm-12 col-md-6 order-md-last">
                    <h4 class="font-weight-bolder">
                        {{$web->heading}}
                    </h4>
                    <a href="#details" class="btn primary-color btn-rounded"><i class="fas fa-arrow-down mr-1"></i> Detail</a>
                    <a href="{{route('karya')}}" class="btn btn-secondary btn-rounded"><i class="fas fa-file-upload mr-1"></i> Upload Karya</a>
                </div>
            </div>
        </div>
    </header>
    <!-- End of Header -->

    <!-- Card -->
    <section id="kompetisi">
        <div class="container">
            <h4 class="text-center my-5 font-weight-bold">Kompetisi</h4>
            <div class="card-deck">
                @foreach ($kategori as $lomba)
                    <div class="card shadow-sm">
                        <img src="{{asset('frontend/lomba/'. $lomba->image)}}" class="img-fluid mx-auto d-block py-5" alt="Mobile" />
                        <div class="card-body">
                            <h5 class="card-title">{{ $lomba->nama_kategori }}</h5>
                            <p class="card-text">
                                {{ $lomba->deskripsi }}
                            </p>
                            <hr>
                            <div class="d-flex justify-content-center">
                                <a href="{{asset('assets/rulebook/'.$lomba->rulebook)}}" target="__blank" class="btn btn-secondary"><i class="fas fa-file-download mr-1"></i> Unduh RuleBook</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End of Card -->

    <!-- Details -->
    <section class="details" id="details">
        <div class="container py-5 mt-5">
            <div class="row">
                <div class="col-sm-12 col-md">
                    <div class="py-5 px-5 details-img">
                        <img src="{{ asset('frontend/img/detail.png') }}" class="img-fluid d-block mx-auto w-75"
                            alt="alternative" />
                    </div>
                </div>
                <div class="col text-white">
                    <h2>Apa itu {{ $web->title }} ?</h2>
                    <p class="mt-3">
                        {{ $web->deskripsi }}
                    </p>
                    <a class="btn btn-light btn-rounded" href="{{ route('daftar') }}">Register</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Details -->

    <!-- Timeline -->
    <section class="timeline_area my-5" id="timelines">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-8 col-lg-6">
                    <!-- Section Heading-->
                    <div class="section_heading text-center">
                        <h4>{{ $web->title }} Timelines</h4>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-12">
                            <!-- Timeline Area-->
                            <div class="apland-timeline-area">

                                @foreach ($timeline as $time)
                                    <!-- Single Timeline Content-->
                                    <div class="single-timeline-area">
                                        <div class="timeline-date wow fadeInLeft" data-wow-delay="0.1s">
                                            <p>{{ $time->tanggal }}</p>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg">
                                                <div class="single-timeline-content d-flex wow fadeInLeft"
                                                    data-wow-delay="0.3s">
                                                    <div class="timeline-icon">
                                                        <i class="fa fa-address-card" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="timeline-text">
                                                        <h6>{{ $time->nama_timeline }}</h6>
                                                        <p>
                                                            {{ $time->deskripsi }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Timeline Content-->
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 my-auto d-none d-lg-block">
                    <img class="w-75 float-right" src="{{ asset('frontend/img/timeline.png') }}" alt="alternative" />
                </div>
            </div>
        </div>
    </section>
    <!-- End of Timeline -->

    <!-- Media Partner -->
    <section class="details">
        <div class="container py-4">
            <div class="section_heading text-center text-white">
                <h4 class="pb-2">Media Partner</h4>
            </div>
            <div class="row justify-content-center">
                @foreach ($media_partner as $medpart)
                    <div class="col-4 col-md-2 bg-white sponsor-item">
                        <img src="{{ asset('assets/medpart/' . $medpart->image_media_partner) }}" alt="logo"
                            class="img-fluid mx-auto d-block rounded" alt="{{ $medpart->nama_media_partner }}" />
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End of Media Partner -->


    <!-- Contacts -->
    <section class="py-5 mt-5 contact container" id="contact">
        <div class="row">
            <div class="col-12 col-md-4 mb-5 mb-md-0 text-center">
                <div class="contact_icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <p>{{$web->email}}</p>
            </div>
            <div class="col-12 col-md-4 mb-5 mb-md-0 text-center">
                <div class="contact_icon">
                    <i class="fas fa-phone-alt"></i>
                </div>
                <a href="https://wa.me/{{$web->nomor}}" target="blank">{{$web->nomor}}</a>
            </div>
            <div class="col-12 col-md-4 mb-md-0 text-center">
                <div class="contact_icon">
                    <i class="fas fa-clock"></i>
                </div>
                <p>
                    Work Hours <br />
                    Senin - Jumat <br />
                    7:00 - 20:00
                </p>
            </div>
        </div>
    </section>
    {{-- contact --}}
@endsection
