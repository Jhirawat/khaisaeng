@extends('layouts.app')

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

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="card bg-white text-white" style="border-radius: 2rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="text-dark fw-bold mb-2 text-uppercase">QRcode ชำระเงิน</h2>
                                <p class="text-dark mb-5">โปรดสแกนเพื่อชำระเงินและอัพโหลดสลิป</p>
                                <div class="card-body">


                                    <center> <img
                                            src="https://media.discordapp.net/attachments/799534657523154967/1070204450083455016/320536374_514244424134923_4636217947386253321_n.jpg?width=481&height=701"
                                            style="height: 450px; width: 300px;"></a></center>


                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated"
                                            role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <br>


                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col">
                                                <h2 class="fs-title">อัพโหลดรูป:</h2>
                                            </div>
                                            <label for="image" class="form-label">กรุณาอัพโหลดสลิป
                                                เพื่อยืนยันการชำระเงิน</label>
                                            <input type="file" class="form-control" name="image"
                                                placeholder="Image URL" />
                                        </div>
                                    </div>
                                    {{-- <label class="fieldlabels">กรุณาอัพโหลดสลิป เพื่อยืนยันการชำระเงิน</label>
                                            <input type="file" name="pic" accept="image/*"
                                                style="border-radius: 15px;"> --}}
                                </div>
                                {{-- <input type="button" name="next" class="next action-button" value="Submit"
                                            style="border-radius: 15px;" />
                                        <input type="button" name="previous" class="previous action-button-previous"
                                            value="Previous" style="border-radius: 15px;" /> --}}

                                <a href="/pay" type="button" name="previous" class="previous action-button-previous"
                                    style="background-color: #c8887e;height: 30px;width: 120px;padding: 0; color:white;border-radius: 7px;">
                                    กลับ
                                </a>

                                <a href="/order" type="button" name="next" class="next action-button" value="Submit"
                                    style="background-color: #877EC8;height: 30px;width: 120px;padding: 0; color:white;border-radius: 7px;">
                                    ถัดไป
                                </a>





                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

