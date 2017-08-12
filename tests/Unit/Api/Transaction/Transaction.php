<?php

/**
 * @package     OVAC/Hubtel-Payment
 * @version     1.0.0
 * @link        https://github.com/ovac/hubtel-payment
 *
 * @author      Ariama O. Victor (OVAC) <contact@ovac4u.com>
 * @link        http://ovac4u.com
 *
 * @license     https://github.com/ovac/hubtel-payment/blob/master/LICENSE
 * @copyright   (c) 2017, Rescope Inc
 */

namespace OVAC\HubtelPayment\Tests\Unit\Api\Transaction;

use OVAC\HubtelPayment\Api\Transaction;
use OVAC\HubtelPayment\Pay;

class TransactionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * The name of the customer.
     *
     * @var string
     */
    private $customerName;
    /**
     * The customer email address
     *
     * @var string
     */
    private $customerEmail;
    /**
     * The customer mobile money number.
     *
     * @var string
     */
    private $customerMsisdn;
    /**
     * The mobile money provider channel
     *
     * @var string
     */
    private $channel;
    /**
     * The mobile money transaction amount
     *
     * @var string
     */
    private $amount;
    /**
     * A callback URL to receive the transaction
     * status from Hubtel to your API request.
     * Receive  money requests for all mobile
     * money providers are asynchrounous hence,
     * Hubtel will send a callback on  the f
     * inal status of a pending transaction
     *
     * @var string
     */
    private $primaryCallbackURL;
    /**
     * The second URL for callback response in the
     * event of failure of  primary callback URL.
     *
     * @var string
     */
    private $secondaryCallbackURL;
    /**
     * The reference number that is provided by you
     * to reference a transaction from your end.
     *
     * @var string
     */
    private $clientReference;
    /**
     * The short description of the transaction.
     *
     * @var string
     */
    private $description;
    /**
     * The 6 digit unique token required to debit a Vodafone
     * Cash customer.  This token has to be generated and
     * provided by the Vodafone customer. The customer
     * dials *110# and selects menu item 6 to create
     * the voucher. It  expires after 5 minutes if unused
     *
     * @var string
     */
    private $token;
    /**
     * This allows the fees of the transaction to be charged
     * on the customer. If set to true the
     * AmountCharged = Amount + Charges.
     *
     * @var boolean
     */
    private $feesOnCustomer;

    protected function setUp()
    {

        $this->ammount = 10.89;
        $this->channel = 'mtn-gh';

        $this->description = 'Money for some trash like that oh';

        $this->customerMsisdn = '+233553577261';
        $this->customerName = 'Ariama Victor';
        $this->customerEmail = 'contact@ovac4u.com';

        $this->clientReference = array('userId' => 14028);

        $this->primaryCallbackURL = 'http://www.ovac4u.com/payment/payment-success';
        $this->secondaryCallbackURL = 'http://www.ovac4u.com/payment/payment-failed';

        $this->feesOnCustomer = true;

        //Only neccessry for Vodafone Cash users
        $this->token = '123456';
    }
}