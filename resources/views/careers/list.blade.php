@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Manage Careers</h2>

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
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
                <td><a href="/console/careers/image/{{$career->id}}">Image</a></td>
                <td><a href="/console/careers/edit/{{$career->id}}">Edit</a></td>
                <td><a href="/console/careers/delete/{{$career->id}}">Delete</a></td>
            </tr>
        @endforeach
    </table>

    <a href="/console/careers/add" class="w3-button w3-green">New Career</a>

</section>

@endsection
