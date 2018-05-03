<div class="dataTable_wrapper" style="margin-top: 15px;">
    <table class="table table-striped table-bordered table-hover" id="project-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Services</th>
            <th>Description</th>
            <th>Add Date</th>
            <th>Up Date</th>
            <th>#</th>
        </tr>
        </thead>
        <tbody id="table-data">
        @foreach($projects as $project)
            <tr id="{{ $project->id }}">
                <td>{{ $project->id }}</td>
                <td>
                    <img height="50" src="{{$project->p_name ? URL::to('images') .'/'. $project->p_name : URL::to('images') .'/'.'400x400.png'}}" alt="img">
                </td>
                <td>{{ $project->name }}</td>
                <td>{{ $project->s_name }}</td>
                <td>{{ $project->description }}</td>
                <td>{{ $project->created_at }}</td>
                <td>{{ $project->updated_at }}</td>
                <td><input type="checkbox" name="delete" value="{{ $project->id }}"></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>