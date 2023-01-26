<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
 
 <table class="table table-striped" id="table-1">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Alamat</th>
      <th>Status</th>
      <th>Umur</th>
      <th>ID PMKS</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($jiwa as $item)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $item->nama }}</td>
          <td>{{ $item->alamat }}</td>
          <td>{{ $item->status }}</td>
          <td>{{ $item->umur }}</td>
          <td>{{ $item->datapmks->id }}</td>
        </tr>
    @empty
        
    @endforelse
  </tbody>
</table>
 
</body>
</html>