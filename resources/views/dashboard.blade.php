@extends('components.app')
@section('content')
    <h1>Dashboard</h1>
    <form action="{{ route('logout') }}" class="form-control">
        @csrf
        <button type="submit" class="btn btn-danger">logout</button>
    </form>
@endsection
