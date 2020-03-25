<?php


namespace DPostInter;


class DPostInterDeliveryInfo
{
    private $destinationCountry;
    private $serviceCode;
    private $productType;
    private $senderName;
    private $senderTelephone;
    private $senderEmail;
    private $senderAddress;
    private $senderState;
    private $senderCity;
    private $senderPostalCode;
    private $senderCountryCode;
    private $receiverName;
    private $receiverTelephone;
    private $receiverEmail;
    private $receiverAddress;
    private $receiverState;
    private $receiverCity;
    private $receiverPostalCode;
    private $currency;
    private $items;
    private $quantity;
    private $weight;
    private $totalValue;
    private $produceFrom;
    private $trackingNumber;
    private $label;


    /**
     * @return null
     */
    public function getDestinationCountry()
    {
        return $this->destinationCountry;
    }

    /**
     * @param null $destinationCountry
     */
    public function setDestinationCountry($destinationCountry): void
    {
        $this->destinationCountry = $destinationCountry;
    }

    /**
     * @return null
     */
    public function getServiceCode()
    {
        return $this->serviceCode;
    }

    /**
     * @param null $serviceCode
     */
    public function setServiceCode($serviceCode): void
    {
        $this->serviceCode = $serviceCode;
    }

    /**
     * @return null
     */
    public function getProductType()
    {
        return $this->productType;
    }

    /**
     * @param null $productType
     */
    public function setProductType($productType): void
    {
        $this->productType = $productType;
    }

    /**
     * @return null
     */
    public function getSenderName()
    {
        return $this->senderName;
    }

    /**
     * @param null $senderName
     */
    public function setSenderName($senderName): void
    {
        $this->senderName = $senderName;
    }

    /**
     * @return null
     */
    public function getSenderTelephone()
    {
        return $this->senderTelephone;
    }

    /**
     * @param null $senderTelephone
     */
    public function setSenderTelephone($senderTelephone): void
    {
        $this->senderTelephone = $senderTelephone;
    }

    /**
     * @return null
     */
    public function getSenderEmail()
    {
        return $this->senderEmail;
    }

    /**
     * @param null $senderEmail
     */
    public function setSenderEmail($senderEmail): void
    {
        $this->senderEmail = $senderEmail;
    }

    /**
     * @return null
     */
    public function getSenderAddress()
    {
        return $this->senderAddress;
    }

    /**
     * @param null $senderAddress
     */
    public function setSenderAddress($senderAddress): void
    {
        $this->senderAddress = $senderAddress;
    }

    /**
     * @return null
     */
    public function getSenderState()
    {
        return $this->senderState;
    }

    /**
     * @param null $senderState
     */
    public function setSenderState($senderState): void
    {
        $this->senderState = $senderState;
    }

    /**
     * @return null
     */
    public function getSenderCity()
    {
        return $this->senderCity;
    }

    /**
     * @param null $senderCity
     */
    public function setSenderCity($senderCity): void
    {
        $this->senderCity = $senderCity;
    }

    /**
     * @return null
     */
    public function getSenderPostalCode()
    {
        return $this->senderPostalCode;
    }

    /**
     * @param null $senderPostalCode
     */
    public function setSenderPostalCode($senderPostalCode): void
    {
        $this->senderPostalCode = $senderPostalCode;
    }

    /**
     * @return null
     */
    public function getSenderCountryCode()
    {
        return $this->senderCountryCode;
    }

    /**
     * @param null $senderCountryCode
     */
    public function setSenderCountryCode($senderCountryCode): void
    {
        $this->senderCountryCode = $senderCountryCode;
    }

    /**
     * @return null
     */
    public function getReceiverName()
    {
        return $this->receiverName;
    }

    /**
     * @param null $receiverName
     */
    public function setReceiverName($receiverName): void
    {
        $this->receiverName = $receiverName;
    }

    /**
     * @return null
     */
    public function getReceiverTelephone()
    {
        return $this->receiverTelephone;
    }

    /**
     * @param null $receiverTelephone
     */
    public function setReceiverTelephone($receiverTelephone): void
    {
        $this->receiverTelephone = $receiverTelephone;
    }

    /**
     * @return null
     */
    public function getReceiverEmail()
    {
        return $this->receiverEmail;
    }

    /**
     * @param null $receiverEmail
     */
    public function setReceiverEmail($receiverEmail): void
    {
        $this->receiverEmail = $receiverEmail;
    }

    /**
     * @return null
     */
    public function getReceiverAddress()
    {
        return $this->receiverAddress;
    }

    /**
     * @param null $receiverAddress
     */
    public function setReceiverAddress($receiverAddress): void
    {
        $this->receiverAddress = $receiverAddress;
    }

    /**
     * @return null
     */
    public function getReceiverState()
    {
        return $this->receiverState;
    }

    /**
     * @param null $receiverState
     */
    public function setReceiverState($receiverState): void
    {
        $this->receiverState = $receiverState;
    }

    /**
     * @return null
     */
    public function getReceiverCity()
    {
        return $this->receiverCity;
    }

    /**
     * @param null $receiverCity
     */
    public function setReceiverCity($receiverCity): void
    {
        $this->receiverCity = $receiverCity;
    }

    /**
     * @return null
     */
    public function getReceiverPostalCode()
    {
        return $this->receiverPostalCode;
    }

    /**
     * @param null $receiverPostalCode
     */
    public function setReceiverPostalCode($receiverPostalCode): void
    {
        $this->receiverPostalCode = $receiverPostalCode;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @return null
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param null $items
     */
    public function setItems($items): void
    {
        $this->items = $items;
    }

    /**
     * @return null
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param null $quantity
     */
    public function setQuantity($quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return null
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param null $weight
     */
    public function setWeight($weight): void
    {
        $this->weight = $weight;
    }

    /**
     * @return null
     */
    public function getTotalValue()
    {
        return $this->totalValue;
    }

    /**
     * @param null $totalValue
     */
    public function setTotalValue($totalValue): void
    {
        $this->totalValue = $totalValue;
    }

    /**
     * @return string
     */
    public function getProduceFrom(): string
    {
        return $this->produceFrom;
    }

    /**
     * @param string $produceFrom
     */
    public function setProduceFrom(string $produceFrom): void
    {
        $this->produceFrom = $produceFrom;
    }

    /**
     * @return null
     */
    public function getTrackingNumber()
    {
        return $this->trackingNumber;
    }

    /**
     * @param null $trackingNumber
     */
    public function setTrackingNumber($trackingNumber): void
    {
        $this->trackingNumber = $trackingNumber;
    }

    /**
     * @return null
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param null $label
     */
    public function setLabel($label): void
    {
        $this->label = $label;
    }

}