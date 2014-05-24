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

class TicketLabelGenerator
{
    /**
     * @var \Iteman\CodeIQ\Q875\TicketTypeRepository
     */
    protected $ticketTypeRepository;

    /**
     * @param \Iteman\CodeIQ\Q875\TicketTypeRepository $ticketTypeRepository
     */
    public function __construct(TicketTypeRepository $ticketTypeRepository)
    {
        $this->ticketTypeRepository = $ticketTypeRepository;
    }

    /**
     * @param  string                    $code
     * @return string
     * @throws \UnexpectedValueException
     */
    public function generate($code)
    {
        $ticketType = $this->ticketTypeRepository->findByCode($code);
        if ($ticketType === null) {
            throw new \UnexpectedValueException(sprintf('コード "%s" に対応するチケットタイプが見つかりません。', $code));
        }

        return sprintf('%d / "%s"', $ticketType->getPrice(), $ticketType->getCode());
    }
}
