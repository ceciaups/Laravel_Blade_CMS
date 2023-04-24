@extends ('layout.console')

@section ('content')

<a href="/console/career_types/list" class="button" id="return"><i class="fa-solid fa-rotate-left"></i>Back to Career Type List</a>

<h2>Edit Career Type</h2>

<form method="post" action="/console/career_types/edit/{{$career_type->id}}" novalidate class="w3-margin-bottom">

    @csrf

    <table class="table-form">
        <tr>
            <td><label for="career_type">Career Type:</label></td>
            <td><input type="career_type" name="career_type" id="career_type" value="{{old('career_type', $career_type->career_type)}}" required></td>
            @if ($errors->first('career_type'))
                <td class="w3-text-red">{{$errors->first('career_type')}}</td>
            @endif
        </tr>
    </table>

    <button type="submit" class="w3-button w3-green"><i class="fa-solid fa-pen"></i>Edit Career Type</button>

</form>

@endsection
