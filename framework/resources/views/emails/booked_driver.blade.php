@component('mail::message')
# Ride Booked

@if (!empty($data['driver']) && !empty($data['driver']->name))
    Dear {{ $data['driver']->name }},
@else
    Dear Driver,
@endif

Your vehicle has been booked for the upcoming journey. Below are the details:

@component('mail::table')
<table>
    <tr><td>Customer Name:</td><td>{{ $data['customer']->name ?? 'N/A' }}</td></tr>
    <tr><td>Journey Date:</td><td>{{ isset($data['pickup_date']) ? date($data['date_format'], strtotime($data['pickup_date'])) : 'N/A' }}</td></tr>
    <tr><td>Pickup Time:</td><td>{{ isset($data['pickup_date']) ? date('g:i A', strtotime($data['pickup_date'])) : 'N/A' }}</td></tr>
    <tr><td>Pickup Address:</td><td>{{ $data['pickup_address'] ?? 'N/A' }}</td></tr>
    <tr><td>Destination Address:</td><td>{{ $data['destination_address'] ?? 'N/A' }}</td></tr>
    <tr><td>Travellers:</td><td>{{ $data['travellers'] ?? 'N/A' }}</td></tr>
</table>
@endcomponent

We wish you a happy journey!

Thanks,  
{{ config('app.name') }}
@endcomponent
