<?php

class Test extends PHPUnit_Framework_TestCase
{
    public function testPlugin()
    {
        $obj = new ECheck();
    }

    public function testTender()
    {
        $t = new ECheckTender();
        $t->errorCheck();

        CoreLocal::set('msgrepeat', 0);
        $this->assertInternalType('string', $t->preReqCheck());
        CoreLocal::set('msgrepeat', 1);
        CoreLocal::set('lastRepeat', 'echeckVerifyType');
        $this->assertEquals(true, $t->preReqCheck());

        CoreLocal::set('msgrepeat', 0);
        $t->setTC('CK');
        CoreLocal::set('enableFranking', 1);
        $this->assertInternalType('string', $t->preReqCheck());
        CoreLocal::set('msgrepeat', 1);
        CoreLocal::set('lastRepeat', 'checkEndorse');
        $this->assertEquals(true, $t->preReqCheck());
    }

    public function testPage()
    {
        $p = new ECheckVerifyPage();
        $this->assertEquals(true, $p->preprocess());
        ob_start();
        $p->head_content();
        $this->assertInternalType('string', ob_get_clean());
        ob_start();
        $p->body_content();
        $this->assertInternalType('string', ob_get_clean());
    }
}

