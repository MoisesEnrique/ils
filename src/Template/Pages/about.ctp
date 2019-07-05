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
<html lang="en">
<head>
<title>About</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Course Project">
<meta name="viewport" content="width=device-width, initial-scale=1">

    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('fontawesome-all.css') ?>
    <?= $this->Html->css('elements_styles.css') ?>
    <?= $this->Html->css('elements_responsive.css') ?>

	<?= $this->Html->script('jquery-3.2.1.min.js') ?>
	<?= $this->Html->script('popper.js') ?>
	<?= $this->Html->script('bootstrap.min.js') ?>
	<?= $this->Html->script('TweenMax.min.js') ?>
	<?= $this->Html->script('TimelineMax.min.js') ?>
	<?= $this->Html->script('ScrollMagic.min.js') ?>
	<?= $this->Html->script('animation.gsap.min.js') ?>
	<?= $this->Html->script('ScrollToPlugin.min.js') ?>
	<?= $this->Html->script('progressbar.min.js') ?>
	<?= $this->Html->script('jquery.scrollTo.min.js') ?>
	<?= $this->Html->script('easing.js') ?>
	<?= $this->Html->script('elements_custom.js') ?>

        

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
								<?php echo $this->Html->link(__('Intranet'), ['controller' => 'Users','action' => 'view', $current_user['id'], '_full'=>true]); ?> </li>
							


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

			<span>+(054)211-936</span>
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
		<div class="home_background_container prlx_parent">
			<div class="home_background prlx" style="background-image:url(<?php echo $this->Url->image('Carrera-de-negocios1.png') ?>)"></div>
		</div>
		<div class="home_content">
			<h1>QUIENES SOMOS</h1>
		</div>
	</div>

	<!-- Elements -->

	<div class="elements">

		<!-- Progress Bars and Accordions -->

		<div class="pbars_accordions">
			<div class="container">


				<div class="row pbars_accordions_container">
					<!-- Progress Bars & Accordions -->

					<div class="col-lg-6">
						
						<!-- Progress Bars -->
						<div class="elements_progress_bars">

							<div class="elements_title">IDENTIDAD DEL INSTITUTO</div>

							<div class="pbar_container">
								<p>El Instituto de Educación Superior Tecnológico Privado “LATINOAMERICANO SIGLO XXI” es una institución educativa orientada a formar y capacitar profesionales técnicos con alta calidad humanista, filosófica, científica y tecnológica.</p>

								<p>La Institución goza de autonomía integral en lo académico, administrativo y económico dependiendo del Ministerio de Educación y de la Dirección Regional de Educación de Arequipa como órganos normativos, de asesoramiento y supervisión.  Funciona como una entidad de derecho privado con valor oficial razón por la que se obliga a coordinar con la autoridad educativa del sector para el normal desarrollo de las actividades educativas.</p>
							</div>

							<div class="pbar_container">
								<?= $this->Html->image('mision1.jpg', ['alt' => 'logo']) ?>
							</div>

							<div class="elements_title">VISIÓN</div>

							<div class="pbar_container">
								<p>Al 2022 ser la institución Superior Técnica más reconocida por el modelo de enseñanza-aprendizaje diferenciado de enseñanza y por sus características de innovación, emprendimiento, liderazgo y calidad en el servicio educativo en la Región Sur del País.</p>
							</div>

						</div>
					</div>

					<div class="col-lg-6">

						<div class="pbar_container">
								<?= $this->Html->image('nota-egresados-sise-01.jpg', ['alt' => 'logo']) ?>
						</div>

						<div class="elements_title">MISIÓN</div>

						<div class="pbar_container">
								<p>Somos una institución educativa superior con énfasis en ciencia y tecnología, que promueve el desarrollo y valores en la sociedad y que responde a exigencias del ámbito productivo en un mundo globalizado.</p>
						</div>

						<div class="pbar_container">
								<?= $this->Html->image('vision1.jpg', ['alt' => 'logo']) ?>
						</div>

						
					</div>

				</div>
			</div>
		</div>
		
		<!-- Loaders -->

		<div class="loaders">
			<div class="container">
					<!-- Accordions -->
				
					<div class="col">
						<div class="elements_title">VALORES Y APTITUDES</div>
						<br>
					</div>
				

						<div class="elements_accordions">

							<div class="accordion_container">
								<div class="accordion d-flex flex-row align-items-center"> Pensamiento Estratégico</div>
								<div class="accordion_panel">
									<p>El pensamiento crítico y analítico será la guía del quehacer académico, que nos permita una adecuada toma de decisiones estratégicas, basadas en el juicio y la experiencia para determinar niveles de dirección futura.</p>
								</div>
							</div>

							<div class="accordion_container">
								<div class="accordion d-flex flex-row align-items-center"> Emprendimiento con Investigación</div>
								<div class="accordion_panel">
									<p>El emprendimiento, como aptitud y actitud innovadora de nuestra comunidad académica, orientara al desarrollo de nuevos proyectos que serán el resultado de procesos de investigación, de esta forma buscamos soluciones con innovación y emprendimiento.</p>
								</div>
							</div>

							<div class="accordion_container">
								<div class="accordion d-flex flex-row align-items-center"> Integridad</div>
								<div class="accordion_panel">
									<p>Los valores y principios serán el centro y preocupación del quehacer diario, las decisiones del comportamiento individual y grupal deben orientar al desarrollo integral de la persona humana.</p>
								</div>
							</div>

							<div class="accordion_container">
								<div class="accordion d-flex flex-row align-items-center"> Coraje</div>
								<div class="accordion_panel">
									<p>Toda acción personal y profesional debe contener el valor, la decisión y el apasionamiento con que se enfrentan las dificultades y obstáculos, el coraje potencia la visión empresarial y el liderazgo, propicia el desarrollo corporativo, se anticipa al cambio con creatividad y siempre orienta al éxito.</p>
								</div>
							</div>

						</div>

			</div>
		</div>
		
		<!-- Milestones -->
		
		<div class="milestones">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="elements_title">LOGROS OBTENIDOS</div>
					</div>
				</div>
			</div>

			<div class="milestones_container">
				<div class="milestones_background" style="background-image:url(<?php echo $this->Url->image('milestones_background.jpg')?>)"></div>
				
				<div class="container">
					<div class="row">
						
						<!-- Milestone -->
						<div class="col-lg-3 milestone_col">
							<div class="milestone text-center">
								<div class="milestone_icon"><?= $this->Html->image('milestone_1.svg', ['alt' => 'logo']) ?></div>
								<div class="milestone_counter" data-end-value="550">0</div>
								<div class="milestone_text">Estudiantes Actuales</div>
							</div>
						</div>

						<!-- Milestone -->
						<div class="col-lg-3 milestone_col">
							<div class="milestone text-center">
								<div class="milestone_icon"><?= $this->Html->image('milestone_2.svg', ['alt' => 'logo']) ?> </div>
								<div class="milestone_counter" data-end-value="45">0</div>
								<div class="milestone_text">Maestros Certificados</div>
							</div>
						</div>

						<!-- Milestone -->
						<div class="col-lg-3 milestone_col">
							<div class="milestone text-center">
								<div class="milestone_icon"><?= $this->Html->image('milestone_3.svg', ['alt' => 'logo']) ?> </div>
								<div class="milestone_counter" data-end-value="8">0</div>
								<div class="milestone_text">Programas Ofertados</div>
							</div>
						</div>

						<!-- Milestone -->
						<div class="col-lg-3 milestone_col">
							<div class="milestone text-center">
								<div class="milestone_icon"><?= $this->Html->image('milestone_4.svg', ['alt' => 'logo']) ?> </div>
								<div class="milestone_counter" data-end-value="1000" data-sign-before="+">0</div>
								<div class="milestone_text">Estudiantes Certificados</div>
							</div>
						</div>

					</div>
				</div>
			</div>

		</div>

		<div class="icon_boxes">
			<div class="container"></div>
		</div>

		<!-- Icon Boxes 

		<div class="icon_boxes">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="elements_title">Icon Boxes</div>
					</div>
				</div>

				<div class="row icon_boxes_container">

					<div class="col-lg-4 icon_box text-left d-flex flex-column align-items-start justify-content-start">
						<div class="icon_container d-flex flex-column justify-content-end">
							<img src="images/earth-globe.svg" alt="">
						</div>
						<h3>Online Courses</h3>
						<p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.</p>
					</div>

					<div class="col-lg-4 icon_box text-left d-flex flex-column align-items-start justify-content-start">
						<div class="icon_container d-flex flex-column justify-content-end">
							<img src="images/exam.svg" alt="">
						</div>
						<h3>Indoor Courses</h3>
						<p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.</p>
					</div>

					<div class="col-lg-4 icon_box text-left d-flex flex-column align-items-start justify-content-start">
						<div class="icon_container d-flex flex-column justify-content-end">
							<img src="images/books.svg" alt="">
						</div>
						<h3>Amazing Library</h3>
						<p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.</p>
					</div>

				</div>

			</div>
		</div>

	</div>



	-->

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