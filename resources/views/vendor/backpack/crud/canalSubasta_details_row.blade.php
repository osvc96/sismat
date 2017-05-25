<div class="m-t-10 m-b-10 p-l-10 p-r-10 p-t-10 p-b-10">
    <h4>Detalles del canal</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Destino</th>
                <th>Propietario</th>
                <th>Lugar</th>
            </tr>
        </thead>
        <tbody>
                <td>{{$destino->nombre}}</td>
                <td>{{$destino->propietario}}</td>
                <td>{{$destino->direccion}}</td>
        </tbody>
    </table>
    <h4>Detalles de ingreso del canal</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th># de guia</th>
                <th>Codigo</th>
                <th>Propietario Ingreso</th>
                <th>Destinos</th>
                <th>Observaciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$values->guia}}</td>
                <td>{{$codigo}}</td>
                <td>{{$values->propietario}}</td>
                <td>{{$values->destinos}}</td>
                <td>{{$values->observaciones}}</td>
            </tr>
        </tbody>
    </table>
</div>
<div class="clearfix"></div>