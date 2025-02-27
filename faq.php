<?php 
/*
Template Name: Страница Вопрос-ответ
*/
get_header(); 

?>
<div class="theme_page relative">
	<div class="page_layout clearfix">
<?php
if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
}
?>
		<div class="page_header clearfix">
			<div class="page_header_left">
				<h1><?php the_title(); ?></h1>
			</div>
			<a class="btn btn_faq" href="#faq-form">Задать вопрос</a>
		</div>
		<div class="clearfix horizontal page-faq">
			<div class="faq_wrap">
				<div class="faq_cats">
					<ul>
						<li data-cat="0" class="active">Все вопросы</li>
						<?php $args = [
							'taxonomy'      => ['spec'],
							'hide_empty'    => false
						];
						$terms = get_terms($args);
						$cterms = [];
						make_hierarchical_terms( $terms, $cterms );
						foreach ($cterms as $trm){?>
						<li data-cat="<?=$trm->term_id?>">
							<?=$trm->name?>
							<?php if (count($trm->children)>0){ ?>
							<ul>
								<?php foreach ($trm->children as $tm){ ?>
								<li data-cat="<?=$tm->term_id?>"><?=$tm->name?></li>
								<?php } ?>
							</ul>
							<?php } ?>
						</li>	
						<?php } ?>
					</ul>
				</div>
				<div class="faq_list">
					<?php
					$arg_posts = array(
						'orderby'        => 'date',
						'order'          => 'DESC',
						'posts_per_page' => 9,
						'post_type'      => 'faq',
						'post_status'    => 'publish'
					); 
					$query = new WP_Query($arg_posts);
					if ($query->have_posts() ) 
					while ( $query->have_posts() ) : $query->the_post(); $prm=get_fields(get_the_ID()); $doc = get_fields($prm['doc'])?>
					<div class="faq_item">
						<div class="fq_head">
							<div class="fq_about">
								<p class="fq_title"><?php the_title(); ?></p>
								<p class="fq_name"><?=$prm['qname']?></p>
							</div>
							<p class="fq_date"><?=get_the_date('d.m.Y')?></p>
						</div>
						<div class="fq_quest"><?=$prm['qquest']?></div>
						<div class="fq_body">
							<p>Ответ:</p>
							<div class="fqbody_l">
								<img src="<?=get_the_post_thumbnail_url($prm['doc'],'thumbnail');?>" alt="<?php the_title($prm['doc']); ?>">
							</div>
							<div class="fqbody_r">
								<div class="fqbody_txt"><?=$prm['qansw']?></div>
								<div class="fqbody_down">
									<div class="fq_doctor">
										<p class="fqdoctor_name">
											<?php if (!empty($doc['doctor_link'])){ ?>
											<a href="<?=$doc['doctor_link']?>" target="_blank"><strong><?=get_the_title($prm['doc'])?></strong></a>
											<?php }else{ ?>
											<strong><?=get_the_title($prm['doc'])?></strong>
											<?php } ?>
										</p>
										<p class="fqdoctor_spec"><?=$doc['doctor_spec']?></p>
										<p class="fqdoctor_staj">Стаж работы: <?=$doc['doctor_staj']?></p>
									</div>
									<p class="fq_date"><?=get_the_date('d.m.Y')?></p>
								</div>
							</div>
						</div>
						<div class="fq_spec">
							Направление:
							<?php $ntxt = get_term_by('id',$prm["qnapr"],'spec'); 
							$slink= get_field('spec_link', 'spec_' . $prm["qnapr"]);?>
							<?php if (!empty($slink)){ ?>
							<a href="<?=$slink?>" target="_blank"><?=$ntxt->name?></a>
							<?php }else{ ?>
							<span><?=$ntxt->name?></span>
							<?php } ?>
						</div>
					</div>
					<?php endwhile; wp_reset_postdata(); ?>
				</div>
				<?php if ($query->max_num_pages > 1){ ?>
					<div class="pagn">
						<?php for ($i = 1; $i <= $query->max_num_pages; $i++) {
							if ($i==1){$cls='active';}else{$cls="";}
							if ($i==1 || $i==2 || $i==$query->max_num_pages){
								echo '<button class="'.$cls.'">'.$i.'</button>';
							}else if ($i==3){
								echo '<span>...</span>';
							}
						} ?>
					</div>
				<?php } ?>
			</div>
			
			<section id="faq-form">
				<div class="faqform_txt">
					<h2>Задать вопрос специалисту</h2>
					<p>Мы ответим на него с ближайшее время</p>
					<p class="faqform_txt">Ответы специалистов носят информационно-консультационный характер, даются исключительно в справочных целях, не являются постановкой диагноза и не могут служить основанием для назначения лечения. При наличии заболевания необходима непосредственная консультация врача.</p>
				</div>
				<div class="faqform">
					<?=do_shortcode('[contact-form-7 id="7942"]');?>
				</div>
			</section>
			
			<?php if(have_posts()) : while (have_posts()) : the_post();
				the_content();
			endwhile; endif; ?>
		</div>
	</div>
</div>
<?php
get_footer(); 
?>



















<?php if (have_rows('kosmetolog')): ?>

