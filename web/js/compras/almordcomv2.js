/**
 * Librerías Javascript
 *
 * @package    Roraima
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */

var codpres = new Array();
var codarts = new Array();
var codartunis = new Array();


//<----------------------------Funciones solo del editform---------------------------------------->

function Mostrar_mensaje_fecha_egresos_invalidad()
{
  if ($('fecha_egresos').value=='1')
  {
    if ($('caordcom_refsol').value!='')
    {
      alert_('La Fecha de la orden de Compra es Menor a la emision de la Solicitud de Egreso');
      $('caordcom_refsol').value='';
    }
  }
}


function Mostrar_mensaje_periodo()
{
  if ($('periodo').value!='')
  {
    if ($('periodo').value=='P')
      alert_('La Fecha no se encuentra del Per&iacute;odo Fiscal');
    if ($('periodo').value=='F')
      alert_('La Fecha se encuentra dentro un Per&iacute;odo Cerrado');
  }
}



function Anular_orden()
{
  var motivo='Motivo de la Anulacion';
  var fecha= $('caordcom_fecord').value;
  if(confirm('�Estas Seguro?'))
  {
    var valor = prompt('Desea Anular Orden con fecha: '+$('caordcom_fecord').value+' de C&oacute;digo:',motivo);
    if ($('fechaanuserv').value!='S') var fecha = prompt('Desea Anular Orden con fecha:',fecha);
    if (valor!=null)
    {
    	if ($('fechaanuserv').value!='S') {
        if (fecha!=null)
        {
          if (Validar_fecha(fecha))
          {
            var fecha_valida=fecha;
            new Ajax.Updater('anul', '/compras_dev.php/almordcomv2/salvaranu', {asynchronous:true, evalScripts:true, parameters:'ajax=1&valor='+valor+'&fecha='+fecha+'&ordcom='+document.getElementById('caordcom_ordcom').value+'&fecord='+document.getElementById('caordcom_fecord').value+'&fecserv='+$('fechaanuserv').value});
          }
          else
          {
            alert_('Fecha de Anulaci&oacute;n Inv&aacute;lida');
          }
        }
      }else {
    	  var fecha_valida=fecha;
        new Ajax.Updater('anul', '/compras_dev.php/almordcomv2/salvaranu', {asynchronous:true, evalScripts:true, parameters:'ajax=1&valor='+valor+'&fecha='+fecha+'&ordcom='+document.getElementById('caordcom_ordcom').value+'&fecord='+document.getElementById('caordcom_fecord').value+'&fecserv='+$('fechaanuserv').value});
      }
    }
  }
}

function cargar_grid_orden_detalle_orden()
{
  if ($('caordcom_rifpro').value!='')
  {
    if ($('cancotpril').value>0)
    {
      if ($('cancotpril').value==1)
      {
        var filas=obtener_filas_grid('a','3');
        if (filas>1)
        {
          mensaje="La Orden tiene una Cotizaci&oacute;n Desea cargar parcialmente la Cotizaci&oacute;n?";
        }
        else
        {
          mensaje="Desea cargar la Referencia seleccionada?";
        }
      }
      else
      {
        mensaje="La Orden tiene varias Cotizaci&oacute;n por articulo como Nro 1. Desea cargar parcialmente la Cotizaci&oacute;n?";
      }
      if(confirm(acentos(mensaje)))
      {
        $('parcial').value='S';
        if ($('caordcom_refsol')!="")
        {
          new Ajax.Updater('grid', '/compras_dev.php/almordcomv2/grid_parcial', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json), limpiardatos()}, parameters:'ajax=1&refsol='+document.getElementById('caordcom_refsol').value+'&rifpro='+document.getElementById('caordcom_rifpro').value+'&parcial='+document.getElementById('parcial').value});
        }
      }
      else
      {
        $('parcial').value='N';
        if ($('caordcom_refsol')!="")
        {
          new Ajax.Updater('grid', '/compras_dev.php/almordcomv2/grid', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json), limpiardatos()}, parameters:'ajax=1&referencia=1&filas_orden=numero_filas_orden&rifpro='+document.getElementById('caordcom_rifpro').value+'&fecord='+document.getElementById('caordcom_fecord').value+'&refsol='+document.getElementById('caordcom_refsol').value+'&ordcom='+document.getElementById('caordcom_refsol').value});
        }

      }
    }else{
      // NOTA: Se elimino por sospechas de que no es necesario. Verificar con Pablo o Desi
      //new Ajax.Updater('grid', '/compras_dev.php/almordcomv2/grid', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json), limpiardatos()}, parameters:'ajax=1&referencia=1&filas_orden=numero_filas_orden&rifpro='+document.getElementById('caordcom_rifpro').value+'&fecord='+document.getElementById('caordcom_fecord').value+'&refsol='+document.getElementById('caordcom_refsol').value+'&ordcom='+document.getElementById('caordcom_refsol').value});
    }
  }
}


function habilitar_boton_comprobante()
{
  var tippro=$('caordcom_tippro').value;
  if ((tippro=="") || (tippro=="0000"))
  {
    alert_('C&oacute;digo de Proyecto esta Vacio, o no encontrado');
    document.getElementById("Submit2").style.visibility = "hidden";
  }
  else
  {
    document.getElementById("Submit2").style.visibility = "block";
  }
}

function ocultar_boton_recargo()
{
  if ($('caordcom_refsol').value!="")
  {
    document.getElementById('div_recargo').style.display="block";
    document.getElementById("recargo").style.visibility = "hidden";
  }
}


function mensaje_rif_cambiado()
{
  if ($('mensaje_proveedor').value!="")
  {
    $('div_recargo').toggle();
    //document.getElementById('grid').style.display="none";
    alert_($('mensaje_proveedor').value);
  }
}

function CatalogoGrid2()
{
  window.open('/tesoreria_dev.php/confincomgen/edit/?formulario=sf_admin/almordcomv2/confincomgen','menubar=no,toolbar=no,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80')
}

function CatalogoGrid()
{
  var obj1=document.getElementById('caordcom_ordcom').value;
  window.open('/compras_dev.php/almordcomv2/anular?obj1='+obj1,'...','menubar=no,toolbar=no,scrollbars=yes,width=800,height=300,resizable=yes,left=500,top=80')
}

function num(e)
{
  evt = e ? e : event;
  tcl = (window.Event) ? evt.which : evt.keyCode;
  if ((tcl < 48 || tcl > 57))
  {
    return false;
  }
  return true;
}

function actualizar_codconpag_dos()
{
  $('codconpag_dos').value=$('caordcom_codconpag').value;
}
function actualizar_codforent_dos()
{
  $('codforent_dos').value=$('caordcom_codforent').value;
}
function entrar()
{
  setTimeout("document.getElementById('caordcom_ordcom').focus();",1);
}

//<----------------------------Funciones solo del grid Fechas de Entregas---------------------------------------->

function actualizo_grid_fechas(id)
{
  i=id.split('_');
  fil=i[1];
  var col_fila_codigo_art1 = "cx_"+fil+"_1";
  var col_fila_codigo_art2 = "fx_"+fil+"_1";
  var col_fila_descripcion_art1 = "cx_"+fil+"_2";
  var col_fila_descripcion_art2 = "fx_"+fil+"_2";
  var col_fila_cantidad_art1 = "cx_"+fil+"_3";
  var col_fila_cantidad_art2 = "fx_"+fil+"_3";
  var col_fila_cantidad_fecha_ent1 = "cx_"+fil+"_4";
  var col_fila_cantidad_fecha_ent2 = "fx_"+fil+"_4";
  $(col_fila_codigo_art2).value=$(col_fila_codigo_art1).value;
  $(col_fila_descripcion_art2).value=$(col_fila_descripcion_art1).value;
  $(col_fila_cantidad_art2).value=$(col_fila_cantidad_art1).value;
  $(col_fila_cantidad_fecha_ent2).value=$(col_fila_cantidad_fecha_ent1).value;
}


