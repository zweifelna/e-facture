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
