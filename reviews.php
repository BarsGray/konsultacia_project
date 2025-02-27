<?php
/*
Template Name: Страница Отзывов
*/
get_header();

?>
<div class="theme_page relative">
	<div class="page_layout clearfix">
		<?php
		if (function_exists('yoast_breadcrumb')) {
			yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
		}
		?>
		<div class="page_header clearfix">
			<div class="page_header_left">
				<h1>
					<?php the_title(); ?>
				</h1>
			</div>
			<a class="btn btn_faq" href="#rev-form">Оставить отзыв</a>
		</div>
		<div class="clearfix horizontal page-reviews">
			<form method="post" id="revtypes">
				<div class="revtype_inputs">
					<div class="mobsel">
						Фильтр по отзывам
						<svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M6 9.5L12 15.5L18 9.5" stroke="#282328" stroke-width="2" stroke-linecap="round"
								stroke-linejoin="round" />
						</svg>
					</div>
					<div>
						<label for="revvrach">Врач</label>
						<select id="revvrach" name="revvrach">
							<option value="0" selected>Все</option>
							<?php $argsp = array(
								'orderby' => 'title',
								'order' => 'ASC',
								'posts_per_page' => -1,
								'post_type' => 'doctor',
								'post_status' => 'publish'
							);
							$query = new WP_Query($argsp);
							if ($query->have_posts())
								while ($query->have_posts()):
									$query->the_post(); ?>
									<option value="<?= get_the_ID() ?>"><?php the_title(); ?></option>
								<?php endwhile;
							wp_reset_postdata(); ?>
						</select>
					</div>
					<div>
						<label for="revtype">Вид отзыва</label>
						<select id="revtype" name="revtype">
							<option value="0" selected>Все</option>
							<option value="1">Видео-отзыв</option>
							<option value="2">Со стороннего сайта</option>
							<option value="3">Из социальных сетей</option>
							<option value="4">С сайта</option>
						</select>
					</div>
					<div>
						<label for="revspec">Процедура</label>
						<select id="revspec" name="revspec">
							<option value="0" selected>Все</option>
							<?php $argsp = [
								'taxonomy' => ['spec'],
								'hide_empty' => false
							];
							$terms = get_terms($argsp);
							foreach ($terms as $trm) { ?>
								<option value="<?= $trm->term_id ?>"><?= $trm->name ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="revtype_sels">
					<div class="revrach_sel">
						<span></span>
						<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M12 4L4 12" stroke="#0A0A0A" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" />
							<path d="M4 4L12 12" stroke="#0A0A0A" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
					</div>
					<div class="revtype_sel">
						<span></span>
						<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M12 4L4 12" stroke="#0A0A0A" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" />
							<path d="M4 4L12 12" stroke="#0A0A0A" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
					</div>
					<div class="revspec_sel">
						<span></span>
						<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M12 4L4 12" stroke="#0A0A0A" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" />
							<path d="M4 4L12 12" stroke="#0A0A0A" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
					</div>
				</div>
			</form>









			<div class="rev-list">
				<?php $argsp = array(
					'orderby' => 'date',
					'order' => 'DESC',
					'posts_per_page' => 200,
					'post_type' => 'review',
					'post_status' => 'publish'
				);
				$query = new WP_Query($argsp);
				if ($query->have_posts())
					while ($query->have_posts()):
						$query->the_post(); ?>
						<div class="rev_item">
							<div class="rev_head">
								<div class="rev_img">
									<?php if (!empty(get_the_post_thumbnail_url())) { ?>
										<img src="<?= get_the_post_thumbnail_url() ?>" alt="Отзыв">
									<?php } ?>
								</div>
								<div class="rev_about">
									<div class="rev_stars">
										<img src="/wp-content/uploads/2023/04/stars.png" alt="Звезды">
									</div>


									<?php $prm = get_fields(get_the_ID());
									$doc = get_fields($prm['doc']);
									$slink = get_field('spec_link', 'spec_' . $prm["proc"]); ?>
									<p class="rev_name">
										<?php the_title(); ?>
									</p>
									<p class="rev_doc">Врач:
										<?php if (!empty($doc['doctor_link'])) { ?>
											<a href="<?= $doc['doctor_link'] ?>" target="_blank"><?= get_the_title($prm['doc']) ?></a>
										<?php } else { ?>
											<span>
												<?= get_the_title($prm['doc']) ?>
											</span>
										<?php } ?>
									</p>
									<?php $ntxt = get_term_by('id', $prm['proc'], 'spec'); ?>
									<?php if (!empty($slink)) { ?>
										<p class="rev_spec">Процедура: <a href="<?= $slink ?>" target="_blank"><?= $ntxt->name ?></a></p>
									<?php } else { ?>
										<p class="rev_spec">Процедура: <span><?= $ntxt->name ?></span></p>
									<?php } ?>
									<p class="rev_type <?= $prm['revtype']['value'] ?>"><?= $prm['revtype']['label'] ?></p>
								</div>
								<p class="rev_date">
									<?= get_the_date() ?>
								</p>
							</div>


							
							<div class="rev_txt">
								<div>
									<?php $cont = get_the_content();
									$len = mb_strlen($cont);
									if ($len > 200) {
										$cont1 = mb_strimwidth($cont, 0, 200, '') . '<span class="rdots">...</span>';
										//echo strlen($cont); 
										$cont2 = mb_strimwidth($cont, 200, $len, '');
										$cont = $cont1 . '<span class="hidden">' . $cont2 . '</span>';
									} ?>
									<?= $cont ?>
								</div>
								<?php if ($len > 200) { ?>
									<button class="revitem_all">
										<span>Читать весь отзыв</span>
										<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M4.5 6.75L9 11.25L13.5 6.75" stroke="#458F8F" stroke-width="2" stroke-linecap="round"
												stroke-linejoin="round" />
										</svg>
									</button>
								<?php } ?>
							</div>




						</div>
					<?php endwhile;
				wp_reset_postdata(); ?>
			</div>










			<div id="rev-form">
				<h2>Оставить отзыв</h2>
				<?= do_shortcode('[contact-form-7 id="8099"]') ?>
			</div>


			<?php if (have_posts()):
				while (have_posts()):
					the_post();
					the_content();
				endwhile;
			endif; ?>
		</div>
	</div>
</div>
<?php
get_footer();
?>