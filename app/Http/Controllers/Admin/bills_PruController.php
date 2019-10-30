<?php

namespace App\Http\Controllers\Admin;
use App\DataTables\Bills_PruDatatable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\comp_info;
use App\Admin;
use App\details_billsell;
use Illuminate\Support\Facades\Storage;

class bills_PruController extends Controller
{
    //  public function index()
    // {
    //     # code...
    // }


    public function index(Bills_PruDatatable $bills)
    {
        return $bills->render('admin.bills_pru.index', ['title' => trans('admin.bills_pru')]);
    }





    public function destroy($id)
    {
        $bills_pru=details_billpru::find($id);
        Storage::delete($bills_pru->logo);
        $bills_pru->delete();
        session()->flash('success', trans('admin.deleted_record'));
		return redirect(aurl('manufacturers'));
    }
    public function multi_delete()
    {
        if (is_array(request('item'))) {
            foreach(request('item') as $id){
                $bills_pru=details_billpru::find($id);
                Storage::delete($bills_pru->logo);
                $bills_pru->delete();  
            }
		} else {
            $bills_pru=details_billpru::find(request('item'));
            Storage::delete($bills_pru->logo);
            $bills_pru->delete();
		}
		session()->flash('success', trans('admin.deleted_record'));
		return redirect(aurl('bills'));
    }
  
}