//<----------------------------Funciones solo del grid Detalle Orden---------------------------------------->

function mensaje_disponibilidad_presupuestaria()
{
  if ($('codigo_presupuestario_sin_disponibilidad').value!="")
  {
    alert_('Codig&oacute; Presupuestario: ' +$('codigo_presupuestario_sin_disponibilidad').value+' no tiene disponibilidad');
  }
}


function verifica_presupuesto(e,id)
{
  i=id.split('_');
  fila=i[1];
  var fecha=$('caordcom_fecord').value;
  var bandera="codigo_presupuestario_sin_disponibilidad";
  var fila_monto= "ax_"+fila+"_13";
  var fila_monto=toFloat(fila_monto);
  monto=format(fila_monto.toFixed(2),'.',',','.');

  var fila_codigo_presupuestario= "ax_"+fila+"_15";
  var codigo=$(fila_codigo_presupuestario).value;

  if (e.keyCode==13 || e.keyCode==9)
  {
    if (codigo!="")
    {
      new Ajax.Request('/compras_dev.php/almordcomv2/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=13&bandera='+bandera+'&cajtexmos='+fila_monto+'&cajtexcom='+fila_monto+'&codigo='+codigo+'&monto='+monto+'&fecha='+fecha})
    }
  }
}

function existencia_codigo_presupuestario(codigo_presupuestario,codigo,fila)
{
  var codigo_categoria= "ax_"+fila+"_4";
  if ($(codigo_presupuestario).value=="" && $(codigo_categoria).value!="")
  {
    alert_('Codig&oacute; Presupuestario: ' +codigo+' no existe');
    $(codigo_categoria).value='';
  }
}

function ajax_detalle_codigo_pre(e,id)
{
  if (!(verificar_codigo_repetido(id)))
  {
    i=id.split('_');
    fila=i[1];
    var codigo_presupuestario= "ax_"+fila+"_15";
    var codigo=$(codigo_presupuestario).value;
    if (e.keyCode==13 || e.keyCode==9)
    {
      if (codigo!="")
      {
        new Ajax.Request('/compras_dev.php/almordcomv2/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json),existencia_codigo_presupuestario(codigo_presupuestario,codigo,fila);}, parameters:'ajax=12&cajtexmos='+codigo_presupuestario+'&cajtexcom='+codigo_presupuestario+'&codigo='+codigo})
      }
    }
  }// if (!(articulo_repetido(id)))
}

function ajaxdetalle(e,id)
{
  var aux = id.split("_");
  var name=aux[0];
  var fil=parseInt(aux[1]);
  var col=parseInt(aux[2]);

  var descripcion=name+"_"+fil+"_"+3;
  var unidad=name+"_"+fil+"_"+14;
  var costo=name+"_"+fil+"_"+9;
  var partida=name+"_"+fil+"_"+16;
  var cod=$(id).value;

  if (e.keyCode==13 || e.keyCode==9)
  {
    if ($(id).value!="")
    {
      new Ajax.Request('/compras_dev.php/almordcomv2/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=3&cajtexmos='+descripcion+'&cajtexcom='+id+'&unidad='+unidad+'&costo='+costo+'&partida='+partida+'&codigo='+cod+'&tipord='+$('caordcom_tipord').value})
    }
  }
}

function verificar_codigo_repetido(obj)
{
  f=0;
  i=obj.id.split('_');
  fila = i[1];
  i=i[1];
  contador_repetido=0;
  articulorepetido=false;
  var col_fila_codigo_art_com = "ax_"+i+"_2";
  var col_fila_codigo_uni_com = "ax_"+i+"_4";
  if ($(col_fila_codigo_art_com).value!="")
  {
    for(var i=(inputs_filas_a.size()-1);i>=0;i--){
      if($(inputs_filas_a[i][1]).value==$(col_fila_codigo_art_com).value && $(inputs_filas_a[i][4]).value==$(col_fila_codigo_uni_com).value ){
        contador_repetido++;
        if(contador_repetido>1) break;
      }
    }
  }
  if (contador_repetido>1)
  {
    var unidad_art = "ax_"+fila+"_14";
    var partida_art = "ax_"+fila+"_16";
    var codigo_pre = "ax_"+fila+"_15";
    var coduni_art = "ax_"+fila+"_4";
    var nombre_art = "ax_"+fila+"_3";
    var codigo_art= "ax_"+fila+"_2";
    $(unidad_art).value="";
    $(partida_art).value="";
    $(codigo_pre).value="";
    $(coduni_art).value="";
    $(nombre_art).value="";
    $(codigo_art).value="";
    alert_('C&oacute;digo de articulo y unidad repetido, Verifique sus datos');
    articulorepetido=true;
  }
  i=0;
  f=0;
  fila=0;
  return articulorepetido;
}





function actualizar_sumatoria_total_cuando_esta_referida()
{
  f=0;
  montotal=0;
  montotal2=0;
  montotal3=0;
  while (f < $('numero_filas_orden').value)
  {
    var col_fila_cancost = "ax_"+f+"_10";
    var col_fila_rec = "ax_"+f+"_12";
    var col_fila_codigo_datos = "ax_"+f+"_13";
    var num=toFloat(col_fila_codigo_datos);
    var num1=toFloat(col_fila_cancost);
    var num2=toFloat(col_fila_rec);
    montotal = montotal + num;
    montotal2 = montotal2 + num1;
    montotal3 = montotal2 + num2;
    f++;
  }
  $('caordcom_monord').value=format(montotal.toFixed(2),'.',',','.');
  $('caordcom_totorden').value=format(montotal2.toFixed(2),'.',',','.');
  $('caordcom_totrecargo').value=format(montotal3.toFixed(2),'.',',','.');
}




function actualizo_cod_presupuestario(id)
{
  if ($(id).value!="")
  {
    i=id.split('_');
    fil=i[1];
    var col_fila_codigo_art = "ax_"+fil+"_2";
    var col_fila_unidad_art = "ax_"+fil+"_4";
    var col_fila_partida_art = "ax_"+fil+"_16";
    var col_fila_codigo_pre = "ax_"+fil+"_15";
    valor_cat_unidad=$(col_fila_unidad_art).value + '-' + $(col_fila_partida_art).value;
    valor_cat_unidad=valor_cat_unidad.replace('--','-');
    valor_cat_unidad=valor_cat_unidad.replace('--','-');
    valor_cat_unidad=valor_cat_unidad.replace('--','-');
    valor_cat_unidad=valor_cat_unidad.replace('--','-');
    valor_cat_unidad=valor_cat_unidad.replace('--','-');
    valor_cat_unidad=valor_cat_unidad.replace('--','-');
    $(col_fila_codigo_pre).value=valor_cat_unidad;
    codpres[fil] = valor_cat_unidad;
    codartunis[fil] = $(col_fila_unidad_art).value + '-' + $(col_fila_codigo_art).value;
    codarts[fil] = $(col_fila_codigo_art).value;
  }
}

function inizializo_descuentos()
{
  f=0;
  while (f < $('numero_filas_orden').value)
  {
    var col_fila_descuento_en_cero = "ax_"+f+"_11";
    cero=0;
    $(col_fila_descuento_en_cero).value=format(cero.toFixed(2),'.',',','.');
    f++;
  }
}


