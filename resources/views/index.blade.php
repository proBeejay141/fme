@extends('layouts.app')
{{---------------------------------------------------}}


@section('content')


    <!--header-->
    <div class="banner">
        <div class="container">
            <div class="navigation wow fadeInLeft animated" data-wow-delay=".5s">
                <nav class="navbar navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right link-effect">
                            <li><a href="#" class="scroll">Home </a></li>
                            <li><a href="#about" class="scroll">About</a></li>
                            <li><a href="#services" class="scroll">What We Offer</a></li>
                            <li><a href="#news" class="scroll" >News</a></li>
                            <li><a href="#contact" class="scroll" >Contact</a></li>
                        </ul>

                        <ul class="nav navbar-nav navbar-left link-effect">
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                                <li><a href="{{ url('/login') }}">Login</a></li>
                                <li><a href="{{ url('/register') }}">Register</a></li>
                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ url('/logout') }}"
                                               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div><!-- /.navbar-collapse -->




                </nav>
            </div>
            <div class="banner-info">
                <div class="logo wow fadeInRight animated" data-wow-delay=".5s">
                    <h3><a href="#">MS</a></h3>
                </div>
                <h1 class="wow fadeInRight animated" data-wow-delay=".5s">Money Streaks</h1>
                <p class="wow fadeInRight animated" data-wow-delay=".5s">100% return in 24Hours after your donation has been Confirmed!.</p>
            </div>
        </div>
    </div>
    <div class="content">
        <!--about-->
        <!---728x90--->
        <div class="about-w3" id="about" href="about">
            <div class="container">
                <h2 class="tittle"><span>[</span> About Us <span>]</span></h2>
                <p class="about-text">Money Streaks is a "Peer to Peer" platform where people can help a fellow peer and also get helped in 100% (double) return. As the name implies, this platform was created by a group of wealthy fellows and programmers to help lacking people Conquer their problem once and for all.</p>
                <div class="about-grids">
                    <div class="col-md-6 about-grid">
                        <div class="about-top">
                            <h4><i class="zmdi zmdi-favorite zmdi-hc-fw" aria-hidden="true"></i>Our Vision</h4>
                            <span></span>
                        </div>
                        <p>To help people conquer and dream for better things ahead.</p>
                    </div>
                    <div class="col-md-6 about-grid">
                        <div class="about-top">
                            <h4><i class="glyphicon glyphicon-globe" aria-hidden="true"></i>Our Aim</h4>
                            <span></span>
                        </div>
                        <p>To reach out to millions of people in years to come (with no break) and help them Conquer their financial problems, thereby achieving their dreams.</p>
                    </div>
                    <!-- <div class="col-md-4 about-grid">
                        <div class="about-top">
                            <h4><i class="glyphicon glyphicon-flag" aria-hidden="true"></i></h4>
                            <span></span>
                        </div>
                        <p>Seunteger rutrum  etiam processus dynamicusqui sequitur mutationem consuetudium lectorum.conubia nostra, per inceptos himenaeos. Nullam ac urna eu felis dapibus condimentum sit.</p>
                    </div> -->
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!---728x90--->

        <!--about-->
        <!--services-->
        <div class="services" id="services" href="services">
            <div class="container">
                <h3 class="tittle"><span>[</span> What We Offer <span>]</span></h3>
                <p class="about-text1">While registering you will be ask to choose a package to start with, you will be matched immediately depending on the get help queue and your return(100% increase e.g N10,000 for N20,000, N20,000 for N40,000 e.t.c) will be available for withdrawer immediately your donation has been confirmed. Remember, your account will be deleted if you did not pay the fellow peered with you in <span style="color:red;">12hours</span> </p>
                <div class="service-grids">
                    <div class="col-md-3 ser-grid">
                        <div class="ser-left">
                            <i class="zmdi zmdi-money-box zmdi-hc-fw" aria-hidden="true" style="
    color: burlywood;
"></i>
                        </div>
                        <div class="ser-right">
                            <h4>CLASSIC</h4>
                            <p>Pay <span>5,000</span> and get <span>N10,000</span> in return.</p>
                            <a><i class="zmdi zmdi-account-add zmdi-hc-fw"></i> Sign up</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-3 ser-grid">
                        <div class="ser-left">
                            <i class="zmdi zmdi-money-box zmdi-hc-fw" aria-hidden="true" style="
    color: darkgoldenrod;
