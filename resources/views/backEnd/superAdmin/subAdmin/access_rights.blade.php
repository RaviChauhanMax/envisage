<style type="text/css">
.portlet.box.blue-hoki {
    -webkit-box-orient: vertical;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0px solid transparent;
    border-radius: 0px;
}

.form-body .users-ul{
    list-style-type: none;
}

  .portlet-title .caption.access-right {
        display:inline-block;
        font-size: 18px;
        font-weight: 600;
    }
    .portlet-title .pull-right.access-select{
        display:inline-block;
        float:right;
    }

   .portlet.box.blue-hoki .portlet-title {
        padding: 5px 6px 16px;
    }

    .portlet-body form .form-body .label-name-title {
        font-weight: bolder;
        display: block;
        background: #f7f7f7;
        padding: 12px;
    }

    .users-ul .inner-name-title {
        text-decoration: underline;
    }
    .form-body .users-ul {
        list-style-type: none;
        display: flex;
        flex-wrap: wrap;
    }
    .users-ul li {
        padding: 0 10px;
    }

    .portlet.box.blue-hoki .top{
        border-top: 1px solid #e9ecef !important;
    }

    .portlet.box.blue-hoki .top button{
        float: right;
        margin-bottom: 0px;
        margin-top: 25px;
        margin-right: 7px;
    }

    .users-ul > li {
    display: inline-block;
    float: left;
    max-width: 24%;
    min-height: 150px;
    width: 100%;
    }

    .portlet.box.blue-hoki .sub-checkbox{
        padding-left: 7px;
    }
</style>

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
                            <li class="breadcrumb-item">                           
                             <a href="{{ Request::fullUrl() }}">Access Rights</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
 <!--    <div class="page-breadcrumb">
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
    </div> -->
  


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
                                        <div class="col-md-12">
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