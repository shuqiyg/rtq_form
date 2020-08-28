<div class="loader" style="display: none;"> </div>
<!-- <div class="btn-toolbar sw-toolbar sw-toolbar-top justify-content-end"><div class="btn-group mr-2 sw-btn-group" role="group"><button class="btn btn-secondary sw-btn-prev disabled" type="button">Previous</button><button class="btn btn-secondary sw-btn-next" type="button">Next</button></div></div>
 -->
<div class="btn-toolbar sw-toolbar sw-toolbar-top justify-content-end zeroPadding">
    <div class="btn-group mr-2 sw-btn-group" role="group">
        <i class="fa fa-angle-left dirArrow sw-btn-prev" data-toggle="tooltip" title="Previous"></i>
        <i class="fa fa-angle-right dirArrow sw-btn-next" data-toggle="tooltip" title="Next"></i>
    </div>
</div>
<?php
	// get closest city
	$closestCity = json_decode(file_get_contents(public_path().'/json/zoneWiseInspectionCities.json'), true);
?>
<section class="finalSection">
	<input type="hidden" name="bindStatus" id="bindStatus">
	<input type="hidden" name="doesCalculated" id="doesCalculated">
	<div class="row">
		<div class="col-md-12">
			<div class="form-group" id="calculateBox" style="display: none;">
				<h3>Result</h3>
        @if($formVal == "plumbing")
				<p style="padding: 0;color: red;display: none;" id="closestCityMSG">Please select closest city and distance from city.</p>
				<label class="col-md-4" style="float: left;">Select closest city</label>
				<select id="closestCity" name="closestCity" class="form-control col-md-8">
					<option value="">-Select closest city-</option>
                    @foreach ($closestCity as $cs)
                        <option value="{{ $cs['zoneCityID'] }}"> {{ $cs['name'] }} </option>
                    @endforeach
				</select>

				<label class="col-md-4" style="float: left;">Enter distance from closest city</label>
				<input type="text" name="distanceFromClosestCity" id="distanceFromClosestCity" class="form-control col-md-8 allow_decimal" placeholder="distance in km">
				<br/>
				@endif
				<p>Calculate Quote  based on information entered :</p>
				<button class="btn btn-primary" id="calculate">Calculate</button>
				<div id="priceBox">

				</div>
			</div>
			<div class="form-group" id="referValidationNotMatchBox" style="display: none;">

			</div>
			<div class="form-group" id="filesRequiredBox" style="display: none;">
				
			</div>
		</div>
	</div>	

	<!-- Binding Option Upper -->
	<div class='row ' style="width: 100%;margin-left: 0px;"> 
		<div class='col-md-12' style="text-align: center;"> 
			<div class="form-group">
				<button class="btn btn-success" id="submitOnlyUp" style="margin-left: 5px;" >Submit Only (Without Binding)</button>
				<button class="btn btn-warning bindingBox" style="display: none;" id="bindingUpper">Bind & Submit</button>
				
			</div> 
		</div>
	</div>
	<!-- End Binding Option Upper -->
	<!-- Finish Button Upper 
	<div class="row" style="margin-top: 5px;">
		<div class="col-md-12">
			<div class="form-group">
				
			</div>
		</div>
	</div>	-->
	<!-- END Finish Button Upper -->

	<!-- Review Form -->
	<h3>Review Form: </h3>
	<p id="reviewFormPT"></p>
	<div id="reviewForm">

	</div>
	<!-- End Review Form -->

	<!-- Binding Option Lower -->
	<div class='row ' > 
		<div class='col-md-12'> 
			<div class="form-group">
				<button class="btn btn-success" id="submitOnlyLow" style="margin-left: 5px;float: right;">Submit Only</button>
				<button class="btn btn-warning bindingBox" style="display: none;float: right;" id="bindingLower">Bind & Submit</button>
			</div> 
		</div>
	</div>
	<!-- End Binding Option Lower -->

	<!-- Finish Button Lower 
	<div class="row" style="margin-top: 5px;">
		<div class="col-md-12">
			<div class="form-group">
				
			</div>
		</div>
	</div>	-->
	<!-- END Finish Button Lower -->
	
</section>

	<section class="confirmSection" style="display: none;">
				
		<div class="row">
			<div class="col-md-12">
				<div>
					<p id="bindMsg" style="color: blue;text-decoration: underline;font-weight: bold;font-size: 30px;text-shadow: 2px 2px 10px yellow;"></p>
				</div>
				<p>Thank you for submitting this application. You must click on the <button type="button" class="btn btn-success finish" >Finish</button> button to complete.</p>
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
				<button type="button" class="btn btn-secondary" id="resetForm" style="float: right;">Reset</button>
	        	<button type="button" class="btn btn-success finish">Finish</button>
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

