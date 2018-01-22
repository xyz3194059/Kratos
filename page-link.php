<?php
/**
template name: 友情链接模板
*/
$page_side_bar = kratos_option('page_side_bar');
$page_side_bar = (empty($page_side_bar)) ? 'right_side' : $page_side_bar;
get_header(); ?>
<div id="kratos-blog-post" style="background:<?php if(kratos_option('background_mode')=='color') echo kratos_option('background_index_color');else echo 'url('.kratos_option('background_index_image').');background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:fixed'; ?>">
	<div class="container">
		<div class="row">
			<?php if($page_side_bar == 'left_side'){ ?>
				<aside id="kratos-widget-area" class="col-md-4 hidden-xs hidden-sm scrollspy">
	                <div id="sidebar">
	                    <?php dynamic_sidebar('sidebar_tool'); ?>
	                </div>
	            </aside>
			<?php } ?>
            <section id="main" class='<?php echo ($page_side_bar == 'single') ? 'col-md-12' : 'col-md-8'; ?>'>
			<?php while ( have_posts() ) : the_post(); ?>
				<article>
					<div class="kratos-hentry kratos-post-inner clearfix">
						<div class="kratos-post-content">
						<h2 style="text-align: center; font-size: 18pt;">dalao们</h2>
						<p style="text-align: center;"><span style="color: #999999;">dalao们的链接，每次刷新随机排序~</span></p>
						<div class="linkpage">
							<hr />
							<ul>
							<?php
							$bookmarks = get_bookmarks(array('orderby'=>'rand'));
							if ( !empty($bookmarks) ){
								foreach ($bookmarks as $bookmark) {
									$friendimg = $bookmark->link_image;
									if ( empty($friendimg)){
										echo '<li><a href="' . $bookmark->link_url . '" target="_blank" rel="nofollow"><img src="https://www.fczbl.vip/wp-content/plugins/wp-user-avatars/wp-user-avatars/assets/images/mystery.jpg"><h4>'. $bookmark->link_name .'</h4><p>' . $bookmark->link_description . '</p></a></li>';
									} else {
										echo '<li><a href="' . $bookmark->link_url . '" target="_blank" rel="nofollow"><img src="' . $bookmark->link_image . '"><h4>'. $bookmark->link_name .'</h4><p>' . $bookmark->link_description . '</p></a></li>';
									}
								}
							}
							?>
							</ul>
							<hr />
						</div><?php the_content(); ?>
						</div>
					</div>
						<?php comments_template(); ?>
				</article>
			<?php endwhile;?>
			</section>
			<?php if($page_side_bar == 'right_side'){ ?>
			<aside id="kratos-widget-area" class="col-md-4 hidden-xs hidden-sm scrollspy">
                <div id="sidebar">
                    <?php dynamic_sidebar('sidebar_tool'); ?>
                </div>
            </aside>
			<?php } ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>