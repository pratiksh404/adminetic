<!DOCTYPE html>
<html lang="en">

<head>
    {{-- Meta --}}
    @include('adminetic::admin.layouts.components.meta')
    {{-- ASSET LINKS --}}
    <link rel="stylesheet" type="text/css" href="{{asset('adminetic/assets/css/vendors/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('adminetic/assets/css/vendors/slick-theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('adminetic/assets/css/vendors/animate.css')}}">
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('adminetic/assets/css/vendors/bootstrap.css')}}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('adminetic/assets/css/style.css')}}">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{asset('adminetic/assets/css/responsive.css')}}">
</head>
  <body class="landing-page">
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper landing-page">
      <!-- Page Body Start            -->
      <div class="landing-home">
        <div class="container-fluid">
          <div class="sticky-header">
            <header>                       
              <nav class="navbar navbar-b navbar-dark navbar-trans navbar-expand-xl fixed-top nav-padding" id="sidebar-menu"><a class="navbar-brand p-0" href="#"><img class="img-fluid" width="200" src="{{logo()}}" alt="{{title()}}"></a>
                <button class="navbar-toggler navabr_btn-set custom_nav" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation"><span></span><span></span><span></span></button>
                <div class="navbar-collapse justify-content-center collapse hidenav" id="navbarDefault">
                  <ul class="navbar-nav navbar_nav_modify" id="scroll-spy">
                    <li class="nav-item"><a class="nav-link" href="https://pratikdai404.gitbook.io/adminetic/">Documentation</a></li>
                    <li class="nav-item"><a class="nav-link" href="https://github.com/pratiksh404/adminetic" target="_blank">Github</a></li>
                  </ul>
                </div>
                <div class="buy-btn rounded-pill"><a class="nav-link js-scroll" href="{{route('login')}}" target="_blank">Login</a></div>
              </nav>
            </header>
          </div>
          <div class="row justify-content-center">
            <div class="col-lg-8 col-sm-10">
              <div class="content text-center">
                <div>
                  <h6 class="content-title"><img class="arrow-decore" src="{{asset('adminetic/assets/images/landing/decore/arrow.svg')}}" alt=""><span class="sub-title">Introducing </span></h6>
                  <h1 class="wow fadeIn">Scalable Admin panel with <span>adminetic </span>admin panel</h1>
                  <p class="mt-3 wow fadeIn">Adminetic is admin starter kit with user, role and permission, activity, settings and preference management along with CRUD, ACL, BREAD Permission, Repo Pattern, SuperAdmin Generator</p>
                  <div class="btn-grp mt-4"><a class="wow pulse" href="index.html" target="_blank" data-bs-placement="top" title="HTML"> <img src="{{asset('adminetic/assets/images/landing/icon/html/html.png')}}" alt=""></a><a class="wow pulse" href="https://vue.pixelstrap.com/{{title()}}/dashboard/default" target="_blank" data-bs-placement="top" title="Vue 2.6.10"> <img src="{{asset('adminetic/assets/images/landing/icon/vue/vue.png')}}" alt=""></a><a class="wow pulse" href="https://laravel.pixelstrap.com/{{title()}}/dashboard/index" target="_blank" data-bs-placement="top" title="Laravel 9"> <img src="{{asset('adminetic/assets/images/landing/icon/laravel/laravel.png')}}" alt=""></a><a class="wow pulse" href="javascript:void(0)" data-bs-placement="top" title="Coming soon"> <img src="{{asset('adminetic/assets/images/landing/stroke-icon/8.svg')}}" alt=""></a></div>
                </div>
              </div>
            </div>
            <div class="col-xl-7 col-lg-8 col-md-10">               
                <img class="screen1 img-fluid" src="{{asset('adminetic/assets/images/landing/screen1.png')}}" alt="{{title()}}">
            </div>
          </div>
        </div>
      </div>
      <section class="section-space premium-wrap">
        <div class="container"> 
          <ul class="decoration">
            <li class="flower-gif">
              <div class="mesh-loader">
                <div class="set-one">
                  <div class="circle"></div>
                  <div class="circle"></div>
                </div>
                <div class="set-two">
                  <div class="circle"></div>
                  <div class="circle"></div>
                </div>
              </div>
            </li>
            <li class="wavy-gif">
              <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 251 38">
                <path fill="none" stroke-width="10" stroke-miterlimit="10" d="M0,9C17.93,9,17.93,29,35.85,29S53.78,9,71.71,9s17.92,20,35.85,20S125.49,9,143.42,9s17.93,20,35.86,20S197.21,9,215.14,9,233.07,29,251,29"></path>
              </svg>
            </li>
          </ul>
          <div class="row justify-content-center">
            <div class="col-sm-12"> 
              <div class="landing-title">
                <h5 class="sub-title">Faster, Lighter & Dev. Friendly</h5>
                <h2> <span class="gradient-1">Benefits </span>of {{title()}}</h2>
                <p>{{description()}}</p>
              </div>
              <div class="vector-image"> <img src="{{asset('adminetic/assets/images/landing/vectors/1.svg')}}" alt=""></div>
            </div>
            <div class="col-xxl-8">
              <div class="row g-lg-5 g-3">
                <div class="col-md-4 col-6">
                  <div class="benefit-box purple">
                    <svg>
                      <use href="{{asset('adminetic/assets/svg/landing-icons.svg#ratings')}}"></use>
                    </svg>
                    <h2 class="mb-0">7</h2>
                    <h6 class="mb-0">Building Modules</h6>
                  </div>
                </div>
                <div class="col-md-4 col-6">
                  <div class="benefit-box red">
                    <svg>
                      <use href="{{asset('adminetic/assets/svg/landing-icons.svg#user_circle')}}"></use>
                    </svg>
                    <h2 class="mb-0">3</h2>
                    <h6 class="mb-0">Plugins</h6>
                  </div>
                </div>
                <div class="col-md-4 col-6">
                  <div class="benefit-box warning">
                    <svg>
                      <use href="{{asset('adminetic/assets/svg/landing-icons.svg#gear')}}"></use>
                    </svg>
                    <h2 class="mb-0">100+</h2>
                    <h6 class="mb-0">Projects</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section-space customer-support"> 
        <div class="container"> 
          <ul class="decoration d-sm-block d-none">
            <li class="round-gif"><img src="{{asset('adminetic/assets/images/landing/gifs/5.gif')}}" alt=""></li>
          </ul>
          <div class="row justify-content-center"> 
            <div class="col-sm-12"> 
              <div class="landing-title text-center">
                <div class="rating-title gap-2"><img class="decore-1" src="{{asset('adminetic/assets/images/landing/decore/arrow-3.svg')}}" alt="">
                  <ul class="d-flex ratings gap-1">
                    <li> <i class="fa fa-star"></i></li>
                    <li> <i class="fa fa-star"></i></li>
                    <li> <i class="fa fa-star"></i></li>
                    <li> <i class="fa fa-star"></i></li>
                    <li> <i class="fa fa-star"></i></li>
                  </ul>
                  <h6 class="rating-title mb-0">30+ Stars</h6>
                </div>
                <h2> <span class="gradient-1">Working </span>with {{title()}}</h2>
                <p>The goal of adminetic admin panel is to reduce tedious and repeating administrative dev modules and replace with automated and flexible code.</p>
              </div>
            </div>
            <div class="col-xxl-10">
              <div class="row customer-wrap">
                <div class="col-md-3 col-6">
                  <div class="customer-wrapper">
                    <div class="customer-box"> <img src="{{asset('adminetic/assets/images/landing/customers/1.svg')}}" alt="">
                      <h6 class="f-light mb-0 mt-2">Generate Module With Single Command</h6>
                    </div><img class="outline-box" src="{{asset('adminetic/assets/images/landing/decore/arrow-style-1.svg')}}" alt="">
                  </div>
                </div>
                <div class="col-md-3 col-6">
                  <div class="customer-wrapper">
                    <div class="customer-box"> <img src="{{asset('adminetic/assets/images/landing/customers/2.svg')}}" alt="">
                      <h6 class="f-light mb-0 mt-2">Set DB Schema</h6>
                    </div><img class="outline-box" src="{{asset('adminetic/assets/images/landing/decore/arrow-style-2.svg')}}" alt="">
                  </div>
                </div>
                <div class="col-md-3 col-6">
                  <div class="customer-wrapper">
                    <div class="customer-box"> <img src="{{asset('adminetic/assets/images/landing/customers/3.svg')}}" alt="">
                      <h6 class="f-light mb-0 mt-2">Auto ACL and Resource Generation</h6>
                    </div><img class="outline-box" src="{{asset('adminetic/assets/images/landing/decore/arrow-style-3.svg')}}" alt="">
                  </div>
                </div>
                <div class="col-md-3 col-6">
                  <div class="customer-wrapper">
                    <div class="customer-box"> <img src="{{asset('adminetic/assets/images/landing/customers/4.svg')}}" alt="">
                      <h6 class="f-light mb-0 mt-2">Start Customization To Your Liking</h6>
                    </div><img class="outline-box" src="{{asset('adminetic/assets/images/landing/decore/arrow-style-4.svg')}}" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="customization-wrap"> 
        <div class="container"> 
          <div class="row mb-4"> 
            <div class="col-lg-6"> 
              <div class="landing-title text-start">
                <h5 class="sub-title">Builtin Module</h5>
                <h2> <span class="gradient-3">User </span>Management</h2>
                <p class="m-0">Adminetic offer builtin interface to BREAD user module.</p>
              </div>
              <div class="customization-accordion"> 
                <div class="accordion" id="accordionExample">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">All User Panel</button>
                    </h2>
                    <div class="accordion-collapse collapse" id="collapseOne" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                      <div class="accordion-body f-light">User filter by role and search with pagination built with livewire.</div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">User Create, Edit And Delete</button>
                    </h2>
                    <div class="accordion-collapse collapse show" id="collapseTwo" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                      <div class="accordion-body f-light">User email and password change with option to set user role</div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">User Profile</button>
                    </h2>
                    <div class="accordion-collapse collapse" id="collapseThree" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                      <div class="accordion-body f-light">
                         Additional user attribute like :-
                        <ul>
                            <li>Username</li>
                            <li>Profile Picture</li>
                            <li>Gender</li>
                            <li>Birthday</li>
                            <li>Country</li>
                            <li>Martial Status</li>
                            <li>Blood Group</li>
                            <li>Father and Mother Name</li>
                            <li>Address</li>
                            <li>Phone</li>
                            <li>Facebook</li>
                            <li>Twitter</li>
                            <li>Linkedin</li>
                        </ul>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6"> 
              <div class="customization-img"> <img class="img-fluid" src="{{asset('adminetic/static/documentation/profile.jpg')}}" alt="User Module"></div>
            </div>
          </div>
          <br>
          <div class="row mb-4"> 
            <div class="col-lg-6"> 
              <div class="customization-img"> <img class="img-fluid" src="{{asset('adminetic/static/documentation/role.jpg')}}" alt="ACL Module"></div>
            </div>
            <div class="col-lg-6"> 
              <div class="landing-title text-start">
                <h5 class="sub-title">Builtin Module</h5>
                <h2> <span class="gradient-3">ACL </span>Management</h2>
                <p class="m-0">Adminetic complete and secure authorization module based on role. It mainly focuses on BREAD(Browse, Read, Edit, Add and Delete) authorization</p>
              </div>
              <div class="customization-accordion"> 
                <div class="accordion" id="accordionExample">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Role Panel</button>
                    </h2>
                    <div class="accordion-collapse collapse" id="collapseOne" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                      <div class="accordion-body f-light">List of role panel with action link to edit, delete and permission management.</div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">Permission Panel</button>
                    </h2>
                    <div class="accordion-collapse collapse show" id="collapseTwo" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                      <div class="accordion-body f-light">List of system permission flags that can be turned off and on.</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <br>
          <div class="row mb-4"> 
                <div class="col-lg-6"> 
              <div class="landing-title text-start">
                <h5 class="sub-title">Builtin Module</h5>
                <h2> <span class="gradient-3">Setting </span>Management</h2>
                <p class="m-0">Adminetic provide flexible and dynamic setting value store feature</p>
              </div>
              <div class="customization-accordion"> 
                <div class="accordion" id="accordionExample">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Setting Value Panel</button>
                    </h2>
                    <div class="accordion-collapse collapse" id="collapseOne" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                      <div class="accordion-body f-light">List of dynamically generated setting flags that is provided to general user</div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">Setting List Panel</button>
                    </h2>
                    <div class="accordion-collapse collapse show" id="collapseTwo" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                      <div class="accordion-body f-light">List of system setting flags with its value type</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6"> 
              <div class="customization-img"> <img class="img-fluid" src="{{asset('adminetic/static/documentation/setting.jpg')}}" alt="Setting Module"></div>
            </div>
          </div>
          <br>
          <div class="row mb-4"> 
            <div class="col-lg-6"> 
              <div class="customization-img"> <img class="img-fluid" src="{{asset('adminetic/static/documentation/activity.jpg')}}" alt="Activity Module"></div>
            </div>
            <div class="col-lg-6"> 
              <div class="landing-title text-start">
                <h5 class="sub-title">Builtin Module</h5>
                <h2> <span class="gradient-3">Activity </span>Log</h2>
                <p class="m-0">Adminetic automatically logs Edit, Add and Delete action of every adminetic module</p>
              </div>
              <div class="customization-accordion"> 
                <div class="accordion" id="accordionExample">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Activity Log Panel</button>
                    </h2>
                    <div class="accordion-collapse collapse" id="collapseOne" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                      <div class="accordion-body f-light">List of activity log with module, user that initialized that action, action time</div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">Filter and action panel</button>
                    </h2>
                    <div class="accordion-collapse collapse show" id="collapseTwo" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                      <div class="accordion-body f-light">
                        <ul>
                            <li>Delete All and Delete By Date Feature</li>
                            <li>Date range filter</li>
                            <li>Model filter</li>
                            <li>Log name filter</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section-space app-section" id="applications">
        <div class="container-fluid fluid-space">
          <ul class="decoration">
            <li class="wavy-gif">
              <svg xmlns="http://www.w3.org/2000/svg')}}" viewbox="0 0 251 38">
                <path fill="none" stroke-width="10" stroke-miterlimit="10" d="M0,9C17.93,9,17.93,29,35.85,29S53.78,9,71.71,9s17.92,20,35.85,20S125.49,9,143.42,9s17.93,20,35.86,20S197.21,9,215.14,9,233.07,29,251,29"></path>
              </svg>
            </li>
          </ul>
          <div class="row">
            <div class="col-sm-12 wow pulse">
              <div class="landing-title">
                <h5 class="sub-title">Adminetic Admin Panel</h5>
                <h2>
                   Some of the <span class="gradient-4">screenshots</span></h2>
              </div>
            </div>
          </div>
          <div class="row g-4">
            <div class="col-xl-4 col-md-6"> 
              <div class="app-box app-bg-1"> 
                <h6><span class="app-title">Login</span><span class="line"></span></h6>
                <div class="app-image">
                  <ul class="dot-group">
                    <li></li>
                    <li></li>
                    <li></li>
                  </ul>
                  <div class="img-effect"><a href="#" target="_blank"><img class="img-fluid cuba-img" src="{{asset('adminetic/static/documentation/login.jpg')}}" alt="Login"></a></div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-6"> 
              <div class="app-box app-bg-1"> 
                <h6><span class="app-title">User</span><span class="line"></span></h6>
                <div class="app-image">
                  <ul class="dot-group">
                    <li></li>
                    <li></li>
                    <li></li>
                  </ul>
                  <div class="img-effect"><a href="#" target="_blank"><img class="img-fluid cuba-img" src="{{asset('adminetic/static/documentation/profile.jpg')}}" alt="User"></a></div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-6"> 
              <div class="app-box app-bg-1"> 
                <h6><span class="app-title">Role</span><span class="line"></span></h6>
                <div class="app-image">
                  <ul class="dot-group">
                    <li></li>
                    <li></li>
                    <li></li>
                  </ul>
                  <div class="img-effect"><a href="#" target="_blank"><img class="img-fluid cuba-img" src="{{asset('adminetic/static/documentation/role.jpg')}}" alt="Role"></a></div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-6"> 
              <div class="app-box app-bg-1"> 
                <h6><span class="app-title">Setting</span><span class="line"></span></h6>
                <div class="app-image">
                  <ul class="dot-group">
                    <li></li>
                    <li></li>
                    <li></li>
                  </ul>
                  <div class="img-effect"><a href="#" target="_blank"><img class="img-fluid cuba-img" src="{{asset('adminetic/static/documentation/setting.jpg')}}" alt="Setting"></a></div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-6"> 
              <div class="app-box app-bg-1"> 
                <h6><span class="app-title">Generator</span><span class="line"></span></h6>
                <div class="app-image">
                  <ul class="dot-group">
                    <li></li>
                    <li></li>
                    <li></li>
                  </ul>
                  <div class="img-effect"><a href="#" target="_blank"><img class="img-fluid cuba-img" src="{{asset('adminetic/static/documentation/crud_generator.jpg')}}" alt="Setting"></a></div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-6"> 
              <div class="app-box app-bg-1"> 
                <h6><span class="app-title">Dashboard</span><span class="line"></span></h6>
                <div class="app-image">
                  <ul class="dot-group">
                    <li></li>
                    <li></li>
                    <li></li>
                  </ul>
                  <div class="img-effect"><a href="#" target="_blank"><img class="img-fluid cuba-img" src="{{asset('adminetic/static/documentation/dashboard.jpg')}}" alt="Setting"></a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <marquee class="text-marqee" direction="left"> 
          <h2 class="big-title">Faster, Lighter & Friendly </h2>
        </marquee>
      </section>
      <section class="section-space feature-section pt-0"> 
        <ul class="decoration">
          <li class="round-gif"><img src="{{asset('adminetic/assets/images/landing/gifs/5.gif')}}" alt=""></li>
        </ul>
        <div class="container">
          <div class="row"> 
            <div class="col-sm-12 wow pulse">
              <div class="landing-title">
                <h5 class="sub-title">Why you choose {{title()}}</h5>
                <h2>
                   Introducing our <span class="gradient-5">Core Features</span></h2>
              </div>
              <div class="vector-image"> <img src="{{asset('adminetic/assets/images/landing/vectors/2.svg')}}" alt="vector women"></div>
            </div>
          </div>
          <div class="row g-4"> 
            <div class="col-xxl-3 col-lg-4 col-sm-6"> 
              <div class="feature-box common-card bg-feature-1">
                <div class="feature-icon"> <img src="{{asset('adminetic/assets/images/landing/feature-icon/1.svg')}}"></div>
                <h5>Quality & Clean Code</h5>
                <p class="mb-0 f-light">All you need to know of using clean code as a manager to make your team and your software awesome. </p>
              </div>
            </div>
            <div class="col-xxl-3 col-lg-4 col-sm-6"> 
              <div class="feature-box common-card bg-feature-2">
                <div class="feature-icon"> <img src="{{asset('adminetic/assets/images/landing/feature-icon/2.svg')}}" alt=""></div>
                <h5>Clean UI</h5>
                <p class="mb-0 f-light">Build with minimal and clean UI.</p>
              </div>
            </div>
            <div class="col-xxl-3 col-lg-4 col-sm-6"> 
              <div class="feature-box common-card bg-feature-3">
                <div class="feature-icon"> <img src="{{asset('adminetic/assets/images/landing/feature-icon/3.svg')}}" alt=""></div>
                <h5>Generator</h5>
                <p class="mb-0 f-light">CRUD, ACL, Repository Pattern and Setting Generator</p>
              </div>
            </div>
            <div class="col-xxl-3 col-lg-4 col-sm-6"> 
              <div class="feature-box common-card bg-feature-4">
                <div class="feature-icon"> <img src="{{asset('adminetic/assets/images/landing/feature-icon/4.svg')}}" alt=""></div>
                <h5>Buildin Modules</h5>
                <p class="mb-0 f-light">User, Role, Permission, Setting, Profile and Preference Module</p>
              </div>
            </div>
            <div class="col-xxl-3 col-lg-4 col-sm-6"> 
              <div class="feature-box common-card bg-feature-5">
                <div class="feature-icon"> <img src="{{asset('adminetic/assets/images/landing/feature-icon/5.svg')}}" alt=""></div>
                <h5>Easy Customizable</h5>
                <p class="mb-0 f-light">Easy Step-By-Step Guide for Beginners.customize your layout, settings and content</p>
              </div>
            </div>
            <div class="col-xxl-3 col-lg-4 col-sm-6"> 
              <div class="feature-box common-card bg-feature-6">
                <div class="feature-icon"> <img src="{{asset('adminetic/assets/images/landing/feature-icon/6.svg')}}" alt=""></div>
                <h5>Plug and Play</h5>
                <p class="mb-0 f-light">Comes with library of plugins like website, pos, notification etc modules.</p>
              </div>
            </div>
            <div class="col-xxl-3 col-lg-4 col-sm-6"> 
              <div class="feature-box common-card bg-feature-7">
                <div class="feature-icon"> <img src="{{asset('adminetic/assets/images/landing/feature-icon/7.svg')}}" alt=""></div>
                <h5>Premium Support</h5>
                <p class="mb-0 f-light">We are always be their for your support and you are facing some issues you can create ticket.</p>
              </div>
            </div>
            <div class="col-xxl-3 col-lg-4 col-sm-6"> 
              <div class="feature-box common-card bg-feature-8">
                <div class="feature-icon"> <img src="{{asset('adminetic/assets/images/landing/feature-icon/8.svg')}}" alt=""></div>
                <h5>Colors Options</h5>
                <p class="mb-0 f-light">{{title()}} provide unlimited main color option.other colors you can change easily using scss variables</p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="build-section"> 
        <div class="container">
          <ul class="decoration">
            <li class="loader-gif"><span class="loader-1"> </span></li>
          </ul>
          <div class="row"> 
            <div class="col-sm-12 wow pulse"> 
              <div class="landing-title text-start">
                <h2>Build stunning and powerful web application with <span class="gradient-6">customizable and easy </span> adminetic admin panel</h2><img class="title-img d-sm-block d-none" src="{{asset('adminetic/assets/images/landing/decore/arrow-4.svg')}}" alt="">
                <h4 class="d-sm-block d-none sub-title rotate-title mb-0">Join the adminetic eco system.</h4>
              </div>
            </div>
          </div>
          <div class="row g-4"> 
            <div class="col-md-6"> 
              <div class="build-image"> <img src="{{asset('adminetic/assets/images/landing/sale.png')}}" alt=""></div>
            </div>
            <div class="col-md-6"> 
              <div class="build-content text-end"> 
                <p class="f-light mb-0">Create a module with single command <b>php artisan make:crud module_name --acl</b> which provides necessary BREAD view file, controller, repository class, interface, route file and its implementation, auto menu generation and policies.</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="section-space components-section cuba-demo-section pt-0" id="components" style="width: 90vw; margin:5vw">
        <div class="container">
          <ul class="decoration">
            <li class="flower-gif">
              <div class="mesh-loader">
                <div class="set-one">
                  <div class="circle"></div>
                  <div class="circle"></div>
                </div>
                <div class="set-two">
                  <div class="circle"></div>
                  <div class="circle"></div>
                </div>
              </div>
            </li>
          </ul>
          <div class="row">
            <div class="col-sm-12 wow pulse">
              <div class="{{title()}}-demo-content">
                <div class="couting">
                  <h2>90+</h2>
                </div>
                <div class="landing-title">
                  <h5 class="sub-title">Usable Components</h5>
                  <h2><span class="gradient-8">Flexibile and easy </span> components</h2>
                </div>
              </div>
              <div class="vector-image"> <img src="{{asset('adminetic/assets/images/landing/vectors/3.svg')}}" alt="vector women"></div>
            </div>
          </div>
        </div>
        <div class="container-fluid" style="overflow: hidden;">
          <div class="row g-3 mb-3">
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{asset('adminetic/assets/images/landing/icon/1.svg')}}" alt="">
                <h6 class="m-0 Pt-4">Action Buttons</h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{asset('adminetic/assets/images/landing/icon/2.svg')}}" alt="">
                <h6 class="m-0">Profile</h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{asset('adminetic/assets/images/landing/icon/3.svg')}}" alt="">
                <h6 class="m-0">Index Component</h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{asset('adminetic/assets/images/landing/icon/4.svg')}}" alt="">
                <h6 class="m-0">Multilevel Menu</h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{asset('adminetic/assets/images/landing/icon/5.svg')}}" alt="">
                <h6 class="m-0">Notification Plugin</h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{asset('adminetic/assets/images/landing/icon/6.svg')}}" alt="">
                <h6 class="m-0">Cache Data </h6>
              </div>
            </div>
          </div>
          <div class="row component_responsive g-3 mb-3" data-jarallax-element="0 -150">
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{asset('adminetic/assets/images/landing/icon/7.svg')}}" alt="">
                <h6 class="m-0">Edit Component</h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{asset('adminetic/assets/images/landing/icon/8.svg')}}" alt="">
                <h6 class="m-0">SPA</h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{asset('adminetic/assets/images/landing/icon/9.svg')}}" alt="">
                <h6 class="m-0">Show Component</h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{asset('adminetic/assets/images/landing/icon/10.svg')}}" alt="">
                <h6 class="m-0">Responsive</h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{asset('adminetic/assets/images/landing/icon/11.svg')}}" alt="">
                <h6 class="m-0">Activity Log </h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{asset('adminetic/assets/images/landing/icon/12.svg')}}" alt="">
                <h6 class="m-0">Uniform Code Structure </h6>
              </div>
            </div>
          </div>
          <div class="row component_responsive g-3 mb-3" data-jarallax-element="0 100">
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{asset('adminetic/assets/images/landing/icon/13.svg')}}" alt="">
                <h6 class="m-0">Helper Commands </h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{asset('adminetic/assets/images/landing/icon/14.svg')}}" alt="">
                <h6 class="m-0">Breadcrumb  </h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{asset('adminetic/assets/images/landing/icon/15.svg')}}" alt="">
                <h6 class="m-0">API Generator </h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{asset('adminetic/assets/images/landing/icon/16.svg')}}" alt="">
                <h6 class="m-0">Image Thumbnail Support </h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{asset('adminetic/assets/images/landing/icon/17.svg')}}" alt="">
                <h6 class="m-0">Swagger Support </h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{asset('adminetic/assets/images/landing/icon/18.svg')}}" alt="">
                <h6 class="m-0">Performance </h6>
              </div>
            </div>
          </div>
          <div class="row component_responsive g-3 mb-3" data-jarallax-element="0 -150">
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{asset('adminetic/assets/images/landing/icon/19.svg')}}" alt="">
                <h6 class="m-0">Dynamic Setting </h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{asset('adminetic/assets/images/landing/icon/20.svg')}}" alt="">
                <h6 class="m-0">Spinners </h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{asset('adminetic/assets/images/landing/icon/21.svg')}}" alt="">
                <h6 class="m-0">Menu Search </h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{asset('adminetic/assets/images/landing/icon/22.svg')}}" alt="">
                <h6 class="m-0">Dark Mode </h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{asset('adminetic/assets/images/landing/icon/23.svg')}}" alt="">
                <h6 class="m-0">Notification Setting  </h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{asset('adminetic/assets/images/landing/icon/24.svg')}}" alt="">
                <h6 class="m-0">No reload nav</h6>
              </div>
            </div>
          </div>
          <div class="row component_responsive g-3" data-jarallax-element="0 100">
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{asset('adminetic/assets/images/landing/icon/25.svg')}}" alt="">
                <h6 class="m-0">Shadow</h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{asset('adminetic/assets/images/landing/icon/26.svg')}}" alt="">
                <h6 class="m-0">state color</h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{asset('adminetic/assets/images/landing/icon/27.svg')}}" alt="">
                <h6 class="m-0">Datatable  </h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{asset('adminetic/assets/images/landing/icon/28.svg')}}" alt="">
                <h6 class="m-0">Grid </h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{asset('adminetic/assets/images/landing/icon/29.svg')}}" alt="">
                <h6 class="m-0">Documentation </h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{asset('adminetic/assets/images/landing/icon/30.svg')}}" alt="">
                <h6 class="m-0">Typography</h6>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section-space document-section feature-section pt-0" id="documentation">
        <div class="container"> 
          <div class="row"> 
            <div class="col-sm-12 wow pulse"> 
              <div class="landing-title">
                <h5 class="sub-title">Our Documentation</h5>
                <h2><span class="gradient-5">Well </span>Documented</h2>
             
              </div>
            </div>
          </div>
          <div class="row g-sm-4 g-3">
            <div class="col-xl-3 col-lg-4 col-6"><a class="document-box" href="https://docs.pixelstrap.com/{{title()}}/html/document/" target="_blank">
                <div class="doc-icon bg-icon1"><img src="{{asset('adminetic/assets/images/landing/icon/django/bootstrap.png')}}" alt="html logo"></div>
                <h5>Bootstrap 5</h5></a></div>
            <div class="col-xl-3 col-lg-4 col-6"><a class="document-box" href="https://vue-{{title()}}-doc.vercel.app/" target="_blank">
                <div class="doc-icon bg-icon3"><img src="{{asset('adminetic/assets/images/landing/icon/vue/vue.png')}}" alt="vue logo"></div>
                <h5>Vue 3</h5></a></div>
            <div class="col-xl-3 col-lg-4 col-6"><a class="document-box" href="https://docs.pixelstrap.com/{{title()}}/laravel/document/" target="_blank">
                <div class="doc-icon bg-icon5"><img src="{{asset('adminetic/assets/images/landing/icon/laravel/laravel.png')}}" alt="laravel logo"></div>
                <h5>Laravel</h5></a></div>
            <div class="col-xl-3 col-lg-4 col-6"><a class="document-box" href="https://docs.pixelstrap.com/{{title()}}/php/document/" target="_blank">
                <div class="doc-icon bg-icon10"><img src="{{asset('adminetic/assets/images/landing/stroke-icon/8.svg')}}" alt="php logo"></div>
                <h5>PHP</h5></a></div>
          </div>
        </div>
      </section>
      <footer class="footer-bg">
        <div class="container">
          <div class="landing-center ptb50">
            <div class="feature-content">
              <ul> 
                <li> 
                  <h4>Trending Admin Panel</h4><img src="{{asset('adminetic/assets/images/landing/feature-img.png')}}" alt="leaf golden">
                </li>
                <li> 
                  <h4>Overall Best rated</h4><img src="{{asset('adminetic/assets/images/landing/feature-img.png')}}" alt="leaf golden">
                </li>
                <li> 
                  <h4>Downloads</h4><img src="{{asset('adminetic/assets/images/landing/feature-img.png')}}" alt="leaf golden">
                </li>
              </ul>
            </div>
            <div class="landing-title">
              <h2>Build a <span class="gradient-13">stunning app </span> today</h2>
              <p>{{description()}}</p>
            </div>
          </div>
          <div class="sub-footer row g-2">
            <div class="col-md-6"> 
              <h6 class="mb-0">Copyright © {{\Carbon\Carbon::now()->year}} {{title()}}, All rights reserved.</h6>
            </div>
            <div class="col-md-6"> 
              <ul> 
                <li> 
                  <h6 class="mb-0">Find us on</h6>
                </li>
                <li> <a href="https://www.facebook.com/"><i class="fa fa-facebook-square"></i></a></li>
                <li><a href="https://twitter.com/login"> <i class="fa fa-twitter"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
    {{-- ASSET SCRIPTS --}}
      <!-- latest jquery-->
    <script src="{{asset('adminetic/assets/js/jquery-3.5.1.min.js')}}"></script>
    <!-- Bootstrap js-->
    <script src="{{asset('adminetic/assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
    <!-- feather icon js-->
    <script src="{{asset('adminetic/assets/js/icons/feather-icon/feather.min.js')}}"></script>
    <script src="{{asset('adminetic/assets/js/icons/feather-icon/feather-icon.js')}}"></script>
    <!-- Plugins JS start-->
    <script src="{{asset('adminetic/assets/js/tooltip-init.js')}}"></script>
    <script src="{{asset('adminetic/assets/js/animation/wow/wow.min.js')}}"></script>
    <script src="{{asset('adminetic/assets/js/landing_sticky.js')}}"></script>
    <script src="{{asset('adminetic/assets/js/landing.js')}}"></script>
    <script src="{{asset('adminetic/assets/js/jarallax_libs/libs.min.js')}}"></script>
    <script src="{{asset('adminetic/assets/js/slick/slick.min.js')}}"></script>
    <script src="{{asset('adminetic/assets/js/slick/slick.js')}}"></script>
    <script src="{{asset('adminetic/assets/js/landing-slick.js')}}"></script>
    <!-- Plugins JS Ends-->
  </body>

</html>