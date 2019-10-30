<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\StocksDatatable;
use Illuminate\Http\Request;
use App\Model\Stock;
use Illuminate\Support\Facades\Storage;

class StocksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(StocksDatatable $trade)
    {
        return $trade->render('admin.stocks.index',['title'=>trans('admin.stocks')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.stocks.create',['title' => trans('admin.add')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data =$this->validate(request(),[
            'stock_name'=>'required',
            'stock_address'=>'required',
            'company_id'=>'required|numeric',
            'lat'=>'sometimes|nullable',
            'lng'=>'sometimes|nullable',
            'icon'=>'required|'.v_image(),
        ],[],[
            'stock_name'=>trans('admin.stock_name'),
            'stock_address'=>trans('admin.stock_address'),
            'company_id'=>trans('admin.company_id'),
            'lat'=>trans('admin.lat'),
            'lng'=>trans('admin.lng'),
            'icon'=>trans('admin.icon'),
        ]);
        if(request()->hasFile('icon'))
        {
            $data['icon'] = up()->upload([
                'file'=>'icon',
                'path'=>'stocks',
                'upload_type'=>'single',
                'delete_file' => '',
            ]);
        }
        Stock::create($data);
    session()->flash('success',trans('admin.record_added'));
    return redirect(aurl('stocks'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stock = Stock::find($id);
        $title =trans('admin.edit');
        return view('admin.stocks.edit',compact('stock','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, $id)
    {
        $data =$this->validate(request(),[
            'stock_name'=>'required',
            'stock_address'=>'required',
            'company_id'=>'required|numeric',
            'lat'=>'sometimes|nullable',
            'lng'=>'sometimes|nullable',
            'icon'=>'required|'.v_image(),
        ],[],[
            'stock_name'=>trans('admin.stock_name'),
            'stock_address'=>trans('admin.stock_address'),
            'company_id'=>trans('admin.company_id'),
            'lat'=>trans('admin.lat'),
            'lng'=>trans('admin.lng'),
            'icon'=>trans('admin.icon'),
        ]);
        if(request()->hasFile('icon'))
        {
            $data['icon'] = up()->upload([
                'file'=>'icon',
                'path'=>'stocks',
                'upload_type'=>'single',
                'delete_file' => Stock::find($id)->icon,
            ]);
        }
        Stock::where('id',$id)->update($data);
    session()->flash('success',trans('admin.record_added'));
    return redirect(aurl('stocks'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stocks=Stock::find($id);
        Storage::delete($stocks->logo);
        $stocks->delete();
        session()->flash('success', trans('admin.deleted_record'));
		return redirect(aurl('stocks'));
    }
    public function multi_delete()
    {
        if (is_array(request('item'))) {
            foreach(request('item') as $id){
                $stocks=Stock::find($id);
                Storage::delete($stocks->logo);
                $stocks->delete();  
            }
		} else {
            $stocks=Stock::find(request('item'));
            Storage::delete($stocks->logo);
            $stocks->delete();
		}
		session()->flash('success', trans('admin.deleted_record'));
		return redirect(aurl('stocks'));
    }
}