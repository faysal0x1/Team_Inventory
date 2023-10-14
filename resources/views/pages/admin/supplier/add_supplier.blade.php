<!-- Modal -->
<div class="modal fade" id="exampleVerticallycenteredModal" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Store</h5>
                <button type="button" id="add-modal-close" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form id="add-form">
                    @csrf

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label"> Name
                        </label>
                        <div class="form-group col-sm-10">
                            <input name="name" id="name" class="form-control" type="text" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label"> Email
                        </label>
                        <div class="form-group col-sm-10">
                            <input name="email" id="email" class="form-control" type="email" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Password</label>
                        <div class="form-group col-sm-10">
                            <input name="password" id="password" class="form-control" type="text" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Phone</label>
                        <div class="form-group col-sm-10">
                            <input name="phone" id="phone" class="form-control" type="text" required>
                        </div>
                    </div>
                    <div class="d-flex">

                        <input class="btn btn-primary" onclick="addStore(event)" type="submit" name="submit"
                            value="submit" class="form-control">
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>

<script>
    async function addStore(event)
{
    event.preventDefault();
    try {
        let name = document.getElementById('name').value;

        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;
        let phone = document.getElementById('phone').value;

        // document.getElementById('add-modal-close').click();
        
        let closeButton = document.getElementById('add-modal-close');
        if (closeButton) {
            closeButton.click();
        }
        const data = {
            name: name,
            email: email,
            password: password,
            phone: phone,
        };
        const res = await axios.post('/store', data, {
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
        });

        if (res.status === 200) {
            document.getElementById("add-form").reset();
            toastr.success(res.data.message, 'Success');
            await getList();
        }else{
            toastr.error("Something Went Wrong");
        }
    } catch (error) {
        
    }
}

</script>