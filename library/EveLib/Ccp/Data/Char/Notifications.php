<?php

class EveLib_Ccp_Data_Char_Notifications {


	/**
	 * @todo need to think about a better way of doing this or providing this data
	 * 		 in a more reliable or comprehensive manner.
	 * Enter description here ...
	 * @var unknown_type
	 */
    protected $notificationType = array(
		2 => 'Character deleted',
		3 => 'Give medal to character',
		4 => 'Alliance maintenance bill',
		5 => 'Alliance war declared',
		6 => 'Alliance war surrender',
		7 => 'Alliance war retracted',
		8 => 'Alliance war invalidated by Concord',
		9 => 'Bill issued to a character',
		10 => 'Bill issued to corporation or alliance',
		11 => 'Bill not paid because there\'s not enough ISK available',
		12 => 'Bill, issued by a character, paid',
		13 => 'Bill, issued by a corporation or alliance, paid',
		14 => 'Bounty claimed',
		15 => 'Clone activated',
		16 => 'New corp member application',
		17 => 'Corp application rejected',
		18 => 'Corp application accepted',
		19 => 'Corp tax rate changed',
		20 => 'Corp news report, typically for shareholders',
		21 => 'Player leaves corp',
		22 => 'Corp news, new CEO',
		23 => 'Corp dividend/liquidation, sent to shareholders',
		24 => 'Corp dividend payout, sent to shareholders',
		25 => 'Corp vote created',
		26 => 'Corp CEO votes revoked during voting',
		27 => 'Corp declares war',
		28 => 'Corp war has started',
		29 => 'Corp surrenders war',
		30 => 'Corp retracts war',
		31 => 'Corp war invalidated by Concord',
		32 => 'Container password retrieval',
		33 => 'Contraband or low standings cause an attack or items being confiscated',
		34 => 'First ship insurance',
		35 => 'Ship destroyed, insurance payed',
		36 => 'Insurance contract invalidated/runs out',
		37 => 'Sovereignty claim fails (alliance)',
		38 => 'Sovereignty claim fails (corporation)',
		39 => 'Sovereignty bill late (alliance)',
		40 => 'Sovereignty bill late (corporation)',
		41 => 'Sovereignty claim lost (alliance)',
		42 => 'Sovereignty claim lost (corporation)',
		43 => 'Sovereignty claim acquired (alliance)',
		44 => 'Sovereignty claim acquired (corporation)',
		45 => 'Alliance anchoring alert',
		46 => 'Alliance structure turns vulnerable',
		47 => 'Alliance structure turns invulnerable',
		48 => 'Sovereignty disruptor anchored',
		49 => 'Structure won/lost',
		50 => 'Corp office lease expiration notice',
		51 => 'Clone contract revoked by station manager',
		52 => 'Corp member clones moved between stations',
		53 => 'Clone contract revoked by station manager',
		54 => 'Insurance contract expired',
		55 => 'Insurance contract issued',
		56 => 'Jump clone destroyed',
		57 => 'Jump clone destroyed',
		58 => 'Corporation joining factional warfare',
		59 => 'Corporation leaving factional warfare',
		60 => 'Corporation kicked from factional warfare on startup because of too low standing to the faction',
		61 => 'Character kicked from factional warfare on startup because of too low standing to the faction',
		62 => 'Corporation in factional warfare warned on startup because of too low standing to the faction',
		63 => 'Character in factional warfare warned on startup because of too low standing to the faction',
		64 => 'Character loses factional warfare rank',
		65 => 'Character gains factional warfare rank',
		66 => 'Agent has moved',
		67 => 'Mass transaction reversal message',
		68 => 'Reimbursement message',
		69 => 'Agent locates a character',
		70 => 'Research mission becomes available from an agent',
		71 => 'Agent mission offer expires',
		72 => 'Agent mission times out',
		73 => 'Agent offers a storyline mission',
		74 => 'Tutorial message sent on character creation',
		75 => 'Tower alert',
		76 => 'Tower resource alert',
		77 => 'Station aggression message',
		78 => 'Station state change message',
		79 => 'Station conquered message',
		80 => 'Station aggression message',
		81 => 'Corporation requests joining factional warfare',
		82 => 'Corporation requests leaving factional warfare',
		83 => 'Corporation withdrawing a request to join factional warfare',
		84 => 'Corporation withdrawing a request to leave factional warfare',
		85 => 'Corporation liquidation',
		86 => 'Territorial Claim Unit under attack',
		87 => 'Sovereignty Blockade Unit under attack',
		88 => 'Infrastructure Hub under attack',
		89 => 'Contact notification'
    );
    
    
    public function getNotificationType($notificationTypeID = null){
    	if(null === $notificationTypeID){
    		return $this->notificationType;
    	}
    	if(array_key_exists($notificationTypeID, $this->notificationType)){
    		return $this->notificationType[$notificationTypeID];
    	} else {
    		return false;
    	}
    }
    
    public function parse($message){
    	$message = str_replace('-',"-\n",str_replace(' - '," -   ",$message));
		require_once 'SymfonyComponents/YAML/sfYamlParser.php';
    	$parser = new sfYamlParser();
    	return $data = $parser->parse($message);
    }
    
}

