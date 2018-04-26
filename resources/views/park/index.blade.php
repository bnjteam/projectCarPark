@extends('layouts.app')
@section('head')
<ul class="breadcrumb">
  <li><a href="/home">Home</a> / </li>
  <li ><a class="active">Parking Manager</a> </li>
</ul>
@endsection


@section('content')

<br>
<table class="table" id="table">
    <thead>
        <tr>
      <th scope="col">ID</th>
      <th scope="col">Photo</th>

      <th scope="col">Location</th>
      <th scope="col">address</th>
      <th scope="col">Owner</th>
      <th scope="col">Create Date</th>
      <th scope="col">Last Update</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>


    </tr>
  </thead>
  <tbody>
    @foreach($park as $item)
    <tr>
      <td>{{ $loop->iteration }}</td>

      <td><img style="border-radius: 20%" width="150"  src="{{ $item->photo }}" alt=""></td>
      <td class="table-secondary"><a href="/parkings/{{ $item->id }}">{{ $item->location }}</a></td>
      <td class="table-secondary">{{ $item->address }}</td>
      <td > <a href="/userManager/show/{{$item->id_user}}">
        {{ $names[$item->id_user] }}
        </a> </td>
      <td class="table-secondary">{{ $item->created_at->diffForHumans() }}</td>
      <td class="table-secondary">{{ $item->updated_at->diffForHumans() }}</td>
      <td class="table-secondary"><a class="btn btn-primary" role="button"
         href="/parkings/{{ $item->id }}/edit">Edit</a></td>


      <td class="table-danger">
        <form class="" action="/parkings/{{ $item->id }}" method="post">
        @csrf
        @method('DELETE')
        <button onclick="return confirm('Are you sure you want to delete this parking?')" class="btn btn-danger" role="button"
            >Delete</button></td>
        </form>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
