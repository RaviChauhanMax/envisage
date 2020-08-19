@extends('backEnd.layouts.master')
@section('title','Sub Admin')
@section('content')

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Sub Admin Management</h4>
               
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Sub Admins</h5>
                        <div class="add_btn">
                           
                            <a href="{{ url('admin/sub-admin/add') }}" class="btn btn-primary">Add Sub Admin</a>
                        </div>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Contact Number</th>
                                        <th width="13%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($sub_admins))
                                        @foreach($sub_admins as $key=>$value)
                                           
                                            <tr>
                                                <td>{{ ucfirst($value['user_name']) }}</td>
                                                <td>{{ ucfirst($value['first_name']) }}</td>
                                                <td>{{ ucfirst($value['last_name']) }}</td>
                                                <td>{{ $value['email'] }}</td>
                                                <td>{{ $value['contact'] }}</td>
                                                
                                                <td>
                                                	<div class="edit-btn-div">  
                                                
                                                	    <a href="{{url('admin/sub-admin/edit/'.$value['id'])}}" title="Edit"><i class="fa fa-edit"></i></a>  
                                                	    <a href="{{url('admin/sub-admin/delete/'.$value['id'])}}" title="delete" class="del_btn"><i class="fa fa-trash"></i></a>
                                                	    <a href="{{url('admin/sub-admin/send-credentials/'.$value['id'])}}" title="send email"><i class="fa fa-envelope"></i></a>
                                                	    <a href="{{url('admin/access-rights/'.$value['id'])}}" title="User Rights"><i class=" mdi mdi-security-network"></i></a>
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
@endsection