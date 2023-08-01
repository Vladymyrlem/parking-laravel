<form action="{{ route('save-reservations') }}" method="post">
    @csrf
    <label for="reservation_date">Select Dates:</label><br>
    <input type="checkbox" name="reservation_dates[]" value="2023-07-11"> July 11, 2023<br>
    <input type="checkbox" name="reservation_dates[]" value="2023-07-12"> July 12, 2023<br>
    <!-- Add more date checkboxes here as needed -->
    <button type="submit">Save Reservations</button>
</form>
