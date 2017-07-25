
$(document).ready(function() {

    $('.comm').toggle(
        function(){$('.comments').css({'display': 'block'});},
        function(){$('.comments').css({'display': 'none'});}
    );

    //$('.save-post-button').click(function (e) {

    $('.modal-footer').on('click', '.save-post-button', function(e) {

        e.preventDefault();

        $.ajax({
            type: 'post',
            url: '/create',
            data: {
                '_token': $('input[name=_token]').val(),

                'content2': $('textarea[name=content2]').val() ,
                'topic_name': $('input[name=topic_name]').val()
            },
            success: function(data) {
                if ((data.errors)){
                    $('.error').removeClass('hidden');
                    $('.error').text('Please Check: ' +  data.errors);
                }
                else {
                    $('.error').addClass('hidden');
                    console.log(data);
                    // alert("eslam");
                    $('#ul_for_posts').prepend( "<li id='"+ data.id+"'  class='li_post' data-title='"+ data.id+"'><div class='media'><div class='media'><div class='media-left'>"  +
                        " <a href=''><img src='/images/img_avatar2.png' class='media-object img-circle' style='width:60px'></a></div>" +
                        "<div class='media-body'> <div class='media-heading'><div class='dropdown posts-choose'>" +
                        " <button class='btn dropdown-toggle' type='button' data-toggle='dropdown'><span class='caret'></span></button>" +
                        "<ul class='dropdown-menu dropdown-menu-right'> " +
                        "<li ><button type='button'  data-name='"+data.topic_name +"' class='btn btn-link edit-topic' data-toggle='modal' data-target='#edit-topic'>"+
                        "<span class='e-text-btn-link'>Edit Topic Name</span></button></li> " +
                        "<li ><button type='button' data-id='"+ data.id+"'  data-content='"+ data.content+"' class='btn btn-link edit-content' data-toggle='modal' data-target='#edit-content'> "  +
                        "<span class='e-text-btn-link'>Edit Content</span></button></li> " +
                        " <li ><button type='button'  class='btn btn-link delete-post' data-id='"+ data.topic_name+"' data-toggle='modal' data-target='#delete-post'>" +
                        " <span class='e-text-btn-link'>Delete Post</span></button></li>" +
                        "<li class='divider'></li> <li><a href=''>Unfollow gota</a></li></ul></div>" +
                        "<h4 ><a href='/profile'>"+ data.name+"</a><span class='sug4'>suggested at</span><a class='topic_link' href='/topic/"+ data.topic_name+"'>" +
                        " "+ data.topic_name+"</a></h4></div><p>"+ data.content+"</p></div><div class='media-bottom'><hr><h5 >" +
                        "<a href=''>Likes <span class='badge'>5</span></a> " +
                        " <a href='' id='comm' class='comm'>Comments <span class='badge'>10</span></a></h5><hr style='border-bottom: 1px solid #aaaaaa;'>"+
                        " </div><!--end-media-bottom--></div></li>"
                    );

                }
            }
        });
        $('#content2').val('');
        $('#topic_name').val('');

    });

    ///////////////////////////////////////////////
    /////////////// edit user data ////////////////////////////////////
    $(document).on('click', '.edit-button-profile', function(e) {
        e.preventDefault();

        $('#name').val($(this).data('name'));
        $('#email').val($(this).data('email'));

        $('#current_job').val($(this).data('current'));

        $('#previous_job').val($(this).data('previous'));

    });
    $('.modal-footer').on('click', '.user-form-save', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: '/edit_profile',
            data: {
                '_token': $('input[name=_token]').val(),
                'user_name': $('input[name=username]').val(),
                'email': $('input[name=email]').val(),
                'current_job': $('input[name=current_job]').val(),
                'previous_job': $('input[name=previous_job]').val()
            },
            success: function(data) {
                if ((data.errors)){
                    $('.error').removeClass('hidden');
                    $('.error').text('Please Check: ' +  data.errors);
                }
                else {
                    $('.error').addClass('hidden');
                    console.log(data);
                    $('.new_name').text(data.name);

                    $('#name').val('');

                    $('#email').val('');

                    $('#current_job').val('');

                    $('#previous_job').val('');
                }
            }
        });

    });
//////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////
    $(document).on('click', '.edit-topic', function(e) {
        e.preventDefault();
        $('#e_topic_name').val($(this).data('name'));
        $('#e_id_topic').val($(this).data('name'));
    });
    //////////////////////////////////////////
    $('.modal-footer').on('click', '.e-t-save-post-button', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: '/edit_topic',
            data: {
                '_token': $('input[name=_token]').val(),
                'e_topic_name': $('input[name=e_topic_name]').val(),
                'e_id_topic': $('input[name=e_id_topic]').val()

            },
            success: function(data) {
                if ((data.errors)){
                    $('.error').removeClass('hidden');
                    $('.error').text('Please Check: ' +  data.errors);
                }
                else {
                    $('.error').addClass('hidden');
                    console.log(data);
                    // alert("eslam");

                    $('#e_topic_name').val('');
                }
            }
        });

    });
    ///////////////////////////////////////////////
    ///////////////////////////////////////////////////

    $(document).on('click', '.edit-content', function(e) {

        e.preventDefault();

        $('#e_id_post').val($(this).data('id'));


        $('#e_content2').val($(this).data('content'));
    });
    //////////////////////////////////////////
    $('.modal-footer').on('click', '.e-c-save-post-button', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: '/edit_content',
            data: {
                '_token': $('input[name=_token]').val(),
                'e_id_post': $('input[name=e_id_post]').val(),
                'e_content2': $('textarea[name=e_content2]').val()
            },
            success: function(data) {
                if ((data.errors)){
                    $('.error').removeClass('hidden');
                    $('.error').text('Please Check: ' +  data.errors);
                }
                else {
                    $('.error').addClass('hidden');
                    console.log(data);

                    $('#e_content2').val('');
                    // alert("eslam");

                }
            }
        });

    });

