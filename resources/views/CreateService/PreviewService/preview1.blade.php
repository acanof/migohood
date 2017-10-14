@extends('layouts.master') @section('title', 'Preview Created Space') @section('class', 'contenedor') @section( 'content')
<div class="container-fluid lilmargin firstPart">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 nopadding-right">
            <div id="carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                    <li data-target="#carousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item active">
                        <img class="img-responsive" src="{{url('/assets/img/fondofs1.png')}}" alt="Slide 1" />
                    </div>
                    <div class="item">
                        <img class="img-responsive" src="{{url('/assets/img/fondofs1.png')}}" alt="Slide 2" />
                    </div>
                    <div class="item">
                        <img class="img-responsive" src="{{url('/assets/img/fondofs1.png')}}" alt="Slide 3" />
                    </div>
                </div>
                <a href="#carousel" class="left carousel-control" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a href="#carousel" class="right carousel-control" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 nopadding-left">
            <div class="bootstrap-iso BlueBack">
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                        <h4 class="textwhite lilpadding2">$14 Por Noche </h4>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 nopadding">
                        <a href="">
                            <img class="edit2" src="{{url('/assets/img/Icon-Edit-white.png')}}" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="bootstrap-iso WhiteBack">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <br>
                            <div class="form-group">
                                <span for="chekin">Check-in</span>
                                <div class='input-group date' id='datetimepicker1'>
                                    <input id="chekin" type='text' class="form-control" />
                                    <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <br>
                            <div class="form-group">
                                <span for="checkout">Check-out</span>
                                <div class='input-group date' id='datetimepicker2'>
                                    <input id="chekout" type='text' class="form-control" />
                                    <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <span for="selectGuest">Invitados</span>
                    <select id="selectGuest" class="selectpicker form-control required">
                                    <option>1 Invitado</option>
                                    <option>2 Invitado</option>
                                    <option>3 Invitado</option>
                                    <option>4 Invitado</option>
                                    <option>5 Invitado</option>
                                </select>
                    <br>
                    <br>
                    <div class="text-center">
                        <button type="button" class="btn btn-large">Agendala Ahora</button>
                        <br>
                        <p>No se efectuara el cobro aun</p>
                        <button type="button" class="btn btn-large">Guardar en la Lista de Deseos</button>
                        <br>
                        <br>
                        <div class="text-center">
                            <a href=""><img class="lilimg2" src="{{url('/assets/img/Icon-Facebook.png')}}" alt=""></a>
                            <a href=""><img class="lilimg" src="{{url('/assets/img/Icon-Mail.png')}}" alt=""></a>
                            <a href=""><img class="lilimg" src="{{url('/assets/img/Icon-Twitter.png')}}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('CreateService.PreviewService.navbar.preview-navbar',['activo2' => 'preview1'])
    <div class="container-fluid WhiteBack preBody">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 light-border">
            <div class="sections">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center nopadding">
                    <br>
                    <img class="imgHom2" src="{{url('/assets/img/user-logo.svg')}}" alt="">
                    <h4 class="text-center">{{$overview['name']}}</h4>
                    <br>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 nopadding">
                    <h3>{{$overview['title']}}</h3>
                    <span>{{$overview['city']}} {{$overview['state']}}, {{$overview['country']}}</span>
                    <br>
                    <br>
                    <br>
                    @if($type[0]['Check'] == 1)
                    <div class="col-sm-3 col-xs-3 text-center nopadding-left">
                        <img class="imgHom3" src="{{url('/assets/img/Icon-Private-Room.png')}}" alt="">
                        <br>
                        <span>{{$type[0]['name']}}</span>
                    </div>
                    @endif
                    @if($type[1]['Check'] == 1)
                    <div class="col-sm-3 col-xs-3 text-center nopadding-left">
                        <img class="imgHom3" src="{{url('/assets/img/Icon-Guest.png')}}" alt="">
                        <br>
                        <span>{{$type[1]['name']}}</span>
                    </div>
                    @endif
                    @if($type[2]['Check'] == 1)
                    <div class="col-sm-3 col-xs-3 text-center nopadding-left">
                        <img class="imgHom3" src="{{url('/assets/img/Icon-Guest.png')}}" alt="">
                        <br>
                        <span>{{$type[2]['name']}}</span>
                    </div>
                    @endif
                    @if($type[3]['Check'] == 1)
                    <div class="col-sm-3 col-xs-3 text-center nopadding-left">
                        <img class="imgHom3" src="{{url('/assets/img/Icon-Guest.png')}}" alt="">
                        <br>
                        <span>{{$type[3]['name']}}</span>
                    </div>
                    @endif
                    @if($type[4]['Check'] == 1)
                    <div class="col-sm-3 col-xs-3 text-center nopadding-left">
                        <img class="imgHom3" src="{{url('/assets/img/Icon-Guest.png')}}" alt="">
                        <br>
                        <span>{{$type[4]['name']}}</span>
                    </div>
                    @endif
                    <div class="col-sm-3 col-xs-3 text-center nopadding-left">
                        <img class="imgHom3" src="{{url('/assets/img/Icon-Bedroom.png')}}" alt="">
                        <br>
                        <span>{{$type[0]['num_guest_service']}}<span><span>  Invitado(s)<span>

                    </div>
                </div>
            </div>
            <div class="sections">
                <hr class="black">
                <div class="col-sm-3 col-xs-3">
                    <h3>Sobre este servicio</h3>
                </div>
                <div class="col-sm-8 col-xs-8">
                    <br>
                    {{$description[2]['content']}}
                    <br>
                    <br>
                    <a href="" style="font-weight:bolder">Contactar anfiltrion</a>
                </div>
                <div class="col-sm-1 col-xs-1">
                    <br>
                    <a href=""> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                </div>
            </div>
            <div class="sections">
                <hr class="black">
                <div class="col-sm-3 col-xs-3">
                    <h4>Itinerario</h4>
                    <br>
                </div>
                <div class="col-sm-8 col-xs-8">
                    <br>
                   {{$description[3]['content']}}
                </div>
                <div class="col-sm-1 col-xs-1">
                    <br>
                    <a href=""> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                </div>
            </div>
           
                <div class="sections">
                    <hr class="black">
                    <div class="col-sm-3 col-xs-3">
                        <h3>Tiempo por defecto</h3>
                    </div>
                    <div class="col-sm-8 col-xs-8">
                        <br>
                        <p> {{ date('h:i A', strtotime($type[0]['Entry']) )}} - {{date('h:i A', strtotime($type[0]['Until']) )}}</p>
                        <br>
                    </div>

                    <div class="col-sm-1 col-xs-1">
                        <br>
                        <a href=""> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                    </div>
                </div>
                <div class="sections">
                   
                    <div class="col-sm-3 col-xs-3">
                        <h3>Tiempo por servicio</h3>
                        <br>
                        <h4>Disponibilidad</h4>
                    </div>
                    <div class="col-sm-8 col-xs-8">
                        <br>
                        <span>{{$type[0]['time_service']}} {{$type[0]['duration']}}</span><br>
                        <br><br>
                        <a href="#">Ver Calendario <span class="glyphicon glyphicon-calendar"></span></a>
                        <br>
                        <br>
                    </div>
                    <div class="col-sm-1 col-xs-1">
                        <br>
                        <a href=""> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                    </div>
                </div>
                 <div class="sections">
                <hr class="black">
                <div class="col-sm-3 col-xs-3">
                    <h3>Pago</h3>
                    <br>
                </div>
                <div class="col-sm-8 col-xs-8">
                    <br>
                    <span>{{$overview['prices']}}</span><br>
                        <br>
                    </div>
                    <div class="col-sm-1 col-xs-1">
                        <br>
                        <a href=""> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                    </div>
                </div>
                <div class="sections">
                    <hr class="black">
                    <div class="col-sm-3 col-xs-3">
                        <h3>Tambien deberias saber</h3>
                    </div>
                    <div class="col-sm-8 col-xs-8">
                        <br>
                        <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est omnis odio nulla corporis, delectus libero animi porro laboriosam numquam nisi vero magnam eligendi minima natus voluptatum tempore eius quaerat sunt. </p>
                        <br>
                    </div>
                    <div class="col-sm-1 col-xs-1">
                        <br>
                        <a href=""> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                    </div>
                </div>
                <div class="sections">
                    <hr class="black">
                    <div class="col-sm-3 col-xs-3">
                        <h3>Seguridad</h3>
                    </div>
                    <div class="col-sm-4 col-xs-4">
                        <br>
                        <span>Detector de Humo</span><br>
                        <span></span><br>
                        <span>Extintor de Fuego</span><br>
                        <br>
                    </div>
                    <div class="col-sm-4 col-xs-4">
                        <br>
                        <span>Kitchen roof</span><br>
                        <span></span><br>
                        <span>Kitchen right of stove</span><br>
                        <br>
                    </div>
                    <div class="col-sm-1 col-xs-1">
                        <br>
                        <a href=""> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                    </div>
                </div>
                <div class="sections">
                    <hr class="black">
                    <div class="col-sm-3 col-xs-3">
                        <h3>Instrucciones de Emergencia</h3>
                    </div>
                    <div class="col-sm-8 col-xs-8">
                        <br>
                        <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est omnis odio nulla corporis, delectus libero animi porro laboriosam numquam nisi vero magnam eligendi minima natus voluptatum tempore eius quaerat sunt. </p>
                        <br>
                    </div>
                    <div class="col-sm-1 col-xs-1">
                        <br>
                        <a href=""> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                    </div>
                </div>
                <div class="sections">
                    <hr class="black">
                    <div class="col-sm-3 col-xs-3">
                        <h3>Numeros de Emergencia</h3>
                    </div>
                    <div class="col-sm-8 col-xs-8">
                        <br>
                        <p>
                            <img class="lilicon" src="{{url('assets/img/Icon-Information.png')}} " alt=""> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est omnis odio nulla corporis, delectus libero animi porro laboriosam numquam nisi vero
                            magnam eligendi minima natus voluptatum tempore eius quaerat sunt.
                        </p>
                        <br>
                    </div>
                    <div class="col-sm-1 col-xs-1">
                        <br>
                        <a href=""> <img class="edit" src="{{url('/assets/img/Icon-Edit.png')}}" alt=""> </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 light-border">

            </div>
        </div>
    </div>


    @endsection