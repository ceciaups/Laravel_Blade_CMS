@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Manage Skills</h2>

    <table class="table-list">
        <tr class="w3-red">
            <th></th>
            <th>Name</th>
            <th>Added</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($skills as $skill)
            <tr>
                <td>
                    @if ($skill->logo)
                        <img src="{{asset('storage/'.$skill->logo)}}" width="50">
                    @endif
                </td>
                <td>{{$skill->name}}</td>
                <td>{{$skill->created_at->format('M j, Y')}}</td>
                <td><a href="/console/skills/logo/{{$skill->id}}"><i class="fa-solid fa-image"></i>Logo</a></td>
                <td><a href="/console/skills/edit/{{$skill->id}}"><i class="fa-solid fa-pen"></i>Edit</a></td>
                <td><a href="/console/skills/delete/{{$skill->id}}"><i class="fa-solid fa-trash"></i>Delete</a></td>
            </tr>
        @endforeach
    </table>

    <a href="/console/skills/add" class="button"><i class="fa-solid fa-circle-plus"></i>New Skill</a>

</section>

@endsection