//////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////


    $(document).on('click', '.delete-post', function(e) {
        e.preventDefault();
        $('#d_id').val($(this).data('id'));
    });
    //////////////////////////////////////////
    $('.modal-footer').on('click', '.delete-post-button', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: '/delete',
            data: {
                '_token': $('input[name=_token]').val(),
                'd_id': $('input[name=d_id]').val()
            },
            success: function(data) {
                $id = $('.li_post').data('title');//$("#d_id").val();
                console.log($id);
                //$('.li_post').data('title').
                $("#"+ $id +"" ).remove();


                //$(document).valueOf($("#d_id").val()).remove();
                //$('#' + $('.li_post').data('title')).remove();
               // $('#ul_for_posts' + ).remove();

            }
        });

    });

    ////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////
    $(window).on( 'load' ,function (e) {
        $id= $('.topic_link').data('id');
        $button = $('#interested-button-head');
        if( $id == 1){
            $button.addClass('interesting');
            $button.text('interesting');
        }
        /////////////////////
        $id2= $('.follow_link').data('content');
        $button2 = $('#follow-button-head');
        if( $id2 == 1){
            $button2.addClass('following');
            $button2.text('following');
        }
    });


/*
        $(document).on('click' , '.topic_link' , function (e) {
            $id= $('.topic_link').data('id');
            $button = $('#interested-button-head');
            if( $id == 1){
                $button.addClass('interesting');
                $button.text('interesting');
            }else{
                alert("eslam");
            }
        });//*/
    $(document).on('click' , '.abc' ,function (e) {
        //e.preventDefault();
         $button = $('.interested-button');

             $button.addClass('interesting');
             $button.text('interesting');


    });//*/
    $('.interested-button').on('click', function(e) {
        e.preventDefault();
        $button = $(this);
        if($button.hasClass('interesting')){
            $button.removeClass('interesting');
            $button.removeClass('uninterested');
            $button.text('interested');
            $.ajax({
                type: 'post',
                url: '/removeinterest',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'topic_name': $(this).data('name')
                },
                success: function(data) {
                    console.log(data);
                }
            });
        }else{
            $button.addClass('interesting');
            $button.text('interesting');
            $.ajax({
                type: 'post',
                url: '/dointerest',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'topic_name': $(this).data('name')

                },
                success: function(data) {
                   console.log(data);
                }
            });
        }// end else

    });

//////////////////////////////////////

    $('.interested-button').hover(function(){
        $button = $(this);
        if($button.hasClass('interesting')){
            $button.addClass('uninterested');
            $button.text('Uninterested');
        }
    }, function(){
        if($button.hasClass('interesting')){
            $button.removeClass('uninterested');
            $button.text('interesting');
        }
    });

////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%55
    //////////////&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&7
    /////////////////////////////////((((((((((((((((((((((((((((((((((((((((((((((((((((((((((((((((((((((((((((((((((9

    $(document).on('click' , '.gij' ,function (e) {
        e.preventDefault();

        $id2= $('.f_f').data('id');
        $button2 = $('#follow-button-head');
        if( $id2 == 1){
            $button2.addClass('following');
            $button2.text('following');
        }

    });//*/
    $(document).on('click' , '.def' ,function (e) {
        e.preventDefault();
        $button = $('.f-button');
        $button.addClass('following');
        $button.text('following');
    });//*/
    $('.f-button').on('click', function(e) {
        e.preventDefault();
        $button = $(this);
        if($button.hasClass('following')){
            $button.removeClass('following');
            $button.removeClass('unfollow');
            $button.text('follow');
            $.ajax({
                type: 'post',
                url: '/removefollow',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'following_id': $(this).data('id')
                },
                success: function(data) {
                    console.log(data);
                }
            });
        }else{
            $button.addClass('following');
            $button.text('following');
            $.ajax({
                type: 'post',
                url: '/dofollow',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'following_id': $(this).data('id')

                },
                success: function(data) {
                    console.log(data);
                }
            });
        }// end else

    });

//////////////////////////////////////

    $('.f-button').hover(function(){
        $button = $(this);
        if($button.hasClass('following')){
            $button.addClass('unfollow');
            $button.text('Unfollow');
        }
    }, function(){
        if($button.hasClass('following')){
            $button.removeClass('unfollow');
            $button.text('following');
        }
    });

////////////////////////////////////////////////////




});// end ready function

