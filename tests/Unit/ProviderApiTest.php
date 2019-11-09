<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit_Framework_Assert;

class ProviderApiTest extends TestCase
{
    /**
     * list all users which combine transactions from all the available providers
     *
     */
    public function test_list_all_users()
    {
        // /api/v1/users
        $response = $this->json('GET', '/api/v1/users');

        $response->assertStatus(200);
    }

    /**
     *  filter resullt by payment providers
     */
    public function test_filter_result_by_payment_provider()
    {
        // api/v1/users?provider=DataProviderY
        $response = $this->json('GET', '/api/v1/users', ['provider' => 'DataProviderY']);

        $response->assertStatus(200);
    }

    public function test_filter_result_by_three_statusCode()
    {
        // /api/v1/users?statusCode=authorised
        $response = $this->json('GET', '/api/v1/users', ['statusCode' => 'authorised']);

        $response->assertStatus(200);
    }

    public function test_filer_by_amount_range()
    {
        // /api/v1/users?statusCode=authorised
        $response = $this->json('GET', '/api/v1/users', ['balanceMax' => '400', 'balanceMin' => '100']);

        $response->assertStatus(200);

    }
}
