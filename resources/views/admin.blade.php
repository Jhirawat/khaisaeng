@extends('layouts.app')

@section('js')
    <script>
        function getData(data) {
            let id = document.getElementById('id')
            id.value = data.id;

            let name = document.getElementById('name');
            name.value = data.name;

            let price = document.getElementById('price');
            price.value = data.price;

            let description = document.getElementById('description');
            description.value = data.description;
        }
    </script>

@section('content')
    {{-- <admin-component/> --}}
    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table caption-top">
                    <caption>
                        {{-- <a href="/create"  class="btn btn-warning" >Create Product</a>
                        <a href="/order" class="btn btn-primary">Order Product</a> --}}

                        <a href="/create" type="button" class="btn "
                            style="background-color: #877EC8;height: 37px;width: 120px;padding: 0; color:white;border-radius: 7px;">
                            Create Product
                        </a>

                        <a href="/orderadmin" class="btn  "
                            style="background-color: #ED9A0D;height: 37px;width: 120px;padding: 0; color:white;border-radius: 7px;">
                            Product Order
                        </a>

                    </caption>
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Description</th>
                            <th scope="col">Update</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>
                                    <img src="{{ asset('images/' . $item->image) }}" class="card-img-top"
                                        style="max-width: 50px;max-height: 150px" />
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->description }}</td>
                                <td>

                                    {{-- <button @click="showmodal(item.id)" type="button" class="btn btn-success"
                                        data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        แก้ไข
                                    </button> --}}
                                    <button type="button" class="btn " data-bs-toggle="modal"
                                        data-bs-target="#exampleModal" onclick="getData({{ $item }})"
                                        style="background-color: #158c1d;height: 30px;width: 75px;padding: 0; color:white;border-radius: 7px;">
                                        <i class="feather icon-edit"></i>แก้ไข
                                    </button>

                                </td>
                                <td>
                                    {{-- <button class="btn btn-danger" @click="deletepro(item.id)">
                                        ลบ
                                    </button> --}}


                                    <button onclick="deletepro('{{ $item->id }}')" type="button" class="btn btn-danger"
                                        data-bs-toggle="modal" data-bs-target="#inlineFormEdit"
                                        onclick="getData('{{ $item->id }}')"
                                        style="background-color: #c00f35;height: 30px;width: 75px;padding: 0; color:white;border-radius: 7px;">
                                        <i class="feather icon-edit"></i>ลบ
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Scrollable modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Product</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <input type="text" id="id" name="id" class="hidden" />

                                    {{-- <input type="text" class="form-control" id="product-id" name="id"> --}}
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" />
                                    {{--
                                    <label for="image" class="form-label">Image</label>
                                    <input type="text" class="form-control" id="product-image" name="image"> --}}
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" class="form-control" name="image" placeholder="Image URL" />

                                    <label for="price" class="form-label">Price</label>
                                    <input type="text" class="form-control" id="price" name="price" />

                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                    <br>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
