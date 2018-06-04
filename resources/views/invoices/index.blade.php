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
                <li class="active"><a href="{{ url('/invoices') }}">Liste des factures</a></li>
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
</div>
@endsection

@section('script')
<script>
        $("#invoice_table").DataTable( {

        "responsive": true
        "searching": false

        } );
    });
</script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center center">
        <div class="col-md-8">
            <h2>Gestion des factures</h2>
            <br>
        </div>
    </div>
    <div class="row justify-content-center">
            <div class="col-md-8">
                <table id="invoice_table" class="display table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Date limite</th>
                                <th>Montant TTC</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($invoices as $invoice) {
                                    ?>
                                        <tr>
                                            <td>{{$invoice->id}}</td>
                                            <td>{{$invoice->limitDate}}</td>
                                            <td>{{$invoice->TTCAmount}}</td>
                                            <td>
                                                <a href="{{ url('/invoices/'.$invoice->id) }}"><i class="fa fa-search fa-lg blackText"></i></a>
                                                <a href="{{ url('/invoices/edit/'.$invoice->id) }}"><i class="fa fa-edit fa-lg blackText"></i></a>
                                                <a href="{{ url('/invoices/generate/'.$invoice->id) }}"><i class="fa fa-file fa-lg blackText"></i></a>
                                                <a href="{{ url('/invoices/destroy/'.$invoice->id) }}" onclick="return confirm('Souhaitez-vous vraiment supprimer cette facture ?')"><i class="fa fa-times-circle fa-lg blackText"></i></a>
                                            </td>
                                        </tr>
                                             
                                       
                                    <?php
                                }
                                ?>
                        </tbody>
                </table>

                
        </div>
</div>


@endsection
