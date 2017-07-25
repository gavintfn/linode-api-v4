<?php
/*
 * iDimensionz/{linode-api-v4}
 * Domains.php
 *  
 * The MIT License (MIT)
 * 
 * Copyright (c) 2015 iDimensionz
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

use iDimensionz\HttpClient\HttpClientInterface;
use iDimensionz\LinodeApiV4\LinodeApiEndpointAbstract;

class DomainsApi extends LinodeApiEndpointAbstract
{
    const ENDPOINT = 'domains';

    const DOMAIN_MODEL_CLASS_NAME = '\iDimensionz\LinodeApiV4\Api\Domains\DomainModel';

    public function __construct(HttpClientInterface $httpClient)
    {
        parent::__construct(self::ENDPOINT, $httpClient);
        $this->setModelClassName(self::DOMAIN_MODEL_CLASS_NAME);
    }

    /**
     * Get all domains for the account.
     * @todo implement filters based on filterable elements.
     * @return DomainModel[]
     */
    public function getAllDomains()
    {
        $httpResponse = $this->getHttpClient()->get($this->getEndpoint());
print_r($httpResponse, true);
        // @todo create an array of domain models from the HTTP response.
        $data = $httpResponse->getBody();
        $domainData = $data['domains'];
        $domainModels = [];
        foreach ($domainData as $domainDatum) {
            $domainModel = $this->hydrate($domainDatum);
            $domainModels[] = $domainModel;
        }

        return $domainModels;
    }
}
