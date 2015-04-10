<?php

namespace ride\application\orm\entry\proxy;

use ride\application\orm\model\TaxonomyTerm;
use ride\application\orm\model\TaxonomyVocabulary;
use ride\library\orm\entry\EntryProxy;
use ride\library\orm\model\Model;

/**
 * Generated proxy for an entry of the TaxonomyTerm model
 * 
 * NOTE: Do not edit this class
 */
class TaxonomyTermEntryProxy extends TaxonomyTerm implements EntryProxy {

    /**
     * Instance of the TaxonomyTerm model
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
     * Construct a new TaxonomyTerm entry proxy
     * @param \ride\library\orm\model\Model $model Instance of the TaxonomyTerm model
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
     * Loads the values of the properties of this TaxonomyTerm entry
     * @return null
     */
    private function loadProperties() {
        $id = $this->getId();
        if (!$id) {
            return;
        }
        
        $query = $this->_model->createQuery(parent::getLocale());
        $query->setFetchUnlocalized(true);
        $query->setRecursiveDepth(0);
        $query->addCondition('{id} = %1%', $id);
        $entry = $query->queryFirst();
        
        if (!$entry) {
            $this->loadedFields['vocabulary'] = true;
            $this->loadedFields['parent'] = true;
            $this->loadedFields['name'] = true;
            $this->loadedFields['description'] = true;
            $this->loadedFields['image'] = true;
            $this->loadedFields['weight'] = true;
            $this->loadedFields['slug'] = true;
            $this->loadedFields['locale'] = true;
        
            $this->entryState = self::STATE_NEW;
        
            return;
        }
        
        if (!isset($this->loadedFields['vocabulary'])) {
            $this->vocabulary = $entry->getVocabulary();
            $this->loadedValues['vocabulary'] = $entry->loadedValues['vocabulary'];
            $this->loadedFields['vocabulary'] = true;
        }
        if (!isset($this->loadedFields['parent'])) {
            $this->parent = $entry->getParent();
            $this->loadedValues['parent'] = $entry->loadedValues['parent'];
            $this->loadedFields['parent'] = true;
        }
        if (!isset($this->loadedFields['name'])) {
            $this->name = $entry->getName();
            $this->loadedValues['name'] = $entry->loadedValues['name'];
            $this->loadedFields['name'] = true;
        }
        if (!isset($this->loadedFields['description'])) {
            $this->description = $entry->getDescription();
            $this->loadedValues['description'] = $entry->loadedValues['description'];
            $this->loadedFields['description'] = true;
        }
        if (!isset($this->loadedFields['image'])) {
            $this->image = $entry->getImage();
            $this->loadedValues['image'] = $entry->loadedValues['image'];
            $this->loadedFields['image'] = true;
        }
        if (!isset($this->loadedFields['weight'])) {
            $this->weight = $entry->getWeight();
            $this->loadedValues['weight'] = $entry->loadedValues['weight'];
            $this->loadedFields['weight'] = true;
        }
        if (!isset($this->loadedFields['slug'])) {
            $this->slug = $entry->getSlug();
            $this->loadedValues['slug'] = $entry->loadedValues['slug'];
            $this->loadedFields['slug'] = true;
        }
        
        $this->setLocale($entry->getLocale());
        $this->setIslocalized($entry->isLocalized());
        $this->loadedFields['locale'] = true;
    }

    /**
     * Loads the value of a relation field of this TaxonomyTerm entry
     * @param string $fieldName Name of the relation field
     * @return null
     */
    private function loadRelation($fieldName) {
        $id = $this->getId();
        if (!$id) {
            return;
        }
        
        $query = $this->_model->createQuery($this->getLocale());
        $query->setFetchUnlocalized(true);
        $entry = $query->queryRelation($this->getId(), $fieldName);
        
        $getterMethodName = 'get' . ucfirst($fieldName);
        $this->$fieldName = $entry->$getterMethodName();
        $this->loadedValues[$fieldName] = $entry->loadedValues[$fieldName];
        $this->loadedFields[$fieldName] = true;
    }

