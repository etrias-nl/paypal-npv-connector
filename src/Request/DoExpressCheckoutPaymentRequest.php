<?php

declare(strict_types=1);

namespace Etrias\PayPalNvpConnector\Request;

class DoExpressCheckoutPaymentRequest
{
    use QueryTrait;

    protected ?string $token;
    protected ?string $payerId;

    protected ?string $paymentRequest_0_amt;
    protected ?string $paymentRequest_0_currencyCode;
    protected ?string $paymentRequest_0_itemAmt;
    protected ?string $paymentRequest_0_shippingAmt;
    protected ?string $paymentRequest_0_handlingAmt;
    protected ?string $paymentRequest_0_taxAmt;
    protected ?string $paymentRequest_0_desc;
    protected ?string $paymentRequest_0_custom;
    protected ?string $paymentRequest_0_invNum;
    protected ?string $paymentRequest_0_notifyUrl;
    protected ?string $paymentRequest_0_paymentAction;

    protected ?string $paymentRequest_0_shipToName;
    protected ?string $paymentRequest_0_shipToStreet;
    protected ?string $paymentRequest_0_shipToCity;
    protected ?string $paymentRequest_0_shipToState;
    protected ?string $paymentRequest_0_shipToZip;
    protected ?string $paymentRequest_0_shipToCountryCode;
    protected ?string $paymentRequest_0_shipToPhoneNum;

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(?string $token): self
    {
        $this->token = $token;

        return $this;
    }

    public function getPayerId(): ?string
    {
        return $this->payerId;
    }

    public function setPayerId(?string $payerId): self
    {
        $this->payerId = $payerId;

        return $this;
    }

    public function getPaymentRequest0Amt(): ?string
    {
        return $this->paymentRequest_0_amt;
    }

    public function setPaymentRequest0Amt(?string $paymentRequest_0_amt): self
    {
        $this->paymentRequest_0_amt = $paymentRequest_0_amt;

        return $this;
    }

    public function getPaymentRequest0CurrencyCode(): ?string
    {
        return $this->paymentRequest_0_currencyCode;
    }

    public function setPaymentRequest0CurrencyCode(?string $paymentRequest_0_currencyCode): self
    {
        $this->paymentRequest_0_currencyCode = $paymentRequest_0_currencyCode;

        return $this;
    }

    public function getPaymentRequest0ItemAmt(): ?string
    {
        return $this->paymentRequest_0_itemAmt;
    }

    public function setPaymentRequest0ItemAmt(?string $paymentRequest_0_itemAmt): self
    {
        $this->paymentRequest_0_itemAmt = $paymentRequest_0_itemAmt;

        return $this;
    }

    public function getPaymentRequest0ShippingAmt(): ?string
    {
        return $this->paymentRequest_0_shippingAmt;
    }

    public function setPaymentRequest0ShippingAmt(?string $paymentRequest_0_shippingAmt): self
    {
        $this->paymentRequest_0_shippingAmt = $paymentRequest_0_shippingAmt;

        return $this;
    }

    public function getPaymentRequest0HandlingAmt(): ?string
    {
        return $this->paymentRequest_0_handlingAmt;
    }

    public function setPaymentRequest0HandlingAmt(?string $paymentRequest_0_handlingAmt): self
    {
        $this->paymentRequest_0_handlingAmt = $paymentRequest_0_handlingAmt;

        return $this;
    }

    public function getPaymentRequest0TaxAmt(): ?string
    {
        return $this->paymentRequest_0_taxAmt;
    }

    public function setPaymentRequest0TaxAmt(?string $paymentRequest_0_taxAmt): self
    {
        $this->paymentRequest_0_taxAmt = $paymentRequest_0_taxAmt;

        return $this;
    }

    public function getPaymentRequest0Desc(): ?string
    {
        return $this->paymentRequest_0_desc;
    }

    public function setPaymentRequest0Desc(?string $paymentRequest_0_desc): self
    {
        $this->paymentRequest_0_desc = $paymentRequest_0_desc;

        return $this;
    }

