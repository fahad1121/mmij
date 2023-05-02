<!DOCTYPE html>
<html>
<head>
	<title>Match Made in Jannah</title>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>		

<section>
	<div class="container">
		<div class="d-flex align-items-center justify-content-center" style="margin-top: 50px;">
			<div class="p-2  text-center">
				<i class="fa fa-check-circle" style="color: #e92463;font-weight: bold; font-size: 50px;"></i>
				<h1 class="section-title"  style="color: #e92463;font-weight: bold; font-size: 50px;">Thank You</h1>
				<br>
				<p class="text-blue">
					<b>Thank you for subscribing at Match Made in Jannah.</b>
				</p>
				<p>You will be redirect to profile shortly !</p>
				<!-- <br>
				<p>Having trouble? <a class="text-red" href="https://www.blauda.co.ke/contact-us">Contact us</a></p>
				<br>
				<p><a class="btn btn-sm no-rad bg-blue" href="https://www.blauda.co.ke/">Continue to homepage</a></p> -->
			</div>
		</div>
	</div>
</section>

<script>
	$(document).ready(function(){
		setTimeout(function(){
    		window.location.href = "<?=base_url()?>home/profile";	    		
    	}, 5000);
	})
</script>     
</body>
</html>