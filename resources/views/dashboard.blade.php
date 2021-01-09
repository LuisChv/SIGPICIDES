@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('title')
    Inicio
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="card" style="background-color: cornflowerblue">

                @if ($role == 1)            <!-- CAROUSEL PARA ADMIN -->

                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="margin:0.5%" data-interval="false">
                    <ol class="carousel-indicators">
                      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <div class="d-block w-100">
                            <iframe width="100%" height="500" class="embed-responsive-item"  src="https://www.youtube.com/embed/YBePM9995b0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <div class="d-block w-100">
                            <iframe width="100%" height="500" class="embed-responsive-item"  src="https://www.youtube.com/embed/sFzdzhzQyyo" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <div class="d-block w-100">
                            <iframe width="100%" height="500" class="embed-responsive-item"  src="https://www.youtube.com/embed/2Fo1YWmHU1g" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <div class="d-block w-100">
                            <iframe width="100%" height="500" class="embed-responsive-item"  src="https://www.youtube.com/embed/oCTYmzkhL8A" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <div class="d-block w-100">
                            <iframe width="100%" height="500" class="embed-responsive-item"  src="https://www.youtube.com/embed/Cm_iv2ODSZ8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <div class="d-block w-100">
                            <iframe width="100%" height="500" class="embed-responsive-item"  src="https://www.youtube.com/embed/pyr5TbeaX_Q" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                      </div>
                    </div>
                    <br><br>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                </div>

                @elseif ($role == 2)        <!-- CAROUSEL PARA COORDINADOR -->

                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="margin:0.5%">
                    <ol class="carousel-indicators">
                      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <div class="d-block w-100">
                            <iframe width="100%" height="500" class="embed-responsive-item"  src="https://www.youtube.com/embed/YBePM9995b0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <div class="d-block w-100">
                            <iframe width="100%" height="500" class="embed-responsive-item"  src="https://www.youtube.com/embed/sFzdzhzQyyo" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <div class="d-block w-100">
                            <iframe width="100%" height="500" class="embed-responsive-item"  src="https://www.youtube.com/embed/2Fo1YWmHU1g" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <div class="d-block w-100">
                            <iframe width="100%" height="500" class="embed-responsive-item"  src="https://www.youtube.com/embed/oCTYmzkhL8A" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <div class="d-block w-100">
                            <iframe width="100%" height="500" class="embed-responsive-item"  src="https://www.youtube.com/embed/Cm_iv2ODSZ8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <div class="d-block w-100">
                            <iframe width="100%" height="500" class="embed-responsive-item"  src="https://www.youtube.com/embed/ZmQu96hJF1I" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <div class="d-block w-100">
                            <iframe width="100%" height="500" class="embed-responsive-item"  src="https://www.youtube.com/embed/y2bjGvqlZ_c" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                      </div>
                    </div>
                    <br><br>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                </div>

                @elseif ($role == 3)        <!-- CAROUSEL PARA DIRECTOR -->

                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="margin:0.5%">
                    <ol class="carousel-indicators">
                      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <div class="d-block w-100">
                            <iframe width="100%" height="500" class="embed-responsive-item"  src="https://www.youtube.com/embed/YBePM9995b0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <div class="d-block w-100">
                            <iframe width="100%" height="500" class="embed-responsive-item"  src="https://www.youtube.com/embed/sFzdzhzQyyo" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <div class="d-block w-100">
                            <iframe width="100%" height="500" class="embed-responsive-item"  src="https://www.youtube.com/embed/2Fo1YWmHU1g" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <div class="d-block w-100">
                            <iframe width="100%" height="500" class="embed-responsive-item"  src="https://www.youtube.com/embed/oCTYmzkhL8A" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <div class="d-block w-100">
                            <iframe width="100%" height="500" class="embed-responsive-item"  src="https://www.youtube.com/embed/Cm_iv2ODSZ8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <div class="d-block w-100">
                            <iframe width="100%" height="500" class="embed-responsive-item"  src="https://www.youtube.com/embed/0lj7gnI8Fv8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <div class="d-block w-100">
                            <iframe width="100%" height="500" class="embed-responsive-item"  src="https://www.youtube.com/embed/y2bjGvqlZ_c" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                      </div>
                    </div>
                    <br><br>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                </div>

                @elseif ($role == 4)        <!-- CAROUSEL PARA INVESTIGADOR -->
                
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="margin:0.5%">
                    <ol class="carousel-indicators">
                      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <div class="d-block w-100">
                            <iframe width="100%" height="500" class="embed-responsive-item"  src="https://www.youtube.com/embed/YBePM9995b0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <div class="d-block w-100">
                            <iframe width="100%" height="500" class="embed-responsive-item"  src="https://www.youtube.com/embed/sFzdzhzQyyo" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <div class="d-block w-100">
                            <iframe width="100%" height="500" class="embed-responsive-item"  src="https://www.youtube.com/embed/0lj7gnI8Fv8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <div class="d-block w-100">
                            <iframe width="100%" height="500" class="embed-responsive-item"  src="https://www.youtube.com/embed/ar9sUZAspWk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <div class="d-block w-100">
                            <iframe width="100%" height="500" class="embed-responsive-item"  src="https://www.youtube.com/embed/3AiZT73CPoE" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                      </div>
                    </div>
                    <br><br>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                </div>

                @else                       <!-- DEFAULR -->



                @endif

                
            </div>       
        </div>
    </div>
    @endsection

@push('js')
    <script src="{{ asset('black') }}/js/plugins/chartjs.min.js"></script>
    <script>
        $(document).ready(function() {
          demo.initDashboardPageCharts();
        });
    </script>
@endpush