<!--breadcrumb -->

<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Tables</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item">
                    <a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Category</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <div class="col">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#exampleVerticallycenteredModal">Add Category</button>

        </div>
    </div>
</div>
<!--end breadcrumb-->
<hr />
<h6 class="mb-0 text-uppercase">Category List</h6>
<hr />
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="tableData" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Category Name</th>
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
    getCategory();

    async function getCategory() {
        let res = await axios.get('/get-category');
        console.log(res);

        let tableList = $('#tableList');
        let tableData = $('#tableData');

        //  tableData.DataTable().destroy();

        tableList.empty();

        res.data.forEach(function(item, index) {

            let isStatusActive = item['status'] === 1;
            let row = `<tr>
                <td>${index+1} </td>
                <td>${item['name']} </td>
                <td>
                  <div class="form-check form-switch">
                    <input data-id="${item['id']}" class="form-check-input customerStatus1" type="checkbox" id="categoryStatus${index}" ${isStatusActive ? 'checked' : ''}>
                    <label class="form-check-label" for="categoryStatus${index}">${isStatusActive ? 'Active' : 'Deactive'}</label>
                  </div>
                </td>   
               
               <td>
                    <button data-id="${item['id']}" type="button" class="btn editBtn btn-small btn-outline-primary px-3 ">Edit</button>
                        <button data-id="${item['id']}" type="button" class="btn deleteBtn btn-small btn-outline-danger px-3">Delete</button>
                     </td>
                </tr>`
            tableList.append(row)
        })

        $('.editBtn').on('click', async function() {
            let id = $(this).data('id');
            await FillUpdateFrom(id);
            $('#update-modal').modal('show');

        })

        $('.deleteBtn').on('click', function() {
            let id = $(this).data('id');
            $('#delete-modal').modal('show');
            $('#deleteID').val(id);
        })

        $('.form-check-input.customerStatus1').on('change', async function() {
            let id = $(this).data('id');
            let newStatus = this.checked ? 1 : 0;
            await updateCategoryStatus(id, newStatus);

            // Update the label text immediately
            const label = $(this).next('label');
            label.text(this.checked ? 'Active' : 'Deactive');
        });

        // new DataTable(tableData,{
        //     order:[[0,'asc']],
        //    lengthMenu:[10,20,30,40]

        //    });

    }
    async function updateCategoryStatus(id, newStatus) {

        try {
            let res = await axios.post('/update-status', {
                id,
                newStatus
            });
        } catch (error) {
            console.error('Error updating category status:', error);

        }
    }
</script>
