<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
    require_once("../../lib/general/Herramientas.class.php");
    require_once("../../lib/modelo/sqls/ciudadanos/Atreclamo.class.php");
	class pdfreporte extends fpdf
	{
		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->cab = new Cabecera();
			$this->iddes=H::GetPost("iddes");
			$this->idhas=H::GetPost("idhas");
			$this->fechades=H::GetPost("fechades");
			$this->fechahas=H::GetPost("fechahas");
			$this->cedula=H::GetPost("cedula");
			$this->atreclamo = new Atreclamo();
		    $this->arrp = $this->atreclamo->Sqlp($this->iddes,$this->idhas,$this->fechades,$this->                          fechahas,$this->cedula);
			$this->llenartitulosmaestro();
			$this->setautoPagebreak(true,25);

/*print '<pre>';
						print_r(  $this->arrp);
						 print '</pre>';
					exit;*/
		}

		function llenartitulosmaestro()
				{
				$this->titulosm[]="Código";
				$this->titulosm[]="Cédula";
				$this->titulosm[]="Nombre";
				$this->titulosm[]="Teléfono";
				$this->titulosm[]="Descripción";
				$this->titulosm[]="Unidad";
				$this->titulosm[]="Fecha";
				$this->titulosm[]="Fecha Reclamo";
				$this->titulosm[]="Respuesta";
				//$this->titulosm[]="Descripción";
				$this->anchosm=array(20,20,30,30,70,30,20,20,30);
				$this->alinem=array("C","L","L","L","L","L","L","L","L");
				}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s");
			//$this->getCabecera(H::GetPost("titulo"),"");
			$this->settextcolor(155,0,0);
			$this->setFont("Arial","B",9);
			$this->setwidths($this->anchosm);
			$this->setaligns($this->alinem);
			$this->row($this->titulosm);
			$this->Line(10,$this->getY(),270,$this->getY());
			$this->ln();
			$this->setFont("Arial","B",8);
			$this->settextcolor(0,0,0);
				$this->setwidths($this->anchosm);
				$this->setaligns($this->alinem);
		}
		function Cuerpo()
		{
			$tot_obr=0;
			$tot_gen=0;
			$this->setwidths($this->anchosm);
			$this->setaligns($this->alinem);
			$id=$this->arrp[0]["id"]; //1
			// el primero
			$this->setFont("Arial","B",7);
			foreach($this->arrp as $dato)
			{
			    $this->setFont("Arial","B",7);
				$this->setx(10);
			//	$this->rowM(array($dato["id"],$dato["desrec"],$dato["desuni"],
				//            $dato["fechaa"],$dato["fechar"]));
				$this->rowM($dato);
			}

		}
	}
?>