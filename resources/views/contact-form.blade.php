<!-- resources/views/contact_form.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Contact Us</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::open(['route' => 'contactform.submit']) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', old('name'), ['class' => 'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('surname', 'Surname') !!}
        {!! Form::text('surname', old('surname'), ['class' => 'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('phone_number', 'Phone Number') !!}
        {!! Form::text('phone_number', old('phone_number'), ['class' => 'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email') !!}
        {!! Form::email('email', old('email'), ['class' => 'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('user_message', 'Message') !!}
        {!! Form::textarea('user_message', old('user_message'), ['class' => 'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::checkbox('checkbox1', 1, old('checkbox1'), ['required']) !!}
        <span>Wyrażam zgodę na przetwarzanie moich danych osobowych<br>
            Zgodnie z art.6 ust.1 lit. a ogólnego rozporządzenia o ochronie danych osobowych z dnia 27 kwietnia 2016 r. wyrażam zgodę na<br>
            Przetwarzanie moich danych osobowych w celach marketingowych.</span>
        {!! Form::label('checkbox1', 'Checkbox 1') !!}
    </div>

    <div class="form-group">
        {!! Form::checkbox('checkbox2', 1, old('checkbox2'), ['required']) !!}
        <span>Wyrażam zgodę na przesyłanie informacji handlowej Wyrażam zgodę na przesyłanie informacji handlowej na mój adres e-mail.</span>
        {!! Form::label('checkbox2', 'Checkbox 2') !!}
    </div>

    {!! Form::recaptcha() !!}

    {!! Form::submit('Wysyłać ', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
