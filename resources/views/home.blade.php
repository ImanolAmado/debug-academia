@extends('layouts.debugAcademia')
@section('tituloWeb', 'Home')
@section('enlaceCSS')
    <link rel="stylesheet" href="{{ asset('css/estiloGeneral.css') }}">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
@endsection
@section('contenido')
<div class="container flex flex-col">
    <div class="row mt-3">  
        <div class="col-sm-12">
           <?php $fecha = date ('d-m-Y'); ?>
            <h3>Estadísticas: {{$fecha}} </h3>
        </div>
    </div> 
    <div class="row mt-5">  
        <div class="col-sm-12">    
            <h5>Preguntas más acertadas</h5>
        </div>
    </div>

    <!-- TABLA 1 -->    
    <div class="container mt-2">
        <div class="card"> 
        <div class="card-body">
        <table id="miTabla" class="table table-bordered table-striped">
            <thead>
              <tr>               
                <th scope="col">Id</th>
                <th scope="col">Pregunta</th>
                <th scope="col">Categoría</th>
                <th scope="col">Intentos</th>
                <th scope="col">Aciertos</th>
                <th scope="col">Porcentaje</th>
              </tr>
            </thead>
            <tbody>
              <tr>               
                <td></td>
                <td></td>
                <td class="text-center"></td>
              </tr>             
            </tbody>
        </table>
        </div>
        </div>
    </div>   
    <div class="row mt-5">  
        <div class="col-sm-12">    
            <h5>Preguntas más acertadas</h5>
        </div>
    </div>

    <!-- TABLA 2 -->    
    <div class="container mt-2">
        <div class="card"> 
        <div class="card-body">
        <table id="miTabla2" class="table table-bordered table-striped">
            <thead>
              <tr>               
                <th scope="col">Fecha</th>              
                <th scope="col">Número partidas</th>               
              </tr>
            </thead>
            <tbody>
              <tr>               
                <td></td>
                <td></td>             
              </tr>             
            </tbody>
        </table>
        </div>
        </div>
    </div>           
</div> 

<!-- GRÁFICA 1 -->

<div class="row mt-5">  
    <div class="col-sm-12">    
        <h5>Número partidas por día</h5>
    </div>
</div>
<div class="row">
    <div class="col sm-12">
    <div id="container1"></div>
    </div>
</div>


<!-- GRÁFICA 2 -->

<div class="row mt-5">  
    <div class="col-sm-12">    
        <h5>Número aciertos por día</h5>
    </div>
</div>
<div class="row">
    <div class="col sm-12">
    <div id="container2"></div>
    </div>
</div>



@endsection
@section('scripts') 
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    // Tabla 1
    $(document).ready(function () {
        $('#miTabla').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('stats.aciertos')}}",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'pregunta', name: 'pregunta' },
                { data: 'categoria', name: "categoria" },
                { data: 'intentos', name: 'intentos'},
                { data: 'aciertos', name:'aciertos' },
                { data: 'porcentaje', name:'porcentaje' }
            ]
        });
    });    

    // Tabla 2
    $(document).ready(function () {
        $('#miTabla2').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('stats.diaMasJugado')}}",
            columns: [
                { data: 'fecha', name: 'fecha' },
                { data: 'num', name: 'num' },               
            ]
        });
    });    




// Gráfica 1
$.get("{{ route('stats.partidasDia') }}", function(data) {
    let partidasData = data; 

let fechas = [];
let numPartidas = [];

// Cogemos los datos del controlador y separamos en dos arrays
// para pasárselos a la gráfica.

for(let i=0; i<partidasData.length; i++){
    fechas.push(partidasData[i].fecha);
    numPartidas.push(partidasData[i].num);
}

Highcharts.chart('container1', {
    title: {
        text: 'Número de partidas por día'
    },
    xAxis: {
        categories: fechas, 
        title: {
            text: 'Fecha'
        }
    },
    yAxis: {
        title: {
            text: 'Número de partidas'
        }
    },
    series: [{
        name: 'Partidas',
        data: numPartidas 
    }]
});
});


// Gráfica 2
$.get("{{ route('stats.aciertosDia') }}", function(aciertos) {
    let partidasData = aciertos; 

let fechas = [];
let numAciertos = [];

// Cogemos los datos del controlador y separamos en dos arrays
// para pasárselos a la gráfica.

for(let i=0; i<partidasData.length; i++){
    fechas.push(partidasData[i].fecha);
    numAciertos.push(partidasData[i].total);
}

Highcharts.chart('container2', {
    title: {
        text: 'Número de Aciertos por día'
    },
    xAxis: {
        categories: fechas, 
        title: {
            text: 'Fecha'
        }
    },
    yAxis: {
        title: {
            text: 'Número de aciertos'
        }
    },
    series: [{
        name: 'Aciertos',
        data: numAciertos 
    }]
});
});
 
</script>
@endsection
