@extends('layouts.app')



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
      <td class="table-secondary">รอโนเอลใส่Owner</td>
      <td class="table-secondary">{{ $item->created_at->diffForHumans() }}</td>
      <td class="table-secondary">{{ $item->updated_at->diffForHumans() }}</td>
      <td class="table-secondary"><a class="btn btn-primary" role="button"
         href="/parkings/{{ $item->id }}/edit">Edit</a></td>


      <td class="table-danger">
        @csrf
        @method('DELETE')
        <a class="btn btn-danger" role="button"
            href="/parkings/{{ $item->id }}">Delete</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
