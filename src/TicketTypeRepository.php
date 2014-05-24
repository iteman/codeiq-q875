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

class TicketTypeRepository
{
    /**
     * @var \Iteman\CodeIQ\Q875\TicketType[]
     */
    protected $ticketTypes;

    public function __construct()
    {
        $this->ticketTypes = array(
            new TicketType(TicketType::CODE_ADULT, 100),
            new TicketType(TicketType::CODE_CHILD, 50),
            new TicketType(TicketType::CODE_SILVER, 20),
        );
    }

    /**
     * @param  string                         $code
     * @return \Iteman\CodeIQ\Q875\TicketType
     */
    public function findByCode($code)
    {
        foreach ($this->ticketTypes as $ticketType) {
            if ($ticketType->getCode() == $code) {
                return $ticketType;
            }
        }

        return null;
    }
}