<?php echo '<div class="kos_nav kosmetolog_page-container">'; ?>
<?php while (have_rows('kosmetolog')):
	the_row(); ?>

	<?php if (get_row_layout() == 'kos_prices'): ?>
		<?php
		$kos_prices_id = get_sub_field('kos_prices_id');
		$kos_prices_id_text = get_sub_field('kos_prices_id_text');
		if ($kos_prices_id_text) {
			echo "<a class=\"kos_nav_button\" href=\"#$kos_prices_id\">$kos_prices_id_text</a>";
		}
		?>
	<?php elseif (get_row_layout() == 'kos_clinic_services'): ?>
		<?php
		$kos_clinic_services_id = get_sub_field('kos_clinic_services_id');
		$kos_clinic_services_id_text = get_sub_field('kos_clinic_services_id_text');
		if ($kos_clinic_services_id_text) {
			echo "<a class=\"kos_nav_button\" href=\"#$kos_clinic_services_id\">$kos_clinic_services_id_text</a>";
		}
		?>
	<?php elseif (get_row_layout() == 'kos_specialists'): ?>
		<?php
		$kos_specialists_id = get_sub_field('kos_specialists_id');
		$kos_specialists_id_text = get_sub_field('kos_specialists_id_text');
		if ($kos_specialists_id_text) {
			echo "<a class=\"kos_nav_button\" href=\"#$kos_specialists_id\">$kos_specialists_id_text</a>";
		}
		?>

	<?php endif; ?>
<?php endwhile; ?>
<?php echo '</div>'; ?>
<?php endif; ?>




					<?php elseif (get_row_layout() == 'kos_question_answer'): ?>
					<?php echo '<div class="kos_question_answer"><div class="kosmetolog_page-container kos_question_answer-container"><div class="kos_question_answer_box">' ?>
					<?php $kos_question_answer_title = get_sub_field('kos_question_answer_title'); ?>
					<?php $kos_question_answer_top_link = get_sub_field('kos_question_answer_top_link'); ?>
					<?php $kos_question_answer_bottom_link = get_sub_field('kos_question_answer_bottom_link'); ?>
					<?php
					echo <<<QUESTIONS_ANSWER
							<div class="kos_question_answer_content">
								<h2 class="question">$kos_question_answer_title</h2>
								<div class="kos_question_answer-btn_box">
									<a class="btn btn_faq kos_question_answer_btn" href="$kos_question_answer_top_link">Задать вопрос</a>
									<a class="btn btn_faq kos_question_answer_btn" href="$kos_question_answer_bottom_link">Посмотреть все вопросы и ответы</a>
								</div>
							</div>
							<div class="kos_question_answer_question">
							</div>
					QUESTIONS_ANSWER;
					?>



<?php
					$arg_posts = array(
						'orderby' => 'date',
						'order' => 'DESC',
						'posts_per_page' => 1,
						'post_type' => 'faq',
						'post_status' => 'publish',
						//'tag_id' => 8335
					);
					$query = new WP_Query($arg_posts);
					if ($query->have_posts())
						while ($query->have_posts()):
							$query->the_post();
							$prm = get_fields(get_the_ID());
							$doc = get_fields($prm['doc']) ?>

							<?php echo '<div class="kos_question_answer_item">
									<div class="kos_question_answer_head">
										<div class="kos_question_answer_about">
											<p class="kos_question_answer_title">' ?>
							<?php the_title(); ?>
							<?php echo "</p>
											<p class=\"kos_question_answer_name\">{$prm['qname']}</p>
										</div>
										<p class=\"kos_question_answer_date\">" ?>
							<?= get_the_date('d.m.Y') ?>
							<?php echo "</p>
									</div>
									<div class=\"kos_question_answer_quest\">{$prm['qquest']}</div>
									<div class=\"kos_question_answer_body\">
										<p>Ответ:</p>
										<div class=\"kos_question_answer_body_l\">
											<img src=\" " ?>
							<?= get_the_post_thumbnail_url($prm['doc'], 'thumbnail'); ?>
							<?php echo '" alt="' ?>
							<?php the_title($prm['doc']); ?>
							<?php echo "\">
										</div>
										<div class=\"kos_question_answer_body_r\">
											<div class=\"kos_question_answer_body_txt\">{$prm['qansw']}</div>
											<div class=\"kos_question_answer_body_down\">
												<div class=\"kos_question_answer_doctor\">
													<p class=\"kos_question_answer_doctor_name\">" ?>

							<?php if (!empty($doc['doctor_link'])) { ?>
								<?php echo "<a href=\"{$doc['doctor_link']}\" target=\"_blank\"><strong>" ?>
								<?= get_the_title($prm['doc']) ?>
								<?php echo '</strong></a>?' ?>
							<?php } else { ?>
								<?php '<strong>' ?>
								<?= get_the_title($prm['doc']) ?>
								<?php echo '</strong>' ?>
							<?php } ?>

							<?php echo "</p>
													<p class=\"kos_question_answer_doctor_spec\">{$doc['doctor_spec']}</p>
													<p class=\"kos_question_answer_doctor_staj\">Стаж работы:{$doc['doctor_staj']}</p>
												</div>
												<p class=\"kos_question_answer_date\">" ?>

							<?= get_the_date('d.m.Y') ?>

							<?php echo '</p>
											</div>
										</div>
									</div>
									<div class="kos_question_answer_spec">
										Направление:' ?>
							<?php $ntxt = get_term_by('id', $prm["qnapr"], 'spec');
							$slink = get_field('spec_link', 'spec_' . $prm["qnapr"]); ?>
							<?php if (!empty($slink)) { ?>
								<?php echo "<a href=\"$slink\" target=\"_blank\">{$ntxt->name}</a>" ?>
							<?php } else { ?>
								<?php echo "<span>{$ntxt->name}</span>" ?>
							<?php } ?>
							<?php echo '</div>
								</div>' ?>
						<?php endwhile;
					wp_reset_postdata(); ?>
					<?php echo '</div>' ?>


					<?php echo '</div></div></div>' ?>