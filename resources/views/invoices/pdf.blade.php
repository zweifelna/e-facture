<style>
    #background{
        background-image: url("{{asset('images/background.jpg')}}");
        background-color: indianred;
        width: 800px;
        height: 800px;
        position: relative;
        margin-top: 100px;
    }
    #nameZone{
        position: absolute;
        top: 350px;
        left: 425px;
        text-align: -webkit-center;
    }

    #dateZone{
        position: absolute;
        top: 400px;
        left: 425px;
        text-align: -webkit-center;
    }

    img{
      display: inline;
      position: relative;
    }

    #logoTitle{
      display: inline;
      position: relative;
    }

</style>
</head>

<body>
<div id="invoiceNbr">
<h3 id="logoTitle">Facture No {{$invoice->id}}</h3>
</div>
<div class="col-md-8">
    <table id="invoice_table" class="display table table-striped table-bordered" style="width:100%">
        <thead>
            <th scope="col">Désignation</th>
            <th scope="col">Nombre d'heures</th>
            <th scope="col">Tarif horaire</th>
            <th scope="col">Montant HT</th>
            <th scope="col">TVA</th>
            <th scope="col">Montant TVA</th>
            <th scope="col">Montant TTC</th>
            <th scope="col"></th>
        </thead>
        <tbody>
            <tr>
                <td>{{$service->description}}</td>
                <td>{{$service->hourNumber}}</td>
                <td>{{$service->hourlyRate}}</td>
                <td>{{$service->HTAmount}}</td>
                <td>{{$service->TVA}}%</td>
                <td>{{$service->TVAAmount}}</td>
                <td>{{$service->TTCAmount}}</td>
            </tr>
        </tbody>
    </table>

    
</div>
</body>

</html>
