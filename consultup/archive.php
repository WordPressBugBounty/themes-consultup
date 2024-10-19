<?php
/**
 * The template for displaying archive pages.
 *
 * @package consultup
 */
get_header(); ?>
<!-- Breadcrumb -->
<div class="consultup-breadcrumb-section" style='background: url("<?php echo esc_url(( has_header_image() ? esc_url(get_header_image()) : get_theme_support( 'custom-header', 'default-image' ) )); ?>") repeat fixed center 0 #143745;'>
  <div class="overlay">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="consultup-breadcrumb-title">
            <?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /End Breadcrumb -->
<main id="content" class="archive-page">
  <div class="container">
    <div class="row">
      <?php $consultup_content_layout = get_theme_mod('consultup_content_layout','align-content-right');
      if($consultup_content_layout == 'align-content-left'){ ?>
        <aside class="col-md-3">
          <?php get_sidebar(); ?>
        </aside>
      <?php } 
      if(($consultup_content_layout == 'align-content-left') || ($consultup_content_layout == 'align-content-right')){ ?>
        <div class="col-md-9">
      <?php } else { ?>
        <div class="col-md-12">
      <?php }
    		  while(have_posts()){ the_post();
              get_template_part('content','');
    		  } ?>
          <div class="col-md-12 text-center">
      			<?php //Previous / next page navigation
      			the_posts_pagination( array(
      			'prev_text'          => '<i class="fa fa-arrow-left"></i>',
      			'next_text'          => '<i class="fa fa-arrow-right"></i>',
      			) ); ?>
          </div>
      </div>
      <?php if($consultup_content_layout == 'align-content-right'){ ?>
        <aside class="col-md-3">
          <?php get_sidebar(); ?>
        </aside>
      <?php } ?>
    </div>
  </div>
</main>
<?php get_footer(); ?>