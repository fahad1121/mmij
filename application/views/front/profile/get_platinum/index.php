<div class="card-title card-bg-c">
	<div class="d-flex">
		<div class="flex-fill">
			<button type="button" class="btn btn-light btn-sm btn-icon-only btn-shadow mt-2" onclick="return location.reload();">
				<span><i class="ion-arrow-left-c"></i></span> Back
			</button>
		</div>
		<div class="flex-fill">
			<h4 class="heading heading-6 text-left">
				PURCHASE PLATINUM
			</h4>
		</div>
	</div>
</div>

<div class="card-body">
	<section class="sct-color-1 pricing-plans pricing-plans--style-1">
		<div class="container">
			<?php
				$memberSince = $this->Crud_model->get_type_name_by_id('member', $this->session->userdata['member_id'], 'member_since');
				$membership = $this->Crud_model->get_type_name_by_id('member', $this->session->userdata['member_id'], 'membership');
				$billing_id = $this->Crud_model->get_type_name_by_id('member', $this->session->userdata['member_id'], 'billing_id');
				$paypalSubscriptionId = $this->Crud_model->get_type_name_by_id('member', $this->session->userdata['member_id'], 'paypal_subscription_id');
			?>
			<div class="row p-2">
				<div class="col-md-12 col-xs-12 m-0 p-0 mt-20">
					<div class="col-sm-12 m-0 p-0">
						<div class="single-prices">
							<div class="price-tags">
								<h6 class="text-right">Most Popular</h6>
								<h2><span>(USD)</span> <?=currency('', 'def')?><?php echo $plans[1]->monthly_amount?> <span> per month</span> </h2>
								<?php
									$plan_image = json_decode($plans[1]->image); 
									if (file_exists('uploads/plan_image/'. $plan_image[0]->image)){ 
								?>
								<div class="text-center">
									<img src="<?= base_url() ?>uploads/plan_image/<?= $plan_image[0]->image ?>" alt="" class="img-fluid img-thumbnail">
								</div>
								<p>Subscription renewed every month(s) thereafter</p>

								<?php } ?>
							</div>
							<div class="dis-flex">
								<div class="flex-fill b-r ">
									<div class="price-items">
										<h4>PLATINUM PACKAGE OFFERS</h4>
										<ol>
											<li> VIEW GALLERY UNLIMITED</li>
											<li>SEND INSTANT MESSAGES UNLIMITED</li>
											<li>RECEIVE & RESPOND TO MESSAGES</li>
											<li>VIEW WHO LIKED YOU</li>
											<li>SEND EMOJIS UNLIMITED</li>
											<li>ADD 3-4 PICTURES</li>
											<li>E-MAIL SENT WHEN INTEREST SHOWN</li>
											<li>LIKES LIST UNLIMITED</li>
											<li>INTEREST E-MAIL SENT</li>
										</ol>
									</div>
								</div>
								<div class="flex-fill">
									<div class="price-items text-center">
										<div class="p-50">
											<h4>SELECT PAYMENT PLAN</h4>
											<div class="form-checks">
												<label class="form-check-labels" id="billingTypeLabel1">
													<input class="form-check-input" type="radio" name="billingType" id="quarterly" value="1"> <?=currency('', 'def')." ".$plans[1]->quaterly_amount?> every 3 months
												</label>
												<br>
												<label class="form-check-labels" id="billingTypeLabel2">
													<input class="form-check-input" type="radio" name="billingType" id="bi_annually"  value="2"> <?=currency('', 'def')." ".$plans[1]->bi_annually_amount?> every 6 months
												</label>
												<br>
												<label class="form-check-labels" id="billingTypeLabel3">
													<input class="form-check-input" type="radio" name="billingType" id="annually" value="3"> <?=currency('', 'def')." ".$plans[1]->yearly_amount?> every 12 months 
												</label>
												<br>
												<label class="form-check-labels">
												<input class="form-check-input" type="radio" name="billingType" id="daily" value="4"> <?=currency('', 'def')?>1 every day
											</label>
											</div>

											<style>
												.hidden {
													display: none;
												}
											</style>

											<button
											  style="background-color:#e91e63;color:#FFF;padding:8px 12px;border:0;border-radius:4px;font-size:1em; display: none;"
											  id="quarterly_plan_btn"
											  role="link"
											  type="button"
											>
											  Subscribe to Quarterly Plan 
											</button>

											<button
											  style="background-color:#e91e63;color:#FFF;padding:8px 12px;border:0;border-radius:4px;font-size:1em; display: none;"
											  id="bi_annually_plan_btn"
											  role="link"
											  type="button"
											>
											  Subscribe to Bi Annually Plan
											</button>

											<button
											  style="background-color:#e91e63;color:#FFF;padding:8px 12px;border:0;border-radius:4px;font-size:1em; display: none;"
											  id="annually_plan_btn"
											  role="link"
											  type="button"
											>
											  Subscribe to Annually Plan
											</button>
											
											<button
                                              style="background-color:#e91e63;color:#FFF;padding:8px 12px;border:0;border-radius:4px;font-size:1em; display: none;"
                                              id="daily_plan_btn"
                                              role="link"
                                              type="button"
                                            >
                                              Subscribe to Daily Plan
                                            </button>

											<div id="error-message"></div>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>


