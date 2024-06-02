<!--
=========================================================
* Soft UI Dashboard - v1.0.3
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>

@if (\Request::is('rtl'))
    <html dir="rtl" lang="ar">
@else
    <html lang="en">
@endif

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('back_office_theme/assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('back_office_theme/assets/img/favicon.png') }}">
    <title>
        Soft UI Dashboard by Creative Tim
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('back_office_theme/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('back_office_theme/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('back_office_theme/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('back_office_theme/css/soft-ui-dashboard.css?v=1.0.3') }}" rel="stylesheet" />

    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="76x76"
        href="https://demos.creative-tim.com/argon-design-system-pro/assets/img/apple-icon.png">
    <link rel="icon" href="https://demos.creative-tim.com/argon-design-system-pro/assets/img/apple-icon.png"
        type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Creative Tim">

    <link rel="canonical" href="https://www.creative-tim.com/learning-lab/bootstrap/wizard/soft-ui-dashboard">
    <meta name="keywords"
        content="creative tim, updivision, html dashboard, laravel, html css dashboard laravel, soft ui dashboard laravel, laravel soft ui dashboard, soft ui admin, laravel dashboard, laravel admin, web dashboard, bootstrap 5 dashboard laravel, bootstrap 5, css3 dashboard, bootstrap 5 admin laravel, soft ui dashboard bootstrap 5 laravel, frontend, responsive bootstrap 5 dashboard, soft ui dashboard, soft ui laravel bootstrap 5 dashboard" />
    <meta name="description"
        content="A free Laravel Dashboard featuring dozens of UI components & basic Laravel CRUDs." />
    <meta itemprop="name" content="Soft UI Dashboard Laravel by Creative Tim & UPDIVISION" />
    <meta itemprop="description"
        content="A free Laravel Dashboard featuring dozens of UI components & basic Laravel CRUDs." />
    <meta itemprop="image"
        content="https://s3.amazonaws.com/creativetim_bucket/products/602/original/soft-ui-dashboard-laravel.jpg" />
    <meta name="twitter:card" content="product" />
    <meta name="twitter:site" content="@creativetim" />
    <meta name="twitter:title" content="Soft UI Dashboard Laravel by Creative Tim & UPDIVISION" />
    <meta name="twitter:description"
        content="A free Laravel Dashboard featuring dozens of UI components & basic Laravel CRUDs." />
    <meta name="twitter:creator" content="@creativetim" />
    <meta name="twitter:image"
        content="https://s3.amazonaws.com/creativetim_bucket/products/602/original/soft-ui-dashboard-laravel.jpg" />
    <meta property="fb:app_id" content="655968634437471" />
    <meta property="og:title" content="Soft UI Dashboard Laravel by Creative Tim & UPDIVISION" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="https://www.creative-tim.com/live/soft-ui-dashboard-laravel" />
    <meta property="og:image"
        content="https://s3.amazonaws.com/creativetim_bucket/products/602/original/soft-ui-dashboard-laravel.jpg" />
    <meta property="og:description"
        content="A free Laravel Dashboard featuring dozens of UI components & basic Laravel CRUDs." />
    <meta property="og:site_name" content="Creative Tim" />

    <link rel="stylesheet" href="https://demos.creative-tim.com/argon-design-system-pro/assets/css/nucleo-icons.css"
        type="text/css">
    <link href="" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://demos.creative-tim.com/test/soft-ui-dashboard-pro/assets/css/soft-ui-dashboard.min.css?v=1.0.0"
        type="text/css">
    <link rel="stylesheet" href="{{ asset('back_office_theme/assets/demo.css') }}" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://demos.creative-tim.com/argon-design-system-pro/assets/css/nucleo-icons.css" rel="stylesheet">
    <script async="" src="https://s.pinimg.com/ct/lib/main.6ae4a9fc.js"></script>
    <script type="text/javascript" async="" src="https://s.pinimg.com/ct/core.js"></script>
    <script type="text/javascript" async="" src="https://static.hotjar.com/c/hotjar-99526.js?sv=7"></script>
    <script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script>
    <script type="text/javascript" async=""
        src="https://www.google-analytics.com/gtm/js?id=GTM-K9BGS8K&amp;cid=1113738810.1638876382&amp;aip=true"></script>
    <script src="https://connect.facebook.net/signals/config/111649226022273?v=2.9.48&amp;r=stable" async=""></script>
    <script async="" src="//connect.facebook.net/en_US/fbevents.js"></script>
    <script async="" src="https://www.googletagmanager.com/gtm.js?id=GTM-NKDMSK6"></script>
    <script async="" src="https://www.google-analytics.com/analytics.js"></script>
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <!-- Anti-flicker snippet (recommended)  -->
    <style>
        .async-hide {
            opacity: 0 !important
        }
    </style>
    <script>
        (function(a, s, y, n, c, h, i, d, e) {
            s.className += ' ' + y;
            h.start = 1 * new Date;
            h.end = i = function() {
                s.className = s.className.replace(RegExp(' ?' + y), '')
            };
            (a[n] = a[n] || []).hide = h;
            setTimeout(function() {
                i();
                h.end = null
            }, c);
            h.timeout = c;
        })(window, document.documentElement, 'async-hide', 'dataLayer', 4000, {
            'GTM-K9BGS8K': true
        });
    </script>
    <!-- Analytics-Optimize Snippet -->
    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-46172202-22', 'auto', {
            allowLinker: true
        });
        ga('set', 'anonymizeIp', true);
        ga('require', 'GTM-K9BGS8K');
        ga('require', 'displayfeatures');
        ga('require', 'linker');
        ga('linker:autoLink', ["2checkout.com", "avangate.com"]);
    </script>
    <!-- end Analytics-Optimize Snippet -->
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-NKDMSK6');
    </script>
    <!-- End Google Tag Manager -->
    <!-- This is for docs typography and layout -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="../../assets/docs-soft.css" rel="stylesheet">
    <script async="" src="https://script.hotjar.com/modules.54959b9c945092ba123f.js" charset="utf-8"></script>
    <style type="text/css">
        iframe#_hjRemoteVarsFrame {
            display: none !important;
            width: 1px !important;
            height: 1px !important;
            opacity: 0 !important;
            pointer-events: none !important;
        }
    </style>
    <meta http-equiv="origin-trial"
        content="A13s4hjGQNypqXJtC3txOObvdElWKqJttxI7WhcRiEX0+Y28BmRR2ZTW8rSV659YQd1xb9tpLof5Eehz3SMUXgwAAACHeyJvcmlnaW4iOiJodHRwczovL3d3dy5waW50ZXJlc3QuY29tOjQ0MyIsImZlYXR1cmUiOiJDb252ZXJzaW9uTWVhc3VyZW1lbnQiLCJleHBpcnkiOjE2MzQwODMxOTksImlzU3ViZG9tYWluIjp0cnVlLCJpc1RoaXJkUGFydHkiOnRydWV9">
