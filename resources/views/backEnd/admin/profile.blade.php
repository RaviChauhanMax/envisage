@extends('backEnd.layouts.master')
@section('title','Profile')
@section('content')

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Edit Profile</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
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
                <form id="example-form" action="" class="" method="post">
                    <div>
                        <!-- <h3>Profile</h3> -->
                        <section>
                            <label for="name">First name </label>
                            <input id="name" name="first_name" type="text" class="required form-control" value="{{ $admin->first_name }}">

                            <label for="surname" class="m-t-10">Last name </label>
                            <input id="surname" name="last_name" type="text" class="required form-control" value="{{ $admin->last_name }}">
                            <?php
                                $readonly = 'readonly';
                                if(@$admin['admin_type']=='0'){
                                    $readonly = '';
                                }

                            ?>
                            <label for="email" class="m-t-10">Email </label>
                            <input id="email" name="email" type="text" class="required email form-control" value="{{ $admin->email }}" {{$readonly}}>
                            <label for="address" class="m-t-10">Address</label>
                            <input id="address" name="address" type="text" class="form-control" value="{{ $admin->address }}" id="address">
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
<script>
    // Basic Example with form
    var form = $("#example-form");
    form.validate({
        errorPlacement: function errorPlacement(error, element) { element.before(error); },
        rules: {
            first_name:{
                required:true,
                minlength:2,
                maxlength:100,
                regex:/^[a-zA-z ]+$/,
            },
            last_name:{
                required:true,
                minlength:2,
                maxlength:100,
                regex:/^[a-zA-z ]+$/,
            },
            email:{
                required:true,
                email:true
            },
            address:{
                minlength:2,
                maxlength:500,
                regex:/^[A-Za-z0-9,-/_=. ]+$/,
            },
            gst:{
                number:true,
                maxlength:3,
            },
            
        },
        last_name:{
            first_name:{
                regex:"*First name can only consist letters"
            },
            first_name:{
                regex:"*First name can only consist letters"
            }
        }
    });

</script>
@endsection