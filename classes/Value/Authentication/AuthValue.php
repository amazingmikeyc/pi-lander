<?php

namespace AmazingMikeyC\Pi\Value\Authentication;
/**
 * Description of AuthValue
 *
 * @author mike
 */
class AuthValue {
    
    public function __construct(array $values)
    {
        $this->type = $values['type'];
        $this->projectId = $values['project_id'];
        $this->privateKeyId = $values['private_key_id'];
        $this->privateKey = $values['private_key'];
        $this->clientEmail = $values['client_email'];
        $this->clientId = $values['client_id'];
        $this->tokenURI = $values['token_uri'];
        $this->authProviderCertUrl = $values['auth_provider_x509_cert_url'];
        $this->authURI = $values['auth_uri'];
        $this->clientCertUrl = $values['client_x509_cert_url'];
    }
    
    private $type;
    private $projectId;
    private $privateKeyId;
    private $privateKey;
    private $clientEmail;
    private $clientId;
    private $authURI;
    private $tokenURI;
    private $authProviderCertUrl;
    private $clientCertUrl;
    
    function getType() {
        return $this->type;
    }

    function getProjectId() {
        return $this->projectId;
    }

    function getPrivateKeyId() {
        return $this->privateKeyId;
    }

    function getPrivateKey() {
        return $this->privateKey;
    }

    function getClientEmail() {
        return $this->clientEmail;
    }

    function getAuthURI() {
        return $this->authURI;
    }

    function getTokenURI() {
        return $this->tokenURI;
    }

    function getAuthProviderCertUrl() {
        return $this->authProviderCertUrl;
    }

    function getClientCertUrl() {
        return $this->clientCertUrl;
    }
    
}
