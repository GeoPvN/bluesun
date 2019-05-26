<div class="dataTable_wrapper" style="margin-top: 15px;">
    <table class="table table-striped table-bordered table-hover" id="soloprice-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Current League</th>
            <th>Current Division</th>
            <th>Next League</th>
            <th>Next Division</th>
            <th>Price</th>
            <th>Add Date</th>
            <th>Up Date</th>
            <th>#</th>
        </tr>
        </thead>
        <tbody id="table-data">
        @foreach($soloPrices as $soloPrice)
            <tr id="{{ $soloPrice->id }}">
                <td>{{ $soloPrice->id }}</td>
                <td>{{ $soloPrice->now_leagues }}</td>
                <td>{{ $soloPrice->now_divisions }}</td>
                <td>{{ $soloPrice->next_leagues }}</td>
                <td>{{ $soloPrice->next_divisions }}</td>
                <td>{{ $soloPrice->price }}</td>
                <td>{{ $soloPrice->created_at }}</td>
                <td>{{ $soloPrice->updated_at }}</td>
                <td><input type="checkbox" name="delete" value="{{ $soloPrice->id }}"></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>