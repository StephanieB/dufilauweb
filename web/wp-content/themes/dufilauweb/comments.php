<?php if (post_password_required()): ?>
    <?php return; ?>
<?php endif; ?>

<div id="comments" class="comments-area">
    <h2><?php _e('Laisser un commentaire', 'dufilauweb'); ?></h2>

    <?php
    $fields =  [
        'author' =>
            '<p class="comment-form-author col span_6_of_12">'.
            '<label for="author">' . __( 'Nom', 'dufilauweb' ) .( $req ? '<span class="required"> * </span>' : '' ) . '</label> ' .
            '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
            '" size="30"' . $aria_req . ' /></p>',

        'email' =>
            '<p class="comment-form-email col span_6_of_12">'.
            '<label for="email">' . __( 'E-mail', 'dufilauweb' ) .( $req ? '<span class="required"> * </span>' : '' ) . '</label> ' .
            '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
            '" size="30"' . $aria_req . ' /></p>'
    ];
    ?>

    <div class="form-comment">
        <?php comment_form([
            'fields' => apply_filters( 'comment_form_default_fields', $fields),
            'comment_field' => '<p class="comment-form-comment section group">'.
                '<label for="comment">' . __( 'Commentaire', 'dufilauweb' ) .( $req ? '<span class="required"> * </span>' : '' ). '</label>'.
                '<textarea id="comment" name="comment" aria-required="true"></textarea>'.
                '</p>',
            'comment_notes_before' => '',
            'title_reply' => '',
            'label_submit' => __('Valider', 'dufilauweb')
        ]); ?>
    </div>

    <div class="comments-list">
        <ul>
            <?php
                wp_list_comments([
                    'style' => 'ul',
                    'avatar_size' => 0,
                    'echo' => 1,
                    'type' => 'comment',
                    'callback' => 'dufilauweb_comment'
                ]);
            ?>
        </ul>
    </div>
</div>