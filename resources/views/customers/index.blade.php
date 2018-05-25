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
                                                <a href=""><i class="fa fa-search fa-lg blackText"></i></a>
                                                <a href="{{ url('/invoices/'.$customer->id) }}"><i class="fa fa-edit fa-lg blackText"></i></a>
                                                <a href="{{ url('/invoices/destroy/'.$customer->id) }}" onclick="return confirm('Souhaitez-vous vraiment supprimer cette facture ?')"><i class="fa fa-times-circle fa-lg blackText"></i></a>
                                            </td>
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
