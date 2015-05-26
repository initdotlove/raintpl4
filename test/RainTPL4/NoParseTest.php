<?php
/**
 * Escaping parts of code testcases
 *
 * @author Mateusz Warzyński <lxnmen@gmail.com>
 */
class NoParseTest extends RainTPLTestCase
{
    /**
     * Testcase for tag {literal}
     *
     * <code>{literal}blablabla{/literal}something</code>
     * <expects>something</expects>
     *
     * @author Mateusz Warzyński <lxnmen@gmail.com>
     */
    public function testLiteral()
    {
        $this->setupRainTPL4();
        $this->autoAssertEquals();
    }

    /**
     * Testcase for tag {noparse}
     *
     * <code>{noparse}blablabla{/noparse}something</code>
     * <expects>something</expects>
     *
     * @author Mateusz Warzyński <lxnmen@gmail.com>
     */
    public function testNoParse()
    {
        $this->setupRainTPL4();
        $this->autoAssertEquals();
    }

    /**
     * Testcase for comment - {* This is a test comment *}
     *
     * @author Mateusz Warzyński <lxnmen@gmail.com>
     */
    public function testCommentFirst()
    {
        $this->setupRainTPL4();
        $this->assertEquals('something', $this->engine->drawString("{* This is a test comment *}something", true));
    }

    /**
     * Testcase for comment - {*} This is a test comment #2 {/*}
     *
     * @author Mateusz Warzyński <lxnmen@gmail.com>
     */
    public function testCommentSecond()
    {
        $this->setupRainTPL4();
        $this->assertEquals('something', $this->engine->drawString("{*} This is a test comment #2 {/*}something", true));
    }

    /**
     * Testcase for comment - {ignore}This is a test comment #3{/ignore}
     *
     * @author Mateusz Warzyński <lxnmen@gmail.com>
     */
    public function testCommentThird()
    {
        $this->setupRainTPL4();
        $this->assertEquals('something', $this->engine->drawString("{ignore}This is a test comment #3{/ignore}something", true));
    }
}