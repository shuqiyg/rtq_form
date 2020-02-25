<!doctype html>
<html >
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Real Time Quote - Form</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/smartwizard@4.3.1/dist/css/smart_wizard_theme_arrows.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/smartwizard@4.3.1/dist/js/jquery.smartWizard.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script type="text/javascript" src="{{ URL::asset('js/custom.js') }}"></script>
        <!--<script type="text/javascript" src="{{ URL::asset('js/form-validate.js') }}"></script>-->
    </head>
    <body>
        <?php
            // get us-canada state/province name list
            $canState = json_decode(file_get_contents(public_path().'/json/canStateList.json'), true);
            $usState = json_decode(file_get_contents(public_path().'/json/usStateList.json'), true);

        ?>

        <h1 style="text-align: center;"> Real Time Quote - Form </h1>
        <div id="smartwizard" class="sw-main sw-theme-arrows">
            <ul class="nav nav-tabs step-anchor">
                <li><a href="#legal">Legal<br /><small>T&C</small></a></li>
                <li><a href="#tab-1">Broker<br /><small>Broker Info</small></a></li>
                <li><a href="#tab-2">Insured<br /><small>Insured Info</small></a></li>
                <li><a href="#tab-3">Risk Address<br /><small>Risk Address</small></a></li>
                <li><a href="#tab-4">Occupancy<br /><small>Building details</small></a></li>
                <li><a href="#tab-5">Coverage<br /><small>Coverage Required</small></a></li>
                
                <li><a href="#result">Result<br /><small>Final</small></a></li>
            </ul>
         
            <div>
                <!-- Legal Tab -->
                <div id="legal" class="">
                    @include('legal')
                </div>
                <!-- Broker Tab -->
                <div id="tab-1" class="">
                    @include('tab_1')
                </div>
                <!-- Insured & Mailing Address Tab -->
                <div id="tab-2" class="">
                    @include('tab_2')
                </div>
                <!-- Risk Address -->
                <div id="tab-3" class="">
                    @include('tab_3')
                </div>
                <!-- Occupance , Building Construction, Fire alarm/detectors & liability tab -->
                <div id="tab-4" class="">
                    @include('tab_4')
                </div>
                <!-- Coverage Required Tab -->
                <div id="tab-5" class="">
                    @include('tab_5')
                </div>  
                <!-- Final Tab -->
                <div id="result" class="">
                    @include('final')
                </div>
            </div>
        </div>
    </body>
</html>
