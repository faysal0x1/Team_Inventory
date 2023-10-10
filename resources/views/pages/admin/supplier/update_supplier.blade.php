<div class="modal fade" id="update-modal" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Supplier Data</h5>
                <button type="button" class="btn-close" id="update-modal-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    @csrf
                    <input type="text" name="updateId" id="updateId">
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label"> Name
                        </label>
                        <div class="form-group col-sm-10">
                            <input name="supplierNameUpdate" id="supplierNameUpdate" class="form-control" type="text"
                                required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label"> Email
                        </label>
                        <div class="form-group col-sm-10">
                            <input name="updateEmail" id="updateEmail" class="form-control" type="email" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Password</label>
                        <div class="form-group col-sm-10">
                            <input name="updatePassword" id="updatePassword" class="form-control" type="text" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Phone</label>
                        <div class="form-group col-sm-10">
                            <input name="updatePhone" id="updatePhone" class="form-control" type="text" required>
                        </div>
                    </div>


                    <div class="d-flex">

                        <input class="btn btn-primary" onclick="Update()" name="submit" value="submit"
                            class="form-control">
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>


<script>
    async function Update() {
try {
let updateID = document.getElementById('updateId').value;
let name = document.getElementById('supplierNameUpdate').value;
let email = document.getElementById('updateEmail').value;
let password = document.getElementById('updatePassword').value;
let phone = document.getElementById('updatePhone').value;

// document.getElementById('update-modal-close').click();


let closeButton = document.getElementById('update-modal-close');
if (closeButton) {
closeButton.click();
}


const updatedData = {
name: name,
email: email,
password: password,
phone: phone,
};

const res = await axios.put(`/supplier/${updateID}`, updatedData, {
headers: {
'X-CSRF-TOKEN': '{{ csrf_token() }}',
},
});

if (res.status === 200) {
document.getElementById("update-form").reset();
toastr.success(res.data.message, 'Success');
await getList();
} else {
errorToast("Something Went Wrong");
}
} catch (error) {

console.error("Error updating the category:", error);
}
}

async function deleteItem(id) {
    try {
    
        let res = await axios.delete(`/supplier/${id}`, {
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}', 
            },
        });
        if (res.status === 200) {
            toastr.success(res.data.message, 'Success');
            await getList();
        } else {
            errorToast('Something Went Wrong');
        }
    } catch (error) {
        console.error('Error deleting item:', error);
    }
}
</script>