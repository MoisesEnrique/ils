<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->layout = false;

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace src/Template/Pages/home.ctp with your own version or re-enable debug mode.'
    );
endif;

$cakeDescription = 'ILS';
?>

<!DOCTYPE html>
<html lang="es">
<head>
<title>ILS</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Course Project">
<meta name="viewport" content="width=device-width, initial-scale=1">


    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('owl.carousel.css') ?>
    <?= $this->Html->css('owl.theme.default.css') ?>
    <?= $this->Html->css('animate.css') ?>
    <?= $this->Html->css('main_styles.css') ?>
    <?= $this->Html->css('responsive.css') ?>
    <?= $this->Html->css('fontawesome-all.css') ?>



	<?= $this->Html->script('jquery-3.2.1.min.js') ?>
	<?= $this->Html->script('popper.js') ?>
	<?= $this->Html->script('bootstrap.min.js') ?>
	<?= $this->Html->script('TweenMax.min.js') ?>
	<?= $this->Html->script('TimelineMax.min.js') ?>
	<?= $this->Html->script('ScrollMagic.min.js') ?>
	<?= $this->Html->script('animation.gsap.min.js') ?>
	<?= $this->Html->script('ScrollToPlugin.min.js') ?>
	<?= $this->Html->script('owl.carousel.js') ?>
	<?= $this->Html->script('jquery.scrollTo.min.js') ?>
	<?= $this->Html->script('easing.js') ?>
	<?= $this->Html->script('custom.js') ?>


</head>
<body>

