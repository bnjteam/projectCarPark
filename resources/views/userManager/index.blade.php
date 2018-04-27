@extends('layouts.app')
@section('head')

<ul class="breadcrumb">
  <li><a href="/home">Home</a> / </li>
  <li class="active">Users Manager</li>
</ul>

@endsection


@section('content')

<style>
table {
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
}

th {
    cursor: pointer;
}

th, td {
    text-align: left;
    padding: 16px;
}

tr:nth-child(even) {
    background-color: #f2f2f2
}
</style>

<table class="table" id="myTable">

        <tr>
      <th onclick="sortTable(0)" scope="col">ID</th>
      <th onclick="sortTable(1)" scope="col">Avatar</th>
      <th onclick="sortTable(2)" scope="col">Name</th>

      <th onclick="sortTable(3)" scope="col">E-mail</th>
      <th onclick="sortTable(4)" scope="col">Level</th>
      <th onclick="sortTable(5)" scope="col">Create Date</th>

      <th onclick="sortTable(6)" scope="col">Status</th>
      <th onclick="sortTable(7)" scope="col">Package</th>
      <th onclick="sortTable(8)" scope="col">End Package Date</th>
      <th onclick="sortTable(9)" scope="col">Action</th>
      <th onclick="sortTable(10)" scope="col">Log History</th>

    </tr>

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
        <form class="" action="/userManager/suspend/{{$item->id}}" method="post">
          @csrf
          @method('DELETE')
          <i style="color:green" class="fa fa-check">Active/<button  onclick="return confirm('Are you sure you want to suspend this user?')" class="btn btn-danger btn-sm" >Suspend</button></i>
        </form>
      </td>
      @else

        <td class="table-danger">
          <form class="" action="/userManager/suspend/{{$item->id}}" method="post">
            @csrf
            @method('DELETE')
            <button onclick="return confirm('Are you sure you want to active this user?')" type="submit" class="btn btn-success btn-sm">Active</button>/<i style="color:red" class="fa fa-times">Suspend</i>
          </form>
          </td>
      @endif
      <td class="table-secondary">{{ $item->type }}</td>
      <td class="table-secondary">{{ $item->end_date_package }}</td>
      <div>
      <td class="table-secondary"><a class="btn btn-info" role="button"
         href="/userManager/setting/{{ $item->id }}">Edit</a></td>
      </div>
      <div>
      <td class="table-secondary"><a class="btn btn-success" role="button"
         href="/userManager/logs/{{ $item->id }}">Log</a></td>
      </div>
    </tr>
    @endforeach

</table>

<script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  dir = "asc";
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.getElementsByTagName("TR");
    for (i = 1; i < (rows.length - 1); i++) {
      shouldSwitch = false;
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          shouldSwitch= true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;

      switchcount ++;
    } else {
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script> 
@endsection
