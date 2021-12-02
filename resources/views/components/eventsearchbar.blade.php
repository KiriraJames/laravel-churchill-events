<div class="mt-3 p-2">

    <div class="d-flex">
        <p>Search for an event</p>
    </div>

    <div class="d-flex justify-content-between">
        <div class="d-flex">
            <form action="{{ route('search.events') }}" method="get">
                <Label for="event_search_bar">Search by name: </Label>
                <input type="text" id="event_search_bar" name="event-name" placeholder="Search for an Event" required >
                <button class="btn btn-success" type="submit">search</button>
            </form>
        </div>
        <div class="d-flex">
            <form action="{{ route('search.events') }}" method="get">
                <label for="date_search_bar">Search by Date: </label>
                <input type="date" id="date_search_bar" name="event-date" required >
                <button class="btn btn-success" type="submit">search</button>
            </form>
        </div>
    </div>

</div>