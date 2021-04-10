<!DOCTYPE html>
<html>
<head>
	<title>Student Marksheet</title>

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

	  <h3 align="center" style="margin:0px">Student Marksheet</h3>
	  <br>
	  <table width="100%">
	  	<tr>
	  		<td style="width: 50%;text-align: left;">
	  			<b>Semester:</b> {{$allMarks[0]->semester->name}}
	  		</td>
	  		<td style="width: 50%;text-align: right;">
	  			<b>Exam Type:</b> {{$allMarks[0]->exam->name}}
	  		</td>
	  	</tr>
	  </table>
	  <table width="100%">
	  	<tr>
	  		<td width="50%">
	  			<table style="border-collapse: collapse;width: 80%;">
		  			<tr>
		  				<td><strong>Student Name</strong></td>
		  				<td>: {{ $get_student->student->name }}</td>
		  			</tr>
		  			<tr>
		  				<td><strong>Department</strong></td>
		  				<td>: {{ $get_student->department->name }}</td>
		  			</tr>
		  			<tr>
		  				<td><strong>Session</strong></td>
		  				<td>: {{ $get_student->session->name }}</td>
		  			</tr>
		  			<tr>
		  				<td><strong>ID No</strong></td>
		  				<td>: {{ $get_student->student->id_no }}</td>
		  			</tr>
		  			<tr>
		  				<td><strong>Roll</strong></td>
		  				<td>: {{ $get_student->roll }}</td>
		  			</tr>
		  		</table>
	  		</td>
	  		<td width="50%">
	  			<table border="1" style="border-collapse: collapse;width: 80%;">
		  			<thead>
		  				<tr>
			  				<th align="center">Grade</th>
			  				<th align="center">Point</th>
			  				<th align="center">Mark Range</th>
			  			</tr>
		  			</thead>
		  			<tbody>
		  				@foreach($allGrades as $allGrade)
			  			<tr>
			  				<td align="center">{{$allGrade->grade_name}}</td>
			  				<td align="center">{{number_format($allGrade->grade_point,2)}}</td>
			  				<td align="center">{{$allGrade->start_mark}}% - {{$allGrade->end_mark}}%</td>
			  			</tr>
			  			@endforeach
		  			</tbody>
		  		</table>
	  		</td>
	  	</tr>
	  </table>
	<br>
  	<table border="1" style="border-collapse: collapse;width: 100%;">
		<thead>
			<tr>
				<th align="center">SL</th>
				<th align="center">Subject Name</th>
				<th align="center">Subject Code</th>
				<th align="center">Grade</th>
				<th align="center">Point</th>
			</tr>
		</thead>
		<tbody>
			@php 
			$cradit_count = 0;
			$point_count = 0;
			@endphp
			@foreach($allMarks as $key=>$value)
			@php 
			$subject = App\Models\Subject::find($value->subject_id);
			$cradit_count = $cradit_count+$subject->cradit;
			$markperchante = $value->marks*100/$subject->total_mark;
			if($markperchante>= 80 && $markperchante<=100){
				$grade = 'A+';
				$point = '4';
			}elseif($markperchante>= 75 && $markperchante<=79){
				$grade = 'A';
				$point = '3.75';
			}elseif($markperchante>= 70 && $markperchante<=74){
				$grade = 'A-';
				$point = '3.50';
			}elseif($markperchante>= 65 && $markperchante<=69){
				$grade = 'B+';
				$point = '3.25';
			}elseif($markperchante>= 60 && $markperchante<=64){
				$grade = 'B';
				$point = '3';
			}elseif($markperchante>= 55 && $markperchante<=59){
				$grade = 'B-';
				$point = '2.75';
			}elseif($markperchante>= 50 && $markperchante<=54){
				$grade = 'C+';
				$point = '2.50';
			}elseif($markperchante>= 45 && $markperchante<=49){
				$grade = 'C';
				$point = '2.25';
			}elseif($markperchante>= 40 && $markperchante<=44){
				$grade = 'D';
				$point = '2';
			}else{
				$grade = 'F';
				$point = '0';
			}
			@endphp
			<tr>
				<td align="center">{{$key+1}}</td>
				<td>{{ $value->subject->name }}</td>
				<td align="center">{{ $value->subject->subject_code }}</td>

				<td align="center">{{ $grade }}</td>
				<td align="center">{{ number_format($point,2) }}</td>
			</tr>
			@php 
			$point_with_cradit = $point*$subject->cradit;
			$point_count = $point_count+$point_with_cradit; 
			@endphp
			@endforeach
			<tr>
				@php
				$gpa = $point_count/$cradit_count;
				@endphp
				<td colspan="3" align="right">GPA</td>
				@php
				if($gpa == 4){
					$gpa_grade = 'A+';
				}elseif($gpa>=3.75 && $gpa<=3.99){
					$gpa_grade = 'A';
				}elseif($gpa>= 3.50 && $gpa<=3.74){
					$gpa_grade = 'A-';
				}elseif($gpa>= 3.25 && $gpa<=3.49){
					$gpa_grade = 'B+';
				}elseif($gpa>= 3 && $gpa<=3.24){
					$gpa_grade = 'B';
				}elseif($gpa>= 2.75 && $gpa<=2.99){
					$gpa_grade = 'B-';
				}elseif($gpa>= 2.50 && $gpa<=2.74){
					$gpa_grade = 'C+';
				}elseif($gpa>= 2.25 && $gpa<=2.49){
					$gpa_grade = 'C';
				}elseif($gpa>= 2 && $gpa<=2.24){
					$gpa_grade = 'D';
				}else{
					$gpa_grade = 'F';
				}
				@endphp
				<td align="center">{{$gpa_grade}}</td>
				<td align="center">{{number_format($gpa,2)}}</td>
			</tr>
		</tbody>
	</table>
	<br>
	<h3>Result Status: <span style="color:{{ ($student_result_status == 'Pass')? 'green':'red'}};margin-bottom: 0px;">{{ $student_result_status }}</span></h3>
	<br>

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