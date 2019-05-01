<div class="dataTable_wrapper" style="margin-top: 15px;">
    <table class="table table-striped table-bordered table-hover" id="gallery-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Add Date</th>
            <th>Up Date</th>
            <th>#</th>
        </tr>
        </thead>
        <tbody id="table-data">
        @foreach($gallerys as $gallery)
            <tr id="{{ $gallery->id }}">
                <td>{{ $gallery->id }}</td>
                <td>
                    <img height="50" src="{{$gallery->p_name ? URL::to('images') .'/'. $gallery->p_name : URL::to('images') .'/'.'400x400.png'}}" alt="img">
                </td>
                <td>{{ $gallery->name }}</td>
                <td>{{ $gallery->created_at }}</td>
                <td>{{ $gallery->updated_at }}</td>
                <td><input type="checkbox" name="delete" value="{{ $gallery->id }}"></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>