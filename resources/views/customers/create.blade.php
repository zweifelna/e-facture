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
                    <p>{{ Form::label('name', 'Nom', ['class' => 'blackText']) }}</p>
                    <p>{{ Form::text('name', '', ['class' => 'blackText, form-control']) }}</p>
                    <p>{{ Form::label('firstName', 'Prénom', ['class' => 'blackText']) }}</p>
                    <p>{{ Form::text('firstName', '', ['class' => 'blackText, form-control']) }}</p>
                    <p>{{ Form::label('company', 'Société', ['class' => 'blackText']) }}</p>
                    <p>{{ Form::text('company', '', ['class' => 'blackText, form-control']) }}</p>
                    <p>{{ Form::label('address', 'Adresse', ['class' => 'blackText']) }}</p>
                    <p>{{ Form::text('address', '', ['class' => 'blackText, form-control']) }}</p>
                    <p>{{ Form::label('city', 'Ville', ['class' => 'blackText']) }}</p>
                    <p>{{ Form::text('city', '', ['class' => 'blackText, form-control']) }}</p>
                    <p>{{ Form::label('postalCode', 'Code postal', ['class' => 'blackText']) }}</p>
                    <p>{{ Form::number('postalCode', '', ['class' => 'blackText, form-control']) }}</p>
                    <p>{{ Form::label('email', 'Adresse Email', ['class' => 'blackText']) }}</p>
                    <p>{{ Form::text('email', '', ['class' => 'blackText, form-control']) }}</p>
                    <p>{{ Form::label('phone', 'Téléphone', ['class' => 'blackText']) }}</p>
                    <p>{{ Form::number('phone', '', ['class' => 'blackText, form-control']) }}</p>
                    <p>{{ Form::label('mobilePhone', 'Mobile', ['class' => 'blackText']) }}</p>
                    <p>{{ Form::number('mobilePhone', '', ['class' => 'blackText, form-control']) }}</p>
                    <p>{{ Form::label('fax', 'Fax', ['class' => 'blackText']) }}</p>
                    <p>{{ Form::number('fax', '', ['class' => 'blackText, form-control']) }}</p>
                    <p>{{ Form::label('category', 'Catégorie', ['class' => 'blackText']) }}</p>
                    <p>{{ Form::select('category_id', $categories, null, array('class'=>'form-control')) }}</p>
                    <p>{{Form::submit('Ajouter', ['class' => 'btn btn-primary'])}}</p>


                    {!! Form::close() !!}
                    </div>
            </div>
        </div>
</div>


@endsection
