@extends('layouts.app')
@section('style')
    <style>
        body {
            color: #000;
            overflow-x: hidden;
            height: 100%;
            background-color: #7E57C2;
            background-repeat: no-repeat;
        }

        input {
            padding: 4px 10px 4px 10px;
            border-radius: 0px;
            background-color: #fff;
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #CFD8DC;
            color: #000;
            cursor: pointer;
            letter-spacing: 1px;
        }

        input[type=date]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            display: none;
        }

        input:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            outline-width: 0;
        }

        .bg-white {
            background-color: #fff;
        }

        .hotel,
        .arrival,
        .box {
            border: 1px solid #CFD8DC;
            color: #9E9E9E;
            cursor: pointer;
        }

        .hotel.active,
        .arrival.active {
            background-color: #304FFE;
            color: #fff !important;
            border: 1px solid #304FFE;
        }

        .fa-star {
            color: #E0E0E0;
            cursor: pointer;
        }

        .fa-star.active {
            color: #FFB300;
        }

        .icon-star {
            color: #000;
        }

        #green {
            color: #388E3C;
            background-color: #C8E6C9;
            padding: 5px 9px;
            cursor: pointer;
        }

        #blue {
            background-color: #BBDEFB;
            color: #1976D2;
            padding: 5px 12px;
            cursor: pointer;
        }
    </style>


@section('js')
    {{-- <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script> --}}
    <script>
        $(document).ready(function() {

            $('.arrival').click(function() {
                var tmp = $(this);
                $(".arrival").removeClass("active");
                if ($(tmp).is('.arrival')) {
                    $(tmp).addClass("active");
                }
            });

            $('.hotel').click(function() {
                var tmp = $(this);
                $(".hotel").removeClass("active");
                if ($(tmp).is('.hotel')) {
                    $(tmp).addClass("active");
                }
            });

            $('.fa-star').click(function() {
                $(".fa-star").removeClass("active");
                $(this).addClass("active");
                $(this).prevAll().addClass("active");
            });

        });
    </script>


@section('content')
    <div class="container-fluid px-1 px-sm-4 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-lg-9 col-xl-8">
                <div class="card border-0">
                    <div class="card-header bg-white">
                        <h4 class="mb-1">Advanced Search and Filter</h4>
                        <small class="text-muted">Create segments for filtering your data for seeing business
                            insights.</small>
                    </div>
                    <div class="card-body px-3 px-md-5">
                        <h5>FILTER LIST</h5>
                        <div class="card mb-3">
                            <div class="card-header">
                                <h6><span class="fa fa-calendar mr-3"></span>Arriving Date</h6>
                            </div>
                            <div class="card-body">
                                <div class="row px-4">
                                    <div class="col-6 col-lg-3 text-center px-0 arrival active">
                                        <div class="block py-1">Specific</div>
                                    </div>
                                    <div class="col-6 col-lg-3 text-center px-0 arrival">
                                        <div class="block py-1">After</div>
                                    </div>
                                    <div class="col-6 col-lg-3 text-center px-0 arrival">
                                        <div class="block py-1">Before</div>
                                    </div>
                                    <div class="col-6 col-lg-3 text-center px-0 arrival">
                                        <div class="block py-1">Between</div>
                                    </div>
                                </div>
                                <div class="row px-4 mt-3">
                                    <div class="col-md-6 pl-0 pr-0 pr-md-2 mb-2">
                                        <input type="date" name="start-date" value="2019-12-21" required>
                                    </div>
                                    <div class="col-md-6 pl-0 pl-md-2 pr-0">
                                        <input type="date" name="end-date" value="2019-12-21" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header">
                                <h6><span class="fa fa-star icon-star mr-3"></span>Choose hotel star</h6>
                            </div>
                            <div class="card-body">
                                <div class="row px-4 mb-2">
                                    <div class="col-4 text-center px-0 hotel active">
                                        <div class="block py-1">Equals</div>
                                    </div>
                                    <div class="col-4 text-center px-0 hotel">
                                        <div class="block py-1">Less than</div>
                                    </div>
                                    <div class="col-4 text-center px-0 hotel">
                                        <div class="block py-1">More than</div>
                                    </div>
                                </div>
                                <div class="row px-4">
                                    <div class="col-6 col-md-3">
                                        <div class="box row py-2 justify-content-around">
                                            <div class="fa fa-star active"></div>
                                            <div class="fa fa-star"></div>
                                            <div class="fa fa-star"></div>
                                            <div class="fa fa-star"></div>
                                            <div class="fa fa-star"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row px-3">
                            <p id="green" class="mr-2"><span class="mr-2 fa fa-plus"></span>AND</p>
                            <p id="blue"><span class="mr-2 fa fa-reorder"></span>OR</p>
                        </div>
                    </div>
                    <div class="card-footer bg-white row mx-0 mb-2 justify-content-between">
                        <button class="btn btn-secondary px-4">Cancel</button>
                        <button class="btn btn-success ml-auto"><span class="fa fa-filter"></span> &nbsp;&nbsp;Apply
                            Filter</button>
                    </div>
                </div>
            </div>
        </div>
    </div>>
@endsection
