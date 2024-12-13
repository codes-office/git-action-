@component('mail::message')
# Ride Booked.

Dear {{$data['customer']->name}}, <!-- Access customer name from the array -->

Your Ride is booked for your journey. Below are the details for your journey.

@component('mail::table')
@php($date_format_setting=(Hyvikk::get('date_format'))?Hyvikk::get('date_format'):'d-m-Y')

<table>
    @if($data['vehicle']) <!-- Check if vehicle data exists -->
        <tr><td>Vehicle: </td><td>{{$data['vehicle']->make_name}} {{$data['vehicle']->model_name}}</td></tr>
        <tr><td>Vehicle Licence Plate: </td><td>{{$data['vehicle']->license_plate}}</td></tr>
    @endif
    <tr><td>Journey Date: </td><td>{{date($date_format_setting,strtotime($data['pickupDate']))}}</td></tr>
    <tr><td>Pickup Time: </td><td>{{date('g:i A',strtotime($data['pickupDate']))}}</td></tr>
    <tr><td>Pickup Address: </td><td>{{$data['pickupAddr']}}</td></tr>
    <tr><td>Destination Address: </td><td>{{$data['destAddr']}}</td></tr>
    <tr><td>Travellers: </td><td>{{$data['travellers']}}</td></tr>
</table>
@endcomponent

We wish you a happy journey.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
