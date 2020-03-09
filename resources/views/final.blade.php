<div class="loader" style="display: none;"> </div>
	
<section class="finalSection">
	<input type="hidden" name="bindStatus" id="bindStatus">
	<input type="hidden" name="doesCalculated" id="doesCalculated">
	<div class="row">
		<div class="col-md-12">
			<div class="form-group" id="calculateBox" style="display: none;">
				<h3>Result</h3>
				<p>Calculate price based on the information you filled up :</p>
				<button class="btn btn-primary" id="calculate">Calculate</button>
				<div id="priceBox">

				</div>
			</div>
			<div class="form-group" id="referValidationNotMatchBox" style="display: none;">

			</div>
		</div>
	</div>	

	<!-- Binding Option Upper -->
	<div class='row bindingBox' style="display: none;"> 
		<div class='col-md-12'> 
			<div class="form-group">
				<button class="btn btn-warning" style="width: 100%;" id="bindingUpper">Click to Bind</button>
				<!--<label class='col-md-4' style='float:left;'> Are you sure want to bind it ? </label> 
				<select name='binding' id="bindingUpper" class='binding form-control col-md-8'>
					<option value=''>-Select Value-</option>
					<option value='Yes'>Yes</option> 
					<option value='No'>No</option> 
				</select> -->
				<p id="bindMsg"></p>
			</div> 
		</div>
	</div>
	<!-- End Binding Option Upper -->
	<!-- Finish Button Upper -->
	<div class="row" style="margin-top: 5px;">
		<div class="col-md-12">
			<div class="form-group">
				<button class="btn btn-success" id="finishUpper" >Confirm</button>
			</div>
		</div>
	</div>	
	<!-- END Finish Button Upper -->

	<!-- Review Form -->
	<h3>Review Form: </h3>
	<div id="reviewForm">

	</div>
	<!-- End Review Form -->

	<!-- Binding Option Lower -->
	<div class='row bindingBox' style="display: none;"> 
		<div class='col-md-12'> 
			<div class="form-group">
				<button class="btn btn-warning" style="width: 100%;" id="bindingLower">Click to Bind</button>
				<!--<label class='col-md-4' style='float:left;'> Are you sure want to bind it ? </label> 
				<select name='binding' id="bindingLower" class='binding form-control col-md-8'>
					<option value=''>-Select Value-</option>
					<option value='Yes'>Yes</option> 
					<option value='No'>No</option> 
				</select> -->
				<p id="bindMsgL"></p>
			</div> 
		</div>
	</div>
	<!-- End Binding Option Lower -->

	<!-- Finish Button Lower -->
	<div class="row" style="margin-top: 5px;">
		<div class="col-md-12">
			<div class="form-group">
				<button class="btn btn-success" id="finishLower" >Confirm</button>
			</div>
		</div>
	</div>	
	<!-- END Finish Button Lower -->
	
</section>

	<section class="confirmSection" style="display: none;">
				
		<div class="row">
			<div class="col-md-12">
				<p>Thank you for submitting this application. You must click on the [Finish] button to complete.</p>
				<p>Once you complete, the following will happen:</p>
				<ul>
					<li>If you were provided a quote:
						<ul>
							<li>The information will be sent to AMFUM and entered into our system</li>
							<li>You will receive an email with a copy of the application filled out and,</li>
							<li>Acknowledgement that we have received your Binding instructions.</li>
							<li>You must get the application signed and returned to us.</li>
							<li>Within 5 business days, you will receive Policy Documents electronically.</li>
						</ul>
					</li>
					<li>If you did not get a quote:
						<ul>
							<li>The information will be sent to AMFUM and entered into our system</li>
							<li>You will receive an email with a copy of the application filled out and,</li>
							<li>An underwriter will review your submission and respond with either a quote or,</li>
							<li>A request for more information.</li>
							<li>The application must be signed and returned to us before a policy can be issued.</li>
						</ul>
					</li>
				</ul>
				<p style="color: orange;"><b>IMPORTANT!</b></p>
				<p>If you do NOT receive a copy of your application:</p>
				<ul>
					<li>Check your Junk Mail folder</li>
					<li>Contact us at 905-428-1269 or <a href="mailto:amfinfo@amfredericks.com" target="_top">amfinfo@amfredericks.com</a> immediately to see if we received the application.</li>
					<li>Under no circumstances consider a policy bound if you do not get confirmation from AMFUM.</li>
				</ul>
				<p>AMFUM reserves the right to cancel binding or the policy on in-depth review.</p>
			</div>
		</div>
		<div class="row" style="margin-top: 20px">
			<div class="col-md-12">
				<button type="button" class="btn btn-secondary" id="resetForm">Reset</button>
	        	<button type="button" class="btn btn-success" id="finish" style="float: right;">Finish</button>
			</div>
		</div>
		<div class="row" style="margin-top: 50px;">
			<div class="col-md-12">
				<!--<p><a id="goBackToFinal" style="color: blue;cursor: pointer;"><- Go Back </a></p>-->
			</div>
		</div>
	</section>

	<!-- Confirmation Modal 
	<div class="modal fade" id="confirmModal">
	  <div class="modal-dialog">
	    <div class="modal-content">

	      <!- Modal Header ->
	      <div class="modal-header">
	        <h4 class="modal-title">Acknowledgement</h4>
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	      </div>

	      <!- Modal body ->
	      <div class="modal-body">
	        Hope, you have reviewed form and all information filled up are correct. <br/>
	        <br/>
	        After click on finish button , We get email with your form information.<br/>
	        Underwriter will process and send you form back to you to sign .<br/>
			<br/>
	        If you don't hear from us in next 30 days, please contact us or send form again.<br/>
	        <br/>	
	        If you are sure about fill up information then pleae click on finish button.<br/>
	      </div>

	      <!- Modal footer ->
	      <div class="modal-footer">
	      	<button type="button" class="btn btn-success" data-dismiss="modal" id="resetForm">Reset</button>
	        <button type="button" class="btn btn-success" data-dismiss="modal" id="finish">Finish</button>
	      </div>

	    </div>
	  </div>
	</div>
	<!- End Confirmation Modal -->