function imprimo_calculo_descuento_por_tipo(e,monto_descuento_procesado)
{
  //imprimo calculo del descuento
  var fila_descuento = "ax_"+e+"_11";

  var monto_descuento=parseFloat(monto_descuento_procesado);

  // imprimo en el grid_detalle_orden
  $(fila_descuento).value=format(monto_descuento_procesado.toFixed(2),'.',',','.');
}



function calculo_descuento_por_tipo(j)
{
  //operaciones de multiplicacion de cantidad por monto para sacar el descuento dependiendo del
  // tipo de descuento

  var fila_cantidad = "ax_"+j+"_5";
  var fila_costo = "ax_"+j+"_9";
  var fila_descuento = "ax_"+j+"_11";
  cantidad_art_total=0;
  descuento_art_total=0;
  costo_art_total=0;

  var cantidad_art_total=toFloat(fila_cantidad);
  var descuento_art_total=toFloat(fila_descuento);
  var costo_art_total=toFloat(fila_costo);

  if (document.forms[0].descuenta[0].checked)
  {
    // multiplicar por porcentaje
    total_cantidad_por_fila_descuento=((cantidad_art_total*costo_art_total)*descuento_art_total)/100;
  }
  if (document.forms[0].descuenta[1].checked)
  {
    // por monto
    total_cantidad_por_fila_descuento=descuento_art_total;
  }
  if (document.forms[0].descuenta[2].checked)
  {
    // multiplicar por total
    total_cantidad_por_fila_descuento=0;
  }

  // ojo aqui puede dar un error por la nueva modificacion del bendito tofloat
  imprimo_calculo_descuento_por_tipo(j,total_cantidad_por_fila_descuento);
  total_cantidad_por_fila_descuento=format(total_cantidad_por_fila_descuento.toFixed(2),'.',',','.');
  j=0;
  return total_cantidad_por_fila_descuento;
}


function actualizar_total_grid_detalle_datos(e,id,caldes)
{
  if (e.keyCode==13 || e.keyCode==9)
  {
    i=id.split('_');
    fil=i[1];
    //operaciones de suma y resta y multiplicacion en el grid detalle orden

    var fila_canord="ax"+"_"+fil+"_5";
    var fila_canaju="ax"+"_"+fil+"_6";
    var fila_canrec="ax"+"_"+fil+"_7";
    var fila_costo = "ax_"+fil+"_9";
    var fila_descuento = "ax_"+fil+"_11";
    var fila_recargo = "ax_"+fil+"_12";
    var fila_total_costo_cantidad = "ax_"+fil+"_10";
    var fila_total_monto_por_cantidad = "ax_"+fil+"_13";

    var valcanord=toFloat(fila_canord);
    var valcanaju=toFloat(fila_canaju);
    var valcanrec=toFloat(fila_canrec);
    var costo_art_total=toFloat(fila_costo);
    var recargo_art_total=toFloat(fila_recargo);

    if (caldes=="S")
    {
      descuento_art = calculo_descuento_por_tipo(fil);
      var descuento_art_total = FloatVEtoFloat(descuento_art);
    }
    else
    {
      var descuento_art_total=toFloat(fila_descuento);
    }


    var cantot=valcanord-valcanaju-valcanrec;
    total_cantidad_costo=(cantot*costo_art_total);
    total_cantidad_por_monto=(cantot*costo_art_total)+recargo_art_total-descuento_art_total;
    $(fila_total_costo_cantidad).value=format(total_cantidad_costo.toFixed(2),'.',',','.');
    $(fila_total_monto_por_cantidad).value=format(total_cantidad_por_monto.toFixed(2),'.',',','.');
  }
}



function actualizar_grid_dependientes()
{
  var filres=obtener_filas_grid('b',1);  //Limpiar Grid Resumen
  var t=0;
  while (t<filres)
  {
    var col1= "bx_"+t+"_1";
    var col2= "bx_"+t+"_2";
    var col3= "bx_"+t+"_3";
    var col4= "bx_"+t+"_4";
    var col5= "bx_"+t+"_5";
    var col6= "bx_"+t+"_6";
    var col7= "bx_"+t+"_7";
    var col8= "bx_"+t+"_8";
    var col9= "bx_"+t+"_9";
    var col10= "bx_"+t+"_10";

    $(col1).value="";
    $(col2).value="";
    $(col3).value="";
    $(col4).value="0,00";
    $(col5).value="0,00";
    $(col6).value="0,00";
    $(col7).value="0,00";
    $(col8).value="0,00";
    $(col9).value="0,00";
    $(col10).value="0,00";
    t++;
  }

  var filent=obtener_filas_grid('c',1); //Limpiar Grid Entregas
  var p=0;
  while (p<filent)
  {
    var col1= "cx_"+p+"_1";
    var col2= "cx_"+p+"_2";
    var col3= "cx_"+p+"_3";

    $(col1).value="";
    $(col2).value="";
    $(col3).value="0,00";
    p++;
  }




  // colocar los datos en el grid resumen
  f=0;
  while (f < $('numero_filas_orden').value)
  {
    col_fila_art_1 = "ax_"+f+"_2";
    col_fila_art_2 = "ax_"+(f+1)+"_2";
    if($(col_fila_art_1).value=="" && $(col_fila_art_1).value=="") break;
    c=2;
    c2=1;
    while (c<=9)
    {
      var col_fila_datos = "ax_"+f+"_"+c;
      var col_fila_resumen = "bx_"+f+"_"+c2;
      $(col_fila_resumen).value=$(col_fila_datos).value;
      c++;
      c2++;
    }

    var col_fila_cantidad_recargo_grid_a = "ax_"+f+"_12";
    var col_fila_cantidad_total_grid_a = "ax_"+f+"_13";

    var col_fila_cantidad_recargo_grid_b = "bx_"+f+"_9";
    var col_fila_cantidad_total_grid_b = "bx_"+f+"_10";

    $(col_fila_cantidad_recargo_grid_b).value=$(col_fila_cantidad_recargo_grid_a).value;
    $(col_fila_cantidad_total_grid_b).value=$(col_fila_cantidad_total_grid_a).value;
    f++;
  }

  // colocar los datos en el grid entregas
  f=0;
  while (f < $('numero_filas_orden').value)
  {
    col_fila_art_1 = "ax_"+f+"_2";
    col_fila_art_2 = "ax_"+(f+1)+"_2";
    if($(col_fila_art_1).value=="" && $(col_fila_art_1).value=="") break;


    var col_fila_codigo_datos = "ax_"+f+"_2";
    var col_fila_codigo_entregas = "cx_"+f+"_1";

    var col_fila_descripcion_datos = "ax_"+f+"_3";
    var col_fila_descripcion_entregas = "cx_"+f+"_2";

    var col_fila_cantidad_datos = "ax_"+f+"_5";
    var col_fila_cantidad_entregas = "cx_"+f+"_3";

    $(col_fila_codigo_entregas).value=$(col_fila_codigo_datos).value;
    $(col_fila_descripcion_entregas).value=$(col_fila_descripcion_datos).value;
    $(col_fila_cantidad_entregas).value=$(col_fila_cantidad_datos).value;

    f++;
  }
}

function actualizar_check_para_recargo()
{
  //activo los check con monto mayor que cero
  i=0;
  while (i < $('numero_filas_orden').value)
  {
    var fila_check_cantidad= "ax_"+i+"_5";
    var fila_check_costo= "ax_"+i+"_9";
    var fila_grid_detalle= "ax_"+i+"_1";
    if (($(fila_check_cantidad).value!='0,00') || ($(fila_check_costo).value!='0,00'))
    {
      $(fila_grid_detalle).checked=1;
    }
    i++;
  }
  i=0;
}