<script>
	$('input[type=radio][name=billingType]').change(function() {
		if (this.id == 'quarterly') {
			$("#quarterly_plan_btn").show();
			$("#bi_annually_plan_btn").hide();
			$("#annually_plan_btn").hide();
			$("#daily_plan_btn").hide();
		} 
		else if (this.id == 'bi_annually') {
			$("#bi_annually_plan_btn").show();
			$("#quarterly_plan_btn").hide();
			$("#annually_plan_btn").hide();
			$("#daily_plan_btn").hide();
		} 
		else if (this.id == 'annually') {
			$("#annually_plan_btn").show();
			$("#bi_annually_plan_btn").hide();
			$("#quarterly_plan_btn").hide();
			$("#daily_plan_btn").hide();
		} 
		else if (this.id == 'daily') {
	         $("#daily_plan_btn").show();
	         $("#annually_plan_btn").hide();
	         $("#bi_annually_plan_btn").hide();
	         $("#quarterly_plan_btn").hide();
	     }
	});
</script>

<?php if ($membership != 2) { ?>
<script>
	var success_url = '<?php echo base_url() . 'home/thankyou_page' ?>';
	var cancel_url = '<?php echo base_url() . 'home/profile' ?>';

	var quarterly_plan = '<?php echo QUARTERLY_PLAN_PRICE_KEY; ?>';
	var bi_annually_plan = '<?php echo BI_ANNUAL_PLAN_PRICE_KEY; ?>';
	var annual_plan = '<?php echo ANNUAL_PLAN_PRICE_KEY; ?>';
	var daily_plan = '<?php echo DAILY_PLAN_PRICE_KEY; ?>';

	var _key = '<?php echo STRIPE_KEY; ?>';
	var stripe = Stripe(_key);
	
    (function() {

      var checkoutButton = document.getElementById('daily_plan_btn');
      checkoutButton.addEventListener('click', function () {
        // When the customer clicks on the button, redirect
        // them to Checkout.
        stripe.redirectToCheckout({
          lineItems: [{price: daily_plan, quantity: 1}],
          mode: 'subscription',
          successUrl: success_url+'/{CHECKOUT_SESSION_ID}',
          cancelUrl: cancel_url,
        })
        .then(function (result) {
          if (result.error) {
            var displayError = document.getElementById('error-message');
            displayError.textContent = result.error.message;
          }
        });
      });
    })();

	(function() {

	  var checkoutButton = document.getElementById('quarterly_plan_btn');
	  checkoutButton.addEventListener('click', function () {

	    stripe.redirectToCheckout({
	      lineItems: [{price: quarterly_plan, quantity: 1}],
	      mode: 'subscription',
	      successUrl: success_url+'/{CHECKOUT_SESSION_ID}',
	      cancelUrl: cancel_url,
	    })
	    .then(function (result) {
	      if (result.error) {
	        var displayError = document.getElementById('error-message');
	        displayError.textContent = result.error.message;
	      }
	    });
	  });
	})();

	(function() {

	  var checkoutButton = document.getElementById('bi_annually_plan_btn');
		checkoutButton.addEventListener('click', function () {
		    stripe.redirectToCheckout({
		      lineItems: [{price: bi_annually_plan, quantity: 1}],
		      mode: 'subscription',
		      successUrl: success_url+'/{CHECKOUT_SESSION_ID}',
		      cancelUrl: cancel_url,
		    })
		    .then(function (result) {
		      if (result.error) {
		        // If `redirectToCheckout` fails due to a browser or network
		        // error, display the localized error message to your customer.
		        var displayError = document.getElementById('error-message');
		        displayError.textContent = result.error.message;
		      }
		    });
		});
	})();

	(function() {

	  var checkoutButton = document.getElementById('annually_plan_btn');
	  checkoutButton.addEventListener('click', function () {
	    // When the customer clicks on the button, redirect
	    // them to Checkout.
	    stripe.redirectToCheckout({
	      lineItems: [{price: annual_plan, quantity: 1}],
	      mode: 'subscription',
	      successUrl: success_url+'/{CHECKOUT_SESSION_ID}',
	      cancelUrl: cancel_url,
	    })
	    .then(function (result) {
	      if (result.error) {
	        // If `redirectToCheckout` fails due to a browser or network
	        // error, display the localized error message to your customer.
	        var displayError = document.getElementById('error-message');
	        displayError.textContent = result.error.message;
	      }
	    });
	  });
	})();
	// const clientSecret  = paymentRequest.client_secret
	// checkoutButton.addEventListener('click', function(ev) {
	//     stripe.confirmCardPayment(_key, {
	//         payment_method: {card: card}
	//     }).then(function(result) {
	//         if (result.error) {
	//             // Show error to your customer (e.g., insufficient funds)
	//             console.log(result.error.message);
	//         } else {
	//             // The payment has been processed!
	//             if (result.paymentIntent.status === 'succeeded') {
	//             	console.log(result)
	//             }
	//         }
	//     });
	// });
</script>

<?php } ?>