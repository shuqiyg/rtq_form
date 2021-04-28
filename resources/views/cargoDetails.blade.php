<section class='cargoDetailsTab'>
	<h3>Description Of Details</h3>
	<div class='row'>
		<div class="col-md-12">
			<div class="form-group">
                <label class="col-md-4" style="float: left;"> Type Of Carrier <span class="err">*</span> </label>
                <!-- muti select? -->
                <select id="motor_truck_courier_type" name="motor_truck_courier_type" class="form-control col-md-8 required">
                    <option value="">-Select type of carrier</option>
                    <option value="Common Carrier">Common Carrier</option>
                    <option value="Contract Courier">Contract Courier</option>
                    <option value="Courier">Courier</option>
                    <option value="Freight Forwarder">Freight Forwarder</option>
                    <option value="Freight Broker">Freight Broker</option>
                    <option value="Owner of Property">Owner of Property</option>
                </select>
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Are fillings required? <span class="err">*</span> </label>
                <div class="radio_group required">
	                <input type="radio" id="yes" name="filingRequired" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="filingRequired" value="No"><span class="radio_title">No</span>
	                  <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>

                <div class="form-group fillReq" style="display: none;">
	                <label class="col-md-4" style="float: left;"> MTC Filing <span class="err">*</span> </label>
	                <input type="text" id="mtc_filing" name="mtc_filing" class="form-control col-md-8 required"  value="">
            	</div>
            	<div class="form-group fillReq" style="display: none;">
	                <label class="col-md-4" style="float: left;"> Prov/States Required <span class="err">*</span> </label>
	                <input type="text" id="prov_states" name="prov_states" class="form-control col-md-8 required"  value="">
            	</div>
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<!-- write check for this section -->
            <h5>Radius of Operation (must equal 100%)</h5>
            <hr>
            <div class="form-group">
                <div class="input-group">
                	<label class="col-md-4" style="float: left;"> 500km <span class="err">*</span> </label>
                	<input type="text" id="radius_500" name="radius_500" class="form-control col-md-8 required radius-of-op highlightOnClick"  value="0">
                	<div class="input-group-append">
      					<div class="input-group-text">%</div>
    				</div>
                </div>
                <div class="input-group md-2">
                	<label class="col-md-4" style="float: left;"> 800km <span class="err">*</span> </label>
                	<input type="text" id="radius_800" name="radius_800" class="form-control col-md-8 required radius-of-op highlightOnClick"  value="0">
                	<div class="input-group-append">
      					<div class="input-group-text">%</div>
    				</div>
                </div>
                <div class="input-group md-2">
                	<label class="col-md-4" style="float: left;"> 1200km <span class="err">*</span> </label>
                	<input type="text" id="radius_1200" name="radius_1200" class="form-control col-md-8 required radius-of-op highlightOnClick"  value="0">
                	<div class="input-group-append">
      					<div class="input-group-text">%</div>
    				</div>
                </div>
                <div class="input-group md-2">
                	<label class="col-md-4" style="float: left;"> 1600km <span class="err">*</span> </label>
                	<input type="text" id="radius_1600" name="radius_1600" class="form-control col-md-8 required radius-of-op highlightOnClick"  value="0">
                	<div class="input-group-append">
      					<div class="input-group-text">%</div>
    				</div>
                </div>
                <div class="input-group md-2">
                	<label class="col-md-4" style="float: left;"> more than 1600km <span class="err">*</span> </label>
                	<input type="text" id="radius_over_1600" name="radius_over_1600" class="form-control col-md-8 required radius-of-op highlightOnClick"  value="0">
                	<div class="input-group-append">
      					<div class="input-group-text">%</div>
    				</div>
                </div>
            </div>
		</div>
	</div>
	<!-- <h3>Radius of Operation(must equal 100%)</h3>
	<div class="row">
		<div class="col-md-12">
			<div class="form-group" style="float: left;">
                <label class="col-md-4" style="float: left;"> 500km <span class="err">*</span> </label>
                <div class="input-group md-2">
                	<input type="text" id="mtc_filing" name="mtc_filing" class="form-control col-md-8 required"  value="0">
                	<div class="input-group-append">
      					<div class="input-group-text">%</div>
    				</div>
                </div>
            </div>
			
		</div>
	</div> -->
</section>