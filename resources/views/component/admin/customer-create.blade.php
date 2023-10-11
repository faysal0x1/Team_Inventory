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
                                <label class="form-check-label" for="flexSwitchCheckDefault">Customer Status</label>
                                <div class="form-check form-switch">
									<input class="form-check-input" type="checkbox" id="customerStatus">
								</div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button onclick="cricketCustomer()" type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    // async function cricketCustomer(){
    //     let name = $('#customerName').val();
    //     let phonenumber = $('#customerMobileNumber').val();
    //     let email = $('#customerEmail').val();
    //     let address = $('#customerAddress').val();
    //     let status = $('#customerStatus').val();

    //     if(name.length===0){
    //         errorToast("Customer Name is Required!")
    //     }else if(phonenumber.length===0){
    //         errorToast("Customer Phone number is Required!")
    //     }else if(email.length===0){
    //         errorToast("Customer Email is Required!")
    //     }else if(address.length===0){
    //         errorToast("Customer address is Required!")
    //     }else{
    //         $('#exampleVerticallycenteredModal').click();
    //         let url = "{{url('/create-customer')}}";
    //         let data = {
    //             name:name,
    //             phone:phonenumber,
    //             email:email,
    //             address:address,
    //             status:status,
    //         }
    //         const res = await axios.post(url,data);
    //         if(res.status===201){
    //             successToast('Customer created successful');
    //             $('#save-form').trigger('reset')
    //             await getList();
    //         }else{
    //             errorToast("Request fail!");
    //         }
    //     }
    // }
</script>