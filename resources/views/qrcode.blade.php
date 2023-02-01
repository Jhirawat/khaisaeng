@extends('layouts.app')


@section('style')
    <style>
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
            color: #cb724e;
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



        /*Next Buttons*/
        #msform .action-button {
            width: 100px;
            background: #cb724e;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 0px 10px 5px;
            float: right;
        }



        /*Previous Buttons*/
        #msform .action-button-previous {
            width: 100px;
            background: #675d59;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px 10px 0px;
            float: right;
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
            color: #cb724e;
            margin-bottom: 15px;
            font-weight: normal;
            text-align: left;
        }

        .fieldlabels {
            color: gray;
            text-align: left;
        }




    </style>




@section('js')
{{-- <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script> --}}
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

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-11 col-sm-9 col-md-7 col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3"style="border-radius: 30px;">
                    <h2 id="heading">QRcode ชำระเงิน</h2>
                    <p>โปรดสแกนเพื่อชำระเงินและอัพโหลดสลิป</p>

                    <form id="msform">

                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col">

                                    <img src="https://media.discordapp.net/attachments/799534657523154967/1070204450083455016/320536374_514244424134923_4636217947386253321_n.jpg?width=481&height=701"
                                        style=" height: 550
                                        width: 200"></a>

                                </div>
                            </div>
                        </div>

                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <br>

                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">อัพโหลดรูป:</h2>
                                    </div>

                                </div>
                                <label class="fieldlabels">กรุณาอัพโหลดสลิป เพื่อยืนยันการชำระเงิน</label>
                                <input type="file" name="pic" accept="image/*" style="border-radius: 15px;">
                            </div>
                            <input type="button" name="next" class="next action-button" value="Submit" style="border-radius: 15px;" />
                            <input type="button" name="previous" class="previous action-button-previous"
                                value="Previous" style="border-radius: 15px;" />
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
