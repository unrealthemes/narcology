<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package unreal-themes
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="coment" class="white">
	<div class="container_di_780">
		<h3>Комментарии</h3>

		<?php
		$defaults = [
			'fields' => [
				'author' => '<p class="comment-form-author">
								<label for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label>
								<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" required="required" />
							</p>',
				'email' => '<p class="comment-form-email">
								<label for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label>
								<input id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes" required="required" />
							</p>',
				'url' => '',
				'cookies' => '',
			],
			'comment_field' => '<textarea id="comment" name="comment" placeholder="Оставить комментарий" name="comment" cols="10" rows="2" maxlength="65525" required="required" spellcheck="false"></textarea>',
			'must_log_in' => '<p class="must-log-in">' .
				 sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '
			 </p>',
			'logged_in_as' => '',
			'comment_notes_before' => '<p class="comment-notes">
											<span id="email-notes">' . __( 'Your email address will not be published.' ) . '</span>'.
											( $req ? $required_text : '' ) . '
										</p>',
			'comment_notes_after'  => '',
			'id_form'              => 'commentform',
			'id_submit'            => 'submit',
			'class_container'      => 'comment-respond',
			'class_form'           => 'comment-form',
			'class_submit'         => 'submit',
			'name_submit'          => 'submit',
			'title_reply'          => '',
			'title_reply_to'       => '',
			'title_reply_before'   => '',
			'title_reply_after'    => '',
			'cancel_reply_before'  => ' <small>',
			'cancel_reply_after'   => '</small>',
			'cancel_reply_link'    => __( 'Cancel reply' ),
			'label_submit'         => 'Оставить комментарий',
			'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
			'submit_field'         => '<div class="div_send">%1$s %2$s</div>',
			'format'               => 'xhtml',
		];
		
		comment_form( $defaults ); 

		// You can start editing here -- including this comment!
		if ( have_comments() ) :
			?>

			<?php the_comments_navigation(); ?>

			<ol class="comment-list">
				<?php
				wp_list_comments( array(
					'style'      => 'div',
					'short_ping' => true,
					'callback'	  => 'ut_comment',
				) );
				?>
			</ol>

			<?php
			the_comments_navigation();

			// If comments are closed and there are comments, let's leave a little note, shall we?
			if ( ! comments_open() ) :
			?>
				<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'unreal-themes' ); ?></p>
			<?php
			endif;

		endif;
		?>

	</div>
</div>