function actualizar_sumatoria_detallada_orden()
{
  i=0;
  total_monto_orden_pago=0;
  total_cost_cant=0;
  total_recargo=0;
  while (i < $('numero_filas_orden').value)
  {
    col_fila_art_1 = "ax_"+i+"_2";
    col_fila_art_2 = "ax_"+(i+1)+"_2";
    if($(col_fila_art_1).value=="" && $(col_fila_art_1).value=="") break;

    var fila_grid_recargo= "ax_"+i+"_12";
    var fila_grid_detalle= "ax_"+i+"_13";
    var fila_grid_cost_cant= "ax_"+i+"_10";
    var monto_por_fila=toFloat(fila_grid_detalle);
    var cant_cost=toFloat(fila_grid_cost_cant);
    var tot_recargo=toFloat(fila_grid_recargo);

    total_cost_cant= total_cost_cant + cant_cost;
    total_recargo= total_recargo + tot_recargo;
    total_monto_orden_pago = total_monto_orden_pago + monto_por_fila;
    i++;
  }
  $('sumatoria_detalle_orden').value=total_monto_orden_pago;
  $('caordcom_totorden').value=format(total_cost_cant.toFixed(2),'.',',','.');
  $('caordcom_totrecargo').value=format(tot_recargo.toFixed(2),'.',',','.');
}

function actualizar_sumatoria_recargo_mas_orden()
{
  //suma de total grid detalle orden mas recargo
  var num1=toFloat('sumatoria_recargos');
  var num2=toFloat('sumatoria_detalle_orden');
  montotal=num1+num2;
  $('caordcom_monord').value=format(montotal.toFixed(2),'.',',','.');
}

//<----------------------------Funciones solo del grid Detalle Recargo---------------------------------------->


function actualizar_calculo_grid_recargo_por_fila()
{
  i=0;
  total_monto=0;
  while (i < ($('numero_filas_recargos').value-1))
  {
    //verifico la sumatoria solo de los check
    var fila_check= "ax_"+i+"_1";
    if ($(fila_check).checked==true)
    {
      var fila_grid_detalle_cant= "ax_"+i+"_5";
      var fila_grid_detalle_mont= "ax_"+i+"_9";
      var monto_por_fila_cant=toFloat(fila_grid_detalle_cant);
      var monto_por_fila_monto=toFloat(fila_grid_detalle_mont);
      total_monto = total_monto + (monto_por_fila_cant*monto_por_fila_monto);
    }
    i++;
  }
  // calculo del recargo grid recargo
  i=0;
  while (i < ($('numero_filas_recargos').value-1))
  {
    var fila_calculo= "rx_"+i+"_4";
    var fila_resultado= "rx_"+i+"_3";
    var fila_tiprgo= "rx_"+i+"_5";

    var monto_fila=toFloat(fila_calculo);

    variable = $(fila_tiprgo).value;
    variable= variable.substring(0,1);
    if (variable=='M')
    {
      var montotal_recargo=toFloat(fila_calculo);
    }
    else if (variable=='P')
    {
      montotal_recargo=total_monto*(monto_fila/100);
    }
    else
    {
      montotal_recargo=0;
    }

    $(fila_resultado).value=format(montotal_recargo.toFixed(2),'.',',','.');
    i++;
  }
}



function actualizar_sumatoria_detallada_recargos_en_detalle_orden_por_todos_los_check()
{
  i=0;

  //<----------------------------Se ejecuta en el boton de Recargo---------------------------------------->
  //actualizar columnas de recargos pero en el grid detalle de la orden
  // consiguo monto total del grid detalle solo lo q esten chequeados
  monto_total=0;
  while (i < $('numero_filas_orden').value)
  {
    var fila_cantidad = "ax_"+i+"_5";
    var fila_costo = "ax_"+i+"_9";
    var fila_descuento = "ax_"+i+"_11";
    var fila_check= "ax_"+i+"_1";
    cantidad_art_total=0;
    costo_art_total=0;
    descuento_art_total=0;


    if ($(fila_check).checked==true)
    {
      var cantidad_art_total=toFloat(fila_cantidad);
      var costo_art_total=toFloat(fila_costo);
      var descuento_art_total=toFloat(fila_descuento);
    }
    if ((cantidad_art_total>0) && (costo_art_total>0))
    {
      monto_total = monto_total + (cantidad_art_total*costo_art_total)-descuento_art_total;
    }
    i++;
  }
  return monto_total;//=format(monto_total.toFixed(2),'.',',','.');
}

function sumatoria_total_grid_recargos()
{
  i=0;

  //<----------------------------Se ejecuta en el boton de Recargo---------------------------------------->
  //actualizar columnas de recargos pero en el grid detalle de la orden
  // consiguo monto total del grid detalle solo lo q esten chequeados
  monto_total_grid_recargo=0;
  while (i < ($('numero_filas_recargos').value-1))
  {
    var fila_monto_recargo_total = "rx_"+i+"_3";
    monto_recargo=0;

    var monto_recargo=toFloat(fila_monto_recargo_total);

    monto_total_grid_recargo = monto_total_grid_recargo + monto_recargo;
    i++;
  }
  return monto_total_grid_recargo;//=format(monto_total_grid_recargo.toFixed(2),'.',',','.');
}


function actualizar_recargos_en_detalle_orden_por_fila()
{

  monto_total = actualizar_sumatoria_detallada_recargos_en_detalle_orden_por_todos_los_check();
  monto_total_grid_recargos = sumatoria_total_grid_recargos();

  var monto_total_por_check=monto_total;
  var total_recargo_grid=monto_total_grid_recargos;

  //consiguo monto total de la fila actual que este chequeada y lo divido por el monto total de todas
  //las chequeadas y lo multiplico por el recargo que lleva el index de la misma fila
  i=0;
  while (i < $('numero_filas_orden').value)
  {
    var fila_cantidad= "ax_"+i+"_5";
    var fila_costo= "ax_"+i+"_9";
    var fila_descuento= "ax_"+i+"_11";
    var fila_recargo_grid_detalle_orden= "ax_"+i+"_12";
    var fila_grid_detalle_orden_total= "ax_"+i+"_13";
    var fila_recargo_grid_detalle_orden_resumen= "bx_"+i+"_9";
    var fila_check= "ax_"+i+"_1";
    total_cantidad=0;
    total_costo=0;
    total_completo_grid_detalle_orden=0;
    total_descuento=0;
    monto_total_recargo_por_fila=0;
    if ($(fila_check).checked==true)
    {
      var total_cantidad=toFloat(fila_cantidad);
      var total_costo=toFloat(fila_costo);
      //obtenemos el valor del descuento dependiendo del tipo descuento
      //total_fila_descuento= calculo_descuento_por_tipo(i);
      var total_descuento=toFloat(fila_descuento);

      if ((total_cantidad>=0) && (total_costo>=0) && (total_descuento>=0) && (total_recargo_grid>0))
      {
        monto_total_recargo_por_fila = ((((total_cantidad*total_costo)-total_descuento)/monto_total_por_check)*total_recargo_grid);
      }
    }
    $(fila_recargo_grid_detalle_orden).value=format(monto_total_recargo_por_fila.toFixed(2),'.',',','.');
    $(fila_recargo_grid_detalle_orden_resumen).value=format(monto_total_recargo_por_fila.toFixed(2),'.',',','.');
    var total_regargo=toFloat(fila_recargo_grid_detalle_orden);

    if ($(fila_check).checked==true)
    {
      if ((total_cantidad>=0) && (total_costo>=0) && (total_descuento>=0) && (total_recargo_grid>=0))
      {
        total_completo_grid_detalle_orden = (total_cantidad*total_costo)-total_descuento + total_regargo;
      }
    }
    $(fila_grid_detalle_orden_total).value=format(total_completo_grid_detalle_orden.toFixed(2),'.',',','.');



    i++;
  }
}


