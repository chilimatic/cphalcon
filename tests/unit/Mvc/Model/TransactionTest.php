<?php

/*
 +------------------------------------------------------------------------+
 | Phalcon Framework                                                      |
 +------------------------------------------------------------------------+
 | Copyright (c) 2011-present Phalcon Team (https://phalconphp.com)       |
 +------------------------------------------------------------------------+
 | This source file is subject to the New BSD License that is bundled     |
 | with this package in the file LICENSE.txt.                             |
 |                                                                        |
 | If you did not receive a copy of the license and are unable to         |
 | obtain it through the world-wide-web, please send an email             |
 | to license@phalconphp.com so we can send you a copy immediately.       |
 +------------------------------------------------------------------------+
 */

namespace Phalcon\Test\Unit\Mvc\Model;

use Phalcon\DiInterface;
use Phalcon\Mvc\Model\Query;
use Phalcon\Mvc\Model\Transaction;
use Phalcon\Test\Module\UnitTest;
use Phalcon\Mvc\Model\Transaction\Failed as TxFailed;

/**
 * Phalcon\Test\Unit\Mvc\Model\QueryTest
 *
 * Tests the Phalcon\Mvc\Model\Query component
 *
 * @package Phalcon\Test\Unit\Mvc\Model
 */
class TransactionTest extends UnitTest
{
    /**
     * @var DiInterface
     */
    private $di;

    /**
     * executed before each test
     */
    protected function _before()
    {
        parent::_before();

        /** @var \Phalcon\Mvc\Application $app */
        $app = $this->tester->getApplication();
        $this->di = $app->getDI();
    }

    /**
     * @test
     * @expectedException TxFailed
     */
    public function transactionThrowsExceptionOnRollback()
    {
        $this->specify(
            'Check if transaction fails on rollback',
            function () {
                $transaction = new Transaction($this->di);
                $transaction->rollback();
            }
        );
    }

    /**
     * @test
     */
    public function transactionDoesNotThrowExceptionOnRollback()
    {
        $this->specify(
            'Check if transaction fails on rollback',
            function () {
                $transaction = new Transaction($this->di);
                $transaction->setThrowExceptionOnRollback(false);
                $transaction->rollback();
            }
        );
    }
}
