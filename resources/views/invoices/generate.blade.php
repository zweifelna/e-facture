@extends('layouts.panel')


@section('content')
<div class="container">
    <div class="row justify-content-center center">
        <div class="col-md-8">
            <h2>Génération de la facture en PDF</h2>
            <br>
        </div>
    </div>
    <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="form-group">
                        {!! Form::open(['url' => '/generate']) !!}
                            <p>{{ Form::label('id', 'Numéro de la facture', ['class' => 'blackText']) }}</p>
                            <p>{{ Form::select('id', $invoices, null, array('class'=>'form-control')) }}</p>
                            <p>{{Form::submit('Générer le pdf', ['class' => 'btn btn-primary'])}}</p>
                        {!! Form::close() !!}
                    </div>
            </div>
        </div>
</div>


@endsection
