# aisdk/baseten

<a href="https://github.com/phpaisdk/baseten/actions"><img alt="GitHub Workflow Status" src="https://img.shields.io/github/actions/workflow/status/phpaisdk/baseten/tests.yml?branch=main&label=Tests"></a>
<a href="https://packagist.org/packages/aisdk/baseten"><img alt="Latest Version" src="https://img.shields.io/packagist/v/aisdk/baseten"></a>
<a href="https://packagist.org/packages/aisdk/baseten"><img alt="License" src="https://img.shields.io/packagist/l/aisdk/baseten"></a>

------

Official Baseten provider for the PHP AI SDK. Uses Baseten Model APIs' OpenAI-compatible chat endpoint.

## Installation

```bash
composer require aisdk/baseten
```

## Basic Usage

```php
use AiSdk\Baseten;
use AiSdk\Generate;

Baseten::create(['apiKey' => $_ENV['BASETEN_API_KEY']]);

$result = Generate::text('Explain this code briefly.')
    ->model(Baseten::model('deepseek-ai/DeepSeek-V4-Pro'))
    ->run();
```

## Configuration

| Variable | Description | Default |
| --- | --- | --- |
| `BASETEN_API_KEY` | API key for authentication | Required |
| `BASETEN_BASE_URL` | Base URL for API requests | `https://inference.baseten.co/v1` |

## Supported Capabilities

| Capability | Support |
| --- | --- |
| Text generation and streaming | Native OpenAI-compatible chat |
| Tool calling, structured output, reasoning | Passed through for supported Model APIs |
| Image input | Passed through for compatible models |

Use `providerOptions('baseten', ['raw' => [...]])` for documented Baseten chat-completions fields outside the portable SDK surface. Model IDs are opaque strings and are validated by Baseten.

## Documentation

- [Baseten Model APIs documentation](https://docs.baseten.co/inference/model-apis/overview)
- [PHP AI SDK documentation](https://phpaisdk.com/docs/baseten)