    public function getPaymentRequest0Custom(): ?string
    {
        return $this->paymentRequest_0_custom;
    }

    public function setPaymentRequest0Custom(?string $paymentRequest_0_custom): self
    {
        $this->paymentRequest_0_custom = $paymentRequest_0_custom;

        return $this;
    }

    public function getPaymentRequest0InvNum(): ?string
    {
        return $this->paymentRequest_0_invNum;
    }

    public function setPaymentRequest0InvNum(?string $paymentRequest_0_invNum): self
    {
        $this->paymentRequest_0_invNum = $paymentRequest_0_invNum;

        return $this;
    }

    public function getPaymentRequest0NotifyUrl(): ?string
    {
        return $this->paymentRequest_0_notifyUrl;
    }

    public function setPaymentRequest0NotifyUrl(?string $paymentRequest_0_notifyUrl): self
    {
        $this->paymentRequest_0_notifyUrl = $paymentRequest_0_notifyUrl;

        return $this;
    }

    public function getPaymentRequest0PaymentAction(): ?string
    {
        return $this->paymentRequest_0_paymentAction;
    }

    public function setPaymentRequest0PaymentAction(?string $paymentRequest_0_paymentAction): self
    {
        $this->paymentRequest_0_paymentAction = $paymentRequest_0_paymentAction;

        return $this;
    }

    public function getPaymentRequest0ShipToName(): ?string
    {
        return $this->paymentRequest_0_shipToName;
    }

    public function setPaymentRequest0ShipToName(?string $paymentRequest_0_shipToName): self
    {
        $this->paymentRequest_0_shipToName = $paymentRequest_0_shipToName;

        return $this;
    }

    public function getPaymentRequest0ShipToStreet(): ?string
    {
        return $this->paymentRequest_0_shipToStreet;
    }

    public function setPaymentRequest0ShipToStreet(?string $paymentRequest_0_shipToStreet): self
    {
        $this->paymentRequest_0_shipToStreet = $paymentRequest_0_shipToStreet;

        return $this;
    }

    public function getPaymentRequest0ShipToCity(): ?string
    {
        return $this->paymentRequest_0_shipToCity;
    }

    public function setPaymentRequest0ShipToCity(?string $paymentRequest_0_shipToCity): self
    {
        $this->paymentRequest_0_shipToCity = $paymentRequest_0_shipToCity;

        return $this;
    }

    public function getPaymentRequest0ShipToState(): ?string
    {
        return $this->paymentRequest_0_shipToState;
    }

    public function setPaymentRequest0ShipToState(?string $paymentRequest_0_shipToState): self
    {
        $this->paymentRequest_0_shipToState = $paymentRequest_0_shipToState;

        return $this;
    }

    public function getPaymentRequest0ShipToZip(): ?string
    {
        return $this->paymentRequest_0_shipToZip;
    }

    public function setPaymentRequest0ShipToZip(?string $paymentRequest_0_shipToZip): self
    {
        $this->paymentRequest_0_shipToZip = $paymentRequest_0_shipToZip;

        return $this;
    }

    public function getPaymentRequest0ShipToCountryCode(): ?string
    {
        return $this->paymentRequest_0_shipToCountryCode;
    }

    public function setPaymentRequest0ShipToCountryCode(?string $paymentRequest_0_shipToCountryCode): self
    {
        $this->paymentRequest_0_shipToCountryCode = $paymentRequest_0_shipToCountryCode;

        return $this;
    }

    public function getPaymentRequest0ShipToPhoneNum(): ?string
    {
        return $this->paymentRequest_0_shipToPhoneNum;
    }

    public function setPaymentRequest0ShipToPhoneNum(?string $paymentRequest_0_shipToPhoneNum): self
    {
        $this->paymentRequest_0_shipToPhoneNum = $paymentRequest_0_shipToPhoneNum;

        return $this;
    }
}
