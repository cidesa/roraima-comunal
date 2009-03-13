<?php

/**
 * Subclass for representing a row from the 'npconsalint' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Npconsalint extends BaseNpconsalint
{
	
	public function getNomnom()
	{
		$c = new Criteria();
		$c->add(NpnominaPeer::CODNOM,self::getCodnom());
		$reg = NpnominaPeer::doSelectOne($c);
		
		if($reg) return $reg->getNomnom();
		else return '';
		
	}

	public function getNomcon()
	{
		$c = new Criteria();
		$c->add(NpdefcptPeer::CODCON,self::getCodcon());
		$reg = NpdefcptPeer::doSelectOne($c);
		
		if($reg) return $reg->getNomcon();
		else return '';
		
	}
	
	
}
