<?php

/**
 * Copyright 2012 Klarna AB
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * File containing the Klarna_Checkout_HTTP_Transport unittest
 *
 * PHP version 5.3
 *
 * @category  Payment
 * @package   Klarna_Checkout
 * @author    Klarna <support@klarna.com>
 * @copyright 2012 Klarna AB
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache license v2.0
 * @link      http://developers.klarna.com/
 */

/**
 * UnitTest for the Klarna_Checkout_HTTP_Transport factory
 *
 * @category  Payment
 * @package   Klarna_Checkout
 * @author    David K. <david.keijser@klarna.com>
 * @copyright 2012 Klarna AB
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache license v2.0
 * @link      http://developers.klarna.com/
 */
class Klarna_Checkout_HTTP_TransportTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var Klarna_checkout_HTTP_Transport
     */
    protected $transport;

    /**
     * Set up for tests
     *
     * @return void
     */
    public function setUp()
    {
        $this->transport = Klarna_checkout_HTTP_Transport::create();
    }

    /**
     * Make sure the returned object implements the transport interface
     *
     * @return void
     */
    public function testCreate()
    {
        $this->assertInstanceOf(
            'Klarna_Checkout_HTTP_TransportInterface',
            $this->transport
        );
    }

    /**
     * Testing get/set timout
     *
     * @return void
     */
    public function testTimeoutOnConnector()
    {
        $this->transport->setTimeout(120);
        $this->assertEquals(120, $this->transport->getTimeout());
    }
}
