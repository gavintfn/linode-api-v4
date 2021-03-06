<?php
/*
 * iDimensionz/{linode-api-v4}
 * DomainFilterDomain.php
 *  
 * The MIT License (MIT)
 * 
 * Copyright (c) 2017 Dimensionz
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
*/

namespace iDimensionz\LinodeApiV4\Api\Domains;

use iDimensionz\LinodeApiV4\Api\Filters\FilterAbstract;
use iDimensionz\LinodeApiV4\Api\Filters\FilterFieldCondition\FilterFieldConditionString;

class DomainFilter extends FilterAbstract
{
    const FILTER_FIELD_DOMAIN = 'domain';
    const FILTER_FIELD_GROUP = 'group';
    const FILTER_FIELD_MASTER_IPS = 'master_ips';

    public function __construct()
    {
        $filterFields = [
            self::FILTER_FIELD_DOMAIN       =>  FilterAbstract::FILTER_FIELD_TYPE_STRING,
            self::FILTER_FIELD_MASTER_IPS   =>  FilterAbstract::FILTER_FIELD_TYPE_ARRAY_STRING,
            self::FILTER_FIELD_GROUP        =>  FilterAbstract::FILTER_FIELD_TYPE_STRING
        ];
        $this->setFilterFields($filterFields);
        parent::__construct();
    }

    /**
     * @param string $group
     */
    public function addGroupFilter($group)
    {
        if (!empty($group)) {
            $this->addCondition(new FilterFieldConditionString(self::FILTER_FIELD_GROUP, $group));
        }
    }

    /**
     * @param string $domain
     */
    public function addDomainFilter($domain)
    {
        if (!empty($domain)) {
            $this->addCondition(new FilterFieldConditionString(self::FILTER_FIELD_DOMAIN, $domain));
        }
    }

    /**
     * @param array $masterIps
     */
    public function addMasterIpsFilter($masterIps)
    {
        if (is_array($masterIps) && !empty($masterIps)) {
            // @todo implement FilterFieldConditionArray class
        }
    }
}
