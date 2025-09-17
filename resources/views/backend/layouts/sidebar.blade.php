@push('styles')
    <style>
        .neon-text {
            color: #06b6d4;
            text-shadow: 0 0 10px #06b6d4;
        }

        .gradient-text {
            background: linear-gradient(45deg, #06b6d4, #ec4899);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
@endpush
<!--**********************************
        ***********************************-->
<div class="nav-header d-flex align-items-center" style="background-color: rgba(8, 15, 32, 0.95);">
    <a href="#" class="brand-logo d-flex align-items-center">
        <img class="logo-abbr me-2" src="{{ asset('assets/img/logo.svg') }}" alt="">
        <span class="brand-text text-white fw-bold fs-5 ml-3 d-none d-lg-block gradient-text">SALUT
            DIGITECH</span>
    </a>

    <div class="nav-control ms-auto">
        <div class="hamburger">
            <span class="line"></span><span class="line"></span><span class="line"></span>
        </div>
    </div>
</div>

<!--**********************************
            Nav header end
        ***********************************-->

<!--**********************************
            Header start
        ***********************************-->
<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">
                    <div class="search_bar dropdown">
                        <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                            <i class="mdi mdi-magnify"></i>
                        </span>
                        <div class="dropdown-menu p-0 m-0">
                            <form>
                                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                            </form>
                        </div>
                    </div>
                </div>

                <ul class="navbar-nav header-right">
                    {{-- <li class="nav-item dropdown notification_dropdown">
                         <a class="nav-link bell ai-icon" href="#" role="button" data-toggle="dropdown">
                             <svg id="icon-user" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                 viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
                                 <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                 <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                             </svg>
                             <div class="pulse-css"></div>
                         </a>
                         <div class="dropdown-menu dropdown-menu-right">
                             <ul class="list-unstyled">
                                 <li class="media dropdown-item">
                                     <span class="success"><i class="ti-user"></i></span>
                                     <div class="media-body">
                                         <a href="#">
                                             <p><strong>Martin</strong> has added a <strong>customer</strong>
                                                 Successfully
                                             </p>
                                         </a>
                                     </div>
                                     <span class="notify-time">3:20 am</span>
                                 </li>
                                 <li class="media dropdown-item">
                                     <span class="primary"><i class="ti-shopping-cart"></i></span>
                                     <div class="media-body">
                                         <a href="#">
                                             <p><strong>Jennifer</strong> purchased Light Dashboard 2.0.</p>
                                         </a>
                                     </div>
                                     <span class="notify-time">3:20 am</span>
                                 </li>
                                 <li class="media dropdown-item">
                                     <span class="danger"><i class="ti-bookmark"></i></span>
                                     <div class="media-body">
                                         <a href="#">
                                             <p><strong>Robin</strong> marked a <strong>ticket</strong> as unsolved.
                                             </p>
                                         </a>
                                     </div>
                                     <span class="notify-time">3:20 am</span>
                                 </li>
                                 <li class="media dropdown-item">
                                     <span class="primary"><i class="ti-heart"></i></span>
                                     <div class="media-body">
                                         <a href="#">
                                             <p><strong>David</strong> purchased Light Dashboard 1.0.</p>
                                         </a>
                                     </div>
                                     <span class="notify-time">3:20 am</span>
                                 </li>
                                 <li class="media dropdown-item">
                                     <span class="success"><i class="ti-image"></i></span>
                                     <div class="media-body">
                                         <a href="#">
                                             <p><strong> James.</strong> has added a<strong>customer</strong>
                                                 Successfully
                                             </p>
                                         </a>
                                     </div>
                                     <span class="notify-time">3:20 am</span>
                                 </li>
                             </ul>
                             <a class="all-notification" href="#">See all notifications <i
                                     class="ti-arrow-right"></i></a>
                         </div>
                     </li> --}}
                    {{-- <li class="nav-item dropdown header-profile">
                         <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                             <img src="backend-assets/images/profile/education/pic1.jpg" width="20" alt="">
                         </a> --}}
                    <li class="nav-item dropdown header-profile">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                            <img src="{{ asset('backend-assets/images/profile/profile2.jpg') }}" width="20"
                                alt="">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">

                            <form id="logout-form" action="/logout" method="POST" style="display: none">
                                @csrf
                            </form>
                            <a href="javascript:void()" class="dropdown-item ai-icon"
                                onclick="event.preventDefault(); getElementById('logout-form').submit();">
                                <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>
                                <span class="ml-2">Logout </span>
                            </a>
                        </div>
                    </li>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<!--**********************************
            Header end ti-comment-alt
        ***********************************-->

<!--**********************************
            Sidebar start
        ***********************************-->
<div class="dlabnav" style="background-color: rgba(15, 23, 42, 0.95);">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            {{-- <li class="nav-label first neon-text " style="color: #06b6d4 !important;">Main Menu</li> --}}

            <!-- Dashboard -->
            <li>
                <a class="ai-icon" href="/dashboard" aria-expanded="false">
                    <i class="la la-home neon-text"></i>
                    <span class="nav-text neon-text">Dashboard</span>
                </a>
            </li>

            <li>
                <a class="ai-icon" href="{{ route('categories.index') }}" aria-expanded="false"
                    style="color: #06b6d4 !important;">
                    <i class="la la-bars neon-text"></i>
                    <span class="nav-text neon-text">Kategori Artikel</span>
                </a>
            </li>

            <li>
                <a class="ai-icon" href="{{ route('articles.index') }}" aria-expanded="false"
                    style="color: #06b6d4 !important;">
                    <i class="la la-book neon-text"></i>
                    <span class="nav-text neon-text">Artikel</span>
                </a>
            </li>

            <li>
                <a class="ai-icon" href="{{ route('galleries.index') }}" aria-expanded="false"
                    style="color: #06b6d4 !important;">
                    <i class="la la-image neon-text"></i>
                    <span class="nav-text neon-text">Galeri</span>
                </a>
            </li>

            <li>
                <a class="ai-icon" href="{{ route('testimonials.index') }}" aria-expanded="false"
                    style="color: #06b6d4 !important;">
                    <i class="la la-comments neon-text"></i>
                    <span class="nav-text neon-text">Testimoni</span>
                </a>
            </li>

            <li>
                <a class="ai-icon" href="{{ route('youtube.index') }}" aria-expanded="false"
                    style="color: #06b6d4 !important;">
                    <i class="la la-youtube neon-text"></i>
                    <span class="nav-text neon-text">Embed Youtube</span>
                </a>
            </li>
            <li>
                <a class="ai-icon" href="{{ route('faqs.index') }}" aria-expanded="false"
                    style="color: #06b6d4 !important;">
                    <i class="la la-question-circle neon-text"></i>
                    <span class="nav-text neon-text">FAQ</span>
                </a>
            </li>

            <li>
                <a class="ai-icon" href="{{ route('settings.show') }}" aria-expanded="false"
                    style="color: #06b6d4 !important;">
                    <i class="la la-cog neon-text"></i>
                    <span class="nav-text neon-text">Setting</span>
                </a>
            </li>
        </ul>
    </div>
</div>

<!--**********************************
            Sidebar end
        ***********************************-->
