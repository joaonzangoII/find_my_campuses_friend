<p>Name: {{ $user->fullname }}</p>
<p>Cellphone: {{ $user->cellnumber }}</p>
<p>Email: {{ $user->email }}</p>
<p>Address: {{ $user->address }}</p>
<p>State: {{ $user->state->name }}</p>

{{-- first_name
last_name
address
state_id
cellnumber
email
avatar
slug
user_type_id --}}