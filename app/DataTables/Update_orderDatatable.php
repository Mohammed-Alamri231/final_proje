<?php
namespace App\DataTables;

use App\details_billpru;
use App\Model\Mall;
use App\Model\Stock;
use Yajra\DataTables\Services\DataTable;
class Update_orderDatatable extends DataTable {
	/**
	 * Build DataTable class. 
	 *
	 * @param mixed $query Results from query() method.
	 * @return \Yajra\DataTables\DataTableAbstract
	 */
	public function dataTable($query) {
		return datatables($query)
							//	->addColumn('checkbox', 'admin.update_order.btn.checkbox')
								->addColumn('edit', 'admin.update_order.btn.edit')
			//->addColumn('delete', 'admin.update_order.btn.delete')
								->rawColumns([
									'edit',
									//'delete',
							//		'checkbox',
								]);
	}
	/**
	 * Get query source of dataTable.
	 *
	 * @param \App\User $model
	 * @return \Illuminate\Database\Eloquent\Builder $request->input('id_bill')
	 */
	
	public function query() {
		//  if(!empty(request('product'))){  
			 $key = $this->id_billpru;
			// $key1 = $this->id_product;
			// $id_bill = $request->input('product');
			//  return dd($key);
		//	$restaurant = Stock::where('stock_name', $key);
       // return $this->applyScopes($restaurant);
	   return details_billpru::query()->select('details_billprus.*')->where('id_billpru', $key);
	  //return Stock::query()->with('company_id')->select('stocks.*')->where('stock_name', $key);
	  //return Stock::where('stock_name',$key);
	 //}
	}
	/**
	 * Optional method if you want to use html builder.
	 *
	 * @return \Yajra\DataTables\Html\Builder
	 */
	public function html() {
		return $this->builder()
		            ->columns($this->getColumns())
					->minifiedAjax()
					->parameters([
			// 	'dom'        => 'Blfrtip',
			// 	'lengthMenu' => [[10, 25, 50, 100], [10, 25, 50, trans('admin.all_record')]],
			// 	'buttons'    => [
			// 		[
			// 			'text' => '<i class="fa fa-plus"></i> '.trans('admin.add'), 'className' => 'btn btn-info', "action" => "function(){
			// 				window.location.href = '".\URL::current()."/create';
			// 			}"],
			// 		['extend' => 'print', 'className' => 'btn btn-primary', 'text' => '<i class="fa fa-print"></i>'],
			// 		['extend' => 'csv', 'className' => 'btn btn-info', 'text' => '<i class="fa fa-file"></i> '.trans('admin.ex_csv')],
			// 		['extend' => 'excel', 'className' => 'btn btn-success', 'text' => '<i class="fa fa-file"></i> '.trans('admin.ex_excel')],
			// 		['extend' => 'reload', 'className' => 'btn btn-default', 'text' => '<i class="fa fa-refresh"></i>'],
			// 		[
			// 			'text' => '<i class="fa fa-trash"></i>', 'className' => 'btn btn-danger delBtn'],
			// 	],
			// 	'initComplete' => " function () {
		    //         this.api().columns([2,3]).every(function () {
		    //             var column = this;
		    //             var input = document.createElement(\"input\");
		    //             $(input).appendTo($(column.footer()).empty())
		    //             .on('keyup', function () {
		    //                 column.search($(this).val(), false, false, true).draw();
		    //             });
		    //         });
		    //     }",
			// 	'language' => datatable_lang(),
			 ]);
	}
	/**
	 * Get columns.
	 *
	 * @return array
	 */
	protected function getColumns() {
		return [
			// [
			// 	'name'       => 'checkbox',
			// 	'data'       => 'checkbox',
			// 	'title'      => '<input type="checkbox" class="check_all" onclick="check_all()" />',
			// 	'exportable' => false,
			// 	'printable'  => false,
			// 	'orderable'  => false,
			// 	'searchable' => false,
			// // ], [
			// // 	'name'  => 'id',
			// // 	'data'  => 'id',
			// // // 	'title' => 'id',
			// ],
			 [
			
				'name'  => 'id_billpru',
				'data'  => 'id_billpru',
				'title' => 'id_billpru',
			], 
			[
				'name'  => 'id_product',
				'data'  => 'id_product',
				'title' => trans('admin.id_product'),
			],[
				'name'  => 'name_pro',
				'data'  => 'name_pro',
				'title' => trans('admin.name_pro'),
			],
			[
				'name'  => 'quantity',
				'data'  => 'quantity',
				'title' => trans('admin.quantity'),
			],
			 [
				'name'  => 'price',
				'data'  => 'price',
				'title' => trans('admin.price'),
			// ], [
			// 	'name'  => 'date_end',
			// 	'data'  => 'date_end',
			// 	'title' => trans('admin.date_end'),
			], [
				'name'       => 'edit',
				'data'       => 'edit',
				'title'      => trans('admin.edit'),
				'exportable' => false,
				'printable'  => false,
				'orderable'  => false,
				'searchable' => false,
			// ], [
			// 	'name'       => 'delete',
			// 	'data'       => 'delete',
			// 	'title'      => trans('admin.delete'),
			// 	'exportable' => false,
			// 	'printable'  => false,
			// 	'orderable'  => false,
			// 	'searchable' => false,
			],
		];
	}
	/**
	 * Get filename for export.
	 *
	 * @return string
	 */
	protected function filename() {
		
		return 'details_billpru_'.date('YmdHis');
	}
}