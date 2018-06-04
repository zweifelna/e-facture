@extends('layouts.panel')

@section('menu')
<div class="menu-list">
    <ul id="menu-content" class="menu-content collapse out">
        <li data-toggle="collapse" data-target="#customers" class="collapsed active">
        <i class="fa fa-address-book fa-lg fa-panel"></i>  Clients <span class="arrow"></span>
        </li>
        <li>
            <ul class="sub-menu collapse" id="customers">
                <li><a href="{{ url('/customers') }}">Liste des clients</a></li>
                <li class="active"><a href="{{ url('/customers/create') }}">Ajouter un client</a></li>
            </ul>
        </li>
        <li data-toggle="collapse" data-target="#invoices" class="collapsed">
            <i class="fa fa-calculator fa-lg fa-panel"></i>  Factures <span class="arrow"></span>
        </li>
        <li>
            <ul class="sub-menu collapse" id="invoices">
                <li class=""><a href="{{ url('/invoices') }}">Liste des factures</a></li>
                <li><a href="{{ url('/invoices/create') }}">Ajouter une facture</a></li>
                <li><a href="{{ url('/generate') }}">Générer un pdf</a></li>
            </ul>
        </li>
        <li>
            <div class="signout">
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out fa-lg fa-panel"></i> Déconnexion
                </a> 
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                </form>
            </div>
        </li>
        
    </ul>
</div>
</div>
@endsection

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
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
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
                    <p>{{ Form::label('category_id', 'Catégorie', ['class' => 'blackText']) }}</p>
                    <p>{{ Form::select('category_id', $categories, null, array('class'=>'form-control')) }}</p>
                    <p>{{Form::submit('Ajouter', ['class' => 'btn btn-primary'])}}</p>


                    {!! Form::close() !!}
                    </div>
            </div>
        </div>
</div>


@endsection
