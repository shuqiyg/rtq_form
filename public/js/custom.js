$(document).ready(function(){
	// Smart Wizard activation
  	$('#smartwizard').smartWizard({
  		contentCache : false
  	});


  	// only number allwed to input in some of field
  	$('.onlyNumbers').keyup(function(e)
	                                {
	  	if (/\D/g.test(this.value))
	  	{
		    // Filter non-digits from input value.
		    this.value = this.value.replace(/\D/g, '');
	  	}
	});

		
  	// display details of record if insured criminal record is yes
  	$("#insured_criminal_record").on('change',function(){
  		var insured_criminal_record = $("#insured_criminal_record").val();
	  	if(insured_criminal_record == 'y'){
	  		$("#details_of_record_box").show();
	  	}else{
	  		$("#details_of_record_box").hide();
	  		$("#details_of_record").val(''); // empty value if user fill up anything with yes and then select no again
	  	}
  	});


  	// display other mailing address province field
  	$("#mailing_address_province").on('change',function(){
  		var mailing_address_province = $("#mailing_address_province").val();
	  	if(mailing_address_province == 'other'){
	  		$("#mailing_address_province_other").show();
	  		$("#mailing_address_province").hide();
	  	}else{
	  		$("#mailing_address_province").show();
	  		$("#mailing_address_province_other").hide();
	  		$("#mailing_address_province_other").val(''); // empty value if user fill up anything with yes and then select no again
	  	}
  	});

  	// display descrive use over 1 acre field
  	$("#risk_address_lot_size").on('change',function(){
  		var risk_address_lot_size = $("#risk_address_lot_size").val();
	  	if(risk_address_lot_size == 'over1acre'){
	  		$("#describeOver1Acre").show();
	  	}else{
	  		$("#describeOver1Acre").hide();
	  		$("#describeOver1Acre").val(''); // empty value if user fill up anything with yes and then select no again
	  	}
  	});

  	// display name, address and amount field for all mortgagees
  	$("#risk_address_howmany_mortgagees").on('change',function(){
  		var risk_address_howmany_mortgagees = $("#risk_address_howmany_mortgagees").val();
	  	
	  	if(risk_address_howmany_mortgagees != '' || risk_address_howmany_mortgagees != 'more'){
	  		$("#howManyMortgagees").show();
	  		var html = '';
	  		// loop following fields for number of mortgagees
	  		for (var i = 1; i <= risk_address_howmany_mortgagees; i++) {
	  			html += '<div class="hmm_sections"><label class="col-md-4" style="float: left;">'+i+'. Name </label><input type="text" id="risk_address_hmm_name_'+i+'" name="risk_address_hmm_name_'+i+'" class="form-control col-md-8"  value=""><label class="col-md-4" style="float: left;"> Address </label><input type="text" id="risk_address_hmm_address_'+i+'" name="risk_address_hmm_address_'+i+'" class="form-control col-md-8"  value=""><label class="col-md-4" style="float: left;"> Amount of Outstanding Mortgage </label><input type="text" id="risk_address_hmm_amount_'+i+'" name="risk_address_hmm_amount_'+i+'" class="form-control col-md-8"  value=""></div>';	
	  		}
	  		$("#howManyMortgagees").html(html);
	  	}else{
	  		$("#howManyMortgagees").hide();
	  		$("#howManyMortgagees").empty(); // empty box
	  	}
  	});


  	// display reason for non-renewal field for existing insurer in risk address tab 
  	$("#risk_address_existingInsurerWillRenew").on('change',function(){
  		var risk_address_existingInsurerWillRenew = $("#risk_address_existingInsurerWillRenew").val();
  		if(risk_address_existingInsurerWillRenew == 'n'){
  			$("#risk_address_existingInsurerNonRenewalBox").show();
  		}else{
  			$("#risk_address_existingInsurerNonRenewalBox").hide();
  			$("#risk_address_existingInsurerNonRenewal").val(''); // empty value if user fill up anything with yes and then select no again
  		}
  	});

  	// display attach details field for has insured cancelled insurance in risk address tab 
  	$("#risk_address_hasInsuredCancelInsurance").on('change',function(){
  		var risk_address_hasInsuredCancelInsurance = $("#risk_address_hasInsuredCancelInsurance").val();
  		if(risk_address_hasInsuredCancelInsurance == 'y'){
  			$("#risk_address_hasInsuredCancelInsuranceIfYesBox").show();
  		}else{
  			$("#risk_address_hasInsuredCancelInsuranceIfYesBox").hide();
  			$("#risk_address_hasInsuredCancelInsuranceIfYes").val(''); // empty value if user fill up anything with yes and then select no again
  		}
  	});

  	// display type of claims,description, amount for all claims in last 5 years
  	$("#risk_address_noOfClaims").on('change',function(){
  		var risk_address_noOfClaims = $("#risk_address_noOfClaims").val();
	  	
	  	if(risk_address_noOfClaims != '' || risk_address_noOfClaims != 'more'){
	  		$("#numberOfClaims").show();
	  		var html = '';
	  		// loop following fields for number of mortgagees
	  		for (var i = 1; i <= risk_address_noOfClaims; i++) {
	  			html += '<div class="noc5_sections"><label class="col-md-4" style="float: left;">'+i+'. Type of claims </label><select class="form-control col-md-8" id="risk_address_noc5_type_'+i+'" name="risk_address_noc5_type_'+i+'"><option value="">-Select value-</option><option value="fire">Fire</option> <option value="vandalism">Vandalism</option><option value="theft/burglary">Theft/Burglary</option><option value="windstorm">Windstorm</option> <option value="burst pipes">Burst pipes</option><option value="sewer backup">Sewer Backup</option><option value="flood">Flood including overland water</option><option value="other">Other</option></select><label class="col-md-4" style="float: left;"> Description of other </label><input type="text" id="risk_address_noc5_description_'+i+'" name="risk_address_noc5_description_'+i+'" class="form-control col-md-8"  value=""><label class="col-md-4" style="float: left;"> Open or Closed </label><select id="risk_address_noc5_openOrClosed_'+i+'" name="risk_address_noc5_openOrClosed_'+i+'" class="form-control col-md-8" ><option value="">-Select value-</option><option value="open">Open</option><option value="closed">Closed</option></select><label class="col-md-4" style="float: left;"> Amount of claim <span class="err">*</span></label><input type="text" id="risk_address_noc5_amount_'+i+'" name="risk_address_noc5_amount_'+i+'" class="form-control col-md-8"  value=""></div>';	
	  		}
	  		$("#numberOfClaims").html(html);
	  	}else{
	  		$("#numberOfClaims").hide();
	  		$("#numberOfClaims").empty(); // empty box
	  	}
  	});

  	// display attach details field & type of claims for if any incidence in claim happen
  	$("#risk_address_incidenceInClaim").on('change',function(){
  		var risk_address_incidenceInClaim = $("#risk_address_incidenceInClaim").val();
  		if(risk_address_incidenceInClaim == 'y'){
  			$("#incidenceOfClaimBox").show();
  		}else{
  			$("#incidenceOfClaimBox").hide();
  			$("#risk_address_incidenceOfClaim_details").val(''); // empty value if user fill up anything with yes and then select no again
  			$("#risk_address_incidenceOfClaim_type").val(''); 
  		}
  	});

  	// display describe field for commercial operations on premises on occupancy tab
  	$("#occupancy_commercialOperations").on('change',function(){
  		var occupancy_commercialOperations = $("#occupancy_commercialOperations").val();
  		if(occupancy_commercialOperations == 'y'){
  			$("#occupancy_commercialOperationsDescribeBox").show();
  		}else{
  			$("#occupancy_commercialOperationsDescribeBox").hide();
  			$("#occupancy_commercialOperationsDescribe").val(''); // empty value if user fill up anything with yes and then select no again
  		}
  	});

  	// display other specify field for Overall construction in building construction section on occupancy tab
  	$("#buildingConstruction_overallConstruction").on('change',function(){
  		var buildingConstruction_overallConstruction = $("#buildingConstruction_overallConstruction").val();
  		if(buildingConstruction_overallConstruction == 'other'){
  			$("#buildingConstruction_overallConstructionOtherBox").show();
  		}else{
  			$("#buildingConstruction_overallConstructionOtherBox").hide();
  			$("#buildingConstruction_overallConstructionOther").val(''); // empty value if user fill up anything with yes and then select no again
  		}
  	});

  	// display other specify field for area in sqft in building construction section on occupancy tab
  	$("#buildingConstruction_area").on('change',function(){
  		var buildingConstruction_area = $("#buildingConstruction_area").val();
  		if(buildingConstruction_area == '4001 plus'){
  			$("#buildingConstruction_areaSpecifyBox").show();
  		}else{
  			$("#buildingConstruction_areaSpecifyBox").hide();
  			$("#buildingConstruction_areaSpecify").val(''); // empty value if user fill up anything with yes and then select no again
  		}
  	});

  	// display are premises fenced and gated field for liability section in occupancy tab
  	$("#liability_doesPremisesHavePool").on('change',function(){
  		var liability_doesPremisesHavePool = $("#liability_doesPremisesHavePool").val();
  		if(liability_doesPremisesHavePool == 'y'){
  			$("#ifPremiseHasPoolBox").show();
  		}else{
  			$("#ifPremiseHasPoolBox").hide();
  			$("#liability_doesPremisesFenced").val(''); // empty value if user fill up anything with yes and then select no again
  		}
  	});

  	// check step number and if user click on final step then check broker code to display calculate button
  	$("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection) {
        if(stepNumber == 6){
        	console.log('final step');
        	var brokerCode = $.trim($('#broker_code').val());
        	if(brokerCode == '' || brokerCode == null){
        		console.log('brokerCode : '+brokerCode);
        		$('#calculateBox').hide();
        	}else{
        		console.log('brokerCode 2: '+brokerCode);
        		$('#calculateBox').show();
        	}
        	$('#priceBox').empty();
        	
        }
    });

  	/***
	Calculate data and display price if there is broker code
	Get all form data
  	***/
  	$("#calculate").on('click',function(){
  		
  		// gather required data to calculate
  		var province = $('#risk_address_province').val();
  		var yearsBuilt = $('#buildingConstruction_yearBuilt').val();
  		var fireDeptDistance = $('#fireAlarmDetectors_fireDeptDistance').val();
  		var fireDeptType = $('#fireAlarmDetectors_fireDeptTye').val();
  		var hydrant = $('#fireAlarmDetectors_hydrant').val();
  		var buildingLimit = $('#coverage_buildingLimit').val();
  		var contentsLimit = $('#coverage_contentsLimit').val();
  		var rentalIncomeLimit = $('#coverage_rentalIncomeLimit').val();
  		var garageLimit = $('#coverage_garageLimit').val();
  		var shedLimit = $('#coverage_shedLimit').val();
  		var liability = $('#coverage_liabilityLimit').val();
  		
  		if(province != '' && yearsBuilt != '' && fireDeptDistance != '' && fireDeptType != '' && hydrant != '' && liability != '' )
  		{
	  		$.ajax({
				url:"calculate",
				method:"post",
				data: {province:province,yearsBuilt:yearsBuilt,fireDeptDistance:fireDeptDistance,fireDeptType:fireDeptType,hydrant:hydrant,buildingLimit:buildingLimit,contentsLimit:contentsLimit,rentalIncomeLimit:rentalIncomeLimit,garageLimit:garageLimit,shedLimit:shedLimit,liability:liability,_token:$('meta[name="csrf-token"]').attr('content')},
				datatype: 'json',
				success: function(msg){
					msg = JSON.parse(msg);
					console.log(msg);
					
					var table = "<table class='table table-bordered'> <tbody><tr><td>Property Total</td><td>"+msg['propertyTotal']+"</td></tr><tr><td>Liability Total</td><td>"+msg['liabilityVal']+"</td></tr><tr><td>Fee</td><td>"+msg['fee']+"</td></tr><tr class='totalRow'><td><b>Total</b></td><td><b>"+msg['total']+"</b></td></tr></tbody> </table>";
					$("#priceBox").html(table);
				},
				error: function(data){
					console.log(data);
				}
			});
		}else{
			swal('Some required fields are missing for calculation.');
		}
  	});

  	
  	/**
	Finish button will gather all form data in json format and send it to controller to process
  	**/
  	$("#finish").on('click',function(){
  		var formData = JSON.stringify($('#rtq_form').serializeArray());
  		$.ajax({
			url:"finish",
			method:"post",
			data: {formData:formData,_token:$('meta[name="csrf-token"]').attr('content')},
			datatype: 'json',
			success: function(msg){
				console.log(msg);
			},
			error: function(data){
				console.log(data);
			}
		});
  	});

});