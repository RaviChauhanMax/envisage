@extends('backEnd.layouts.master')
@section('title','Users')
@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Users Management</h4>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Users</h5>
                        <div class="add_btn">
                            <div class="btn-group pull-right">
                                <!-- <button type="button" class="btn btn-fit-height" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
                                Export <i class="fa fa-angle-down"></i>
                                </button> -->
                               <!--  <ul class="dropdown-menu pull-right export-import" role="menu">
                                    <li>
                                        <a href="javascript:;" class="report_optn" type="xls">Export to Excel</a>
                                    </li>
                                    <li>
                                        <a href="javascript:;" class="report_optn" type="csv">Export to CSV</a>
                                    </li>
                                    <li>
                                        <a href="javascript:;" class="report_optn" type="pdf">Export to PDF</a>
                                    </li>
                                    <li>
                                        <a href="{{url('admin/trainer/export/pdf')}}" class="report_optn" type="pdf">Export to PDF</a>
                                    </li> 
                                </ul> -->
                            </div>
                            <!-- <a href="{{ url('admin/user/add') }}" class="btn btn-primary">Add Users</a> -->
                        </div>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Contact No</th>
                                        <th>Zip Code</th>
                                        <th>Address</th>
                                        <th>Country</th>
                                        <th>State</th>
                                        <th>City</th>
                                        <th>Profile Image</th>
                                        <th>Gender</th>
                                        <th width="13%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($details))
                                        @foreach($details as $key=>$value)
                                            <tr>
                                                <td><?php if(isset($value['first_name']) && !empty($value['first_name'])){ echo ucfirst($value['first_name']); }else{ echo 'N/A';} ?></td> 
                                                <td><?php if(isset($value['last_name']) && !empty($value['last_name'])){ echo ucfirst($value['last_name']);}else{ echo "N/A";} ?></td> 
                                                <td><?php if(isset($value['email']) && !empty($value['email'])){ echo $value['email'];}else{ echo 'N/A';}?></td>
                                                <td><?php if(isset($value['mobile_no']) && !empty($value['mobile_no'])){ echo $value['mobile_no'];}else{ echo 'N/A';}?></td>
                                                <td><?php if(isset($value['zip_code']) && !empty($value['zip_code'])){ echo $value['zip_code'];}else{ echo 'N/A';} ?></td>
                                                <td><?php if(isset($value['address']) && !empty($value['address'])){
                                                     $wordcount = strlen($value['address']);
                                                     if($wordcount >= 20){
                                                         $adress        =  strip_tags($value['address']);
                                                         $address_sub    =  substr($adress,0,20);
                                                         echo $address_sub.".....";
                                                        ?>
                                                        <a href="javascript:void(0)" id="read_more_content" class="read_content_click" rel="<?php echo $value['address']; ?>">Read More</a>
                                                    <?php }else{ echo $value['address']; } } else{ echo 'N/A';}?></td>
                                                <td><?php if(isset($value['country_name']['name']) && !empty($value['country_name']['name'])){ echo $value['country_name']['name'];}else{ echo 'N/A'; }?></td>
                                                <td><?php if(isset($value['state_name']['name']) && !empty($value['state_name']['name'])){ echo $value['state_name']['name'];}else{ echo 'N/A';} ?></td>
                                                <td><?php if(isset($value['city_name']['name']) && !empty($value['city_name']['name'])){ echo $value['city_name']['name']; }else{ echo 'N/A';}?></td>
                                                <td>
                                                <?php 
                                                    $profile_image = DefaultUserPath;
                                                    $profile_pic = $value['profile_pic'];
                                                    if (!empty($profile_pic)) {
                                                        if (file_exists(profileImagePath.'/'.$profile_pic)) {
                                                          $profile_image =  projectLink.'/'.profileImagePath.'/'.$profile_pic;
                                                        }else{
                                                            $profile_image = DefaultUserPath;
                                                        }
                                                       
                                                    }
                                                    ?>
                                                <a class="profile_image_popup" rel="<?php echo $profile_image;?>">
                                                <img src="<?php echo $profile_image;?>" style="" alt="profile_image" class="user_profile_image">
                                                </a>
                                                </td>
                                                <td><?php if(isset($value['gender']) && !empty($value['gender'])){  echo $value['gender'];}else{ echo 'N/A';}?></td>
                                                <td>
                                                    <a href="{{ url('/admin/user/view/'.base64_encode($value['id'])) }}" title="View" class="view_btn"><i class="fa fa-eye"></i></a>
                                                    <a href="{{ url('/admin/user/delete/'.base64_encode($value['id'])) }}" title="Delete" class="del_btn"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach    
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div id="form_modal2" class="modal fade" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                        <h4 class="modal-title">Export</h4>
                                    </div>
                                    <form action="{{url('admin/user/export')}}" class="form-horizontal" method="post" id="filter_modal">
                                        <div class="modal-body">

                                            <div class="form-group">
                                                <div class="col-md-10">
                                                    <div class="form-group row">
                                                        <label for="fname" class="col-sm-5 text-right control-label col-form-label">Select Date: </label>
                                                        <div class="col-sm-7">
                                                            <input type="date" class="form-control date_range" id="date_range" name="date" value="" placeholder="Select interval">
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                                <div class="col-md-10">
                                                    <div class="form-group row">
                                                        <label for="fname" class="col-sm-5 text-right control-label col-form-label">Select Teacher: </label>
                                                        <div class="col-sm-7">
                                                           <select class="form-control" name="trainer_id">
                                                                <option value="">Select Teacher</option>
                                                                @if(!empty($trainer_details))
                                                                    @foreach($trainer_details as $key=>$value)
                                                                        <option value="{{$value['id']}}">{{ ucfirst($value['first_name']) }} {{ ucfirst($value['last_name']) }}</option>
                                                                    @endforeach
                                                                @endif
                                                           </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="export_type" value="" id="export_type">
                                        @csrf
                                        <div class="modal-footer">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Close</button>
                                            <button class="btn btn-primary" id="export_btn" type="submit">Export to </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('backEnd.common.footer')
</div>
<!-- Profile Modal  -->
<div id="myProfileModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Profile Image</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <p class="profile_image_modal text-center"><img id="my_profile_image_id" src="<?php echo DefaultUserPath;?>"></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
    </div>
</div>


<!-- Read More Modal  -->
<div id="mycontentmodel" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Address</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <p class="content_modal" id="moreaddress">
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
    </div>
</div>

<script>
    $('.report_optn').click(function(){
        var value  = $(this).attr('type');
        // var url    = $(this).attr('url');
        $('#export_type').val(value);
        // $('#form_data').submit();

        if(value == 'xls'){
            // alert(url);
            // $('#filter_modal').attr('action',url);
            $('#export_btn').text('Export to excel');
            $('#form_modal2').modal('show');
        }else if(value == 'pdf'){
            // $('#filter_modal').attr('action',url);
            $('#export_btn').text('Export to pdf');
            $('#form_modal2').modal('show');
        }else{
            // $('#form_data').attr('action',url);
            // $('#filter_modal').attr('action',csv_url);
            $('#export_btn').text('Export to csv');
            $('#form_modal2').modal('show');
        }
    });
</script>

<script type="text/javascript">
    $('.profile_image_popup').on('click',function(){
        var profile_image  = $(this).attr('rel');
        $('#myProfileModal').modal('show');
        $('#my_profile_image_id').attr('src',profile_image);
    });

    $('.read_content_click').on('click',function(){
        var address  = $(this).attr('rel');
        $('#mycontentmodel').modal('show');
        $('#moreaddress').html(address);
    });
</script>
@endsection