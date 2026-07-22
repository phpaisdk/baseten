# Baseten provider for PHP AI SDK

```bash
composer require aisdk/baseten
```

```php
use AiSdk\Generate;
use AiSdk\Baseten;

Baseten::create(['apiKey' => $_ENV['Baseten_API_KEY']]);

$result = Generate::text('Explain this code briefly.')
    ->model(Baseten::model('deepseek-ai/DeepSeek-V4-Pro'))
    ->run();
```

This package uses Baseten Model API's official OpenAI-compatible API at `https://inference.baseten.co/v1`. It supports text and streaming generation; tool calling, structured output, reasoning, and image input are passed through for Model API models that expose those capabilities. See [Baseten API documentation](https://docs.baseten.co/reference/inference-api/chat-completions) and [PHP AI SDK documentation](https://phpaisdk.com/docs/baseten).
