$(document).ready(function(){

  //activare boostrap select
     // $('.selectpicker').selectpicker();
     $('.selectpicker').selectpicker();
  /*  $( function() {
    $.widget( "custom.combobox", {
      _create: function() {
        this.wrapper = $( "<span>" )
          .addClass( "custom-combobox" )
          .insertAfter( this.element );
 
        this.element.hide();
        this._createAutocomplete();
        this._createShowAllButton();
      },
 
      _createAutocomplete: function() {
        var selected = this.element.children( ":selected" ),
          value = selected.val() ? selected.text() : "";
 
        this.input = $( "<input>" )
          .appendTo( this.wrapper )
          .val( value )
          .attr( "title", "" )
          .addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
          .autocomplete({
            delay: 0,
            minLength: 0,
            source: $.proxy( this, "_source" )
          })
          .tooltip({
            classes: {
              "ui-tooltip": "ui-state-highlight"
            }
          });
 
        this._on( this.input, {
          autocompleteselect: function( event, ui ) {
            ui.item.option.selected = true;
            this._trigger( "select", event, {
              item: ui.item.option
            });
          },
 
          autocompletechange: "_removeIfInvalid"
        });
      },
 
      _createShowAllButton: function() {
        var input = this.input,
          wasOpen = false;
 
        $( "<a>" )
          .attr( "tabIndex", -1 )
          .attr( "title", "Show All Items" )
          .tooltip()
          .appendTo( this.wrapper )
          .button({
            icons: {
              primary: "ui-icon-triangle-1-s"
            },
            text: false
          })
          .removeClass( "ui-corner-all" )
          .addClass( "custom-combobox-toggle ui-corner-right" )
          .on( "mousedown", function() {
            wasOpen = input.autocomplete( "widget" ).is( ":visible" );
          })
          .on( "click", function() {
            input.trigger( "focus" );
 
            // Close if already visible
            if ( wasOpen ) {
              return;
            }
 
            // Pass empty string as value to search for, displaying all results
            input.autocomplete( "search", "" );
          });
      },
 
      _source: function( request, response ) {
        var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
        response( this.element.children( "option" ).map(function() {
          var text = $( this ).text();
          if ( this.value && ( !request.term || matcher.test(text) ) )
            return {
              label: text,
              value: text,
              option: this
            };
        }) );
      },
 
      _removeIfInvalid: function( event, ui ) {
 
        // Selected an item, nothing to do
        if ( ui.item ) {
          return;
        }
 
        // Search for a match (case-insensitive)
        var value = this.input.val(),
          valueLowerCase = value.toLowerCase(),
          valid = false;
        this.element.children( "option" ).each(function() {
          if ( $( this ).text().toLowerCase() === valueLowerCase ) {
            this.selected = valid = true;
            return false;
          }
        });
 
        // Found a match, nothing to do
        if ( valid ) {
          return;
        }
 
        // Remove invalid value
        this.input
          .val( "" )
          .attr( "title", value + " didn't match any item" )
          .tooltip( "open" );
        this.element.val( "" );
        this._delay(function() {
          this.input.tooltip( "close" ).attr( "title", "" );
        }, 2500 );
        this.input.autocomplete( "instance" ).term = "";
      },
 
      _destroy: function() {
        this.wrapper.remove();
        this.element.show();
      }
    });
 
    $( ".combobox" ).combobox();
   /* $( "#toggle" ).on( "click", function() {
      $( ".combobox" ).toggle();
    });*/
  /*} );*/

// ######################                             Motor Truck Cargo js                                                           #####################
// 
$('input[type=number]').on('mousewheel', function(e) {
  $(e.target).blur();
});

$('.powerUnits').blur(function(){
  var ownedTotal = 0;
  var non_ownedTotal = 0;
  $('.ownedPowerUnits').each(function(){
    if($(this).val()) {
      ownedTotal = ownedTotal + parseInt($(this).val());
    }
  });

  $('.non_ownedPowerUnits').each(function(){
    if($(this).val()) {
      non_ownedTotal = non_ownedTotal+ parseInt($(this).val());
    }
  });

  $("#ownedTotalPowerUnits").val(ownedTotal);
  $("#non_ownedTotalPowerUnits").val(non_ownedTotal);
});

$('.trailerUnits').blur(function(){
  var ownedTotal = 0;
  var non_ownedTotal = 0;

  $('.ownedTrailers').each(function(){
    if($(this).val()){
      ownedTotal = ownedTotal + parseInt($(this).val());
    }
  });

  $('.ownedTrailers').each(function(){
    if($(this).val()){
      non_ownedTotal = non_ownedTotal + parseInt($(this).val());
    }
  });
  $("#ownedTotalTrailers").val(ownedTotal);
  $("#non_ownedTotalTrailers").val(non_ownedTotal);
});

$('#addItemBox').on('click',(e)=>{
  e.preventDefault();
  var counter = $("#VehicleCount").val();
  // var check = $('#new_sections_xyz').clone();
  $('#new_sections_xyz').clone().attr('id','new_sections_'+ counter).appendTo('.new_sections');
  var c = document.getElementById('new_sections_'+counter);
  //remove display:none from cloned object.
  c.style.display = '';
  changeCloneId(c.children,counter);
  counter = parseInt(counter)+1;
  $("#VehicleCount").val(counter);
});

$('#removeItemBox').on('click',(e)=>{
  e.preventDefault();
  var counter = $("#VehicleCount").val();
  if (parseInt(counter) > 1) {
    counter = parseInt(counter)-1;
    $('#new_sections_' + counter).remove();
    $("#VehicleCount").val(counter);
  }
});
// For assignedShipment list
$('#addParticulaShipperBox').on('click',(e)=>{
  e.preventDefault();
  var counter = $("#particulaShipperCount").val();
  $("#new_shipper_xyz").clone().attr("id","new_shipper_"+counter).appendTo('.new_shipper');
  var c = document.getElementById('new_shipper_'+counter);
  c.style.display='';
  changeCloneId(c.children,counter);
  counter = parseInt(counter)+1;
  $("#particulaShipperCount").val(counter);
});

$("#removeParticulaShipperBox").on('click',(e)=>{
  e.preventDefault();
  var counter = $("#particulaShipperCount").val();
  if (parseInt(counter) > 1) {
    counter = parseInt(counter)-1;
    $("#new_shipper_" + counter).remove();
    $("#particulaShipperCount").val(counter);
  }
});
// For terminal List
$("#addTerminalBox").on('click',(e)=>{
  e.preventDefault();
  var counter =$("#terminalCount").val();
  $("#new_terminal_xyz").clone().attr('id','new_terminal_' + counter).appendTo('.new_terminal');
  var c = document.getElementById('new_terminal_'+counter);
  c.style.display = '';
  changeCloneId(c.children,counter);
  counter = parseInt(counter)+1;
  $("#terminalCount").val(counter);
});

$("#removeTerminalBox").on("click", (e)=>{
  e.preventDefault();
  var counter = $("#terminalCount").val();
  if (parseInt(counter) > 1) {
    counter = parseInt(counter)-1;
    $("#new_terminal_" + counter).remove();
    $("#terminalCount").val(counter);
  }
});

// save button on commoodity Modal adds to table form
$('#commoditySubmit').on('click',(function(e){
  $("#commodityTableList").empty();
  e.preventDefault();
  $(".commodityList").each(function(index){
    var type = $(this).attr('id');
    var typeColor;
    switch (type) {
      case 'target':
      typeColor = 'badge-danger';
      break;
      case 'nonTarget':
      typeColor = 'badge-warning';
      break;
      default:
      typeColor = 'badge-secondary';
    }
    var data = $("form#"+$(this).attr('id')).serializeArray();
    $.each(data,function(index) {
      var value = this.name;
      var name = $("#"+value).text();
      var rowItemHtml = `<tr>
                              <th scope="row">${name}</th>
                              <td><input min="0" id="${value}Percentage" type="number" name="${value}Percentage"></td>
                              <td><input min="0" id="${value}AvgPerLoad" type="number" name="${value}AvgPerLoad"></td>
                              <td><input min="0" id="${value}MaxPerLoad" type="number" name="${value}MaxPerLoad"></td>
                              <td><input type="hidden" value="${value}"><span class="badge ${typeColor}"><input type="hidden" value="${type}">${type}</span></td>
                          </tr>`;
    $("#commodityTableList").append(rowItemHtml);
    });
  });
  // console.log($("form#target").serializeArray());
}));

// not used commodity select change to a modal radio selection START
$('#commoditySelect').on('change',function (){
  var selectedVal = $('#commoditySelect').val();
  if (selectedVal) {
    
    var selectedId = $(this).find(":selected").attr("id");
    // console.log(selectedId);
    var rowHtml = `<tr>
                        <th scope="row">${selectedVal}</th>
                        <td><input min="0" id="" type="number" name=""></td>
                        <td><input min="0" id="" type="number" name=""></td>
                        <td><input min="0" id="" type="number" name=""></td>
                        <td><input type="hidden" value="${selectedId}"><button type="button" class="btn btn-danger commodityRemove"><i class="fa fa-trash fa-lg" data-toggle="tooltip" title="Remove"></i></button></td>
                      </tr>`;
    $('#commodityTable').append(rowHtml);
    $('#'+selectedId).attr('disabled',true);
  }
});
$(document).on('click','.commodityRemove',function(){
  $(this).closest("tr").remove();
  $("#" + $(this).siblings("input:hidden").val()).attr('disabled',false);
  $("#defaultSelect").prop("selected",true);
//
});
// not used commodity select changed to a modal radio selection END
//assignedParticularShipper
$("input[type=radio][name=assignedParticularShipper]").on('change',function(){
      var assignedParticularShipper = this.value;
  
      toggleInput(assignedParticularShipper,"particularShipperList");
});
//
$("input[type=radio][name=vehiclesUnlocked]").on('change',function(){
      var vehiclesUnlocked = this.value;
     
      toggleInput(vehiclesUnlocked,"secuirtyMessures");
});

$("input[type=radio][name=mvr]").on('change',function(){
      var mvr = this.value;
     
      toggleInput(mvr,"MVR");
});

$("input[type=radio][name=trailerDetached]").on('change',function(){
      var trailerDetached = this.value;
      
      toggleInput(trailerDetached,"detachTralierReason");
});

$("input[type=radio][name=fridgeBreakdownEndorsement]").on('change',function(){
  var fridgeBreakdownEndorsement = this.value;

  toggleInput(fridgeBreakdownEndorsement, 'fridgeBreakdownDetail');
});

$("input[type=radio][name=riggersEndorsement]").on('change',function(){
  var riggersEndorsement = this.value;

  toggleInput(riggersEndorsement, 'riggersEndorsementDetail');
});

$("input[type=radio][name=contingentTransitEndorsement]").on('change',function(){
  var contingentTransitEndorsement = this.value;

  toggleInput(contingentTransitEndorsement, 'contingentTransitEndorsementDetail');
});

$("input[type=radio][name=unattendedTruckEndorsement]").on('change',function(){
  var unattendedTruckEndorsement = this.value;

  toggleInput(unattendedTruckEndorsement, 'unattendedTruckEndorsementDetail');
});

$("input[type=radio][name=earnedFreightEndorsement]").on('change',function(){
  var earnedFreightEndorsement = this.value;

  toggleInput(earnedFreightEndorsement, 'earnedFreightEndorsementDetail');
});

$("input[type=radio][name=debrisRemovalEndorsement]").on('change',function(){
  var debrisRemovalEndorsement = this.value;

  toggleInput(debrisRemovalEndorsement, 'debrisRemovalEndorsementDetail');
});

$("input[type=radio][name=lTLEndorsement]").on('change',function(){
  var lTLEndorsement = this.value;

  toggleInput(lTLEndorsement, 'lTLEndorsementDetail');
});

$("input[type=radio][name=fullPremiumEndorsement]").on('change',function(){
  var fullPremiumEndorsement = this.value;

  toggleInput(fullPremiumEndorsement, 'fullPremiumEndorsementDetail');
});

$("input[type=radio][name=trailerInterchargeEndorsement]").on('change',function(){
  var trailerInterchargeEndorsement = this.value;

  toggleInput(trailerInterchargeEndorsement, 'trailerInterchargeEndorsementDetail');
});

$("input[type=radio][name=temperatureEndorsement]").on('change',function(){
  var temperatureEndorsement = this.value;

  toggleInput(temperatureEndorsement, 'temperatureEndorsementDetail');
});

var toggleInput = (value,toggleClass)=>{
// this function hide/show the radios that are toggle fields base on selection
  if(value == 'Yes'){
    $("." + toggleClass).show();
  }else{
    $("." + toggleClass).hide();
    if(toggleClass != "MVR"){
      clearFields(toggleClass);
    }
  }
}
//checks adds up to 100% idea write a universal function that checks the fields if it adds to 100% or not maybe takes an object
var checkOneHundred = (object)=>{
  // for (var i = 0; i < object.length; i++) {

  // }
}

//change the id of childeren for cloned objects (only changes first child in the tree non recursive)
var changeCloneId = (object, counter)=>{
  console.log(counter);
  for (var i = 0; i < object.length; i++) {
    if(object[i].id){
      object[i].id = object[i].id.replace("xyz",counter);
      object[i].name = object[i].name.replace("xyz",counter);
    }
  }
}

// function deleteCommodity (object){
//   console.log(object);
// }

$(".highlightOnClick").on('click', function(){
  $(this).select();
});
// ######################                             Motor Truck Cargo js                                                           #####################

$("#crime_type").on('click',function(){
  var crime_type = this.value;
  
  if(crime_type === "Broad Form Money & Securities" ){
  $("#broad_form_money").show();
  $("#employee_dishonesty").show();
  $("#inside_robbery").hide();
  $("#outside_robbery").hide();
  $("#comprehensive_rider").hide();
  }else if(crime_type === "Inside Robbery"){
  $("#broad_form_money").hide();
  $("#employee_dishonesty").hide();
  $("#inside_robbery").show();
  $("#outside_robbery").show();
  $("#comprehensive_rider").hide()
  }else if(crime_type === "Comprehensive 3D rider"){
  $("#broad_form_money").hide();
  $("#employee_dishonesty").hide();
  $("#inside_robbery").hide();
  $("#outside_robbery").hide();
  $("#comprehensive_rider").show()
  }
});

  // display describe field for commercial operations on premises on occupancy tab
    $("input[type=radio][name=profit_grossEarning_toggle]").on('change',function(){
    //$("#occupancy_commercialOperations").on('change',function(){
      //fieldOpenHide('occupancy_commercialOperations','Yes','','occupancy_commercialOperationsDescribeBox',['occupancy_commercialOperationsDescribe'],'');
      var profit_grossEarning_toggle = this.value;
      console.log(profit_grossEarning_toggle);
      
      if(profit_grossEarning_toggle == 'profit_toggle'){
       // $("#coverage_profits").show();
        $( "#coverage_profits" ).prop( "disabled", false );
        $( "#coverage_grossEarnings" ).prop( "disabled", true );
        $( "#coverage_grossEarnings" ).val("");
        $("#ifcoverageGrossEarningsLimitBox").hide();
      }else{
       $( "#coverage_grossEarnings" ).prop( "disabled", false );
       $( "#coverage_profits" ).prop( "disabled", true );
        $( "#coverage_profits" ).val("");
       
      }
    });

 function checkbox() {
    if(this.is(":checked")){
      this.checked = true;
    }else{
       this.checked = false;
    }
  }
  var clicked = false;
  var resetClicked = false;
  var finishClicked = false;
  var closeWindowModal = false;

  var brokerCodeValidation = false;

  // GET FORM PREFIX
  var formPrefix = $("#formPrefix").val();

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

  /** HELP POPUP **/
  $("#openHelp").on('click',function(){
    $("#helpBox").show();
    $("#openHelp").hide();
    $("#closeHelp").show();
    getMeanings();
  });
  $("#closeHelp").on('click',function(){
    $("#helpBox").hide();
    $("#openHelp").show();
    $("#closeHelp").hide();
  });
  

  function getMeanings(){
    // show loader
    $(".loaderHelp").show();
    var tabId = '';
    $.each($(".step-anchor li"),function(k,v){
      if($(this).hasClass('active')){
        tabId += $(this).find('a').attr("href");
        tabId = tabId.substring(1, tabId.length); // remove # sign from id
        //console.log(tabId);
        return false;
        
      }
    });    

    if(tabId != ''){
        // get meanings
        var meanings = $.trim($("#meaning-"+tabId).html());
        //console.log("Meaning : "+meanings);
        if(meanings == '' || meanings == "undefined"){
          $("#showMeanings").html('<h6>No Meanings Available.</h6>');
        }else{
          $("#showMeanings").html(meanings);  
        }
        
        $("#showMeanings").show();
        $(".loaderHelp").hide();
    }
  }
  /******HELP POPUP END******/

  // Activate subforms tabs
  $( "#tabs" ).tabs();

  /** BEFOREUNLOAD METHOD **/
  $(window).bind('beforeunload', function () {
    /*console.log(activeStay);
    activeStay = false;*/
      //console.log('clicked '+clicked);
      // block user to refresh page by pressing F5 key or ctl+R key
      if(!clicked) {
       // console.log('Manual refresh will not work');
        //resetFunction('leavingPage');
        return "Leaving page might loose data";
      }
  });
  /** END OF BEFOREUNLOAD METHOD **/
  /** UNLOAD METHOD **/
  $(window).bind('unload', function (e) {
    clicked = true;
    //console.log('clickedunload '+clicked);
    //console.log("resetClicked "+resetClicked +" finishClicked "+finishClicked);
    if(resetClicked || finishClicked || closeWindowModal ){
      // do nothing
      //remove cookies
      Cookies.remove('loadedForm');
      
    }else{
      resetFunction('leavingPage',e);
    }
    
    
      // set 2 sec time to get all form data and sending back to AMF
      setTimeout(function(){  },2000);
      //console.log('Leaving');
  });
  /** END OF UNLOAD METHOD **/
  

  /** CLOSE WINDOW BUTTON CLICK **/
  $("#closeWindow").on('click',function(e){
    // disable button until process done
    $("#closeWindow").attr('disabled','true');

    closeWindowModal = true;
    clicked = true;
    resetFunction('windowClose',e);
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
  //console.log(info);
  switch (info) {
    /*case 'agree':
      //$('.sw-btn-next').removeAttr('disabled');
      $('.sw-btn-next').show();
      $("#agreeDisagreeError").hide();
      
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
  $.each($("."+fieldID).find('textarea'),function(k,v){
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
    $("#risk_address_country").val('');

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
    $("#risk_address_country").val($("#mailing_address_country").val());

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
      if(rtqForm == "homeInspector" || rtqForm == "dayCare"){
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
     // console.log($(this))
      if($(this).closest('section').not('.subformSection').is(":hidden")
       || $(this).css("visibility") == "hidden" || $(this).css('display') == 'none'
        || $(this).closest('div').parent('div').css('display') == 'none'  || $(this).parent('div').css('display') == 'none'){
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
           // console.log(emailReg.test( $(this).val() ));
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
      /*if($(this).is(":hidden")){
        console.log($(this).attr('name'));
      }*/
      if($(this).closest('section').not('.subformSection').is(":hidden") || $(this).css("visibility") == "hidden" || $(this).css('display') == 'none' || $(this).closest('div').parent('div').css('display') == 'none'  || $(this).parent('div').css('display') == 'none'){
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
     $.each( $(anchorObject.attr('href')).find('div.radio_group'), function( key, value ) {
      if( $(this).hasClass("required") ){
      var name = $(this).find("input[type=radio]").attr('name');

        if($(this).parent().parent().css('display') == 'none' || $(this).parent().css('display') == 'none'){
            console.log("test in");
           $(this).parent().find('label').find("span.err").removeClass('err2');
           
            $(this).find("span.radio_error").hide();
          }else{
              if(typeof  $("input[name='"+name+"']:checked").val() ===  "undefined"){
              $(this).prev('label').parent().find('label').find("span.err").addClass('err2');
              $(this).find("span.radio_error").show();
              // $(this).addClass('radio_border');
            }else{
               $(this).prev('label').parent().find('label').find("span.err").removeClass('err2');
                //$(this).removeClass('invalid');
                //$(this).removeClass('radio_border');
                $(this).find("span.radio_error").hide();
            }
          }     
        }

       });



    //checks valid on leave field - all required fields
    $.each( $(anchorObject.attr('href')).find('textarea.required'), function( key, value ) {
     // console.log($(this))
      if($(this).closest('section').not('.subformSection').is(":hidden")
       || $(this).css("visibility") == "hidden" || $(this).css('display') == 'none'
        || $(this).closest('div').parent('div').css('display') == 'none'  || $(this).parent('div').css('display') == 'none'){
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

    /*$('#myform').validate({
    // other options,
    rules: {
        radioname: { // <- NAME of every radio in the same group
            required: true
        }
    }
});*/

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

    // SHOW/HIDE ERROR MESSAGE FOR REQUIRED FIELD FOR SUB FORM - Plumbing 
    if( rtqForm == "plumbing"){
      showSubformErrorMSG('coverage_CEF','subformCEF');  
    }

      
    // below code will add and remove red steps based on required fields filled up or not
    $.when(e).then(function() {
    
    var select_error = parseInt($(anchorObject.attr('href')).find('div.radio_group').parent().find('label').find('.err2').size());
    //console.log(select_error);
    /*console.log(parseInt($(anchorObject.attr('href')).find('input.required').prev('label').find('.err2').length));
    console.log(parseInt($(anchorObject.attr('href')).find('textarea.required').prev('label').find('.err2').length));
    console.log(parseInt($(anchorObject.attr('href')).find('select.required').prev('label').find('.err2').length));
    console.log(select_error);
*/
    var total_error = 0;
    total_error = parseInt($(anchorObject.attr('href')).find('input.required').prev('label').find('.err2').length)
    +parseInt($(anchorObject.attr('href')).find('textarea.required').prev('label').find('.err2').length)
    +parseInt($(anchorObject.attr('href')).find('select.required').prev('label').find('.err2').length)
    +select_error;
    //console.log(total_error);
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

   /** Allow only valid texts **/

  $.each($('input'), function( key, value ) {
    if(($(this).hasClass('onlyNumbers') || $(this).hasClass('onlyNumbersAndLetters') || $(this).hasClass('commaValues') || $(this).hasClass('allow_decimal') || $(this).hasClass('checkYear') || $(this).hasClass('checkEmail') || $(this).hasClass('checkPhone') || $(this).hasClass('checkPercentage') || $(this).hasClass('datepicker')) || ($(this).attr('type') == "hidden" || $(this).attr('type') == "radio" || $(this).attr('type') == "checkbox" || $(this).attr('type') == "number")){
      // do nothing
    }else{
      //console.log($(this).attr('id'));
      $(this).addClass('onlyValidText');
    }
  });

  /**********************/

  /** only alphanumeric and some specific character allowed to input in some of field
    ^ - start of string
    (?!\d+$) - the negative lookahead that fails the match if a string is numeric only
    (?:[a-zA-Z0-9][a-zA-Z0-9 @&$]*)? - an optional sequence of:
        [a-zA-Z0-9] - a digit or a letter
        [a-zA-Z0-9 @&$]* - 0+ digits, letters, spaces, @, & or $ chars
    $ - end of string.
  **/
  $(".onlyValidText").on("keypress", function(e){
      var keyCode = e.which;
      /*
        65-90 A-Z
        97-122 a-z
        127 delete button
        32 spacebar
        44 comma 
        47 backslash
        38 &
        46 dot
        39 single quote '
        dash - 45
        48-57 - (0-9)Numbers
      */
      //var allowedCharacter = [65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,97,98,99,100,101,102,103,104,105,106,107,108,109,110,111,112,113,114,115,116,117,118,119,120,121,122,32,127,44,47,38,39,45,48,49,50,51,52,53,54,55,56,57];
      var allowedCharacter = [32,127,44,47,38,39,45,46];
      if ( (!(keyCode >= 48 && keyCode <= 57)) && (!(keyCode >= 65 && keyCode <= 90)) && (!(keyCode >= 97 && keyCode <= 122)) && jQuery.inArray(keyCode,allowedCharacter) == -1) { 
        return false;
      }
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
  
  /*** Allow decimal ***/
  
  // allow only decimal with only two digit after dot
  // $(".allow_decimal").on("input", function(evt) {
  //   var self = $(this);
  //   self.val(self.val().replace(/[^0-9\.]/g, ''));
  //   if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57)) 
  //   {
  //     evt.preventDefault();
  //   }
  // });
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

  /*** END OF allow decimal ***/

  /*** MAKE COMMA AFTER EVERY THREE DIGITS ***/
  function commaSeparateNumber(val){
    while (/(\d+)(\d{3})/.test(val.toString())){
      val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
    }
    return val;
  }

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


        // check valid email
    $(document).on("focusout", ".postalcodeValidation", function(){
      var input_val = $.trim($(this).val() );
      if(input_val != ''){
        var is_success = validate_postal(input_val); 

        if(!is_success){
          $(this).addClass('invalid');
          $(this).parent('div').find('.validPostalError').show();
          $(".sw-btn-prev").attr('disabled','true');
          $(".sw-btn-next").attr('disabled','true');
        }else{
          $(this).removeClass('invalid'); 
          $(this).parent('div').find('.validPostalError').hide();
          $(".sw-btn-prev").removeAttr('disabled');
          $(".sw-btn-next").removeAttr('disabled');
        }
      }else{ // remove invalid class if added before and value is empty
          $(this).removeClass('invalid'); 
          $(this).parent('div').find('.validPostalError').hide();
          $(".sw-btn-prev").removeAttr('disabled');
          $(".sw-btn-next").removeAttr('disabled');
        }
    });
    var validate_postal = function(postal){
      var pattern =/^\d{5}(-\d{4})?$/;
      var pattern2 = /^[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d$/;
      //console.log(postal.match(pattern));
      var is_postal_valid = false;
      if(postal.match(pattern) != null){
        is_postal_valid = true;
      }
      if(postal.match(pattern2) != null){
        is_postal_valid = true;
      }
      return is_postal_valid;
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
      var producer_email = $.trim($("#broker_producer_email").val());
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
                //$("#bcMsg").text("Broker code is not valid. Please contact AM Fredericks.");
                openEmailNotValidBrokerCode(brokerCode,producer_email);
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
                openEmailNotValidBrokerCode(brokerCode,producer_email);

                setTimeout(function(){ 

                  
                },1000);

                //$("#bcMsg").text("Broker code is not validate with our system. Please contact AM Fredericks.");
                $(".sw-btn-next").removeAttr('disabled');
              }

            }else if(msg == "Not available"){
              $("#bcMsg").show();
              //$("#bcMsg").text("This broker code is not available in our system.");
              openEmailNotValidBrokerCode(brokerCode,producer_email);
              $(".sw-btn-next").removeAttr('disabled');
              brokerCodeValidation = false;
            }else{
              $("#bcMsg").hide();
              $(".sw-btn-next").removeAttr('disabled');
              brokerCodeValidation = true;
            }
          },
          error: function(data){
            //console.log(data);
          }
        });
      }
    }

    // This function will open email with subject and body for not valid broker code
    function openEmailNotValidBrokerCode(brokerCode,producer_email){
      var d = new Date();
      var getIP = null;
      $.getJSON("https://api.ipify.org?format=json", 
        function(data) { 
          // Setting text of element P with id gfg 
          getIP = data.ip;
          $("#bcMsg").empty();
          var body = "subject=Code-Domain mismatch&body=Email entered - "+producer_email+"%0ACode entered - "+brokerCode+"%0A%0A%0ADateTime : "+d+"%0AIP : "+getIP+"%0ABrowser : "+navigator.userAgent;
          //console.log(body);
          $("#bcMsg").html("Sorry, our records can't find a exact match to the code entered. Please contact <a href='mailto:helpdesk@amfredericks.com?"+body+"'>helpdesk@amfredericks.com</a>");
        }); 
      //console.log(getIP);
      $("#bcMsg").text("Checking code ....");
    }

    /** Function to open and hide nested field based on parent field value **/
    function fieldOpenHide(field,fieldVal,fieldBox='',otherFieldBox,otherFieldArray,hideFieldBox=''){
      var field_var = $("#"+field).val(); 
        if(field_var == fieldVal){ //console.log(otherFieldBox);
          if((hideFieldBox == 'Yes' || hideFieldBox ) && fieldBox != ''){
            $("#"+fieldBox).hide();
          }
          $("#"+otherFieldBox).show();
        }else{ 
          $("#"+otherFieldBox).hide();
          for(var i=0;i<otherFieldArray.length;i++){
            $("#"+otherFieldArray[i]).val('');
          }
          if((hideFieldBox == 'Yes' || hideFieldBox )  && fieldBox != ''){
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
    $("input[type=radio][name=insured_criminal_record]").on('change',function(){
     // fieldOpenHide('insured_criminal_record','Yes','','details_of_record_box',['insured_criminalRecord_details_of_record'],'');
      var insured_criminal_record =  this.value;
      if(insured_criminal_record == "Yes"){
        $("#details_of_record_box").show();
      }else{
        $("#details_of_record_box").hide();
        $("#insured_criminalRecord_details_of_record").val(''); // empty value if user fill up anything with yes and then select no again
      }
    });


    // display other mailing address province field
    $("#mailing_address_province").on('change',function(){
      if( $("#mailing_address_province").val() == "Quebec"){
          $("input[type=radio][name=insured_criminal_record]").parent().addClass("required");
          $("input[type=radio][name=insured_criminal_record]").parent().find("span.radio_error").show();
          $("input[type=radio][name=insured_criminal_record]").parent().parent().find("label").append('<span class="err" style="color:red"> *</span>');
      }else{
          $("input[type=radio][name=insured_criminal_record]").parent().removeClass("required");
          $("input[type=radio][name=insured_criminal_record]").parent().find("span.radio_error").hide();
          $("input[type=radio][name=insured_criminal_record]").parent().parent().find("label").find("span.err").remove();
      }
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
          html += '<div class="hmm_sections"><label class="col-md-4" style="float: left;">'+i+'. Name </label><input type="text" id="risk_address_hmm_name_'+i+'" name="risk_address_hmm_name_'+i+'" class="form-control onlyValidText col-md-8" autocomplete="off" value=""><label class="col-md-4" style="float: left;"> Address </label><input type="text" id="risk_address_hmm_address_'+i+'" name="risk_address_hmm_address_'+i+'" class="form-control col-md-8" autocomplete="off" value=""><label class="col-md-4" style="float: left;"> Amount of Outstanding Mortgage </label><input type="text" id="risk_address_hmm_amount_'+i+'" name="risk_address_hmm_amount_'+i+'" class="form-control col-md-8 commaValues" autocomplete="off" value=""></div>';  
        }
        $("#howManyMortgagees").html(html);
      }else{
        $("#howManyMortgagees").hide();
        $("#howManyMortgagees").empty(); // empty box
      }
    });


    // display reason for non-renewal field for existing insurer in risk address tab 
   // $("#risk_address_existingInsurerWillRenew").on('change',function(){
       $("input[type=radio][name=risk_address_existingInsurerWillRenew]").on('change',function(){
     // fieldOpenHide('risk_address_existingInsurerWillRenew','No','','risk_address_existingInsurerNonRenewalBox',['risk_address_existingInsurerNonRenewal'],'');
      var risk_address_existingInsurerWillRenew = this.value;
      if(risk_address_existingInsurerWillRenew == "No"){
        $("#risk_address_existingInsurerNonRenewalBox").show();
      }else{
        $("#risk_address_existingInsurerNonRenewalBox").hide();
        $("#risk_address_existingInsurerNonRenewal").val(''); // empty value if user fill up anything with yes and then select no again
      }
    });

    // display attach details field for has insured cancelled insurance in risk address tab 
    //$("#risk_address_hasInsuredCancelInsurance").on('change',function(){
       $("input[type=radio][name=risk_address_hasInsuredCancelInsurance]").on('change',function(){
      //fieldOpenHide('risk_address_hasInsuredCancelInsurance','Yes','','risk_address_hasInsuredCancelInsuranceIfYesBox',['risk_address_hasInsuredCancelInsuranceIfYes'],'');
      var risk_address_hasInsuredCancelInsurance = this.value;
      if(risk_address_hasInsuredCancelInsurance == "Yes"){
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
          html += '<div class="noc5_sections"><label class="col-md-4" style="float: left;">'+i+'. Type of claims </label><select class="form-control col-md-8" id="risk_address_noc5_type_'+i+'" name="risk_address_noc5_type_'+i+'"><option value="">-Select value-</option><option value="Fire">Fire</option> <option value="Vandalism">Vandalism</option><option value="Theft-Burglary">Theft/Burglary</option><option value="Windstorm">Windstorm</option> <option value="Burst pipes">Burst pipes</option><option value="Sewer Backup">Sewer Backup</option><option value="Flood including overland water">Flood including overland water</option><option value="Other">Other</option></select><label class="col-md-4" style="float: left;"> Description of other </label><input type="text" id="risk_address_noc5_description_'+i+'" name="risk_address_noc5_description_'+i+'" class="form-control col-md-8 onlyValidText" autocomplete="off"  value=""><label class="col-md-4" style="float: left;"> Open or Closed </label><select id="risk_address_noc5_openOrClosed_'+i+'" name="risk_address_noc5_openOrClosed_'+i+'" class="form-control col-md-8" ><option value="">-Select value-</option><option value="open">Open</option><option value="closed">Closed</option></select><label class="col-md-4" style="float: left;"> Amount of claim <span class="err">*</span></label><input type="text" id="risk_address_noc5_amount_'+i+'" name="risk_address_noc5_amount_'+i+'" class="form-control col-md-8 commaValues required" autocomplete="off"  value=""></div>'; 
        }
        $("#numberOfClaims").html(html);
      }else{
        $("#numberOfClaims").hide();
        $("#numberOfClaims").empty(); // empty box
      }
    });

    // display attach details field & type of claims for if any incidence in claim happen
    //$("#risk_address_incidenceInClaim").on('change',function(){
       $("input[type=radio][name=risk_address_incidenceInClaim]").on('change',function(){
      //fieldOpenHide('risk_address_incidenceInClaim','Yes','','incidenceOfClaimBox',['risk_address_incidenceOfClaim_details','risk_address_incidenceOfClaim_type'],'');
      var risk_address_incidenceInClaim = this.value;
      if(risk_address_incidenceInClaim == "Yes"){
        $("#incidenceOfClaimBox").show();
      }else{
        $("#incidenceOfClaimBox").hide();
        $("#risk_address_incidenceOfClaim_details").val(''); // empty value if user fill up anything with yes and then select no again
        $("#risk_address_incidenceOfClaim_type").val(''); 
      }
    });

    // display describe field for commercial operations on premises on occupancy tab
    $("input[type=radio][name=occupancy_commercialOperations]").on('change',function(){
    //$("#occupancy_commercialOperations").on('change',function(){
      //fieldOpenHide('occupancy_commercialOperations','Yes','','occupancy_commercialOperationsDescribeBox',['occupancy_commercialOperationsDescribe'],'');
      var occupancy_commercialOperations = this.value;
      if(occupancy_commercialOperations == 'Yes'){
        $("#occupancy_commercialOperationsDescribeBox").show();
      }else{
        $("#occupancy_commercialOperationsDescribeBox").hide();
        $("#occupancy_commercialOperationsDescribe").val(''); // empty value if user fill up anything with yes and then select no again
      }
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
    // show sprinkler coverage percentage field if sprinklers coverage is partial
    $("#fireAlarmDetectors_sprinklerCoverage").on('change',function(){
      if($("#fireAlarmDetectors_sprinklerCoverage").val() == "partial"){
        $("#sprinklersCoveragePartialBox").show();
      }else{
        $("#sprinklersCoveragePartialBox").hide();
        $("#fireAlarmDetectors_sprinklerCoveragePer").val('');
      }
    });

    // display are premises fenced and gated field for liability section in occupancy tab
    //$("#liability_doesPremisesHavePool").on('change',function(){
        $('input[type=radio][name=liability_doesPremisesHavePool]').change(function() {
      //fieldOpenHide('liability_doesPremisesHavePool','Yes','','ifPremiseHasPoolBox',['liability_doesPremisesFenced'],'');
        var liability_doesPremisesHavePool = this.value;
      if(liability_doesPremisesHavePool == "Yes"){
        $("#ifPremiseHasPoolBox").show();
      }else{
        $("#ifPremiseHasPoolBox").hide();
        $("#liability_doesPremisesFenced").val(''); // empty value if user fill up anything with yes and then select no again
      }
    });



    // Day Care *******************************************
    $('input[type=radio][name=dayCare_insurance_declined_or_cancelled]').change(function() {
      var dayCare_insurance_declined_or_cancelled = this.value;
      if(dayCare_insurance_declined_or_cancelled =="Yes"){
        $("#ifYesDayCareInsuranceDeclined").show();
      }else{
        $("#ifYesDayCareInsuranceDeclined").hide();
        $("#declined_or_cancelled_detail").val("");
      }
    });

    $('input[type=radio][name=meal_served]').change(function() {
      var meal_served = this.value;
      if(meal_served =="Yes"){
        $("#type_of_food_box").show();
        $("#cooking_facilities_yes_or_no_box").show();
        $("#food_allergies_items_yes_or_no_box").show();
      }else{
        $("#type_of_food_box").hide();
        $("#type_of_food").val("");
        $("#cooking_facilities_yes_or_no_box").hide();
        $("#cooking_facilities_yes_or_no").val("");
        // $("#cooking_facilities").checked(false);
        $("#food_allergies_items_yes_or_no_box").hide();
        $("#food_allergies_items_yes_or_no").val("");
        $('input[type=radio][name=cooking_facilities_yes_or_no]').prop('checked',false)
        $('input[type=radio][name=food_allergies_items_yes_or_no]').prop('checked',false)
      }
    });

    $('input[type=radio][name=incidents_written_record_kept]').change(function() {
      var record_kept = this.value;
      if(record_kept =="Yes"){
        $("#blank_form_copy_box").show()
      }else{
        $("#blank_form_copy_box").hide()
        $("#blank_form_copy").val("")
      }
    });

    $('input[type=radio][name=pool_yes_or_no]').change(function() {
      var pool = this.value;
      if(pool =="Yes"){
        $("#pool_indoor_or_outdoor").show()
        $("#supplemental_fencing_pool_yes_or_no_box").show()
      }else{
        $("#pool_indoor_or_outdoor").hide()
        $("#indoor_or_outdoor").val("")
        $("input[type=radio][name=indoor_or_outdoor]").prop('checked',false)

        $("#supplemental_fencing_pool_yes_or_no_box").hide()
        $("#supplemental_fencing_pool_yes_or_no").val("")
        $('input[type=radio][name=supplemental_fencing_pool_yes_or_no]').prop('checked',false)
      }
    });
    
    $('input[type=radio][name=playground_or_equipment]').change(function() {
      var playground_or_equipment = this.value;
      if(playground_or_equipment =="Yes"){
        $("#desc_equipment_box").show()
        $("#playground_equipment_for_age_box").show()
        $("#maintenance_frequency_box").show()
        $("#construction_type_box").show()
        $("#landing_surface_box").show()
      }else{
        $("#desc_equipment_box").hide()
        $("#desc_equipment").val("")
        $("#playground_equipment_for_age_box").hide()
        $("#playground_equipment_for_age").val("")
        $("#maintenance_frequency_box").hide()
        $("#maintenance_frequency").val("")
        $("#construction_type_box").hide()
        $("#construction_type").val("")
        $("#landing_surface_box").hide()
        $("#landing_surface").val("")
      }
    });

    $('input[type=radio][name=pet_on_prem_yes_or_no]').change(function() {
      var pet_on_prem_yes_or_no= this.value;
      if(pet_on_prem_yes_or_no == "Yes"){
        $("#pets_desc_box").show()
      }else{
        $("#pets_desc_box").hide()
        $("#pets_desc").val('')
      }
    })

    $('input[type=radio][name=daycare_transportation]').change(function() {
      var daycare_transportation= this.value;
      if(daycare_transportation =="Yes"){
        $("#auto_liability_insurance_yes_or_no").show()
        $("#vehicle_owned_by_dayCare_yes_or_no").show()
        $("#day_trips_yes_or_no").show()
      }else{
        $("#auto_liability_insurance_yes_or_no").hide()
        $("#auto_liability_insurance").val("")
        $('input[type=radio][name=auto_liability_insurance]').prop('checked',false)
        $("#vehicle_owned_by_dayCare_yes_or_no").hide()
        $("#vehicle_owned_by_dayCare").val("")
        $('input[type=radio][name=vehicle_owned_by_dayCare]').prop('checked',false)
        $("#day_trips_yes_or_no").hide()
        $("#day_trips_detail").val("") 
        $('input[type=radio][name=day_trips_taken]').prop('checked',false)
        
        $("#dayCare_vehicle_current_insurer_box").hide()
        $("#dayCare_vehicle_current_insurer").val("")
        $("#dayCare_vehicle_insurance_policyNo_box").hide()
        $("#dayCare_vehicle_insurance_policyNo").val("")
        $("#dayCare_vehicle_insurance_policyLimits_box").hide()
        $("#dayCare_vehicle_insurance_policyLimits").val("")

        $("#day_trips_box").hide()
        $("#day_trips_detail").val("")
      }
    });

    $('input[type=radio][name=vehicle_owned_by_dayCare]').change(function() {
      var vehicle_owned_by_dayCare= this.value;
      if(vehicle_owned_by_dayCare =="Yes"){
        $("#dayCare_vehicle_current_insurer_box").show()
        $("#dayCare_vehicle_insurance_policyNo_box").show()
        $("#dayCare_vehicle_insurance_policyLimits_box").show()
      }else{
        $("#dayCare_vehicle_current_insurer_box").hide()
        $("#dayCare_vehicle_current_insurer").val("")
        $("#dayCare_vehicle_insurance_policyNo_box").hide()
        $("#dayCare_vehicle_insurance_policyNo").val("")
        $("#dayCare_vehicle_insurance_policyLimits_box").hide()
        $("#dayCare_vehicle_insurance_policyLimits").val("")
      }
    });
    
    $('input[type=radio][name=day_trips_taken]').change(function() {
      var day_trips_taken = this.value;
      if(day_trips_taken =="Yes"){
        $("#day_trips_box").show()
      }else{
        $("#day_trips_box").hide()
        $("#day_trips_detail").val("")
      }
    });
    


    //  ***************************



    // show broker survey if yes for how long for do you know applicant personally question
    $('input[type=radio][name=brokerSurvey_applicantPersonally]').change(function() {
      //fieldOpenHide('brokerSurvey_applicantPersonally','Yes','','ifYesApplicantPersonally',['brokerSurvey_applicantPersonally_HowLong'],'');
      var brokerSurvey_applicantPersonally = this.value;
     // console.log(brokerSurvey_applicantPersonally);
      if(brokerSurvey_applicantPersonally =="Yes"){
        $("#ifYesApplicantPersonally").show();
      }else{
        $("#ifYesApplicantPersonally").hide();
        $("#brokerSurvey_applicantPersonally_HowLong").val(''); // empty value if user fill up anything with yes and then select no again
      }
    });

    // show broker survey If No, from whom and why for Did you receive the order direct from the Applicant question
    //$("#brokerSurvey_OrderDirectApplicant").on('change',function(){
    $('input[type=radio][name=brokerSurvey_OrderDirectApplicant]').change(function() {
     // fieldOpenHide('brokerSurvey_OrderDirectApplicant','No','','ifNoOrderDirectApplicant',['brokerSurvey_OrderDirectApplicantWhomWhy'],'');
      var brokerSurvey_OrderDirectApplicant = this.value;
      if(brokerSurvey_OrderDirectApplicant == "No"){
        $("#ifNoOrderDirectApplicant").show();
      }else{
        $("#ifNoOrderDirectApplicant").hide();
        $("#brokerSurvey_OrderDirectApplicantWhomWhy").val(''); // empty value if user fill up anything with yes and then select no again
      }
    });

    // show broker survey If Yes, Which Coverages for Do you handle other Insurance for the Applicant question
    //$("#brokerSurvey_handleOtherInsurance").on('change',function(){
    $('input[type=radio][name=brokerSurvey_handleOtherInsurance]').change(function() {
      //fieldOpenHide('brokerSurvey_handleOtherInsurance','Yes','','ifYesHandleOtherInsurance',['brokerSurvey_handleOtherInsuranceCoverages'],'');
      var brokerSurvey_handleOtherInsurance = this.value;
      if(brokerSurvey_handleOtherInsurance=="Yes"){
        $("#ifYesHandleOtherInsurance").show();
      }else{
        $("#ifYesHandleOtherInsurance").hide();
        $("#brokerSurvey_handleOtherInsuranceCoverages").val(''); // empty value if user fill up anything with yes and then select no again 
      }
    });

    // show broker survey If No, please explain for Do you recommend this risk in every Respecty question
    $('input[type=radio][name=brokerSurvey_recommandRisk]').change(function() {
      //fieldOpenHide('brokerSurvey_recommandRisk','No','','ifNoRecommandRisk',['brokerSurvey_recommandRiskExplain'],'');
      var brokerSurvey_recommandRisk =  this.value;
      if(brokerSurvey_recommandRisk == "No"){
        $("#ifNoRecommandRisk").show();
      }else{
        $("#ifNoRecommandRisk").hide();
        $("#brokerSurvey_recommandRiskExplain").val(''); // empty value if user fill up anything with yes and then select no again
      }
    });

    //******open CEF form if yes is selected */
    $('input[type=radio][name=cgl_contractorsEquipmentFloater]').change(function() {
      //fieldOpenHide('brokerSurvey_handleOtherInsurance','Yes','','ifYesHandleOtherInsurance',['brokerSurvey_handleOtherInsuranceCoverages'],'');
      var cgl_contractorsEquipmentFloater = this.value;
      if(cgl_contractorsEquipmentFloater=="Yes"){
        // openUpSubForm("subformCEF",'toggle');
        $("#accordion").show();
      }else{
        $("#accordion").hide();
        $("cgl_contractorsEquipmentFloater").val(''); // empty value if user fill up anything with yes and then select no again 
      }
    });






    // show broker survey If yes, how long have you placed this risk for Is this risk a renewal to your office question
    //$("#brokerSurvey_riskRenewalToOffice").on('change',function(){
    $('input[type=radio][name=brokerSurvey_riskRenewalToOffice]').change(function() {
      //fieldOpenHide('brokerSurvey_riskRenewalToOffice','Yes','','ifYesRiskRenewalToOffice',['brokerSurvey_riskRenewalToOfficeHowLong'],'');
      var brokerSurvey_riskRenewalToOffice = this.value;
      if(brokerSurvey_riskRenewalToOffice == "Yes   "){
        $("#ifYesRiskRenewalToOffice").show();
      }else{
        $("#ifYesRiskRenewalToOffice").hide();
        $("#brokerSurvey_riskRenewalToOfficeHowLong").val(''); // empty value if user fill up anything with yes and then select no again
      }
    });

    // show describe for Are there any Rental Suites? in occupancy for ownerOccupied selection
    $('input[type=radio][name=occupancy_anyRentalSuites]').change(function() {
    //$("#occupancy_anyRentalSuites").on('change',function(){
      //fieldOpenHide('occupancy_anyRentalSuites','Yes','','occupancy_anyRentalSuitesBox',['occupancy_anyRentalSuitesDescribe'],'');
      var occupancy_anyRentalSuites = this.value;
      if(occupancy_anyRentalSuites == "Yes"){
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
    

    // display existing insurance fields for Home Inspector
    $("input[type=radio][name=existingInsurance_currentlyInsured]").on('change',function(){
      var existingInsurance_currentlyInsured = this.value;
      if(existingInsurance_currentlyInsured == 'Yes'){
        $(".eiBOX").show();
      }else{
        $(".eiBOX").hide();
        clearFields("eiBOX");
        $("#existingInsurance_termsAndConditions").val('');
      }
    });

    // display existing fillings for MTC
    $("input[type=radio][name=filingRequired]").on('change',function(){
      var fillingRequired = this.value;
      if(fillingRequired == 'Yes'){
        $(".fillReq").show();
      }else{
        $(".fillReq").hide();
        clearFields("fillReq");
      }
    });
   /* // display claimHistory_anyClaimsReportedOnUrBehalf for Home Inspector
    $("#claimHistory_anyClaimsReportedOnUrBehalf").on('change',function(){
      var claimHistory_anyClaimsReportedOnUrBehalf = $("#claimHistory_anyClaimsReportedOnUrBehalf").val();
      if(claimHistory_anyClaimsReportedOnUrBehalf == 'Yes'){
        $(".anyClaimReportedBox").show();
      }else{
        $(".anyClaimReportedBox").hide();
        $("#claimHistory_anyClaimsReportedFullDetails").val('');
        $("#claimHistory_anyClaimsToPreventSteps").val('');
      }
    });*/

    // display claimHistory_anyPolicyReportedOnUrBehalf fields for Home Inspector
     $("input[type=radio][name=claimHistory_anyPolicyReportedOnUrBehalf]").on('change',function(){
    //$("#claimHistory_anyPolicyReportedOnUrBehalf").on('change',function(){
      var claimHistory_anyPolicyReportedOnUrBehalf =this.value;
      if(claimHistory_anyPolicyReportedOnUrBehalf == 'Yes'){
        $(".anyPolicyReportedBox").show();
      }else{
        $(".anyPolicyReportedBox").hide();
        $("#claimHistory_anyPolicyToPreventSteps").val('');
      }
    });

    // display existing insurance fields for Home Inspector
   // $("#claimHistory_anyUnresolvedAct").on('change',function(){
      $("input[type=radio][name=claimHistory_anyUnresolvedAct]").on('change',function(){
      var claimHistory_anyUnresolvedAct = this.value;
      if(claimHistory_anyUnresolvedAct == 'Yes'){
        $(".anyUnresolvedActBox").show();
      }else{
        $(".anyUnresolvedActBox").hide();
        $("#claimHistory_anyUnresolvedActFullDetails").val('');
      }
    });

    // display ops_carryEmployerLiablityInsurance field on OPS Tab for Home Inspector
    $("input[type=radio][name=claimHistory_anyPolicyReportedOnUrBehalf]").on('change',function(){
      var ops_carryEmployerLiablityInsurance = this.value;
      if(ops_carryEmployerLiablityInsurance == 'Yes'){
        $(".carryEmployerLiablityInsuranceBOX").show();
      }else{
        $(".carryEmployerLiablityInsuranceBOX").hide();
        $("#ops_carryELInumberOccupationOfEmployees").val('');
      }
    });

    // display ops_coveredByWorkerCompensation field on OPS Tab for Home Inspector
   $("input[type=radio][name=claimHistory_anyPolicyReportedOnUrBehalf]").on('change',function(){
      var ops_coveredByWorkerCompensation = this.value;
      if(ops_coveredByWorkerCompensation == 'No'){
        $(".coveredByWorkerCompensationBOX").show();
      }else{
        $(".coveredByWorkerCompensationBOX").hide();
        $("#ops_coveredByWCnumberAndTypeOfEmployees").val('');
      }
    });

    // display ops_haveContractForServices field on OPS Tab for Home Inspector
   $("input[type=radio][name=ops_haveContractForServices]").on('change',function(){
      var ops_haveContractForServices = this.value;
      if(ops_haveContractForServices == 'Yes'){
        $(".haveContractForServicesBOX").show();
      }else{
        $(".haveContractForServicesBOX").hide();
        $("#contractForServiceHI").val('');
      }
    });

    // display ops_haveSubContractors field on OPS Tab for Home Inspector
  $("input[type=radio][name=ops_haveSubContractors]").on('change',function(){
      var ops_haveSubContractors = this.value;
      if(ops_haveSubContractors == 'Yes'){
        $(".haveSubContractorsBOX").show();
      }else{
        $(".haveSubContractorsBOX").hide();
        $("#ops_haveSubContractors_costOfSublet").val('');
        $("#ops_haveSubContractors_typeOfSublet").val('');
        //$("#ops_haveSubContractors_harmlessAgreement").val('');

         $("input[type=radio][name=ops_haveSubContractors_harmlessAgreement]").removeAttr("checked");
        $("input[type=radio][name=ops_haveSubContractors_harmlessAgreement]").prop('checked', false);


        $("#ops_haveSubContractors_askToCarryMinLiaInsurance").val('');
      }
    });

    // display ops_haveSubContractors_askToCarryMinLiaInsurance field on OPS Tab for Home Inspector
   $("input[type=radio][name=ops_haveSubContractors_askToCarryMinLiaInsurance]").on('change',function(){
      var ops_haveSubContractors_askToCarryMinLiaInsurance = this.value;
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
    $("input[type=radio][name=ops_anyBranchOrSubsidiary]").on('change',function(){
      var ops_anyBranchOrSubsidiary = this.value;
      if(ops_anyBranchOrSubsidiary == 'Yes'){
        $(".anyBranchOrSubsidiaryBOX").show();
      }else{
        $(".anyBranchOrSubsidiaryBOX").hide();
        $("#ops_anyBranchOrSubsidiary_nameAndDesc").val('');
      }
    });
    
    // display ops_radioactiveSamplingTesting field on OPS Tab for Home Inspector
    $("input[type=radio][name=ops_radioactiveSamplingTesting]").on('change',function(){
      var ops_radioactiveSamplingTesting = this.value;
      if(ops_radioactiveSamplingTesting == 'Yes'){
        $(".radioactiveSamplingTestingBOX").show();
      }else{
        $(".radioactiveSamplingTestingBOX").hide();
        //$("#ops_radioactiveSamplingTesting_thirdPartyInsurance").val('');
        $("input[type=radio][name=ops_radioactiveSamplingTesting_thirdPartyInsurance]").removeAttr("checked");
        $("input[type=radio][name=ops_radioactiveSamplingTesting_thirdPartyInsurance]").prop('checked', false);
      }
    });

    // show describe for disagree details field for Abuse Employment Disclosure on Claim History Tab
    $("#claimHistory_abuseEmploymentDisclosure").on('change',function(){
      //console.log('Abuse');
      fieldOpenHide('claimHistory_abuseEmploymentDisclosure','Disagree','','claimHistory_abuseEmploymentDisclosureBox',['claimHistory_abuseEmploymentDisclosureDisAgreeDetails'],'');
    });

    // show entire section/Step if buildingCoverage required Yes
    //$("#risk_address_requireBuildingCoverage").on('change',function(){
       $("input:radio[name=risk_address_requireBuildingCoverage]").on('change',function(){
      if(this.value == "No"){
        // hide building construction section and surroundign exposure section
        $(".buildingConstruction").hide();
        $(".surroundingExposure").hide();
        $(".includeExclude").hide();  // Hide fields to not show in review
        clearFields("includeExclude"); 
        // hide following how many mortgage field as well 
        $(".howManyMortgageesBox").hide();
        $(".howManyMortgageesBox").find('label').find("span").empty();
        $(".howManyMortgageesBox").find('label').find("span").removeClass("err");
        $(".howManyMortgageesBox").find('select').removeClass("required");
        $("#howManyMortgagees").hide();
        $("#howManyMortgagees").empty(); // empty box
        // add min height to auto for smartwizard container
        $(".sw-container").css('min-height','auto');
      }else{
        // show building construction section and surroundign exposure section
        $(".buildingConstruction").show();
        $(".surroundingExposure").show();
        $(".includeExclude").show();
        // hide following how many mortgage field as well 
        $(".howManyMortgageesBox").show();
        //console.log(!$(".howManyMortgageesBox").find('label').find("span"));
        //if(!$(".howManyMortgageesBox").find('label').find("span"))
        $(".howManyMortgageesBox").find('label').find("span").html('*');
        $(".howManyMortgageesBox").find('label').find("span").addClass("err");

         $(".howManyMortgageesBox").find('select').addClass("required");
        // clear all fields in section
        //clearFields('buildingConstruction');
        clearFields('howManyMortgageesBox');
      }
      
    });
    
    // display burglaryAlarm_safe field on Protection Tab for Plumbing
    //$("#burglaryAlarm_safe").on('change',function(){
       $("input[type=radio][name=burglaryAlarm_safe]").on('change',function(){
      var burglaryAlarm_safe = this.value;
      if(burglaryAlarm_safe == "Yes"){
        $(".burglaryAlarm_safeBox").show();
      }else{
        $(".burglaryAlarm_safeBox").hide();
        $("#burglaryAlarm_safeClass").val('');
        $("#burglaryAlarm_safeDimensions").val('');
      }
    });

    // show gross earning sub fields on Coverage Tab for Plumbing
    $(document).on("focusout","#coverage_grossEarnings",function(){
      var coverage_grossEarnings = $("#coverage_grossEarnings").val();
      if(coverage_grossEarnings != ''){
        $("#ifcoverageGrossEarningsLimitBox").show();
      }else{
        $("#ifcoverageGrossEarningsLimitBox").hide();
        $("#coverage_grossEarningsPer").val('');
      }
    });

    // show describe sub fields for coverage_otherLiability on Coverage Tab for Plumbing
    $(document).on("focusout","#coverage_otherLiability",function(){
      var coverage_otherLiability = $("#coverage_otherLiability").val();
      if(coverage_otherLiability != ''){
        $("#coverage_otherLiabilityBox").show();
      }else{
        $("#coverage_otherLiabilityBox").hide();
        $("#coverage_otherLiabilityDescribe").val('');
      }
    });

// This funtion is to modify buit-in serialize jquery function for returning checkbox fields value as boolean
/*    (function ($) {
    $.fn.serialize = function (options) {
        return $.param(this.serializeArray(options));
    };

    $.fn.serializeArray = function (options) {
      console.log(this);

       var name  = this.name;
       console.log(name);
         /*if(typeof  this.val() === "undefined"){
            console.log("in");
         }*/

     /* return false;
        var o = $.extend({
            checkboxesAsBools: false
        }, options || {});

        var rselectTextarea = /select|textarea/i;
        var rinput = /text|hidden|password|search|number/i;

        return this.map(function () {
            return this.elements ? $.makeArray(this.elements) : this;
        })
        .filter(function () {
            return this.name && !this.disabled &&
                (this.checked
                || (o.checkboxesAsBools && this.type === 'checkbox')
                || rselectTextarea.test(this.nodeName)
                || rinput.test(this.type));
            })
            .map(function (i, elem) {
                var val = $(this).val();
                return val == null ?
                null :
                $.isArray(val) ?
                $.map(val, function (val, i) {
                    return { name: elem.name, value: val };
                }) :
                {
                    name: elem.name,
                    value: (o.checkboxesAsBools && this.type === 'checkbox') ?
                        (this.checked ? true : false) :
                        val
                };
            }).get();
    };
})(jQuery);*/

//======end of modification of built-in serialize function

    // check step number and if user click on final step then check broker code to display calculate button
    $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection) {
      // add min height to auto for smartwizard container
      $(".sw-container").css('min-height','auto');
        if((stepNumber == 8 && (rtqFormGlobal == "homeInspector" || rtqFormGlobal == "plumbing")) || (stepNumber == 6 && (rtqFormGlobal == "rentedDwelling" || rtqFormGlobal == "ownerOccupied")) || (stepNumber == 6 && rtqFormGlobal == "dayCare")){
          //console.log('final step');

          // hide next button when in final step
          $(".sw-btn-next").css('visibility','hidden');

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
          // get risk province for formProvince Rule
          var riskProvince = $.trim($('#risk_address_province').val());
          
          // empty review form everytime comes to final step to show new latest values
          $("#reviewForm").empty();
          // append processing text to review form  
          $("#reviewFormPT").text("Review form taking time to load ..."); 
          
            // check refer rules matching or not
            //var formData = JSON.stringify($('#rtq_form').serializeArray());
            
            var fd = JSON.stringify($( ":input" ).serializeArray());
           /*console.log(fd);
            return false;
*/            var result = {};
      
            $.each(JSON.parse(fd), function() {
              var id = this.name;
              var row = {};
              row["value"] = this.value;
              // find title
              var title = $("#"+id).prev('label').text();
              if(title == ""){
                //console.log("in");
                title = $("input[type=radio][name="+id+"]").parent().prev('label').text();
                
              }
              row["title"] = title;
              result[this.name] = row;
            });
      
            var formData = JSON.stringify(result);
            console.log(formData);
            
            var rtqForm = $("#selectedForm").val();//$("#rtq_forms option:selected").val();

            $.ajax({
              url:"checkReferRules",
              method:"post",
              data: {formData:formData,rtqForm:rtqForm,_token:$('meta[name="csrf-token"]').attr('content')},
              datatype: 'json',
              success: function(msg){
                //console.log(msg);

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
                    console.log("B")
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
                    console.log("A")
                    $(".bindingBox").hide();
                    
                  }else{
                    //console.log('valid == true');
                    // check broker code is valid or not
                    //console.log("brokerCodeValidation "+brokerCodeValidation);

                    // CHECK FORM PROVINCE RULE FIRST AND OVERRIDE BROKER CODE VALIDATION IF REFER
                    var formProvinceRule = checkFormProvinceRule(riskProvince,rtqForm);
                    if(formProvinceRule == "Refer"){
                      brokerCodeValidation = false;
                    }else{
                      // if quote
                      brokerCodeValidation = true;
                    }

                    if(brokerCodeValidation){
                      $('#calculateBox').show();
                      $("#doesCalculated").val('quoted');
                      //console.log($("tivLimit").val());
                     /* console.log($("#tivLimit").val());
                      console.log(rtqForm == "plumbing" && $("#tivLimit").val() < 100000);*/
                      if(rtqForm == "plumbing" && $("#tivLimit").val() > 100000)
                       $(".bindingBox").hide();
                      else
                        $(".bindingBox").show();

                    }else{
                      $('#calculateBox').hide();
                      $("#doesCalculated").val('');
                      $(".bindingBox").hide();
                    }
                    $("#referValidationNotMatchBox").hide();
                    $("#referValidationNotMatchBox").empty();

                    reviewForm();
                    console.log("C")
                    
                    
                  }

                  
                 }else{
                    $("#reviewFormPT").text(""); 
                    reviewForm();
                    console.log("D")
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
               // console.log(data);
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
          
          // if on step number 2 ( insured tab ) and form is plumbing
          if(stepNumber == 2 && rtqFormGlobal == "plumbing"){
            $('#mailing_address_country').val("Canada");
          }
          
          //console.log($(anchorObject.attr('href')).find('section:first').find('input:first').attr('name'));
          $(anchorObject.attr('href')).find('section:first').find(':input:enabled:visible:first').focus();

          // show next button when not in final step
          $(".sw-btn-next").css('visibility','');
          // remove  next button disable 
          $(".sw-btn-next").removeAttr('disabled');

        }
    });

    // FUNCTION TO CHECK IF PROVINCE FORM RULES IS REFER OR QUOTE
    function checkFormProvinceRule(riskProvince, rtqForm){
      var formProvinceRule = 'Refer'; // BY DEFAULT ITS REFER
      $.ajax({
        url:"checkFormProvinceQuoteRule",
        method:"post",
        async : false, // its because we need to complete request first to see result
        data: {riskProvince:riskProvince,rtqForm:rtqForm,_token:$('meta[name="csrf-token"]').attr('content')},
        datatype: 'json',
        success: function(msg){
          if(msg == "Q"){
            formProvinceRule = "Quote";
          }else{
            formProvinceRule = "Refer";
          }
        },  
        error: function(data){
          console.log(data);
          formProvinceRule = "Refer";
        }
      });  

      return formProvinceRule;

    }

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
    if(val != '' && val != null && val.toString().indexOf(',') > 0){
      //console.log('Remove comma');
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
        //var cgl_contractorsEquipmentFloater = $("#cgl_contractorsEquipmentFloater").val();
        var cgl_contractorsEquipmentFloater =  $("input[type=radio][name=cgl_contractorsEquipmentFloater]").val();
        var cgl_additionalPropertyFrill =  $("input[type=radio][name=cgl_additionalPropertyFrill]").val();
        //var cgl_additionalPropertyFrill = $("#cgl_additionalPropertyFrill").val();
        var risk_address_noOfClaims = $("#risk_address_noOfClaims").val();

        if(cgl_cglLimitsOfLiablitiy != '' && cgl_eoLimitsOfLiablity != '' && risk_address_noOfClaims != '')
        {
          $.ajax({
            url:"calculate",
            method:"post",
            data: {inspectionProv:inspectionProv,cgl_cglLimitsOfLiablitiy:cgl_cglLimitsOfLiablitiy,cgl_eoLimitsOfLiablity:cgl_eoLimitsOfLiablity,ops_totalGrossAnnualReceipts:ops_totalGrossAnnualReceipts,cgl_deductible:cgl_deductible,cgl_contractorsEquipmentFloater:cgl_contractorsEquipmentFloater,cgl_additionalPropertyFrill:cgl_additionalPropertyFrill,risk_address_noOfClaims:risk_address_noOfClaims,rtqForm:rtqForm,_token:$('meta[name="csrf-token"]').attr('content')},
            datatype: 'json',
            success: function(msg){
              
              msg = JSON.parse(msg);
              //console.log(msg);
              $("#priceBox").empty();

              var table = "<table class='table table-bordered'> <tbody><tr><td>Premium</td><td><span style='width:50%;text-align:right;display:block;'>"+msg['premium']+"</span></td></tr><tr><td>CEF</td><td><span style='width:50%;text-align:right;display:block;'>"+msg['cglCEF']+"</span></td></tr><tr><td>Frill</td><td><span style='width:50%;text-align:right;display:block;'>"+msg['cglFrill']+"</span></td></tr><tr><td>Fee</td><td><span style='width:50%;text-align:right;display:block;'>"+msg['fee']+"</span></td></tr><tr class='totalRow'><td><b>Total</b></td><td><span style='width:50%;text-align:right;display:block;'><b>"+msg['total']+"</b></span></td></tr></tbody> </table>";
              $("#priceBox").html(table);
              
              //$("#priceBox").text(Math.round(msg.total));
              
            },
            error: function(data){
              console.log(data);
            }
          });
        }else{
          swal('Some required fields are missing for calculation.');
        }

            
              
      }else if(rtqForm == "plumbing"){
        // gather required data to calculate
        var province = $('#risk_address_province').val();
        var totalRevenue = $('#totalRevenue').val();
        var coverage_CEF = $('#coverage_CEF').val();
        var coverage_toolFloater = $('#coverage_toolFloater').val();
        var coverage_officeEquipmentsFloater = $('#coverage_officeEquipmentsFloater').val();
        var coverage_profits = $('#coverage_profits').val();

        var coverage_buildingLimit = $('#coverage_buildingLimit').val();
        var coverage_contentsLimit = $('#coverage_contentsLimit').val();
        var coverage_contentsLimitStock = $('#coverage_contentsLimitStock').val();
        var coverage_contentsLimitEquipment = $('#coverage_contentsLimitEquipment').val();
        var coverage_contentsLimitImprovements = $('#coverage_contentsLimitImprovements').val();
        var coverage_grossEarnings = $('#coverage_grossEarnings').val();
        var coverage_grossEarningsPer = $('#coverage_grossEarningsPer').val();
        var coverage_extraExpenses = $('#coverage_extraExpenses').val();
        var coverage_rentalIncomeLimit = $('#coverage_rentalIncomeLimit').val();
        var coverage_signFloater = $('#coverage_signFloater').val();

        var coverage_crime_broadFormMoney = $('#coverage_crime_broadFormMoney').val();
        var coverage_crime_insideRobbery = $('#coverage_crime_insideRobbery').val();
        var coverage_crime_outsideRobbery = $('#coverage_crime_outsideRobbery').val();
        var coverage_crime_employeeDishonesty = $('#coverage_crime_employeeDishonesty').val();
        var coverage_crime_3dRider = $('#coverage_crime_3dRider').val();

        var coverage_liabilityLimit = $('#coverage_liabilityLimit').val();
        var yearsBuilt = $('#buildingConstruction_yearBuilt').val();
        
        var constructionType = $('#buildingConstruction_overallConstruction').val();
        var fireDeptDistance = $('#fireAlarmDetectors_fireDeptDistance').val();
        var fireDeptType = $('#fireAlarmDetectors_fireDeptTye').val();
        var hydrant = $('#fireAlarmDetectors_hydrant').val();
  
        var closestCity = $('#closestCity').val();
        var distanceFromClosestCity = $('#distanceFromClosestCity').val();

        var liability_typeOfOpsWorkPerformIAO = $("#liability_typeOfOpsWorkPerformIAO").val();

        if(closestCity == '' || distanceFromClosestCity == ''){
          // get TIV
          var tivLimit = $("#tivLimit").val();
          if(tivLimit > 150000){
            // show error msg 
            $("#closestCityMSG").show(); 
            return false;  
          }else{
            // hide error msg 
            $("#closestCityMSG").hide();
          }      
        }else{
          // hide error msg 
          $("#closestCityMSG").hide();
        }

        if(province != ''){
          if(coverage_liabilityLimit == '' || coverage_liabilityLimit == 'none')
            coverage_liabilityLimit =0;
          // send calculate request
          $.ajax({
            url:"calculate",
            method:"post",
            data: {province:province,totalRevenue:totalRevenue,coverage_CEF:coverage_CEF,coverage_toolFloater:coverage_toolFloater,coverage_officeEquipmentsFloater:coverage_officeEquipmentsFloater,coverage_profits:coverage_profits,coverage_buildingLimit:coverage_buildingLimit,coverage_contentsLimit:coverage_contentsLimit,coverage_contentsLimitStock:coverage_contentsLimitStock,coverage_contentsLimitEquipment:coverage_contentsLimitEquipment,coverage_contentsLimitImprovements:coverage_contentsLimitImprovements,coverage_grossEarnings:coverage_grossEarnings,coverage_grossEarningsPer:coverage_grossEarningsPer,coverage_extraExpenses:coverage_extraExpenses,coverage_rentalIncomeLimit:coverage_rentalIncomeLimit,coverage_signFloater:coverage_signFloater,coverage_crime_broadFormMoney:coverage_crime_broadFormMoney,coverage_crime_insideRobbery:coverage_crime_insideRobbery,coverage_crime_outsideRobbery:coverage_crime_outsideRobbery,coverage_crime_employeeDishonesty:coverage_crime_employeeDishonesty,coverage_crime_3dRider:coverage_crime_3dRider,coverage_liabilityLimit:coverage_liabilityLimit,yearsBuilt:yearsBuilt,constructionType:constructionType,fireDeptDistance:fireDeptDistance,fireDeptType:fireDeptType,hydrant:hydrant,closestCity:closestCity,distanceFromClosestCity:distanceFromClosestCity,liability_typeOfOpsWorkPerformIAO:liability_typeOfOpsWorkPerformIAO,rtqForm:rtqForm,_token:$('meta[name="csrf-token"]').attr('content')},
            datatype: 'json',
            success: function(msg){
              
              msg = JSON.parse(msg);
              //console.log(msg);
              
              var table = "<table class='table table-bordered'> <tbody><tr><td>Property Total</td><td><span style='width:50%;text-align:right;display:block;'>"+msg['propertyTotal']+"</span></td></tr><tr><td>Liability Total</td><td><span style='width:50%;text-align:right;display:block;'>"+msg['liabilityVal']+"</span></td></tr><tr><td>Inspection Fee</td><td><span style='width:50%;text-align:right;display:block;'>"+msg['inspectionFee']+"</span></td></tr><tr><td>Fee</td><td><span style='width:50%;text-align:right;display:block;'>"+msg['fee']+"</span></td></tr><tr class='totalRow'><td><b>Total</b></td><td><span style='width:50%;text-align:right;display:block;'><b>"+msg['total']+"</b></span></td></tr></tbody> </table>";
              $("#priceBox").html(table);
              
            },
            error: function(data){
              console.log(data);
            }
          });
        }else{
          /*if(closestCity == ''){
            $("#closestCityMSG").show();
          }else{
            $("#closestCityMSG").hide();
            swal('Some required fields are missing for calculation.');
          }*/
          swal('Make sure you have selected risk province for calculation');
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
        //console.log(buildingLimit+'  '+contentsLimit+'  '+rentalIncomeLimit+'  '+garageLimit+'  '+shedLimit);
        if(province != '' && yearsBuilt != '' && fireDeptDistance != '' && fireDeptType != '' && hydrant != '' && liability != '' )
        {
          $.ajax({
            url:"calculate",
            method:"post",
            data: {province:province,yearsBuilt:yearsBuilt,fireDeptDistance:fireDeptDistance,fireDeptType:fireDeptType,hydrant:hydrant,buildingLimit:buildingLimit,contentsLimit:contentsLimit,rentalIncomeLimit:rentalIncomeLimit,garageLimit:garageLimit,shedLimit:shedLimit,liability:liability,rtqForm:rtqForm,_token:$('meta[name="csrf-token"]').attr('content')},
            datatype: 'json',
            success: function(msg){
              
              msg = JSON.parse(msg);
              //console.log(msg);
              
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

  function addRemoveClass(fieldId,addClassVal,removeClassVal){
    $("#"+fieldId).addClass(addClassVal);
    $("#"+fieldId).removeClass(removeClassVal);
  }
 /*  $("#liability_anyPremisesLeasedRentedToOther").on('click',function(){
    //var liability_anyPremisesLeasedRentedToOther = $("#liability_anyPremisesLeasedRentedToOther").val();
    console.log($(this).prop("checked"));
     });*/
  /*$("#liability_premisesHaveElevator").on('click',function(){
    var liability_premisesHaveElevator = $(this).is(':checked') ;
    if(liability_premisesHaveElevator){
      $("#addElevatorBox").show();
     // addRemoveClass('liability_premisesHaveElevator','col-md-3','col-md-4');
    }else{
      $("#addElevatorBox").hide();
      // empty box
      $("#liability_premisesHaveElevatorDetails").empty();
      $("#liability_premisesHaveElevatorDetails").hide();
      //addRemoveClass('liability_premisesHaveElevator','col-md-4','col-md-3');
      addEleCount = 1;
    }
  });
  /**
    Add more liablity items Elevators/Escalators
  **/
  //var addEleCount = 1; // one is by default showing in form
 /* $("#addElevatorBox").on('click',function(){
    addElevatorDescription();
  });
  function addElevatorDescription(){
    // get size of section
    var size = $("[id^=liability_premisesHaveElevatorNumber").size()+1; 
    console.log(size);
    var addEleCount = size; 
    
    // set count in hidden fields
    $("#liability_premisesHaveElevatorDetailsCount").val(addEleCount);
  
    var html = '<div class="ele_sections" data-value="'+addEleCount+'"><label class="col-md-8" style="float: left;"><span id="countEle">'+addEleCount+'</span>. Description   <i class="fa fa-times" style="cursor: pointer;" id="removeEleDescription_'+addEleCount+'" ></i> </label><input type="text" id="liability_premisesHaveElevatorDescription_'+addEleCount+'" name="liability_premisesHaveElevatorDescription_'+addEleCount+'" class="form-control col-md-4 onlyValidText" autocomplete="off" value="" ><label class="col-md-8" style="float: left;">Number</label><input type="text" id="liability_premisesHaveElevatorNumber_'+addEleCount+'" name="liability_premisesHaveElevatorNumber_'+addEleCount+'" class="form-control col-md-4 " autocomplete="off" value="" ><label class="col-md-8" style="float: left;">Location</label><input type="text" id="liability_premisesHaveElevatorLocation_'+addEleCount+'" name="liability_premisesHaveElevatorLocation_'+addEleCount+'" class="form-control col-md-4 " autocomplete="off" value="" ></div>';

    // add box in div
    $("#liability_premisesHaveElevatorDetails").show();
    $("#liability_premisesHaveElevatorDetails").append(html);
    addEleCount++;
  }*/

  // remove more liability items
  /*$(document).on('click',"[id^=removeEleDescription]",function(){
    $(this).closest('.ele_sections').remove();
    var eleSectionSize = $("[class^=ele_sections]").size();
    
    // change counting number
    $.each($('[class^=ele_sections]'), function( key, value ) {
      // fetch id of element of section
      var counting = key+1;
      // change text of count
      $(this).find("#countEle").text(counting);
      
      $.each($(this).find('input'), function( key2, value2) {

        var eleID = $(this).attr('id');
        
        //console.log(eleID);
        // split id by underscore to get text and can add number at end to create new id and name
        var idTxtArray = eleID.split('_');
        // get sizeof idTxt because we don't know how many _ there
        var idTxtArraySize = idTxtArray.length ; // start with 1
        
        var idTxt = '';
        for(var i = 0; i<idTxtArraySize - 1 ; i++){
          idTxt += idTxtArray[i]+'_';
        }
        idTxt += counting;
        //console.log(idTxt);
        // change id and name of element of section
        $(this).attr('id',idTxt);
        $(this).attr('name',idTxt);
      
      });
      //counting ++;
    });
    // set count in hidden fields
    $("#liability_premisesHaveElevatorDetailsCount").val(eleSectionSize);
    
  });*/


  $("#liability_productsForSale").on('change',function(){
    var liability_productsForSale = $("#liability_productsForSale").val();
    if(liability_productsForSale == "Yes"){
      $("#addProductsForSaleBox").show();
      addRemoveClass('liability_productsForSale','col-md-3','col-md-4');
    }else{
      $("#addProductsForSaleBox").hide();
      // empty box
      $("#liability_productsForSaleDetails").empty();
      $("#liability_productsForSaleDetails").hide();
      addRemoveClass('liability_productsForSale','col-md-4','col-md-3');
      addProductSaleCount = 1;
    }
  });
  /**
    Add more liablity items Product for sale
  **/
  //var addProductSaleCount = 1; // one is by default showing in form
  $("#addProductsForSaleBox").on('click',function(){
    addPFSDescription();
  });
  function addPFSDescription(){
    // get size of section
    var size = $("[id^=liability_productsForSaleTypeOfProduct").size()+1; 
    //console.log(size);
    var addProductSaleCount = size;
    
    // set count in hidden fields
    $("#liability_productsForSaleDetailsCount").val(addProductSaleCount);
    
    var html = '<div class="pfs_sections" data-value="'+addProductSaleCount+'"><label class="col-md-8" style="float: left;"><span id="countPfs">'+addProductSaleCount+'</span>. Type of Product   <i class="fa fa-times" style="cursor: pointer;" id="removePFSDescription_'+addProductSaleCount+'" ></i> </label><input type="text" id="liability_productsForSaleTypeOfProduct_'+addProductSaleCount+'" name="liability_productsForSaleTypeOfProduct_'+addProductSaleCount+'" class="form-control col-md-4 onlyValidText" autocomplete="off" value="" ><label class="col-md-8" style="float: left;">Gross Annual Sales - Canada</label><input type="text" id="liability_productsForSaleGrossAnnualSaleCanada_'+addProductSaleCount+'" name="liability_productsForSaleGrossAnnualSaleCanada_'+addProductSaleCount+'" class="form-control col-md-4 commaValues" autocomplete="off" value="" ><label class="col-md-8" style="float: left;">Gross Annual Sales - USA</label><input type="text" id="liability_productsForSaleGrossAnnualSaleUSA_'+addProductSaleCount+'" name="liability_productsForSaleGrossAnnualSaleUSA_'+addProductSaleCount+'" class="form-control col-md-4 commaValues" autocomplete="off" value="" ><label class="col-md-8" style="float: left;">Gross Annual Sales - Other</label><input type="text" id="liability_productsForSaleGrossAnnualSaleOther_'+addProductSaleCount+'" name="liability_productsForSaleGrossAnnualSaleOther_'+addProductSaleCount+'" class="form-control col-md-4 commaValues" autocomplete="off" value="" ></div>';

    // add box in div
    $("#liability_productsForSaleDetails").show();
    $("#liability_productsForSaleDetails").append(html);
    addProductSaleCount++;
  }

  // remove more liability items
  $(document).on('click',"[id^=removePFSDescription]",function(){
    $(this).closest('.pfs_sections').remove();
    var pfsSectionSize = $("[class^=pfs_sections]").size();

    // change counting number
    $.each($('[class^=pfs_sections]'), function( key, value ) {
      // fetch id of element of section
      var counting = key+1;
      // change text of count
      $(this).find("#countPfs").text(counting);
      
      $.each($(this).find('input'), function( key2, value2) {

        var eleID = $(this).attr('id');
        
        //console.log(eleID);
        // split id by underscore to get text and can add number at end to create new id and name
        var idTxtArray = eleID.split('_');
        // get sizeof idTxt because we don't know how many _ there
        var idTxtArraySize = idTxtArray.length ; // start with 1
        
        var idTxt = '';
        for(var i = 0; i<idTxtArraySize - 1 ; i++){
          idTxt += idTxtArray[i]+'_';
        }
        idTxt += counting;
        //console.log(idTxt);
        // change id and name of element of section
        $(this).attr('id',idTxt);
        $(this).attr('name',idTxt);

      });
      //counting ++;
    });
      // set count in hidden fields
      $("#liability_productsForSaleDetailsCount").val(pfsSectionSize);
      // calculate revenue again when delete section
      var totalRevenueAmount = calculateGrossAnnualReceipt();

      // set revenue in hidden field
      $("#totalRevenue").val(totalRevenue);
  });

  // calculate total revenue based on all gross annual sales - canada in real time
  /*$(document).on('keyup',"[id^=liability_productsForSaleGrossAnnualSaleCanada]",function(){
    var totalRevenueAmount = calculateGrossAnnualReceipt();

    // set revenue in hidden field
    $("#totalRevenue").val(totalRevenue);
  });

  // calculate total revenue based on all gross annual sales - canada in real time
  $(document).on('keyup',"[id^=liability_productsForSaleGrossAnnualSaleUSA]",function(){
    var totalRevenueAmount = calculateGrossAnnualReceipt();

    // set revenue in hidden field
    $("#totalRevenue").val(totalRevenue);
  });

  // calculate total revenue based on all gross annual sales - canada in real time
  $(document).on('keyup',"[id^=liability_productsForSaleGrossAnnualSaleOther]",function(){
    var totalRevenueAmount = calculateGrossAnnualReceipt();

    // set revenue in hidden field
    $("#totalRevenue").val(totalRevenue);
  });*/


 /* $("#liability_typeOfOpsWorkPerform").on('change',function(){
    var liability_typeOfOpsWorkPerform = $("#liability_typeOfOpsWorkPerform").val();
    if(liability_typeOfOpsWorkPerform == "Yes"){
      //$("#addTypeOfOpsWorkPerformBox").show();
      addRemoveClass('liability_typeOfOpsWorkPerform','col-md-3','col-md-4');
    }else{
      //$("#addTypeOfOpsWorkPerformBox").hide();
      // empty box
      $("#liability_typeOfOpsWorkPerformDetails").empty();
      $("#liability_typeOfOpsWorkPerformDetails").hide();
      addRemoveClass('liability_typeOfOpsWorkPerform','col-md-4','col-md-3');
      addTOWFCount = 1;
    }
  });*/
  /**
    Add more liablity items detail type(s) of operations and work performed by applicant
  **/
  //var addTOWFCount = 2; // one is by default showing in form


  $("#addTypeOfOpsWorkPerformBox").on('click',function(e){
    e.preventDefault();
    addtypeOfOpsWorkPerformDescription();
  });




  function addtypeOfOpsWorkPerformDescription(){
    // get size of section
    var size = $("[id^=liability_typeOfOpsWorkPerformOperation").size(); // adding 1 to it because we have default one already
    //console.log(size);
    var addTOWFCount = size;
    
    // set count in hidden fields
    $("#liability_typeOfOpsWorkPerformCount").val(addTOWFCount)+1;
          $.getJSON('json/plumbing_iao.json', function( data ) {
            // object to array
          var arr = Object.keys(data).map(function (key) { return data[key]; });
         
          // array sort
          arr.sort(function(a, b) {
          if (a.desc > b.desc) {
          return 1;
          } else if (a.desc < b.desc) {
          return -1;
          }
          return 0;
          });
        
              var html = `
              <div class="towf_sections" data-value="`+addTOWFCount+`" style="width: 100%;">
                    <span class="col-md-1" style="float: left;text-align: center;"> `+addTOWFCount+`) </span>
                    <label class="col-md-4" style="float: left;">Operation / Product <span class="err">*</span> <i class="fa fa-times" style="cursor: pointer;" id="removeTOWFDescription_`+addTOWFCount+`" ></i> </label>
                  
                    <select id="liability_typeOfOpsWorkPerformOperation_`+addTOWFCount+`" name="liability_typeOfOpsWorkPerformOperation_`+addTOWFCount+`" class="form-control col-md-7 required combobox">
                        <option value="">-Select Operation/Product-</option>
                    `;
              $.each( arr, function( key, val ) {
              html += ` <option data-iao="`+val.iao+`" value="`+val.desc+`">`+val.desc+`</option>`;
              });
              
          html += `</select>

                    <span class="col-md-1" style="float: left;text-align: center;"> &nbsp; </span>
                    <label class="col-md-4" style="float: left;">Number of Employees <span class="err">*</span></label>
                    <input type="text" id="liability_typeOfOpsWorkPerformNoEmployee_`+addTOWFCount+`" name="liability_typeOfOpsWorkPerformNoEmployee_`+addTOWFCount+`" class="form-control col-md-7 commaValues required"  value="" >

                    <span class="col-md-1" style="float: left;text-align: center;"> &nbsp; </span>
                    <label class="col-md-4" style="float: left;">Projected Annual Payroll <span class="err">*</span></label>
                    <input type="text" id="liability_typeOfOpsWorkPerformPayroll_`+addTOWFCount+`" name="liability_typeOfOpsWorkPerformPayroll_`+addTOWFCount+`" class="form-control col-md-7 commaValues required"  value="" >

                    <span class="col-md-1" style="float: left;text-align: center;"> &nbsp; </span>
                    <label class="col-md-4" style="float: left;">Projected Gross Annual Revenue <span class="err">*</span>
                    </label><input type="text" id="liability_typeOfOpsWorkPerformGrossAnnualReceipt_`+addTOWFCount+`" name="liability_typeOfOpsWorkPerformGrossAnnualReceipt_`+addTOWFCount+`" class="form-control col-md-7 commaValues required"  value="" >

                    <span class="col-md-1" style="float: left;text-align: center;"> &nbsp; </span>
                    <label class="col-md-4" style="float: left;">US / Foreign Exposure <span class="err">*</span></label>
                
                     <div class="radio_group required">
                        <input type="radio" id="yes" name="liability_typeOfOpsWorkPerformUsForeignExposure_`+addTOWFCount+`" value="Yes"><span class="radio_title">Yes</span><input type="radio" id="no" name="liability_typeOfOpsWorkPerformUsForeignExposure_`+addTOWFCount+`" value="No"><span class="radio_title">No</span>
                        <span class="radio_error" style="display:none;color: red;">Required.</span>
                        </div> 
                </div>`;

                 $("#liability_typeOfOpsWorkPerformDetails").show();
              $("#liability_typeOfOpsWorkPerformDetails").append(html);
               });
             //console.log( JSON.parse(JSON.stringify(items)) )
             

    // add box in div
   
    addTOWFCount++;
  }


   $("#addElevatorBox").on('click',function(e){
    e.preventDefault();
    addElevatorBox();
  });
  function addElevatorBox(){
    // get size of section
    var size = $("[id^=liability_premisesHaveElevatorDescription_").size()+1; // adding 1 to it because we have default one already
    //console.log(size);
    var addEleCount = size;
    
    // set count in hidden fields
    $("#liability_premisesHaveElevatorDetailsCount").val(addEleCount);
    
    /*var html = '<div class="towf_sections" data-value="'+addTOWFCount+'"><label class="col-md-8" style="float: left;"><span id="countTOWF">'+addTOWFCount+'</span>.  Operation <span class="err">*</span>  <i class="fa fa-times" style="cursor: pointer;" id="removeTOWFDescription_'+addTOWFCount+'" ></i> </label><input type="text" id="liability_typeOfOpsWorkPerformOperation_'+addTOWFCount+'" name="liability_typeOfOpsWorkPerformOperation_'+addTOWFCount+'" class="form-control col-md-4 required"  value="" ><label class="col-md-8" style="float: left;">Number of Employees <span class="err">*</span></label><input type="text" id="liability_typeOfOpsWorkPerformNoEmployee_'+addTOWFCount+'" name="liability_typeOfOpsWorkPerformNoEmployee_'+addTOWFCount+'" class="form-control col-md-4 required"  value="" ><label class="col-md-8" style="float: left;">Payroll <span class="err">*</span></label><input type="text" id="liability_typeOfOpsWorkPerformPayroll_'+addTOWFCount+'" name="liability_typeOfOpsWorkPerformPayroll_'+addTOWFCount+'" class="form-control col-md-4 commaValues required"  value="" ><label class="col-md-8" style="float: left;">Gross Annual Receipts <span class="err">*</span></label><input type="text" id="liability_typeOfOpsWorkPerformGrossAnnualReceipt_'+addTOWFCount+'" name="liability_typeOfOpsWorkPerformGrossAnnualReceipt_'+addTOWFCount+'" class="form-control col-md-4 commaValues required"  value="" ></div>';*//*<input type="text" id="liability_typeOfOpsWorkPerformOperation_'+addTOWFCount+'" name="liability_typeOfOpsWorkPerformOperation_'+addTOWFCount+'" class="form-control col-md-7 onlyValidText required" autocomplete="off" value="" >*/

    var html = `  <div class="ele_sections" style="width: 100%;" data-value="`+addEleCount+`">
                    <span class="col-md-1" style="float: left;text-align: center;"> <span id="countElev">`+addEleCount+`</span>) </span>
                    <label class="col-md-4" style="float: left;">Description <i class="fa fa-times" style="cursor: pointer;" id="removeEleDescription_`+addEleCount+`"></i></label>
                    <input type="text" id="liability_premisesHaveElevatorDescription_`+addEleCount+`" name="liability_premisesHaveElevatorDescription_`+addEleCount+`" class="form-control col-md-7"  value="" >
                    
                    <span class="col-md-1" style="float: left;text-align: center;"> &nbsp; </span>
                    <label class="col-md-4" style="float: left;">Number</label>
                    <input type="text" id="liability_premisesHaveElevatorNumber_`+addEleCount+`" name="liability_premisesHaveElevatorNumber_`+addEleCount+`" class="form-control col-md-7 commaValues"  value="" >

                    <span class="col-md-1" style="float: left;text-align: center;"> &nbsp; </span>
                    <label class="col-md-4" style="float: left;">Location </label>
                    <input type="text" id="liability_premisesHaveElevatorLocation_`+addEleCount+`" name="liability_premisesHaveElevatorLocation_`+addEleCount+`" class="form-control col-md-7 commaValues"  value="" >                   
                </div>`;

    // add box in div
    $("#liability_premisesHaveElevatorDetails").show();
    $("#liability_premisesHaveElevatorDetails").append(html);
    addEleCount++;
  }

  // remove more liability items
  $(document).on('click',"[id^=removeTOWFDescription]",function(){
    $(this).closest('.towf_sections').remove();
    
    // change counting number
    $.each($('[class^=towf_sections]'), function( key, value ) {
      // fetch id of element of section
      var counting = key+1;
      // change text of count
      $(this).find("#countTOWF").text(counting);
      // Change id number on each input
      $($(this).find('input,select')).each(function( key2, value2) {

        var eleID = $(this).attr('id');
        
        //console.log(eleID);
        // split id by underscore to get text and can add number at end to create new id and name
        var idTxtArray = eleID.split('_');
        // get sizeof idTxt because we don't know how many _ there
        var idTxtArraySize = idTxtArray.length ; // start with 1
        
        var idTxt = '';
        for(var i = 0; i<idTxtArraySize - 1 ; i++){
          idTxt += idTxtArray[i]+'_';
        }
        idTxt += counting;
        //console.log(idTxt);
        // change id and name of element of section
        $(this).attr('id',idTxt);
        $(this).attr('name',idTxt);
        //console.log(counting);
    
        // set count in hidden fields
        $("#liability_typeOfOpsWorkPerformCount").val($("[id^=liability_typeOfOpsWorkPerformOperation").size());

      });

      //counting ++;
    });   
    
    // calculate revenue again when delete section
    var totalRevenueAmount = calculateGrossAnnualReceipt();

    // set revenue in hidden field
    $("#totalRevenue").val(totalRevenue);
  });

   // remove more liability items
  $(document).on('click',"[id^=removeEleDescription]",function(){
    $(this).closest('.ele_sections').remove();
    
    // change counting number
    $.each($('[class^=ele_sections]'), function( key, value ) {
      // fetch id of element of section
      var counting = key+1;
      // change text of count
      $(this).find("#countElev").text(counting);
      // Change id number on each input
      $($(this).find('input,select')).each(function( key2, value2) {

        var eleID = $(this).attr('id');
        
        //console.log(eleID);
        // split id by underscore to get text and can add number at end to create new id and name
        var idTxtArray = eleID.split('_');
        // get sizeof idTxt because we don't know how many _ there
        var idTxtArraySize = idTxtArray.length ; // start with 1
        
        var idTxt = '';
        for(var i = 0; i<idTxtArraySize - 1 ; i++){
          idTxt += idTxtArray[i]+'_';
        }
        idTxt += counting;
        //console.log(idTxt);
        // change id and name of element of section
        $(this).attr('id',idTxt);
        $(this).attr('name',idTxt);
    
        // set count in hidden fields
        $("#liability_premisesHaveElevatorDetailsCount").val($("[id^=liability_premisesHaveElevatorDescription_").size());

      });

      //counting ++;
    });
});
  // calculate total revenue based on all gross annual receipts in real time
  $(document).on('keyup',"[id^=liability_typeOfOpsWorkPerformGrossAnnualReceipt]",function(){
    var totalRevenueAmount = calculateGrossAnnualReceipt();

    // set revenue in hidden field
    $("#totalRevenue").val(totalRevenue);
  });

  var iao = [];
  // SET DATA_IAO attribute to each select element of operation/product in plumbing
  $(document).on('change',"[id^=liability_typeOfOpsWorkPerformOperation]",function(){
    var id = $(this).attr('name');
    saveIAO(id);
  });

  // SET DATA_IAO attribute to each select element of operation/product in plumbing
  $(document).on('change',"[id^=liability_typeOfOpsWorkPerformGrossAnnualReceipt]",function(){
    var id = $(this).attr('name');
    saveIAO(id);
  });

  function saveIAO(id){
    //seperate number from id
    var count = id.split('_'); // 0-liability 1-typeOfOpsWorkPerformOperation 2-count
    var i = count[2]-1; // array start with 0 and count start with 1 so deduct 1
    var getIAO = $("#liability_typeOfOpsWorkPerformOperation_"+count[2]).find('option:selected').attr('data-iao');
    
    //get gross annual reciepts 
    var annualReceipts = removeCommas($("#liability_typeOfOpsWorkPerformGrossAnnualReceipt_"+count[2]).val());
    //get projected annual payroll
    var annualPayroll = removeCommas($("#liability_typeOfOpsWorkPerformPayroll_"+count[2]).val());
    
    if(getIAO != ''){
      iao[i] = getIAO+'-'+annualReceipts+'-'+annualPayroll;
    }
    
    //console.log(iao);
    $("#liability_typeOfOpsWorkPerformIAO").val(iao);
  }
  
  var totalRevenue;
  // Calculate revenue - Plumbing Form
  function calculateGrossAnnualReceipt(){
    totalRevenue =  0;
    $.each($('[id^=liability_typeOfOpsWorkPerformGrossAnnualReceipt]'), function( key, value ) {
      var currentRowVal = parseInt($(this).val().replace(/,/g , ''));
      if(currentRowVal == '' ||  isNaN(currentRowVal)){
        currentRowVal = 0;
      }
      //console.log(currentRowVal);
      totalRevenue += currentRowVal; 
    });

    // it also include product of sales gross annual sales
    /*$.each($('[id^=liability_productsForSaleGrossAnnualSaleCanada]'), function( key, value ) {
      var currentRowVal = parseInt($(this).val().replace(/,/g , ''));
      if(currentRowVal == '' ||  isNaN(currentRowVal)){
        currentRowVal = 0;
      }
      //console.log(currentRowVal);
      totalRevenue += currentRowVal; 
    });

    // it also include product of sales gross annual sales
    $.each($('[id^=liability_productsForSaleGrossAnnualSaleUSA]'), function( key, value ) {
      var currentRowVal = parseInt($(this).val().replace(/,/g , ''));
      if(currentRowVal == '' ||  isNaN(currentRowVal)){
        currentRowVal = 0;
      }
      //console.log(currentRowVal);
      totalRevenue += currentRowVal; 
    });

    // it also include product of sales gross annual sales
    $.each($('[id^=liability_productsForSaleGrossAnnualSaleOther]'), function( key, value ) {
      var currentRowVal = parseInt($(this).val().replace(/,/g , ''));
      if(currentRowVal == '' ||  isNaN(currentRowVal)){
        currentRowVal = 0;
      }
      //console.log(currentRowVal);
      totalRevenue += currentRowVal; 
    });*/

    return totalRevenue;
  }
  

  
  // Show description box for contractual list for all leased agreement etc on Liability Tab
  //$("#liability_contractualListLeaseEtc").on('click',function(){
    $("input[type=radio][name=liability_contractualListLeaseEtc]").on('change',function(){
      //fieldOpenHide('liability_contractualListLeaseEtc','Yes','','ifcontractualListLeaseEtcDescBox',['liability_contractualListLeaseEtcDesc'],'');
      var liability_contractualListLeaseEtc =  this.value;

      if(liability_contractualListLeaseEtc == "Yes"){
        $(".ifcontractualListLeaseEtcDescBox").show();
      }else{
        $(".ifcontractualListLeaseEtcDescBox").hide();
        // empty value if user fill up anything with yes and then select no again
        $("#liability_contractualListLeaseEtcDesc").val('');
        $("#liability_contractualListLeaseEtcRailwaySiding").val('');
      }
  });
  // Show fields for Work sublet out field on Liability Tab
  //$("#liability_workSubletOut").on('change',function(){
    $("input[type=radio][name=liability_workSubletOut]").on('change',function(){
      //fieldOpenHide('liability_workSubletOut','Yes','','ifworkSubletOutBox',['liability_wsoCost','liability_wsoType','liability_wsoSubConLiablityInsurance','liability_wsoSubConLiabilityInsuranceLimits','liability_wsoAskSubConSubmitLiabilityInsurance','liability_wsoSubConLiabilityInsuranceAdditionInsured','liability_wsoSubConLiabilityInsuranceFormalAgreement','liability_wsoSubConLiabilityInsuranceFormalAgreementHoldHarmless'],'');
      var liability_workSubletOut = this.value;
      if(liability_workSubletOut == "Yes"){
        $("#ifworkSubletOutBox").show();
        $(".work_sublet").addClass('work_sublet_style');
      }else{
        $("#ifworkSubletOutBox").hide();
         $(".work_sublet").removeClass('work_sublet_style');
        // hide nested box also
        $("#ifwsoSubContractorLiablityInsuranceBox").hide();
        $("#ifwsoSubConLiabilityInsuranceFormalAgreementBox").hide();
        // empty value if user fill up anything with yes and then select no again
        $("#liability_wsoCost").val('');
        $("#liability_wsoType").val('');
        console.log("here i am");
         /*$(':radio').each(function() {
          $(this).removeAttr('checked');
          $('input[type="radio"]').prop('checked', false);
        })*/
        $("input[type=radio][name=liability_wsoSubConLiablityInsurance]").removeAttr("checked");
        $("input[type=radio][name=liability_wsoSubConLiablityInsurance]").prop('checked', false);

        $("input[type=radio][name=liability_wsoSubConLiabilityInsuranceLimits]").removeAttr("checked");
        $("input[type=radio][name=liability_wsoSubConLiabilityInsuranceLimits]").prop('checked', false);

        $("input[type=radio][name=liability_wsoAskSubConSubmitLiabilityInsurance]").removeAttr("checked");
        $("input[type=radio][name=liability_wsoAskSubConSubmitLiabilityInsurance]").prop('checked', false);

        $("input[type=radio][name=liability_wsoSubConLiabilityInsuranceAdditionInsured]").removeAttr("checked");
        $("input[type=radio][name=liability_wsoSubConLiabilityInsuranceAdditionInsured]").prop('checked', false);

        $("input[type=radio][name=liability_wsoSubConLiabilityInsuranceFormalAgreement]").removeAttr("checked");
        $("input[type=radio][name=liability_wsoSubConLiabilityInsuranceFormalAgreement]").prop('checked', false);

        $("input[type=radio][name=liability_wsoSubConLiabilityInsuranceFormalAgreementHoldHarmless]").removeAttr("checked");
        $("input[type=radio][name=liability_wsoSubConLiabilityInsuranceFormalAgreementHoldHarmless]").prop('checked', false);

      }
  });
  // Show fields box for sub contractor liablity insurance for work sublet out on Liability Tab
 // $("#liability_wsoSubConLiablityInsurance").on('change',function(){
     $("input[type=radio][name=liability_wsoSubConLiablityInsurance]").on('change',function(){
      //fieldOpenHide('liability_wsoSubConLiablityInsurance','Yes','','ifwsoSubContractorLiablityInsuranceBox',['liability_wsoSubConLiabilityInsuranceLimits','liability_wsoAskSubConSubmitLiabilityInsurance','liability_wsoSubConLiabilityInsuranceAdditionInsured','liability_wsoSubConLiabilityInsuranceFormalAgreement','liability_wsoSubConLiabilityInsuranceFormalAgreementHoldHarmless'],'');
      var liability_wsoSubConLiablityInsurance = this.value;
      if(liability_wsoSubConLiablityInsurance == "Yes"){
        $("#ifwsoSubContractorLiablityInsuranceBox").show();
      }else{
        $("#ifwsoSubContractorLiablityInsuranceBox").hide();
        // hide nested box also
        $("#ifwsoSubConLiabilityInsuranceFormalAgreementBox").hide();
        // empty value if user fill up anything with yes and then select no again
        $("input[type=radio][name=liability_wsoSubConLiabilityInsuranceLimits]").removeAttr("checked");
        $("input[type=radio][name=liability_wsoSubConLiabilityInsuranceLimits]").prop('checked', false);

        $("input[type=radio][name=liability_wsoAskSubConSubmitLiabilityInsurance]").removeAttr("checked");
        $("input[type=radio][name=liability_wsoAskSubConSubmitLiabilityInsurance]").prop('checked', false);

        $("input[type=radio][name=liability_wsoSubConLiabilityInsuranceAdditionInsured]").removeAttr("checked");
        $("input[type=radio][name=liability_wsoSubConLiabilityInsuranceAdditionInsured]").prop('checked', false);

        $("input[type=radio][name=liability_wsoSubConLiabilityInsuranceFormalAgreement]").removeAttr("checked");
        $("input[type=radio][name=liability_wsoSubConLiabilityInsuranceFormalAgreement]").prop('checked', false);

        $("input[type=radio][name=liability_wsoSubConLiabilityInsuranceFormalAgreementHoldHarmless]").removeAttr("checked");
        $("input[type=radio][name=liability_wsoSubConLiabilityInsuranceFormalAgreementHoldHarmless]").prop('checked', false);

      }
  });
  // Show description box for contractual list for all leased agreement etc on Liability Tab
  //$("#liability_wsoSubConLiabilityInsuranceFormalAgreement").on('change',function(){

/*    $("input[type=radio]").on('change',function(){
      var name = this.name;
      $('input[name='+name+']:nth-child(3)').attr('checked', 'checked');

    });*/

 $("input[type=radio][name=liability_wsoSubConLiabilityInsuranceFormalAgreement]").on('change',function(){
      //fieldOpenHide('liability_wsoSubConLiabilityInsuranceFormalAgreement','Yes','','ifwsoSubConLiabilityInsuranceFormalAgreementBox',['liability_wsoSubConLiabilityInsuranceFormalAgreementHoldHarmless'],'');
   var liability_wsoSubConLiabilityInsuranceFormalAgreement =  this.value;

      if(liability_wsoSubConLiabilityInsuranceFormalAgreement == "Yes"){
        $("#ifwsoSubConLiabilityInsuranceFormalAgreementBox").show();
      }else{
        $("#ifwsoSubConLiabilityInsuranceFormalAgreementBox").hide();
        // empty value if user fill up anything with yes and then select no again
        $("#liability_wsoSubConLiabilityInsuranceFormalAgreementHoldHarmless").val('');
      }
  });

  // show if no fields for are all employees covered by workmens compensation field on Liability Tab
 /* $("#liability_employeesCoveredByCompensation").on('change',function(){
      fieldOpenHide('liability_employeesCoveredByCompensation','No','','ifemployeesCoveredByCompensationBox',['liability_employeesCoveredByCompensationNumberTypesEmployessNotCovered','liability_employeesCoveredByCompensationActualPayrollIfNo'],'');
  });*/

   //$("#liability_employeesCoveredByCompensation").on('click',function(){
    $("input[type=radio][name=liability_employeesCoveredByCompensation]").on('change',function(){
      //fieldOpenHide('liability_contractualListLeaseEtc','Yes','','ifcontractualListLeaseEtcDescBox',['liability_contractualListLeaseEtcDesc'],'');
      var liability_employeesCoveredByCompensation =  this.value;

      if(liability_employeesCoveredByCompensation == "No"){
        $("#ifemployeesCoveredByCompensationBox").show();
      }else{
        $("#ifemployeesCoveredByCompensationBox").hide();
        // empty value if user fill up anything with yes and then select no again
        $("#liability_employeesCoveredByCompensationNumberTypesEmployessNotCovered").val('');
        $("#liability_employeesCoveredByCompensationActualPayrollIfNo").val('');
      }
  });

  // show If Yes, adise number and occupation of Employees for Is Employers' Liability Required field on Liability Tab
  $("#liability_employerLiablity").on('change',function(){
      fieldOpenHide('liability_employerLiablity','Yes','','ifemployerLiablityBox',['liability_employerLiablityAdiseNumberOccupationEmployees'],'');
  });

  // show fields for Tenants Legal Liability field on Liability Tab
  $("#liability_tenantsLegalLiability").on('change',function(){
      fieldOpenHide('liability_tenantsLegalLiability','Yes','','ifTenantsLegalLiabilityBox',['liability_tenantsLegalLiabilityLocation','liability_tenantsLegalLiabilityAmount','liability_tenantsLegalLiabilityAgreement'],'');
  });

  // show If Yes, Details of operations fields for Is any welding equipment usage (welder, blowtorches, etc)? field on Liability Tab
 /* $("#liability_anyWeldingEquipUsage").on('click',function(){
      fieldOpenHide('liability_anyWeldingEquipUsage','true','','ifanyWeldingEquipUsageBox',['liability_anyWeldingEquipUsageDetails'],'');
  });*/
    // Show description box for contractual list for all leased agreement etc on Liability Tab
  //$("#liability_anyWeldingEquipUsage").on('click',function(){
     $("input[type=radio][name=liability_anyWeldingEquipUsage]").on('change',function(){
      //fieldOpenHide('liability_contractualListLeaseEtc','Yes','','ifcontractualListLeaseEtcDescBox',['liability_contractualListLeaseEtcDesc'],'');
      var liability_anyWeldingEquipUsage =  this.value;

      if(liability_anyWeldingEquipUsage == "Yes"){
        $("#ifanyWeldingEquipUsageBox").show();
      }else{
        $("#ifanyWeldingEquipUsageBox").hide();
        // empty value if user fill up anything with yes and then select no again
        $("#liability_anyWeldingEquipUsageDetails").val('');
      }
  });

  // show State Limit of Liability required fields for Do you have any special agreement/s with Dept. of Lands and Forest? field on Liability Tab
  /*$("#liability_specialAgreement").on('change',function(){
      fieldOpenHide('liability_specialAgreement','Yes','','ifspecialAgreementBox',['liability_specialAgreementStateLimit'],'');
  });*/


  /**
  OPEN SUBFORM WHEN FOCUS OUT OF FIELD
  **/
  function openUpSubForm(sfClassName,type){
    if(type == "toggle"){
      $("."+sfClassName).toggle();
    }
    if(type == "open"){
      // show process if sub form not opened
      if($("."+sfClassName).is(":hidden")){
        // show process of opening sub form 
        $("#processSF").show();
        $("#processSF").text('Opening subform ...');
        setTimeout(function(){
          // hide process of opening sub form 
          $("#processSF").hide();
          $("."+sfClassName).show();
        },1000);
      } 
    }
  }
  /** 
  OPEN SUBFORM
  **/
  $("#openCEF").on('click',function(){
    openUpSubForm("subformCEF",'toggle');
  });
  // open up subform when leave field
  $(document).on("focusout", "#coverage_CEF", function(){
    // get value
    var coverage_CEF = $.trim($("#coverage_CEF").val());
    if(coverage_CEF != '' && coverage_CEF != "0"){
      openUpSubForm("subformCEF",'open');  
    }    
  });

  //var addEquipScheCount=2;

  /**
  NOTE : Label is added before input fields on table because label display at Review form at the end
  **/
  $("#addEquipmentSchedule").on('click',function(){
    // get size of section
    var size = $("[id^=equipmentScheduleYear").size()+1; // adding 1 to it because we have default one already
    //console.log(size);
    var addEquipScheCount = size;
    // set count in hidden fields
    $("#equipmentScheduleCount").val(addEquipScheCount);
  
    var row = "<tr class='equipScheRow'><td><span id='equipScheCount'>"+addEquipScheCount+" </span></td><td><label class='hideLabel sf'><span id='equipScheCountYear'>"+addEquipScheCount+"</span>. Year <span class='err'>*</span></label><input type='text' class='form-group onlyNumbers sf required' id='equipmentScheduleYear_"+addEquipScheCount+"' name='equipmentScheduleYear_"+addEquipScheCount+"' maxlength='4'  autocomplete='off' /></td><td><label class='hideLabel sf'>Manufacturer <span class='err'>*</span></label><input type='text' class='form-group onlyValidText required' id='equipmentScheduleManufacturer_"+addEquipScheCount+"' name='equipmentScheduleManufacturer_"+addEquipScheCount+"'  autocomplete='off' /></td><td><label class='hideLabel sf'>Description <span class='err'>*</span></label><input type='text' class='form-group onlyValidText required' id='equipmentScheduleDescription_"+addEquipScheCount+"' name='equipmentScheduleDescription_"+addEquipScheCount+"' autocomplete='off' /></td><td><label class='hideLabel sf'>Serial No <span class='err'>*</span></label><input type='text' class='form-group onlyValidText required' id='equipmentScheduleSerialNo_"+addEquipScheCount+"' name='equipmentScheduleSerialNo_"+addEquipScheCount+"' autocomplete='off' /></td><td><label class='hideLabel sf'>Amount <span class='err'>*</span></label><input type='text' class='form-group commaValues required' id='equipmentScheduleAmount_"+addEquipScheCount+"' name='equipmentScheduleAmount_"+addEquipScheCount+"' autocomplete='off' /></td><td><i class='fa fa-trash' style='cursor: pointer;' data-toggle='tooltip' title='Delete Row' id='removeEquipSche_"+addEquipScheCount+"' ></i> </td></tr>";
    // append table row
    $("#equipmentScheduleTable tbody").append(row);

    var totalAmount = calculateEquipmentScheduleTotalAmount();

    //var lastRow = "<tr><td colspan='6' style='text-align:right;'> "+totalAmount+" </td></tr>";
    //$("#equipmentScheduleTable tbody").append(lastRow);
    var lastRow = "<p style='text-align:right;'> "+totalAmount+" </p>";
    $("#totalAmountES").html(lastRow);
    addEquipScheCount++;
  });

  // remove CEF Equipment Schedule items
  $(document).on('click',"[id^=removeEquipSche]",function(){
    $(this).closest('.equipScheRow').remove();
    
    // change counting number
    $.each($('[class^=equipScheRow]'), function( key, value ) {
      // fetch id of element of section
      var counting = key+1;
      // change text of count
      $(this).find("#equipScheCount").text(key+1);
      $(this).find("#equipScheCountYear").text(key+1); // this value show count near Label Year in review so easy to understand count of schedules
      
      $.each($(this).find('input'), function( key2, value2) {

        var eleID = $(this).attr('id');
        
        //console.log(eleID);
        // split id by underscore to get text and can add number at end to create new id and name
        var idTxtArray = eleID.split('_');
        // get sizeof idTxt because we don't know how many _ there
        var idTxtArraySize = idTxtArray.length ; // start with 1
        
        var idTxt = '';
        for(var i = 0; i<idTxtArraySize - 1 ; i++){
          idTxt += idTxtArray[i]+'_';
        }
        idTxt += counting;
        //console.log(idTxt);
        // change id and name of element of section
        $(this).attr('id',idTxt);
        $(this).attr('name',idTxt);
    
        // set count in hidden fields
        $("#equipmentScheduleCount").val(counting);

        fixEquipmentScheduleTotalAmount();
      });
      //counting ++;
    });
  });
  
  
  $(document).on('change',".checkbox_custom",function(){
   if($(this).is(':checked')){
   // console.log("fdgfhd");
    this.setAttribute("checked", "checked");
   }else{
    this.removeAttribute("checked");
   }
  });
  // add equipment schedule amount in real time
  $(document).on('keyup',"[id^=equipmentScheduleAmount]",function(){
    fixEquipmentScheduleTotalAmount();
  });


  function getCEFScheduleLimitTotal(riskProvince){
    var cefScheduleLimit = 250000; // By Default

    // FIND CEF EQUIPMENT SCHEDULE LIMIT BY TOTAL AND BY ITEM
    /*$.getJSON(formPrefix+'getCEFScheduleLimit', function(data) { 
      // set values as per form selected
      cefScheduleLimit = data[0][rtqFormGlobal]['cefSceduleLimit'][riskProvince]['limitByTotal'];
      console.log(data[0][rtqFormGlobal]['cefSceduleLimit'][riskProvince]);
    }); */

    $.ajax({
      url:formPrefix+'getCEFScheduleLimit',
      method:"get",
      data: {_token:$('meta[name="csrf-token"]').attr('content')},
      datatype: 'json',
      async : false,
      success: function(data){
        // set values as per form selected
        cefScheduleLimit = data[0][rtqFormGlobal]['cefSceduleLimit'][riskProvince]['limitByTotal'];
        //console.log(data[0][rtqFormGlobal]['cefSceduleLimit'][riskProvince]);
      },
      error: function(data){
        //console.log(data);
      }
    }); 
    return cefScheduleLimit;
  }

  // set real time equipment schedule amount and related fields when delete row of table
  function fixEquipmentScheduleTotalAmount(){
    var totalAmount = calculateEquipmentScheduleTotalAmount();
    
    // get risk address province
    var riskProvince = $("#risk_address_province").val();
    if(riskProvince == '' || riskProvince == null){
      riskProvince = "Ontario";
    }

    var cefScheduleLimit = getCEFScheduleLimitTotal(riskProvince);
    //console.log("cefScheduleLimit "+cefScheduleLimit);
    //SHOW CEF SCHEDULE LIMT ON TABLE HEADER
    $("#cefScheduleLimitHeader").text(commaSeparateNumber(cefScheduleLimit));

    // if total amount of equipment schedule items exceeds more than 500,000
    if(totalAmount > cefScheduleLimit){
      var lastRow = "<p style='text-align:right;' id='totalEquipScheAmount'> <b>Total Amount > </b> "+commaSeparateNumber(cefScheduleLimit)+" </p>";
      $("#totalAmountES").html(lastRow);
      totalAmountFinal = cefScheduleLimit;
    }else{
      var lastRow = "<p style='text-align:right;' id='totalEquipScheAmount'> <b>Total Amount : </b> "+commaSeparateNumber(totalAmount)+" </p>";
      $("#totalAmountES").html(lastRow);
      totalAmountFinal = commaSeparateNumber(totalAmount);
    }
  
    // set amount in description texts below this table
    $(".setTotalAmountEquipSche").text(totalAmountFinal);
    // show total amount , not final one if exceeds more than 500,000
    $("#equipmentScheduleTotalAmount").val(totalAmount);
    // get 5% of total amount and add it in description below it
    
    var tmf = removeCommas(totalAmountFinal);
    var amount5Per = (tmf*5)/100;
    // get default value for deductible clause B 
    var defaultB = removeCommas($("#equipmentScheduleDefaultB").val());
    if(amount5Per < defaultB){
      $(".setTotalAmountEquipSche5per").text(commaSeparateNumber(defaultB));
      // set value in hidden field used for back end
      $("#setTotalAmountEquipSche5perForJson").val(commaSeparateNumber(defaultB));
    }else{
      $(".setTotalAmountEquipSche5per").text(commaSeparateNumber(amount5Per));
      // set value in hidden field used for back end
      $("#setTotalAmountEquipSche5perForJson").val(commaSeparateNumber(amount5Per));
    }
  }

  // Calculate CEF subform equipment schedule total Amount in realtime
  function calculateEquipmentScheduleTotalAmount(){
    var totalAmountEquipSchedule = 0;
    $.each($('[id^=equipmentScheduleAmount]'), function( key, value ) {
      var currentRowVal = parseInt($(this).val().replace(/,/g , ''));
      if(currentRowVal == '' ||  isNaN(currentRowVal)){
        currentRowVal = 0;
      }
      //console.log(currentRowVal);
      totalAmountEquipSchedule += currentRowVal; 
    });
    return totalAmountEquipSchedule;
  }

  /** Display error for required fields in subform **/

  function showSubformErrorMSG(sfField,sfClassName){

    // get field value
    var sfFieldVal = $("#"+sfField).val();

    if(sfFieldVal != '' && sfFieldVal != null && sfFieldVal != 0){
      //console.log('Value');
      // get subForm all required fields      
      $.each($('.'+sfClassName), function( key, value ) {
        //console.log(sfClassName);
        // get all required input and select fields
        var valid = false;
        $(this).find('input.required,select.required').each( function( key, value ) {
          if($(this).css("visibility") == "hidden" || $(this).css('display') == 'none' || $(this).closest('div').parent('div').css('display') == 'none' || $(this).parent('div').css('display') == 'none'){
            //console.log($(this).attr('name')+'    not visible');
          }else{
            // check if all required fields are correct and there is no error
            var total_error = $(this).prev('label').find('.err2').length;
            //console.log("TE "+total_error);
            //console.log($(this).attr('id'));
            if (total_error > 0 ) { 
              valid = false; 
              return false;
            } else {
              valid = true;
            } 
            //console.log($(this).attr('name')+'    '+valid);
          }
        });

        // if valid false means there is required fields which don't have value   
        if(valid == false){
          $("#"+sfClassName+"_MSG").show();
          // make icon in label red to notify user about subform
          //$("#"+sfClassName+"_MSG").next('label').find('i').css('color','red');
          $("#"+sfClassName+"_MSG").parent().find('i').css('color','red');
        }else{
          $("#"+sfClassName+"_MSG").hide();
          // remove icon in label from red 
          //$("#"+sfClassName+"_MSG").next('label').find('i').css('color','');
          $("#"+sfClassName+"_MSG").parent().find('i').css('color','');
        }

      });
    }else{
      //console.log('No Value');

      $.each($('.'+sfClassName), function( key, value ) {
        //console.log(sfClassName);
        // get all required input and select fields and remove error classes err2 and invalid
        var valid = false;
        $(this).find('input.required,select.required').each( function( key, value ) {
          // check if span has nestedBox class then remove class err2 from next span
          if($(this).prev('label').find('span').hasClass('nestedBox') || $(this).prev('label').find('span').hasClass('optionalBox')){
            $(this).prev('label').find('span').next('span').removeClass('err2');
          }else{
            $(this).prev('label').find('span').removeClass('err2');  
          }
          // remove class invalid
          $(this).removeClass('invalid');

          var total_error = $(this).prev('label').find('.err2').length;
          //console.log('SUBFORM TOTAL ERROR : '+total_error);

        });
        // HIDE ERROR MESSAGE
        $("#"+sfClassName+"_MSG").hide();
        // remove icon in label from red 
        //$("#"+sfClassName+"_MSG").next('label').find('i').css('color','');
        $("#"+sfClassName+"_MSG").parent().find('i').css('color','');

      });
    }
  }

  /**************************************************/
  
  var totalTIVLimit ;
  // get real time TIV Limits
  function getTIV(){
    totalTIVLimit = 0;

    $.each($('.getTIV'), function( key, value ) {
      var currentVal = parseInt($(this).val().replace(/,/g , ''));
      if(currentVal == '' ||  isNaN(currentVal)){
        currentVal = 0;
      }
      //console.log("currentVal "+currentVal);
      totalTIVLimit += currentVal;
    });
    // set tiv in hidden field to send it to backend
    $("#tivLimit").val(totalTIVLimit);
    //console.log("TIV "+totalTIVLimit);
    return totalTIVLimit;
  }

  var buildingAge = 0;
  $(document).on('keyup',"#buildingConstruction_yearBuilt",function(){
      var currentYear = new Date().getFullYear();
        //console.log("Current Year "+currentYear);
        buildingAge = currentYear - $(this).val();
        if(buildingAge >=25){
          if(!$("#buildingConstruction_roofYearUpdated").parent().find("label").find('span').hasClass('err'))
          $("#buildingConstruction_roofYearUpdated").parent().find("label").append("<span class='err'> *</span>");

          $("#buildingConstruction_roofYearUpdated").addClass("required");

           if(!$("#buildingConstruction_wiringYearUpdated").parent().find("label").find('span').hasClass('err'))
          $("#buildingConstruction_wiringYearUpdated").parent().find("label").append("<span class='err'> *</span>");

          $("#buildingConstruction_wiringYearUpdated").addClass("required");

           if(!$("#buildingConstruction_heatingYearUpdated").parent().find("label").find('span').hasClass('err'))
          $("#buildingConstruction_heatingYearUpdated").parent().find("label").append("<span class='err'> *</span>");

          $("#buildingConstruction_heatingYearUpdated").addClass("required");

           if(!$("#buildingConstruction_plumbingYearUpdated").parent().find("label").find('span').hasClass('err'))
          $("#buildingConstruction_plumbingYearUpdated").parent().find("label").append("<span class='err'> *</span>");

          $("#buildingConstruction_plumbingYearUpdated").addClass("required");

        }else{
          //if(!$("#buildingConstruction_wiringYearUpdated").parent().find("label").find('span').hasClass('err'))
          $("#buildingConstruction_roofYearUpdated").parent().find("label").find("span.err").remove();
          $("#buildingConstruction_roofYearUpdated").removeClass("required");

           $("#buildingConstruction_wiringYearUpdated").parent().find("label").find("span.err").remove();
          $("#buildingConstruction_wiringYearUpdated").removeClass("required");

           $("#buildingConstruction_heatingYearUpdated").parent().find("label").find("span.err").remove();
          $("#buildingConstruction_heatingYearUpdated").removeClass("required");

           $("#buildingConstruction_plumbingYearUpdated").parent().find("label").find("span.err").remove();
          $("#buildingConstruction_plumbingYearUpdated").removeClass("required");
        }
        //console.log("buildingAge 1 "+buildingAge);
        console.log(buildingAge);
        
  });
  // GET building Age in realtime
  function getBuildingAge(){
    var currentYear = new Date().getFullYear();
    $(document).on('keyup',"#buildingConstruction_yearBuilt",function(){
        //console.log("Current Year "+currentYear);
        buildingAge = currentYear - $(this).val();
        //console.log("buildingAge 2 "+buildingAge);
        
    });
    return buildingAge;
  }
// Get difference of enetered year from current year, if no value added then it consider as 0
  function getYearDiff(val){
    var currentYear = new Date().getFullYear();
    
    if(val != '' && val != null){
      return currentYear - val;
    }else{
      return 0;
    }
  }

  var buildingUpdatedAge = 0;
  /** GET BUILDING YEAR UPDATED IF OVER 25 or UNDER**/
  function getBuildingUpdated(){
    // make array
    var yearUpdated = {};
    // get all updated building values
    if($("#buildingConstruction_roofYearUpdated").val() != '' && $("#buildingConstruction_roofYearUpdated").val() != null){
      var roofUpdated = getYearDiff($("#buildingConstruction_roofYearUpdated").val());
      yearUpdated["roofUpdated"] = roofUpdated;  
    }
    if($("#buildingConstruction_wiringYearUpdated").val() != '' && $("#buildingConstruction_wiringYearUpdated").val() != null){
      var wiringUpdated = getYearDiff($("#buildingConstruction_wiringYearUpdated").val());
      yearUpdated["wiringUpdated"] = wiringUpdated;  
    }
    if($("#buildingConstruction_heatingYearUpdated").val() != '' && $("#buildingConstruction_heatingYearUpdated").val() != null){
      var heatUpdated = getYearDiff($("#buildingConstruction_heatingYearUpdated").val());
      yearUpdated["heatUpdated"] = heatUpdated;  
    }
    if($("#buildingConstruction_plumbingYearUpdated").val() != '' && $("#buildingConstruction_plumbingYearUpdated").val() != null){
      var plumbingUpdated = getYearDiff($("#buildingConstruction_plumbingYearUpdated").val());
      yearUpdated["plumbingUpdated"] = plumbingUpdated;  
    }
    console.log(yearUpdated);
    /*var roofUpdated = getYearDiff($("#buildingConstruction_roofYearUpdated").val());
    var wiringUpdated = getYearDiff($("#buildingConstruction_wiringYearUpdated").val());
    var heatUpdated = getYearDiff($("#buildingConstruction_heatingYearUpdated").val());
    var plumbingUpdated = getYearDiff($("#buildingConstruction_plumbingYearUpdated").val());*/

    //var yearUpdated = {"roofUpdated":roofUpdated,"wiringUpdated":wiringUpdated,"heatUpdated":heatUpdated,"plumbingUpdated":plumbingUpdated};
    //console.log(yearUpdated);
    // get max year updated [ year updated long before so get age it updated long before]
    //var yearUpdatedMax = Object.keys(yearUpdated).reduce(function(a, b){ return yearUpdated[a] > yearUpdated[b] ? a : b });
    // get max year updated [ year updated recently so get age it updated last]
    var yearUpdatedMin = Math.max.apply( null, Object.keys( yearUpdated ).map(function ( key ) { return yearUpdated[key]; }) );
    // get longest update year and return it
    //console.log("Min updated year "+yearUpdatedMin);
    //$("#buildingUpatedAge").val(buildingUpdatedAge);
    return yearUpdatedMin;
  }
  /*$(document).on('focusout',".buildingUpdated",function(){
    var bu = getBuildingUpdated();
    console.log('bu : '+bu);
  });*/

  // SET VALUE IN SEF #96 FIELD
  $(document).on('change',"#coverage_liabilityLimit",function(){

    //get value
    var liabilityLimit = $("#coverage_liabilityLimit").val();

    // liablity limit is on each form so select correct form and add what to do
    if(rtqFormGlobal == "plumbing"){
      if(liabilityLimit == '1mm'){
        $("#coverage_SEF96").val('1,000,000');
      }else if(liabilityLimit == '2mm'){
        $("#coverage_SEF96").val('2,000,000');
      }else{
        $("#coverage_SEF96").val('');
      }
    }

  }); 

  // show AMF Property Extensions field in real time
  $(document).on('focusout',".amfPropertyExtention",function(){
    var tiv = getTIV();
    var buildingAge = getBuildingAge();  
    var buildingAgeUpdated = getBuildingUpdated();
    var buildingConstruction_isBuildingHeritage =$(this).is(':checked');
    //console.log("tiv "+tiv+" buildingAge "+buildingAge+" buildingConstruction_isBuildingHeritage "+buildingConstruction_isBuildingHeritage);
    if(tiv >= 100000 && (buildingAge < 25 || buildingAgeUpdated < 25) && !buildingConstruction_isBuildingHeritage){
      // Set AMF Property Extension value
      //console.log('Here');
      $("#coverage_amfPropertyExt").val("Included*");
    }else{
      //console.log('Here123');
      $("#coverage_amfPropertyExt").val("Not Available");
    }
  });

  
  $("#buildingConstruction_yearBuilt").on('focusout',function(){
    hideShowIncludeExclude();
  });
  
  function hideShowIncludeExclude(){
    var buildingAge = getBuildingAge();  
    var coverage_perils = $("#coverage_perils").val();
    
    // get value of does building coverage required field on risk address tab for plumbing
   // var requireBuildingCoverage = $("#risk_address_requireBuildingCoverage").val();
    var requireBuildingCoverage = $("input[name='risk_address_requireBuildingCoverage']:checked"). val();
    //console.log(coverage_perils);

    if(buildingAge >= 25 || coverage_perils == "Named Perils"){
      $(".includeExclude").hide();  // Hide fields to not show in review
      clearFields("includeExclude");
      //$("#coverageIncludeExcludeSection").hide();   
    }else{
      //$("#coverageIncludeExcludeSection").show();
      if(requireBuildingCoverage != "No"){
        $(".includeExclude").show();      
      }else{
        $(".includeExclude").hide();    
        clearFields("includeExclude");
      }
          
    }
  }

  $(".buildingPerils").on('focusout',function(){
    var buildingAge = getBuildingAge();  
    var buildingAgeUpdated = getBuildingUpdated();
    //console.log(buildingAgeUpdated);
    var isHeritage = $(this).is(':checked');

    var buildingAgeUpdatedFlag = true; // by default true means no value on updated fields so it consider only built year
    if(buildingAgeUpdated > 0 && buildingAgeUpdated < 25){
      buildingAgeUpdatedFlag = false;
    }else{
      // if value more than 25 for updated fields
      buildingAgeUpdatedFlag = true;
    }

   // console.log("buildingAge : "+buildingAge+" buildingAgeUpdated : "+buildingAgeUpdated);
    if((buildingAge >= 25  && buildingAgeUpdatedFlag )  || isHeritage){
      $("#coverage_perils").val('Named Perils');
      $(".includeExclude").hide();    
      clearFields("includeExclude");
    }else{
      $("#coverage_perils").val('All Risk');
      $(".includeExclude").show();
    }
  });

  // if No answer or answer of “None” or “Local” for interior alarm should be triggering for Multi Perils risks
  /*$("#burglaryAlarm_interior").on('change',function(){
    // get value
    var burglaryAlarm_interior = $("#burglaryAlarm_interior").val();
    if(burglaryAlarm_interior == 'None' || burglaryAlarm_interior == 'Local'){
      $("#coverage_perils").val('Named Perils');
      $(".includeExclude").hide();    
      clearFields("includeExclude");
    }else{
      $("#coverage_perils").val('All Risk');
      $(".includeExclude").show();
    }
  });*/

  /**
   Finish button will gather all form data in json format and send it to controller to process
  **/
  $(".finish").on('click',function(e){
    // disable finish button, once clicked so user can't generate multiple requests till it complete
    $(".finish").attr('disabled','true');

    var valid = false;
    // check if all required fields are filled up or not
    $.each($('.required'), function( key, value ) {
      if($(this).css("visibility") == "hidden" || $(this).css('display') == 'none' || $(this).closest('div').parent('div').css('display') == 'none' || $(this).parent('div').css('display') == 'none'){
      //  console.log($(this).attr('name')+'    not visible');
      }else{
        /*if($(this).val()){
          valid = true;
        }else{
          valid = false; 
          return false;
        } */

        // check if all required fields are correct and there is no error
        var total_error = $(this).prev('label').find('.err2').length;
       // console.log($(this).prev('label'));
        //console.log(total_error);

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

    var filesRequired;
    // get refer not matching reason if available
    if($("#filesRequiredBox").css('display') != 'none'){
      filesRequired = {};
      var i  = 0;
      $("#filesRequiredBox ul li").each(function(){
        filesRequired[i] = $(this).text();
        i++;
      });
    }else{
      filesRequired = {};
    }

    // here we are taking just lower binding field value [ note : its always changed if upper one change and vice versa ]
    var binding = $("#bindStatus").val();
    
   // console.log($.isEmptyObject(referNotMatchReason));
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
      console.log(formData);
      /*var noOfMortgageesArray = getFormData.noOfMortgageesArray;
      var noOfClaimsArray = getFormData.noOfClaimsArray;*/
      // json encode of reasons
      referNotMatchReason = JSON.stringify(referNotMatchReason);
      filesRequired = JSON.stringify(filesRequired);

      var rtqForm = $("#selectedForm").val();//$("#rtq_forms option:selected").val();

      $(".loader").show(); 
      finishClicked = true;
      clicked = true;

      setTimeout(function(){  },2000);

      var $link = $(e.target);
      e.preventDefault();
      if(!$link.data('lockedAt') || +new Date() - $link.data('lockedAt') > 300) {
         
         //data: {formData:formData,rtqForm:rtqForm,noOfMortgageesArray:noOfMortgageesArray,noOfClaimsArray:noOfClaimsArray,binding:binding,referNotMatchReason:referNotMatchReason,filesRequired:filesRequired, _token:$('meta[name="csrf-token"]').attr('content')},
          
        $.ajax({
          url:"finish",
          method:"post",
          data: {formData:formData,rtqForm:rtqForm,binding:binding,referNotMatchReason:referNotMatchReason,filesRequired:filesRequired, _token:$('meta[name="csrf-token"]').attr('content')},
          datatype: 'json',
          success: function(msg){
            console.log(msg);
            if(msg.success){
              // console.log('message');
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
            //console.log(data);
            // remove disabled attribute from button
            $(".finish").removeAttr('disabled');
          }
        });

      }
      $link.data('lockedAt', +new Date());
    }else{
      clicked = false;
      swal('Please fill up all required fields.');
      // remove disabled attribute from button
      $(".finish").removeAttr('disabled');
    }
  });


  // function to get all form data including dynamic fields
  function getAllFormData(){
      // remove attribute disable on input to get field data into json and then again disable them
      var disabled = $('#rtq_form').find(':input:disabled').removeAttr('disabled');
      var fd = JSON.stringify($('#rtq_form').serializeArray());
      disabled.attr('disabled','disabled');
      
      var result = {};

      $.each(JSON.parse(fd), function() {
        var id = this.name;
        var row = {};
        row["value"] = this.value;
        // find title
        var title = $("#"+id).prev('label').text();
        if(title == ""){
          title = $("input[type=radio][name="+id+"]").parent().prev('label').text();

        }
        row["title"] = title;
        
        result[this.name] = row;
      });

      var formData = JSON.stringify(result);
      
      // formData not included dynamically added fields like number of mortgagees info & no of claims info so need to retrieve and send for process
      /*var noOfMortgagees = $.trim($('#risk_address_howmany_mortgagees').val());
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
*/
      // return object with all data
      //return {'formData':formData,'noOfMortgageesArray':noOfMortgageesArray,'noOfClaimsArray':noOfClaimsArray};
      return {'formData':formData};
  }

  /**
     function to display all form data for review
  **/
  function reviewForm(){
    console.log("reviewForm Triggerd")

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
   /* console.log("i am here");
    console.log($('#'+step).find('label'));
    return false;*/
    // get all label & value in


    
    var html = '';
    // Add section label - find only first h3 element and show that text
    html += "<h4 style='width:90%;float:left;'>"+$('#'+step).find('h3:first').text()+"</h4> <a href='javascript:window.scrollTo(0,0)' id='goToStep' data-togo='"+step+"'>Go To Top</a>";
    // create table
    html += "<table class='table table-bordered rowHover' style='width:100%;'>";
      
    // loop through all label in each step
    $('#'+step).find('label').each(function(index,elem){
   /*    console.log($(this).text());
    console.log($(this).next().hasClass("checkbox_custom"));*/
    // console.log($(this).next().hasClass("checkbox_custom"));
         // add row
      html += "<tr>";
      
      // check parent div or div of parent div display is not none
      if( $(this).closest('section').not('.subformSection').css('display') != 'none' && $(this).parent('div').css('display')!= 'none' && $(this).closest('div').parent('div').css('display') != 'none' && $(this).closest('div').parent('div').css('visibility') != 'hidden' && $(this).parent('div').css('visibility') != 'hidden'){
        // add label 
        //console.log($(this).next().hasClass("radio_group"));
        if($(this).next().hasClass("radio_group")){//$(this).next().is("input[type=checkbox]")
          //console.log($(this).text());
        html += "<td style='width:60%;'>"+$(this).text()+"</td>";
         var name  = $(this).next().find("input[type=radio]").attr('name');
         if(typeof  $("input[name='"+name+"']:checked").val() === "undefined"){
            html += "<td  style='width:40%;'>  </td>";
         }else{
            html += "<td  style='width:40%;'>"+$("input[name='"+name+"']:checked").val()+"  </td>";
         }
         //console.log( $("input[name='"+name+"']:checked").val());
          //do nothing if simple checkbox
         // console.log("dfjkjkjkhjk");
          /* html += "<td style='width:60%;'>"+$(this).text()+"</td>";
           console.log($(this).next().prop("checked"));
           //console.log($(this).parent().children().find( ".checkbox_custom" ).is(":checked"));
           html += "<td  style='width:40%;'>"+$(this).next().prop("checked")+"  </td>";
          */
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

        }
        else{
          // check if label field is with any input, select or textarea [ NOTE : checkbox switch create label only field for value YES and NO ]
          if($(this).next().is('input') || $(this).next().is('textarea') || $(this).next().is('select') ){
            // for checkbox switch only [ if mailing address and risk address on same page, to avoid confusion on label ] 
            //console.log($(this).text()+"    "+$(this).parent('div').hasClass('riskAddressBOX'));
            if($(this).parent('div').hasClass('riskAddressBOX')){
              html += "<td style='width:60%;'><b>Risk Address :</b> "+$(this).text()+"</td>";
            }else{
              // if label is from subForms
              if($(this).hasClass('sf')){
                html += "<td style='width:60%;border-left:2px solid #ff0ac2;'><span style='padding-left:30px;'>"+$(this).text()+"</span></td>";    
              }else{
                html += "<td style='width:60%;'>"+$(this).text()+"</td>";    
              }
              
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
      var brokerCode = $.trim($("#broker_code").val());
      if(brokerCode == '' && empty(brokerCode)){
        $("#bindStatus").val('');  
      }else{
        $("#bindStatus").val('Quoted'); 
      }
      
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
  $("#resetForm").on('click',function(e){
    //$('#smartwizard').smartWizard("reset");

    swal({
        title: "Are you sure want to reset?",
        text: "",
        icon: "warning",
        buttons: true,
      })
      .then(function(reset) {
      if (reset) {
        //disable reset button until process done or error found
        $("#resetForm").attr('disabled','true');

        resetClicked = true;
        clicked = true;
        resetFunction('reset',e);
        $(".loader").show();
      } else {
        // make clicked false
        clicked = false;
        return false;//swal("Your imaginary file is safe!");
      }
    });
        
  });



  // Reset function
  function resetFunction(abandonStatus,e){
      // get all form data including dynamic fields
     // console.log(abandonStatus);
      var getFormData = getAllFormData();
      var formData = getFormData.formData;
      /*var noOfMortgageesArray = getFormData.noOfMortgageesArray;
      var noOfClaimsArray = getFormData.noOfClaimsArray;*/
      var binding = $("#bindStatus").val();
      var doesCalculated = $("#doesCalculated").val();
      var referNotMatchReason;
      var filesRequired;
      var requiredError = '';
      // check if all required fields are filled up or not
      $.each($('.required'), function( key, value ) {
        if($(this).css("visibility") == "hidden" || $(this).css('display') == 'none' || $(this).closest('div').parent('div').css('display') == 'none' || $(this).parent('div').css('display') == 'none'){
          // do nothing
        }else{
          // check if all required fields are correct and there is no error
          var total_error = $(this).prev('label').find('.err2').length;
         // console.log(total_error);
          if (total_error > 0 ) { 
            requiredError = true; 
            return false; 
          } else {
            requiredError = false;
          } 
          
        }
      });

      /*var i = 0;
      var stepsDoneAt = '';
      // check how many steps are done by users
      $.each($('.nav-item'),function(key, value){
        //check each step have with class done
        if($(this).hasClass('active')){
          i++;
          stepsDoneAt = $(this).find('a').text();
        }else{
          
          //break;
        }
      });
      console.log('Steps Done at '+stepsDoneAt);
      console.log('Done : '+i);
      return false;*/

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

      if($("#filesRequiredBox").css('display') != 'none'){
        filesRequired = {};
        var i  = 0;
        $("#filesRequiredBox ul li").each(function(){
          filesRequired[i] = $(this).text();
          i++;
        });
      }else{
        filesRequired = {};
      }
      // json encode of reasons
      filesRequired = JSON.stringify(filesRequired);

      var rtqForm = $("#selectedForm").val();//$("#rtq_forms option:selected").val();

      if(abandonStatus == "windowClose" || abandonStatus == "reset"){
        $(".loader").show(); 
      }else{
        $(".loader").hide(); 
      }

      setTimeout(function(){  },2000);

      var $link = $(e.target);
      e.preventDefault();
      if(!$link.data('lockedAt') || +new Date() - $link.data('lockedAt') > 300) {
        //data: {formData:formData,rtqForm:rtqForm,noOfMortgageesArray:noOfMortgageesArray,noOfClaimsArray:noOfClaimsArray,binding:binding,referNotMatchReason:referNotMatchReason,filesRequired:filesRequired,abandonStatus:abandonStatus,doesCalculated:doesCalculated,requiredError:requiredError, _token:$('meta[name="csrf-token"]').attr('content')},
          
        $.ajax({
          url:"resetForm",
          method:"post",
          async: true,
          data: {formData:formData,rtqForm:rtqForm,binding:binding,referNotMatchReason:referNotMatchReason,filesRequired:filesRequired,abandonStatus:abandonStatus,doesCalculated:doesCalculated,requiredError:requiredError, _token:$('meta[name="csrf-token"]').attr('content')},
          datatype: 'json',
          success: function(msg){
            //console.log(msg);
            clicked = true;
             //return false; 
            if(abandonStatus == "reset"){
              $(".loader").hide();
              // to make reset, make clicked = true and send location to root
              window.location.href='/';
            }else if(abandonStatus == "windowClose"){
              $(".loader").hide(); 
              //clicked = true;
              window.location.href='/';
            }else{
              //clicked = true;
            }
          },
          error: function(data){
            // remove disabled button
            if(abandonStatus == "reset"){
              $("#resetForm").removeAttr('disabled');
            }else if(abandonStatus == "windowClose"){
              $("#closeWindow").removeAttr('disabled');
            }
            //console.log(data);
          }
        });

      }
      $link.data('lockedAt', +new Date());
  }

});

