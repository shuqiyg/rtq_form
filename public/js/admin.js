$(document).ready(function(){
	// GET FORM PREFIX
  	var formPrefix = $("#formPrefix").val();

	// FUNCTION TO CLEAR ALL FIELDS VALUE IN BOX
	function resetAllBoxFields(box){

		$.each($("#"+box).find('input'),function(k,v){
		    $(this).val('');
		});

		$.each($("#"+box).find('select'),function(k,v){
			$(this).val('');
		});
		
	}

	// if clicked on banner cancel button, clear all fields
	$("#bannerCancel,#amfRateCancel,#propertyProvModCancel,#propertyTGModCancel,#propertyConModCancel").on('click',function(){
		// get box name
		var box = $(this).attr('data-box');
		resetAllBoxFields(box);
	});

	// When banner form has been change
	$("#bannerForm").on('change',function(){
		// get value of banner form
		var formVal = $("#bannerForm").val();
		if(formVal != '' && formVal != null){
			$.getJSON(formPrefix+'api/2020/amf/root/bannerJSON', function(banner) { 
				//console.log(banner);
            	// set values as per form selected
            	$("#bannerMSG").val(banner[formVal][0]['message']['value']);
            	$("#bannerActive").val(banner[formVal][0]['message']['active']);
            }); 
		}else{
			$("#bannerMSG").val('');
			$("#bannerActive").val('');
		}
	});

	// if clicked on banner Save button
	$("#bannerSave").on('click',function(){
		// get all values
		var bannerForm = $("#bannerForm").val();
		var bannerMSG = $("#bannerMSG").val();
		var bannerActive = $("#bannerActive").val();

		if(bannerForm != '' && bannerForm != null){
			$.ajax({
	            url:formPrefix+"api/2020/amf/root/bannerSave",
	            method:"post",
	            data: {bannerForm:bannerForm,bannerMSG:bannerMSG,bannerActive:bannerActive,_token:$('meta[name="csrf-token"]').attr('content')},
	            datatype: 'json',
	            success: function(msg){
	              console.log(msg);
	              $("#bannerNotify").show();
	              $("#bannerNotify").css('color','green');
	              $("#bannerNotify").text('Banner message updated successfully.');
	              
	              resetAllBoxFields("bannerBox");

	              setTimeout(function(){
	              	$("#bannerNotify").hide();
	              },2000);
	              
	            },
	            error: function(data){
	              console.log(data);
	            }
	        });
		}else{
			swal('select form.');
		}
	});

	//CAPITALIZE FIRST CHARACTER OF STRING
	function capitalizeFirstChar(str){
		var cap = str.charAt(0).toUpperCase() + str.slice(1);
		return cap;
	}

	// When AMF RATE form has been change
	$("#amfRateForm").on('change',function(){
		// get value of banner form
		var formVal = $("#amfRateForm").val();

		var provinceArray = ['Alberta','British Columbia','Manitoba','New Brunswick','Newfoundland and Labrador','Northwest Territories','Nova Scotia','Nunavut','Ontario','Prince Edward Island','Quebec','Saskatchewan','Yukon'];

		var tableKey = ['deviation','inspection','policy_fee','1','2','3','4','5','6','7','8','9','10','1mm','2mm','TIV Ceiling'];

		if(formVal != '' && formVal != null){
			$.getJSON(formPrefix+'api/2020/amf/root/amfRateJSON?formVal='+formVal, function(amfRate) { 
				//console.log(amfRate);
				var html = '';
				if(amfRate.hasOwnProperty('message')){
					$("#amfRateTable").empty();
					$("#amfRateTable").text(amfRate.message);
				}else{
					$("#amfRateTable").empty();
					// set values as per form selected
            		$.each(amfRate,function(key,value){
	            		// value here 0 like array[0]
	            		html += "<h5>"+capitalizeFirstChar(key)+"</h5>";
	            		html += "<table class='table table-striped table-bordered'>";
	            		html += "<thead> <th></th> <th>deviation</th> <th>inspection</th> <th>policy_fee</th> <th>1</th> <th>2</th> <th>3</th> <th>4</th> <th>5</th> <th>6</th> <th>7</th> <th>8</th> <th>9</th> <th>10</th> <th>1mm</th> <th>2mm</th> <th>TIV Ceiling</th></thead>";
	            		html += "<tbody>";
	            		$.each(value,function(k,v){
	            			// here v = under25 or over 25
	            			$.each(v,function(k1,v1){
	            				html += "<tr>";       
	            				html += "<td>"+k1+"</td>"; // k1  here is province name
	            				//$.each(v[k1],function(k2,v2){
		            				html += "<td>"+v[k1]['deviation']+"</td><td>"+v[k1]['inspection']+"</td><td>"+v[k1]['policy_fee']+"</td><td>"+v[k1]['1']+"</td><td>"+v[k1]['2']+"</td><td>"+v[k1]['3']+"</td><td>"+v[k1]['4']+"</td><td>"+v[k1]['5']+"</td><td>"+v[k1]['6']+"</td><td>"+v[k1]['7']+"</td><td>"+v[k1]['8']+"</td><td>"+v[k1]['9']+"</td><td>"+v[k1]['10']+"</td><td>"+v[k1]['1mm']+"</td><td>"+v[k1]['2mm']+"</td><td>"+v[k1]['TIV Ceiling']+"</td>";
	            				
	            				//});
	            				html += "</tr>";	            			
		            		
	            			
	            			});
	            			
	            		});
	            		html += "</tbody>";
	            		html += "</table>";
	            	});
	            	$("#amfRateTable").html(html);
				}
            	            	
            }); 
		}else{
			$("#amfRateTable").empty();
		}
	});


	/** Property Modifiers TAB ACTIVATION **/
	$( "#propertyModTabs" ).tabs();
	
	$('.allow_decimal').keypress(function(event) {
	    var $this = $(this);
	    if ((event.which != 46 || $this.val().indexOf('.') != -1) &&
	       ((event.which < 48 || event.which > 57) &&
	       (event.which != 0 && event.which != 8))) {
	           event.preventDefault();
	    }

	    var text = $(this).val();
	    if ((event.which == 46) && (text.indexOf('.') == -1)) {
	        setTimeout(function() {
	            if ($this.val().substring($this.val().indexOf('.')).length > 3) {
	                $this.val($this.val().substring(0, $this.val().indexOf('.') + 3));
	            }
	        }, 1);
	    }

	    if ((text.indexOf('.') != -1) &&
	        (text.substring(text.indexOf('.')).length > 2) &&
	        (event.which != 0 && event.which != 8) &&
	        ($(this)[0].selectionStart >= text.length - 2)) {
	            event.preventDefault();
	    }      
  	});

	$('.allow_decimal').bind("paste", function(e) {
		var text = e.originalEvent.clipboardData.getData('Text');
	  	if ($.isNumeric(text)) {
	    	if ((text.substring(text.indexOf('.')).length > 3) && (text.indexOf('.') > -1)) {
	        	e.preventDefault();
	        	$(this).val(text.substring(0, text.indexOf('.') + 3));
	    	}
	  	}
	  	else {
	        e.preventDefault();
		}
	});

	// When property province mod province has been change
	$("#propertyProvModProvince").on('change',function(){
		// get value of banner form
		var province = $("#propertyProvModProvince").val();
		if(province != '' && province != null){
			$.getJSON(formPrefix+'api/2020/amf/root/propertyProvModJson', function(pmp) { 
				//console.log(banner);
            	// set values as per form selected
            	$("#propertyProvModMod").val(pmp[0][province]['Mod']);
            }); 
		}else{
			$("#propertyProvModMod").val('');
		}
	});

	// if clicked on Save button of Property Modifier province Mod Tab
	$("#propertyProvModSave").on('click',function(){
		// get all values
		var province = $("#propertyProvModProvince").val();
		var propertyProvModMod = $("#propertyProvModMod").val();

		if(province != '' && province != null){
			$.ajax({
	            url:formPrefix+"api/2020/amf/root/propertyProvModSave",
	            method:"post",
	            data: {province:province,propertyProvModMod:propertyProvModMod,_token:$('meta[name="csrf-token"]').attr('content')},
	            datatype: 'json',
	            success: function(msg){
	              console.log(msg);
	              $("#propertyModProvNotify").show();
	              $("#propertyModProvNotify").css('color','green');
	              $("#propertyModProvNotify").text('Province Mod updated successfully.');
	              
	              resetAllBoxFields("provModTab");

	              setTimeout(function(){
	              	$("#propertyModProvNotify").hide();
	              },2000);
	              
	            },
	            error: function(data){
	              console.log(data);
	            }
	          });
		}else{
			swal('select province.');
		}
	});

	// When property towngrade mod province has been change
	$("#propertyTGModTowngrade").on('change',function(){
		// get value of banner form
		var tg = $("#propertyTGModTowngrade").val();
		if(tg != '' && tg != null){
			$.getJSON(formPrefix+'api/2020/amf/root/propertyTGModJson', function(pmt) { 
				//console.log(banner);
            	// set values as per form selected
            	$("#propertyTGModMod").val(pmt[0][tg]['Mod']);
            }); 
		}else{
			$("#propertyTGModMod").val('');
		}
	});

	// if clicked on Save button of Property Modifier Towngrade Mod Tab
	$("#propertyTGModSave").on('click',function(){
		// get all values
		var towngrade = $("#propertyTGModTowngrade").val();
		var propertyTGModMod = $("#propertyTGModMod").val();

		if(towngrade != '' && towngrade != null){
			$.ajax({
	            url:formPrefix+"api/2020/amf/root/propertyTGModSave",
	            method:"post",
	            data: {towngrade:towngrade,propertyTGModMod:propertyTGModMod,_token:$('meta[name="csrf-token"]').attr('content')},
	            datatype: 'json',
	            success: function(msg){
	              console.log(msg);
	              $("#propertyModTGNotify").show();
	              $("#propertyModTGNotify").css('color','green');
	              $("#propertyModTGNotify").text('Towngrade Mod updated successfully.');
	              
	              resetAllBoxFields("towngradeModTab");

	              setTimeout(function(){
	              	$("#propertyModTGNotify").hide();
	              },2000);
	              
	            },
	            error: function(data){
	              console.log(data);
	            }
	          });
		}else{
			swal('select towngrade.');
		}
	});

	// When property  mod construction has been change
	$("#propertyConModConType").on('change',function(){
		// get value of banner form
		var constructionType = $("#propertyConModConType").val();
		if(constructionType != '' && constructionType != null){
			$.getJSON(formPrefix+'api/2020/amf/root/propertyConModJson', function(pmc) { 
				//console.log(banner);
            	// set values as per form selected
            	$("#propertyConModMod").val(pmc[0][constructionType]['mod']);
            	$("#propertyConModCode").val(pmc[0][constructionType]['code']);
            }); 
		}else{
			$("#propertyConModMod").val('');
			$("#propertyConModCode").val('');
		}
	});

	// if clicked on Save button of Property Modifier construction Mod Tab
	$("#propertyConModSave").on('click',function(){
		// get all values
		var constructionType = $("#propertyConModConType").val();
		var propertyConModMod = $("#propertyConModMod").val();
		var propertyConModCode = $("#propertyConModCode").val();

		if(constructionType != '' && constructionType != null){
			$.ajax({
	            url:formPrefix+"api/2020/amf/root/propertyConModSave",
	            method:"post",
	            data: {constructionType:constructionType,propertyConModMod:propertyConModMod,propertyConModCode:propertyConModCode,_token:$('meta[name="csrf-token"]').attr('content')},
	            datatype: 'json',
	            success: function(msg){
	              console.log(msg);
	              $("#propertyModConNotify").show();
	              $("#propertyModConNotify").css('color','green');
	              $("#propertyModConNotify").text('Construction Mod updated successfully.');
	              
	              resetAllBoxFields("constructionModTab");

	              setTimeout(function(){
	              	$("#propertyModConNotify").hide();
	              },2000);
	              
	            },
	            error: function(data){
	              console.log(data);
	            }
	          });
		}else{
			swal('select construction type.');
		}
	});

	// When form or province change on FORM PROVINCE RULE TAB
	$(".fprGetData").on('change',function(){
		// get value of banner form
		var fprForm = $("#fprForm").val();
		var fprProvince = $("#fprProvince").val();

		if(fprForm != '' && fprForm != null && fprProvince != '' && fprProvince != null){
			$.getJSON(formPrefix+'api/2020/amf/root/getFormProvinceRulesJson', function(fpr) { 
				//console.log(banner);
            	// set values as per form selected
            	$("#fprRQ").val(fpr[fprForm][fprProvince]);
            }); 
		}else{
			$("#fprRQ").val('');
		}
	});

	// if value in table column has changed in FORM PROVINCE RULE TAB
	$("[class ^= fprVal]").on('change',function(){
		// get all values
		var fprForm = $(this).attr('data-form');
		var fprProvince = $(this).attr('data-province');
		var fprRQ = $(this).val();
		
		/*console.log('Form : '+fprForm);
		console.log('Province : '+fprProvince);
		console.log('Val : '+fprRQ);*/

		if(fprForm != '' && fprForm != null && fprProvince != '' && fprProvince != null){
			$.ajax({
	            url:formPrefix+"api/2020/amf/root/formProvinceRuleUpdate",
	            method:"post",
	            data: {fprForm:fprForm,fprProvince:fprProvince,fprRQ:fprRQ,_token:$('meta[name="csrf-token"]').attr('content')},
	            datatype: 'json',
	            success: function(msg){
	              //console.log(msg);
	              $("#fprNotify").show();
	              $("#fprNotify").css('color','green');
	              $("#fprNotify").text('Form province rule updated successfully.');
	              
	              setTimeout(function(){
	              	$("#fprNotify").hide();
	              },2000);
	              //showFPRTable();
	            },
	            error: function(data){
	              console.log(data);
	            }
	          });
		}else{
			swal('select required fields.');
		}
	});


	$(".fprValidateText").on("keypress", function(e){
      	var keyCode = e.which;
      	/*
	      	R = 82
	      	Q = 81
      	*/
      	var allowedCharacter = [82,81];
      	if (jQuery.inArray(keyCode,allowedCharacter) == -1) { 
        	return false;
      	}
 	});

	// When click on show table button on FORM PROVINCE RULE TAB
	/*$("#fprTab").on('click',function(){
		$("#fprTableBox").show();
		showFPRTable();
	});*/

	function showFPRTable(){
		$("#fprTableBox").hide();
		$("#fprTable").empty();
		$.getJSON(formPrefix+'api/2020/amf/root/getFormProvinceRulesJson', function(fpr) { 
			var html = "<table  class='table table-striped table-bordered'>";
			html += "<thead><th>Form</th><th>AB</th><th>BC</th><th>MB</th><th>NB</th><th>NFL</th><th>NT</th><th>NS</th><th>NU</th><th>ON</th><th>PEI</th><th>QC</th><th>SK</th><th>YT</th></thead>";
			html += "<tbody>";
			//console.log(fpr);
			var i=0;
			$.each(fpr,function(key,value){
				html += "<tr>";
				html += "<td>"+key+"</td>";
				$.each(value,function(k,v){
					html += "<td>"+v+"</td>";
				});
				html += "</tr>";
				i++;
				//return false;
			});

			html += "</tbody>";
			html += "</table>";

			$("#fprTable").html(html);
			$("#fprTableBox").show();
        }); 
	}

});