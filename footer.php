<?php global $theme_options; ?>
<div class="footer_container">
  <div class="footer">
    <ul class="footer_banner_box_container clearfix">
      <?php
      if (is_active_sidebar('footer-top'))
        get_sidebar('footer-top');
      ?>
    </ul>
    <div class="footer_box_container clearfix">













      <div class="black_footer_holder">
        <div class="black_footer1">
          <?php if (is_front_page()) {
            echo '<div class="f_logo_holder"><div class="logo"><img src="https://esthetique24.ru/logo.png" alt="ESTHÉTIQUE ЦЕНТР ЭСТЕТИЧЕСКОЙ МЕДИЦИНЫ"></div></div>';
          } else {
            echo '<div class="f_logo_holder"><a class="logo" href="https://esthetique24.ru"><img src="https://esthetique24.ru/logo.png" alt="ESTHÉTIQUE ЦЕНТР ЭСТЕТИЧЕСКОЙ МЕДИЦИНЫ"></a></div>';
          } ?>


          <a href="/kontakti/#map" class="adress"><span class="map"></span><span><strong>ул. Авиаторов,
                д.29</strong></span></a>
          <div class="timetowork">пн-вс c 09:00 до 22:00</div>

          <noindex><a href="https://t.me/esthetique_krsk" class="nwtel" rel="nofollow" target="_blank"><span
                class="nwtel1"></span><span>Больше предложений здесь</span></a></noindex>


        </div>
        <div class="black_footer2">
          <a onclick="ym(54686599,'reachGoal','Клик по номеру телефона'); ga('send', 'event', 'mail_submit', 'Клик по номеру телефона'); return true;"
            href="tel:+73912298121" class="footer_tel"><span class="footer_phone"></span><span>+7 391
              229-81-21</span></a>
        </div>
        <div class="black_footer3">

          <div class="footer3_block">
            <a href="/kosmetologiya-lica/">Косметология лица</a>
            <a href="/kosmetologiya-tela/">Косметология тела</a>
            <a href="/kosmetologiya-lica/inekcionnaya-kosmetologiya/">Инъекционная косметология</a>
            <a href="/kosmetologiya-lica/apparatnaya-kosmetologiya/">Аппаратная косметология</a>
            <a href="/kosmetologiya-lica/lazernaya-kosmetologiya/">Лазерная косметология</a>
          </div>
          <div class="footer3_block">
            <a href="/kosmetologiya-tela/apparatnyj-massazh/">Аппаратный массаж</a>
            <a href="/kosmetologiya-tela/skins/">Депиляция</a>
            <a href="/kosmetologiya-tela/epilyaciya/lazer-epilyaciya-2/">Лазерная эпиляция</a>
            <a href="/kosmetologiya-tela/intimnoye-omolozhenie/lotus-ii/">Интимное омоложение</a>
            <a href="/kosmetologiya-tela/gipergidroz/">Борьба с потоотделением</a>
          </div>
          <div class="footer3_block">
            <a href="/o-nas/license/">О нас</a>
            <a href="/akcii/">Акции</a>
            <a href="/price/">Цены</a>
            <a href="/kontakti/">Контакты</a>
            <a href="/o-nas/do-posle/">До/после</a>
          </div>
          <div class="footer3_block">
            <a href="/o-nas/article/">Статьи</a>
            <a href="/o-nas/smi-o-nas/">СМИ о нас</a>
            <a href="/staff/">Наши специалисты</a>
          </div>

        </div>
        <div class="black_footer4">
          <div class="footer_text">
            <div>&copy; ESTHETIQUE 2019, ООО &laquo;ЭстетМед&raquo;</div>
            <div>Регистрационный номер лицензии: Л041-01019-24/00332017</div>
            <div>ОГРН: 1182468059124</div>
            <div>ИНН: 2465187764</div>
          </div>

          <div class="footer_text">Адрес: 660077, Россия, Красноярский край, г. Красноярск, улица Авиаторов, дом 29,
            помещение 195</div>

          <div class="footer_text2">
            <a target="_blanc"
              href="/wp-content/uploads/2024/08/politika-v-otnoshenii-obrabotki-personalnyh-dannyh.pdf">Политика в
              отношении обработки персональных данных</a> <span>|</span><br>
            <a target="_blanc"
              href="/wp-content/uploads/2024/08/polozhenie-o-zashhite-personalnyh-dannyh-klientov.pdf">Положение о
              защите персональных данных клиентов</a> <span>|</span><br>
            <a target="_blanc"
              href="/wp-content/uploads/2024/08/soglasie-posetitelej-sajta-na-obrabotku-personalnyh-dannyh.docx">Согласие
              посетителей сайта на обработку персональных данных</a> <span>|</span><br>
            <a target="_blanc" href="/wp-content/uploads/2024/08/soglasie-na-obrabotku-personalnyh-dannyh.docx">Согласие
              на обработку персональных данных</a>
          </div>

        </div>
      </div>










    </div>

  </div>
