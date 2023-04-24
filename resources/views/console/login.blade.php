@extends ('layout.console')

@section ('content')

<section>

    <form id="login" method="post" action="/console/login" novalidate>

        @csrf

        <table id="table-login">
            <tr>
                <td><label for="email">Email Address:</label></td>
                <td><input type="email" name="email" id="email" value="{{old('email')}}" required></td>
            </tr>
            <tr>
                <td><label for="password">Password:</label></td>
                <td><input type="password" name="password" id="password" required></td>
            </tr>
        </table>
        
        <div id="error">
            @if ($errors->first('email'))
                {{$errors->first('email')}}
            @elseif ($errors->first('password'))
                {{$errors->first('password')}}
            @endif
        </div>

        <button type="submit"><i class="fa-solid fa-right-to-bracket"></i>Log In</button>

    </form>

</section>

@endsection
        