<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Curl;
use Session;
use Hash;

class CreateSpaceController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('customAuth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function First()
    {
        
        $types = Curl::to(env('MIGOHOOD_API_URL').'/category/space/get-type')
                    ->asJson( true )
                    ->get();
        $accommodation = Curl::to(env('MIGOHOOD_API_URL').'/accommodation/get-accommodation')
                    ->asJson( true )
                    ->get();
        //session()->put('message-alert', 'test');  
        return view("CreateSpace.placeType", ['types' => $types, 'accommodation' => $accommodation]);
    }

    public function AddPlaceType(Request $request)
    {
        // Enviar los datos a la API para crear un nuevo espacio
        $response = Curl::to(env('MIGOHOOD_API_URL').'/service/space/step-1/create')
                    ->withHeaders( array( 
                        'api-token:'.session()->get('user.remember_token') 
                    ))
                    ->withData( array( 
                        'user_id' => session()->get('user.id'),
                        'type_id'  => $request->input('type'),
                        'accommodation_id'  => $request->input('accomodation'),
                        'live'  => $request->input('live')
                        ) )
                    ->asJson( true )
                    ->post();
        //dd($response);

        // Si es un array y existe el valor id se dirige a la proxima vista
        if (is_array($response) && array_key_exists('id', $response)) {
            session()->put('id', $response['id']);                
            return redirect('/create-space/bedrooms');
        // Si no, se retorna un mensaje al usuario
        } else {
            $caracters = array('"','[',']',',');
            $response = str_replace($caracters,'',$response);
            if (is_array($response)) {
                $res = '';
                foreach ($response as $r) {
                    $res .= $r . '\\n';
                }
            } else {
                $res = $response;
            }

            return redirect('/create-space/place-type')->with(['message-alert' => '' . $res . '']);
        }
        
    }
     
    public function Second1()
    {
        $id = '';
        if (session()->has('id')) {
            $id = session()->get('id');
            session()->forget('id');
        }
        
        return view("CreateSpace.bedrooms", ['id' => $id]);
    }

    public function AddBedrooms(Request $request)
    {
        // Enviar los datos a la API para crear nuevas habitaciones
        $response = Curl::to(env('MIGOHOOD_API_URL').'/service/space/step-2/bedrooms')
                    ->withData( array( 
                        'service_id' => $request->input('service'),
                        'num_guest'  => $request->input('guests_number'),
                        'num_bedroom'  => $request->input('bedrooms_number'),
                        ) )
                    ->asJson( true )
                    ->post();

        // Si es un array y existe el valor id se dirige a la proxima vista
        /*if (is_array($response) && array_key_exists('id', $response)) {
            //dd($response['bedrooms']);
            // se guardan en sesion las variables id y numero de hab para ser usadas en la proxima vista
            
            //session()->put('bedrooms', $response['bedrooms']);                
            return redirect('/create-space/bedrooms/edit-bedrooms');
        // Si no, se retorna un mensaje al usuario
        } else {*/
        $caracters = array('"','[',']',',');
        $response = str_replace($caracters,'',$response);
        if (is_array($response)) {
            $res = '';
            foreach ($response as $r) {
                $res .= $r . '\\n';
            }
        } else {
            $res = $response;
        }

        if ($res == 'Add Space Bedroom') {
            session()->put('id', $request->input('service'));
            return redirect('/create-space/bedrooms/edit-bedrooms');
        } else
            return redirect('/create-space/bedrooms')->with(['message-alert' => '' . $res . '']);
        //}
        
    }

     
    public function Second2()
    {
        /** Se guardan las sesiones creadas anteriormente en variables
        * para garantizar su persistencia
        */
        $id = '';
        if (session()->has('id')) {
            $id = session()->get('id');
            session()->forget('id');
        }
        $msg = '';
        if (session()->has('msg')) {
            $msg = session()->get('msg');
            session()->forget('msg');
        }

        $response = Curl::to(env('MIGOHOOD_API_URL').'/service/get-bed-bedroom')
                        ->withData( array( 
                            'service_id' => $id,
                            ) )
                        ->asJson( true )
                        ->post();

        // Si es un array y existe el valor bedroom_id se dirige a la proxima vista
        if (is_array($response) && array_key_exists('bedroom_id', $response[0])) {
            $bedrooms = array();
            $bed_quantity = 0;
            for ($i=0, $aux=0; $i < count($response); $i++) { 
                if ($i == 0) {
                    $bedrooms[$aux]['bedroom_id'] = $response[$i]['bedroom_id'];
                    $bed_quantity += $response[$i]['bed_quantity'];
                }
                if (isset($response[$i+1]['bedroom_id'])) {
                    if ($bedrooms[$aux]['bedroom_id'] == $response[$i+1]['bedroom_id']) {
                        $bed_quantity += $response[$i+1]['bed_quantity'];
                    } else {
                        $bedrooms[$aux]['bed_quantity'] = $bed_quantity;
                        $aux++;
                        $bedrooms[$aux]['bedroom_id'] = $response[$i+1]['bedroom_id'];
                        if (is_null($response[$i+1]['bed_quantity'] == null) OR empty($response[$i+1]['bed_quantity'] == null) OR $response[$i+1]['bed_quantity'] == 0)
                            $bed_quantity = 0;
                        else
                            $bed_quantity = $response[$i+1]['bed_quantity'];
                    }
                } else {
                    $bedrooms[$aux]['bed_quantity'] = $bed_quantity;
                }
            }
            if ($msg == ''){
                return view("CreateSpace.bedrooms-all", ['id' => $id, 'bedrooms' => $bedrooms]);
            } else {
                session()->put('message-alert', '' . $msg . '');
                return view("CreateSpace.bedrooms-all", ['id' => $id, 'bedrooms' => $bedrooms]);
            }
                            
            
        // Si no, se retorna un mensaje al usuario
        } else {
            $caracters = array('"','[',']',',');
            $response = str_replace($caracters,'',$response);
            if (is_array($response)) {
                $res = '';
                foreach ($response as $r) {
                    $res .= $r . '\\n';
                }
            } else {
                $res = $response;
            }

            return redirect('/')->with(['message-alert' => '' . $res . '']);
        }

    }
     
    public function Second3(Request $request)
    {
        $response = Curl::to(env('MIGOHOOD_API_URL').'/service/get-bed-bedroom-data')
                        ->withData( array( 
                            'user_id' => session()->get('user.id'),
                            'bedroom_id' => $request->input('bedroom_id'),
                            ) )
                        ->asJson( true )
                        ->post();
        //dd($response);

        // Si es un array y existe el valor bedroom_id se dirige a la proxima vista
        if (is_array($response)) {
            $beds = array();
            $qty = 0;
            foreach ($response as $value) {
                if ($value['bed_id'] == 1) {
                    $beds['double_bed'] = $value['quantity'];
                    $qty += $value['quantity'];
                } elseif ($value['bed_id'] == 2) {
                    $beds['queen_bed'] = $value['quantity'];
                    $qty += $value['quantity'];
                } elseif ($value['bed_id'] == 3) {
                    $beds['individual_bed'] = $value['quantity'];
                    $qty += $value['quantity'];
                } elseif ($value['bed_id'] == 4) {
                    $beds['sofa_bed'] = $value['quantity'];
                    $qty += $value['quantity'];
                } elseif ($value['bed_id'] == 5) {
                    $beds['other_bed'] = $value['quantity'];
                    $qty += $value['quantity'];
                }
            }
            $beds['quantity'] = $qty;
                            
            // Se retorna la vista con las variables
            return view("CreateSpace.bedrooms-addbed",['service_id' => $request->input('service_id'), 'bedroom_id' => $request->input('bedroom_id'), 'refer' => $request->input('refer'), 'beds' => $beds]);
        // Si no, se retorna un mensaje al usuario
        } else {
            $caracters = array('"','[',']',',');
            $response = str_replace($caracters,'',$response);
            if (is_array($response)) {
                $res = '';
                foreach ($response as $r) {
                    $res .= $r . '\\n';
                }
            } else {
                $res = $response;
            }

            return redirect('/')->with(['message-alert' => '' . $res . '']);
        }
        //dd($response);
        
    }

    public function SaveBeds(Request $request)
    {
        // Enviar los datos a la API para crear nuevas habitaciones
        $response = Curl::to(env('MIGOHOOD_API_URL').'/service/space/step-2/beds/details')
                    ->withData( array( 
                        'service_id' => $request->input('service_id'),
                        'bedroom_id' => $request->input('bedroom_id'),
                        'queen_bed' => $request->input('queen_bed'),
                        'double_bed' => $request->input('double_bed'),
                        'individual_bed'  => $request->input('individual_bed'),
                        'sofa_bed' => $request->input('sofa_bed'),
                        'other_bed'  => $request->input('other_bed'),
                        ) )
                    ->asJson( true )
                    ->post();
        //dd($response);
        //$caracters = array('"','[',']',',');
        //$response = str_replace($caracters,'',$response);

        if (is_null($response) OR empty($response)) {
            //dd($response);
            $response = 'Camas guardadas exitosamente';
            session()->put('id', $request->input('service_id'));
            session()->put('msg', ''.$response.'');
            return redirect('/create-space/bedrooms/edit-bedrooms');
        } else {
            session()->put('id', $request->input('service'));
            session()->put('msg', ''.$response.'');
            return redirect('/create-space/bedrooms/edit-bedrooms');
        }
        
    }

    public function ShowBathroom(Request $request)
    {

        session()->put('id', $request->input('service_id'));
        return redirect('/create-space/baths');
        
    }

    public function Third()
    {
        $id = '';
        if (session()->has('id')) {
            $id = session()->get('id');
            //dd($id);
            session()->forget('id');
        }
        $msg = '';
        if (session()->has('message-alert')) {
            $msg = session()->get('message-alert');
            session()->forget('message-alert');
        }
        if ($msg == '') {
            return view("CreateSpace.baths", ['service_id' => $id]);
        } else {
            session()->put('message-alert', ''.$msg.'');
            return view("CreateSpace.baths", ['service_id' => $id]);
        }
        
    }

    public function AddBaths(Request $request)
    {
        $response = Curl::to(env('MIGOHOOD_API_URL').'/service/space/step-3/bathroom')
                        ->withHeaders(array( 
                            'api-token:'.session()->get('user.remember_token') 
                        ))
                        ->withData( array( 
                            'service_id' => $request->input('service_id'),
                            'num_bathroom' => $request->input('num_bathroom'),
                            ) )
                        ->asJson( true )
                        ->put();
        if ($response == 'Add Step 3') {
            return redirect('/create-space/location')->with(['id' => $request->input('service_id')]);
        } else {
            $caracters = array('"','[',']',',');
            $response = str_replace($caracters,'',$response);
            if (is_array($response)) {
                $res = '';
                foreach ($response as $r) {
                    $res .= $r . '\\n';
                }
            } else {
                $res = $response;
            }
            return redirect('/create-space/baths')->with(['message-alert' => '' . $res . '', 'id' => $request->input('service_id')]);
        }
        //dd($response);
        //return view("CreateSpace.baths", ['service_id' => $id]);
    }

    public function Fourth()
    {
        return view("CreateSpace.locations");
    }

    public function Fifth()
    {
        return view("CreateSpace.amenities");
    }

        public function Sixth()
    {
        return view("CreateSpace.hosting");
    }

        public function Seventh()
    {
        return view("CreateSpace.basics");
    }

        public function Eigth()
    {
        return view("CreateSpace.listing");
    }

        public function Ninth()
    {
        return view("CreateSpace.photos");
    }

        public function Tenth()
    {
        return view("CreateSpace.services");
    }            

            public function Eleven()
    {
        return view("CreateSpace.notes");
    }            

            public function Twelve()
    {
        return view("CreateSpace.co-host");
    }       
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
