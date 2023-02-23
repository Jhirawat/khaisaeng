@extends('layouts.app')

@section('style')

    <style>
        /* your CSS goes here*/
    </style>



@section('js')

    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script>
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        document.getElementById("current-date").textContent = dd + '/' + mm + '/' + yyyy;
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
                                <p class="text-dark">วันที่: {{ date('d/m/Y') }}</p>
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

                                        <div>
                                            <p>วันที่: <span id="current-date"></span></p>

                                        </div>
                                        <!-- Latest compiled and minified CSS -->




                                        <!-- Optional theme -->





                                        <!--Default date and time picker -->





                                        <a href="/pay" type="button" name="previous"
                                            class="previous action-button-previous"
                                            style="background-color: #c8887e;height: 30px;width: 120px;padding: 0; color:white;border-radius: 7px;">
                                            กลับ
                                        </a>

                                        <a href="/tracking" type="button" name="next" class="next action-button"
                                            value="Submit"
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
