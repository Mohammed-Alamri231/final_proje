<?php
namespace App\DataTables;
use App\comp_info;
use Yajra\DataTables\Services\DataTable;
class CompanyDatatable extends DataTable {
	/**
	 * Build DataTable class.
	 *
	 * @param mixed $query Results from query() method.
	 * @return \Yajra\DataTables\DataTableAbstract
	 */
	public function dataTable($query) {
		return datatables($query)
			->addColumn('checkbox', 'admin.company_info.btn.checkbox')
			
			->addColumn('delete', 'admin.company_info.btn.delete')
			
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
		return comp_info::query();
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
					// ['extend' => 'csv', 'className' => 'btn btn-info', 'text' => '<i class="fa fa-file"></i> '.trans('admin.ex_csv')],
					// ['extend' => 'excel', 'className' => 'btn btn-success', 'text' => '<i class="fa fa-file"></i> '.trans('admin.ex_excel')],
					['extend' => 'reload', 'className' => 'btn btn-default', 'text' => '<i class="fa fa-refresh"></i>'],
					[
						'text' => '<i class="fa fa-trash"></i>', 'className' => 'btn btn-danger delBtn'],
				],
				'initComplete' => " function () {
		            this.api().columns([2,3,4]).every(function () {
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
				'name'  => 'company_id',
				'data'  => 'company_id',
				'title' => '#',
			], [
				'name'  => 'company_name',
				'data'  => 'company_name',
				'title' => trans('admin.company_name'),
			],[
				'name'  => 'company_address',
				'data'  => 'company_address',
				'title' => trans('admin.company_address'),
			],
			[
				'name'  => 'company_tel',
				'data'  => 'company_tel',
				'title' => trans('admin.company_tel'),
			],
			[
				'name'  => 'company_phone',
				'data'  => 'company_phone',
				'title' => trans('admin.company_phone'),
			], [
				'name'  => 'company_email',
				'data'  => 'company_email',
				'title' => trans('admin.email'),
			], [
				'name'  => 'company_account',
				'data'  => 'company_account',
				'title' => trans('admin.company_account'),
			], [
				'name'  => 'guarantee',
				'data'  => 'guarantee',
				'title' => trans('admin.guarantee'),
			], [
				'name'  => 'owner_id',
				'data'  => 'owner_id',
				'title' => trans('admin.owner_id'),
			],  [
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
		return 'comp_info_'.date('YmdHis');
	}
}