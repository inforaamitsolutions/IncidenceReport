<!-- Store Modal -->
<div id="create-quiz-popup" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">ADD</h4>
            </div>
            <?php
            echo form_open_multipart(ADMIN . '/quiz/store', ['id' => 'formQuizStore']);
            ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title"  required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description"  required> </textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Category</label>
                            <select class="form-control" name="blog_category_id" required>
                                <option value="">Select Quiz Category</option>
                                <?php
                                foreach ($blogs_category_list as $list) {
                                    echo "<option value=" . $list['id'] . ">" . $list['category_name'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Banner</label><br />
                            <input type="file" name="banner" required>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Is Active?</label><br/>
                            <input type="checkbox" name="is_active" >
                        </div>
                    </div>
                    <!-- <div class="col-md-6">
                        <div class="form-group">
                            <label>Is Scholarship?</label><br />
                            <input type="checkbox" name="is_scholarship">
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary">Save</button>
            </div>
            <?php
            echo form_close();
            ?>
        </div>

    </div>
</div>
<!-- End Store Modal -->

<!-- Update Modal -->
<div id="update-quiz-popup" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update</h4>
            </div>
            <?php
            echo form_open_multipart('', ['id' => 'formQuizUpdate']);
            ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" id="title" required>
                            <input type="hidden" class="form-control" name="id" id="id">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description" id="description" required> </textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Category</label>
                            <select class="form-control" name="blog_category_id" id="blog_category_id" required>
                                <option value="">Select Quiz Category</option>
                                <?php
                                foreach ($blogs_category_list as $list) {
                                    echo "<option value=" . $list['id'] . ">" . $list['category_name'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Banner</label><br />
                            <input type="file" name="banner" id="banner">
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Is Active?</label><br/>
                            <input type="checkbox" name="is_active" id="is_active">
                        </div>
                    </div>
                    <!-- <div class="col-md-6">
                        <div class="form-group">
                            <label>Is Scholarship?</label><br />
                            <input type="checkbox" name="is_scholarship" id="is_scholarship">
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary">Update</button>
            </div>
            <?php
            echo form_close();
            ?>
        </div>

    </div>
</div>
<!-- End Update Modal -->