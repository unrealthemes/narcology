jQuery( function($) {
	
	var canBeLoaded = true, // this param allows to initiate the AJAX call only if necessary
	    bottomOffset = 2000; // the distance (in px) from the page bottom when you want to load more posts

	$(window).scroll(function() {
		var ids = [];
		$('.post-card').each(function() {
			ids.push( $(this).data("id") );
		});
		var data = {
			'action' : 'infinite_scroll',
            'taxonomy' : infinite_scroll_params.taxonomy,
            'slug' : infinite_scroll_params.slug,
			'page' : $('input[name="infinite_scroll_page"]').val(),// infinite_scroll_params.current_page,
			'order' : $('input[name="order"]').val(),
			'post__not_in' : ids,
		};	
		var start = $('input[name="infinite_scroll_start"]').val(); 
        
		if ( start == 'on' && $(document).scrollTop() > ( $(document).height() - bottomOffset ) && canBeLoaded ) { 
            canBeLoaded = false;
			$.ajax({
				url : infinite_scroll_params.ajaxurl,
				data:data,
				type:'POST',
				beforeSend: function( xhr ) {
					$('.preloader').show();
				},
				success:function( response ) {
					
					if ( response.success ) {
						$('.post-grid__list').append( response.data.posts_html ); 
						canBeLoaded = true; // the ajax is completed, now we can run it again
						$('input[name="infinite_scroll_page"]').val(response.data.paged);

						if ( response.data.posts_html == '' ) {
							$('input[name="infinite_scroll_start"]').val('off');
						}
					}
					$('.preloader').hide();
				}
			});
		}
	});

});