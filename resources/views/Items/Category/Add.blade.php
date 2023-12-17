

<div class="modal fade" id="add-category-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="add-category-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="add-category-modal"><i class="bi bi-plus-circle-dotted me-2"></i>Add
                    Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="row">
                <form action="">
                    <div class="modal-body p-3">
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="cat_name">Category Name</label>
                                <input type="text" name="cat_name" placeholder="Enter Category...."
                                    class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="cat_logo">Logo</label>
                                <input type="file" name="cat_logo" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="cat_status">Status</label>
                                <select name="cat_status" id="cat_status" class="form-select">
                                    <option value="0">Active</option>
                                    <option value="1">Deactive</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
