<?php
/**
 * This file is part of phpUnderControl.
 *
 * Copyright (c) 2007-2010, Manuel Pichler <mapi@phpundercontrol.org>.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 *   * Redistributions of source code must retain the above copyright
 *     notice, this list of conditions and the following disclaimer.
 *
 *   * Redistributions in binary form must reproduce the above copyright
 *     notice, this list of conditions and the following disclaimer in
 *     the documentation and/or other materials provided with the
 *     distribution.
 *
 *   * Neither the name of Manuel Pichler nor the names of his
 *     contributors may be used to endorse or promote products derived
 *     from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN
 * ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package   Tasks
 * @author    Manuel Pichler <mapi@phpundercontrol.org>
 * @copyright 2007-2010 Manuel Pichler. All rights reserved.
 * @license   http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @version   SVN: $Id$
 * @link      http://www.phpundercontrol.org/
 */

if ( defined( 'PHPUnit_MAIN_METHOD' ) === false )
{
    define( 'PHPUnit_MAIN_METHOD', 'phpucTasksAllTests::main' );
}

require_once 'PHPUnit/Framework/TestSuite.php';
require_once 'PHPUnit/TextUI/TestRunner.php';

require_once dirname( __FILE__ ) . '/AbstractAntTaskTest.php';
require_once dirname( __FILE__ ) . '/ApplyAntTaskTest.php';
require_once dirname( __FILE__ ) . '/CheckoutTaskTest.php';
require_once dirname( __FILE__ ) . '/CodeBrowserTaskTest.php';
require_once dirname( __FILE__ ) . '/CreateFileTaskTest.php';
require_once dirname( __FILE__ ) . '/CruiseControlTaskTest.php';
require_once dirname( __FILE__ ) . '/ExecAntTaskTest.php';
require_once dirname( __FILE__ ) . '/FilesetAntTaskTest.php';
require_once dirname( __FILE__ ) . '/GraphTaskTest.php';
require_once dirname( __FILE__ ) . '/LintTaskTest.php';
require_once dirname( __FILE__ ) . '/MergePhpunitTaskTest.php';
require_once dirname( __FILE__ ) . '/ModifyFileTaskTest.php';
require_once dirname( __FILE__ ) . '/PhpCodeSnifferTaskTest.php';
require_once dirname( __FILE__ ) . '/PhpDocumentorTaskTest.php';
require_once dirname( __FILE__ ) . '/PHPUnitTaskTest.php';
require_once dirname( __FILE__ ) . '/ProjectCleanTaskTest.php';
require_once dirname( __FILE__ ) . '/ProjectDeleteTaskTest.php';
require_once dirname( __FILE__ ) . '/ProjectTaskTest.php';

/**
 * Main test suite for phpUnderControl Tasks.
 *
 * @package   Tasks
 * @author    Manuel Pichler <mapi@phpundercontrol.org>
 * @copyright 2007-2010 Manuel Pichler. All rights reserved.
 * @license   http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @version   Release: @package_version@
 * @link      http://www.phpundercontrol.org/
 */
class phpucTasksAllTests
{
    /**
     * Test suite main method.
     *
     * @return void
     */
    public static function main()
    {
        PHPUnit_TextUI_TestRunner::run( self::suite() );
    }

    /**
     * Creates the phpunit test suite for this package.
     *
     * @return PHPUnit_Framework_TestSuite
     */
    public static function suite()
    {
        $suite = new PHPUnit_Framework_TestSuite( 'phpUnderControl - TasksAllTest' );
        $suite->addTestSuite( 'phpucAbstractAntTaskTest' );
        $suite->addTestSuite( 'phpucApplyAntTaskTest' );
        $suite->addTestSuite( 'phpucCheckoutTaskTest' );
        $suite->addTestSuite( 'phpucCodeBrowserTaskTest' );
        $suite->addTestSuite( 'phpucCreateFileTaskTest' );
        $suite->addTestSuite( 'phpucCruiseControlTaskTest' );
        $suite->addTestSuite( 'phpucExecAntTaskTest' );
        $suite->addTestSuite( 'phpucFilesetAntTaskTest' );
        $suite->addTestSuite( 'phpucGraphTaskTest' );
        $suite->addTestSuite( 'phpucLintTaskTest' );
        $suite->addTestSuite( 'phpucMergePhpunitTaskTest' );
        $suite->addTestSuite( 'phpucModifyFileTaskTest' );
        $suite->addTestSuite( 'phpucPhpCodeSnifferTaskTest' );
        $suite->addTestSuite( 'phpucPHPUnitTaskTest' );
        $suite->addTestSuite( 'phpucPhpDocumentorTaskTest' );
        $suite->addTestSuite( 'phpucProjectCleanTaskTest' );
        $suite->addTestSuite( 'phpucProjectDeleteTaskTest' );
        $suite->addTestSuite( 'phpucProjectTaskTest' );

        return $suite;
    }
}

if ( PHPUnit_MAIN_METHOD === 'phpucTasksAllTests::main' )
{
    phpucTasksAllTests::main();
}