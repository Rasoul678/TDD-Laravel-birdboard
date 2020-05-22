@csrf
<div class="form-group">
    <label for="title" class="h5">Title</label>
    <input
        type="text"
        name="title"
        id="title"
        placeholder="Project Title"
        class="form-control"
        value="{{ $project->title }}"
        required/>
</div>
<div class="form-group">
    <label for="description" class="h5">Description</label>
    <textarea
        rows="7"
        name="description"
        id="description"
        placeholder="Project Description"
        class="form-control"
        required
    >{{ $project->description }}</textarea>
</div>
<input
    type="submit"
    value="{{ $buttonText }}"
    class="btn btn-primary text-dark shadow-sm border-0"
    style="background-color: #47CDFF"
/>
<a href="{{ $project->path() }}" class='btn btn-danger'>Cancel</a>
