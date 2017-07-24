<!-- =========================
   CONTACT US         
============================== -->

<?php 
	include 'partials/contactmail.php';
	
	if (emailsent()){		
?>
	
	
	<section class="separator-one" id="contact">
	<div class="color-overlay">
		<h3 class="container text wow fadeInLeft animated" data-wow-offset="30" data-wow-duration="1.5s" data-wow-delay="0.15s">
		Votre message a bien été transmis, nous vous contacterons dans les 24 heures. </h3>	
	</div>
	</section>  <!-- / END SEPARATOR -->
<?php
		}else{
?>

	<section class="contact-us" id="contact">
	<div class="container">
		
		<!-- SECTION HEADER -->
	        <div class="section-header">
			
			<!-- SECTION TITLE -->
			<h2 class="white-text">Nous contacter</h2>
			
			<!-- SHORT DESCRIPTION ABOUT THE SECTION -->
			<h6 class="white-text">
				Une question ? Transmettez nous un message. Nous vous répondons dans les 24 heures.
			</h6>
		</div>
		<!-- / END SECTION HEADER -->
		
		<!-- CONTACT FORM-->
		<div class="row">
			<form role="form" action="#contact" class="contact-form" method="post">
				<div class="wow fadeInLeft animated" data-wow-offset="30" data-wow-duration="1.5s" data-wow-delay="0.15s">
					<div class="col-lg-3 col-sm-4">
						<input type="text" name="name" placeholder="Votre Nom *" class="form-control input-box" 
							value="<?php echo(isset($_POST['name'])?$_POST['name']:'');?>" 
							required>
					</div>
					<div class="col-lg-3 col-sm-4">
						<input type="text" name="company" placeholder="Votre Société" class="form-control input-box" 
							value="<?php echo(isset($_POST['company'])?$_POST['company']:'');?>">
					</div>
					<div class="col-lg-4 col-sm-4">
						<input type="email" name="email" placeholder="Votre Email *" class="form-control input-box" 
							value="<?php echo(isset($_POST['email'])?$_POST['email']:'');?>"
							required>
					</div>
					<div class="col-lg-2 col-sm-4">
						<input type="tel" name="phone" placeholder="Votre Téléphone *" class="form-control input-box" 
							value="<?php echo(isset($_POST['phone'])?$_POST['phone']:'');?>"
							pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" 
							title="0156653514 ou format international : +33 (0) 1 56653514"
							required>
					</div>
				</div>
				<div class="wow fadeInLeft animated" data-wow-offset="30" data-wow-duration="1.5s" data-wow-delay="0.15s">
					<div class="col-lg-12 col-sm-4">
						<input type="text" name="subject" placeholder="Sujet *" class="form-control input-box" 
							value="<?php echo(isset($_POST['subject'])?$_POST['subject']:'');?>"
							required>
					</div>
				</div>
				
				<div class="col-md-12 wow fadeInRight animated" data-wow-offset="30" data-wow-duration="1.5s" data-wow-delay="0.15s">
					<textarea name="message" class="form-control textarea-box" placeholder="Votre message"><?php echo(isset($_POST['message'])?$_POST['message']:'');?></textarea>
				</div>
				<button class="btn btn-primary custom-button red-btn wow fadeInLeft animated" data-wow-offset="30" data-wow-duration="1.5s" data-wow-delay="0.15s" type="submit" name="send">Envoyer</button>
			</form>
		</div>
		<!-- / END CONTACT FORM-->
	</div> <!-- / END CONTAINER -->
	</section> <!-- / END CONTACT US SECTION-->
<?php
	}
?>