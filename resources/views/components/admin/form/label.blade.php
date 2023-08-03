@props(['label'])

<label {{ $attributes(['for' => $attributes->get('for')]) }} class="col-sm-2 col-form-label">{{ ucwords($label) }}</label>

