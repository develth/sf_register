<?php
/***************************************************************
 *  Copyright notice
 *  (c) 2011 Sebastian Fischer <typo3@evoweb.de>
 *  All rights reserved
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

if (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('realurl')
    && is_array($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl'])
) {
    $register = [
        'FeUser' => [
            [
                'GETvar' => 'tx_sfregister_form[controller]',
                'valueMap' => [
                    'Creation' => 'FeuserCreate',
                    'Editing' => 'FeuserEdit',
                    'Password' => 'FeuserPassword',
                ],
            ],
            [
                'GETvar' => 'tx_sfregister_form[action]',
            ],
        ],
        'user' => [
            [
                'GETvar' => 'tx_sfregister_form[user]',
            ],
        ],
        'hash' => [
            [
                'GETvar' => 'tx_sfregister_form[hash]',
            ],
        ],
    ];

    foreach ($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl'] as $domain => $config) {
        if (is_array($config) && array_key_exists('postVarSets', $config)) {
            $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl'][$domain]['postVarSets']['_DEFAULT'] = array_merge(
                $register,
                (array) $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl'][$domain]['postVarSets']['_DEFAULT']
            );
        }
    }

    unset($register, $config);

    reset($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl']);
}