function total_completo()
{
  i=0;
  //operaciones de suma y resta y multiplicacion en el grid detalle orden
  total_cantidad_por_monto=0;
  total_cantidad_costo=0;
  total_rec=0;
  while (i < $('numero_filas_orden').value)
  {
    col_fila_art_1 = "ax_"+i+"_2";
    col_fila_art_2 = "ax_"+(i+1)+"_2";
    if($(col_fila_art_1).value=="" && $(col_fila_art_1).value=="") break;


    var fila_cantidad = "ax_"+i+"_5";
    var fila_costo = "ax_"+i+"_9";
    var fila_cancost = "ax_"+i+"_10";
    var fila_descuento = "ax_"+i+"_11";
    var fila_recargo = "ax_"+i+"_12";
    var fila_total_monto_por_cantidad = "ax_"+i+"_13";

    var cantidad_art_total=toFloat(fila_cantidad);
    var costo_art_total=toFloat(fila_costo);

    //obtenemos el valor del descuento dependiendo del tipo descuento
    //descuento_art= calculo_descuento_por_tipo(i);
    var descuento_art_total=toFloat(fila_descuento);
    var recargo_art_total=toFloat(fila_recargo);
    total_rec= total_rec + recargo_art_total;
    total_cantidad_costo= total_cantidad_costo + (cantidad_art_total*costo_art_total);
    total_cantidad_por_monto = total_cantidad_por_monto + (cantidad_art_total*costo_art_total)+recargo_art_total-descuento_art_total;
    i++;
  }
  $('caordcom_monord').value=format(total_cantidad_por_monto.toFixed(2),'.',',','.');
  $('caordcom_totorden').value=format(total_cantidad_costo.toFixed(2),'.',',','.');
  $('caordcom_totrecargo').value=format(total_rec.toFixed(2),'.',',','.');
}

function verificar_datos(id)
{
  var aux = id.split("_");
  var name=aux[0];
  var fil=aux[1];
  var col=parseInt(aux[2]);

  if (col==5)
  {var colcat=col-1;}
  else {colcat=col-5;}
  var categoria=name+"_"+fil+"_"+colcat;
  if ($(categoria).value=='')
  {
    alert_('Debe introducir el C&oacute;digo de la Unidad');
    $(id).value='';
    $(id).value='0,00';
    return false;
  }else {return true;}
}

function ajaxrecargo(e,id)
{
  var aux = id.split("_");
  var name=aux[0];
  var fil=parseInt(aux[1]);
  var col=parseInt(aux[2]);

  var coldes=2;
  var colmonto=3;
  var coltipo=4;
  var colmoncal=5;
  var colcodpar=6;

  var descripcion=name+"_"+fil+"_"+coldes;
  var monto=name+"_"+fil+"_"+colmonto;
  var tipo=name+"_"+fil+"_"+coltipo;
  var moncal=name+"_"+fil+"_"+colmoncal;
  var codpar=name+"_"+fil+"_"+colcodpar;

  var cod=$(id).value;
  var monart=toFloat('totartsinrec');

  if (e.keyCode==13 || e.keyCode==9)
  {
    if ($(id).value!="")
    {
      new Ajax.Request(getUrlModulo()+'ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json);}, parameters:'ajax=15&cajtexmos='+descripcion+'&cajtexcom='+id+'&monto='+monto+'&tipo='+tipo+'&moncal='+moncal+'&monart='+monart+'&codpar='+codpar+'&codigo='+cod})
    }
  }
}

function mostrargridrecargos(id)
{
  var aux = id.split("_");
  var name=aux[0];
  var fil=parseInt(aux[1]);
  var col=parseInt(aux[2]);


  var codart=name+"_"+fil+"_2";
  var coduni=name+"_"+fil+"_4";
  var chk=name+"_"+fil+"_1";
  if ($(chk).checked==true)
  {
    if ($(codart).value!="")
    {
      if ($('caordcom_ordcom').value=='########') var ordcom=''; else var ordcom=$('caordcom_ordcom').value;
      if ($('caordcom_refsol').value!='')  var refsol=$('caordcom_refsol').value; else var refsol='';
      if ($('id').value!='') var nuevo="N"; else var nuevo="S";

      var articulo=$(codart).value;
      var codunidad=$(coduni).value;


      var canord=name+"_"+fil+"_5";
      var canaju=name+"_"+fil+"_6";
      var canrec=name+"_"+fil+"_7";
      var candes=name+"_"+fil+"_11";
      var costos=name+"_"+fil+"_9";

      var valcanord=toFloat(canord);
      var valcanaju=toFloat(canaju);
      var valcanrec=toFloat(canrec);
      var valcandes=toFloat(candes);
      var valcostos=toFloat(costos);

      var cantot=valcanord-valcanaju-valcanrec;
      var calculo= (cantot*valcostos)-valcandes;
      $('totartsinrec').value=format(calculo.toFixed(2),'.',',','.');
      $('actualfila').value=fil;
      var tipcom=$('caordcom_doccom').value;

      new Ajax.Updater('grid_recargo', getUrlModulo()+'recargos', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json);distribuirRecargosenGrid();$("recargos").show();$("botonesmarcar").hide();}, parameters:'articulo='+articulo+'&refsol='+refsol+'&codunidad='+codunidad+'&ordcom='+ordcom+'&tipcom='+tipcom+'&nuevo='+nuevo})
    }
    else
    {
      alert_("Debe introducir el Art&iacute;culo antes de los cargar los Recargos..");
    }
  }
  else
  {
    alert("Debe marcar la primera casilla (Marque) antes de cargar los Recargos..");
  }
}

function salvarmontorecargos()
{
  var cadena='';
  var fil=0;
  while (fil<150)
  {
    var codrgo="rx"+"_"+fil+"_1";
    if ($(codrgo))
    {
      if ($(codrgo).value!="")
      {
        var desrgo="rx"+"_"+fil+"_2";
        var monrgoc="rx"+"_"+fil+"_3";
        var tiprgo="rx"+"_"+fil+"_4";
        var monrgo="rx"+"_"+fil+"_5";
        var codpar="rx"+"_"+fil+"_6";
        var cadena=cadena + $(codrgo).value+'_' + $(desrgo).value+'_' + $(monrgoc).value +'_'+ $(tiprgo).value+'_' + $(monrgo).value +'_' + $(codpar).value + '!';
      } else {fil=150;}
    }else {fil=150;}
    fil++;
  }


  var mifila=$('actualfila').value;
  var infrecargos="ax"+"_"+mifila+"_18";
  var canord="ax"+"_"+mifila+"_5";
  var canaju="ax"+"_"+mifila+"_6";
  var canrec="ax"+"_"+mifila+"_7";
  var costos="ax"+"_"+mifila+"_9";
  var descto="ax"+"_"+mifila+"_11";
  var recargo="ax"+"_"+mifila+"_12";
  var total="ax"+"_"+mifila+"_13";


  $(infrecargos).value=cadena;
  $(recargo).value=$('totrecar').value;

  var recfil=toFloat('totrecar');
  var valcanord=toFloat(canord);
  var valcanaju=toFloat(canaju);
  var valcanrec=toFloat(canrec);
  var moncos=toFloat(costos);

  var cantot=valcanord-valcanaju-valcanrec;
  var mondto=toFloat(descto);
  var monnet= cantot*moncos;

  montottot=monnet-mondto+recfil;
  $(total).value=format(montottot.toFixed(2),'.',',','.');

  $('recargos').hide();
  if ($('caordcom_refsol').value=='')  $("botonesmarcar").show();
  ActualizarSaldosGrid("a",ArrTotales_a);
  //actualizar_grid_dependientes();
}


