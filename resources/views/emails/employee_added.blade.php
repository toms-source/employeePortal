@component('mail::message')
# New Employee Added

A new employee has been added to the system.

Here is the password for the employee:

Password: {{ $password }}

Please make sure to inform the employee about their password and instruct them to change it upon logging in.

Thank you.
@endcomponent