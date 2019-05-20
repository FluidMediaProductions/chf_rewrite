<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=2, user-scalable=no" name="viewport" />
    <meta content="CHF Estate Agents" name="description" />
    <meta content="estate, agent, chf, homepage" name="keywords" />
    <meta content="Curle" name="author" />
    <meta content="#ffffff" name="theme-color" />
    <title><?php echo htmlspecialchars($results['pageTitle'])?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.9.0/css/bootstrap-slider.min.css">
    <link rel="stylesheet" href="static/css/bootstrap.min.css">
    <link rel="stylesheet" href="static/css/main.min.css">
	
	<script src="https://use.fontawesome.com/efab83f16e.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" type="text/css" media="all" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.9.0/bootstrap-slider.min.js"></script>
	<script src="static/js/bootstrap.min.js"></script>
	<script src="static/js/main.js"></script>
  </head>
  <body>
    <div class="bg-dark text-white">
		<div class="container py-3">
			<div class="row">
				<div class="col-lg-6 col-md-4 h5 mb-0 text-uppercase">CHF Estate Agents
					- Move with the times</div>
				<div class="col-lg-3 col-md-4 h5 my-3 m-md-0">
					<i class="fa fa-envelope brand-text" aria-hidden="true"></i>
					<span>sales@chf.uk.com</span>
				</div>
				<div class="col-lg-3 col-md-4 h5 mb-0">
					<i class="fa fa-phone brand-text" aria-hidden="true"></i>
					<span>(01633) 881 844</span>
				</div>
			</div>
		</div>
	</div>
	<?php if(isset($_GET['action'])) { ?>
    <div class="container py-2 top-msg">
		<div class="alert <?php if(!$_GET['msg_status']) {echo "alert-success"} else {echo "alert-"} echo $_GET['msg_status']; ?> alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
		  <?php //echo htmlspecialchars($msg) ?>
        </div>
    </div>
	<?php } ?>
	<div class="container py-3">
		<div class="row">
			<div class="col-md-3 text-center text-md-left">
				<a href="/">
					<img src="media/img/logo.png" alt="">
				</a>
			</div>
			<div class="col-md-9">
				<div class="row mb-3">
					<div class="col">
						<div class="float-md-right text-center text-md-left">
							<a href="#different" class="btn btn-primary btn-lg text-uppercase">How we're different</a>
							<a href="index.php/?action=contact" class="btn btn-primary btn-lg text-uppercase">Book a valuation</a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<ul class="nav nav-pills justify-content-md-end justify-content-center">
							<li class="nav-item">
								<a class="nav-link <?php if($_SERVER['REQUEST_URI'] == "/index.php/") {echo "active"} ?>" href="index.php">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link <?php if($_SERVER['REQUEST_URI'] == "/properties.php") {echo "active"} ?>" href="/index.php?action=properties">For sale</a>
							</li>
							<li class="nav-item">
								<a class="nav-link {% if request.path == "/contact/" %}active{% endif %}" href="{% url 'contact' %}">Get in touch</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="search brand-bg py-4">
		<form action="/properties.php?action=search" method="get">
			<div class="container">
				<div class="row">
					<div class="col-md-auto col-sm-12">
						<h3 class="text-light my-2 text-center">Property search</h3>
					</div>
					<div class="col-md col-sm-12">
						<div class="input-group">
							<input type="text" id="property-search" class="form-control form-control-lg address-autofill"
								placeholder="POSTCODE/AREA e.g. Magor, NP26" aria-label="Search for..." name="search">
							<span class="input-group-btn">
								<button class="btn btn-dark btn-lg" type="submit">Search</button>
							</span>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>