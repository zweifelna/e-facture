@extends('layouts.panel')


@section('content')
<div class="container">
    <div class="row justify-content-center center">
        <div class="col-md-8">
            <h2>Ajout d'un client</h2>
            <br>
        </div>
    </div>
    <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="form-group">
                    {!! Form::open(['url' => '/customers/store']) !!}
                        {{ Form::label('name', 'Nom', ['class' => 'blackText']) }}
                        <br>
                        {{ Form::text('name', '', ['class' => 'blackText, form-control']) }}
                        <br>
                        {{ Form::label('firstName', 'Prénom', ['class' => 'blackText']) }}
                        <br>
                        {{ Form::text('firstName', '', ['class' => 'blackText, form-control']) }}
                        <br>
                        {{ Form::label('company', 'Société', ['class' => 'blackText']) }}
                        <br>
                        {{ Form::text('company', '', ['class' => 'blackText, form-control']) }}
                        <br>
                        {{ Form::label('address', 'Adresse', ['class' => 'blackText']) }}
                        <br>
                        {{ Form::text('address', '', ['class' => 'blackText, form-control']) }}
                        <br> 
                        {{ Form::label('city', 'Ville', ['class' => 'blackText']) }}
                        <br>
                        {{ Form::text('city', '', ['class' => 'blackText, form-control']) }}
                        <br>
                        {{ Form::label('postalCode', 'Code postal', ['class' => 'blackText']) }}
                        <br>
                        {{ Form::number('postalCode', '', ['class' => 'blackText, form-control']) }}
                        <br>
                        {{ Form::label('email', 'Adresse Email', ['class' => 'blackText']) }}
                        <br>
                        {{ Form::text('email', '', ['class' => 'blackText, form-control']) }}
                        <br>
                        {{ Form::label('phone', 'Téléphone', ['class' => 'blackText']) }}
                        <br>
                        {{ Form::number('phone', '', ['class' => 'blackText, form-control']) }}
                        <br>
                        {{ Form::label('mobilePhone', 'Mobile', ['class' => 'blackText']) }}
                        <br>
                        {{ Form::number('mobilePhone', '', ['class' => 'blackText, form-control']) }}
                        <br>
                        {{ Form::label('fax', 'Fax', ['class' => 'blackText']) }}
                        <br>
                        {{ Form::number('fax', '', ['class' => 'blackText, form-control']) }}
                        <br>
                        {{ Form::label('category', 'Catégorie', ['class' => 'blackText']) }}
                        <br>
                        {{ Form::text('category', '', ['class' => 'blackText, form-control']) }}
                        <br>
                        {{Form::submit('Ajouter', ['class' => 'btn btn-primary'])}}


                    {!! Form::close() !!}
                    </div>
            </div>
        </div>
</div>


@endsection
