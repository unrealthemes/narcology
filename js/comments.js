'use strict';

let COMMENTS = {

    init: function init() {

        // COMMENTS.loadmore_handler();
        COMMENTS.like_handler();
        COMMENTS.dislike_handler();

    }, 

    loadmore_handler: function loadmore_handler() {

         // load more button click event
         $('.comments-more button').click( function() {
            var button = $(this);
            button.prop('disabled', true);
            // decrease the current comment page value
            cpage--;

            $.ajax({
                url : ajaxurl, 
                data : {
                    'action': 'cloadmore', 
                    'post_id': parent_post_id, 
                    'cpage' : cpage, 
                },
                type : 'POST',
                beforeSend : function ( xhr ) {
                    button.text('Загрузка...'); 
                },
                success : function( data ){
                    if ( data ) {
                        $('.row_di.coments_list').append( data );
                        button.text('Показать еще комментарии'); 
                        button.prop('disabled', false);
                        if ( cpage == 1 ) 
                            button.remove();
                    } else {
                        button.remove();
                    }
                }
            });
            return false;
        });

    },

    like_handler: function like_handler() {

        $(document).on('click', '.bt_plus', function() {

            $(this).parent().find('button').prop('disabled', true);
            var id = $(this).data('id');
            var data = {
                action: 'clike',
                ajax_nonce: ut_params.ajax_nonce,
                comment_id: id,
            };
            $.ajax({
                type: 'POST',
                url: ut_params.ajax_url,
                data: data,
                success: function (response) {
    
                    if ( response.success ) {
                        $.cookie('vote-comment-' + id, true, {expires: 7, path: '/' });
                    }
                }
            });
        });
    },
    
    dislike_handler: function dislike_handler() {

        $(document).on('click', '.bt_minus', function() {

            $(this).parent().find('button').prop('disabled', true);
            var id = $(this).data('id');
            var data = {
                action: 'cdislike',
                ajax_nonce: ut_params.ajax_nonce,
                comment_id: id,
            };
            $.ajax({
                type: 'POST',
                url: ut_params.ajax_url,
                data: data,
                success: function (response) {
    
                    if ( response.success ) {
                        $.cookie('vote-comment-' + id, true, {expires: 7, path: '/' });
                    }
                }
            });
        });
    },

};

$(document).ready( COMMENTS.init() );
