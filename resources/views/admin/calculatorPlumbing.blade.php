		<div class="col-md-12">

			<div class="form-group">
                <label class="col-md-4" style="float: left;"> Province / State <span class="err">*</span> </label>
                <select class="form-control col-md-8 required" id="risk_address_province_plumbing" name="risk_address_province_plumbing">
                    <option value="">-Select province-</option>
                    @foreach ($canState as $s)
                        <option value="{{ $s['name'] }}"> {{ $s['name'] }} </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="col-md-4" style="float: left;">Year Built <span class="err">*</span></label>
                <input type="text" id="buildingConstruction_yearBuilt_plumbing" name="buildingConstruction_yearBuilt_plumbing" class="form-control col-md-8 onlyNumbers checkYear required"  value="" maxlength="4">
            </div>

            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Overall Construction <span class="err">*</span> </label>
                <select id="buildingConstruction_overallConstruction" name="buildingConstruction_overallConstruction" class="form-control col-md-8 required">
                    <option value="">-Select overall construction-</option>
                    <option value="Frame-Brick Veneer">Frame-Brick Veneer</option>
                    <option value="Masonary Wood Joist Roof">Masonary Wood Joist Roof</option>
                    <option value="Masonary Steel Deck Roof">Masonary Steel Deck Roof</option>
                    <option value="Fire Resistive">Fire Resistive</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Hydrant(s) <span class="err">*</span></label>
                <select id="fireAlarmDetectors_hydrant_plumbing" name="fireAlarmDetectors_hydrant_plumbing" class="form-control col-md-8 required">
                    <option value="">-Select hydrant-</option>
                    <option value="Within 75m">Within 75m (246 feet)</option>
                    <option value="Within 150m">Within 150m (492 feet)</option>
                    <option value="Over 150m">Over 150m (493 feet or more)</option>
                </select>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-md-4" style="float: left;"> Fire Department - Distance <span class="err">*</span></label>
                        <select id="fireAlarmDetectors_fireDeptDistance_plumbing" name="fireAlarmDetectors_fireDeptDistance_plumbing" class="form-control col-md-8 required">
                            <option value="">-Select fire department distance-</option>
                            <option value="Within 3km">Within 3km</option>
                            <option value="Within 5km">Within 5km</option>
                            <option value="Within 10km">Within 10km</option>
                            <option value="Over 10km">Over 10km</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Fire Department - Type <span class="err">*</span></label>
                <select id="fireAlarmDetectors_fireDeptTye_plumbing" name="fireAlarmDetectors_fireDeptTye_plumbing" class="form-control col-md-8 required">
                    <option value="">-Select fire department type-</option>
                    <option value="Paid">Paid</option>
                    <option value="Volunteer">Volunteer</option>
                    <option value="Part Paid/Part Volunteer">Part Paid/Part Volunteer</option>
                </select>
            </div>


			<!-- <div class="row">
		        <div class="col-md-12">
		            <div class="form-group">
		                <label class="col-md-4" style="float: left;"> Total Revenue </label>
		                <input type="text" id="totalRevenue" name="totalRevenue" class="form-control col-md-8 commaValues" placeholder="Enter Limit " value="">
		            </div>
		        </div>
		    </div> -->

			<div class="row">
		        <div class="col-md-12">
		            <div class="form-group">
		                <label class="col-md-4" style="float: left;"> Building </label>
		                <input type="text" id="coverage_buildingLimit_plumbing" name="coverage_buildingLimit_plumbing" class="form-control col-md-8 commaValues" placeholder="Enter Limit " value="">
		            </div>
		        </div>
		    </div>
		    <div class="row">
		        <div class="col-md-12">
		            <div class="form-group">
		                <label class="col-md-4" style="float: left;"> Contents <span class="err">*</span></label>
		                <input type="text" id="coverage_contentsLimit_plumbing" name="coverage_contentsLimit_plumbing" class="form-control col-md-8 commaValues required" placeholder="Enter Limit Required" value="">
		            </div>
		        </div>
		    </div>
		    <div class="row">
		        <div class="col-md-12">
		            <div class="form-group">
		                <label class="col-md-4" style="float: left;">Stock  </label>
		                <input type="text" id="coverage_contentsLimitStock" name="coverage_contentsLimitStock" class="form-control col-md-8 commaValues" placeholder="Enter Limit " value="">
		            </div>   
		        </div>
		    </div>
		    <div class="row">
		        <div class="col-md-12">
		            <div class="form-group">
		                <label class="col-md-4" style="float: left;">Equipment  </label>
		                <input type="text" id="coverage_contentsLimitEquipment" name="coverage_contentsLimitEquipment" class="form-control  col-md-8 commaValues" placeholder="Enter Limit " value="">
		            </div>     
		        </div>
		    </div>
		    <div class="row">
		        <div class="col-md-12">   
		            <div class="form-group">
		                <label class="col-md-4" style="float: left;">Tenants' improvements  </label>
		                <input type="text" id="coverage_contentsLimitImprovements" name="coverage_contentsLimitImprovements" class="form-control col-md-8 commaValues" placeholder="Enter Limit " value="">
		            </div>
		        </div>
		    </div>
		    
		    <div class="row">
		        <div class="col-md-12">
		            <div class="form-group">
		                <label class="col-md-4" style="float: left;"> Profits <span class="err">*</span></label>
		                <input type="text" id="coverage_profits" name="coverage_profits" class="form-control col-md-8 commaValues required" placeholder="Enter Limit Required" value="">
		            </div>
		        </div>
		    </div>
		    <div class="row">
		        <div class="col-md-12">
		            <div class="form-group">
		                <label class="col-md-4" style="float: left;"> Gross Earnings <span class="err">*</span></label>
		                <input type="text" id="coverage_grossEarnings" name="coverage_grossEarnings" class="form-control col-md-8 commaValues required" placeholder="Enter Limit Required" value="">
		            </div>
		        </div>
		    </div>
		    <div class="row">
		        <div class="col-md-12"  id="ifcoverageGrossEarningsLimitBox" style="display: none;">
		            <div class="form-group">
		                <label class="col-md-4" style="float: left;"><span class="optionalBox">Co-ins </span> </label>
		                <select id="coverage_grossEarningsPer" name="coverage_grossEarningsPer" class="form-control col-md-8 ">
		                    <option value="">-Select value-</option>
		                    <option value="80% Co.">80% Co.</option>
		                    <option value="50% Co.">50% Co.</option>
		                    <option value="No Co.">No Co.</option>
		                </select>
		            </div> 
		            
		        </div>
		    </div>
		    

		    <div class="row">
		        <div class="col-md-12">
		            <div class="form-group">
		                <label class="col-md-4" style="float: left;"> Extra Expenses  <span class="err">*</span></label>
		                <input type="text" id="coverage_extraExpenses" name="coverage_extraExpenses" class="form-control col-md-8 commaValues required" placeholder="Enter Limit Required" value="">
		            </div>
		        </div>
		    </div>
		    <div class="row">
		        <div class="col-md-12">
		            <div class="form-group">
		                <label class="col-md-4" style="float: left;"> Rents  <span class="err">*</span></label>
		                <input type="text" id="coverage_rentalIncomeLimit_plumbing" name="coverage_rentalIncomeLimit_plumbing" class="form-control col-md-8 commaValues required" placeholder="Enter Limit Required" value="">
		            </div>            
		        </div>
		    </div>
		    
		    
		    <div class="row">
		        <div class="col-md-12">
		            <div class="form-group">
		                <label class="col-md-4" style="float: left;"> Sign Floater <span class="err">*</span></label>
		                <input type="text" id="coverage_signFloater" name="coverage_signFloater" class="form-control col-md-8 commaValues required" placeholder="Enter Limit Required" value="">
		            </div>
		        </div>
		    </div>

		    <div class="row">
		        <div class="col-md-12">
		            <div class="form-group">
		                <label class="col-md-4" style="float: left;"> Office Equipment Floater <span class="err">*</span></label>
		                <input type="text" id="coverage_officeEquipmentsFloater" name="coverage_officeEquipmentsFloater" class="form-control col-md-8  commaValues required" placeholder="Enter Limit Required" value="">
		            </div>
		        </div>
		    </div>

		    <div class="row">
		        <div class="col-md-12">
		            <div class="form-group">
		                <label class="col-md-4" style="float: left;"> Tool Floater <span class="err">*</span></label>
		                <input type="text" id="coverage_toolFloater" name="coverage_toolFloater" class="form-control col-md-8  commaValues required" placeholder="Enter Limit Required" value="">
		            </div>
		        </div>
		    </div>

		    <div class="row" style="margin-bottom: 5px;">
		        <div class="col-md-12">
		            <div class="form-group">
		                <label class="col-md-4" style="float: left;" > Contractors Equipment Floater</label>
		                <input type="text" style="float: left;" id="coverage_CEF" name="coverage_CEF" class="form-control col-md-8  commaValues " placeholder="Enter Limit Required" value="">
		            </div>
		        </div>
		    </div>

		    <hr>
		    <div class="row">
		        <div class="col-md-12">
		            <div class="form-group">
		                <label class="col-md-4" style="float: left;"> Broad Form Money & Securities </label>
		                <input type="text" id="coverage_crime_broadFormMoney" name="coverage_crime_broadFormMoney" class="form-control col-md-8 commaValues " placeholder="Enter Limit" value="">
		            </div>
		        </div>
		    </div>

		    <div class="row">
		        <div class="col-md-12">
		            <div class="form-group">
		                <label class="col-md-4" style="float: left;"> Inside Robbery </label>
		                <input type="text" id="coverage_crime_insideRobbery" name="coverage_crime_insideRobbery" class="form-control col-md-8 commaValues " placeholder="Enter Limit" value="">
		            </div>
		        </div>
		    </div>

		    <div class="row">
		        <div class="col-md-12">
		            <div class="form-group">
		                <label class="col-md-4" style="float: left;"> Outside Robbery </label>
		                <input type="text" id="coverage_crime_outsideRobbery" name="coverage_crime_outsideRobbery" class="form-control col-md-8 commaValues " placeholder="Enter Limit" value="">
		            </div>
		        </div>
		    </div>

		    <div class="row">
		        <div class="col-md-12">
		            <div class="form-group">
		                <label class="col-md-4" style="float: left;"> Employee Dishonesty - Form A</label>
		                <input type="text" id="coverage_crime_employeeDishonesty" name="coverage_crime_employeeDishonesty" class="form-control col-md-8 commaValues " placeholder="Enter Limit" value="">
		            </div>
		        </div>
		    </div>
		    
		    <div class="row">
		        <div class="col-md-12">
		            <div class="form-group">
		                <label class="col-md-4" style="float: left;"> Comprehensive 3D rider </label>
		                <input type="text" id="coverage_crime_3dRider" name="coverage_crime_3dRider" class="form-control col-md-8 commaValues " placeholder="Enter Limit" value="">
		            </div>
		        </div>
		    </div>

		    <hr>
		    
		    <div class="row">
		        <div class="col-md-12">
		            <div class="form-group" >
		                <label class="col-md-4" style="float: left;"> CGL Liability Limit <span class="err">*</span> </label>
		                <select class="form-control col-md-8 required" id="coverage_liabilityLimit_plumbing" name="coverage_liabilityLimit_plumbing">
		                    <option value="">-Select liability limit-</option>
		                    <option value="none">None</option>
		                    <option value="1mm">$1mm</option>
		                    <option value="2mm">$2mm</option>
		                    <option value="3mmOrMore">$3mm or More</option>
		                </select>
		            </div>
		        </div>
		    </div>

		    <div class="row">
		    	<div class="col-md-12">
		    		<div class="form-group" >
				    	<p style="padding: 0;color: red;display: none;" id="closestCityMSG">Please select closest city.</p>
						<label class="col-md-4" style="float: left;">Select closest city</label>
						<select id="closestCity" name="closestCity" class="form-control col-md-8">
							<option value="">-Select closest city-</option>
		                    @foreach ($closestCity as $cs)
		                        <option value="{{ $cs['zoneCityID'] }}"> {{ $cs['name'] }} </option>
		                    @endforeach
						</select>
					</div>
					<div class="form-group" >
						<label class="col-md-4" style="float: left;">Enter distance from closest city</label>
						<input type="text" name="distanceFromClosestCity" id="distanceFromClosestCity" class="form-control col-md-8 allow_decimal" placeholder="distance in km">
					</div>
				</div>
			</div>



		</div>