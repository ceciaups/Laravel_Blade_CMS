@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Manage Journal Entries</h2>

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-red">
            <th>Title</th>
            <th>Date</th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($entries as $entry)
            <tr>
                <td>{{$entry->title}}</td>
                <td>{{$entry->learned_at}}</td>
                <td><a href="/console/entries/edit/{{$entry->id}}">Edit</a></td>
                <td><a href="/console/entries/delete/{{$entry->id}}">Delete</a></td>
            </tr>
        @endforeach
    </table>

    <a href="/console/entries/add" class="w3-button w3-green">New Entry</a>

</section>

@endsection
