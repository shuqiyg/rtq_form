<!doctype html>
<html >
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <noscript><meta http-equiv="refresh" content="1;url={{ url('error')}}"></noscript>

        <title>Automated Submissions</title>
        <link rel="shortcut icon" href="{{ URL::asset('img/amf25logo.png') }}" />

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet"> 
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/smartwizard@4.3.1/dist/css/smart_wizard_theme_arrows.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"> -->

        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/ouibounce.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">
        
        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> --}}
        <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
          <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
        <!-- <script scr="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script> -->
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css"> -->
        <script src="https://cdn.jsdelivr.net/npm/smartwizard@4.3.1/dist/js/jquery.smartWizard.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
        
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script type="text/javascript" src="{{ URL::asset('js/ouibounce.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/js-cookie@beta/dist/js.cookie.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
        <!--<script type="text/javascript" src="{{ URL::asset('js/form-validate.js') }}"></script>-->
        
        <!-- call custom javascript while rendering form data [loaded dynamically from jquery]      
            <script type="text/javascript" src="{{ URL::asset('js/custom.js') }}"></script>-->  

        <style type="text/css">
            .frontAutText{
                margin-bottom: 10px;
                background-color: rgb(246, 248, 249);
                padding: 10px;
                border: 1px solid silver;
            }
            .frontText{
                /*font-size: 12px;
                line-height: 80%;*/
            }
            .frontText p{
                margin: 0;
                padding: 0;
            }

            /** HELP WINDOW STYLE START **/

                /* Button used to open the help form - fixed at the bottom of the page */
                .open-button,#closeHelp {
                    color: black;
                    border: none;
                    cursor: pointer;
                    opacity: 0.8;
                    position: fixed;
                    bottom: 23px;
                    right: 28px;
                    font-size: 50px;
                }
                
                /* The popup help - hidden by default */
                .help-popup {
                    display: none;
                    position: fixed;
                    bottom: 73px;
                    right: 28px;
                    border: 3px solid #ffbb45;
                    z-index: 9;
                    -webkit-box-shadow: 4px -1px 24px 1px rgba(0,0,0,0.75);
                    -moz-box-shadow: 4px -1px 24px 1px rgba(0,0,0,0.75);
                    box-shadow: 4px -1px 24px 1px rgba(0,0,0,0.75);
                }

                /* Add styles to the help container */
                .help-container {
                    max-width: 500px;
                    padding: 10px;
                    background-color: #fffefa;
                }

                .meaning dt::after{
                    content: '';
                    background: linear-gradient(to right, #F48133 75%, transparent 75% 80%, #F48133 80%);
                    height: 2px;
                    width: 40%;
                    display: block;
                }
                /*** Loader Help start ***/
                .loaderHelp {
                  border: 16px solid #f3f3f3; /* Light grey */
                  border-top: 16px solid #ffcd42; /* Light blue */
                  border-right: 16px solid #c9be9d; /* Light blue */
                  border-bottom: 16px solid #ffcd42; /* Light blue */
                  border-left: 16px solid #c9be9d; /* Light white */
                  border-radius: 50%;
                  width: 50px;
                  height: 50px;
                  position: absolute;
                  left: 50%;
                  top: 30%;
                  z-index: 2000;
                  animation: spinHelp 1s linear infinite;
                }
                @keyframes spinHelp {
                  0% { transform: rotate(0deg); }
                  100% { transform: rotate(360deg); }
                }
                /*** Loader Help end ***/

            /** HELP WINDOW STYLE END **/

            .switch {
                align-self: flex-end;
                margin: 0.9375rem;
            }
            .inner-switch {
                display: inline-block;
                cursor: pointer;
                border: 1px solid #555;
                border-radius: 1.25rem;
                width: 3.125rem;
                text-align: center;
                font-size: 1rem;
                padding: 0.1875rem;
                margin-left: 0.3125rem;
            }
        </style>

    </head>
    <body>
        
        <?php
        
        /*** SET URL AS PER ENVIRONMENT SET IN .env FILE **/
        $env = trim(env('APP_ENV')); 
        if($env == "production"){
            $ajaxUrlToLoadForm = "/rtqform";
            $loadCustomJsURL = "/rtqform/js/custom.js";
        }else{
            $ajaxUrlToLoadForm = "/";
            $loadCustomJsURL = "/js/custom.js";
        }
        
        if(isset($_SESSION['abs']) && !empty(($_SESSION['abs']))){
            if($_SESSION['abs'] == "wc"){ ?>
                <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="false">X</span></button>
                    <?php
                        echo  "Form has been reset.";
                        // now empty session message
                        $_SESSION['abs'] = '';
                    ?>
                </div>
            <?php 
            }
        }

        // get forms name and id from json
        $forms = json_decode(file_get_contents(public_path().'/json/forms.json'), true);
        //print_r($forms);

        ?>
        <!-- SET FORM PREFIX -->
        <input type="hidden" name="formPrefix" id="formPrefix" value="{{$ajaxUrlToLoadForm}}">
        
        <div class="logo" style="text-align: center;width: 100%;">
            <img src="{{ URL::asset('img/amf25logo.png') }}" width="250" height="100" alt="AM Fredericks">
        </div>
        <h1 style="text-align: center;"> Automated Submissions  </h1>
        <!-- Show selection of form here -->
        <div class="row">
            <div class="col-md-12">
                <select id="rtq_forms" name="rtq_forms" class="col-md-4 form-control" style="margin: 0 auto;">
                    <option value="">-Select form-</option>
                    @foreach($forms as $f)
                    <option value="{{$f['id']}}">{{ $f['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12" style="display: none;" id="bannerBox"><div id="banner"></div></div>
            <div class="col-md-12">
                <p id="rtqSelectedForm" style="text-decoration: underline;float: left;margin-bottom: 5px;"></p>
                <span style="cursor:pointer;padding-left : 10px;display: none;" id="openFT"> <i class="fa fa-angle-down"></i> </span>
            </div>
        </div>
        <input type="hidden" id="selectedForm" value="">
        <!-- END -->
        <div class="loader" style="display: none;"> </div>
        <div class="frontAutText" style="margin-top: 10px;">
            <div style="text-align: center;width: 100%;" class="frontText">
                <p>BETA</p>
                <p>Welcome to our automated submission system</p>
                <p>&lt; we are adding application rapidly so please bear with us &gt;</p>
            </div>
            <div style="width: 100%;" class="frontText">
                <p>Why use this system ?</p>
                <ul>
                    <li>Brokers that are approved by A.M. Fredericks may get a real-time quote that can be bound online. <span style="color: red;">*</span> </li>
                    <li>If you are not an approved broker or ,if the risk information precludes quoting the application, will be automatically entered into our system and an Underwriter will respond to you directly. </li>
                    <li>We will email you the form data back as a PDF which you can use to requote if you so desire. </li>
                </ul>
                <p style="color: red"><b>* Important </b> </p>
                <p>Underwriting rules may trigger depending on the data entered which requires manual review. In those cases, an automatic quote is not possible. Approved Brokers will be told the trigger reasons. </p>
            </div>
        </div>
        <!-- Show selected form here -->
        <div id="showForm"></div>
        <!-- END -->

        <!-- footer -->
        <footer>
            <hr>
            <p style="text-align: center;">&copy; Copyright 2020 - <?php $cy = date('Y'); if($cy == "2020"){echo "Present";}else{echo $cy;}?>  <a href="https://www.amfredericks.com/" target="_blank" data-toggle="tooltip" title="<img src='https://rtq-form.amfum.com/public/img/amfsite.png' width='150' height='100'>"> <b style="color: blue;"> A.M.Fredericks Underwriting Management Ltd.</b> </a></p>
            <div class="switch" >Dark mode:              
                <span class="inner-switch">OFF</span>
            </div>
        </footer>
        <!-- End footer -->
    
        <script type="text/javascript">
            var ajaxUrlToLoadForm = "{!!$ajaxUrlToLoadForm!!}";
            var loadCustomJsURL = "{!!$loadCustomJsURL!!}";

            $(document).ready(function(){

                //activate bootstrap tooltip
                $('[data-toggle="tooltip"]').tooltip({
                    html:true,
                    placement : 'top'
                });

                // if cookie assign and have value then show form with selected value
                if(Cookies.get('loadedForm') != '' && Cookies.get('loadedForm') != undefined){
                    showForm(Cookies.get('loadedForm'));
                    loadBanner(Cookies.get('loadedForm'));
                }
                
                // when form select
                $("#rtq_forms").on('change',function(){
                    var formVal  = $("#rtq_forms").val();
                    
                    console.log(formVal);
                    console.log($('meta[name="csrf-token"]').attr('content'));
                    if(formVal != '' && formVal != null){
                        // first check if showForm div has form then give alert before show form to avoid loosing data
                        if($("#showForm").text().length > 0){
                            //swal('Are you sure want to change form ?','You can loose data filled up in form','warning');
                            swal({
                              title: "Are you sure want to change form?",
                              text: "You can loose data filled up in form",
                              icon: "warning",
                              buttons: true,
                              dangerMode: true,
                            })
                            .then(function(willDelete) {
                              if (willDelete) {
                                //  unbind before unload event [ its assigned in custom.js so it shows alert when user try to leave page],
                                $(window).unbind('beforeunload');
                                $(window).unbind('unload');
                                /**
                                NOTE: First we used dynamic js in main.php which load js each time form loaded without refresh page so if we change form, it load it second time and if we close page then it sends email for unload event whatever time js loaded so here we set selected form in cookie and load page so it will have only one js at time
                                **/
                                // set cookie with selected form value for one hour time period
                                var forOneHour = new Date(new Date().getTime() + 60 * 60 * 1000);
                                Cookies.set('loadedForm',formVal,{
                                    expires: forOneHour
                                });
                                // reload page
                                window.location.href=ajaxUrlToLoadForm; //rtqform
                              } else {
                                return false;//swal("Your imaginary file is safe!");
                              }
                            });
                        }else{
                            showForm(formVal);
                            loadBanner(formVal);
                        }
                    }
                });

// $('.selectpicker').selectpicker();
                //function show form
                function showForm(formVal){
                    $("#showForm").empty();
                    $(".loader").show();
                    $.ajax({
                        // headers: {
                        //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        //     },
                        url:'loadForm',
                        data:{formVal:formVal,_token:$('meta[name="csrf-token"]').attr('content')},
                        // data:{formVal:formVal},
                        type:'post',
                        success: function(data){
                            $(".loader").hide();
                            // if cookie is assigned then set form select value
                            if( (Cookies.get('loadedForm') != '' || Cookies.get('loadedForm') != undefined) && (Cookies.get('loadedForm') == formVal)){
                                $("#rtq_forms").val(Cookies.get('loadedForm'));
                            }

                            $("#rtqSelectedForm").text($("#rtq_forms option:selected").text()+' form has been selected :');
                            //set form value to hidden field
                            $("#selectedForm").val(formVal);
                            
                            $('#showForm').html(data);
                            $(".frontAutText").toggle();
                            $(".frontAutText").css("margin-top","0px");
                            $("#openFT").show();
                            // dynamically load js
                            loadJS();
                        }
                    });
                }
                
                // load dynamic custom js when select form
                function loadJS(){
                    jQuery.loadScript = function (url, callback) {
                        jQuery.ajax({
                            url: url,
                            dataType: 'script',
                            success: callback,
                            async: true
                        });
                    }
                    if (typeof someObject == 'undefined') $.loadScript(loadCustomJsURL, function(){ ///rtqform/js/custom.js
                        //Stuff to do after someScript has loaded
                        console.log("js loaded");
                    });
                    
                }

                // function to load banner 
                function loadBanner(formID){
                    $.ajax({
                        // headers: {
                        //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        // },
                        url:'getBannerMessage',
                        data:{formID:formID,_token:$('meta[name="csrf-token"]').attr('content')},
                        // data:{formID:formID},
                        type:'post',
                        success: function(bannerMessage){
                            //console.log(bannerMessage);
                            /** Banner Message Display **/
                                if(bannerMessage != ""){
                                    $("#bannerBox").show();
                                    $("#banner").html('<p style="margin: 5px 0px;padding: 5px;border: 1px solid silver;background: burlywood;"><b>Please Note :</b> '+bannerMessage+'</p>');
                                }else{
                                    $("#bannerBox").hide();
                                    $("#banner").html('');
                                }
                                
                            /***************************/
                        }
                    });
                }

                // toggle to up and down submission create area
                $("#openFT").click(function(){
                    $(".frontAutText").toggle();
                    $(".frontAutText").css("margin-top","0px");
                    var $el = $(this);
                    //textNode = this.lastChild;
                    $el.find('i').toggleClass('fa-angle-up fa-angle-down');
                    //textNode.nodeValue = 'Show ' + ($el.hasClass('showArchieved') ? 'Incomplete' : 'Archived')
                    //$el.toggleClass('showArchieved');
                });

                /** DARK MODE **/
                $( ".inner-switch" ).on("click", function() {
                    if( $( "body" ).hasClass( "dark" )) {
                      $( "body" ).removeClass( "dark" );
                      $( ".inner-switch" ).text( "OFF" );
                    } else {
                      $( "body" ).addClass( "dark" );
                      $( ".inner-switch" ).text( "ON" );
                    }
                });

            });
        </script>
    </body>
</html>
