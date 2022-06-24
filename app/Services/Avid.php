<?php


namespace App\Services;

use Illuminate\Support\Facades\Http;
use Str;

/**
 * Class Geocode
 * @package App\Services
 * Get Geocode data from Google Maps Geocode API
 * Ozhan Esemen
 */
class Avid
{
    protected const API_URL = 'https://online.pettrac.com/api/external/registration/standard/';
    protected const API_VERSION = 1.2;

    protected array $organisation = [];
    protected array $status = [];
    protected array $payload = [];


    public function __construct($organisation)
    {
        $this->organisation = $organisation;
    }

    private function resetStatus()
    {
        $this->status = [
            'code' => '000',
            'codeExtended' => '000',
            'message' => null
        ];
    }

    private function preparePayload($fields)
    {
        $this->payload = array_filter(
            array_merge([
                'version' => self::API_VERSION,
            ], $this->organisation, $fields)
        );
    }

    protected function setStatus($response)
    {
        $status = Str::of($response)->after('status code=\'');

        $this->status['code'] = (string)$status->substr(0, 3);
        $this->status['codeExtended'] = (string)$status->before('\'');
        $this->status['message'] = (string)$status->after('>')->before('<');
    }

    public function register(array $fields): bool
    {
        try {
            $this->resetStatus();

            $this->preparePayload($fields);

            // Send POST request
            $response = Http::asForm()->post(self::API_URL, $this->payload);

            if ($response->status() <> 200) {
                return false;
            }

            $this->setStatus($response->body());

            return $this->status['message'] != null;
        } catch (\Exception $exception) {
            return false;
        }
    }

    public function statusCode()
    {
        return $this->status['code'];
    }

    public function statusMessage()
    {
        return $this->status['message'];
    }
}
