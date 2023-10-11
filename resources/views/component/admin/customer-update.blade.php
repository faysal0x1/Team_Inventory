<div class="modal fade" id="update-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Customer Name</label>
                                <input type="text" class="form-control" id="customerNameUpdate">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Customer Mobile number</label>
                                <input type="text" class="form-control" id="customerMobileNumberupdate">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Customer Email</label>
                                <input type="text" class="form-control" id="customerEmailUpdate">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Customer Address</label>
                                <input type="text" class="form-control" id="customerAddressupdated">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-check-label" for="customerStatus">Customer Status</label>
                                <input type="number" class="form-control" id="customerStatusupdate">
                                {{-- <div class="form-check form-switch">
									<input class="form-check-input" type="checkbox" id="customerStatus">
								</div> --}}
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="update-modal-close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button onclick="updateCustomerData()" type="button" class="btn btn-primary">Save change</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function FillUpUpdateForm(id){
        $('#updateID').val(id);
        let res=await axios.post('/customer-by-id',{id:id});
        $('#customerNameUpdate').val(res.data['name']);
        $('#customerMobileNumberupdate').val(res.data['mobile']);
        $('#customerEmailUpdate').val(res.data['email']);
        $('#customerAddressupdated').val(res.data['address']);
        $('#customerStatusupdate').val(res.data['status']);
    }

    async function updateCustomerData(){
        let id=$('#updateID').val();
        let name=$('#customerNameUpdate').val();
        let mobile=$('#customerMobileNumberupdate').val();
        let email=$('#customerEmailUpdate').val();
        let address=$('#customerAddressupdated').val();
        let status=$('#customerStatusupdate').val();
        $('#update-modal-close').click();
        const res = await axios.patch('/update-customer',{
            'id':id,
            'name':name,
            'mobile':mobile,
            'email':email,
            'address':address,
            'status':status
        });
        if(res.data===1){
            window.alert("Category Updated successful");
            $('#update-form').trigger('reset');
            await GetCustomer();
        }else{
            window.alert("Requiest fail!");
        }
    }

</script>