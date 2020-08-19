@extends('backEnd.layouts.master')
@section('title',' Admin Rights')
@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title"> Sub Admin</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/categories') }}">Sub Admin Management</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('admin/subcategories') }}">Sub Admins</a></li>
                            
                             <a href="{{ Request::fullUrl() }}">Access Rights</a>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
   <div class="container-fluid">
   
        <div class="row">
            <div class="col-md-12">
                <div class="portlet box blue-hoki ">
                    <div class="portlet-title">
                        <div class="caption access-right"> Access Rights</div>
                            <div class="pull-right access-select">
                                <label class="inner-name-title1"><input type="checkbox" class="all_select"> <b> <span id="select_text">
                                    Select All
                                </span>  </b></label>
                            </div> 
                        <!-- </div> -->
                    </div>  
                    <div class="portlet-body form">
                        <div class="position-center">
                            <form role="form" action="{{ url('admin/access-right/update') }}" method="post">
                                @include('backEnd.common.access_rights_list')
                                <div class="top">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="user_id" value="{{ $user_id }}">
                                            <button type="submit" name="button" class="btn green">Submit</button>
                                            <a href="{{ url('admin/sub-admins') }}"><button class="btn btn-default m-l-10" type="button" name="cancel">Cancel </button></a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('.acc_heading_chkbox').click(function(){
        
        if($(this).is(':checked')) { 
            $(this).parent().siblings('ul').find('input').prop('checked',true);
        } else{ 
            $(this).parent().siblings('ul').find('input').prop('checked',false);
        }
    });
});
</script>

<script type="text/javascript">
    $('.all_select').click(function(){
        // alert('90');
        if($(this).is(':checked')) { 
            $(".ok_select").prop('checked', true);
            // $('#select_text').text('Unselect All');
        } else{
            $(".ok_select").prop('checked', false);
            // $('#select_text').text('Select All');
        }
    })
</script>
@endsection