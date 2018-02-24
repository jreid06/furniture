<?php if ($_SERVER['REQUEST_URI'] === '/checkout'): $hidden = true; ?><?php endif; ?>

<footer class="nav-vue" style="<?php if(isset($hidden) && $hidden): ?>display: none <?php endif; ?>">
	<div id="accordion" role="tablist">
		<!-- <div class="card">
		    <div class="card-header ch-footer" role="tab" id="headingOne">
		      <h5 class="mb-0">
		        <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="collapse-link">
		          About
		        </a>
		      </h5>
		    </div>

		    <div id="collapseOne" class="collapse show footer-collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
		      <div class="card-body">
		        <ul>
		        	<li>Our Story</li>
					<li id="footer-search">Search</li>
		        </ul>
		      </div>
		    </div>
	  	</div> -->
	  	<div class="card">
		    <div class="card-header ch-footer" role="tab" id="headingTwo">
		      <h5 class="mb-0">
		        <a class="collapsed collapse-link" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
		          Customer Service
		        </a>
		      </h5>
		    </div>
		    <div id="collapseTwo" class="collapse footer-collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
		      <div class="card-body">
		        <ul>
		        	<li><a href="/help">Help</a></li>
					<li><a href="/help/shipping">Shipping</a></li>
					<li><a href="/help/returns">Returns</a></li>
					<li><a href="/help/payments">Payments</a></li>
					<li>
						<a href="/help/orders">Orders</a>
					</li>
		        </ul>
		      </div>
		    </div>
	  	</div>
	  	<div class="card">
		    <div class="card-header ch-footer" role="tab" id="headingThree">
		      <h5 class="mb-0">
		        <a class="collapsed collapse-link" data-toggle="collapse" href="#contact-info" aria-expanded="false" aria-controls="collapseThree" class="collapse-link">
		          Contact Us
		        </a>
		      </h5>
		    </div>
		    <div id="contact-info" class="collapse footer-collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
		      <div class="card-body">
		        <ul>
		        	<li><a href="tel:02086541456">+44 (0)2086541456</a> </li>
					<li><a href="mailto:info@nordicidyl.com">info@nordicidyl.com</a></li>
					<li style="text-transform: capitalize"><a href="/termsconditions">Terms &amp; Conditions</a> </li>
					<li style="text-transform: capitalize"><a href="/privacy-policy">Privacy Ploicy</a> </li>
		        </ul>
		      </div>
		    </div>
	  	</div>
		<!--  -->
		<!-- <div class="card">
			<div class="card-header ch-footer" role="tab" id="headingFour">
			  <h5 class="mb-0">
				<a class="collapsed collapse-link" data-toggle="collapse" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree" class="collapse-link">
				  Sign up to our newsletter
				</a>
			  </h5>
			</div>
			<div id="collapseFour" class="collapse footer-collapse show" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
			  <div class="card-body">
				  <form id="signup">
					  <input class="inpFields" type="email" name="signup-email" placeholder="Please enter your email">
					  <a href="#" class="btn btn-primary">Sign Up</a>
				  </form>
			  </div>
			</div>
		</div> -->

	</div>
</footer>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.11/vue.js" charset="utf-8"></script> -->

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js" integrity="sha384-FzT3vTVGXqf7wRfy8k4BiyzvbNfeYjK+frTVqZeNDFl8woCbF0CYG6g2fMEFFo/i" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

<!-- ONLINE BS js -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

<!-- OFFLINE BS js -->
<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
<!-- <script src="/bootstrap-4.0.0-alpha.6-dist/js/tether.min.js"></script> -->
<!-- <script src="/bootstrap-4.0.0-alpha.6-dist/js/bootstrap.min.js"></script> -->
<script src="/js/jquery-mousewheel/jquery.mousewheel.min.js" charset="utf-8"></script>

<!-- font awsome -->
<!-- <script src="https://use.fontawesome.com/7c0f3e2f67.js"></script> -->

<script src="/js/plugins/velocity.js"></script>
<script src="/js/plugins/notify.min.js"></script>
<script src="/js/plugins/jqueryrotate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
<script src="/node_modules/simplemde/dist/simplemde.min.js"></script>
<!-- Compiled and minified JavaScript -->
<script src="/node_modules/marked/marked.min.js"></script>
<script src="/js/classes.js"></script>
<script src="/js/validate-forms.js"></script>
<script src="/js/main.js"></script>
<!-- <script src="/js/wow.min.js"></script>
<script>
  new WOW().init();
</script> -->

<script type="application/ld+json">
	{
		"@content":"http://schema.org",
		"@type":"Sports Blog",
		"url":"https://dsdsports.co.uk",
		"name":"dsdsports"
	}
</script>

</body>
</html>
