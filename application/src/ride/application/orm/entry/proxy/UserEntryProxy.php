<?php

namespace ride\application\orm\entry\proxy;

use ride\library\orm\entry\EntryProxy;
use ride\library\orm\model\Model;
use ride\web\security\model\orm\entry\UserEntry;

/**
 * Generated proxy for an entry of the User model
 * 
 * NOTE: Do not edit this class
 */
class UserEntryProxy extends UserEntry implements EntryProxy {

    /**
     * Instance of the User model
     * @var \ride\library\orm\model\Model
     */
    protected $_model;

    /**
     * Array with the loaded values of the fields
     * @var array
     */
    private $loadedValues;

    /**
     * Array with the load status of the fields
     * @var array
     */
    private $loadedFields;

    /**
     * Construct a new User entry proxy
     * @param \ride\library\orm\model\Model $model Instance of the User model
     * @param integer $id Id of the entry
     * @param array $properties Values of the known properties
     * @return null
     */
    public function __construct(Model $model, $id, array $properties = array()) {
        $this->_model = $model;
        $this->loadedValues = array();
        $this->loadedFields = array();
        $this->id = $id;
        
        if ($id) {
            $this->entryState = self::STATE_CLEAN;
        } else {
            $this->entryState = self::STATE_NEW;
        }
        
        $this->setLoadedValues($properties);
    }

    /**
     * Removes the link with the ORM
     * @return null
     */
    public function unlink() {
        $this->_model = null;
        
        foreach ($this->loadedFields as $property => $loadState) {
            if ($this->$property instanceof EntryProxy) {
                $this->$property->unlink();
            }
            if (isset($this->loadedValues[$property])) {
                if ($this->loadedValues[$property] instanceof EntryProxy) {
                    $this->loadedValues[$property]->unlink();
                } elseif (is_array($this->loadedValues[$property])) {
                    foreach ($this->loadedValues[$property] as $key => $value) {
                        if ($value instanceof EntryProxy) {
                            $value->unlink();
                        }
                    }
                }
            }
        
            if (is_array($this->$property)) {
                foreach ($this->$property as $key => $value) {
                    if ($value instanceof EntryProxy) {
                        $value->unlink();
                    }
                }
            }
        }
    }

    /**
     * Processes the value for the state, clones all instances
     * @param mixed $value Value to process
     * @return null
     */
    protected function processLoadedValue($value) {
        if (is_object($value)) {
            return clone $value;
        } elseif (is_array($value)) {
            foreach ($value as $i => $iValue) {
                $value[$i] = $this->processLoadedValue($iValue);
            }
        }
        
        return $value;
    }

    /**
     * Sets the loaded value of the data source
     * @param string|array $fieldName Field name of the provided value or an array with values of multiple fields
     * @param mixed $value Value of the provided field
     * @return null
     */
    public function setLoadedValues($fieldName, $value = NULL) {
        if (!is_array($fieldName)) {
            $values = array($fieldName => $value);
        } else {
            $values = $fieldName;
        
            $this->loadedValues = array();
        }
        
        foreach ($values as $fieldName => $value) {
            if (!isset($this->loadedValues[$fieldName])) {
                $this->$fieldName = $value;
            }
        
            $this->loadedValues[$fieldName] = $this->processLoadedValue($value);
            $this->loadedFields[$fieldName] = true;
        }
    }

    /**
     * Sets the loaded value of the data source
     * @param string $fieldName Name of the field
     * @return null
     */
    public function getLoadedValues($fieldName = NULL) {
        if (!$fieldName) {
            return $this->loadedValues;
        } elseif (isset($this->loadedValues[$fieldName])) {
            return $this->loadedValues[$fieldName];
        } else {
            return null;
        }
    }

    /**
     * Checks if a the value of a field is loaded
     * @param string $fieldName Name of the field
     * @return boolean
     */
    public function isValueLoaded($fieldName) {
        return array_key_exists($fieldName, $this->loadedValues);
    }

    /**
     * Checks if a field is set
     * @param string $fieldName Name of the field
     * @return boolean
     */
    public function isFieldSet($fieldName) {
        return isset($this->loadedFields[$fieldName]);
    }

