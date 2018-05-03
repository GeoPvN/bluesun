<div class="dataTable_wrapper" style="margin-top: 15px;">
    <table class="table table-striped table-bordered table-hover" id="user-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Born Date</th>
            <th>Sex</th>
            <th>Member</th>
            <th>Photo</th>
            <th>Username</th>
            <th>E-mail</th>
            <th>Add Date</th>
            <th>Up Date</th>
            <th>#</th>
        </tr>
        </thead>
        <tbody id="table-data">
        @foreach($users as $user)
            <tr id="{{ $user->id }}">
                <td>{{ $user->id }}</td>
                <td>{{ $user->fname }}</td>
                <td>{{ $user->lname }}</td>
                <td>{{ $user->date }}</td>
                <td>{{ $user->s_name }}</td>
                <td>{{ $user->m_name }}</td>
                <td>
                    <img height="50" src="{{$user->p_name ? URL::to('images') .'/'. $user->p_name : URL::to('images') .'/'.'400x400.png'}}" alt="img">
                </td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->updated_at }}</td>
                <td><input type="checkbox" name="delete" value="{{ $user->id }}"></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>