
        <div class="col-md-12">
			<div class="form-group">
                <label class="col-md-4" style="float: left;"> Province / State <span class="err">*</span> </label>
                <select class="form-control col-md-8 required" id="risk_address_province" name="risk_address_province">
                    <option value="">-Select province-</option>
                    @foreach ($canState as $s)
                        <option value="{{ $s['name'] }}"> {{ $s['name'] }} </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="col-md-4" style="float: left;">Year Built <span class="err">*</span></label>
                <input type="text" id="buildingConstruction_yearBuilt" name="buildingConstruction_yearBuilt" class="form-control col-md-8 onlyNumbers checkYear required"  value="" maxlength="4">
            </div>

            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Hydrant(s) <span class="err">*</span></label>
                <select id="fireAlarmDetectors_hydrant" name="fireAlarmDetectors_hydrant" class="form-control col-md-8 required">
                    <option value="">-Select hydrant-</option>
                    <option value="Within 75m">Within 75m (=< 250 feet)</option>
                    <option value="Within 150m">Within 150m (=< 500 feet)</option>
                    <option value="Over 150m">Over 150m (>500 feet)</option>
                </select>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-md-4" style="float: left;"> Fire Department - Distance <span class="err">*</span></label>
                        <select id="fireAlarmDetectors_fireDeptDistance" name="fireAlarmDetectors_fireDeptDistance" class="form-control col-md-8 required">
                            <option value="">-Select fire department distance-</option>
                            <option value="Within 3km">Within 3km (< 1.75 miles)</option>
                            <option value="Within 5km">Within 5km (< 3 miles)</option>
                            <option value="Within 10km">Within 10km (< 6 miles)</option>
                            <option value="Over 10km">Over 10km (> 6 miles)</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Fire Department - Type <span class="err">*</span></label>
                <select id="fireAlarmDetectors_fireDeptTye" name="fireAlarmDetectors_fireDeptTye" class="form-control col-md-8 required">
                    <option value="">-Select fire department type-</option>
                    <option value="Paid">Paid</option>
                    <option value="Volunteer">Volunteer</option>
                    <option value="Part Paid/Part Volunteer">Part Paid/Part Volunteer</option>
                </select>
            </div>

            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Building Limit </label>
                <input type="text" id="coverage_buildingLimit" name="coverage_buildingLimit" class="form-control col-md-8 commaValues" placeholder="Enter Limit" value="">
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Contents Limit  </label>
                <input type="text" id="coverage_contentsLimit" name="coverage_contentsLimit" class="form-control col-md-8 commaValues" placeholder="Enter Limit" value="">
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Rental Income Limit  </label>
                <input type="text" id="coverage_rentalIncomeLimit" name="coverage_rentalIncomeLimit" class="form-control col-md-8 commaValues" placeholder="Enter Limit" value="">
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Garage Limit </label>
                <input type="text" id="coverage_garageLimit" name="coverage_garageLimit" class="form-control col-md-8 commaValues" placeholder="Enter Limit" value="">
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Shed Limit </label>
                <input type="text" id="coverage_shedLimit" name="coverage_shedLimit" class="form-control col-md-8 commaValues" placeholder="Enter Limit" value="">
            </div>
            <div class="form-group" >
                <label class="col-md-4" style="float: left;"> Liability Limit <span class="err">*</span> </label>
                <select class="form-control col-md-8 required" id="coverage_liabilityLimit" name="coverage_liabilityLimit">
                    <option value="">-Select liability limit-</option>
                    <option value="1mm">$1mm</option>
                    <option value="2mm">$2mm</option>
                    <option value="none">None</option>
                </select>
            </div>

            

        </div>
