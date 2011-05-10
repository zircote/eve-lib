<?php
require_once 'Zend/Http/Client.php';
require_once 'Zend/Log.php';
/**
 * EveLib Api Request
 *
 * This is a autogenerated Rmhub migration class.
 *
 * @version $Id:$
 * @license $License: $
 * @author
 * @link
 * @since
 */
class EveLib_Ccp_Api extends Zend_Http_Client
{
    /**
     *
     * @var Zend_Log
     */
    public static $log;
    public static $name = 'EveLib';
    /**
     *
     * @var Zend_Cache_Core
     */
    public static $cache;
    /**
     *
     * the end point url
     * @var string
     */
    private $_url = 'https://api.eve-online.com:443';
    /**
     *
     * API Credentials apiKey, characterID, userID
     * @var array
     */
    private $_credentials = array();
    protected $whitelist = array();
    private $__param = array();
    protected $result;
    public $target;
    private function _prep ($param)
    {
        /* @todo errors or excepltions */
        if (is_array($param)) {
            return implode(',', $param);
        }
        return $param;
    }
    public function __construct ($options = null)
    {
        if (null === $options) {
            $options = array('adapter' => 'Zend_Http_Client_Adapter_Curl',
            'curloptions' => array(CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_SSL_VERIFYPEER => false));
        }
        parent::__construct($this->_url, $options);
        $this->setMethod(self::GET);
    }
    private function _mkParams ($p = array())
    {
        $params = array();
        foreach ($p as $argName => $argValue) {
            if (null !== $argValue) {
                $params[$argName] = $this->_prep($argValue);
            }
        }
        $this->setParams($params);
        $this->__param = array_merge($this->_credentials, $this->__param);
        foreach ($this->__param as $n => $v) {
            if (in_array($n, $this->whitelist)) {
                $this->setParameterGet($n, $this->_prep($v));
            } else {
                unset($this->__param[$n]);
            }
        }
    }
    public function getParams ($apiKey = null, $userID = null, $characterID = null)
    {
        return $this->__param;
    }
    protected function log ($message, $priority = Zend_Log::INFO, $extras = null)
    {
        if (self::$log instanceof Zend_Log)
            self::$log->log($message, $priority, $extras);
        return $this;
    }
    private function _getResult ($apiKey = null, $userID = null, $characterID = null)
    {
        $cacheKey = self::$name .
         str_replace($this->_url, '', $this->getUri(true));
        foreach ($this->getParams() as $key => $value) {
            $cacheKey .= "_{$key}_{$value}";
        }
        $cacheKey = (string) str_replace(array('.', '/', ',', ':', '-', '___'),
        '_', $cacheKey);
        if (self::$cache instanceof Zend_Cache_Core) {
            if (! $this->result = self::$cache->load($cacheKey)) {
                $this->log('REQUEST [NOTCACHED]: ' . $cacheKey);
                $this->request();
                $this->result = new EveLib_Ccp_Api_Response(
                $this->getLastResponse()->getBody());
                $result = $this->result->getResult();
                require_once 'Zend/Date.php';
                $currentTime = new Zend_Date($result['eveapi']['currentTime']);
                $cachedUntil = new Zend_Date(
                array_key_exists('cachedUntil', $result['eveapi']) ? $result['eveapi']['cachedUntil'] : $result['eveapi']['result']['cachedUntil']);
                $lifetime = $cachedUntil->getTimestamp() -
                 $currentTime->getTimestamp();
                self::$cache->setLifetime($lifetime);
                self::$cache->save($this->result, $cacheKey);
            } else {
                $this->log('REQUEST [CACHED]: ' . $cacheKey);
            }
        } else {
            $this->log('REQUEST [CACHE DISABLED]: ' . $cacheKey);
            $this->request();
            $this->result = new EveLib_Ccp_Api_Response(
            $this->getLastResponse()->getBody());
        }
        return $this->result->getResult();
    }
    public function getResult ()
    {
        return $this->result;
    }
    public function setParams (array $params)
    {
        $this->__param = $params;
    }
    public function setCredentials (array $params)
    {
        $this->_credentials = $params;
    }
    /**
     * AccountStatus
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function accountStatus ($apiKey = null, $userID = null)
    {
        $this->whitelist = array('apiKey', 'userID');
        $this->target = '/account/AccountStatus.xml.aspx';
        $this->_mkParams(array('apiKey' => $apiKey, 'userID' => $userID));
        return $this->_getResult();
    }
    /**
     * AccountCharacters
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function accountCharacters ($apiKey = null, $userID = null)
    {
        $this->whitelist = array('apiKey', 'userID');
        $this->_mkParams(array('apiKey' => $apiKey, 'userID' => $userID));
        $this->setUri($this->_url . '/account/Characters.xml.aspx');
        return $this->_getResult();
    }
    /**
     * CharAccountBalance
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function charAccountBalance ($apiKey = null, $userID = null,
    $characterID = null)
    {
        $this->whitelist = array('apiKey', 'userID', 'characterID');
        $this->_mkParams(
        array('apiKey' => $apiKey, 'userID' => $userID,
        'characterID' => $characterID));
        $this->setUri($this->_url . '/char/AccountBalance.xml.aspx');
        return $this->_getResult();
    }
    /**
     * CharAssetList
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function charAssetList ($apiKey = null, $userID = null, $characterID = null)
    {
        $this->whitelist = array('apiKey', 'userID', 'characterID');
        $this->_mkParams(
        array('apiKey' => $apiKey, 'userID' => $userID,
        'characterID' => $characterID));
        $this->setUri($this->_url . '/char/AssetList.xml.aspx');
        return $this->_getResult();
    }
    /**
     * CharCalendarEventAttendees
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function charCalendarEventAttendees ($eventIDs, $apiKey = null,
    $userID = null, $characterID = null)
    {
        $this->whitelist = array('eventIDs', 'apiKey', 'userID', 'characterID');
        $this->_mkParams(
        array('eventIDs' => $eventIDs, 'apiKey' => $apiKey, 'userID' => $userID,
        'characterID' => $characterID));
        $this->setUri($this->_url . '/char/CalendarEventAttendees.xml.aspx');
        return $this->_getResult();
    }
    /**
     * CharCharacterSheet
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function charCharacterSheet ($apiKey = null, $userID = null,
    $characterID = null)
    {
        $this->whitelist = array('apiKey', 'userID', 'characterID');
        $this->_mkParams(
        array('apiKey' => $apiKey, 'userID' => $userID,
        'characterID' => $characterID));
        $this->setUri($this->_url . '/char/CharacterSheet.xml.aspx');
        return $this->_getResult();
    }
    /**
     * CharContactList
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function charContactList ($apiKey = null, $userID = null, $characterID = null)
    {
        $this->whitelist = array('apiKey', 'userID', 'characterID');
        $this->_mkParams(
        array('apiKey' => $apiKey, 'userID' => $userID,
        'characterID' => $characterID));
        $this->setUri($this->_url . '/char/ContactList.xml.aspx');
        return $this->_getResult();
    }
    /**
     * CharContactNotifications
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function charContactNotifications ($apiKey = null, $userID = null,
    $characterID = null)
    {
        $this->whitelist = array('apiKey', 'userID', 'characterID');
        $this->_mkParams(
        array('apiKey' => $apiKey, 'userID' => $userID,
        'characterID' => $characterID));
        $this->setUri($this->_url . '/char/ContactNotifications.xml.aspx');
        return $this->_getResult();
    }
    /**
     * CharFacWarStats
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function charFacWarStats ($apiKey = null, $userID = null, $characterID = null)
    {
        $this->whitelist = array('apiKey', 'userID', 'characterID');
        $this->_mkParams(
        array('apiKey' => $apiKey, 'userID' => $userID,
        'characterID' => $characterID));
        $this->setUri($this->_url . '/char/FacWarStats.xml.aspx');
        return $this->_getResult();
    }
    /**
     * CharIndustryJobs
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function charIndustryJobs ($apiKey = null, $userID = null,
    $characterID = null)
    {
        $this->whitelist = array('apiKey', 'userID', 'characterID');
        $this->_mkParams(
        array('apiKey' => $apiKey, 'userID' => $userID,
        'characterID' => $characterID));
        $this->setUri($this->_url . '/char/IndustryJobs.xml.aspx');
        return $this->_getResult();
    }
    /**
     * CharKilllog
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function charKilllog ($beforeKillID = null, $apiKey = null, $userID = null,
    $characterID = null)
    {
        $this->whitelist = array('beforeKillID', 'apiKey', 'userID',
        'characterID');
        $this->_mkParams(
        array('beforeKillID' => $beforeKillID, 'apiKey' => $apiKey,
        'userID' => $userID, 'characterID' => $characterID));
        $this->setUri($this->_url . '/char/Killlog.xml.aspx');
        return $this->_getResult();
    }
    /**
     * CharMailBodies
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function charMailBodies ($ids, $apiKey = null, $userID = null,
    $characterID = null)
    {
        $this->whitelist = array('apiKey', 'userID', 'characterID');
        $this->_mkParams(
        array('apiKey' => $apiKey, 'userID' => $userID,
        'characterID' => $characterID));
        $this->setUri($this->_url . '/char/MailBodies.xml.aspx');
        return $this->_getResult($apiKey = null, $userID = null,
        $characterID = null);
    }
    /**
     * CharMailingLists
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function charMailingLists ($apiKey = null, $userID = null,
    $characterID = null)
    {
        $this->whitelist = array('apiKey', 'userID', 'characterID');
        $this->_mkParams(
        array('apiKey' => $apiKey, 'userID' => $userID,
        'characterID' => $characterID));
        $this->setUri($this->_url . '/char/MailingLists.xml.aspx');
        return $this->_getResult();
    }
    /**
     * CharMailMessages
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function charMailMessages ($apiKey = null, $userID = null,
    $characterID = null)
    {
        $this->whitelist = array('apiKey', 'userID', 'characterID');
        $this->_mkParams(
        array('apiKey' => $apiKey, 'userID' => $userID,
        'characterID' => $characterID));
        $this->setUri($this->_url . '/char/MailMessages.xml.aspx');
        return $this->_getResult();
    }
    /**
     * CharMarketOrders
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function charMarketOrders ($apiKey = null, $userID = null,
    $characterID = null)
    {
        $this->whitelist = array('apiKey', 'userID', 'characterID');
        $this->_mkParams(
        array('apiKey' => $apiKey, 'userID' => $userID,
        'characterID' => $characterID));
        $this->setUri($this->_url . '/char/MarketOrders.xml.aspx');
        return $this->_getResult();
    }
    /**
     * CharMedals
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function charMedals ($apiKey = null, $userID = null, $characterID = null)
    {
        $this->setUri($this->_url . '/char/Medals.xml.aspx');
        return $this->_getResult();
    }
    /**
     * CharNotifications
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function charNotifications ($apiKey = null, $userID = null,
    $characterID = null)
    {
        $this->whitelist = array('apiKey', 'userID', 'characterID');
        $this->_mkParams(
        array('apiKey' => $apiKey, 'userID' => $userID,
        'characterID' => $characterID));
        $this->setUri($this->_url . '/char/Notifications.xml.aspx');
        return $this->_getResult();
    }
    /**
     * CharNotificationTexts
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function charNotificationTexts ($IDs, $apiKey = null, $userID = null,
    $characterID = null)
    {
        $this->whitelist = array('IDs', 'apiKey', 'userID', 'characterID');
        $this->_mkParams(
        array('IDs' => $IDs, 'apiKey' => $apiKey, 'userID' => $userID,
        'characterID' => $characterID));
        $this->setUri($this->_url . '/char/NotificationTexts.xml.aspx');
        return $this->_getResult();
    }
    /**
     * CharResearch
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function charResearch ($apiKey = null, $userID = null, $characterID = null)
    {
        $this->whitelist = array('apiKey', 'userID', 'characterID');
        $this->_mkParams(
        array('apiKey' => $apiKey, 'userID' => $userID,
        'characterID' => $characterID));
        $this->setUri($this->_url . '/char/Research.xml.aspx');
        return $this->_getResult();
    }
    /**
     * CharSkillInQueue
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function charSkillInQueue ($apiKey = null, $userID = null,
    $characterID = null)
    {
        $this->whitelist = array('apiKey', 'userID', 'characterID');
        $this->_mkParams(
        array('apiKey' => $apiKey, 'userID' => $userID,
        'characterID' => $characterID));
        $this->setUri($this->_url . '/char/SkillInTraining.xml.aspx');
        return $this->_getResult();
    }
    /**
     * CharSkillInTraining
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function charSkillInTraining ($apiKey = null, $userID = null,
    $characterID = null)
    {
        $this->whitelist = array('apiKey', 'userID', 'characterID');
        $this->_mkParams(
        array('apiKey' => $apiKey, 'userID' => $userID,
        'characterID' => $characterID));
        $this->setUri($this->_url . '/char/SkillQueue.xml.aspx');
        return $this->_getResult();
    }
    /**
     * CharStandings
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function charStandings ($apiKey = null, $userID = null, $characterID = null)
    {
        $this->whitelist = array('apiKey', 'userID', 'characterID');
        $this->_mkParams(
        array('apiKey' => $apiKey, 'userID' => $userID,
        'characterID' => $characterID));
        $this->setUri($this->_url . '/char/Standings.xml.aspx');
        return $this->_getResult();
    }
    /**
     * CharUpcomingCalendarEvents
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function charUpcomingCalendarEvents ($apiKey = null, $userID = null,
    $characterID = null)
    {
        $this->whitelist = array('apiKey', 'userID', 'characterID');
        $this->_mkParams(
        array('apiKey' => $apiKey, 'userID' => $userID,
        'characterID' => $characterID));
        $this->setUri($this->_url . '/char/UpcomingCalendarEvents.xml.aspx');
        return $this->_getResult();
    }
    /**
     * CharWalletJournal
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function charWalletJournal ($fromID = null, $rowCount = null, $apiKey = null,
    $userID = null, $characterID = null)
    {
        $this->whitelist = array('fromID', 'rowCount', 'apiKey', 'userID',
        'characterID');
        $this->_mkParams(
        array('fromID' => $fromID, 'rowCount' => $rowCount, 'apiKey' => $apiKey,
        'userID' => $userID, 'characterID' => $characterID));
        $this->setUri($this->_url . '/char/WalletJournal.xml.aspx');
        return $this->_getResult();
    }
    /**
     * CharWalletTransactions
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function charWalletTransactions ($fromID = null, $rowCount = null,
    $apiKey = null, $userID = null, $characterID = null)
    {
        $this->whitelist = array('fromID', 'rowCount', 'apiKey', 'userID',
        'characterID');
        $this->_mkParams(
        array('fromID' => $fromID, 'rowCount' => $rowCount, 'apiKey' => $apiKey,
        'userID' => $userID, 'characterID' => $characterID));
        $this->setUri($this->_url . '/char/WalletTransactions.xml.aspx');
        return $this->_getResult();
    }
    /**
     * CorpAccountBalance
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function corpAccountBalance ($apiKey = null, $userID = null,
    $characterID = null)
    {
        $this->whitelist = array('apiKey', 'userID', 'characterID');
        $this->_mkParams(
        array('apiKey' => $apiKey, 'userID' => $userID,
        'characterID' => $characterID));
        $this->setUri($this->_url . '/corp/AccountBalance.xml.aspx');
        return $this->_getResult();
    }
    /**
     * CorpAssetList
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function corpAssetList ($apiKey = null, $userID = null, $characterID = null)
    {
        $this->whitelist = array('apiKey', 'userID', 'characterID');
        $this->_mkParams(
        array('apiKey' => $apiKey, 'userID' => $userID,
        'characterID' => $characterID));
        $this->setUri($this->_url . '/corp/AssetList.xml.aspx');
        return $this->_getResult();
    }
    /**
     * CorpContactList
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function corpContactList ($apiKey = null, $userID = null, $characterID = null)
    {
        $this->whitelist = array('apiKey', 'userID', 'characterID');
        $this->_mkParams(
        array('apiKey' => $apiKey, 'userID' => $userID,
        'characterID' => $characterID));
        $this->setUri($this->_url . '/corp/ContactList.xml.aspx');
        return $this->_getResult();
    }
    /**
     * CorpContainerLog
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function corpContainerLog ($apiKey = null, $userID = null,
    $characterID = null)
    {
        $this->whitelist = array('apiKey', 'userID', 'characterID');
        $this->_mkParams(
        array('apiKey' => $apiKey, 'userID' => $userID,
        'characterID' => $characterID));
        $this->setUri($this->_url . '/corp/ContactList.xml.aspx');
        return $this->_getResult();
    }
    /**
     * CorpCorporationSheet
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function corpCorporationSheet ($apiKey = null, $userID = null,
    $characterID = null)
    {
        $this->whitelist = array('apiKey', 'userID', 'characterID');
        $this->_mkParams(
        array('apiKey' => $apiKey, 'userID' => $userID,
        'characterID' => $characterID));
        $this->setUri($this->_url . '/corp/CorporationSheet.xml.aspx');
        return $this->_getResult();
    }
    /**
     * CorpFacWarStats
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function corpFacWarStats ($apiKey = null, $userID = null, $characterID = null)
    {
        $this->whitelist = array('apiKey', 'userID', 'characterID');
        $this->_mkParams(
        array('apiKey' => $apiKey, 'userID' => $userID,
        'characterID' => $characterID));
        $this->setUri($this->_url . '/corp/FacWarStats.xml.aspx');
        return $this->_getResult();
    }
    /**
     * CorpIndustryJobs
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function corpIndustryJobs ($apiKey = null, $userID = null,
    $characterID = null)
    {
        $this->whitelist = array('apiKey', 'userID', 'characterID');
        $this->_mkParams(
        array('apiKey' => $apiKey, 'userID' => $userID,
        'characterID' => $characterID));
        $this->setUri($this->_url . '/corp/IndustryJobs.xml.aspx');
        return $this->_getResult();
    }
    /**
     * CorpKilllog
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function corpKilllog ($beforeKillID = null, $apiKey = null, $userID = null,
    $characterID = null)
    {
        $this->whitelist = array('beforeKillID', 'apiKey', 'userID',
        'characterID');
        $this->_mkParams(
        array('beforeKillID' => $beforeKillID, 'apiKey' => $apiKey,
        'userID' => $userID, 'characterID' => $characterID));
        $this->setUri($this->_url . '/corp/Killlog.xml.aspx');
        return $this->_getResult();
    }
    /**
     * CorpMarketOrders
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function corpMarketOrders ($apiKey = null, $userID = null,
    $characterID = null)
    {
        $this->whitelist = array('apiKey', 'userID', 'characterID');
        $this->_mkParams(
        array('apiKey' => $apiKey, 'userID' => $userID,
        'characterID' => $characterID));
        $this->setUri($this->_url . '/corp/MarketOrders.xml.aspx');
        return $this->_getResult();
    }
    /**
     * CorpMedals
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function corpMedals ($apiKey = null, $userID = null, $characterID = null)
    {
        $this->whitelist = array('apiKey', 'userID', 'characterID');
        $this->_mkParams(
        array('apiKey' => $apiKey, 'userID' => $userID,
        'characterID' => $characterID));
        $this->setUri($this->_url . '/corp/Medals.xml.aspx');
        return $this->_getResult();
    }
    /**
     * CorpMemberMedals
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function corpMemberMedals ($apiKey = null, $userID = null,
    $characterID = null)
    {
        $this->whitelist = array('apiKey', 'userID', 'characterID');
        $this->_mkParams(
        array('apiKey' => $apiKey, 'userID' => $userID,
        'characterID' => $characterID));
        $this->setUri($this->_url . '/corp/MemberMedals.xml.aspx');
        return $this->_getResult();
    }
    /**
     * CorpMemberSecurity
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function corpMemberSecurity ($apiKey = null, $userID = null,
    $characterID = null)
    {
        $this->whitelist = array('apiKey', 'userID', 'characterID');
        $this->_mkParams(
        array('apiKey' => $apiKey, 'userID' => $userID,
        'characterID' => $characterID));
        $this->setUri($this->_url . '/corp/MemberSecurity.xml.aspx');
        return $this->_getResult();
    }
    /**
     * CorpMemberSecurityLog
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function corpMemberSecurityLog ($apiKey = null, $userID = null,
    $characterID = null)
    {
        $this->whitelist = array('apiKey', 'userID', 'characterID');
        $this->_mkParams(
        array('apiKey' => $apiKey, 'userID' => $userID,
        'characterID' => $characterID));
        $this->setUri($this->_url . '/corp/MemberSecurityLog.xml.aspx');
        return $this->_getResult();
    }
    /**
     * CorpMemberTracking
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function corpMemberTracking ($apiKey = null, $userID = null,
    $characterID = null)
    {
        $this->whitelist = array('apiKey', 'userID', 'characterID');
        $this->_mkParams(
        array('apiKey' => $apiKey, 'userID' => $userID,
        'characterID' => $characterID));
        $this->setUri($this->_url . '/corp/MemberTracking.xml.aspx');
        return $this->_getResult();
    }
    /**
     * CorpOutpostList
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    //    public function corpOutpostList($apiKey = null, $userID = null, $characterID = null) {
    //        $this->whitelist = array ('apiKey', 'userID', 'characterID' );
    //        $this->_mkParams ( array ('apiKey' => $apiKey, 'userID' => $userID, 'characterID' => $characterID ) );
    //        $this->setUri ( $this->_url . '/corp/OutpostList.xml.aspx' );
    //        return $this->_getResult ();
    //    }
    /**
     * CorpOutpostServiceDetail
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    //    public function corpOutpostServiceDetail($apiKey = null, $userID = null, $characterID = null) {
    //        $this->whitelist = array ('apiKey', 'userID', 'characterID' );
    //        $this->_mkParams ( array ('apiKey' => $apiKey, 'userID' => $userID, 'characterID' => $characterID ) );
    //        $this->setUri ( $this->_url . '/corp/OutpostServiceDetail.xml.aspx' );
    //        return $this->_getResult ();
    //    }
    /**
     * CorpShareholders
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function corpShareholders ($apiKey = null, $userID = null,
    $characterID = null)
    {
        $this->whitelist = array('apiKey', 'userID', 'characterID');
        $this->_mkParams(
        array('apiKey' => $apiKey, 'userID' => $userID,
        'characterID' => $characterID));
        $this->setUri($this->_url . '/corp/Shareholders.xml.aspx');
        return $this->_getResult();
    }
    /**
     * CorpStandings
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function corpStandings ($apiKey = null, $userID = null, $characterID = null)
    {
        $this->whitelist = array('apiKey', 'userID', 'characterID');
        $this->_mkParams(
        array('apiKey' => $apiKey, 'userID' => $userID,
        'characterID' => $characterID));
        $this->setUri($this->_url . '/corp/Standings.xml.aspx');
        return $this->_getResult();
    }
    /**
     * CorpStarbaseDetail
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function corpStarbaseDetail ($itemID, $apiKey = null, $userID = null,
    $characterID = null)
    {
        $this->whitelist = array('itemID', 'apiKey', 'userID', 'characterID');
        $this->_mkParams(
        array('itemID' => $itemID, 'apiKey' => $apiKey, 'userID' => $userID,
        'characterID' => $characterID));
        $this->setUri($this->_url . '/corp/StarbaseDetail.xml.aspx');
        return $this->_getResult();
    }
    /**
     * CorpStarbaseList
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function corpStarbaseList ($apiKey = null, $userID = null,
    $characterID = null)
    {
        $this->whitelist = array('apiKey', 'userID', 'characterID');
        $this->_mkParams(
        array('apiKey' => $apiKey, 'userID' => $userID,
        'characterID' => $characterID));
        $this->setUri($this->_url . '/corp/StarbaseList.xml.aspx');
        return $this->_getResult();
    }
    /**
     * CorpTitles
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function corpTitles ($apiKey = null, $userID = null, $characterID = null)
    {
        $this->whitelist = array('apiKey', 'userID', 'characterID');
        $this->_mkParams(
        array('apiKey' => $apiKey, 'userID' => $userID,
        'characterID' => $characterID));
        $this->setUri($this->_url . '/corp/Titles.xml.aspx');
        return $this->_getResult();
    }
    /**
     * CorpWalletJournal
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function corpWalletJournal ($fromID = null, $rowCount = null,
    $accountKey = null, $apiKey = null, $userID = null, $characterID = null)
    {
        $this->whitelist = array('fromID', 'rowCount', 'accountKey', 'apiKey',
        'userID', 'characterID');
        $this->_mkParams(
        array('fromID' => $fromID, 'rowCount' => $rowCount,
        'accountKey' => $accountKey, 'apiKey' => $apiKey, 'userID' => $userID,
        'characterID' => $characterID));
        $this->setUri($this->_url . '/corp/WalletJournal.xml.aspx');
        return $this->_getResult();
    }
    /**
     * CorpWalletTransactions
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function corpWalletTransactions ($fromID = null, $rowCount = null,
    $accountKey = null, $apiKey = null, $userID = null, $characterID = null)
    {
        $this->whitelist = array('fromID', 'rowCount', 'accountKey', 'apiKey',
        'userID', 'characterID');
        $this->_mkParams(
        array('fromID' => $fromID, 'rowCount' => $rowCount,
        'accountKey' => $accountKey, 'apiKey' => $apiKey, 'userID' => $userID,
        'characterID' => $characterID));
        $this->setUri($this->_url . '/corp/WalletTransactions.xml.aspx');
        return $this->_getResult();
    }
    /**
     * EveAllianceList
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function eveAllianceList ()
    {
        $this->setUri($this->_url . '/eve/AllianceList.xml.aspx');
        return $this->_getResult();
    }
    /**
     * EveCertificateTree
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function eveCertificateTree ()
    {
        $this->setUri($this->_url . '/eve/CertificateTree.xml.aspx');
        return $this->_getResult();
    }
    /**
     * EveCharacterID
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function eveCharacterID ($names)
    {
        $this->whitelist = array('names');
        $this->_mkParams(array('names' => $names));
        $this->setUri($this->_url . '/eve/CharacterID.xml.aspx');
        return $this->_getResult();
    }
    /**
     * EveCharacterInfo
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function eveCharacterInfo ($characterID = null, $apiKey = null,
    $userID = null)
    {
        $this->whitelist = array('apiKey', 'userID', 'characterID');
        $this->_mkParams(
        array('apiKey' => $apiKey, 'userID' => $userID,
        'characterID' => $characterID));
        $this->setUri($this->_url . '/eve/CharacterInfo.xml.aspx');
        return $this->_getResult();
    }
    /**
     * EveCharacterName
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function eveCharacterName ($ids)
    {
        $this->whitelist = array('ids');
        $this->_mkParams(array('ids' => $ids));
        $this->setUri($this->_url . '/eve/CharacterName.xml.aspx');
        return $this->_getResult();
    }
    /**
     * EveConquerableStationList
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function eveConquerableStationList ()
    {
        $this->setUri($this->_url . '/eve/ConquerableStationList.xml.aspx');
        return $this->_getResult();
    }
    /**
     * EveErrorList
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function eveErrorList ()
    {
        $this->setUri($this->_url . '/eve/ErrorList.xml.aspx');
        return $this->_getResult();
    }
    /**
     * EveFacWarStats
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function eveFacWarStats ()
    {
        $this->setUri($this->_url . '/eve/FacWarStats.xml.aspx');
        return $this->_getResult();
    }
    /**
     * EveFacWarTopStats
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function eveFacWarTopStats ()
    {
        $this->setUri($this->_url . '/eve/FacWarTopStats.xml.aspx');
        return $this->_getResult();
    }
    /**
     * EveRefTypes
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function eveRefTypes ()
    {
        $this->setUri($this->_url . '/eve/RefTypes.xml.aspx');
        return $this->_getResult();
    }
    /**
     * EveSkillTree
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function eveSkillTree ()
    {
        $this->setUri($this->_url . '/eve/SkillTree.xml.aspx');
        return $this->_getResult();
    }
    /**
     * MapFacWarSystems
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function mapFacWarSystems ()
    {
        $this->setUri($this->_url . '/map/FacWarSystems.xml.aspx');
        return $this->_getResult();
    }
    /**
     * MapJumps
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function mapJumps ()
    {
        $this->setUri($this->_url . '/map/Jumps.xml.aspx');
        return $this->_getResult();
    }
    /**
     * MapKills
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function mapKills ()
    {
        $this->setUri($this->_url . '/map/Kills.xml.aspx');
        return $this->_getResult();
    }
    /**
     * MapSovereignty
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function mapSovereignty ()
    {
        $this->setUri($this->_url . '/map/Sovereignty.xml.aspx');
        return $this->_getResult();
    }
    /**
     * MapSovereigntyStatus
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    //    public function mapSovereigntyStatus() {
    //        $this->setUri ( $this->_url . '/map/SovereigntyStatus.xml.aspx' );
    //        return $this->_getResult ();
    //    }
    /**
     * MiscImage
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    //    public function miscImage() {
    //        //        $this->setUri('SPECIAL');
    //    }
    /**
     * ServerStatus
     *
     * @param array $$params
     * @return EveLib_Ccp_Api_Result
     */
    public function serverStatus ()
    {
        $this->setUri($this->_url . '/server/ServerStatus.xml.aspx');
        return $this->_getResult();
    }
}

