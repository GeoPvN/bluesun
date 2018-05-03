<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Blue Sun</title>
    <meta name="author" content="Davit Papalashvili">
    <meta name="description" content="jQuery: The Write Less, Do More, JavaScript Library">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=contain">
    <link rel="shortcut icon" href="img/bs.ico">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main/bootstrap-grid.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main/custom.css') }}">
    <script type="text/javascript" src="{{ asset('js/main/jquery-3.3.1.min.js') }}"></script>
</head>
<body>
    <div class="container-fluid no-p h-100">
        <div class="row no-m h-100">
            <div class="col-md-2 no-p rel">
                <div class="section-1">
                    <div class="menu-section">
                        <div class="logo">
                            <img src="img/logo.png">
                        </div>
                        <div class="sub-title">Creative Outsourcing Team</div>
                        <div class="menu-list">
                            <div class="item-list" url="about">About</div>
                            <div class="item-list" url="service">Services</div>
                            <div class="item-list" url="project">Projects</div>
                            <div class="item-list" url="team">Team</div>
                            <div class="item-list" url="get">Get It Touch</div>
                        </div>
                        <div class="footer">
                            <img src="img/phone.png" class="imgphone">
                            <div class="tel-1">(+995) 551 42 03 40</div>
                            <div class="tel-2">(+995) 591 68 88 78</div>
                            <img src="img/mail.png" class="imgmail">
                            <div class="mail">hello@bluesun.ge</div>
                            <div class="logo f-logo">
                                <div>&copy; 2018</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- END Section 1 -->

            <div class="col-md-10 no-p">
                <div class="section-2">
                    <div class="block">
                        <div class="about">
                            <div class="rel">
                                <div class="blue-box">
                                    <span class="l1"></span>
                                    <span class="l2"></span>
                                    <span class="l3"></span>
                                    <span class="l4"></span>
                                </div>
                                <h1 class="about-h1"></h1>
                                <p class="about-p">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
                                <div class="about-btn">
                                    <div class="button">
                                        <span class="l1"></span>
                                        <span class="l2"></span>
                                        <span class="l3"></span>
                                        <span class="l4"></span>
                                        <span class="btn-txt">What we do</span>
                                    </div>
                                    <div class="button btn-last">
                                        <span class="l1"></span>
                                        <span class="l2"></span>
                                        <span class="l3"></span>
                                        <span class="l4"></span>
                                        <span class="btn-txt">who we ara</span>
                                  </div>
                                </div>
                            </div>
                            
                        </div> <!-- END About -->

                        <div class="service">
                            <div class="rel">
                                <div class="blue-box-section"></div>
                                <h1 class="service-h1">Services</h1>
                                <p class="service-p">What can we offer for your business?</p>
                            </div>
                            <div class="row service-section">
                                @foreach($services as $service)
                                <div class="col-md-4">
                                    <div class="service-item">
                                        <span class="l1"></span>
                                        <span class="l2"></span>
                                        <span class="l3"></span>
                                        <span class="l4"></span>
                                        <img src="images/{{ $service->photo->name }}" width="">
                                    </div>
                                    
                                    <h2>{{ $service->name }}</h2>
                                    <p class="service-id" data-value="{{ $service->id }}">View Works</p>
                                </div>
                                @endforeach
                            </div>
                            <div class="row scroll">
                                <img width="" src="img/scroll.png">
                                <p>scroll for more</p>
                            </div>
                        </div> <!-- END Services -->

                        <div class="project">
                            <div class="rel">
                                <div class="blue-box-section"></div>
                                <h1 class="project-h1">Projects</h1>
                                <p class="project-p">Some of projects, we’ve done with</p>
                            </div>
                            <div class="row project-section">
                                @foreach($projects as $project)
                                <div class="col-md-4">
                                    <div class="project-item">
                                        <span class="l1"></span>
                                        <span class="l2"></span>
                                        <span class="l3"></span>
                                        <span class="l4"></span>
                                        <img src="images/{{ $project->photo->name }}" width="">
                                    </div>
                                    <div class="button">
                                        <span class="l1"></span>
                                        <span class="l2"></span>
                                        <span class="l3"></span>
                                        <span class="l4"></span>
                                        {{ $project->services->name }}
                                    </div>
                                    <p>{{ $project->name }}</p>
                                </div>
                                @endforeach
                            </div>
                            <div class="row scroll">
                                <img width="" src="img/scroll.png">
                                <p>scroll for more</p>
                            </div>
                        </div> <!-- END project -->

                        <div class="team">
                            <div class="rel">
                                <div class="blue-box-section"></div>
                                <h1 class="team-h1">Team</h1>
                                <p class="team-p">Some of projects, we’ve done with</p>
                            </div>
                            <div class="row team-section">
                                @foreach($teams as $team)
                                <div class="col-md-4">
                                    <div class="team-item">
                                        <span class="l1"></span>
                                        <span class="l2"></span>
                                        <span class="l3"></span>
                                        <span class="l4"></span>
                                        <img src="images/{{ $team->photo->name }}" width="">
                                        <div class="red"></div>
                                    </div>
                                    <h2>{{ $team->name }}</h2>
                                    <p>{{ $team->position->name }}</p>
                                </div>
                                @endforeach
                            </div>
                            <div class="row scroll">
                                <img width="" src="img/scroll.png">
                                <p>scroll for more</p>
                            </div>
                        </div> <!-- END Team -->

                    </div>
                </div>
            </div> <!-- END Section 2 -->
        </div>
    </div>
    <!-- custom script -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js'></script>
    <script type="text/javascript" src="{{ asset('js/main/typed.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/main/custom.js') }}"></script>

</body>
</html>