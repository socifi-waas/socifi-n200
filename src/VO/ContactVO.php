<?php

namespace Socifi\N200\VO;

/**
 * Contact VO
 *
 * Provides getters and setters for Contact object.
 *
 * @package Socifi\N200\VO
 */
class ContactVO extends AbstractVO
{
    const TYPE_VISITOR = 'visitor';

    /**
     * @var string Contact type
     */
    private $type;

    /**
     * @var mixed Unknown
     */
    private $reference;

    private $gender;

    /**
     * @var string Title
     */
    private $title;

    /**
     * @var string First initials
     */
    private $firstInitials;

    /**
     * @var string First name
     */
    private $firstName;

    /**
     * @var string Last name prefix
     */
    private $lastNamePrefix;

    /**
     * @var string Last name
     */
    private $lastName;

    /**
     * @var string Suffix
     */
    private $suffix;

    /**
     * @var \DateTime Date of birth
     */
    private $dateOfBirth;

    /**
     * @var string Company
     */
    private $company;

    /**
     * @var string Company department
     */
    private $department;

    /**
     * @var string Job function
     */
    private $jobFunction;

    /**
     * @var string Phone 1
     */
    private $phone1;

    /**
     * @var string Phone 2
     */
    private $phone2;

    /**
     * @var string Fax
     */
    private $fax;

    /**
     * @var string Email
     */
    private $email;

    /**
     * @var string Website
     */
    private $website;

    /**
     * @var string VAT Number
     */
    private $vatNumber;

    /**
     * @var string Chamber of Commerce number
     */
    private $cocNumber;

    /**
     * @var mixed Comments
     */
    private $comments;

    /**
     * @var AddressVO[] Addresses
     */
    private $addresses = [];

    /**
     * @var mixed Social media
     */
    private $socialMedia;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param mixed $reference
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
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     * @return $this
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstInitials()
    {
        return $this->firstInitials;
    }

    /**
     * @param string $firstInitials
     * @return $this
     */
    public function setFirstInitials($firstInitials)
    {
        $this->firstInitials = $firstInitials;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return $this
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastNamePrefix()
    {
        return $this->lastNamePrefix;
    }

    /**
     * @param string $lastNamePrefix
     * @return $this
     */
    public function setLastNamePrefix($lastNamePrefix)
    {
        $this->lastNamePrefix = $lastNamePrefix;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return $this
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getSuffix()
    {
        return $this->suffix;
    }

    /**
     * @param string $suffix
     * @return $this
     */
    public function setSuffix($suffix)
    {
        $this->suffix = $suffix;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * @param \DateTime|string $dateOfBirth
     * @return $this
     */
    public function setDateOfBirth($dateOfBirth)
    {
        if (is_string($dateOfBirth)) {
            $this->dateOfBirth = \DateTime::createFromFormat('Y-m-d H:i:s', $dateOfBirth);

        } elseif ($dateOfBirth instanceof \DateTime) {
            $this->dateOfBirth = $dateOfBirth;
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param string $company
     * @return $this
     */
    public function setCompany($company)
    {
        $this->company = $company;
        return $this;
    }

    /**
     * @return string
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * @param string $department
     * @return $this
     */
    public function setDepartment($department)
    {
        $this->department = $department;
        return $this;
    }

    /**
     * @return string
     */
    public function getJobFunction()
    {
        return $this->jobFunction;
    }

    /**
     * @param string $jobFunction
     * @return $this
     */
    public function setJobFunction($jobFunction)
    {
        $this->jobFunction = $jobFunction;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhone1()
    {
        return $this->phone1;
    }

    /**
     * @param string $phone1
     * @return $this
     */
    public function setPhone1($phone1)
    {
        $this->phone1 = $phone1;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhone2()
    {
        return $this->phone2;
    }

    /**
     * @param string $phone2
     * @return $this
     */
    public function setPhone2($phone2)
    {
        $this->phone2 = $phone2;
        return $this;
    }

    /**
     * @return string
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * @param string $fax
     * @return $this
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * @param string $website
     * @return $this
     */
    public function setWebsite($website)
    {
        $this->website = $website;
        return $this;
    }

    /**
     * @return string
     */
    public function getVatNumber()
    {
        return $this->vatNumber;
    }

    /**
     * @param string $vatNumber
     * @return $this
     */
    public function setVatNumber($vatNumber)
    {
        $this->vatNumber = $vatNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getCocNumber()
    {
        return $this->cocNumber;
    }

    /**
     * @param string $cocNumber
     * @return $this
     */
    public function setCocNumber($cocNumber)
    {
        $this->cocNumber = $cocNumber;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param mixed $comments
     * @return $this
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
        return $this;
    }

    /**
     * @return AddressVO[]
     */
    public function getAddresses()
    {
        return $this->addresses;
    }

    /**
     * @param array $addresses
     * @return $this
     */
    public function setAddresses(array $addresses)
    {
        $this->addresses = [];

        foreach ($addresses as $address) {
            $addressVO = new AddressVO($address);

            if (array_key_exists('@attributes', $address) && array_key_exists('type', $address['@attributes'])) {
                $addressVO->setAddressType($address['@attributes']['type']);
            }

            $this->addAddress($addressVO);
        }

        return $this;
    }

    /**
     * Add address to existing ones
     *
     * @param AddressVO $addressVO
     * @return $this
     */
    public function addAddress(AddressVO $addressVO)
    {
        $this->addresses[] = $addressVO;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSocialMedia()
    {
        return $this->socialMedia;
    }

    /**
     * @param mixed $socialMedia
     * @return $this
     */
    public function setSocialMedia($socialMedia)
    {
        $this->socialMedia = $socialMedia;
        return $this;
    }
}
