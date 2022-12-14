


<!DOCTYPE html>
<html lang="en">
<head>

<!-- Meta Tag -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Participant</title>

<meta name="description" content="Coming Soon Landing Page"/>
<meta name="keywords" content="Counter, html theme, Coming Soon Landing Page, Coming Soon Landing Page template, html landing page, one page, responsive landing page"/>
<meta name="author" content="kri8thm">

<!-- Favicon -->


<!-- css -->
<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/ionicons.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" />

<script src="https://kit.fontawesome.com/5cd97d9bd2.js" crossorigin="anonymous"></script>

<!-- Google Font -->
{{-- <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet"> --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body>

<!-- Start wrapper -->
<div class="wrapper theme-light">
    <!-- Start preloader -->
    <div id="loader">
        <div class="dis-table">
            <div class="dis-table-cell">
                <div class="loading"></div>
            </div>
        </div>
    </div>
    <!-- End preloader -->

    <!-- Start left side -->
    <div class="left-side col-lg-7 col-md-6 nopadding">
        <!-- Zoomin image -->
        <div class="zoomin-image cover-block"></div>

        <!-- Start left side content -->
        <div class="dis-table">
            <div class="dis-table-cell">
                <div id="logo"><img src="{{asset('assets/img/logo.png')}}" alt="One Counter"></div>
                <span class="heading">{{__('participant.participant-counter')}}</span>

                <!-- Countdown -->
                <div class="page-countdown">
                    <ul id="counter" class="countdown clearfix">
                        <li><span class="days">{{$counter}}</span><i class="days_ref">{{__('participant.participant-number')}}</i></li>

                    </ul>
                </div>

                <!-- Footer -->
                <footer>
                    <ul class="social clearfix">
                        <li><a href="https://www.facebook.com/lifenvst"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a href="https://wa.me/00905448688866?text=Investments"><i class="fa-brands fa-whatsapp"></i></i></a></li>
                        <li><a href="https://lifenvst.com/"><i class="fa-solid fa-earth-africa"></i></a></li>
                        <li><a href="https://www.instagram.com/lifenvst/"><i class="fa-brands fa-instagram"></i></a></li>
                    </ul>
                </footer>
            </div>
        </div>
        <!-- End left side content -->
    </div>
    <!-- End left side -->

    <!-- Start right side -->
    <div class="right-side col-lg-5 col-md-6 nopadding">
       <!-- Grid -->
        {{-- <div id="grid">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div> --}}

        <!-- Menu -->
        {{-- <div id="menu" class="clearfix">
           <div class="hamburger clearfix"><a href="javascript:void(0)"><span></span></a></div>
            <nav>
                <ul class="navigation clearfix">

                </ul>
            </nav>
        </div> --}}

        <!-- Start right side content -->

        <ul id="content">
            <br>
            <div class="col-lg-12 col-md-12 col-sm-12 pl-0">
                {{-- <div class="col-lg-6 col-md-12 col-sm-6 pl-0"> --}}
                    {{-- <img src="{{asset('assets/Image/logosalon.jpg')}}" alt="" width="200"> --}}
                {{-- </div> --}}
                <div class="col-lg-12 col-md-12 col-sm-12 pl-0">
                    <img src="{{asset('assets/Image/'.$houses->logo)}}" alt="" width="200" height="200" >
                </div>
            </div>
            <li class="open-tab">

                <!-- Start scroll bar -->
                <div class="scroll-bar scroll-bar-black">

                    <div class="dis-table">

                        <div class="dis-table-cell">
                            <!-- Content -->

                            <div class="table-content contact">

                                <br>
                                <h4>
                                    {{-- @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"  data-language="{{ $localeCode }}">
                                            @if ( $properties['native'] == '??????????????' && LaravelLocalization::getCurrentLocale() !=='ar')
                                                {{$properties['native']}}
                                            @endif
                                            @if ($properties['native'] == 'English' && LaravelLocalization::getCurrentLocale() !=='en')
                                                {{$properties['native']}}
                                            @endif
                                            </a>

                                    @endforeach --}}

                                </h4>
                                <div class="head animatt-fast">

                                    <h1 class="main-title" >{{__('participant.text15')}}</h1>
                                    <p class="animatt-middium">  {{__('participant.text17')}}...{{__('participant.text16')}}</p>
                                    <p class="animatt-middium"></p>
                                </div>

                                        @if ($time <= $houses->first_hour)
                                            <p class="animatt-middium">{{__('participant.text18')}}{{$houses->wing}}{{__('participant.text19')}}{{$houses->first_periode}}{{__('participant.text20')}}</p>
                                        @else
                                            <p class="animatt-middium">{{__('participant.text18')}}{{$houses->wing}}{{__('participant.text19')}}{{$houses->last_periode}}{{__('participant.text21')}}</p>
                                        @endif



                                {{-- @include('participant.alerts.errors')
                                @include('participant.alerts.success') --}}
                                <form  action="{{route('person.create')}}" method="post"  class="form clearfix animatt-middium">
                                    @csrf
                                    {{-- <div class="col-lg-6 col-md-12 col-sm-6 pl-0">
                                        <input name="first_name" id="name" type="text" placeholder="{{__('participant.first name')}}" class="form-control" value="{{old('first_name')}}" required>
                                        @error('first_name')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div> --}}
                                    <div class="col-lg-12 col-md-12 col-sm-12 pl-0">
                                        <input name="full_name" id="name" type="text" placeholder="{{__('participant.full name')}}" class="form-control" value="{{old('last_name')}}" required>
                                        @error('full_name')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 pl-0">
                                        <input name="phone_number" id="phone" type="text" placeholder="05385014651" class="form-control"  value="{{old('phone')}}" required>
                                        @error('phone_number')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- <div class="col-lg-6 col-md-12 col-sm-6 pl-0">
                                        <input name="email" id="email" type="text" placeholder="email@emai.com" class="form-control"  value="{{old('email')}}" required>
                                        @error('email')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-6 pl-0">
                                        <select name="country" class="form-control" id="country-dropdown">
                                            @foreach ($countries as $country)
                                                <option value="{{$country->id}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('country')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 pl-0">

                                    </div> --}}
                                    {{-- <div class="col-lg-6 col-md-12 col-sm-6 pl-0">
                                        <input name="city" id="name" type="text" placeholder="{{__('participant.city')}}" class="form-control" value="{{old('city')}}" required>
                                        @error('city')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div> --}}
                                    {{-- <div class="col-lg-6 col-md-12 col-sm-6 pl-1">
                                        <div class="form-check">
                                            <input class="form-check-input" id="online" type="radio" value="online" name="participation"  />
                                            <label class="form-check-label" for="register-privacy-policy">Online</label>
                                            @error("participation")
                                            <span class="text-danger">{{$message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-6 pl-1">
                                        <div class="form-check">
                                            <input class="form-check-input" id="presence" type="radio" value="presence" name="participation"  />
                                            <label class="form-check-label" for="register-privacy-policy">Presence</label>
                                            @error("participation")
                                            <span class="text-danger">{{$message }}</span>
                                            @enderror
                                        </div>
                                    </div> --}}

                                    <div class="col-lg-12 col-md-12 col-sm-12 pl-0">
                                        <input type="submit" value="{{__('investor.save')}}" class="send-btn">
                                    </div>
                                    <div class="clearfix"></div>
                                    <div id="success"></div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End scroll bar -->
            </li>
            <li>
                <!-- Start scroll bar -->
                <div class="scroll-bar scroll-bar-black">
                    <div class="dis-table">
                        <div class="dis-table-cell">
                            <!-- Content -->
                            <div class="table-content">
                                <div class="head animatt-fast">
                                    <span class="number">02</span>
                                    <h2 class="title">{{__('participant.about')}}<span>{{__('participant.text3')}}</span></h2>
                                </div>
                                <p class="animatt-middium">{{__('participant.text4')}}</p>
                                <div class="clearfix animatt-slow">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 nopadding"><img src="{{asset('assets/img/1.jpg')}}" alt=""></div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 nopadding marr-top-50"><img src="{{asset('assets/img/2.jpg')}}" alt=""></div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 nopadding"><img src="{{asset('assets/img/3.jpg')}}" alt=""></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End scroll bar -->
            </li>
            <li>
                <!-- Start scroll bar -->
                <div class="scroll-bar scroll-bar-black">
                    <div class="dis-table">
                        <div class="dis-table-cell">
                            <!-- Content -->
                            <div class="table-content">
                                <div class="head animatt-fast">
                                    <span class="number">03</span>
                                    <h2 class="title">{{__('participant.service')}}<span>{{__('participant.text5')}}</span></h2>
                                </div>
                                <p class="animatt-middium">{{__('participant.text6')}}</p>
                                <div class="clearfix animatt-fast">
                                    <div class="col-lg-8 col-md-8 col-sm-8 nopadding service">
                                        <div class="service-head clearfix">
                                            <h4 class="service-title">{{__('participant.text7')}}</h4>
                                        </div>
                                        <p>{{__('participant.text8')}}</p>
                                    </div>
                                </div>
                                <div class="clearfix animatt-middium">
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-lg-offset-4 col-md-offset-4 col-sm-offset-4 nopadding service">
                                        <div class="service-head clearfix">
                                            <h4 class="service-title">{{__('participant.text9')}}</h4>
                                        </div>
                                        <p>{{__('participant.text10')}}</p>
                                    </div>
                                </div>
                                <div class="clearfix animatt-slow">
                                    <div class="col-lg-8 col-md-8 col-sm-8 nopadding service">
                                        <div class="service-head clearfix">
                                            <h4 class="service-title">{{__('participant.text11')}}</h4>
                                        </div>
                                        <p>{{__('participant.text12')}}</p>
                                    </div>
                                </div>
                                <div class="clearfix animatt-fast">
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-lg-offset-4 col-md-offset-4 col-sm-offset-4 nopadding service">
                                        <div class="service-head clearfix">
                                            <h4 class="service-title">{{__('participant.text13')}}</h4>
                                        </div>
                                        <p>{{__('participant.text14')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End scroll bar -->
            </li>
            <li>
                <!-- Start scroll bar -->
                {{-- <div class="scroll-bar scroll-bar-black">
                    <div class="dis-table">
                        <div class="dis-table-cell">
                            <!-- Content -->
                            <div class="table-content contact">
                                <div class="head animatt-fast">
                                    <span class="number">04</span>
                                    <h3 class="title">contact<span>Touch with us</span></h3>
                                </div>
                                <form action="#" id="contact-frm" class="form clearfix animatt-middium">
                                    <div class="col-lg-6 col-md-12 col-sm-6 pl-0">
                                        <input name="name" id="name" type="text" placeholder="Name" class="form-control" required>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-6 pr-0">
                                        <input name="email" id="email" type="email" placeholder="Email" class="form-control" required>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 pl-0 pr-0">
                                        <textarea name="msg" id="msg" cols="6" rows="3" placeholder="Message" class="form-control"></textarea>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 pl-0">
                                        <input type="submit" value="Send" class="send-btn">
                                    </div>
                                    <div class="clearfix"></div>
                                    <div id="success"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- End scroll bar -->
            </li>
        </ul>
        <!-- End right side content -->
    </div>
    <!-- End right side -->
</div>
<!-- End wrapper -->

<!-- Scripts -->
<script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery.nicescroll.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery.downCount.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/custom.js')}}"></script>
<script>
    // $(document).ready(function() {

    //     $('#country-dropdown').on('change', function() {
    //         var country_id = this.value;
    //         $("#city-dropdown").html('');
    //         $.ajax({
    //             url:"{{url('get-cities-by-country')}}",
    //             type: "POST",
    //             data: {
    //             country_id: country_id,
    //             _token: '{{csrf_token()}}'
    //             },
    //             dataType : 'json',
    //             success: function(result){
    //                 $('#city-dropdown').html('<option value="">Select City</option>');
    //                 $.each(result.cities,function(key,value){
    //                 $("#city-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');
    //                 });
    //             }
    //         });
    //     });
    // });
</script>
<script>
    $('#share_value, #share_number').keyup(function(){
        var value = parseFloat($('#share_value').val());
        var number = parseFloat($('#share_number').val());
        $('#total_1').val(value * number );
    });
</script>
@include('sweetalert::alert')

</body>
</html>