</head>

<body
    class="g-sidenav-show  bg-gray-100 {{ \Request::is('rtl') ? 'rtl' : (Request::is('virtual-reality') ? 'virtual-reality' : '') }} ">

    <section class="min-vh-100 mb-8">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
            style="background-image: url('{{ asset('back_office_theme/assets/img/curved-images/curved14.jpg') }}">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <h1 class="text-white mb-2 mt-5">Welcome!</h1>
                        <p class="text-lead text-white">Use these awesome forms to login or create new account in your
                            project for free.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10">
                <div class="col-xl-8 col-lg-8 col-md-8 mx-auto">
                    <div class="card z-index-0">
                        <div class="card-header text-center pt-4">
                            <div class="col-md-12">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                            data-bs-target="#home" type="button" role="tab"
                                            aria-controls="home" aria-selected="true">Teacher</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                            data-bs-target="#profile" type="button" role="tab"
                                            aria-controls="profile" aria-selected="false">Parent</button>
                                    </li>

                                </ul>

                            </div>
                            <h5>Register with</h5>
                        </div>
                        {{-- teacher register --}}
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                aria-labelledby="home-tab">
                                <div class="card-body">
                                    <form action="{{ route('register.teacher') }}" method="POST"
                                        role="form text-left">
                                        @csrf
                                        <input type="hidden" name="role" value="teacher">

                                        <div class="mb-3">
                                            <input type="text" class="form-control" name="name"
                                                placeholder="Name" aria-label="Name" aria-describedby="name-addon"
                                                required>
                                            @error('name')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <input type="text" class="form-control" name="cin"
                                                placeholder="CIN" aria-label="CIN" aria-describedby="cin-addon"
                                                required>
                                            @error('cin')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <input type="text" class="form-control" name="last_name"
                                                placeholder="Last Name" aria-label="Last Name"
                                                aria-describedby="last_name-addon" required>
                                            @error('last_name')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <input type="date" class="form-control" name="birthdate"
                                                placeholder="Birthdate" aria-label="Birthdate"
                                                aria-describedby="birthdate-addon" required>
                                            @error('birthdate')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <input type="email" class="form-control" name="email"
                                                placeholder="Email" aria-label="Email" aria-describedby="email-addon"
                                                required>
                                            @error('email')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <input type="password" class="form-control" name="password"
                                                placeholder="Password" aria-label="Password"
                                                aria-describedby="password-addon" required>
                                            @error('password')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <input type="password" class="form-control" name="password_confirmation"
                                                placeholder="Confirm Password" aria-label="Password Confirmation"
                                                aria-describedby="password_confirmation-addon" required>
                                            @error('password_confirmation')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign
                                                up</button>
                                        </div>
                                        <p class="text-sm mt-3 mb-0">Already have an account? <a
                                                href="{{ route('login') }}" class="text-dark font-weight-bolder">Sign
                                                in</a></p>
                                    </form>
                                </div>
                            </div>
                            {{-- parent register --}}
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <h3 class="mt-5">Build Your Profile</h3>
                                        <h5 class="text-secondary font-weight-normal">This information will let us know
                                            more
                                            about you.</h5>
                                        <div class="multisteps-form mb-5">
                                            <!--progress bar-->
                                            <div class="row">
                                                <div class="col-12 col-lg-8 mx-auto my-5">
                                                    <div class="multisteps-form__progress">
                                                        <button class="multisteps-form__progress-btn js-active"
                                                            type="button" title="User Info">
                                                            <span>Parents information</span>
                                                        </button>
                                                        <button class="multisteps-form__progress-btn" type="button"
                                                            title="Address">
                                                            <span>Student information</span>
                                                        </button>
                                                        <button class="multisteps-form__progress-btn" type="button"
                                                            title="Order Info">
                                                            <span>Credentials</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--form panels-->
                                            <div class="row">
                                                <div class="col-12 col-lg-8 m-auto">
                                                    <form action="{{ route('register.parent') }}" method="POST"
                                                        class="multisteps-form__form" style="height: 463px;">
                                                        @csrf
                                                        <!--single form panel-->
                                                        <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active"
                                                            data-animation="FadeIn">
                                                            <div class="row text-center">
                                                                <div class="col-12 mx-auto">
                                                                    <h5 class="font-weight-normal">parent information
                                                                    </h5>
                                                                    <p>parent text
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="multisteps-form__content">
                                                                <div class="row mt-3">
                                                                    {{-- parentinfo content --}}
                                                                    <div class="col-md-6">
                                                                        <!-- Father's Information -->
                                                                        <div class="form-group">
                                                                            <label for="">Father Name</label>
                                                                            <input type="text" class="form-control"
                                                                                placeholder=""
                                                                                wire:model="father_name">
                                                                            <span class="text-danger">
                                                                                @error('father_name')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </span>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="">Father Last
                                                                                name</label>
                                                                            <input type="text" class="form-control"
                                                                                placeholder=""
                                                                                wire:model="father_last_name">
                                                                            <span class="text-danger">
                                                                                @error('father_last_name')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </span>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="">Father Job</label>
                                                                            <input type="text" class="form-control"
                                                                                placeholder=""
                                                                                wire:model="father_job">
                                                                            <span class="text-danger">
                                                                                @error('father_job')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </span>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="">Father Phone
                                                                                Number</label>
                                                                            <input type="number" class="form-control"
                                                                                placeholder=""
                                                                                wire:model="father_phone">
                                                                            <span class="text-danger">
                                                                                @error('father_phone')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <!-- Mother's Information -->
                                                                        <div class="form-group">
                                                                            <label for="">Mother Name</label>
                                                                            <input type="text" class="form-control"
                                                                                placeholder=""
                                                                                wire:model="mother_name">
                                                                            <span class="text-danger">
                                                                                @error('mother_name')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </span>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="">Mother Last
                                                                                name</label>
                                                                            <input type="text" class="form-control"
                                                                                placeholder=""
                                                                                wire:model="mother_last_name">
                                                                            <span class="text-danger">
                                                                                @error('mother_last_name')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </span>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="">Mother Job</label>
                                                                            <input type="text" class="form-control"
                                                                                placeholder=""
                                                                                wire:model="mother_job">
                                                                            <span class="text-danger">
                                                                                @error('mother_job')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </span>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="">Mother Phone
                                                                                Number</label>
                                                                            <input type="number" class="form-control"
                                                                                placeholder=""
                                                                                wire:model="mother_phone">
                                                                            <span class="text-danger">
                                                                                @error('mother_phone')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="dropdown">
                                                                            <button
                                                                                class="btn btn-secondary dropdown-toggle"
                                                                                type="button"
                                                                                id="dropdownMenuButton1"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                                Number of children
                                                                            </button>
                                                                            <ul class="dropdown-menu"
                                                                                aria-labelledby="dropdownMenuButton1">
                                                                                <li><a class="dropdown-item"
                                                                                        href="#">1</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="#">2
                                                                                    </a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="#">3</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="button-row d-flex mt-4">
                                                                    <button
                                                                        class="btn bg-gradient-dark ms-auto mb-0 js-btn-next"
                                                                        type="button" title="Next">Next</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--single form panel-->
                                                        <div class="card multisteps-form__panel p-3 border-radius-xl bg-white"
                                                            data-animation="FadeIn">
                                                            <div class="row text-center">
                                                                <div class="col-12 mx-auto">
                                                                    <h5 class="font-weight-normal">student info</h5>
                                                                    <p>student info text</p>
                                                                </div>
                                                            </div>
                                                            <div class="multisteps-form__content">
                                                                <div class="row mt-4">
                                                                    {{-- student info content --}}

                                                                    <div class="col-md-6">
                                                                        <!-- Student's Information -->
                                                                        <div class="form-group">
                                                                            <label for="">Student Name</label>
                                                                            <input type="text" class="form-control"
                                                                                placeholder=""
                                                                                wire:model="student_name">
                                                                            <span class="text-danger">
                                                                                @error('student_name')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </span>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="">Student Last
                                                                                name</label>
                                                                            <input type="text" class="form-control"
                                                                                placeholder=""
                                                                                wire:model="student_last_name">
                                                                            <span class="text-danger">
                                                                                @error('student_last_name')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </span>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="">Student Phone
                                                                                Number</label>
                                                                            <input type="number" class="form-control"
                                                                                placeholder=""
                                                                                wire:model="student_phone">
                                                                            <span class="text-danger">
                                                                                @error('student_phone')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Student Grade</label>
                                                                            <select class="form-control"
                                                                                wire:model="student_grade">
                                                                                <option value="" selected>Select
                                                                                    grade</option>
                                                                                <option value="seven">7th grade
                                                                                </option>
                                                                                <option value="eight">8th grade
                                                                                </option>
                                                                                <option value="nine">9th grade
                                                                                </option>
                                                                            </select>
                                                                            <span class="text-danger">
                                                                                @error('student grade')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </span>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="">Student
                                                                                Birthdate</label>
                                                                            <input type="date" class="form-control"
                                                                                placeholder="" wire:model="birthdate">
                                                                            <span class="text-danger">
                                                                                @error('birthdate')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </span>
                                                                        </div>



                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="avatar"> Avatar</label>
                                                                            <input type="file"
                                                                                class="form-control-file"
                                                                                id="avatar" wire:model="avatar">
                                                                            <span class="text-danger">
                                                                                @error('avatar')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="button-row d-flex mt-4">
                                                                    <button
                                                                        class="btn bg-gradient-light mb-0 js-btn-prev"
                                                                        type="button" title="Prev">Prev</button>
                                                                    <button
                                                                        class="btn bg-gradient-dark ms-auto mb-0 js-btn-next"
                                                                        type="button" title="Next">Next</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--single form panel-->
                                                        <div class="card multisteps-form__panel p-3 border-radius-xl bg-white"
                                                            data-animation="FadeIn">
                                                            <div class="row text-center">
                                                                <div class="col-12 mx-auto">
                                                                    <h5 class="font-weight-normal">credentials</h5>
                                                                    <p>credentials text</p>
                                                                </div>
                                                            </div>
                                                            <div class="multisteps-form__content">
                                                                <div class="row text-start">
                                                                    {{-- credentials --}}
                                                                    <div class="col-md-12">
                                                                        <!-- auth -->
                                                                        <div class="form-group">
                                                                            <label for="">Parent Email</label>
                                                                            <input type="email" class="form-control"
                                                                                placeholder=""
                                                                                wire:model="parent_email">
                                                                            <span class="text-danger">
                                                                                @error('parent_email')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </span>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="">Password</label>
                                                                            <input type="password"
                                                                                class="form-control" placeholder=""
                                                                                wire:model="password">
                                                                            <span class="text-danger">
                                                                                @error('password')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </span>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="passwordConfirmation">Confirm
                                                                                Password</label>
                                                                            <input type="password"
                                                                                class="form-control" placeholder=""
                                                                                wire:model="passwordConfirmation">
                                                                            <span class="text-danger">
                                                                                @error('passwordConfirmation')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </span>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="button-row d-flex mt-4 col-12">
                                                                        <button
                                                                            class="btn bg-gradient-light mb-0 js-btn-prev"
                                                                            type="button"
                                                                            title="Prev">Prev</button>
                                                                        <button
                                                                            class="btn bg-gradient-dark ms-auto mb-0"
                                                                            type="button"
                                                                            title="Send">Send</button>
                                                                    </div>
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

                    </div>


                </div>
            </div>
        </div>
        </div>
    </section>
    {{-- @if (session()->has('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
            class="position-fixed bg-success rounded right-3 text-sm py-2 px-4">
            <p class="m-0">{{ session('success') }}</p>
        </div>
    @endif --}}
    <!--   Core JS Files   -->
    <script src="{{ asset('back_office_theme/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('back_office_theme/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('back_office_theme/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('back_office_theme/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('back_office_theme/assets/js/plugins/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('back_office_theme/assets/js/plugins/chartjs.min.js') }}"></script>
    <script src="{{ asset('back_office_theme/assets/js/plugins/multistep-form.js') }}"></script>
    @stack('rtl')
    {{-- @stack('dashboard') --}}
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('back_office_theme/assets/js/soft-ui-dashboard.min.js?v=1.0.3') }}"></script>

</body>

</html>