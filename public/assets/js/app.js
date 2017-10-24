$( document ).ready(function( evt ) {
    $('#main-header .questions .fa-question').click(function () {
        $('#questions').slideToggle();
    });

    $('#questions .fa-times').click(function () {
        $('#questions').fadeOut();
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#questions_form").submit(function(e){
        e.preventDefault();

        var element = $(this);
        var names = $(this).find('.names').val();
        var question = $(this).find('.question_data').val();

        if ( names.length > 0 && question.length > 0 ){
            jQuery.post("/live/question",
                {
                    names: names,
                    question: question
                },
                function(data, status){
                    if ( status === 'success'){
                        element.find('.names').val('');
                        element.find('.question_data').val('');
                        element.find('.alerts').prepend('<div class="alert alert-success" style="margin-top: 30px;">Вие успешно изпратихте своя въпрос. След като той бъде одобрен ще бъде показан на стената.</div>');
                    }
                }
            );
        }else{
            element.find('.alerts').prepend('<div class="alert alert-danger" style="margin-top: 30px;">Хей, не се опитвай да ни измамиш! Попълни всички полета и опитай пак...</div>');
        }
    });

    $('#live-element').load('/live/ajax');
    setInterval(function()
    {
        $('#live-element').load('/live/ajax');
    }, 3000);

    var refresh = 30000;
    setInterval(function()
    {
        $('.refresh-info').fadeIn();
        refresh = 0;
    }, refresh);

    $('.question-live').click(function () {
        var element = $(this).parent().parent();
        var id = element.attr('data-id');

        jQuery.post("/live/manager",
            {
                id: id,
                type: 'question'
            },
            function(data, status){
                if ( status === 'success'){
                    $('.live').removeClass('live');
                    element.addClass('live');
                }
            }
        );
    });

    $('.question-delete').click(function () {
        var element = $(this).parent().parent();
        var id = element.attr('data-id');

        if( element.hasClass('live') ){
            alert('Не можете да изтриете въпрос докато той се прожектира на стената');
        }else{
            jQuery.post("/live/manager",
                {
                    id: id,
                    type: 'question-delete'
                },
                function(data, status){
                    if ( status === 'success'){
                        element.remove();
                    }
                }
            );
        }
    });

    $('#sponsor-live-btn').click(function () {
        var element = $(this);
        jQuery.post("/live/manager",
            {
                type: 'sponsors'
            },
            function(data, status){
                if ( status === 'success'){
                    $('.live').removeClass('live');
                    element.addClass('live');
                }
            }
        );
    });

    $('#cta-live-btn').click(function () {
        var element = $(this);
        jQuery.post("/live/manager",
            {
                type: 'cta'
            },
            function(data, status){
                if ( status === 'success'){
                    $('.live').removeClass('live');
                    element.addClass('live');
                }
            }
        );
    });

    $('.mce-widget').hide();
});