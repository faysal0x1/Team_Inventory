<div class="modal" id="delete-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h3 class=" mt-3 text-warning">Delete !</h3>
                <p class="mb-3">Once delete, you can't get it back.</p>
                <input class="d-none" id="deleteID"/>
            </div>
            <div class="modal-footer justify-content-end">
                <div>
                    <button type="button" id="delete-modal-close" class="btn shadow-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button onclick="ItemDelete()" type="button" id="confirmDelete" class="btn shadow-sm btn-danger" >Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    async function ItemDelete(){
        let id = $('#deleteID').val();
        $('#delete-modal-close').click();
        let res = await axios.post('/delete-customer',{'id':id});
        if(res.data===1){
            window.alert("Customer Deleted successful");
            await GetCustomer();
        }else{
            window.alert("Request Fail!");
        }
    }
</script>