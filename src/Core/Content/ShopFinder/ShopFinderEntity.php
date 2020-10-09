<?php declare(strict_types=1);

namespace SynlabShopFinder\Core\Content\ShopFinder;

use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;
use Shopware\Core\System\Country\CountryEntity;

class ShopFinderEntity extends Entity
{
    use EntityIdTrait;
    
    /**
     * @var bool
     */
    protected $active;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $street;
    /**
     * @var string
     */
    protected $postCode;
    /**
     * @var string
     */
    protected $city;
    /**
     * @var string|null
     */
    protected $url;
    /**
     * @var string|null
     */
    protected $telephone;
    /**
     * @var string|null
     */
    protected $openTimes;
    /**
     * @var CountryEntity|null
     */
    protected $country;

    /**
     * Get the value of active
     *
     * @return  bool
     */ 
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set the value of active
     *
     * @param  bool  $active
     *
     * @return  self
     */ 
    public function setActive(bool $active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get the value of name
     *
     * @return  string
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param  string  $name
     *
     * @return  self
     */ 
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of street
     *
     * @return  string
     */ 
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set the value of street
     *
     * @param  string  $street
     *
     * @return  self
     */ 
    public function setStreet(string $street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get the value of postCode
     *
     * @return  string
     */ 
    public function getPostCode()
    {
        return $this->postCode;
    }

    /**
     * Set the value of postCode
     *
     * @param  string  $postCode
     *
     * @return  self
     */ 
    public function setPostCode(string $postCode)
    {
        $this->postCode = $postCode;

        return $this;
    }

    /**
     * Get the value of city
     *
     * @return  string
     */ 
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set the value of city
     *
     * @param  string  $city
     *
     * @return  self
     */ 
    public function setCity(string $city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get the value of url
     *
     * @return  string|null
     */ 
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set the value of url
     *
     * @param  string|null  $url
     *
     * @return  self
     */ 
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get the value of telephone
     *
     * @return  string|null
     */ 
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set the value of telephone
     *
     * @param  string|null  $telephone
     *
     * @return  self
     */ 
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get the value of openTimes
     *
     * @return  string|null
     */ 
    public function getOpenTimes()
    {
        return $this->openTimes;
    }

    /**
     * Set the value of openTimes
     *
     * @param  string|null  $openTimes
     *
     * @return  self
     */ 
    public function setOpenTimes($openTimes)
    {
        $this->openTimes = $openTimes;

        return $this;
    }

    /**
     * Get the value of country
     *
     * @return  CountryEntity|null
     */ 
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set the value of country
     *
     * @param  CountryEntity|null  $country
     *
     * @return  self
     */ 
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }
}