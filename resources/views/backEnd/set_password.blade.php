@extends('backEnd.layouts.login')
@section('title','Set Password')
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
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
        <div class="auth-box bg-dark border-top border-secondary">
                <div class="text-center p-t-20 p-b-20">
                    <span class="db">
                        <!-- <img src="{{ url(systemImgPath.'/logo.png') }}" alt="logo" width="318px"/> -->
                        <h1 style="color:white;">Logo Here</h1>
                    </span>
                </div>
            <div id="recoverform1">
                <div class="text-center">
                </div>
                <div class="row m-t-20">
                    <form action="" method="post" id="forgot_form">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="ti-email"></i></span>
                            </div>
                            <input type="text" class="form-control form-control-lg" placeholder="Email Address" aria-label="Username" aria-describedby="basic-addon1" name="email" value="{{ $admin_detail->email }}" readonly="">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-success text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                            </div>
                            <input type="password" class="form-control form-control-lg" placeholder="New Password" aria-label="Username" aria-describedby="basic-addon1" name="password" id="password">
                        </div>
                        <span class="error" id="field_err"></span>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                            </div>
                            <input type="password" class="form-control form-control-lg" placeholder="Confirm Password" aria-label="Username" aria-describedby="basic-addon1" name="confirm_password">
                        </div>
                        <span class="error" id="new_field_err"></span>

                        <!-- pwd -->
                        <div class="row m-t-20 p-t-20 border-top border-secondary">
                            <div class="col-12">
                                @csrf
                                <button class="btn btn-info float-right" type="submit" name="action">Submit</button>
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
                password:{
                    required:true,
                    minlength:6,
                    maxlength:20
                },
                confirm_password:{
                    required:true,
                    equalTo:"#password"
                }
            },
            messages:{
                confirm_passwrd:{
                    equalTo:"Please enter the same password again"
                }
            },
            errorPlacement:function(error,element){
                if(element.attr("name") == "password") {
                    // error.appendTo(element.parent().after());
                    error.appendTo('#field_err');
                } else{
                    error.appendTo('#new_field_err');
                }
            },
       })
   </script>
</div>
@endsection
    