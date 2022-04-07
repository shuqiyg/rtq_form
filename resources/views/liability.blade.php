<section class="liabilityTab">
    <h3>Liability</h3>

    <div class="row">
        <div class="col-md-12">
            <h5 class="col-md-12" style="float: left;">Show in detail type(s) of operations and work performed by applicant ( Add as many as required )</h5>
        </div>
    </div>
    <input type="hidden" name="liability_typeOfOpsWorkPerformCount" id="liability_typeOfOpsWorkPerformCount" value="1">
    <input type="hidden" name="liability_typeOfOpsWorkPerformIAO" id="liability_typeOfOpsWorkPerformIAO">
    <div class="row">
        <div class="col-md-12" style="padding: 0% 10%;">
            <?php
            // get form province rule json
            $plumbing_iao = json_decode(file_get_contents(public_path() . '/json/plumbing_iao.json'), true);
            array_multisort(array_column($plumbing_iao, 'desc'), SORT_ASC, $plumbing_iao);
            //dd( $plumbing_iao);
            ?>
            <div class="opsWorkPerformed">
                <div class="towf_sections" style="width: 100%;">
                    <span class="col-md-1" style="float: left;text-align: center;"> 1) </span>
                    <label class="col-md-4" style="float: left;">Operation / Product <span
                            class="err">*</span> </label>
                    <!-- <input type="text" id="liability_typeOfOpsWorkPerformOperation_1" name="liability_typeOfOpsWorkPerformOperation_1" class="form-control col-md-7 required"  value="" > -->
                    <select id="liability_typeOfOpsWorkPerformOperation_1"
                        name="liability_typeOfOpsWorkPerformOperation_1"
                        class="form-control col-md-7 required combobox">
                        <option value="">-Select Operation/Product-</option>
                        @foreach ($plumbing_iao as $k => $v)
                            <option data-iao="{{ $v['iao'] }}" value="{{ $v['desc'] }}">{{ $v['desc'] }}
                            </option>
                        @endforeach
                        <!-- <option data-iao="1711" value="Plumbing - including Hot Tubs">Plumbing - including Hot Tubs</option>
                        <option data-iao="5092" value="Hardware, Plumbing Supplies, Electrical Apparatus">Hardware, Plumbing Supplies, Electrical Apparatus</option>
                        <option data-iao="1521" value="Driveway, Parking Area Construction">Driveway, Parking Area Construction</option>
                        <option data-iao="1522" value="Fence Construction">Fence Construction</option>
                        <option data-iao="1523" value="Sidewalk Construction N.O.C.">Sidewalk Construction N.O.C.</option>
                        <option data-iao="1527" value="Cleaning Sewers & Drains">Cleaning Sewers & Drains</option>
                        <option data-iao="1528" value="Cleaning Streets (No Snow)">Cleaning Streets (No Snow)</option>
                        <option data-iao="1534" value="Antenna Installation (TV, Parabolic - ie cable)">Antenna Installation (TV, Parabolic - ie cable)</option>
                        <option data-iao="1535" value="Glazier">Glazier</option>
                        <option data-iao="1713" value="Steamfitting">Steamfitting</option>
                        <option data-iao="1715" value="Heating & A. C. (Oil/Gas)">Heating & A. C. (Oil/Gas)</option>
                        <option data-iao="1716" value="Heating & A. C. (Solid Fuel)">Heating & A. C. (Solid Fuel)</option>
                        <option data-iao="1717" value="Air Conditioning incl. Heat Pumps">Air Conditioning incl. Heat Pumps</option>
                        <option data-iao="1718" value="Refrigeration (Commercial)">Refrigeration (Commercial)</option>
                        <option data-iao="1719" value="Solar Energy Contractors">Solar Energy Contractors</option>
                        <option data-iao="1720" value="Water Softening/Treatment Equipment Installation">Water Softening/Treatment Equipment Installation</option>
                        <option data-iao="1731" value="Electrical Wiring incl. Fixtures/Appliances: (Not apparatus installation)">Electrical Wiring incl. Fixtures/Appliances: (Not apparatus installation)</option>
                        <option data-iao="1741" value="Cement, Concrete Work NOC, Not Masonry: (Residential Only)">Cement, Concrete Work NOC, Not Masonry: (Residential Only)</option>
                        <option data-iao="1743" value="Masonry, Incl. Bricklaying, Stonework, Stuccoing">Masonry, Incl. Bricklaying, Stonework, Stuccoing</option>
                        <option data-iao="1744" value="Plastering and Lathing including Drywall">Plastering and Lathing including Drywall</option>
                        <option data-iao="1745" value="Terrazzo/Tilework (no masonry, sewers, drains, ceilings)">Terrazzo/Tilework (no masonry, sewers, drains, ceilings)</option>
                        <option data-iao="1751" value="Carpentry (Shop Operations Only): (Excludes toys, child/infant furniture/products)">Carpentry (Shop Operations Only): (Excludes toys, child/infant furniture/products)</option>
                        <option data-iao="1752" value="Carpentry (Away from Shop)">Carpentry (Away from Shop)</option>
                        <option data-iao="1754" value="Painting/Wall Paper - excluding spray painting">Painting/Wall Paper - excluding spray painting</option>
                        <option data-iao="1756" value="Furnishings, Acoustic Ceilings, Floor Coverings Installation">Furnishings, Acoustic Ceilings, Floor Coverings Installation</option>
                        <option data-iao="1757" value="Interior Decorator - No Structural">Interior Decorator - No Structural</option>
                        <option data-iao="1761" value="Sheet Metal - Shop Only">Sheet Metal - Shop Only</option>
                        <option data-iao="1762" value="Sheet Metal - Away from Shop (NOT ROOFING)">Sheet Metal - Away from Shop (NOT ROOFING)</option>
                        <option data-iao="1766" value="Metal Doors, Windows, Awnings Installation">Metal Doors, Windows, Awnings Installation</option>
                        <option data-iao="7394" value="Janitorial Service">Janitorial Service</option>
                        <option data-iao="1777" value="Waterproofing Operations">Waterproofing Operations</option>
                        <option data-iao="1778" value="Septic Tank Installation/Service/Repair">Septic Tank Installation/Service/Repair</option>
                        <option data-iao="1779" value="Building Cleaning - Exterior - (no sandblasting, less than 4 stories)">Building Cleaning - Exterior - (no sandblasting, less than 4 stories)</option>
                        <option data-iao="1811" value="Building Construction - Incl. Renovation, Repairs (1 or 2 family Dwellings only)">Building Construction - Incl. Renovation, Repairs (1 or 2 family Dwellings only)</option>
                        <option data-iao="1812" value="Residential Building Construction - Apts & Townhouses">Residential Building Construction - Apts & Townhouses</option>
                        <option data-iao="1831" value="Swimming Pool Installation, Service & Repairs">Swimming Pool Installation, Service & Repairs</option>
                        <option data-iao="5257" value="Building Materials (incl. lumber, masonry, tools and building supplies)">Building Materials (incl. lumber, masonry, tools and building supplies)</option>
                        <option data-iao="5254" value="Paint & Wallpaper Supplies">Paint & Wallpaper Supplies</option>
                        <option data-iao="5162" value="Miscellaneous Building, Hardware, Cleaning Supplies">Miscellaneous Building, Hardware, Cleaning Supplies</option> -->
                    </select>

                    <span class="col-md-1" style="float: left;text-align: center;"> &nbsp; </span>
                    <label class="col-md-4" style="float: left;">Number of Employees <span class="err">*</span></label>
                    <input type="text" id="liability_typeOfOpsWorkPerformNoEmployee_1" name="liability_typeOfOpsWorkPerformNoEmployee_1" class="form-control col-md-7 commaValues required" value="">

                    <span class="col-md-1" style="float: left;text-align: center;"> &nbsp; </span>
                    <label class="col-md-4" style="float: left;">Projected Annual Payroll <span class="err">*</span></label>
                    <input type="text" id="liability_typeOfOpsWorkPerformPayroll_1" name="liability_typeOfOpsWorkPerformPayroll_1" class="form-control col-md-7 commaValues required" value="">

                    <span class="col-md-1" style="float: left;text-align: center;"> &nbsp; </span>
                    <label class="col-md-4" style="float: left;">Projected Gross Annual Revenue <span class="err">*</span>
                    </label><input type="text" id="liability_typeOfOpsWorkPerformGrossAnnualReceipt_1" name="liability_typeOfOpsWorkPerformGrossAnnualReceipt_1" class="form-control col-md-7 commaValues required" value="">

                    <span class="col-md-1" style="float: left;text-align: center;"> &nbsp; </span>
                    <label class="col-md-4" style="float: left;">US / Foreign Exposure <span class="err">*</span></label>

                    <div class="radio_group required">
                        <input type="radio" id="yes" name="liability_typeOfOpsWorkPerformUsForeignExposure_1" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="liability_typeOfOpsWorkPerformUsForeignExposure_1" value="No"><span class="radio_title">No</span>
                        <span class="radio_error" style="display:none;color: red;">Required.</span>
                    </div>
                </div>

                <div id="liability_typeOfOpsWorkPerformDetails" style="display: none;">

                </div>
                <div class="col-md-12" style="float: left;display: contents;">
                    <button class="btn btn-secondary" id="addTypeOfOpsWorkPerformBox">Add More</button>
                </div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-md-12">
            <h5 class="col-md-12" style="float: left;">Does the premises have Elevators/Escalators?</h5>
        </div>
    </div>
    <input type="hidden" name="liability_premisesHaveElevatorDetailsCount"
        id="liability_premisesHaveElevatorDetailsCount" value="1">
    <!-- <input type="hidden" name="liability_typeOfOpsWorkPerformIAO" id="liability_typeOfOpsWorkPerformIAO"> -->
    <div class="row">
        <div class="col-md-12" style="padding: 0% 10%;">

            <div class="opsWorkPerformed">
                <div class="ele_sections" style="width: 100%;">
                    <span class="col-md-1" style="float: left;text-align: center;"> 1) </span>
                    <label class="col-md-4" style="float: left;">Description </label>
                    <input type="text" id="liability_premisesHaveElevatorDescription_1" name="liability_premisesHaveElevatorDescription_1" class="form-control col-md-7" value="">

                    <span class="col-md-1" style="float: left;text-align: center;"> &nbsp; </span>
                    <label class="col-md-4" style="float: left;">Number</label>
                    <input type="text" id="liability_premisesHaveElevatorNumber_1" name="liability_premisesHaveElevatorNumber_1" class="form-control col-md-7 commaValues" value="">

                    <span class="col-md-1" style="float: left;text-align: center;"> &nbsp; </span>
                    <label class="col-md-4" style="float: left;">Location </label>
                    <input type="text" id="liability_premisesHaveElevatorLocation_1" name="liability_premisesHaveElevatorLocation_1" class="form-control col-md-7 commaValues" value="">
                </div>

                <div id="liability_premisesHaveElevatorDetails" style="display: none;">

                </div>
                <div class="col-md-12" style="float: left;display: contents;">
                    <button class="btn btn-secondary" id="addElevatorBox">Add More</button>
                </div>
            </div>
        </div>
    </div>


    <!-- hidden total revenue field -->
    <input type="hidden" id="totalRevenue" name="totalRevenue">

    <div class="row">
        <div class="form-group col-md-12 item_flex">
            <label class="col-md-6">
                Are any of the premises leased or rented in their entirety to others who control and operate the premises?
            </label>
            <!--  <input class="checkbox_custom" type="checkbox" id="liability_anyPremisesLeasedRentedToOther" name="liability_anyPremisesLeasedRentedToOther" style="padding-left: 50px"> -->

            <div class="radio_group">
                <input type="radio" id="yes" name="liability_anyPremisesLeasedRentedToOther" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="liability_anyPremisesLeasedRentedToOther" value="No"><span class="radio_title">No</span>
            </div>

        </div>

    </div>


    <div class="row">
        <div class="form-group col-md-12 item_flex">
            <label class="col-md-6">Contractual Agreements ( Other than premises lease )</label>
            <!--   <input class="checkbox_custom" type="checkbox" id="liability_contractualListLeaseEtc" name="liability_contractualListLeaseEtc"> -->
            <div class="radio_group">
                <input type="radio" id="yes" name="liability_contractualListLeaseEtc" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="liability_contractualListLeaseEtc" value="No"><span class="radio_title">No</span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group ifcontractualListLeaseEtcDescBox" style="display: none;">

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group ifcontractualListLeaseEtcDescBox" style="display: none;">
                <label class="col-md-12" style="float: left;"><span class="optionalBox"> <b>Railway siding agreements, etc. (Obtain copies of agreements where possible)</b></span> </label>
                <label class="col-md-4" style="float: left;"><span class="optionalBox"> Description </span></label>
                <textarea rows="5" class="form-control col-md-8" id="liability_contractualListLeaseEtcDesc" name="liability_contractualListLeaseEtcDesc"></textarea>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-12 item_flex">
            <label class="col-md-6">Work Sublet out<span class="err">*</span></label>
            <!--  <input class="checkbox_custom" type="checkbox" id="liability_workSubletOut" name="liability_workSubletOut">  -->
            <div class="radio_group required">
                <input type="radio" id="yes" name="liability_workSubletOut" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="liability_workSubletOut" value="No"><span class="radio_title">No</span>
                <span class="radio_error" style="display:none;color: red;">Required.</span>
            </div>
        </div>
    </div>
    <div class="work_sublet" style="position: relative;background: #bfbfbf5e">
        <div class="row">
            <div class="col-md-12" id="ifworkSubletOutBox" style="display: none;">
                <div class="form-group">
                    <label class="col-md-8" style="float: left;"><span class="optionalBox"> Cost of Work Sublet</span> </label>
                    <input type="text" id="liability_wsoCost" name="liability_wsoCost" class="form-control col-md-4 commaValues" value="">
                </div>
                <div class="form-group">
                    <label class="col-md-8" style="float: left;"><span class="optionalBox"> Type of work</span> </label>
                    <input type="text" id="liability_wsoType" name="liability_wsoType" class="form-control col-md-4 " value="">
                </div>
                <div class="form-group">
                    <label class="col-md-8" style="float: left;"><span class="optionalBox"> Are sub-contractors required to carry liability insurance?<span class="err">*</span></span> </label>

                    <div class="radio_group required">
                        <input type="radio" id="yes" name="liability_wsoSubConLiablityInsurance" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="liability_wsoSubConLiablityInsurance" value="No"><span class="radio_title">No</span>
                        <span class="radio_error" style="display:none;color: red;">Required.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" id="ifwsoSubContractorLiablityInsuranceBox" style="display: none;">
                <div class="form-group">
                    <label class="col-md-8" style="float: left;"><span class="nested2Box"> If Yes, Specify Limits </span> </label>
                    <input type="text" id="liability_wsoSubConLiabilityInsuranceLimits" name="liability_wsoSubConLiabilityInsuranceLimits" class="form-control col-md-4 " value="">
                </div>
                <div class="form-group">
                    <label class="col-md-8" style="float: left;"><span class="nested2Box">Are sub-contractors required to submit liability certificates? </span> </label>

                    <div class="radio_group">
                        <input type="radio" id="yes" name="liability_wsoAskSubConSubmitLiabilityInsurance" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="liability_wsoAskSubConSubmitLiabilityInsurance" value="No"><span class="radio_title">No</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-8" style="float: left;"><span class="nested2Box">Is the applicant added as an additional Insured to their Policy? </span> </label>

                    <div class="radio_group">
                        <input type="radio" id="yes" name="liability_wsoSubConLiabilityInsuranceAdditionInsured" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="liability_wsoSubConLiabilityInsuranceAdditionInsured" value="No"><span class="radio_title">No</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-8" style="float: left;"><span class="nested2Box">Does the applicant and sub-contractor/s enter into formal agreement/s</span> <span class="err">*</span></label>

                    <div class="radio_group required">
                        <input type="radio" id="yes" name="liability_wsoSubConLiabilityInsuranceFormalAgreement" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="liability_wsoSubConLiabilityInsuranceFormalAgreement" value="No"><span class="radio_title">No</span>
                        <span class="radio_error" style="display:none;color: red;">Required.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group" id="ifwsoSubConLiabilityInsuranceFormalAgreementBox"
                    style="display: none;">
                    <label class="col-md-8" style="float: left;"><span class="nested3Box">If yes, does it include a "Hold Harmless" clause in your favour? (Submit copy of usual contract form) </span> </label>

                    <div class="radio_group">
                        <label><input type="radio" id="yes" name="liability_wsoSubConLiabilityInsuranceFormalAgreementHoldHarmless" value="Yes"><span class="radio_title">Yes</span></label><label><input type="radio" id="no" name="liability_wsoSubConLiabilityInsuranceFormalAgreementHoldHarmless" value="No"><span class="radio_title">No</span></label>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- Work Sublet out sub section end-->
    <div class="row">
        <div class="form-group col-md-12 item_flex">
            <label class="col-md-6">Are all employees covered by Workmen's compensation <span class="err">*</span></label>
            <div class="radio_group required">
                <input type="radio" id="yes" name="liability_employeesCoveredByCompensation" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="liability_employeesCoveredByCompensation" value="No"><span class="radio_title">No</span>
                <span class="radio_error" style="display:none;color: red;">Required.</span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12" id="ifemployeesCoveredByCompensationBox" style="display: none;">
            <div class="form-group">
                <label class="col-md-6" style="float: left;"><span class="optionalBox">If No: Give number and types of employees not covered by Workmen's Compensation</span> <span class="err">*</span></label>
                <textarea rows="5" class="form-control col-md-6 required" id="liability_employeesCoveredByCompensationNumberTypesEmployessNotCovered" name="liability_employeesCoveredByCompensationNumberTypesEmployessNotCovered"></textarea>
            </div>
            <div class="form-group">
                <label class="col-md-6" style="float: left;"><span class="optionalBox">Actual Payroll of these employees </span> </label>
                <input type="text" id="liability_employeesCoveredByCompensationActualPayrollIfNo" name="liability_employeesCoveredByCompensationActualPayrollIfNo" class="form-control col-md-6 " value="">
            </div>
        </div>
    </div>


    <div class="row">
        <div class="form-group col-md-12 item_flex">
            <label class="col-md-6">Is there any use of radioactive materials?<span class="err">*</span></label>
            <div class="radio_group">
                <input type="radio" id="yes" name="liability_anyRadioactiveMaterials" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="liability_anyRadioactiveMaterials" value="No"><span class="radio_title">No</span>
                <span class="radio_error" style="display:none;color: red;">Required.</span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-12 item_flex">
            <label class="col-md-6">Is any welding equipment usage (welder, blowtorches, etc)?</label>
            <div class="radio_group">
                <input type="radio" id="yes" name="liability_anyWeldingEquipUsage" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="liability_anyWeldingEquipUsage" value="No"><span class="radio_title">No</span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12" id="ifanyWeldingEquipUsageBox" style="display: none;">
            <div class="form-group">
                <label class="col-md-8" style="float: left;"><span class="optionalBox">If Yes, Details of operations</span> </label>
                <input type="text" id="liability_anyWeldingEquipUsageDetails" name="liability_anyWeldingEquipUsageDetails" class="form-control col-md-4 " value="">
            </div>
        </div>
    </div>

    <!--********************************************************************************-->
    <h5>Does the applicant engage any of the operation/s below:</h5>

    <div class="row">
        <div class="form-group col-md-12 item_flex">
            <label class="col-md-6">Does the insured do any work in buildings with more than four (4) stories?<span class="err">*</span></label>
            <div class="radio_group required">
                <input type="radio" id="yes" name="liability_anyFourStories" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="liability_anyFourStories" value="No"><span class="radio_title">No</span>
                <span class="radio_error" style="display:none;color: red;">Required.</span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-12 item_flex">
            <label class="col-md-6">Thawing of pipes <span class="err">*</span></label>
            <div class="radio_group required">
                <input type="radio" id="yes" name="liability_engageOpsThawingOfPipes" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="liability_engageOpsThawingOfPipes" value="No"><span class="radio_title">No</span>
                <span class="radio_error" style="display:none;color: red;">Required.</span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-12 item_flex">
            <label class="col-md-6">Demolition or Wrecking <span class="err">*</span></label>
            <div class="radio_group required">
                <input type="radio" id="yes" name="liability_engageOpsDemolition" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="liability_engageOpsDemolition" value="No"><span class="radio_title">No</span>
                <span class="radio_error" style="display:none;color: red;">Required.</span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-12 item_flex">
            <label class="col-md-6">Shoring <span class="err">*</span></label>
            <div class="radio_group required">
                <input type="radio" id="yes" name="liability_engageOpsShoring" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="liability_engageOpsShoring" value="No"><span class="radio_title">No</span>
                <span class="radio_error" style="display:none;color: red;">Required.</span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-12 item_flex">
            <label class="col-md-6">Underpinning <span class="err">*</span></label>
            <div class="radio_group required">
                <input type="radio" id="yes" name="liability_engageOpsUnderpinning" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="liability_engageOpsUnderpinning" value="No"><span class="radio_title">No</span>
                <span class="radio_error" style="display:none;color: red;">Required.</span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-12 item_flex">
            <label class="col-md-6">Caisson Work <span class="err">*</span></label>
            <div class="radio_group required">
                <input type="radio" id="yes" name="liability_engageOpsCaissonWork" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="liability_engageOpsCaissonWork" value="No"><span class="radio_title">No</span>
                <span class="radio_error" style="display:none;color: red;">Required.</span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-12 item_flex">
            <label class="col-md-6">Excavation <span class="err">*</span></label>
            <div class="radio_group required">
                <input type="radio" id="yes" name="liability_engageOpsExcavation" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="liability_engageOpsExcavation" value="No"><span class="radio_title">No</span>
                <span class="radio_error" style="display:none;color: red;">Required.</span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-12 item_flex">
            <label class="col-md-6">Use of Explosives <span class="err">*</span></label>
            <div class="radio_group required">
                <input type="radio" id="yes" name="liability_engageOpsExplosives" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="liability_engageOpsExplosives" value="No"><span class="radio_title">No</span>
                <span class="radio_error" style="display:none;color: red;">Required.</span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-12 item_flex">
            <label class="col-md-6">Tunneling <span class="err">*</span></label>
            <div class="radio_group required">
                <input type="radio" id="yes" name="liability_engageOpsTunneling" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="liability_engageOpsTunneling" value="No"><span class="radio_title">No</span>
                <span class="radio_error" style="display:none;color: red;">Required.</span>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="form-group col-md-12 item_flex">
            <label class="col-md-6">Raising or moving of buildings and structures <span class="err">*</span></label>
            <div class="radio_group required">
                <input type="radio" id="yes" name="liability_engageOpsRaisingBuildings" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="liability_engageOpsRaisingBuildings" value="No"><span class="radio_title">No</span>
                <span class="radio_error" style="display:none;color: red;">Required.</span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-12 item_flex">
            <label class="col-md-6">Eqiuptments rented to others <span class="err">*</span></label>
            <div class="radio_group required">
                <input type="radio" id="yes" name="liability_equipmentRented" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="liability_equipmentRented" value="No"><span class="radio_title">No</span>
                <span class="radio_error" style="display:none;color: red;">Required.</span>
            </div>
        </div>
    </div>
</section>
