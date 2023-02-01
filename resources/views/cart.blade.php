@extends('layouts.app')

@section('style')
    <style>
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
            $('.num-in span').click(function() {
                var $input = $(this).parents('.num-block').find('input.in-num');
                if ($(this).hasClass('minus')) {
                    var count = parseFloat($input.val()) - 1;
                    count = count < 1 ? 1 : count;
                    if (count < 2) {
                        $(this).addClass('dis');
                    } else {
                        $(this).removeClass('dis');
                    }
                    $input.val(count);
                } else {
                    var count = parseFloat($input.val()) + 1
                    $input.val(count);
                    if (count > 1) {
                        $(this).parents('.num-block').find(('.minus')).removeClass('dis');
                    }
                }

                $input.change();
                return false;
            });

        });
    </script>








@section('content')
    <div class="container bg-white rounded-top mt-5" id="zero-pad" style="border-radius: 25px;">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-10 col-12 pt-3">
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
        </div>
    </div>
    <div class="container bg-white rounded-top mt-5" id="zero-pad">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-10 col-12 pt-3">
                <div class="container bg-light rounded-bottom py-4" id="zero-pad">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-10 col-12">
                            <div class="d-flex justify-content-between align-items-center">



                                <a href="/ " type="button" class="btn "
                                    style="background-color: #8b8f2b;height: 30px;width: 120px;padding: 0; color:white;border-radius: 7px;">
                                    ถัดไป
                                </a>






                                <div class="px-md-0 px-1" id="footer-font">
                                    <b class="pl-md-4">ยอดรวมสุธิ<span class="pl-md-4">$61.78</span></b>
                                </div>





                                <a href="/pay" type="button" class="btn "
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

@endsection
