<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usuario;
use App\Models\empleado_rol;
use App\Models\rol;
use App\Events\userRegistered;
use App\Http\Controllers\userController;
use App\Models\email;


class dataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios= usuario::all();
		$collection = [];

        foreach ($usuarios as $usuario) {
            
			$values = [
				"nombres" => $usuario->nombres,
                "apellidos" => $usuario->apellidos,
                "cedula" => $usuario->cedula,
				"email" => $usuario->email,
				"pais" => $usuario->pais,
                "direccion" => $usuario->direccion,
                "celular" => $usuario->celular,
				"categoria" => $usuario->categoria->nombre,
				"modificar" => '<i onclick = "modificar('.$usuario->id.');" class="far fa-edit" data-toggle="tooltip" title="Modificar" ></i>'
			];
			array_push($collection, $values);
        }
		return datatables($collection)
                ->rawColumns(['modificar'])
                ->toJson();
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
       
        if($request->nameUser!==null &
        $request->lastNameUser!==null &
        $request->identifier!==null &
        $request->emailuser!==null &
        $request->country!==null &
        $request->address!==null &
        $request->phone!==null &
        $request->categoryUser!=="Seleccione una categoria")
        {


            $databack= usuario::where([
                    'email'=> $request->emailuser
                ])->orWhere('cedula', $request->identifier)->count();
            if($databack == 0){


                $usuario = new usuario([
                    'nombres' => $request->nameUser,
                    'apellidos' => $request->lastNameUser,
                    'cedula' => $request->identifier,
                    'email'=> $request->emailuser,
                    'pais'=> $request->country,
                    'direccion'=> $request->address,
                    'celular'=> $request->phone,
                    'categoria_id'=> $request->categoryUser,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);

                $usuario->save();

                if($usuario){


                    $reports = [];
                    $emailAdmin = email::latest('id')->first();
                    $all = usuario::all();
                    $class = new userController();
                    $paises = $class->country();

                    foreach($paises['data'] as $pais){
                        $count = usuario::where('pais',$pais["country"])->count();
                        $report = array($pais["country"],$count);
            
                        array_push($reports, $report);
                    }
            
                    
                    $data = [
                        'usuario' =>$usuario,
                        'usuarios' =>$all,
                        'reports'=> $reports,
                        'emailAdmin' => $emailAdmin
                    ];
                    event(new userRegistered($data));

                    return response()->json([
                        'message' => 'ok',
                        'usuario'=>$usuario,
                    ]);
                }
                

            
                

                

                
            }else{
                return response()->json([
                    'message' => 'error',
                    'alerta'=>'El trabajador ya existe'
                ]);

            }

        }else{
            return response()->json([
                'message' => 'error',
                'alerta'=>'Todos los datos son obligatorios'
            ]);
        }
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $usuario = usuario::find($id);
        
        $values = [
            'id'=>$usuario->id,
            'nombres' => $usuario->nombres,
            'apellidos' => $usuario->apellidos,
            'cedula' => $usuario->cedula,
            'email'=> $usuario->email,
            'pais'=> $usuario->pais,
            'direccion'=> $usuario->direccion,
            'celular'=> $usuario->celular,
            'categoria'=> $usuario->categoria->id
        ];

        return $values;
        
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
        if($request->editNameUser=="" or
        $request->editLastNameUser=="" or
        $request->editIdentifier=="" or
        $request->editEmailuser=="" or
        $request->editCountry=="" or
        $request->editAddress=="" or
        $request->editPhone=="" or
        $request->editCategoryUser=="")
        {

            return response()->json([
                'message' => 'error',
            ]);

        }else{
            
            $usuario = usuario::find($id)->update([
                'nombres' => $request->editNameUser,
                'apellidos' => $request->editLastNameUser,
                'cedula' => $request->editIdentifier,
                'email'=> $request->editEmailuser,
                'pais'=> $request->editCountry,
                'direccion'=> $request->editAddress,
                'celular'=> $request->editPhone,
                'categoria_id'=> $request->editCategoryUser,
                'updated_at' => now()
            ]);

            if($usuario == true){
                return response()->json([
                    'message' => 'ok'
                ]);
            }else{
                return response()->json([
                    'message' => 'error'
                ]);
            }

           
            
        }

        
    }
}
