
<section class="occupancyTab">
    <h3>Occupancy</h3>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-md-3" style="float: left;"> Rented Dwelling (number of self-contained units)<span class="err">*</span> </label>
                        <select id="occupancy_rentedDwellingUnits" name="occupancy_rentedDwellingUnits" class="form-control col-md-8 required">
                            <option value="">-Select value-</option>
                            <option value="single family">Single Family</option>
                            <option value="2-3 units">2-3 Units</option>
                            <option value="4-6 units">4-6 Units</option>
                            <option value="6+ units">6+ Units</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-md-3" style="float: left;"> Are there any commercial operations on the premises ?<span class="err">*</span> </label>
                        <select id="occupancy_commercialOperations" name="occupancy_commercialOperations" class="form-control col-md-8 required">
                            <option value="">-Select value-</option>
                            <option value="y">Yes</option>
                            <option value="n">No</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group" id="occupancy_commercialOperationsDescribeBox" style="display: none;">
                <label class="col-md-3" style="float: left;"><span class="optionalBox">Please Describe </span> </label>
                <input type="text" id="occupancy_commercialOperationsDescribe" name="occupancy_commercialOperationsDescribe" class="form-control col-md-8"  value="">
            </div>
            <div class="form-group">
                <label class="col-md-3" style="float: left;"> Are short term rentals allowed (e.g. AirBNB) <span class="err">*</span> </label>
                <select id="occupancy_shortTermRentals" name="occupancy_shortTermRentals" class="form-control col-md-8 required">
                    <option value="">-Select value-</option>
                    <option value="y">Yes</option>
                    <option value="n">No</option>
                </select>
            </div>
            
        </div>
    </div>
