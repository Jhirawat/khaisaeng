@extends('layouts.app')

@section('content')


    <div class="row mb-3 text-center">
        <label class="col-lg-2">จังหวัด</label>
        <div class="col-lg-4">
            <select class="form-select" id="input_province" onchange="showAmphoes()">
                <option value="">กรุณาเลือกจังหวัด</option>
            </select>
        </div>
    </div>
    <div class="row mb-3 text-center">
        <label class="col-lg-2">อำเภอ</label>
        <div class="col-lg-4">
            <select class="form-select" id="input_amphoe" onchange="showTambons()">
                <option value="">กรุณาเลือกเขต/อำเภอ</option>
            </select>
        </div>
    </div>
    <div class="row mb-3 text-center">
        <label class="col-lg-2">ตำบล</label>
        <div class="col-lg-4">
            <select class="form-select" id="input_tambon" onchange="showZipcode()">
                <option value="">กรุณาเลือกแขวง/ตำบล</option>
            </select>
        </div>
    </div>
    <div class="row mb-3 text-center">
        <label class="col-lg-2">รหัสไปรษณีย์</label>
        <div class="col-lg-4">
            <input id="input_zipcode" class="form-control" placeholder="รหัสไปรษณีย์" />
        </div>
    </div>




    {{-- <head>
        <meta charset="UTF-8">
    </head>
    <div>
        <select id="input_province">
            <option value="">กรุณาเลือกจังหวัด</option>
            @foreach($provinces as $item)
            <option value="{{ $item }}">{{ $item }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <select id="input_amphoe">
            <option value="">กรุณาเลือกเขต/อำเภอ</option>
            @foreach($amphoes as $item)
            <option value="{{ $item }}">{{ $item }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <select id="input_tambon">
            <option value="">กรุณาเลือกแขวง/ตำบล</option>
            @foreach($tambons as $item)
            <option value="{{ $item }}">{{ $item }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <input id="input_zipcode" placeholder="รหัสไปรษณีย์" />
    </div> --}}



@endsection


@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
					console.log("START");
					showProvinces();
				});
				function showProvinces(){
					//PARAMETERS
					fetch("{{ url('/') }}/api/provinces")
						.then(response => response.json())
						.then(result => {
							console.log(result);
							//UPDATE SELECT OPTION
							let input_province = document.querySelector("#input_province");
							input_province.innerHTML = "";
							for(let item of result){
								let option = document.createElement("option");
								option.text = item.province;
								option.value = item.province;
								input_province.add(option);
							}
							//QUERY AMPHOES
							showAmphoes();
						});
				}
				function showAmphoes(){
					let input_province = document.querySelector("#input_province");
					fetch("{{ url('/') }}/api/province/"+input_province.value+"/amphoes")
						.then(response => response.json())
						.then(result => {
							console.log(result);
							//UPDATE SELECT OPTION
							let input_amphoe = document.querySelector("#input_amphoe");
							input_amphoe.innerHTML = "";
							for(let item of result){
								let option = document.createElement("option");
								option.text = item.amphoe;
								option.value = item.amphoe;
								input_amphoe.add(option);
							}
							//QUERY AMPHOES
							showTambons();
						});
				}
				function showTambons(){
					let input_province = document.querySelector("#input_province");
					let input_amphoe = document.querySelector("#input_amphoe");
					fetch("{{ url('/') }}/api/province/"+input_province.value+"/amphoe/"+input_amphoe.value+"/tambons")
						.then(response => response.json())
						.then(result => {
							console.log(result);
							//UPDATE SELECT OPTION
							let input_tambon = document.querySelector("#input_tambon");
							input_tambon.innerHTML = "";
							for(let item of result){
								let option = document.createElement("option");
								option.text = item.tambon;
								option.value = item.tambon;
								input_tambon.add(option);
							}
							//QUERY AMPHOES
							showZipcode();
						});
				}
				function showZipcode(){
					let input_province = document.querySelector("#input_province");
					let input_amphoe = document.querySelector("#input_amphoe");
					let input_tambon = document.querySelector("#input_tambon");
					fetch("{{ url('/') }}/api/province/"+input_province.value+"/amphoe/"+input_amphoe.value+"/tambon/"+input_tambon.value+"/zipcodes")
						.then(response => response.json())
						.then(result => {
							console.log(result);
							//UPDATE SELECT OPTION
							let input_zipcode = document.querySelector("#input_zipcode");
							input_zipcode.value = "";
							for(let item of result){
								input_zipcode.value = item.zipcode;
								break;
							}
						});

				}
    </script>


{{--
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
                    option.text = item;
                    option.value = item;
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
                    option.text = item;
                    option.value = item;
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
        let url = "{{ url('/api/zipcodes') }}?province=" + input_province.value + "&amphoe=" + input_amphoe.value + "&tambon=" + input_tambon.value;
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
                    input_zipcode.value = item;
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
</script> --}}


