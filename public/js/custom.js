$(document).ready(function(){
	// Smart Wizard activation
  	$('#smartwizard').smartWizard({
  		contentCache : false,
      // Show url hash based on step
      showStepURLhash: false,
      // initial selected step, 0 = first step
      selected: 0,
      // Enable selection of the step based on url hash
      useURLhash: false,
      // Effect on navigation, none/slide/fade
      autoAdjustHeight:true
  	});

  //writing validation on next step
	$('#smartwizard').on('leaveStep', function(e, anchorObject, stepNumber) {
		//checks valid on leave field
		$.each( $(anchorObject.attr('href')).find('input.required'), function( key, value ) {
      if($(this).css("visibility") == "hidden" || $(this).css('display') == 'none' || $(this).closest('div').parent('div').css('display') == 'none'){
  			// do nothing
        // removing class if user has open element and then hidden it so need to remove added class
        // check if span has nestedBox class then remove class err2 from next span
        if($(this).prev('label').find('span').hasClass('nestedBox') || $(this).prev('label').find('span').hasClass('optionalBox')){
          $(this).prev('label').find('span').next('span').removeClass('err2');
        }else{
          $(this).prev('label').find('span').removeClass('err2');
        }
        // remove class invalid
        $(this).removeClass('invalid');
      }else{
        //console.log($(this).attr('name')+'   '+$(this).val());

        if($(this).val()){
        
          // if there is email type field then check email is valid or not
          if($(this).attr('type') == 'email'){
            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            console.log(emailReg.test( $(this).val() ));
            if(emailReg.test( $(this).val() ) == false){
              if($(this).prev('label').find('span').hasClass('nestedBox') || $(this).prev('label').find('span').hasClass('optionalBox')){
              $(this).prev('label').find('span').next('span').addClass('err2');
              }else{
                $(this).prev('label').find('span').addClass('err2');
              }
              // add class invalid
              $(this).addClass('invalid');
            }else{
              if($(this).prev('label').find('span').hasClass('nestedBox') || $(this).prev('label').find('span').hasClass('optionalBox')){
                $(this).prev('label').find('span').next('span').removeClass('err2');
              }else{
                $(this).prev('label').find('span').removeClass('err2');
              }
              $(this).removeClass('invalid');
            }
          }else{
            // check if span has nestedBox class then remove class err2 from next span
            if($(this).prev('label').find('span').hasClass('nestedBox') || $(this).prev('label').find('span').hasClass('optionalBox')){
              $(this).prev('label').find('span').next('span').removeClass('err2');
            }else{
              $(this).prev('label').find('span').removeClass('err2');
            }
            // remove class invalid
            $(this).removeClass('invalid');
          }

          
        }else{
          // check if span has nestedBox class then add class err2 from next span
          if($(this).prev('label').find('span').hasClass('nestedBox') || $(this).prev('label').find('span').hasClass('optionalBox')){
            $(this).prev('label').find('span').next('span').addClass('err2');
          }else{
            $(this).prev('label').find('span').addClass('err2');
          }
          // add class invalid
          $(this).addClass('invalid');
        }
      }
		});
		$.each( $(anchorObject.attr('href')).find('select.required'), function( key, value ) {
      if($(this).css("visibility") == "hidden" || $(this).css('display') == 'none' || $(this).closest('div').parent('div').css('display') == 'none'){
        // do nothing
        // check if span has nestedBox class then remove class err2 from next span
        if($(this).prev('label').find('span').hasClass('nestedBox') || $(this).prev('label').find('span').hasClass('optionalBox')){
          $(this).prev('label').find('span').next('span').removeClass('err2');
        }else{
          $(this).prev('label').find('span').removeClass('err2');
        }
        // remove class invalid
        $(this).removeClass('invalid');
      }else{
        //console.log($(this).attr('name')+'   '+$(this).val());
        if($(this).val()){
          // check if span has nestedBox class then remove class err2 from next span
          if($(this).prev('label').find('span').hasClass('nestedBox') || $(this).prev('label').find('span').hasClass('optionalBox')){
            $(this).prev('label').find('span').next('span').removeClass('err2');
          }else{
            $(this).prev('label').find('span').removeClass('err2');  
          }
          // remove class invalid
          $(this).removeClass('invalid');
        }else{
          // check if span has nestedBox class then add class err2 from next span
          if($(this).prev('label').find('span').hasClass('nestedBox') || $(this).prev('label').find('span').hasClass('optionalBox')){
            $(this).prev('label').find('span').next('span').addClass('err2');
          }else{
            $(this).prev('label').find('span').addClass('err2');  
          }
          // add class invalid
          $(this).addClass('invalid');
        }
      }
		});

		/*
		if ($(anchorObject.attr('href')).find('input.required').length > 0) {
			if($(anchorObject.attr('href')).find('input.required').val()){
				$(anchorObject.attr('href')).find('input.required').prev('label').find('span').removeClass('err2');
				//$(anchorObject.attr('href')).find('input.required').addClass('valid');
				$(anchorObject.attr('href')).find('input.required').removeClass('invalid');
			}else{
				$(anchorObject.attr('href')).find('input.required').prev('label').find('span').addClass('err2')	;
				$(anchorObject.attr('href')).find('input.required').addClass('invalid');
				//$(anchorObject.attr('href')).find('input.required').removeClass('valid');
			}
			//$(anchorObject.attr('href')).find('input.required').prev('label').find('span').addClass('err2');	
		}
		
		if ($(anchorObject.attr('href')).find('select.required').length > 0) {
			$(anchorObject.attr('href')).find('select.required').prev('label').find('span').addClass('err2');
		}
*/

    // below code will add and remove red steps based on required fields filled up or not
		$.when(e).then(function() {
			let total_error = $(anchorObject.attr('href')).find('input.required').prev('label').find('.err2').length + $(anchorObject.attr('href')).find('select.required').prev('label').find('.err2').length;
			
			if (total_error > 0 ) {	
				anchorObject.parent().addClass('danger');
			} else {
				anchorObject.parent().removeClass('danger');
			}
			//checks valid on leave field
			//scroll window to top everytime on leave step.
			window.scrollTo(0, 0);
		});
	});
	

  	// only number allowed to input in some of field
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
	  			html += '<div class="noc5_sections"><label class="col-md-4" style="float: left;">'+i+'. Type of claims </label><select class="form-control col-md-8" id="risk_address_noc5_type_'+i+'" name="risk_address_noc5_type_'+i+'"><option value="">-Select value-</option><option value="fire">Fire</option> <option value="vandalism">Vandalism</option><option value="theft/burglary">Theft/Burglary</option><option value="windstorm">Windstorm</option> <option value="burst pipes">Burst pipes</option><option value="sewer backup">Sewer Backup</option><option value="flood">Flood including overland water</option><option value="other">Other</option></select><label class="col-md-4" style="float: left;"> Description of other </label><input type="text" id="risk_address_noc5_description_'+i+'" name="risk_address_noc5_description_'+i+'" class="form-control col-md-8"  value=""><label class="col-md-4" style="float: left;"> Open or Closed </label><select id="risk_address_noc5_openOrClosed_'+i+'" name="risk_address_noc5_openOrClosed_'+i+'" class="form-control col-md-8" ><option value="">-Select value-</option><option value="open">Open</option><option value="closed">Closed</option></select><label class="col-md-4" style="float: left;"> Amount of claim <span class="err">*</span></label><input type="text" id="risk_address_noc5_amount_'+i+'" name="risk_address_noc5_amount_'+i+'" class="form-control col-md-8 required"  value=""></div>';	
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
  	var valid = false;
  	// check if all required fields are filled up or not
  	$.each($('.required'), function( key, value ) {
      if($(this).css("visibility") == "hidden" || $(this).css('display') == 'none' || $(this).closest('div').parent('div').css('display') == 'none'){
        console.log($(this).attr('name')+'    not visible');
      }else{
        if($(this).val()){
          valid = true;
        }else{
          valid = false; 
          return false;
        }  
        //console.log($(this).attr('name')+'    '+valid);
      }
    });

  	if(valid == true){
  		var formData = JSON.stringify($('#rtq_form').serializeArray());
  		// formData not included dynamically added fields like number of mortgagees info & no of claims info so need to retrieve and send for process
  		var noOfMortgagees = $.trim($('#risk_address_howmany_mortgagees').val());
  		var noOfClaims = $.trim($('#risk_address_noOfClaims').val());
  		var noOfMortgageesArray = {};
  		var noOfClaimsArray = {};
  		for(var i=1;i<=noOfMortgagees;i++){
  			var mortgageesName = $('#risk_address_hmm_name_'+i).val();
  			var mortgageesAdd = $('#risk_address_hmm_address_'+i).val();
  			var mortgageesAmount = $('#risk_address_hmm_amount_'+i).val();
  			var  a = {};
  			a["mortgageesName_"+i] = mortgageesName;
  			a["mortgageesAdd_"+i] = mortgageesAdd;
  			a["mortgageesAmount_"+i] = mortgageesAmount;
  			noOfMortgageesArray[i]=a;
  		}
  		for(var i=1;i<=noOfClaims;i++){
  			var claimType = $('#risk_address_noc5_type_'+i).val();
  			var claimDescription = $('#risk_address_noc5_description_'+i).val();
  			var claimOpenOrClosed = $('#risk_address_noc5_openOrClosed_'+i).val();
  			var claimAmount = $('#risk_address_noc5_amount_'+i).val();
  			var  a = {};
  			a["claimType_"+i] = claimType;
  			a["claimDescription_"+i] = claimDescription;
  			a["claimOpenOrClosed_"+i] = claimOpenOrClosed;
  			a["claimAmount_"+i] = claimAmount;
  			noOfClaimsArray[i] = a;
  		}
  		noOfMortgageesArray = JSON.stringify(noOfMortgageesArray);
  		noOfClaimsArray = JSON.stringify(noOfClaimsArray);
  		//console.log(noOfMortgageesArray);console.log(JSON.stringify(noOfMortgageesArray));
  		//console.log(noOfClaimsArray);
      $("#finalMSG").html('<b>Processing .......</b>');
  		setTimeout(function(){ 	},2000);
  		$.ajax({
  			url:"finish",
  			method:"post",
  			data: {formData:formData,noOfMortgageesArray:noOfMortgageesArray,noOfClaimsArray:noOfClaimsArray, _token:$('meta[name="csrf-token"]').attr('content')},
  			datatype: 'json',
  			success: function(msg){
  				console.log(msg);
          if(msg.success){
            $("#finalMSG").empty();
            swal(msg.message, "Page automatically redirecting in 2 seconds..", "success");
            //swal('success',msg.message+' \n\n\n Page automatically redirecting in 2 seconds..');
            setTimeout(function(){
              window.location.href='/';
            },2000);
            
          }else{
            console.log('There is error : '+msg.message);
            swal(msg.message);
          }
  			},
  			error: function(data){
  				console.log(data);
  			}
  		});
    }else{
			swal('Please fill up all required fields.');
		}
  });

});