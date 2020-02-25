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

	<h3>Review Form: </h3>
	<div id="reviewForm">

	</div>

	<div class='row' id="bindingBox" style="display: none;"> 
		<div class='col-md-12'> 
			<div class="form-group">
				<label class='col-md-4' style='float:left;'> Are you sure want to bind it ? </label> 
				<select id='binding' name='binding' class='form-control col-md-8'>
					<option value=''>-Select Value-</option>
					<option value='Yes'>Yes</option> 
					<option value='No'>No</option> 
				</select> 
			</div> 
		</div>
	</div>

	<div class="row" style="margin-top: 5px;">
		<div class="col-md-12">
			<div class="form-group">
				<p id="finalMSG" class="col-md-8" style="float: left;"> </p>
				<button class="btn btn-success" id="finish">Finish</button>
			</div>
		</div>
	</div>	

	
</section>
