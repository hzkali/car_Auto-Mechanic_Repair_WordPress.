<?php bunch_global_variable(); //carshire_printr($wp_query); 

	$options = _WSH()->option();
	
	get_header(); 

	$settings  = _WSH()->option();

	if(carshire_set($_GET, 'layout_style')) $layout = carshire_set($_GET, 'layout_style'); else

	$layout = carshire_set( $settings, 'archive_page_layout', 'right' );

	if( !$layout || $layout == 'full' || carshire_set($_GET, 'layout_style')=='full' ) $sidebar = ''; else

	$sidebar = carshire_set( $settings, 'archive_page_sidebar', 'blog-sidebar' );

	_WSH()->page_settings = array('layout'=>$layout, 'sidebar'=>$sidebar);

	$classes = ( !$layout || $layout == 'full' || carshire_set($_GET, 'layout_style')=='full' ) ? ' col-lg-12 col-md-12 col-sm-12 col-xs-12 ' : ' col-lg-9 col-md-8 col-sm-7 col-xs-12 ' ;

	if($layout == 'both') $classes = ' col-lg-6 col-md-6 col-sm-6 col-xs-12 ';  

	$bg = carshire_set($settings, 'archive_page_header_img');

	$title = carshire_set($settings, 'archive_page_header_title');

?>

<!-- Page Banner -->

<section class="page-banner" <?php if($bg):?>style="background-image:url('<?php echo esc_attr($bg)?>');"<?php endif;?>>

	 <div class="auto-container">

		<div class="page-title"><h1><?php if($title) echo wp_kses_post($title); else wp_title('');?></h1></div>

		<div class="bread-crumb text-right">

			<span class="initial-text"><?php esc_html_e('you are here: ', 'carshire');?></span>

			<?php echo wp_kses_post(carshire_get_the_breadcrumb()); ?>

		</div>

	</div>

</section>

<!-- Sidebar Page -->

<div class="sidebar-page">

	<div class="auto-container">

		<div class="row clearfix">

		<!-- sidebar area -->

			<?php if( $layout == 'left' ): ?>

			<?php if ( is_active_sidebar( $sidebar ) ) { ?>

			<aside class="side-bar col-lg-3 col-md-4 col-sm-5 col-xs-12">        

				<div class="sidebar">

					<?php dynamic_sidebar( $sidebar ); ?>

				</div>

			</aside>

			<?php } ?>

			<?php endif; ?>

			<!-- sidebar area -->

			<?php if( $layout == 'both' ): ?>

			<?php if ( is_active_sidebar( $sidebar ) ) { ?>

			<aside class="side-bar col-lg-3 col-md-3 col-sm-5 col-xs-12">        

				<div class="sidebar">

					<?php dynamic_sidebar( $sidebar ); ?>

				</div>

			</aside>

			<?php } ?>

			<?php endif; ?>

			<!-- Side Bar -->

			<!-- Left Content -->

			<section class="left-content <?php echo esc_attr($classes);?>">
		
				<?php while( have_posts() ): the_post();?>

						<!-- blog post item -->

						<!-- Post -->

						<div id="post-<?php the_ID(); ?>" <?php post_class();?>>

							<?php get_template_part( 'blog' ); ?>

						<!-- blog post item -->

						</div><!-- End Post -->

				<?php endwhile;?> 

				<!-- Pagination -->

				<?php carshire_the_pagination(); ?>

			</section>

			<!-- sidebar area -->

			<?php if( $layout == 'both' ): ?>

			<?php if ( is_active_sidebar( $sidebar ) ) { ?>

			<aside class="side-bar col-lg-3 col-md-3 col-sm-5 col-xs-12">        

				<div class="sidebar">

					<?php dynamic_sidebar( $sidebar ); ?>

				</div>

			</aside>

			<?php } ?>

			<?php endif; ?>

			<!-- sidebar area -->

			<?php if( $layout == 'right' ): ?>

			<?php if ( is_active_sidebar( $sidebar ) ) { ?>

			<aside class="side-bar col-lg-3 col-md-4 col-sm-5 col-xs-12">       

				<div class="sidebar">

					<?php dynamic_sidebar( $sidebar ); ?>

				</div>

			</aside>

			<?php }?>

			<?php endif; ?>

			<!-- sidebar area -->

		</div>

	</div>

</div>

<?php get_footer(); ?>