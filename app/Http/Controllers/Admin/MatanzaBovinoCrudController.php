<?php

namespace App\Http\Controllers\Admin;

use App\Models\MatanzaBovino;
use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\MatanzaBovinoRequest as StoreRequest;
use App\Http\Requests\MatanzaBovinoRequest as UpdateRequest;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use App\Models;

class MatanzaBovinoCrudController extends CrudController
{

    public function setUp()
    {

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setModel("App\Models\MatanzaBovino");
        $this->crud->setRoute("admin/matanzaBovino");
        $this->crud->setEntityNameStrings('Canal', 'Canales bovinos');

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/

        //$this->crud->setFromDb();

        $this->crud->setColumns(
            [
                [
                    'name' => 'canal', // The db column name
                    'label' => "Canal" // Table column heading
                ],
                [
                    'name' => 'sexo',
                    'label' => 'Sexo'
                ],
                [
                    'name'        => 'color',
                    'label'       => 'Color',
                    'type'        => 'radio',
                    'options'     => [ // the key will be stored in the db, the value will be shown as label; 
                                        0 => "Blanco",
                                        1 => "Negro",
                                        2 => "Colorado",
                                        3 => "Bayo",
                                        4 => "Café",
                                        5 => "Gris",
                                        6 => "Cárdeno",
                                        7 => "Sardo"
                                    ],
                ],
                [
                    'name'        => 'raza', // the name of the db column
                    'label'       => 'Raza', // the input label
                    'type'        => 'radio',
                    'options'     => [ // the key will be stored in the db, the value will be shown as label; 
                                        0 => "Angus",
                                        1 => "Braford",
                                        2 => "Brahman",
                                        3 => "Brangus",
                                        4 => "Droughtmaster",
                                        5 => "Gelbvieh",
                                        6 => "Jersey"
                                    ],
                ],
                [
                    'name'        => 'especie', // the name of the db column
                    'label'       => 'Especie', // the input label
                    'type'        => 'radio',
                    'options'     => [ // the key will be stored in the db, the value will be shown as label; 
                                        0 => "Ternera",
                                        1 => "Ternero",
                                        2 => "Novilla",
                                        3 => "Novillo",
                                        4 => "Vaca",
                                        5 => "Toro"
                                    ],
                ],
                [
                    'name'        => 'prenada', // the name of the db column
                    'label'       => 'Preñada', // the input label
                    'type'        => 'radio',
                    'options'     => [ // the key will be stored in the db, the value will be shown as label; 
                                        0 => "No",
                                        1 => "Pequeño",
                                        2 => "Mediano",
                                        3 => "Grande"
                                    ],
                ],
                [
                    'name' => 'pesoPie', // The db column name
                    'label' => "Peso en pie" // Table column heading
                ],
                [
                    'name' => 'pesoCanal', // The db column name
                    'label' => "Peso en canal" // Table column heading
                ],
                [
                    'name' => 'created_at', // The db column name
                    'label' => "Hora muerte" // Table column heading
                ]
            ]
        );

        // ------ CRUD FIELDS
        $this->crud->addFields(
            [
                [
                    'name'        => 'color', // the name of the db column
                    'label'       => 'Color', // the input label
                    'type'        => 'radio',
                    'options'     => [ // the key will be stored in the db, the value will be shown as label; 
                                        0 => "Blanco",
                                        1 => "Negro",
                                        2 => "Colorado",
                                        3 => "Bayo",
                                        4 => "Café",
                                        5 => "Gris",
                                        6 => "Cárdeno",
                                        7 => "Sardo"
                                    ],
                    'inline'      => true, // show the radios all on the same line?
                ],
                [
                    'name'        => 'raza', // the name of the db column
                    'label'       => 'Raza', // the input label
                    'type'        => 'radio',
                    'options'     => [ // the key will be stored in the db, the value will be shown as label; 
                                        0 => "Angus",
                                        1 => "Criollo",
                                        2 => "Braford",
                                        3 => "Brahman",
                                        4 => "Jersey"
                                    ],
                    'inline'      => true, // show the radios all on the same line?
                ],
                [
                    'name'        => 'especie', // the name of the db column
                    'label'       => 'Especie', // the input label
                    'type'        => 'radio',
                    'options'     => [ // the key will be stored in the db, the value will be shown as label; 
                                        0 => "Ternera",
                                        1 => "Ternero",
                                        2 => "Novilla",
                                        3 => "Novillo",
                                        4 => "Vaca",
                                        5 => "Toro"
                                    ],
                    'inline'    => true,
                ],
                [
                    'name'        => 'prenada', // the name of the db column
                    'label'       => 'Preñada', // the input label
                    'type'        => 'radio',
                    'options'     => [ // the key will be stored in the db, the value will be shown as label; 
                                        0 => "No",
                                        1 => "Pequeño",
                                        2 => "Mediano",
                                        3 => "Grande"
                                    ],
                    'inline'    => true,
                ],
                [
                 'label' => "Guía de Finca", // Table column heading
                 'type' => "select2",
                 'name' => 'ingresoFinca_id', // the method that defines the relationship in your Model
                 'entity' => 'ingresoFinca', // the method that defines the relationship in your Model
                 'attribute' => "propietario", // foreign key attribute that is shown to user
                 'model' => "App\Models\IngresoFinca", // foreign key model
                 'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                    ],
                ],                     
                [// 1-n relationship 
                 'label' => "Destino", // Table column heading
                 'type' => "select2",
                 'name' => 'destino_id', // the method that defines the relationship in your Model
                 'entity' => 'destino', // the method that defines the relationship in your Model
                 'attribute' => "nombre", // foreign key attribute that is shown to user
                 'model' => "App\Models\EstablecimientoDestino", // foreign key model
                 'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                    ],
                ],
                [
                 'label' => "Guía de Subasta", // Table column heading
                 'type' => "select2",
                 'name' => 'ingresoSubasta_id', // the method that defines the relationship in your Model
                 'entity' => 'ingresoSubasta', // the method that defines the relationship in your Model
                 'attribute' => "codigoAnimales", // foreign key attribute that is shown to user
                 'model' => "App\Models\IngresoSubasta", // foreign key model
                 'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                    ],
                ],
                [ // corral
                    'name' => 'codigo',
                    'label' => "Codigo",
                    'type' => 'text',
                    'hint'       => 'Si tiene guía de subasta',
                    'wrapperAttributes' => [
                        'class' => 'form-group col-md-6'
                    ]
                ],
                [   // Number
                    'name' => 'pesoPie',
                    'label' => 'Peso en pie',
                    'type' => 'number',
                    // optionals
                    // 'prefix' => "$",
                    'suffix' => "Kg",
                    'default'    => 0,
                    'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                    ]
                ],
                [   // Number
                    'name' => 'pesoCanal',
                    'label' => 'Peso en canal',
                    'type' => 'number',
                    // optionals
                    // 'prefix' => "$",
                    'suffix' => "Kg",
                    'default'    => 0,
                    'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                    ]
                ],
                
            ], 'update/create/both');


        // $this->crud->removeField('name', 'update/create/both');
        // $this->crud->removeFields($array_of_names, 'update/create/both');

        // ------ CRUD COLUMNS
        //$this->crud->addColumn(); // add a single column, at the end of the stack
        // $this->crud->addColumns(); // add multiple columns, at the end of the stack
        // $this->crud->removeColumn('column_name'); // remove a column from the stack
        // $this->crud->removeColumns(['column_name_1', 'column_name_2']); // remove an array of columns from the stack
        // $this->crud->setColumnDetails('column_name', ['attribute' => 'value']); // adjusts the properties of the passed in column (by name)
        // $this->crud->setColumnsDetails(['column_1', 'column_2'], ['attribute' => 'value']);

        // ------ CRUD BUTTONS
        // possible positions: 'beginning' and 'end'; defaults to 'beginning' for the 'line' stack, 'end' for the others;
        // $this->crud->addButton($stack, $name, $type, $content, $position); // add a button; possible types are: view, model_function
        // $this->crud->addButtonFromModelFunction($stack, $name, $model_function_name, $position); // add a button whose HTML is returned by a method in the CRUD model
        // $this->crud->addButtonFromView($stack, $name, $view, $position); // add a button whose HTML is in a view placed at resources\views\vendor\backpack\crud\buttons
        // $this->crud->removeButton($name);
        // $this->crud->removeButtonFromStack($name, $stack);

        // ------ CRUD ACCESS
        // $this->crud->allowAccess(['list', 'create', 'update', 'reorder', 'delete']);
        // $this->crud->denyAccess(['list', 'create', 'update', 'reorder', 'delete']);

        // ------ CRUD REORDER
        // $this->crud->enableReorder('label_name', MAX_TREE_LEVEL);
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('reorder');

        // ------ CRUD DETAILS ROW
        $this->crud->enableDetailsRow();



        // NOTE: you also need to do allow access to the right users:
        // NOTE: you also need to do overwrite the showDetailsRow($id) method in your EntityCrudController to show whatever you'd like in the details row OR overwrite the views/backpack/crud/details_row.blade.php

        // ------ REVISIONS
        // You also need to use \Venturecraft\Revisionable\RevisionableTrait;
        // Please check out: https://laravel-backpack.readme.io/docs/crud#revisions
        // $this->crud->allowAccess('revisions');

        // ------ AJAX TABLE VIEW
        // Please note the drawbacks of this though:
        // - 1-n and n-n columns are not searchable
        // - date and datetime columns won't be sortable anymore
        // $this->crud->enableAjaxTable();

        // ------ DATATABLE EXPORT BUTTONS
        // Show export to PDF, CSV, XLS and Print buttons on the table view.
        // Does not work well with AJAX datatables.
        // $this->crud->enableExportButtons();

        // ------ ADVANCED QUERIES
        // $this->crud->addClause('active');
        // $this->crud->addClause('type', 'car');
        // $this->crud->addClause('where', 'name', '==', 'car');
        // $this->crud->addClause('whereName', 'car');
        // $this->crud->addClause('whereHas', 'posts', function($query) {
        //     $query->activePosts();
        // });
        // $this->crud->with(); // eager load relationships
        // $this->crud->orderBy();
        // $this->crud->groupBy();
        // $this->crud->limit();

        $this->crud->addButtonFromView('line', 'Imprimir Boleta', 'exportCanal', 'beginning');
    }

