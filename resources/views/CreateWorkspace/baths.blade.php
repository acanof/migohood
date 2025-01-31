@extends('layouts.master') 
@section('title', 'Baths') 
@section('class', 'contenedor') 
@section( 'content')
@include('CreateWorkspace.navbar.navbar',['activo' => 'baths'])
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-1"></div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <br>
            <h3 class="titulo text-center">¿CUÁNTOS BAÑOS OFRECE?</h3>
            <br>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="form-group text-right">
                       <form id="formAddBaths" action="{{ url('/create-workspace/save-third') }}" method="POST">
                            <div class="text-left">
                                <input type="number" name="num_bathroom" min="1" max="20" class="form-control" step="1" placeholder="0" value="@if(isset($result['num_bathroom']) AND !empty($result['num_bathroom'])){{ $result['num_bathroom'] }}@endif" required>
                                <input type="hidden" name="service_id" value="{{ $id }}">
                                {{ csrf_field() }}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <div class="Wbox">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla deleniti ipsum, aspernatur voluptatum neque provident ipsam.</p>
                <br>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla deleniti ipsum, aspernatur voluptatum neque provident ipsam.</p>
                <br>
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
                <a href="{{url('/create-workspace/bedrooms/edit-bedrooms')}}"><i class="fa fa-chevron-left" aria-hidden="true"> </i><strong>BACK</strong></a>
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right">
            <div class="RetNex">
                <br>
                <a id="addBathsNext"><strong>NEXT</strong><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
    </div>
</div>
@endsection