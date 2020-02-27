<section class="finalSection">
	
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
				<label class='col-md-4' style='float:left;'> Are you sure want to bind it ? </label> 
				<select name='binding' id="bindingUpper" class='binding form-control col-md-8'>
					<option value=''>-Select Value-</option>
					<option value='Yes'>Yes</option> 
					<option value='No'>No</option> 
				</select> 
			</div> 
		</div>
	</div>
	<!-- End Binding Option Upper -->
	<!-- Finish Button Upper -->
	<div class="row" style="margin-top: 5px;">
		<div class="col-md-12">
			<div class="form-group">
				<p id="finalMSG" class="col-md-8" style="float: left;"> </p>
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
				<label class='col-md-4' style='float:left;'> Are you sure want to bind it ? </label> 
				<select name='binding' id="bindingLower" class='binding form-control col-md-8'>
					<option value=''>-Select Value-</option>
					<option value='Yes'>Yes</option> 
					<option value='No'>No</option> 
				</select> 
			</div> 
		</div>
	</div>
	<!-- End Binding Option Lower -->

	<!-- Finish Button Lower -->
	<div class="row" style="margin-top: 5px;">
		<div class="col-md-12">
			<div class="form-group">
				<p id="finalMSG" class="col-md-8" style="float: left;"> </p>
				<button class="btn btn-success" id="finishLower" >Confirm</button>
			</div>
		</div>
	</div>	
	<!-- END Finish Button Lower -->
	
</section>

	<section class="confirmSection" style="display: none;">
		<div class="row">
			<div class="col-md-12">
				<p>
					Hope, you have reviewed form and all information filled up are correct. <br/>
			        <br/>
			        After click on finish button , We get email with your form information.<br/>
			        Underwriter will process and send you form back to you to sign .<br/>
					<br/>
			        If you don't hear from us in next 30 days, please contact us or send form again.<br/>
			        <br/>	
			        If you are sure about fill up information then pleae click on finish button.<br/>
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<button type="button" class="btn btn-secondary" id="resetForm">Reset</button>
	        	<button type="button" class="btn btn-success" id="finish" style="float: right;">Finish</button>
			</div>
		</div>
		<div class="row" style="margin-top: 50px;">
			<div class="col-md-12">
				<p><a id="goBackToFinal" style="color: blue;cursor: pointer;"><- Go Back </a></p>
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

