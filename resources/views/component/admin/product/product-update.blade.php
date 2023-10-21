<div class="modal fade " id="update-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <div class="form-group">
                                    <label class="form-label">Product Name</label>
                                    <input type="text" class="form-control" id="updateName" name="updateName">
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" id="updateDescription" name="updateDescription"></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-6 p-1">
                                        <div class="form-group">
                                            <label class="form-label">Quantity</label>
                                            <input type="number" class="form-control" id="updateQuantity"
                                                name="updateQuantity">

                                        </div>

                                    </div>
                                    <div class="col-6 p-1">
                                        <div class="form-group">
                                            <label class="form-label">Unit</label>
                                            <select type="text" class="form-control form-select"
                                                id="updateProductUnit" name="updateProductUnit">
                                                <option value="">Select Unit</option>
                                            </select>

                                        </div>

                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-6 p-1">
                                        <div class="form-group">
                                            <label class="form-label">Price</label>

                                            <input type="number" class="form-control" id="updatePrice"
                                                name="updatePrice" pattern="[0-9]*">
                                        </div>
                                    </div>
                                    <div class="col-6 p-1">
                                        <div class="form-group">
                                            <label class="form-label">Low Stock</label>
                                            <input type="number" class="form-control" id="updateStock"
                                                name="updateStock" pattern="[0-9]*">
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label class="form-label">Category</label>
                                    <select type="text" class="form-control form-select" id="updateCategory"
                                        name="updateCategory">
                                        <option value="">Select Category</option>

                                    </select>

                                </div>


                                <br />
                                <img class="w-25 h-auto" id="oldImg" />
                                <br />

                                <label class="form-label">Image</label>
                                <div class="form-group">
                                    <input oninput="oldImg.src=window.URL.createObjectURL(this.files[0])" type="file"
                                        class="form-control" id="updateProductImg" name="updateProductImg">
                                </div>
                                <input class="d-none" type="text" id="updateID">
                                <input class="d-none" type="text" id="filePath">



                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="update-modal-close" type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">Close</button>
                        <div class="from-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#update-form').validate({
            rules: {
                updateName: {
                    required: true,
                },
                // updateDescription: {
                //     required: true,
                // },
                updateQuantity: {
                    required: true,
                },
                updateProductUnit: {
                    required: true,
                },
                updatePrice: {
                    required: true,
                },
                updateStock: {
                    required: true,
                },
                updateCategory: {
                    required: true,
                },
                // updateProductImg: {
                //     required: true,
                // },
            },
            messages: {
                updateName: {
                    required: 'Name Required',
                },
                // updateDescription: {
                //     required: 'Description Required',
                // },
                updateQuantity: {
                    required: 'Quantity Required',
                },
                updateProductUnit: {
                    required: 'Price Required',
                },
                updatePrice: {
                    required: 'Low Stock limit Required',
                },
                updateStock: {
                    required: 'Unit Required',
                },
                updateCategory: {
                    required: 'Category Required',
                },
                // updateProductImg: {
                //     required: 'Image Required',
                // },

            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
        });
    });
</script>
<script>
    async function fillCategoryDropdown() {
        $("#updateCategory").empty();
        let res = await axios.get('/get-active-category')
        res.data.forEach(function(item, i) {
            let option = `<option value="${item['id']}">${item['name']}</option>`
            $("#updateCategory").append(option);
        })
    }
    async function fillUnitDropdown() {
        $("#updateProductUnit").empty();
        let res = await axios.get('/get-active-units')
        res.data.forEach(function(item, i) {
            let option = `<option value="${item['id']}">${item['name']}</option>`
            $("#updateProductUnit").append(option);
        })
    }

    async function FillUpdateForm(id, filePath) {
        $('#updateID').val(id);
        $('#filePath').val(filePath);
        $('#oldImg').attr('src', filePath);

        await fillCategoryDropdown();
        await fillUnitDropdown();

        let res = await axios.post('/product-by-id', {
            id: id
        });
        $('#updateName').val(res.data['name']);
        $('#updateDescription').val(res.data['description']);
        $('#updateQuantity').val(res.data['quantity']);
        $('#updateProductUnit').val(res.data['unit_id']);
        $('#updatePrice').val(res.data['price']);
        $('#updateStock').val(res.data['stock']);
        $('#updateCategory').val(res.data['category_id']);
    }
</script>
<script>
    let updateForm = document.getElementById('update-form')
    updateForm.addEventListener('submit', async () => {
        event.preventDefault();

        let productName = $('#updateName').val();
        let description = $('#updateDescription').val();
        let quantity = $('#updateQuantity').val();
        let price = $('#updatePrice').val();
        let lowStock = $('#updateStock').val();
        let productUnit = $('#updateProductUnit').val();
        let category = $('#updateCategory').val();
        // let productImg = document.getElementById('productImg').files[0];
        let productImg = $('#updateProductImg')[0].files[0];
        let file_path = $('#filePath').val();
        let product_id = $('#updateID').val();



        let formData = new FormData();
        formData.append('name', productName)
        formData.append('description', description)
        formData.append('quantity', quantity)
        formData.append('price', price)
        formData.append('stock', lowStock)
        formData.append('unit_id', productUnit)
        formData.append('category_id', category)
        formData.append('image', productImg)
        formData.append('file_path', file_path)
        formData.append('product_id', product_id)

        const config = {
            headers: {
                'content-type': 'multipart/form-data'
            }
        }
        let res = await axios.post('/update-product', formData, config)
        if (res.data['status'] == 'success') {
            //  document.getElementById('update-modal-close').
            $('#update-modal-close').trigger('click');
            toastr.success(res.data.msg, 'Success');
            updateForm.reset();
            await getProduct();
        } else {
            toastr.success(res.data.msg, 'Error');
        }

    });
</script>

{{-- <script>
    let submitForm = document.getElementById('save-form')
    submitForm.addEventListener('submit', async () => {
        event.preventDefault();

        let productName = $('#name').val();
        let description = $('#description').val();
        let quantity = $('#quantity').val();
        let price = $('#price').val();
        let lowStock = $('#lowStock').val();
        let productUnit = $('#productUnit').val();
        let category = $('#productCategory').val();
        // let productImg = document.getElementById('productImg').files[0];
        let productImg = $('#productImg')[0].files[0];



        let formData = new FormData();
        formData.append('name', productName)
        formData.append('description', description)
        formData.append('quantity', quantity)
        formData.append('price', price)
        formData.append('stock', lowStock)
        formData.append('unit_id', productUnit)
        formData.append('category_id', category)
        formData.append('image', productImg)

        const config = {
            headers: {
                'content-type': 'multipart/form-data'
            }
        }
        let res = await axios.post('/create-product', formData, config)
        if (res.data['status'] == 'success') {
            $('#modal-close').click();
            toastr.success(res.data.msg, 'Success');
            submitForm.reset();
            await getProduct();
        } else {
            toastr.success(res.data.msg, 'Error');
        }

    });
</script> --}}
