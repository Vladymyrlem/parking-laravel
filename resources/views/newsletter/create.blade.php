@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Subscribe to Our Newsletter</h2>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('newsletter.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label>
                    <input type="checkbox" name="agree" required> I agree to subscribe to the newsletter
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Subscribe</button>
        </form>
    </div>
@endsection
