<?php
namespace MailerLiteApi\Api;

use MailerLiteApi\Common\ApiAbstract;

class Webhooks extends ApiAbstract {

    const EVENT_CREATE                   = 'subscriber.create';
    const EVENT_UPDATE                   = 'subscriber.update';
    const EVENT_UNSUBSCRIBE              = 'subscriber.unsubscribe';
    const EVENT_ADDED_TO_GROUP           = 'subscriber.add_to_group';
    const EVENT_REMOVED_FROM_GROUP       = "subscriber.remove_from_group";
    const EVENT_ADDED_THROUGH_WEBFORM    = "subscriber.added_through_webform";
    const EVENT_BOUNCED                  = 'subscriber.bounced';
    const EVENT_COMPLAINT                = 'subscriber.complaint';
    const EVENT_AUTOMATION_TRIGGERED     = 'subscriber.automation_triggered	';
    const EVENT_AUTOMATION_COMPLETE      = 'subscriber.automation_complete';
    const EVENT_CAMPAIGN_SENT            = 'campaign.sent';


    protected $endpoint = 'webhooks';

    /**
     * Subscribe to a Webhook event with callback url
     */
    public function subscribe( $event, $callback_url ) {
        $endpoint = $this->endpoint;

        $params = array_merge( (array) $this->prepareParams(), [
            'url'   => $callback_url,
            'event' => $event
        ] ) ;

        $response = $this->restClient->post( $endpoint, $params );
        return $response['body'];
    }
}