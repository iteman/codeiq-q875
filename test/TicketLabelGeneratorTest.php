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

class TicketLabelGeneratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Iteman\CodeIQ\Q875\TicketLabelGenerator
     */
    protected $ticketLabelGenerator;

    /**
     * {@inheritDoc}
     */
    protected function setUp()
    {
        $this->ticketLabelGenerator = new TicketLabelGenerator(new TicketTypeRepository());
    }

    /**
     * @return array
     */
    public function チケットタイプ別ラベルデータ()
    {
        return array(
            array(TicketType::CODE_ADULT, '100 / "おとな"'),
            array(TicketType::CODE_CHILD, '50 / "こども"'),
            array(TicketType::CODE_SILVER, '20 / "シルバー"'),
        );
    }

    /**
     * @test
     * @dataProvider チケットタイプ別ラベルデータ
     */
    public function チケットラベルを生成する($code, $label)
    {
        $result = $this->ticketLabelGenerator->generate($code);

        $this->assertThat($result, $this->equalTo($label));
    }

    /**
     * @test
     */
    public function コードに対応するチケットタイプが見つからない場合に例外を発生させる()
    {
        try {
            $this->ticketLabelGenerator->generate('NON_EXISTING_CODE');
            $this->fail('期待通りの例外が発生しませんでした。');
        } catch (\UnexpectedValueException $e) {
        }
    }
}
