@extends('layouts.panel')


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
                            <p>{{Form::submit('Ajouter', ['class' => 'btn btn-primary'])}}</p>
                        {!! Form::close() !!}
                    </div>
            </div>
        </div>
</div>


@endsection
