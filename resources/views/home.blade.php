{{-- @extends('layouts.app')

@section('style')
    <style>
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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row ">
                    @foreach ($product as $item)
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
                                    <div class="d-grid gap-2" role="toolbar" aria-label="Toolbar with button groups">
                                        <div class="btn-group mr-2" role="group" aria-label="First group">
                                            <div class="d-flex mb-4" style="max-width: 300px">
                                                <div class="num-block skin-2">
                                                    <div class="num-in">
                                                        <span class="minus dis"></span>
                                                        <input type="text" class="in-num" value="1" readonly="">
                                                        <span class="plus"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" @click="Dio(item.id)" class="btn btn btn-lg btn-block"
                                                type="submit"
                                                style="background-color: #9c6d5a;height: 40px;width: 50px;padding: 0; color:white;border-radius: 25px;"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                ใส่ตระกร้า
                                            </button>

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
@endsection --}}
