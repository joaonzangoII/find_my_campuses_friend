<p>Name: {{ $user->fullname }}</p>
<p>{{ $user->userable_type ==="App\Models\Student" ? "Student Number: " : "Staff Number: " }} {{ $user->student_number }}</p>
<p>Cellphone: {{ $user->cellnumber }}</p>
<p>Email: {{ $user->email }}</p>
<p>Address: {{ $user->address }}</p>
<p>State: {{ $user->state->name }}</p>