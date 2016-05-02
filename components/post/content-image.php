<?php
/**
 * Template part for displaying image posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Daily_Photo
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="image-wrapper">
    	<div class="post-thumbnail">
    		<a href="<?php the_permalink(); ?>">
    			<?php 
    				if ( '' != get_the_post_thumbnail() ) {
    					the_post_thumbnail( 'full' );
    				} else {
    					preg_match_all('/(<img [^>]*>)/', get_the_content(), $images);
    					echo $images[1][0];
                        // for($i=0; isset($images[1]) && $i < count($images[1]); $i++) {
                        //     echo $images[1][$i];
                        // }
    				}
    			?>
    			
    		</a>
    	</div>
    </div>
    <div class="content-wrapper">
        <header class="entry-header">
    		<?php
    			if ( is_single() ) {
    				the_title( '<h1 class="entry-title">', '</h1>' );
    			} else {
    				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
    			}
    
    		if ( 'post' === get_post_type() ) : ?>
    		<?php get_template_part( 'components/post/content', 'meta' ); ?>
    		<?php
    		endif; ?>
    	</header>
    	<div class="entry-content">
    	<?php 
    // 	var_dump(get_post_format( the_ID() )); 
    // TODO: if get_post_format(id) == "image".. etc..
    	?>
    		<?php
		    $content = preg_replace('/(<img [^>]*>)/', '', get_the_content());
            $content = apply_filters('the_content', $content);
            echo $content; 
    		?>
    	</div>
    	
    </div>
	<?php get_template_part( 'components/post/content', 'footer' ); ?>

	
</article><!-- #post-## -->