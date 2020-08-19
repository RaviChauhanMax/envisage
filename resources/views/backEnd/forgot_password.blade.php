@extends('backEnd.layouts.login')
@section('title','Forgot Password')
@section('content')

<style type="text/css">
    .auth-wrapper .auth-box {
        background: #fff;
        padding: 20px;
        -webkit-box-shadow: 1px 0px 20px rgba(0, 0, 0, 0.08);
        box-shadow: 1px 0px 20px rgba(0, 0, 0, 0.08);
        max-width: 400px;
        width: 90%;
        margin: 10% 0;
        padding-left: 50px;
        /* padding: 42px; */
    }
</style>
<div class="main-wrapper">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Login box.scss -->
    <!-- ============================================================== -->
    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
        <div class="auth-box bg-dark border-top border-secondary">
            <!-- <div id="loginform"> -->
                <div class="text-center p-t-20 p-b-20">
                    <span class="db">
                        <!-- <img src="{{ url(systemImgPath.'/logo.png') }}" alt="logo" width="318px" /> -->
                        <h1 style="color:white;">Logo Here</h1>
                    </span>
                </div>
            <!-- </div> -->
            <div id="recoverform1">
                <div class="text-center">
                    <span class="text-white">Enter your e-mail address below and we will send you instructions how to recover a password.</span>
                </div>
                <div class="row m-t-20">
                    <!-- Form -->
                    <form action="{{ url('admin/forgot-password') }}" method="post" id="forgot_form">
                        <!-- email -->
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="ti-email"></i></span>
                            </div>
                            <input type="text" class="form-control form-control-lg" placeholder="Email Address" aria-label="Username" aria-describedby="basic-addon1" name="email">
                        </div>
                        <span class="error" id="field_err"></span>
                        <!-- pwd -->
                        <div class="row m-t-20 p-t-20 border-top border-secondary">
                            <div class="col-12">
                                @csrf
                                <a class="btn btn-success" href="{{ url('admin/login') }}" id="to-login" name="action">Back To Login</a>
                                <button class="btn btn-info float-right" type="submit" name="action">Recover</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
   
   @include('backEnd.common.notifications')

   <script type="text/javascript">
       $('#forgot_form').validate({
            rules:{
                email:{
                    required:true,
                    email:true
                }
            },
            errorPlacement:function(error,element){
                /*if(element.attr("name") == "journey") {
                    error.appendTo(element.parent().after());
                } else{*/
                    error.appendTo('#field_err');
                // }
            },
       })
   </script>
</div>
@endsection
    