function distribuirRecargosenGrid()
{
  var j=$('actualfila').value;
  var haydist="ax"+"_"+j+"_18";
  if ($(haydist).value!="")
  {
    var distrib=$(haydist).value;
    var aux2=distrib.split("!");

    var z=0;
    while (z<((aux2.length)-1))
    {
      var reg=aux2[z];
      var aux3=reg.split("_");
      var ccodrgo=aux3[0];
      var cdesrgo=aux3[1];
      var cmonrgoc=aux3[2];
      var ctiprgo=aux3[3];
      var cmonrgo=aux3[4];
      var ccodpar=aux3[5];


      var codrgo="rx"+"_"+z+"_1";
      var desrgo="rx"+"_"+z+"_2";
      var monrgoc="rx"+"_"+z+"_3";
      var tiprgo="rx"+"_"+z+"_4";
      var monrgo="rx"+"_"+z+"_5";
      var codpar="rx"+"_"+z+"_6";


      $(codrgo).value=ccodrgo;
      $(desrgo).value=cdesrgo;
      $(monrgoc).value=cmonrgoc;
      $(tiprgo).value=ctiprgo;
      $(monrgo).value=cmonrgo;
      $(codpar).value=ccodpar;
      //si el tipo de recargo es puntual "M" y el valor es cero (0), entonces se debe habilitar la cajita de texto del monto para que el usuario
      //pueda modificar el monto del recargo
      var monto_monrgo=toFloat2(aux3[2]);
      if (ctiprgo=="M" && monto_monrgo==0)
      {
        //$(monrgo).readOnly=false;
      }
      z++;
    }
  }
}

function marcarTodo()
{
  var infrecargos="ax"+"_0_18";
  var distrib=$(infrecargos).value;
  var articulo="ax"+"_0_2";
  var valorarticulo=$(articulo).value;
  if (valorarticulo!="")
  {
    if (distrib!="")
    {
      var fil=1;
      while (fil<150)
      {
        var codart="ax"+"_"+fil+"_2";
        if ($(codart).value!="")
        {
          var id="ax"+"_"+fil+"_1";

          var canord="ax"+"_"+fil+"_5";
          var canaju="ax"+"_"+fil+"_6";
          var canrec="ax"+"_"+fil+"_7";
          var cost="ax"+"_"+fil+"_9";
          var dest="ax"+"_"+fil+"_11";
          var recargo="ax"+"_"+fil+"_12";
          var total="ax"+"_"+fil+"_13";
          var haydistribucion="ax"+"_"+fil+"_18";

          var valcanord=toFloat(canord);
          var valcanaju=toFloat(canaju);
          var valcanrec=toFloat(canrec);
          var moncos=toFloat(cost);
          var mondto=toFloat(dest);

          var cantot=valcanord-valcanaju-valcanrec;
          var monuni=moncos*cantot;

          var monrgotot=0;
          var cadena="";


          var z=0;
          var aux2=distrib.split("!");
          while (z<((aux2.length)-1))
          {
            var reg=aux2[z];
            var aux3=reg.split("_");
            var ccodrgo=aux3[0];
            var cdesrgo=aux3[1];
            var cmonrgotab=toFloat2(aux3[2]);
            var ctiprgo=aux3[3];
            var cmonrgo=toFloat2(aux3[4]);
            var ccodpar=aux3[5];

            if (ctiprgo=='M')
            {
              cmonrgo=cmonrgotab;
            }
            else if (ctiprgo=='P')
            {
              cmonrgo= ((monuni*cmonrgotab)/100);
            }
            else
            {cmonrgo=0;}

            cmonrgotabfor=format(cmonrgotab.toFixed(2),'.',',','.');
            cmonrgofor=format(cmonrgo.toFixed(2),'.',',','.');
            cadena=cadena + ccodrgo+'_' + cdesrgo+'_' + cmonrgotabfor +'_'+ ctiprgo +'_' + cmonrgofor +'_' + ccodpar + '!';
            monrgotot=monrgotot+cmonrgo;
            z++;
          }//while

          $(haydistribucion).value=cadena;
          $(recargo).value=format(monrgotot.toFixed(2),'.',',','.');
          montottot=monuni-mondto+monrgotot;
          $(total).value=format(montottot.toFixed(2),'.',',','.');
          $(id).checked=true;
        }//if ($(codart).value!="")
        else
        {
          fil=150;
        }
        fil++;
      }//while (fil<150)
      ActualizarSaldosGrid("a",ArrTotales_a);
      //actualizar_grid_dependientes();
    }// if (distrib!="")
    else
    {
      alert_("No han sido aplicados Recargos al primer Art&iacute;culo del Detalle, C&oacute;digo: "+ valorarticulo+". Deben ser definidos estos Recargos para poder replicarlos al resto de los Art&iacute;culo del Detalle de la Solicitud ")
    }
  }
}

function desmarcarTodo()
{
  var fil=1;
  while (fil<150)
  {
    var codart="ax"+"_"+fil+"_2";
    if ($(codart).value!="")
    {
      var id="ax"+"_"+fil+"_1";
      var canord="ax"+"_"+fil+"_5";
      var canaju="ax"+"_"+fil+"_6";
      var canrec="ax"+"_"+fil+"_7";
      var cost="ax"+"_"+fil+"_9";
      var dest="ax"+"_"+fil+"_11";
      var recargo="ax"+"_"+fil+"_12";
      var total="ax"+"_"+fil+"_13";
      var haydistribucion="ax"+"_"+fil+"_18";

      var valcanord=toFloat(canord);
      var valcanaju=toFloat(canaju);
      var valcanrec=toFloat(canrec);
      var moncos=toFloat(cost);
      var mondto=toFloat(dest);

      var cantot=valcanord-valcanaju-valcanrec;
      var monuni=moncos*cantot;

      var monrgotot=0;
      var cadena="";

      $(haydistribucion).value=cadena;
      $(recargo).value=format(monrgotot.toFixed(2),'.',',','.');
      montottot=monuni-mondto;
      $(total).value=format(montottot.toFixed(2),'.',',','.');
      $(id).checked=false;
    }//if ($(codart).value!="")
    else
    {
      fil=150;
    }
    fil++;
  }//while (fil<150)
  ActualizarSaldosGrid('a', ArrTotales_a);
  
}

function desmarcarfila(id)
{
  var aux = id.split("_");
  var name=aux[0];
  var fil=parseInt(aux[1]);

  if ($(id).checked==false)
  {
    var codart="ax"+"_"+fil+"_2";
    if ($(codart).value!="")
    {
      var canord="ax"+"_"+fil+"_5";
      var canaju="ax"+"_"+fil+"_6";
      var canrec="ax"+"_"+fil+"_7";
      var cost="ax"+"_"+fil+"_9";
      var dest="ax"+"_"+fil+"_11";
      var recargo="ax"+"_"+fil+"_12";
      var total="ax"+"_"+fil+"_13";
      var haydistribucion="ax"+"_"+fil+"_18";

      var valcanord=toFloat(canord);
      var valcanaju=toFloat(canaju);
      var valcanrec=toFloat(canrec);
      var moncos=toFloat(cost);
      var mondto=toFloat(dest);

      var cantot=valcanord-valcanaju-valcanrec;
      var monuni=moncos*cantot;

      var monrgotot=0;
      var cadena="";

      $(haydistribucion).value=cadena;
      $(recargo).value=format(monrgotot.toFixed(2),'.',',','.');
      montottot=monuni-mondto;
      $(total).value=format(montottot.toFixed(2),'.',',','.');
      ActualizarSaldosGrid('a', ArrTotales_a)
    }//if ($(codart).value!="")
  }else
  {
    aplicarAnteriores(id);
  }
}

