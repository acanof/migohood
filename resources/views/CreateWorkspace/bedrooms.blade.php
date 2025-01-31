@extends('layouts.master')
@section('title', 'Bedrooms') 
@section('class', 'contenedor') 
@section( 'content')
@include('CreateWorkspace.navbar.navbar',['activo' => 'bedrooms'])
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-1"></div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <br>
            <h3 class="titulo text-center">¿CUÁNTOS HUESPEDES PUEDEN HOSPEDARSE?</h3>
            <br>
            <div class="row">
                <form id="formAddBedrooms" method="POST" action="{{ url('/create-workspace/add-bedrooms') }}">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="form-group text-right">
                            <div class="text-left">
                               <input type="number" name="guests_number" min="1" max="20" class="form-control" step="1" placeholder="0" value="@if(isset($result[0]['num_guest']) AND !empty($result[0]['num_guest'])){{ $result[0]['num_guest'] }}@endif" required>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <div class="text-left">
                                <label>¿Cuántas Habitaciones ofrece?:</label>
                                <input type="number" name="bedrooms_number" min="1" max="20" class="form-control" step="1" placeholder="0" value="@if(isset($result[0]['num_bedroom']) AND !empty($result[0]['num_bedroom'])){{$result[0]['num_bedroom']}}@endif" required>
                                <input name="service_id" type="hidden" value="{{ $id }}">
                            </div>
                        </div>

                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <div class="Wbox" id="information">
                <p>El número y el tipo de camas disponibles, determinaran el número de huespedes que pueden quedarse comodamente en tu espacio</p>
                <br>

                <p>El detalle de las camas ayuda a entender cómo está organizado tu espacio.</p>
                <br>
            </div>
            <div class="Wbox col-md-12 col-lg-12  col-sm-12 col-xs-12" id="bedrooms-icon">
                <div class="contentImg"></div>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1"></div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-left">
            <br>
            <div class="tex-left RetNex">
                <a href="{{url('/create-workspace/place-type')}}"><i class="fa fa-chevron-left" aria-hidden="true"> </i><strong>BACK</strong></a>
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right">
            <div class="RetNex">
                <br>
                <a id="addBedroomsNext"><strong>NEXT</strong><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
    </div>
</div>


@endsection

