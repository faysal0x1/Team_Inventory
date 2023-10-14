<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Tables</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item">
                    <a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Data Table</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <div class="col">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleVerticallycenteredModal">Add Customer</button>
            {{-- @include('pages.admin.supplier.add_supplier') --}}
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
                        <th>Profile</th>
                        <th>Mobile no</th>
                        <th>Email</th>
                        <th>address</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="tableList">

                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    GetCustomer();
    async function GetCustomer(){
        const res = await axios.get('/list-customer');
        console.log(res);

        let tableList = $('#tableList');
        // let tableData = $('#example2');

        tableList.empty();

        res.data.forEach(function(item,index){
            let row=(`
                <tr>
                    <td>${index+1}</td>
                    <td>${item['name']}</td>
                    <td>
                        <img style="width:35px;height:35px;" src="{{ asset('assets/images/figma-icon/user.webp') }}">      
                    </td>
                    <td>${item['mobile']}</td>
                    <td>${item['email']}</td>
                    <td>${item['address']}</td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input customerStatus1" type="checkbox" value="${item['status']}" id="customerStatus">
                            <label class="form-check-label" for="customerStatus"></label>
                        </div>
                    </td>
                    <td>
                        <button data-id="${item['id']}" type="button" class="btn btn-small btn-outline-primary px-3 editBtn">Edit</button>
                        <button data-id="${item['id']}" type="button" class="btn btn-small btn-outline-primary px-3 deleteBtn">Delete</button>
                    </td>
                </tr>
            `)
            tableList.append(row)
        });

        var checkbox = $(".customerStatus1");

        if (checkbox.val() == 1) {
            checkbox.prop('checked', true);
        }
        checkbox.empty();

        $('.editBtn').on('click',async function(){
            let id=$(this).data('id');
            await FillUpUpdateForm(id);
            $('#update-modal').modal('show');
        });
        
        $('.deleteBtn').on('click',function(){
            let id=$(this).data('id');
            $('#delete-modal').modal('show');
            $('#deleteID').val(id);
        });
        	
        // let table = new DataTable('#example2');
        // tableData.DataTable({
        //     order:[[0,'asc']],
        //     lengthMenu:[5,10,15,20]
        // });
    }//end function
</script>