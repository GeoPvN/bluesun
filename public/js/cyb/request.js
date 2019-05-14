$('.login-dialog').on('submit', function(ev) {
    ev.preventDefault();
    var thisForm = $(this)

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

            $(thisForm.find('li.err-txt')).html('');
            $('.profile_name,.user').html(msg.name);
            $('.profile_email').html(msg.email);
            active = 'Deactive';
            if(msg.active == 1){
                active = 'Active';
            }
            $('.profile_active').html(active);

            refresh_token();
        },
        error: function (error) {
            console.log(error);
            $('#for-user .authorized').hide();
            $('#for-user .auth').show();
            refresh_token();
            notValid(thisForm.find('li'));
            $(thisForm.find('li.err-txt')).html(error.responseJSON.message);
        }
    });
});

$('.signup form').on('submit', function(ev) {
    ev.preventDefault();
    var thisForm = $(this)

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
            active = 'Deactive';
            if(msg.active == 1){
                active = 'Active';
            }
            $('.profile_active').html(active);
            refresh_token();
        },
        error: function (error) {
            console.log(error);
            $('#for-user .authorized').hide();
            $('#for-user .auth').show();

            notValid(thisForm.find('li'));

            refresh_token();
            $(thisForm.find('li.err-txt')).html(error.responseJSON.message);
        }
    });
});

$('.forgot-dialog').on('submit', function(ev) {
    ev.preventDefault();
    var thisForm = $(this)

    var url = $(this).attr('action');
    var post = $(this).attr('method');

    email = $('#forgot_email').val();

    $.ajax({
        method: post,
        url: url,
        data: { email: email},
        dataType: 'JSON',
        headers: { 'X-CSRF-TOKEN': $('[name="csrf-token"]').attr('content') },
        beforeSend: function(){
            $(thisForm.find('li.err-txt')).html('');
        },
        success: function(msg){
            if(msg.error){
                notValid(thisForm.find('li'));
                $(thisForm.find('li.err-txt')).html(msg.error);
            }else{
                thisForm.addClass('success')
                thisForm.find('input:not([type="submit"])').val('');
                checkInput(thisForm)
                $(thisForm.find('li.err-txt')).html('');
            }
        },
        error: function (error) {

        }
    });
});

$('.changePassword').on('submit', function(ev) {
    ev.preventDefault();
    var thisForm = $(this)

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
            if(msg.error) {
                console.log(msg);
                refresh_token();
                var d = '';
                $.each(msg.error, function (i) {
                    d += '<p>'+msg.error[i]+'</p>';
                });

                $(thisForm.find('li.err-txt')).html(d);
                notValid(thisForm.find('li'));
            } else {
                thisForm.addClass('success')
                setTimeout(function() {
                    thisForm.removeClass('success');
                    thisForm.find('input:not([type="submit"])').val('');
                    checkInput(thisForm)
                    $(thisForm.find('li.err-txt')).html('');
                }, 2000);
            }


        },
        error: function (error) {
            console.log(error);
            refresh_token();
        }
    });
});

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
            refresh_token();
        },
        error: function (error) {
            console.log(error);
            refresh_token();
        }
    });
    $('#for-user .preloader').fadeIn('fast').delay(1400).fadeOut("fast");
    $('#for-user .authorized').hide();
    $('#for-user .auth').show();
});

$('#contact form').on('submit', function(ev) {
    ev.preventDefault();
    var thisForm = $(this)

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
            thisForm.addClass('success')
            setTimeout(function() {
                thisForm.removeClass('success');
            }, 1500);
            thisForm.find('input:not([type="submit"]), textarea').val('');
            checkInput(thisForm)
            refresh_token();
        },
        error: function (error) {
            console.log(error);
            notValid(thisForm.find('li'));
            refresh_token();
        }
    });
});

$(document).on('click','#league-l .option',function () {
    var league_id = $(this).attr('value');
    $.ajax({
        method: "POST",
        url: "division",
        data: { league_id: league_id},
        dataType: 'JSON',
        headers: { 'X-CSRF-TOKEN': $('[name="csrf-token"]').attr('content') },
        success: function(msg){
            console.log(msg);
            var option = '';
            $.each(msg, function (key, val) {
                option += '<div class="option" value="'+val.id+'" photo="'+val.photo.name+'">'+val.name+'</div>';
            });

            $('#league-d .options').html(option);

            refresh_token();
        },
        error: function (error) {
            console.log(error);
            refresh_token();
        }
    });
});

