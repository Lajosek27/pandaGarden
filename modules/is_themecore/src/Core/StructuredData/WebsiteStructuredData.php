<?php

namespace Oksydan\Module\IsThemeCore\Core\StructuredData;

class WebsiteStructuredData extends AbstractStructuredData implements StructuredDataInterface
{
    public function getStructuredDataType(): string
    {
        return 'website';
    }
}
