<?php
	if(isset($sub_admin))
	{
		$action = url('admin/sub-admin/edit/'.$sub_admin->id);
		
		$task = "Edit";
		$form_id = 'edit_sub_admin_form';
		$readonly = 'readonly';
	}
	else
	{
		$action = url('admin/sub-admin/add');
		$task = "Add";
		$form_id = 'add_sub_admin_form';
		$readonly = '';
	}
?>

@extends('backEnd.layouts.master')
@section('title', $task.' Sub Admin')
@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">{{ $task }} Sub Admin</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/sub-admins') }}">Sub Admin Management</a></li>
                            
                            <li class="breadcrumb-item active" aria-current="page">{{ $task }} Sub Admin</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
	    <div class="row">
	        <div class="col-md-12">
	            <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" id="sub_category">{{ $task }} Sub Admin</h4>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form action="{{ $action }}" method="post" class="form-horizontal" enctype="multipart/form-data"  id="sub_admin_form">
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-3 control-label">User Name:</label>
										<div class="col-md-7">
											<input type="text" name="user_name" class="form-control" placeholder="Enter User Name" value="{{ (isset($sub_admin->user_name)) ? $sub_admin->user_name : '' }}">

										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">First Name:</label>
										<div class="col-md-7">
											<input type="text" name="first_name" class="form-control" placeholder="Enter First Name" value="{{ (isset($sub_admin->first_name)) ? $sub_admin->first_name : '' }}">

										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Last Name:</label>
										<div class="col-md-7">
											<input type="text" name="last_name" class="form-control" placeholder="Enter Last Name" value="{{ (isset($sub_admin->last_name)) ? $sub_admin->last_name : '' }}">

										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Email:</label>
										<div class="col-md-7">
											<input type="text" name="email" class="form-control" placeholder="Enter Email" value="{{ (isset($sub_admin->email)) ? $sub_admin->email : '' }}" >		
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Contact:</label>
										<div class="col-md-7">
											<input type="text" name="contact" class="form-control" placeholder="Enter Contact Number"  value="{{ (isset($sub_admin->contact)) ? $sub_admin->contact : '' }}" >		
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Address:</label>
										<div class="col-md-7">
											<input type="text" name="address" class="form-control" placeholder="Enter Address" value="{{ (isset($sub_admin->address)) ? $sub_admin->address : '' }}" >

										</div>
									</div>
									<?php
										$admin_id = (isset($sub_admin->id)) ? $sub_admin->id : '';
										$image    = App\Admin::getUserImg($admin_id);
								    ?>
									<!-- <div class="form-group">
										<label class="col-md-3 control-label">Image:</label>
										<div class="col-md-3 p-l-15 ">
											<img src="{{$image}}" width="80%" height="100%" id="old_image"  alt="No image" >
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">New Image :</label>
										<div class="col-md-7">
											<input type="file"  name="image" id="img_upload" value=" " accept=".jpg,.png,.jpeg,.gif">	
										</div>

										<div class="col-md-offset-3 col-md-12">
											<div class="alert-warning" style="padding:5px; margin-right:60%; margin-top:1%;">
		                                		<span> <i class="fa fa-warning m-r-5"> </i> Recommended size of the image is 500 x 500 (W x H) pixels </span>	
											</div>  
										</div>
									</div> -->

								</div>
								
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											{{ csrf_field() }}
											<input type="hidden" name="sub_admin_id" id="sub_admin_id" value="{{@$sub_admin_id}}">
											<button type="submit" name="button" class="btn green">Submit</button>
										    <a href="{{ url('admin/sub-admins') }}"><button class="btn btn-default m-l-10" type="button" name="cancel">Cancel </button></a>
										</div>
									</div>
								</div>
							</form>
							<!-- END FORM-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
    function ShowHideDiv() {
        var user_id = document.getElementById("user_id");
        var user = $('#user_id').val();
        var business_id = document.getElementById("business_id");
        if(user == '1' || user == '2' || user == '3' )
        {
		    business_id.style.display = "block";
		}else{
			business_id.style.display = "none";
		}
    }
</script>

<script type="text/javascript">
    $(document).ready(function(){
        function readURL(input)
        {
            if(input.files && input.files[0])
            {
                var reader = new FileReader();
                reader.onload = function(e)
                {
                    $('#old_image').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#img_upload').change(function(){

            var img_name = $(this).val();

            if(img_name != '' && img_name != null)
            {
                var img_arr = img_name.split('.');

                var ext = img_arr.pop();
                ext = ext.toLowerCase();
                // alert(ext); return false;

                if(ext == 'jpeg' || ext == 'jpg' || ext == 'png')
                {
                    input = document.getElementById('img_upload');
                    readURL(this);
                }
            } else{

                $(this).val('');
                alert('Please select an image of .jpeg, .jpg, .png file format.');
            }
        });
    });
</script>
<script type="text/javascript">
	var form = $("#sub_admin_form");
	form.validate({
	    errorPlacement: function errorPlacement(error, element) { element.before(error); },
	    rules: {
	    	user_name:{
	            required:true,
	            minlength:2,
	            maxlength:100,
	        },
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
	            email:true,
	            remote:{
                    url:"{{url('admin/validate/sub-admin/email')}}",
                    data:{
                        sub_admin_id:function(){
                            return $('#sub_admin_id').val();
                        },
                    },   
                }, 
            
	        },
	        contact:{
	        	required:true,
	        	digits:true,
	        	minlength:10,
	        	maxlength:10,
	        	remote:{
	        	    url:"{{url('admin/validate/sub-admin/contact')}}",
	        	    data:{
	        	        sub_admin_id:function(){
	        	            return $('#sub_admin_id').val();
	        	        },
	        	    },   
	        	},
	        },
	        address:{
	            minlength:2,
	            maxlength:500,
	            regex:/^[A-Za-z0-9,-/_=. ]+$/,
	        },
	       
	        
	    },
	    messages:{

		    last_name:{
	            regex:"*Last name can only consist letters"
		    },
		    email:{
		        remote:"This email-id already registered."
		    },
		    contact:{
		        remote:"This contact number already registered."
		    },
		    first_name:{
		        regex:"*First name can only consist letters"
		    },
	    }
	});
</script>
@endsection