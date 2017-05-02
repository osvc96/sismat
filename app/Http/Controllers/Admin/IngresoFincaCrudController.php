<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\IngresoFincaRequest as StoreRequest;
use App\Http\Requests\IngresoFincaRequest as UpdateRequest;

use Illuminate\Support\Facades\DB;

class IngresoFincaCrudController extends CrudController
{

    public function setUp()
    {

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setModel("App\Models\IngresoFinca");
        $this->crud->setRoute("admin/ingresoFinca");
        $this->crud->setEntityNameStrings('Ingreso', 'Ingreso con guia de finca');

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/

        //$this->crud->setFromDb();

        $this->crud->setColumns(
            [
                [
                    'name' => 'guia', // The db column name
                    'label' => "Guía" // Table column heading
                ],
                [
                    'name' => 'propietario', // The db column name
                    'label' => "Propietario" // Table column heading
                ],
                [
                    'name' => 'destinos', // The db column name
                    'label' => "Destinos" // Table column heading
                ],
                [
                    'name' => 'corral', // The db column name
                    'label' => "Corral" // Table column heading
                ],
                [
                    'name' => 'observaciones', // The db column name
                    'label' => "Observaciones" // Table column heading
                ],
                [
                    'name' => 'total', // The db column name
                    'label' => "Total de animales" // Table column heading
                ],
                [
                    'name' => 'created_at', // The db column name
                    'label' => "Hora y Fecha de Ingreso" // Table column heading
                ]
            ]
        );


        $this->crud->addFields([
            [ // # de guia
                'name' => 'guia',
                'label' => "Guia",
                'type' => 'text',
            ],
            [
                 // 1-n relationship 
                 'label' => "Propietario", // Table column heading
                 'type' => "select",
                 'name' => 'idProductor', 
                 'entity' => 'productor', // the method that defines the relationship in your Model
                 'attribute' => "nombre", // foreign key attribute that is shown to user
                 'model' => "App\Models\ProductorFinca", // foreign key model
                ],
            [ // Destinos
                'name' => 'destinos',
                'label' => "Destinos",
                'type' => 'text',
            ],
            [
                'name' => 'terneras',
                'label' => "Terneras",
                'type' => 'number',
            ],
            [
                'name' => 'terneros',
                'label' => "Terneros",
                'type' => 'number',
            ],
            [
                'name' => 'novillas',
                'label' => "Novillas",
                'type' => 'number',
            ],
            [
                'name' => 'novillos',
                'label' => "Novillos",
                'type' => 'number',
            ],
            [
                'name' => 'vacas',
                'label' => "Vacas",
                'type' => 'number',
            ],
            [
                'name' => 'toros',
                'label' => "Toros",
                'type' => 'number',
            ],
            [ // corral
                'name' => 'corral',
                'label' => "Corral",
                'type' => 'text',
            ],
            [   // Textarea
                'name' => 'observaciones',
                'label' => 'Observaciones',
                'type' => 'textarea'
            ],

        ], 'create/update/both');

        // ------ CRUD FIELDS
        // $this->crud->addField($options, 'update/create/both');
        // $this->crud->addFields($array_of_arrays, 'update/create/both');
        // $this->crud->removeField('name', 'update/create/both');
        // $this->crud->removeFields($array_of_names, 'update/create/both');

        // ------ CRUD COLUMNS
        // $this->crud->addColumn(); // add a single column, at the end of the stack
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
        $this->crud->allowAccess('bovino_details_row');
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('details_row');
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
    }
    public function showDetailsRow($id)
    {
        $this->crud->hasAccessOrFail('bovino_details_row');

        $detalle = DB::table('ingresofincas')->where('id', $id)->first();

        // load the view from /resources/views/vendor/backpack/crud/ if it exists, otherwise load the one in the package
        return view('crud::bovino_details_row', ['values' => $detalle]);
    }

	public function store(StoreRequest $request)
	{
		// your additional operations before save here
        $redirect_location = parent::storeCrud();
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
}
