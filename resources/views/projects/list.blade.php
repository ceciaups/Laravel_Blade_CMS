@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Manage Projects</h2>

    <table class="table-list">
        <tr class="w3-red">
            <th></th>
            <th>Title</th>
            <th>Created</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($projects as $project)
            <tr>
                <td>
                    @if ($project->image)
                        <img src="{{asset('storage/'.$project->image)}}" width="200">
                    @endif
                </td>
                <td>
                    <a href="/project/{{$project->slug}}">
                        {{$project->title}}
                    </a>
                </td>
                <td>{{$project->created_at->format('M j, Y')}}</td>
                <td><a href="/console/projects/image/{{$project->id}}"><i class="fa-solid fa-image"></i>Image</a></td>
                <td><a href="/console/projects/edit/{{$project->id}}"><i class="fa-solid fa-pen"></i>Edit</a></td>
                <td><a href="/console/projects/delete/{{$project->id}}"><i class="fa-solid fa-trash"></i>Delete</a></td>
            </tr>
        @endforeach
    </table>

    <a href="/console/projects/add" class="button"><i class="fa-solid fa-circle-plus"></i>New Project</a>

</section>

@endsection
