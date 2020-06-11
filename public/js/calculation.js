$(document).ready(function(){

  // GET FORM PREFIX
  var formPrefix = $("#formPrefix").val();

  // function to remove comma from values
  function removeCommas(val){
    if(val != '' && val != null && val.toString().indexOf(',') > 0){
      //console.log('Remove comma');
      return val.replace(/,/g, '');
    }else{
      return val;
    }
  }

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

  // FUNCTION TO CLEAR ALL FIELDS VALUE IN BOX
  function resetAllBoxFields(box){

    $.each($("#"+box).find('input'),function(k,v){
        $(this).val('');
    });

    $.each($("#"+box).find('select'),function(k,v){
      $(this).val('');
    });
    
  }

  // show gross earning sub fields on Coverage Tab for Plumbing
    $(document).on("focusout","#coverage_grossEarnings",function(){
      var coverage_grossEarnings = $("#coverage_grossEarnings").val();
      if(coverage_grossEarnings != ''){
        $("#ifcoverageGrossEarningsLimitBox").show();
      }else{
        $("#ifcoverageGrossEarningsLimitBox").hide();
        $("#coverage_grossEarningsPer").val('');
        /*$("#coverage_grossEarnings80Per").val('');
        $("#coverage_grossEarnings50Per").val('');
        $("#coverage_grossEarningsNoPer").val('');*/
      }
    });

  // DISPLAY CALCULATE BOX AS PER FORM SELECTED
  $("#calculatorForm").on('change',function(){
    // select form value
    var formName = $("#calculatorForm").val();
    console.log(formName);
    if(formName != ''){

      // hide all form calculation box
      $.each($(".formCalcBox"),function(k,v){
         if($(this).is(':visible') ){
          resetAllBoxFields("calculatorBox");
          $(this).hide();
          $("#priceBox").empty();  
         } 
        
      });

      // open selected form calculation box
      $("."+formName+"CalcBox").show();
      $("#calculatorBox").show();
    }else{
      $("#calculatorBox").hide();
      $("#priceBox").empty();
      resetAllBoxFields("calculatorBox");
    }
  });

	/***
   Calculate data and display price if there is broker code
   Get all form data
  ***/
    $("#getCalculation").on('click',function(event){
      //console.log('clicked calculate '+ clicked);
      event.preventDefault(); 
      var rtqForm = $("#calculatorForm").val();

      if(rtqForm == "homeInspector"){
        var inspectionProv = $("#risk_address_provinceOfInspection").val();
        var cgl_cglLimitsOfLiablitiy = $("#cgl_cglLimitsOfLiablitiy").val();
        var cgl_eoLimitsOfLiablity = $("#cgl_eoLimitsOfLiablity").val();
        var ops_totalGrossAnnualReceipts = $("#ops_totalGrossAnnualReceipts").val();
        var cgl_deductible = $("#cgl_deductible").val();
        var cgl_contractorsEquipmentFloater = $("#cgl_contractorsEquipmentFloater").val();
        var cgl_additionalPropertyFrill = $("#cgl_additionalPropertyFrill").val();
        var risk_address_noOfClaims = $("#risk_address_noOfClaims").val();

        if(cgl_cglLimitsOfLiablitiy != '' && cgl_eoLimitsOfLiablity != '' && risk_address_noOfClaims != '')
        {
          $.ajax({
            url:formPrefix+"api/2020/amf/root/adminCalculate",
            method:"post",
            data: {inspectionProv:inspectionProv,cgl_cglLimitsOfLiablitiy:cgl_cglLimitsOfLiablitiy,cgl_eoLimitsOfLiablity:cgl_eoLimitsOfLiablity,ops_totalGrossAnnualReceipts:ops_totalGrossAnnualReceipts,cgl_deductible:cgl_deductible,cgl_contractorsEquipmentFloater:cgl_contractorsEquipmentFloater,cgl_additionalPropertyFrill:cgl_additionalPropertyFrill,risk_address_noOfClaims:risk_address_noOfClaims,rtqForm:rtqForm,_token:$('meta[name="csrf-token"]').attr('content')},
            datatype: 'json',
            success: function(msg){
              
              msg = JSON.parse(msg);
              console.log(msg);
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
        var province = $('#risk_address_province_plumbing').val();
        var totalRevenue = $('#totalRevenue').val();
        var coverage_CEF = $('#coverage_CEF').val();
        var coverage_toolFloater = $('#coverage_toolFloater').val();
        var coverage_officeEquipmentsFloater = $('#coverage_officeEquipmentsFloater').val();
        var coverage_profits = $('#coverage_profits').val();

        var coverage_buildingLimit = $('#coverage_buildingLimit_plumbing').val();
        var coverage_contentsLimit = $('#coverage_contentsLimit_plumbing').val();
        var coverage_contentsLimitStock = $('#coverage_contentsLimitStock').val();
        var coverage_contentsLimitEquipment = $('#coverage_contentsLimitEquipment').val();
        var coverage_contentsLimitImprovements = $('#coverage_contentsLimitImprovements').val();
        var coverage_grossEarnings = $('#coverage_grossEarnings').val();
        var coverage_grossEarningsPer = $('#coverage_grossEarningsPer').val();
        var coverage_extraExpenses = $('#coverage_extraExpenses').val();
        var coverage_rentalIncomeLimit = $('#coverage_rentalIncomeLimit_plumbing').val();
        var coverage_signFloater = $('#coverage_signFloater').val();

        var coverage_crime_broadFormMoney = $('#coverage_crime_broadFormMoney').val();
        var coverage_crime_insideRobbery = $('#coverage_crime_insideRobbery').val();
        var coverage_crime_outsideRobbery = $('#coverage_crime_outsideRobbery').val();
        var coverage_crime_employeeDishonesty = $('#coverage_crime_employeeDishonesty').val();
        var coverage_crime_3dRider = $('#coverage_crime_3dRider').val();

        var coverage_liabilityLimit = $('#coverage_liabilityLimit_plumbing').val();
        var yearsBuilt = $('#buildingConstruction_yearBuilt_plumbing').val();
        
        var constructionType = $('#buildingConstruction_overallConstruction').val();
        var fireDeptDistance = $('#fireAlarmDetectors_fireDeptDistance_plumbing').val();
        var fireDeptType = $('#fireAlarmDetectors_fireDeptTye_plumbing').val();
        var hydrant = $('#fireAlarmDetectors_hydrant_plumbing').val();
  
        var closestCity = $('#closestCity').val();
        var distanceFromClosestCity = $('#distanceFromClosestCity').val();

        if(province != '' && coverage_liabilityLimit != '' && closestCity != ''){
          // hide error msg 
          $("#closestCityMSG").hide();

          // send calculate request
          $.ajax({
            url:formPrefix+"api/2020/amf/root/adminCalculate",
            method:"post",
            data: {province:province,totalRevenue:totalRevenue,coverage_CEF:coverage_CEF,coverage_toolFloater:coverage_toolFloater,coverage_officeEquipmentsFloater:coverage_officeEquipmentsFloater,coverage_profits:coverage_profits,coverage_buildingLimit:coverage_buildingLimit,coverage_contentsLimit:coverage_contentsLimit,coverage_contentsLimitStock:coverage_contentsLimitStock,coverage_contentsLimitEquipment:coverage_contentsLimitEquipment,coverage_contentsLimitImprovements:coverage_contentsLimitImprovements,coverage_grossEarnings:coverage_grossEarnings,coverage_grossEarningsPer:coverage_grossEarningsPer,coverage_extraExpenses:coverage_extraExpenses,coverage_rentalIncomeLimit:coverage_rentalIncomeLimit,coverage_signFloater:coverage_signFloater,coverage_crime_broadFormMoney:coverage_crime_broadFormMoney,coverage_crime_insideRobbery:coverage_crime_insideRobbery,coverage_crime_outsideRobbery:coverage_crime_outsideRobbery,coverage_crime_employeeDishonesty:coverage_crime_employeeDishonesty,coverage_crime_3dRider:coverage_crime_3dRider,coverage_liabilityLimit:coverage_liabilityLimit,yearsBuilt:yearsBuilt,constructionType:constructionType,fireDeptDistance:fireDeptDistance,fireDeptType:fireDeptType,hydrant:hydrant,closestCity:closestCity,distanceFromClosestCity:distanceFromClosestCity,rtqForm:rtqForm,_token:$('meta[name="csrf-token"]').attr('content')},
            datatype: 'json',
            success: function(msg){
              
              msg = JSON.parse(msg);
              console.log(msg);
              
              var table = "<table class='table table-bordered'> <tbody><tr><td>Property Total</td><td><span style='width:50%;text-align:right;display:block;'>"+msg['propertyTotal']+"</span></td></tr><tr><td>Liability Total</td><td><span style='width:50%;text-align:right;display:block;'>"+msg['liabilityVal']+"</span></td></tr><tr><td>Inspection Fee</td><td><span style='width:50%;text-align:right;display:block;'>"+msg['inspectionFee']+"</span></td></tr><tr><td>Fee</td><td><span style='width:50%;text-align:right;display:block;'>"+msg['fee']+"</span></td></tr><tr class='totalRow'><td><b>Total</b></td><td><span style='width:50%;text-align:right;display:block;'><b>"+msg['total']+"</b></span></td></tr></tbody> </table>";
              $("#priceBox").html(table);
              
            },
            error: function(data){
              console.log(data);
            }
          });
        }else{
          if(closestCity == ''){
            $("#closestCityMSG").show();
          }else{
            $("#closestCityMSG").hide();
            swal('Some required fields are missing for calculation.');
          }
          
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
            url:formPrefix+"api/2020/amf/root/adminCalculate",
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
});