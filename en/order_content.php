<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 30/06/2017
 * Time: 12:38
 */?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Freelance</title>

    <?php include_once 'head.php';?>
</head>
<body>

<!-- START #fh5co-header -->
<?php include_once 'menu.php'?>

<!-- START #fh5co-hero -->
<aside id="fh5co-hero" style="background-image: url(../public/assets/images/hero.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="fh5co-hero-wrap">
                    <div class="fh5co-hero-intro">
                        <h2>Get Started<span></span></h2>
                        <h1>PLACE YOUR ORDER</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>

<div id="fh5co-main">

<section>
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<h2 class="fh5co-uppercase-heading-sm text-center">Form</h2>
								<div class="fh5co-spacer fh5co-spacer-sm"></div>
							</div>
							<div class="col-md-8 col-md-offset-2">
								<form action="#" method="post">
									<div class="col-md-6">
										<div class="form-group">
											<label for="name" class="sr-only">Email</label>
											<input placeholder="Name" id="name" type="text" class="form-control input-lg">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="email" class="sr-only">Email</label>
											<input placeholder="Email" id="email" type="text" class="form-control input-lg">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="gender" class="sr-only">Gender</label>
											<select class="form-control input-lg" id="gender">
											  <option>--Gender--</option>
											  <option>Male</option>
											  <option>Female</option>
											</select>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="message" class="sr-only">Message</label>
											<textarea placeholder="Message" id="message" class="form-control input-lg" rows="3"></textarea>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="submit" class="btn btn-primary btn-lg " value="Send">

											<input type="reset" class="btn btn-outline btn-lg " value="Reset">
										</div>
									</div>


								</form>
								<div class="fh5co-spacer fh5co-spacer-sm"></div>
							</div>

						</div>

					</div>
				</section>
</div>
<?php include_once 'footer_details.php';?>

<?php include_once 'footer.php';?>

</body>
</html>