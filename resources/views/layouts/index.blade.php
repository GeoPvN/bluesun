<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <meta name='author' content='Davit Papalashvili'>
    <meta name='description' content='Trusted by Gamers. Proven Boosters. Track Progress, Spectate, Chat, Schedule & Pause Boost. Select Lines, Champions, Summoners & Stream Games. Choose between Regular and Test Text Duo. Select Between Solo/Duo. Encrypted VPN Connection. 24/7 Qualified Support.'>
    <meta name='keywords' content='lol boost, lol boosting, boost, cheap boost, league boosting'>

    <!-- CSRF Token -->
    <meta name='csrf-token' content='{{ csrf_token() }}'>

    <title>Elounion</title>
    <link rel='stylesheet' href='{{ asset('css/cyb/style.css') }}'>
    <link rel='stylesheet' href='{{ asset('css/cyb/all.min.css') }}'>
    <link rel='stylesheet' href='{{ asset('css/cyb/animate.css') }}' type='text/css'>
</head>
<body>
<div class='preloader-wrapper'>
    <div class='preloader'>
        <div class='name'>Elounion</div>
        <div class='spinner'>
            <div class='bounce1'></div>
            <div class='bounce2'></div>
            <div class='bounce3'></div>
        </div>
    </div>
</div>
<header>
    <div class='middle'>
        <a href='#' class='logo wow fadeInLeft' data-wow-delay='0.4s'>
            <h1>Elounion</h1>
        </a>

        <div class='right'>
            <nav>
                <ul>
                    <li class='wow fadeInDown' data-wow-delay='0.8s'><a href='#aboutus'>About Us</a></li>
                    <li class='wow fadeInDown' data-wow-delay='1s'><a href='#service'>service</a></li>
                    <li class='wow fadeInDown' data-wow-delay='1.2s'><a href='#gallery'>Gallery</a></li>
                    <li class='wow fadeInDown' data-wow-delay='1.4s'><a href='#faq'>FAQ</a></li>
                    <li class='wow fadeInDown' data-wow-delay='1.6s'><a href='#contact'>Contact</a></li>
                </ul>
            </nav>

            <div id='for-user'>
                <div class='auth' @if (Auth::check()) style='display:none;' @endif>
                    <div class='btn wow fadeInRight' id='login' data-wow-delay='1.8s'>Login</div>
                    <div class='btn wow fadeInRight' id='registration' data-wow-delay='2s'>Registration</div>
                </div>

                <div class='authorized' @if (!Auth::check()) style='display:none;' @endif>
                    <ul>
                        <li class='wow fadeInRight' data-wow-delay='1.8s'>Welcome, <span class='user'>@if (Auth::check()) {{Auth::user()->name}} @endif</span></li>
                        <li class='wow fadeInRight' data-wow-delay='2s'><div class='btn' id='profile' >My Profile</div></li>
                        <li class='signout wow fadeInRight' data-wow-delay='2.2s'><i class='fas fa-sign-out-alt'></i></li>
                    </ul>
                </div>

                <div class='preloader'>
                    <div class='spinner'>
                        <div class='bounce1'></div>
                        <div class='bounce2'></div>
                        <div class='bounce3'></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class='popup-overlay my-account'>
        <div class='popup'>
            <img src='{{ asset('css/assets/images/close.svg') }}' class='close'>

            <div class='bar'>
                <ul>
                    <li class='active'>My Profile</li>
                    <li>My Orders</li>
                </ul>
            </div>

            <div class='body'>
                <div class='controler'>
                    <div class='my-profile'>
                        <div class='half'>
                            <h1><span class='profile_name'>@if (Auth::check()) {{Auth::user()->name}} @endif</span>'s Profile</h1>
                            <ul class='infos'>
                                <li>
                                    <div class='desc'>Summoner Name</div>
                                    <div class='info profile_name'>@if (Auth::check()) {{Auth::user()->name}} @endif</div>
                                </li>
                                <li>
                                    <div class='desc'>Email</div>
                                    <div class='info profile_email'>@if (Auth::check()) {{Auth::user()->email}} @endif</div>
                                </li>
                                <li>
                                    <div class='desc'>Account Status</div>
                                    <div class='info profile_active'>@if (Auth::check()) @if(Auth::user()->active == 1) Active @else Deactive @endif @endif</div>
                                </li>
                            </ul>
                        </div>
                        <div class='half'>
                            <form method='POST' action='{{ route('changePassword') }}' class="changePassword">
                                <h1>Change Password</h1>
                                <ul>
                                    <li>
                                        <input type='password' name='oldPassword' autocomplete='off' required>
                                        <label>Old Password</label>
                                        <span class='border'></span>
                                    </li>
                                    <li>
                                        <input type='password' name='password' autocomplete='off' required>
                                        <label>New Password</label>
                                        <span class='border'></span>
                                    </li>
                                    <li>
                                        <input type='password' name='password_confirmation' autocomplete='off' required>
                                        <label>Confirm password</label>
                                        <span class='border'></span>
                                    </li>
                                    <li class="submit">
                                        <input class='btn' type='submit' value='Change Password'>
                                    </li>
                                    <li class='err-txt'></li>
                                </ul>
                            </form>

                            <div class='success-dialog'>
                                <div class='title'>Password Changed Successfully</div>
                            </div>

                        </div>
                    </div>

                    <div class='my-orders'>
                        <h1>My Orders</h1>
                        <table>
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Packet</th>
                                <th>Price</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>test text</td>
                                <td>test text</td>
                                <td>test text</td>
                                <td>test text</td>
                            </tr>
                            <tr>
                                <td>test text</td>
                                <td>test text</td>
                                <td>test text</td>
                                <td>test text</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class='popup-overlay signin'>
        <div class='popup'>
            <img src='{{ asset('css/assets/images/close.svg') }}' class='close'>
            <form class="login-dialog" method='POST' action='{{ route('login') }}'>
                <div class='title'>Login Form</div>
                <ul>
                    <li>
                        <input type='email' name='email' id='login_email' autocomplete='off' required>
                        <label>E-mail</label>
                        <span class='border'></span>
                    </li>
                    <li>
                        <input type='password' name='password' id='login_password' autocomplete='off' required>
                        <label>password</label>
                        <div class="forgot">Forgot?</div>
                        <span class='border'></span>
                    </li>
                    <li class="submit">
                        <input class='btn' type='submit' value='Login'>
                    </li>
                    <li class='err-txt'></li>
                </ul>
            </form>

            <form method="POST" class="forgot-dialog" action='{{ route('resetMail') }}'>
                <div class='title'>Forgot Password?</div>
                <ul>
                    <li>
                        <input type='email' name='email' id='forgot_email' autocomplete='off' required>
                        <label>E-mail</label>
                        <span class='border'></span>
                    </li>
                    <li class="submit">
                        <input class='btn' type='submit' value='Send'>
                    </li>
                    <li class='err-txt'></li>
                </ul>

                <div class='success-dialog'>
                    <div class='title'>Check Email</div>
                    <p>In order to help maintain the security of your Elounion account, please check your email address!</p>
                </div>
            </form>
        </div>
    </div>

    <div class='popup-overlay signup'>
        <div class='popup'>
            <img src='{{ asset('css/assets/images/close.svg') }}' class='close'>
            <form method='POST' action='{{ route('register') }}'>
                <div class='title'>Registration Form</div>
                <ul>
                    <li>
                        <input type='text' name='name' id='reg_name' autocomplete='off' required>
                        <label>Summoner Name</label>
                        <span class='border'></span>
                    </li>
                    <li>
                        <input type='email' name='email' id='reg_email' autocomplete='off' required>
                        <label>E-mail</label>
                        <span class='border'></span>
                    </li>
                    <li>
                        <input type='password' name='password' id='reg_pass' autocomplete='off' required>
                        <label>password</label>
                        <i class='far fa-question-circle' information='The password must be at least 6 characters.'></i>
                        <span class='border'></span>
                    </li>
                    <li>
                        <input type='password' name='password_confirmation' id='reg_pass_con' autocomplete='off' required>
                        <label>Confirm password</label>
                        <span class='border'></span>
                    </li>
                    <li>
                        <label class='check'>
                            <input type='checkbox' name='TermsAccepted' required>

                            <span class='checkmark'></span>
                            <span>I Agree <span>Terms and Conditions</span></span>
                        </label>
                    </li>
                    <li class="submit">
                        <input class='btn' type='submit' value='Registration'>
                    </li>
                    <li class='err-txt'></li>
                </ul>
            </form>

            <div class="terms-and-conditions">
                <img src='{{ asset('css/assets/images/close.svg') }}' class='close-terms'>
                <div class='title'>Terms and Conditions</div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, asperiores accusantium temporibus animi doloremque dignissimos esse voluptatum? Labore, placeat ea. Nulla, enim ducimus animi eum optio sint possimus excepturi distinctio?</p>
            </div>

            <div class='success-dialog'>
                <div class='title'>verify your email address</div>
                <p>In order to help maintain the security of your Elounion account, please verify your email address!</p>
            </div>
        </div>
    </div>
