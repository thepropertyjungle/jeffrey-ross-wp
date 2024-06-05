{{--
    ATTENTION
    =========
    /src/scss/components/multiple-property-type-select.scss

	This component will add an input in your search include that
    looks like a select element. It will allow the end-user to select
    multiple property types to search for in a nicely styled feature.

	Be aware that this code is using a pre-existing include for the
	dynamic property types.

	Use this feature by simply including it in your search form where
	property type selection would usually go.
    
	@include('components/multiple-property-type-select')
--}}

<div data-component="MultiplePropertyTypeSelect" class="tpj-multiple-property-select">
    <div class="tpj-mp-types-ui">
		<div class="tpj-select-types-placeholder">Select property type</div>
        <div class="tpj-select-types"></div>
		<div class="tpj-mp-types-arrow">&#x25BC;</div>
		<div class="tpj-mp-types-list">
			<div class="tpj-mp-types-list-content"></div>
		</div>
    </div>

	<input data-component="FormItem" type="hidden" class="multiple-property-type-select-input" name="property_type">

    {{-- start Note! multiple-property-types-temp-ui will be removed after the data extraction --}}
    <div class="control-group multiple-property-types-temp-ui">
        <select>
			@include('partials/search-property-types', ['filters' => [
				'department' => 'Residential'
			]])
        </select>
    </div>
    {{-- end Note! multiple-property-types-temp-ui will be removed after the data extraction --}}
</div>