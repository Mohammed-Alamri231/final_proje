@extends('front_end.index')

@section('scripts')
{{-- <script type="text/javascript">
           
  function check(){
  "use scrit"
  var f=checking.password.value;
  var g=checking.confirm.value;
  
  if(f==g)
  {
  console.log(f);
  }
  else
  {
    alert('your password not matching' );
  }
  
  }; --}}
  
  {{-- <script> --}}
  @endsection
@section('content')

       <div class="row" style="margin-bottom:40px">
            <div class="col-md-12">
                <div class="titie-section wow fadeInDown animated ">
                    <h1>{{ trans('admin.COMPANIES') }}  </h1>
                </div>
            </div>
        </div>

       

        <div class="container">   
                        <form  method="POST" action="{{ url('comp') }}" enctype="multipart/form-data">
                           {{ csrf_field() }}
                          <div class="modal-body col-sm-6">
                            
                            <div class="form-group">
                                <label>{{ trans('admin.Company name') }}</label>
                                <input type="text" name="name_in" placeholder="{{ trans('admin.Username') }}" class="form-control"  >
                              </div>
                              <div class="form-group">
                                <label>{{ trans('admin.Company Phone') }}</label>
                                <input type="text" name="phone" placeholder="{{ trans('admin.Phone Number') }}" class="form-control"  >
                              </div>
                              <div class="form-group">
                                <label>{{ trans('admin.Address') }}</label>
                                <input type="text" name="add" placeholder="{{ trans('admin.Address') }}" class="form-control"  >
                              </div>

                              <div class="form-group">
                                <label>{{ trans('admin.Gurantee') }}</label>
                                <input type="text" name="gurantee" placeholder="{{ trans('admin.Gurantee') }}" class="form-control"  >
                              </div>
                              <div class="form-group">
                                <label>{{ trans('admin.Medical Prment') }}</label>
                                <input type="file" name="permit" placeholder="{{ trans('admin.Miedical prment') }}" class="form-control"  >
                              </div>
                           
                              <div class="form-group">       
                                <label>{{ trans('admin.Company type') }}</label>
                              
                                 <select name="type">
                                    <option value="globel"> </option>
                                    <option value="privet"> </option>
                                
                                 </select>
                              
                              </div>
                             
                          </div>
                          <div class="modal-body col-sm-6">
                           
                           
                           
                              <div class="form-group">
                                <label>{{ trans('admin.Icon') }}</label>
                                <input type="file" name="icon" placeholder="{{ trans('admin.Icon') }} " class="form-control" >
                              </div>
                              
                           
                              <div class="form-group">
                                  <label>{{ trans('admin.Email') }}</label>
                                  <input type="email" name="email" placeholder="{{ trans('admin.Email Address') }}" class="form-control"  >
                                </div>

                                {{-- <form name="checking"></form> --}}
                                <div class="form-group">       
                                  <label>{{ trans('admin.Password') }}</label>
                                  <input type="password" name="password" placeholder="{{ trans('admin.Password') }}" class="form-control"  >
                                </div>

                                
                                <div class="form-group">       
                                  <label>{{ trans('admin.Password') }}</label>
                                  <input type="password" name="confirm" placeholder="{{ trans('admin.confirm') }}" class="form-control"  >
                                </div>

                               {{-- <input type="button" name="btn" value="check" onclick="check()"> --}} 
                            

                              

                              
                           
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">{{ trans('admin.registration') }}</button>
                          </div>
                </form>
            </div>
             

       

@endsection
