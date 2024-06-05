<section>
    <form
        id="search-places-form"
        action=""
    >
        @include('components/google-places', ['parent_form_id' => 'search-places-form'])
        <select
            data-component="FormItem"
            name="radius"
            class="form-control"
        >
            <option value="">Choose radius</option>
            <option value="1">1 Mile</option>
            <option value="5">5 Miles</option>
            <option value="10">10 Miles</option>
            <option value="20">20 Miles</option>
        </select>

        <button type="submit" class="btn btn-primary">Search</button>
    </form>
</section>