<div class="modal fade" id="exampleVerticallycenteredModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Customer Name</label>
                                <input type="text" class="form-control" id="customerName">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Customer Mobile number</label>
                                <input type="text" class="form-control" id="customerMobileNumber">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Customer Email</label>
                                <input type="text" class="form-control" id="customerEmail">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Customer Address</label>
                                <input type="text" class="form-control" id="customerAddress">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-check-label" for="customerStatus">Customer Status</label>
                                <input type="number" class="form-control" id="customerStatus">
                                {{-- <div class="form-check form-switch">
									<input class="form-check-input" type="checkbox" id="customerStatus">
								</div> --}}
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="modal-close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button onclick="createCustomer()" type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function createCustomer(){
        // $(document).ready(function() {
        //     var checkbox = $("#customerStatus");

        //     checkbox.change(function() {
        //         if (checkbox.is(":checked")) {
        //             $("#customerStatus").val(1);
        //         } else {
        //             $("#customerStatus").val(0);
        //         }
        //     });
        // });

        let name    = $('#customerName').val();
        let mobile  = $('#customerMobileNumber').val();
        let email   = $('#customerEmail').val();
        let address = $('#customerAddress').val();
        let status  = $('#customerStatus').val();

        if(name.length===0){
            alert("Customer Name is Required!")
        }else if(email.length===0){
            alert("Customer Email is Required!")
        }else{
            $('#modal-close').click();
            let url = "{{url('/create-customer')}}";


            let data = {
                name:name,
                mobile:mobile,
                email:email,
                address:address,
                status:status
            }

            const res = await axios.post('/create-customer',data);
            if(res.status===201){
                window.alert('Customer created successful');
                $('#save-form').trigger('reset');
                await GetCustomer();
            }else{
                window.alert("Request fail!");
            }
        }
    }
</script>