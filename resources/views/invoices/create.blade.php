@extends('layouts.panel')

@section('menu')
<div class="menu-list">
    <ul id="menu-content" class="menu-content collapse out">
        <li data-toggle="collapse" data-target="#customers" class="collapsed">
        <i class="fa fa-address-book fa-lg fa-panel"></i>  Clients <span class="arrow"></span>
        </li>
        <ul class="sub-menu collapse" id="customers">
                <li><a href="{{ url('/customers') }}">Liste des clients</a></li>
                <li><a href="{{ url('/customers/create') }}">Ajouter un client</a></li>
            </ul>
        <li data-toggle="collapse" data-target="#invoices" class="collapsed active">
            <i class="fa fa-calculator fa-lg fa-panel"></i>  Factures <span class="arrow"></span>
        </li>
        <ul class="sub-menu collapse" id="invoices">
            <li><a href="{{ url('/invoices') }}">Liste des factures</a></li>
            <li class="active"><a href="{{ url('/invoices/create') }}">Ajouter une facture</a></li>
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
            <h2>Ajout d'une facture</h2>
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
                    {!! Form::open(['url' => '/invoices/store']) !!}
                        <p>{{ Form::label('limitDate', 'Date limite', ['class' => 'blackText']) }}</p>
                        <p>{{ Form::date('limitDate', '', ['class' => 'blackText, form-control']) }}</p>
                        <p>{{ Form::label('HTAmount', 'Montant HT', ['class' => 'blackText']) }}</p>
                        <p>{{ Form::text('HTAmount', '0.00', ['class' => 'blackText, form-control']) }}</p>
                        <p>{{ Form::label('TTCAmount', 'Montant TTC', ['class' => 'blackText']) }}</p>
                        <p>{{ Form::text('TTCAmount', '0.00', ['class' => 'blackText, form-control']) }}</p>
                        <p>{{ Form::label('TVA', 'TVA', ['class' => 'blackText']) }}</p>
                        <p>{{ Form::text('TVA', '0.00', ['class' => 'blackText, form-control']) }}</p>
                        <p>{{ Form::label('customer_id', 'Client', ['class' => 'blackText']) }}</p>
                        <p>{{ Form::select('customer_id', $customers, null, array('class'=>'form-control')) }}</p>
                        <p>{{ Form::label('status_id', 'Status', ['class' => 'blackText']) }}</p>
                        <p>{{ Form::select('status_id', $statuses, null, array('class'=>'form-control')) }}</p>
                        <p>{{Form::submit('Ajouter', ['class' => 'btn btn-primary'])}}</p>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
</div>


@endsection
