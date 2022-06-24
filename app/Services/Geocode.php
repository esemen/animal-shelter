<?php


namespace App\Services;

use Illuminate\Support\Facades\Http;

/**
 * Class Geocode
 * @package App\Services
 * Get Geocode data from Google Maps Geocode API
 * Ozhan Esemen
 */
class Geocode
{
    protected $apiKey = null;

    protected object $data;

    protected bool $status = false;

    protected const URLPREFIX = 'https://maps.googleapis.com/maps/api/geocode/';

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    protected function buildAddressLookupQuery($address)
    {
        $queryParams = [
            'address' => $address,
            'key' => $this->apiKey
        ];

        return self::URLPREFIX . 'json?' . http_build_query($queryParams);
    }

    public function loadAddress(string $address): bool
    {
        $url = $this->buildAddressLookupQuery($address);

        try {
            $this->status = false;

            $response = Http::get($url);

            if ($response->status() <> 200) {
                return false;
            }

            $this->data = json_decode($response->body());

            if ($this->data->status === 'OK') {
                $this->status = true;
                return true;
            } else {
                return false;
            }
        } catch (\Exception $exception) {
            return false;
        }
    }

    public function getTypes() {
        return $this->status ? collect($this->data->results[0]->types) : collect();
    }

    public function getCoordinates()
    {
        return $this->status ? new Coordinates($this->data->results[0]->geometry->location) : null;
    }

    public function getFormattedAddress()
    {
        return ($this->status) ? $this->data->results[0]->formatted_address : null;
    }
}