</section>
<section class="buildingConstruction">
    <h3>Building Construction</h3>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-3" style="float: left;"> Overall Construction <span class="err">*</span> </label>
                <select id="buildingConstruction_overallConstruction" name="buildingConstruction_overallConstruction" class="form-control col-md-8 required">
                    <option value="">-Select value-</option>
                    <option value="frame-brick veneer">Frame-Brick Veneer</option>
                    <option value="masonary wood joist roof">Masonary Wood Joist Roof</option>
                    <option value="masonary steel deck roof">Masonary Steel Deck Roof</option>
                    <option value="fire resistive">Fire Resistive</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="form-group" id="buildingConstruction_overallConstructionOtherBox" style="display: none;">
                <label class="col-md-3" style="float: left;"><span class="optionalBox">Other - please specify </span> </label>
                <input type="text" id="buildingConstruction_overallConstructionOther" name="buildingConstruction_overallConstructionOther" class="form-control col-md-8"  value="">
            </div>
            <div class="form-group">
                <label class="col-md-3" style="float: left;"> Number of stories <span class="err">*</span> </label>
                <select id="buildingConstruction_noOfStories" name="buildingConstruction_noOfStories" class="form-control col-md-8 required">
                    <option value="">-Select value-</option>
                    <option value="1">1</option>
                    <option value="1.5">1.5</option>
                    <option value="2">2</option>
                    <option value="2.5">2.5</option>
                    <option value="3">3</option>
                    <option value="3.5">3.5</option>
                    <option value="4">4</option>
                    <option value="4.5">4.5</option>
                </select>
            </div>
            <div class="form-group">
                <label class="col-md-3" style="float: left;"> Area - In sqft <span class="err">*</span> </label>
                <select id="buildingConstruction_area" name="buildingConstruction_area" class="form-control col-md-8 required">
                    <option value="">-Select value-</option>
                    <option value="less than 1000">Less than 1000</option>
                    <option value="1001-2000">1001-2000</option>
                    <option value="2001-3000">2001-3000</option>
                    <option value="3001-4000">3001-4000</option>
                    <option value="4001 plus">4001 plus</option>
                </select>
            </div>
            <div class="form-group" id="buildingConstruction_areaSpecifyBox" style="display: none;">
                <label class="col-md-3" style="float: left;"><span class="optionalBox">4000 plus - please specify </span> </label>
                <input type="text" id="buildingConstruction_areaSpecify" name="buildingConstruction_areaSpecify" class="form-control col-md-8"  value="">
            </div>
            <div class="form-group">
                <label class="col-md-3" style="float: left;">Year Built <span class="err">*</span></label>
                <input type="text" id="buildingConstruction_yearBuilt" name="buildingConstruction_yearBuilt" class="form-control col-md-8 onlyNumbers required"  value="" maxlength="4">
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-md-3" style="float: left;">Is building considered a heritage building ? <span class="err">*</span></label>
                        <select id="buildingConstruction_isBuildingHeritage" name="buildingConstruction_isBuildingHeritage" class="form-control col-md-8 required">
                            <option value="">-Select value-</option>
                            <option value="y">Yes</option>
                            <option value="n">No</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3" style="float: left;"> Basement <span class="err">*</span> </label>
                <select id="buildingConstruction_basement" name="buildingConstruction_basement" class="form-control col-md-8 required">
                    <option value="">-Select value-</option>
                    <option value="full">Full</option>
                    <option value="partial">Partial</option>
                    <option value="none">None</option>
                </select>
            </div>
            <div class="form-group">
                <label class="col-md-3" style="float: left;"> Roof - Type of Construction <span class="err">*</span> </label>
                <select id="buildingConstruction_roofTypeConstruction" name="buildingConstruction_roofTypeConstruction" class="form-control col-md-8 required">
                    <option value="">-Select value-</option>
                    <option value="metal">metal</option>
                    <option value="wood joist">Wood Joist</option>
                </select>
            </div>
            <div class="form-group">
                <label class="col-md-3" style="float: left;"> <span class="nestedBox">Roof - Type of Covering</span> <span class="err">*</span> </label>
                <select id="buildingConstruction_roofTypeCovering" name="buildingConstruction_roofTypeCovering" class="form-control col-md-8 required">
                    <option value="">-Select value-</option>
                    <option value="shingles">Shingles</option>
                    <option value="asphalt">Asphalt</option>
                    <option value="tar and gravel">Tar and Gravel</option>
                </select>
            </div>
            <div class="form-group">
                <label class="col-md-3" style="float: left;"><span class="nestedBox">Roof - year updated</span></label>
                <input type="text" id="buildingConstruction_roofYearUpdated" name="buildingConstruction_roofYearUpdated" class="form-control col-md-8 onlyNumbers"  value="" maxlength="4">
            </div>
            <div class="form-group">
                <label class="col-md-3" style="float: left;"><span class="nestedBox">Roof - % completed</span>  </label>
                <select id="buildingConstruction_roofPercentageCompleted" name="buildingConstruction_roofPercentageCompleted" class="form-control col-md-8">
                    <option value="">-Select value-</option>
                    <option value="full">Full</option>
                    <option value="partial">Partial</option>
                </select>
            </div>
            <div class="form-group">
                <label class="col-md-3" style="float: left;"> Wiring - Type <span class="err">*</span> </label>
                <select id="buildingConstruction_wiringType" name="buildingConstruction_wiringType" class="form-control col-md-8 required">
                    <option value="">-Select value-</option>
                    <option value="copper">Copper</option>
                    <option value="aluminum">Aluminum</option>
                    <option value="bx">BX</option>
                    <option value="knob-tube">Knob & Tube</option>
                </select>
            </div>
            <div class="form-group">
                <label class="col-md-3" style="float: left;"><span class="nestedBox">Amperage</span> <span class="err">*</span> </label>
                <select id="buildingConstruction_amperage" name="buildingConstruction_amperage" class="form-control col-md-8 required">
                    <option value="">-Select value-</option>
                    <option value="60AMP">60AMP</option>
                    <option value="100AMP Fuse">100AMP Fuse</option>
                    <option value="100AMP CB">100AMP CB</option>
                    <option value="200AMP">200AMP</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label class="col-md-3" style="float: left;"><span class="nestedBox">Wiring - year updated</span></label>
                <input type="text" id="buildingConstruction_wiringYearUpdated" name="buildingConstruction_wiringYearUpdated" class="form-control col-md-8 onlyNumbers"  value="" maxlength="4">
            </div>
            <div class="form-group">
                <label class="col-md-3" style="float: left;"><span class="nestedBox">Wiring - % completed</span></label>
                <input type="text" id="buildingConstruction_wiringPercentageCompleted" name="buildingConstruction_wiringPercentageCompleted" class="form-control col-md-8"  value="">
            </div>
            <div class="form-group">
                <label class="col-md-3" style="float: left;"> Heating - Primary Type <span class="err">*</span> </label>
                <select id="buildingConstruction_heatingPrimaryType" name="buildingConstruction_heatingPrimaryType" class="form-control col-md-8 required">
                    <option value="">-Select value-</option>
                    <option value="electricity">Electricity</option>
                    <option value="gas">Gas</option>
                    <option value="oil">Oil</option>
                    <option value="propane">Propane</option>
                    <option value="wood/solid">Wood/Solid</option>
                </select>
            </div>
            <div class="form-group">
                <label class="col-md-3" style="float: left;"><span class="nestedBox">Heating - year updated</span></label>
                <input type="text" id="buildingConstruction_heatingYearUpdated" name="buildingConstruction_heatingYearUpdated" class="form-control col-md-8 onlyNumbers"  value="" maxlength="4">
            </div>
            <div class="form-group">
                <label class="col-md-3" style="float: left;"><span class="nestedBox">Heating - % completed</span></label>
                <input type="text" id="buildingConstruction_heatingPercentageCompleted" name="buildingConstruction_heatingPercentageCompleted" class="form-control col-md-8"  value="">
            </div>
            <div class="form-group">
                <label class="col-md-3" style="float: left;"> Heating - Secondary Type <span class="err">*</span> </label>
                <select id="buildingConstruction_heatingSecondaryType" name="buildingConstruction_heatingSecondaryType" class="form-control col-md-8 required">
                    <option value="">-Select value-</option>
                    <option value="electricity">Electricity</option>
                    <option value="gas">Gas</option>
                    <option value="oil">Oil</option>
                    <option value="propane">Propane</option>
                    <option value="wood/solid">Wood/Solid</option>
                </select>
            </div>
            <div class="form-group">
                <label class="col-md-3" style="float: left;"> Plumbing - Type </label>
                <input type="text" id="buildingConstruction_plumbingType" name="buildingConstruction_plumbingType" class="form-control col-md-8"  value="">
            </div>
            <div class="form-group">
                <label class="col-md-3" style="float: left;"><span class="nestedBox">Plumbing - year updated</span></label>
                <input type="text" id="buildingConstruction_plumbingYearUpdated" name="buildingConstruction_plumbingYearUpdated" class="form-control col-md-8 onlyNumbers"  value="" maxlength="4">
            </div>
            <div class="form-group">
                <label class="col-md-3" style="float: left;"><span class="nestedBox">Plumbing - % completed</span></label>
                <input type="text" id="buildingConstruction_plumbingPercentageCompleted" name="buildingConstruction_plumbingPercentageCompleted" class="form-control col-md-8"  value="">
            </div>
        </div>
    </div>
