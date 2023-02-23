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
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        document.getElementById("current-date").textContent = dd + '/' + mm + '/' + yyyy;
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

                            <p>วันที่: <span id="current-date"></span></p>

                            <div class=" my-3">
                                <p class="h8">ที่อยู่ในการจัดส่ง </p>

                            </div>



                            <div class="container">

                                <form class="well form-horizontal" action=" " method="post" id="contact_form">
                                    <fieldset>

                                        <!-- Form Name -->


                                        <!-- Text input-->



                                       
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
