@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Add Career Type</h2>

    <form method="post" action="/console/career_types/add" novalidate class="w3-margin-bottom">

        @csrf

        <div class="w3-margin-bottom">
            <label for="career_type">Career Type:</label>
            <input type="career_type" name="career_type" id="career_type" value="{{old('career_type')}}" required>
            
            @if ($errors->first('career_type'))
                <br>
                <span class="w3-text-red">{{$errors->first('career_type')}}</span>
            @endif
        </div>

        <button type="submit" class="w3-button w3-green">Add Career Type</button>

    </form>

    <a href="/console/career_types/list">Back to Career Type List</a>

</section>

@endsection