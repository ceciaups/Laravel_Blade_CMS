@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <a href="/console/projects/list" class="button" id="return"><i class="fa-solid fa-rotate-left"></i>Back to Project List</a>
    
    <h2>Edit Project</h2>

    <form method="post" action="/console/projects/edit/{{$project->id}}" novalidate class="w3-margin-bottom">

        @csrf

        <table class="table-form">
            <tr>
                <td><label for="title">Title:</label></td>
                <td><input type="title" name="title" id="title" value="{{old('title', $project->title)}}" required></td>
                @if ($errors->first('title'))
                    <td class="w3-text-red">{{$errors->first('title')}}</td>
                @endif
            </tr>
            <tr>
                <td><label for="url">URL:</label></td>
                <td><input type="url" name="url" id="url" value="{{old('url', $project->url)}}"></td>
                @if ($errors->first('url'))
                    <td class="w3-text-red">{{$errors->first('url')}}</td>
                @endif
            </tr>
            <tr>
                <td><label for="github">GitHub:</label></td>
                <td><input type="github" name="github" id="github" value="{{old('github', $project->github)}}"></td>
                @if ($errors->first('github'))
                    <td class="w3-text-red">{{$errors->first('github')}}</td>
                @endif
            </tr>
            <tr>
                <td><label for="content">Content:</label></td>
                <td><textarea name="content" id="content" required>{{old('content', $project->content)}}</textarea></td>
                @if ($errors->first('content'))
                    <td class="w3-text-red">{{$errors->first('content')}}</td>
                @endif
            </tr>
            <tr>
                <td><label for="">Skills:</label></td>
                <td>
                    @foreach ($skills as $skill)
                        <br>
                        <label>
                            <input type="checkbox" name="skills[]" value="{{$skill->id}}"
                            {{ $project->skills->pluck('id')->contains($skill->id) ? 'checked' : ''}}>
                            {{$skill->name}}
                        </label>
                    @endforeach
                </td>
            </tr>
        </table>

        <button type="submit" class="w3-button w3-green">Edit Project</button>

    </form>

</section>

@endsection
