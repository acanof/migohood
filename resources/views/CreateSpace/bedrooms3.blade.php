 @extends('layouts.master') @section('title', 'Bedrooms') @section('class', 'contenedor') @section( 'content')
<div class="barra3">
    <nav class="navbar navbar-default navibar2" role="navigation">
        <div class="container-fluid">
            <ul class="nav navbar-nav centered">
                <li><a href="#">Place type</a></li>
                <li><a class="activo" href="#">Bedrooms</a></li>
                <li><a href="#">Baths</a></li>
                <li><a href="#">Locations</a></li>
                <li><a href="#">Amenities</a></li>
                <li><a href="#">Hosting</a></li>
            </ul>
        </div>
    </nav>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <br>
            <div class="text-right">
                <div class="titulos">
                    <h3 class="titulo text-center">DETALLES DE LA ESTADIA</h3>
                    <span class="text-left">Habitacion 1</span>
                    <br>
                    <span class="text-left">Camas 0</span>
                </div>
                <div class="titulos">
                    <button type="button" class="btn btn-sm continue2">Listo</button>
                </div>
            </div>

            <hr>
            <div class="row">
                <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                </div>
                <div class="col-lg-6 col-md-8 col-sm-8 col-xs-12">
                    <div class="form-group text-right">
                        <div class="text-left">
                            <input type="number" name="quantity" min="1" max="10" class="form-control" step="1" placeholder="0 Camas Dobles" required>
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <div class="text-left">
                            <input type="number" name="quantity" min="1" max="10" class="form-control" step="1" placeholder="0 Camas Queen" required>
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <div class="text-left">
                            <input type="number" name="quantity" min="1" max="10" class="form-control" step="1" placeholder="0 Camas Individuales" required>
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <div class="text-left">
                            <input type="number" name="quantity" min="1" max="10" class="form-control" step="1" placeholder="0 Sofa Camas" required>
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <div class="text-left">
                            <label>¿Agregar Cama Adicional?:</label>
                        </div>
                        <select class="selectpicker form-control required">
                                <option></option>
                                <option>Cama King</option>
                                <option>Cama Queen</option>
                                <option>Otra</option>
                        </select>
                    </div>
                    <hr>
                </div>
            </div>
        </div>

        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <div class="Wbox">
                <p>Aqui veras las opciones en detalle para tu cama</p>
                <br>
                <br>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2"></div>
    </div>
</div>
</div>