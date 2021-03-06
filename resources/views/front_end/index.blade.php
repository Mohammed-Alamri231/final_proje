@include('front_end.header')
@include('front_end.nav')

@yield('linker')
<style>
    
    Extra style for the cancel button (red)
        .cancelbtn {
            width: auto;
            padding: 20px 18px;
            background-color:#ffffff;
        }
        
   
        
        /* Add padding to containers */
        .container {
           /* padding: 16px;*/
        }
        
     
        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }
            .cancelbtn {
                width: 100%;
            }
        }
        
        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: auto;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.8); /* Black w/ opacity */
            padding-top: 60px;
        }
        
        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 5px auto; /* 15% from the top and centered */
            border: 1px solid #888;
            width: 50%; /* Could be more or less, depending on screen size */
        }
        
        /* The Close Button */
        .close {
            /* Position it in the top right corner outside of the modal */
            position: absolute;
            right: 25px;
            top: 10px;
            color: #000;
            font-size: 35px;
            font-weight: bold;
        }
        
        /* Close button on hover */
        .close:hover,
        .close:focus {
            color: red;
            cursor: pointer;
        }
        
        /* Add Zoom Animation */
        .animate {
            -webkit-animation: animatezoom 0.6s;
            animation: animatezoom 0.6s
        }
        
        @-webkit-keyframes animatezoom {
            from {-webkit-transform: scale(0)}
            to {-webkit-transform: scale(1)}
        }
        
        @keyframes animatezoom {
            from {transform: scale(0)}
            to {transform: scale(1)}
        } 
</style>
 @include('admin.layouts.message')       
@yield('content')

<style>
.dropdown-content a {
    color: white;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: center;
}
</style>
@yield('scripts');

@include('front_end.footer')

