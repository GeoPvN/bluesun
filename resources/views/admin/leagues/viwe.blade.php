<div class="dataTable_wrapper" style="margin-top: 15px;">
    <table class="table table-striped table-bordered table-hover" id="league-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>League</th>
            <th>Division</th>
            <th>Add Date</th>
            <th>Up Date</th>
            <th>#</th>
        </tr>
        </thead>
        <tbody id="table-data">
        @foreach($leagues as $league)
            <tr id="{{ $league->id }}">
                <td>{{ $league->id }}</td>
                <td>
                    @if($league->photo) <img height="50" src="{{$league->photo->name ? URL::to('images') .'/'. $league->photo->name : URL::to('images') .'/'.'400x400.png'}}" alt="img"> @endif
                </td>
                <td>{{ $league->name }}</td>
                <td>{{ $league->division }}</td>
                <td>{{ $league->created_at }}</td>
                <td>{{ $league->updated_at }}</td>
                <td><input type="checkbox" name="delete" value="{{ $league->id }}"></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>