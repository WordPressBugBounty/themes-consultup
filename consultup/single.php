<!-- =========================
     Page Breadcrumb   
============================== -->
<?php get_header();
$background_image = get_theme_support( 'custom-header', 'default-image' );

if ( has_header_image() ) {
  $background_image = get_header_image();
}
?>

<div class="consultup-breadcrumb-section" style='background: url("<?php echo esc_url( $background_image ); ?>" ) repeat scroll center 0 #143745;'>
<div class="overlay">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12">
			    <div class="consultup-breadcrumb-title">
          <?php $post_category = get_theme_mod('post_category_enable',false);
            $post_title = get_theme_mod('post_title_enable',false);
            $post_meta = get_theme_mod('post_meta_enable',false);
            if($post_title !== true) { ?>
            <h1><?php the_title(); ?></h1>
            <?php } if(($post_category !== true) || ($post_meta !== true)){ ?>
			       <div class="consultup-blog-category">
              <?php 
              if($post_category !== true) { ?>
              <i class="fas fa-folder-open"></i><?php
              $cat_list = get_the_category_list();
                if(!empty($cat_list)) { 
                  the_category(', ');
                } } if($post_meta !== true) { ?>
              <span class="consultup-blog-date"><i class="fas fa-clock"></i><?php echo esc_html(get_the_date('M')); ?> <?php echo esc_html(get_the_date('j,')); ?> <?php echo esc_html(get_the_date('Y')); ?></span> 
            
              <?php $tags = get_the_tags();
              if($tags){  ?>
                <span class="consultup-tags"><i class="fa fa-tag"></i>
                <?php
                  $keys = array_keys($tags);
                    foreach ($tags as $key => $tag) {
                      $tag_link = get_tag_link($tag->term_id);
                      if ($key === end($keys)) {
                        echo '<a href="'.esc_url($tag_link).'">#'.esc_html($tag->name).'</a>';
                      } else {
                        echo ' <a href="'.esc_url($tag_link).'">#'.esc_html($tag->name).'</a>, ';
                      }
                    } ?>
                </span>
              <?php } } ?>
             </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="clearfix"></div>
<!-- =========================
     Page Content Section      
============================== -->
<main id="content" class="single-page">
  <div class="container">
    <div class="row"> 
      <?php $consultup_single_page_layout = get_theme_mod('consultup_single_page_layout','align-content-right');
      if($consultup_single_page_layout == 'align-content-left'){ ?>
        <div class="col-md-3">
          <?php get_sidebar(); ?>
        </div>
      <?php } 
      if(($consultup_single_page_layout == 'align-content-left') || ($consultup_single_page_layout == 'align-content-right')){ ?>
        <div class="col-md-9">
      <?php } else { ?>
        <div class="col-md-12">
      <?php } ?>
      <div class="consultup-single-post-box">
		      <?php if(have_posts())
		        {
		      while(have_posts()) { the_post(); ?>
            <div class="consultup-blog-post-box"> 
              <?php 
              if(has_post_thumbnail()){
              echo '<a class="consultup-blog-thumb">';
              the_post_thumbnail( '', array( 'class'=>'img-responsive' ) );
              echo '</a>';
               } ?>
              <article class="small">
              <?php the_content(); ?>
                <?php wp_link_pages(array(
                'before' => '<div class="single-nav-links">',
                'after' => '</div>',
                ));
                ?>
              </article>
            </div>
		      <?php } ?>
		      <div class="text-center">
            <?php the_posts_navigation(); ?>
          </div>
            <div class="media consultup-info-author-block"> <a class="consultup-author-pic" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><?php echo get_avatar( get_the_author_meta( 'ID' ), 160 ); ?></a>
			        <div class="media-body">
                <h4 class="media-heading"><i class="fa fa-user"></i> <?php esc_html_e('By','consultup'); ?> <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><?php the_author(); ?></a></h4>
                <p><?php the_author_meta( 'description' ); ?></p>
              </div>
            </div>
		      <?php } ?>
         <?php comments_template('',true); ?>
      </div>
      </div>
      <?php if($consultup_single_page_layout == 'align-content-right'){ ?>
        <div class="col-md-3">
          <?php get_sidebar(); ?>
        </div>
      <?php } ?>
    </div>
  </div>
</main>
<?php get_footer(); ?>