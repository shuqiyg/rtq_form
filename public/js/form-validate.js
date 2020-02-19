var valid_form = $('#rtq_form').validate({ 
	// initilize validation functions.
	    rules: {
			// tab 1
	    	broker_name:'required',
	    	broker_code:'required',
	    	producer_name:'required',
	    	producer_email: {
	      		required:true,
	      		email:true
	    	},
	    	producer_phone:{required:true},

			// tab 2
	    	insured_name:{required:true},
	    	contact_first_name:{required:true},
	    	contact_last_name:{required:true},
	    	insured_criminal_record:{required:true},
	    	mailing_address_street:{required:true},
			mailing_address_city:'required',
	    	mailing_address_province:'required',
	    	mailing_address_province_other:{required:true},
	    	mailing_address_postalCode:{required:true},
	    	mailing_address_country:{required:true},
	    	
	    	// tab 3
	    	risk_address_street:{required:true},
			risk_address_city:{required:true},
			risk_address_province:{required:true},
			risk_address_postalCode:{required:true},
			risk_address_lot_size:{required:true},
			risk_address_howmany_mortgagees:{required:true},
			risk_address_existingInsurer:{required:true},
			risk_address_hasInsuredCancelInsurance:'required',
			risk_address_noOfClaims:'required',
			risk_address_incidenceInClaim:'required',
			risk_address_incidenceOfClaim_type:'required',
			risk_address_typeOfNeighborhood:{required:true},

			// tab 4
			occupancy_rentedDwellingUnits:{required:true},
			occupancy_commercialOperations:{required:true},
			occupancy_shortTermRentals:{required:true},
			buildingConstruction_overallConstruction:{required:true},
			buildingConstruction_noOfStories:{required:true},
			buildingConstruction_area:{required:true},
			buildingConstruction_yearBuilt:{required:true},
			buildingConstruction_isBuildingHeritage:'required',
			buildingConstruction_basement:'required',
			buildingConstruction_roofTypeConstruction:'required',
			buildingConstruction_roofTypeCovering:'required',
			buildingConstruction_wiringType:{required:true},
			buildingConstruction_amperage:{required:true},
			buildingConstruction_heatingPrimaryType:{required:true},
			buildingConstruction_heatingSecondaryType:{required:true},
			fireAlarmDetectors_hydrant:{required:true},
			fireAlarmDetectors_fireDeptDistance:{required:true},
			fireAlarmDetectors_fireDeptTye:{required:true},
			liability_doesPremisesHavePool:{required:true},

			// tab 5
			coverage_liabilityLimit:'required'			
	    },
	    messages: {
	    	//broker message
	    	broker_name:"<i class=\"fa fa-exclamation-circle\"></i> Enter the broker_name.",
	    	producer_name:"<i class=\"fa fa-exclamation-circle\"></i> Enter the producer's last name.",
	    	liability_doesPremisesHavePool:"<i class=\"fa fa-exclamation-circle\"></i> Enter the liability_doesPremisesHavePool.",
	      
	    },
	    onclick: function(element) {
	      $(element).valid();
	    },
	    errorPlacement:function(error, element) {
	    	error.css('color','#a32013').insertBefore(element);
	    	
	    },
	    highlight: function(element, errorClass, validClass) {
	    	// console.log(element);
	    	//$(element).nextAll('.form-control-feedback').show().removeClass('glyphicon-check glyphicon-asterisk').addClass('glyphicon-remove');
			$(element).addClass(errorClass).removeClass(validClass);
			$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
	    },
	    success: function(element) {
	      //$(element).nextAll('.form-control-feedback').show().removeClass('glyphicon-remove glyphicon-asterisk').addClass('glyphicon-check');
	      $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
	      $(element).remove();
	    }
  });