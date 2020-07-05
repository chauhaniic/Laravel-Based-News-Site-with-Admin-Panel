@extends('master')
@section('sidebar')
    @parent
    <p>This is SideBar</p>
@endsection

@section('component')
    <h1>About Page</h1>
    <div>
    @php
        $var="Oye Sun!";
        echo $var;
    @endphp
</div>
@endsection

<p>
    <!---
        {{ $first_name }}   
        <? //echo $last_name;?>
    --->
</p>
