@extends('backEnd.layouts.master')
@section('title', 'Serives')
@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Services Management</h4>
               
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Services</h5>
                        <div class="add_btn">
                           
                            <a href="{{ url('admin/services/add') }}" class="btn btn-primary">Add Service</a>
                        </div>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Service Name</th>
                                        <th>Icon Class</th>
                                        <th>Routes</th>
                                        <th width="13%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($services))
                                        @foreach($services as $key => $service)
                                           
                                            <tr>
                                                <td>{{ $service->service_name }}</td>
                                                <td>{{ $service->icon }}</td>
                                                <td>{{ $service->link }}</td>
                                                <td>
                                                	<div class="edit-btn-div">  

                                                	    <a href="" title="edit"><i class="fa fa-edit"></i></a>  
                                                	    <a href="" title="delete" class="del_btn"><i class="fa fa-trash"></i></a>

                                                	</div>
                                                    
                                                </td>
                                            </tr>
                                       @endforeach  
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('backEnd.common.footer')
</div>
@stop