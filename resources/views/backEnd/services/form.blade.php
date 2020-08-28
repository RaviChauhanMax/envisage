@extends('backEnd.layouts.master')
@section('title', 'Add Services')
@section('content')
	<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Services</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/sub-admins') }}">Services</a></li>
                            
                            <li class="breadcrumb-item active" aria-current="page">Services</li>
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
                        <h4 class="card-title" id="sub_category">Services</h4>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form action="{{  url('admin/services/add') }}" method="post" class="form-horizontal" enctype="multipart/form-data"  id="add_service_form">
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-3 control-label">Service Name:</label>
										<div class="col-md-7">
											<input type="text" name="service_name" id="service_name" class="form-control" placeholder="Enter Service Name">

										</div>
									</div>
									
									<div class="form-group">
										<label class="col-md-3 control-label">Icon:</label>
										<div class="col-md-7">
											<input type="text" name="icon" id="icon" class="form-control" placeholder="Enter Icon Class">

										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label">Link:</label>
										<div class="col-md-7">
											<input type="text" name="route" id="route" class="form-control" placeholder="Enter Route">

										</div>
									</div>
								</div>
									
									<div class="form-actions">
										<div class="row">
											<div class="col-md-offset-3 col-md-9">
												{{ csrf_field() }}
												<button type="submit" class="btn green">Submit</button>
											    <a href="{{ url('admin/services') }}"><button class="btn btn-default m-l-10" type="button" name="cancel">Cancel </button></a>
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
@stop