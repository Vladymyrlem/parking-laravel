<form action="{{ route('header.store') }}" method="POST">
    @csrf
    @method('POST')
    <div id="repeater-container">
        <div class="repeater-head-set">
            <input type="text" name="title[]" placeholder="Section Title">
            <input type="text" name="subtitles[]" placeholder="Subtitle">
            <button type="button" class="remove-head-set-btn">Remove Set</button>
        </div>
    </div>
    <button type="button" id="add-set-btn">Add head title</button>
    <button type="submit">Submit Form</button>
</form>
<!-- resources/views/form_entries/create.blade.php -->
<!-- ... (previous code) ... -->

