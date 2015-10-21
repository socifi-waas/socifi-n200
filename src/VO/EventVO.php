<?php

namespace Socifi\N200\VO;

class EventVO extends AbstractVO
{
    /**
     * @var string Name
     */
    private $name;

    /**
     * @var string Description
     */
    private $description;

    /**
     * @var \DateTime Event start
     */
    private $start;

    /**
     * @var \DateTime Event ends
     */
    private $end;

    /**
     * @var string Contact email in raw format "John Does<example.com>"
     */
    private $contactEmail;

    /**
     * @var mixed Unknown
     */
    private $reference;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @param \DateTime|string $start
     * @return $this
     */
    public function setStart($start)
    {
        if ($start instanceof \DateTime) {
            $this->start = $start;
        } else {
            $this->start = \DateTime::createFromFormat('Y-m-d H:i:s', $start);
        }

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @param \DateTime|string $end
     * @return $this
     */
    public function setEnd($end)
    {
        if ($end instanceof \DateTime) {
            $this->end = $end;
        } else {
            $this->end = \DateTime::createFromFormat('Y-m-d H:i:s', $end);
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getContactEmail()
    {
        return $this->contactEmail;
    }

    /**
     * @param string $contactEmail
     * @return $this
     */
    public function setContactEmail($contactEmail)
    {
        $this->contactEmail = $contactEmail;
        return $this;
    }

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
}
