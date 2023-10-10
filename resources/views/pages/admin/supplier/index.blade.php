@extends('layout.admin_layout.admin-layout')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Tables</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Data Table</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="col">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleVerticallycenteredModal">Add Supplier</button>
                    @include('pages.admin.supplier.add_supplier')
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <hr />
        <h6 class="mb-0 text-uppercase">Supplier List</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableList">

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
@include('pages.admin.supplier.update_supplier')


@endsection



@section('script')


<script type="text/javascript">
    $(document).ready(function () {
        $('#tableList').on('click', '.editBtn', function () {

            let id = $(this).data('id');
                
            //   FillUpUpdateForm(id);
            $("#update-modal").modal('show');
        });
        $('#image').change(function (e) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
        getList();
    });

    async function getList() {
        try {
            let res = await axios.get('/supplierlist');
            let tableList = $('#tableList');
            tableList.empty();

            res.data.forEach(function (item, index) {
                let row = `<tr>
                               <td>${index + 1}</td>
                               <td>${item['name']}</td>
                               <td>
                                   <button data-id="${item['id']}" class="btn editBtn btn-sm btn-outline-success">Edit</button>
                                   <button data-id="${item['id']}" class="btn deleteBtn btn-sm btn-outline-danger">Delete</button>
                               </td>
                           </tr>`;
                tableList.append(row);
            });
        } catch (error) {
            console.error("Error fetching data:", error);
        }
    }

    async function FillUpUpdateForm(id) {
        try {
            let res = await axios.get(`/supplier/${id}`);

            document.getElementById('updateId').value = res.data['id'];
            document.getElementById('supplierNameUpdate').value = res.data['name'];
            document.getElementById('updateEmail').value = res.data['email'];
            document.getElementById('updatePassword').value = res.data['password'];
            document.getElementById('updatePhone').value = res.data['phone'];
        } catch (error) {
            console.error("Error filling up the update form:", error);
        }
    }




</script>
@endsection