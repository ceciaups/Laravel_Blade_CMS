@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <a href="/console/skills/list" class="button" id="return"><i class="fa-solid fa-rotate-left"></i>Back to Skill List</a>

    <h2>Edit Skill</h2>

    <form method="post" action="/console/skills/edit/{{$skill->id}}" novalidate class="w3-margin-bottom">

        @csrf

        <table class="table-form">
            <tr>
                <td><label for="name">Name:</label></td>
                <td><input type="name" name="name" id="name" value="{{old('name', $skill->name)}}" required></td>
                @if ($errors->first('name'))
                    <td class="w3-text-red">{{$errors->first('name')}}</td>
                @endif
            </tr>
        </table>

        <button type="submit" class="w3-button w3-green">Edit Skill</button>

    </form>

</section>

@endsection
