<?php
/**
 * DeviceRegistryApi
 * PHP version 5
 *
 * @category Class
 * @package  KhipuChaski
 * @author   http://github.com/swagger-api/swagger-codegen
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link     https://github.com/swagger-api/swagger-codegen
 */
/**
 *  Copyright 2015 SmartBear Software
 *
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *  limitations under the License.
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program. 
 * https://github.com/swagger-api/swagger-codegen 
 * Do not edit the class manually.
 */

namespace KhipuChaski\Client;

use \KhipuChaski\Configuration;
use \KhipuChaski\ApiClient;
use \KhipuChaski\ApiException;
use \KhipuChaski\ObjectSerializer;

/**
 * DeviceRegistryApi Class Doc Comment
 *
 * @category Class
 * @package  KhipuChaski
 * @author   http://github.com/swagger-api/swagger-codegen
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class DeviceRegistryApi
{

    /**
     * API Client
     * @var \KhipuChaski\ApiClient instance of the ApiClient
     */
    protected $apiClient;
  
    /**
     * Constructor
     * @param \KhipuChaski\ApiClient|null $apiClient The api client to use
     */
    function __construct($apiClient = null)
    {
        if ($apiClient == null) {
            $apiClient = new ApiClient();
            $apiClient->getConfig()->setHost('https://chaski.khipu.com/api/1.0');
        }
  
        $this->apiClient = $apiClient;
    }
  
    /**
     * Get API client
     * @return \KhipuChaski\ApiClient get the API client
     */
    public function getApiClient()
    {
        return $this->apiClient;
    }
  
    /**
     * Set the API client
     * @param \KhipuChaski\ApiClient $apiClient set the API client
     * @return DeviceRegistryApi
     */
    public function setApiClient(ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
        return $this;
    }
  
    
    /**
     * addDevice
     *
     * Registro de dispositivo
     *
     * @param \KhipuChaski\Model\Device $device Dispositivo a registrar (requerido)
     * @param array $options Arreglo de par��metros opcionales (opcional)
     * @return \KhipuChaski\Model\SuccessResponse
     * @throws \KhipuChaski\ApiException on non-2xx response
     */
    public function addDevice($device, $options = null)
    {
        
        // verify the required parameter 'device' is set
        if ($device === null) {
            throw new \InvalidArgumentException('Missing the required parameter $device when calling addDevice');
        }
  
        // parse inputs
        $resourcePath = "/devices";
        $resourcePath = str_replace("{format}", "json", $resourcePath);
        $method = "POST";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = ApiClient::selectHeaderAccept(array('application/json'));
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = ApiClient::selectHeaderContentType(array('application/json'));
  
        

        if( $options != null ) {
          
        }


        

        if( $options != null ) {
            
        }


        

        if( $options != null ) {
            
        }

        

        if( $options != null ) {
          
        }

        // body params
        $_tempBody = $device;
        

        if( $options != null ) {
            
        }
  
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } else if (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        
        
        
        
        $encoded = array();

        foreach ($formParams as $key => $value) {
          $encoded[rawurlencode($key)] = rawurlencode($formParams[$key]);
        }
        foreach ($queryParams as $key => $value) {
          $encoded[rawurlencode($key)] = rawurlencode($queryParams[$key]);
        }

        $keys = array_keys($encoded);
        sort($keys);

        $url = $this->apiClient->getConfig()->getHost() . $resourcePath;

        $toSign = "$method&" . rawurlencode($url);
        foreach ($keys as $key) {
          $toSign .= "&$key=" . $encoded[$key];
        }
        if (isset($_tempBody)){
          $json_body = json_encode($this->apiClient->getSerializer()->sanitizeForSerialization($_tempBody));
          $toSign .="&".$json_body;
        }
        $hash = hash_hmac('sha256', $toSign , $this->apiClient->getConfig()->getSecret()); //sha1($concatenated . "&secret=" . $secret) . "\n";

        $headerParams['Authorization'] = $this->apiClient->getConfig()->getReceiverId() . ":" . $hash;

        
        
        // make the API Call
        try
        {
            list($response, $httpHeader) = $this->apiClient->callApi(
                $resourcePath, $method,
                $queryParams, $httpBody,
                $headerParams, '\KhipuChaski\Model\SuccessResponse'
            );
            
            if (!$response) {
                return null;
            }

            return $this->apiClient->getSerializer()->deserialize($response, '\KhipuChaski\Model\SuccessResponse', $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\KhipuChaski\Model\SuccessResponse', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 403:
                $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\KhipuChaski\Model\AuthorizationError', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 503:
                $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\KhipuChaski\Model\ServiceError', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
        
        return null;
        
    }
    
    /**
     * addUniqueAliasDevice
     *
     * Registro de dispositivo eliminando alias anteriores
     *
     * @param \KhipuChaski\Model\Device $device Dispositivo a registrar (requerido)
     * @param array $options Arreglo de par��metros opcionales (opcional)
     * @return \KhipuChaski\Model\SuccessResponse
     * @throws \KhipuChaski\ApiException on non-2xx response
     */
    public function addUniqueAliasDevice($device, $options = null)
    {
        
        // verify the required parameter 'device' is set
        if ($device === null) {
            throw new \InvalidArgumentException('Missing the required parameter $device when calling addUniqueAliasDevice');
        }
  
        // parse inputs
        $resourcePath = "/devices/uniqueAlias";
        $resourcePath = str_replace("{format}", "json", $resourcePath);
        $method = "POST";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = ApiClient::selectHeaderAccept(array('application/json'));
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = ApiClient::selectHeaderContentType(array('application/json'));
  
        

        if( $options != null ) {
          
        }


        

        if( $options != null ) {
            
        }


        

        if( $options != null ) {
            
        }

        

        if( $options != null ) {
          
        }

        // body params
        $_tempBody = $device;
        

        if( $options != null ) {
            
        }
  
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } else if (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        
        
        
        
        $encoded = array();

        foreach ($formParams as $key => $value) {
          $encoded[rawurlencode($key)] = rawurlencode($formParams[$key]);
        }
        foreach ($queryParams as $key => $value) {
          $encoded[rawurlencode($key)] = rawurlencode($queryParams[$key]);
        }

        $keys = array_keys($encoded);
        sort($keys);

        $url = $this->apiClient->getConfig()->getHost() . $resourcePath;

        $toSign = "$method&" . rawurlencode($url);
        foreach ($keys as $key) {
          $toSign .= "&$key=" . $encoded[$key];
        }
        if (isset($_tempBody)){
          $json_body = json_encode($this->apiClient->getSerializer()->sanitizeForSerialization($_tempBody));
          $toSign .="&".$json_body;
        }
        $hash = hash_hmac('sha256', $toSign , $this->apiClient->getConfig()->getSecret()); //sha1($concatenated . "&secret=" . $secret) . "\n";

        $headerParams['Authorization'] = $this->apiClient->getConfig()->getReceiverId() . ":" . $hash;

        
        
        // make the API Call
        try
        {
            list($response, $httpHeader) = $this->apiClient->callApi(
                $resourcePath, $method,
                $queryParams, $httpBody,
                $headerParams, '\KhipuChaski\Model\SuccessResponse'
            );
            
            if (!$response) {
                return null;
            }

            return $this->apiClient->getSerializer()->deserialize($response, '\KhipuChaski\Model\SuccessResponse', $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\KhipuChaski\Model\SuccessResponse', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 403:
                $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\KhipuChaski\Model\AuthorizationError', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 503:
                $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\KhipuChaski\Model\ServiceError', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
        
        return null;
        
    }
    
    /**
     * getDevice
     *
     * Obtiene dispositivo
     *
     * @param string $token_id Token que identifica al dispositivo. Tiene la forma &lt;platform&gt;:&lt;registryId&gt;, donde platform puede tomar los valores \&quot;and\&quot; o \&quot;ios\&quot;. (requerido)
     * @param array $options Arreglo de par��metros opcionales (opcional)
     * @return \KhipuChaski\Model\Device
     * @throws \KhipuChaski\ApiException on non-2xx response
     */
    public function getDevice($token_id, $options = null)
    {
        
        // verify the required parameter 'token_id' is set
        if ($token_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $token_id when calling getDevice');
        }
  
        // parse inputs
        $resourcePath = "/devices/{tokenId}";
        $resourcePath = str_replace("{format}", "json", $resourcePath);
        $method = "GET";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = ApiClient::selectHeaderAccept(array('application/json'));
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = ApiClient::selectHeaderContentType(array('application/json'));
  
        

        if( $options != null ) {
          
        }


        

        if( $options != null ) {
            
        }


        // path params
            $resourcePath = str_replace(
                "{" . "tokenId" . "}",
                $this->apiClient->getSerializer()->toPathValue($token_id),
                $resourcePath
            );
        

        if( $options != null ) {
            
        }

        

        if( $options != null ) {
          
        }

        

        if( $options != null ) {
            
        }
  
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } else if (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        
        
        
        
        $encoded = array();

        foreach ($formParams as $key => $value) {
          $encoded[rawurlencode($key)] = rawurlencode($formParams[$key]);
        }
        foreach ($queryParams as $key => $value) {
          $encoded[rawurlencode($key)] = rawurlencode($queryParams[$key]);
        }

        $keys = array_keys($encoded);
        sort($keys);

        $url = $this->apiClient->getConfig()->getHost() . $resourcePath;

        $toSign = "$method&" . rawurlencode($url);
        foreach ($keys as $key) {
          $toSign .= "&$key=" . $encoded[$key];
        }
        if (isset($_tempBody)){
          $json_body = json_encode($this->apiClient->getSerializer()->sanitizeForSerialization($_tempBody));
          $toSign .="&".$json_body;
        }
        $hash = hash_hmac('sha256', $toSign , $this->apiClient->getConfig()->getSecret()); //sha1($concatenated . "&secret=" . $secret) . "\n";

        $headerParams['Authorization'] = $this->apiClient->getConfig()->getReceiverId() . ":" . $hash;

        
        
        // make the API Call
        try
        {
            list($response, $httpHeader) = $this->apiClient->callApi(
                $resourcePath, $method,
                $queryParams, $httpBody,
                $headerParams, '\KhipuChaski\Model\Device'
            );
            
            if (!$response) {
                return null;
            }

            return $this->apiClient->getSerializer()->deserialize($response, '\KhipuChaski\Model\Device', $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\KhipuChaski\Model\Device', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 403:
                $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\KhipuChaski\Model\AuthorizationError', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 503:
                $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\KhipuChaski\Model\ServiceError', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
        
        return null;
        
    }
    
    /**
     * addDeviceRecipient
     *
     * Agregar receptor
     *
     * @param string $token_id Token que identifica al dispositivo. Tiene la forma &lt;platform&gt;:&lt;registryId&gt;, donde platform puede tomar los valores \&quot;and\&quot; o \&quot;ios\&quot;. (requerido)
     * @param string $recipient_id Identificador asociado a un receptor de mensajes push (requerido)
     * @param array $options Arreglo de par��metros opcionales (opcional)
     * @return \KhipuChaski\Model\SuccessResponse
     * @throws \KhipuChaski\ApiException on non-2xx response
     */
    public function addDeviceRecipient($token_id, $recipient_id, $options = null)
    {
        
        // verify the required parameter 'token_id' is set
        if ($token_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $token_id when calling addDeviceRecipient');
        }
        // verify the required parameter 'recipient_id' is set
        if ($recipient_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $recipient_id when calling addDeviceRecipient');
        }
  
        // parse inputs
        $resourcePath = "/devices/{tokenId}/recipients/{recipientId}";
        $resourcePath = str_replace("{format}", "json", $resourcePath);
        $method = "POST";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = ApiClient::selectHeaderAccept(array('application/json'));
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = ApiClient::selectHeaderContentType(array('application/json'));
  
        

        if( $options != null ) {
          
        }


        

        if( $options != null ) {
            
        }


        // path params
            $resourcePath = str_replace(
                "{" . "tokenId" . "}",
                $this->apiClient->getSerializer()->toPathValue($token_id),
                $resourcePath
            );
        // path params
            $resourcePath = str_replace(
                "{" . "recipientId" . "}",
                $this->apiClient->getSerializer()->toPathValue($recipient_id),
                $resourcePath
            );
        

        if( $options != null ) {
            
        }

        

        if( $options != null ) {
          
        }

        

        if( $options != null ) {
            
        }
  
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } else if (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        
        
        
        
        $encoded = array();

        foreach ($formParams as $key => $value) {
          $encoded[rawurlencode($key)] = rawurlencode($formParams[$key]);
        }
        foreach ($queryParams as $key => $value) {
          $encoded[rawurlencode($key)] = rawurlencode($queryParams[$key]);
        }

        $keys = array_keys($encoded);
        sort($keys);

        $url = $this->apiClient->getConfig()->getHost() . $resourcePath;

        $toSign = "$method&" . rawurlencode($url);
        foreach ($keys as $key) {
          $toSign .= "&$key=" . $encoded[$key];
        }
        if (isset($_tempBody)){
          $json_body = json_encode($this->apiClient->getSerializer()->sanitizeForSerialization($_tempBody));
          $toSign .="&".$json_body;
        }
        $hash = hash_hmac('sha256', $toSign , $this->apiClient->getConfig()->getSecret()); //sha1($concatenated . "&secret=" . $secret) . "\n";

        $headerParams['Authorization'] = $this->apiClient->getConfig()->getReceiverId() . ":" . $hash;

        
        
        // make the API Call
        try
        {
            list($response, $httpHeader) = $this->apiClient->callApi(
                $resourcePath, $method,
                $queryParams, $httpBody,
                $headerParams, '\KhipuChaski\Model\SuccessResponse'
            );
            
            if (!$response) {
                return null;
            }

            return $this->apiClient->getSerializer()->deserialize($response, '\KhipuChaski\Model\SuccessResponse', $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\KhipuChaski\Model\SuccessResponse', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 403:
                $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\KhipuChaski\Model\AuthorizationError', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 503:
                $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\KhipuChaski\Model\ServiceError', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
        
        return null;
        
    }
    
    /**
     * removeDeviceRecipient
     *
     * Elimina receptor
     *
     * @param string $token_id Token que identifica al dispositivo. Tiene la forma &lt;platform&gt;:&lt;registryId&gt;, donde platform puede tomar los valores \&quot;and\&quot; o \&quot;ios\&quot;. (requerido)
     * @param string $recipient_id Identificador asociado a un receptor de mensajes push (requerido)
     * @param array $options Arreglo de par��metros opcionales (opcional)
     * @return \KhipuChaski\Model\SuccessResponse
     * @throws \KhipuChaski\ApiException on non-2xx response
     */
    public function removeDeviceRecipient($token_id, $recipient_id, $options = null)
    {
        
        // verify the required parameter 'token_id' is set
        if ($token_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $token_id when calling removeDeviceRecipient');
        }
        // verify the required parameter 'recipient_id' is set
        if ($recipient_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $recipient_id when calling removeDeviceRecipient');
        }
  
        // parse inputs
        $resourcePath = "/devices/{tokenId}/recipients/{recipientId}";
        $resourcePath = str_replace("{format}", "json", $resourcePath);
        $method = "DELETE";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = ApiClient::selectHeaderAccept(array('application/json'));
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = ApiClient::selectHeaderContentType(array('application/json'));
  
        

        if( $options != null ) {
          
        }


        

        if( $options != null ) {
            
        }


        // path params
            $resourcePath = str_replace(
                "{" . "tokenId" . "}",
                $this->apiClient->getSerializer()->toPathValue($token_id),
                $resourcePath
            );
        // path params
            $resourcePath = str_replace(
                "{" . "recipientId" . "}",
                $this->apiClient->getSerializer()->toPathValue($recipient_id),
                $resourcePath
            );
        

        if( $options != null ) {
            
        }

        

        if( $options != null ) {
          
        }

        

        if( $options != null ) {
            
        }
  
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } else if (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        
        
        
        
        $encoded = array();

        foreach ($formParams as $key => $value) {
          $encoded[rawurlencode($key)] = rawurlencode($formParams[$key]);
        }
        foreach ($queryParams as $key => $value) {
          $encoded[rawurlencode($key)] = rawurlencode($queryParams[$key]);
        }

        $keys = array_keys($encoded);
        sort($keys);

        $url = $this->apiClient->getConfig()->getHost() . $resourcePath;

        $toSign = "$method&" . rawurlencode($url);
        foreach ($keys as $key) {
          $toSign .= "&$key=" . $encoded[$key];
        }
        if (isset($_tempBody)){
          $json_body = json_encode($this->apiClient->getSerializer()->sanitizeForSerialization($_tempBody));
          $toSign .="&".$json_body;
        }
        $hash = hash_hmac('sha256', $toSign , $this->apiClient->getConfig()->getSecret()); //sha1($concatenated . "&secret=" . $secret) . "\n";

        $headerParams['Authorization'] = $this->apiClient->getConfig()->getReceiverId() . ":" . $hash;

        
        
        // make the API Call
        try
        {
            list($response, $httpHeader) = $this->apiClient->callApi(
                $resourcePath, $method,
                $queryParams, $httpBody,
                $headerParams, '\KhipuChaski\Model\SuccessResponse'
            );
            
            if (!$response) {
                return null;
            }

            return $this->apiClient->getSerializer()->deserialize($response, '\KhipuChaski\Model\SuccessResponse', $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\KhipuChaski\Model\SuccessResponse', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 403:
                $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\KhipuChaski\Model\AuthorizationError', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 503:
                $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\KhipuChaski\Model\ServiceError', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
        
        return null;
        
    }
    
}
