@extends('layouts.panel')

@section('menu')
<div class="menu-list">
    <ul id="menu-content" class="menu-content collapse out">
        <li data-toggle="collapse" data-target="#customers" class="collapsed">
        <i class="fa fa-address-book fa-lg fa-panel"></i>  Clients <span class="arrow"></span>
        </li>
        <li>
            <ul class="sub-menu collapse" id="customers">
                <li><a href="{{ url('/customers') }}">Liste des clients</a></li>
                <li><a href="{{ url('/customers/create') }}">Ajouter un client</a></li>
            </ul>
        </li>
        <li data-toggle="collapse" data-target="#invoices" class="collapsed active">
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
            <h2>Modifier une facture</h2>
            <br>
        </div>
    </div>
    <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="form-group">
                            {!! Form::open(['url' => '/invoices/update']) !!}
                            <p>{{ Form::hidden('id', $invoice->id, ['class' => 'blackText, form-control']) }}</p>
                            <p>{{ Form::label('limitDate', 'Date limite', ['class' => 'blackText']) }}</p>
                            <p>{{ Form::date('limitDate', $invoice->limitDate, ['class' => 'blackText, form-control']) }}</p>
                            <p>{{ Form::label('HTAmount', 'Montant HT', ['class' => 'blackText']) }}</p>
                            <p>{{ Form::text('HTAmount', $invoice->HTAmount, ['class' => 'blackText, form-control']) }}</p>
                            <p>{{ Form::label('TTCAmount', 'Montant TTC', ['class' => 'blackText']) }}</p>
                            <p>{{ Form::text('TTCAmount', $invoice->TTCAmount, ['class' => 'blackText, form-control']) }}</p>
                            <p>{{ Form::label('TVA', 'TVA', ['class' => 'blackText']) }}</p>
                            <p>{{ Form::text('TVA', $invoice->TVA, ['class' => 'blackText, form-control']) }}</p>
                            <p>{{ Form::label('customer_id', 'Client', ['class' => 'blackText']) }}</p>
                            <p>{{ Form::select('customer_id', $customers, $invoice->customer_id, array('class'=>'form-control')) }}</p>
                            <p>{{ Form::label('status_id', 'Status', ['class' => 'blackText']) }}</p>
                            <p>{{ Form::select('status_id', $statuses, $invoice->status_id, array('class'=>'form-control')) }}</p>
                            <p>{{Form::submit('Modifier', ['class' => 'btn btn-primary'])}}</p>
                        {!! Form::close() !!}
                    </div>
            </div>
        </div>
</div>


@endsection