<div class="super_container">

	<!-- Header -->

	<header class="header d-flex flex-row">
		<div class="header_content d-flex flex-row align-items-center">
			<!-- Logo -->
			<div class="logo_container">
				<div class="logo">
					<?= $this->Html->image('logo.png', ['alt' => 'logo']) ?>

					<span> </span>
				</div>
			</div>

			<!-- Main Navigation -->
			<nav class="main_nav_container">
				<div class="main_nav">
					<ul class="main_nav_list">
						<li class="main_nav_item"><?php echo $this->Html->link(__('Inicio'), ['controller' => 'Pages','action' => 'index']) ?> </li>


						<li class="main_nav_item"><?php echo $this->Html->link(__('Quienes Somos'), ['controller' => 'Pages','action' => 'about']) ?></li>
						<li class="main_nav_item dropbtn"><a href="#">programas profesionales</a>
					    	<div class="dropdown-content">
					     		<?php echo $this->Html->link(__('Computacion e Informática'), ['controller' => 'Pages','action' => 'computacion']) ?>
					     		<?php echo $this->Html->link(__('Contabilidad'), ['controller' => 'Pages','action' => 'contabilidad']) ?>
					      		<?php echo $this->Html->link(__('Administración'), ['controller' => 'Pages','action' => 'administracion']) ?>
					    	</div>
						</li>

						
							<?php if (is_null($this->request->session()->read('Auth.User'))) { ?>
								<li class="main_nav_item">
								<?php echo $this->Html->link(__('Login'), ['controller' => 'Users','action' => 'login', '_full'=>true]); ?> </li>
							<?php
							}
							else { ?>
								<li class="main_nav_item">
								<?php echo $this->Html->link(__('Intranet'), ['controller' => 'Users','action' => 'view',$current_user['id'], '_full'=>true]); ?> </li>

								<li class="main_nav_item">
								<?php echo $this->Html->link($current_user['name'].' '.__('(Logout)'), ['controller' => 'Users','action' => 'logout', '_full'=>true]); ?> </li>
							<?php
							}
						?>
						
					</ul>
				</div>
			</nav>
		</div>
		<div class="header_side d-flex flex-row justify-content-center align-items-center">
			<?= $this->Html->image('phone-call.svg', ['alt' => 'logo']) ?>
			<span>+(054)211-936 </span>
		</div>

		<!-- Hamburger -->
		<div class="hamburger_container">
			<i class="fas trans_200">Menu</i>
		</div>

	</header>
	
	<!-- Menu -->
	<div class="menu_container menu_mm">

		<!-- Menu Close Button -->
		<div class="menu_close_container">
			<div class="menu_close"></div>
		</div>

		<!-- Menu Items -->
		<div class="menu_inner menu_mm">
			<div class="menu menu_mm">
				<ul class="menu_list menu_mm">
					<li class="menu_item menu_mm"><?php echo $this->Html->link(__('Inicio'), ['controller' => 'Pages','action' => 'index']) ?></li>
					<li class="menu_item menu_mm"><?php echo $this->Html->link(__('Quienes Somos'), ['controller' => 'Pages','action' => 'about']) ?></li>
					<li class="menu_item menu_mm"><a href="#">Programas Profesionales</a></li>
					<li class="menu_item menu_mm"><?php echo $this->Html->link(__('Computacion e Informática'), ['controller' => 'Pages','action' => 'computacion']) ?></li>
					<li class="menu_item menu_mm"><?php echo $this->Html->link(__('Contabilidad'), ['controller' => 'Pages','action' => 'contabilidad']) ?></li>
					<li class="menu_item menu_mm"><?php echo $this->Html->link(__('Administración'), ['controller' => 'Pages','action' => 'administracion']) ?></li>

					<?php if (is_null($this->request->session()->read('Auth.User'))) { ?>
						<li class="menu_item menu_mm">
						<?php echo $this->Html->link(__('Login'), ['controller' => 'Users','action' => 'login', '_full'=>true]); ?> </li>
					<?php
					}
					else { ?>
						<li class="menu_item menu_mm">
						<?php echo $this->Html->link(__('Intranet'), ['controller' => 'Users','action' => 'view', $current_user['id'],  '_full'=>true]); ?> </li>

						<li class="menu_item menu_mm">
						<?php echo $this->Html->link($current_user['name'].' '.__('(Logout)'), ['controller' => 'Users','action' => 'logout', '_full'=>true]); ?> </li>
					<?php
					}
					?>
				</ul>

				<div class="menu_copyright menu_mm">
					Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | ILS <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://www.youtube.com/SkyFk" target="_blank">Fk</a>
				</div>
			</div>

		</div>

	</div>
	
	<!-- Home -->

	<div class="home">

		<!-- Hero Slider -->
		<div class="hero_slider_container">
			<div class="hero_slider owl-carousel">
				
				<!-- Hero Slide -->
				<div class="hero_slide">
					<div class="hero_slide_background" style="background-image: url(<?php echo $this->Url->image('slider_background.jpg') ?>)" ></div>				
					<div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
						<div class="hero_slide_content text-center">
							<h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">¡Tu <span>éxito</span> comienza Aqui!</h1>
						</div>
					</div>
				</div>
				
				<!-- Hero Slide -->
				<div class="hero_slide">
					<div class="hero_slide_background" style="background-image: url(<?php echo $this->Url->image('banner3.png') ?>)"></div>
					<div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
						<div class="hero_slide_content text-center">
							<h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">El éxito es el <span>Resultado</span> de la <span>Persistencia</h1>
						</div>
					</div>
				</div>
				
				<!-- Hero Slide -->
				<div class="hero_slide">
					<div class="hero_slide_background" style="background-image: url(<?php echo $this->Url->image('banner2.jpg') ?>)"></div>
					<div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
						<div class="hero_slide_content text-center">
							<h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut"></h1>
						</div>
					</div>
				</div>

			</div>

			<div class="hero_slider_left hero_slider_nav trans_200"><span class="trans_200">&#10094; </span></div>
			<div class="hero_slider_right hero_slider_nav trans_200"><span class="trans_200">&#10095; </span></div>
		</div>

	</div>

	<div class="hero_boxes">
		<div class="hero_boxes_inner">
			<div class="container">
				<div class="row">

					<div class="col-lg-4 hero_box_col">
						<div class="hero_box d-flex flex-row align-items-center justify-content-start">
							
							<?= $this->Html->image('escudo-2.png', ['alt' => 'logo']) ?>
							<div class="hero_box_content">
								<h2 class="hero_box_title">CÓMPUTO E INFORMÁTICA</h2>
								<?= $this->Html->link(
								    'Ver Más',
								    ['controller' => 'Pages','action' => 'computacion'],
								    ['class' => 'hero_box_link']
								) ?>
							</div>
						</div>
					</div>

					<div class="col-lg-4 hero_box_col">
						<div class="hero_box d-flex flex-row align-items-center justify-content-start">
							<?= $this->Html->image('escudo-1.png', ['alt' => 'logo']) ?>

							<div class="hero_box_content">
								<h2 class="hero_box_title">ADMINISTRACIÓN DE EMPRESAS</h2>

								<?= $this->Html->link(
								    'Ver Más',
								    ['controller' => 'Pages','action' => 'administracion'],
								    ['class' => 'hero_box_link']
								) ?>

							</div>
						</div>
					</div>

					<div class="col-lg-4 hero_box_col">
						<div class="hero_box d-flex flex-row align-items-center justify-content-start">
							<?= $this->Html->image('escudo-3.png', ['alt' => 'logo']) ?>
							<div class="hero_box_content">
								<h2 class="hero_box_title">CONTABILIDAD</h2>
								<?= $this->Html->link(
								    'Ver Más',
								    ['controller' => 'Pages','action' => 'contabilidad'],
								    ['class' => 'hero_box_link']
								) ?>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- Popular -->

	<div class="popular page_section">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h1>CONOCE NUESTROS PROGRAMAS DE FORMACION CONTINUA</h1>
					</div>
				</div>
			</div>

			<div class="row course_boxes">
				
				<!-- Popular Course Item -->
				<div class="col-lg-4 course_box">
					<div class="card">
						<?= $this->Html->image('img2.jpg', ['class'=>'card-img-top','alt' => 'logo']) ?>
						<div class="card-body text-center">
							<div class="card-title"><a href="courses.html">Especialista en Microsoft Office</a></div>
							<div class="card-text">Básico - Avanzado</div>
						</div>
						<!-- <div class="price_box d-flex flex-row align-items-center">
							<div class="course_author_image">
								<img src="images/author.jpg" alt="https://unsplash.com/@mehdizadeh">
							</div>
							<div class="course_author_name">Michael Smith, <span>Author</span></div>
							<div class="course_price d-flex flex-column align-items-center justify-content-center"><span>$29</span></div>
						</div>-->
					</div>
				</div>

				<!-- Popular Course Item -->
				<div class="col-lg-4 course_box">
					<div class="card">
						<?= $this->Html->image('img1.jpg', ['class'=>'card-img-top','alt' => 'logo']) ?>
						<div class="card-body text-center">
							<div class="card-title"><a href="courses.html">Certificación en Docencia Superior</a></div>
							<div class="card-text">Establecido en el Art. 72 de la Ley 30512 del Fortalecimiento de Capacidades de los Docentes de la Institución</div>
						</div>
						<!-- <div class="price_box d-flex flex-row align-items-center">
							<div class="course_author_image">
								<img src="images/author.jpg" alt="https://unsplash.com/@mehdizadeh">
							</div>
							<div class="course_author_name">Michael Smith, <span>Author</span></div>
							<div class="course_price d-flex flex-column align-items-center justify-content-center"><span>$29</span></div>
						</div> -->
					</div>
				</div>

				<!-- Popular Course Item -->
				<div class="col-lg-4 course_box">
					<div class="card">
						<?= $this->Html->image('img3.jpg', ['class'=>'card-img-top','alt' => 'logo']) ?>
						<div class="card-body text-center">
							<div class="card-title"><a href="courses.html">Asistente Logístico</a></div>
							<div class="card-text">Especialízate en Logística</div>
						</div>
						<!-- <div class="price_box d-flex flex-row align-items-center">
							<div class="course_author_image">
								<img src="images/author.jpg" alt="https://unsplash.com/@mehdizadeh">
							</div>
							<div class="course_author_name">Michael Smith, <span>Author</span></div>
							<div class="course_price d-flex flex-column align-items-center justify-content-center"><span>$29</span></div>
						</div>-->
					</div>
				</div>
			</div>
		</div>		
	</div>

	<!-- Register -->

	<div class="register">

		<div class="container-fluid">
			
			<div class="row row-eq-height">
				<div class="col-lg-6 nopadding">
					
					<!-- Register -->

					<div class="register_section d-flex flex-column align-items-center justify-content-center">
						<div class="register_content text-center">
							<h1 class="register_title">INSCRIBETE EN JULIO Y OBTÉN EL <span>50%</span> EN EL PRIMER PAGO.</h1>
							<br>
							<h1 class="register_title dif">INICIO DE CLASES: </h1>
							<h1 class="register_title dif"><span> 05 DE AGOSTO</span> </h1>
							<!-- <div class="button button_1 register_button mx-auto trans_200"><a href="#">register now</a></div> -->
						</div>
					</div>

				</div>

				<div class="col-lg-6 nopadding">
					
					<!-- Search -->

					<div class="search_section d-flex flex-column align-items-center justify-content-center">
						<div class="search_background" style="background-image: url(<?php echo $this->Url->image('search_background.jpg') ?>)"></div>

						<div class="search_content text-center">
							<h1 class="search_title">INFORMES</h1>
							<form id="search_form" class="search_form" action="post">
								<input id="search_form_name" class="input_field search_form_name" type="text" placeholder="Nombre" required="required" data-error="Name is required.">
								<input id="search_form_category" class="input_field search_form_category" type="text" placeholder="Correo Electronico" required="required" data-error="Correo is required.">
								<input id="search_form_degree" class="input_field search_form_degree" type="text" placeholder="Telefono" required="required" data-error="Telefono is required.">>
								<button id="search_submit_button" type="submit" class="search_submit_button trans_200" value="Submit">ENVIAR</button>
							</form>
						</div> 
					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- Services -->

	<div class="services page_section" style="background-image:url(<?php echo $this->Url->image('atardecer.jpg') ?>">
		
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title title1 text-center">
						<h1>Nuestros Servicios</h1>
						<p class="parrafo1">Descubre más de lo que te ofrece el Instituto Latinoamericano Siglo XXI, tenemos 9 años formando Técnicos Profesionales en la ciudad de Arequipa, comprometidos con el desarrollo y la educación de más Arequipeños 
							<br> ¡Conoce nuestro innovador modelo educativo!</p>
					</div>
				</div>
			</div>

			<div class="row services_row">

				<div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
					<div class="icon_container d-flex flex-column justify-content-end">

						<?= $this->Html->image('earth-globe.svg') ?>

					</div>
					<h3>Innovación</h3>
					<p>Nuestra metodología única está alineada a los procesos de innovación más potentes del Peru. ¡Descubre un mundo de infinitas posibilidades!  </p>
				</div>

				<div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
					<div class="icon_container d-flex flex-column justify-content-end">
						<?= $this->Html->image('exam.svg') ?>

					</div>
					<h3>Creatividad</h3>
					<p>¡Pioneros en Perú! Somos la primera institución educativa en nuestro país en formar profesionales creativos desde hace 9 años.</p>
				</div>

				<div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
					<div class="icon_container d-flex flex-column justify-content-end">
						<?= $this->Html->image('books.svg') ?>
					</div>
					<h3>Calidad Educativa</h3>
					<p>Contamos con acreditaciones en diversos programas y tenemos el licenciamiento del MINEDU para nuestras carreras de 3 años.</p>
				</div>

				<div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
					<div class="icon_container d-flex flex-column justify-content-end">
						<?= $this->Html->image('professor.svg') ?>
					</div>
					<h3>Aliados Estratégicos</h3>
					<p>Tenemos como aliados a SISE y CISCO</p>
				</div>

				<div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
					<div class="icon_container d-flex flex-column justify-content-end">
						<?= $this->Html->image('blackboard.svg') ?>
					</div>
					<h3>Convenios</h3>
					<p>¡Alista tus maletas y prepárate para viajar! Tenemos importantes alianzas con institutos y universidades de gran prestigio en todo el Peru.</p>
				</div>

				<div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
					<div class="icon_container d-flex flex-column justify-content-end">
						<?= $this->Html->image('mortarboard.svg') ?>
					</div>
					<h3>Certificación Modular</h3>
					<p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.</p>
				</div>

			</div>
		</div>
	</div>

	<!-- Testimonials -->



	<!-- Events -->

	<div class="events page_section">
		<div class="container">
			
			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h1>Próximos Eventos</h1>
					</div>
				</div>
			</div>
			
			<div class="event_items">

				<!-- Event Item -->
				<div class="row event_item">
					<div class="col">
						<div class="row d-flex flex-row align-items-end">

							<div class="col-lg-2 order-lg-1 order-2">
								<div class="event_date d-flex flex-column align-items-center justify-content-center">
									<div class="event_day">05</div>
									<div class="event_month">Julio</div>
								</div>
							</div>

							<div class="col-lg-6 order-lg-2 order-3">
								<div class="event_content">
									<div class="event_name"><a class="trans_200" href="#">FIESTA ILS 2019</a></div>
									<div class="event_location">Grand Central Park</div>
									<p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor.</p>
								</div>
							</div>

							<div class="col-lg-4 order-lg-3 order-1">
								<div class="event_image">
									<?= $this->Html->image('event_1.jpg', ['alt' => 'logo']) ?>
								</div>
							</div>

						</div>	
					</div>
				</div>

				<!-- Event Item -->
				<div class="row event_item">
					<div class="col">
						<div class="row d-flex flex-row align-items-end">

							<div class="col-lg-2 order-lg-1 order-2">
								<div class="event_date d-flex flex-column align-items-center justify-content-center">
									<div class="event_day">19</div>
									<div class="event_month">Julio</div>
								</div>
							</div>

							<div class="col-lg-6 order-lg-2 order-3">
								<div class="event_content">
									<div class="event_name"><a class="trans_200" href="#">CURSO-TALLER</a></div>
									<div class="event_location">Av. Independencia 339</div>
									<p>Seber vender para poder emprender.</p>
								</div>
							</div>

							<div class="col-lg-4 order-lg-3 order-1">
								<div class="event_image">
									<?= $this->Html->image('img4.jpg', ['alt' => 'logo']) ?>

								</div>
							</div>

						</div>	
					</div>
				</div>

				<!-- Event Item -->
				<div class="row event_item">
					<div class="col">
						<div class="row d-flex flex-row align-items-end">

							<div class="col-lg-2 order-lg-1 order-2">
								<div class="event_date d-flex flex-column align-items-center justify-content-center">
									<div class="event_day">25</div>
									<div class="event_month">Agosto</div>
								</div>
							</div>

							<div class="col-lg-6 order-lg-2 order-3">
								<div class="event_content">
									<div class="event_name"><a class="trans_200" href="#">CEREMONIA DE GRADUACIÓN</a></div>
									<div class="event_location">Auditorio Central</div>
									<p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor.</p>
								</div>
							</div>

							<div class="col-lg-4 order-lg-3 order-1">
								<div class="event_image">
									<?= $this->Html->image('event_3.jpg', ['alt' => 'logo']) ?>
								</div>
							</div>

						</div>	
					</div>
				</div>

			</div>
				
		</div>
	</div>

	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			
			<!-- Newsletter -->

			<div class="newsletter">
				<div class="row">
					<div class="col">
						<div class="section_title text-center">
							<h1>Suscríbete a nuestro Newsletter</h1>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col text-center">
						<div class="newsletter_form_container mx-auto">
							<form action="post">
								<div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-center">
									<input id="newsletter_email" class="newsletter_email" type="email" placeholder="Email" required="required" data-error="Valid email is required.">
									<button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">Subscribete</button>
								</div>
							</form>
						</div>
					</div>
				</div>

			</div>

			<!-- Footer Content -->

			<div class="footer_content">
				<div class="row">

					<!-- Footer Column - About -->
					<div class="col-lg-3 footer_col">

						<!-- Logo -->
						<div class="logo_container">
							<div class="logo">
								<?= $this->Html->image('logo.png') ?>
								<span> </span>
							</div>
						</div>

						<p class="footer_about_text"></p>

					</div>

					<!-- Footer Column - Menu -->

					<div class="col-lg-3 footer_col">
						<div class="footer_column_title">Menu</div>
						<div class="footer_column_content">
							<ul>
								<li class="footer_list_item"><?php echo $this->Html->link(__('Inicio'), ['controller' => 'Pages','action' => 'index']) ?></li>
								<li class="footer_list_item"><?php echo $this->Html->link(__('Quienes Somos'), ['controller' => 'Pages','action' => 'about']) ?></li>
								<li class="footer_list_item"><?php echo $this->Html->link(__('Intranet'), ['controller' => 'Users','action' => 'view', $current_user['id'], '_full'=>true]); ?></li>

							</ul>
						</div>
					</div>

					<!-- Footer Column - Usefull Links -->

					<div class="col-lg-3 footer_col">
						<div class="footer_column_title">Programas Profesionales</div>
						<div class="footer_column_content">
							<ul>
								<li class="footer_list_item"><?php echo $this->Html->link(__('Computacion e Informática'), ['controller' => 'Pages','action' => 'computacion']) ?></li>
								<li class="footer_list_item"><?php echo $this->Html->link(__('Contabilidad'), ['controller' => 'Pages','action' => 'contabilidad']) ?></li>
								<li class="footer_list_item"><?php echo $this->Html->link(__('Administración'), ['controller' => 'Pages','action' => 'administracion']) ?></li>
							</ul>
						</div>
					</div>

					<!-- Footer Column - Contact -->

					<div class="col-lg-3 footer_col">
						<div class="footer_column_title">Contacto</div>
						<div class="footer_column_content">
							<ul>
								<li class="footer_contact_item">
									<div class="footer_contact_icon">
										<?= $this->Html->image('placeholder.svg') ?>
									</div>
									Av. Independencia 339
								</li>
								<li class="footer_contact_item">
									<div class="footer_contact_icon">
										<?= $this->Html->image('smartphone.svg') ?>
									</div>
									(054)211-936
								</li>
								<li class="footer_contact_item">
									<div class="footer_contact_icon">
										<?= $this->Html->image('envelope.svg') ?>
									</div>
									informes@ils.edu.pe
								</li>
							</ul>
						</div>
					</div>

				</div>
			</div>

			<!-- Footer Copyright -->

			<div class="footer_bar d-flex flex-column flex-sm-row align-items-center">
				<div class="footer_copyright">
					<span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | ILS <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://www.youtube.com/SkyFk" target="_blank">Fk</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
				</div>
				<div class="footer_social ml-sm-auto">
					<ul class="menu_social">
						<li class="menu_social_item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
						<li class="menu_social_item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
						<li class="menu_social_item"><a href="#"><i class="fab fa-instagram"></i></a></li>
						<li class="menu_social_item"><a href="https://www.facebook.com/pg/SiseArequipa"><i class="fab fa-facebook-f"></i></a></li>
						<li class="menu_social_item"><a href="#"><i class="fab fa-twitter"></i></a></li>
					</ul>
				</div>
			</div>

		</div>
	</footer>

</div>



</body>
</html>