@extends ('layout.console')

@section ('content')


    <h2>Manage Users</h2>

    <table class="table-list">
        <tr class="w3-red">
            <th>Name</th>
            <th>Email</th>
            <th>Created</th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach($users as $user): ?>
            <tr>
                <td>{{$user->first}} {{$user->last}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at->format('M j, Y')}}</td>
                <td><a href="/console/users/edit/{{$user->id}}"><i class="fa-solid fa-pen"></i>Edit</a></td>
                <td><a href="/console/users/delete/{{$user->id}}"><i class="fa-solid fa-trash"></i>Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <a href="/console/users/add" class="button"><i class="fa-solid fa-circle-plus"></i>New User</a>


@endsection
