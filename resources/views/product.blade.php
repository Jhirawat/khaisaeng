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

        .skin-2 .num-in button {
            width: 40%;
            display: block;
            height: 40px;
            float: left;
            position: relative;
        }

        .skin-2 .num-in button:before,
        .skin-2 .num-in button:after {
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

        .skin-2 .num-in button.plus:after {
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
        // $(document).ready(function() {
        //     $('.num-in button').click(function() {
        //         var $input = $(this).parents('.num-block').find('input.in-num');
        //         if ($(this).hasClass('minus')) {
        //             var count = parseFloat($input.val()) - 1;
        //             count = count < 1 ? 1 : count;
        //             if (count < 2) {
        //                 $(this).addClass('dis');
        //             } else {
        //                 $(this).removeClass('dis');
        //             }
        //             $input.val(count);

        //             // $('#submit').click();

        //         } else {
        //             var count = parseFloat($input.val()) + 1
        //             $input.val(count);

        //             // $('#submit').click();

        //             if (count > 1) {
        //                 $(this).parents('.num-block').find(('.minus')).removeClass('dis');
        //             }
        //         }

        //         $input.change();
        //         return false;
        //     });

        // });


        $(document).ready(function() {
            $('.num-in button').click(function() {
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

                    // $('#submit').click();
                } else {
                    var count = parseFloat($input.val()) + 1
                    $input.val(count);

                    // $('#submit').click();

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

<div class="card" class="carousel-item active">
    <img src="https://media.discordapp.net/attachments/799534657523154967/1070996275459260416/Fresh__organic.png?width=1246&height=701"
    style="height: 500px; width:1000px;">
</div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row ">
                    @foreach ($productss as $item)
                        <div class="col"style="margin-top: 25px;                        ">
                            <div class="card" style="width: 18rem">
                                <div class="card-body">
                                    <img src="{{ asset('images/' . $item->image) }}" class="card-img-top" width="18"
                                        height="400" />
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-truncate mt-2">
                                        {{ $item->name }}
                                    </h5>
                                    <p class="card-text text-truncate mt-2">
                                        {{ $item->description }}
                                    </p>
                                    <p class="card-text">ราคา {{ $item->price }} ฿</p>


                                    {{-- <div class="d-grid gap-2" role="toolbar" aria-label="Toolbar with button groups">
                                        <div class="btn-group mr-2" role="group" aria-label="First group">
                                            <div class="d-flex mb-4" style="max-width: 300px"> --}}
                                                {{-- <div class="num-block skin-2">
                                                    <div class="num-in">
                                                        <button class="minus dis"></button>
                                                        <input type="text" class="in-num" value="1" readonly="">
                                                        <button class="plus"></button
                                                            >
                                                    </div>
                                                </div> --}}


                                                <form action="{{ route('cart.store') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="d-grid gap-2" role="toolbar" aria-label="Toolbar with button groups">
                                                        <div class="btn-group mr-2" role="group" aria-label="First group">
                                                            <div class="d-flex mb-4" style="max-width: 300px">
                                                    <div class="pl-md-0 pl-2">
                                                        <div class="num-block skin-2">
                                                            <div class="num-in">
                                                                <button class="minus dis"></button>

                                                                <input type="hidden" value="{{ $item->id }}"
                                                                    name="id">
                                                                <input type="hidden" value="{{ $item->name }}"
                                                                    name="name">
                                                                <input type="hidden" value="{{ $item->price }}"
                                                                    name="price">
                                                                <input type="hidden" value="{{ $item->image }}"
                                                                    name="image">
                                                                <input type="hidden" value="1" name="quantity">

                                                                <input type="text" class="in-num" value="1" readonly
                                                                    name="quantity"
                                                                    value="{{ $item->quantity }}"class="w-6 text-center bg-gray-300" />

                                                                <button class="plus"></button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- <button type="submit" id="submit"
                                class="hidden">update</button> --}}

                                                    <button  class="btn btn btn-lg btn-block"
                                                        class="px-4 py-2 text-white bg-blue-800 rounded"
                                                        style="background-color: #9c6d5a;height: 40px;width: 120px;padding: 0; color:white;border-radius:25px;">ใส่ตระกร้า</button>
                                                </form>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">
                                                {{ $item->name }}
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body" width="100px">
                                            <img :src="image" width="100%" />
                                        </div>
                                        <div class="container">
                                            <p>{{ $item->description }}</p>
                                            <p>ราคา {{ $item->price }} ฿</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="button" @click="buyItem()" class="btn btn-primary">
                                                ซื้อสินค้า
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
