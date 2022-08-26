<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>{{ $title }}</title>
</head>
<style>
	.text-center {
		text-align: center;
	}
	.font-bold {
		font-weight: bold;
	}
	.text-right {
		text-align: right;
	}
	.table, th, td {
		border: 1px solid;
	}
	.w-full {
		width: 100%;
	}
	table {
		margin-top: 3rem;
	}
	body {
		margin: 0 5rem 0 5rem;
	}
</style>
<body class="container">
	<h1 class="text-center">{{ $title }}</h1>
	<table class="w-full">
		<thead>
			<tr class="text-center">
				<th>NO</th>
				<th>TANGGAL</th>
				<th>JENIS {{ strtoupper($column) }}</th>
				<th>HARGA</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($data as $key => $item)
				<tr class="text-center">
					<td>{{ $loop->iteration }}</td>
					<td>{{ $key }}</td>
					<td>
						@foreach ($item as $k => $value)
							{{ $k }}: {{ $value["qty"] }}<br>
						@endforeach
					</td>
					<td class="text-right">
						@foreach ($item as $i)
						Rp.	{{ number_format($i["subtotal"], 0, ',', '.') }}<br>
						@endforeach
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<table class="w-full">
		<thead>
			<tr class="text-center">
				<th>No</th>
				<th>JENIS {{ strtoupper($column) }}</th>
				<th>JUMLAH</th>
				<th>SUBTOTAL</th>
			</tr>
		</thead>
		<tbody>
			@foreach($sum["data"] as $key => $value)
				<tr class="text-center">
					<td>{{ $loop->iteration }}</td>
					<td>{{ $key }}</td>
					<td>{{ $value["qty"] }}</td>
					<td class="text-right">Rp. {{ number_format($value["subtotal"], 0, ',', '.') }}</td>
				</tr>
			@endforeach
			<tr>
				<td colspan="3" class="font-bold text-center">TOTAL</td>
				<td class="text-right font-bold">Rp. {{ number_format($sum["total"], 0, ',', '.') }}</td>
			</tr>
		</tbody>
	</table>
</body>
</html>