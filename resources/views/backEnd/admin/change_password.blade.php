@extends('backEnd.layouts.master')
@section('title','Change Password')
@section('content')

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Change Password</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body wizard-content">
                <!-- <h4 class="card-title">Edit Profile</h4> -->
                <h6 class="card-subtitle"></h6>
                <form id="example-form" action="{{ url('admin/change-password') }}" method="post">
                    <div>
                        <section>
                            <label for="password">Old Password </label>
                            <input id="password" name="current_password" type="password" class="required form-control">
                            <label for="userName">New Password </label>
                            <input id="new_pw" name="new_password" type="password" class="required form-control">
                            <label for="confirm">Confirm Password </label>
                            <input id="confirm" name="confirm_password" type="password" class="required form-control">
                        </section>
                        <div class="card-body">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-primary" style="float: right; margin-bottom: 20px">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('backEnd.common.footer')
</div>

<!-- <script src="{{ url( backEndJsPath.'/jquery.steps.min.js') }}"></script> -->

<script>
    // Basic Example with form
    var form = $("#example-form");
    form.validate({
        errorPlacement: function errorPlacement(error, element) { element.before(error); },
        rules: {
            current_password:{
                required:true,
            },
            new_password:{
                required:true,
                minlength:6,
                maxlength:20,
                regex:/^[a-zA-z0-9,.=\/@#$%^&*()_+ ]+$/,
            },
            confirm_password: {
                equalTo: "#new_pw"
            }
        },
        messages:{
            confirm_password:{
                equalTo:"*Confirm password must be equal to new password"
            }
        }
    });

</script>

@endsection