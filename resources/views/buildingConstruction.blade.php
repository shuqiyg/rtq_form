<section class="buildingConstruction">
    <h3>Building Construction</h3>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Overall Construction <span class="err">*</span> </label>
                <select id="buildingConstruction_overallConstruction" name="buildingConstruction_overallConstruction" class="form-control col-md-8 required">
                    <option value="">-Select overall construction-</option>
                    <option value="Frame-Brick Veneer">Frame-Brick Veneer</option>
                    <option value="Masonary Wood Joist Roof">Masonary Wood Joist Roof</option>
                    <option value="Masonary Steel Deck Roof">Masonary Steel Deck Roof</option>
                    <option value="Fire Resistive">Fire Resistive</option>
                    <option value="NotApplicable">Not Applicable</option>
                </select>
            </div>
            <div class="form-group" id="buildingConstruction_overallConstructionOtherBox" style="display: none;">
                <label class="col-md-4" style="float: left;"><span class="optionalBox">Other - please specify</span> </label>
                <input type="text" id="buildingConstruction_overallConstructionOther" name="buildingConstruction_overallConstructionOther" class="form-control col-md-8" value="">
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Number of stories <span class="err">*</span> </label>
                <select id="buildingConstruction_noOfStories" name="buildingConstruction_noOfStories" class="form-control col-md-8 required">
                    <option value="">-Select number of stories-</option>
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

            @if ($formVal != 'plumbing')
                <div class="form-group">
                    <label class="col-md-4" style="float: left;"> Area - In sqft <span class="err">*</span> </label>
                    <select id="buildingConstruction_area" name="buildingConstruction_area" class="form-control col-md-8 required">
                        <option value="">-Select area-</option>
                        <option value="Less than 1000">Less than 1000</option>
                        <option value="1001-2000">1001-2000</option>
                        <option value="2001-3000">2001-3000</option>
                        <option value="3001-4000">3001-4000</option>
                        <option value="4001 plus">4001 plus</option>
                    </select>
                </div>
                <div class="form-group" id="buildingConstruction_areaSpecifyBox" style="display: none;">
                    <label class="col-md-4" style="float: left;"><span class="optionalBox">4000 plus - please specify </span> </label>
                    <input type="text" id="buildingConstruction_areaSpecify" name="buildingConstruction_areaSpecify" class="form-control col-md-8" value="">
                </div>
            @endif

            @if ($formVal == 'plumbing')
                <div class="form-group">
                    <label class="col-md-4" style="float: left;">Area - In sqft <span class="err">*</span> </label>
                    <input type="text" id="buildingConstruction_area" name="buildingConstruction_area" class="form-control col-md-8 onlyNumbers required" value="">
                </div>
            @endif

            <div class="form-group">
                <label class="col-md-4" style="float: left;">Year Built <span class="err">*</span></label>
                <input type="text" id="buildingConstruction_yearBuilt" name="buildingConstruction_yearBuilt" class="form-control col-md-8 onlyNumbers checkYear amfPropertyExtention buildingPerils required" maxlength="4">
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-md-4" style="float: left;">Is building considered a heritage building?</label>
                        <!-- <input class="checkbox_custom" type="checkbox" id="buildingConstruction_isBuildingHeritage" name="buildingConstruction_isBuildingHeritage"> -->
                        <div class="radio_group">
                            <input type="radio" id="Yes" name="buildingConstruction_isBuildingHeritage" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="No" name="buildingConstruction_isBuildingHeritage" value="No"><span class="radio_title">No</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Basement <span class="err">*</span>
                </label>
                <select id="buildingConstruction_basement" name="buildingConstruction_basement" class="form-control col-md-8 required">
                    <option value="">-Select value-</option>
                    <option value="Full">Full</option>
                    <option value="Partial">Partial</option>
                    <option value="None">None</option>
                </select>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-md-4" style="float: left;"> Roof - Type of Construction <span class="err">*</span> </label>
                        <select id="buildingConstruction_roofTypeConstruction" name="buildingConstruction_roofTypeConstruction" class="form-control col-md-8 required">
                            <option value="">-Select type of construction-</option>
                            <option value="Metal">Metal</option>
                            <option value="Wood Joist">Wood Joist</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-md-4" style="float: left;"> <span class="nestedBox">Roof - Type of Covering</span> <span class="err">*</span> </label>
                        <select id="buildingConstruction_roofTypeCovering" name="buildingConstruction_roofTypeCovering" class="form-control col-md-8 required">
                            <option value="">-Select type of covering-</option>
                            <option value="Asphalt Shingles">Asphalt Shingles</option>
                            <option value="Shake Shingles">Shake Shingles</option>
                            <option value="Tar and Gravel">Tar and Gravel</option>
                            <option value="Tile">Tile</option>
                            <option value="Metal">Metal</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-md-4" style="float: left;"><span class="nestedBox">Roof - year updated</span></label>
                        <input type="text" id="buildingConstruction_roofYearUpdated" name="buildingConstruction_roofYearUpdated" class="form-control col-md-8 onlyNumbers checkYear buildingUpdated amfPropertyExtention buildingPerils" value="" maxlength="4">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-md-4" style="float: left;"><span class="nestedBox">Roof - % completed</span> </label>
                        <select id="buildingConstruction_roofPercentageCompleted" name="buildingConstruction_roofPercentageCompleted" class="form-control col-md-8 ">
                            <option value="">-Select value-</option>
                            <option value="Full">Full</option>
                            <option value="Partial">Partial</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Wiring - Type <span class="err">*</span> </label>
                <select id="buildingConstruction_wiringType" name="buildingConstruction_wiringType" class="form-control col-md-8 required">
                    <option value="">-Select wiring type-</option>
                    <option value="Copper">Copper</option>
                    <option value="Aluminum">Aluminum</option>
                    <option value="Knob and Tube">Knob and Tube</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"><span class="nestedBox">Amperage</span> <span class="err">*</span> </label>
                <select id="buildingConstruction_amperage" name="buildingConstruction_amperage" class="form-control col-md-8 required">
                    <option value="">-Select amperage-</option>
                    <option value="60AMP">60AMP</option>
                    <option value="100AMP Fuse">100AMP Fuse</option>
                    <option value="100AMP CB">100AMP CB</option>
                    <option value="200AMP">200AMP</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"><span class="nestedBox">Wiring - year updated</span></label>
                <input type="text" id="buildingConstruction_wiringYearUpdated" name="buildingConstruction_wiringYearUpdated" class="form-control col-md-8 onlyNumbers checkYear buildingUpdated amfPropertyExtention buildingPerils" value="" maxlength="4">
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"><span class="nestedBox">Wiring - % completed</span></label>
                <input type="number" id="buildingConstruction_wiringPercentageCompleted" name="buildingConstruction_wiringPercentageCompleted" class="form-control col-md-8 checkPercentage" onInput="return check(event,value)" min="0" max="100">
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-md-4" style="float: left;"> Heating - Primary Type <span class="err">*</span> </label>
                        <select id="buildingConstruction_heatingPrimaryType" name="buildingConstruction_heatingPrimaryType" class="form-control col-md-8 required">
                            <option value="">-Select heating primary type-</option>
                            <option value="Electricity">Electricity</option>
                            <option value="Gas">Gas</option>
                            <option value="Oil">Oil</option>
                            <option value="Propane">Propane</option>
                            <option value="Wood-Solid">Wood/Solid</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-md-4" style="float: left;"><span class="nestedBox">Heating - year updated</span></label>
                        <input type="text" id="buildingConstruction_heatingYearUpdated" name="buildingConstruction_heatingYearUpdated" class="form-control col-md-8 onlyNumbers checkYear buildingUpdated amfPropertyExtention buildingPerils" value="" maxlength="4">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-md-4" style="float: left;"><span class="nestedBox">Heating - % completed</span></label>
                        <input type="number" id="buildingConstruction_heatingPercentageCompleted" name="buildingConstruction_heatingPercentageCompleted" class="form-control col-md-8 checkPercentage" onInput="return check(event,value)" min="0" max="100" step="0.01">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-md-4" style="float: left;"> Heating - Secondary Type <span class="err">*</span> </label>
                        <select id="buildingConstruction_heatingSecondaryType" name="buildingConstruction_heatingSecondaryType" class="form-control col-md-8 required">
                            <option value="">-Select heating secondary type-</option>
                            <option value="None">None</option>
                            <option value="Propane">Propane</option>
                            <option value="Electricity">Electricity</option>
                            <option value="Gas">Gas</option>
                            <option value="Oil">Oil</option>
                            <option value="Wood-Solid">Wood/Solid</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-md-4" style="float: left;"> Plumbing - Type <span class="err">*</span></label>
                        <!--  <input type="text" id="buildingConstruction_plumbingType" name="buildingConstruction_plumbingType" class="form-control col-md-8"  value=""> -->
                        <select id="buildingConstruction_plumbingType" name="buildingConstruction_plumbingType" class="form-control col-md-8 required">
                            <option value="">-Select Plumbing - Type-</option>
                            <option value="Copper">Copper</option>
                            <option value="Galvanized">Galvanized</option>
                            <option value="Plastic">Plastic</option>
                            <option value="Cast Iron">Cast Iron</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-md-4" style="float: left;"><span class="nestedBox">Plumbing - year updated</span></label>
                        <input type="text" id="buildingConstruction_plumbingYearUpdated" name="buildingConstruction_plumbingYearUpdated" class="form-control col-md-8 onlyNumbers checkYear buildingUpdated amfPropertyExtention buildingPerils" value="" maxlength="4">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-md-4" style="float: left;"><span class="nestedBox">Plumbing - % completed</span></label>
                        <input type="number" id="buildingConstruction_plumbingPercentageCompleted" name="buildingConstruction_plumbingPercentageCompleted" class="form-control col-md-8 checkPercentage" onInput="return check(event,value)" min="0" max="100" step="0.01">
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
