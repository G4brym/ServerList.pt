<?php

class Votifier{
	
	public static function newVote($sServerIP, $iVotifierPort, $sPublicKey, $sUsername)
	{
		try{
			
		$sServerIP		= $sServerIP;
		$iVotifierPort	= $iVotifierPort;
		$sPublicKey		= $sPublicKey;
		$sPublicKey		= wordwrap($sPublicKey, 65, "\n", true); // Pharse the public key
		$sPublicKey		= <<<EOF
-----BEGIN PUBLIC KEY-----
$sPublicKey
-----END PUBLIC KEY-----
EOF;
		$sUsername		= preg_replace('/[^A-Za-z0-9_]+/', '', $sUsername);
		$sUserAddress	= $_SERVER["HTTP_CF_CONNECTING_IP"];
		$iVoteTimeStamp	= time();
		$sServerlist	= 'ServerList.pt';

		// Details of the vote
		$sVoteString = 'VOTE' . "\n" . $sServerlist . "\n" . $sUsername . "\n" . $sUserAddress . "\n" . $iVoteTimeStamp . "\n";
		// Fill blanks to make packet lenght 256
		$leftover = (256 - strlen($sVoteString)) / 2;
		while($leftover > 0)
		{
			$sVoteString .= "\x0";
			$leftover--;
		}
		// Encrypt the string
		openssl_public_encrypt($sVoteString, $sCryptedPublicKey, $sPublicKey);
		// Try connect to server
		$oSocket = fsockopen($sServerIP, $iVotifierPort, $errno, $errstr, 3);
		if($oSocket)
		{
			fwrite($oSocket, $sCryptedPublicKey); // On success send encrypted packet to server
			return true;
		} else {
			return false;
		}
		
		} catch (Exception $e) {
			return false;
		}
	}
}