@extends('layouts.app')

@section('style')
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,700,500&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }

        body {
            min-height: 100vh;


            align-items: center;
            justify-content: center;
            background-color: azure;

        }

        .wrapper {
            max-width: 460px;
            justify-content: center;
        }

        .card {
            background-color: #060404;
        }

        p {
            margin: 115px;
        }

        .h8 {
            font-size: 25px;
            font-weight: 600;
            color: rgb(56, 29, 29);
        }


        .debit-card {
            width: 50%;
            height: 180px;
            padding: 10px;
            background-color: #0093E9;
            background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);
            position: relative;
            border-radius: 20px;
            box-shadow: 3px 3px 5px #0000001a;
            transition: all 0.3s ease-in;
            cursor: pointer;
        }

        .debit-card:hover {
            box-shadow: 5px 3px 5px #000000a2;
        }

        .card-2 {
            background-color: #21D4FD;
            background-image: linear-gradient(116deg, #97ba09 0%, #1d5b0c 100%);
        }

        .text-muted {
            font-size: 0.8rem;
        }

        .text-white {
            font-size: 14px;
        }

        .input {
            position: absolute;
            top: 6px;
            right: 0;
        }

        input[type="radio"] {
            appearance: none;
            width: 20px;
            height: 20px;
            background-color: #eee;
            position: relative;
            border-radius: 3px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            outline: none;
        }

        input[type="radio"]:after {
            position: absolute;
            width: 100%;
            height: 100%;
            font-family: "Font Awesome 5 Free";
            font-weight: 600;
            content: "\f00c";
            color: #fff;
            font-size: 15px;
            display: none;
        }

        input[type="radio"]:checked,
        input[type="radio"]:checked:hover {
            background-color: rgb(210, 138, 45);
        }

        input[type="radio"]:checked::after {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        input[type="radio"]:hover {
            background-color: #ddd;
        }


        #success_message {
            display: none;
        }
    </style>



@section('js')
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#contact_form').bootstrapValidator({
                    // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
                    feedbackIcons: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },
                    fields: {
                        phone: {
                            validators: {
                                notEmpty: {
                                    message: 'Please supply your phone number'
                                },
                                phone: {
                                    country: 'US',
                                    message: 'Please supply a vaild phone number with area code'
                                }
                            }
                        },
                        address: {
                            validators: {
                                stringLength: {
                                    min: 8,
                                },
                                notEmpty: {
                                    message: 'Please supply your street address'
                                }
                            }
                        },
                        district: {
                            validators: {
                                stringLength: {
                                    min: 8,
                                },
                                notEmpty: {
                                    message: 'Please supply your district'
                                }
                            }
                        },
                        city: {
                            validators: {
                                stringLength: {
                                    min: 4,
                                },
                                notEmpty: {
                                    message: 'Please supply your city'
                                }
                            }
                        },
                        state: {
                            validators: {
                                notEmpty: {
                                    message: 'Please select your state'
                                }
                            }
                        },
                        zip: {
                            validators: {
                                notEmpty: {
                                    message: 'Please supply your zip code'
                                },
                                zipCode: {
                                    country: 'US',
                                    message: 'Please supply a vaild zip code'
                                }
                            }
                        },
                        comment: {
                            validators: {
                                stringLength: {
                                    min: 10,
                                    max: 200,
                                    message: 'Please enter at least 10 characters and no more than 200'
                                },
                                notEmpty: {
                                    message: 'Please supply a description of your project'
                                }
                            }
                        }
                        phone: {
                            validators: {
                                notEmpty: {
                                    message: 'Please supply your phone number'
                                },
                                phone: {
                                    country: 'US',
                                    message: 'Please supply a vaild phone number with area code'
                                }
                            }
                        }
                    }
                })
                .on('success.form.bv', function(e) {
                    $('#success_message').slideDown({
                        opacity: "show"
                    }, "slow") // Do something ...
                    $('#contact_form').data('bootstrapValidator').resetForm();

                    // Prevent form submission
                    e.preventDefault();

                    // Get the form instance
                    var $form = $(e.target);

                    // Get the BootstrapValidator instance
                    var bv = $form.data('bootstrapValidator');

                    // Use Ajax to submit form data
                    $.post($form.attr('action'), $form.serialize(), function(result) {
                        console.log(result);
                    }, 'json');
                });
        });
    </script>



