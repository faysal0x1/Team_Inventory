<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card px-5 py-5">
                <div class="row justify-content-between ">
                    <div class="align-items-center col">
                        <h4>Customer</h4>
                    </div>
                    <div class="align-items-center col">
                        <button type="button" class="float-end btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleVerticallycenteredModal">Create</button>
                    </div>
                </div>
                <hr class="bg-dark "/>
                <table class="table" id="tableData">
                    <thead>
                        <tr class="bg-light">
                            <th>No</th>
                            <th>Name</th>
                            <th>Image</th>
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
</div>

<script>
    GetCustomer();
    async function GetCustomer(){

        const res = await axios.get('/list-customer');
        console.log(res);

        let tableList = $('#tableList');
        let tableData = $('#tableData');

        // tableData.DataTable().destroy();
        tableList.empty();

        res.data.forEach(function(item,index){
            let row=(`
                <tr>
                    <td>${index+1}</td>
                    <td>${item['name']}</td>
                    <td>
                        ${item['image']}
                    </td>
                    <td>${item['phone']}</td>
                    <td>${item['email']}</td>
                    <td>${item['address']}</td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                            <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                        </div>
                    </td>
                    <td>
                        <button data-id="${item['id']}" type="button" class="btn btn-small btn-outline-primary px-3">Edit</button>
                        <button data-id="${item['id']}" type="button" class="btn btn-small btn-outline-primary px-3">Delete</button>
                    </td>
                </tr>
            `)
            tableList.append(row)
        });

        $('.editBtn').on('click',async function(){
            let id=$(this).data('id');
            // await FillUpUpdateForm(id);
            // $('#update-modal').modal('show');
        });
        
        $('.deleteBtn').on('click',function(){
            let id=$(this).data('id');
            // $('#delete-modal').modal('show');
            // $('#deleteID').val(id);
        });

        tableData.DataTable({
            order:[[0,'asc']],
            lengthMenu:[5,10,15,20]
        });
    }//end function
</script>