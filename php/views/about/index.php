<?php
    include ROOT . '/php/views/layouts/header.php';
?>

<script>
    menu_items = document.getElementsByClassName("nav-item");
    for (var i = 0; i < menu_items.length; i++) {
        if (i == 0) {
            menu_items[i].classList.add('active');
        } else {
            menu_items[i].classList.remove('active');
        }
    }
	$('body').css('overflow', '');
</script>

<section class="hero-wrap js-fullheight">
  	<div class="bg-home"></div>
  	<div class="container">
    	<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-end">
      		<div class="col-md-12 text-center ftco-animate">
        		<h1 class="mt-5 cut_txt" data-stellar-background-ratio="0.5"><br>О НАС</h1>
      		</div>
    	</div>
  	</div>
</section>

<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center mb-5">
      		<div class="col-md-10 heading-section text-center ftco-animate">
      			<span class="subheading">
      				<i class="db-left"></i>
					<span class="label3">Начни своё приключение</span>
      				<i class="db-right"></i>
      			</span>
      		</div>
    	</div>
		<div class="row adv-section">
			<div class="col-md-8">
				<div id="adv-img" class="pricing-wrap ftco-animate img">
				</div>
			</div>
			<div class="col-md-4">
				<div class="ftco-animate img">
					<div class="text p-4 d-flex align-items-top">
						<div>
							<p>Может сани и надо готовить летом, а вот
								летний отпуск совершенно точно - зимой. Туристическое
								агенство ARTour старается удовлетворить самые изысканные
								запросы наших туристов. Мы работаем, чтоб вы отдыхали и
								надеемся, что наше агентство станет для вас добрым другом
								на долгие годы.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-counter ftco-bg-dark img" id="section-counter" data-stellar-background-ratio="0.5">
</section>

<section class="ftco-section ftco-no-pb ftco-no-pt" id="one">
	<div class="container">
		<div class="row justify-content-center mb-5">
      		<div class="col-md-10 heading-section text-center ftco-animate">
      			<span class="subheading">
      				<i class="db-left"></i>
					<span class="label3">С нами надежно</span>
      				<i class="db-right"></i>
      			</span>
      		</div>
    	</div>
		<div class="row">
			<div class="col-md-6 img img-2 order-md-last" id="diving">
				
			</div>
			<div class="col-md-6 py-5">
				<div class="program d-flex ftco-animate">
					<div class="icon d-flex mr-lg-3 justify-content-center align-items-center order-lg-last">
						<img src="../../../img/icon/plane.png" alt="" style='width: 50%;'>
					</div>
					<div class="text ml-5 mr-lg-4 text-lg-left">
						<h3>Турагенство или больше?</h3>
						<p>Где отдохнуть? Как отдохнуть? Выбор очень не простой.
							Наше агенство поможетвам определится с выбором лучшего
							отдыха по вполне адекватным ценам.
						</p>
					</div>
				</div>
				<div class="program d-flex ftco-animate">
					<div class="icon d-flex mr-lg-3 justify-content-center align-items-center order-lg-last">
						<img src="../../../img/icon/shield.png" alt="" style='width: 60%;'>
					</div>
					<div class="text ml-5 mr-lg-4 text-lg-left">
						<h3>Ваши безопасность и здоровье превыше всего</h3>
						<p>Спуститься в глубины океана или поднятся к облакам. Отдых
							может быть экстримальным и не очень, пассивным и
							активным. И всегда рядом с вами будут опытные
							инструкторы, которые помогут освоить вам аквалаг,
							серфинг или парашют.
						</p>
					</div>
				</div> 
				<div class="program d-flex ftco-animate">
					<div class="icon d-flex mr-lg-3 justify-content-center align-items-center order-lg-last">
						<img src="../../../img/icon/earth.png" alt="" style='width: 50%;'>
					</div>
					<div class="text ml-5 mr-lg-4 text-lg-left">
						<h3>Весь мир у ваших ног</h3>
						<p>История упоминает о семи чудесах света. На самом деле их
							значительно больше. Большой Каньон на реке Колорадо или
							Алтын Емель, водопад Виктория или Ниагара. Увидеть не земные
							красоты нашей планеты в ваших силах. Нужно только захотеть.
							А агенство ARTour вам поможет.
						</p>
					</div>
				</div>
				<div class="program d-flex ftco-animate">
					<div class="icon d-flex mr-lg-3 justify-content-center align-items-center order-lg-last">
						<img src="../../../img/icon/palme.png" alt="" style='width: 50%;'>
					</div>
					<div class="text ml-5 mr-lg-4 text-lg-left">
						<h3>Наши преимущества</h3>
						<p>Наше главное преимущество в том, что мы молодая и дружная команда,
							которая каждый день стремится к новым высотам. Наша цель держаться
							на уровне ведущих турагентств. Это дает стимул расти и обучаться
							каждый день.
						</p>
					</div>
				</div>
				<div class="program d-flex ftco-animate">
					<div class="icon d-flex mr-lg-3 justify-content-center align-items-center order-lg-last">
						<img src="../../../img/icon/bags.png" alt="" style='width: 50%;'>
					</div>
					<div class="text ml-5 mr-lg-4 text-lg-left">
						<h3>В путь</h3>
						<p>
							И так. Вы выбрали наше агентство и решили, где провести летний отпуск.
							Смело переходите на <a href="/tours" class="link-item"><b>страницу поиска тура</b></a>.
							Мы искренне надеемся, что вам
							понравятся услуги нашего агентства.
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
    include ROOT . '/php/views/layouts/footer.php';
?>