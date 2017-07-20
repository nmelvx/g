@extends('layouts.default')

@section('content')
    <div class="container mt210">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center">
                <h3 class="title-section">Clienti</h3>
                <div class="separator-line-div"></div>
                <ul class="breadcrumbs">
                    <li><a href="/contul-meu" title="Contul tau">Contul tau</a></li>
                    <li><span>|</span></li>
                    <li>Clienti</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bg-gray mtb100">
                <table id="clients_table" class="display">
                    <thead>
                        <tr>
                            <th>Nr.</th>
                            <th>Nume</th>
                            <th>Adresa</th>
                            <th>Email</th>
                            <th>Telefon</th>
                            <th>Comentarii</th>
                            <th>Numar lucrari</th>
                            <th>Bani generati</th>
                            <th>Review</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($clients as $k => $client)
                        <tr>
                            <td>{{ $k+1 }}</td>
                            <td>{{ $client->firstname.' '.$client->lastname }}</td>
                            <td>{{ $client->address }}</td>
                            <td>{{ $client->email }}</td>
                            <td>{{ $client->phone }}</td>
                            <td>-</td>
                            <td>{{ sizeof($client->jobs or []) }}</td>
                            <td>{{ $client->generatedIncome or '-' }}</td>
                            <td>{{ $client->review or '-' }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('javascripts')

    <script type="text/javascript">

        $(document).ready(function () {
            $('#clients_table').DataTable({
                "language": {
                    "sProcessing":   "Procesează...",
                    "sLengthMenu":   "Afișează _MENU_ înregistrări pe pagină",
                    "sZeroRecords":  "Nu am găsit nimic - ne pare rău",
                    "sInfo":         "Afișate de la _START_ la _END_ din _TOTAL_ înregistrări",
                    "sInfoEmpty":    "Afișate de la 0 la 0 din 0 înregistrări",
                    "sInfoFiltered": "(filtrate dintr-un total de _MAX_ înregistrări)",
                    "sInfoPostFix":  "",
                    "sSearch":       "",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst":    "Prima",
                        "sPrevious": "Precedenta",
                        "sNext":     "Următoarea",
                        "sLast":     "Ultima"
                    }
                }
            });
        });
    </script>

@endsection