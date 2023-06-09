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
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/ouibounce.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">
        

        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> --}}
        <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
          <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/smartwizard@4.3.1/dist/js/jquery.smartWizard.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
        
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script type="text/javascript" src="{{ URL::asset('js/ouibounce.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/js-cookie@beta/dist/js.cookie.min.js"></script>
        <script type="text/javascript" src="{{ URL::asset('js/admin.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/calculation.js') }}"></script>
        <!--<script type="text/javascript" src="{{ URL::asset('js/form-validate.js') }}"></script>-->
        
        <!-- call custom javascript while rendering form data [loaded dynamically from jquery]      
            <script type="text/javascript" src="{{ URL::asset('js/custom.js') }}"></script>-->  

        <style type="text/css">
            .ui-accordion-content{
                height: auto !important;
            }
            .w-100{
                width: 100%;
            }

            #calculatorBox{
                background: #4d464112;
                padding: 15px 0;
                border: 1px solid;
                margin-bottom: 5px;
            }

            .changeFPR > input{
                width : 20px;
                border: 0;
                background : transparent;
            }
            .changeCEFsl > input{
                width : 57px;
                border: 0;
                background : transparent;
            }

            .changePIAOR > input{
                width : 60px;
                border: 0;
                background : transparent;
            }

            .changeFPR > input:focus , .changeCEFsl > input:focus, .changePIAOR > input:focus{
                background-color: white;
                border: 1px solid silver;
            }

        </style>

    </head>
    <body>
        
        <?php
        /*** SET URL AS PER ENVIRONMENT SET IN .env FILE **/
        $env = trim(env('APP_ENV')); 
        if($env == "production"){
            $formPrefix = "/rtqform/";
        }else{
            $formPrefix = "/";
        }
                
        // get forms name and id from json
        $forms = json_decode(file_get_contents(public_path().'/json/forms.json'), true);
        //print_r($forms);

        // get us-canada state/province name list
        $canState = json_decode(file_get_contents(public_path().'/json/canStateList.json'), true);

        // get closest city
        $closestCity = json_decode(file_get_contents(public_path().'/json/zoneWiseInspectionCities.json'), true);

        // get form province rule json
        $forms_provinceRules = json_decode(file_get_contents(public_path().'/json/forms_provinceRules.json'), true);
        
        // get cef schedule limit json
        $cef_scheduleLimit = json_decode(file_get_contents(public_path().'/json/cefLimitByItemTotal.json'), true);

        // get plumbing iao product/operation json
        $plumbing_iao = json_decode(file_get_contents(public_path().'/json/plumbing_iao.json'), true);
        //print_r($cef_scheduleLimit);
        
        ?>
        <div style="text-align: center;width: 100%;">
            <img src="{{ URL::asset('img/amf25logo.png') }}" width="250" height="100" alt="AM Fredericks">
        </div>
        <h1 style="text-align: center;"> Automated Submissions  </h1>

        <!-- SET FORM PREFIX -->
        <input type="hidden" name="formPrefix" id="formPrefix" value="{{$formPrefix}}">
        
        <!-- LOADER -->
        <div class="loader" style="display: none;"> </div>
        
        <!-- <div class="row">
            <div class="col-md-12">
                <span class="col-md-12"> Add/Update Broker Code to json list <a href="/api/2020/amf/root/addBCtoList" target="_blank">Open Page</a> </span>
            </div>
        </div> -->
        <!-- accordion -->
        <div id="accordion">
            <h3>Add/Update Broker Code to json list</h3>
            <div>
                <a href="{{$formPrefix}}api/2020/amf/root/addBCtoList" target="_blank">Open Page</a>
            </div>
            
            <h3>Banner Message</h3>
            <div>
                @include('admin/bannerEditUpate')
            </div>
            
            <h3>AMF Rates</h3>
            <div>
                @include('admin/amfRates')
            </div>

            <h3>Property Modifiers</h3>
            <div>
                @include('admin/propertyModifiers')
            </div>

            <h3>Calculator</h3>
            <div>
                @include('admin/calculator')
            </div>

            <h3>Form Province Rule</h3>
            <div>
                @include('admin/formProvinceRule')
            </div>

            <h3>CEF Schedule Limit</h3>
            <div>
                @include('admin/cefScheduleLimit')
            </div>

            <h3>Plumbing Operation/Product IAO - Rates</h3>
            <div>
                @include('admin/plumbing_iao_rates')
            </div>
            
        </div>

        <!-- footer -->
        <footer>
            <hr>
            <p style="text-align: center;">&copy; Copyright 2020 - <?php $cy = date('Y'); if($cy == "2020"){echo "Present";}else{echo $cy;}?>  <a href="https://www.amfredericks.com/" target="_blank" data-toggle="tooltip" title="<img src='https://rtq-form.amfum.com/public/img/amfsite.png' width='150' height='100'>"> <b style="color: blue;"> A.M.Fredericks Underwriting Management Ltd.</b> </a></p>
        </footer>
        <!-- End footer -->
    
        <script type="text/javascript">
            
            $(document).ready(function(){
                //activate bootstrap tooltip
                $('[data-toggle="tooltip"]').tooltip({
                    html:true,
                    placement : 'top'
                });

                $( "#accordion" ).accordion({
                    collapsible: true
                });
                
            });
        </script>
    </body>
</html>