function perderfocus(e,id,totcol)
{
  var aux = id.split("_");
  var name=aux[0];
  var fil=parseInt(aux[1]);
  var col=parseInt(aux[2]);

  if (col!=totcol)
  {
    var colsig=col+1;
    var siguiente=name+"_"+fil+"_"+colsig;
  }
  else
  {
    var fila=fil+1;
    var siguiente=name+"_"+fila+"_2";
  }

  if (e.keyCode==13 || e.keyCode==9)
  {
    if($(siguiente))
    {
      if (!$(siguiente).readOnly) $(siguiente).focus();
    }
  }
}

function recalcularecargos(e,id)
{
  if (e.keyCode==13 || e.keyCode==9)
  {
    var i=id.split('_');
    var fil=i[1];
    var id1="ax"+"_"+fil+"_1";
    var canord="ax"+"_"+fil+"_5";
    var canaju="ax"+"_"+fil+"_6";
    var canrec="ax"+"_"+fil+"_7";
    var cost="ax"+"_"+fil+"_9";
    var dest="ax"+"_"+fil+"_11";
    var recargo="ax"+"_"+fil+"_12";
    var total="ax"+"_"+fil+"_13";
    var infrecargos="ax"+"_"+fil+"_18";

    var valcanord=toFloat(canord);
    var valcanaju=toFloat(canaju);
    var valcanrec=toFloat(canrec);
    var moncos=toFloat(cost);
    var mondto=toFloat(dest);

    var cantot=valcanord-valcanaju-valcanrec;
    var monuni=moncos*cantot;

    var monrgotot=0;
    var cadena="";

    if ($(id1).checked==true)
    {
      var haydist="ax"+"_"+fil+"_18";
      if ($(haydist).value!="")
      {
        var distrib=$(haydist).value;
        var aux2=distrib.split("!");
        var z=0;
        while (z<((aux2.length)-1))
        {
          var reg=aux2[z];
          var aux3=reg.split("_");
          var ccodrgo=aux3[0];
          var cdesrgo=aux3[1];
          var cmonrgotab=toFloat2(aux3[2]);
          var ctiprgo=aux3[3];
          var cmonrgo=toFloat2(aux3[4]);
          var ccodpar=aux3[5];

          if (ctiprgo=='M')
          {
            cmonrgo=cmonrgotab;
          }
          else if (ctiprgo=='P')
          {
            cmonrgo= ((monuni*cmonrgotab)/100);
          }
          else
          {cmonrgo=0;}

          cmonrgotabfor=format(cmonrgotab.toFixed(2),'.',',','.');
          cmonrgofor=format(cmonrgo.toFixed(2),'.',',','.');
          cadena=cadena + ccodrgo+'_' + cdesrgo+'_' + cmonrgotabfor +'_'+ ctiprgo +'_' + cmonrgofor +'_' + ccodpar + '!';
          monrgotot=monrgotot+cmonrgo;
          z++;
        }//while
        $(infrecargos).value=cadena;
        $(recargo).value=format(monrgotot.toFixed(2),'.',',','.');
        var monrgototcaj=toFloat(recargo);
        montottot=monuni-mondto+monrgototcaj;
        $(total).value=format(montottot.toFixed(2),'.',',','.');

      }//  if ($(haydist).value!="")
    }//if ($(id1).checked==true)
    ActualizarSaldosGrid('a', ArrTotales_a);
  }
}

function GenerarResumenPartidas(id)
{
  if (id=='' || $('caordcom_compro').value=='N')
  {
    f=0;
    total=150;
    while (f < total)
    {
      var col_fila_codpar_res = "zx_"+f+"_1";
      var col_fila_despar_res = "zx_"+f+"_2";
      var col_fila_monto_res = "zx_"+f+"_3";
      if ($(col_fila_codpar_res).value!="")
      {
        $(col_fila_codpar_res).value="";
        $(col_fila_despar_res).value="";
        $(col_fila_monto_res).value="0,00";
      }
      else
      {
        f=150;
      }
      f++;
    }

    f=0;
    filaresumen=0;
    while (f < $('numero_filas_orden').value)
    {
      var col_fila_codart = "ax_"+f+"_2";
      if ($(col_fila_codart).value!="")
      {
        var col_fila_codpar = "ax_"+f+"_16";
        var col_fila_monto = "ax_"+f+"_13";
        var col_fila_montorec = "ax_"+f+"_12";

        var ncol_fila_monto=toFloat(col_fila_monto);
        var ncol_fila_montorec=toFloat(col_fila_montorec);
        var cal= ncol_fila_monto - ncol_fila_montorec;

        j=0;
        total=150;
        encontro=false;
        while (j < total)
        {
          var col_fila_codpar_res = "zx_"+j+"_1";
          var col_fila_despar_res = "zx_"+j+"_2";
          var col_fila_monto_res = "zx_"+j+"_3";
          if ($(col_fila_codpar_res).value!="")
          {
            if ($(col_fila_codpar_res).value==$(col_fila_codpar).value)
            {
              totalart=cal;
              totalpar=toFloat(col_fila_monto_res);
              totaltotal=totalpar+totalart;
              $(col_fila_monto_res).value=format(totaltotal.toFixed(2),'.',',','.');
              j=150;
              encontro=true;
            }
          }
          else
          {j=150;}
          j++;
        }
        if (!encontro)
        {
          var col_fila_codpar_res = "zx_"+filaresumen+"_1";
          var col_fila_despar_res = "zx_"+filaresumen+"_2";
          var col_fila_monto_res = "zx_"+filaresumen+"_3";
          $(col_fila_codpar_res).value=$(col_fila_codpar).value;
          $(col_fila_monto_res).value=format(cal.toFixed(2),'.',',','.');
          filaresumen++;
        }
      }
      else
        f=150;
      f++;
    }
    GenerarResumenPartidasRecargo(id,filaresumen);
  }

}


function GenerarResumenPartidasRecargo(id,filaresumen)
{
  f=0;
  while (f < $('numero_filas_orden').value)
  {
    var col_fila_codart = "ax_"+f+"_2";
    if ($(col_fila_codart).value!="")
    {
      var col_fila_rec = "ax_"+f+"_18";
      var col_fila_monto = "ax_"+f+"_13";
      var distrib=$(col_fila_rec).value;
      if (distrib!="")
      {
        var aux2=distrib.split("!");

        var z=0;
        while (z<((aux2.length)-1))
        {
          var reg=aux2[z];
          var aux3=reg.split("_");
          var ccodrgo=aux3[0];
          var cdesrgo=aux3[1];
          var cmonrgoc=aux3[2];
          var ctiprgo=aux3[3];
          var cmonrgo=aux3[4];
          var ccodpar=aux3[5];

          j=0;
          total=150;
          encontro=false;
          while (j < total)
          {
            var col_fila_codpar_res = "zx_"+j+"_1";
            var col_fila_despar_res = "zx_"+j+"_2";
            var col_fila_monto_res = "zx_"+j+"_3";
            if ($(col_fila_codpar_res).value!="")
            {
              if ($(col_fila_codpar_res).value==ccodpar)
              {
                totalart=toFloat2(cmonrgo);
                totalpar=toFloat(col_fila_monto_res);
                totaltotal=totalpar+totalart;
                $(col_fila_monto_res).value=format(totaltotal.toFixed(2),'.',',','.');
                j=150;
                encontro=true;
              }
            }
            else
            {j=150;}
            j++;
          }
          if (!encontro)
          {
            var col_fila_codpar_res = "zx_"+filaresumen+"_1";
            var col_fila_despar_res = "zx_"+filaresumen+"_2";
            var col_fila_monto_res = "zx_"+filaresumen+"_3";
            $(col_fila_codpar_res).value=ccodpar;
            var totalart=toFloat2(cmonrgo);
            $(col_fila_monto_res).value=format(totalart.toFixed(2),'.',',','.');
            filaresumen++;
          }
          z++;
        }
      }
    }
    else
      f=150;
    f++;
  }
}