</section>
<section class="fireAlarmDetectors">
    <h3>Fire Alarm / Detectors</h3>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-3" style="float: left;"> Smoke/Heat Detectors </label>
                <select id="fireAlarmDetectors_smokeHeatDetectors" name="fireAlarmDetectors_smokeHeatDetectors" class="form-control col-md-8">
                    <option value="">-Select value-</option>
                    <option value="monitored">Monitored</option>
                    <option value="local">Local</option>
                    <option value="none">None</option>
                </select>
            </div>
            <div class="form-group">
                <label class="col-md-3" style="float: left;"> Sprinklers </label>
                <select id="fireAlarmDetectors_sprinklers" name="fireAlarmDetectors_sprinklers" class="form-control col-md-8">
                    <option value="">-Select value-</option>
                    <option value="monitored">Monitored</option>
                    <option value="local">Local</option>
                    <option value="none">None</option>
                </select>
            </div>
            <div class="form-group">
                <label class="col-md-3" style="float: left;"><span class="nestedBox">Sprinkler Coverage</span></label>
                <input type="text" id="fireAlarmDetectors_sprinklerCoverage" name="fireAlarmDetectors_sprinklerCoverage" class="form-control col-md-8"  value="">
            </div>
            <div class="form-group">
                <label class="col-md-3" style="float: left;"> Hydrant(s) <span class="err">*</span></label>
                <select id="fireAlarmDetectors_hydrant" name="fireAlarmDetectors_hydrant" class="form-control col-md-8 required">
                    <option value="">-Select value-</option>
                    <option value="within 75m">Within 75m</option>
                    <option value="within 150m">Within 150m</option>
                    <option value="over 150m">Over 150m</option>
                </select>
            </div>
            <div class="form-group">
                <label class="col-md-3" style="float: left;"> Fire Department - Distance <span class="err">*</span></label>
                <select id="fireAlarmDetectors_fireDeptDistance" name="fireAlarmDetectors_fireDeptDistance" class="form-control col-md-8 required">
                    <option value="">-Select value-</option>
                    <option value="within 3km">Within 3km</option>
                    <option value="within 5km">Within 5km</option>
                    <option value="within 10km">Within 10km</option>
                    <option value="over 10km">Over 10km</option>
                </select>
            </div>
            <div class="form-group">
                <label class="col-md-3" style="float: left;"> Fire Department - Type <span class="err">*</span></label>
                <select id="fireAlarmDetectors_fireDeptTye" name="fireAlarmDetectors_fireDeptTye" class="form-control col-md-8 required">
                    <option value="">-Select value-</option>
                    <option value="paid">Paid</option>
                    <option value="volunteer">Volunteer</option>
                    <option value="Part Paid/Part Volunteer">Part Paid/Part Volunteer</option>
                </select>
            </div>
        </div>
    </div>
</section>
<section class="liability">
    <h3>Liability</h3>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-3" style="float: left;"> Does the premises have a pool? <span class="err">*</span></label>
                <select id="liability_doesPremisesHavePool" name="liability_doesPremisesHavePool" class="form-control col-md-8 required">
                    <option value="">-Select value-</option>
                    <option value="y">Yes</option>
                    <option value="n">No</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group" id="ifPremiseHasPoolBox" style="display: none;">
                <label class="col-md-3" style="float: left;"><span class="optionalBox">If Yes, Are the premises fenced and gated? </span> </label>
                <select id="liability_doesPremisesFenced" name="liability_doesPremisesFenced" class="form-control col-md-8">
                    <option value="">-Select value-</option>
                    <option value="y">Yes</option>
                    <option value="n">No</option>
                </select>
            </div>
            
        </div>
    </div>
</section>