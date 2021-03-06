<?php
/**
 * This file is part of phpUnderControl.
 *
 * PHP Version 5.2.0
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
 * @category  QualityAssurance
 * @package   Graph
 * @author    Manuel Pichler <mapi@phpundercontrol.org>
 * @copyright 2007-2010 Manuel Pichler. All rights reserved.
 * @license   http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @version   SVN: $Id$
 * @link      http://www.phpundercontrol.org/
 */

/**
 * phpUnderControl extension for bar charts.
 *
 * @category  QualityAssurance
 * @package   Graph
 * @author    Manuel Pichler <mapi@phpundercontrol.org>
 * @copyright 2007-2010 Manuel Pichler. All rights reserved.
 * @license   http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @version   Release: @package_version@
 * @link      http://www.phpundercontrol.org/
 *
 * @property phpucAbstractInput $input The input data source.
 */
class phpucBarChart extends ezcGraphBarChart implements phpucThumbChartI
{
    /**
     * Constructs a new line chart object.
     */
    public function __construct()
    {
        parent::__construct();

        $this->init();
    }

    /**
     * Sets the input instance for the next rendering process.
     *
     * @param phpucAbstractInput $input The input object.
     *
     * @return void
     */
    public function setInput( phpucAbstractInput $input )
    {
        $this->yAxis->label = $input->yAxisLabel;
        $this->xAxis->label = $input->xAxisLabel;

        $this->data = new ezcGraphChartDataContainer( $this );

        $inputData = $input->data;
        foreach ( $inputData as $label => $data )
        {
            $this->data[$label] = new ezcGraphArrayDataSet( $data );
        }

        $this->xAxis->labelCount = count( reset( $inputData ) );
    }

    /**
     * Initializes the chart properties.
     *
     * @return void
     */
    protected function init()
    {
        $this->palette  = new phpucGraphPalette();
        $this->renderer = new ezcGraphRenderer3d();

        $this->renderer->options->legendSymbolGleam = .5;
        $this->renderer->options->barChartGleam     = .5;

        $this->renderer->options->fillAxis   = .95;
        $this->renderer->options->barMargin  = .2;
        $this->renderer->options->barPadding = .1;

        $this->initAxis();
        $this->initLegend();
    }

    /**
     * Init's some common legend properties.
     *
     * @return void
     */
    protected function initLegend()
    {
        $this->legend = false;
    }

    /**
     * Init's the default chart axis.
     *
     * @return void
     */
    protected function initAxis()
    {
        $this->yAxis                    = new ezcGraphChartElementNumericAxis();
        $this->yAxis->font->minFontSize = 7;
        $this->yAxis->font->maxFontSize = 8;

        $this->xAxis                    = new ezcGraphChartElementLabeledAxis();
        $this->xAxis->font->minFontSize = 7;
        $this->xAxis->font->maxFontSize = 8;
    }
}
