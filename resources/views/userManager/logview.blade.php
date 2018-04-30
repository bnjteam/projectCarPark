
@extends('layouts.app')
@section('head')
<ul class="breadcrumb">
  <li><a href="/home">Home</a> / </li>
  <li ><a href="/userManager">User Manager</a> / </li>
  <li class="active">Log View</li>

</ul>
@endsection

<style>
table {
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
    text-align: center;
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
th:hover {
    background-color: pink
}
th:active {
    background-color: #666699;
}

tr:hover {
  background-color:#f5f5f5;
}
td ,th ,tr {
  word-wrap: break-word;
}
</style>


@section('content')

<br>
<div style="overflow-x:auto;">
<table class="table" id="myTable">

      <tr>
      <th onclick="sortTable(0)" scope="col">Log ID</th>
      <th onclick="sortTable(1)" scope="col">User ID</th>
      <th onclick="sortTable(2)" scope="col">name</th>
      <th onclick="sortTable(3)" scope="col">Description</th>
      <th onclick="sortTable(5)" scope="col">Create Date</th>
    </tr>

    @foreach($logData as $item)

    <tr>
      <td>{{ $loop->iteration }}</td>


      <td>
        <a href="/userManager/show/{{$item->id_user}}">
        {{ $item->id_user }}
        </a>
      </td>
        <td>
          <a href="/userManager/show/{{$item->id_user}}">
          {{ $names[$item->id_user] }}
          </a>
        </td>
      <td>{{ $item->description }}</td>
      <td>{{ $item->created_at->diffForHumans() }}</td>
    </tr>
    @endforeach

</table>
</div>

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
