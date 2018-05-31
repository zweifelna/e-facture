@extends('layouts.panel')


@section('content')
<div class="container">
    <div class="row justify-content-center center">
        <div class="col-md-8">
            <h2>Facture n°{{$id}}</h2>
            <br>
        </div>
    </div>
    <div class="row justify-content center">
        <?php
            foreach ($invoices as $invoice) {
                ?>
                    <div class="col-md-12">
                        <h4>Client : {{$invoice->name}}</h4>
                        <h4>Date limite : {{$invoice->limitDate}}</h4>
                        <h4>Status : {{$invoice->description}}</h4>
                        <h4>Date de création : {{$invoice->created_at}}</h4>
                        
                    </div>
                    <?php
                     }
                ?>
                
            </div>
            <br>
    <div class="row justify-content center">
            <?php
                foreach ($invoices as $invoice) {
                    ?>
                        <div class="col-md-4">
                            <h3>Total HT : {{$invoice->HTAmount}}</h4>
                            
                        </div>
                        <div class="col-md-4">
                            <h3>Total TVA : {{$invoice->TVA}}</h4>
                        </div>
                        <div class="col-md-4">
                            <h3>Total TTC : {{$invoice->TTCAmount}}</h4>
                        </div>
                        <?php
                         }
                    ?>
                    
    </div>
    <br>



    <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="justify-content-center center">Liste des Services</h2>
                <br>
                <table class="table" style="width:100%">
                        <thead>
                            <th scope="col">Description</th>
                            <th scope="col">Heures</th>
                            <th scope="col">Tarif horaire</th>
                            <th scope="col">Montant HT</th>
                            <th scope="col">TVA</th>
                            <th scope="col">Montant TVA</th>
                            <th scope="col">Montant TTC</th>
                            <th scope="col"></th>
                        </thead>
                        <tbody>
                            <?php
                                foreach($services as $service) { ?>
                            <tr>
                                <td>{{$service->description}}</td>
                                <td>{{$service->hourNumber}}</td>
                                <td>{{$service->hourlyRate}}</td>
                                <td>{{$service->HTAmount}}</td>
                                <td>{{$service->TVA}}</td>
                                <td>{{$service->TVAAmount}}</td>
                                <td>{{$service->TTCAmount}}</td>
                                <td><a href="{{ url('/invoices/services/destroy/'.$service->id) }}" onclick="return confirm('Souhaitez-vous vraiment supprimer ce service ?')"><i class="fa fa-times-circle fa-lg blackText"></i></a></td>
                            </tr>
                                <?php } ?>
                        </tbody>
                    </table>

        </div>
    </div>
    <div class="row justify-content-center">
            <div class="col-md-8">
                    <h2 class="justify-content-center center">Ajout d'un Service</h2>
                    <br>
                {!! Form::open(['url' => 'invoices/'.$id.'/services/store']) !!}
                    {{ Form::hidden('invoice_id', $id) }}
                    <p>{{ Form::label('description', 'Description', ['class' => 'blackText']) }}</p>
                    <p>{{ Form::text('description', '', ['class' => 'blackText, form-control', 'placeholder' => 'Réalisation d\'un site dynamique'])}}</p>
                    <p>{{ Form::label('hourNumber', 'Nombre d\'heures', ['class' => 'blackText']) }}</p>
                    <p>{{ Form::number('hourNumber', '', ['class' => 'blackText, form-control', 'placeholder' => '40'])}}</p>
                    <p>{{ Form::label('hourlyRate', 'Tarif horaire', ['class' => 'blackText']) }}</p>
                    <p>{{ Form::number('hourlyRate', '', ['class' => 'blackText, form-control', 'placeholder' => '60'])}}</p>
                    <p>{{ Form::label('TVA', 'Taux TVA', ['class' => 'blackText']) }}</p>
                    <p>{{ Form::text('TVA', '', ['class' => 'blackText, form-control', 'placeholder' => '0.07'])}}</p>
                    
                    <p>{{Form::submit('Ajouter un service', ['class' => 'btn btn-primary'])}}</p>
                {!! Form::close() !!}
            </div>

    </div>
</div>


@endsection

