@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Manage Career Types</h2>

    <table class="table-list">
        <tr class="w3-red">
            <th>Career Type</th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($career_types as $career_type)
            <tr>
                <td>{{$career_type->career_type}}</td>
                <td><a href="/console/career_types/edit/{{$career_type->id}}"><i class="fa-solid fa-pen"></i>Edit</a></td>
                <td><a href="/console/career_types/delete/{{$career_type->id}}"><i class="fa-solid fa-trash"></i>Delete</a></td>
            </tr>
        @endforeach
    </table>

    <a href="/console/career_types/add" class="button"><i class="fa-solid fa-circle-plus"></i>New Career Type</a>

</section>

@endsection
