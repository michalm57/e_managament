<?php

namespace Modules\Projects\Enums;

enum ProjectStatusEnum: string
{
    case Created = 'created';
    case InProgress = 'in_progress';
    case Rejected = 'rejected';
    case Suspended = 'suspended';
}
