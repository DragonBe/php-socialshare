<?php

namespace spec\SocialShare\Provider;

/*
 * This file is part of the SocialShare package.
 *
 * (c) Kévin Dunglas <dunglas@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use PhpSpec\ObjectBehavior;

/**
 * @author Kévin Dunglas <dunglas@gmail.com>
 */
class GoogleSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('SocialShare\Provider\Google');
        $this->shouldHaveType('SocialShare\Provider\ProviderInterface');
    }

    function it_gets_a_valid_link()
    {
        $this->getLink('http://dunglas.fr')->shouldBe('https://plus.google.com/share?url=http%3A%2F%2Fdunglas.fr');
    }

    function it_gets_a_valid_number_of_shares()
    {
        $this->getShares('http://dunglas.fr')->shouldBeInteger();
    }

    function it_handles_k()
    {
        $this->getShares('https://www.google.com/')->shouldBeGreaterThan(1000);
    }

    public function getMatchers()
    {
        return array(
            'beGreaterThan' => function($subject, $key) {
                return $subject > $key;
            }
        );
    }
}
