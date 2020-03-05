$(document).ready(function(){

  //activate bootstrap tooltip
  $('[data-toggle="tooltip"]').tooltip();

  
  var clicked = false;
  var resetClicked = false;
  var finishClicked = false;
  // when user try to refresh manually
  /*window.onbeforeunload = function(e) {
    var e = e || window.event;
    console.log(e);
    // if clicked is true then it shows browser default alert prompt confirmation 
    if(!clicked) {
        console.log('Manual refresh will not work');
        resetFunction('leavingPage');
        return "Manual refresh might loose data";
      }
    
  }*/
  /*var activeStay = true;

  document.onkeydown = function() {
      console.log('KeyCode : '+event.keyCode);
      activeStay = true;
  }
  $( "body" ).mouseup(function() {
    activeStay = true;
  })
  .mousedown(function() {
    activeStay = true;
  });*/

  $(window).bind('beforeunload', function () {
    /*console.log(activeStay);
    activeStay = false;*/

      // block user to refresh page by pressing F5 key or ctl+R key
      if(!clicked) {
        console.log('Manual refresh will not work');
        //resetFunction('leavingPage');
        return "Leaving page might loose data";
      }
  });
  $(window).bind('unload', function () {
    if(resetClicked || finishClicked){
      // do nothing   
    }else{
      resetFunction('leavingPage');
    }
      // set 2 sec time to get all form data and sending back to AMF
      setTimeout(function(){  },2000);
      console.log('Leaving');
  });


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
      autoAdjustHeight:true,
      // Enable/Disable keyboard navigation(left and right keys are used if enabled)
      keyNavigation:false, 
            
    });

  //writing validation on next step
  $('#smartwizard').on('leaveStep', function(e, anchorObject, stepNumber) {

    // if legal step 
    if(stepNumber == 0){
      // get acknowledgements value
      if($('#cb1').is(":checked") && $('#cb2').is(":checked") && $('#cb3').is(":checked")){
        // allow to go next
        $(".acknowledgeError").hide();
      }else{
        $(".acknowledgeError").show();
        $(".acknowledgeError").text("Please select acknowledgements.");
        return false;
      }
    }

    //checks valid on leave field - all required fields
    $.each( $(anchorObject.attr('href')).find('input.required'), function( key, value ) {
      if($(this).css("visibility") == "hidden" || $(this).css('display') == 'none' || $(this).closest('div').parent('div').css('display') == 'none'  || $(this).parent('div').css('display') == 'none'){
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
      if($(this).css("visibility") == "hidden" || $(this).css('display') == 'none' || $(this).closest('div').parent('div').css('display') == 'none'  || $(this).parent('div').css('display') == 'none'){
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
        $(anchorObject.attr('href')).find('input.required').prev('label').find('span').addClass('err2') ;
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
      var total_error = $(anchorObject.attr('href')).find('input.required').prev('label').find('.err2').length + $(anchorObject.attr('href')).find('select.required').prev('label').find('.err2').length;
      
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
  

  // Restricts input for the set of matched elements to the given inputFilter function.
(function($) {
  $.fn.inputFilter = function(inputFilter) {
    return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      } else {
        this.value = "";
      }
    });
  };
}(jQuery));

  // only number allowed to input in some of field
  $(".onlyNumbers").inputFilter(function(value) {
    return /^\d*$/.test(value); 
  });

  // only number & letters allowed to input in some of field
  $(".onlyNumbersAndLetters").inputFilter(function(value) {
    return /^[a-zA-Z0-9 ]*$/i.test(value); 
  });

  // add comma after each 3 digits in values
  $(document).on('keyup','.commaValues',function(event) {

    // skip for arrow keys
    if(event.which >= 37 && event.which <= 40) return;

    // format number
    $(this).val(function(index, value) {
      return value
      .replace(/\D/g, "")
      .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    });
  });

  // check year is max to current year
  $(".checkYear").on('keyup',function(){
    var val = $(this).val();
    var currentYear = (new Date).getFullYear();
    //console.log(currentYear);
    if(val > currentYear || val < 0){
      $(this).addClass('invalid');
       $(this).val('');
      $(this).attr('placeholder','Please add valid year');
    }else{
      $(this).removeClass('invalid');
    }
  });

  // check percentage is between 0 to 100
  check = function (e,value){
      if (!e.target.validity.valid) {
        e.target.value = value.substring(0,value.length - 1);
        return false;
      }
      var idx = value.indexOf('.');
      if (idx >= 0) {
        if (value.length - idx > 3 ) {
          e.target.value = value.substring(0,value.length - 1);
          return false;
        }
      }
      return true;
    }

    // check valid email
    $(document).on("focusout", ".checkEmail", function(){
      var input_val = $.trim($(this).val() );
      if(input_val != ''){
        var is_success = validate_email(input_val); 

        if(!is_success){
          $(this).addClass('invalid');
          $(this).parent('div').find('.validEmailError').show();
          $(".sw-btn-prev").attr('disabled','true');
          $(".sw-btn-next").attr('disabled','true');
        }else{
          $(this).removeClass('invalid'); 
          $(this).parent('div').find('.validEmailError').hide();
          $(".sw-btn-prev").removeAttr('disabled');
          $(".sw-btn-next").removeAttr('disabled');
        }
      }else{ // remove invalid class if added before and value is empty
          $(this).removeClass('invalid'); 
          $(this).parent('div').find('.validEmailError').hide();
          $(".sw-btn-prev").removeAttr('disabled');
          $(".sw-btn-next").removeAttr('disabled');
        }
    });
    var validate_email = function(email){
      var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
      var is_email_valid = false;
      if(email.match(pattern) != null){
        is_email_valid = true;
      }
      return is_email_valid;
    }

    // allow 0-9 ( ) . - space & e x t character
    $(".checkPhone").on("keypress", function(e){
      var keyCode = e.which;
      /*
        69 - E  101 - e
        88 - X  120 - x
        84 - T  116 - t
        . - 46  ( - 40 ) - 41
        dash - 45
        48-57 - (0-9)Numbers
      */
      var allowedCharacter = [69,88,84,46,45,40,41,101,120,116,32];
      if ( (!(keyCode >= 48 && keyCode <= 57)) && jQuery.inArray(keyCode,allowedCharacter) == -1) { 
        return false;
      }
    });

    // check phone number have atleast 10 digits
    $(document).on("focusout", ".checkPhone", function(){
      var input_val = $.trim($(this).val() );
      if(input_val != ''){
        var is_success = validate_phone(input_val); 

        if(!is_success){
          $(this).addClass('invalid');
          $(this).parent('div').find('.validPhoneError').show();
          $(".sw-btn-prev").attr('disabled','true');
          $(".sw-btn-next").attr('disabled','true');
        }else{
          $(this).removeClass('invalid'); 
          $(this).parent('div').find('.validPhoneError').hide();
          $(".sw-btn-prev").removeAttr('disabled');
          $(".sw-btn-next").removeAttr('disabled');
        }
      }else{ // remove invalid class if added before and value is empty
          $(this).removeClass('invalid'); 
          $(this).parent('div').find('.validPhoneError').hide();
          $(".sw-btn-prev").removeAttr('disabled');
          $(".sw-btn-next").removeAttr('disabled');
        }
    });
    var validate_phone = function(phone){
      var validPhone = phone.replace(/[{()}]/g,'');
       validPhone = validPhone.replace(/,/g,'');
       validPhone = validPhone.replace(/-/g,'');
       validPhone = validPhone.replace(/\./g,'');
       validPhone = validPhone.replace(/ /g,'');
       validPhone = validPhone.toLowerCase();
      console.log(validPhone);
      console.log(validPhone.indexOf("x"));
      
      if(validPhone.indexOf("ext") > 0){
        var phoneArray = validPhone.split("ext");
      }else if(validPhone.indexOf("x") > 0){
        var phoneArray = validPhone.split("x");
      }else{
        var phoneArray = [];
        phoneArray[0] = validPhone;
        phoneArray[1] = '';
      }
      console.log(phoneArray);
      // first part of array will be phone number and other will be extention
      var phone1 = phoneArray[0];
      console.log('phone : '+ phone1.length);
      console.log('Ext : '+ phoneArray[1]);

      if(phone1.length < 10 || phone1.length > 10){
        return false;
      }else{
        return true;
      }
    }


    // display details of record if insured criminal record is yes
    $("#insured_criminal_record").on('change',function(){
      var insured_criminal_record = $("#insured_criminal_record").val();
      if(insured_criminal_record == 'Yes'){
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
        $("#mailing_address_provOtherBox").show();
        //$("#revertProvinceList").show();
        $("#mailing_address_provBox").hide();
      }else{
        $("#mailing_address_provBox").show();
        $("#mailing_address_provOtherBox").hide();
        //$("#revertProvinceList").hide();
        $("#mailing_address_province_other").val(''); // empty value if user fill up anything with yes and then select no again
      }
    });

    // click on revert list
    $("#revertProvinceList").on('click',function(){
      $("#mailing_address_provBox").show();
      $("#mailing_address_province").val(''); // reset value of province field 
      $("#mailing_address_provOtherBox").hide();
      //$("#revertProvinceList").hide();
      $("#mailing_address_province_other").val(''); // empty value if user fill up anything with yes and then select no again
    });

    // display other mailing address province field
    $("#mailing_address_country").on('change',function(){
      var mailing_address_country = $("#mailing_address_country").val();
      if(mailing_address_country == 'other'){
        $("#mailing_address_countryOtherBox").show();
        //$("#revertContryList").show();
        $("#mailing_address_countryBox").hide();
      }else{
        $("#mailing_address_countryBox").show();
        $("#mailing_address_countryOtherBox").hide();
        //$("#revertContryList").hide();
        $("#mailing_address_countryOther").val(''); // empty value if user fill up anything with yes and then select no again
      }
    });

    // click on revert list
    $("#revertContryList").on('click',function(){
      $("#mailing_address_countryBox").show();
      $("#mailing_address_country").val(''); // reset value of province field 
      $("#mailing_address_countryOtherBox").hide();
      //$("#revertContryList").hide();
      $("#mailing_address_countryOther").val(''); // empty value if user fill up anything with yes and then select no again
    });

    // display other existing Insurer field
    $("#risk_address_existingInsurer").on('change',function(){
      var risk_address_existingInsurer = $("#risk_address_existingInsurer").val();
      if(risk_address_existingInsurer == 'Other'){
        $("#risk_address_existingInsurerOtherBox").show();
        //$("#revertExistingInsurerList").show();
        $("#risk_address_existingInsurerBox").hide();
      }else{
        $("#risk_address_existingInsurerBox").show();
        $("#risk_address_existingInsurerOtherBox").hide();
        //$("#revertExistingInsurerList").hide();
        $("#risk_address_existingInsurerOther").val(''); // empty value if user fill up anything with yes and then select no again
      }
    });

    // click on revert list existing insurer
    $("#revertExistingInsurerList").on('click',function(){
      $("#risk_address_existingInsurerBox").show();
      $("#risk_address_existingInsurer").val(''); // reset value of province field 
      $("#risk_address_existingInsurerOtherBox").hide();
      //$("#revertExistingInsurerList").hide();
      $("#risk_address_existingInsurerOther").val(''); // empty value if user fill up anything with yes and then select no again
    });

    // display descrive use over 1 acre field
    $("#risk_address_lot_size").on('change',function(){
      var risk_address_lot_size = $("#risk_address_lot_size").val();
      if(risk_address_lot_size == 'Over 1 Acre'){
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
          html += '<div class="hmm_sections"><label class="col-md-4" style="float: left;">'+i+'. Name </label><input type="text" id="risk_address_hmm_name_'+i+'" name="risk_address_hmm_name_'+i+'" class="form-control col-md-8"  value=""><label class="col-md-4" style="float: left;"> Address </label><input type="text" id="risk_address_hmm_address_'+i+'" name="risk_address_hmm_address_'+i+'" class="form-control col-md-8"  value=""><label class="col-md-4" style="float: left;"> Amount of Outstanding Mortgage </label><input type="text" id="risk_address_hmm_amount_'+i+'" name="risk_address_hmm_amount_'+i+'" class="form-control col-md-8 commaValues"  value=""></div>';  
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
      if(risk_address_existingInsurerWillRenew == 'No'){
        $("#risk_address_existingInsurerNonRenewalBox").show();
      }else{
        $("#risk_address_existingInsurerNonRenewalBox").hide();
        $("#risk_address_existingInsurerNonRenewal").val(''); // empty value if user fill up anything with yes and then select no again
      }
    });

    // display attach details field for has insured cancelled insurance in risk address tab 
    $("#risk_address_hasInsuredCancelInsurance").on('change',function(){
      var risk_address_hasInsuredCancelInsurance = $("#risk_address_hasInsuredCancelInsurance").val();
      if(risk_address_hasInsuredCancelInsurance == 'Yes'){
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
          html += '<div class="noc5_sections"><label class="col-md-4" style="float: left;">'+i+'. Type of claims </label><select class="form-control col-md-8" id="risk_address_noc5_type_'+i+'" name="risk_address_noc5_type_'+i+'"><option value="">-Select value-</option><option value="Fire">Fire</option> <option value="Vandalism">Vandalism</option><option value="Theft-Burglary">Theft/Burglary</option><option value="Windstorm">Windstorm</option> <option value="Burst pipes">Burst pipes</option><option value="Sewer Backup">Sewer Backup</option><option value="Flood including overland water">Flood including overland water</option><option value="Other">Other</option></select><label class="col-md-4" style="float: left;"> Description of other </label><input type="text" id="risk_address_noc5_description_'+i+'" name="risk_address_noc5_description_'+i+'" class="form-control col-md-8"  value=""><label class="col-md-4" style="float: left;"> Open or Closed </label><select id="risk_address_noc5_openOrClosed_'+i+'" name="risk_address_noc5_openOrClosed_'+i+'" class="form-control col-md-8" ><option value="">-Select value-</option><option value="open">Open</option><option value="closed">Closed</option></select><label class="col-md-4" style="float: left;"> Amount of claim <span class="err">*</span></label><input type="text" id="risk_address_noc5_amount_'+i+'" name="risk_address_noc5_amount_'+i+'" class="form-control col-md-8 commaValues required"  value=""></div>'; 
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
      if(risk_address_incidenceInClaim == 'Yes'){
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
      if(occupancy_commercialOperations == 'Yes'){
        $("#occupancy_commercialOperationsDescribeBox").show();
      }else{
        $("#occupancy_commercialOperationsDescribeBox").hide();
        $("#occupancy_commercialOperationsDescribe").val(''); // empty value if user fill up anything with yes and then select no again
      }
    });

    // display other specify field for Overall construction in building construction section on occupancy tab
    $("#buildingConstruction_overallConstruction").on('change',function(){
      var buildingConstruction_overallConstruction = $("#buildingConstruction_overallConstruction").val();
      if(buildingConstruction_overallConstruction == 'Other'){
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

    // hide sprinkler coverage field if sprinklers value none
    $("#fireAlarmDetectors_sprinklers").on('change',function(){
      if($("#fireAlarmDetectors_sprinklers").val() == "None"){
        $("#sprinklersCoverageBox").hide();
      }else{
        $("#sprinklersCoverageBox").show();
        $("#fireAlarmDetectors_sprinklerCoverage").val('');
      }
    });

    // display are premises fenced and gated field for liability section in occupancy tab
    $("#liability_doesPremisesHavePool").on('change',function(){
      var liability_doesPremisesHavePool = $("#liability_doesPremisesHavePool").val();
      if(liability_doesPremisesHavePool == 'Yes'){
        $("#ifPremiseHasPoolBox").show();
      }else{
        $("#ifPremiseHasPoolBox").hide();
        $("#liability_doesPremisesFenced").val(''); // empty value if user fill up anything with yes and then select no again
      }
    });

    // show broker survey if yes for how long for do you know applicant personally question
    $("#brokerSurvey_applicantPersonally").on('change',function(){
      var brokerSurvey_applicantPersonally = $("#brokerSurvey_applicantPersonally").val();
      if(brokerSurvey_applicantPersonally == 'Yes'){
        $("#ifYesApplicantPersonally").show();
      }else{
        $("#ifYesApplicantPersonally").hide();
        $("#brokerSurvey_applicantPersonally_HowLong").val(''); // empty value if user fill up anything with yes and then select no again
      }
    });

    // show broker survey If No, from whom and why for Did you receive the order direct from the Applicant question
    $("#brokerSurvey_OrderDirectApplicant").on('change',function(){
      var brokerSurvey_OrderDirectApplicant = $("#brokerSurvey_OrderDirectApplicant").val();
      if(brokerSurvey_OrderDirectApplicant == 'No'){
        $("#ifNoOrderDirectApplicant").show();
      }else{
        $("#ifNoOrderDirectApplicant").hide();
        $("#brokerSurvey_OrderDirectApplicantWhomWhy").val(''); // empty value if user fill up anything with yes and then select no again
      }
    });

    // show broker survey If Yes, Which Coverages for Do you handle other Insurance for the Applicant question
    $("#brokerSurvey_handleOtherInsurance").on('change',function(){
      var brokerSurvey_handleOtherInsurance = $("#brokerSurvey_handleOtherInsurance").val();
      if(brokerSurvey_handleOtherInsurance == 'Yes'){
        $("#ifYesHandleOtherInsurance").show();
      }else{
        $("#ifYesHandleOtherInsurance").hide();
        $("#brokerSurvey_handleOtherInsuranceCoverages").val(''); // empty value if user fill up anything with yes and then select no again 
      }
    });

    // show broker survey If No, please explain for Do you recommend this risk in every Respecty question
    $("#brokerSurvey_recommandRisk").on('change',function(){
      var brokerSurvey_recommandRisk = $("#brokerSurvey_recommandRisk").val();
      if(brokerSurvey_recommandRisk == 'No'){
        $("#ifNoRecommandRisk").show();
      }else{
        $("#ifNoRecommandRisk").hide();
        $("#brokerSurvey_recommandRiskExplain").val(''); // empty value if user fill up anything with yes and then select no again
      }
    });

    // show broker survey If yes, how long have you placed this risk for Is this risk a renewal to your office question
    $("#brokerSurvey_riskRenewalToOffice").on('change',function(){
      var brokerSurvey_riskRenewalToOffice = $("#brokerSurvey_riskRenewalToOffice").val();
      if(brokerSurvey_riskRenewalToOffice == 'Yes'){
        $("#ifYesRiskRenewalToOffice").show();
      }else{
        $("#ifYesRiskRenewalToOffice").hide();
        $("#brokerSurvey_riskRenewalToOfficeHowLong").val(''); // empty value if user fill up anything with yes and then select no again
      }
    });

    // show describe for Are there any Rental Suites? in occupancy for ownerOccupied selection
    $("#occupancy_anyRentalSuites").on('change',function(){
      var occupancy_anyRentalSuites = $("#occupancy_anyRentalSuites").val();
      if(occupancy_anyRentalSuites == 'Yes'){
        $("#occupancy_anyRentalSuitesBox").show();
      }else{
        $("#occupancy_anyRentalSuitesBox").hide();
        $("#occupancy_anyRentalSuitesDescribe").val(''); // empty value if user fill up anything with yes and then select no again
      }
    });


    // when click on check box to check risk address is same as mailing address or not
    $("#sameAsMailingAddress").on('click',function(){
      checkSameAsMailingAddress();
    });
    
    // check step number and if user click on final step then check broker code to display calculate button
    $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection) {
      // add min height to auto for smartwizard container
      $(".sw-container").css('min-height','auto');

        if(stepNumber == 6){
          console.log('final step');

          // disable next button when in final step
          $(".sw-btn-next").hide();

          
          // get broker code
          var brokerCode = $.trim($('#broker_code').val());
          
          // empty review form everytime comes to final step to show new latest values
          $("#reviewForm").empty();

          // if there is broker code available
          if(brokerCode != '' && brokerCode != null){
            // check refer rules matching or not
            var formData = JSON.stringify($('#rtq_form').serializeArray());
            var rtqForm = $("#rtq_forms option:selected").val();
            //console.log(formData);
            $.ajax({
              url:"checkReferRules",
              method:"post",
              data: {formData:formData,rtqForm:rtqForm,_token:$('meta[name="csrf-token"]').attr('content')},
              datatype: 'json',
              success: function(msg){
                console.log(msg);

                if(msg.valid == "Empty" && msg.matchArray != ''){
                  // display referValidationNotMatchBox
                  $("#referValidationNotMatchBox").show();

                  var html = "<p> Please fill up all below required fields to determine quote. </p>";
                  html += "<ul>";
                  $.each(msg.matchArray,function(k,v){
                    html += "<li>"+v+"</li>";
                  });
                  html += "</ul>";
                  $("#referValidationNotMatchBox").html(html);

                  $('#calculateBox').hide();

                  reviewForm();
                  $(".bindingBox").hide();
                  

                }else if( msg.matchArray != '' && msg.valid !== "NotMatched"){
                  //console.log('brokerCode : '+brokerCode);

                  // display referValidationNotMatchBox
                  $("#referValidationNotMatchBox").show();
                  var html = "<p>We are not able to provide quote at this time. Your submission will be refer to underwriter to get quote.</p><p>Here are reason for refer : </p>";

                  html += "<ul>";
                  $.each(msg.matchArray,function(k,v){
                    html += "<li>"+v+"</li>";
                  });
                  html += "</ul>";
                  $("#referValidationNotMatchBox").html(html);

                  $('#calculateBox').hide();

                  reviewForm();
                  $(".bindingBox").hide();
                  
                }else{
                  console.log('valid == true');
                  $('#calculateBox').show();
                  $("#referValidationNotMatchBox").hide();
                  $("#referValidationNotMatchBox").empty();

                  reviewForm();
                  $(".bindingBox").show();
                  
                }
                
              },
              error: function(data){
                console.log(data);
              }
            });  
          }else{
            reviewForm();
            $('#calculateBox').hide();
            $(".bindingBox").hide();
            $(".binding").val('');
            $("#referValidationNotMatchBox").hide();
            $("#referValidationNotMatchBox").empty();
          }

          
          $('#priceBox').empty();
          
        }else{
          // hide previous button when on first step
          if(stepNumber == 0){
            //console.log('step : '+stepNumber);
            $(".sw-btn-prev").hide();
          }else{
            //console.log('step : '+stepNumber);
            $(".sw-btn-prev").show();
          }
          //console.log($(anchorObject.attr('href')).find('section:first').find('input:first').attr('name'));
          $(anchorObject.attr('href')).find('section:first').find(':input:enabled:visible:first').focus();

          // enable next button when not in final step
          $(".sw-btn-next").show();
          // remove  next button disable 
          $(".sw-btn-next").removeAttr('disabled');

        }
    });

    // select binding value top one
    $("#bindingUpper").on('click',function(e){
      e.preventDefault();
      bindClick = true;
      //var valUp = $("#bindingUpper").val();
      //$("#bindingLower").val(valUp);
      if($(this).hasClass('btn-warning')){
        $(this).removeClass('btn-warning');
        $(this).addClass('btn-info');
        $(this).text('Bound');
        $("#bindMsg,#bindMsgL").text("This application has been bind.");
        $("#bindingLower").removeClass('btn-warning');
        $("#bindingLower").addClass('btn-info');
        $("#bindingLower").text('Bound');
        // set bind status
        $("#bindStatus").val('Bound');
      }else {
        $(this).removeClass('btn-info');
        $(this).addClass('btn-warning');
        $(this).text('Bind');
        $("#bindMsg,#bindMsgL").text("This application has not been bind yet.");
        $("#bindingLower").removeClass('btn-info');
        $("#bindingLower").addClass('btn-warning');
        $("#bindingLower").text('Bind');
        // set bind status
        $("#bindStatus").val('Quoted');
      }
    });

    // select binding value down one
    $("#bindingLower").on('click',function(e){
      e.preventDefault();
      bindClick = true;
      //var valDown = $("#bindingLower").val();
      //$("#bindingUpper").val(valDown);
      if($(this).hasClass('btn-warning')){
        $(this).removeClass('btn-warning');
        $(this).addClass('btn-info');
        $(this).text('Bound');
        $("#bindMsg,#bindMsgL").text("This application has been bind.");
        $("#bindingUpper").removeClass('btn-warning');
        $("#bindingUpper").addClass('btn-info');
        $("#bindingUpper").text('Bound');
        // set bind status
        $("#bindStatus").val('Bound');
      }else {
        $(this).removeClass('btn-info');
        $(this).addClass('btn-warning');
        $(this).text('Bind');
        $("#bindMsg,#bindMsgL").text("This application has not been bind yet.");
        $("#bindingUpper").removeClass('btn-info');
        $("#bindingUpper").addClass('btn-warning');
        $("#bindingUpper").text('Bind');
        // set bind status
        $("#bindStatus").val('Quoted');
      }
    });


  // function to remove comma from values
  function removeCommas(val){
    if(val != '' && val != null){
      console.log('Remove comma');
      return val.replace(/,/g, '');
    }else{
      return val;
    }
  }

  /***
   Calculate data and display price if there is broker code
   Get all form data
  ***/
    $("#calculate").on('click',function(event){
      //console.log('clicked calculate '+ clicked);
      event.preventDefault(); 
      var rtqForm = $("#rtq_forms option:selected").val();
      // gather required data to calculate
      var province = $('#risk_address_province').val();
      var yearsBuilt = $('#buildingConstruction_yearBuilt').val();
      var fireDeptDistance = $('#fireAlarmDetectors_fireDeptDistance').val();
      var fireDeptType = $('#fireAlarmDetectors_fireDeptTye').val();
      var hydrant = $('#fireAlarmDetectors_hydrant').val();
      var buildingLimit = removeCommas($('#coverage_buildingLimit').val());
      var contentsLimit = removeCommas($('#coverage_contentsLimit').val());
      var rentalIncomeLimit = removeCommas($('#coverage_rentalIncomeLimit').val());
      var garageLimit = removeCommas($('#coverage_garageLimit').val());
      var shedLimit = removeCommas($('#coverage_shedLimit').val());
      var liability = $('#coverage_liabilityLimit').val();
      console.log(buildingLimit+'  '+contentsLimit+'  '+rentalIncomeLimit+'  '+garageLimit+'  '+shedLimit);
      if(province != '' && yearsBuilt != '' && fireDeptDistance != '' && fireDeptType != '' && hydrant != '' && liability != '' )
      {
        $.ajax({
          url:"calculate",
          method:"post",
          data: {province:province,yearsBuilt:yearsBuilt,fireDeptDistance:fireDeptDistance,fireDeptType:fireDeptType,hydrant:hydrant,buildingLimit:buildingLimit,contentsLimit:contentsLimit,rentalIncomeLimit:rentalIncomeLimit,garageLimit:garageLimit,shedLimit:shedLimit,liability:liability,rtqForm:rtqForm,_token:$('meta[name="csrf-token"]').attr('content')},
          datatype: 'json',
          success: function(msg){
            
            msg = JSON.parse(msg);
            console.log(msg);
            
            var table = "<table class='table table-bordered'> <tbody><tr><td>Property Total</td><td><span style='width:50%;text-align:right;display:block;'>"+msg['propertyTotal']+"</span></td></tr><tr><td>Liability Total</td><td><span style='width:50%;text-align:right;display:block;'>"+msg['liabilityVal']+"</span></td></tr><tr><td>Fee</td><td><span style='width:50%;text-align:right;display:block;'>"+msg['fee']+"</span></td></tr><tr class='totalRow'><td><b>Total</b></td><td><span style='width:50%;text-align:right;display:block;'><b>"+msg['total']+"</b></span></td></tr></tbody> </table>";
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
    clicked = true;

    var valid = false;
    // check if all required fields are filled up or not
    $.each($('.required'), function( key, value ) {
      if($(this).css("visibility") == "hidden" || $(this).css('display') == 'none' || $(this).closest('div').parent('div').css('display') == 'none' || $(this).parent('div').css('display') == 'none'){
        console.log($(this).attr('name')+'    not visible');
      }else{
        /*if($(this).val()){
          valid = true;
        }else{
          valid = false; 
          return false;
        } */

        // check if all required fields are correct and there is no error
        var total_error = $(this).prev('label').find('.err2').length;
        
        if (total_error > 0 ) { 
          valid = false; 
          return false;
        } else {
          valid = true;
        } 
        //console.log($(this).attr('name')+'    '+valid);
      }
    });
    
    
    
    var referNotMatchReason;
    // get refer not matching reason if available
    if($("#referValidationNotMatchBox").css('display') != 'none'){
      referNotMatchReason = {};
      var i  = 0;
      $("#referValidationNotMatchBox ul li").each(function(){
        referNotMatchReason[i] = $(this).text();
        i++;
      });
    }else{
      referNotMatchReason = {};
    }

    // here we are taking just lower binding field value [ note : its always changed if upper one change and vice versa ]
    var binding = $("#bindStatus").val();
    
    console.log($.isEmptyObject(referNotMatchReason));
    if(valid == true || ($.isEmptyObject(referNotMatchReason) == false && valid == true) ){
      /*var formData = JSON.stringify($('#rtq_form').serializeArray());
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
      noOfClaimsArray = JSON.stringify(noOfClaimsArray);*/
      //console.log(noOfMortgageesArray);console.log(JSON.stringify(noOfMortgageesArray));
      //console.log(noOfClaimsArray);

      // get all form data including dynamic fields
      var getFormData = getAllFormData();
      var formData = getFormData.formData;
      var noOfMortgageesArray = getFormData.noOfMortgageesArray;
      var noOfClaimsArray = getFormData.noOfClaimsArray;
      // json encode of reasons
      referNotMatchReason = JSON.stringify(referNotMatchReason);

      var rtqForm = $("#rtq_forms option:selected").val();

      $(".loader").show(); 
      finishClicked = true;
      setTimeout(function(){  },2000);
      $.ajax({
        url:"finish",
        method:"post",
        data: {formData:formData,rtqForm:rtqForm,noOfMortgageesArray:noOfMortgageesArray,noOfClaimsArray:noOfClaimsArray,binding:binding,referNotMatchReason:referNotMatchReason, _token:$('meta[name="csrf-token"]').attr('content')},
        datatype: 'json',
        success: function(msg){
          console.log(msg);
          if(msg.success){
            $(".loader").hide();
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
          finishClicked = false;
          console.log(data);
        }
      });
    }else{
      clicked = false;
      swal('Please fill up all required fields.');
    }
  });


  // function to get all form data including dynamic fields
  function getAllFormData(){
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

      // return object with all data
      return {'formData':formData,'noOfMortgageesArray':noOfMortgageesArray,'noOfClaimsArray':noOfClaimsArray};
  }

  /**
     function to display all form data for review
  **/
  function reviewForm(){
    // get all form data step by step
    reviewDataByStep('tab-1');
    reviewDataByStep('tab-2');
    reviewDataByStep('tab-3');
    reviewDataByStep('tab-4');
    reviewDataByStep('tab-5');
  }

  // function to display review data by step
  function reviewDataByStep(step){
    // get all label & value in
    
    var html = '';
    // Add section label - find only first h3 element and show that text
    html += "<h4 style='width:90%;float:left;'>"+$('#'+step).find('h3:first').text()+"</h4> <a href='javascript:window.scrollTo(0,0)' id='goToStep' data-togo='"+step+"'>Go To Top</a>";
    // create table
    html += "<table class='table table-bordered rowHover' style='width:100%;'>";
      
    // loop through all label in each step
    $('#'+step).find('label').each(function(index,elem){
      // add row
      html += "<tr>";
      
      // check parent div or div of parent div display is not none
      if($(this).parent('div').css('display')!= 'none' && $(this).closest('div').parent('div').css('display') != 'none'){
        // add label 
        if($(this).prev().is("input[type=checkbox]")){
          //do nothing
          console.log('checkbox');
        }else{
          html += "<td style='width:60%;'>"+$(this).text()+"</td>";  
          
          // check element is input
          if($(this).next().is('input')){
            html += "<td  style='width:40%;'>"+$(this).next('input').val()+"</td>";
          }
          // check if element is select 
          if($(this).next().is('select')){
            html += "<td style='width:40%;'>"+$(this).next('select').val()+"</td>";
          }
        }
      }
      // finish row
      html += "</tr>";

    });
    
    // finish table
    html += "</table>";
    
    // append html to review form  
    $("#reviewForm").append(html);    
  }

  // check if risk address is same as mailing address
  function checkSameAsMailingAddress(){
    //console.log($(this).is(":checked"));
      if($('#sameAsMailingAddress').is(":checked")){
        // get mailing address values and assign to risk address
        $("#risk_address_street").val($("#mailing_address_street").val());
        $("#risk_address_city").val($("#mailing_address_city").val());
        if($("#mailing_address_province").val() != ''){
          $("#risk_address_province").val($("#mailing_address_province").val());
        }else{
          $("#risk_address_province").val($("#mailing_address_province_other").val());
        }
        $("#risk_address_postalCode").val($("#mailing_address_postalCode").val());

      }else{
        // empty risk address
        $("#risk_address_street").val('');
        $("#risk_address_city").val('');
        $("#risk_address_province").val('');
        $("#risk_address_postalCode").val('');
      }
    
  }

  // when click on go back
  $("#goBackToFinal").on('click',function(){
    $(".confirmSection").hide();
    $(".finalSection").show();
  });

  var bindClick = false;
  // when click on both confirm button
  $("#finishUpper,#finishLower").on('click',function(event){
    event.preventDefault();
    var binding;
    // get binding value if binding box is not hidden
    if($(".bindingBox").css('display') != 'none'){
      // here we are taking just lower binding field value [ note : its always changed if upper one change and vice versa ]
      //binding = $("#bindingLower").val();
      //if(!bindClick){
        // add invalid class to binding field if its empty & return false 
        //$(".binding").addClass('invalid');
       /* swal({
          title: "Are you sure not want to bind?",
          text: "",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then(function(noBind) {
          if (noBind) {
            return false;//swal("Your imaginary file is safe!");
          } else {
            // nothing
          }
        });*/
      //  return false;
     // }else{
        //$(".binding").removeClass('invalid');
        //scroll window to top
        window.scrollTo(0, 0);

        $(".confirmSection").show();
        // hide previous button on confirmation page 
        $(".sw-btn-prev").hide();
        // set min-height auto to smartwizard container ; NOTE: sometime it shows length of review form on confirmation page which looks space in bottom
        $(".sw-container").css('min-height','auto');

        $(".finalSection").hide();
      //}
    }else{
      //scroll window to top
        window.scrollTo(0, 0);
        
        $(".confirmSection").show();
        // hide previous button on confirmation page 
        $(".sw-btn-prev").hide();
        // set min-height auto to smartwizard container ; NOTE: sometime it shows length of review form on confirmation page which looks space in bottom
        $(".sw-container").css('min-height','auto');
        $(".finalSection").hide();
    }
    
  });

  // when reset form button
  $("#resetForm").on('click',function(){
    //$('#smartwizard').smartWizard("reset");
    swal({
        title: "Are you sure want to reset?",
        text: "",
        icon: "warning",
        buttons: true,
      })
      .then(function(reset) {
      if (reset) {
        resetClicked = true;
        resetFunction('reset');
        
      } else {
        // make clicked false
        clicked = false;
        return false;//swal("Your imaginary file is safe!");
      }
    });
        
  });

  // Reset function
  function resetFunction(abandonStatus){
      // get all form data including dynamic fields
      console.log(abandonStatus);
      var getFormData = getAllFormData();
      var formData = getFormData.formData;
      var noOfMortgageesArray = getFormData.noOfMortgageesArray;
      var noOfClaimsArray = getFormData.noOfClaimsArray;
      var binding = $("#bindStatus").val();
      var referNotMatchReason;
      // get refer not matching reason if available
      if($("#referValidationNotMatchBox").css('display') != 'none'){
        referNotMatchReason = {};
        var i  = 0;
        $("#referValidationNotMatchBox ul li").each(function(){
          referNotMatchReason[i] = $(this).text();
          i++;
        });
      }else{
        referNotMatchReason = {};
      }
      // json encode of reasons
      referNotMatchReason = JSON.stringify(referNotMatchReason);

      var rtqForm = $("#rtq_forms option:selected").val();

      
      setTimeout(function(){  },2000);
      $.ajax({
        url:"resetForm",
        method:"post",
        data: {formData:formData,rtqForm:rtqForm,noOfMortgageesArray:noOfMortgageesArray,noOfClaimsArray:noOfClaimsArray,binding:binding,referNotMatchReason:referNotMatchReason,abandonStatus:abandonStatus, _token:$('meta[name="csrf-token"]').attr('content')},
        datatype: 'json',
        success: function(msg){
          console.log(msg);

          if(abandonStatus == "reset"){
            // to make reset, make clicked = true and send location to root
            clicked = true;
            window.location.href='/';
          }else{
            clicked = false;
          }
        },
        error: function(data){
          console.log(data);
        }
      });
  }

});

