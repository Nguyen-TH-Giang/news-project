<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="public/backend/img/logo.png" class="logo" alt="Digital Magazine logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
