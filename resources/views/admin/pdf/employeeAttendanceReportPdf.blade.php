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

	  <h3 align="center" style="margin:0px">Employee Attendance Report - {{date('F', strtotime($get_employee_attendance[0]->date))}}</h3>
	  <br>

	  <table width="100%">
	  	<tr>
	  		<td><b>Name:</b> {{$get_employee_attendance[0]->employee->name}}</td>
	  		<td><b>ID No :</b> {{$get_employee_attendance[0]->employee->id_no}}</td>
	  		<td><b>Designation:</b> {{$get_employee_attendance[0]->employee->designation->name}}</td>
	  	</tr>
	  </table>

	  <table border="1" style="border-collapse: collapse;" width="100%" cellpadding="2">
	    <thead>
          <tr>
          	<th>SL</th>
          	<th>Date</th>
            <th>Attend Status</th>
          </tr>
        </thead>
	     <tbody>
	     	@foreach($get_employee_attendance as $key=>$value)
	      	<tr>
	      		<td>{{$key+1}}</td>
	      		<td>{{date('F j, Y', strtotime($value->date))}}</td>
	      		<td>{{$value->attend_status}}</td>
	      	</tr>
	      	@endforeach
	    </tbody>
	  </table>
	  <table width="100%">
	  	<tr>
	  		<td><b>Present:</b> {{$present}}</td>
	  		<td><b>Absent:</b> {{$absent}}</td>
	  		<td><b>Leave:</b> {{$leave}}</td>
	  	</tr>
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