@php
    $property_types = [];
    if (function_exists('tpj_get_available_property_types')) {
        $filters = isset($filters) && is_array($filters) ? $filters : [];
        $property_types = tpj_get_available_property_types($filters);
    }
@endphp
@if (count($property_types) > 0)
    @foreach ($property_types as $property_type)
        <option value="{{ $property_type['label'] ?? '' }}">{{ $property_type['label'] ?? '' }}</option>
    @endforeach
@else
    <option value="">None Found</option>
@endif