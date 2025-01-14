@extends('layouts.master') @section('title', 'Amenities') @section('class', 'contenedor') @section( 'content') @include('CreateWorkspace.navbar.navbar',['activo' => 'amenities'])
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                    <h3 class="titulo text-center">COMODIDADES</h3>
                    <br>
                     <form id="formAddAmenities" method="POST" action="{{url('/create-workspace/save-amenities')}}">
                    <div class="row">
                        @if(isset($saved_amenites) AND $saved_amenites != 'Not Found')
                        @foreach(array_chunk($saved_amenites, round(count($saved_amenites)/2)) as $chunk )
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            @foreach($chunk as $amt)
                            <div class="checkbox">
                               
                                <label><input @if($amt['check'] == '1') {{'checked'}} @endif  type="checkbox" name="amenities[]" value="{{$amt['code']}}"><strong>{{$amt['name']}}</strong></label>
                            </div>
                            @endforeach
                        </div>
                        @endforeach
                        @else
                        @foreach(array_chunk($amenities, round(count($amenities)/2)) as $chunk )
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            @foreach($chunk as $amt)
                            <div class="checkbox">
                               
                                <label><input type="checkbox" name="amenities[]" value="{{$amt['code']}}"><strong>{{$amt['name']}}</strong></label>
                            </div>
                            @endforeach
                        </div>
                        @endforeach
                        @endif
                    </div>
                  {{--  <label for="editar">Agregar Comodidades <i class="fa fa-pencil" aria-hidden="true"></i></label>
                    <button id="editar" type="button" class="btn btn-info btn-sm hidden" data-toggle="modal" data-target="#myModal">Open Modal</button>
    --}}
                    {{csrf_field()}}
                        <input type="hidden" name="service_id" value="{{$id}}">
                    </form>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Agregar Comodidades</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <div class="text-left">
                                            <input type="text" name="quantity" class="form-control">
                                        </div>
                                        <br>
                                    </div>
                                    <button id="addMore" type="button" class="btn btn-default hidden"></button>
                                    <label for="addMore">Agregar Nuevo <i class="fa fa-plus" aria-hidden="true"></i></label>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
                </div>
            </div>

            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                <div class="Wbox">
                    <p>Mostrar lo esencial ayuda a los huespedes a sentirse como en casa en tu estancia.</p>
                    <br>

                    <p>Algunos dueños proveen desayuno o solo cafe y té. Ninguna de estas cosas son requeridas, aunque a veces agregar un buen toque, para ayudar a los huespedes a sentirse bienvenidos.</p>
                    <br>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2"></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-left">
                <br>
                <div class="tex-left RetNex">
                    <a href="{{url('/create-workspace/location')}}"><i class="fa fa-chevron-left" aria-hidden="true"> </i><strong>BACK</strong></a>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right">
                <div class="RetNex">
                    <br>
                    <a id="addAmenitiesNext3" href="{{url('/create-workspace/location')}}"><strong>NEXT</strong><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
        </div>
    </div>
    @endsection