    /**
     * Loads the values of the properties of this User entry
     * @return null
     */
    private function loadProperties() {
        $id = $this->getId();
        if (!$id) {
            return;
        }
        
        $query = $this->_model->createQuery();
        $query->setRecursiveDepth(0);
        $query->addCondition('{id} = %1%', $id);
        $entry = $query->queryFirst();
        
        if (!$entry) {
            $this->loadedFields['username'] = true;
            $this->loadedFields['password'] = true;
            $this->loadedFields['name'] = true;
            $this->loadedFields['email'] = true;
            $this->loadedFields['isEmailConfirmed'] = true;
            $this->loadedFields['image'] = true;
            $this->loadedFields['isActive'] = true;
            $this->loadedFields['isSuperUser'] = true;
            $this->loadedFields['lastIp'] = true;
            $this->loadedFields['dateLastLogin'] = true;
            $this->loadedFields['version'] = true;
            $this->loadedFields['dateAdded'] = true;
            $this->loadedFields['dateModified'] = true;
        
            $this->entryState = self::STATE_NEW;
        
            return;
        }
        
        if (!isset($this->loadedFields['username'])) {
            $this->username = $entry->getUsername();
            $this->loadedValues['username'] = $entry->loadedValues['username'];
            $this->loadedFields['username'] = true;
        }
        if (!isset($this->loadedFields['password'])) {
            $this->password = $entry->getPassword();
            $this->loadedValues['password'] = $entry->loadedValues['password'];
            $this->loadedFields['password'] = true;
        }
        if (!isset($this->loadedFields['name'])) {
            $this->name = $entry->getName();
            $this->loadedValues['name'] = $entry->loadedValues['name'];
            $this->loadedFields['name'] = true;
        }
        if (!isset($this->loadedFields['email'])) {
            $this->email = $entry->getEmail();
            $this->loadedValues['email'] = $entry->loadedValues['email'];
            $this->loadedFields['email'] = true;
        }
        if (!isset($this->loadedFields['isEmailConfirmed'])) {
            $this->isEmailConfirmed = $entry->isEmailConfirmed();
            $this->loadedValues['isEmailConfirmed'] = $entry->loadedValues['isEmailConfirmed'];
            $this->loadedFields['isEmailConfirmed'] = true;
        }
        if (!isset($this->loadedFields['image'])) {
            $this->image = $entry->getImage();
            $this->loadedValues['image'] = $entry->loadedValues['image'];
            $this->loadedFields['image'] = true;
        }
        if (!isset($this->loadedFields['isActive'])) {
            $this->isActive = $entry->isActive();
            $this->loadedValues['isActive'] = $entry->loadedValues['isActive'];
            $this->loadedFields['isActive'] = true;
        }
        if (!isset($this->loadedFields['isSuperUser'])) {
            $this->isSuperUser = $entry->isSuperUser();
            $this->loadedValues['isSuperUser'] = $entry->loadedValues['isSuperUser'];
            $this->loadedFields['isSuperUser'] = true;
        }
        if (!isset($this->loadedFields['lastIp'])) {
            $this->lastIp = $entry->getLastIp();
            $this->loadedValues['lastIp'] = $entry->loadedValues['lastIp'];
            $this->loadedFields['lastIp'] = true;
        }
        if (!isset($this->loadedFields['dateLastLogin'])) {
            $this->dateLastLogin = $entry->getDateLastLogin();
            $this->loadedValues['dateLastLogin'] = $entry->loadedValues['dateLastLogin'];
            $this->loadedFields['dateLastLogin'] = true;
        }
        if (!isset($this->loadedFields['version'])) {
            $this->version = $entry->getVersion();
            $this->loadedValues['version'] = $entry->loadedValues['version'];
            $this->loadedFields['version'] = true;
        }
        if (!isset($this->loadedFields['dateAdded'])) {
            $this->dateAdded = $entry->getDateAdded();
            $this->loadedValues['dateAdded'] = $entry->loadedValues['dateAdded'];
            $this->loadedFields['dateAdded'] = true;
        }
        if (!isset($this->loadedFields['dateModified'])) {
            $this->dateModified = $entry->getDateModified();
            $this->loadedValues['dateModified'] = $entry->loadedValues['dateModified'];
            $this->loadedFields['dateModified'] = true;
        }
    }

    /**
     * Loads the value of a relation field of this User entry
     * @param string $fieldName Name of the relation field
     * @return null
     */
    private function loadRelation($fieldName) {
        $id = $this->getId();
        if (!$id) {
            return;
        }
        
        $query = $this->_model->createQuery();
        $entry = $query->queryRelation($this->getId(), $fieldName);
        
        $getterMethodName = 'get' . ucfirst($fieldName);
        $this->$fieldName = $entry->$getterMethodName();
        $this->loadedValues[$fieldName] = $entry->loadedValues[$fieldName];
        $this->loadedFields[$fieldName] = true;
    }

