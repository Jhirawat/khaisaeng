@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <select id="input_province">
                    <option value="">กรุณาเลือกจังหวัด</option>
                    @foreach ($provinces as $item)
                        <option value="{{ $item->province }}">{{ $item->province }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div>
            <div class="col-md-4">
            <select id="input_amphoe">
                <option value="">กรุณาเลือกเขต/อำเภอ</option>
                @foreach ($amphoes as $item)
                    <option value="{{ $item->amphoe }}">{{ $item->amphoe }}</option>
                @endforeach
            </select>
        </div>
        </div>
        <div>
            <select id="input_tambon">
                <option value="">กรุณาเลือกแขวง/ตำบล</option>
                @foreach ($tambons as $item)
                    <option value="{{ $item->tambon }}">{{ $item->tambon }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <input id="input_zipcode" placeholder="รหัสไปรษณีย์" />
        </div>
    </div>
    </div>
@endsection

@section('js')

    <script>
        function showAmphoes() {
            let input_province = document.querySelector("#input_province");
            let url = "{{ url('/api/amphoes') }}?province=" + input_province.value;
            console.log(url);
            // if(input_province.value == "") return;
            fetch(url)
                .then(response => response.json())
                .then(result => {
                    console.log(result);
                    //UPDATE SELECT OPTION
                    let input_amphoe = document.querySelector("#input_amphoe");
                    input_amphoe.innerHTML = '<option value="">กรุณาเลือกเขต/อำเภอ</option>';
                    for (let item of result) {
                        let option = document.createElement("option");
                        option.text = item.amphoe;
                        option.value = item.amphoe;
                        input_amphoe.appendChild(option);
                    }
                    //QUERY AMPHOES
                    showTambons();
                });
        }

        function showTambons() {
            let input_province = document.querySelector("#input_province");
            let input_amphoe = document.querySelector("#input_amphoe");
            let url = "{{ url('/api/tambons') }}?province=" + input_province.value + "&amphoe=" + input_amphoe.value;
            console.log(url);
            // if(input_province.value == "") return;
            // if(input_amphoe.value == "") return;
            fetch(url)
                .then(response => response.json())
                .then(result => {
                    console.log(result);
                    //UPDATE SELECT OPTION
                    let input_tambon = document.querySelector("#input_tambon");
                    input_tambon.innerHTML = '<option value="">กรุณาเลือกแขวง/ตำบล</option>';
                    for (let item of result) {
                        let option = document.createElement("option");
                        option.text = item.tambon;
                        option.value = item.tambon;
                        input_tambon.appendChild(option);
                    }
                    //QUERY AMPHOES
                    showZipcode();
                });
        }

        function showZipcode() {
            let input_province = document.querySelector("#input_province");
            let input_amphoe = document.querySelector("#input_amphoe");
            let input_tambon = document.querySelector("#input_tambon");
            let url = "{{ url('/api/zipcodes') }}?province=" + input_province.value + "&amphoe=" + input_amphoe.value +
                "&tambon=" + input_tambon.value;
            console.log(url);
            // if(input_province.value == "") return;
            // if(input_amphoe.value == "") return;
            // if(input_tambon.value == "") return;
            fetch(url)
                .then(response => response.json())
                .then(result => {
                    console.log(result);
                    //UPDATE SELECT OPTION
                    let input_zipcode = document.querySelector("#input_zipcode");
                    input_zipcode.value = "";
                    for (let item of result) {
                        input_zipcode.value = item.zipcode;
                        break;
                    }
                });
        }
        //EVENTS

        document.querySelector('#input_province').addEventListener('change', (event) => {
            showAmphoes();
        });
        document.querySelector('#input_amphoe').addEventListener('change', (event) => {
            showTambons();
        });
        document.querySelector('#input_tambon').addEventListener('change', (event) => {
            showZipcode();
        });
    </script>


    {{--
    @extends('layouts.app')

    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <label>Province:</label>
                    <select id="province" class="form-control" name="province">
                        <option value="">Select province</option>
                        @foreach ($provinces as $province)
                            <option value="{{ $province->province }}">{{ $province->province }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label>Amphoe:</label>
                    <select id="amphoe" class="form-control" name="amphoe">
                        <option value="">Select amphoe</option>
                        @foreach ($provinces as $amphoe)
                        <option value="{{ $amphoe->amphoe }}">{{ $amphoe->amphoe }}</option>
                    @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label>Tambon:</label>
                    <select id="tambon" class="form-control" name="tambon">
                        <option value="">Select tambon</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <label>Zipcode:</label>
                    <input type="text" id="zipcode" class="form-control" name="zipcode" readonly>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        <script>
            $(document).ready(function() {
                // Load amphoes when province is selected
                $('#province').on('change', function() {
                    var province = $(this).val();
                    if(province) {
                        $.ajax({
                            url: '/api/amphoes',
                            type: 'GET',
                            data: {province: province},
                            dataType: 'json',
                            success: function(data) {
                                $('#amphoe').empty();
                                $('#amphoe').append('<option value="">Select amphoe</option>');
                                $.each(data, function(key, value) {
                                    $('#amphoe').append('<option value="'+ value.amphoe +'">'+ value.amphoe +'</option>');
                                });
                            }
                        });
                    }
                    else {
                        $('#amphoe').empty();
                        $('#amphoe').append('<option value="">Select amphoe</option>');
                        $('#tambon').empty();
                        $('#tambon').append('<option value="">Select tambon</option>');
                        $('#zipcode').val('');
                    }
                });

                // Load tambons when amphoe is selected
                $('#amphoe').on('change', function() {
                    var province = $('#province').val();
                    var amphoe = $(this).val();
                    if(amphoe) {
                        $.ajax({
                            url: '/api/tambons',
                            type: 'GET',
                            data: {province: province, amphoe: amphoe},
                            dataType: 'json',
                            success: function(data) {
                                $('#tambon').empty();
                                $('#tambon').append('<option value="">Select tambon</option>');
                                $.each(data, function(key, value) {
                                    $('#t --}}
