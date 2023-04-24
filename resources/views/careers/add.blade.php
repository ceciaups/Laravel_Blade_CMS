@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <a href="/console/careers/list" class="button" id="return"><i class="fa-solid fa-rotate-left"></i>Back to Career List</a>

    <h2>Add Career</h2>

    <form method="post" action="/console/careers/add" novalidate class="w3-margin-bottom">

        @csrf

        <table class="table-form">
            <tr>
                <td><label for="career">Career:</label></td>
                <td><input type="career" name="career" id="career" value="{{old('career')}}" required></td>
                @if ($errors->first('career'))
                    <td class="w3-text-red">{{$errors->first('career')}}</td>
                @endif
            </tr>
            <tr>
                <td><label for="location">Location:</label></td>
                <td><textarea name="location" id="location" required>{{old('location')}}</textarea></td>
                @if ($errors->first('location'))
                    <td class="w3-text-red">{{$errors->first('location')}}</td>
                @endif
            </tr>
            <tr>
                <td><label for="start_date">Start Date:</label></td>
                <td><input type="date" name="start_date" id="start_date" value="{{old('start_date')}}" required></td>
                @if ($errors->first('start_date'))
                    <td class="w3-text-red">{{$errors->first('start_date')}}</td>
                @endif
            </tr>
            <tr>
                <td><label for="end_date">End Date:</label></td>
                <td><input type="date" name="end_date" id="end_date" value="{{old('end_date')}}" required></td>
                @if ($errors->first('end_date'))
                    <td class="w3-text-red">{{$errors->first('end_date')}}</td>
                @endif
            </tr>
            <tr>
                <td><label for="career_type_id">Career Type:</label></td>
                <td>
                    <select name="career_type_id" id="career_type_id">
                        <option></option>
                        @foreach ($career_types as $career_type)
                            <option value="{{$career_type->id}}"
                                {{$career_type->id == old('career_type_id') ? 'selected' : ''}}>
                                {{$career_type->career_type}}
                            </option>
                        @endforeach
                    </select>
                </td>
                @if ($errors->first('career_type_id'))
                    <td class="w3-text-red">{{$errors->first('career_type_id')}}</td>
                @endif
            </tr>
            <tr>
                <td><label for="">Skills:</label></td>
                <td>
                    @foreach ($skills as $skill)
                        <br>
                        <label>
                            <input type="checkbox" name="skills[]" value="{{$skill->id}}"
                                {{$skill->id == old('skill_id') ? 'checked' : ''}}>
                            {{$skill->name}}
                        </label>
                    @endforeach
                </td>
            </tr>
        </table>
        
        <button type="submit" class="w3-button w3-green">Add Career</button>

    </form>

</section>

@endsection