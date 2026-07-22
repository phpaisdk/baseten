<?php

declare(strict_types=1);
use AiSdk\Baseten;
use AiSdk\Baseten\Tests\Fakes\FakeHttpClient;
use AiSdk\Generate;
use AiSdk\Support\Sdk;
use Nyholm\Psr7\Factory\Psr17Factory;

afterEach(function (): void {
    Generate::reset();
    Baseten::reset();
});
it('uses Baseten general OpenAI-compatible chat completions', function (): void {
    $client = new FakeHttpClient(200, json_encode(['id' => 'baseten-chat', 'model' => 'deepseek-ai/DeepSeek-V4-Pro', 'choices' => [['message' => ['content' => 'Hello from Baseten Model API'], 'finish_reason' => 'stop']], 'usage' => ['prompt_tokens' => 3, 'completion_tokens' => 4]]));
    $factory = new Psr17Factory();
    Generate::configure(new Sdk($client, $factory, $factory));
    Baseten::create(['apiKey' => 'baseten-test']);
    $result = Generate::text('Hi')->model(Baseten::model('deepseek-ai/DeepSeek-V4-Pro'))->run();
    expect($result->text)->toBe('Hello from Baseten Model API')->and((string) $client->lastRequest?->getUri())->toBe('https://inference.baseten.co/v1/chat/completions')->and($client->lastRequest?->getHeaderLine('Authorization'))->toBe('Bearer baseten-test')->and($client->sentBody()['model'])->toBe('deepseek-ai/DeepSeek-V4-Pro');
});
it('accepts opaque Baseten model identifiers', function (): void {
    Baseten::create(['apiKey' => 'baseten-test']);
    expect(Baseten::model('private-deepseek-ai/DeepSeek-V4-Pro-model')->modelId())->toBe('private-deepseek-ai/DeepSeek-V4-Pro-model');
});
