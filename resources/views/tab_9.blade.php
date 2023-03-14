<!-- <div class="btn-toolbar sw-toolbar sw-toolbar-top justify-content-end"><div class="btn-group mr-2 sw-btn-group" role="group"><button class="btn btn-secondary sw-btn-prev disabled" type="button">Previous</button><button class="btn btn-secondary sw-btn-next" type="button">Next</button></div></div>
 -->
<div class="btn-toolbar sw-toolbar sw-toolbar-top justify-content-end zeroPadding">
    <div class="btn-group mr-2 sw-btn-group" role="group">
        <i class="fa fa-angle-left dirArrow sw-btn-prev" data-toggle="tooltip" title="Previous"></i>
        <i class="fa fa-angle-right dirArrow sw-btn-next" data-toggle="tooltip" title="Next"></i>
    </div>
</div>

<section class="opsIndustryGeneralTab">
    <h3>Operation  <small>(Industry Specific)</small></h3>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Radioactive sampling and testing? <span class="err">*</span> </label>
               <!--  <select class="col-md-8 form-control required" id="ops_radioactiveSamplingTesting" name="ops_radioactiveSamplingTesting">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select> -->
                  <div class="radio_group required">
                <input type="radio" id="yes" name="ops_radioactiveSamplingTesting" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="ops_radioactiveSamplingTesting" value="No"><span class="radio_title">No</span>
                  <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
            </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group radioactiveSamplingTestingBOX" style="display: none;">
                <label class="col-md-4" style="float: left;"><span class="optionalBox"> Is it outsourced to thrid party with own insurance?  <span class="err">*</span></span> </label>
                <!-- <select class="col-md-8 form-control required" id="ops_radioactiveSamplingTesting_thirdPartyInsurance" name="ops_radioactiveSamplingTesting_thirdPartyInsurance">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select> -->
                  <div class="radio_group required">
                <input type="radio" id="yes" name="ops_radioactiveSamplingTesting_thirdPartyInsurance" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="ops_radioactiveSamplingTesting_thirdPartyInsurance" value="No"><span class="radio_title">No</span>
                  <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
            </div>
        </div>
    </div>
            
    <div class="row">
        <div class="col-md-12">
            <div class="form-group" >
                <label class="col-md-12" style="float: left;"> What are your three (3) largest jobs or projects in the past three (3) years? </label>
                <textarea rows="5" class="form-control col-md-12" id="ops_threeLargeJobsOrProjectInPastThreeYear" name="ops_threeLargeJobsOrProjectInPastThreeYear" ></textarea>
            </div>
        </div>
    </div>

    <p style="margin-bottom: 0px"><b>What is the percentage of your firm's sources of gross revenue from last fiscal period?</b></p>
    <h4 style="clear: both;">Government</h4><hr>
    
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Federal-%  <span class="err">*</span> </label>
                <input type="number" id="ops_government_federal" name="ops_government_federal" class="form-control col-md-8  checkPercentage" onInput="return check(event,value)"  min="0" max="100" step="0.01">
            </div>
        </div>
    </div>
            
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Institutional (schools/hospitals)-%  <span class="err">*</span> </label>
                <input type="number" id="ops_government_institutional" name="ops_government_institutional" class="form-control col-md-8  checkPercentage" onInput="return check(event,value)"  min="0" max="100" step="0.01">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Provincial, County, Local-%  <span class="err">*</span> </label>
                <input type="number" id="ops_government_provincial" name="ops_government_provincial" class="form-control col-md-8  checkPercentage" onInput="return check(event,value)"  min="0" max="100" step="0.01">
            </div>
        </div>
    </div>

    <h4 style="clear: both;">Financial</h4><hr>
    
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;">  Finance/Lending/Mortgage companies-% <span class="err">*</span> </label>
                <input type="number" id="ops_financial_flm" name="ops_financial_flm" class="form-control col-md-8  checkPercentage" onInput="return check(event,value)"  min="0" max="100" step="0.01">
            </div>
        </div>
    </div>
            
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;">  Insurance-%  <span class="err">*</span> </label>
                <input type="number" id="ops_financial_insurance" name="ops_financial_insurance" class="form-control col-md-8  checkPercentage" onInput="return check(event,value)"  min="0" max="100" step="0.01">
            </div>
        </div>
    </div>

    <h4 style="clear: both;">Construction</h4><hr>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Residential-%  <span class="err">*</span> </label>
                <input type="number" id="ops_construction_residential" name="ops_construction_residential" class="form-control col-md-8  checkPercentage" onInput="return check(event,value)"  min="0" max="100" step="0.01">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Commercial-%  <span class="err">*</span> </label>
                <input type="number" id="ops_construction_commercial" name="ops_construction_commercial" class="form-control col-md-8  checkPercentage" onInput="return check(event,value)"  min="0" max="100" step="0.01">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Existing Industrial-% <span class="err">*</span> </label>
                <input type="number" id="ops_construction_industrial" name="ops_construction_industrial" class="form-control col-md-8  checkPercentage" onInput="return check(event,value)"  min="0" max="100" step="0.01">
            </div>
        </div>
    </div>

    <h4 style="clear: both;">Real Estate</h4><hr>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;">  For Agent-%  <span class="err">*</span> </label>
                <input type="number" id="ops_realEstate_forAgent" name="ops_realEstate_forAgent" class="form-control col-md-8  checkPercentage" onInput="return check(event,value)"  min="0" max="100" step="0.01">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Individual seller-%   <span class="err">*</span> </label>
                <input type="number" id="ops_realEstate_individualSeller" name="ops_realEstate_individualSeller" class="form-control col-md-8  checkPercentage" onInput="return check(event,value)"  min="0" max="100" step="0.01">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Individual buyer-%  <span class="err">*</span> </label>
                <input type="number" id="ops_realEstate_individualBuyer" name="ops_realEstate_individualBuyer" class="form-control col-md-8 checkPercentage" onInput="return check(event,value)"  min="0" max="100" step="0.01">
            </div>
        </div>
    </div>
    
     <h4 style="clear: both;">Other</h4><hr>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;">  Other-%  <span class="err">*</span> </label>
                <input type="number" id="ops_percentage_other" name="ops_percentage_other" class="form-control col-md-8 required checkPercentage" onInput="return check(event,value)"  min="0" max="100" step="0.01">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Does your firm offer repair/renovation services to clients after an inspection  <span class="err">*</span> </label>
               <!--  <select class="col-md-8 form-control required" id="ops_offerRepairServiceAfterInspection" name="ops_offerRepairServiceAfterInspection">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select> -->
                  <div class="radio_group required">
                <input type="radio" id="yes" name="ops_offerRepairServiceAfterInspection" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="ops_offerRepairServiceAfterInspection" value="No"><span class="radio_title">No</span>
                  <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;">  Do you provide all your clients with a written inspection report?  <span class="err">*</span> </label>
               <!--  <select class="col-md-8 form-control required" id="ops_provideWrittenInspectionReport" name="ops_provideWrittenInspectionReport">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select> -->
                  <div class="radio_group required">
                <input type="radio" id="yes" name="ops_provideWrittenInspectionReport" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="ops_provideWrittenInspectionReport" value="No"><span class="radio_title">No</span>
                  <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
            </div>
        </div>
    </div>

</section>
