<div class="dataTable_wrapper" style="margin-top: 15px;">
    <table class="table table-striped table-bordered table-hover" id="service-table">
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
        @foreach($services as $service)
            <tr id="{{ $service->id }}">
                <td>{{ $service->id }}</td>
                <td>
                    <img height="50" src="{{$service->p_name ? URL::to('images') .'/'. $service->p_name : URL::to('images') .'/'.'400x400.png'}}" alt="img">
                </td>
                <td>{{ $service->name }}</td>
                <td>{{ $service->created_at }}</td>
                <td>{{ $service->updated_at }}</td>
                <td><input type="checkbox" name="delete" value="{{ $service->id }}"></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>