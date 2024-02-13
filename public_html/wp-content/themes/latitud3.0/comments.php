<?php

    if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
        die ('!Por favor no entre a esta pagina directamente¡ Gracias ;)');

    if ( post_password_required() ) { ?>
        Este post esta protejido por contraseña. Por favor inicie sesion para ver los comentarios
    <?php
        return;
    }
?>

<?php if ( have_comments() ) : ?>
<?php $num_coments = get_comments_number(); ?>

    <h2 id="comments"><?php comments_number('No hay comentarios', 'Un comentario', '% Comentarios' );?></h2>

    <div class="navigation">
        <div class="next-posts"><?php previous_comments_link() ?></div>
        <div class="prev-posts"><?php next_comments_link() ?></div>
    </div>

    <ol class="commentlist">
        <?php wp_list_comments(); ?>
    </ol>

    <div class="navigation">
        <div class="next-posts"><?php previous_comments_link() ?></div>
        <div class="prev-posts"><?php next_comments_link() ?></div>
    </div>

 <?php else : // this is displayed if there are no comments so far ?>

    <?php if ( comments_open() ) : ?>
        <!-- If comments are open, but there are no comments. -->

     <?php else : // comments are closed ?>
        <p>Se cerraron los comentarios para este post.</p>

    <?php endif; ?>
    <?php wp_reset_query();?>
<?php endif; ?>
<?php wp_reset_query();?>
<?php if ( comments_open() ) : ?>

<div class="text-center" id="respond">

    <h3><?php comment_form_title( 'Danos tu opinión', 'Da una opinión a %s' ); ?></h3>

    <div class="cancel-comment-reply">
        <?php cancel_comment_reply_link(); ?>
    </div>

    <?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
        <p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
    <?php else : ?>

    <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

        <?php if ( is_user_logged_in() ) : ?>

            <p>Logueado como <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Desloguearse »</a></p>

        <?php else : ?>

            <div>
                <input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> placeholder="*Nombre"/>
            </div>

            <div>
                <input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> placeholder="*Correo electronico"/>
            </div>

            <div>
                <input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" placeholder="Pagina web"/>
            </div>

        <?php endif; ?>
        <?php wp_reset_query();?>
        <!--<p>You can use these tags: <code><?php echo allowed_tags(); ?></code></p>-->

        <div id="box-comment">
            <textarea name="comment" id="comment" placeholder="*Danos tu opinion..."></textarea>
        </div>
         <p>Campos marcados con *son obligatorios, su correo no sera publicado.</p>
        <div id="btn-enviar">
            <input class="btn btn-primary" name="submit" type="submit" id="submit" tabindex="5" value="Enviar opinión" />
            <?php comment_id_fields(); ?>
        </div>

        <?php do_action('comment_form', $post->ID); ?>

    </form>

    <?php endif; // If registration required and not logged in ?>
    <?php wp_reset_query();?>
</div>

<?php endif; ?>
<?php wp_reset_query();?>
