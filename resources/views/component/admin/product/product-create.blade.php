<div class="modal fade " id="createModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <div class="form-group">
                                    <label class="form-label">Product Name</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>



                                <div class="form-group">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" id="description" name="description"></textarea>
                                </div>



                                <div class="row">
                                    <div class="col-6 p-1">
                                        <div class="form-group">
                                            <label class="form-label">Quantity</label>
                                            <input type="number" class="form-control" id="quantity" name="quantity">

                                        </div>

                                    </div>
                                    <div class="col-6 p-1">
                                        <div class="form-group">
                                            <label class="form-label">Unit</label>
                                            <select type="text" class="form-control form-select" id="productUnit"
                                                name="productUnit">
                                                <option value="">Select Unit</option>
                                            </select>

                                        </div>

                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-6 p-1">
                                        <div class="form-group">
                                            <label class="form-label">Price</label>

                                            <input type="number" class="form-control" id="price" name="price"
                                                pattern="[0-9]*">
                                        </div>
                                    </div>
                                    <div class="col-6 p-1">
                                        <div class="form-group">
                                            <label class="form-label">Low Stock</label>
                                            <input type="number" class="form-control" id="lowStock" name="lowStock"
                                                pattern="[0-9]*">
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label class="form-label">Category</label>
                                    <select type="text" class="form-control form-select" id="productCategory"
                                        name="category">
                                        <option value="">Select Category</option>

                                    </select>

                                </div>


                                <br />
                                <img class="w-25 h-auto" id="newImg" src="{{ asset('demo.png') }}" />
                                <br />

                                <label class="form-label">Image</label>
                                <div class="form-group">
                                    <input oninput="newImg.src=window.URL.createObjectURL(this.files[0])" type="file"
                                        class="form-control" id="productImg" name="productImg">
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="modal-close" type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">Close</button>
                        <div class="from-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#save-form').validate({
            rules: {
                name: {
                    required: true,
                },
                // description: {
                //     required: true,
                // },
                quantity: {
                    required: true,
                },
                price: {
                    required: true,
                },
                lowStock: {
                    required: true,
                },
                productUnit: {
                    required: true,
                },
                category: {
                    required: true,
                },
                productImg: {
                    required: true,
                },
            },
            messages: {
                name: {
                    required: 'Name Required',
                },
                // description: {
                //     required: 'Description Required',
                // },
                quantity: {
                    required: 'Quantity Required',
                },
                price: {
                    required: 'Price Required',
                },
                lowStock: {
                    required: 'Low Stock limit Required',
                },
                productUnit: {
                    required: 'Unit Required',
                },
                category: {
                    required: 'Category Required',
                },
                productImg: {
                    required: 'Image Required',
                },

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
    fillUnitDropdown();
    fillCategoryDropdown();

    async function fillCategoryDropdown() {
        let res = await axios.get('/get-active-category')
        res.data.forEach(function(item, i) {
            let option = `<option value="${item['id']}">${item['name']}</option>`
            $("#productCategory").append(option);
        })
    }
    async function fillUnitDropdown() {
        let res = await axios.get('/get-active-units')
        res.data.forEach(function(item, i) {
            let option = `<option value="${item['id']}">${item['name']}</option>`
            $("#productUnit").append(option);
        })
    }
</script>

<script>
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
        
            $('#save-form').trigger('reset');
            $('#newImg').attr('src', '{{ asset('demo.png') }}');
            await getProduct();
        } else {
            toastr.success(res.data.msg, 'Error');
        }

    });
</script>
