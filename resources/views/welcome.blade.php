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
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/smartwizard@4.3.1/dist/css/smart_wizard_theme_arrows.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/ouibounce.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/smartwizard@4.3.1/dist/js/jquery.smartWizard.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script type="text/javascript" src="{{ URL::asset('js/ouibounce.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/js-cookie@beta/dist/js.cookie.min.js"></script>
        <!--<script type="text/javascript" src="{{ URL::asset('js/form-validate.js') }}"></script>-->
        
        <!-- call custom javascript while rendering form data [loaded dynamically from jquery]      
            <script type="text/javascript" src="{{ URL::asset('js/custom.js') }}"></script>-->  

        <style type="text/css">
            .frontText{
                /*font-size: 12px;
                line-height: 80%;*/
            }
            .frontText p{
                margin: 0;
                padding: 0;
            }
        </style>

    </head>
    <body>
        
        <?php
        
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
        ?>
        <div style="text-align: center;width: 100%;">
            <img src="{{ URL::asset('img/amf25logo.png') }}" width="250" height="80" alt="AM Fredericks">
        </div>
        <h1 style="text-align: center;"> Automated Submissions  </h1>
        <!-- Show selection of form here -->
        <div class="row">
            <div class="col-md-12">
                <select id="rtq_forms" name="rtq_forms" class="col-md-4 form-control" style="margin: 0 auto;">
                    <option value="">-Select form-</option>
                    <option value="rentedDwelling">Rented Dwelling</option>
                    <option value="ownerOccupied">Owner Occupied</option>
                </select>
            </div>
            <p id="rtqSelectedForm" style="text-decoration: underline;float: left;"></p>
            <span class="col-md-1" style="cursor:pointer;float: right;padding-right: 0px;display: none;" id="openFT"> <i class="fa fa-angle-down"></i> </span>
            
        </div>
        <!-- END -->
        <div class="loader" style="display: none;"> </div>
        <div class="frontAutText" style="margin-bottom: 10px;">
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
            <p style="text-align: center;">&copy; Copyright <?php echo date('Y');?> - Present  <a href="https://www.amfredericks.com/" target="_blank" data-toggle="tooltip" title="<img src='{{URL::asset('img/amfsite.png')}}' width='150' height='100'>"> <b style="color: blue;"> A.M.Fredericks Underwriting Management Ltd.</b> </a></p>
        </footer>
        <!-- End footer -->
    
        <script type="text/javascript">
            
            $(document).ready(function(){
                //activate bootstrap tooltip
                $('[data-toggle="tooltip"]').tooltip({
                    html:true,
                    placement : 'top'
                });

                // if cookie assign and have value then show form with selected value
                if(Cookies.get('loadedForm') != '' && Cookies.get('loadedForm') != undefined){
                    showForm(Cookies.get('loadedForm'));
                }
                
                // when form select
                $("#rtq_forms").on('change',function(){
                    var formVal  = $("#rtq_forms").val();
                    console.log(formVal);
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
                                /**
                                NOTE: First we used dynamic js in main.php which load js each time form loaded without refresh page so if we change form, it load it second time and if we close page then it sends email for unload event whatever time js loaded so here we set selected form in cookie and load page so it will have only one js at time
                                **/
                                // set cookie with selected form value for one hour time period
                                var forOneHour = new Date(new Date().getTime() + 60 * 60 * 1000);
                                Cookies.set('loadedForm',formVal,{
                                    expires: forOneHour
                                });
                                // reload page
                                window.location.href="/";
                              } else {
                                return false;//swal("Your imaginary file is safe!");
                              }
                            });
                        }else{
                            showForm(formVal);
                        }
                    }
                });

                //function show form
                function showForm(formVal){
                    $("#showForm").empty();
                    $(".loader").show();
                    $.ajax({
                        url:'loadForm',
                        data:{formVal:formVal,_token:$('meta[name="csrf-token"]').attr('content')},
                        type:'post',
                        success: function(data){
                            $(".loader").hide();
                            // if cookie is assigned then set form select value
                            if( (Cookies.get('loadedForm') != '' || Cookies.get('loadedForm') != undefined) && (Cookies.get('loadedForm') == formVal)){
                                $("#rtq_forms").val(Cookies.get('loadedForm'));
                            }
                            $("#rtqSelectedForm").text($("#rtq_forms option:selected").text()+' form has been selected :');
                            $('#showForm').html(data);
                            $(".frontAutText").toggle();
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
                    if (typeof someObject == 'undefined') $.loadScript('/js/custom.js', function(){
                        //Stuff to do after someScript has loaded
                        console.log("js loaded");
                    });
                    
                }

                // toggle to up and down submission create area
                $("#openFT").click(function(){
                    $(".frontAutText").toggle();
                    var $el = $(this);
                    //textNode = this.lastChild;
                    $el.find('i').toggleClass('fa-angle-up fa-angle-down');
                    //textNode.nodeValue = 'Show ' + ($el.hasClass('showArchieved') ? 'Incomplete' : 'Archived')
                    //$el.toggleClass('showArchieved');
                });
            });
        </script>
    </body>
</html>
