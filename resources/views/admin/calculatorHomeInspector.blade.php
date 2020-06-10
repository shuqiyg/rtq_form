		<div class="col-md-12">
			<div class="form-group">
                <label class="col-md-4" style="float: left;"> Province of Inspection <span class="err">*</span> </label>
                <select class="form-control col-md-8 required" id="risk_address_provinceOfInspection" name="risk_address_provinceOfInspection">
                    <option value="">-Select province-</option>
                    @foreach ($canState as $s)
                        <option value="{{ $s['name'] }}"> {{ $s['name'] }} </option>
                    @endforeach
                </select>
            </div>

            <div class="row">
		        <div class="col-md-12">
            		<div class="form-group">
	                    <label class="col-md-10" style="float: left;"> Number of claims reported for application of insurance on your behalf or on behalf of any your principals, firm partners, officers, employees, predecessors in past 5 years? <span class="err">*</span> </label>
	                    <select class="form-control col-md-2 required" id="risk_address_noOfClaims" name="risk_address_noOfClaims">
	                        <option value="">-Select claims-</option>
	                        <option value="0">None</option>
	                        <option value="1">1</option>
	                        <option value="2">2</option>
	                        <option value="3">3</option>
	                        <option value="4">4</option>
	                        <option value="5">5</option>
	                        <option value="6">6</option>
	                        <option value="7">7</option>
	                        <option value="8">8</option>
	                        <option value="9">9</option>
	                        <option value="10">10</option>
	                        <option value="more">More</option>
	                    </select>
	                </div>
	            </div>
            </div>

            <div class="row">
		        <div class="col-md-12">
		            <div class="form-group">
		                <label class="col-md-4" style="float: left;">  Which CGL limits of liability are required?(Per Claim/Aggregate)  <span class="err">*</span> </label>
		                <select class="col-md-8 form-control required" id="cgl_cglLimitsOfLiablitiy" name="cgl_cglLimitsOfLiablitiy">
		                    <option value="">-Select CGL Limits-</option>
		                    <option value="1mm/1mm">$1mm/$1mm</option>
		                    <option value="1mm/2mm">$1mm/$2mm</option>
		                    <option value="2mm/2mm">$2mm/$2mm</option>
		                </select>
		            </div>
		        </div>
		    </div>
		            
		    <div class="row">
		        <div class="col-md-12">
		            <div class="form-group">
		                <label class="col-md-4" style="float: left;">   What are your E/O limits of liability are required?(Per Claim/Aggregate)  <span class="err">*</span> </label>
		                <select class="col-md-8 form-control required" id="cgl_eoLimitsOfLiablity" name="cgl_eoLimitsOfLiablity">
		                    <option value="">-Select your E/O limits-</option>
		                    <option value="250m/500m">$250m/$500m</option>
		                    <option value="500m/1mm">$500m/$1mm</option>
		                    <option value="1mm/1mm">$1mm/$1mm</option>
		                    <option value="1mm/2mm">$1mm/$2mm</option>
		                    <option value="2mm/2mm">$2mm/$2mm</option>
		                </select>
		            </div>
		        </div>
		    </div>

		    <div class="form-group">
                <label class="col-md-4" style="float: left;">What are the total Gross Annual Receipts? <span class="err">*</span> </label>
                <input type="text" id="ops_totalGrossAnnualReceipts" name="ops_totalGrossAnnualReceipts" class="form-control col-md-8 required commaValues"  value="">
            </div>

            <div class="row">
		        <div class="col-md-12">
		            <div class="form-group">
		                <label class="col-md-4" style="float: left;"> Add Contractors Equipment Floater (CEF)? <span class="err">*</span> </label>
		                <select class="col-md-8 form-control required" id="cgl_contractorsEquipmentFloater" name="cgl_contractorsEquipmentFloater">
		                    <option value="">-Select Value-</option>
		                    <option value="Yes">Yes</option>
		                    <option value="No">No</option>
		                </select>
		            </div>
		        </div>
		    </div>
		    <div class="row">
		        <div class="col-md-12">
		            <div class="form-group">
		                <label class="col-md-4" style="float: left;">Add Additional Property Frill? <span class="err">*</span> </label>
		                <select class="col-md-8 form-control required" id="cgl_additionalPropertyFrill" name="cgl_additionalPropertyFrill">
		                    <option value="">-Select Value-</option>
		                    <option value="Yes">Yes</option>
		                    <option value="No">No</option>
		                </select>
		            </div>
		        </div>
   			</div>

   			<div class="row">
		        <div class="col-md-12">
		            <div class="form-group">
		                <label class="col-md-4" style="float: left;"> What deductible would you like? <span class="err">*</span> </label>
		                <select class="col-md-8 form-control required" id="cgl_deductible" name="cgl_deductible">
		                    <option value="">-Select deductible-</option>
		                    <option value="2500">$2500</option>
		                    <option value="5000">$5000</option>
		                </select>
		            </div>
		        </div>
		    </div>

		</div>