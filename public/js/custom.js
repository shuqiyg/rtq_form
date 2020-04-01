$(document).ready(function(){

  var clicked = false;
  var resetClicked = false;
  var finishClicked = false;
  var closeWindowModal = false;

  var brokerCodeValidation = false;

  // add variable to use selected rtqform value to use in entire custom js
  var rtqFormGlobal = $("#selectedForm").val();//$("#rtq_forms option:selected").val();
        
 $('.datepicker').datepicker({
      changeMonth: true,
      changeYear: true
  });
 
  //activate bootstrap tooltip
  $('[data-toggle="tooltip"]').tooltip({
    html:true,
    placement : 'top'
  });

  /** BEFOREUNLOAD METHOD **/
  $(window).bind('beforeunload', function () {
    /*console.log(activeStay);
    activeStay = false;*/
      //console.log('clicked '+clicked);
      // block user to refresh page by pressing F5 key or ctl+R key
      if(!clicked) {
        console.log('Manual refresh will not work');
        //resetFunction('leavingPage');
        return "Leaving page might loose data";
      }
  });
  /** END OF BEFOREUNLOAD METHOD **/
  /** UNLOAD METHOD **/
  $(window).bind('unload', function () {
    clicked = true;
    //console.log('clickedunload '+clicked);
    //console.log("resetClicked "+resetClicked +" finishClicked "+finishClicked);
    if(resetClicked || finishClicked || closeWindowModal ){
      // do nothing
      //remove cookies
      Cookies.remove('loadedForm');
      
    }else{
      resetFunction('leavingPage');
    }
    
    
      // set 2 sec time to get all form data and sending back to AMF
      setTimeout(function(){  },2000);
      console.log('Leaving');
  });
  /** END OF UNLOAD METHOD **/
  

  /** CLOSE WINDOW BUTTON CLICK **/
  $("#closeWindow").on('click',function(){
    closeWindowModal = true;
    clicked = true;
    resetFunction('windowClose');
    // set 2 sec time to get all form data and sending back to AMF
      setTimeout(function(){ 

      },2000);
  });
  /** END OF CLOSE WINDOW BUTTON CLICK **/

  /** Back to Form click on model **/
  $("#backToForm").on('click',function(){
    $("#ouibounce-modal").modal('hide');
  });
  /*********************************/


  /** AUTOCOMPLETE OFF **/

  $.each($('input'), function( key, value ) {
    $(this).attr('autocomplete','off');
  });

  /**********************/

  /** At time of loading **/
  $('.infoToggle').change(function() { 
    infoToggle($(this).val());
  });
  
  function infoToggle(info) {
  console.log(info);
  switch (info) {
    /*case 'agree':
      //$('.sw-btn-next').removeAttr('disabled');
      $('.sw-btn-next').show();
      $("#agreeDisagreeError").hide();
      $('#insured_isRiskAddressSame').bootstrapToggle('off'); // default checkbox is off
      break;
    case 'disagree':
      //$('.sw-btn-next').attr('disabled','true');
      $('.sw-btn-next').hide(); // need to hide next button because of top next button is not getting disabled so just hide it.
      $("#agreeDisagreeError").hide();
      break;*/
    case 'Sole':
      $(".insuredSoleBOX").show();
      clearFields("insuredCorpBox");
      clearFields("insuredSoleOrCorpBox");
      $(".insuredSoleOrCorpBox").show(); // some common field for corp or sole insured
      // hide corp box
      $(".insuredCorpBox").hide();
      break;
    case 'Corporation':
      $(".insuredSoleBOX").hide();
      clearFields("insuredSoleBOX");
      clearFields("insuredSoleOrCorpBox");
      // show corp box
      $(".insuredCorpBox").show();
      $(".insuredSoleOrCorpBox").show(); // some common field for corp or sole insured
      break;
    case '': // its only for SoleOrCorp field in Insured Tab
      clearFields("insuredSoleBOX");
      clearFields("insuredCorpBox");
      clearFields("insuredSoleOrCorpBox");
      // hide sole and corp box
      $(".insuredSoleBOX").hide();
      $(".insuredSoleOrCorpBox").hide(); // some common field for corp or sole insured
      $(".insuredCorpBox").hide();
      break;
  }
}

function clearFields(fieldID){
  $.each($("."+fieldID).find('input'),function(k,v){
    $(this).val('');
  });
  $.each($("."+fieldID).find('select'),function(k,v){
    $(this).val('');
  });
}

$('#insured_isRiskAddressSame').change(function() {
  // so if its YES
  if(! $(this).prop('checked')){
    //$(".riskAddressBOX").show(); // add this to parent div of each below fields
    // empty risk address fields if there is any value
    $("#risk_address_street").val('');
    $("#risk_address_city").val('');
    $("#risk_address_province").val('');
    $("#risk_address_postalCode").val('');

  }else{
    //$(".riskAddressBOX").hide();
    // add values to risk address fields
    $("#risk_address_street").val($("#mailing_address_street").val());
    $("#risk_address_city").val($("#mailing_address_city").val());
    if($("#mailing_address_province").val() != ''){
      $("#risk_address_province").val($("#mailing_address_province").val());
    }else{
      $("#risk_address_province").val($("#mailing_address_province_other").val());
    }
    $("#risk_address_postalCode").val($("#mailing_address_postalCode").val());

    //console.log($("#risk_address_street").val()+" "+$("#risk_address_city").val()+" "+$("#risk_address_province").val()+" "+$("#risk_address_postalCode").val());
  }
  //clearFields("riskAddressBOX");

});

  /************************/


  /** SMARTWIZARD ACTIVATION **/
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
      toolbarSettings: {
        toolbarPosition: 'bottom', // none, top, bottom, both
      }            
    });
  /** END OF SMARTWIZARD ACTIVATION **/

  //writing validation on next step
  $('#smartwizard').on('leaveStep', function(e, anchorObject, stepNumber) {
    var rtqForm = $("#selectedForm").val();//$("#rtq_forms option:selected").val();

    // if legal step 
    if(stepNumber == 0){
     if(rtqForm == "homeInspector"){
       $('#insured_isRiskAddressSame').bootstrapToggle('off'); // default checkbox is off
         /*if($("input[name=hiAgreeDisAgree]:checked").val() == "agree" || $("input[name=hiAgreeDisAgree]:checked").val() == "disagree"){
          if($("input[name=hiAgreeDisAgree]:checked").val() == "disagree"){
            $(".sw-btn-next").attr('disabled','true');
          }else{
            $(".sw-btn-next").removeAttr('disabled');
          }
          $("#agreeDisagreeError").hide();
        }else{
          $("#agreeDisagreeError").show();
          $("#agreeDisagreeError").text("Please select agree or disagree");
          return false;
        }*/
      }
      
      //if(rtqForm !== "homeInspector"){
        // get acknowledgements value
        if($('#cb1').is(":checked") && $('#cb2').is(":checked") && $('#cb3').is(":checked")){
          // allow to go next
          $(".acknowledgeError").hide();
        }else{
          $(".acknowledgeError").show();
          $(".acknowledgeError").text("Please select acknowledgements.");
          return false;
        }
      //} 

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
      //console.log(validPhone);
      //console.log(validPhone.indexOf("x"));
      
      if(validPhone.indexOf("ext") > 0){
        var phoneArray = validPhone.split("ext");
      }else if(validPhone.indexOf("x") > 0){
        var phoneArray = validPhone.split("x");
      }else{
        var phoneArray = [];
        phoneArray[0] = validPhone;
        phoneArray[1] = '';
      }
      //console.log(phoneArray);
      // first part of array will be phone number and other will be extention
      var phone1 = phoneArray[0];
      //console.log('phone : '+ phone1.length);
      //console.log('Ext : '+ phoneArray[1]);

      if(phone1.length < 10 || phone1.length > 10){
        return false;
      }else{
        return true;
      }
    }

    /** validating broker using broker code if entered **/
    $(document).on("focusout", ".validateBroker", function(){
      validateBroker();
    });

    /** Function to validate broker **/
    function validateBroker(){
      var brokerCode = $.trim($("#broker_code").val());
      var producer_email = $.trim($("#producer_email").val());
      var brokerDomain = producer_email.split('@')[1];
      
      //console.log(brokerDomain);
      // if broker code & email address either anyone or both empty
      if( ((brokerCode == '' || brokerCode == null || brokerCode == 0) && (brokerDomain == '' || brokerDomain == null )) || (brokerCode == '' || brokerDomain == '') ){
        //console.log("Empty Broker Code");
        // hide error msg if added broker code and then removed
        $("#bcMsg").hide();
        $(".sw-btn-next").removeAttr('disabled');
        brokerCodeValidation = true;
      }else{
        $.ajax({
          url:"brokerValidation",
          method:"post",
          data: {brokerCode:brokerCode,brokerDomain:brokerDomain,_token:$('meta[name="csrf-token"]').attr('content')},
          datatype: 'json',
          success: function(msg){
            console.log(msg);
            if(msg == "cancelled" || msg == "error"){
              $("#bcMsg").show();
              
              brokerCodeValidation = false;
              
              // if broker cancelled then not allowed to do anything 
              // disable all step if user went ahead and then entered invalid code
              if(msg == "cancelled"){
                $("#bcMsg").text("Broker code is not valid. Please contact AM Fredericks.");
                // disable next button
                $(".sw-btn-next").attr('disabled','true');
                // get all step with done
                $.each($(".step-anchor li"),function(k,v){
                  if($(this).hasClass('done')){
                    if($(this).find('a').attr("href") == "#tab-1" || $(this).find('a').attr("href") == "#legal"){
                      // do nothing
                    }else{
                      $(this).removeClass('done');
                      // if step has danger class , remove it
                      if($(this).hasClass('danger')){
                        $(this).removeClass('danger');
                      }
                    }
                  }
                }); 
              }else if(msg == "error"){
                $("#bcMsg").text("Broker code is not validate with our system. Please contact AM Fredericks.");
                $(".sw-btn-next").removeAttr('disabled');
              }

            }else if(msg == "Not available"){
              $("#bcMsg").show();
              $("#bcMsg").text("This broker code is not available in our system.");
              $(".sw-btn-next").removeAttr('disabled');
              brokerCodeValidation = false;
            }else{
              $("#bcMsg").hide();
              $(".sw-btn-next").removeAttr('disabled');
              brokerCodeValidation = true;
            }
          },
          error: function(data){
            console.log(data);
          }
        });
      }
    }


    /** Function to open and hide nested field based on parent field value **/
    function fieldOpenHide(field,fieldVal,fieldBox='',otherFieldBox,otherFieldArray,hideFieldBox=''){
      var field_var = $("#"+field).val();
        if(field_var == fieldVal){
          if(hideFieldBox == 'Yes' && fieldBox != ''){
            $("#"+fieldBox).hide();
          }
          $("#"+otherFieldBox).show();
        }else{
          $("#"+otherFieldBox).hide();
          for(var i=0;i<otherFieldArray.length;i++){
            $("#"+otherFieldArray[i]).val('');
          }
          if(hideFieldBox == 'Yes'  && fieldBox != ''){
            $("#"+fieldBox).show();
          }
        }
      
    }

    /** Function to revert list when clicked on revert icon **/
    function revertList(fieldBox,field,otherField,otherFieldBox){
      $("#"+fieldBox).show();
      $("#"+field).val('');
      $("#"+otherFieldBox).hide();
      $("#"+otherField).val('');
    }

    
    // display details of record if insured criminal record is yes
    $("#insured_criminal_record").on('change',function(){
      fieldOpenHide('insured_criminal_record','Yes','','details_of_record_box',['details_of_record'],'');
      /*var insured_criminal_record = $("#insured_criminal_record").val();
      if(insured_criminal_record == 'Yes'){
        $("#details_of_record_box").show();
      }else{
        $("#details_of_record_box").hide();
        $("#details_of_record").val(''); // empty value if user fill up anything with yes and then select no again
      }*/
    });


    // display other mailing address province field
    $("#mailing_address_province").on('change',function(){
      fieldOpenHide('mailing_address_province','other','mailing_address_provBox','mailing_address_provOtherBox',['mailing_address_province_other'],'Yes');
      /*var mailing_address_province = $("#mailing_address_province").val();
      if(mailing_address_province == 'other'){
        $("#mailing_address_provOtherBox").show();
        //$("#revertProvinceList").show();
        $("#mailing_address_provBox").hide();
      }else{
        $("#mailing_address_provBox").show();
        $("#mailing_address_provOtherBox").hide();
        //$("#revertProvinceList").hide();
        $("#mailing_address_province_other").val(''); // empty value if user fill up anything with yes and then select no again
      }*/
    });

    // click on revert list
    $("#revertProvinceList").on('click',function(){
      revertList('mailing_address_provBox','mailing_address_province','mailing_address_province_other','mailing_address_provOtherBox');
      /*$("#mailing_address_provBox").show();
      $("#mailing_address_province").val(''); // reset value of province field 
      $("#mailing_address_provOtherBox").hide();
      //$("#revertProvinceList").hide();
      $("#mailing_address_province_other").val(''); // empty value if user fill up anything with yes and then select no again*/
    });

    // display other mailing address province field
    $("#mailing_address_country").on('change',function(){
      fieldOpenHide('mailing_address_country','other','mailing_address_countryBox','mailing_address_countryOtherBox',['mailing_address_countryOther'],'Yes');
      /*var mailing_address_country = $("#mailing_address_country").val();
      if(mailing_address_country == 'other'){
        $("#mailing_address_countryOtherBox").show();
        //$("#revertContryList").show();
        $("#mailing_address_countryBox").hide();
      }else{
        $("#mailing_address_countryBox").show();
        $("#mailing_address_countryOtherBox").hide();
        //$("#revertContryList").hide();
        $("#mailing_address_countryOther").val(''); // empty value if user fill up anything with yes and then select no again
      }*/
    });

    // click on revert list
    $("#revertContryList").on('click',function(){
      revertList('mailing_address_countryBox','mailing_address_country','mailing_address_countryOther','mailing_address_countryOtherBox');
      /*$("#mailing_address_countryBox").show();
      $("#mailing_address_country").val(''); // reset value of province field 
      $("#mailing_address_countryOtherBox").hide();
      //$("#revertContryList").hide();
      $("#mailing_address_countryOther").val(''); // empty value if user fill up anything with yes and then select no again*/
    });

    // display other existing Insurer field
    $("#risk_address_existingInsurer").on('change',function(){
      fieldOpenHide('risk_address_existingInsurer','Other','risk_address_existingInsurerBox','risk_address_existingInsurerOtherBox',['risk_address_existingInsurerOther'],'Yes');
      /*var risk_address_existingInsurer = $("#risk_address_existingInsurer").val();
      if(risk_address_existingInsurer == 'Other'){
        $("#risk_address_existingInsurerOtherBox").show();
        //$("#revertExistingInsurerList").show();
        $("#risk_address_existingInsurerBox").hide();
      }else{
        $("#risk_address_existingInsurerBox").show();
        $("#risk_address_existingInsurerOtherBox").hide();
        //$("#revertExistingInsurerList").hide();
        $("#risk_address_existingInsurerOther").val(''); // empty value if user fill up anything with yes and then select no again
      }*/
    });

    // click on revert list existing insurer
    $("#revertExistingInsurerList").on('click',function(){
      revertList('risk_address_existingInsurerBox','risk_address_existingInsurer','risk_address_existingInsurerOther','risk_address_existingInsurerOtherBox');
      $/*("#risk_address_existingInsurerBox").show();
      $("#risk_address_existingInsurer").val(''); // reset value of province field 
      $("#risk_address_existingInsurerOtherBox").hide();
      //$("#revertExistingInsurerList").hide();
      $("#risk_address_existingInsurerOther").val(''); // empty value if user fill up anything with yes and then select no again*/
    });

    // display descrive use over 1 acre field
    $("#risk_address_lot_size").on('change',function(){
      fieldOpenHide('risk_address_lot_size','Over 1 Acre','','describeOver1Acre',['risk_address_describeOver1Acre'],'');
      /*var risk_address_lot_size = $("#risk_address_lot_size").val();
      if(risk_address_lot_size == 'Over 1 Acre'){
        $("#describeOver1Acre").show();
      }else{
        $("#describeOver1Acre").hide();
        $("#risk_address_describeOver1Acre").val(''); // empty value if user fill up anything with yes and then select no again
      }*/
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
      fieldOpenHide('risk_address_existingInsurerWillRenew','No','','risk_address_existingInsurerNonRenewalBox',['risk_address_existingInsurerNonRenewal'],'');
      /*var risk_address_existingInsurerWillRenew = $("#risk_address_existingInsurerWillRenew").val();
      if(risk_address_existingInsurerWillRenew == 'No'){
        $("#risk_address_existingInsurerNonRenewalBox").show();
      }else{
        $("#risk_address_existingInsurerNonRenewalBox").hide();
        $("#risk_address_existingInsurerNonRenewal").val(''); // empty value if user fill up anything with yes and then select no again
      }*/
    });

    // display attach details field for has insured cancelled insurance in risk address tab 
    $("#risk_address_hasInsuredCancelInsurance").on('change',function(){
      fieldOpenHide('risk_address_hasInsuredCancelInsurance','Yes','','risk_address_hasInsuredCancelInsuranceIfYesBox',['risk_address_hasInsuredCancelInsuranceIfYes'],'');
      /*var risk_address_hasInsuredCancelInsurance = $("#risk_address_hasInsuredCancelInsurance").val();
      if(risk_address_hasInsuredCancelInsurance == 'Yes'){
        $("#risk_address_hasInsuredCancelInsuranceIfYesBox").show();
      }else{
        $("#risk_address_hasInsuredCancelInsuranceIfYesBox").hide();
        $("#risk_address_hasInsuredCancelInsuranceIfYes").val(''); // empty value if user fill up anything with yes and then select no again
      }*/
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
      fieldOpenHide('risk_address_incidenceInClaim','Yes','','incidenceOfClaimBox',['risk_address_incidenceOfClaim_details','risk_address_incidenceOfClaim_type'],'');
      /*var risk_address_incidenceInClaim = $("#risk_address_incidenceInClaim").val();
      if(risk_address_incidenceInClaim == 'Yes'){
        $("#incidenceOfClaimBox").show();
      }else{
        $("#incidenceOfClaimBox").hide();
        $("#risk_address_incidenceOfClaim_details").val(''); // empty value if user fill up anything with yes and then select no again
        $("#risk_address_incidenceOfClaim_type").val(''); 
      }*/
    });

    // display describe field for commercial operations on premises on occupancy tab
    $("#occupancy_commercialOperations").on('change',function(){
      fieldOpenHide('occupancy_commercialOperations','Yes','','occupancy_commercialOperationsDescribeBox',['occupancy_commercialOperationsDescribe'],'');
      /*var occupancy_commercialOperations = $("#occupancy_commercialOperations").val();
      if(occupancy_commercialOperations == 'Yes'){
        $("#occupancy_commercialOperationsDescribeBox").show();
      }else{
        $("#occupancy_commercialOperationsDescribeBox").hide();
        $("#occupancy_commercialOperationsDescribe").val(''); // empty value if user fill up anything with yes and then select no again
      }*/
    });

    // display other specify field for Overall construction in building construction section on occupancy tab
    $("#buildingConstruction_overallConstruction").on('change',function(){
      fieldOpenHide('buildingConstruction_overallConstruction','Other','','buildingConstruction_overallConstructionOtherBox',['buildingConstruction_overallConstructionOther'],'');
      /*var buildingConstruction_overallConstruction = $("#buildingConstruction_overallConstruction").val();
      if(buildingConstruction_overallConstruction == 'Other'){
        $("#buildingConstruction_overallConstructionOtherBox").show();
      }else{
        $("#buildingConstruction_overallConstructionOtherBox").hide();
        $("#buildingConstruction_overallConstructionOther").val(''); // empty value if user fill up anything with yes and then select no again
      }*/
    });

    // display other specify field for area in sqft in building construction section on occupancy tab
    $("#buildingConstruction_area").on('change',function(){
      fieldOpenHide('buildingConstruction_area','4001 plus','','buildingConstruction_areaSpecifyBox',['buildingConstruction_areaSpecify'],'');
      /*var buildingConstruction_area = $("#buildingConstruction_area").val();
      if(buildingConstruction_area == '4001 plus'){
        $("#buildingConstruction_areaSpecifyBox").show();
      }else{
        $("#buildingConstruction_areaSpecifyBox").hide();
        $("#buildingConstruction_areaSpecify").val(''); // empty value if user fill up anything with yes and then select no again
      }*/
    });

    // hide sprinkler coverage field if sprinklers value none
    $("#fireAlarmDetectors_sprinklers").on('change',function(){
      //fieldOpenHide('fireAlarmDetectors_sprinklers','None','','sprinklersCoverageBox',['fireAlarmDetectors_sprinklerCoverage'],'');
      // we are not using above function due to opposite behaviour of box hiding 
      if($("#fireAlarmDetectors_sprinklers").val() == "None"){
        $("#sprinklersCoverageBox").hide();
      }else{
        $("#sprinklersCoverageBox").show();
        $("#fireAlarmDetectors_sprinklerCoverage").val('');
      }
    });

    // display are premises fenced and gated field for liability section in occupancy tab
    $("#liability_doesPremisesHavePool").on('change',function(){
      fieldOpenHide('liability_doesPremisesHavePool','Yes','','ifPremiseHasPoolBox',['liability_doesPremisesFenced'],'');
      /*var liability_doesPremisesHavePool = $("#liability_doesPremisesHavePool").val();
      if(liability_doesPremisesHavePool == 'Yes'){
        $("#ifPremiseHasPoolBox").show();
      }else{
        $("#ifPremiseHasPoolBox").hide();
        $("#liability_doesPremisesFenced").val(''); // empty value if user fill up anything with yes and then select no again
      }*/
    });

    // show broker survey if yes for how long for do you know applicant personally question
    $("#brokerSurvey_applicantPersonally").on('change',function(){
      fieldOpenHide('brokerSurvey_applicantPersonally','Yes','','ifYesApplicantPersonally',['brokerSurvey_applicantPersonally_HowLong'],'');
      /*var brokerSurvey_applicantPersonally = $("#brokerSurvey_applicantPersonally").val();
      if(brokerSurvey_applicantPersonally == 'Yes'){
        $("#ifYesApplicantPersonally").show();
      }else{
        $("#ifYesApplicantPersonally").hide();
        $("#brokerSurvey_applicantPersonally_HowLong").val(''); // empty value if user fill up anything with yes and then select no again
      }*/
    });

    // show broker survey If No, from whom and why for Did you receive the order direct from the Applicant question
    $("#brokerSurvey_OrderDirectApplicant").on('change',function(){
      fieldOpenHide('brokerSurvey_OrderDirectApplicant','No','','ifNoOrderDirectApplicant',['brokerSurvey_OrderDirectApplicantWhomWhy'],'');
      /*var brokerSurvey_OrderDirectApplicant = $("#brokerSurvey_OrderDirectApplicant").val();
      if(brokerSurvey_OrderDirectApplicant == 'No'){
        $("#ifNoOrderDirectApplicant").show();
      }else{
        $("#ifNoOrderDirectApplicant").hide();
        $("#brokerSurvey_OrderDirectApplicantWhomWhy").val(''); // empty value if user fill up anything with yes and then select no again
      }*/
    });

    // show broker survey If Yes, Which Coverages for Do you handle other Insurance for the Applicant question
    $("#brokerSurvey_handleOtherInsurance").on('change',function(){
      fieldOpenHide('brokerSurvey_handleOtherInsurance','Yes','','ifYesHandleOtherInsurance',['brokerSurvey_handleOtherInsuranceCoverages'],'');
      /*var brokerSurvey_handleOtherInsurance = $("#brokerSurvey_handleOtherInsurance").val();
      if(brokerSurvey_handleOtherInsurance == 'Yes'){
        $("#ifYesHandleOtherInsurance").show();
      }else{
        $("#ifYesHandleOtherInsurance").hide();
        $("#brokerSurvey_handleOtherInsuranceCoverages").val(''); // empty value if user fill up anything with yes and then select no again 
      }*/
    });

    // show broker survey If No, please explain for Do you recommend this risk in every Respecty question
    $("#brokerSurvey_recommandRisk").on('change',function(){
      fieldOpenHide('brokerSurvey_recommandRisk','No','','ifNoRecommandRisk',['brokerSurvey_recommandRiskExplain'],'');
      /*var brokerSurvey_recommandRisk = $("#brokerSurvey_recommandRisk").val();
      if(brokerSurvey_recommandRisk == 'No'){
        $("#ifNoRecommandRisk").show();
      }else{
        $("#ifNoRecommandRisk").hide();
        $("#brokerSurvey_recommandRiskExplain").val(''); // empty value if user fill up anything with yes and then select no again
      }*/
    });

    // show broker survey If yes, how long have you placed this risk for Is this risk a renewal to your office question
    $("#brokerSurvey_riskRenewalToOffice").on('change',function(){
      fieldOpenHide('brokerSurvey_riskRenewalToOffice','Yes','','ifYesRiskRenewalToOffice',['brokerSurvey_riskRenewalToOfficeHowLong'],'');
      /*var brokerSurvey_riskRenewalToOffice = $("#brokerSurvey_riskRenewalToOffice").val();
      if(brokerSurvey_riskRenewalToOffice == 'Yes'){
        $("#ifYesRiskRenewalToOffice").show();
      }else{
        $("#ifYesRiskRenewalToOffice").hide();
        $("#brokerSurvey_riskRenewalToOfficeHowLong").val(''); // empty value if user fill up anything with yes and then select no again
      }*/
    });

    // show describe for Are there any Rental Suites? in occupancy for ownerOccupied selection
    $("#occupancy_anyRentalSuites").on('change',function(){
      fieldOpenHide('occupancy_anyRentalSuites','Yes','','occupancy_anyRentalSuitesBox',['occupancy_anyRentalSuitesDescribe'],'');
      /*var occupancy_anyRentalSuites = $("#occupancy_anyRentalSuites").val();
      if(occupancy_anyRentalSuites == 'Yes'){
        $("#occupancy_anyRentalSuitesBox").show();
      }else{
        $("#occupancy_anyRentalSuitesBox").hide();
        $("#occupancy_anyRentalSuitesDescribe").val(''); // empty value if user fill up anything with yes and then select no again
      }*/
    });


    // when click on check box to check risk address is same as mailing address or not
    $("#sameAsMailingAddress").on('click',function(){
      checkSameAsMailingAddress();
    });
    

    // display existing insurance fields for Home Inspector
    $("#existingInsurance_currentlyInsured").on('change',function(){
      var existingInsurance_currentlyInsured = $("#existingInsurance_currentlyInsured").val();
      if(existingInsurance_currentlyInsured == 'Yes'){
        $(".eiBOX").show();
      }else{
        $(".eiBOX").hide();
        clearFields("eiBOX");
        $("#existingInsurance_termsAndConditions").val('');
      }
    });

    // display claimHistory_anyClaimsReportedOnUrBehalf for Home Inspector
    $("#claimHistory_anyClaimsReportedOnUrBehalf").on('change',function(){
      var claimHistory_anyClaimsReportedOnUrBehalf = $("#claimHistory_anyClaimsReportedOnUrBehalf").val();
      if(claimHistory_anyClaimsReportedOnUrBehalf == 'Yes'){
        $(".anyClaimReportedBox").show();
      }else{
        $(".anyClaimReportedBox").hide();
        $("#claimHistory_anyClaimsReportedFullDetails").val('');
        $("#claimHistory_anyClaimsToPreventSteps").val('');
      }
    });

    // display claimHistory_anyPolicyReportedOnUrBehalf fields for Home Inspector
    $("#claimHistory_anyPolicyReportedOnUrBehalf").on('change',function(){
      var claimHistory_anyPolicyReportedOnUrBehalf = $("#claimHistory_anyPolicyReportedOnUrBehalf").val();
      if(claimHistory_anyPolicyReportedOnUrBehalf == 'Yes'){
        $(".anyPolicyReportedBox").show();
      }else{
        $(".anyPolicyReportedBox").hide();
        $("#claimHistory_anyPolicyToPreventSteps").val('');
      }
    });

    // display existing insurance fields for Home Inspector
    $("#claimHistory_anyUnresolvedAct").on('change',function(){
      var claimHistory_anyUnresolvedAct = $("#claimHistory_anyUnresolvedAct").val();
      if(claimHistory_anyUnresolvedAct == 'Yes'){
        $(".anyUnresolvedActBox").show();
      }else{
        $(".anyUnresolvedActBox").hide();
        $("#claimHistory_anyUnresolvedActFullDetails").val('');
      }
    });

    // display ops_carryEmployerLiablityInsurance field on OPS Tab for Home Inspector
    $("#ops_carryEmployerLiablityInsurance").on('change',function(){
      var ops_carryEmployerLiablityInsurance = $("#ops_carryEmployerLiablityInsurance").val();
      if(ops_carryEmployerLiablityInsurance == 'Yes'){
        $(".carryEmployerLiablityInsuranceBOX").show();
      }else{
        $(".carryEmployerLiablityInsuranceBOX").hide();
        $("#ops_carryELInumberOccupationOfEmployees").val('');
      }
    });

    // display ops_coveredByWorkerCompensation field on OPS Tab for Home Inspector
    $("#ops_coveredByWorkerCompensation").on('change',function(){
      var ops_coveredByWorkerCompensation = $("#ops_coveredByWorkerCompensation").val();
      if(ops_coveredByWorkerCompensation == 'No'){
        $(".coveredByWorkerCompensationBOX").show();
      }else{
        $(".coveredByWorkerCompensationBOX").hide();
        $("#ops_coveredByWCnumberAndTypeOfEmployees").val('');
      }
    });

    // display ops_haveContractForServices field on OPS Tab for Home Inspector
    $("#ops_haveContractForServices").on('change',function(){
      var ops_haveContractForServices = $("#ops_haveContractForServices").val();
      if(ops_haveContractForServices == 'Yes'){
        $(".haveContractForServicesBOX").show();
      }else{
        $(".haveContractForServicesBOX").hide();
        $("#contractForServiceHI").val('');
      }
    });

    // display ops_haveSubContractors field on OPS Tab for Home Inspector
    $("#ops_haveSubContractors").on('change',function(){
      var ops_haveSubContractors = $("#ops_haveSubContractors").val();
      if(ops_haveSubContractors == 'Yes'){
        $(".haveSubContractorsBOX").show();
      }else{
        $(".haveSubContractorsBOX").hide();
        $("#ops_haveSubContractors_costOfSublet").val('');
        $("#ops_haveSubContractors_typeOfSublet").val('');
        $("#ops_haveSubContractors_harmlessAgreement").val('');
        $("#ops_haveSubContractors_askToCarryMinLiaInsurance").val('');
      }
    });

    // display ops_haveSubContractors_askToCarryMinLiaInsurance field on OPS Tab for Home Inspector
    $("#ops_haveSubContractors_askToCarryMinLiaInsurance").on('change',function(){
      var ops_haveSubContractors_askToCarryMinLiaInsurance = $("#ops_haveSubContractors_askToCarryMinLiaInsurance").val();
      if(ops_haveSubContractors_askToCarryMinLiaInsurance == 'Yes'){
        $(".minLiaInsuranceBOX").show();
      }else{
        $(".minLiaInsuranceBOX").hide();
        $("#ops_haveSubContractors_limitsMinCarryLiaIns").val('');
        $("#ops_haveSubContractors_perBillingsMinLiaIns").val('');
        $("#ops_haveSubContractors_additionalInsured").val('');
      }
    });

    // display ops_anyBranchOrSubsidiary field on OPS Tab for Home Inspector
    $("#ops_anyBranchOrSubsidiary").on('change',function(){
      var ops_anyBranchOrSubsidiary = $("#ops_anyBranchOrSubsidiary").val();
      if(ops_anyBranchOrSubsidiary == 'Yes'){
        $(".anyBranchOrSubsidiaryBOX").show();
      }else{
        $(".anyBranchOrSubsidiaryBOX").hide();
        $("#ops_anyBranchOrSubsidiary_nameAndDesc").val('');
      }
    });
    
    // display ops_radioactiveSamplingTesting field on OPS Tab for Home Inspector
    $("#ops_radioactiveSamplingTesting").on('change',function(){
      var ops_radioactiveSamplingTesting = $("#ops_radioactiveSamplingTesting").val();
      if(ops_radioactiveSamplingTesting == 'Yes'){
        $(".radioactiveSamplingTestingBOX").show();
      }else{
        $(".radioactiveSamplingTestingBOX").hide();
        $("#ops_radioactiveSamplingTesting_thirdPartyInsurance").val('');
      }
    });

    // check step number and if user click on final step then check broker code to display calculate button
    $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection) {
      // add min height to auto for smartwizard container
      $(".sw-container").css('min-height','auto');
        if((stepNumber == 6 && rtqFormGlobal != "homeInspector") || (stepNumber == 8 && rtqFormGlobal == "homeInspector")){
          console.log('final step');

          // disable next button when in final step
          $(".sw-btn-next").hide();

          /** OUIBOUNCE MODAL **/
          var _ouibounce = ouibounce(document.getElementById('ouibounce-modal'), {
            aggressive: true,
            sensitivity: 40,
            cookieExpire: 0,
            timer: 0 ,
            callback: function() { console.log('ouibounce fired!'); }
          });

          $('body').on('click', function() {
            $('#ouibounce-modal').hide();
          });

          $('#ouibounce-modal .modal-footer').on('click', function() {
            $('#ouibounce-modal').hide();
          });

          $('#ouibounce-modal .modal').on('click', function(e) {
            e.stopPropagation();
          });

          /** END OF OUIBOUNCE MODAL **/
          
          // get broker code
          var brokerCode = $.trim($('#broker_code').val());
          
          // empty review form everytime comes to final step to show new latest values
          $("#reviewForm").empty();
          // append processing text to review form  
          $("#reviewFormPT").text("Review form taking time to load ..."); 
          
            // check refer rules matching or not
            var formData = JSON.stringify($('#rtq_form').serializeArray());
            var rtqForm = $("#selectedForm").val();//$("#rtq_forms option:selected").val();
            //console.log(formData);
            $.ajax({
              url:"checkReferRules",
              method:"post",
              data: {formData:formData,rtqForm:rtqForm,_token:$('meta[name="csrf-token"]').attr('content')},
              datatype: 'json',
              success: function(msg){
                console.log(msg);
                
                // if there is broker code available
                if(brokerCode != '' && brokerCode != null){  
                  $("#reviewFormPT").text(""); 
                  
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
                    $("#doesCalculated").val('');
                    reviewForm();
                    $(".bindingBox").hide();
                    
  
                  }else if( msg.matchArray != '' && msg.valid !== "NotMatched"){
                    //console.log('brokerCode : '+brokerCode);
  
                    // display referValidationNotMatchBox
                    $("#referValidationNotMatchBox").show();
                    var html = "<p>This application requires an underwriter to review it. The reason(s) are listed below.</p>";
  
                    html += "<ul>";
                    $.each(msg.matchArray,function(k,v){
                      html += "<li>"+v+"</li>";
                    });
                    html += "</ul>";
                    $("#referValidationNotMatchBox").html(html);
  
                    $('#calculateBox').hide();
                    $("#doesCalculated").val('');
                    reviewForm();
                    $(".bindingBox").hide();
                    
                  }else{
                    console.log('valid == true');
                    // check broker code is valid or not
                    console.log("brokerCodeValidation "+brokerCodeValidation);
                    if(brokerCodeValidation){
                      $('#calculateBox').show();
                      $("#doesCalculated").val('quoted');
                      $(".bindingBox").show();
                    }else{
                      $('#calculateBox').hide();
                      $("#doesCalculated").val('');
                      $(".bindingBox").hide();
                    }
                    $("#referValidationNotMatchBox").hide();
                    $("#referValidationNotMatchBox").empty();
  
                    reviewForm();
                    
                    
                  }
                  
                  
                }else{
                  $("#reviewFormPT").text(""); 
                  reviewForm();
                  $('#calculateBox').hide();
                  $("#doesCalculated").val('');
                  $(".bindingBox").hide();
                  $(".binding").val('');
                  $("#referValidationNotMatchBox").hide();
                  $("#referValidationNotMatchBox").empty();
                }
                
                // This is common for all form [ if there are any file listing ]
                  if(msg.filesRequired != ''){
                      // display referValidationNotMatchBox
                      $("#filesRequiredBox").show();
                      var html = "<p>Underwriter might ask below documents after bind application :</p>";
  
                      html += "<ul>";
                      $.each(msg.filesRequired,function(k,v){
                        html += "<li>"+v+"</li>";
                      });
                      html += "</ul>";
                      $("#filesRequiredBox").html(html);
                    }else{
                      $("#filesRequiredBox").empty();
                      $("#filesRequiredBox").hide();
                    }
              },
              error: function(data){
                console.log(data);
              }
            });  
          

          
          $('#priceBox').empty();
          
        }else{
          // hide ouibounce modal
          $("#ouibounce-modal").hide();

          // hide previous button when on first step
          if(stepNumber == 0){
            //console.log('step : '+stepNumber);
            $(".sw-btn-prev").hide();
          }else{
            // if user on broker step check broker code
            if(stepNumber == 1){
              validateBroker();
            }
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
      
      $("#bindMsg").text("This application has been Bound.");
      // set bind status
      $("#bindStatus").val('Bound');
      
      displayConfirm();
    });

    // select binding value down one
    $("#bindingLower").on('click',function(e){
      e.preventDefault();
     
      $("#bindMsg").text("This application has been Bound.");
      // set bind status
      $("#bindStatus").val('Bound');
      displayConfirm();
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
      var rtqForm = $("#selectedForm").val();//$("#rtq_forms option:selected").val();

      if(rtqForm == "homeInspector"){
        var inspectionProv = $("#risk_address_provinceOfInspection").val();
        var cgl_cglLimitsOfLiablitiy = $("#cgl_cglLimitsOfLiablitiy").val();
        var cgl_eoLimitsOfLiablity = $("#cgl_eoLimitsOfLiablity").val();
        var ops_totalGrossAnnualReceipts = $("#ops_totalGrossAnnualReceipts").val();
        var cgl_deductible = $("#cgl_deductible").val();

        if(inspectionProv != '' && cgl_cglLimitsOfLiablitiy != '' && cgl_eoLimitsOfLiablity != '' && cgl_deductible != '')
        {
          $.ajax({
            url:"calculate",
            method:"post",
            data: {inspectionProv:inspectionProv,cgl_cglLimitsOfLiablitiy:cgl_cglLimitsOfLiablitiy,cgl_eoLimitsOfLiablity:cgl_eoLimitsOfLiablity,ops_totalGrossAnnualReceipts:ops_totalGrossAnnualReceipts,cgl_deductible:cgl_deductible,rtqForm:rtqForm,_token:$('meta[name="csrf-token"]').attr('content')},
            datatype: 'json',
            success: function(msg){
              
              msg = JSON.parse(msg);
              console.log(msg);
              
              $("#priceBox").empty();

              var table = "<table class='table table-bordered'> <tbody><tr><td>Premium</td><td><span style='width:50%;text-align:right;display:block;'>"+msg['premium']+"</span></td></tr><tr><td>Fee</td><td><span style='width:50%;text-align:right;display:block;'>"+msg['fees']+"</span></td></tr><tr class='totalRow'><td><b>Total</b></td><td><span style='width:50%;text-align:right;display:block;'><b>"+msg['total_value']+"</b></span></td></tr></tbody> </table>";
              $("#priceBox").html(table);
              
            },
            error: function(data){
              console.log(data);
            }
          });
        }else{
          swal('Some required fields are missing for calculation.');
        }

            
              
      }else if(rtqForm == "rentedDwelling" || rtqForm == "ownerOccupied"){
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
      }
    });

    
  /**
   Finish button will gather all form data in json format and send it to controller to process
  **/
  $("#finish").on('click',function(){
    
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

      var rtqForm = $("#selectedForm").val();//$("#rtq_forms option:selected").val();

      $(".loader").show(); 
      finishClicked = true;
      clicked = true;

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
              window.location.href='/rtqform';
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
    $.each($(".step-anchor li"),function(k,v){
      if($(this).hasClass('done')){
        if($(this).find('a').attr("href") == "#legal"){
          // do nothing
        }else{
          var tabId = $(this).find('a').attr("href");
          tabId = tabId.replace("#", "");
          reviewDataByStep(tabId);
          console.log("Data loaded of tab : "+tabId);
        }
      }
    });


   /* reviewDataByStep('tab-1');
    reviewDataByStep('tab-2');
    reviewDataByStep('tab-3');
    reviewDataByStep('tab-4');
    reviewDataByStep('tab-5');*/

    
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
      if($(this).parent('div').css('display')!= 'none' && $(this).closest('div').parent('div').css('display') != 'none' && $(this).closest('div').parent('div').css('visibility') != 'hidden' && $(this).parent('div').css('visibility') != 'hidden'){
        // add label 
        //console.log($(this).text()+"   "+$(this).next('div').children().is("input[type=checkbox]"));
        if($(this).next().is("input[type=checkbox]")){
          //do nothing if simple checkbox
          
        }else if($(this).next('div').children().is("input[type=checkbox]")){
          // if checkbox is switch -- currently included in HomeInspector Form

          html += "<td style='width:60%;'>"+$(this).text()+"</td>";
          
          // if checked
          if($(this).next('div').find("input[type=checkbox]").prop('checked')){
            html += "<td  style='width:40%;'> Same as mailing address </td>";
          }else{
            html += "<td  style='width:40%;'> No </td>";

          }
          //console.log('checkbox '+$(this).next('div').find("input[type=checkbox]").prop('checked'));

        }else{
          // check if label field is with any input, select or textarea [ NOTE : checkbox switch create label only field for value YES and NO ]
          if($(this).next().is('input') || $(this).next().is('textarea') || $(this).next().is('select') ){
            // for checkbox switch only [ if mailing address and risk address on same page, to avoid confusion on label ] 
            //console.log($(this).text()+"    "+$(this).parent('div').hasClass('riskAddressBOX'));
            if($(this).parent('div').hasClass('riskAddressBOX')){
              html += "<td style='width:60%;'><b>Risk Address :</b> "+$(this).text()+"</td>";
            }else{
              html += "<td style='width:60%;'>"+$(this).text()+"</td>";    
            }
          }          
          
          // check element is input
          if($(this).next().is('input')){
            html += "<td  style='width:40%;'>"+$(this).next('input').val()+"</td>";
          }
          // check element is textarea
          if($(this).next().is('textarea')){
            html += "<td  style='width:40%; white-space: pre-wrap'>"+$(this).next('textarea').val()+"</td>";
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

  // when click on both confirm button
  $("#submitOnlyUp,#submitOnlyLow").on('click',function(event){
    event.preventDefault();
    if($(".bindingBox").css('display') != 'none'){
      $("#bindStatus").val('Quoted');
      $("#bindMsg").text("This application has not been Bound.");
    }else{
      $("#bindStatus").val('');
      $("#bindMsg").text('');
    }
    displayConfirm();
  });

  /** Function to show confirm page **/
  function displayConfirm(){
    //scroll window to top
    window.scrollTo(0, 0);
        
    $(".confirmSection").show();
    // hide previous button on confirmation page 
    $(".sw-btn-prev").hide();
    // set min-height auto to smartwizard container ; NOTE: sometime it shows length of review form on confirmation page which looks space in bottom
    $(".sw-container").css('min-height','auto');
    $(".finalSection").hide();
  }

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
        clicked = true;
        resetFunction('reset');
        $(".loader").show();
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
      var doesCalculated = $("#doesCalculated").val();
      var referNotMatchReason;
      var requiredError = '';
      // check if all required fields are filled up or not
      $.each($('.required'), function( key, value ) {
        if($(this).css("visibility") == "hidden" || $(this).css('display') == 'none' || $(this).closest('div').parent('div').css('display') == 'none' || $(this).parent('div').css('display') == 'none'){
          // do nothing
        }else{
          // check if all required fields are correct and there is no error
          var total_error = $(this).prev('label').find('.err2').length;
          console.log(total_error);
          if (total_error > 0 ) { 
            requiredError = true; 
            return false; 
          } else {
            requiredError = false;
          } 
          
        }
      });
      //console.log(requiredError); return false ;
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

      var rtqForm = $("#selectedForm").val();//$("#rtq_forms option:selected").val();

      if(abandonStatus == "windowClose" && abandonStatus == "reset"){
        $(".loader").show(); 
      }else{
        $(".loader").hide(); 
      }

      setTimeout(function(){  },2000);
      $.ajax({
        url:"resetForm",
        method:"post",
        async: true,
        data: {formData:formData,rtqForm:rtqForm,noOfMortgageesArray:noOfMortgageesArray,noOfClaimsArray:noOfClaimsArray,binding:binding,referNotMatchReason:referNotMatchReason,abandonStatus:abandonStatus,doesCalculated:doesCalculated,requiredError:requiredError, _token:$('meta[name="csrf-token"]').attr('content')},
        datatype: 'json',
        success: function(msg){
          console.log(msg);
          clicked = true;
           //return false; 
          if(abandonStatus == "reset"){
            $(".loader").hide();
            // to make reset, make clicked = true and send location to root
            window.location.href='/rtqform';
          }else if(abandonStatus == "windowClose"){
            $(".loader").hide(); 
            //clicked = true;
            window.location.href='/rtqform';
          }else{
            //clicked = true;
          }
        },
        error: function(data){
          console.log(data);
        }
      });
  }

});

