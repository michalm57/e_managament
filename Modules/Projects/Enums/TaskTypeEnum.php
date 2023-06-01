<?php

namespace Modules\Projects\Enums;

enum TaskTypeEnum: string
{
    case BackendType = 'backend_type';
    case FrontendType = 'frontend_type';
    case DocumentationType = 'documentation_type';
    case DevelopmentOperationsType = 'development_operations_type';
}
