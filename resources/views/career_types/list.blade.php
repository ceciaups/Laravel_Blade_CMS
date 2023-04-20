@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Manage Career Types</h2>

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-red">
            <th>Career Type</th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($career_types as $career_type)
            <tr>
                <td>{{$career_type->career_type}}</td>
                <td><a href="/console/career_types/edit/{{$career_type->id}}">Edit</a></td>
                <td><a href="/console/career_types/delete/{{$career_type->id}}">Delete</a></td>
            </tr>
        @endforeach
    </table>

    <a href="/console/career_types/add" class="w3-button w3-green">New Career Type</a>

</section>

@endsection
