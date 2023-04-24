@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Manage Careers</h2>

    <table class="table-list">
        <tr class="w3-red">
            <th></th>
            <th>Career</th>
            <th>Location</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Career Type</th>
            <th>Skills</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($careers as $career)
            <tr>
                <td>
                    @if ($career->image)
                        <img src="{{asset('storage/'.$career->image)}}" width="200">
                    @endif
                </td>
                <td>{{$career->career}}</td>
                <td>{{$career->location}}</td>
                <td>{{$career->start_date}}</td>
                <td>{{$career->end_date}}</td>
                <td>
                    <?php
                        echo $career->careerType()->get()->value('career_type');
                    ?>
                </td>
                <td>
                    <?php
                        $skills = $career->skills()->pluck('name');
                        for ($i = 0; $i < count($skills); $i++) {
                            echo $skills[$i];
                            if ($i < count($skills) - 1) {
                                echo ' / ';
                            }
                        }
                    ?>
                </td>
                <td><a href="/console/careers/image/{{$career->id}}"><i class="fa-solid fa-image"></i>Image</a></td>
                <td><a href="/console/careers/edit/{{$career->id}}"><i class="fa-solid fa-pen"></i>Edit</a></td>
                <td><a href="/console/careers/delete/{{$career->id}}"><i class="fa-solid fa-trash"></i>Delete</a></td>
            </tr>
        @endforeach
    </table>

    <a href="/console/careers/add" class="button"><i class="fa-solid fa-circle-plus"></i>New Career</a>

</section>

@endsection
