<h1><b>Find My Campuses Friends</b></h1>
<p>Company: {{ $company->name }}</p>
<p>Contact: {{ $company->contact }}</p>
<p>Email: {{ $company->email }}</p>
<p>website: {{ $company->email }}</p>
<p>Address: {{ $company->website }}</p>


<h2>User Details</h2>
<p>Fullname: {{ $user->fullname }}</p>
<p>Student Number: {{ $user->student->student_number }}</p>
<p>University: {{ $user->student->university->name }}</p>
<p>Contact: {{ $user->cellnumber }}</p>
<p>Email: {{ $user->email }}</p>