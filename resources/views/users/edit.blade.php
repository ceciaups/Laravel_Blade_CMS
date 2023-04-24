@extends ('layout.console')

@section ('content')

<a href="/console/users/list" class="button" id="return"><i class="fa-solid fa-rotate-left"></i>Back to User List</a>

<h2>Edit User</h2>

<form method="post" action="/console/users/edit/{{$user->id}}" novalidate class="w3-margin-bottom">

    @csrf

    <table class="table-form">
        <tr>
            <td><label for="first">First Name:</label></td>
            <td><input type="text" name="first" id="first" value="{{old('first', $user->first)}}" required></td>
            @if ($errors->first('first'))
                <td class="w3-text-red">{{$errors->first('first')}}</td>
            @endif
        </tr>
        <tr>
            <td><label for="last">Last Name:</label></td>
            <td><input type="text" name="last" id="last" value="{{old('last', $user->last)}}" required></td>
            @if ($errors->first('last'))
                <td class="w3-text-red">{{$errors->first('last')}}</td>
            @endif
        </tr>
        <tr>
            <td><label for="email">Email:</label></td>
            <td><input type="email" name="email" id="email" value="{{old('email', $user->email)}}" required></td>
            @if ($errors->first('email'))
                <td class="w3-text-red">{{$errors->first('email')}}</td>
            @endif
        </tr>
        <tr>
            <td><label for="password">Password:</label></td>
            <td><input type="password" name="password" id="password"></td>
            @if ($errors->first('password'))
                <td class="w3-text-red">{{$errors->first('password')}}</td>
            @endif
        </tr>
    </table>

    <button type="submit" class="w3-button w3-green"><i class="fa-solid fa-pen"></i>Edit User</button>

</form>

@endsection
