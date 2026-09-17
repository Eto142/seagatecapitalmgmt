<!DOCTYPE html>
<html lang="en">
<!-- START: Head-->

<head>
    <meta charset="UTF-8">
    <title>Seagatecapitalmgmt | User panel</title>
    <link rel="shortcut icon" href="{{asset('dist/images/favicon.ico')}}" />
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- START: Template CSS-->
    <link rel="stylesheet" href="{{ asset('dist/vendors/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/vendors/jquery-ui/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/vendors/jquery-ui/jquery-ui.theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/vendors/simple-line-icons/css/simple-line-icons.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <!-- END Template CSS-->

    <!-- START: Page CSS-->
    <link rel="stylesheet" href="{{ asset('dist/vendors/morris/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/vendors/weather-icons/css/pe-icon-set-weather.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/vendors/chartjs/Chart.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/vendors/starrr/starrr.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/vendors/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/vendors/ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/vendors/cryptofont/cryptofont.css') }}">
    <!-- END: Page CSS-->

    <!-- START: Custom CSS-->
    <link rel="stylesheet" href="{{ asset('dist/css/main.css') }}">
    <!-- END: Custom CSS-->

    <script>
        jQuery(document).ready(function($) {
            $(".toggle").click(function() {
                $(".toggle").toggleClass("active");
                $("body").toggleClass("night");
                $.cookie("toggle", $(".toggle").hasClass('active'));
            });

            if ($.cookie("toggle") == "true") {
                $(".toggle").addClass("active");
                $("body").addClass("night");
            }
        });
    </script>
    <!-- END: Custom CSS-->
</head>
<!-- END Head-->
<!-- START: Body-->

