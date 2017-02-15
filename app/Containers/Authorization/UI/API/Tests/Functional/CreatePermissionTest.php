<?php

namespace App\Containers\Authorization\UI\API\Tests\Functional;

use App\Port\Test\PHPUnit\Abstracts\TestCase;

/**
 * Class CreatePermissionTest.
 *
 * @author  Mahmoud Zalt <mahmoud@zalt.me>
 */
class CreatePermissionTest extends TestCase
{

    protected $endpoint = '/permissions';

    protected $access = [
        'roles'       => 'admin',
        'permissions' => '',
    ];

    public function testCreatePermission_()
    {
        $this->getTestingAdmin();

        $data = [
            'name'         => 'eat-people',
            'display_name' => 'zombie',
            'description'  => 'can eat people',
        ];

        // send the HTTP request
        $response = $this->apiCall($this->endpoint, 'post', $data, true);

        // assert response status is correct
        $this->assertEquals('200', $response->getStatusCode());

        $responseObject = $this->getResponseObject($response);

        $this->assertEquals($data['name'], $responseObject->data->name);
    }

}
