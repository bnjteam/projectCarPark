@extends('layouts.app')



@section('content')

<br>
<table class="table" id="table">
    <thead>
        <tr>
      <th scope="col">ID</th>
      <th scope="col">Avatar</th>
      <th scope="col">Name</th>

      <th scope="col">E-mail</th>
      <th scope="col">Level</th>
      <th scope="col">Create Date</th>

      <th scope="col">Status</th>
      <th scope="col">Package</th>
      <th scope="col">End Package Date</th>
      <th scope="col">Action</th>
      <th scope="col">Log History</th>

    </tr>
  </thead>
  <tbody>
    @foreach($users as $item)

    <tr>
      <td>{{ $loop->iteration }}</td>
      <td><img style="border-radius: 20%" width="80"  src="{{ $item->avatar }}" alt=""></td>
      <td > <a href="/userManager/show/{{$item->id}}">
          {{ $item->name }}
        </a> </td>

      <td class="table-secondary">{{ $item->email }}</td>
      <td class="table-secondary">{{ $item->level }}</td>
      <td class="table-secondary">{{ $item->created_at->diffForHumans() }}</td>

      @if($item->is_enabled==1)
      <td class="table-success">
          <i class="fa fa-check"></i>
      </td>
      @else
        <td class="table-danger">
          <i class="fa fa-times"></i>
      </td>
      @endif
      <td class="table-secondary">{{ $item->type }}</td>
      <td class="table-secondary">{{ $item->end_date_package }}</td>
      <div>
      <td class="table-secondary"><a class="btn btn-primary" role="button"
         href="/userManager/setting/{{ $item->id }}">Edit</a></td>
      </div>
      <div>
      <td class="table-secondary"><a class="btn btn-success" role="button"
         href="/userManager/logs/{{ $item->id }}">Log</a></td>
      </div>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
