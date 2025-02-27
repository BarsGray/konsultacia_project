<?php
get_header();
?>




<div class="theme_page relative">
	<div class="page_layout clearfix">
		

<?php
if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
}
?>

		<?php $anc = $post->post_parent;
		if (!empty(get_the_content())){ ?>
		<div class="page_header clearfix">
			<div class="page_header_left">
				<h1><?php the_title(); ?></h1>

			</div>
			<div class="page_header_right">
				<?php
				get_sidebar('header');
				?>
			</div>
		</div>
		<div class="clearfix horizontal">
			<?php
			if(have_posts()) : while (have_posts()) : the_post();
				the_content();
			endwhile; endif;
			?>
		</div>
		<?php }else if ($anc==4702){ $sdr='';$inum=0;?>
		<?php $str = get_field('statya'); ?>
		<?php  foreach ($str as $itm){
			if ($itm['acf_fc_layout']=='txtblock'){
				if (substr_count($itm['txt'], '<h2>')>0){
					$inum = $inum + substr_count($itm['txt'], '<h2>');
					$sdr .= preg_replace('~.*?(<h2>(.*?)</h2>\s?|$)~is', '$1', $itm['txt']);
				}
				}else if ($itm['acf_fc_layout']=='preims') {
					if (!empty($itm['title'])){
						$inum = $inum + 1;
						$sdr .= '<li>'.$itm['title'].'</li>;;';
					}
				}
		}						
		$sdr = str_replace('<h2>','<li>',$sdr);
		$sdr = str_replace('</h2>','</li>;;',$sdr);							
		$sdr = explode(';;',$sdr);
		$sdr1 = '';$ii=1;
		foreach ($sdr as $sd){
			$sdr1 .= preg_replace('|<li>(.*)</li>|Uis', '<li><a href="#zag'.$ii.'">$1</a></li>', $sd,-1);
			$ii++;
		} ?>
		<section id="art_head">
			<div class="art_head_title">
				<h1><?php the_title(); ?></h1>
				<div class="article_meta">
					<span><?=get_the_date()?></span>
					<span><?=gp_read_time()?> на чтение</span>
				</div>
			</div>
			<img src="<?=get_the_post_thumbnail_url()?>" alt="">
			<div class="art_ogl">
				<p>Оглавление</p>
				<ol>
					<?php echo $sdr1; ?>
				</ol>
			</div>
		</section>
		<section id="art_inner">
		<?php $ii=1; foreach ($str as $itm){
		if ($itm['acf_fc_layout']=='txtblock'){ ?>
			<div class="art_txt art_blk">
				<?php $tstr = explode(PHP_EOL,$itm["txt"]);
				foreach ($tstr as $it){
					if (strpos($it,'<h2>')!==false){
						$it = preg_replace('|<h2>|', '<h2 id="zag'.$ii.'">', $it,-1);
						$ii++;
					}
					echo $it;
				}							   
				?>
			</div>
		<?php }else if ($itm['acf_fc_layout']=='blist') { ?>
			<div class="art_blist art_blk">
				<?php foreach ($itm['list'] as $lst){ ?>
				<div class="art_blist_item">
					<p class="blist_title"><?=$lst['title']?></p>
					<div class="blist_cont"><?=$lst['txt']?></div>
				</div>
				<?php } ?>
			</div>
		<?php }else if ($itm['acf_fc_layout']=='vajno') { ?>
			<div class="art_vajno art_blk">
				<p class="cit_title">Важно</p>
				<p><?=$itm['txt']?></p>
			</div>
		<?php }else if ($itm['acf_fc_layout']=='hak') { ?>
			<div class="art_hak art_blk">
				<p class="cit_title">Лайфхак</p>
				<p><?=$itm['txt']?></p>
			</div>
		<?php }else if ($itm['acf_fc_layout']=='slist') { ?>
			<ul class="art_list art_blk">
				<?php foreach ($itm['list'] as $lst){ ?>
				<li>
					<p class="list_title"><?=$lst['title']?></p>
					<p><?=$lst['txt']?></p>
				</li>
				<?php } ?>
			</ul>
		<?php }else if ($itm['acf_fc_layout']=='artcit') { ?>
			<blockquote class="art_cit art_blk"><?=$itm['txt']?></blockquote>
		<?php }else if ($itm['acf_fc_layout']=='arttab2') { ?>
			<table class="art_tab2 art_blk">
				<thead>
					<tr>
						<th><?=$itm['tabh1']?></th>
						<th><?=$itm['tabh2']?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($itm['tab'] as $tb){ ?>
					<tr>
						<td><?=$tb['tab1']?></td>
						<td><?=$tb['tab2']?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>


		<?php }else if ($itm['acf_fc_layout']=='mnenie') { ?>
			<div class="art_mnenie art_blk">
				<?php $doc = get_fields($itm['doc']); ?>
				<div class="artmnenie_img">
					<img src="<?=get_the_post_thumbnail_url($itm['doc'])?>" alt="Эксперт">
				</div>
				<div class="artmennie_descr">
					<span>Мнение эксперта</span>
					<p><?=$itm['txt']?></p>
					<p class="artmenie_doc"><?=get_the_title($itm['doc'])?></p>
					<p class="artmenie_about"><?=$doc['doctor_spec']?>, стаж работы <?=$doc['doctor_staj']?></p>
				</div>
			</div>
		<?php }else if ($itm['acf_fc_layout']=='preims') { 
			if ($itm['sel']=='preim'){$cls = 'art_preim';}else{$cls = 'art_ned';} ?>
			<div class="art_blk <?=$cls?>">
				<h2 id="zag<?=$ii?>"><?=$itm['title']?></h2>
				<?php $ii++; ?>
				<ul>
					<?php foreach ($itm['list'] as $lst){ ?>
					<li><?=$lst['txt']?></li>
					<?php } ?>
				</ul>
			</div>
		<?php }else if ($itm['acf_fc_layout']=='expert') { ?>
			<div class="art_expert art_blk">
				<h2>Эксперт статьи, которую вы читаете</h2>
				<?php $doc = get_fields($itm['doc']); ?>
				<div class="art_expert_wrap">
					<div class="artmnenie_img">
						<img src="<?=get_the_post_thumbnail_url($itm['doc'])?>" alt="Эксперт">
						<p>Стаж работы <?=$doc['doctor_staj']?></p>
					</div>
					<div class="artexpert_desc">
						<p class="artexpert_doc"><?=get_the_title($itm['doc'])?></p>
						<p class="artmenie_about"><?=$doc['doctor_spec']?></p>
						<a href="<?=$doc['doctor_link']?>">Записаться к врачу</a>
					</div>
				</div>
			</div>
		<?php } } ?>
		</section>


<div class="consult1">
	<div class="cons_img" style="background-image:url(<?=get_the_post_thumbnail_url()?>)"></div>
	<div class="cons_txt">

		<div class="text usluga">
			<div>
				<h2>Запишитесь на консультацию к нашему специалисту и получите скидку 10% на первую услугу</h2>
					<p>Администратор перезвонит вам и подберёт удобное время записи</p>
					
					<?php echo do_shortcode('[contact-form-7 id="479" title="zayzvka na uslugu"]'); ?>

					<div class="form_podtext2">Отправляя форму вы даете согласие на обработку <a href="https://esthetique24.ru/wp-content/uploads/2020/06/pravila-obrabotki-i-organizacii-zashiti-personalnih-dannih.pdf">персональных данных</a> и соглашаетесь с <a href="https://esthetique24.ru/wp-content/uploads/2020/06/politica-konfidencialnosti.pdf">политикой конфиденциальности</a></div>
				</div>
		</div>

	</div>
</div>

		<section id="art_related">
			<div class="artrec_head">
				<h2>Рекомендуем также ознакомиться</h2>
				<a href="/o-nas/article">Все статьи</a>
			</div>
			<div class="artrec_list">
				<?php $recs = get_field('art_recommend');
					if (!empty($recs) || !isset($recs)){				
						$args = array(
							'orderby'        => 'date',
							'order'          => 'DESC',
							'posts_per_page' => 3,
							'post_type'      => 'page',
							'post__in'       => $recs,
							'post_status'    => 'publish'
						);
					}else{
						$args = array(
							'orderby'        => 'date',
							'order'          => 'DESC',
							'posts_per_page' => 3,
							'post_type'      => 'page',
							'post__not_in'   => [get_the_ID()],
							'post_status'    => 'publish',
							'post_parent'    => 4702,
						);
					}
					$query = new WP_Query($args); 
					if ($query->have_posts() ) 
						while ( $query->have_posts() ) : $query->the_post(); ?>
						<div class="artrec_item">
							<a class="artrec_img" href="<?php the_permalink(); ?>">
								<?php if (!empty(get_the_post_thumbnail_url())){$cls='';}else{$cls=1;} 
									if ($cls==''){ ?>
									<img src="<?=get_the_post_thumbnail_url()?>" alt="">
								<?php }else{ ?>
									<img src="/wp-content/uploads/2019/08/esthetique.jpg" alt="">
								<?php } ?>
							</a>
							<p class="artrec_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
							<div class="article_meta">
								<span><?=get_the_date()?></span>
								<span><?=gp_read_time()?> на чтение</span>
							</div>
							<p class="article_excerpt"><?php the_excerpt(); ?></p>
						</div>
					<?php endwhile; wp_reset_postdata(); ?>
			</div>
		</section>
		<?php } ?>
	</div>
</div>

<script type="text/javascript">
    /* максимальная и минимальная стоимость*/
    var arrayOfElem = []
    var arrayOfCount = []
    var offerCount = 1;
    var table = document.querySelector('.price').children[0].children;
    offerCount = table.length -2;
    for(var i = 1; i < table.length-1; i++){
      arrayOfElem.push(table[i].children[1].innerHTML);
    }
    for(var i =0; i < arrayOfElem.length; i++)
    {
      arrayOfElem[i] = arrayOfElem[i].replace(/[&]nbsp[;]/gi,"");
      arrayOfElem[i] = arrayOfElem[i].replace(/ /g,'');
    }
    Array.prototype.max = function() {
      return Math.max.apply(null, this);
    };

    Array.prototype.min = function() {
      return Math.min.apply(null, this);
    };

    let img;
    const images = Array.from(document.getElementsByTagName('div'));
    for(i = 0; i < images.length; i++){
      if (images[i].className == 'pic lft') {
        img = "https://esthetique24.ru" + document.querySelector('.pic').children[0].dataset.src;
        break;
      } else if(images[i].className == 's_pic1') {
        img = images[i].style.background.substr(5).slice(0, -2)
        break;
      }
    }      
    var arrayJson =  JSON.stringify({
        "@context": "https://schema.org/",
        "@type": "Product",
        "name": document.getElementsByTagName('h1')[0].innerHTML,
        "image": [img],
        "description": document.querySelector('meta[name="description"]').content,
        "offers": {
          "@type": "AggregateOffer",
          "offerCount": offerCount,  
          "lowPrice": arrayOfElem.min(),
          "highPrice":arrayOfElem.max(),
          "priceCurrency": "RUB"
        }
      });
    const script = document.createElement('script');
    script.setAttribute('type', 'application/ld+json');
    script.setAttribute('id', 'myJsonArray');
    script.textContent = arrayJson;
    document.head.appendChild(script);
</script>









<?php
get_footer(); 
?>