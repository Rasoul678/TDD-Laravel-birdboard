<!-- Modal -->
<div class="modal fade" id="new-project-modal" tabindex="-1" role="dialog" aria-labelledby="new-project-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <h1 class="text-center py-5">Let's start something new!</h1>

                <form id="create-project-form">
                    <div class="modal-body row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="title" class="h5">Title</label>
                                <input
                                    type="text"
                                    name="title"
                                    id="title"
                                    placeholder="Project Title"
                                    class="form-control"
                                    required/>
                            </div>
                            <div class="form-group">
                                <label for="description" class="h5">Description</label>
                                <textarea
                                    class="form-control"
                                    id="description"
                                    name="description"
                                    placeholder="Project Description"
                                    required
                                    rows="7"
                                ></textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <h5>Need some tasks?</h5>
                            <div id="tasks">
                                <div class="form-group mb-2">
                                    <input
                                        type="text"
                                        name="body"
                                        placeholder="New Task"
                                        class="form-control"
                                        required/>
                                </div>
                            </div>
                            <h6 class="text-muted">
                                <a role="button" id="add-task">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                    Add New Task Field
                                </a>
                            </h6>
                        </div>
                    </div>
                </form>

            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-outline-primary text-light shadow-sm border-0"
                    style="background-color: #EE4839"
                    data-dismiss="modal"
                    aria-label="Close">
                    Cancel
                </button>
                <button
                    id="create"
                    class="btn btn-primary text-dark shadow-sm border-0"
                    style="background-color: #47CDFF"
                    type="button">
                    Create Project
                </button>
            </div>
        </div>
    </div>
</div>
<!-- End of Modal -->
