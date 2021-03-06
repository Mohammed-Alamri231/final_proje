<?php
namespace App\DataTables;
use App\details_billsell;
use Yajra\DataTables\Services\DataTable;
class BillsDatatable extends DataTable {
	/**
	 * Build DataTable class.
	 *
	 * @param mixed $query Results from query() method.
	 * @return \Yajra\DataTables\DataTableAbstract
	 */
	public function dataTable($query) {
		return datatables($query)
			->addColumn('checkbox', 'admin.bills.btn.checkbox')
			
			->addColumn('delete', 'admin.bills.btn.delete')
			
			->rawColumns([
				
				'delete',
				'checkbox',
			
			]);
	}
	/**
	 * Get query source of dataTable.
	 *
	 * @param \App\User $model
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function query() {
		return details_billsell::query();
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
				'dom'        => 'Blfrtip',
				'lengthMenu' => [[10, 25, 50, 100], [10, 25, 50, trans('admin.all_record')]],
				'buttons'    => [
					//[
						// 'text' => '<i class="fa fa-plus"></i> '.trans('admin.add'), 'className' => 'btn btn-info', "action" => "function(){
						// 	window.location.href = '".\URL::current()."/create';
						// }"],
					['extend' => 'print', 'className' => 'btn btn-primary', 'text' => '<i class="fa fa-print"></i>'],
					['extend' => 'csv', 'className' => 'btn btn-info', 'text' => '<i class="fa fa-file"></i> '.trans('admin.ex_csv')],
					['extend' => 'excel', 'className' => 'btn btn-success', 'text' => '<i class="fa fa-file"></i> '.trans('admin.ex_excel')],
					['extend' => 'reload', 'className' => 'btn btn-default', 'text' => '<i class="fa fa-refresh"></i>'],
					[
						'text' => '<i class="fa fa-trash"></i>', 'className' => 'btn btn-danger delBtn'],
				],
				'initComplete' => " function () {
		            this.api().columns([1,2,3]).every(function () {
		                var column = this;
		                var input = document.createElement(\"input\");
		                $(input).appendTo($(column.footer()).empty())
		                .on('keyup', function () {
		                    column.search($(this).val(), false, false, true).draw();
		                });
		            });
		        }",
				'language' => datatable_lang(),
			]);
	}
	/**
	 * Get columns.
	 * 
	 * @return array
	 */
	protected function getColumns() {
		return [
			[
				'name'       => 'checkbox',
				'data'       => 'checkbox',
				'title'      => '<input type="checkbox" class="check_all" onclick="check_all()" />',
				'exportable' => false,
				'printable'  => false,
				'orderable'  => false,
				'searchable' => false,
			], [
				'name'  => 'id_billsell',
				'data'  => 'id_billsell',
				'title' => 'id_billsell',
			], [
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
				'name'  => 'orignal_price',
				'data'  => 'orignal_price',
				'title' => trans('admin.orignal_price'),
			], [
				'name'  => 'price',
				'data'  => 'price',
				'title' => trans('admin.price'),
			], [
				'name'  => 'date_end',
				'data'  => 'date_end',
				'title' => trans('admin.date_end'),
			],[
				'name'       => 'delete',
				'data'       => 'delete',
				'title'      => trans('admin.delete'),
				'exportable' => false,
				'printable'  => false,
				'orderable'  => false,
				'searchable' => false,
			],
		];
	}
	/**
	 * Get filename for export.
	 *
	 * @return string
	 */
	protected function filename() {
		return 'Users_'.date('YmdHis');
	}
}