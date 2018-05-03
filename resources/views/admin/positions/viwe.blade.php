<div class="dataTable_wrapper" style="margin-top: 15px;">
    <table class="table table-striped table-bordered table-hover" id="positions-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Add Date</th>
            <th>Up Date</th>
            <th>#</th>
        </tr>
        </thead>
        <tbody id="table-data">
        @foreach($positions as $position)
            <tr id="{{ $position->id }}">
                <td>{{ $position->id }}</td>
                <td>{{ $position->name }}</td>
                <td>{{ $position->created_at }}</td>
                <td>{{ $position->updated_at }}</td>
                <td><input type="checkbox" name="delete" value="{{ $position->id }}"></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>