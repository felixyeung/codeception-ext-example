<?php
namespace Codeception\Extension;

class MyEventHandler extends \Codeception\Platform\Extension
{
    public static $events = array(
        'suite.before' => 'suiteBeforeHandler',
        'test.start'   => 'testBeforeHandler'
    );


    public function suiteBeforeHandler(\Codeception\Event\SuiteEvent $event) {
        $this->writeln(
            sprintf(
               '[%s] Handling something before "%s".',
               $event->getName(),
               $event->getSuite()->getName()
            )
        );
        $this->writeln(
            sprintf(
                'foo: %s; bar: %s',
                $this->config['foo'],
                $this->config['bar']
            )
        );
    }


    public function testBeforeHandler(\Codeception\Event\TestEvent $event) {
        $this->writeln(
            sprintf(
                '[%s] Doing something before a test runs.',
                $event->getName()
            )
        );
    }
}