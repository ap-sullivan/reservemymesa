@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://b01740777-uws24.duckdns.org/logo/mesa-logo-dark-pink.png" class="logo" alt="Mesa Logo">
@else
{!! $slot !!}
@endif
</a>
</td>
</tr>
