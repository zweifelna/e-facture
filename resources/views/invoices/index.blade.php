@extends('layouts.panel')


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
                                <th>Client</th>
                                <th>Date limite</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($invoices as $invoice) {
                                    ?>
                                        <tr>
                                            <td>{{$invoice->name}}</td>
                                            <td>{{$invoice->limitDate}}</td>
                                            <td>{{$invoice->description}}</td>
                                            <td>
                                                <a href="{{ url('/invoices/'.$invoice->id) }}"><i class="fa fa-search fa-lg blackText"></i></a>
                                                <a href="{{ url('/invoices/edit/'.$invoice->id) }}"><i class="fa fa-edit fa-lg blackText"></i></a>
                                                <a href="{{ url('/invoices/destroy/'.$invoice->id) }}" onclick="return confirm('Souhaitez-vous vraiment supprimer ce client ?')"><i class="fa fa-times-circle fa-lg blackText"></i></a>
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
