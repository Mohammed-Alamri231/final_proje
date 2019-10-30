<?php

namespace App\Http\Controllers\Admin;
use App\DataTables\CompanyDatatable;
use App\DataTables\PharmacyDatatable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\comp_info;
use App\Admin;
use App\pharm_info;
use Illuminate\Support\Facades\Storage;

class pharmController extends Controller
{
    //  public function index()
    // {
    //     # code...
    // }


    public function index(PharmacyDatatable $pharmacy)
    {
        return $pharmacy->render('admin.pharmacy_info.index', ['title' => trans('admin.pharmacy_info')]);
    }


//     public function store( Request  $request)
//     {

        
//         $this->validate(request(),['name_in'=>'required',
//         'email'=>'required|email|unique:admins',
//         'password'=>'required|min:6'
//     ]);
        
//         $reg_comp = new comp_info;

//         $img_name= time() . '.' . $request->icon->getClientOriginalExtension();

//         $reg_comp->company_icon = $img_name;

//         $reg_comp->company_name = request('name_in');

//         $reg_comp->company_tel = request('tel');

//         $reg_comp->company_phone = request('phone');

//         $reg_comp->company_email = request('email');

//         $reg_comp->company_address = request('add');

//         $reg_comp->company_type = request('type');

//         $reg_comp->guarantee = request('gurantee');

//         $reg_comp->company_account = request('comp_acc');

//         $reg_comp->owner_id = request('owner_id');

//         $reg_comp->password = bcrypt( $request-> password);

//         $permit_name= time() . '.' . $request->permit->getClientOriginalExtension();

//         $reg_comp->med_permit = $permit_name;

//         $reg_comp->save();

//         $reg_admin=new Admin;
       
//         $reg_admin->name = request('name_in');

//         $reg_admin->email = request('email');

//         $reg_admin->type = 'company';
        
//         $reg_admin->password = bcrypt( $request-> password); 

//         $reg_admin->save();

//         $request->icon->move(public_path('upload'),$img_name);

//         $request->permit->move(public_path('upload'),$permit_name);
//         session()->flash('success',trans('admin.record_added'));

//      return back();
//     }

    
// public function storepharm( Request  $request)
// {

//     $this->validate(request(),['name_in'=>'required',
//     'email'=>'required|email|unique:admins',
//     'password'=>'required|min:6'
//      ]);
   
    
//     $reg_pharm = new pharm_info;

//     $img_name= time() . '.' . $request->icon->getClientOriginalExtension();

//     $reg_pharm->pharm_icon = $img_name;

  

//     $reg_pharm->pharm_name = request('name_in');

//     $reg_pharm->pharm_tel = request('tel');

//     $reg_pharm->pharm_phone = request('phone');

//     $reg_pharm->pharm_email = request('email');

//     $reg_pharm->pharm_address = request('add');

//     $reg_pharm->pharm_type = request('type');


//     $reg_pharm->guarantee = request('gurantee');

//     $reg_pharm->pharm_acc = request('comp_acc');

//     $reg_pharm->id_center = request('owner_id');

//     $reg_pharm->password = bcrypt( $request-> password);

//     $permit_name= time() . '.' . $request->permit->getClientOriginalExtension();

//     $reg_pharm->med_permit = $permit_name;

//     $reg_pharm->save();

//     $reg_admin=new Admin;
  
//     $reg_admin->name = request('name_in');

//     $reg_admin->email = request('email');

//     $reg_admin->type ='pharmacy';

//     $reg_admin->password = bcrypt( $request-> password); 

//     $reg_admin->save();

//     $request->icon->move(public_path('upload'),$img_name);

//     $request->permit->move(public_path('upload'),$permit_name);

//     session()->flash('success',trans('admin.record_added'));

//  return back();
// }



    public function destroy($id)
    {
        $pharm_info=pharm_info::find($id);
        Storage::delete($pharm_info->logo);
        $pharm_info->delete();
        session()->flash('success', trans('admin.deleted_record'));
		return redirect(aurl('manufacturers'));
    }
    public function multi_delete()
    {
        if (is_array(request('item'))) {
            foreach(request('item') as $id){
                $pharm_info=pharm_info::find($id);
                Storage::delete($pharm_info->logo);
                $pharm_info->delete();  
            }
		} else {
            $pharm_info=pharm_info::find(request('item'));
            Storage::delete($pharm_info->logo);
            $pharm_info->delete();
		}
		session()->flash('success', trans('admin.deleted_record'));
		return redirect(aurl('pharm_info'));
    }
  
}



