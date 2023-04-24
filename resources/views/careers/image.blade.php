@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <a href="/console/careers/list" class="button" id="return"><i class="fa-solid fa-rotate-left"></i>Back to Career List</a>

    <h2>Career Image</h2>

    <div class="w3-margin-bottom">
        @if($career->image)
            <img src="{{asset('storage/'.$career->image)}}" width="200">
        @endif
    </div>

    <form method="post" action="/console/careers/image/{{$career->id}}" novalidate class="w3-margin-bottom" enctype="multipart/form-data">

        @csrf

        <div class="w3-margin-bottom">
            <label for="image">Image:</label>
            <input type="file" name="image" id="image" value="{{old('image')}}" required>
            
            @if ($errors->first('image'))
                <br>
                <span class="w3-text-red">{{$errors->first('image')}}</span>
            @endif
        </div>

        <button type="submit" class="w3-button w3-green">Add Image</button>

    </form>

</section>

@endsection
