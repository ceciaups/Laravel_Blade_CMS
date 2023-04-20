@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Add Career</h2>

    <form method="post" action="/console/careers/add" novalidate class="w3-margin-bottom">

        @csrf

        <div class="w3-margin-bottom">
            <label for="career">Career:</label>
            <input type="career" name="career" id="career" value="{{old('career')}}" required>
            
            @if ($errors->first('career'))
                <br>
                <span class="w3-text-red">{{$errors->first('career')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="location">Location:</label>
            <textarea name="location" id="location" required>{{old('location')}}</textarea>

            @if ($errors->first('location'))
                <br>
                <span class="w3-text-red">{{$errors->first('location')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="start_date">Start Date:</label>
            <input type="date" name="start_date" id="start_date" value="{{old('start_date')}}" required>

            @if ($errors->first('start_date'))
                <br>
                <span class="w3-text-red">{{$errors->first('start_date')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="end_date">End Date:</label>
            <input type="date" name="end_date" id="end_date" value="{{old('end_date')}}" required>

            @if ($errors->first('end_date'))
                <br>
                <span class="w3-text-red">{{$errors->first('end_date')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="career_type_id">Career Type:</label>
            <select name="career_type_id" id="career_type_id">
                <option></option>
                @foreach ($career_types as $career_type)
                    <option value="{{$career_type->id}}"
                        {{$career_type->id == old('career_type_id') ? 'selected' : ''}}>
                        {{$career_type->career_type}}
                    </option>
                @endforeach
            </select>
            @if ($errors->first('career_type_id'))
                <br>
                <span class="w3-text-red">{{$errors->first('career_type_id')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="">Skills:</label>
            @foreach ($skills as $skill)
                <br>
                <label>
                    <input type="checkbox" name="skills[]" value="{{$skill->id}}"
                        {{$skill->id == old('skill_id') ? 'checked' : ''}}>
                    {{$skill->name}}
                </label>
            @endforeach
        </div>
        
        <button type="submit" class="w3-button w3-green">Add Career</button>

    </form>

    <a href="/console/careers/list">Back to Career List</a>

</section>

@endsection