<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\IngresoPorcinoRequest as StoreRequest;
use App\Http\Requests\IngresoPorcinoRequest as UpdateRequest;

class IngresoPorcinoCrudController extends CrudController
{

    public function setUp()
    {

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setModel("App\Models\IngresoPorcino");
        $this->crud->setRoute("admin/ingresoPorcino");
        $this->crud->setEntityNameStrings('Porcinos', 'Ingreso de Porcinos');

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/

        //$this->crud->setFromDb();['Propietario', 'Marca', 'Destinos', 'Machos', 'Hembras','Total','Corral', 'Observaciones']
        $this->crud->setColumns(
            [
                [
                'name' => 'propietario', // The db column name
                'label' => "Propietario" // Table column heading
                ],
                [
                    'name' => 'marca', // The db column name
                    'label' => "Marca" // Table column heading
                ],
                [
                    'name' => 'destinos', // The db column name
                    'label' => "Destinos" // Table column heading
                ],
                [
                    'name' => 'machos', // The db column name
                    'label' => "Machos" // Table column heading
                ],
                [
                    'name' => 'hembras', // The db column name
                    'label' => "Hembras" // Table column heading
                ],
                [
                    'name' => 'total', // The db column name
                    'label' => "Total" // Table column heading
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
                'name' => 'created_at', // The db column name
                'label' => "Hora y Fecha de Ingreso" // Table column heading
                ]
            ]
        );

        // ------ CRUD FIELDS
        //$this->crud->addField(, 'update/create/both');

        $this->crud->addFields([
            [ // Propietario
            'name' => 'propietario',
            'label' => "Nombre del propietario",
            'type' => 'text',
            ],
            [ // Marca
            'name' => 'marca',
            'label' => "Marca",
            'type' => 'text',],
            [ // Destinos
                'name' => 'destinos',
                'label' => "Destinos",
                'type' => 'text',
            ],
            [   // Machos
                'name' => 'machos',
                'label' => 'Cantidad de machos',
                'type' => 'number',
            ],
            [   // Hembras
                'name' => 'hembras',
                'label' => 'Catidad de hembras',
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

        ], 'update/create/both');
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
