@extends('layouts.panel')


@section('content')
<div class="container">
    <div class="row justify-content-center center">
        <div class="col-md-8">
            <h2>Facture n°{{$id}}</h2>
            <br>
        </div>
    </div>
    <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table" style="width:100%">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">N°</th>
                                <th scope="col">Client</th>
                                <th scope="col">Date limite</th>
                                <th scope="col">Status</th>
                                <th scope="col">Date de création</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($invoices as $invoice) {
                                    ?>
                                        <tr>
                                            <td>{{$invoice->id}}</td>
                                            <td>{{$invoice->name}}</td>
                                            <td>{{$invoice->limitDate}}</td>
                                            <td>{{$invoice->description}}</td>
                                            <td>{{$invoice->created_at}}</td>
                                            
                                        </tr>
                        </tbody>
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Total HT</th>
                                <th scope="col">Total TVA</th>
                                <th scope="col">Total TTC</th>
                                <th scope="col"></th>
                                
                            </tr>
                        </thead>
                        <tbody>
                                        <tr>
                                            <td></td>
                                            <td>{{$invoice->HTAmount}}</td>
                                            <td>{{$invoice->TVA}}</td>
                                            <td>{{$invoice->TTCAmount}}</td>
                                            
                                        </tr>
                                             
                                       
                                    <?php
                                }
                                ?>
                        </tbody>
                </table>
            </div>
    </div>
    <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="justify-content-center center">Liste des Services</h2>
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
                <table class="table">
                    <thead class="thead-dark">
                            <tr>
                                <th scope="col">Ajout d'un service</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                </table>
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

