<!DOCTYPE html>
<html>
<head>
	<title>Monthly Profit Report</title>

</head>
<body>

	<table width="100%">
		<tr>
			<td>
				<img src="{{ public_path('img/logo.jpg') }}" width="100px"/>
			</td>
			<td>
				<h2 align="right" style="color:green;margin:0px">BdCollage</h2>
				<p align="right" style="margin:0px"><b>Phone:</b> 01745874587<br>
				<b>Email:</b> masudrana.bbpi@gmail.com<br>
				<b>Website:</b> www.webmvwit.com<br>
				<b>Address:</b> Bilash Super Market, Mirpur-10, Dhaka.</p>
			</td>
		</tr>
	</table>

	<hr style="width: 100%; height: 2px; background: green">

		@php
		$totalStudentFee = App\Models\AccountStudentFee::whereBetween('date',[$start_date, $end_date])->sum('amount');
    	$totalOtherCost = App\Models\AccountOtherCost::whereBetween('date', [$s_start_date, $e_end_date])->sum('amount');
    	$totalEmployeeSalary = App\Models\AccountEmployeeSalary::whereBetween('date', [$start_date, $end_date])->sum('amount');
    	$expense = $totalEmployeeSalary+$totalOtherCost;
    	$profit = $totalStudentFee-$expense;

    	$report_start_date = date('F, Y', strtotime($s_start_date));
    	$report_end_date = date('F, Y', strtotime($e_end_date));
		@endphp

	  <h3 align="center" style="margin:0px">Monthly Profit Report ({{$report_start_date}} - {{$report_end_date}})</h3>
	  <br>


	  <table border="1" style="border-collapse: collapse;" width="100%" cellpadding="2">
	    <thead>
          <tr>
          	<th>Total Student Fee</th>
            <th>Total Employee Salary</th>
            <th>Total Other Cost</th>
            <th>Total Expense</th>
            <th>Profit</th>
          </tr>
        </thead>
	     <tbody>
	      	<tr>
	      		<td>{{ $totalStudentFee }}tk</td>
	      		<td>{{ $totalEmployeeSalary }}tk</td>
	      		<td>{{ $totalOtherCost }}tk</td>
	      		<td>{{ $expense }}tk</td>
	      		<td>{{ $profit }}tk</td>
	      	</tr>
	    </tbody>
	  </table>

	  @php 
	  	$date = new DateTime('now', new DateTimezone('Asia/Dhaka'));
	  @endphp
	  <p>Printing Time: {{ $date->format('F j, Y, g:i a') }}</p>

	  <br>
	  <br>
	  <table width="100%">
	  	<tr>
	  		<td width="50%" align="left"><b><u></u></b></td>
	  		<td width="50%" align="right"><b><u>Principal Signature</u></b></td>
	  	</tr>
	  </table>

</body>
</html>