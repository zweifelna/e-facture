@extends('layouts.panel')


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
