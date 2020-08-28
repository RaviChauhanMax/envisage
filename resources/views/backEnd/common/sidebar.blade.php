<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">
                <?php
                    $active = '';
                    $selected = '';
                    // $page     ='';
                    if($page == 'dashboard'){
                        $active = 'active';
                        $selected = 'selected';
                    }
                ?>
                <li class="sidebar-item {{ $selected }}"> 
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ $active }}" href="{{ url('/admin/dashboard') }}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <?php

                    $active   = '';
                    $selected = '';
                    $in = '';
                    if(($page == 'sub_admin')){
                        $active   = 'active';
                        $selected = 'selected';
                        $in ='in';
                    }
                ?>
                <li class="sidebar-item {{ $selected }}"> 
                    <a class="sidebar-link waves-effect waves-dark {{$active}}" href="{{url('/admin/sub-admins')}}" aria-expanded="false">
                        <i class="mdi mdi-server-security"></i>
                        <span class="hide-menu">Sub Admin Management</span>
                    </a>
                </li>
                <?php

                    $active   = '';
                    $selected = '';
                    $in = '';
                    if(($page == 'services')){
                        $active   = 'active';
                        $selected = 'selected';
                        $in ='in';
                    }
                ?>
                <li class="sidebar-item {{ $selected }}"> 
                    <a class="sidebar-link waves-effect waves-dark {{$active}}" href="{{url('/admin/services')}}" aria-expanded="false">
                        <i class="mdi mdi-star-half"></i>
                        <span class="hide-menu">Services</span>
                    </a>
                </li>

                <?php

                    $active   = '';
                    $selected = '';
                    $in = '';
                    if(($page == 'abouts')){
                        $active   = 'active';
                        $selected = 'selected';
                        $in ='in';
                    }
                ?>
                <li class="sidebar-item {{ $selected }}"> 
                    <a class="sidebar-link waves-effect waves-dark {{$active}}" href="{{url('/admin/abouts')}}" aria-expanded="false">
                        <i class="mdi mdi-information"></i>
                        <span class="hide-menu">Abouts</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>