@extends('index')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Nuevo </h3>
                </div>
                <form action="" method="POST">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-sm-3">
                                    <label for="menu_nombre">Grupo de edad</label>
                                    <input class="form-control form-control-sm" type="text">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="menu_nombre">Operador</label>
                                    <input class="form-control form-control-sm" type="text">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="menu_nombre">Departamento</label>
                                    <input class="form-control form-control-sm" type="text">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="menu_nombre">Municipio</label>
                                    <input class="form-control form-control-sm" type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">

                            <form action=""></form>
                            <!-- Trigger the modal with a button -->
                            <button type="button" class="btn btn-info" data-toggle="modal"
                                data-target="#myModal">Agregar</button>
                            <input type="hidden" id="ListaPro" name="ListaPro" value="" required />
                            <table id="TablaPro" class="table">
                                <thead>
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Producto</th>
                                        <th>P. Bruto (g)</th>
                                        <th>P. Neto (g)</th>
                                        <th>Calorias</th>
                                        <th>Proteina</th>
                                        <th>Grasas</th>
                                        <th>Cho</th>
                                        <th>Calcio</th>
                                        <th>Hierro</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody id="ProSelected">
                                    <!--Ingreso un id al tbody-->
                                    <tr>

                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>Total</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td><span id="total">0</span> <input class="form-control" type="hidden"
                                                id="total_final" name="total_final" value="0" readonly /></td>
                                        <td>&nbsp;</td>
                                    </tr>
                                </tfoot>
                            </table>
                            <!--Agregue un boton en caso de desear enviar los productos para ser procesados-->
                            <div class="form-group">
                                <button type="submit" id="guardar" name="guardar"
                                    class="btn btn-success btn-sm">Guardar</button>
                            </div>
                </form>
                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Agregar producto a la lista</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Producto</label>

                                    <select class="form-control form-control-sm" id="pro_id" name="pro_id" required>
                                        @foreach($analisis as $producto)
                                        <option data-nombre="{{$producto->nombre}}" value="{{$producto->analisis_id}}">{{$producto->codigo}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <!--Uso la funcion onclick para llamar a la funcion en javascript-->
                                <button type="button" onclick="agregarProducto()" class="btn btn-default"
                                    data-dismiss="modal">Agregar</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- <script src="{{asset('js/analisis/analisis.js')}}"></script> --}}
<script>
    function RefrescaProducto() {
        var ip = [];
        var i = 0;
        $('#guardar').attr('disabled', 'disabled'); //Deshabilito el Boton Guardar
        $('.iProduct').each(function (index, element) {
            i++;
            ip.push({
                id_pro: $(this).val()
            });
        });
        // Si la lista de Productos no es vacia Habilito el Boton Guardar
        if (i > 0) {
            $('#guardar').removeAttr('disabled', 'disabled');
        }
        var ipt = JSON.stringify(ip); //Convierto la Lista de Productos a un JSON para procesarlo en tu controlador
        $('#ListaPro').val(encodeURIComponent(ipt));
    }

    function agregarProducto() {

        var sel = $('#pro_id').find(':selected').val(); //Capturo el Value del Producto
        var text = $('#pro_id').find(':selected').text(); //Capturo el codigo del Producto- Texto dentro del Select
        //Capturar el nombre del producto
        var objeto_producto = $('#pro_id').find(':selected');
        let nombre_producto= objeto_producto[0].dataset.nombre;


        

        var sptext = text.split();

        var newtr = '<tr class="item"  data-id="' + sel + '">';
        newtr = newtr + '<td class="iProduct" >' + text + '</td>';

        newtr = newtr +
        `<td> ${nombre_producto}   </td>`+`
        <td><input class="form-control form-control-sm" type="text" id="bruto[]"     name="lista[]" onChange="Calcular(this);" value="0" </input></td> `+`
        <td><input class="form-control form-control-sm" type="text" id="neto[]"      name="lista[]" onChange="Calcular(this);" value="0" </input></td>`+`
        <td><input class="form-control form-control-sm" type="text" id="calorias[]"  name="lista[]" readonly value="0"  /></td>`+`
        <td><input class="form-control form-control-sm" type="text" id="proteina[]"  name="lista[]" readonly value="0" /></td>`+`
        <td><input class="form-control form-control-sm" type="text" id="grasa[]"     name="lista[]" readonly value="0" /></td>`+`
        <td><input class="form-control form-control-sm" type="text" id="cho[]"       name="lista[]" readonly value="0" /></td>`+`
        <td><input class="form-control form-control-sm" type="text" id="calcio[]"    name="lista[]" readonly value="0" /></td>`+`
        <td><input class="form-control form-control-sm" type="text" id="hierro[]"    name="lista[]" readonly value="0" /></td>`;
        newtr = newtr +
        
        `<td><button type="button" class="btn btn-danger btn-sm remove-item" ><i class="fa fa-times"></i></button></td></tr>`;

        $('#ProSelected').append(newtr); //Agrego el Producto al tbody de la Tabla con el id=ProSelected

        RefrescaProducto(); //Refresco Productos

        $('.remove-item').off().click(function (e) {
            var total = document.getElementById("total");
            total.innerHTML = parseFloat(total.innerHTML) - parseFloat(this.parentNode.parentNode.childNodes[3]
                .childNodes[0].value);
            $(this).parent('td').parent('tr').remove(); //En accion elimino el Producto de la Tabla
            if ($('#ProSelected tr.item').length == 0)
                $('#ProSelected .no-item').slideDown(300);
            RefrescaProducto();

            Calcular(e.target);
        });
        $('.iProduct').off().change(function (e) {
            RefrescaProducto();

        });
    }


    function Calcular(ele) {
        var neto = 0,
            bruto = 0,
            calorias = 0;
        var tr = ele.parentNode.parentNode;
        var nodes = tr.childNodes;

        for (var x = 0; x < nodes.length; x++) {

            if (nodes[x].firstChild.id == 'neto[]') {
                neto = parseFloat(nodes[x].firstChild.value, 10);
            }
            if (nodes[x].firstChild.id == 'bruto[]') {
                bruto = parseFloat(nodes[x].firstChild.value, 10);
            }
            if (nodes[x].firstChild.id == 'calorias[]') {
                anterior = nodes[x].firstChild.value;
                calorias = parseFloat((bruto * neto), 10);
                nodes[x].firstChild.value = calorias;
            }
        }
        // Resultado final de cada fila ERROR, al editar o eliminar una fila
        var total = document.getElementById("total");
        if (total.innerHTML == 'NaN') {
            total.innerHTML = 0;
            // 
        }
        total.innerHTML = parseFloat(total.innerHTML) + calorias - anterior;
    }

</script>

@endsection
