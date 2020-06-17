<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<h1>Contact Us</h1>
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
