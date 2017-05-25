<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\HojaTransporteRequest as StoreRequest;
use App\Http\Requests\HojaTransporteRequest as UpdateRequest;

class HojaTransporteCrudController extends CrudController
{

    public function setUp()
    {

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setModel("App\Models\HojaTransporte");
        $this->crud->setRoute("admin/hojasTransporte");
        $this->crud->setEntityNameStrings('hoja de transporte', 'hojas de transporte');

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/

        $this->crud->addFields([
            [// 1-n relationship 
                 'label' => "Transportista", // Table column heading
                 'type' => "select2",
                 'name' => 'id_transportista', // the method that defines the relationship in your Model
                 'entity' => 'transportista', // the method that defines the relationship in your Model
                 'attribute' => "nombre", // foreign key attribute that is shown to user
                 'model' => "App\Models\Transportista", // foreign key model
            ]/*,
            [       // Select2Multiple = n-n relationship (with pivot table)
                'label' => "Canales Bovino",
                'type' => 'select2_multiple',
                'name' => 'canalesBovino', // the method that defines the relationship in your Model
                'entity' => 'canalesBovino', // the method that defines the relationship in your Model
                'attribute' => 'canal', // foreign key attribute that is shown to user
                'model' => "App\Models\MatanzaBovino", // foreign key model
                'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
            ],
            [       // Select2Multiple = n-n relationship (with pivot table)
                'label' => "Canales Porcino",
                'type' => 'select2_multiple',
                'name' => 'canalesPorcino', // the method that defines the relationship in your Model
                'entity' => 'canalesPorcino', // the method that defines the relationship in your Model
                'attribute' => 'canal', // foreign key attribute that is shown to user
                'model' => "App\Models\MatanzaPorcino", // foreign key model
                'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
            ],*/

        ], 'create/update/both');

        // ------ CRUD FIELDS
        // $this->crud->addField($options, 'update/create/both');
        // $this->crud->addFields($array_of_arrays, 'update/create/both');
        // $this->crud->removeField('name', 'update/create/both');
        // $this->crud->removeFields($array_of_names, 'update/create/both');

        // ------ CRUD COLUMNS
        $this->crud->addColumns([
                [
                    'name' => 'id', // The db coluSmn name
                    'label' => "Número Consecutivo" // Table column heading
                ],
                [
                   // 1-n relationship
                   'label' => "Nombre del transportista", // Table column heading
                   'type' => "select",
                   'name' => 'id_transportista', // the column that contains the ID of that connected entity;
                   'entity' => 'transportista', // the method that defines the relationship in your Model
                   'attribute' => "nombre", // foreign key attribute that is shown to user
                   'model' => "App\Models\Transportista", // foreign key model
                ],
                [
                   // n-n relationship (with pivot table)
                   'label' => "Canales Bovino", // Table column heading
                   'type' => "select_multiple",
                   'name' => 'canalesBovino', // the method that defines the relationship in your Model
                   'entity' => 'canalesBovino', // the method that defines the relationship in your Model
                   'attribute' => "canal", // foreign key attribute that is shown to user
                   'model' => "App\Models\MatanzaBovino", // foreign key model
                ],
                [
                   // n-n relationship (with pivot table)
                   'label' => "Canales Porcino", // Table column heading
                   'type' => "select_multiple",
                   'name' => 'canalesPorcino', // the method that defines the relationship in your Model
                   'entity' => 'canalesPorcino', // the method that defines the relationship in your Model
                   'attribute' => "canal", // foreign key attribute that is shown to user
                   'model' => "App\Models\MatanzaPorcino", // foreign key model
                ],
                [
                    'name' => 'updated_at',
                    'label' => 'Fecha de emisión'
                ],

        ]); // add multiple columns, at the end of the stack
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
        // $this->crud->enableDetailsRow();
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

        $this->crud->addButtonFromView('line', 'exportar', 'export', 'beginning');
        
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
