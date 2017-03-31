<?php
namespace App\Services\Payment;
/**
 * Class DragonPay
 *
 * @package GeekHives\PaymentGateway
 *
 * @usage
 *
 *  $dragonPay = new DragonPay;
 *
$dragonPay->setGatewayUrl(getenv('GATEWAY_HOST'))
->setMerchant(getenv('MERCHANT_ID'))
->setKey(getenv('SECRET_KEY'))
->setTransId($transId)
->setAmount($amount)
->setDescription(getenv('DESCRIPTION'))
->setCcy(getenv('CCY'))
->setEmail($email)
->setPayment($method)
->generateUrl();
 */
class Dragonpay
{
    /**
     * @var string
     */
    protected $payment;
    /**
     * @var string
     */
    protected $key;
    /**
     * @var string
     */
    protected $merchant;
    /**
     * @var numeric|integer
     */
    protected $amount;
    /**
     * @var string
     */
    protected $transId;
    /**
     * @var string
     */
    protected $description;
    /**
     * @var string
     */
    protected $email;
    /**
     * @var string
     */
    protected $ccy;
    /**
     * @var string
     */
    protected $gatewayUrl;
    /**
     * @var integer
     */
    protected $param1;
    /**
     * @var integer
     */
    protected $param2;
    /**
     * @var array
     */
    protected $paymentModes = [
        'bank'    => 1,
        'otc'     => 2,
        'nonbank' => 4,
        'paypal'  => 7,
        'globe'   => 128,
        'cc'      => 64
    ];
    /**
     * @param mixed $gatewayUrl
     *
     * @return self
     */
    public function setGatewayUrl($gatewayUrl)
    {
        $this->gatewayUrl = $gatewayUrl . (substr($gatewayUrl, -1) === "?" ? '' : "?");
        return $this;
    }
    /**
     * @return string
     */
    public function getGatewayUrl()
    {
        return $this->gatewayUrl;
    }
    /**
     * @param mixed $amount
     *
     * @return self
     */
    public function setAmount($amount)
    {
        $amount = str_replace(',', '', $amount);
        $this->amount = number_format((float) $amount, 2, '.', '');
        return $this;
    }
    /**
     * @param mixed $description
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }
    /**
     * @param mixed $email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
    /**
     * @param mixed $merchant
     *
     * @return self
     */
    public function setMerchant($merchant)
    {
        $this->merchant = $merchant;
        return $this;
    }
    /**
     * @param mixed $transId
     *
     * @return self
     */
    public function setTransId($transId)
    {
        $this->transId = $transId;
        return $this;
    }
    /**
     * @param $payment
     *
     * @return $this
     */
    public function setPayment($payment)
    {
        $this->payment = $payment;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getPayment()
    {
        return $this->payment;
    }
    /**
     * @param $key
     *
     * @return $this
     */
    public function setKey($key)
    {
        $this->key = $key;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }
    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }
    /**
     * @return mixed
     */
    public function getMerchant()
    {
        return $this->merchant;
    }
    /**
     * @return null|string
     *
     * @throws \Exception
     */
    public function getProcId()
    {
        if ($this->getMode() === 128) {
            return "GCSH";
        }
        if ($this->getMode() === 7) {
            return "PYPL";
        }
        if ($this->getMode() === 4) {
            return "BAYD";
        }
        return 0;
    }
    /**
     * @return mixed
     */
    public function getTransId()
    {
        return $this->transId;
    }
    /**
     * @return mixed
     * @throws \Exception
     */
    public function getMode()
    {
        if (! isset($this->paymentModes[$this->payment])) {
            throw new \Exception('Payment not exists!');
        }
        return $this->paymentModes[$this->payment];
    }
    /**
     * @param string $ccy
     *
     * @return self
     */
    public function setCcy($ccy)
    {
        $this->ccy = $ccy;
        return $this;
    }
    /**
     * @return string
     */
    public function getCcy()
    {
        return $this->ccy;
    }
    public function getDigest()
    {
        $digest = [
            $this->merchant,
            $this->transId,
            $this->amount,
            $this->ccy,
            $this->description,
            $this->email,
            $this->key
        ];
        return sha1(implode(':', $digest));
    }
    public function generateUrl()
    {
        $queryString = [
            'merchantid'  => $this->merchant,
            'txnid'       => $this->transId,
            'amount'      => $this->amount,
            'ccy'         => $this->ccy,
            'description' => $this->description,
            'digest'      => $this->getDigest(),
            'email'       => $this->email,
            'mode'        => 7,
            'procid'      => $this->getProcId(),
            'param1'      => $this->param1,
            'param2'      => $this->param2
        ];
        return $this->gatewayUrl . $this->arrayToString($queryString);
    }
    public function arrayToString($url)
    {
        $string = "";
        foreach ($url as $key => $value) {
            $string .= "&$key={$value}";
        }
        return substr($string, 1);
    }
    /**
     * @param $string
     *
     * @return bool
     */
    public function parseUserId($string)
    {
        preg_match_all('/u\d+/i', $string, $matches);
        if (isset($matches[0][0])) {
            $userId = $matches[0][0];
            return (integer) str_replace('U', '', $userId);
        }
        return false;
    }
    /**
     * @param $string
     *
     * @return bool
     */
    public function parseContractId($string)
    {
        preg_match_all('/c\d+/i', $string, $matches);
        if (isset($matches[0][0])) {
            $contractId = $matches[0][0];
            return (integer) str_replace('C', '', $contractId);
        }
        return false;
    }
    /**
     * @param int $param1
     *
     * @return $this
     */
    public function setParam1($param1)
    {
        $this->param1 = $param1;
        return $this;
    }
    /**
     * @param mixed $param2
     *
     * @return $this
     */
    public function setParam2($param2)
    {
        $this->param2 = $param2;
        return $this;
    }
}