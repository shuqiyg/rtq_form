<section class="fireAlarmDetectors">
    <h3>Fire Alarm / Detectors</h3>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Smoke/Heat Detectors </label>
                <select id="fireAlarmDetectors_smokeHeatDetectors" name="fireAlarmDetectors_smokeHeatDetectors" class="form-control col-md-8">
                    <option value="">-Select smoke/heat detectors-</option>
                    <option value="Central">Central</option>
                    <option value="Local">Local</option>
                    <option value="None">None</option>
                </select>
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Sprinklers </label>
                <select id="fireAlarmDetectors_sprinklers" name="fireAlarmDetectors_sprinklers" class="form-control col-md-8">
                    <option value="">-Select sprinklers-</option>
                    <option value="None">None</option>
                    <option value="Monitored">Monitored</option>
                    <option value="Local">Local</option>
                </select>
            </div>
            <div class="form-group" id="sprinklersCoverageBox">
                <label class="col-md-4" style="float: left;"><span class="nestedBox">Sprinkler Coverage</span></label>
                <input type="text" id="fireAlarmDetectors_sprinklerCoverage" name="fireAlarmDetectors_sprinklerCoverage" class="form-control col-md-8 onlyNumbers"  value="">
            </div>

            <!-- Below form value need some specific fields -->
            @if($formVal == "plumbing")
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Pull Box </label>
                <select id="fireAlarmDetectors_pullBox" name="fireAlarmDetectors_pullBox" class="form-control col-md-8">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
            @endif

            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Hydrant(s) <span class="err">*</span></label>
                <select id="fireAlarmDetectors_hydrant" name="fireAlarmDetectors_hydrant" class="form-control col-md-8 required">
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
                        <select id="fireAlarmDetectors_fireDeptDistance" name="fireAlarmDetectors_fireDeptDistance" class="form-control col-md-8 required">
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
                <select id="fireAlarmDetectors_fireDeptTye" name="fireAlarmDetectors_fireDeptTye" class="form-control col-md-8 required">
                    <option value="">-Select fire department type-</option>
                    <option value="Paid">Paid</option>
                    <option value="Volunteer">Volunteer</option>
                    <option value="Part Paid/Part Volunteer">Part Paid/Part Volunteer</option>
                </select>
            </div>

            <!-- Below form value need some specific fields -->
            @if($formVal == "plumbing")
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Inhouse Portable Extinguisher/s <span class="err">*</span></label>
                <select id="fireAlarmDetectors_inhousePortableExtinguishers" name="fireAlarmDetectors_inhousePortableExtinguishers" class="form-control col-md-8 required">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
            @endif

        </div>
    </div>
</section>


<!-- Below form value need some specific fields -->
@if($formVal == "plumbing")

<section class="burglaryAlarmSystems">
    <h3>Burglary Alarm Systems</h3>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Interior </label>
                <select id="burglaryAlarm_interior" name="burglaryAlarm_interior" class="form-control col-md-8">
                    <option value="">-Select Interior-</option>
                    <option value="None">None</option>
                    <option value="Central">Central</option>
                    <option value="Local">Local</option>                   
                </select>
            </div>

            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Perimeter </label>
                <select id="burglaryAlarm_perimeter" name="burglaryAlarm_perimeter" class="form-control col-md-8">
                    <option value="">-Select Perimeter-</option>
                    <option value="None">None</option>
                    <option value="Central Station">Central Station</option>
                    <option value="Monitored">Monitored</option>
                    <option value="Local">Local</option>
                </select>
            </div>
            
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Make of Alarm </label>
                <input type="text" id="burglaryAlarm_makeOfAlarm" name="burglaryAlarm_makeOfAlarm" class="form-control col-md-8"  value="">
            </div>
            
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Monitoring Company </label>
                <input type="text" id="burglaryAlarm_monitoringCompany" name="burglaryAlarm_monitoringCompany" class="form-control col-md-8"  value="">
            </div>

            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Safe </label>
                <select id="burglaryAlarm_safe" name="burglaryAlarm_safe" class="form-control col-md-8 ">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"><span class="nestedBox">Class</span></label>
                <input type="text" id="burglaryAlarm_safeClass" name="burglaryAlarm_safeClass" class="form-control col-md-8 "  value="" >
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"><span class="nestedBox">Dimensions</span></label>
                <input type="text" id="burglaryAlarm_safeDimensions" name="burglaryAlarm_safeDimensions" class="form-control col-md-8 "  value="" >
            </div>

            <h5>Other Measures</h5>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Bars on Windows </label>
                <select id="burglaryAlarm_otherMeasures_barsOnWindows" name="burglaryAlarm_otherMeasures_barsOnWindows" class="form-control col-md-8 ">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Deadbolt on doors </label>
                <select id="burglaryAlarm_otherMeasures_deadboltOnDoors" name="burglaryAlarm_otherMeasures_deadboltOnDoors" class="form-control col-md-8 ">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Perimeter Lighting </label>
                <select id="burglaryAlarm_otherMeasures_perimeterLighting" name="burglaryAlarm_otherMeasures_perimeterLighting" class="form-control col-md-8 ">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Guard Dog </label>
                <select id="burglaryAlarm_otherMeasures_guardDog" name="burglaryAlarm_otherMeasures_guardDog" class="form-control col-md-8 ">
                    <option value="">-Select value-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="form-group">
                <label class="col-md-4" style="float: left;"> Other </label>
                <input type="text" id="burglaryAlarm_otherMeasures_other" name="burglaryAlarm_otherMeasures_other" class="form-control col-md-8"  value="">
            </div>

        </div>
    </div>
</section>

@endif