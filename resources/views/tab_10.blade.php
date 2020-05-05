<!-- <div class="btn-toolbar sw-toolbar sw-toolbar-top justify-content-end"><div class="btn-group mr-2 sw-btn-group" role="group"><button class="btn btn-secondary sw-btn-prev disabled" type="button">Previous</button><button class="btn btn-secondary sw-btn-next" type="button">Next</button></div></div>
 -->
<div class="btn-toolbar sw-toolbar sw-toolbar-top justify-content-end zeroPadding">
    <div class="btn-group mr-2 sw-btn-group" role="group">
        <i class="fa fa-angle-left dirArrow sw-btn-prev" data-toggle="tooltip" title="Previous"></i>
        <i class="fa fa-angle-right dirArrow sw-btn-next" data-toggle="tooltip" title="Next"></i>
    </div>
</div>

<section class="opsIndustryGeneralTab">

    <h3>Property</h3>
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

    <h3>CGL</h3>
     
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

    <p  class="col-md-12" style="margin-bottom: 0px"><b> What are the additional CGL coverages required? </b></p>
    <small  class="col-md-12" style="margin-bottom: 10px;display: block;">defaults-NOA, TLL, Faulty or improper workmanship, property damage, bodily injury, SEF 94/96, CGL form, E/O form claims made. </small>
    
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Employee benefit E/O  <span class="err">*</span> </label>
                <select class="col-md-8 form-control required" id="cgl_cglCoverages_employeeBenefitEO" name="cgl_cglCoverages_employeeBenefitEO">
                    <option value="">-Select Employee benefit E/O-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
    </div>
            
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Employees as additional insureds  <span class="err">*</span> </label>
                <select class="col-md-8 form-control required" id="cgl_cglCoverages_employeeAsAdditionalInsured" name="cgl_cglCoverages_employeeAsAdditionalInsured">
                    <option value="">-Select Employees as additional insureds-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;">  Personal injury limit <span class="err">*</span> </label>
                <select class="col-md-8 form-control required" id="cgl_cglCoverages_personalInjuryLimit" name="cgl_cglCoverages_personalInjuryLimit">
                    <option value="">-Select Personal injury limit-</option>
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

    <p class="col-md-12">Automatic exclusions apply to both CGL & E/O : abuse exclusion, specific operation(s) exclusion-excluding all services rendered outside of home inspections, asbestos exclusion, terrorism exclusion, fungi, fungal derivatives and spores exclusion with $250,000 sublimit, reduction in limits for subcontractors, excluding long term leased vehicle endorsement
    </p>
</section>
