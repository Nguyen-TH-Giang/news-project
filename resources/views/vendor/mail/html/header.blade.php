<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="public/backend/img/logo.png" class="logo" alt="Nice Admin logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