function otra()
{

}

function aplicarAnteriores(ida)
{
  var aux = ida.split("_");
  var name=aux[0];
  var fil=parseInt(aux[1]);

  var infrecargos="ax"+"_0_18";
  var distrib=$(infrecargos).value;
  var articulo="ax"+"_0_2";
  var valorarticulo=$(articulo).value;
  if (valorarticulo!="" && fil!=0)
  {
    if (distrib!="")
    {
      var codart="ax"+"_"+fil+"_2";
      if ($(codart).value!="")
      {
        var id="ax"+"_"+fil+"_1";

        var canord="ax"+"_"+fil+"_5";
        var canaju="ax"+"_"+fil+"_6";
        var canrec="ax"+"_"+fil+"_7";
        var cost="ax"+"_"+fil+"_9";
        var dest="ax"+"_"+fil+"_11";
        var recargo="ax"+"_"+fil+"_12";
        var total="ax"+"_"+fil+"_13";
        var haydistribucion="ax"+"_"+fil+"_18";

        var valcanord=toFloat(canord);
        var valcanaju=toFloat(canaju);
        var valcanrec=toFloat(canrec);
        var moncos=toFloat(cost);
        var mondto=toFloat(dest);

        var cantot=valcanord-valcanaju-valcanrec;
        var monuni=moncos*cantot;
        var monrgotot=0;
        var cadena="";

        var z=0;
        var aux2=distrib.split("!");
        while (z<((aux2.length)-1))
        {
          var reg=aux2[z];
          var aux3=reg.split("_");
          var ccodrgo=aux3[0];
          var cdesrgo=aux3[1];
          var cmonrgotab=toFloat2(aux3[2]);
          var ctiprgo=aux3[3];
          var cmonrgo=toFloat2(aux3[4]);
          var ccodpar=aux3[5];

          if (ctiprgo=='M')
          {
            cmonrgo=cmonrgotab;
          }
          else if (ctiprgo=='P')
          {
            cmonrgo= ((monuni*cmonrgotab)/100);
          }
          else
          {cmonrgo=0;}

          cmonrgotabfor=format(cmonrgotab.toFixed(2),'.',',','.');
          cmonrgofor=format(cmonrgo.toFixed(2),'.',',','.');
          cadena=cadena + ccodrgo+'_' + cdesrgo+'_' + cmonrgotabfor +'_'+ ctiprgo +'_' + cmonrgofor +'_' + ccodpar + '!';
          monrgotot=monrgotot+cmonrgo;
          z++;
        }//while

        $(haydistribucion).value=cadena;
        $(recargo).value=format(monrgotot.toFixed(2),'.',',','.');
        montottot=monuni-mondto+monrgotot;
        $(total).value=format(montottot.toFixed(2),'.',',','.');
        $(id).checked=true;
      }//if ($(codart).value!="")

      ActualizarSaldosGrid('a', ArrTotales_a);
    }// if (distrib!="")
    else
    {
      alert_("No han sido aplicados Recargos al primer Art&iacute;culo del Detalle, C&oacute;digo: "+ valorarticulo+". Deben ser definidos estos Recargos para poder replicarlos al resto de los Art&iacute;culo del Detalle de la Solicitud ")
    }
  }
}

function limpiardatos()
{
  if ($('caordcom_tipopro').value=='P'){
    var f=0;
    while (f < $('numero_filas_orden').value)
    {
      var filacheck = "ax_"+f+"_1";
      var filarecargo = "ax_"+f+"_12";
      var filatotal = "ax_"+f+"_13";
      var filadatrec = "ax_"+f+"_18";

      var num1=toFloat(filarecargo);
      var num2=toFloat(filatotal);

      var calculo= num2 - num1;
      $(filatotal).value=format(calculo.toFixed(2),'.',',','.');

      $(filacheck).value=false;
      $(filarecargo).value="0,00";
      $(filadatrec).value="";

      f++;
    }

    ActualizarSaldosGrid('a', ArrTotales_a);
  }


}


Event.observe(window, 'load', function() {
  $('tabla_a').observe('change', function(event) {
    if(event.target.hasClassName('acol5') || event.target.hasClassName('acol9') || event.target.hasClassName('acol11') || event.target.hasClassName('acol12')){
      ActualizarSaldosGrid("a",ArrTotales_a);
    }else if(event.target.hasClassName('acol2') || event.target.hasClassName('acol4')){
      verificar_codigo_repetido(event.target);
    } else return true;
  });


  $('tabla_r').observe('change', function(event) {
    if(event.target.hasClassName('rcol1')){
      ActualizarSaldosGrid("r",ArrTotales_r);
    }
    else return true;
  });
});

function generarEntregas()
{

  paramsA  = serializeGrid('a','0','2',$('ax_0_2'));
  paramsB  = serializeGrid('c','0','1',$('cx_0_1'));

  //for(i=0;i<adicionales.length;i++) param += '&'+adicionales[i]+'='+$(adicionales[i]).value;

  params = '&'+paramsA+'&'+paramsB;

  new Ajax.Updater('gridentregas', '/compras'+getEnv()+'.php/almordcomv2/entregas', {
      asynchronous:true,
      evalScripts:true,
      onComplete:
          function(request, json){
              AjaxJSON(request, json)
          },
      parameters:params
      });

}

function generarResumen()
{

  paramsA  = serializeGrid('a','0','2',$('ax_0_2'));
  paramsB  = serializeGrid('r','0','1',$('rx_0_1'));

  //for(i=0;i<adicionales.length;i++) param += '&'+adicionales[i]+'='+$(adicionales[i]).value;

  params = '&'+paramsA+'&'+paramsB;

  new Ajax.Updater('gridresumen', '/compras'+getEnv()+'.php/almordcomv2/resumen', {
      asynchronous:true,
      evalScripts:true,
      onComplete:
          function(request, json){
              AjaxJSON(request, json)
          },
      parameters:params
      });


}

function generarResumenPartidas()
{

  paramsA  = serializeGrid('a','0','2',$('ax_0_2'));

  new Ajax.Updater('gridresumenpartidas', '/compras'+getEnv()+'.php/almordcomv2/resumenpartidas', {
      asynchronous:true,
      evalScripts:true,
      onComplete:
          function(request, json){
              AjaxJSON(request, json)
          },
      parameters:paramsA
      });


}


function generarDespachos()
{

  paramsA  = serializeGrid('a','0','2',$('ax_0_2'));

  new Ajax.Updater('griddespachos', '/compras'+getEnv()+'.php/almordcomv2/despachos', {
      asynchronous:true,
      evalScripts:true,
      onComplete:
          function(request, json){
              AjaxJSON(request, json)
          },
      parameters:paramsA
      });


}
