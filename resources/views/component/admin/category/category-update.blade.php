<div class="modal fade" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Category Name *</label>
                                <input type="text" class="form-control" id="categoryNameUpdate">

                                <input class="d-none" id="updateID">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">Close</button>
                <button onclick="Update()" id="update-btn" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function FillUpdateFrom(id) {

        $('#updateID').val(id);
        let res = await axios.post("/category-by-id", {
            id: id
        })
        $('#categoryNameUpdate').val(res.data['name']);


    }


    async function Update() {

        let updated_catagory_name = $('#categoryNameUpdate').val();
        let category_id = $('#updateID').val();

        if (updated_catagory_name.length === 0) {
            toastr.error("Name Required");
         }
         else {
            let res = await axios.post('/update-category', {
                id: category_id,
                name: updated_catagory_name
            })

            if (res.data['status'] === 'success') {
                $('#update-modal-close').click();
            toastr.success(res.data.msg, 'Success');
                await getCategory();

            }
             else {
                toastr.error(res.data.msg);
            }
        }
       
    }
</script>