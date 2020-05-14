<!-- <div class="btn-toolbar sw-toolbar sw-toolbar-top justify-content-end"><div class="btn-group mr-2 sw-btn-group" role="group"><button class="btn btn-secondary sw-btn-prev disabled" type="button">Previous</button><button class="btn btn-secondary sw-btn-next" type="button">Next</button></div></div>
 -->
<div class="btn-toolbar sw-toolbar sw-toolbar-top justify-content-end zeroPadding">
    <div class="btn-group mr-2 sw-btn-group" role="group">
        <i class="fa fa-angle-left dirArrow sw-btn-prev" data-toggle="tooltip" title="Previous"></i>
        <i class="fa fa-angle-right dirArrow sw-btn-next" data-toggle="tooltip" title="Next"></i>
    </div>
</div>

<section class="coverageRequired">
    <h3>Coverage Required</h3>
    @if($formVal == "rentedDwelling" || $formVal == "ownerOccupied")
    <div class="row">
        <div class="col-md-12">
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
    </div>
    @endif
    @if($formVal == "plumbing")
    <!-- Hidden fields for backend -->
    <input type="hidden" name="tivLimit" id="tivLimit">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Perils <span class="err">*</span></label>
                <select class="form-control col-md-8 required" id="coverage_perils" name="coverage_perils">
                    <option value="">-Select Perils-</option>
                    <option value="All Risk">All Risk</option>
                    <option value="Named Perils">Named Perils</option>
                </select>
            </div>
        </div>
    </div>
    <h5 style="color: white; background-color: #b2bed1;text-align: center;padding:5px;">Property</h5>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Building </label>
                <input type="text" id="coverage_buildingLimit" name="coverage_buildingLimit" class="form-control col-md-8 commaValues getTIV amfPropertyExtention " placeholder="Enter Limit Required" value="">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Contents <span class="err">*</span></label>
                <input type="text" id="coverage_contentsLimit" name="coverage_contentsLimit" class="form-control col-md-8 commaValues getTIV amfPropertyExtention required" placeholder="Enter Limit Required" value="">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Consequential Loss <span class="err">*</span></label>
                <input type="text" id="coverage_consequentialLoss" name="coverage_consequentialLoss" class="form-control col-md-8 commaValues required" placeholder="Enter Limit Required" value="">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Profits <span class="err">*</span></label>
                <input type="text" id="coverage_profits" name="coverage_profits" class="form-control col-md-8 commaValues getTIV amfPropertyExtention required" placeholder="Enter Limit Required" value="">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Gross Earnings <span class="err">*</span></label>
                <input type="text" id="coverage_grossEarnings" name="coverage_grossEarnings" class="form-control col-md-8 commaValues getTIV amfPropertyExtention required" placeholder="Enter Limit Required" value="">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Extra Expenses  <span class="err">*</span></label>
                <input type="text" id="coverage_extraExpenses" name="coverage_extraExpenses" class="form-control col-md-8 getTIV amfPropertyExtention commaValues required" placeholder="Enter Limit Required" value="">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Rents  <span class="err">*</span></label>
                <input type="text" id="coverage_rentalIncomeLimit" name="coverage_rentalIncomeLimit" class="form-control col-md-8 getTIV amfPropertyExtention commaValues required" placeholder="Enter Limit Required" value="">
            </div>            
        </div>
    </div>
    
    
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Sign Floater <span class="err">*</span></label>
                <input type="text" id="coverage_signFloater" name="coverage_signFloater" class="form-control col-md-8 getTIV amfPropertyExtention commaValues required" placeholder="Enter Limit Required" value="">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Office Equipments Floater <span class="err">*</span></label>
                <input type="text" id="coverage_officeEquipmentsFloater" name="coverage_officeEquipmentsFloater" class="form-control col-md-8 getTIV amfPropertyExtention commaValues required" placeholder="Enter Limit Required" value="">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Tool Floater <span class="err">*</span></label>
                <input type="text" id="coverage_toolFloater" name="coverage_toolFloater" class="form-control col-md-8 commaValues required" placeholder="Enter Limit Required" value="">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <!-- <label class="col-md-4 subFormLabel" style="float: left;" id="openCEF" data-toggle="tooltip" title="Open CEF sub form"> Contractors Equipment Floater <i class="fa fa-level-down"></i></label> -->
                <label class="col-md-4 subFormLabel" style="float: left;" id="openCEF" data-toggle="tooltip" title="Open CEF Form"> Contractors Equipment Floater <i>(Open CEF App)</i></label>
                <input type="text" style="float: left;" id="coverage_CEF" name="coverage_CEF" class="form-control col-md-8 commaValues " placeholder="Enter Limit Required" value="">
                <p class="col-md-12" style="width:100%;color: red;float: left;display: none;" id="subformCEF_MSG">Please complete the CEF form</p>
            </div>
        </div>
    </div>
    <div class="row subformCEF" id="accordion" style="display: none;">
        @include('subform/CEF')
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Boiler & Other Machinery <span class="err">*</span></label>
                <input type="text" id="coverage_boiler" name="coverage_boiler" class="form-control col-md-8 commaValues required" placeholder="Enter Limit Required" value="">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> AMF Property Extensions </label>
                <input type="text" id="coverage_amfPropertyExt" name="coverage_amfPropertyExt" class="form-control col-md-8 commaValues " value="Not Available"  disabled>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Other </label>
                <input type="text" id="coverage_otherProperty" name="coverage_otherProperty" class="form-control col-md-8 commaValues "  value="">
            </div>
        </div>
    </div>

    @if($formVal == "plumbing")
