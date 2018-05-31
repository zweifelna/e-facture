@extends('layouts.panel')


@section('content')
<div class="container">
    <div class="row justify-content-center center">
        <div class="col-md-8">
            <h2>Modifier un client</h2>
            <br>
        </div>
    </div>
    <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="form-group">
                    {!! Form::model($customer, ['url' => '/customers/update']) !!}
                        <p>{{ Form::hidden('id', $customer->id, ['class' => 'blackText, form-control']) }}</p>
                        <p>{{ Form::label('name', 'Nom', ['class' => 'blackText']) }}</p>
                        <p>{{ Form::text('name', $customer->name, ['class' => 'blackText, form-control']) }}</p>
                        <p>{{ Form::label('firstName', 'Prénom', ['class' => 'blackText']) }}</p>
                        <p>{{ Form::text('firstName', $customer->firstName, ['class' => 'blackText, form-control']) }}</p>
                        <p>{{ Form::label('company', 'Société', ['class' => 'blackText']) }}</p>
                        <p>{{ Form::text('company', $customer->company, ['class' => 'blackText, form-control']) }}</p>
                        <p>{{ Form::label('address', 'Adresse', ['class' => 'blackText']) }}</p>
                        <p>{{ Form::text('address', $customer->address, ['class' => 'blackText, form-control']) }} </p>
                        <p>{{ Form::label('city', 'Ville', ['class' => 'blackText']) }}</p>
                        <p>{{ Form::text('city', $customer->city, ['class' => 'blackText, form-control']) }}</p>
                        <p>{{ Form::label('postalCode', 'Code postal', ['class' => 'blackText']) }}</p>
                        <p>{{ Form::number('postalCode', $customer->postalCode, ['class' => 'blackText, form-control']) }}</p>
                        <p>{{ Form::label('email', 'Adresse Email', ['class' => 'blackText']) }}</p>
                        <p>{{ Form::text('email', $customer->email, ['class' => 'blackText, form-control']) }}</p>
                        <p>{{ Form::label('phone', 'Téléphone', ['class' => 'blackText']) }}</p>
                        <p>{{ Form::number('phone', $customer->phone, ['class' => 'blackText, form-control']) }}</p>
                        <p>{{ Form::label('mobilePhone', 'Mobile', ['class' => 'blackText']) }}</p>
                        <p>{{ Form::number('mobilePhone', $customer->mobilePhone, ['class' => 'blackText, form-control']) }}</p>
                        <p>{{ Form::label('fax', 'Fax', ['class' => 'blackText']) }}</p>
                        <p>{{ Form::number('fax', $customer->fax, ['class' => 'blackText, form-control']) }}</p>
                        <p>{{ Form::label('category', 'Catégorie', ['class' => 'blackText']) }}</p>
                        <p>{{ Form::select('category_id', $categories, $customer->category_id, array('class'=>'form-control')) }}</p>
                        <p>{{Form::submit('Modifier', ['class' => 'btn btn-primary'])}}</p>


                    {!! Form::close() !!}
                    </div>
            </div>
        </div>
</div>


@endsection
