@extends('layouts.app')



@section('style')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <style>
        .top {
            padding-top: 40px;
            padding-left: 13% !important;
            padding-right: 13% !important;
        }

        /*Icon progressbar*/
        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            padding-left: 0px;
            margin-top: 30px;
        }

        #progressbar li {
            list-style-type: none;
            font-size: 13px;
            width: 25%;
            float: left;
            position: relative;
            font-weight: 400;
        }



        #progressbar li:before {
            width: 40px;
            height: 40px;
            line-height: 45px;
            display: block;
            font-size: 20px;
            background: #C5CAE9;
            border-radius: 50%;
            margin: auto;
            padding: 0px;
        }

        /*ProgressBar connectors*/
        #progressbar li:after {
            content: '';
            width: 100%;
            height: 12px;
            background: #C5CAE9;
            position: absolute;
            left: 0;
            top: 16px;
            z-index: -1;
        }

        #progressbar li:last-child:after {
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
            position: absolute;
            left: -50%;
        }

        #progressbar li:nth-child(2):after,
        #progressbar li:nth-child(3):after {
            left: -50%;
        }

        #progressbar li:first-child:after {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
            position: absolute;
            left: 50%;
        }

        #progressbar li:last-child:after {
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        #progressbar li:first-child:after {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }

        /*Color number of the step and the connector before it*/
        /* #progressbar li.active:before,
                            #progressbar li.active:after {
                                background: #1fff66;
                            } */

        #progressbar li.active:before {
            font-family: FontAwesome;
            content: "\f00c";
        }

        .icon {
            width: 50px;
            height: 50px;
            margin-right: 25px;
        }

        .icon-content {
            padding-bottom: 20px;
        }

        @media screen and (max-width: 992px) {
            .icon-content {
                width: 50%;
            }
        }






        * {
            margin: 0;
            padding: 0;
        }

        html {
            height: 100%;
        }

        p {
            color: grey;
        }

        #heading {
            text-transform: uppercase;
            color: #C8937E;
            font-weight: normal;
        }

        #msform {
            text-align: center;
            position: relative;
            margin-top: 20px;
        }

        #msform fieldset {
            background: white;
            border: 0 none;
            border-radius: 0.5rem;
            box-sizing: border-box;
            width: 100%;
            margin: 0;
            padding-bottom: 20px;

            /*stacking fieldsets above each other*/
            position: relative;
        }

        .form-card {
            text-align: left;
        }

        /*Hide all except first fieldset*/
        #msform fieldset:not(:first-of-type) {
            display: none;
        }

        #msform input,
        #msform textarea {
            padding: 8px 15px 8px 15px;
            border: 1px solid #ccc;
            border-radius: 0px;
            margin-bottom: 25px;
            margin-top: 2px;
            width: 100%;
            box-sizing: border-box;
            font-family: montserrat;
            color: #2C3E50;
            background-color: #ECEFF1;
            font-size: 16px;
            letter-spacing: 1px;
        }

        #msform input:focus,
        #msform textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: 1px solid #C8937E;
            outline-width: 0;
        }

        /*Next Buttons*/
        #msform .action-button {
            width: 100px;
            background: #865846;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 0px 10px 5px;
            float: right;
        }

        #msform .action-button:hover,
        #msform .action-button:focus {
            background-color: #C8937E;
        }

        /*Previous Buttons*/
        #msform .action-button-previous {
            width: 100px;
            background: #d86f13;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px 10px 0px;
            float: right;
        }

        #msform .action-button-previous:hover,
        #msform .action-button-previous:focus {
            background-color: #000000;
        }

        /*The background card*/
        .card {
            z-index: 0;
            border: none;
            position: relative;
        }

        /*FieldSet headings*/
        .fs-title {
            font-size: 25px;
            color: #078845;
            margin-bottom: 15px;
            font-weight: normal;
            text-align: left;
        }



        /*Step Count*/
        .steps {
            font-size: 25px;
            color: gray;
            margin-bottom: 10px;
            font-weight: normal;
            text-align: right;
        }



        /*Icon progressbar*/
        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            color: lightgrey;
        }

        #progressbar .active {
            color: #030303;
        }



        /*Icons in the ProgressBar*/
        #progressbar #account:before {
            font-family: FontAwesome;
            content: "\F1BC";
        }

        #progressbar #personal:before {
            font-family: FontAwesome;
            content: "\F5EA";
        }

        #progressbar #payment:before {
            font-family: FontAwesome;
            content: "\F271";
        }

        #progressbar #confirm:before {
            font-family: FontAwesome;
            content: "\f145";
        }

        /*Icon ProgressBar before any progress*/
        #progressbar li:before {
            width: 50px;
            height: 50px;
            line-height: 45px;
            display: block;
            font-size: 20px;
            color: #ffffff;
            background: lightgray;
            border-radius: 50%;
            margin: 0 auto 10px auto;
            padding: 2px;
        }

        /*ProgressBar connectors*/
        #progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: lightgray;
            position: absolute;
            left: 0;
            top: 25px;
            z-index: -1;
        }

        /*Color number of the step and the connector before it*/
        #progressbar li.active:before,
        #progressbar li.active:after {
            background: #FBCD18;
        }

        /*Animated Progress Bar*/
        .progress {
            height: 20px;
        }




        body {
            background-color: #eeeeee;
        }

        .footer-background {
            background-color: rgb(204, 199, 199);
        }

        @media(max-width:991px) {
            #heading {
                padding-left: 50px;
            }

            #prc {
                margin-left: 70px;
                padding-left: 110px;
            }

            #quantity {
                padding-left: 48px;
            }

            #produc {
                padding-left: 40px;
            }

            #total {
                padding-left: 54px;
            }
        }

        @media(max-width:767px) {
            .mobile {
                font-size: 10px;
            }

            h5 {
                font-size: 14px;
            }

            h6 {
                font-size: 9px;
            }

            #mobile-font {
                font-size: 11px;
            }

            #prc {
                font-weight: 700;
                margin-left: -45px;
                padding-left: 105px;
            }

            #quantity {
                font-weight: 700;
                padding-left: 6px;
            }

            #produc {
                font-weight: 700;
                padding-left: 0px;
            }

            #total {
                font-weight: 700;
                padding-left: 9px;
            }

            #image {
                width: 60px;
                height: 60px;
            }

            .col {
                width: 100%;
            }

            #zero-pad {
                padding: 2%;
                margin-left: 10px;
            }

            #footer-font {
                font-size: 12px;
            }

            #heading {
                padding-top: 15px;
            }
        }

        * {
            padding: 0;
            margin: 0;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }


        /* .num-block {
                                                                    float: left;
                                                                    width: 100%;
                                                                    padding: 15px 30px;
                                                                } */

        /* skin 2 */
        .skin-2 .num-in {
            background: #FFFFFF;
            box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.15);
            border-radius: 25px;
            height: 40px;
            width: 110px;
            float: left;
        }

        .skin-2 .num-in span {
            width: 40%;
            display: block;
            height: 40px;
            float: left;
            position: relative;
        }

        .skin-2 .num-in span:before,
        .skin-2 .num-in span:after {
            content: '';
            position: absolute;
            background-color: #667780;
            height: 2px;
            width: 10px;
            top: 50%;
            left: 50%;
            margin-top: -1px;
            margin-left: -5px;
        }

        .skin-2 .num-in span.plus:after {
            transform: rotate(90deg);
        }

        .skin-2 .num-in input {
            float: left;
            width: 20%;
            height: 40px;
            border: none;
            text-align: center;
        }
    </style>




