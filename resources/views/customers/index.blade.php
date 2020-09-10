@extends('layouts.app')
@section('content')
<div class="card-body">
    <form action="{{ route('customers.index') }}" method="GET">
        <select name="country_id" id="" class="form-control">
            <option value="" selected disabled>Pasirinkite šalį klientų filtravimui:</option>
            @foreach ($countries as $country)
            <option value="{{ $country->id }}" 
                @if($country->id == app('request')->input('country_id')) 
                    selected="selected" 
                @endif>{{ $country->title }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<div class="card-body">
    @if($errors->any())
    <h4 style="color: red">{{$errors->first()}}</h4>
    @endif
    <table class="table">
        <tr>
            <th>Vardas</th>
            <th>Pavardė</th>
            <th>Email</th>
            <th>Telefonas</th>
            <th>Šalis</th>
            @auth
            <th>Veikmai</th>
            @endauth
        </tr>
        @foreach ($customers as $customer)
        <tr>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->surname }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->phone }}</td>
            <td>{{ $customer->country->title }}</td>
            @auth
            <td>
                <form action={{ route('customers.destroy', $customer->id) }} method="POST">
                    <a class="btn btn-success" href={{ route('customers.edit', $customer->id) }}>Redaguoti</a>
                    @csrf @method('delete')
                    <input type="submit" class="btn btn-danger" value="Trinti"/>
                </form>
            </td>
            @endauth
        </tr>
        @endforeach
    </table>
    <div>
        @auth
        <a href="{{ route('customers.create') }}" class="btn btn-success">Pridėti</a>
        @endauth
    </div>
</div>
@endsection
