<!-- Modal -->
<div class="modal fade" id="new-project-modal" tabindex="-1" role="dialog" aria-labelledby="new-project-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <h1 class="text-center py-5">Let's start something new!</h1>
            <div class="modal-body row">
                <div class="col-6">
                    <form method="POST" action="/projects" id="create-project-form">
                        @include('projects.form', [
                                'project'=>new App\Project,
                                'buttonText'=>'Create Project'
                                ])
                    </form>
                </div>
                <div class="col-6">
                    <form method="POST" action="/projects" id="create-task-form">
                        @csrf
                        <h5>Need some tasks?</h5>
                        <div class="form-group">
                            <input
                                type="text"
                                name="body"
                                placeholder="New Task"
                                class="form-control"
                                required/>
                        </div>
                    </form>
                    <h6 class="text-muted">
                        <a role="button" id="add-task">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            Add New Task Field
                        </a>
                    </h6>
                </div>

            </div>
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
