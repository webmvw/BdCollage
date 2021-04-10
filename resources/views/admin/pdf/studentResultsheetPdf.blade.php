<!DOCTYPE html>
<html>
<head>
	<title>Student Resultsheet</title>

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

	<h3 align="center" style="margin:0px">{{$studentMarks[0]->exam->name}} Resultsheet</h3>
	<br>
	<table width="100%">
		<tr>
			<td><b>Department: </b>{{$studentMarks[0]->department->name}}</td>
			<td><b>Session: </b>{{$studentMarks[0]->session->name}}</td>
			<td><b>Semester: </b>{{$studentMarks[0]->semester->name}}</td>
		</tr>
	</table>
	<table border="1" style="border-collapse: collapse;width: 100%;margin-top:5px;">
		<thead>
			<tr style="background: orange">
				<th>SL</th>
				<th>Student Name</th>
				<th>ID No</th>
				<th>Grade</th>
				<th>Point</th>
			</tr>
		</thead>
		<tbody>
			@foreach($studentMarks as $key=>$value)
			@php
			$count_fail = App\Models\StudentMarks::where('student_id', $value->student_id)->where('department_id', $value->department_id)->where('session_id', $value->semester_id)->where('semester_id', $value->semester_id)->where('exam_id', $value->exam_id)->get();
	        $subject_fail_count = 0;
	        foreach($count_fail as $value){
	            $subject = App\Models\Subject::find($value->subject_id);
	            $subject_total_mark = $subject->total_mark;
	            $subject_pass_mark = $subject->pass_mark;
	            $subject_original_pass_mark = $subject_pass_mark/100*$subject_total_mark;
	            if($value->marks < $subject_original_pass_mark){
	                $subject_fail_count++;
	            }
	        }
	        if($subject_fail_count == 0){
	            $allMarks = App\Models\StudentMarks::with('student', 'department', 'session', 'semester', 'subject', 'exam')->where('student_id', $value->student_id)->where('department_id', $value->department_id)->where('session_id', $value->session_id)->where('semester_id', $value->semester_id)->where('exam_id', $value->exam_id)->get();
	            $cradit_count = 0;
				$point_count = 0;
	            foreach($allMarks as $key=>$value){
	            	$subject = App\Models\Subject::find($value->subject_id);
					$cradit_count = $cradit_count+$subject->cradit;
					$markperchante = $value->marks*100/$subject->total_mark;
					if($markperchante>= 80 && $markperchante<=100){
						$point = '4';
					}elseif($markperchante>= 75 && $markperchante<=79){
						$point = '3.75';
					}elseif($markperchante>= 70 && $markperchante<=74){
						$point = '3.50';
					}elseif($markperchante>= 65 && $markperchante<=69){
						$point = '3.25';
					}elseif($markperchante>= 60 && $markperchante<=64){
						$point = '3';
					}elseif($markperchante>= 55 && $markperchante<=59){
						$point = '2.75';
					}elseif($markperchante>= 50 && $markperchante<=54){
						$point = '2.50';
					}elseif($markperchante>= 45 && $markperchante<=49){
						$point = '2.25';
					}elseif($markperchante>= 40 && $markperchante<=44){
						$point = '2';
					}else{
						$point = '0';
					}
					$point_with_cradit = $point*$subject->cradit;
					$point_count = $point_count+$point_with_cradit;
	        	}
				$gpa = $point_count/$cradit_count;
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
				$grade = $gpa_grade;
				$point = $gpa;
	        }else{
	            $grade = "F";
	            $point = "0";
	        }
			@endphp
			<tr>
				<td align="center">{{ $key+1 }}</td>
				<td>{{ $value->student->name }}</td>
				<td align="center">{{ $value->student->id_no }}</td>
				<td align="center">{{ $grade}}</td>
				<td align="center">{{ number_format($point,2) }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	
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