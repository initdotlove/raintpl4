<?php
/**
 * {function} tag test
 *
 * @author Damian Kęska <damian@pantheraframework.org>
 */
class FunctionTest extends RainTPLTestCase
{
    /**
     * <code>{function="Date( 'c', $value.Time )"}">{$value.Time|FullDate}</code>
     * <data-time>2015-05-05 10:00</data-time>
     * <expects>2015-05-05T10:00:00+02:00">2015-05-05 10:00</expects>
     *
     * @author Damian Kęska <damian@pantheraframework.org>
     */
    public function testXPawFunctionVarReplace()
    {
        $this->setupRainTPL4();
        $this->engine->assign('value', array(
            'Time' => strtotime($this->getExampleDataFromPHPDoc('time')),
        ));
        //$this->engine->setConfigurationKey('print_parsed_code', true);
        $this->assertEquals(
            $this->getExpectationsFromPHPDoc(),
            $this->engine->drawString($this->getTestCodeFromPHPDoc(), true)
        );
    }

    /**
     * <code>
     * {loop="$app_history"}
     *     {function="Date( 'c', $value.Time )"}">{$value.Time|FullDate}
     * {/loop}
     * </code>
     *
     * <data-time>2015-05-05 10:00</data-time>
     * <expects>2015-05-05T10:00:00+02:00">2015-05-05 10:00</expects>
     *
     * @author xPaw <github@xpaw.me>
     * @author Damian Kęska <damian@pantheraframework.org>
     */
    public function testXPawFunctionVarReplaceInArray()
    {
        $this->setupRainTPL4();
        $this->engine->assign('app_history', array(
            array(
                'Time' => strtotime($this->getExampleDataFromPHPDoc('time')),
            ),
        ));

        //$this->engine->setConfigurationKey('print_parsed_code', true);
        $this->assertEquals(
            trim($this->getExpectationsFromPHPDoc()),
            trim($this->engine->drawString($this->getTestCodeFromPHPDoc(), true))
        );
    }
}

function FullDate($input)
{
    return date('Y-m-d H:i', $input);
}