$('body').on('click', '.form-action', function(){
    var action = $(this).attr('data-action');
    $('.form-contract').removeClass('active');
    $('.form-contract.' + action + '-form').addClass('active')
});


    $('body').on('submit', '#form-register', function(e){
        e.preventDefault();
        var er = $('.login-errors');
        er.removeClass('alert alert-danger');
        er.html('');
        data = $(this).serializeArray();
        // console.log(data);
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: data,
            success: function (data){
                console.log(data);
                var arr = $.parseJSON(data);
                if(arr['error'] == 1){
                    er.addClass('alert alert-danger');
                    er.html(arr['message']);
                }else{
                    er.addClass('alert alert-success');
                    er.html('Registration Successful. Try logging in ;)')
                }
            }
        });
    });

    $('body').on('submit', '#form-login', function(e){
        e.preventDefault();
        $('.login-errors').html('');
        data = $(this).serialize();
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: data,
            success: function(data){
                console.log(data);
                if(data == 'ok'){
                    $('.login-errors').html('You are now logged in');
                    $('.login-errors').addClass('alert alert-success');
                    window.location.href = $('#form-login').attr('data-redirect');
                }else{
                    $('.login-errors').html(data);
                    $('.login-errors').addClass('alert alert-danger');
                }
            }
        });
    });