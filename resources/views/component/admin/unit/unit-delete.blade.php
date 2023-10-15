<div class="modal fade" id="delete-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h3 class=" mt-3 text-warning">Delete !</h3>
                <p class="mb-3">Once delete, you can't get it back.</p>
                <input class="d-none" id="deleteID"/>
            </div>
            <div class="modal-footer justify-content-end">
                <div>
                    <button type="button" id="delete-modal-close" class="btn shadow-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button onclick="itemDelete()" type="button" id="confirmDelete" class="btn shadow-sm btn-danger" >Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
   async function itemDelete() {
   
       let id = $('#deleteID').val();
       $('#delete-modal-close').click();
 
       let res = await axios.post('/delete-unit',{id:id});
   
      if( res.data['status'] === 'success'){
        toastr.success(res.data.msg, 'Success');
         await getUnit();
       
      }else{
        toastr.error(res.data.msg);
      } 

   }


</script>
