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

                    $('#submit').click();
                } else {
                    var count = parseFloat($input.val()) + 1
                    $input.val(count);

                    $('#submit').click();

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
    <div class="container px-6 mx-auto">
        <div class="flex justify-center my-6">
            <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                {{-- @if ($message = Session::get('success'))
                    <div class="p-4 mb-3 bg-green-400 rounded">
                        <p class="text-green-800">{{ $message }}</p>
                    </div>
                @endif --}}
                <h3 class="text-3xl text-bold flex justify-center">MY CART</h3>
                <div class="flex-1">
                    <table class="w-full text-sm lg:text-base" cellspacing="0">
                        <thead>
                            <tr class="h-12 uppercase">
                                <th class="hidden md:table-cell"></th>
                                <th class="text-left">Name</th>
                                <th class="pl-5 text-left lg:text-right lg:pl-0">
                                    <span class="lg:hidden" title="Quantity">Qtd</span>
                                    <span class="hidden lg:inline">Quantity</span>
                                </th>
                                <th class="hidden text-right md:table-cell"> price</th>
                                <th class="hidden text-right md:table-cell"> Remove </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartItems as $item)
                                <tr>
                                    <td class="hidden pb-4 md:table-cell">
                                        <a href="#">
                                            <img src="{{ $item->attributes->image }}" class="w-20 rounded" alt="Thumbnail">

                                            {{-- <img src="{{ asset('images/' . $item->image) }}" class="card-img-top"
                                            style="max-width: 50px;max-height: 150px" /> --}}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#">
                                            <p class="mb-2 md:ml-4">{{ $item->name }}</p>

                                        </a>
                                    </td>
                                    <td class="justify-center mt-6 md:justify-end md:flex">
                                        <div class="h-10 w-28">
                                            <div class="relative flex flex-row w-full h-8">
                                                <form action="{{ route('cart.update') }}" method="POST">
                                                    @csrf
                                                    <div class="pl-md-0 pl-2">
                                                        <div class="num-block skin-2">
                                                            <div class="num-in">
                                                                <button class="minus dis"></button>
                                                                <input type="hidden" name="id"
                                                                    value="{{ $item->id }}">
                                                                <input type="text" class="in-num" readonly
                                                                    name="quantity"
                                                                    value="{{ $item->quantity }}"class="w-6 text-center bg-gray-300" />
                                                                <button class="plus"></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" id="submit" class="hidden">update</button>

                                                    {{-- <button type="button" @click="Dio(item.id)" class="btn btn btn-lg btn-block"
                                                        type="submit"
                                                        style="background-color: #9c6d5a;height: 40px;width: 50px;padding: 0; color:white;border-radius: 25px;"
                                                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        ใส่ตระกร้า
                                                    </button> --}}
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="hidden text-right md:table-cell">
                                        <span class="text-sm font-medium lg:text-base">
                                            ฿{{ $item->price }}
                                        </span>
                                    </td>
                                    <td class="hidden text-right md:table-cell">
                                        <form action="{{ route('cart.remove') }}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{ $item->id }}" name="id">
                                            <button class="px-4 py-2 text-dark ">x</button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{-- <div>
                        Total: ${{ Cart::getTotal() }}
                    </div> --}}
                    <div>
                        <form action="{{ route('cart.clear') }}" method="POST">
                            @csrf
                            <button class="px-6 py-2 text-red-800 bg-red-300">Remove All Cart</button>
                        </form>
                    </div>


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


                                {{-- <div class="px-md-0 px-1" id="footer-font">
                                    <b class="pl-md-4">ยอดรวมสุธิ<span class="pl-md-4">$61.78</span></b>
                                </div> --}}

                                <div>
                                    ยอดรวม: ฿{{ Cart::getTotal() }}
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
