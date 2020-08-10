<?php

declare(strict_types=1);

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

namespace TYPO3\CMS\Core\Tests\Acceptance\Support\Helper;

use Codeception\Actor;
use TYPO3\CMS\Core\Tests\Acceptance\Support\BackendTester;
use TYPO3\CMS\Styleguide\Tests\Acceptance\Support\AcceptanceTester;
use TYPO3\TestingFramework\Core\Acceptance\Helper\AbstractSiteConfiguration;

/**
 * @see AbstractPageTree
 */
class SiteConfiguration extends AbstractSiteConfiguration
{
    /**
     * Inject our core AcceptanceTester actor into SiteConfiguration
     *
     * @param BackendTester $I
     */
    public function __construct(BackendTester $I)
    {
        $this->tester = $I;
    }
}