<section>
    <h3  class="includeExclude">Include or Exclude</h3>
    <div class="row">
        <div class="col-md-12 includeExclude">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Flood <span class="err">*</span></label>
                <select id="coverage_includeExclude_flood" name="coverage_includeExclude_flood" class="form-control col-md-8 required">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 includeExclude">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Earthquake <span class="err">*</span></label>
                <select id="coverage_includeExclude_earthquake" name="coverage_includeExclude_earthquake" class="form-control col-md-8 required">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 includeExclude">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Sewer Backup <span class="err">*</span></label>
                <select id="coverage_includeExclude_sewerBackup" name="coverage_includeExclude_sewerBackup" class="form-control col-md-8 required">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
    </div>
    
</section>
@endif

@if($formVal == "plumbing")
<section>
    <h3>Crime</h3>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Broad Form Money & Securities </label>
                <input type="text" id="coverage_crime_broadFormMoney" name="coverage_crime_broadFormMoney" class="form-control col-md-8 commaValues " placeholder="Enter Limit" value="">
            </div>
        </div>
    </div>

    <!-- <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> IN & Out Hold-up </label>
                <input type="text" id="coverage_crime_inOutHoldup" name="coverage_crime_inOutHoldup" class="form-control col-md-8 commaValues " placeholder="Enter Limit" value="">
            </div>
        </div>
    </div> -->

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
    
</section>
@endif

    <br/>
    <h5  style="color: white; background-color: #b2bed1;text-align: center;padding:5px;">Liability</h5>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group" >
                <label class="col-md-4" style="float: left;"> CGL Liability Limit <span class="err">*</span> </label>
                <select class="form-control col-md-8 required" id="coverage_liabilityLimit" name="coverage_liabilityLimit">
                    <option value="">-Select liability limit-</option>
                    <option value="1mm">$1mm</option>
                    <option value="2mm">$2mm</option>
                    <option value="none">None</option>
                </select>
            </div>
        </div>
    </div>
    
    <!-- <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Broad Form Vendors <span class="err">*</span></label>
                <input type="text" id="coverage_broadFormVendors" name="coverage_broadFormVendors" class="form-control col-md-8 commaValues required" placeholder="Enter Limit Required" value="">
            </div>
        </div>
    </div> -->

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Employee Practices <span class="err">*</span></label>
                <input type="text" id="coverage_employeePractices" name="coverage_employeePractices" class="form-control col-md-8 commaValues required" placeholder="Enter Limit Required" value="">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> SEF #94 - Private Passenger & Light Commercial under 2,800Kg. <span class="err">*</span></label>
                <input type="text" id="coverage_SEF94" name="coverage_SEF94" class="form-control col-md-8 commaValues required" placeholder="Enter Limit Required" value="">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> SEF #96 - Contractual Liability Endorsement <span class="err">*</span></label>
                <input type="text" id="coverage_SEF96" name="coverage_SEF96" class="form-control col-md-8 commaValues required" placeholder="Enter Limit Required" value="">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Employee Liability <span class="err">*</span></label>
                <input type="text" id="coverage_employeeLiability" name="coverage_employeeLiability" class="form-control col-md-8 commaValues required" placeholder="Enter Limit Required" value="">
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Voluntary Compensation <span class="err">*</span></label>
                <input type="text" id="coverage_voluntaryCompensation" name="coverage_voluntaryCompensation" class="form-control col-md-8 commaValues required" placeholder="Enter Limit Required" value="">
            </div>
        </div>
    </div>

    <!-- <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Forest Fire Fighting Expense <span class="err">*</span></label>
                <input type="text" id="coverage_forestFireFightingExpense" name="coverage_forestFireFightingExpense" class="form-control col-md-8 commaValues required" placeholder="Enter Limit Required" value="">
            </div>
        </div>
    </div> -->

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Faulty Workmanship <span class="err">*</span></label>
                <input type="text" id="coverage_faultyWorkmanship" name="coverage_faultyWorkmanship" class="form-control col-md-8 commaValues required" placeholder="Enter Limit Required" value="">
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Abuse Endorsement <span class="err">*</span></label>
                <input type="text" id="coverage_abuseEndorsement" name="coverage_abuseEndorsement" class="form-control col-md-8 commaValues required" placeholder="Enter Limit Required" value="">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> TLL</label>
                <input type="text" id="coverage_crime_TLL" name="coverage_crime_TLL" class="form-control col-md-8 commaValues " placeholder="Enter Limit Required" value="">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Other </label>
                <input type="text" id="coverage_otherLiability" name="coverage_otherLiability" class="form-control col-md-8 commaValues "  value="">
            </div>
        </div>
    </div>


    @endif

</section>