@section('js')
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script>
        $(document).ready(function() {

            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;
            var current = 1;
            var steps = $("fieldset").length;

            setProgressBar(current);

            $(".next").click(function() {

                current_fs = $(this).parent();
                next_fs = $(this).parent().next();

                //Add Class Active
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                //show the next fieldset
                next_fs.show();
                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        next_fs.css({
                            'opacity': opacity
                        });
                    },
                    duration: 500
                });
                setProgressBar(++current);
            });

            $(".previous").click(function() {

                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();

                //Remove class active
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

                //show the previous fieldset
                previous_fs.show();

                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        previous_fs.css({
                            'opacity': opacity
                        });
                    },
                    duration: 500
                });
                setProgressBar(--current);
            });

            function setProgressBar(curStep) {
                var percent = parseFloat(100 / steps) * curStep;
                percent = percent.toFixed();
                $(".progress-bar")
                    .css("width", percent + "%")
            }

            $(".submit").click(function() {
                return false;
            })

        });
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>




@section('content')

    <div class="container px-1 px-md-4 py-5 mx-auto">
        <div class="card">
            <div class="row d-flex justify-content-between px-3 top">
                <div class="d-flex">
                    <h5>ORDER <span class="text-primary font-weight-bold">#Y34XDHR</span></h5>
                </div>
                <div class="d-flex flex-column text-sm-r">
                    <p class="mb-0">Expected Arrival <span>01/12/19</span></p>
                    <p>USPS <span class="font-weight-bold">234094567242423422898</span></p>
                </div>
            </div>



            {{-- <div class="d-flex justify-content-center container mt-5">
                <div class="card p-3 bg-white"><i class="fa fa-apple"></i>
                    <div class="about-product text-center mt-2"><img src="https://i.imgur.com/3VTaSeb.png" width="300">
                        <div>
                            <h4>Believing is seeing</h4>
                            <h6 class="mt-0 text-black-50">Apple pro display XDR</h6>
                        </div>
                    </div>
                    <div class="stats mt-2">
                        <div class="d-flex justify-content-between p-price"><span>Pro Display XDR</span><span>$5,999</span></div>
                        <div class="d-flex justify-content-between p-price"><span>Pro stand</span><span>$999</span></div>
                        <div class="d-flex justify-content-between p-price"><span>Vesa Mount Adapter</span><span>$199</span></div>
                    </div>
                    <div class="d-flex justify-content-between total font-weight-bold mt-4"><span>Total</span><span>$7,197.00</span></div>
                </div>
            </div> --}}




            <div class="col-lg-10 col-12 pt-3justify-content-center container mt-5">
                <div
                    class="d-flex flex-row justify-content-between align-items-center pt-lg-4 pt-2 pb-3 border-bottom mobile">
                    <div class="d-flex flex-row align-items-center">
                        <div><img
                                src="https://images.unsplash.com/photo-1529374255404-311a2a4f1fd9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                                width="150" height="150" alt="" id="image"></div>
                        <div class="d-flex flex-column pl-md-3 pl-1">
                            <div>
                                <h6>COTTON T-SHIRT</h6>
                            </div>
                            <div>Art.No:<span class="pl-2">091091001</span></div>
                            <div>Color:<span class="pl-3">White</span></div>
                            <div>Size:<span class="pl-4"> M</span></div>
                        </div>
                    </div>
                    <div class="pl-md-0 pl-1"><b>$9.99</b></div>
                    <div class="pl-md-0 pl-2">
                        <div class="num-block skin-2">
                            <div class="num-in">
                                <span class="minus dis"></span>
                                <input type="text" class="in-num" value="1" readonly="">
                                <span class="plus"></span>
                            </div>
                        </div>
                    </div>
                    <div class="pl-md-0 pl-1"><b>$19.98</b></div>
                    <div class="close">&times;</div>
                </div>
            </div>


            <div class="col-lg-10 col-12 pt-3justify-content-center container mt-5">
                <div
                    class="d-flex flex-row justify-content-between align-items-center pt-lg-4 pt-2 pb-3 border-bottom mobile">
                    <div class="d-flex flex-row align-items-center">
                        <div><img
                                src="https://images.unsplash.com/photo-1529374255404-311a2a4f1fd9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                                width="150" height="150" alt="" id="image"></div>
                        <div class="d-flex flex-column pl-md-3 pl-1">
                            <div>
                                <h6>COTTON T-SHIRT</h6>
                            </div>
                            <div>Art.No:<span class="pl-2">091091001</span></div>
                            <div>Color:<span class="pl-3">White</span></div>
                            <div>Size:<span class="pl-4"> M</span></div>
                        </div>
                    </div>
                    <div class="pl-md-0 pl-1"><b>$9.99</b></div>
                    <div class="pl-md-0 pl-2">
                        <div class="num-block skin-2">
                            <div class="num-in">
                                <span class="minus dis"></span>
                                <input type="text" class="in-num" value="1" readonly="">
                                <span class="plus"></span>
                            </div>
                        </div>
                    </div>
                    <div class="pl-md-0 pl-1"><b>$19.98</b></div>
                    <div class="close">&times;</div>
                </div>
            </div>















            <div class="row justify-content-between top">


                <h2 id="heading">ผลิตภัณฑ์ของคุณถูกส่งมาจาก</h2>
                <p>ฟาร์ม</p>

                <form id="msform">
                    <!-- progressbar -->
                    <ul id="progressbar">
                        <li class="active bi bi-box-arrow-in-down" id="account"></i><strong>กำลังเตรียมจัดส่ง</strong></li>
                        <li class="bi bi-truck" id="personal"><strong>กำลังจัดส่ง</strong></li>
                        <li class="bi bi-check2-square" id="payment"><strong>จัดส่งเสร็จสิ้น</strong></li>
                        <li class="bi bi-arrow-up-short" id="confirm"><strong>Finish</strong></li>
                    </ul>



                    <br>
                    <!-- fieldsets -->
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Account Information:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 1 - 4</h2>
                                </div>
                            </div>

                        </div>
                        <input type="button" name="next" class="next action-button" value="ถัดไป" />
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Personal Information:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 2 - 4</h2>
                                </div>
                            </div>

                        </div>
                        <input type="button" name="next" class="next action-button" value="ถัดไป" />
                        <input type="button" name="previous" class="previous action-button-previous" value="ก่อนหน้า" />
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Image Upload:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 3 - 4</h2>
                                </div>
                            </div>

                        </div>
                        <input type="button" name="next" class="next action-button" value="ถัดไป" />
                        <input type="button" name="previous" class="previous action-button-previous"
                            value="ก่อนหน้า" />
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Finish:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 4 - 4</h2>
                                </div>
                            </div>
                            <br><br>
                            <h2 class="purple-text text-center"><strong>ชอบคุณที่ใช้การของเรา</strong></h2>
                            <br>

                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    </div>

    </div>
    </div>
    </div>
@endsection
