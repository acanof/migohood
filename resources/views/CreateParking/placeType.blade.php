@extends('layouts.master') @section('title', 'Place Type') @section('class', 'contenedor') @section('content') @include('CreateParking.navbar.navbar',['activo' => 'placetype'])
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-1"></div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <div class="row">
                <h4>¿Qué tipo de aparcamiento esta ofreciendo?</h4>
                <form id="formPlaceType" method="POST" action="{{ url('/create-parking/save-first') }}">
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="form-group">
                            <div class="text-left">
                                
                            </div>
                            <br>
                            <select class="selectpicker form-control required" name="type">
                                @foreach($types as $type)
                                    
                                    <option @if(isset($result['Type']) AND !empty($result['Type']) AND $result['Type'] == $type['name']) {{'selected'}} @endif value="{{ $type['code'] }}">{{ $type['name'] }}</option>
                                @endforeach
                            </select>
                            <br>
                            <br>
                            <div id="lilbox">
                                <div class="radio">
                                    <label class="textwhite"><input  @if(isset($result['live']) AND $result['live'] == 0) {{'checked'}} @endif data-type="Exterior" onclick="dataType(this)" type="radio" name="live" value="0" ><strong>Exterior</strong></label>
                                </div>
                                <hr>
                                <div class="radio">
                                    <label class="textwhite"><input  @if(isset($result['live']) AND $result['live'] == 1) {{'checked'}} @endif data-type="Interior" onclick="dataType(this)" type="radio" name="live" value="1" ><strong>Interior</strong></label>
                                </div>
                            </div>
                            <br>
                            <label>Número de espacios:</label>
                            <input type="number" name="num_space" min="1" max="20" class="form-control quantity" step="1" placeholder="0" value="@if(isset($result['num_space']) AND !empty($result['num_space'])){{ $result['num_space'] }}@endif" required>
                            <div>
                            </div>
                        </div>
                    </div>
                <input type="hidden" name="service_id" value="{{ $id }}">
                {{ csrf_field() }}
                </form>
            </div>
        </div>

        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <div class="Wbox">
                
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla deleniti ipsum, aspernatur voluptatum neque provident ipsam.</p>
                <br>
                
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla deleniti ipsum, aspernatur voluptatum neque provident ipsam.</p>
                <br>
                
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla deleniti ipsum, aspernatur voluptatum neque provident ipsam.</p>
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
                <a href="{{url('/becomeahost')}}"><i class="fa fa-chevron-left" aria-hidden="true"> </i><strong>BACK</strong></a>
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right">
            <div class="RetNex">
                <br>
                <a id="placeTypeNext" ><strong>NEXT</strong><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
    </div>
</div>
@endsection