
@extends('front_end.index')
@section('content')
<style>
* {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 50%;
  padding: 10px;
  background-color: #fff;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
/* Style the buttons */
.btn {
  border: none;
  outline: none;
  padding: 12px 16px;
  background-color: #f1f1f1;
  cursor: pointer;
}

.btn:hover {
  background-color: #ddd;
}

.btn.active {
  background-color: #666;
  color: white;
}
</style>

<div class='container'>
<h2>{{ trans('admin.qut_help') }}</h2>

<p>{{ trans('admin.note_help') }}</p>

{{-- <div id="btnContainer">
  <button class="btn" onclick="listView()"><i class="fa fa-bars"></i> List</button> 
  <button class="btn active" onclick="gridView()"><i class="fa fa-th-large"></i> Grid</button>
</div> --}}
<br>

<div class="row">
  <div class="column" >
    <h2>{{ trans('admin.registration') }}</h2>
    @if(auth()->guard('admin')->check())
        <p>hi {{ admin()->user()->name }} <br>{{ trans('admin.reg_help') }} </p>
    @else
        <p>hi<br>{{ trans('admin.reg_help') }} </p>
    @endif    
  </div>
  <div class="column" >
    <h2>{{ trans('admin.Orders') }}</h2>
    @if (auth()->guard('admin')->check())
    
      <p>hi {{ admin()->user()->name }} <br> {{ trans('admin.order_help') }}</p>
    
    @else
    <p>hi  <br> {{ trans('admin.order_help') }}<br> r</p>

    
      @endif
  </div>
</div>

<div class="row">
  <div class="column">
    <h2>{{ trans('admin.Re_orders') }}</h2>
    <p>{{ trans('admin.rev_order') }} </p>
  </div>
  <div class="column">
    <h2>Delivery</h2>
    <p>processing...</p>
  </div>
</div>
</div>
<script>
// Get the elements with class="column"
var elements = document.getElementsByClassName("column");

// Declare a loop variable
var i;

// List View
function listView() {
  for (i = 0; i < elements.length; i++) {
    elements[i].style.width = "100%";
  }
}

// Grid View
//function gridView() {
//  for (i = 0; i < elements.length; i++) {
//    elements[i].style.width = "50%";
//  }
//}

/* Optional: Add active class to the current button (highlight it) */
var container = document.getElementById("btnContainer");
var btns = container.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>

@endsection
