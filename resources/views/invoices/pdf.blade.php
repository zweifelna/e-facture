<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Facture</title>
  <style>
    body{
        font-family: Calibri;
    }

    #background{
        background-image: url("{{asset('images/bulletin.png')}}");
        background-color: indianred;
        width: 1000px;
        height: 505px;
        position: relative;
        margin-top: 100px;
    }

    #destName1{
        position: absolute;
        top: 30px;
        left: 20px;
    }

    #destAddress1{
        position: absolute;
        top: 60px;
        left: 20px;
    }

    #destName2{
        position: absolute;
        top: 30px;
        left: 310px;
    }

    #destAddress2{
        position: absolute;
        top: 60px;
        left: 310px;
    }

    #TTCAmount1{
        position: absolute;
        top: 228px;
        left: 120px;
    }

    #TTCAmount2{
        position: absolute;
        top: 228px;
        left: 420px;
    }

    #custName{
        position: absolute;
        top: 230px;
        left: 720px;
    }

    #custAddress{
        position: absolute;
        top: 250px;
        left: 720px;
    }

    #custAddress2{
        position: absolute;
        top: 270px;
        left: 720px;
    }

    #logoTitle{
      display: inline;
      position: relative;
    }
    table, tr, th, td{
      border-collapse: collapse;
      border: 1px solid black;
      width:100%
    }

    .totalTable{
        border: 1px solid white;
    }

    #title{
      margin-bottom: 20px;
    }

    #firstPage{
        page-break-after :always;
    }

</style>
</head>

<body>
    <div id="invoiceNbr">
        <h3 id="title">Facture No {{$invoice->id}}</h3>
    </div>
    <div>
        <h4>Date de création : {{$invoice->created_at}}</h5>
        <h4> Date limite de validité : {{$invoice->limitDate}}</h5>
    </div>
    <div>
        <h4>Vendeur</h4>
        <p>ETML</p>
        <p>Rue de Sébeillon 12</p>
        <p>1004 Lausanne</p>
    </div>
    <div>
            <h4>Acheteur</h4>
            <?php
                foreach($customers as $customer)
                    {
            ?>
                        <p>{{$customer->name.' '.$customer->firstName}}</p>
                        <p>{{$customer->address}}</p>
                        <p>{{$customer->postalCode.' '.$customer->city}}</p>
            <?php
                    }

            ?>
            
        </div>
    <div id="firstPage">
        <table>
            <thead>
                <th>Désignation</th>
                <th>Nombre d'heures</th>
                <th>Tarif horaire</th>
                <th>Montant HT</th>
                <th>TVA</th>
                <th>Montant TVA</th>
                <th>Montant TTC</th>
            </thead>
            <tbody>
                <?php foreach($services as $service)
                { ?>
                <tr>
                    <td>{{$service->description}}</td>
                    <td>{{$service->hourNumber}}</td>
                    <td>{{$service->hourlyRate}}</td>
                    <td>{{$service->HTAmount}}</td>
                    <td>{{$service->TVA}}%</td>
                    <td>{{$service->TVAAmount}}</td>
                    <td>{{$service->TTCAmount}}</td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <table>
            <tr class="totalTable">
                <th class="totalTable">Total HT</th>
                <td class="totalTable"></td>
                <td class="totalTable">{{$invoice->HTAmount}}</td>
            </tr>
            <tr class="totalTable">
                <th class="totalTable">Montant TVA</th>
                <td class="totalTable"></td>
                <td class="totalTable">{{$invoice->TVA}}</td>
            </tr>
            <tr>
                <th class="totalTable">Total TTC</th>
                <td class="totalTable"></td>
                <td class="totalTable">{{$invoice->TTCAmount}}</td>
            </tr>
        </table>
    </div>
    <div id="background">
        <p id="destName1">ETML</p>
        <p id="destAddress1">Rue de Sébeillon 12 - 1004 Lausanne</p>
        <p id="destName2">ETML</p>
        <p id="destAddress2">Rue de Sébeillon 12 - 1004 Lausanne</p>

        <p id="TTCAmount1">{{$invoice->TTCAmount}}</p>
        <p id="TTCAmount2">{{$invoice->TTCAmount}}</p>

        <p id="custName">
            <?php
                foreach($customers as $customer)
                {
                    echo $customer->name.' '.$customer->firstName;
                }
        ?>
        </p>
        <p id="custAddress">
            <?php
                foreach($customers as $customer)
                {
                    echo $customer->address;
                }
            ?>
        </p>
        <p id="custAddress2">
            <?php
                foreach($customers as $customer)
                {
                    echo $customer->postalCode.' '.$customer->city;
                }
            ?>
        </p>
    </div>



</body>

</html>