</div>
<?php wp_footer(); ?>




<script>
  //$('.lazyload').lazyload({threshold:0});
</script>













<div class="scr1">
  <script type="text/javascript">
    jQuery(document).ready(function ($) {
      function getTopOffset(e) {
        var y = 0;
        do { y += e.offsetTop; } while (e = e.offsetParent);
        return y;
      }
      var block = document.getElementById('fixblock'); /* fixblock - значение атрибута id блока */
      if (null != block) {
        var topPos = getTopOffset(block);
        window.onscroll = function () {
          var newcss = (topPos < window.pageYOffset) ?
            'top:0px; position: fixed;' : 'position:relative;';
          block.setAttribute('style', newcss);
        }
      }
    });
  </script>
</div>


<script type="text/javascript">
  document.addEventListener(
    'wpcf7mailsent',
    function (event) {
      yaCounter54686599.reachGoal('Записаться на консультацию c главной-кнопка');
    },
    false);
</script>

<script type="text/javascript">
  document.addEventListener('wpcf7mailsent', function (event) {
    gtag('event', 'send', {
      'event_category': 'Записаться на консультацию c главной-кнопк',
      'event_action': 'Submit'
    });
  }, false);
</script>

<script type="text/javascript">
  document.addEventListener(
    'wpcf7mailsent',
    function (event) {
      yaCounter54686599.reachGoal('клик обратный звонок');
    },
    false);
</script>

<script type="text/javascript">
  document.addEventListener('wpcf7mailsent', function (event) {
    gtag('event', 'send', {
      'event_category': 'клик обратный звонок',
      'event_action': 'Submit'
    });
  }, false);
</script>

<script type="text/javascript">
  document.addEventListener(
    'wpcf7mailsent',
    function (event) {
      yaCounter54686599.reachGoal('Клик по номеру телефона');
    },
    false);
</script>

<script type="text/javascript">
  document.addEventListener('wpcf7mailsent', function (event) {
    gtag('event', 'send', {
      'event_category': 'Клик по номеру телефона',
      'event_action': 'Submit'
    });
  }, false);
</script>

<script type="text/javascript">
  document.addEventListener('wpcf7mailsent', function sendMail(event) {
    if ('479' == event.detail.contactFormId) {
      gtag('event', 'send', {
        'event_category': 'zakazat-zvonok',
        'event_action': 'Submit'
      });
      yaCounter54686599.reachGoal('zakazat-zvonok');
    }
  }, false);
</script>

<script type="text/javascript">
  document.addEventListener('wpcf7mailsent', function sendMail(event) {
    if ('479' == event.detail.contactFormId) {
      gtag('event', 'send', {
        'event_category': 'Kontakti-zayavka',
        'event_action': 'Submit'
      });
      yaCounter54686599.reachGoal('Kontakti-zayavka');
    }
  }, false);
</script>

<script type="text/javascript">
  document.addEventListener('wpcf7mailsent', function sendMail(event) {
    if ('304' == event.detail.contactFormId) {
      gtag('event', 'send', {
        'event_category': 'Kontakti-zayavka',
        'event_action': 'Submit'
      });
      yaCounter54686599.reachGoal('Kontakti-zayavka');
    }
  }, false);
</script>

