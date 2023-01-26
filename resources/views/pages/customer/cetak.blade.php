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
     <th>Data Masuk</th>
     <th>Jenis Kasus</th>
   </tr>
 </thead>
 <tbody>
   @forelse ($customer as $item)
       <tr>
         <td>{{ $loop->iteration }}</td>
         <td>{{ $item->admin->DATA_MASUK }}</td>
         <td>{{ $item->JENIS_KASUS }}</td>
       </tr>
   @empty
       
   @endforelse
 </tbody>
</table>
 
</body>
</html>