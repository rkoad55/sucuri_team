
<?php 
    
    $delete  = DB::table('sucuri_user')->where('active','0')->get();

    $pending = DB::table('sucuri_user')->where('s_key','')->get(); 

     $ided=auth()->user()->id;

     $pendingUser = DB::table('sucuri_user')->where(['s_key'=>'' , 'user_id' =>$ided])->get(); 
     $deteleUser = DB::table('sucuri_user')->where(['active'=>'0' , 'user_id' =>$ided])->get(); 
?>
<div class="topbar">
    <div class="container-fluid">
        <div class="row">
            <div  class="col-xs-12 col-md-2">
                <div class="logo" >
                    <a href="/admin/home"><img src="{{ asset("images/bd-logo-white.png") }}" alt="BlockDos" > <!-- <h3 style="color:White"> -->  </a>
                   
                </div>
            </div>
            <div class="col-xs-12 col-md-2">
                <h4 style="margin-left: 25px; font-size: 18px !important; font-weight: 600;">Dashboard</h4>
            </div>
            <div class="col-xs-12 col-md-8">
                <div class="topbar-links">
                    <ul class="list-unstyled topnav-menu float-right mb-0">
                        {{-- <li style="width: 200px;">
                            <form class="app-search">
                                <div class="app-search-box " style="border: 1px solid black; background: white; border-radius: 30px;">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search..."  style="background: white; border-radius: 30px; padding: 10px;">
                                        <div class="input-group-append">
                                            <button class="btn" type="submit" style="color: black">
                                                <i class="fe-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </li> --}}
                        {{-- <li style= "margin-top: 30px;"><a href="{{ url('logout') }}">
                            <i class="fas fa-sign-out-alt"></i>
                            <span class="title">@lang('global.app_logout')</span>
                        </li> --}}
                        <li class="dropdown notification-list">
                            <a style="color: black" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="fe-bell noti-icon" style="font-size: 20px !important;"></i>
                                <span class="badge badge-danger rounded-circle noti-icon-badge"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-lg">
    
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="m-0">
                                        {{-- <span class="float-right">
                                            <a href="#" style="color: black" class="text-dark">
                                                <small></small>
                                            </a>
                                        </span> --}}
                                        Notifications
                                    </h5>
                                </div>
    
                                 <div class="slimscroll noti-scroll">
                         <div class="notify-icon bg-success">
                                            <i class="mdi mdi-account-plus">Pending Domain Requests</i>
                                        </div>
                                    <!-- item-->
                                @if ($ided == 1)
                                    @foreach ($pending as $p)
                                    <a href="pending" style="color: black" class="dropdown-item notify-item active">
                                        <div class="notify-icon">
                                            </div>
                                        <p class="notify-details"> Domain Name : {{ $p->name }}</p>
                                        <p class="text-muted mb-0 user-msg">
                                            <small>Doamin Url : {{ $p->url}}
                                            Created At : {{ $p->created_at }}
                                            </small>
                                        </p>
                                    </a>
                                    @endforeach
                                    <!-- item-->
                                    
                                    <!-- item-->
                                    <a href="delete" style="color: black" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-danger">
                                            <i class="mdi mdi-account-plus">Delete Domain Request </i>
                                        </div>
                                        <p class="notify-details">
                                            <small class="text-muted"></small>
                                        </p>
                                    </a>
                                     @foreach ($delete as $d)
                                    <a href="javascript:void(0);" style="color: black" class="dropdown-item notify-item active">
                                        <div class="notify-icon">
                                            </div>
                                        <p class="notify-details"> Domain Name : {{ $d->name }}</p>
                                        <p class="text-muted mb-0 user-msg">
                                            <small>Doamin Url : {{ $d->url}}
                                            Created At : {{ $d->created_at }}
                                            </small>
                                        </p>
                                    </a>
                                    @endforeach
                                    @else 
                                    @foreach ($pendingUser as $p)
                                    <a href="javascript:void(0);" style="color: black" class="dropdown-item notify-item active">
                                        <div class="notify-icon">
                                            </div>
                                        <p class="notify-details"> Domain Name : {{ $p->name }}</p>
                                        <p class="text-muted mb-0 user-msg">
                                            <small>Doamin Url : {{ $p->url}}
                                            Created At : {{ $p->created_at }}
                                            </small>
                                        </p>
                                    </a>
                                    @endforeach
                                    <!-- item-->
                                    
                                    <!-- item-->
                                    <a href="javascript:void(0);" style="color: black" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-danger">
                                            <i class="mdi mdi-account-plus">Delete Domain Request </i>
                                        </div> 
                                        <p class="notify-details">
                                            <small class="text-muted"></small>
                                        </p>
                                    </a>
                                     @foreach ($deteleUser as $d)
                                    <a href="javascript:void(0);" style="color: black" class="dropdown-item notify-item active">
                                        <div class="notify-icon">
                                            </div>
                                        <p class="notify-details"> Domain Name : {{ $d->name }}</p>
                                        <p class="text-muted mb-0 user-msg">
                                            <small>Doamin Url : {{ $d->url}}
                                            Created At : {{ $d->created_at }}
                                            </small>
                                        </p>
                                    </a>
                                    @endforeach
                                    @endif

    
                                <!-- All-->
                                <a href="javascript:void(0);" style="color: black" class="dropdown-item text-center text-primary notify-item notify-all">
                                    
                                    <i class="fi-arrow-right"></i>
                                </a>
    
                            </div>
                        </li>
    
                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user mr-0"  style="color: black"data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                
                                <span class="pro-user-name ml-1">
                                    {{-- {{ $user }} --}}
                                    
                                    <?php
                                        $user_id=auth()->user()->id;
                                        // echo $ided;
                                        $users  = DB::table('users')->where('id',$user_id)->get();
                                        //  echo $users;
                                        foreach($users as $user){
                                            $name = $user->name;
                                        } 
                                        echo $name; 
                                    ?>
                                    {{-- Nowak --}}
                                     <i class="mdi mdi-chevron-down"></i> 
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>
                                <br>
                                <!-- item-->
                                <a href="/my_account" style="color: black" class="dropdown-item notify-item">
                                    <i class="fe-user"></i>
                                    <span>My Account</span>
                                </a>
{{--     
                                <!-- item-->
                                <a href="javascript:void(0);" style="color: black" class="dropdown-item notify-item">
                                    <i class="fe-settings"></i>
                                    <span>Settings</span>
                                </a>
    
                                <!-- item-->
                                <a href="javascript:void(0);" style="color: black" class="dropdown-item notify-item">
                                    <i class="fe-lock"></i>
                                    <span>Lock Screen</span>
                                </a> --}}
    
                                <div class="dropdown-divider"></div>
    
                                <!-- item-->
                                <a href="{{ url('logout') }}" style="color: black" class="dropdown-item notify-item">
                                    <i class="fe-log-out"></i>
                                    <span>Logout</span>
                                </a>
    
                            </div>
                        </li>
    
                        {{-- <li class="dropdown notification-list">
                            <a style="color: black" href="javascript:void(0);" class="nav-link right-bar-toggle">
                                <i class="fe-settings noti-icon" style="font-size: 20px !important;"></i>
                            </a>
                        </li> --}}
    
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