</header>

<main>
    <section class='background-image' id='aboutus'>
        <div class='middle'>
            <div class='social wow fadeInLeft' data-wow-delay='2s'>
                <ul>
                    <li><a href='#' class='fab fa-facebook-f'></a></li>
                    <li><a href='#' class='fab fa-instagram'></a></li>
                    <li><a href='#' class='fab fa-youtube'></a></li>
                </ul>
            </div>
            <div class='container'>
                <div class='text'>
                    <h1 class='logo wow zoomIn' data-wow-delay='2s'>Elounion</h1>
                    <h1 class='wow fadeInUp' data-wow-delay='2.2s'>@if($about->name) {{ $about->name }} @endif</h1>
                    <p class='wow zoomInUp' data-wow-delay='2.4s'>@if($about->text) {{ $about->text }} @endif</p>
                </div>
                <div class='scroll-down'>
                    <a href='#service' class='btn scroll-to-service wow fadeInDown' data-wow-delay='2.8s'>Let's Go</a>
                    <a href='#service' class='material-icons scroll'>keyboard_arrow_down</a>
                </div>
            </div>
        </div>
    </section>

    <section id='service'>
        <div class='middle'>
            <div class='boosts'>
                <ul>
                    <li class='active wow fadeInRight' for='coaching' data-wow-delay='0s'>
                        <div class='icon'>
                            <img src='{{ asset('css/assets/images/coaching.svg') }}'>
                        </div>
                        <p>Coaching</p>
                    </li>
                    <li class='wow fadeInRight' for='league-boosting' data-wow-delay='0.2s'>
                        <div class='icon'>
                            <img src='{{ asset('css/assets/images/solo.svg') }}'>
                        </div>
                        <p>Solo<br />service</p>
                    </li>
                    <li class='wow fadeInRight' for='duo-boosting'  data-wow-delay='0.4s'>
                        <div class='icon'>
                            <img src='{{ asset('css/assets/images/duo.svg') }}'>
                        </div>
                        <p>Duo<br />service</p>
                    </li>
                    <li class='wow fadeInRight' for='win-boosting' data-wow-delay='0.6s'>
                        <div class='icon'>
                            <img src='{{ asset('css/assets/images/coaching.svg') }}'>
                        </div>
                        <p>Net<br />Wins</p>
                    </li>
                </ul>
            </div>

            <div class='league-service'>
                <div id="coaching">
                    <h1>Coaching</h1>
                    <span>If you're looking to improve your gameplay and yourself, we highly recommend you this service!</span>

                    <div class='choose'>
                        <ul>
                            <li class='type-of-service'>
                                <div class='name'><span>1</span>TYPE OF SERVICE</div>
                                
                                <div class="services-wrapper">
                                    <div class="service">
                                        <img class='icon' src="https://eloboost24.eu/images/pages/boosting/duo_opt_regular.png">
                                        <span>REGULAR</span>
                                    </div>
                                    <div class="service">
                                        <img class='icon' src="https://eloboost24.eu/images/pages/boosting/duo_opt_regular.png">
                                        <span>PREMIUM</span>
                                    </div>
                                </div>
                            </li>

                            <li class='type-of-service specific'>
                                <div class='name'><span>2</span>SPECIFIC LINES</div>
                                
                                <div class="services-wrapper">
                                    <div class="service">
                                        <img class='icon' src="https://eloboost24.eu/images/pages/boosting/duo_opt_regular.png">
                                        <span>TOP</span>
                                    </div>
                                    <div class="service">
                                        <img class='icon' src="https://eloboost24.eu/images/pages/boosting/duo_opt_regular.png">
                                        <span>MID</span>
                                    </div>
                                    <div class="service">
                                        <img class='icon' src="https://eloboost24.eu/images/pages/boosting/duo_opt_regular.png">
                                        <span>JUNGLE</span>
                                    </div>
                                    <div class="service">
                                        <img class='icon' src="https://eloboost24.eu/images/pages/boosting/duo_opt_regular.png">
                                        <span>ADC</span>
                                    </div>
                                    <div class="service">
                                        <img class='icon' src="https://eloboost24.eu/images/pages/boosting/duo_opt_regular.png">
                                        <span>SUPPORT</span>
                                    </div>
                                </div>
                            </li>

                            <li class='type-of-service'>
                                <div class='name'><span>3</span>RANK OF COACH</div>
                                
                                <div class="services-wrapper">
                                    <div class="service">
                                        <img class='icon' src="https://eloboost24.eu/images/pages/boosting/duo_opt_regular.png">
                                        <span>DIAMOND</span>
                                    </div>
                                    <div class="service">
                                        <img class='icon' src="https://eloboost24.eu/images/pages/boosting/duo_opt_regular.png">
                                        <span>MASTER</span>
                                    </div>
                                    <div class="service">
                                        <img class='icon' src="https://eloboost24.eu/images/pages/boosting/duo_opt_regular.png">
                                        <span>CHALLENGER</span>
                                    </div>
                                </div>
                            </li>

                            <li class='type-of-service'>
                                <div class='name'><span>4</span>YOUR SERVER</div>
                                
                                <div class='list-wrapper'>
                                    <div class='list'>
                                        <div class='select'>
                                            <div class='control'>Choose</div>
                                            <i class='material-icons'>keyboard_arrow_down</i>
                                        </div>

                                        <div class='options'>
                                            <option>test</option>
                                        </div>
                                    </div>
                                </div>
                                <div class='name'><span>5</span>AMOUNT OF HOURS</div>
                                <div class="inc-dec">
                                    <div class="inc">+</div>
                                    <div class="val">1</div>
                                    <div class="dec">-</div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>

                <div id="league-boosting">
                    <h1>Solo Boosting</h1>
                    <span>The booster will log on your account and will play in your account until reaching your desired division.</span>

                    <div class='choose'>
                        <ul>
                            <li>
                                <div class='name'><span>1</span>YOUR CURRENT LEAGUE</div>

                                <div class='list-wrapper'>
                                    <div class='list'>
                                        <div class='select'>
                                            <div class='control'>Choose</div>
                                            <i class='material-icons'>keyboard_arrow_down</i>
                                        </div>

                                        <div class='options'>

                                        </div>
                                    </div>

                                    <div class='list'>
                                        <div class='select'>
                                            <div class='control'>Choose</div>
                                            <i class='material-icons'>keyboard_arrow_down</i>
                                        </div>

                                        <div class='options'>

                                        </div>
                                    </div>

                                    <div class="badges">
                                        <img src="https://eloboost24.eu/images/divisions/27.png" alt="">
                                    </div>
                                </div>
                                
                            </li>
                            <li>
                                <div class='name'><span>2</span>YOUR DESIRE LEAGUE</div>
                                <div class='list-wrapper'>
                                    <div class='list'>
                                        <div class='select'>
                                            <div class='control'>Choose</div>
                                            <i class='material-icons'>keyboard_arrow_down</i>
                                        </div>

                                        <div class='options'>

                                        </div>
                                    </div>
                                    <div class='list'>
                                        <div class='select'>
                                            <div class='control'>Choose</div>
                                            <i class='material-icons'>keyboard_arrow_down</i>
                                        </div>

                                        <div class='options'>

                                        </div>
                                    </div>
                                    <div class="badges">
                                        <img src="https://eloboost24.eu/images/divisions/27.png" alt="">
                                    </div>
                                </div>
                            </li>
                            <li class='not-badges'>
                                <div class='name'><span>3</span>YOUR SERVER</div>
                                <div class='list-wrapper'>
                                    <div class='list'>
                                        <div class='select'>
                                            <div class='control'>Choose</div>
                                            <i class='material-icons'>keyboard_arrow_down</i>
                                        </div>

                                        <div class='options'>

                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class='not-badges'>
                                <div class='name'><span>4</span>TYPE OF QUEUE</div>
                                <div class='list-wrapper'>
                                    <div class='list'>
                                        <div class='select'>
                                            <div class='control'>Choose</div>
                                            <i class='material-icons'>keyboard_arrow_down</i>
                                        </div>

                                        <div class='options'>
                                            <ul>
                                                <li>Flex Summoners Rift (5v5)</li>
                                                <li>Solo/Duo (5v5)</li>
                                                <li>Flex Twisted Treeline (3v3)</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class='type-of-service'>
                                <div class='name'><span>5</span>TYPE OF SERVICE</div>
                                
                                <div class="services-wrapper">
                                    <div class="service">
                                        <img class='icon' src="https://eloboost24.eu/images/pages/boosting/duo_opt_regular.png">
                                        <span>REGULAR</span>
                                    </div>
                                    <div class="service">
                                        <img class='icon' src="https://eloboost24.eu/images/pages/boosting/duo_opt_regular.png">
                                        <span>PREMIUM</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div id="duo-boosting">
                    <h1>Duo Boosting</h1>
                    <span>You will play on your own account and our booster will play with you until you achieve your desired division.</span>

                    <div class='choose'>
                        <ul>
                            <li>
                                <div class='name'><span>1</span>YOUR CURRENT LEAGUE</div>

                                <div class='list-wrapper'>
                                    <div class='list'>
                                        <div class='select'>
                                            <div class='control'>Choose</div>
                                            <i class='material-icons'>keyboard_arrow_down</i>
                                        </div>

                                        <div class='options'>

                                        </div>
                                    </div>

                                    <div class='list'>
                                        <div class='select'>
                                            <div class='control'>Choose</div>
                                            <i class='material-icons'>keyboard_arrow_down</i>
                                        </div>

                                        <div class='options'>

                                        </div>
                                    </div>

                                    <div class="badges">
                                        <img src="https://eloboost24.eu/images/divisions/27.png" alt="">
                                    </div>
                                </div>
                                
                            </li>
                            <li>
                                <div class='name'><span>2</span>YOUR DESIRE LEAGUE</div>
                                <div class='list-wrapper'>
                                    <div class='list'>
                                        <div class='select'>
                                            <div class='control'>Choose</div>
                                            <i class='material-icons'>keyboard_arrow_down</i>
                                        </div>

                                        <div class='options'>

                                        </div>
                                    </div>
                                    <div class='list'>
                                        <div class='select'>
                                            <div class='control'>Choose</div>
                                            <i class='material-icons'>keyboard_arrow_down</i>
                                        </div>

                                        <div class='options'>

                                        </div>
                                    </div>
                                    <div class="badges">
                                        <img src="https://eloboost24.eu/images/divisions/27.png" alt="">
                                    </div>
                                </div>
                            </li>
                            <li class='not-badges'>
                                <div class='name'><span>3</span>YOUR SERVER</div>
                                <div class='list-wrapper'>
                                    <div class='list'>
                                        <div class='select'>
                                            <div class='control'>Choose</div>
                                            <i class='material-icons'>keyboard_arrow_down</i>
                                        </div>

                                        <div class='options'>

                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class='not-badges'>
                                <div class='name'><span>4</span>TYPE OF QUEUE</div>
                                <div class='list-wrapper'>
                                    <div class='list'>
                                        <div class='select'>
                                            <div class='control'>Choose</div>
                                            <i class='material-icons'>keyboard_arrow_down</i>
                                        </div>

                                        <div class='options'>

                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class='type-of-service'>
                                <div class='name'><span>5</span>TYPE OF SERVICE</div>
                                
                                <div class="services-wrapper">
                                    <div class="service">
                                        <img class='icon' src="https://eloboost24.eu/images/pages/boosting/duo_opt_regular.png">
                                        <span>REGULAR</span>
                                    </div>
                                    <div class="service">
                                        <img class='icon' src="https://eloboost24.eu/images/pages/boosting/duo_opt_regular.png">
                                        <span>PREMIUM</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div id="win-boosting">
                    <h1>Win Boosting</h1>
                    <span>We will perform an elo boost on your account to raise your MMR and champion win rate.</span>

                    <div class='choose'>
                        <ul>
                            <li>
                                <div class='name'><span>1</span>YOUR CURRENT LEAGUE</div>

                                <div class='list-wrapper'>
                                    <div class='list'>
                                        <div class='select'>
                                            <div class='control'>Choose</div>
                                            <i class='material-icons'>keyboard_arrow_down</i>
                                        </div>

                                        <div class='options'>

                                        </div>
                                    </div>

                                    <div class='list'>
                                        <div class='select'>
                                            <div class='control'>Choose</div>
                                            <i class='material-icons'>keyboard_arrow_down</i>
                                        </div>

                                        <div class='options'>

                                        </div>
                                    </div>

                                    <div class="badges">
                                        <img src="https://eloboost24.eu/images/divisions/27.png" alt="">
                                    </div>
                                </div>
                                
                            </li>
                            <li class='not-badges'>
                                <div class='name'><span>2</span>YOUR DESIRE LEAGUE</div>
                                <div class='list-wrapper'>
                                    <div class='list'>
                                        <div class='select'>
                                            <div class='control'>Choose</div>
                                            <i class='material-icons'>keyboard_arrow_down</i>
                                        </div>

                                        <div class='options'>

                                        </div>
                                    </div>

                                </div>
                            </li>
                            <li class='not-badges type-of-service'>
                                <div class='name'><span>3</span>YOUR SERVER</div>
                                <div class='list-wrapper'>
                                    <div class='list'>
                                        <div class='select'>
                                            <div class='control'>Choose</div>
                                            <i class='material-icons'>keyboard_arrow_down</i>
                                        </div>

                                        <div class='options'>

                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class='not-badges'>
                                <div class='name'><span>4</span>TYPE OF QUEUE</div>
                                <div class='list-wrapper'>
                                    <div class='list'>
                                        <div class='select'>
                                            <div class='control'>Choose</div>
                                            <i class='material-icons'>keyboard_arrow_down</i>
                                        </div>

                                        <div class='options'>

                                        </div>
                                    </div>
                                </div>

                            </li>
                            <li class='type-of-service'>
                                <div class='name'><span>5</span>TYPE OF SERVICE</div>
                                <div class="services-wrapper">
                                    <div class="service">
                                        <img class='icon' src="https://eloboost24.eu/images/pages/boosting/duo_opt_regular.png">
                                        <span>REGULAR</span>
                                    </div>
                                    <div class="service">
                                        <img class='icon' src="https://eloboost24.eu/images/pages/boosting/duo_opt_regular.png">
                                        <span>PREMIUM</span>
                                    </div>
                                </div>
                            </li>

                            <li class='not-badges'>
                                <div class='name'><span>6</span>AMOUNT OF HOURS</div>
                                <div class="inc-dec">
                                    <div class="inc">+</div>
                                    <div class="val">1</div>
                                    <div class="dec">-</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>


            </div>
        </div>
    </section>
    
    <section id='gallery'>
        <div class='middle'>
            <h1 class='wow fadeInDown' data-wow-delay='0.2s'>Gallery</h1>
            <div class='photos'>
                <ul class='wow fadeInDown' data-wow-delay='0.7s'>
                    @foreach($gallerys as $gallery)
                    <li>
                        @if($gallery->photo) <div class='img' url="{{$gallery->photo->name ? URL::to('images') .'/'. $gallery->photo->name : URL::to('images') .'/'.'400x400.png'}}" style='background-image: url({{$gallery->photo->name ? URL::to('images') .'/'. $gallery->photo->name : URL::to('images') .'/'.'400x400.png'}});'></div> @endif
                        <div class='inf'>@if($gallery->name) {{ $gallery->name }} @endif</div>
                    </li>
                    @endforeach

                </ul>
                <div class='btn wow fadeInUp' data-wow-delay='1s'>Show More</div>
            </div>
        </div>
        <div class='popup-overlay'>
            <div class='popup'>
            <img src='{{ asset('css/assets/images/close.svg') }}' class='close'>

                <div class="photo">
                    
                </div>
            </div>
        </div>
        <div class='overlay'></div>
    </section>

    <section id='faq'>
        <div class='middle'>
            <h1 class='wow fadeInDown' data-wow-delay='0.2s'>Faq</h1>

            <div class='faq-wrapper'>
                <ul class='wow fadeInUp' data-wow-delay='0.7s'>
                    @foreach($faqs as $faq)
                        <li>
                            <div class='control'>
                                <p>@if($faq->name) {{ $faq->name }} @endif</p>
                                <i class='fas fa-plus'></i>
                            </div>
                            <div class='answer'>@if($faq->description) {{ $faq->description }} @endif</div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

    <section class='background-image' id='contact'>
        <div class='middle'>
            <h1 class='wow fadeInDown' data-wow-delay='0.2s'>Contact</h1>

            <form class='wow fadeInUp' data-wow-delay='0.7s' method='POST' action='{{ route('contact') }}'>
                <p>If you have any questions you can email us</p>

                <ul>
                    <li>
                        <input type='text' name='subject' id='cont_subject' autocomplete='off' required>
                        <label>Subject</label>
                        <span class='border'></span>
                    </li>
                    <li>
                        <input type='email' name='contactEmail' id='cont_email' autocomplete='off' required>
                        <label>E-mail</label>
                        <span class='border'></span>
                    </li>
                    <li>
                        <textarea name='message' id='cont_message' rows='8' cols='80' required></textarea>
                        <label>Message</label>
                        <span class='border'></span>
                    </li>
                    <li class="submit">
                        <input class='btn' type='submit' value='Send'>
                        <div class='preloader'>
                            <div class='spinner'>
                                <div class='bounce1'></div>
                                <div class='bounce2'></div>
                                <div class='bounce3'></div>
                            </div>
                        </div>
                    </li>
                    <li class='err-txt'></li>
                </ul>
                <div class='success-dialog'>
                    <div class='title'>Message Sent Successfully</div>
                </div>
            </form>
        </div>
    </section>
    <a href='#aboutus' class="scroll scroll-top"><i class="material-icons">arrow_upward</i></a>
</main>

<footer>
    <div class='middle'>
        <p class='copyright'></p>
        <ul>
            <li><i class='fas fa-map-marked-alt'></i><a href='#'>Tbilis, Georgia</a></li>
            <li><i class='fas fa-phone'></i> <a href='#'>+995 555 555 555</a></li>
            <li><i class='fas fa-envelope'></i> <a href='#'>support@Elounion.com</a></li>
        </ul>
    </div>
</footer>

<script src='{{ asset('js/cyb/wow.js') }}'></script>
<script src='{{ asset('js/cyb/jquery-3.4.0.min.js') }}' type='text/javascript'></script>
<script>
    $.ajaxSetup({
        // headers: {
        //     'X-CSRF-TOKEN': $('meta[name='csrf-token']').attr('content')
        // }
    });
</script>
<script src='{{ asset('js/cyb/main.js') }}' type='text/javascript'></script>
<script>
</script>

</body>
</html>
