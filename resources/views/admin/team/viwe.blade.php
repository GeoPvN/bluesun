<div class="dataTable_wrapper" style="margin-top: 15px;">
    <table class="table table-striped table-bordered table-hover" id="team-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Position</th>
            <th>Add Date</th>
            <th>Up Date</th>
            <th>#</th>
        </tr>
        </thead>
        <tbody id="table-data">
        @foreach($teams as $team)
            <tr id="{{ $team->id }}">
                <td>{{ $team->id }}</td>
                <td>
                    <img height="50" src="{{$team->p_name ? URL::to('images') .'/'. $team->p_name : URL::to('images') .'/'.'400x400.png'}}" alt="img">
                </td>
                <td>{{ $team->name }}</td>
                <td>{{ $team->position_name }}</td>
                <td>{{ $team->created_at }}</td>
                <td>{{ $team->updated_at }}</td>
                <td><input type="checkbox" name="delete" value="{{ $team->id }}"></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>