"></i>
                        </div>
                        <div class="ser-right">
                            <h4>PREMIUM</h4>
                            <p>Pay <span>N10,000</span> and get <span>N20,000</span> in return.</p>
                            <a><i class="zmdi zmdi-account-add zmdi-hc-fw"></i> Sign up</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-3 ser-grid" id="p3">
                        <div class="ser-left">
                            <i class="zmdi zmdi-money-box zmdi-hc-fw"  aria-hidden="true" style="
    color: gold;
"></i>
                        </div>
                        <div class="ser-right">
                            <h4>ULTIMATE</h4>
                            <p>Pay <span>N20,000</span> and get <span>N40,000</span> in return.</p>
                            <a><i class="zmdi zmdi-account-add zmdi-hc-fw"></i> Sign up</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="col-md-3 ser-grid">
                        <div class="ser-left">
                            <i class="zmdi zmdi-money zmdi-hc-fw" aria-hidden="true" style="
    color: aquamarine;
"></i>
                        </div>
                        <div class="ser-right">
                            <h4>BOOSTER</h4>
                            <p>Pay <span>N50,000</span> and get <span>N100,000</span> in return.</p>
                            <a><i class="zmdi zmdi-account-add zmdi-hc-fw"></i> Sign up</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="clearfix"></div>
                </div>
                <hr>

                <h3 class="tittle" style="margin-top: 0px;font-size: 2.4em;"><span>[</span> Bonus Offers <span>]</span></h3>
                <div class="service-grids">
                    <div class="col-md-4 ser-grid">
                        <div class="ser-left">
                            <i class="zmdi zmdi-accounts-add zmdi-hc-fw" aria-hidden="true"></i>
                        </div>
                        <div class="ser-right">
                            <h4>Referral Bonus</h4>
                            <p>You will be rewarded as you help build this amazing plaform, you will be with <span style="color:red;">5%</span> of your direct down-line donation immediately his/her donation has been confirmed.Hurry now and referral more people for everybody's benefits.</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-4 ser-grid">
                        <div class="ser-left">
                            <i class="zmdi zmdi-layers zmdi-hc-fw" aria-hidden="true"></i>
                        </div>
                        <div class="ser-right">
                            <h4>Level bonus</h4>
                            <p>In our way to make sure we enjoy ourselves while using this platform, you will be rewarded with <span style="color:red;">10%</span> of all your last 10 donations everytime you hit the 10th donation.<span style="color:#85ff85;">(i.e if you donate N10,000 ten times you will get N10,000 bonus)</span>.</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-4 ser-grid">
                        <div class="ser-left">
                            <i class="zmdi zmdi-hourglass-alt zmdi-hc-fw" aria-hidden="true"></i>
                        </div>
                        <div class="ser-right">
                            <h4>Speed Bonus</h4>
                            <p>You will also be rewarded for your corporation, as you can see for yourself, we are here to make life better for everybody. So what are you waiting for? Hurry!!! <a><i class="zmdi zmdi-account-add zmdi-hc-fw"></i> Sign up</a></p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!---728x90--->

        <!--services-->

        <!--Testimonials-->
        <!-- <div class="testimonials-w3ls">
            <div class="container">
                <h3 class="tittle"><span>[</span> Testimonials <span>]</span></h3>
                <p class="about-text">Coming Soon!</p>

            </div>
        </div> -->
        <!--Testimonials-->
        <!--count-->
        <!-- <div class="count-agileits">
            <div class="container">
                <h3 class="tittle1"><span>[</span> Counter <span>]</span></h3>
                <div class="count-grids">
                    <div class="col-md-3 count-grid">
                    <i class="glyphicon glyphicon-filter" aria-hidden="true"></i>
                        <div class="count hvr-bounce-to-bottom">
                            <div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='105206' data-delay='.5' data-increment="100">105206</div>
                                <span></span>
                                <h5>Cups Of Coffee</h5>
                        </div>
                    </div>
                    <div class="col-md-3 count-grid">
                    <i class="glyphicon glyphicon-hand-left" aria-hidden="true"></i>
                        <div class="count hvr-bounce-to-bottom">
                            <div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='372' data-delay='.5' data-increment="100">372</div>
                                <span></span>
                                <h5>Finished Projects</h5>
                        </div>
                    </div>
                    <div class="col-md-3 count-grid">
                    <i class="glyphicon glyphicon-time" aria-hidden="true"></i>
                        <div class="count hvr-bounce-to-bottom">
                            <div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='10520' data-delay='.5' data-increment="100">10520</div>
                                <span></span>
                                <h5>Working Hours</h5>
                            </div>
                    </div>
                    <div class="col-md-3 count-grid">
                    <i class="glyphicon glyphicon-user" aria-hidden="true"></i>
                        <div class="count hvr-bounce-to-bottom">
                            <div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='256' data-delay='.5' data-increment="100">256</div>
                                <span></span>
                                <h5>Happy Clients</h5>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div> -->
        <!--count-->

        <!--team-->
        <div class="journal-w3l" id="news" href="news">
            <div class="container">
                <h3 class="tittle"><span>[</span> News <span>]</span></h3>
                <p class="about-text">Any general announcement with be updated here but our platform has provided a mean to communicate directly with the administrators by putting in place <span style="color:darkblue;">messaging</span> and <span style="color:red;">inbox</span> features.</p>
                <div class="journal-grids">
                    @foreach($news as $new)
                    <div class="col-md-4 journal-grid">
                        <!-- <a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1"><img src="images/j.html" class="img-responsive" alt="" /></a> -->
                        <div class="jou-text">
                            <div class="jou-left">
                                <h5>{{ \Carbon\Carbon::parse($new->created_at)->day}}<span>{{ \Carbon\Carbon::parse($new->created_at)->month}}</span></h5>
                            </div>
                            <div class="jou-right">
                                <h4><a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1">{{$new->title}}</a></h4>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <p class="jour-text">{{$new->message}}</p>

                    </div>
                    @endforeach

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer" id="contact" href="contact">
        <div class="container">
            <div class="footer-top">
                <div class="col-md-3 footer-left">
                    <h4>Phone</h4>
                    <address>
                        <abbr title="Phone">P :</abbr> +1 (479) 310-6874 <br>
                        <abbr title="Phone">P :</abbr> +243 8142693137
                    </address>
                </div>
                <div class="col-md-6 footer-middle" style="color:#fff">
                    <h4>Contact</h4>
                    <abbr title="Email">Email :</abbr> support@moneystreaks.com <br>
                    {{--<form>--}}
                        {{--<div class="ft-lt">--}}
                            {{--<input type="text" value="First Name" placeholder="" onfocus="this.value='';" onblur="if (this.value == '') {this.value = 'First Name';}">--}}
                            {{--<input type="text" value="Last Name" placeholder="" onfocus="this.value='';" onblur="if (this.value == '') {this.value = 'Last Name';}">--}}
                            {{--<input type="text" value="Email Address" placeholder="" onfocus="this.value='';" onblur="if (this.value == '') {this.value = 'Email Address';}">--}}
                        {{--</div>--}}
                        {{--<div class="ft-rgt">--}}
                            {{--<textarea placeholder="" onfocus="this.value='';" onblur="if (this.value == '') {this.value = 'Message';}">Message</textarea>--}}
                            {{--<input type="submit" value="Submit">--}}
                        {{--</div>--}}
                    {{--</form>--}}
                </div>
                <div class="col-md-3 footer-left">
                    <h4>Follow Us</h4>
                    <div class="social-icons">
                        <a href="#"><i class="icon"></i></a>
                        <a href="#"><i class="icon1"></i></a>
                        <a href="#"><i class="icon2"></i></a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="footer-text">
                <p>© 2017 Money Streaks. All Rights Reserved | Template by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            /*
             var defaults = {
             containerID: 'home', // fading element id
             containerHoverID: 'toTopHover', // fading element hover id
             scrollSpeed: 1200,
             easingType: 'linear'
             };
             */

            $().UItoTop({ easingType: 'easeOutQuart' });

        });
    </script>
    <a href="#" id="home" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

@endsection



