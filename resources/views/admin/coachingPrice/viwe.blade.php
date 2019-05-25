<div class="dataTable_wrapper" style="margin-top: 15px;">
    <table class="table table-striped table-bordered table-hover" id="coachingprice-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>League</th>
            <th>Division</th>
            <th>Add Date</th>
            <th>Up Date</th>
            <th>#</th>
        </tr>
        </thead>
        <tbody id="table-data">
        @foreach($coachingprices as $coachingprice)
            <tr id="{{ $coachingprice->id }}">
                <td>{{ $coachingprice->id }}</td>
                <td>{{ $coachingprice->league->name }}</td>
                <td>{{ $coachingprice->name }}</td>
                <td>{{ $coachingprice->created_at }}</td>
                <td>{{ $coachingprice->updated_at }}</td>
                <td><input type="checkbox" name="delete" value="{{ $coachingprice->id }}"></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>