    /**
     * @param \ride\application\orm\model\TaxonomyVocabulary $vocabulary 
     * @return null
     */
    public function setVocabulary(TaxonomyVocabulary $vocabulary = NULL) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('vocabulary', $this->loadedValues)) {
            $oldValue = $this->loadedValues['vocabulary'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['vocabulary'])) {
            $oldValue = $this->getVocabulary();
            $hasOldValue = true;
        }
        if ($hasOldValue && ((!$oldValue && !$vocabulary) || ($oldValue && $vocabulary && $oldValue->getId() === $vocabulary->getId())))  {
            return;
        }
        
        $this->loadedFields['vocabulary'] = true;
        
        return parent::setVocabulary($vocabulary);
    }

    /**
     * @return \ride\application\orm\model\TaxonomyVocabulary
     */
    public function getVocabulary() {
        if (!isset($this->loadedFields['vocabulary'])) {
            $this->loadProperties();
        }
        
        return parent::getVocabulary();
    }

    /**
     * @param \ride\application\orm\model\TaxonomyTerm $parent 
     * @return null
     */
    public function setParent(TaxonomyTerm $parent = NULL) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('parent', $this->loadedValues)) {
            $oldValue = $this->loadedValues['parent'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['parent'])) {
            $oldValue = $this->getParent();
            $hasOldValue = true;
        }
        if ($hasOldValue && ((!$oldValue && !$parent) || ($oldValue && $parent && $oldValue->getId() === $parent->getId())))  {
            return;
        }
        
        $this->loadedFields['parent'] = true;
        
        return parent::setParent($parent);
    }

    /**
     * @return \ride\application\orm\model\TaxonomyTerm
     */
    public function getParent() {
        if (!isset($this->loadedFields['parent'])) {
            $this->loadProperties();
        }
        
        return parent::getParent();
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
     * @param string $description 
     * @return null
     */
    public function setDescription($description) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('description', $this->loadedValues)) {
            $oldValue = $this->loadedValues['description'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['description'])) {
            $oldValue = $this->getDescription();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $description)  {
            return;
        }
        
        $this->loadedFields['description'] = true;
        
        return parent::setDescription($description);
    }

    /**
     * @return string
     */
    public function getDescription() {
        if (!isset($this->loadedFields['description'])) {
            $this->loadProperties();
        }
        
        return parent::getDescription();
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
     * @param integer $weight 
     * @return null
     */
    public function setWeight($weight) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('weight', $this->loadedValues)) {
            $oldValue = $this->loadedValues['weight'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['weight'])) {
            $oldValue = $this->getWeight();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $weight)  {
            return;
        }
        
        $this->loadedFields['weight'] = true;
        
        return parent::setWeight($weight);
    }

    /**
     * @return integer
     */
    public function getWeight() {
        if (!isset($this->loadedFields['weight'])) {
            $this->loadProperties();
        }
        
        return parent::getWeight();
    }

    /**
     * @param string $slug 
     * @return null
     */
    public function setSlug($slug) {
        $hasOldValue = false;
        $oldValue = null;
        if (array_key_exists('slug', $this->loadedValues)) {
            $oldValue = $this->loadedValues['slug'];
            $hasOldValue = true;
        } elseif ($this->id && !isset($this->loadedFields['slug'])) {
            $oldValue = $this->getSlug();
            $hasOldValue = true;
        }
        if ($hasOldValue && $oldValue === $slug)  {
            return;
        }
        
        $this->loadedFields['slug'] = true;
        
        return parent::setSlug($slug);
    }

    /**
     * @return string
     */
    public function getSlug() {
        if (!isset($this->loadedFields['slug'])) {
            $this->loadProperties();
        }
        
        return parent::getSlug();
    }

    /**
     * Gets the locale of this entry
     * @return string Code of the locale
     */
    public function getLocale() {
        if (!isset($this->loadedFields['locale'])) {
            $this->loadProperties();
        }
        
        return parent::getLocale();
    }

    /**
     * Gets whether the entry is localized in the requested locale
     * @return boolean Flag to see if the entry is localized in the requested locale
     */
    public function isLocalized() {
        if (!isset($this->loadedFields['locale'])) {
            $this->loadProperties();
        }
        
        return parent::isLocalized();
    }

}
