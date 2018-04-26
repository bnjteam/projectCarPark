
@extends('layouts.app')
@section('head')
<ul class="breadcrumb">
  <li><a href="/home">Home</a> / </li>
  <li ><a href="/userManager">User Manager</a> / </li>
  
</ul>
@endsection


@section('content')

<br>
<table class="table" id="table">
    <thead>
        <tr>
      <th scope="col">Log ID</th>
      <th scope="col">User ID</th>
      <th scope="col">name</th>
      <th scope="col">Description</th>

      <th scope="col">Location</th>

      <th scope="col">Create Date</th>
    </tr>
  </thead>
  <tbody>
    @foreach($logData as $item)

    <tr>
      <td>{{ $loop->iteration }}</td>


      <td > <a href="/userManager/show/{{$item->id_user}}">
        {{ $item->id_user }}
        </a> </td>
        <td > <a href="/userManager/show/{{$item->id_user}}">
          {{ $names[$item->id_user] }}
          </a> </td>
      <td class="table-secondary">{{ $item->description }}</td>
      <td class="table-secondary">{{ $item->location }}</td>
      <td class="table-secondary">{{ $item->created_at->diffForHumans() }}</td>

    </tr>
    @endforeach
  </tbody>
</table>
@endsection
