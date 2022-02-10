<?php

namespace Infobip\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Infobip\ApiException;
use Infobip\Configuration;
use Infobip\HeaderSelector;
use Infobip\ObjectSerializer;

Class NumbersApi{

    CONST API_AVAILABLE_NUMBERS_PATH = '/numbers/1/numbers/available';
    CONST API_PURCHASED_NUMBERS_PATH = '/numbers/1/numbers';


    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    public function setConfig($configuration):void{
        $this->config = $configuration;
    }

    public function getAvailableNumbers(){

        list($response) = $this->getAvailableNumbersWithHttpInfo();
        return $response;

    }

    public function getPurchasedNumbers(){

        list($response) = $this->getPurchasedNumbersWithHttpInfo();
        return $response;

    }

    public function validateApiCredencials(){

        $request = $this->getAvailableNumbersRequest();

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
                return true;
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            }
        } catch (ApiException $e) {

            return false;
        }

    }

    public function getAvailableNumbersWithHttpInfo(){

        $request = $this->getAvailableNumbersRequest();

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
                return $this->getAvailableNumbersResponse($response, $request->getUri());
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            }
        } catch (ApiException $e) {

            throw $this->getAvailableNumbersException($e);
        }

    }

    public function getPurchasedNumbersWithHttpInfo(){

        $request = $this->getPurchasedNumbersRequest();

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
                return $this->getAvailableNumbersResponse($response, $request->getUri());
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            }
        } catch (ApiException $e) {

            throw $this->getAvailableNumbersException($e);
        }

    }

    public function getAvailableNumbersRequest(){

        $headerParams = [];
        $httpBody = '';

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
        }
        // this endpoint requires HTTP basic authentication
        if (!empty($this->config->getUsername()) || !(empty($this->config->getPassword()))) {
            $headers['Authorization'] = 'Basic ' . base64_encode($this->config->getUsername() . ":" . $this->config->getPassword());
        }
        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        return new Request(
            'GET',
            $this->config->getHost() . self::API_AVAILABLE_NUMBERS_PATH,
            $headers,
            $httpBody
        );
    }

    public function getPurchasedNumbersRequest(){

        $headerParams = [];
        $httpBody = '';

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
        }
        // this endpoint requires HTTP basic authentication
        if (!empty($this->config->getUsername()) || !(empty($this->config->getPassword()))) {
            $headers['Authorization'] = 'Basic ' . base64_encode($this->config->getUsername() . ":" . $this->config->getPassword());
        }
        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        return new Request(
            'GET',
            $this->config->getHost() . self::API_PURCHASED_NUMBERS_PATH,
            $headers,
            $httpBody
        );
    }

    protected function getAvailableNumbersResponse($response, $requestUri)
    {
        $statusCode = $response->getStatusCode();
        $responseBody = $response->getBody();
        $responseHeaders = $response->getHeaders();

        if ($statusCode < 200 || $statusCode > 299) {
            throw new ApiException(
                sprintf('[%d] Error connecting to the API (%s)', $statusCode, $requestUri),
                $statusCode,
                $responseHeaders,
                $responseBody
            );
        }
        $responseObject = null;

        $responseObject = $responseBody;

        return [
            $responseObject,
            $statusCode,
            $responseHeaders
        ];

    }

    protected function getAvailableNumbersException($apiException){

        $statusCode = $apiException->getCode();

        if ($statusCode >= 400 && $statusCode <= 499) {
            $data = ObjectSerializer::deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\Numbers\NumbersApiException',
                $apiException->getResponseHeaders()
            );
            $apiException->setResponseObject($data);
            return $apiException;
        }
        if ($statusCode >= 500 && $statusCode <= 599) {
            $data = ObjectSerializer::deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\Numbers\NumbersApiException',
                $apiException->getResponseHeaders()
            );
            $apiException->setResponseObject($data);
            return $apiException;
        }

        $data = ObjectSerializer::deserialize(
            $apiException->getResponseBody(),
            '\Infobip\Model\Numbers\NumbersResponse',
            $apiException->getResponseHeaders()
        );
        $apiException->setResponseObject($data);
        return $apiException;

    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}























