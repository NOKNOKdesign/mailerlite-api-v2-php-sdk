<?php
namespace MailerLiteApi\Api;

use MailerLiteApi\Common\ApiAbstract;

class Webforms extends ApiAbstract {

    protected $endpoint = 'webforms';

    public function get( $params = [] ) {
        $endpoint = $this->endpoint;

        $params = array_merge( (array) $this->prepareParams(), $params );
        $response = $this->restClient->get( $endpoint, $params );

        return $response['body'];
    }
    
}