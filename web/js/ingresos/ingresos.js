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

   function mostrarDivPersona(id){
      if ($(id).value=='P'){
        $('divDatos Profesional').show();
        $('divDatos Empresa').hide();
      }
      else { $('divDatos Profesional').hide(); $('divDatos Empresa').show(); }
  }

    function ocultarDivE(Id){
    if ($(id).value=='P'){
      $('divDatos Profesional').show();
      $('divDatos Empresa').hide();
     }else{$('divDatos Profesional').hide();
      $('divDatos Empresa').show(); }
      }

     function ocultarDivP(){
      $('divDatos Profesional').hide();
      $('divDatos Empresa').show();
     }

     function mostrarDivConcepto(id){
      if ($(id).value=='I'){
        $('diviningprof_id').show();
        $('divinmulta_id').hide();
      }
      else { $('diviningprof_id').hide(); $('divinmulta_id').show(); }
     }

     function ocultarDivM(){
      $('diviningprof_id').show();
      $('divinmulta_id').hide();
     }

     function ocultarDivI(){
      $('diviningprof_id').hide();
      $('divinmulta_id').show();
     }


     function validar(id){

     if ($(id).value!=''){

     $('divmoncan').hide();
     }
     }

     function mostrarDivRefMov(){

      $('divrefere').show();
     }

     function ocultarDivRefMov(){

      $('divrefere').hide();
     }
