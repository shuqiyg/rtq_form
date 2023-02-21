<!-- <div class="btn-toolbar sw-toolbar sw-toolbar-top justify-content-end"><div class="btn-group mr-2 sw-btn-group" role="group"><button class="btn btn-secondary sw-btn-prev disabled" type="button">Previous</button><button class="btn btn-secondary sw-btn-next" type="button">Next</button></div></div>
 -->
 <div class="btn-toolbar sw-toolbar sw-toolbar-top justify-content-end zeroPadding">
    <div class="btn-group mr-2 sw-btn-group" role="group">
        <i class="fa fa-angle-left dirArrow sw-btn-prev" data-toggle="tooltip" title="Previous"></i>
        <i class="fa fa-angle-right dirArrow sw-btn-next" data-toggle="tooltip" title="Next"></i>
    </div>
</div>

<section class="dayCareOperatonsTab">
    <h3>Personnel</h3>
    <br>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group has-feedback">
                <label class="col-md-4" style="float: left;">Do staff have Earliy Childhood Education (ECE) designation or equivalent? <span class="err"> *</span></label>
                <div class="radio_group required">
                    <input type="radio" id="yes" name="ECE_yes_or_no" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="ECE_yes_or_no" value="No"><span class="radio_title">No</span>
                     <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group has-feedback">
                <label class="col-md-4" style="float: left;">Are background checks performed on all staff? <span class="err"> *</span></label>
                <div class="radio_group required">
                    <input type="radio" id="yes" name="background_checks_yes_or_no" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="background_checks_yes_or_no" value="No"><span class="radio_title">No</span>
                     <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group has-feedback">
                <label class="col-md-4" style="float: left;">Are all staff fully immunized? (TB, COVID, Etc.)<span class="err"> *</span></label>
                <div class="radio_group required">
                    <input type="radio" id="yes" name="staff_fully_immunized" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="staff_fully_immunized" value="No"><span class="radio_title">No</span>
                     <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group has-feedback">
                <label class="col-md-4" style="float: left;">Is someone always onsite with a valid first aid certificate?<span class="err">*</span> </label>
                <div class="radio_group required">
                    <input type="radio" id="yes" name="first_aid_cert_onSite" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="first_aid_cert_onSite" value="No"><span class="radio_title">No</span>
                     <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group has-feedback">
                <label class="col-md-4" style="float: left;">Staffing for specific age groups:</label>
                <div>
                    <table class="age_group">
                        <tr>
                            <th>Age Group</th>
                            <th># of Children</th>
                            <th># of Personnel</th>
                        </tr>
                        <tr>
                            <td>Infant (6 weeks - 18 months) </td>
                            <td><input type="number" id="infant_number" name="infant_number" min="0" max="99"></td>
                            <td><input type="number" id="infant_staff_number" name="infant_staff_number" min="0" max="99"></td>
                        </tr>
                        <tr>
                            <td>Toddler (18 months - 2.5) </td>
                            <td><input type="number" id="toddler_number" name="toddler_number" min="0" max="99"></td>
                            <td><input type="number" id="toddler__staff_number" name="toddler_staff_number" min="0" max="99"></td>
                        </tr>
                        <tr>
                            <td>Preschool (2.5 - 3.8)</td>
                            <td><input type="number" id="preschool_number" name="preschool_number" min="0" max="99"></td>
                            <td><input type="number" id="preschool_staff_number" name="preschool_staff_number" min="0" max="99"></td>
                        </tr>
                        <tr>
                            <td>Kinder (3.8 - 6)</td>
                            <td><input type="number" id="kinder_number" name="kinder_number" min="0" max="99"></td>
                            <td><input type="number" id="kinder_staff_number" name="kinder_staff_number" min="0" max="99"></td>
                        </tr>
                        <tr>
                            <td>School Age (6 -12)</td>
                            <td><input type="number" id="schoolAge_number" name="schoolAge_number" min="0" max="99"></td>
                            <td><input type="number" id="schoolAge_staff_number" name="schoolAge_staff_number" min="0" max="99"></td>
                        </tr>
                        </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group has-feedback">
                <label class="col-md-4" style="float: left;">Hours of Operation?<span class="err">*</span> </label>
                <div class="radio_group ">
                    <input type="text" id="hours_operation" name="hours_operation" class="form-control col-md-8 required" placeholder="HH:MM - HH:MM">
                     <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
            </div>
        </div>
    </div>    

    <h3>Childcare</h3>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group has-feedback">
                <label class="col-md-4" style="float: left;"> Are government guidelines follow in regards to isolating sick children to prevent the spread of infectious diseases?</label>
                <div class="radio_group">
                    <input type="radio" id="yes" name="guidelines_follow_isolating" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="guidelines_follow_isolating" value="No"><span class="radio_title">No</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group has-feedback">
                <label class="col-md-4" style="float: left;"> Are meals served on the premises? </label>
                <div class="radio_group">
                    <input type="radio" id="yes" name="meal_served" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="meal_served" value="No"><span class="radio_title">No</span>
                    <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group" id="type_of_food_box" style="display: none;">
                <label class="col-md-4" style="float: left;"><span class="optionalBox">Advise the type of food that you offer (i.e. soup, sandwiches, hot meals, snacks, etc.):</span> </label>
                <div class="radio_group ">
                    <input type="text" id="type_of_food" name="type_of_food" class="form-control col-md-7 required" style="float: left; margin-bottom: 5px;">
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group" id="cooking_facilities_yes_or_no_box" style="display: none;">
                <label class="col-md-4" style="float: left;"><span class="optionalBox">Are there cooking facilities on the premises?</span> </label>
                <div class="radio_group ">
                    <input type="radio" id="yes" name="cooking_facilities_yes_or_no" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="cooking_facilities_yes_or_no" value="No"><span class="radio_title">No</span>
            <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group" id="food_allergies_items_yes_or_no_box" style="display: none;">
                <label class="col-md-4" style="float: left;"><span class="optionalBox">Are specific food items prohibited from the premises based on children's allergies (e.g.: Peanuts)?</span> </label>
                <div class="radio_group ">
                    <input type="radio" id="yes" name="food_allergies_items_yes_or_no" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="food_allergies_items_yes_or_no" value="No"><span class="radio_title">No</span>
                     <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group has-feedback">
                <label class="col-md-4" style="float: left;"> Do any of your clients require special medical accommodation? </label>
                <div class="radio_group">
                    <input type="radio" id="yes" name="special_med_accommodation" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="special_med_accommodation" value="No"><span class="radio_title">No</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group has-feedback">
                <label class="col-md-4" style="float: left;"> Do any clients remain in the organization’s care overnight? </label>
                <div class="radio_group">
                    <input type="radio" id="yes" name="clients_care_overnight" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="clients_care_overnight" value="No"><span class="radio_title">No</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group has-feedback">
                <label class="col-md-4" style="float: left;"> What are the rules relative to delivery or pick-up of children when parents or guardians are delayed and unable to pick children up on time? </label>
                <div class="radio_group required">
                    <input type="text" id="rules_pickup_delivery" name="rules_pickup_delivery" class="form-control col-md-8 required" value="">
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group has-feedback">
                <label class="col-md-4" style="float: left;"> Are all play materials safe, non-breakable and non-toxic? </label>
                <div class="radio_group">
                    <input type="radio" id="yes" name="safe_materials" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="safe_materials" value="No"><span class="radio_title">No</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group has-feedback">
                <label class="col-md-4" style="float: left;"> Are written records kept of all incidents relating to any child? </label>
                <div class="radio_group">
                    <input type="radio" id="yes" name="incidents_written_record_kept" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="incidents_written_record_kept" value="No"><span class="radio_title">No</span>
                    <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group" id="blank_form_copy_box" style="display: none;">
                <label class="col-md-4" style="float: left; color: brown"><span class="optionalBox">Please email us a COPY of the blank form that is used after completing the Quote</span> </label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group has-feedback">
                <label class="col-md-4" style="float: left;"> Is there detailed written documentation outlining each child's allergies and other medical issues? </label>
                <div class="radio_group">
                    <input type="radio" id="yes" name="medical_issues_documentation" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="medical_issues_documentation" value="No"><span class="radio_title">No</span>
                    <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group has-feedback">
                <label class="col-md-4" style="float: left;"> Are all medications required, even over the counter meds, accompanied by a doctor's note with dosages, times, signs, and symptoms? (This includes, but is not limited to; Epi-pens, Tylenol, anti-biotics, etc.) </label>
                <div class="radio_group">
                    <input type="radio" id="yes" name="med_doctor_notes" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="med_doctor_notes" value="No"><span class="radio_title">No</span>
                    <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
            </div>
        </div>
    </div>

    <h3>Premises</h3>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group has-feedback">
                <label class="col-md-4" style="float: left;"> Does the daycare operate out of a commercial or residential building? </label>
                <div class="radio_group">
                    <input type="radio" id="commercial" name="dayCare_operate_comm_or_resi" value="commercial"><span class="radio_title">Commercial</span><input type="radio" id="resdidential" name="dayCare_operate_comm_or_resi" value="residential"><span class="radio_title">Residential</span>
                    <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group has-feedback">
                <label class="col-md-4" style="float: left;"> Has the building been modified in any way to accommodate a daycare/childcare operation? </label>
                <div class="radio_group">
                    <input type="radio" id="yes" name="building_modified" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="building_modified" value="No"><span class="radio_title">No</span>
                    <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group has-feedback">
                <label class="col-md-4" style="float: left;"> Are the premises suitable and properly equipped for this type of occupancy? </label>
                <div class="radio_group">
                    <input type="radio" id="yes" name="suitable_and_equipped" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="suitable_and_equipped" value="No"><span class="radio_title">No</span>
                    <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group" id="facility_location_box">
                <label class="col-md-4" style="float: left;"> Where in the building is the facility located? <span class="err">*</span></label>
                <select class="form-control col-md-8 required" id="facility_location"
                    name="facility_location">
                    <option value="">-Select Location-</option>
                    <option value="basement">Basement</option>
                    <option value="groundFloor">Ground Floor</option>
                    <option value="secondFloor">Second Floor</option>
                </select>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="form-group has-feedback">
                <label class="col-md-4" style="float: left;"> Have all relevant provincial and municipal regulations been complied with? </label>
                <div class="radio_group">
                    <input type="radio" id="yes" name="prov_muni_regulation_complied" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="prov_muni_regulation_complied" value="No"><span class="radio_title">No</span>
                    <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group has-feedback">
                <label class="col-md-4" style="float: left;"> Are emergency telephone numbers (i.e. ambulance, fire, police and poison control) posted beside an accessible telephone? </label>
                <div class="radio_group">
                    <input type="radio" id="yes" name="emergency_num_accessible" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="emergency_num_accessible" value="No"><span class="radio_title">No</span>
                    <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group has-feedback">
                <label class="col-md-4" style="float: left;">Number of exits in the building </label>
                <div class="radio_group required">
                    <input type="number" id="num_of_exits" name="num_of_exits" class="form-control col-md-8 required" value="">
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group has-feedback">
                <label class="col-md-4" style="float: left;">Are all exits accessible at all times? </label>
                <div class="radio_group">
                    <input type="radio" id="yes" name="exits_accessible" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="exits_accessible" value="No"><span class="radio_title">No</span>
                    <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group has-feedback">
                <label class="col-md-4" style="float: left;"> Are all exits properly marked as such? </label>
                <div class="radio_group">
                    <input type="radio" id="yes" name="exits_marked" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="exits_marked" value="No"><span class="radio_title">No</span>
                    <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group has-feedback">
                <label class="col-md-4" style="float: left;">Does the building have fire alarms? </label>
                <div class="radio_group">
                    <input type="radio" id="yes" name="fire_alarms_yes_or_no" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="fire_alarms_yes_or_no" value="No"><span class="radio_title">No</span>
                    <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group has-feedback">
                <label class="col-md-4" style="float: left;">Is garbage removed daily from the premises? </label>
                <div class="radio_group">
                    <input type="radio" id="yes" name="garbage_removed_daily" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="garbage_removed_daily" value="No"><span class="radio_title">No</span>
                    <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group has-feedback">
                <label class="col-md-4" style="float: left;">Is perimeter of premises fenced? </label>
                <div class="radio_group">
                    <input type="radio" id="yes" name="perimeter_fenced" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="perimeter_fenced" value="No"><span class="radio_title">No</span>
                    <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group has-feedback">
                <label class="col-md-4" style="float: left; color:blueviolet">Are any of the following on your daycare premises:</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group has-feedback">
                <label class="col-md-4" id="pool_yes_or_no_box" style="float: left;"> Pool </label>
                <div class="radio_group">
                    <input type="radio" id="yes" name="pool_yes_or_no" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="pool_yes_or_no" value="No"><span class="radio_title">No</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group" id="pool_indoor_or_outdoor" style="display: none;">
                <label class="col-md-4" style="float: left;"><span class="optionalBox">Is pool indoor or outdoor? </span> </label>
                <div class="radio_group">
                    <input type="radio" id="yes" name="indoor_or_outdoor" value="indoor"><span class="radio_title">Indoor</span><input type="radio" id="no" name="indoor_or_outdoor" value="outdoor"><span class="radio_title">Outdoor</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group" id="supplemental_fencing_pool_yes_or_no_box" style="display: none;">
                <label class="col-md-4" style="float: left;"><span class="optionalBox">Has supplemental fencing with locked gate been constructed within the internal yard of the premises to prevent access to the pool from all entry points?   </span> </label>
                <div class="radio_group">
                    <input type="radio" id="yes" name="supplemental_fencing_pool_yes_or_no" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="supplemental_fencing_pool_yes_or_no" value="No"><span class="radio_title">No</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group has-feedback">
                <label class="col-md-4" id="trampoline_box" style="float: left;"> Trampoline </label>
                <div class="radio_group">
                    <input type="radio" id="yes" name="trampoline_yes_or_no" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="trampoline_yes_or_no" value="No"><span class="radio_title">No</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group has-feedback">
                <label class="col-md-4" id="bouncyCastle_box" style="float: left;"> Bouncy Castle</label>
                <div class="radio_group">
                    <input type="radio" id="yes" name="bouncyCastle_yes_or_no" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="bouncyCastle_yes_or_no" value="No"><span class="radio_title">No</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group has-feedback">
                <label class="col-md-4" id="pool_yes_or_no_box" style="float: left;">Is there a playground or playground equipment located on the premises for use by the Daycare? </label>
                <div class="radio_group">
                    <input type="radio" id="yes" name="playground_or_equipment" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="playground_or_equipment" value="No"><span class="radio_title">No</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group" id="desc_equipment_box" style="display: none;">
                <label class="col-md-4" style="float: left;"><span class="optionalBox">Description of Equipment </span> </label>
                <div class="radio_group">
                    <div class="radio_group ">
                        <input type="text" id="desc_equipment" name="desc_equipment" class="form-control col-md-7 required" style="float: left; margin-bottom: 5px;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group" id="playground_equipment_for_age_box" style="display: none;">
                <label class="col-md-4" style="float: left;"><span class="optionalBox">Age </span> </label>
                <div class="radio_group">
                    <div class="radio_group ">
                        <input type="text" id="playground_equipment_for_age" name="playground_equipment_for_age" class="form-control col-md-7 required" style="float: left; margin-bottom: 5px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group" id="maintenance_frequency_box" style="display: none;">
                <label class="col-md-4" style="float: left;"><span class="optionalBox">Maintenance Frequency</span> </label>
                <div class="radio_group">
                    <div class="radio_group ">
                        <input type="text" id="maintenance_frequency" name="maintenance_frequency" class="form-control col-md-7 required" style="float: left; margin-bottom: 5px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group" id="construction_type_box" style="display: none;">
                <label class="col-md-4" style="float: left;"><span class="optionalBox">Construction Type </span> </label>
                <div class="radio_group">
                    <div class="radio_group ">
                        <input type="text" id="construction_type" name="construction_type" class="form-control col-md-7 required" style="float: left; margin-bottom: 5px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group" id="landing_surface_box" style="display: none;">
                <label class="col-md-4" style="float: left;"><span class="optionalBox">Landing Surface </span> </label>
                <div class="radio_group">
                    <div class="radio_group ">
                        <input type="text" id="landing_surface" name="landing_surface" class="form-control col-md-7 required" style="float: left; margin-bottom: 5px;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group has-feedback">
                <label class="col-md-4" id="" style="float: left;">Are play areas contently supervised by the required number of staff (in ratio) </label>
                <div class="radio_group">
                    <input type="radio" id="yes" name="supervised_by_staff_in_ratio" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="supervised_by_staff_in_ratio" value="No"><span class="radio_title">No</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group has-feedback">
                <label class="col-md-4" style="float: left;">How is access to the play area restricted? (i.e. fence, gate, concrete or brick walls, etc.) </label>
                <div class="radio_group required">
                    <input type="text" id="access_to_restricted" name="access_to_restricted" class="form-control col-md-8 required" value="">
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group has-feedback">
                <label class="col-md-4" id="" style="float: left;">Are there any pets on premises? </label>
                <div class="radio_group">
                    <input type="radio" id="yes" name="pet_on_prem_yes_or_no" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="pet_on_prem_yes_or_no" value="No"><span class="radio_title">No</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group" id="pets_desc_box" style="display: none;">
                <label class="col-md-4" style="float: left;"><span class="optionalBox">Please provide full list of all pets on premises (for dogs, provide specific breed) </span> </label>
                <div class="radio_group">
                    <div class="radio_group ">
                        <input type="text" id="pets_desc" name="pets_desc" class="form-control col-md-7 required" style="float: left; margin-bottom: 5px;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h3>Services</h3>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group has-feedback">
                <label class="col-md-4" style="float: left;">Does the daycare provide transportation for the children?<span class="err">*</span> </label>
                <div class="radio_group required">
                    <input type="radio" id="yes" name="daycare_transportation" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="daycare_transportation" value="No"><span class="radio_title">No</span>
                    <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
            </div>
        </div>
    </div>    

    <div class="row">
        <div class="col-md-12">
            <div class="form-group" id="auto_liability_insurance_yes_or_no" style="display: none;">
                <label class="col-md-4" style="float: left;"> <span class="optionalBox">If yes, do all drivers/vehciles carry at least $2MM automobile liability insurance wheter vehicle is owned or non-owned?</span> </label>
                <div class="radio_group ">
                    <input type="radio" id="yes" name="auto_liability_insurance" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="auto_liability_insurance" value="No"><span class="radio_title">No</span>
                    <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group" id="vehicle_owned_by_dayCare_yes_or_no" style="display: none;">
                <label class="col-md-4" style="float: left;"> <span class="optionalBox">Is the vehicle used to transport the children, owned by the daycare/childcare facility?</span> </label>
                <div class="radio_group ">
                    <input type="radio" id="yes" name="vehicle_owned_by_dayCare" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="vehicle_owned_by_dayCare" value="No"><span class="radio_title">No</span>
                    <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="form-group" id="dayCare_vehicle_current_insurer_box" style="display: none;">
                <label class="col-md-4" style="float: left;"> <span class="optionalBox1">Current Insurer</span> </label>
                <div class="radio_group ">
                    <input type="text" id="dayCare_vehicle_current_insurer" name="dayCare_vehicle_current_insurer" class="form-control col-md-7 required" style="float: left; margin-bottom: 5px;">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group" id="dayCare_vehicle_insurance_policyNo_box" style="display: none;">
                <label class="col-md-4" style="float: left;"> <span class="optionalBox1">Policy Number</span> </label>
                <div class="radio_group ">
                    <input type="text" id="dayCare_vehicle_insurance_policyNo" name="dayCare_vehicle_insurance_policyNo" class="form-control col-md-7 required" style="float: left; margin-bottom: 5px;">
                </div>
            </div>
        </div>
    </div>
        
    <div class="row">
        <div class="col-md-12">
            <div class="form-group" id="dayCare_vehicle_insurance_policyLimits_box" style="display: none;">
                <label class="col-md-4" style="float: left;"> <span class="optionalBox1">Policy Limit</span> </label>
                <div class="radio_group ">
                    <input type="text" id="dayCare_vehicle_insurance_policyLimits" name="dayCare_vehicle_insurance_policyLimits" class="form-control col-md-7 required" style="float: left; margin-bottom: 5px;">
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group" id="day_trips_yes_or_no" style="display: none;">
                <label class="col-md-4" style="float: left;"> <span class="optionalBox">Are any day trips taken</span> </label>
                <div class="radio_group">
                    <input type="radio" id="yes" name="day_trips_taken" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="day_trips_taken" value="No"><span class="radio_title">No</span>
                    <span class="radio_error" style="display:none;color: red;">Required.</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group" id="day_trips_box" style="display: none;">
                <label class="col-md-4" style="float: left;"> <span class="optionalBox">If Yes, please provide details: </span> </label>
                <div class="radio_group">
                    <input type="text" id="day_trips_detail" name="day_trips_detail" class="form-control col-md-7 required" style="float: left; margin-bottom: 5px;">
                </div>
            </div>
        </div>
    </div>   
</section>
