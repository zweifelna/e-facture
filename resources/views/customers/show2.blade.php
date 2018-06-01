@extends('layouts.panel')

@section('menu')
<div class="menu-list">
    <ul id="menu-content" class="menu-content collapse out">
        <li data-toggle="collapse" data-target="#customers" class="collapsed active">
        <i class="fa fa-address-book fa-lg fa-panel"></i>  Clients <span class="arrow"></span>
        </li>
        <ul class="sub-menu collapse" id="customers">
                <li class="active"><a href="{{ url('/customers') }}">Liste des clients</a></li>
                <li><a href="{{ url('/customers/create') }}">Ajouter un client</a></li>
            </ul>
        <li data-toggle="collapse" data-target="#invoices" class="collapsed">
            <i class="fa fa-calculator fa-lg fa-panel"></i>  Factures <span class="arrow"></span>
        </li>
        <ul class="sub-menu collapse" id="invoices">
            <li class=""><a href="{{ url('/invoices') }}">Liste des factures</a></li>
            <li><a href="{{ url('/invoices/create') }}">Ajouter une facture</a></li>
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
            <h2>Gestion des clients</h2>
            <br>
        </div>
    </div>
    <div class="row justify-content-center">
            <div class="col-md-8">
                <table id="table_id" class="display">
                        <thead>
                            <tr>
                                <th>Numéro</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Société</th>
                                <th>Adresse</th>
                                <th>Tél</th>
                                <th>Fax</th>
                                <th>Mobile</th>
                                <th>Mail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($customers as $customer) {
                                    ?>
                                    <tr>
                                        <td>{{$customer->id}}</td>
                                        <td>{{$customer->name}}</td>
                                        <td>{{$customer->firstName}}</td>
                                        <td>{{$customer->company}}</td>
                                        <td>{{$customer->address}}</td>
                                        <td>{{$customer->phone}}</td>
                                        <td>{{$customer->fax}}</td>
                                        <td>{{$customer->mobilePhone}}</td>
                                        <td>{{$customer->email}}</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                        </tbody>
                </table>
            </div>
        </div>
</div>


@endsection
