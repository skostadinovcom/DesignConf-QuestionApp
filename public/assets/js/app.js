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
            jQuery.post("/question/",
                {
                    names: names,
                    question: question
                },
                function(data, status){
                    if ( status === 'success'){
                        element.find('.names').val('');
                        element.find('.question_data').val('');
                        element.append('<div class="alert alert-success" style="margin-top: 30px;">Вие успешно зададохте вашият въпрос. След като той бъде одобрен ще бъде показан на стената.</div>');
                    }
                }
            );
        }else{
            element.append('<div class="alert alert-danger" style="margin-top: 30px;">Хей, не се опитвай да ни измамиш! Попълни полетата и опитай пак...</div>');
        }
    });
});