    /**
     * @param string $username 
     * @return null
     */
    public function setUsername($username) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('username', $this->loadedValues)) {
            $oldValue = $this->loadedValues['username'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['username'])) {
            $oldValue = $this->getUsername();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $username)  {
            return;
        }
        
        $this->loadedFields['username'] = true;
        
        return parent::setUsername($username);
    }

    /**
     * @return string
     */
    public function getUsername() {
        if (!isset($this->loadedFields['username'])) {
            $this->loadProperties();
        }
        
        return parent::getUsername();
    }

    /**
     * @param string $password 
     * @return null
     */
    public function setPassword($password) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('password', $this->loadedValues)) {
            $oldValue = $this->loadedValues['password'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['password'])) {
            $oldValue = $this->getPassword();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $password)  {
            return;
        }
        
        $this->loadedFields['password'] = true;
        
        return parent::setPassword($password);
    }

    /**
     * @return string
     */
    public function getPassword() {
        if (!isset($this->loadedFields['password'])) {
            $this->loadProperties();
        }
        
        return parent::getPassword();
    }

    /**
     * @param string $name 
     * @return null
     */
    public function setName($name) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('name', $this->loadedValues)) {
            $oldValue = $this->loadedValues['name'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['name'])) {
            $oldValue = $this->getName();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $name)  {
            return;
        }
        
        $this->loadedFields['name'] = true;
        
        return parent::setName($name);
    }

    /**
     * @return string
     */
    public function getName() {
        if (!isset($this->loadedFields['name'])) {
            $this->loadProperties();
        }
        
        return parent::getName();
    }

    /**
     * @param string $email 
     * @return null
     */
    public function setEmail($email) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('email', $this->loadedValues)) {
            $oldValue = $this->loadedValues['email'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['email'])) {
            $oldValue = $this->getEmail();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $email)  {
            return;
        }
        
        $this->loadedFields['email'] = true;
        
        return parent::setEmail($email);
    }

    /**
     * @return string
     */
    public function getEmail() {
        if (!isset($this->loadedFields['email'])) {
            $this->loadProperties();
        }
        
        return parent::getEmail();
    }

    /**
     * @param boolean $isEmailConfirmed 
     * @return null
     */
    public function setIsEmailConfirmed($isEmailConfirmed) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('isEmailConfirmed', $this->loadedValues)) {
            $oldValue = $this->loadedValues['isEmailConfirmed'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['isEmailConfirmed'])) {
            $oldValue = $this->getIsEmailConfirmed();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $isEmailConfirmed)  {
            return;
        }
        
        $this->loadedFields['isEmailConfirmed'] = true;
        
        return parent::setIsEmailConfirmed($isEmailConfirmed);
    }

    /**
     * @return boolean
     */
    public function isEmailConfirmed() {
        if (!isset($this->loadedFields['isEmailConfirmed'])) {
            $this->loadProperties();
        }
        
        return parent::isEmailConfirmed();
    }

    /**
     * @param string $image 
     * @return null
     */
    public function setImage($image) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('image', $this->loadedValues)) {
            $oldValue = $this->loadedValues['image'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['image'])) {
            $oldValue = $this->getImage();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $image)  {
            return;
        }
        
        $this->loadedFields['image'] = true;
        
        return parent::setImage($image);
    }

    /**
     * @return string
     */
    public function getImage() {
        if (!isset($this->loadedFields['image'])) {
            $this->loadProperties();
        }
        
        return parent::getImage();
    }

    /**
     * @param array $userPreferences 
     * @return null
     */
    public function setUserPreferences(array $userPreferences = array()) {
        $this->loadedFields['userPreferences'] = true;
        
        return parent::setUserPreferences($userPreferences);
    }

    /**
     * @return array
     */
    public function getUserPreferences() {
        if (!isset($this->loadedFields['userPreferences'])) {
            $this->loadRelation('userPreferences');
        }
        
        return parent::getUserPreferences();
    }

    /**
     * @param array $roles 
     * @return null
     */
    public function setRoles(array $roles = array()) {
        $this->loadedFields['roles'] = true;
        
        return parent::setRoles($roles);
    }

    /**
     * @return array
     */
    public function getRoles() {
        if (!isset($this->loadedFields['roles'])) {
            $this->loadRelation('roles');
        }
        
        return parent::getRoles();
    }

    /**
     * @param boolean $isActive 
     * @return null
     */
    public function setIsActive($isActive) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('isActive', $this->loadedValues)) {
            $oldValue = $this->loadedValues['isActive'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['isActive'])) {
            $oldValue = $this->getIsActive();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $isActive)  {
            return;
        }
        
        $this->loadedFields['isActive'] = true;
        
        return parent::setIsActive($isActive);
    }

    /**
     * @return boolean
     */
    public function isActive() {
        if (!isset($this->loadedFields['isActive'])) {
            $this->loadProperties();
        }
        
        return parent::isActive();
    }

    /**
     * @param boolean $isSuperUser 
     * @return null
     */
    public function setIsSuperUser($isSuperUser) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('isSuperUser', $this->loadedValues)) {
            $oldValue = $this->loadedValues['isSuperUser'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['isSuperUser'])) {
            $oldValue = $this->getIsSuperUser();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $isSuperUser)  {
            return;
        }
        
        $this->loadedFields['isSuperUser'] = true;
        
        return parent::setIsSuperUser($isSuperUser);
    }

    /**
     * @return boolean
     */
    public function isSuperUser() {
        if (!isset($this->loadedFields['isSuperUser'])) {
            $this->loadProperties();
        }
        
        return parent::isSuperUser();
    }

    /**
     * @param string $lastIp 
     * @return null
     */
    public function setLastIp($lastIp) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('lastIp', $this->loadedValues)) {
            $oldValue = $this->loadedValues['lastIp'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['lastIp'])) {
            $oldValue = $this->getLastIp();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $lastIp)  {
            return;
        }
        
        $this->loadedFields['lastIp'] = true;
        
        return parent::setLastIp($lastIp);
    }

    /**
     * @return string
     */
    public function getLastIp() {
        if (!isset($this->loadedFields['lastIp'])) {
            $this->loadProperties();
        }
        
        return parent::getLastIp();
    }

    /**
     * @param integer $dateLastLogin 
     * @return null
     */
    public function setDateLastLogin($dateLastLogin) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('dateLastLogin', $this->loadedValues)) {
            $oldValue = $this->loadedValues['dateLastLogin'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['dateLastLogin'])) {
            $oldValue = $this->getDateLastLogin();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $dateLastLogin)  {
            return;
        }
        
        $this->loadedFields['dateLastLogin'] = true;
        
        return parent::setDateLastLogin($dateLastLogin);
    }

    /**
     * @return integer
     */
    public function getDateLastLogin() {
        if (!isset($this->loadedFields['dateLastLogin'])) {
            $this->loadProperties();
        }
        
        return parent::getDateLastLogin();
    }

    /**
     * @param integer $version 
     * @return null
     */
    public function setVersion($version) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('version', $this->loadedValues)) {
            $oldValue = $this->loadedValues['version'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['version'])) {
            $oldValue = $this->getVersion();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $version)  {
            return;
        }
        
        $this->loadedFields['version'] = true;
        
        return parent::setVersion($version);
    }

    /**
     * @return integer
     */
    public function getVersion() {
        if (!isset($this->loadedFields['version'])) {
            $this->loadProperties();
        }
        
        return parent::getVersion();
    }

    /**
     * @param integer $dateAdded 
     * @return null
     */
    public function setDateAdded($dateAdded) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('dateAdded', $this->loadedValues)) {
            $oldValue = $this->loadedValues['dateAdded'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['dateAdded'])) {
            $oldValue = $this->getDateAdded();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $dateAdded)  {
            return;
        }
        
        $this->loadedFields['dateAdded'] = true;
        
        return parent::setDateAdded($dateAdded);
    }

    /**
     * @return integer
     */
    public function getDateAdded() {
        if (!isset($this->loadedFields['dateAdded'])) {
            $this->loadProperties();
        }
        
        return parent::getDateAdded();
    }

    /**
     * @param integer $dateModified 
     * @return null
     */
    public function setDateModified($dateModified) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('dateModified', $this->loadedValues)) {
            $oldValue = $this->loadedValues['dateModified'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['dateModified'])) {
            $oldValue = $this->getDateModified();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $dateModified)  {
            return;
        }
        
        $this->loadedFields['dateModified'] = true;
        
        return parent::setDateModified($dateModified);
    }

    /**
     * @return integer
     */
    public function getDateModified() {
        if (!isset($this->loadedFields['dateModified'])) {
            $this->loadProperties();
        }
        
        return parent::getDateModified();
    }

}
