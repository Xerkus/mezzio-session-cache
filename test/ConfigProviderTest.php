<?php

/**
 * @see       https://github.com/mezzio/mezzio-session-cache for the canonical source repository
 * @copyright https://github.com/mezzio/mezzio-session-cache/blob/master/COPYRIGHT.md
 * @license   https://github.com/mezzio/mezzio-session-cache/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace MezzioTest\Session\Cache;

use Mezzio\Session\Cache\ConfigProvider;
use PHPUnit\Framework\TestCase;

class ConfigProviderTest extends TestCase
{
    public function setUp()
    {
        $this->provider = new ConfigProvider();
    }

    public function testInvocationReturnsArray()
    {
        $config = ($this->provider)();
        $this->assertInternalType('array', $config);
        return $config;
    }

    /**
     * @depends testInvocationReturnsArray
     */
    public function testReturnedArrayContainsDependencies(array $config)
    {
        $this->assertArrayHasKey('dependencies', $config);
        $this->assertInternalType('array', $config['dependencies']);
    }
}
