<?php

namespace App\Http\Controllers\Admin;
use App\DataTables\BillsDatatable;
use App\DataTables\PharmacyDatatable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\comp_info;
use App\Admin;
use App\details_billsell;
use Illuminate\Support\Facades\Storage;

class billsController extends Controller
{
    //  public function index()
    // {
    //     # code...
    // }


    public function index(BillsDatatable $bills)
    {
        return $bills->render('admin.bills.index', ['title' => trans('admin.bills')]);
    }




    public function destroy($id)
    {
        $bills=details_billsell::find($id);
        Storage::delete($bills->logo);
        $bills->delete();
        session()->flash('success', trans('admin.deleted_record'));
		return redirect(aurl('manufacturers'));
    }
    public function multi_delete()
    {
        if (is_array(request('item'))) {
            foreach(request('item') as $id){
                $bills=details_billsell::find($id);
                Storage::delete($bills->logo);
                $bills->delete();  
            }
		} else {
            $bills=details_billsell::find(request('item'));
            Storage::delete($bills->logo);
            $bills->delete();
		}
		session()->flash('success', trans('admin.deleted_record'));
		return redirect(aurl('bills'));
    }
  
}



