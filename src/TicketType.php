<?php
/*
 * Copyright (c) 2014 KUBO Atsuhiro <kubo@iteman.jp>,
 * All rights reserved.
 *
 * This program and the accompanying materials are made available under
 * the terms of the BSD 2-Clause License which accompanies this
 * distribution, and is available at http://opensource.org/licenses/BSD-2-Clause
 */

namespace Iteman\CodeIQ\Q875;

class TicketType
{
    const CODE_ADULT = 'おとな';
    const CODE_CHILD = 'こども';
    const CODE_SILVER = 'シルバー';

    /**
     * @var string
     */
    protected $code;

    /**
     * @var string
     */
    protected $price;

    /**
     * @param string  $code
     * @param integer $price
     */
    public function __construct($code, $price)
    {
        $this->code = $code;
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return integer
     */
    public function getPrice()
    {
        return $this->price;
    }
}
