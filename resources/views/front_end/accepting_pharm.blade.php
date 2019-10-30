@extends('front_end.index')

@section('content')

      <div class="row">
            <div class="col-md-12">
                <div class="titie-section wow fadeInDown animated ">
                    <h1>{{ trans('admin.PHARMACIES') }}</h1>
                </div>
            </div>
        </div>
<div class="container">
                @foreach($member as $members)
                        <form  method="POST" action="{{ url('accept_pharm') }}/{{$members->id}}" enctype="multipart/form-data">
                           {{ csrf_field() }}
                           <div class="modal-body col-sm-6">
                            
                            <div class="form-group">
                                <label>{{ trans('admin.Pharmacy name') }}</label>
                                <input type="text" name="name_in" placeholder="{{ trans('admin.Username') }}" class="form-control" value="{{$members->name}}" >
                              </div>
                              <div class="form-group">
                                <label>{{ trans('admin.Pharmacy Phone') }}</label>
                                <input type="text" name="phone" placeholder="{{ trans('admin.Phone Number') }} " class="form-control" value="{{$members->phone}}">
                              </div>
                              <div class="form-group">
                                <label>{{ trans('admin.Address') }}</label>
                                <input type="text" name="add" placeholder="{{ trans('admin.Address') }}" class="form-control" value="{{$members->address}}">
                              </div>
                              <div class="form-group">
                                  <label>{{ trans('admin.Gurantee') }}</label>
                                  <input type="text" name="gurantee" placeholder="{{ trans('admin.Gurantee') }}" class="form-control" value="{{$members->guarantee}}">
                                </div>
                              {{-- <div class="form-group">       
                                <label>{{ trans('admin.Account') }}</label>
                                <input type="number" name="comp_acc" placeholder="{{ trans('admin.Account') }}" class="form-control" value="{{$members->account}}">
                              </div>
                             
                          
                              <div class="form-group">       
                                <label>{{ trans('admin.Owner id') }}</label>
                                <input type="number" name="owner_id" placeholder="{{ trans('admin.Owner id') }}" class="form-control" value="{{$members->owner}}">
                              </div>
                              <div class="form-group">
                                <label>{{ trans('admin.Telphone') }}</label>
                                <input type="text" name="tel" placeholder="{{ trans('admin.Telphone') }}" class="form-control" value="{{$members->tel}}">
                              </div> --}}

                              <div class="form-group">       
                                <label>{{ trans('admin.Company type') }}</label>
                              
                                 <select name="type">
                                 <option value="globel">{{$members->type}}</option>
                                
                                 </select>
                              
                              </div>
                             
                          </div>
                          <div class="modal-body col-sm-6">
                           
                            
                           
                              <div class="form-group">
                                <label>{{ trans('admin.Icon') }}</label>
                                <input type="text" name="icon" placeholder="{{ trans('admin.Icon') }} " class="form-control" value="{{$members->icon}}">
                              </div>
                                      <div class="form-group">
                                        <label>{{ trans('admin.Medical Prment') }}</label>
                                        <input type="text" name="permit" placeholder="{{ trans('admin.Miedical prment') }}" class="form-control" value="{{$members->permit}}">
                                        <a href="upload/{{ $members->permit }}" download="{{ $members->permit }}" ><button type="button" class="btn bnt-primary" >download</button></a>
        
                                      </div>
                              
                           
                              <div class="form-group">
                                <label>{{ trans('admin.Email') }}</label>
                                <input type="email" name="email" placeholder="{{ trans('admin.Email Address') }}" class="form-control" value="{{$members->email}}">
                              </div>

                              <div class="form-group">       
                                <label>{{ trans('admin.Password') }}</label>
                                <input type="password" name="password" placeholder="{{ trans('admin.password') }}" class="form-control" value="{{$members->password}}">
                              </div>
                              

                              
                           
                          </div>
                           <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">{{ trans('admin.accept') }}</button>
                            <form method="post" action="{{url('reject')}}/{{ $members->id }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                   
                                    <button type="submit" class="btn btn-danger">{{ trans('admin.reject') }}</button>
                            </form>
                          </div>
                </form>

            @endforeach

            </div>

@endsection