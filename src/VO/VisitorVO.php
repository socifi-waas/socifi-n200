<?php

namespace Socifi\N200\VO;

/**
 * Visitor VO
 *
 * Provides getters and setters for Visitor object.
 *
 * @package Socifi\N200\VO
 */
class VisitorVO extends AbstractVO
{
    const STATE_REGISTERED = 'registered';

    const METHOD_ONLINE = 'online';

    /**
     * @var string Unknown
     */
    private $reference;

    /**
     * @var string Registration status [registered, ...]
     */
    private $registrantState;

    /**
     * @var mixed Unknown
     */
    private $actioncode;

    /**
     * @var mixed Unknown
     */
    private $mailing;

    /**
     * @var mixed Unknown
     */
    private $datause1;

    /**
     * @var mixed Unknown
     */
    private $datause2;

    /**
     * @var mixed Unknown
     */
    private $datause3;

    /**
     * @var string Registration (?) method [online, ...]
     */
    private $method;

    /**
     * @var \DateTime Registration date time
     */
    private $registerTime;

    /**
     * @var mixed Visit time (not sure which visit time, last one?)
     */
    private $visitTime;

    /**
     * @var \DateTime First entry time
     */
    private $firstEntryTime;

    /**
     * @var mixed Unknown
     */
    private $dwellingTime;

    /**
     * @var \DateTime Last exit time
     */
    private $lastExitTime;

    /**
     * @var integer Number of visits
     */
    private $visits;

    /**
     * @var EventVO Event details (name and code)
     */
    private $event;

    /**
     * @var array Contact details
     */
    private $contact;

    /**
     * @var array Form details details
     */
    private $form;

    /**
     * @var array Registration type details
     */
    private $registrationType;

    /**
     * @var array Translation details
     */
    private $translation;

    /**
     * @var array Profile details
     */
    private $profile;

    /**
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param string $reference
     * @return $this
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
        return $this;
    }

    /**
     * @return string
     */
    public function getRegistrantState()
    {
        return $this->registrantState;
    }

    /**
     * @param string $registrantState
     * @return $this
     */
    public function setRegistrantState($registrantState)
    {
        $this->registrantState = $registrantState;
        return $this;
    }

    /**
     * Detects whether the visitor is registered on event
     *
     * @return bool
     */
    public function isRegistered()
    {
        return $this->getRegistrantState() === self::STATE_REGISTERED;
    }

    /**
     * @return mixed
     */
    public function getActioncode()
    {
        return $this->actioncode;
    }

    /**
     * @param mixed $actioncode
     * @return $this
     */
    public function setActioncode($actioncode)
    {
        $this->actioncode = $actioncode;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMailing()
    {
        return $this->mailing;
    }

    /**
     * @param mixed $mailing
     * @return $this
     */
    public function setMailing($mailing)
    {
        $this->mailing = $mailing;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDatause1()
    {
        return $this->datause1;
    }

    /**
     * @param mixed $datause1
     * @return $this
     */
    public function setDatause1($datause1)
    {
        $this->datause1 = $datause1;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDatause2()
    {
        return $this->datause2;
    }

    /**
     * @param mixed $datause2
     * @return $this
     */
    public function setDatause2($datause2)
    {
        $this->datause2 = $datause2;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDatause3()
    {
        return $this->datause3;
    }

    /**
     * @param mixed $datause3
     * @return $this
     */
    public function setDatause3($datause3)
    {
        $this->datause3 = $datause3;
        return $this;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param string $method
     * @return $this
     */
    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getRegisterTime()
    {
        return $this->registerTime;
    }

    /**
     * @param \DateTime|string $registerTime
     * @return $this
     */
    public function setRegisterTime($registerTime)
    {
        if (is_string($registerTime)) {
            $this->registerTime = \DateTime::createFromFormat('Y-m-d H:i:s', $registerTime);

        } elseif ($registerTime instanceof \DateTime) {
            $this->registerTime = $registerTime;
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function getVisitTime()
    {
        return $this->visitTime;
    }

    /**
     * @param mixed $visitTime
     * @return $this
     */
    public function setVisitTime($visitTime)
    {
        $this->visitTime = $visitTime;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getFirstEntryTime()
    {
        return $this->firstEntryTime;
    }

    /**
     * @param \DateTime|string $firstEntryTime
     * @return $this
     */
    public function setFirstEntryTime($firstEntryTime)
    {
        if (is_string($firstEntryTime)) {
            $this->firstEntryTime = \DateTime::createFromFormat('Y-m-d H:i:s', $firstEntryTime);

        } elseif ($firstEntryTime instanceof \DateTime) {
            $this->firstEntryTime = $firstEntryTime;
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDwellingTime()
    {
        return $this->dwellingTime;
    }

    /**
     * @param mixed $dwellingTime
     * @return $this
     */
    public function setDwellingTime($dwellingTime)
    {
        $this->dwellingTime = $dwellingTime;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getLastExitTime()
    {
        return $this->lastExitTime;
    }

    /**
     * @param \DateTime|string $lastExitTime
     * @return $this
     */
    public function setLastExitTime($lastExitTime)
    {
        if (is_string($lastExitTime)) {
            $this->lastExitTime = \DateTime::createFromFormat('Y-m-d H:i:s', $lastExitTime);

        } elseif ($lastExitTime instanceof \DateTime) {
            $this->lastExitTime = $lastExitTime;
        }

        return $this;
    }

    /**
     * @return int
     */
    public function getVisits()
    {
        return $this->visits;
    }

    /**
     * @param int $visits
     * @return $this
     */
    public function setVisits($visits)
    {
        $this->visits = $visits;
        return $this;
    }

    /**
     * @param array $event
     * @return $this
     */
    public function setEvent($event)
    {
        if (array_key_exists('@attributes', $event)) {
            $event = array_shift($event);
        }

        $this->event = new EventVO($event);

        return $this;
    }

    /**
     * @return EventVO
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @param array $contact
     * @return $this
     */
    public function setContact($contact)
    {
        if (array_key_exists('@attributes', $contact)) {
            $contact = array_shift($contact);
        }

        $this->contact = new ContactVO($contact);

        return $this;
    }

    /**
     * @return ContactVO
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @param array $profile
     * @return $this
     */
    public function setProfile($profile)
    {
        if (array_key_exists('@attributes', $profile)) {
            $profile = array_shift($profile);
        }

        $this->profile = $profile;

        return $this;
    }

    /**
     * @return array
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * @param array $translation
     * @return $this
     */
    public function setTranslation($translation)
    {
        if (array_key_exists('@attributes', $translation)) {
            $translation = array_shift($translation);
        }

        $this->translation = $translation;

        return $this;
    }

    /**
     * @return array
     */
    public function getTranslation()
    {
        return $this->translation;
    }

    /**
     * @param array $form
     * @return $this
     */
    public function setForm($form)
    {
        if (array_key_exists('@attributes', $form)) {
            $form = array_shift($form);
        }

        $this->form = $form;

        return $this;
    }

    /**
     * @return array
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * @param array $registrationType
     * @return $this
     */
    public function setRegistrationType($registrationType)
    {
        if (array_key_exists('@attributes', $registrationType)) {
            $registrationType = array_shift($registrationType);
        }

        $this->registrationType = $registrationType;

        return $this;
    }

    /**
     * @return array
     */
    public function getRegistrationType()
    {
        return $this->registrationType;
    }
}
