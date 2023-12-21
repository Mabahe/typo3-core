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

namespace TYPO3\CMS\Core\Tests\Functional\DataHandling\FlexformIrre;

use TYPO3\CMS\Core\Database\Connection;
use TYPO3\CMS\Core\Localization\LanguageServiceFactory;
use TYPO3\TestingFramework\Core\Functional\Framework\DataHandling\ActionService;
use TYPO3\TestingFramework\Core\Functional\FunctionalTestCase;

final class ActionTest extends FunctionalTestCase
{
    protected array $coreExtensionsToLoad = ['workspaces'];

    protected array $pathsToLinkInTestInstance = [
        'typo3/sysext/core/Tests/Functional/DataHandling/FlexformIrre/Fixtures/fileadmin' => 'fileadmin/fixture',
    ];

    protected array $testExtensionsToLoad = [
        'typo3/sysext/core/Tests/Functional/Fixtures/Extensions/test_irre_foreignfield',
    ];

    /**
     * @test
     */
    public function newVersionOfFileRelationInFlexformFieldIsCreatedOnSave(): void
    {
        $this->importCSVDataSet(__DIR__ . '/DataSet/ImportDefault.csv');
        $this->importCSVDataSet(__DIR__ . '/../../Fixtures/be_users_admin.csv');
        $backendUser = $this->setUpBackendUser(1);
        $GLOBALS['LANG'] = $this->get(LanguageServiceFactory::class)->createFromUserPreferences($backendUser);
        $backendUser->workspace = 1;
        $actionService = new ActionService();
        $actionService->modifyRecords(1, [
            'tt_content' => ['uid' => 100, 'header' => 'Content #1 (WS)'],
        ]);
        // there should be one relation in the live WS and one in the draft WS pointing to the file field.
        $queryBuilder = $this->getConnectionPool()->getQueryBuilderForTable('sys_file_reference');
        $queryBuilder->getRestrictions()->removeAll();
        $referenceCount = $queryBuilder
            ->count('uid')
            ->from('sys_file_reference')
            ->where($queryBuilder->expr()->eq('uid_local', $queryBuilder->createNamedParameter(20, Connection::PARAM_INT)))
            ->executeQuery()
            ->fetchOne();
        self::assertEquals(2, $referenceCount);
    }
}
