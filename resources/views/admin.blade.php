@extends('layouts.app')

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
                                        data-bs-target="#exampleModal" onclick="getData('{{ $item->id }}')"
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
                {{-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" id="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">
                                    Update Product
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <form action="{{ route('admin.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" class="form-control" id="product-id" name="id">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" id="product-name" name="name">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="text" class="form-control" id="product-image" name="image">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="text" class="form-control" id="product-price" name="price">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="product-description" rows="3"></textarea>
                                    <br>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                        <button type="submit" class="btn btn-success">
                                            Save
                                        </button>
                                    </div>
                                </form>
                            </div>


                        </div>
                    </div>
                </div> --}}
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
                                    <input type="text" class="form-control" id="product-id" name="id">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" id="product-name" name="name">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="text" class="form-control" id="product-image" name="image">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="text" class="form-control" id="product-price" name="price">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="product-description" rows="3"></textarea>
                                    <br>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('scripts')
        <script type="text/javascript">
            $(document).ready(function getData(id) {
                console.log('id')
                var url = "{{ route('admin.show', ':id') }}";
                $.get(url, function(data) {
                    $('#exampleModal').modal('show');
                    $('#product-id').val(data.id);
                    console.log(data);
                    // $("#product-image").val(data.image);
                    $("#product-name").val(data.name);
                    $("#product-description").val(data.description);
                    $("#product-price").val(data.price);
                })
            })
            // ('#close_modal').click(function(){
            //     $('#exampleModalCenter').modal('hide');
            // })
        </script>
    @endsection
