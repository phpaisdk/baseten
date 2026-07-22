<?php

declare(strict_types=1);

namespace AiSdk\Baseten;

use AiSdk\Baseten\Models\BasetenTextModel;
use AiSdk\Contracts\BaseProvider;
use AiSdk\Contracts\TextModelInterface;
use AiSdk\Contracts\TextProviderInterface;

final class BasetenProvider extends BaseProvider implements TextProviderInterface
{
    public function __construct(public readonly BasetenOptions $options) {}
    public function name(): string
    {
        return BasetenOptions::PROVIDER_NAME;
    }
    protected function textModel(string $modelId): TextModelInterface
    {
        return new BasetenTextModel($modelId, $this->options);
    }
}
