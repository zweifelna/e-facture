@extends('layouts.panel')


@section('content')
<div class="container">
    <div class="row justify-content-center center">
        <div class="col-md-8">
            <h2>Gestion des clients</h2>
            <br>
        </div>
    </div>
    <div class="row justify-content-center">
            <div class="col-md-8">
                <table id="customer_table" class="display table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Société</th>
                                <th>Tél</th>
                                <th>Mail</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($customers as $customer) {
                                    ?>
                                        <tr>
                                            <td>{{$customer->name}}</td>
                                            <td>{{$customer->firstName}}</td>
                                            <td>{{$customer->company}}</td>
                                            <td>{{$customer->phone}}</td>
                                            <td>{{$customer->email}}</td>
                                            <td>
                                                <a data-toggle="modal" data-target="#myModal{{$customer->id}}"><i class="fa fa-search fa-lg blackText"></i></a>
                                                <a href="{{ url('/customers/edit/'.$customer->id) }}"><i class="fa fa-edit fa-lg blackText"></i></a>
                                                <a href="{{ url('/customers/destroy/'.$customer->id) }}" onclick="return confirm('Souhaitez-vous vraiment supprimer cette facture ?')"><i class="fa fa-times-circle fa-lg blackText"></i></a>
                                            </td>
                                        </tr>

                                        <!-- Modal -->
                                        <div id="myModal{{$customer->id}}" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                            
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h4 class="modal-title">Détails du client</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h5>Numéro :</h5>
                                                        <p>{{$customer->id}}</p>
                                                        <h5>Nom :</h5>
                                                        <p>{{$customer->name}}</p>
                                                        <h5>Prénom :</h5>
                                                        <p>{{$customer->firstName}}</p>
                                                        <h5>Société :</h5>
                                                        <p>{{$customer->company}}</p>
                                                        <h5>Adresse :</h5>
                                                        <p>{{$customer->address.', '.$customer->postalCode.' '.$customer->city}}</p>
                                                        <h5>Email :</h5>
                                                        <p>{{$customer->email}}</p>
                                                        <h5>Téléphone :</h5>
                                                        <p>{{$customer->phone}}</p>
                                                        <h5>Mobile :</h5>
                                                        <p>{{$customer->mobilePhone}}</p>
                                                        <h5>Fax :</h5>
                                                        <p>{{$customer->fax}}</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                                    </div>
                                                </div>
                                            
                                                </div>
                                            </div>
                                        
                                    <?php
                                }
                                ?>
                        </tbody>
                </table>
            </div>
        </div>
</div>


@endsection