	public function store(StoreRequest $request)
	{
		// your additional operations before save here
        $redirect_location = parent::storeCrud();
        DB::table('settings')->increment('canal_bovino');
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
	}

	public function update(UpdateRequest $request)
	{
		// your additional operations before save here
        $redirect_location = parent::updateCrud();
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
	}

    public function showDetailsRow($id)
    {
        $Canal = MatanzaBovino::find($id);
        $BovinoSubasta = $Canal->ingresoSubasta;
        $BovinoFinca = $Canal->ingresoFinca;

        $destino = $Canal->destino;


        //Si no se ha asociado ningun ingres0
        if ( (count($BovinoSubasta) == 0) && (count($BovinoFinca) == 0) ) {
            $this->crud->allowAccess('canalNull_details_row');
            $this->crud->hasAccessOrFail('canalNull_details_row');
            
            if(count($destino) == 0){
               return view('crud::canalNull_details_row', ['nombre' => 'Aún no ha sido agregado']);
            }else{
                return view('crud::canalNull_details_row', ['nombre' => $destino->nombre]);
            }
        }else if( (count($BovinoSubasta) == 1) && (count($BovinoFinca) == 1) ){
            return view('crud::errorCanalBovino');
        }else if(count($BovinoSubasta) == 1){
            $this->crud->allowAccess('canalSubasta_details_row');
            $this->crud->hasAccessOrFail('canalSubasta_details_row');

            if(count($destino) == 0)
            {
               return view('crud::canalSubasta_details_row', ['values' => $BovinoSubasta, 'nombre' => 'Aún no ha sido agregado', 'codigo' => $Canal->codigo]);
            }else{
                    return view('crud::canalSubasta_details_row', ['values' => $BovinoSubasta, 'destino' => $destino, 'codigo' => $Canal->codigo]);
                }
        }else{
            $this->crud->allowAccess('canalFinca_details_row');
            $this->crud->hasAccessOrFail('canalFinca_details_row');

            if(count($destino) == 0)
            {
                return view('crud::canalFinca_details_row', ['values' => $BovinoFinca, 'nombre' => 'Aún no ha sido agregado']);
            }else{
                return view('crud::canalFinca_details_row', ['values' => $BovinoFinca, 'destino' => $destino]);
            }

        }
        
            //Si tiene ingreso de Subasta    
    }
}
