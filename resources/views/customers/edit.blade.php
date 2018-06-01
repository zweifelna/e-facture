@extends('layouts.panel')

@section('menu')
<div class="menu-list">
    <ul id="menu-content" class="menu-content collapse out">
        <li data-toggle="collapse" data-target="#customers" class="collapsed active">
        <i class="fa fa-address-book fa-lg fa-panel"></i>  Clients <span class="arrow"></span>
        </li>
        <ul class="sub-menu collapse" id="customers">
                <li><a href="{{ url('/customers') }}">Liste des clients</a></li>
                <li><a href="{{ url('/customers/create') }}">Ajouter un client</a></li>
            </ul>
        <li data-toggle="collapse" data-target="#invoices" class="collapsed">
            <i class="fa fa-calculator fa-lg fa-panel"></i>  Factures <span class="arrow"></span>
        </li>
        <ul class="sub-menu collapse" id="invoices">
            <li class=""><a href="{{ url('/invoices') }}">Liste des factures</a></li>
            <li><a href="{{ url('/invoices/create') }}">Ajouter une facture</a></li>
            <li><a href="{{ url('/generate') }}">Générer un pdf</a></li>
            
        </ul>
        
    <div class="signout">
        <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out fa-lg fa-panel"></i> Déconnexion
            </a> 
        </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
    </ul>
</div>
</div>
@endsection

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
