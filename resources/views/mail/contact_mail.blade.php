@component('mail::message')
    <h2>Contact message</h2>
    <h4>From:</h4>
    <p>Email: {{$data['email']}}</p>
    <p>Name: {{$data['name']}}</p>
    <p>Phone: {{$data['phone']}}</p>
    <h5>Message:</h5>
    <p>{{$data['message']}}</p>
@endcomponent