@section('content')
<link rel="stylesheet" href="https://cdn.tailwindcss.com/3.0.12">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="card bg-white text-dark" style="border-radius: 2rem;">
                        <div class="card-body p-5 text-center">
                            {{-- <div class="card px-4"> --}}
                            <div class=" my-3">
                                <p class="h8">ชำระเงิน</p>
                                <p class="text-muted ">เลือก วิธีการชำระเงิน</p>
                            </div>

                            <div class="card-body p-5 text-center" >
                                
                                <div class="debit-card mb-3">
                                    <div class="d-flex flex-column h-100">
                                        <label class="d-block">
                                            <div class="d-flex position-relative">
                                                <div>

                                                    <p class="mt-2 mb-4 text-white fw-bold">ชำระเงิน ปลายทาง</p>
                                                </div>
                                                <div class="input">
                                                    <input type="radio" name="cash" id="check">
                                                </div>
                                            </div>
                                        </label>
                                        <div>
                                            <i class="bi bi-cash-stack" style='font-size:100px'></i>
                                        </div>
                                    </div>
                                </div>




                                <div class="debit-card card-2 mb-4">
                                    <div class="d-flex flex-column h-100">
                                        <label class="d-block">
                                            <div class="d-flex position-relative">
                                                <div>

                                                    <p class="text-white fw-bold">ขำระเงิน คิวอาร์โค้ด</p>
                                                </div>
                                                <div class="input">
                                                    <input type="radio" name="card" id="check">
                                                </div>
                                            </div>
                                        </label>
                                        <div>
                                            <i class="bi bi-qr-code-scan" style='font-size:100px'></i>
                                        </div>
                                    </div>
                                </div>

                            </div>



                            <div class=" my-3">
                                <p class="h8">ที่อยู่ในการจัดส่ง </p>

                            </div>



                            <div class="container">

                                <form class="well form-horizontal" action=" " method="post" id="contact_form">
                                    <fieldset>

                                        <!-- Form Name -->


                                        <!-- Text input-->

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">บ้านเลขที่</label>
                                            <div class="col-md-4 inputGroupContainer">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i
                                                            class="glyphicon glyphicon-user"></i></span>
                                                    <input name="address" placeholder="บ้านเลขที่" class="form-control"
                                                        type="text">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Text input-->



                                        <!-- Text input-->

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">ตำบล</label>
                                            <div class="col-md-4 inputGroupContainer">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i
                                                            class="glyphicon glyphicon-earphone"></i></span>
                                                    <input name="district" placeholder="ตำบล" class="form-control"
                                                        type="text">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Text input-->



                                        <!-- Text input-->

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">อำเภอ</label>
                                            <div class="col-md-4 inputGroupContainer">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i
                                                            class="glyphicon glyphicon-home"></i></span>
                                                    <input name="city" placeholder="อำเภอ" class="form-control"
                                                        type="text">
                                                </div>
                                            </div>
                                        </div>



                                        <!-- Select Basic -->

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">จังหวัด</label>
                                            <div class="col-md-4 selectContainer">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i
                                                            class="glyphicon glyphicon-list"></i></span>
                                                    <select name="state" class="form-control selectpicker">
                                                        <option value=" ">เลือกจังหวัด</option>
                                                        <option>นครราชสีมา</option>
                                                        <option>เชียงใหม่</option>
                                                        <option>กาญจนบุรี</option>
                                                        <option>ตาก</option>
                                                        <option>อุบลราชธานี</option>
                                                        <option>สุราษฎร์ธานี</option>
                                                        <option>ชัยภูมิ</option>
                                                        <option>แม่ฮ่องสอน</option>
                                                        <option>เพชรบูรณ์</option>
                                                        <option>ลำปาง</option>
                                                        <option>อุดรธานี</option>
                                                        <option>เชียงราย</option>
                                                        <option>น่าน</option>
                                                        <option>เลย</option>
                                                        <option>ขอนแก่น</option>
                                                        <option>พิษณุโลก</option>
                                                        <option>บุรีรัมย์</option>
                                                        <option>นครศรีธรรมราช</option>
                                                        <option>สกลนคร</option>
                                                        <option>นครสวรรค์</option>
                                                        <option>ศรีสะเกษ</option>
                                                        <option>กำแพงเพชร</option>
                                                        <option>ร้อยเอ็ด</option>
                                                        <option>สุรินทร์</option>
                                                        <option>อุตรดิตถ์</option>
                                                        <option>สงขลา</option>
                                                        <option>สระแก้ว</option>
                                                        <option>กาฬสินธุ์</option>
                                                        <option>อุทัยธานี</option>
                                                        <option>สุโขทัย</option>
                                                        <option>แพร่</option>
                                                        <option>ประจวบคีรีขันธ์</option>
                                                        <option>จันทบุรี</option>
                                                        <option>พะเยา</option>
                                                        <option>เพชรบุรี</option>
                                                        <option>ลพบุรี</option>
                                                        <option>ชุมพร</option>
                                                        <option>นครพนม</option>
                                                        <option>สุพรรณบุรี</option>
                                                        <option>ฉะเชิงเทรา</option>
                                                        <option>มหาสารคาม</option>
                                                        <option>ราชบุรี</option>
                                                        <option>ตรัง</option>
                                                        <option>ปราจีนบุรี</option>
                                                        <option>กระบี่</option>
                                                        <option>พิจิตร</option>
                                                        <option>ยะลา</option>
                                                        <option>ลำพูน</option>
                                                        <option>นราธิวาส</option>
                                                        <option>ชลบุรี</option>
                                                        <option>มุกดาหาร</option>
                                                        <option>บึงกาฬ</option>
                                                        <option>พังงา</option>
                                                        <option>ยโสธร</option>
                                                        <option>หนองบัวลำภู</option>
                                                        <option>สระบุรี</option>
                                                        <option>ระยอง</option>
                                                        <option>พัทลุง</option>
                                                        <option>ระนอง</option>
                                                        <option>ระนอง</option>
                                                        <option>อำนาจเจริญ</option>
                                                        <option>หนองคาย</option>
                                                        <option>ตราด</option>
                                                        <option>พระนครศรีอยุธยา</option>
                                                        <option>ชัยนาท</option>
                                                        <option>นครปฐม</option>
                                                        <option>นครนายก</option>
                                                        <option>ปัตตานี</option>
                                                        <option>กรุงเทพมหานคร</option>
                                                        <option>ปทุมธานี</option>
                                                        <option>สมุทรปราการ</option>
                                                        <option>อ่างทอง</option>
                                                        <option>สมุทรสาคร</option>
                                                        <option>นนทบุรี</option>
                                                        <option>ภูเก็ต</option>
                                                        <option>สมุทรสงคราม</option>
                                                        <option>สิงห์บุรี</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Text input-->

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">รหัสไปรษณีย์</label>
                                            <div class="col-md-4 inputGroupContainer">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i
                                                            class="glyphicon glyphicon-home"></i></span>
                                                    <input name="zip" placeholder="รหัสไปรษณีย์" class="form-control"
                                                        type="text">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">รายละเอียดที่อยู่ที่ในการจัดส่ง</label>
                                            <div class="col-md-4 inputGroupContainer">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i
                                                            class="glyphicon glyphicon-globe"></i></span>
                                                    <input name="website" placeholder="ห้อง ชั้น  " class="form-control"
                                                        type="text">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">หมายเลขโทรศัพท์</label>
                                            <div class="col-md-4 inputGroupContainer">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i
                                                            class="glyphicon glyphicon-globe"></i></span>
                                                    <input name="phone" placeholder="(+66)15650861  "
                                                        class="form-control" type="text">
                                                </div>
                                            </div>
                                        </div>


                                       
                                    </fieldset>
                                </form>
                            </div>
                        </div><!-- /.container -->



                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
