<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\CompanyDatatable;
use Illuminate\Http\Request;
use App\comp_info;
use App\Admin;
use App\pharm_info;
use App\accept;
use DB;
use App\touch;

use Illuminate\Support\Facades\Mail;
class compController extends Controller
{
    

    
    public function index(CompanyDatatable $company)
    {
        return $company->render('admin.company_info.index', ['title' => trans('admin.company_info')]);
    }

    public function accepting_comp( Request  $request)
    {
        $member=accept::all()->where('it_as',"company");

        return view('front_end.accepting_comp',compact('member'));
    }

    public function accepting_pharm( Request  $request)
    {
        $member=accept::all()->where('it_as','=',"pharmacy");

        return view('front_end.accepting_pharm',compact('member'));
    }

    public function delete(Request $request , $id)
    {
      
         DB::table('accepts')->where('id' , $id)->delete();

         $email = request('email');
    $reason =request('reason');
    $messageData = [
        'email' => $email,
        'reason' => $reason,
    ] ; 
    Mail::send('admin.emails.mess_comp', $messageData , function ($message)use($email){
        $message->to($email)->subject('Suggestione from E-com Website');
    });
        
        return back();
    } 

    public function store_comp( Request  $request)
    {

      
         $this->validate(request(),['name_in'=>'required',
         'email'=>'required|email|unique:admins',
         'permit'=>'required|mimes:docx,doc',
         'icon' => 'required',
         'phone'=>'required',
         'password'=>'required|min:6'
          ]);
        
        $reg_comp = new accept;

        $img_name= time() . '.' . $request->icon->getClientOriginalExtension();

        $reg_comp->icon = $img_name;

        $reg_comp->name = request('name_in');

        // $reg_comp->tel = request('tel');

        $reg_comp->phone = request('phone');

        $reg_comp->email = request('email');

        $reg_comp->address = request('add');

        $reg_comp->type = request('type');

        $reg_comp->guarantee = request('gurantee');

        // $reg_comp->account = request('comp_acc');

        // $reg_comp->owner= request('owner_id');

        $reg_comp->password =request('password');

        $permit_name= time() . '.' . $request->permit->getClientOriginalExtension();

        $reg_comp->permit = $permit_name;
        
        $reg_comp->it_as = 'company';

        $reg_comp->save();

        
        $request->icon->move(public_path('upload'),$img_name);

        $request->permit->move(public_path('upload'),$permit_name);
        session()->flash('success',trans('admin.record_added'));

     return view('front_end.index');
    }

    
public function store_pharm( Request  $request)
{

     $this->validate(request(),['name_in'=>'required',
     'email'=>'required|email|unique:admins',
     'permit'=>'required|mimes:docx,doc',
     'icon' => 'required',
     'phone'=>'required',
     'password'=>'required|min:6'
      ]);
    $reg_comp = new accept;

    $img_name= time() . '.' . $request->icon->getClientOriginalExtension();

    $reg_comp->icon = $img_name;

    $reg_comp->name = request('name_in');

    // $reg_comp->tel = request('tel');

    $reg_comp->phone = request('phone');

    $reg_comp->email = request('email');

    $reg_comp->address = request('add');

    $reg_comp->type = request('type');

    $reg_comp->guarantee = request('gurantee');

    // $reg_comp->account = request('comp_acc');

    // $reg_comp->owner= request('owner_id');

    $reg_comp->password =request('password');

    $permit_name= time() . '.' . $request->permit->getClientOriginalExtension();

    $reg_comp->permit = $permit_name;

    $reg_comp->it_as = 'pharmacy';
  
    $reg_comp->save();

    
    $request->icon->move(public_path('upload'),$img_name);

    $request->permit->move(public_path('upload'),$permit_name);
    session()->flash('success',trans('admin.record_added'));

  return back();
}


public function accept_comp( Request  $request, $id)
{

    
    $this->validate(request(),['name_in'=>'required',
    'email'=>'required|email|unique:admins',
    'password'=>'required|min:6'
   
     ]);
    

     $reg_admin=new Admin;
   
     $reg_admin->name = request('name_in');
 
     $reg_admin->email = request('email');
 
     $reg_admin->type = 'company';
     
     $reg_admin->password = bcrypt( $request-> password); 
 
     $reg_admin->save();

    $reg_comp = new comp_info;

   /* $img_name= time() . '.' . $request->icon->getClientOriginalExtension();*/

    $reg_comp->company_icon = request('icon');

    $reg_comp->company_name = request('name_in');

    // $reg_comp->company_tel = request('tel');

    $reg_comp->company_phone = request('phone');

    $reg_comp->company_email = request('email');

    $reg_comp->company_address = request('add');

    $reg_comp->company_type = request('type');

    $reg_comp->guarantee = request('gurantee');

    // $reg_comp->company_account = request('comp_acc');

    // $reg_comp->owner_id = request('owner_id');

    $reg_comp->password = bcrypt( $request-> password);

    /*$permit_name= time() . '.' . $request->permit->getClientOriginalExtension();*/

    $reg_comp->med_permit = request('permit');

    $reg_comp->save();

    $id_type = \DB::table('comp_infos')->max('company_id');

    
    DB::table('admins')
                ->where([
                ['email', $email],
                ['type','company']
                ])
                ->update(['id_type' => $id_type]); 



    DB::table('accepts')->where('id' , $id)->delete();

    $email = request('email');
  
    $messageData = [
        'email' => $email,
    ] ; 
    Mail::send('admin.emails.accept', $messageData , function ($message)use($email){
        $message->to($email)->subject('Suggestione from E-com Website');
    });
    /*$request->icon->move(public_path('upload'),$img_name);

    $request->permit->move(public_path('upload'),$permit_name);*/
    session()->flash('success',trans('admin.record_added'));

 return back();
}


public function accept_pharm( Request  $request ,$id)
{

$this->validate(request(),['name_in'=>'required',
'email'=>'required|email|unique:admins',
'password'=>'required|min:6'
 ]);

$email =request('email');
 $reg_admin=new Admin;

 $reg_admin->name = request('name_in');
 
 $reg_admin->email = request('email');
 
 $reg_admin->type ='pharmacy';
 
 $reg_admin->password = bcrypt( $request-> password); 
 
 $reg_admin->save();

$reg_pharm = new pharm_info;

/*$img_name= time() . '.' . $request->icon->getClientOriginalExtension();*/

$reg_pharm->pharm_icon =request('icon');



$reg_pharm->pharm_name = request('name_in');

// $reg_pharm->pharm_tel = request('tel');

$reg_pharm->pharm_phone = request('phone');

$reg_pharm->pharm_email = request('email');

$reg_pharm->pharm_address = request('add');

$reg_pharm->pharm_type = request('type');


$reg_pharm->guarantee = request('gurantee');

// $reg_pharm->pharm_acc = request('comp_acc');

// $reg_pharm->id_center = request('owner_id');

$reg_pharm->password = bcrypt( $request-> password);

/*$permit_name= time() . '.' . $request->permit->getClientOriginalExtension();*/

$reg_pharm->med_permit = request('permit');

$reg_pharm->save();

$id_type = \DB::table('pharm_infos')->max('id');


DB::table('admins')
                   ->where([
                       
                    ['email', $id_billpru],
                    ['type','parmacy']
                    ])
                   ->update(['id_type' => $id_type]); 




DB::table('accepts')->where('id' , $id)->delete();


/*$request->icon->move(public_path('upload'),$img_name);

$request->permit->move(public_path('upload'),$permit_name);*/

session()->flash('success',trans('admin.record_added'));

return back();
}



public function destroy($id)
{
    $manufacturers=comp_info::find($id);
    Storage::delete($manufacturers->logo);
    $manufacturers->delete();
    session()->flash('success', trans('admin.deleted_record'));
    return redirect(aurl('manufacturers'));
}
public function multi_delete()
{
    if (is_array(request('item'))) {
        foreach(request('item') as $id){
            $manufacturers=comp_info::find($id);
            Storage::delete($manufacturers->logo);
            $manufacturers->delete();  
        }
    } else {
        $manufacturers=comp_info::find(request('item'));
        Storage::delete($manufacturers->logo);
        $manufacturers->delete();
    }
    session()->flash('success', trans('admin.deleted_record'));
    return redirect(aurl('company_info'));
}


public function touch(Request $request)
{
//    $new_touch = new touch;

//    $new_touch-> fname = request('fname');
//    $new_touch-> lname = request('lname');

//    $new_touch-> subject = request('subject');

//    $new_touch-> email = request('email');
//    $new_touch-> message = request('message');

   
//    $new_touch->save();

    
$data = $request->all();
//   echo "<pre>" ;print_r($data);die;
  
  $email = "fahadgoogl5@gmail.com";
  $messageData = [
      'fname'=>$data['fname'],
      'lname'=>$data['lname'],
      'email'=>$data['email'],
      'subject'=>$data['subject'],
      'comment'=>$data['message']
  ];
  Mail::send('admin.emails.Suggestions' , $messageData , function ($message)use($email){
      $message->to($email)->subject('Suggestione from E-com Website');
  });
    //   echo 'test'; die; 
   return back();

}
  
}