$(document).on('click','#league-d .option',function () {
    var photo = $(this).attr('photo');
    var url = $('#url').val();
    $('#league-i img').attr('src',url+'/'+photo);
});

$(document).on('click','#league-l-n .option',function () {
    var league_id = $(this).attr('value');
    $.ajax({
        method: "POST",
        url: "division",
        data: { league_id: league_id},
        dataType: 'JSON',
        headers: { 'X-CSRF-TOKEN': $('[name="csrf-token"]').attr('content') },
        success: function(msg){
            console.log(msg);
            var option = '';
            $.each(msg, function (key, val) {
                option += '<div class="option" value="'+val.id+'" photo="'+val.photo.name+'">'+val.name+'</div>';
            });

            $('#league-d-n .options').html(option);

            refresh_token();
        },
        error: function (error) {
            console.log(error);
            refresh_token();
        }
    });
});

$(document).on('click','#league-d-n .option',function () {
    var photo = $(this).attr('photo');
    var url = $('#url').val();
    $('#league-i-n img').attr('src',url+'/'+photo);
});

// duo

$(document).on('click','#duo-l .option',function () {
    var league_id = $(this).attr('value');
    $.ajax({
        method: "POST",
        url: "division",
        data: { league_id: league_id},
        dataType: 'JSON',
        headers: { 'X-CSRF-TOKEN': $('[name="csrf-token"]').attr('content') },
        success: function(msg){
            console.log(msg);
            var option = '';
            $.each(msg, function (key, val) {
                option += '<div class="option" value="'+val.id+'" photo="'+val.photo.name+'">'+val.name+'</div>';
            });

            $('#duo-d .options').html(option);

            refresh_token();
        },
        error: function (error) {
            console.log(error);
            refresh_token();
        }
    });
});

$(document).on('click','#duo-d .option',function () {
    var photo = $(this).attr('photo');
    var url = $('#url').val();
    $('#duo-i img').attr('src',url+'/'+photo);
});

$(document).on('click','#duo-l-n .option',function () {
    var league_id = $(this).attr('value');
    $.ajax({
        method: "POST",
        url: "division",
        data: { league_id: league_id},
        dataType: 'JSON',
        headers: { 'X-CSRF-TOKEN': $('[name="csrf-token"]').attr('content') },
        success: function(msg){
            console.log(msg);
            var option = '';
            $.each(msg, function (key, val) {
                option += '<div class="option" value="'+val.id+'" photo="'+val.photo.name+'">'+val.name+'</div>';
            });

            $('#duo-d-n .options').html(option);

            refresh_token();
        },
        error: function (error) {
            console.log(error);
            refresh_token();
        }
    });
});

$(document).on('click','#duo-d-n .option',function () {
    var photo = $(this).attr('photo');
    var url = $('#url').val();
    $('#duo-i-n img').attr('src',url+'/'+photo);
});

// win

$(document).on('click','#win-l .option',function () {
    var league_id = $(this).attr('value');
    $.ajax({
        method: "POST",
        url: "division",
        data: { league_id: league_id},
        dataType: 'JSON',
        headers: { 'X-CSRF-TOKEN': $('[name="csrf-token"]').attr('content') },
        success: function(msg){
            console.log(msg);
            var option = '';
            $.each(msg, function (key, val) {
                option += '<div class="option" value="'+val.id+'" photo="'+val.photo.name+'">'+val.name+'</div>';
            });

            $('#win-d .options').html(option);

            refresh_token();
        },
        error: function (error) {
            console.log(error);
            refresh_token();
        }
    });
});

$(document).on('click','#win-d .option',function () {
    var photo = $(this).attr('photo');
    var url = $('#url').val();
    $('#win-i img').attr('src',url+'/'+photo);
});

function refresh_token(){
    $.get('refresh-csrf').done(function(data){
        $('[name="csrf-token"]').attr('content',data);
    });
}

function notValid(li) {
    li.removeClass('shake');

    li.addClass('not-valid shake');
    setTimeout(function() {
        li.removeClass('not-valid');
    }, 1500);
}