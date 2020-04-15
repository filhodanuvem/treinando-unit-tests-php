<?php

namespace App\Entity;

class Location
{
    private $continent;
    private $country;
    private $city;
    private $timezone;

    public function __construct(
        string $continent,
        string $country,
        string $city,
        string $timezone
    ){
        $this->continent = $continent;
        $this->country = $country;
        $this->city = $city;
        $this->timezone = $timezone;
    }

    /**
     * Get the value of continent
     */ 
    public function getContinent(): string
    {
        return $this->continent;
    }

    /**
     * Get the value of country
     */ 
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * Get the value of city
     */ 
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * Get the value of timezone
     */ 
    public function getTimezone(): string
    {
        return $this->timezone;
    }

    public function getDateTime(): \DateTime
    {
        return new \DateTime('now', new \DateTimeZone($this->timezone));
    }
}