<body id="main-container" class="default">
    <!-- START: Pre Loader-->
    <div class="se-pre-con">
        <img src="{{asset('static/logo.png')}}" alt="logo" width="20" class="img-fluid" />
    </div>
    <!-- END: Pre Loader-->
    <form id="logout-form" action="{{route('user.logout')}}" method="GET" style="display: none;">
        @csrf
    </form>
    <!-- START: Header-->
    <div id="header-fix" class="header fixed-top">
        <nav class="navbar navbar-expand-lg  p-0">
            <div class="navbar-header h4 mb-0 align-self-center d-flex">
                <a class="horizontal-logo align-self-center d-flex d-lg-none">
                    <span class="h5 align-self-center mb-0 ">iPONGDEV</span>
                </a>
                <a href="#" class="sidebarCollapse ml-2" id="collapse"><i class="icon-menu body-color"></i></a>
            </div>
            <div class="d-inline-block position-relative">
                <button id="tourfirst" data-toggle="dropdown" aria-expanded="false"
                    class="btn btn-primary p-2 rounded mx-3 h4 mb-0 line-height-1 d-none d-lg-block">
                    <span class="text-white font-weight-bold h5"><span
                            class="icon-wallet mr-2 h6  mb-0"></span>&#36;50.00</span></button>

            </div>


            <div class="navbar-right ml-auto">
                <ul class="ml-auto p-0 m-0 list-unstyled d-flex">

                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    @if(Auth::user()->user_status == 1)
                    <li class="mr-1 d-inline-block my-auto">
                        <h6>
                            <a>
                                <font color="green"></font>
                            </a><br>
                            <a href="#" data-toggle="modal" data-target="">
                                <font color="green">VERIFIED</font>
                            </a>
                        </h6>
                    </li>
                    @endif




                    <li class="mr-1 d-inline-block my-auto d-block d-lg-none">
                        </i>
                        </a>
                    </li>




                    <!-- Notification Page-->
                    <li class="dropdown align-self-center mr-1 d-inline-block">
                        <a href="#" class="nav-link px-2" data-toggle="dropdown" aria-expanded="false"><i
                                class="icon-bell h4"></i>
                            <span class="badge badge-default"> <span class="ring">
                                </span><span class="ring-point">
                                </span> </span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right border   py-0">
                            <li>
                                <a class="dropdown-item px-2 py-2 border border-top-0 border-left-0 border-right-0"
                                    href="#">
                                    <div class="media">
                                        <img src="{{asset('static/logo.png')}}" alt=""
                                            class="d-flex mr-3 img-fluid rounded-circle w-50">
                                        <div class="media-body">
                                            <h6>Welcome</h6>
                                            <hr>
                                            <p class="mb-0 text-success"> From Admin</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- End Notification-->


                    <!-- START: Header Profile-->
                    <li class="dropdown user-profile d-inline-block py-1 mr-2">
                        <a href="#" class="nav-link px-2 py-0" data-toggle="dropdown" aria-expanded="false">
                            <div class="media">
                                <div class="media-body align-self-center d-none d-sm-block mr-2">
                                    <p class="mb-0 text-uppercase line-height-1"><b>
                                            {{Auth::user()->name}}</b><br /><span>
                                        </span></p>

                                </div>
                                <img src="/profilep.png" alt="" class="d-flex img-fluid rounded-circle" width="45">
                            </div>
                        </a>

                        <div class="dropdown-menu  dropdown-menu-right p-0">
                            <a href="{{route('profile')}}" class="dropdown-item px-2 align-self-center d-flex">
                                <span class="icon-pencil mr-2 h6 mb-0"></span> Profile</a>
                            <a href="{{route('account.details')}}" class="dropdown-item px-2 align-self-center d-flex">
                                <span class="icon-user mr-2 h6 mb-0"></span> Payment Details</a>

                            <div class="dropdown-divider"></div>
                            <div class="dropdown-divider"></div>
                            @if (session()->has('impersonate'))
                            <a href="{{ route('users.leave-impersonate') }}"
                                class="dropdown-item px-2 text-danger align-self-center d-flex">
                                <i class=" feather icon-power "></i> Logout</a>
                            @else
                            <a href="{{route('user.logout')}}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="dropdown-item px-2 text-danger align-self-center d-flex">
                                <span class="icon-logout mr-2 h6  mb-0"></span>Sign Out</a>
                            @endif

                    </li>

                </ul>
            </div>
        </nav>
    </div>
    <!-- END: Header-->



    <!-- START: Main Menu-->
    <div class="sidebar">
        <a href="#"
            class="sidebarCollapse float-right h6 dropdown-menu-right mr-2 mt-2 position-absolute d-block d-lg-none">
            <i class="icon-close"></i>
        </a>
        <!-- START: Logo-->
        <a href="#" class="sidebar-logo d-flex">
            <img src="{{asset('static/logo.png')}}" alt="" class=" align-self-center mb-0 d-flex mr-3 img-fluid  w-100">
        </a>
        <!-- END: Logo-->

        <!-- ADMIN: Menu START-->

        <!-- ADMIN: Menu END-->

        <!-- USER: Menu STRAT-->


        <!-- START: Menu-->
        <ul id="side-menu" class="sidebar-menu">
            <li class="dropdown active"><a href="{{route('home')}}"><i class="icon-home"></i>Dashboard</a>
            </li>
            <li class="dropdown"><a href="{{route('deposits')}}"><i class="icon-wallet"></i>Fund
                    Account</a>
            </li>
            <li class="dropdown"><a href="{{route('withdrawals')}}"><i class="icon-basket"></i>Withdrawal</a>
            </li>
            <li class="dropdown"><a href="{{route('m.plans')}}"><i class="icon-grid"></i>Purchase
                    Plan</a>
            <li class="dropdown"><a href="https://Seagatecapitalmgmt.com/dashboard/myplans"><i class="icon-grid"></i>Active
                    Plans</a>
            <li class="dropdown"><a href="{{route('trading.history')}}"><i class="icon-grid"></i>Trade
                    History</a>
                <!--- <div> 
                        <ul>
                            <li><a href="https://Seagatecapitalmgmt.com/dashboard/mplans"><i class="icon-loop"></i> Activate Package</a></li>
                            <li><a href="https://Seagatecapitalmgmt.com/dashboard/myplans"><i class="icon-eye"></i> Current Package</a></li>
                            <li><a href="https://Seagatecapitalmgmt.com/dashboard/tradinghistory"><i class="icon-compass"></i> Transaction ROI</a></li>                        
                        </ul> 
                    </div>-->

            </li>

            <li class="dropdown"><a href="{{route('profile')}}"><i class="icon-user"></i>Profile</a>
                <div>
                    <ul>
                        <li><a href="{{route('profile')}}"><i class="icon-user-following"></i>
                                Personal Account</a></li>
                        <li><a href="{{route('account.details')}}"><i class="icon-pencil"></i> Update
                                Payment Details</a></li>
                    </ul>
                </div>

            </li>
            <li class="dropdown"><a href="{{route('refer.user')}}"><i class="icon-link"></i>Referral</a>
            </li>
            <li class="dropdown"><a href="#"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                        class="icon-logout"></i>Logout</a>

            <li><a href="#"><i class=" "></i></a></li>

            </li>


        </ul>
        <!-- END: Menu-->
    </div>
    <!-- END: Main Menu-->
    <!-- GetButton.io widget -->
    <!-- <script type="text/javascript">
    //     (function() {
    //             var options = {
    //                 whatsapp: "+14159422108", // WhatsApp number
    //                 call_to_action: "Reach-out on Whatsapp", // Call to action
    //                 position: "left", // Position may be 'right' or 'left'
    //             };
    //             var proto = document.location.protocol,
    //                 host = "getbutton.io",
    //                 url = proto + "//static." + host;
    //             var s = document.createElement('script');
    //             s.type = 'text/javascript';
    //             s.async = true;
    //             s.src = url + '/widget-send-button/js/init.js';
    //             s.onload = function() {
    //                 WhWidgetSendButton.init(host, proto, options);
    //             };
    //             var x = document.getElementsByTagName('script')[0];
    //             x.parentNode.insertBefore(s, x);
    //         })();
    // </script>  -->
    <!-- /GetButton.io widget -->
    <!-- ADMIN DISPLAY STARTS-->

    <!-- ADMIN DISPLAY ENDS-->
    <!-- USER DISPLAY STARTS-->
    <!-- Smartsupp Live Chat script -->
    <script type="text/javascript">
        var _smartsupp = _smartsupp || {};
_smartsupp.key = '1e8bf6c4a66f4249c8de550fa50520b03ebab3ac';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
    </script>
    <noscript> Powered by <a href=“https://www.smartsupp.com” target=“_blank”>Smartsupp</a></noscript>