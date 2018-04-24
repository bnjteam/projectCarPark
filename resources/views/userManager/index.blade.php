@extends('layouts.app')

@section('head')
All Users
@endsection

@section('content')
<table class="table">
  <thead>
    <tr class="table-active">
      <th scope="col">ID</th>
      <th scope="col">Avatar</th>
      <th scope="col">Name</th>
      <th scope="col">Lastname</th>
      <th scope="col">E-mail</th>
      <th scope="col">Level</th>
      <th scope="col">Create Date</th>
      <th scope="col">Last Update</th>
      <th scope="col">Status</th>
      <th scope="col">Package</th>
      <th scope="col">End Package Date</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr >
      <th scope="row">{{ $loop->iteration }}</th>
      <td><img width="150"  src="{{ $user->avatar }}" alt=""></th>
      <td > <a href="/userManager/show/{{$user->id}}">
          {{ $user->name }}
        </a> </td>
      <td class="table-secondary">{{ $user->lastname }}</td>
      <td class="table-secondary">{{ $user->email }}</td>
      <td class="table-secondary">{{ $user->level }}</td>
      <td class="table-secondary">{{ $user->created_at->diffForHumans() }}</td>
      <td class="table-secondary">{{ $user->updated_at->diffForHumans() }}</td>
      @if($user->is_enabled==1)
      <td class="table-success">
          <i class="fa fa-check"></i>
      </td>
      @else
        <td class="table-danger">
          <i class="fa fa-times"></i>
      </td>
      @endif
      <td class="table-secondary">{{ $user->type }}</td>
      <td class="table-secondary">{{ $user->end_date_package }}</td>
      <div>
      <td class="table-secondary"><a class="btn btn-primary" role="button"
         href="/userManager/setting/{{ $user->id }}">Edit</a></td>
      </div>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection