
<div class="modal fade " id="exampleVerticallycenteredModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Unit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Unit Name</label>
                                <input type="text" class="form-control" id="unitName">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="modal-close" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button onclick="saveUnit()" type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<script> 
 
    async function  saveUnit() {
        
       let name = $('#unitName').val();
        
        if(name.length === 0) {
            alert('Input unit');
        }
        else{
      
         $('#modal-close').click();

           let res =  await axios.post('/create-unit',{
            name:name
           })

           if(res.data['status']=== 'success'){
     
           $('#save-form').trigger('reset');

           toastr.success(res.data.msg, 'Success');
           await  getUnit();

           }else{
            toastr.error(res.data.msg, 'Error!!');
         
           }
        }
        
    }
  

</script>
