@extends ('layout.console')

@section ('content')

<h1 class="w3-text-red">Portfolio Console</h1> 
<p>Welcome back {{auth()->user()->first}} {{auth()->user()->last}}!</p>

@endsection
