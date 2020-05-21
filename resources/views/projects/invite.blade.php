<div class="card shadow mt-2">
    <div class="card-body">
        <h3 class="card-title py-3 pl-2 border-left border-success" style="border-width: 5px !important; border-color: #47CDFF !important; margin-left: -20px !important;">
            Invite a user
        </h3>
        <form action="{{ $project->path() . '/invitations' }}" method="POST">
            @csrf
            <div class="d-flex justify-content-between">
                <input type="email" name="email" placeholder="Enter user's email to invite." style="width: 75%">
                <button
                    type="submit"
                    class="btn btn-primary text-dark shadow-sm border-0"
                    style="background-color: #47CDFF"
                >Invite</button>
            </div>
        </form>
    </div>
    @include('errors', ['bag'=>'invitations'])
</div>
