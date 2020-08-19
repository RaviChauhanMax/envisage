@extends('backEnd.layouts.master')
@section('title','User Detail')
@section('content')
<style type="text/css">
    .ck{
        margin-top: 8px !important;
    }
</style>
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">User Detail</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('admin/users')}}">Users</a></li>
                            <li class="breadcrumb-item active" aria-current="page">User Detail</li>
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
                        <h4 class="card-title">User Detail</h4>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">First Name: </label>
                            <div class="col-sm-8">
                                <label class="col-sm-3 ck">
                                    <?php if(isset($details['first_name']) && !empty($details['first_name'])){ echo ucfirst($details['first_name']); }else{ echo 'N/A';} ?>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Last Name: </label>
                            <div class="col-sm-8">
                                <label class="col-sm-3 ck">
                                    <?php if(isset($details['last_name']) && !empty($details['last_name'])){ echo ucfirst($details['last_name']); }else{ echo 'N/A';} ?>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Email: </label>
                            <div class="col-sm-8">
                                <label class="col-sm-8 ck">
                                    <?php if(isset($details['email']) && !empty($details['email'])){ echo $details['email'];}else{ echo 'N/A';}?>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Contact No: </label>
                            <div class="col-sm-8">
                                <label class="col-sm-3 ck">
                                    <?php if(isset($details['mobile_no']) && !empty($details['mobile_no'])){ echo $details['mobile_no'];}else{ echo 'N/A';}?>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Zip Code: </label>
                            <div class="col-sm-8">
                                <label class="col-sm-3 ck">
                                    <?php if(isset($details['zip_code']) && !empty($details['zip_code'])){ echo $details['zip_code'];}else{ echo 'N/A';}?>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Address: </label>
                            <div class="col-sm-8">
                                <label class="col-sm-8 ck">
                                     <?php if(isset($details['address']) && !empty($details['address'])){ echo $details['address'];}else{ echo 'N/A';}?>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Country: </label>
                            <div class="col-sm-8">
                                <label class="col-sm-3 ck">
                                    <?php if(isset($details['countryName']['name']) && !empty($details['countryName']['name'])){ echo $details['countryName']['name'];}else{ echo 'N/A'; }?>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">State: </label>
                            <div class="col-sm-8">
                                <label class="col-sm-3 ck">
                                    <?php if(isset($details['stateName']['name']) && !empty($details['stateName']['name'])){ echo $details['stateName']['name'];}else{ echo 'N/A';} ?>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">City: </label>
                            <div class="col-sm-8">
                                <label class="col-sm-3 ck">
                                    <?php if(isset($details['cityName']['name']) && !empty($details['cityName']['name'])){ echo $details['cityName']['name']; }else{ echo 'N/A';}?>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Gender: </label>
                            <div class="col-sm-8">
                                <label class="col-sm-3 ck">
                                    <?php if(isset($details['gender']) && !empty($details['gender'])){  echo $details['gender'];}else{ echo 'N/A';}?>
                                </label>
                            </div>
                        </div>
                        <?php 
                        if(count($details['userGroups'])>0){  ?>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Groups: </label>
                                <div class="col-sm-8">
                                    <label class="col-sm-3 ck">
                                        <?php 
                                        $group_count = 1;
                                        foreach($details['userGroups'] as $groupvalue){
                                            if(isset($groupvalue['GroupCategories']['name'])){
                                                echo $groupvalue['GroupCategories']['name'];
                                                if(count($details['userGroups']) > 1 && count($details['userGroups']) > $group_count){
                                                    echo ',';
                                                }
                                            }
                                            $group_count++;
                                        }
                                        ?>
                                    </label>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Profile Pic: </label>
                            <div class="col-sm-8">
                                <label class="col-sm-3 ck">
                                    <?php 
                                    $profile_image = DefaultUserPath;
                                    $profile_pic = $details['profile_pic'];
                                    if (!empty($profile_pic)) {
                                        if (file_exists(profileImagePath.'/'.$profile_pic)) {
                                          $profile_image =  projectLink.'/'.profileImagePath.'/'.$profile_pic;
                                        }else{
                                            $profile_image = DefaultUserPath;
                                        }
                                       
                                    }
                                    ?>
                                <img src="<?php echo $profile_image;?>" style="" alt="profile_image" class="user_view_profile_image">
                                </label>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('backEnd.common.footer')
</div>
@endsection    