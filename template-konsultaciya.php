<?php
/*
Template Name: Косметолог
*/
get_header();
?>
<div class="theme_page relative kosmetolog_page">
	<div class="page_layout clearfix">
		<div class="kosmetolog_page-container">
			<?php
			if (function_exists('yoast_breadcrumb')) {
				yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
			}
			?>
		</div>

		<?php if (have_rows('kosmetolog')): ?>

			<?php while (have_rows('kosmetolog')):
				the_row(); ?>

				<!-- ++++++++++++++++++++++++++++++++++++ Bunner - blok ++++++++++++++++++++++++++++++++++++++++++++++++ -->

				<?php if (get_row_layout() == 'kos_bunner'): ?>

					<?php
					$bunner_title = get_sub_field('kos_bunner_title');
					$bunner_text = get_sub_field('kos_bunner_text');
					$kos_discount = get_sub_field('kos_discount');
					$kos_cost_from = get_sub_field('kos_cost_from');
					$kos_cost_upto = get_sub_field('kos_cost_upto');
					$kos_signup_button = get_sub_field('kos_signup_button');
					$kos_bunner_img = get_sub_field('kos_bunner_img');
					?>

					<?php echo <<<BUNNER
							<div class="kos_bunner_holder">
							<div class="kos_bunner">
							<div class="kosmetolog_page-container">
							<div class="kos_bunner_bg_r">
								<div class="kos_bunner_bg_r_foto" style="background: url('$kos_bunner_img') center / cover no-repeat;">
								</div>
								<div class="kos_bunner_bg_r_nadfoto"></div>
							</div>
							<div class="kos_bunner_content_box">
										<h1 class="kos_bunner_title">
											$bunner_title
										</h1>
										<div class="kos_bunner_text">$bunner_text</div>
										<p class="kos_discount">$kos_discount</p>
										<div class="kos_cost_box">
											<p class="kos_cost_from">$kos_cost_from</p>
											<p class="kos_cost_upto">$kos_cost_upto</p>
										</div>
										<div class="subm main_subm popmake-5068 pum-trigger" style="cursor: pointer;">$kos_signup_button</div>
									</div>
								</div>
							</div>
							</div>
							BUNNER;
					?>

					<!-- ++++++++++++++++++++++++++++++++++ Advantages - blok ++++++++++++++++++++++++++++++++++++++++++++++ -->

				<?php elseif (get_row_layout() == 'kos_advantages'): ?>
					<?php if (have_rows('kos_advantages_repit')): ?>

						<?php echo '<div class="kos_advantages"><div class="kosmetolog_page-container kos_advantages-container"><div class="kos_advantages_box">' ?>
						<?php $blok_count = 0; ?>

						<?php while (have_rows('kos_advantages_repit')):
							the_row(); ?>

							<?php
							$advantages_title = get_sub_field('kos_advantages_title');
							$advantages_text = get_sub_field('kos_advantages_text');
							$GLOBALS['blok_count']++;
							?>

							<?php echo <<<ADVANTAGES
									<div class="kos_advantages_item">
										<div class="kos_advantages_num">0{$GLOBALS['blok_count']}</div>
										<div class="kos_advantages_content_box">
											<h3 class="kos_advantages_title">$advantages_title</h3>
											<div class="kos_advantages_text">$advantages_text</div>
										</div>
									</div>
								ADVANTAGES;
							?>

						<?php endwhile; ?>
						<?php echo '</div></div></div>' ?>
					<?php endif; ?>

				<?php endif; ?>
			<?php endwhile;
		else:
			?>
		<?php endif; ?>

		<!-- +++++++++++++++++++++++++++++++++++++ Nav - blok ++++++++++++++++++++++++++++++++++++++++++++++++++ -->

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

		<!-- ++++++++++++++++++++++++++++++++++++ Profit - blok ++++++++++++++++++++++++++++++++++++++++++++++++ -->

		<?php if (have_rows('kosmetolog')): ?>

			<?php while (have_rows('kosmetolog')):
				the_row(); ?>

				<?php if (get_row_layout() == 'kos_profitable'): ?>
					<?php //elseif (get_row_layout() == 'kos_profitable'): ?>

					<?php echo '<div class="kos_profitable"><div class="kosmetolog_page-container kos_profitable-container"><div class="kos_profitable_box">'; ?>

					<?php
					$profitable_title = get_sub_field('kos_profitable_title');
					$profitable_subtitle = get_sub_field('kos_profitable_subtitle');
					$profitable_service_name = get_sub_field('kos_profitable_service_name');
					$profitable_service_description = get_sub_field('kos_profitable_service_description');
					$profitable_service_price_upto = get_sub_field('kos_profitable_service_price_upto');
					$profit_percentage = get_sub_field('kos_profit_percentage');
					$profitable_date = get_sub_field('kos_profitable_date');
					$profitable_service_wallpaper = get_sub_field('kos_profitable_service_wallpaper')['url'];
					$profitable_button_text = get_sub_field('kos_profitable_button_text');

					if ($profitable_service_price_upto && $profit_percentage) {
						$profit_difference = round($profitable_service_price_upto * ($profit_percentage / 100));
						$profitable_service_price_after = round($profitable_service_price_upto - $profit_difference);
					}
					?>

					<?php echo <<<PROFITABLE
											<div class="kos_profitable-title_box">
											<h2 class="kos_profitable-title">$profitable_title</h2>
											<p class="kos_profitable-subtitle">$profitable_subtitle</p>
										</div>
										<div class="kos_profitable-content_box">
											<div class="kos_profitable-service_box">
												<h3 class="kos_profitable-service_name">$profitable_service_name</h3>
												<p class="kos_profitable-service_description">$profitable_service_description</p>
												<div class="kos_profitable-price_box">
													<div class="kos_profitable-service_price_after">$profitable_service_price_after руб.</div>
													<div class="kos_profitable-service_price_upto">$profitable_service_price_upto руб.</div>
												</div>
												<div class="kos_profitable-service_wallpaper" style="background: url('$profitable_service_wallpaper') center /
													cover no-repeat;"></div>
											</div>
											<div class="kos_profitable-profit_box">
												<div class="kos_profitable-profit_wrapper">
													<div class="kos_profit-percentage_top">-$profit_percentage%</div>
													<div class="kos_profitable-date">$profitable_date</div>
													<div class="kos_profitable-profit_price_box">
														<div class="kos_profitable-profit_price_after">$profitable_service_price_after руб.</div>
														<div class="kos_profitable-profit_price_upto">$profitable_service_price_upto руб.</div>
													</div>
													<p class="kos_profitable-profit_to">Экономия $profit_difference руб.</p>
													<div class="subm main_subm popmake-5068 pum-trigger" style="cursor: pointer;">$profitable_button_text</div>
												</div>
												<div class="kos_profitable-box_profit">
													<p>выгода</p>
													<p class="kos_profit-percentage_bottom">-$profit_percentage%</p>
													<p>выгода</p>
												</div>
											</div>
										</div>
								PROFITABLE;
					?>
					<?php echo '</div></div></div>' ?>

					<!-- ++++++++++++++++++++++++++++++ Profit One plus One - blok +++++++++++++++++++++++++++++++++++++++++ -->

				<?php elseif (get_row_layout() == 'kos_one_plus_one'): ?>

					<?php echo '<div class="kos_one_plus_one"><div class="kosmetolog_page-container kos_one_plus_one-container"><div class="kos_one_plus_one_box">' ?>

					<?php
					$one_plus_one_title = get_sub_field('kos_one_plus_one_title');
					$one_plus_one_subtitle = get_sub_field('kos_one_plus_one_subtitle');
					$one_plus_one_service_one_name = get_sub_field('kos_one_plus_one_service_one_name');
					$one_plus_one_service_one_description = get_sub_field('kos_one_plus_one_service_one_description');
					$one_plus_one_service_one_price = get_sub_field('kos_one_plus_one_service_one_price');
					$one_plus_one_service_one_wallpaper = get_sub_field('kos_one_plus_one_service_one_wallpaper')['url'];
					$one_plus_one_service_two_name = get_sub_field('kos_one_plus_one_service_two_name');
					$one_plus_one_service_two_description = get_sub_field('kos_one_plus_one_service_two_description');
					$one_plus_one_service_two_price = get_sub_field('kos_one_plus_one_service_two_price');
					$one_plus_one_service_two_wallpaper = get_sub_field('kos_one_plus_one_service_two_wallpaper')['url'];
					$profit_one_plus_one_percentage = get_sub_field('kos_profit_one_plus_one_percentage');
					$one_plus_one_button_text = get_sub_field('kos_one_plus_one_button_text');

					if ($one_plus_one_service_one_price && $one_plus_one_service_two_price && $profit_one_plus_one_percentage) {
						$one_plus_one_service_price_sum = round($one_plus_one_service_one_price + $one_plus_one_service_two_price);
						$profit_one_plus_one_difference = round($one_plus_one_service_price_sum * ($profit_one_plus_one_percentage / 100));
						$one_plus_one_service_price_after = round($one_plus_one_service_price_sum - $profit_one_plus_one_difference);
					}
					?>

					<?php echo <<<ONE_PLUS_ONE
											<div class="kos_one_plus_one-title_box">
											<h2 class="kos_one_plus_one-title">$one_plus_one_title</h2>
											<p class="kos_one_plus_one-subtitle">$one_plus_one_subtitle</p>
										</div>
										<div class="kos_one_plus_one-content_box">
											<div class="kos_one_plus_one-service_box">
												<div class="kos_one_plus_one-service_wallpaper" style="background: url('$one_plus_one_service_one_wallpaper') center /
																		cover no-repeat;"></div>
												<h3 class="kos_one_plus_one-service_name">$one_plus_one_service_one_name</h3>
												<p class="kos_one_plus_one-service_description">$one_plus_one_service_one_description</p>
													<div class="kos_one_plus_one-service_price">$one_plus_one_service_one_price руб.</div>
											</div>
											<div class="kos_one_plus_one-service_box">
												<div class="kos_one_plus_one-service_wallpaper" style="background: url('$one_plus_one_service_two_wallpaper') center /
																		cover no-repeat;"></div>
												<h3 class="kos_one_plus_one-service_name">$one_plus_one_service_two_name</h3>
												<p class="kos_one_plus_one-service_description">$one_plus_one_service_two_description</p>
													<div class="kos_one_plus_one-service_price">$one_plus_one_service_two_price руб.</div>
											</div>
											<div class="kos_one_plus_one-profit_box">
												<div class="kos_one_plus_one-profit_wrapper">
													<div class="kos_one_plus_one-top_text">Вместе выгоднее</div>
													<div class="kos_one_plus_one-profit_price_box">
														<div class="kos_one_plus_one-profit_price_after">$one_plus_one_service_price_after руб.</div>
														<div class="kos_one_plus_one-profit_price">$one_plus_one_service_price_sum руб.</div>
													</div>
													<p class="kos_one_plus_one-profit_to">Экономия $profit_one_plus_one_difference руб.</p>
													<div class="subm main_subm popmake-5068 pum-trigger" style="cursor: pointer;">$one_plus_one_button_text</div>
												</div>
												<div class="kos_one_plus_one-box_profit">
													<p>выгода</p>
													<p class="kos_profit_one_plus_one-percentage_bottom">-$profit_one_plus_one_percentage%</p>
													<p>выгода</p>
												</div>
											</div>
										</div>
									ONE_PLUS_ONE;
					?>
					<?php echo '</div></div></div>' ?>

					<!-- +++++++++++++++++++++++++++++++++ Description - blok ++++++++++++++++++++++++++++++++++++++++++++++ -->

				<?php elseif (get_row_layout() == 'kos_description'): ?>
					<?php echo '<div class="kos_description"><div class="kosmetolog_page-container kos_description-container"><div class="kos_description_box">' ?>
					<?php $kos_description_txt = get_sub_field('kos_description_repit'); ?>
					<?php
					echo <<<DESCRIPTION
									<div class="kos_description_txt">$kos_description_txt</div>
								DESCRIPTION;
					?>
					<?php echo '</div></div></div>' ?>

					<!-- +++++++++++++++++++++++++++++++++ Kos prices - blok ++++++++++++++++++++++++++++++++++++++++++++++ -->

				<?php elseif (get_row_layout() == 'kos_prices'): ?>

					<?php $kos_prices_id = get_sub_field('kos_prices_id'); ?>
					<?php echo '<div class="kos_prices" id="' . $kos_prices_id . '"><div class="kosmetolog_page-container kos_prices-container"><div class="kos_prices_box">' ?>

					<?php $kos_prices_repit = get_sub_field('kos_prices_repit'); ?>
					<?php $kos_prices_link_text = get_sub_field('kos_prices_link_text'); ?>
					<?php $kos_prices_link = get_sub_field('kos_prices_link'); ?>
					<?php
					echo <<<PRICES
						<div class="kos_prices_item">
							<a class="kos_view_all kos_prices_view_all" href="$kos_prices_link">$kos_prices_link_text</a>$kos_prices_repit
						</div>
					PRICES;
					?>
					<?php echo '</div></div></div>' ?>

					<!-- ++++++++++++++++++++++++++++++++ Kos_examples - blok +++++++++++++++++++++++++++++++++++++++++++++ -->

				<?php elseif (get_row_layout() == 'kos_examples_work'): ?>
					<?php echo '<div class="kos_examples"><div class="kosmetolog_page-container kos_examples-container"><div class="kos_examples_box">' ?>
					<?php $kos_examples_work_slider = get_sub_field('kos_examples_work_slider'); ?>
					<?php $kos_examples_work_link_text = get_sub_field('kos_examples_work_link_text'); ?>
					<?php $kos_examples_work_link = get_sub_field('kos_examples_work_link'); ?>
					<?php
					echo <<<EXAMPLES
						<div class="kos_examples_item">
							<a class="kos_view_all kos_examples_work_view_all" href="$kos_examples_work_link">$kos_examples_work_link_text</a>$kos_examples_work_slider
						</div>
					EXAMPLES;
					?>
					<?php echo '</div></div></div>' ?>

					<!-- +++++++++++++++++++++++++++++++++ Kos specialists slider - blok ++++++++++++++++++++++++++++++++++++++++++++++ -->

				<?php elseif (get_row_layout() == 'kos_specialists'): ?>
					<?php $kos_specialists_id = get_sub_field('kos_specialists_id'); ?>

					<?php echo '<div class="kos_specialists" id="' . $kos_specialists_id . '"><div class="kosmetolog_page-container kos_specialists-container"><div class="kos_specialists_box">' ?>
					<?php $kos_specialists_slider = get_sub_field('kos_specialists_slider'); ?>
					<?php $kos_specialists_link_text = get_sub_field('kos_specialists_link_text'); ?>
					<?php $kos_specialists_link = get_sub_field('kos_specialists_link'); ?>
					<?php
					echo <<<SPECIALISTS
						<div class="kos_specialists_item">
							<a class="kos_view_all kos_specialists_view_all" href="$kos_specialists_link">$kos_specialists_link_text</a>$kos_specialists_slider
						</div>
					SPECIALISTS;
					?>

					<?php echo '</div></div></div>' ?>

					<!-- +++++++++++++++++++++++++++++++++ Kos comfortable clinic - blok ++++++++++++++++++++++++++++++++++++++++++++++ -->

				<?php elseif (get_row_layout() == 'kos_comfortable_clinic'): ?>
					<?php echo '<div class="kos_comfortable_clinic"><div class="kosmetolog_page-container kos_comfortable_clinic-container"><div class="kos_comfortable_clinic_box">' ?>
					<?php $kos_comfortable_clinic_slider = get_sub_field('kos_comfortable_clinic_slider'); ?>
					<?php
					echo <<<COMFORTABLE
					<div class="kos_comfortable_clinic_item">$kos_comfortable_clinic_slider</div>
					COMFORTABLE;
					?>
					<?php echo '</div></div></div>' ?>

					<!-- ++++++++++++++++++++++++++++++++++++++++ Kos video - blok ++++++++++++++++++++++++++++++++++++++++++++++++++++ -->

				<?php elseif (get_row_layout() == 'kos_video'): ?>
					<?php echo '<div class="kos_video_about"><div class="kosmetolog_page-container kos_video_about-container"><div class="kos_video_about_box">' ?>
					<?php $kos_video_about = get_sub_field('kos_video_about'); ?>
					<?php
					echo <<<KOS_VIDEO
					<div class="kos_video_about_item">$kos_video_about</div>
					KOS_VIDEO;
					?>
					<?php echo '</div></div></div>' ?>

					<!-- +++++++++++++++++++++++++++++++++++++ Kos reputation - blok ++++++++++++++++++++++++++++++++++++++++++++++++++ -->

				<?php elseif (get_row_layout() == 'kos_reputation'): ?>
					<?php echo '<div class="kos_reputation"><div class="kosmetolog_page-container kos_reputation-container"><div class="kos_reputation_box">' ?>


					<?php $kos_reputation_title = get_sub_field('kos_reputation_title'); ?>
					<?php $kos_reputation_quote = get_sub_field('kos_reputation_quote'); ?>
					<?php $kos_reputation_author = get_sub_field('kos_reputation_author'); ?>
					<?php $kos_reputation_ratings = get_sub_field('kos_reputation_ratings'); ?>
					<?php $kos_reputation_reviews_messenger = get_sub_field('kos_reputation_reviews_messenger'); ?>


					<?php
					echo <<<KOS_REPUTATION
						<div class="kos_reputation_content">
							<h2 class="kos_reputation_title">$kos_reputation_title</h2>
							<div class="kos_reputation_text">
								<div class="kos_reputation_quote">$kos_reputation_quote</div>
								<p class="kos_reputation_author">$kos_reputation_author</p>
							</div>
							<div class="kos_reputation_ratings">$kos_reputation_ratings</div>
						</div>
						<div class="kos_reputation_slider_container">
							<div class="kos_reputation_slider">$kos_reputation_reviews_messenger</div>
						</div>
					KOS_REPUTATION;
					?>


					<?php echo '</div></div></div>' ?>

					<!-- +++++++++++++++++++++++++++++++++++++ Kos reputation - blok ++++++++++++++++++++++++++++++++++++++++++++++++++ -->

				<?php elseif (get_row_layout() == 'kos_leprosy_contraindications'): ?>
					<?php echo '<div class="kos_leprosy_contraindications"><div class="kosmetolog_page-container kos_leprosy_contraindications-container"><div class="kos_leprosy_contraindications_box">' ?>

					<?php $kos_leprosy_contraindications_txt = get_sub_field('kos_leprosy_contraindications_txt'); ?>
					<?php $kos_leprosy = get_sub_field('kos_leprosy'); ?>
					<?php $kos_contraindications = get_sub_field('kos_contraindications'); ?>

					<?php if ($kos_leprosy): ?>
						<?php $kos_leprosy_title = get_sub_field('kos_leprosy_title'); ?>
						<?php echo "<div class=\"kos_leprosy_list_box\"><h3 class=\"kos_leprosy_title\">$kos_leprosy_title</h3>" ?>
						<?php echo '<ul class="kos_leprosy">'; ?>
						<?php while (have_rows('kos_leprosy')):
							the_row(); ?>
							<?php $kos_leprosy_item = get_sub_field('kos_leprosy_item'); ?>
							<?php echo <<<LEPROSY
									<li class="kos_leprosy_item">$kos_leprosy_item</li>
							LEPROSY;
							?>
						<?php endwhile; ?>
						<?php echo '</ul></div>'; ?>
					<?php endif; ?>

					<?php if ($kos_contraindications): ?>
						<?php $kos_contraindications_title = get_sub_field('kos_contraindications_title'); ?>
						<?php echo "<div class=\"kos_contraindications_list_box\"><h3 class=\"kos_contraindications_title\">$kos_contraindications_title</h3>" ?>
						<?php echo '<ul class="kos_contraindications">' ?>
						<?php while (have_rows('kos_contraindications')):
							the_row(); ?>
							<?php $kos_contraindications_item = get_sub_field('kos_contraindications_item'); ?>
							<?php echo <<<CONTRAINDICATIONS
									<li class="kos_contraindications_item">$kos_contraindications_item</li>
							CONTRAINDICATIONS;
							?>
						<?php endwhile; ?>
						<?php echo '</ul></div>'; ?>
					<?php endif; ?>
					<?php echo '</div>'; ?>

					<?php if ($kos_leprosy_contraindications_txt): ?>
						<?php echo <<<LEPROSY_TXT
									<div class="kos_leprosy_contraindications_txt">$kos_leprosy_contraindications_txt</div>
									LEPROSY_TXT;
						?>
					<?php endif; ?>

					<?php echo '</div></div>'; ?>

					<!-- +++++++++++++++++++++++++++++++++++++ Kos effects procedure - blok ++++++++++++++++++++++++++++++++++++++++++++++++++ -->

				<?php elseif (get_row_layout() == 'kos_effects_procedure'): ?>

					<?php $kos_effects_wallpaper = get_sub_field('kos_effects_wallpaper'); ?>

					<?php if (have_rows('kos_effects')): ?>

						<?php echo '<div class="kos_effects"><div class="kosmetolog_page-container kos_effects-container"><div class="kos_effects_box">' ?>
						<?php echo '<div class="kos_effects_wallpaper" style="background: url(' . $kos_effects_wallpaper . ') center / cover no-repeat;"></div>' ?>

						<?php while (have_rows('kos_effects')):
							the_row(); ?>

							<?php
							$kos_effect_title = get_sub_field('kos_effect_title');
							$kos_effect_description = get_sub_field('kos_effect_description');
							?>

							<?php echo <<<EFFECTS
									<div class="kos_effects_item">
											<h3 class="kos_effect_title">$kos_effect_title</h3>
											<div class="kos_effect_description">$kos_effect_description</div>
									</div>
								EFFECTS;
							?>

						<?php endwhile; ?>
						<?php echo '</div></div></div>' ?>
					<?php endif; ?>

					<!-- +++++++++++++++++++++++++++++++++++++ Kos motivation - blok ++++++++++++++++++++++++++++++++++++++++++++++++++ -->

				<?php elseif (get_row_layout() == 'kos_motivation_block'): ?>
					<?php echo '<div class="kos_motivation_block"><div class="kosmetolog_page-container kos_motivation_block-container"><div class="kos_motivation_block_box">' ?>
					<?php $kos_motivation_text = get_sub_field('kos_motivation_text'); ?>
					<?php $kos_motivation_button_texе = get_sub_field('kos_motivation_button_texе'); ?>
					<?php
					echo <<<MOTIVATION
						<div class="kos_motivation_content_wrapper">
							<div class="kos_motivation_img"></div>
							<h2 class="kos_motivation_title">Эффект после <span>первого сеанса</span></h2>
							<div class="kos_motivation_text">$kos_motivation_text</div>
							<div class="subm main_subm popmake-5068 pum-trigger" style="cursor: pointer;">$kos_motivation_button_texе</div>
						</div>
					MOTIVATION;
					?>

					<?php echo '</div></div></div>' ?>

					<!-- +++++++++++++++++++++++++++++++++++ Kos clinic services - blok +++++++++++++++++++++++++++++++++++++++++++++++ -->

				<?php elseif (get_row_layout() == 'kos_clinic_services'): ?>

					<?php $kos_clinic_services_id = get_sub_field('kos_clinic_services_id'); ?>
					<?php echo '<div class="kos_clinic_services" id="' . $kos_clinic_services_id . '"><div class="kosmetolog_page-container kos_clinic_services-container"><div class="kos_clinic_services_box">' ?>

					<?php $kos_clinic_services_title = get_sub_field('kos_clinic_services_title'); ?>
					<?php $kos_clinic_services_slider = get_sub_field('kos_clinic_services_slider'); ?>
					<?php
					echo <<<CLINIC_SERVICES
					<div class="kos_clinic_services_title">$kos_clinic_services_title</div>
					<div class="kos_clinic_services_slider">$kos_clinic_services_slider</div>
					CLINIC_SERVICES;
					?>
					<?php echo '</div></div></div>' ?>

					<!-- +++++++++++++++++++++++++++++++++++ Kos similar services - blok +++++++++++++++++++++++++++++++++++++++++++++++ -->

				<?php elseif (get_row_layout() == 'kos_similar_services'): ?>
					<?php echo '<div class="kos_similar_services"><div class="kosmetolog_page-container kos_similar_services-container"><div class="kos_similar_services_box">' ?>
					<?php $kos_similar_services_title = get_sub_field('kos_similar_services_title'); ?>
					<?php $kos_similar_services_slider = get_sub_field('kos_similar_services_slider'); ?>
					<?php
					echo <<<SIMILAR_SERVICES
					<div class="kos_similar_services_title">$kos_similar_services_title</div>
					<div class="kos_similar_services_slider">$kos_similar_services_slider</div>
					SIMILAR_SERVICES;
					?>
					<?php echo '</div></div></div>' ?>

					<!-- ++++++++++++++++++++++++++++++++++ Kos make an appointment - blok +++++++++++++++++++++++++++++++++++++++++++++ -->

				<?php elseif (get_row_layout() == 'kos_make_appointment'): ?>
					<?php $kos_make_appointment_title = get_sub_field('kos_make_appointment_title'); ?>
					<?php $kos_make_appointment_text = get_sub_field('kos_make_appointment_text'); ?>
					<?php $kos_make_appointment_form = get_sub_field('kos_make_appointment_form'); ?>
					<?php $kos_make_appointment_img = get_sub_field('kos_make_appointment_img'); ?>
					<?php
					echo <<<MAKE_APPOINTMENT
						<div class="kos_make_appointment">
							<div class="kos_make_appointment_img kosmetolog_page-container">
								<img src="$kos_make_appointment_img" alt="make">
							</div>
							<div class="kos_make_appointment_wrapper">
								<div class="kosmetolog_page-container kos_make_appointment-container">
									<div class="kos_make_appointment_box">
										<div class="kos_make_appointment_content">
											<h2 class="kos_make_appointment_title">$kos_make_appointment_title</h2>
											<div class="kos_make_appointment_text">$kos_make_appointment_text</div>
										</div>
										<div class="kos_make_appointment_form">$kos_make_appointment_form</div>
									</div>
								</div>
							</div>
						</div>
					MAKE_APPOINTMENT;
					?>

					<!-- ++++++++++++++++++++++++++++++++++++ Kos question answer - blok +++++++++++++++++++++++++++++++++++++++++++++++ -->
				<?php elseif (get_row_layout() == 'kos_question_answer'): ?>
					<?php echo '<div class="kos_question_answer"><div class="kosmetolog_page-container kos_question_answer-container"><div class="kos_question_answer_box">' ?>
					<?php $kos_question_answer_title = get_sub_field('kos_question_answer_title'); ?>
					<?php $kos_question_answer_top_link = get_sub_field('kos_question_answer_top_link'); ?>
					<?php $kos_question_answer_bottom_link = get_sub_field('kos_question_answer_bottom_link'); ?>
					<?php $count_posts = wp_count_posts('faq'); ?>
					<?php $published_posts = $count_posts->publish; ?>
					<?php $kos_add_post_question_id = []; ?>
					<?php $count_publish_post = 0 ?>

					<?php if (have_rows('kos_add_post_question')): ?>
						<?php while (have_rows('kos_add_post_question')):
							the_row(); ?>
							<?php
							$kos_id_vel = get_sub_field('kos_add_post_question_id');
							$kos_add_post_question_id[$count_publish_post] = $kos_id_vel;
							$count_publish_post++;
							?>
						<?php endwhile; ?>
					<?php endif; ?>

					<?php
					echo '<div class="kos_question_answer_content">
									<div class="kos_question_answer_content-head">
										<h2 class="kos_question_answer_title">' . $kos_question_answer_title . '</h2>
										<p class="kos_question_answer_count_post">Показано ' . $count_publish_post . ' из ' . $published_posts . '</p>
									</div>
									<div class="kos_question_answer-btn_box">
										<a class="btn btn_faq kos_question_answer_btn" href="' . $kos_question_answer_top_link . '">Задать вопрос</a>
										<a class="btn btn_faq kos_question_answer_btn-watch" href="' . $kos_question_answer_bottom_link . '">Посмотреть все вопросы и ответы</a>
									</div>
								</div>
								<div class="kos_question_answer_question">';
					?>

					<?php
					$kos_question_posts = get_posts(
						array(
							'include' => $kos_add_post_question_id,
							'post_type' => 'faq',
							'orderby' => 'post__in',
							'suppress_filters' => true,
						)
					);
					?>

					<?php foreach ($kos_question_posts as $post) {
						setup_postdata($post);
						$prm = get_fields(get_the_ID());
						$doc = get_fields($prm['doc']);
						?>

						<? echo '<div class="kos_question_blok">
						<div class="kos_question_head">
							<div class="kos_question_head-username">' ?>
						<? echo ($prm['qname']) ? ($prm['qname']) : 'Анонимно' ?>
						<? echo '</div>
					<div class="kos_question_head-info">
						<div class="kos_question_head-spec">' ?>

						<?php $ntxt = get_term_by('id', $prm["qnapr"], 'spec');
						$slink = get_field('spec_link', 'spec_' . $prm["qnapr"]); ?>
						<?php if (!empty($slink)) { ?>
							<? echo '<a href="' . $slink . '" target="_blank">' . $ntxt->name . '</a>'; ?>
						<?php } else { ?>
							<? echo '<div>' ?>
							<?= $ntxt->name ?>
							<? echo '</div>' ?>
						<?php } ?>

						<? echo '</div>
					<span></span>
					<div class="kos_question_head-date">' ?>
						<?= get_the_date('d.m.Y'); ?>
						<? echo '</div>
				</div>
				</div>

				<div class="kos_question_body">
					<div class="kos_question_body-quest">' ?>
						<?= $prm['qquest'] ?>
						<? echo '</div>
					<div class="kos_question_body_bottom_box">
						<div class="kos_question_body-answer">' ?>
						<?= $prm['qansw'] ?>
						<? echo '</div>
						<div class="kos_question_body-doc_info">
							<div class="kos_question_body-foto">' ?>
						<? echo '<img src="' ?>
						<?= get_the_post_thumbnail_url($prm['doc'], 'thumbnail'); ?>
						<? echo '" alt="' ?>
						<?php the_title($prm['doc']); ?>
						<? echo '">' ?>
						<? echo '</div>
							<div class="kos_question_body-info_content">
								<div class="kos_question_body-info_name_experience_box">
									<div class="kos_question_body-info_name">' ?>

						<?php if (!empty($doc['doctor_link'])) { ?>
							<? echo '<a href="' . $doc['doctor_link'] . '" target="_blank"><strong>'; ?>
							<?= get_the_title($prm['doc']) ?>
							<? echo '</strong></a>'; ?>
						<?php } else { ?>
							<? echo '<strong>' ?>
							<?= get_the_title($prm['doc']) ?>
							<? echo '</strong>' ?>
						<?php } ?>

						<? echo '</div>
									<span></span>
									<div class="kos_question_body-info_experience">Стаж работы:' ?>
						<?= $doc['doctor_staj'] ?>
						<? echo '</div>
								</div>
								<div class="kos_question_body-info_spec">' ?>
						<?= $doc['doctor_spec'] ?>
						<? echo '</div>
								<div class="kos_question_head-date kos_question_body-date">' ?>
						<?= get_the_date('d.m.Y'); ?>
						<? echo '</div>
							</div>
						</div>
					</div>
				</div>

				</div>' ?>

					<?php }
					wp_reset_postdata(); ?>

					<?php echo "</div></div></div></div>" ?>

					<!-- ++++++++++++++++++++++++++++++++++++ Kos reviews slider - blok +++++++++++++++++++++++++++++++++++++++++++++++ -->
				<?php elseif (get_row_layout() == 'kos_reviews_slider'): ?>
					<?php echo '<div class="kos_reviews_slider"><div class="kosmetolog_page-container kos_reviews_slider-container"><div class="kos_reviews_slider_box">' ?>
					<?php $kos_reviews_slider_title = get_sub_field('kos_reviews_slider_title'); ?>
					<?php $kos_reviews_slider_link = get_sub_field('kos_reviews_slider_link'); ?>
					<?php $kos_reviews_slider_link_text = get_sub_field('kos_reviews_slider_link_text'); ?>
					<?php $kos_add_post_reviews = get_sub_field('kos_add_post_reviews'); ?>
					<?php $kos_add_post_reviews_id = []; ?>
					<?php $count_rev_publish_post = 0 ?>

					<?php echo "
					<div class=\"kos_reviews_slider_title_box\">
						<h2 class=\"kos_reviews_slider_title\">$kos_reviews_slider_title</h2>
						<a class=\"kos_view_all kos_reviews_view_all\" href=\"$kos_reviews_slider_link\">$kos_reviews_slider_link_text</a>
					</div>
					<div class=\"kos_reviews_slider__inner\">
							<ul class=\"kos_reviews__slider-line \">";
					?>

					<?php if (have_rows('kos_add_post_reviews')): ?>
						<?php while (have_rows('kos_add_post_reviews')):
							the_row(); ?>
							<?php
							$kos_id_rev_vel = get_sub_field('kos_add_post_reviews_id');
							$kos_add_post_reviews_id[$count_rev_publish_post] = $kos_id_rev_vel;
							$count_rev_publish_post++;
							?>
						<?php endwhile; ?>
					<?php endif; ?>

					<?php
					$kos_reviews_posts = get_posts(
						array(
							// 'include' => [8097, 8029, 8731, 8639, 8725],
							'include' => $kos_add_post_reviews_id,
							'post_type' => 'review',
							'orderby' => 'post__in',
							'suppress_filters' => true,
						)
					);
					?>

					<?php foreach ($kos_reviews_posts as $post) {
						setup_postdata($post);
						$prm = get_fields(get_the_ID());
						$doc = get_fields($prm['doc']);
						?>
						<?php echo '
						<li class="kos_reviews__slider-item">
							<div class="kos_reviews_slider_info"><div class="kos_reviews_slider_foto">'; ?>
						<?php if (!empty(get_the_post_thumbnail_url())) { ?>
							<?php echo '<img src="'; ?>
							<?= get_the_post_thumbnail_url() ?>
							<?php echo '" alt="Отзыв">'; ?>
						<?php } else { ?>
							<?php echo '<img src="/wp-content/uploads/2022/07/esthetique.png" alt="Отзыв">'; ?>
						<?php } ?>
						<?php echo '
							</div>
							<div class="kos_reviews_slider_info_content">
								<div class="kos_reviews_slider_info_head">
									<div class="kos_reviews_slider_rev_stars">
										<img src="/wp-content/uploads/2023/04/stars.png" alt="Звезды">
									</div>';
						?>

						<?php $prm = get_fields(get_the_ID());
						$doc = get_fields($prm['doc']);
						$slink = get_field('spec_link', 'spec_' . $prm["proc"]); ?>

						<?php echo '
									<div class="kos_reviews_slider_info_box">
										<div class="kos_reviews_slider_info_date">'; ?>
						<?= get_the_date() ?>
						<?php echo '
										</div>
										<span></span>
										<div class="kos_reviews_slider_info_type">';
						?>
						<? // $prm['revtype']['value'] ?>
						<?= $prm['revtype']['label'] ?>
						<?php echo '
										</div>
									</div>
								</div>
								<div class="kos_reviews_slider_info_user_name">'; ?>
						<?php the_title(); ?>
						<?php echo '
								</div>
								<div class="kos_reviews_slider_info_doc_name">
								Врач:';
						?>
						<?php if (!empty($doc['doctor_link'])) { ?>
							<?php echo '<a href="'; ?>
							<?= $doc['doctor_link'] ?>" target="_blank">
							<?= get_the_title($prm['doc']) ?>
							<?php echo '</a>'; ?>
						<?php } else { ?>
							<?php echo '<span>'; ?>
							<?= get_the_title($prm['doc']) ?>
							<?php echo '</span>'; ?>
						<?php } ?>
						<?php echo '
									</div>';
						?>

						<?php $ntxt = get_term_by('id', $prm['proc'], 'spec'); ?>
						<?php if (!empty($slink)) { ?>

							<?php echo '
									<div class="kos_reviews_slider_rev_spec">Процедура: <a href="' ?>
							<?= $slink ?>" target="_blank">
							<?= $ntxt->name ?>
							<?php echo '</a>'; ?>
							<?php echo '</div>'; ?>
						<?php } else { ?>
							<?php echo '<div class="kos_reviews_slider_rev_spec">Процедура: <span>'; ?>
							<?= $ntxt->name ?>
							<?php echo '</span></div>'; ?>
						<?php } ?>
						<?php echo '
								</div>
							</div>
							<div class="kos_reviews_slider_rev_txt">
								<div>'; ?>
						<?php $cont = get_the_content();
						$len = mb_strlen($cont);
						if ($len > 480) {
							$cont1 = mb_strimwidth($cont, 0, 480, '') . '<span class="kos_reviews_slider_dots">...</span>';
							//echo strlen($cont); 
							//$cont2 = mb_strimwidth($cont, 300, $len, '');
							//$cont = $cont1 . '<span class="kos_reviews_slider_hidden">' . $cont2 . '</span>';
							$cont = $cont1;
						} ?>
						<?= $cont ?>
						<?php echo '
								</div>';
						?>
						<?php //if ($len > 200) { ?>
						<?php echo '<a class="kos_reviews_slider_revitem_all revitem_all" href="'; ?>
						<?php the_permalink(); ?>
						<?php echo '">
												<span>Читать весь отзыв</span>
												</a>';
						?>
						<?php //} ?>
						<?php echo '
						</div>
						</li>'; ?>


					<?php }
					wp_reset_postdata(); ?>
					<?php echo '</ul>
			</div>

			<div class="kos_reviews_slider__box-control">
				<ul class="kos_reviews__dots__box"></ul>
			</div>'; ?>




					<?php echo "</div></div></div>" ?>
					<!-- ++++++++++++++++++++++++++++++++++++ Kos reviews slider - blok +++++++++++++++++++++++++++++++++++++++++++++++ -->

				<?php endif; ?>
			<?php endwhile;
		else:
			?>
		<?php endif; ?>

	</div>
</div>

<?php
get_footer();
?>