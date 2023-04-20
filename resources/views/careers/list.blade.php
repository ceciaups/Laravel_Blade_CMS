@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Manage Careers</h2>

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-red">
            <th>Career</th>
            <th>Location</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Career Type</th>
            <th>Skills</th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($careers as $career)
            <tr>
                <td>{{$career->career}}</td>
                <td>{{$career->location}}</td>
                <td>{{$career->start_date}}</td>
                <td>{{$career->end_date}}</td>
                <td>{{$testing}}</td>
                <td>{{$testing}}</td>
                <td><a href="/console/careers/edit/{{$career->id}}">Edit</a></td>
                <td><a href="/console/careers/delete/{{$career->id}}">Delete</a></td>
            </tr>
        @endforeach
    </table>

    <a href="/console/careers/add" class="w3-button w3-green">New Career</a>

</section>

@endsection
