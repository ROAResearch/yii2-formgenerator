<?php

use app\fixtures\{OauthAccessTokensFixture, SolicitudeValueFixture};
use Codeception\{Example, Util\HttpCode};

/**
 * Cest to Solicitude-value resource.
 *
 * @author Carlos (neverabe) Llamosas <cmllamosas@gmail.com>
 */
class SearchValueCest extends \roaresearch\yii2\roa\test\AbstractResourceCest
{
    protected function authToken(ApiTester $I)
    {
        $I->amBearerAuthenticated(OauthAccessTokensFixture::SIMPLE_TOKEN);
    }

    public function fixtures(ApiTester $I)
    {
        $I->haveFixtures([
            'access_tokens' => OauthAccessTokensFixture::class,
            'solicitude' => SolicitudeValueFixture::class,
        ]);
    }

    /**
     * @param  ApiTester $I
     * @param  Example $example
     * @dataprovider indexDataProvider
     * @depends fixtures
     * @before authToken
     */
    public function index(ApiTester $I, Example $example)
    {
        $I->wantTo('Retrieve list of SolicitudeValue records.');
        $this->internalIndex($I, $example);
    }

    /**
     * @return array<string,array> for test `index()`.
     */
    protected function indexDataProvider()
    {
        return [
            'single value' => [
                'urlParams' => [
                    'value' => 'guevara',
                ],
                'httpCode' => HttpCode::OK,
                'headers' => [
                    'X-Pagination-Total-Count' => 2,
                ],
            ],
            'invalid search' => [
                'urlParams' => [
                    'form_id' => 'foo',
                ],
                'httpCode' => HttpCode::UNPROCESSABLE_ENTITY,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    protected function recordJsonType(): array
    {
        return [
            'solicitude_id' => 'integer:>0',
            'section_id' => 'integer:>0',
            'field_id' => 'integer:>0',
            'value' => 'string',
        ];
    }

    /**
     * @inheritdoc
     */
    protected function getRoutePattern(): string
    {
        return 'solicitude-value';
    }
}
