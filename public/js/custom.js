$( document ).ready(function() {

    $('.timeline .comments-block').css('display', 'none');
    if(window.location.href.indexOf("#comment") > -1) {
        hash = window.location.href.split('#')[1];
        $('#comment13').closest('.comments-block').css('display', 'block');
    }

    $(document).on('click', '.show-reply-form', function(){
        $(this).closest('.comment-block').find('.reply-form').css('display', 'block');
        $(this).html('Hide Reply Form');
        $(this).addClass('hide-reply-form');
        $(this).removeClass('show-reply-form');

    });

    $(document).on('click', '.hide-reply-form', function(){
        $(this).closest('.comment-block').find('.reply-form').css('display', 'none');
        $(this).html('Show Reply Form');
        $(this).addClass('show-reply-form');
        $(this).removeClass('hide-reply-form');
    });

    $(document).on('click', '.show-comments', function(){
        $(this).closest('.post-block').find('.comments-block').css('display', 'block');
        $(this).html('Hide Comments');
        $(this).addClass('hide-comments');
        $(this).removeClass('show-comments');

    });

    $(document).on('click', '.hide-comments', function(){
        $(this).closest('.post-block').find('.comments-block').css('display', 'none');
        $(this).html('Show Comments');
        $(this).addClass('show-comments');
        $(this).removeClass('hide-comments');
    });

    $(".deleteConfirm").click(function(){
        if (!confirm("Do you want to delete")){
            return false;
        }
    });


});
