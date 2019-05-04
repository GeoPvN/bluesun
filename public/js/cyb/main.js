void function Init() {

    $('section').css('min-height', window.innerHeight)

    $(document).ready(function($) {
        var Body = $('body');
        Body.addClass('preloader-site');
    });
    $(window).on('load',function() {
        $('.preloader-wrapper').fadeOut();
        $('body').removeClass('preloader-site').css('overflow', 'unset');
    });
    void function InitDomEvents() {


        $('nav a, .scroll, .scroll-to-service').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top - 0
                    }, 1000);
                    return false;
                }
            }
        });

        $(window).scroll(function() {
            var scroll = $(window).scrollTop();
            if (scroll >= 150) {
                $("header").addClass("fixed");
            } else {
                $("header").removeClass("fixed");
            }
        });

        $('header #login').on('click', function() {
            $('.popup-overlay.signin').css('transform', 'translateY(0%)');
            $('#login_email,#login_password').val('');
            $('.signin .err-txt').html('');
        })

        $('header #registration').on('click', function() {
            $('.popup-overlay.signup').css('transform', 'translateY(0%)');
            $('#reg_name,#reg_email,#reg_pass,#reg_pass_con').val('');
        })

        $('header #profile').on('click', function() {
            $('.popup-overlay.my-account').css('transform', 'translateY(0%)');
            $('input[name="oldPassword"],.half input[name="password"],.half input[name="password_confirmation"]').val('');
            $('.half .err-txt').html('');
        })

        $('header .popup .close').on('click', function() {
            $(this).parents('.popup-overlay').css('transform', 'translateY(100%)');

            if( $('.signin .popup').hasClass('forgot-password') ) $('.signin .popup').removeClass('forgot-password')
        })

        $('input, textarea, select').on('focus', function() {
            $(this).siblings('span').addClass('fucused');
            $(this).siblings('label').addClass('active');
        })

        $('input, textarea, select').on('focusout', function() {
            if ($(this).val()) return
            $(this).siblings('span').removeClass('fucused');
            $(this).siblings('label').removeClass('active');
        })

        $('.boosts ul li').on('click', function() {
            $(this).addClass('active').siblings().removeClass('active');
        })

        $('.select').on('click', function() {
            var select = $(this)
            $('.select').not(select).each(function() {
                $(this).removeClass('active');
                $(this).next('.options').slideUp('fast');
            })
            select.toggleClass('active');
            select.next('.options').slideToggle('fast');
        })

        $('body').on('click', '.option', function() {
            var value = $(this).text()
            $(this).parents('.list').find('.control').text(value);
            $(this).parents('.options').removeClass('active').hide()
            $('.select').removeClass('active')
        })

        $('#contact form').on('submit', function(ev) {
            ev.preventDefault();
            var url = $(this).attr('action');
            var post = $(this).attr('method');

            subject = $('#cont_subject').val();
            email = $('#cont_email').val();
            description = $('#cont_message').val();

            $.ajax({
                method: post,
                url: url,
                data: { subject: subject, email: email, description: description},
                dataType: 'JSON',
                headers: { 'X-CSRF-TOKEN': $('[name="csrf-token"]').attr('content') },
                success: function(msg){
                    console.log(msg);
                    refresh_token();
                },
                error: function (error) {
                    console.log(error);
                    refresh_token();
                }
            });
        });

        $('.half form').on('submit', function(ev) {
            ev.preventDefault();
            var url = $(this).attr('action');
            var post = $(this).attr('method');

            oldPassword = $('input[name="oldPassword"]').val();
            password = $('.half input[name="password"]').val();
            password_confirmation = $('.half input[name="password_confirmation"]').val();

            $.ajax({
                method: post,
                url: url,
                data: { oldPassword: oldPassword, password: password, password_confirmation: password_confirmation},
                dataType: 'JSON',
                headers: { 'X-CSRF-TOKEN': $('[name="csrf-token"]').attr('content') },
                success: function(msg){
                    console.log(msg);
                    refresh_token();
                    var d = '';
                    $.each(msg.error, function (i) {
                        d += '<p>'+msg.error[i]+'</p>';
                    });
                    $('.half .err-txt').html(d);
                },
                error: function (error) {
                    console.log(error);
                    refresh_token();
                }
            });
        });

        $('.signin form').on('submit', function(ev) {
            ev.preventDefault();
            var url = $(this).attr('action');
            var post = $(this).attr('method');

            email = $('#login_email').val();
            password = $('#login_password').val();

            $.ajax({
                method: post,
                url: url,
                data: { email: email, password: password},
                dataType: 'JSON',
                headers: { 'X-CSRF-TOKEN': $('[name="csrf-token"]').attr('content') },
                beforeSend: function(){
                    $('#for-user .preloader').addClass('visible').fadeIn('fast').delay(1400).fadeOut("fast");
                    $('#for-user .auth').hide();
                },
                success: function(msg){
                    $('#for-user .authorized').show();
                    $('#for-user .authorized span.user, .my-profile li:first-child .info, .my-profile .half:first-child h1 span').text('test');
                    $('.popup-overlay').css('transform', 'translateY(-100%)');

                    $('.profile_name,.user').html(msg.name);
                    $('.profile_email').html(msg.email);

                    refresh_token();
                },
                error: function (error) {
                    console.log(error);
                    $('#for-user .authorized').hide();
                    $('#for-user .auth').show();
                    refresh_token();
                    $('.signin .err-txt').html(error.responseJSON.message);
                }
            });
        });

        $('form.forgot-dialog').on('submit', function(ev) {
            ev.preventDefault();
            var url = $(this).attr('action');
            var post = $(this).attr('method');

            email = $('#forgot_email').val();

            $.ajax({
                method: post,
                url: url,
                data: { email: email, password: password},
                dataType: 'JSON',
                headers: { 'X-CSRF-TOKEN': $('[name="csrf-token"]').attr('content') },
                beforeSend: function(){
                    $('#for-user .preloader').addClass('visible').fadeIn('fast').delay(1400).fadeOut("fast");
                    $('#for-user .auth').hide();
                },
                success: function(msg){
                    $(this).addClass('success')
                },
                error: function (error) {

                }
            });
        });

        $('.signin li .forgot').on('click', function() {
            $(this).parents('.popup').addClass('forgot-password');
        })

        $('.signup form').on('submit', function(ev) {
            ev.preventDefault();
            var url = $(this).attr('action');
            var post = $(this).attr('method');

            sum_name = $('#reg_name').val();
            email = $('#reg_email').val();
            password = $('#reg_pass').val();
            password_confirmation = $('#reg_pass_con').val();

            $.ajax({
                method: post,
                url: url,
                data: { name: sum_name, email: email, password: password, password_confirmation: password_confirmation },
                dataType: 'JSON',
                headers: { 'X-CSRF-TOKEN': $('[name="csrf-token"]').attr('content') },
                beforeSend: function(){
                    $('#for-user .preloader').addClass('visible').fadeIn('fast').delay(1400).fadeOut("fast");
                    $('#for-user .auth').hide();
                },
                success: function(msg){
                    console.log(msg);
                    $('#for-user .authorized').show();
                    $('#for-user .authorized span.user, .my-profile li:first-child .info, .my-profile .half:first-child h1 span').text('test');
                    // $('.popup-overlay').css('transform', 'translateY(-100%)');
                    $('.signup .popup').addClass('success');
                    $('.profile_name,.user').html(msg.name);
                    $('.profile_email').html(msg.email);
                    refresh_token();
                },
                error: function (error) {
                    console.log(error);
                    $('#for-user .authorized').hide();
                    $('#for-user .auth').show();
                    refresh_token()
                }
            });
        });

        function refresh_token(){
            $.get('refresh-csrf').done(function(data){
                $('[name="csrf-token"]').attr('content',data);
            });
        }

        $('#for-user .authorized .signout').on('click', function(ev) {
            $.ajax({
                method: "POST",
                url: "logout",
                dataType: 'JSON',
                headers: { 'X-CSRF-TOKEN': $('[name="csrf-token"]').attr('content') },
                beforeSend: function(){

                },
                success: function(msg){
                    console.log(msg);
                },
                error: function (error) {
                    console.log(error);
                    $.get('refresh-csrf').done(function(data){
                        $('[name="csrf-token"]').attr('content',data);
                    });
                }
            });
            $('#for-user .preloader').fadeIn('fast').delay(1400).fadeOut("fast");
            $('#for-user .authorized').hide();
            $('#for-user .auth').show();
        })


        $('.bar li').on('click', function() {
            $(this).addClass('active').siblings().removeClass('active')

            if( $('.bar li:first-child').hasClass('active')) {
                $('.controler').removeClass('show-orders')
            } else {
                $('.controler').addClass('show-orders')
            }
        })



        //
        // $('.faq-wrapper ul').on('click', 'li', function() {
        //     $(this).find('i').toggleClass('active')
        //     $(this).find('.answer').slideToggle()
        // })

    }()


    void function copyright() {
        var host = window.location.host;
        var year = new Date().getFullYear();
        $('.copyright').html(`&copy; ${year} ${host}`)
    }()
    new WOW().init()
}()