<script type="text/javascript">
  document.addEventListener('wpcf7mailsent', function sendMail(event) {
    if ('304' == event.detail.contactFormId) {
      gtag('event', 'send', {
        'event_category': 'Записаться на консультацию c главной-кнопка',
        'event_action': 'Submit'
      });
      yaCounter54686599.reachGoal('Записаться на консультацию c главной-кнопка');
    }
  }, false);
</script>

<script type="text/javascript">
  document.addEventListener(
    'wpcf7mailsent',
    function (event) {
      yaCounter54686599.reachGoal('press');
    },
    false);
</script>

<script type="text/javascript">
  document.addEventListener('wpcf7mailsent', function sendMail(event) {
    if ('324' == event.detail.contactFormId) {
      gtag('event', 'send', {
        'event_category': 'Заказать звонок',
        'event_action': 'Submit'
      });
      yaCounter54686599.reachGoal('Заказать звонок');
    }
  }, false);
</script>






<?php

global $askdata;
global $ansdata;

if ($askdata && $ansdata) {
  echo '
  <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [';

  for ($i = 0; $i < count($askdata); $i++) {
    echo '
        {
          "@type": "Question",
        "name": "' . $askdata[$i] . '",
        "acceptedAnswer": {
          "@type": "Answer",
        "text": "' . $ansdata[$i] . '"
          }
        }';
    if ($i != count($askdata) - 1) {
      echo ',';
    }
  }
  echo '
  ]
  }
</script>
';
}

// echo '<pre>';
// print_r($askdata);
// echo '</pre>';

// echo '<pre>';
// print_r($ansdata);
// echo '</pre>';
?>



<div class="bottom_fix">
  <a
    href="https://api.whatsapp.com/send/?phone=79138335065&text=%D0%9E%D0%B1%D1%80%D0%B0%D1%89%D0%B5%D0%BD%D0%B8%D0%B5+%D1%81+%D1%81%D0%B0%D0%B9%D1%82%D0%B0+%EF%BF%BD&type=phone_number&app_absent=0"><span
      class="wup"></span> WhatsApp</a>
  <a href="tel:+73912298121"><span class="bf_tel"></span> +7 391 229-81-21</a>
</div>





<!-- Yandex.Metrika counter -->
<script
  defer> (function (m, e, t, r, i, k, a) { m[i] = m[i] || function () { (m[i].a = m[i].a || []).push(arguments) }; m[i].l = 1 * new Date(); k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a) })(window, document, "script", "https://esthetique24.ru/wp-content/themes/estetiq/js/tag.js", "ym"); ym(54686599, "init", { clickmap: true, trackLinks: true, accurateTrackBounce: true, webvisor: true }); </script>
<noscript>
  <div><img src="https://mc.yandex.ru/watch/54686599" style="position:absolute; left:-9999px;" alt="" /></div>
</noscript> <!-- /Yandex.Metrika counter -->


<!-- Global site tag (gtag.js) - Google Analytics -->
<?php /* <script defer src="https://www.googletagmanager.com/gtag/js?id=UA-167177918-1"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-167177918-1');
</script> */ ?>







<script>
  /*$(document).ready(function() {
    var element = $(".sf-menu");
    var height_el = element.offset().top;
  
    $(".home").css({
      "width": element.outerWidth(),
      "height": element.outerHeight()
    });
 
    $(window).scroll(function() {
      if($(window).scrollTop() > height_el) {
        element.addClass("fixedm");
      } else {
        element.removeClass("fixedm");
      }
    });
  });*/
</script>





<script defer type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "url": "https://esthetique24.ru/",
      "logo": "https://esthetique24.ru/esthetique.png"
    }
    </script>






<!--<script src="https://game-lead.ru/set/60a631ebff67f99c8d369e9322cc1a7c"></script>-->



<!--<script class="lazy-script" data-src="https://esthetique24.ru/wp-content/themes/estetiq/js/callibri.js" charset="utf-8"></script>-->
<script class="lazy-script"
  data-src="//api.venyoo.ru/wnew.js?wc=venyoo/default/science&widget_id=6755342139797295"></script>

<script>
  jQuery(document).ready(function ($) {
    setTimeout(function () {
      $('.lazy-script').each(function () {
        $(this).attr('src', $(this).attr('data-src'));
      });
    }, 7000);
  });
</script>





</body>

</html>